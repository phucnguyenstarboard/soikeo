<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use DateTime;
use DateTimeZone;
use Session;

class HomeController extends Controller
{
    public function __construct() 
    {
      $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $user = Auth::user();
            $count = DB::table('withdraw_history')
                ->where('user_id', $user->id)
                ->whereIn('status', [1,2])
                ->where('is_view', 0)
                ->count();
            session()->put('total_r', $count); 

            return $next($request);
        });
    }
    public function join()
    {
        if (Auth::check()) {
            $seconds = 180;
            $user = Auth::user();
            $item = DB::table('session')->orderBy('id', 'desc')->where('timeInt', '<=', strtotime(date('Y-m-d H:i:01')))->first();
            $item->time_created = $this->convertDateTime($item->time_created);
            $times =  strtotime($item->time_created) + $seconds - strtotime(date('Y-m-d H:i:s'));
            $minute = floor($times / 60);
            $second = $times % 60;
            $item_last = DB::table('session')->orderBy('id', 'desc')->where('timeInt', '<=', strtotime(date('Y-m-d H:i:01')))->take(5)->get();

            $item_bet = DB::table('bet')
            ->join('session', 'session.session_id', '=', 'bet.session_id')
            ->select('session.number', 'session.result', 'bet.status')
            ->where('bet.user_id', $user->id)
            ->where('bet.timeInt', '<', $item->timeInt)
            ->orderBy('bet.id', 'desc')
            ->take(5)
            ->get();

            $gao1 = ['name' => 'Gạo Tấm Gò Công 3,5 kg', 'weight' => '3.5kg', 'price' => '117.000'];
            $gao2 = ['name' => 'Gạo Tấm Sóc Trăng Vinafood1', 'weight' => '3.5kg', 'price' => '108.000'];
            $gao3 = ['name' => 'Gạo Mười Hương Vinafood1', 'weight' => '3.5kg', 'price' => '140.000'];
            $gao4 = ['name' => 'Gạo Nam Hương Vinafood1', 'weight' => '3.5kg', 'price' => '93.000'];
            $list_gao[] = $gao1;
            $list_gao[] = $gao2;
            $list_gao[] = $gao3;
            $list_gao[] = $gao4;

            $item_new = DB::table('session')->orderBy('id', 'desc')->first();

            return view('pages.join', compact('user', 'item', 'times', 'minute', 'second', 'item_last', 'item_bet', 'list_gao', 'item_new'));
        }
        return view('pages.login');
    }

    public function home()
    {
        if (Auth::check()) {            
            $user = Auth::user();            
            return view('pages.home', compact('user'));
        }
        return view('pages.login');
    }

    public function lastSession(Request $request)
    {
        // $item = DB::table('session')->orderBy('id', 'desc')->skip(1)->take(1)->first();
        $item = DB::table('session')->orderBy('id', 'desc')->where('timeInt', '<=', strtotime(date('Y-m-d H:i:01')))->first();
        $item->time_created = $this->convertDateTime($item->time_created, 'Ymd');

        $time_created = $this->convertDateTime($item->time_created);
        $seconds = 180;
        $times =  strtotime($time_created) + $seconds - strtotime(date('Y-m-d H:i:s'));
        $item->times = $times;
        return response()->json([$item], 200);
    }

    public function postBet(Request $request)
    {
        $user = Auth::user();
        $balance = (float)$user->balance;
        $item = DB::table('session')->orderBy('id', 'desc')->first();
        $data = $request->all();

        if(empty($data['txt-money'])){
            return response()->json([
                'message' => [
                    'title' => '',
                    'text'  => 'Số tiền đặt cược không hợp lệ, vui lòng thử lại.',
                    'type'  => 'warning',
                ]
            ], 422);
        }
        
        
        $bet_temp = str_replace('.', '', $data['txt-money']);
        $bet_temp = str_replace(',', '', $bet_temp);
        
        
        $bet = (float)$bet_temp;
        if($balance < $bet){
            return response()->json([
                'message' => [
                    'title' => '',
                    'text'  => 'Số dư của bạn nhỏ hơn số tiền đặt cược, vui lòng nạp thêm tiền hoặc chỉnh sửa số tiền cược phù hợp.',
                    'type'  => 'warning',
                ]
            ], 422);
        }
        $balance = $balance - $bet;
        DB::table('user')->where('id', $user->id)
        ->update(['balance' => $balance]);

        DB::table('bet')->insert([
            'user_id' => $user->id,
            'session_id' => $item->session_id,
            'betMoney' => $bet,
            'bet' => $data['type'],
            'time_created' => gmdate('D M d Y H:i:s TO'),
            'timeInt' => strtotime(date('Y-m-d H:i:s'))
        ]);

        return response()->json([
            'message' => [
                'title' => '',
                'text'  => 'Xác nhận thành công',
                'type'  => 'success',
            ],
            'balance'  => number_format($balance),
        ], 200);
    }
    
    public function postNotice(Request $request)
    {
        $user = Auth::user();
        
        $data = $request->all();
        if(!empty($data['close'])){
            DB::table('user')->where('id', $user->id)->update([
                'is_notice' => 0
            ]);
        }

        return response()->json([
            'message' => [
                'title' => '',
                'text'  => 'Tắt thông báo thành công',
                'type'  => 'success',
            ],
        ], 200);
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
