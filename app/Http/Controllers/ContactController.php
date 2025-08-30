<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\URL;

class ContactController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('pages.contact', compact('user'));
        }
        return view('pages.login');
    }

    public function chat()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('pages.chat', compact('user'));
        }
        return view('pages.login');
    }

    public function postChat(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'message' => 'required',
        ]);
        $data = $request->all();
        $user = Auth::user();

        $imageName = time().'.'.$request->image->getClientOriginalExtension();

        $id_contact = DB::table('contact')->insertGetId([
            'phone' => $request->phone,
            'content' => $request->message,
            'time_created' => date('Y-m-d H:i:s'),
            'time_updated' => date('Y-m-d H:i:s'),
            'user_id' => $user->id
        ]);

        $dir_destination = public_path() . '/uploads/' . $id_contact .'/';

        if (!file_exists($dir_destination)) {
            mkdir($dir_destination, 0777, true);
        }

        $request->image->move($dir_destination, $imageName);

        DB::table('contact')->where('id', $id_contact)
            ->update(['image' => URL::to('/') .'/uploads/' . $id_contact .'/'.$imageName]);
       
        return response()->json([
            'message' => [
                'title' => '',
                'text'  => 'Gửi liên hệ thành công.',
                'type'  => 'success',
            ],
        ], 200);
    }

    public function historyChat()
    {
        $user = Auth::user();
        $from = date('Y-m-d 00:00:00');
        $to = date('Y-m-d 23:59:59');
        $item_bet = DB::table('contact')
            ->select('contact.*')
            ->where('contact.user_id', $user->id)
            ->where('contact.time_updated','>=', $from)
            ->where('contact.time_updated', '<=', $to)
            ->orderBy('contact.time_updated', 'desc')
            ->get();
        return view('pages.history_chat', compact('user', 'item_bet'));
    }

    public function postHistoryChat(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();

        $s_from = $data['s-fromdate'];
        $s_to = $data['s-todate'];
        
        $arr_f = explode('/', $s_from);
        $s_from = $arr_f[2] .'-'. $arr_f[1] .'-' . $arr_f[0];

        $arr_f = explode('/', $s_to);
        $s_to = $arr_f[2] . '-' . $arr_f[1] . '-' . $arr_f[0];

        $from = $s_from.' 00:00:00';
        $to = $s_to.' 23:59:59';

        $query = DB::table('contact')
            ->select('contact.*')
            ->where('contact.user_id', $user->id)
            ->where('contact.time_updated','>=', $from)
            ->where('contact.time_updated', '<=', $to)
            ->orderBy('contact.time_updated', 'desc');
        if($data['s-status'] == 1){
            $query->where('contact.status', 0);
        }elseif($data['s-status'] == 2){
            $query->where('contact.status', 1);
        }
        $data_list = $query->orderBy('contact.time_updated', 'desc')->get();
        return view('pages.subpages.chat_list', compact('data_list'));
    }    
}
