<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use Cookie;
use DB;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        if(Auth::check()){
            return redirect("dashboard");
        }
        return view('admin.auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('admin.auth.registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

       

        $remember_me = $request->has('remember') ? true : false; 

        if ($remember_me){
            Cookie::queue('email',$request->email);
            Cookie::queue('password',$request->password);
            Cookie::queue('remember',$request->remember);
        } else {
            Cookie::forget('email');
            Cookie::forget('password');
            Cookie::forget('remember');
        }
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('');
        }
  
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("login")->withSuccess('Great! You have Successfully loggedin');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        $items = DB::table('matchs')->join('tournaments', 'matchs.tournamentId', '=', 'tournaments.id')->groupBy('matchs.matchId')->get();
        return view('admin.dashboard' , compact('items'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function tour()
    {
        $items = DB::table('tournaments')->get();
        return view('admin.tour' , compact('items'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function tourEdit($id)
    {
        $item = DB::table('tournaments')->where('id', $id)->first();
        return view('admin.tour_edit' , compact('item'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postTourEdit($id ,Request $request)
    {  
        
        $data = $request->all();
        DB::table('tournaments')->where('id', $id)->update(['tour_name_edit' => $data['tour_name_edit']]);         
        return redirect("tournaments/".$id)->withSuccess('Cập nhật giải đấu thành công');
    }        

    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function matchEdit($id)
    {
        $item = DB::table('matchs')->where('matchId', $id)->first();
        $tours = DB::table('tournaments')->get();
        return view('admin.match_edit' , compact('item', 'tours'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postMatchEdit($id ,Request $request)
    {          
        $data = $request->all();
        $tour = DB::table('tournaments')->where('id', $data['tournamentId'])->first();
        DB::table('matchs')->where('matchId', $id)->update([
            'tournamentId' => $data['tournamentId']
            ,'typeName' => !empty($tour->tour_name_edit) ? $tour->tour_name_edit : $tour->tour_name
            ,'rowNo' => $data['rowNo']
            ,'homeTeam' => $data['homeTeam']
            ,'visitTeam' => $data['visitTeam']
            ,'matchResult' => $data['matchResult']
            ,'result1' => $data['result1']
            ,'recPercent' => $data['recPercent']
            ,'isOk' => isset($data['isOk']) ? '1' : '0'
        ]);
        return redirect("match/".$id)->withSuccess('Cập nhật trận đấu thành công');
    }    
}
