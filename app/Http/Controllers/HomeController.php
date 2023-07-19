<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GoogleTranslate;
use DB;

class HomeController extends Controller
{
    public function getSdtjList (Request $request) {
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getSdtjList');
        $data = $response->json();
        $keyListExist = array();
        $textList = $this->__getListTextTranslateDB();
        $dataInsert = array();

        if(isset($data['rows'])){
            foreach ($data['rows'] as $i => $itemA) {    
                $t = $data['rows'][$i]['mode'];
                $t = substr($t, 0, strpos( $t, '串', 0));
                $data['rows'][$i]['mode'] = str_replace('全场','Toàn trận xiên ', $t);;

                $bbb = $data['rows'][$i]['matchStatus'];
                $bbb = str_replace('已中奖','Đã thắng',$bbb);
                $bbb = str_replace('小时后截止购买',' cược đã kết thúc',$bbb);                
                $data['rows'][$i]['matchStatus'] = str_replace('未中奖','Đã thua',$bbb);

                foreach ($data['rows'][$i]['matchList'] as $k => $v) {
                    $bbb = $data['rows'][$i]['matchList'][$k]['matchResult'];
                    $bbb = str_replace('胜','Thắng',$bbb);
                    $data['rows'][$i]['matchList'][$k]['matchResult'] = str_replace('负','Thua',$bbb);

                    if (!empty($v['typeName'])){
                        if (isset($textList[$v['typeName']]) || in_array($v['typeName'], $keyListExist)){
                            $data['rows'][$i]['matchList'][$k]['typeName'] = $textList[$v['typeName']];
                        }else{
                            $t = $this->__translateText($v['typeName'], 'vi');
                            $data['rows'][$i]['matchList'][$k]['typeName'] = $t;
                            $textList[$v['typeName']] = $t;

                            $keyListExist[] = $v['typeName'];

                            $textInsert = array();
                            $textInsert['text_original'] = $v['typeName'];
                            $textInsert['text_translate'] = $t;
                            $dataInsert[] = $textInsert;
                        }

                        $tour = DB::table('tournaments')->where('tour_name', '=', $data['rows'][$i]['matchList'][$k]['typeName'])->first();
                        if (!empty($tour)) {
                            if (!empty($tour->tour_name_edit)) {
                                $data['rows'][$i]['matchList'][$k]['typeName'] = $tour->tour_name_edit;
                            }
                        } else {
                            DB::table('tournaments')->insertOrIgnore( ['tour_name' => $data['rows'][$i]['matchList'][$k]['typeName']] ); 
                        }
                    }

                    if (!empty($v['homeTeam'])){
                        if (isset($textList[$v['homeTeam']]) || in_array($v['homeTeam'], $keyListExist)){
                            $data['rows'][$i]['matchList'][$k]['homeTeam'] = $textList[$v['homeTeam']];
                        }else{
                            $t = $this->__translateText($v['homeTeam'], 'en');
                            $data['rows'][$i]['matchList'][$k]['homeTeam'] = $t;
                            $textList[$v['homeTeam']] = $t;

                            $keyListExist[] = $v['homeTeam'];

                            $textInsert = array();
                            $textInsert['text_original'] = $v['homeTeam'];
                            $textInsert['text_translate'] = $t;
                            $dataInsert[] = $textInsert;
                        }
                    }

                    if (!empty($v['visitTeam'])){
                        if (isset($textList[$v['visitTeam']]) || in_array($v['visitTeam'], $keyListExist)){
                            $data['rows'][$i]['matchList'][$k]['visitTeam'] = $textList[$v['visitTeam']];
                        }else{
                            $t = $this->__translateText($v['visitTeam'], 'en');
                            $data['rows'][$i]['matchList'][$k]['visitTeam'] = $t;
                            $textList[$v['visitTeam']] = $t;

                            $keyListExist[] = $v['visitTeam'];

                            $textInsert = array();
                            $textInsert['text_original'] = $v['visitTeam'];
                            $textInsert['text_translate'] = $t;
                            $dataInsert[] = $textInsert;
                        }
                    }
                }
            }
        }

        

        return $data;
    }

