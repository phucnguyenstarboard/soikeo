<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;
use DB;
use Hash;

class LoginController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('pages.login');
    }

    public function getRegister()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('pages.register');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'account' => 'required',
            'password' => 'required',
        ]);

        $data = $request->all();

        $user = DB::table('user')->where('account', $data['account'])->where('role', 'user')->first();
        if (empty($user)) {
            $ip = $this->getIPAddress();
            DB::table('user')->insert([
                'username' => $data['username'],
                'account' => $data['account'],
                'password' => Hash::make($data['password']),
                'ip_register' => $ip,
                'time_register' => gmdate('D M d Y H:i:s TO')
            ]);

            return response()->json([
                'message' => [
                    'title' => '',
                    'text'  => 'Đăng ký thành công',
                    'type'  => 'success',
                ]
            ], 200);
        }

        return response()->json([
            'message' => [
                'title' => '',
                'text'  => 'Tên tài khoản đã tồn tại',
                'type'  => 'warning',
            ]
        ], 422);
    }

    public function getIPAddress()
    {
        //whether ip is from the share internet  
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from the remote address  
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'account' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('account', 'password');
        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            if($user->role !== 'admin'){
                Session::flush();
                Auth::logout();
                return response()->json([
                    'message' => [
                        'title' => '',
                        'text'  => '您无权访问',
                        'type'  => 'warning',
                    ]
                ], 422);
            }

            DB::table('user')->where('id', $user->id)
            ->update(['time_last_login' => gmdate('D M d Y H:i:s TO')]);
            
            return response()->json([
                'message' => [
                    'title' => '',
                    'text'  => '登录成功',
                    'type'  => 'success',
                ]
            ], 200);
        }

        return response()->json([
            'message' => [
                'title' => '',
                'text'  => '用户名或密码不正确',
                'type'  => 'warning',
            ]
        ], 422);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
