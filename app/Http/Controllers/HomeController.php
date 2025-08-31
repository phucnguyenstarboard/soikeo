<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use DateTime;
use DateTimeZone;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $seconds = 180;
            $user = Auth::user();
            $item = DB::table('session')->orderBy('id', 'desc')->where('timeInt', '<=', strtotime(date('Y-m-d H:i:01')))->first();
            $item->time_created = $this->convertDateTime($item->time_created);
            $times =  strtotime($item->time_created) + $seconds - strtotime(date('Y-m-d H:i:s'));
            $minute = floor($times / 60);
            $second = $times % 60;
            return view('pages.profile', compact('user', 'item', 'times', 'minute', 'second'));
        }
        return view('pages.login');
    }

    public function lastSession(Request $request)
    {
        $item = DB::table('session')->orderBy('id', 'desc')->where('timeInt', '<=', strtotime(date('Y-m-d H:i:01')))->first();
        $item->time_created = $this->convertDateTime($item->time_created, 'Ymd');
        return response()->json([$item], 200);
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