    public function getWdList (Request $request) {
        $rs = DB::table('matchs')->where('typeMatch', '6')->get();
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
        $data['rows'][0]['matchList'] = $arrData;

        $keyListExist = array();
        $textList = $this->__getListTextTranslateDB();
        $dataInsert = array();
        foreach ($data['rows'][0]['matchList'] as $k => $v) {

            if (!empty($v['typeName'])){
                if (isset($textList[$v['typeName']]) || in_array($v['typeName'], $keyListExist)){
                    $data['rows'][0]['matchList'][$k]['typeName'] = $textList[$v['typeName']];
                }else{
                    $t = $this->__translateText($v['typeName'], 'vi');
                    $data['rows'][0]['matchList'][$k]['typeName'] = $t;
                    $textList[$v['typeName']] = $t;

                    $keyListExist[] = $v['typeName'];

                    $textInsert = array();
                    $textInsert['text_original'] = $v['typeName'];
                    $textInsert['text_translate'] = $t;
                    $dataInsert[] = $textInsert;
                }
            }

            if (!empty($v['homeTeam'])){
                if (isset($textList[$v['homeTeam']]) || in_array($v['homeTeam'], $keyListExist)){
                    $data['rows'][0]['matchList'][$k]['homeTeam'] = $textList[$v['homeTeam']];
                }else{
                    $t = $this->__translateText($v['homeTeam'], 'en');
                    $data['rows'][0]['matchList'][$k]['homeTeam'] = $t;
                    $textList[$v['homeTeam']] = $t;

                    $keyListExist[] = $v['homeTeam'];

                    $textInsert = array();
                    $textInsert['text_original'] = $v['homeTeam'];
                    $textInsert['text_translate'] = $t;
                    $dataInsert[] = $textInsert;
                }
            }

            if (!empty($v['visitTeam'])){
                if (isset($textList[$v['visitTeam']]) || in_array($v['visitTeam'], $keyListExist)){
                    $data['rows'][0]['matchList'][$k]['visitTeam'] = $textList[$v['visitTeam']];
                }else{
                    $t = $this->__translateText($v['visitTeam'], 'en');
                    $data['rows'][0]['matchList'][$k]['visitTeam'] = $t;
                    $textList[$v['visitTeam']] = $t;

                    $keyListExist[] = $v['visitTeam'];

                    $textInsert = array();
                    $textInsert['text_original'] = $v['visitTeam'];
                    $textInsert['text_translate'] = $t;
                    $dataInsert[] = $textInsert;
                }
            }
        }

        if (!empty($dataInsert)) {
            DB::table('translate_texts')->insertOrIgnore($dataInsert);
        }

        return $data;
    }

