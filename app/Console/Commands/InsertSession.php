<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateTimeZone;

class InsertSession extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:insert-session';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $item = DB::table('session')->orderBy('id', 'desc')->first();
        $now = date('Y-m-d H:i:00');
        $seconds = 180;
        $isUpdate = false;
        if ($item) {
            $lasted = $this->convertDateTime($item->time_created);
            if (strtotime($now) >= (strtotime($lasted) + $seconds)) {
                DB::table('session')->insert(
                    [
                        'result' => rand(10000, 99999),
                        'number' => rand(100000, 99999999),
                        'session_id' => (int)$item->session_id + 1,
                        'time_created' => gmdate('D M d Y H:i:00 TO'),
                        'timeInt' => strtotime($now)
                    ]
                );
                DB::table('session')->insert(
                    [
                        'result' => rand(10000, 99999),
                        'number' => rand(100000, 99999999),
                        'session_id' => (int)$item->session_id + 2,
                        'time_created' => gmdate('D M d Y H:i:00 TO', strtotime($now) + $seconds),
                        'timeInt' => strtotime($now) + $seconds
                    ]
                );
                $isUpdate = true;
            } else {
                if (strtotime($now) == strtotime($lasted)) {
                    DB::table('session')->insert(
                        [
                            'result' => rand(10000, 99999),
                            'number' => rand(100000, 99999999),
                            'session_id' => (int)$item->session_id + 1,
                            'time_created' => gmdate('D M d Y H:i:00 TO', strtotime($lasted) + $seconds),
                            'timeInt' => strtotime($lasted) + $seconds
                        ]
                    );
                    $isUpdate = true;
                }
            }
        } else {
            DB::table('session')->insert([
                'result' => rand(10000, 99999),
                'number' => rand(100000, 99999999),
                'session_id' => 1,
                'time_created' => gmdate('D M d Y H:i:s TO'),
                'timeInt' => strtotime($now)
            ]);
            $isUpdate = true;
        }

        // cập nhật thắng thua
        if($isUpdate){
            $bets = DB::table('bet')
                ->join('session', 'session.session_id', '=', 'bet.session_id')
                ->select('session.number', 'session.result', 'bet.id', 'bet.bet', 'bet.betMoney', 'bet.user_id')
                ->where('bet.status', 0)
                ->orderBy('bet.id', 'desc')
                ->get();

            foreach ($bets as $item) {
                $val1 = substr($item->result, 0, 1);
                $val2 = substr($item->result, 1, 1);
                $result = (int)$val1 + (int)$val2;

                // Xuat
                $status = 2;
                if (((int)$item->bet === 1 && $result <= 10) || ((int)$item->bet === 2 && $result > 10)) {
                    $status = 1;
                    $user = DB::table('user')->where('id', $item->user_id)->first();
                    $balance = (float)$user->balance + (float)$item->betMoney * 2;
                    DB::table('user')->where('id', $item->user_id)
                        ->update(['balance' => $balance]);
                }

                DB::table('bet')->where('id', $item->id)
                    ->update(['status' => $status]);
            }
        }

        return Command::SUCCESS;
    }

    public function convertDateTime($date, $format = 'Y-m-d H:i:s')
    {
        $tz1 = 'UTC';
        $tz2 = 'Asia/Ho_Chi_Minh'; // UTC +7

        $d = new DateTime($date, new DateTimeZone($tz1));
        $d->setTimeZone(new DateTimeZone($tz2));

        return $d->format($format);
    }
}
