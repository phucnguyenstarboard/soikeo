<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB; 
use Illuminate\Support\Facades\Storage;
use GoogleTranslate;

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
                    $this->__processData($v, '0');
                }
            }
        }

        // All type = 6
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getWdList');
        $data = $response->json();
        foreach ($data['rows'][0]['matchList'] as $k => $v) {
            $this->__processData($v, '6');
        }

        // All type = 7
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getSdtjList');
        $data = $response->json();
        foreach ($data['rows'] as $index => $item) {
            foreach ($item['matchList'] as $k => $v) {
                $this->__processData($v, '7');
            }
        }

        // Ty so type = 2
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getBifenList');
        $data = $response->json();
        foreach ($data as $key => $value) {
            if($key == 'rows'){
                foreach ($value as $k => $v) {
                    $this->__processData($v, '2');
                }
            }
        }


        // Hiep 1 type = 3
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getBgcList');
        $data = $response->json();
        foreach ($data['rows'] as $index => $item) {
            foreach ($item['matchList'] as $k => $v) {
                $this->__processData($v, '3');
            }
        }


        // Ty so type = 4
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getSaikuangList');
        $data = $response->json();
        foreach ($data as $key => $value) {
            if($key == 'rows'){
                foreach ($value as $k => $v) {
                    $this->__processData($v, '4');
                }
            }
        }
       
        return 0;
    }

    private function __processData($v, $typeMatch) {
        $matchId = $v['matchId'];
        $match = DB::table('matchs')->where('matchId', '=', $matchId)->where('typeMatch', '=', $typeMatch)->first();
        if (empty($match)) {
            $tour = DB::table('tournaments')->where('tour_name', '=', $v['typeName'])->first();
            if (!empty($tour)) {
                $tour_id = $tour->id;
            } else {
                $tour_id = DB::table('tournaments')->insertGetId( ['tour_name' => $v['typeName']] ); 
            }

            $url="http://www.zucaijia.cn/zcj/jincai/detail?flag=0&rowNo=".$matchId;
            $html = file_get_contents($url);

            $doc = new \DOMDocument();
            @$doc->loadHTML($html);
            $tags = $doc->getElementsByTagName('img');
            $logo_team_home = '';
            $logo_team_visit = '';
            foreach ($tags as $tag) {
                $imgSrc = $tag->getAttribute('src');
                if (str_contains($imgSrc, 'woxiangwan.com')) {
                    if(empty($logo_team_home)){
                        $logo_team_home = $imgSrc;
                        $path = $logo_team_home;
                        $arr_path = explode('/', $path);
                        $logo_team_home = end($arr_path);
                        Storage::disk('local2')->put($logo_team_home, file_get_contents($path));
                    }else{
                        $logo_team_visit = $imgSrc;
                        $path = $logo_team_visit;
                        $arr_path = explode('/', $path);
                        $logo_team_visit = end($arr_path);
                        Storage::disk('local2')->put($logo_team_visit, file_get_contents($path));
                    }
                }
            }
            $matchLong = $v['matchLong'];
            if (!empty($v['matchLong']) && $v['matchLong'] != '未' && $v['matchLong'] != '完') {
                $matchLong = $this->__translateText($v['matchLong'], 'vi');
            }

            $matchResult = $v['matchResult'];
            if ($typeMatch == '3') {
                $matchResult = $this->__translateText($v['matchResult'], 'vi');
            }

            $betRate = $v['betRate'];
            $matchDesc = $v['matchDesc'];
            if ($typeMatch == '4') {
                $betRate = $this->__translateText($v['betRate'], 'vi');
                $matchDesc = $this->__translateText($v['matchDesc'], 'vi');
            }            

            $dataMatch = array();
            $dataMatch['typeMatch'] = $typeMatch;
            $dataMatch['tournamentId'] = $tour_id;
            $dataMatch['matchId'] = $matchId;
            $dataMatch['rowNo'] = $this->__rowNo($v['rowNo']);
            $dataMatch['week'] = $v['week'];
            $dataMatch['typeName'] = $this->__translateText($v['typeName'], 'vi');
            $dataMatch['matchDate'] = $v['matchDate'];
            $dataMatch['matchTime'] = $v['matchTime'];
            $dataMatch['matchResult'] = $matchResult;
            $dataMatch['recPercent'] = $v['recPercent'];
            $dataMatch['betRate'] = $betRate;
            $dataMatch['homeTeam'] = $this->__translateText($v['homeTeam'], 'en');
            $dataMatch['visitTeam'] = $this->__translateText($v['visitTeam'], 'en');
            $dataMatch['homeTeamNo'] = $v['homeTeamNo'];
            $dataMatch['visitTeamNo'] = $v['visitTeamNo'];
            $dataMatch['homeLogo'] =  $logo_team_home;
            $dataMatch['visitLogo'] = $logo_team_visit;
            $dataMatch['result1'] = $v['result1'];
            $dataMatch['result2'] = $v['result2'];
            $dataMatch['isOk'] = $v['isOk'];
            $dataMatch['matchLong'] = $matchLong;
            $dataMatch['isCode'] = $v['isCode'];
            $dataMatch['matchDesc'] = $matchDesc;
            $dataMatch['fixedNam'] = $v['fixedNam'];
            DB::table('matchs')->insertOrIgnore($dataMatch);


            $rs = DB::table('match_details')->where('matchId', $matchId)->first();

            if(empty($rs)){
                $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getDetailYcChartsInfo?rowNo='.$matchId);
                $data = $response->json();

                foreach ($data as $key => $value) {
                    if($key == 'bilvList' && !empty($value)){
                        $data[$key][0]['title'] = 'Thắng';
                        $data[$key][1]['title'] = 'Hoà';
                        $data[$key][2]['title'] = 'Thua';
                    }

                    if($key == 'analyInfo' && !empty($value)){               

                        $a = !empty($data[$key]['keyNote']) ? strip_tags($data[$key]['keyNote']) : '';
                        $a = str_replace('•', '', $a);
                        $data[$key]['keyNote'] = !empty($a) ? $this->__translateText($a, 'vi') : '';

                        $a = !empty($data[$key]['winReason']) ? strip_tags($data[$key]['winReason']) : '';
                        $a = str_replace('•', '', $a);
                        $data[$key]['winReason'] = !empty($a) ? $this->__translateText($a, 'vi') : '';

                        $a = !empty($data[$key]['drawReason']) ? strip_tags($data[$key]['drawReason']) : '';
                        $a = str_replace('•', '', $a);
                        $data[$key]['drawReason'] = !empty($a) ? $this->__translateText($a, 'vi') : '';

                        $a = !empty($data[$key]['loseReason']) ? strip_tags($data[$key]['loseReason']) : '';
                        $a = str_replace('•', '', $a);
                        $data[$key]['loseReason'] = !empty($a) ? $this->__translateText($a, 'vi') : '';

                        $a = !empty($data[$key]['halfWholeReason']) ? strip_tags($data[$key]['halfWholeReason']) : '';
                        $a = str_replace('•', '', $a);
                        $data[$key]['halfWholeReason'] = !empty($a) ? $this->__translateText($a, 'vi') : '';

                        $a = !empty($data[$key]['halfWholeResult']) ? strip_tags($data[$key]['halfWholeResult']) : '';
                        $a = str_replace('•', '', $a);
                        $data[$key]['halfWholeResult'] = !empty($a) ? $this->__translateText($a, 'vi') : '';


                        $data[$key]['winner'] = !empty($data[$key]['winner']) ? $this->__translateText($data[$key]['winner'], 'vi') : '';

                    }
                }

                $content1 = $data;

                $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getDetailLeftLists?rowNo='.$matchId);
                $data = $response->json();
                foreach ($data as $key => $value) {
                    if($key == 'duList' && !empty($value)){
                        $data[$key][0]['teamName'] = 'Tỷ lệ cược';
                        $data[$key][1]['teamName'] = '(Đội nhà)';
                        $data[$key][2]['teamName'] = 'Tỷ lệ cược';
                        $data[$key][3]['teamName'] = '(Đội khách)';
                    }

                    if($key == 'tecStacLeftList' && !empty($value)){
                        $data[$key][0]['type'] = 'Tấn công';
                        $data[$key][1]['type'] = 'Tấn công nguy hiểm';
                        $data[$key][2]['type'] = 'Sút';
                        $data[$key][3]['type'] = 'Sút trúng mục tiêu';
                        $data[$key][4]['type'] = 'Phạt góc';
                        $data[$key][5]['type'] = 'Kiểm soát bóng';
                    }

                    if($key == 'zhanjiRow' && !empty($value)){
                        foreach ($value as $k => $v) {
                            $txt = str_replace('主队', '', $v);
                            $txt = str_replace('主场', '', $txt);
                            $txt = str_replace('客队', '', $txt);
                            $txt = str_replace('客场', '', $txt);

                            $txt = str_replace('胜', 'Thắng', $txt);
                            $txt = str_replace('平', 'Hoà', $txt);
                            $txt = str_replace('负', 'Thua', $txt);
                            $data[$key][$k] = $txt;
                        }
                    }
                }

                $content2 = $data;

                $dataMatch = array();
                $dataMatch['matchId'] = $matchId;
                $dataMatch['content1'] = json_encode($content1);
                $dataMatch['content2'] = json_encode($content2);
                DB::table('match_details')->insertOrIgnore($dataMatch);
            }
        }
    }

    private function __translateText ($text, $lang) {
      $text   = mb_convert_encoding($text, "UTF-8", "ASCII,JIS,UTF-8,EUC-JP,SJIS");
      return ucfirst(GoogleTranslate::trans($text, $lang ));
    }

    private function __rowNo($text){
        $txt = str_replace('周一', 'Thứ hai', $text);
        $txt = str_replace('周二', 'Thứ ba', $txt);
        $txt = str_replace('周三', 'Thứ tư', $txt);
        $txt = str_replace('周四', 'Thứ năm', $txt);
        $txt = str_replace('周五', 'Thứ sáu', $txt);
        $txt = str_replace('周六', 'Thứ bảy', $txt);
        $txt = str_replace('周日', 'Chủ nhật', $txt);
        return $txt;
    }
}