    public function getAllMatchList (Request $request) {
        $rs = DB::table('matchs')->where('typeMatch', '0')->get();
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

        $keyListExist = array();
        $textList = $this->__getListTextTranslateDB();
        $dataInsert = array();
        $i = 0;
        foreach ($data as $key => $value) {
            if($key == 'rows'){
                foreach ($value as $k => $v) {
                    if (!empty($v['homeTeam'])) {
                        if (isset($textList[$v['homeTeam']]) || in_array($v['homeTeam'], $keyListExist)) {
                            $data[$key][$k]['homeTeam'] = $textList[$v['homeTeam']];
                        }else{
                            $t = $this->__translateText($v['homeTeam'], 'en');
                            $data[$key][$k]['homeTeam'] = $t;
                            $textList[$v['homeTeam']] = $t;

                            $keyListExist[] = $v['homeTeam'];

                            $textInsert = array();
                            $textInsert['text_original'] = $v['homeTeam'];
                            $textInsert['text_translate'] = $t;
                            $dataInsert[] = $textInsert;
                        }
                    }

                    if (!empty($v['visitTeam'])) {
                        if (isset($textList[$v['visitTeam']]) || in_array($v['visitTeam'], $keyListExist)) {
                            $data[$key][$k]['visitTeam'] = $textList[$v['visitTeam']];
                        }else{
                            $t = $this->__translateText($v['visitTeam'], 'en');
                            $data[$key][$k]['visitTeam'] = $t;
                            $textList[$v['visitTeam']] = $t;

                            $keyListExist[] = $v['visitTeam'];

                            $textInsert = array();
                            $textInsert['text_original'] = $v['visitTeam'];
                            $textInsert['text_translate'] = $t;
                            $dataInsert[] = $textInsert;
                        }
                    }

                    if (!empty($v['matchLong']) && $v['matchLong'] != '未' && $v['matchLong'] != '完') {
                        if (isset($textList[$v['matchLong']]) || in_array($v['matchLong'], $keyListExist)) {
                            $data[$key][$k]['matchLong'] = $textList[$v['matchLong']];
                        }else{
                            $t = $this->__translateText($v['matchLong'], 'vi');
                            $data[$key][$k]['matchLong'] = $t;
                            $textList[$v['matchLong']] = $t;

                            $keyListExist[] = $v['matchLong'];

                            $textInsert = array();
                            $textInsert['text_original'] = $v['matchLong'];
                            $textInsert['text_translate'] = $t;
                            $dataInsert[] = $textInsert;
                        }
                    }

                    if (!empty($v['typeName'])) {
                        if (isset($textList[$v['typeName']]) || in_array($v['typeName'], $keyListExist)) {
                            $data[$key][$k]['typeName'] = $textList[$v['typeName']];
                        }else{
                            $t = $this->__translateText($v['typeName'], 'vi');
                            $data[$key][$k]['typeName'] = $t;
                            $textList[$v['typeName']] = $t;

                            $keyListExist[] = $v['typeName'];

                            $textInsert = array();
                            $textInsert['text_original'] = $v['typeName'];
                            $textInsert['text_translate'] = $t;
                            $dataInsert[] = $textInsert;
                        }
                    }
                }
            }
        }

        if (!empty($dataInsert)) {
            DB::table('translate_texts')->insertOrIgnore($dataInsert);
        }

        return $data;
    }

