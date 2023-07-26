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
        $items = DB::table('matchs')->join('tournaments', 'matchs.tournamentId', '=', 'tournaments.id')->orderBy('matchs.id', 'DESC')->groupBy('matchs.matchId')->get();
        return view('admin.dashboard' , compact('items'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function tour()
    {
        $items = DB::table('tournaments')->orderBy('tournaments.id', 'DESC')->get();
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
    public function tourAdd()
    {
        return view('admin.tour_add');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postTourAdd(Request $request)
    {  
        
        $data = $request->all();
        $tour_id = DB::table('tournaments')->insertGetId( ['tour_name' => $data['tour_name']] );
        return redirect("tournaments")->withSuccess('Tạo giải đấu thành công');
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
        if(empty($item)){
            return redirect("dashboard");
        }        
        $tours = DB::table('tournaments')->get();
        $rs = DB::table('match_details')->where('matchId', $id)->first();
        $detail = json_decode($rs->content2, true);
        $detail2 = json_decode($rs->content1, true);
        return view('admin.match_edit' , compact('item', 'tours', 'detail', 'detail2'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postMatchEdit($id ,Request $request)
    {          
        $data = $request->all();

        $item = DB::table('matchs')->where('matchId', $id)->first();

        if(empty($item)){
            return redirect("dashboard");
        }

        $data['homeLogo'] = $item->homeLogo;
        if ($image = $request->file('homeLogo')) {
            $destinationPath = public_path('/assets/images/logo/');
            $homeLogo = date('YmdHis') . "." .$image->getClientOriginalExtension();
            $image->move($destinationPath, $homeLogo);
            $data['homeLogo'] = "$homeLogo";
        }

        $data['visitLogo'] = $item->visitLogo;
        if ($image = $request->file('visitLogo')) {
            $destinationPath = public_path('/assets/images/logo/');
            $visitLogo = date('YmdHis') . "." .$image->getClientOriginalExtension();
            $image->move($destinationPath, $visitLogo);
            $data['visitLogo'] = "$visitLogo";
        }

        $tour = DB::table('tournaments')->where('id', $data['tournamentId'])->first();
        DB::table('matchs')->where('matchId', $id)->update([
            'tournamentId' => $data['tournamentId']
            ,'typeName' => !empty($tour->tour_name_edit) ? $tour->tour_name_edit : $tour->tour_name
            ,'rowNo' => $data['rowNo']
            ,'homeTeam' => $data['homeTeam']
            ,'visitTeam' => $data['visitTeam']
            ,'matchResult' => $data['matchResult']
            ,'result1' => empty($data['result1']) ? "" : $data['result1']
            ,'recPercent' => $data['recPercent']
            ,'isOk' => isset($data['isOk']) ? '1' : '0'
            ,'isTheo' =>  isset($data['isTheo']) ? '1' : '0'
            ,'isShow' =>  isset($data['isShow']) ? '1' : '0'
            ,'matchDate' => $data['matchDate']
            ,'matchTime' => $data['matchTime']
            ,'homeLogo' => $data['homeLogo']
            ,'visitLogo' => $data['visitLogo']
        ]);

        $rs = DB::table('match_details')->where('matchId', $id)->first();
        $content2 = json_decode($rs->content2, true);
        $content2['peilvRow']['victCount'] = $data['victCount2'];
        $content2['peilvRow']['tieCount'] = $data['tieCount2'];
        $content2['peilvRow']['failCount'] = $data['failCount2'];

        $content2['zhanjiRow']['type'] = $data['type'];
        $content2['zhanjiRow']['matchCount'] = $data['matchCount'];
        $content2['zhanjiRow']['victCount'] = $data['victCount'];
        $content2['zhanjiRow']['tieCount'] = $data['tieCount'];
        $content2['zhanjiRow']['failCount'] = $data['failCount'];


        $content1 = json_decode($rs->content1, true);

        $content1['bilvList'][0]['desc'] = $data['bilvList1'];
        $content1['bilvList'][1]['desc'] = $data['bilvList2'];
        $content1['bilvList'][2]['desc'] = $data['bilvList3'];

        $content1['analyInfo']['winner'] = $data['winner'];
        $content1['analyInfo']['halfWholeResult'] = $data['halfWholeResult'];
        $content1['analyInfo']['scoreResult'] = $data['scoreResult'];
        $content1['analyInfo']['winReason'] = $data['winReason'];
        $content1['analyInfo']['drawReason'] = $data['drawReason'];
        $content1['analyInfo']['loseReason'] = $data['loseReason'];
        $content1['analyInfo']['winPossibility'] = is_numeric($data['bilvList1']) ? number_format($data['bilvList1'], 2) : 0;
        $content1['analyInfo']['drawPossibility'] = is_numeric($data['bilvList2']) ? number_format($data['bilvList2'], 2) : 0;
        $content1['analyInfo']['losePossibility'] = is_numeric($data['bilvList3']) ? number_format($data['bilvList3'], 2) : 0;
        $content1['analyInfo']['keyNote'] = $data['keyNote'];

        DB::table('match_details')->where('matchId', $id)->update([
            'content2' => json_encode($content2)
            ,'content1' => json_encode($content1)
        ]);

        return redirect("match/".$id)->withSuccess('Cập nhật trận đấu thành công');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function info()
    {
        $user = DB::table('users')->where('id', 1)->first();
        return view('admin.info' , compact('user'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postInfo(Request $request)
    {  
        
        $data = $request->all();
        DB::table('users')->where('id', 1)->update(['link_zalo' => $data['link_zalo'], 'link_tele' => $data['link_tele'], 'link_km' => $data['link_km']]);         
        return redirect("info")->withSuccess('Cập nhật thông tin thành công');
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function matchAdd()
    {
        $tours = DB::table('tournaments')->get();
        return view('admin.match_add', compact('tours'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postMatchAdd(Request $request)
    {  
        
        $data = $request->all();

        $data['homeLogo'] = 'no_club_logo.jpg';
        if ($image = $request->file('homeLogo')) {
            $destinationPath = public_path('/assets/images/logo/');
            $homeLogo = date('YmdHis') . "." .$image->getClientOriginalExtension();
            $image->move($destinationPath, $homeLogo);
            $data['homeLogo'] = "$homeLogo";
        }

        $data['visitLogo'] = 'no_club_logo.jpg';
        if ($image = $request->file('visitLogo')) {
            $destinationPath = public_path('/assets/images/logo/');
            $visitLogo = date('YmdHis') . "." .$image->getClientOriginalExtension();
            $image->move($destinationPath, $visitLogo);
            $data['visitLogo'] = "$visitLogo";
        }

        $tour = DB::table('tournaments')->where('id', $data['tournamentId'])->first();
        $id = rand(1,999999999);
        DB::table('matchs')->insertOrIgnore([
            'tournamentId' => $data['tournamentId']
            ,'typeName' => !empty($tour->tour_name_edit) ? $tour->tour_name_edit : $tour->tour_name
            ,'rowNo' => $data['rowNo']
            ,'homeTeam' => $data['homeTeam']
            ,'visitTeam' => $data['visitTeam']
            ,'matchResult' => $data['matchResult']
            ,'result1' => empty($data['result1']) ? "" : $data['result1']
            ,'recPercent' => $data['recPercent']
            ,'isOk' => isset($data['isOk']) ? '1' : '0'
            ,'matchId' => $id
            ,'typeMatch' => 0
            ,'homeLogo' => $data['homeLogo']
            ,'visitLogo' => $data['visitLogo']
            ,'matchLong' => '未'
            ,'isTheo' =>  isset($data['isTheo']) ? '1' : '0'
            ,'isShow' =>  isset($data['isShow']) ? '1' : '0'
            ,'matchDate' => $data['matchDate']
            ,'matchTime' => $data['matchTime']
        ]);

        $rs = DB::table('match_details')->first();
        $content2 = json_decode($rs->content2, true);
        $content2['peilvRow']['victCount'] = $data['victCount2'];
        $content2['peilvRow']['tieCount'] = $data['tieCount2'];
        $content2['peilvRow']['failCount'] = $data['failCount2'];

        $content2['zhanjiRow']['type'] = $data['type'];
        $content2['zhanjiRow']['matchCount'] = $data['matchCount'];
        $content2['zhanjiRow']['victCount'] = $data['victCount'];
        $content2['zhanjiRow']['tieCount'] = $data['tieCount'];
        $content2['zhanjiRow']['failCount'] = $data['failCount'];


        $content1 = json_decode($rs->content1, true);

        $content1['bilvList'][0]['desc'] = $data['bilvList1'];
        $content1['bilvList'][1]['desc'] = $data['bilvList2'];
        $content1['bilvList'][2]['desc'] = $data['bilvList3'];

        $content1['analyInfo']['winner'] = $data['winner'];
        $content1['analyInfo']['halfWholeResult'] = $data['halfWholeResult'];
        $content1['analyInfo']['scoreResult'] = $data['scoreResult'];
        $content1['analyInfo']['winReason'] = $data['winReason'];
        $content1['analyInfo']['drawReason'] = $data['drawReason'];
        $content1['analyInfo']['loseReason'] = $data['loseReason'];
        $content1['analyInfo']['winPossibility'] = is_numeric($data['bilvList1']) ? number_format($data['bilvList1'], 2) : 0;
        $content1['analyInfo']['drawPossibility'] = is_numeric($data['bilvList2']) ? number_format($data['bilvList2'], 2) : 0;
        $content1['analyInfo']['losePossibility'] = is_numeric($data['bilvList3']) ? number_format($data['bilvList3'], 2) : 0;
        $content1['analyInfo']['keyNote'] = $data['keyNote'];

        DB::table('match_details')->insertOrIgnore([
            'content2' => json_encode($content2)
            ,'content1' => json_encode($content1)
            ,'matchId' => $id
        ]);
        return redirect("dashboard")->withSuccess('Tạo trận đấu thành công');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postMatchDel(Request $request)
    {          
        $data = $request->all();
        DB::table('matchs')->where('matchId', $data['matchId'])->delete();
        DB::table('match_details')->where('matchId', $data['matchId'])->delete();
        return redirect("dashboard")->withSuccess('Xoá trận đấu thành công');
    }    
}
