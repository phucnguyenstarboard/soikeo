<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB; 

class MatchCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'match:cron';

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
        // All type = 0
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getAllMatchList');
        $data = $response->json();
        foreach ($data as $key => $value) {
            if($key == 'rows'){
                foreach ($value as $k => $v) {
                    $tour = DB::table('tournaments')->where('tour_name', '=', $v['typeName'])->first();
                    if (!empty($tour)) {
                        $tour_id = $tour->id;
                    } else {
                        $tour_id = DB::table('tournaments')->insertGetId( ['tour_name' => $v['typeName']] ); 
                    }
                    $dataMatch = array();
                    $dataMatch['typeMatch'] = '0';
                    $dataMatch['tournamentId'] = $tour_id;
                    $dataMatch['matchId'] = $v['matchId'];
                    $dataMatch['rowNo'] = $v['rowNo'];
                    $dataMatch['week'] = $v['week'];
                    $dataMatch['typeName'] = $v['typeName'];
                    $dataMatch['matchDate'] = $v['matchDate'];
                    $dataMatch['matchTime'] = $v['matchTime'];
                    $dataMatch['matchResult'] = $v['matchResult'];
                    $dataMatch['recPercent'] = $v['recPercent'];
                    $dataMatch['betRate'] = $v['betRate'];
                    $dataMatch['homeTeam'] = $v['homeTeam'];
                    $dataMatch['visitTeam'] = $v['visitTeam'];
                    $dataMatch['homeTeamNo'] = $v['homeTeamNo'];
                    $dataMatch['visitTeamNo'] = $v['visitTeamNo'];
                    $dataMatch['homeLogo'] = $v['homeLogo'];
                    $dataMatch['visitLogo'] = $v['visitLogo'];
                    $dataMatch['result1'] = $v['result1'];
                    $dataMatch['result2'] = $v['result2'];
                    $dataMatch['isOk'] = $v['isOk'];
                    $dataMatch['matchLong'] = $v['matchLong'];
                    $dataMatch['isCode'] = $v['isCode'];
                    $dataMatch['matchDesc'] = $v['matchDesc'];
                    $dataMatch['fixedNam'] = $v['fixedNam'];
                    DB::table('matchs')->insertOrIgnore($dataMatch);


                    $rs = DB::table('match_details')->where('matchId', $v['matchId'])->first();

                    if(empty($rs)){
                        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getDetailYcChartsInfo?rowNo='.$v['matchId']);
                        $content1 = $response->json();

                        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getDetailLeftLists?rowNo='.$v['matchId']);
                        $content2 = $response->json();

                        $dataMatch = array();
                        $dataMatch['matchId'] = $v['matchId'];
                        $dataMatch['content1'] = json_encode($content1);
                        $dataMatch['content2'] = json_encode($content2);
                        DB::table('match_details')->insertOrIgnore($dataMatch);
                    }
                }
            }
        }

        // All type = 6
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getWdList');
        $data = $response->json();
        foreach ($data['rows'][0]['matchList'] as $k => $v) {
            $tour = DB::table('tournaments')->where('tour_name', '=', $v['typeName'])->first();
            if (!empty($tour)) {
                $tour_id = $tour->id;
            } else {
                $tour_id = DB::table('tournaments')->insertGetId( ['tour_name' => $v['typeName']] ); 
            }
            $dataMatch = array();
            $dataMatch['typeMatch'] = '6';
            $dataMatch['tournamentId'] = $tour_id;
            $dataMatch['matchId'] = $v['matchId'];
            $dataMatch['rowNo'] = $v['rowNo'];
            $dataMatch['week'] = $v['week'];
            $dataMatch['typeName'] = $v['typeName'];
            $dataMatch['matchDate'] = $v['matchDate'];
            $dataMatch['matchTime'] = $v['matchTime'];
            $dataMatch['matchResult'] = $v['matchResult'];
            $dataMatch['recPercent'] = $v['recPercent'];
            $dataMatch['betRate'] = $v['betRate'];
            $dataMatch['homeTeam'] = $v['homeTeam'];
            $dataMatch['visitTeam'] = $v['visitTeam'];
            $dataMatch['homeTeamNo'] = $v['homeTeamNo'];
            $dataMatch['visitTeamNo'] = $v['visitTeamNo'];
            $dataMatch['homeLogo'] = $v['homeLogo'];
            $dataMatch['visitLogo'] = $v['visitLogo'];
            $dataMatch['result1'] = $v['result1'];
            $dataMatch['result2'] = $v['result2'];
            $dataMatch['isOk'] = $v['isOk'];
            $dataMatch['matchLong'] = $v['matchLong'];
            $dataMatch['isCode'] = $v['isCode'];
            $dataMatch['matchDesc'] = $v['matchDesc'];
            $dataMatch['fixedNam'] = $v['fixedNam'];
            DB::table('matchs')->insertOrIgnore($dataMatch);


            $rs = DB::table('match_details')->where('matchId', $v['matchId'])->first();

            if(empty($rs)){
                $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getDetailYcChartsInfo?rowNo='.$v['matchId']);
                $content1 = $response->json();

                $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getDetailLeftLists?rowNo='.$v['matchId']);
                $content2 = $response->json();

                $dataMatch = array();
                $dataMatch['matchId'] = $v['matchId'];
                $dataMatch['content1'] = json_encode($content1);
                $dataMatch['content2'] = json_encode($content2);
                DB::table('match_details')->insertOrIgnore($dataMatch);
            }
        }

        // All type = 7
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getSdtjList');
        $data = $response->json();
        foreach ($data['rows'] as $index => $item) {
            foreach ($item['matchList'] as $k => $v) {
                $tour = DB::table('tournaments')->where('tour_name', '=', $v['typeName'])->first();
                if (!empty($tour)) {
                    $tour_id = $tour->id;
                } else {
                    $tour_id = DB::table('tournaments')->insertGetId( ['tour_name' => $v['typeName']] ); 
                }
                $dataMatch = array();
                $dataMatch['typeMatch'] = '7';
                $dataMatch['tournamentId'] = $tour_id;
                $dataMatch['matchId'] = $v['matchId'];
                $dataMatch['rowNo'] = $v['rowNo'];
                $dataMatch['week'] = $v['week'];
                $dataMatch['typeName'] = $v['typeName'];
                $dataMatch['matchDate'] = $v['matchDate'];
                $dataMatch['matchTime'] = $v['matchTime'];
                $dataMatch['matchResult'] = $v['matchResult'];
                $dataMatch['recPercent'] = $v['recPercent'];
                $dataMatch['betRate'] = $v['betRate'];
                $dataMatch['homeTeam'] = $v['homeTeam'];
                $dataMatch['visitTeam'] = $v['visitTeam'];
                $dataMatch['homeTeamNo'] = $v['homeTeamNo'];
                $dataMatch['visitTeamNo'] = $v['visitTeamNo'];
                $dataMatch['homeLogo'] = $v['homeLogo'];
                $dataMatch['visitLogo'] = $v['visitLogo'];
                $dataMatch['result1'] = $v['result1'];
                $dataMatch['result2'] = $v['result2'];
                $dataMatch['isOk'] = $v['isOk'];
                $dataMatch['matchLong'] = $v['matchLong'];
                $dataMatch['isCode'] = $v['isCode'];
                $dataMatch['matchDesc'] = $v['matchDesc'];
                $dataMatch['fixedNam'] = $v['fixedNam'];
                DB::table('matchs')->insertOrIgnore($dataMatch);


                $rs = DB::table('match_details')->where('matchId', $v['matchId'])->first();

                if(empty($rs)){
                    $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getDetailYcChartsInfo?rowNo='.$v['matchId']);
                    $content1 = $response->json();

                    $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getDetailLeftLists?rowNo='.$v['matchId']);
                    $content2 = $response->json();

                    $dataMatch = array();
                    $dataMatch['matchId'] = $v['matchId'];
                    $dataMatch['content1'] = json_encode($content1);
                    $dataMatch['content2'] = json_encode($content2);
                    DB::table('match_details')->insertOrIgnore($dataMatch);
                }
            }
        }

        // Ty so type = 2
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getBifenList');
        $data = $response->json();
        foreach ($data as $key => $value) {
            if($key == 'rows'){
                foreach ($value as $k => $v) {
                    $tour = DB::table('tournaments')->where('tour_name', '=', $v['typeName'])->first();
                    if (!empty($tour)) {
                        $tour_id = $tour->id;
                    } else {
                        $tour_id = DB::table('tournaments')->insertGetId( ['tour_name' => $v['typeName']] ); 
                    }
                    $dataMatch = array();
                    $dataMatch['typeMatch'] = '2';
                    $dataMatch['tournamentId'] = $tour_id;
                    $dataMatch['matchId'] = $v['matchId'];
                    $dataMatch['rowNo'] = $v['rowNo'];
                    $dataMatch['week'] = $v['week'];
                    $dataMatch['typeName'] = $v['typeName'];
                    $dataMatch['matchDate'] = $v['matchDate'];
                    $dataMatch['matchTime'] = $v['matchTime'];
                    $dataMatch['matchResult'] = $v['matchResult'];
                    $dataMatch['recPercent'] = $v['recPercent'];
                    $dataMatch['betRate'] = $v['betRate'];
                    $dataMatch['homeTeam'] = $v['homeTeam'];
                    $dataMatch['visitTeam'] = $v['visitTeam'];
                    $dataMatch['homeTeamNo'] = $v['homeTeamNo'];
                    $dataMatch['visitTeamNo'] = $v['visitTeamNo'];
                    $dataMatch['homeLogo'] = $v['homeLogo'];
                    $dataMatch['visitLogo'] = $v['visitLogo'];
                    $dataMatch['result1'] = $v['result1'];
                    $dataMatch['result2'] = $v['result2'];
                    $dataMatch['isOk'] = $v['isOk'];
                    $dataMatch['matchLong'] = $v['matchLong'];
                    $dataMatch['isCode'] = $v['isCode'];
                    $dataMatch['matchDesc'] = $v['matchDesc'];
                    $dataMatch['fixedNam'] = $v['fixedNam'];
                    DB::table('matchs')->insertOrIgnore($dataMatch);

                    $rs = DB::table('match_details')->where('matchId', $v['matchId'])->first();

                    if(empty($rs)){
                        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getDetailYcChartsInfo?rowNo='.$v['matchId']);
                        $content1 = $response->json();

                        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getDetailLeftLists?rowNo='.$v['matchId']);
                        $content2 = $response->json();

                        $dataMatch = array();
                        $dataMatch['matchId'] = $v['matchId'];
                        $dataMatch['content1'] = json_encode($content1);
                        $dataMatch['content2'] = json_encode($content2);
                        DB::table('match_details')->insertOrIgnore($dataMatch);
                    }
                }
            }
        }


        // Hiep 1 type = 3
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getBgcList');
        $data = $response->json();
        foreach ($data['rows'] as $index => $item) {
            foreach ($item['matchList'] as $k => $v) {
                $tour = DB::table('tournaments')->where('tour_name', '=', $v['typeName'])->first();
                if (!empty($tour)) {
                    $tour_id = $tour->id;
                } else {
                    $tour_id = DB::table('tournaments')->insertGetId( ['tour_name' => $v['typeName']] ); 
                }
                $dataMatch = array();
                $dataMatch['typeMatch'] = '3';
                $dataMatch['tournamentId'] = $tour_id;
                $dataMatch['matchId'] = $v['matchId'];
                $dataMatch['rowNo'] = $v['rowNo'];
                $dataMatch['week'] = $v['week'];
                $dataMatch['typeName'] = $v['typeName'];
                $dataMatch['matchDate'] = $v['matchDate'];
                $dataMatch['matchTime'] = $v['matchTime'];
                $dataMatch['matchResult'] = $v['matchResult'];
                $dataMatch['recPercent'] = $v['recPercent'];
                $dataMatch['betRate'] = $v['betRate'];
                $dataMatch['homeTeam'] = $v['homeTeam'];
                $dataMatch['visitTeam'] = $v['visitTeam'];
                $dataMatch['homeTeamNo'] = $v['homeTeamNo'];
                $dataMatch['visitTeamNo'] = $v['visitTeamNo'];
                $dataMatch['homeLogo'] = $v['homeLogo'];
                $dataMatch['visitLogo'] = $v['visitLogo'];
                $dataMatch['result1'] = $v['result1'];
                $dataMatch['result2'] = $v['result2'];
                $dataMatch['isOk'] = $v['isOk'];
                $dataMatch['matchLong'] = $v['matchLong'];
                $dataMatch['isCode'] = $v['isCode'];
                $dataMatch['matchDesc'] = $v['matchDesc'];
                $dataMatch['fixedNam'] = $v['fixedNam'];
                DB::table('matchs')->insertOrIgnore($dataMatch);

                $rs = DB::table('match_details')->where('matchId', $v['matchId'])->first();

                if(empty($rs)){
                    $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getDetailYcChartsInfo?rowNo='.$v['matchId']);
                    $content1 = $response->json();

                    $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getDetailLeftLists?rowNo='.$v['matchId']);
                    $content2 = $response->json();

                    $dataMatch = array();
                    $dataMatch['matchId'] = $v['matchId'];
                    $dataMatch['content1'] = json_encode($content1);
                    $dataMatch['content2'] = json_encode($content2);
                    DB::table('match_details')->insertOrIgnore($dataMatch);
                }
            }
        }


        // Ty so type = 4
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getSaikuangList');
        $data = $response->json();
        foreach ($data as $key => $value) {
            if($key == 'rows'){
                foreach ($value as $k => $v) {
                    $tour = DB::table('tournaments')->where('tour_name', '=', $v['typeName'])->first();
                    if (!empty($tour)) {
                        $tour_id = $tour->id;
                    } else {
                        $tour_id = DB::table('tournaments')->insertGetId( ['tour_name' => $v['typeName']] ); 
                    }
                    $dataMatch = array();
                    $dataMatch['typeMatch'] = '4';
                    $dataMatch['tournamentId'] = $tour_id;
                    $dataMatch['matchId'] = $v['matchId'];
                    $dataMatch['rowNo'] = $v['rowNo'];
                    $dataMatch['week'] = $v['week'];
                    $dataMatch['typeName'] = $v['typeName'];
                    $dataMatch['matchDate'] = $v['matchDate'];
                    $dataMatch['matchTime'] = $v['matchTime'];
                    $dataMatch['matchResult'] = $v['matchResult'];
                    $dataMatch['recPercent'] = $v['recPercent'];
                    $dataMatch['betRate'] = $v['betRate'];
                    $dataMatch['homeTeam'] = $v['homeTeam'];
                    $dataMatch['visitTeam'] = $v['visitTeam'];
                    $dataMatch['homeTeamNo'] = $v['homeTeamNo'];
                    $dataMatch['visitTeamNo'] = $v['visitTeamNo'];
                    $dataMatch['homeLogo'] = $v['homeLogo'];
                    $dataMatch['visitLogo'] = $v['visitLogo'];
                    $dataMatch['result1'] = $v['result1'];
                    $dataMatch['result2'] = $v['result2'];
                    $dataMatch['isOk'] = $v['isOk'];
                    $dataMatch['matchLong'] = $v['matchLong'];
                    $dataMatch['isCode'] = $v['isCode'];
                    $dataMatch['matchDesc'] = $v['matchDesc'];
                    $dataMatch['fixedNam'] = $v['fixedNam'];
                    DB::table('matchs')->insertOrIgnore($dataMatch);

                    $rs = DB::table('match_details')->where('matchId', $v['matchId'])->first();

                    if(empty($rs)){
                        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getDetailYcChartsInfo?rowNo='.$v['matchId']);
                        $content1 = $response->json();

                        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getDetailLeftLists?rowNo='.$v['matchId']);
                        $content2 = $response->json();

                        $dataMatch = array();
                        $dataMatch['matchId'] = $v['matchId'];
                        $dataMatch['content1'] = json_encode($content1);
                        $dataMatch['content2'] = json_encode($content2);
                        DB::table('match_details')->insertOrIgnore($dataMatch);
                    }
                }
            }
        }
       
        return 0;
    }
}