    public function getBgcList (Request $request) {
        $rs = DB::table('matchs')->where('typeMatch', '3')->get();
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
        $data['rows'][0]['matchList'] = $arrData;
        $keyListExist = array();
        $textList = $this->__getListTextTranslateDB();
        $dataInsert = array();
        foreach ($data['rows'][0]['matchList'] as $k => $v) {

            if (!empty($v['matchResult'])){
                if (isset($textList[$v['matchResult']]) || in_array($v['matchResult'], $keyListExist)){
                    $data['rows'][0]['matchList'][$k]['matchResult'] = $textList[$v['matchResult']];
                }else{
                    $t = $this->__translateText($v['matchResult'], 'vi');
                    $data['rows'][0]['matchList'][$k]['matchResult'] = $t;
                    $textList[$v['matchResult']] = $t;

                    $keyListExist[] = $v['matchResult'];

                    $textInsert = array();
                    $textInsert['text_original'] = $v['matchResult'];
                    $textInsert['text_translate'] = $t;
                    $dataInsert[] = $textInsert;
                }
            }            

            if (!empty($v['typeName'])){
                if (isset($textList[$v['typeName']]) || in_array($v['typeName'], $keyListExist)){
                    $data['rows'][0]['matchList'][$k]['typeName'] = $textList[$v['typeName']];
                }else{
                    $t = $this->__translateText($v['typeName'], 'vi');
                    $data['rows'][0]['matchList'][$k]['typeName'] = $t;
                    $textList[$v['typeName']] = $t;

                    $keyListExist[] = $v['typeName'];

                    $textInsert = array();
                    $textInsert['text_original'] = $v['typeName'];
                    $textInsert['text_translate'] = $t;
                    $dataInsert[] = $textInsert;
                }

                $tour = DB::table('tournaments')->where('tour_name', '=', $data['rows'][0]['matchList'][$k]['typeName'])->first();
                if (!empty($tour)) {
                    if (!empty($tour->tour_name_edit)) {
                        $data['rows'][0]['matchList'][$k]['typeName'] = $tour->tour_name_edit;
                    }
                } else {
                    DB::table('tournaments')->insertOrIgnore( ['tour_name' => $data['rows'][0]['matchList'][$k]['typeName']] ); 
                }
            }

            if (!empty($v['homeTeam'])){
                if (isset($textList[$v['homeTeam']]) || in_array($v['homeTeam'], $keyListExist)){
                    $data['rows'][0]['matchList'][$k]['homeTeam'] = $textList[$v['homeTeam']];
                }else{
                    $t = $this->__translateText($v['homeTeam'], 'en');
                    $data['rows'][0]['matchList'][$k]['homeTeam'] = $t;
                    $textList[$v['homeTeam']] = $t;

                    $keyListExist[] = $v['homeTeam'];

                    $textInsert = array();
                    $textInsert['text_original'] = $v['homeTeam'];
                    $textInsert['text_translate'] = $t;
                    $dataInsert[] = $textInsert;
                }
            }

            if (!empty($v['visitTeam'])){
                if (isset($textList[$v['visitTeam']]) || in_array($v['visitTeam'], $keyListExist)){
                    $data['rows'][0]['matchList'][$k]['visitTeam'] = $textList[$v['visitTeam']];
                }else{
                    $t = $this->__translateText($v['visitTeam'], 'en');
                    $data['rows'][0]['matchList'][$k]['visitTeam'] = $t;
                    $textList[$v['visitTeam']] = $t;

                    $keyListExist[] = $v['visitTeam'];

                    $textInsert = array();
                    $textInsert['text_original'] = $v['visitTeam'];
                    $textInsert['text_translate'] = $t;
                    $dataInsert[] = $textInsert;
                }
            }
        }

        if (!empty($dataInsert)) {
            DB::table('translate_texts')->insertOrIgnore($dataInsert);
        }

        return $data;
    }

    public function getBifenList (Request $request) {
        $rs = DB::table('matchs')->where('typeMatch', '2')->get();
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
        $keyListExist = array();
        $textList = $this->__getListTextTranslateDB();
        $dataInsert = array();
        $i = 0;
        foreach ($data as $key => $value) {
            if($key == 'rows'){
                foreach ($value as $k => $v) {
                    if (!empty($v['homeTeam'])){
                        if (isset($textList[$v['homeTeam']]) || in_array($v['homeTeam'], $keyListExist)){
                            $data[$key][$k]['homeTeam'] = $textList[$v['homeTeam']];
                        }else{
                            $t = $this->__translateText($v['homeTeam'], 'en');
                            $data[$key][$k]['homeTeam'] = $t;
                            $textList[$v['homeTeam']] = $t;

                            $keyListExist[] = $v['homeTeam'];

                            $textInsert = array();
                            $textInsert['text_original'] = $v['homeTeam'];
                            $textInsert['text_translate'] = $t;
                            $dataInsert[] = $textInsert;
                        }
                    }

                    if (!empty($v['visitTeam'])){
                        if (isset($textList[$v['visitTeam']]) || in_array($v['visitTeam'], $keyListExist)){
                            $data[$key][$k]['visitTeam'] = $textList[$v['visitTeam']];
                        }else{
                            $t = $this->__translateText($v['visitTeam'], 'en');
                            $data[$key][$k]['visitTeam'] = $t;
                            $textList[$v['visitTeam']] = $t;

                            $keyListExist[] = $v['visitTeam'];

                            $textInsert = array();
                            $textInsert['text_original'] = $v['visitTeam'];
                            $textInsert['text_translate'] = $t;
                            $dataInsert[] = $textInsert;
                        }
                    }
                }
            }
        }

        if (!empty($dataInsert)) {
            DB::table('translate_texts')->insertOrIgnore($dataInsert);
        }

        return $data;
    }

