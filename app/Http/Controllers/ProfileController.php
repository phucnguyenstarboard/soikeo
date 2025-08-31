<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Hash;
use DateTime;
use Session;

class ProfileController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $user = Auth::user();
            $count = DB::table('withdraw_history')
                ->where('user_id', $user->id)
                ->whereIn('status', [1,2])
                ->where('is_view', 0)
                ->count();
            session()->put('total_r', $count); 

            return $next($request);
        });
              
    }
    public function profile()
    {
        $user = Auth::user();
        return view('pages.profile', compact('user'));
    }

    public function postProfile(Request $request)
    {
        $request->validate([
            'username' => 'required',
        ]);
        $data = $request->all();
        $user = Auth::user();
        DB::table('user')->where('id', $user->id)
            ->update(['username' => $data['username']]);
        return response()->json([
            'message' => [
                'title' => '',
                'text'  => 'Informações atualizadas com sucesso',
                'type'  => 'success',
            ],
        ], 200);
    }

    public function deposit()
    {
        $user = Auth::user();
        return view('pages.deposit', compact('user'));
    }

    public function postDeposit(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'name' => 'required',
            'note' => 'required',
        ]);
        $data = $request->all();
        $amount = (float)$data['amount'];
        if($amount < 20){
            return response()->json([
                'message' => [
                    'title' => '',
                    'text'  => 'Valor do depósito é inválido. Mínimo: R$ 20',
                    'type'  => 'warning',
                ],
            ], 422);
        }

        if($amount > 5000){
            return response()->json([
                'message' => [
                    'title' => '',
                    'text'  => 'Valor do depósito é inválido. Máximo: R$ 5000',
                    'type'  => 'warning',
                ],
            ], 422);
        }

        $user = Auth::user();
        $ip = $this->getIPAddress();
        DB::table('deposit_history')->insert([
            'user_id' => $user->id,
            'amount' => $amount,
            'name' => $data['name'],
            'note' => $data['note'],
            'ip' => $ip,
            'status' => 0,
            'time_created' => gmdate('D M d Y H:i:s TO'),
            'time_updated' => gmdate('D M d Y H:i:s TO')
        ]);
        return response()->json([
            'message' => [
                'title' => '',
                'text'  => 'Solicitação de depósito enviada com sucesso.',
                'type'  => 'success',
            ],
        ], 200);
    }

    public function withdraw()
    {
        $user = Auth::user();
        return view('pages.withdraw', compact('user'));
    }

    public function postWithdraw(Request $request)
    {
        $request->validate([
            'amount' => 'required',
        ]);


        $data = $request->all();
        $user = Auth::user();

        $balance = (float)$user->balance;
        $amount = (float)$data['amount'];



        if($amount < 100){
            return response()->json([
                'message' => [
                    'title' => '',
                    'text'  => 'Valor de Saque é inválido. Mínimo: R$ 100',
                    'type'  => 'warning',
                ],
            ], 422);
        }        

        if($amount > $balance){
            return response()->json([
                'message' => [
                    'title' => '',
                    'text'  => 'Valor de Saque é inválido. Máximo: R$ '.number_format($user->balance, 0, ',', ''),
                    'type'  => 'warning',
                ],
           ], 422);

        }

        if (empty($user->fund_password)) {
            return response()->json([
                'message' => [
                    'title' => '',
                    'text'  => 'Você não definiu uma senha do fundo.',
                    'type'  => 'warning',
                ],
            ], 200);
        } else {
            // $password_fund = Hash::make($data['password_fund']);
            if (!Hash::check($data['password_fund'], $user->fund_password)) {
                // The passwords not match...
                return response()->json([
                    'message' => [
                        'title' => '',
                        'text'  => 'Senha de fundo incorreta',
                        'type'  => 'warning',
                    ],
                ], 200);
            }
        }

        if (empty($user->account_name)) {
            return response()->json([
                'message' => [
                    'title' => '',
                    'text'  => 'Você não configurou uma conta de saque.',
                    'type'  => 'warning',
                ],
            ], 200);
        }
        
        
        $balance_new = $balance - $amount;
        
        DB::table('user')->where('id', $user->id)
            ->update(['balance' => $balance_new]);

        $ip = $this->getIPAddress();
        DB::table('withdraw_history')->insert([
            'user_id' => $user->id,
            'amount' => $amount,
            'account_name' => $user->account_name,
            'account_number' => $user->account_number,
            'bank_name' => $user->bank_name,
            'ip' => $ip,
            'status' => 0,
            'time_created' => gmdate('D M d Y H:i:s TO'),
            'time_updated' => gmdate('D M d Y H:i:s TO')
        ]);
        return response()->json([
            'message' => [
                'title' => '',
                'text'  => 'A solicitação de saque está sendo processada. Aguarde um momento. Caso tenha alguma dúvida, entre em contato com o atendimento ao cliente para obter suporte.',
                'type'  => 'success',
            ],
        ], 200);
    }

    public function historyBet()
    {
        $user = Auth::user();
        $from = date('Y-m-d 00:00:00');
        $to = date('Y-m-d 23:59:59');
        $item_bet = DB::table('bet')
            ->join('session', 'session.session_id', '=', 'bet.session_id')
            ->select('session.session_id' ,'session.number', 'session.result', 'bet.bet', 'bet.status', 'bet.betMoney', 'bet.timeInt')
            ->where('bet.user_id', $user->id)
            ->where('bet.timeInt','>=', strtotime($from))
            ->where('bet.timeInt', '<=', strtotime($to))
            ->orderBy('bet.id', 'desc')
            ->get();
        return view('pages.history_bet', compact('user', 'item_bet'));
    }

    public function postHistoryBet(Request $request)
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

        $query = DB::table('bet')
            ->join('session', 'session.session_id', '=', 'bet.session_id')
            ->select('session.session_id', 'session.number', 'session.result', 'bet.bet', 'bet.status', 'bet.betMoney', 'bet.timeInt')
            ->where('bet.user_id', $user->id)
            ->where('bet.timeInt', '>=', strtotime($from))
            ->where('bet.timeInt', '<=', strtotime($to));
        if($data['s-status'] == 1){
            $query->where('bet.status', 1);
        }elseif($data['s-status'] == 2){
            $query->where('bet.status', 2);
        }
        $data_list = $query->orderBy('bet.id', 'desc')->get();
        return view('pages.subpages.history_list', compact('data_list'));
    }

    public function historyTransaction()
    {
        $user = Auth::user();
        $item_bet = [];
        $from = date('Y-m-d 00:00:00');
        $to = date('Y-m-d 23:59:59');
        $deposit = DB::table('deposit_history')
        ->select(
            "deposit_history.id",
            DB::raw("'1' AS type"),
            "deposit_history.amount",
            "deposit_history.status",
            "deposit_history.time_created"
        )->where('deposit_history.user_id', $user->id);
        $item_bet = DB::table('withdraw_history')
        ->select(
             "withdraw_history.id",
            DB::raw("'0' AS type"),
            "withdraw_history.amount",
            "withdraw_history.status",
            "withdraw_history.time_created"
        )
        ->where('withdraw_history.user_id', $user->id)
        ->union($deposit)
        ->get();
        return view('pages.history_transaction', compact('user', 'item_bet','from', 'to'));
    }

    public function postHistoryTransaction(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();

        $s_from = $data['s-fromdate'];
       

        $arr_f = explode('/', $s_from);
        $s_from = $arr_f[2] . '-' . $arr_f[1] . '-' . $arr_f[0];

        $from = $s_from . ' 00:00:00';
        $to = $s_from . ' 23:59:59';

        $deposit = DB::table('deposit_history')
        ->select(
            "deposit_history.id",
            DB::raw("'1' AS type"),
            "deposit_history.amount",
            "deposit_history.status",
            "deposit_history.time_created"
        )->where('deposit_history.user_id', $user->id);
        $data_list = DB::table('withdraw_history')
        ->select(
            "withdraw_history.id",
            DB::raw("'0' AS type"),
            "withdraw_history.amount",
            "withdraw_history.status",
            "withdraw_history.time_created"
        )
        ->where('withdraw_history.user_id', $user->id)
        ->union($deposit)
        ->get();

        return view('pages.subpages.transaction_list', compact('data_list', 'from', 'to'));
    }

    public function bank()
    {
        $user = Auth::user();
        $banks = DB::table('banks')->orderBy('bank_name', 'asc')->get();
        return view('pages.bank', compact('user', 'banks'));
    }

    public function postBank(Request $request)
    {
        $request->validate([
            'bank_name' => 'required',
            'branch' => 'required',
            'account_name' => 'required',
            'account_number' => 'required',
        ]);
        $data = $request->all();
        $user = Auth::user();
        // if ($user->username !== $data['account_name']) {
        //     return response()->json([
        //         'message' => [
        //             'title' => '',
        //             'text'  => 'Tên tài khoản rút tiền đã nhập khác tên người dùng.',
        //             'type'  => 'warning',
        //         ],
        //     ], 200);
        // }

        if (empty($user->fund_password)) {
            return response()->json([
                'message' => [
                    'title' => '',
                    'text'  => 'Você não definiu uma senha do fundo.',
                    'type'  => 'warning',
                ],
            ], 200);
        }
        DB::table('user')->where('id', $user->id)
            ->update([
                'bank_name' => $data['bank_name'],
                'branch' => $data['branch'],
                'account_name' => $data['account_name'],
                'account_number' => $data['account_number'],
                'time_linking_bank' => gmdate('D M d Y H:i:s TO'),
                'time_update_bank' => gmdate('D M d Y H:i:s TO')
            ]);
        return response()->json([
            'message' => [
                'title' => '',
                'text'  => 'Atualização de conta de saque bem-sucedida.',
                'type'  => 'success',
            ],
        ], 200);
    }

    public function passwordFund()
    {
        $user = Auth::user();
        return view('pages.password_fund', compact('user'));
    }

    public function postPasswordFund(Request $request)
    {
        $request->validate([
            'fund_password' => 'required',
        ]);
        $data = $request->all();


        $user = Auth::user();
        
        if(isset($data['fund_password_old'])){
            if (!Hash::check($data['fund_password_old'], $user->fund_password)) {
                return response()->json([
                    'message' => [
                        'title' => '',
                        'text'  => 'A senha atual está incorreta.',
                        'type'  => 'warning',
                    ],
                ], 200);
            }
        }

        if ($data['fund_password'] !== $data['fund_password_confirm']) {
            return response()->json([
                'message' => [
                    'title' => '',
                    'text'  => 'A senha de confirmação está incorreta.',
                    'type'  => 'warning',
                ],
            ], 200);
        }

        DB::table('user')->where('id', $user->id)
            ->update(['fund_password' => Hash::make($data['fund_password'])]);
        return response()->json([
            'message' => [
                'title' => '',
                'text'  => 'Senha atualizada com sucesso.',
                'type'  => 'success',
            ],
        ], 200);
    }

    public function notifications()
    {
        $user = Auth::user();
        $data_list = DB::table('withdraw_history')
        ->where('user_id', $user->id)
        ->whereIn('status', [1,2])
        ->take(20)
        ->orderBy('id', 'desc')
        ->get();

        DB::table('withdraw_history')
        ->where('user_id', $user->id)
        ->whereIn('status', [1,2])
            ->update([
                'is_view' => 1
            ]);


        return view('pages.notify', compact('user', 'data_list'));
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
}
