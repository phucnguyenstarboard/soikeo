<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GoogleTranslate;
use DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function getSdtjList (Request $request) {
        $rs = DB::table('matchs')->join('tournaments', 'matchs.tournamentId', '=', 'tournaments.id')->where('typeMatch', '7')->get();
        $arrData = array();
        foreach ($rs as $item) {
            $v = array();
            $v['matchId'] = $item->matchId;
            $v['rowNo'] = $item->rowNo;
            $v['week'] = $item->week;
            $v['typeName'] = !empty($item->tour_name_edit) ? $item->tour_name_edit : $item->typeName;
            $v['matchDate'] = $item->matchDate;
            $v['matchTime'] = $item->matchTime;
            $v['matchResult'] = $item->matchResult;
            $v['recPercent'] = $item->recPercent;
            $v['betRate'] = $item->betRate;
            $v['homeTeam'] = $item->homeTeam;
            $v['visitTeam'] = $item->visitTeam;
            $v['homeTeamNo'] = $item->homeTeamNo;
            $v['visitTeamNo'] = $item->visitTeamNo;
            $v['homeLogo'] = $item->homeLogo;
            $v['visitLogo'] = $item->visitLogo;
            $v['result1'] = $item->result1;
            $v['result2'] = $item->result2;
            $v['isOk'] = $item->isOk;
            $v['matchLong'] = $item->matchLong;
            $v['isCode'] = $item->isCode;
            $v['matchDesc'] = $item->matchDesc;
            $v['fixedNam'] = $item->fixedNam;
            $arrData[] = $v;
        }
        $data['rows'] = $arrData;
        if(isset($data['rows'])){
            foreach ($data['rows'] as $i => $itemA) { 
                $t = isset($data['rows'][$i]['mode']) ? $data['rows'][$i]['mode'] : '';
                $t = substr($t, 0, strpos( $t, '串', 0));
                $data['rows'][$i]['mode'] = str_replace('全场','Toàn trận xiên ', $t);;

                $bbb = isset($data['rows'][$i]['matchStatus']) ? $data['rows'][$i]['matchStatus'] : '';
                $bbb = str_replace('已中奖','Đã thắng',$bbb);
                $bbb = str_replace('小时后截止购买',' cược đã kết thúc',$bbb);
                $data['rows'][$i]['matchStatus'] = str_replace('未中奖','Đã thua',$bbb);

                foreach ($data['rows'][$i]['matchList'] as $k => $v) {
                    $bbb = $data['rows'][$i]['matchList'][$k]['matchResult'];
                    $bbb = str_replace('胜','Thắng',$bbb);
                    $data['rows'][$i]['matchList'][$k]['matchResult'] = str_replace('负','Thua',$bbb);
                }
            }
        }
        return $data;
    }

    public function getWdList (Request $request) {
        $rs = DB::table('matchs')->join('tournaments', 'matchs.tournamentId', '=', 'tournaments.id')->where('typeMatch', '6')->get();
        $arrData = array();
        foreach ($rs as $item) {
            $v = array();
            $v['matchId'] = $item->matchId;
            $v['rowNo'] = $item->rowNo;
            $v['week'] = $item->week;
            $v['typeName'] = !empty($item->tour_name_edit) ? $item->tour_name_edit : $item->typeName;
            $v['matchDate'] = $item->matchDate;
            $v['matchTime'] = $item->matchTime;
            $v['matchResult'] = $item->matchResult;
            $v['recPercent'] = $item->recPercent;
            $v['betRate'] = $item->betRate;
            $v['homeTeam'] = $item->homeTeam;
            $v['visitTeam'] = $item->visitTeam;
            $v['homeTeamNo'] = $item->homeTeamNo;
            $v['visitTeamNo'] = $item->visitTeamNo;
            $v['homeLogo'] = $item->homeLogo;
            $v['visitLogo'] = $item->visitLogo;
            $v['result1'] = $item->result1;
            $v['result2'] = $item->result2;
            $v['isOk'] = $item->isOk;
            $v['matchLong'] = $item->matchLong;
            $v['isCode'] = $item->isCode;
            $v['matchDesc'] = $item->matchDesc;
            $v['fixedNam'] = $item->fixedNam;
            $arrData[] = $v;
        }
        $data['rows'][0]['matchList'] = $arrData;
        return $data;
    }

    public function getAllMatchList (Request $request) {
        $rs = DB::table('matchs')->join('tournaments', 'matchs.tournamentId', '=', 'tournaments.id')->where('typeMatch', '0')->get();
        $arrData = array();
        foreach ($rs as $item) {
            $v = array();
            $v['matchId'] = $item->matchId;
            $v['rowNo'] = $item->rowNo;
            $v['week'] = $item->week;
            $v['typeName'] = !empty($item->tour_name_edit) ? $item->tour_name_edit : $item->typeName;;
            $v['matchDate'] = $item->matchDate;
            $v['matchTime'] = $item->matchTime;
            $v['matchResult'] = $item->matchResult;
            $v['recPercent'] = $item->recPercent;
            $v['betRate'] = $item->betRate;
            $v['homeTeam'] = $item->homeTeam;
            $v['visitTeam'] = $item->visitTeam;
            $v['homeTeamNo'] = $item->homeTeamNo;
            $v['visitTeamNo'] = $item->visitTeamNo;
            $v['homeLogo'] = $item->homeLogo;
            $v['visitLogo'] = $item->visitLogo;
            $v['result1'] = $item->result1;
            $v['result2'] = $item->result2;
            $v['isOk'] = $item->isOk;
            $v['matchLong'] = $item->matchLong;
            $v['isCode'] = $item->isCode;
            $v['matchDesc'] = $item->matchDesc;
            $v['fixedNam'] = $item->fixedNam;
            $arrData[] = $v;
        }
        $data['rows'] = $arrData;
        return $data;
    }

    public function getBgcList (Request $request) {
        $rs = DB::table('matchs')->join('tournaments', 'matchs.tournamentId', '=', 'tournaments.id')->where('typeMatch', '3')->get();
        $arrData = array();
        foreach ($rs as $item) {
            $v = array();
            $v['matchId'] = $item->matchId;
            $v['rowNo'] = $item->rowNo;
            $v['week'] = $item->week;
            $v['typeName'] = !empty($item->tour_name_edit) ? $item->tour_name_edit : $item->typeName;;
            $v['matchDate'] = $item->matchDate;
            $v['matchTime'] = $item->matchTime;
            $v['matchResult'] = $item->matchResult;
            $v['recPercent'] = $item->recPercent;
            $v['betRate'] = $item->betRate;
            $v['homeTeam'] = $item->homeTeam;
            $v['visitTeam'] = $item->visitTeam;
            $v['homeTeamNo'] = $item->homeTeamNo;
            $v['visitTeamNo'] = $item->visitTeamNo;
            $v['homeLogo'] = $item->homeLogo;
            $v['visitLogo'] = $item->visitLogo;
            $v['result1'] = $item->result1;
            $v['result2'] = $item->result2;
            $v['isOk'] = $item->isOk;
            $v['matchLong'] = $item->matchLong;
            $v['isCode'] = $item->isCode;
            $v['matchDesc'] = $item->matchDesc;
            $v['fixedNam'] = $item->fixedNam;
            $arrData[] = $v;
        }
        $data['rows'][0]['matchList'] = $arrData;
        return $data;
    }

    public function getBifenList (Request $request) {
        $rs = DB::table('matchs')->join('tournaments', 'matchs.tournamentId', '=', 'tournaments.id')->where('typeMatch', '2')->get();
        $arrData = array();
        foreach ($rs as $item) {
            $v = array();
            $v['matchId'] = $item->matchId;
            $v['rowNo'] = $item->rowNo;
            $v['week'] = $item->week;
            $v['typeName'] = !empty($item->tour_name_edit) ? $item->tour_name_edit : $item->typeName;;
            $v['matchDate'] = $item->matchDate;
            $v['matchTime'] = $item->matchTime;
            $v['matchResult'] = $item->matchResult;
            $v['recPercent'] = $item->recPercent;
            $v['betRate'] = $item->betRate;
            $v['homeTeam'] = $item->homeTeam;
            $v['visitTeam'] = $item->visitTeam;
            $v['homeTeamNo'] = $item->homeTeamNo;
            $v['visitTeamNo'] = $item->visitTeamNo;
            $v['homeLogo'] = $item->homeLogo;
            $v['visitLogo'] = $item->visitLogo;
            $v['result1'] = $item->result1;
            $v['result2'] = $item->result2;
            $v['isOk'] = $item->isOk;
            $v['matchLong'] = $item->matchLong;
            $v['isCode'] = $item->isCode;
            $v['matchDesc'] = $item->matchDesc;
            $v['fixedNam'] = $item->fixedNam;
            $arrData[] = $v;
        }
        $data['rows'] = $arrData;
        return $data;
    }

    public function getQcList (Request $request) {
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getQcList');
        return $response->json();
    }

    public function getSaikuangList (Request $request) {
        $rs = DB::table('matchs')->join('tournaments', 'matchs.tournamentId', '=', 'tournaments.id')->where('typeMatch', '4')->get();
        $arrData = array();
        foreach ($rs as $item) {
            $v = array();
            $v['matchId'] = $item->matchId;
            $v['rowNo'] = $item->rowNo;
            $v['week'] = $item->week;
            $v['typeName'] = $item->typeName;
            $v['matchDate'] = $item->matchDate;
            $v['matchTime'] = $item->matchTime;
            $v['matchResult'] = $item->matchResult;
            $v['recPercent'] = $item->recPercent;
            $v['betRate'] = $item->betRate;
            $v['homeTeam'] = $item->homeTeam;
            $v['visitTeam'] = $item->visitTeam;
            $v['homeTeamNo'] = $item->homeTeamNo;
            $v['visitTeamNo'] = $item->visitTeamNo;
            $v['homeLogo'] = $item->homeLogo;
            $v['visitLogo'] = $item->visitLogo;
            $v['result1'] = $item->result1;
            $v['result2'] = $item->result2;
            $v['isOk'] = $item->isOk;
            $v['matchLong'] = $item->matchLong;
            $v['isCode'] = $item->isCode;
            $v['matchDesc'] = $item->matchDesc;
            $v['fixedNam'] = $item->fixedNam;
            $arrData[] = $v;
        }
        $data['rows'] = $arrData;
        $i = 0;
        foreach ($data as $key => $value) {
            if($key == 'rows'){
                foreach ($value as $k => $v) {
                    $txt = $data[$key][$k]['matchResult'];
                    $txt = str_replace('胜', 'Thắng', $txt);
                    $txt = str_replace('平', 'Hoà', $txt);
                    $txt = str_replace('负', 'Thua', $txt);
                    $data[$key][$k]['matchResult']= $txt;
                }
            }
        }
        return $data;
    }

    public function getGaoBeiList (Request $request) {
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getGaoBeiList');
        return $response->json();
    }

    public function getDetailYcChartsInfo (Request $request) {
        $matchNo = $request->input('rowNo');
        $rs = DB::table('match_details')->where('matchId', $matchNo)->first();
        $data = json_decode($rs->content1, true);
        return $data;
    }

    public function getDetailLeftLists (Request $request) {
        $matchNo = $request->input('rowNo');
        $rs = DB::table('match_details')->where('matchId', $matchNo)->first();
        $data = json_decode($rs->content2, true);
        return $data;
    }    

    public function detail (Request $request) {
        $id = $request->input('id');
        $item = DB::table('matchs')->join('tournaments', 'matchs.tournamentId', '=', 'tournaments.id')->where('matchId', $id)->first();
        return view('detail' , compact('id', 'item'));
    }

    private function __translateText ($text, $lang) {
      $text   = mb_convert_encoding($text, "UTF-8", "ASCII,JIS,UTF-8,EUC-JP,SJIS");
      return ucfirst(GoogleTranslate::trans($text, $lang ));
    }

    private function __getListTextTranslateDB(){
        $texts = DB::table('translate_texts')->get();
        $data = array();
        foreach ($texts as $key => $value) {
            $data[$value->text_original] = $value->text_translate;
        }

        return $data;
    }

    public function index(Request $request)
    {
        $path = "http://www.woxiangwan.com/app/img/no_club_logo.jpg";
        $arr_path = explode('/', $path);
        $filename = end($arr_path);
        Storage::disk('local2')->put($filename, file_get_contents($path));
    }
}
