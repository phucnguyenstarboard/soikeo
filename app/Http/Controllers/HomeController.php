<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        return $response->json();
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
}
