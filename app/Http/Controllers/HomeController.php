<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GoogleTranslate;

class HomeController extends Controller
{
    public function getSdtjList (Request $request) {
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getSdtjList');
        return $response->json();
    }

    public function getWdList (Request $request) {
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getWdList');
        return $response->json();
    }

    public function getAllMatchList (Request $request) {
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getAllMatchList');
        $data = $response->json();
        return $data;
        // $texts = array();
        // $textExist = array();
        // foreach ($data as $key => $value) {
        //     if($key == 'titleText'){
        //         $data[$key] = $this->__translateText($value, 'vi');
        //     }else if($key == 'rows'){

//                 foreach ($value as $k => $v) {
//                     if (in_array($v['typeName'], $texts), true){

//                     }
//                     $t = $this->__translateText($v['typeName'], 'vi');
//                     $texts[$v['typeName']] = $t;
//                     $data[$key][$k]['typeName'] = $t;
// echo '<pre>',print_r($data,1),'</pre>';
// die;
//                     // $data[$key][$k]['typeName'] = $this->__translateText($v['typeName'], 'vi');
//                     // $data[$key][$k]['homeTeam'] = $this->__translateText($v['homeTeam'], 'en');
//                     // $data[$key][$k]['visitTeam'] = $this->__translateText($v['visitTeam'], 'en');
//                 }
//             }
        // }
// echo '<pre>',print_r($data,1),'</pre>';
// die;        
        // return $data;
    }

    public function getBgcList (Request $request) {
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getBgcList');
        return $response->json();
    }

    public function getBifenList (Request $request) {
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getBifenList');
        return $response->json();
    }

    public function getQcList (Request $request) {
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getQcList');
        return $response->json();
    }

    public function getSaikuangList (Request $request) {
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getSaikuangList');
        return $response->json();
    }

    public function getGaoBeiList (Request $request) {
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getGaoBeiList');
        return $response->json();
    }

    public function getDetailYcChartsInfo (Request $request) {
    	$matchNo = $request->input('rowNo');
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getDetailYcChartsInfo?rowNo='.$matchNo);
        return $response->json();
    }

    public function getDetailLeftLists (Request $request) {
        $matchNo = $request->input('rowNo');
        $response = Http::get('http://www.zucaijia.cn/zcj/jincai/getDetailLeftLists?rowNo='.$matchNo);
        return $response->json();
    }    

    public function detail (Request $request) {
        $id = $request->input('id');
        return view('detail' , compact('id'));
    }

    private function __translateText ($text, $lang) {
      return ucfirst(GoogleTranslate::trans($text, $lang ));
    }
}
