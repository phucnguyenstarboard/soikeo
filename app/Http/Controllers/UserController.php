<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Hash;
use DateTime;

class UserController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();

        $user_list = DB::table('user')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.user', compact('user', 'user_list'));
    }

    public function search(Request $request)
    {
        $data = $request->all();
        $query = DB::table('user')
            ->orderBy('id', 'desc');
        // if (!is_null($data['s-username'])) {
        //     $query->where('username', 'like', '%' . $data['s-username'] . '%');
        // }
        if (!is_null($data['s-account'])) {
            $query->where('account', 'like', '%' . $data['s-account'] . '%');
        }
        $data_list = $query->orderBy('id', 'desc')->paginate(10);
        return view('pages.subpages.user_list', compact('data_list'));
    }

    public function delete(Request $request)
    {
        $data = $request->all();
        DB::table('user')->delete($data['user_id']);
        return response()->json([
            'message' => [
                'title' => '',
                'text'  => '会员帐号删除成功.',
                'type'  => 'success',
            ],
        ], 200);
    }

    public function profile(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'account' => 'required',
        ]);


        $data = $request->all();

        $items = DB::table('user')->where('account', $data['account'])->where('id', '<>', $data['user_id'])->get();
        if($items->count() > 0){
            return response()->json([
                'message' => [
                    'title' => '',
                    'text'  => '账户名已存在',
                    'type'  => 'warning',
                ],
            ], 200);
        }

        DB::table('user')->where('id', $data['user_id'])
        ->update([
            'username' => $data['username'],
            'account' => $data['account'],
        ]);
        return response()->json([
            'message' => [
                'title' => '',
                'text'  => '账户信息更新成功',
                'type'  => 'success',
            ],
        ], 200);
    }

    public function changePass(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);
        $data = $request->all();
        if ($data['password'] !== $data['password_confirm']) {
            return response()->json([
                'message' => [
                    'title' => '',
                    'text'  => '確認密碼錯誤。',
                    'type'  => 'warning',
                ],
            ], 200);
        }
        DB::table('user')->where('id', $data['user_id'])
            ->update(['password' => Hash::make($data['password'])]);
        return response()->json([
            'message' => [
                'title' => '',
                'text'  => '帐户密码更新成功。',
                'type'  => 'success',
            ],
        ], 200);
    }

    public function changeFunPass(Request $request)
    {
        $request->validate([
            'fund_password' => 'required',
        ]);
        $data = $request->all();
        if ($data['fund_password'] !== $data['fund_password_confirm']) {
            return response()->json([
                'message' => [
                    'title' => '',
                    'text'  => '確認密碼錯誤。',
                    'type'  => 'warning',
                ],
            ], 200);
        }

        DB::table('user')->where('id', $data['user_id'])
            ->update(['fund_password' => Hash::make($data['fund_password'])]);
        return response()->json([
            'message' => [
                'title' => '',
                'text'  => '基金密码更新成功。',
                'type'  => 'success',
            ],
        ], 200);
    }

    public function updateBalance(Request $request)
    {
        $request->validate([
            'balance' => 'required',
        ]);
        $data = $request->all();
        DB::table('user')->where('id', $data['user_id'])
            ->update(['balance' => $data['balance']]);
        return response()->json([
            'message' => [
                'title' => '',
                'text'  => '余额更新成功。',
                'type'  => 'success',
            ],
        ], 200);
    }
    
    public function prize(Request $request)
    {
        $request->validate([
            'prize_amount' => 'required',
        ]);
        $data = $request->all();
        $user = DB::table('user')->where('id', $data['user_id'])->first();
        $balance = (float)$user->balance;
        $balance = $balance + (float) $data['prize_amount'];
        DB::table('user')->where('id', $data['user_id'])
            ->update(
                [
                    'balance' => $balance,
                    'is_notice' => 1,
                    'prize_amount' => $data['prize_amount'],
                ]);
        return response()->json([
            'message' => [
                'title' => '',
                'text'  => '奖金更新成功。',
                'type'  => 'success',
            ],
        ], 200);
    }
}
