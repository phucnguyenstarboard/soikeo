<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\URL;
use Hash;

class BankController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            $user = Auth::user();
            if($user->role == 'user'){
                return redirect('/');
            }

            return $next($request);
        });

    }
    public function index()
    {
        $user = Auth::user();

        $data_list = DB::table('banks')
            ->select('banks.*')->orderBy('banks.bank_name', 'asc')->get();
        return view('pages.admin.bank', compact('user', 'data_list'));
    }

    public function add()
    {
        $user = Auth::user();
        return view('pages.admin.bank_add', compact('user'));
    }

    public function insert(Request $request)
    {
       
        $data = $request->all();


        $dataInsert = [
            'code' => $data['bank_name'],
            'bank_name' => $data['bank_name'],
            'created_time' => date('Y-m-d H:i:s'),
            'updated_time' => date('Y-m-d H:i:s'),
        ];

        $user = Auth::user();
        $user_id = $user->id;

        DB::table('banks')->insert($dataInsert);
        
        return response()->json([
            'message' => [
                'title' => '',
                'text'  => '银行添加成功',
                'type'  => 'success',
            ],
        ], 200);
    }

    public function edit(Request $request, $id)
    {
        $user = Auth::user();
        $product = DB::table('banks')
            ->select('banks.*')->where('banks.id', $id)->first();
        return view('pages.admin.bank_edit', compact('user', 'product'));
    }

    public function update(Request $request, $id)
    {
       
        $data = $request->all();

        $dataInsert = [
            'code' => $data['bank_name'],
            'bank_name' => $data['bank_name'],
            'updated_time' => date('Y-m-d H:i:s'), 
            'is_delete' => isset($data['is_delete']) ? 1 : 0,
        ];

        $article = DB::table('banks')
            ->select('banks.*')->where('banks.id', $id)->first();

        $user = Auth::user();
        $user_id = $user->id;

        DB::table('banks')->where('id', $id)->update($dataInsert);
        
        return response()->json([
            'message' => [
                'title' => '',
                'text'  => '银行已成功更新',
                'type'  => 'success',
            ],
        ], 200);
    }

    public function delete(Request $request)
    {

        $data = $request->all();

        $dataUpdate = [
            'is_delete' => 1,
        ];
        
        DB::table('banks')->where('id', $data['cat_id'])->update($dataUpdate);

        return response()->json([
            'message' => [
                'title' => '',
                'text'  => '银行删除成功',
                'type'  => 'success',
            ]
        ], 200);

    }    



    function create_slug($string)
    {
        $search = array(
            '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
            '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
            '#(ì|í|ị|ỉ|ĩ)#',
            '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
            '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
            '#(ỳ|ý|ỵ|ỷ|ỹ)#',
            '#(đ)#',
            '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
            '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
            '#(Ì|Í|Ị|Ỉ|Ĩ)#',
            '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
            '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
            '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
            '#(Đ)#',
            "/[^a-zA-Z0-9\-\_]/",
        );
        $replace = array(
            'a',
            'e',
            'i',
            'o',
            'u',
            'y',
            'd',
            'A',
            'E',
            'I',
            'O',
            'U',
            'Y',
            'D',
            '-',
        );
        $string = preg_replace($search, $replace, $string);
        $string = preg_replace('/(-)+/', '-', $string);
        $string = strtolower($string);
        return $string;
    }
}