    public function getQcList (Request $request) {
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getQcList');
        return $response->json();
    }

    public function getSaikuangList (Request $request) {
        $rs = DB::table('matchs')->where('typeMatch', '4')->get();
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
        $keyListExist = array();
        $textList = $this->__getListTextTranslateDB();
        $dataInsert = array();
        $i = 0;
        foreach ($data as $key => $value) {
            if($key == 'rows'){
                foreach ($value as $k => $v) {
                    if (!empty($v['homeTeam'])){
                        if (isset($textList[$v['homeTeam']]) || in_array($v['homeTeam'], $keyListExist)){
                            $data[$key][$k]['homeTeam'] = $textList[$v['homeTeam']];
                        }else{
                            $t = $this->__translateText($v['homeTeam'], 'en');
                            $data[$key][$k]['homeTeam'] = $t;
                            $textList[$v['homeTeam']] = $t;

                            $keyListExist[] = $v['homeTeam'];

                            $textInsert = array();
                            $textInsert['text_original'] = $v['homeTeam'];
                            $textInsert['text_translate'] = $t;
                            $dataInsert[] = $textInsert;
                        }
                    }

                    if (!empty($v['visitTeam'])){
                        if (isset($textList[$v['visitTeam']]) || in_array($v['visitTeam'], $keyListExist)){
                            $data[$key][$k]['visitTeam'] = $textList[$v['visitTeam']];
                        }else{
                            $t = $this->__translateText($v['visitTeam'], 'en');
                            $data[$key][$k]['visitTeam'] = $t;
                            $textList[$v['visitTeam']] = $t;

                            $keyListExist[] = $v['visitTeam'];

                            $textInsert = array();
                            $textInsert['text_original'] = $v['visitTeam'];
                            $textInsert['text_translate'] = $t;
                            $dataInsert[] = $textInsert;
                        }
                    }

                    $t = $this->__translateText($v['betRate'], 'vi');
                    $data[$key][$k]['betRate'] = $t;
                    $t = $this->__translateText($v['matchDesc'], 'vi');
                    $data[$key][$k]['matchDesc'] = $t;

                    $txt = $data[$key][$k]['matchResult'];
                    $txt = str_replace('胜', 'Thắng', $txt);
                    $txt = str_replace('平', 'Hoà', $txt);
                    $txt = str_replace('负', 'Thua', $txt);
                    $data[$key][$k]['matchResult']= $txt;
                }
            }
        }

        if (!empty($dataInsert)) {
            DB::table('translate_texts')->insertOrIgnore($dataInsert);
        }

        return $data;
    }

    public function getGaoBeiList (Request $request) {
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getGaoBeiList');
        return $response->json();
    }

    public function getDetailYcChartsInfo (Request $request) {
    	$matchNo = $request->input('rowNo');
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getDetailYcChartsInfo?rowNo='.$matchNo);
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

        return $data;
    }

    public function getDetailLeftLists (Request $request) {
        $matchNo = $request->input('rowNo');
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getDetailLeftLists?rowNo='.$matchNo);
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

        return $data;
    }    

    public function detail (Request $request) {
        $id = $request->input('id');
        $item = DB::table('matchs')->join('tournaments', 'matchs.tournamentId', '=', 'tournaments.id')->where('matchId', $id)->first();
        $logo_team_home = $item->homeLogo;
        $logo_team_visit = $item->visitLogo;
        if(empty($item->homeLogo) || empty($item->visitLogo)){
            $url="http://www.zucaijia.cn/zcj/jincai/detail?flag=0&rowNo=".$id;
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
                    }else{
                        $logo_team_visit = $imgSrc;
                    }
                }
            }
            DB::table('matchs')->where('matchId', $id)->update(['homeLogo' => $logo_team_home, 'visitLogo' => $logo_team_visit]);

        }

        return view('detail' , compact('id', 'item', 'logo_team_home', 'logo_team_visit'));
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
