<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Hash;
use DateTime;

class AdminController extends Controller
{

    public function __construct() 
    {
        $this->middleware('auth');
    }
    public function postProfile(Request $request)
    {

        $item = DB::table('session')->orderBy('id', 'desc')->first();
        $data = $request->all();

        if ($data['num_1'] == '' || $data['num_2'] == '' || $data['num_3'] == '' || $data['num_4'] == '' || $data['num_5'] == '') {
            return response()->json([
                'message' => [
                    'title' => '',
                    'text'  => 'Vui lòng nhập giá trị vào các ô trống',
                    'type'  => 'warning',
                ],
            ], 200);
        }

        $result = $data['num_1'] . $data['num_2'] . $data['num_3'] . $data['num_4'] . $data['num_5'];
        DB::table('session')->where('id', $item->id)
            ->update(['result' => $result]);
        return response()->json([
            'message' => [
                'title' => '',
                'text'  => 'Cập nhật thông tin thành công',
                'type'  => 'success',
            ],
        ], 200);
    }

    public function lottery()
    {
        $user = Auth::user();
        $from = date('Y-m-d 00:00:00');
        $to = date('Y-m-d 23:59:59');
        $item_session = DB::table('session')->orderBy('id', 'desc')->where('timeInt', '>=', strtotime($from))
            ->where('timeInt', '<=', strtotime($to))->paginate(10);
        return view('pages.lottery', compact('user', 'item_session'));
    }

    public function postLottery(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();

        $s_from = $data['s-fromdate'];
        $s_to = $data['s-todate'];

        $arr_f = explode('/', $s_from);
        $s_from = $arr_f[2] . '-' . $arr_f[1] . '-' . $arr_f[0];

        $arr_f = explode('/', $s_to);
        $s_to = $arr_f[2] . '-' . $arr_f[1] . '-' . $arr_f[0];

        $from = $s_from . ' 00:00:00';
        $to = $s_to . ' 23:59:59';

        $data_list = DB::table('session')->orderBy('id', 'desc')->where('timeInt', '>=', strtotime($from))
            ->where('timeInt', '<=', strtotime($to))->paginate(10);
        return view('pages.subpages.lottery_list', compact('data_list'));
    }

    public function setting()
    {
        $user = Auth::user();
        $item = DB::table('setting')->orderBy('id', 'desc')->first();
        $banks = [
            'ABBANK' => 'ABBANK',
            'ACBBANK' => 'ACBBANK',
            'AGRIBANK' => 'AGRIBANK',
            'ANZBANK' => 'ANZBANK',
            'BACABANK' => 'BACABANK',
            'BAOVIETBANK' => 'BAOVIETBANK',
            'BANGKOKBANK' => 'BANGKOKBANK',
            'BIDV' => 'BIDV',
            'BFCE' => 'BFCE',
            'BIDC' => 'BIDC',
            'BNK' => 'BNK',
            'CBBANK' => 'CBBANK',
            'CCB' => 'CCB',
            'CIMB' => 'CIMB',
            'CITIBANK' => 'CITIBANK',
            'CTBC' => 'CTBC',
            'COOPBANK' => 'CO-OPBANK',
            'DONGABANK' => 'DONGABANK',
            'EXIMBANK' => 'EXIMBANK',
            'HDBANK' => 'HDBANK',
            'HONGLEONGBANK' => 'HONGLEONGBANK',
            'LIENVIETPOSTBANK' => 'LIENVIETPOSTBANK',
            'LBBANK' => 'LBBANK',
            'KIENLONGBANK' => 'KIENLONGBANK',
            'MBBANK' => 'MBBANK',
            'MSBBANK' => 'MSBBANK',
            'NAMABANK' => 'NAMABANK',
            'NCB BANK' => 'NCB BANK',
            'OCB BANK' => 'OCB BANK',
            'OCEANBANK' => 'OCEANBANK',
            'PVBANK' => 'PVBANK',
            'SACOMBANK' => 'SACOMBANK',
            'SAIGONBANK' => 'SAIGONBANK',
            'SCBBANK' => 'SCBBANK',
            'SEABANK' => 'SEABANK',
            'SHBBANK' => 'SHBBANK',
            'SHIHANBANK' => 'SHIHANBANK',
            'TECHCOMBANK' => 'TECHCOMBANK',
            'TPBANK' => 'TPBANK',
            'VIBBANK' => 'VIBBANK',
            'VIETABANK' => 'VIETABANK',
            'VIETBANK' => 'VIETBANK',
            'VIETCAPITALBANK' => 'VIETCAPITALBANK',
            'VIETCOMBANK' => 'VIETCOMBANK',
            'VIETINBANK' => 'VIETINBANK',
            'VIKKIBANK' => 'VIKKIBANK',
            'VPBANK' => 'VPBANK',
            'WOORIBANK' => 'WOORIBANK',
        ];
        return view('pages.setting', compact('user', 'banks', 'item'));
    }

    public function postSetting(Request $request)
    {
        $request->validate([
            'bank_name' => 'required',
            'account_name' => 'required',
            'account_number' => 'required',
        ]);

        $item = DB::table('setting')->orderBy('id', 'desc')->first();


        $data = $request->all();
        $user = Auth::user();

        DB::table('setting')->where('id', $item->id)
            ->update([
                'bank_name' => $data['bank_name'],
                'account_name' => $data['account_name'],
                'account_number' => $data['account_number'],
            ]);
        return response()->json([
            'message' => [
                'title' => '',
                'text'  => 'Đã cập nhật thông tin ngân hàng thành công',
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
            ->join('user', 'user.id', '=', 'bet.user_id')
            ->select('user.account', 'user.username', 'session.session_id', 'session.number', 'session.result', 'bet.bet', 'bet.status', 'bet.betMoney', 'bet.timeInt', 'bet.id')
            ->where('bet.timeInt', '>=', strtotime($from))
            ->where('bet.timeInt', '<=', strtotime($to))
            ->orderBy('bet.id', 'desc')
            ->paginate(10);
        return view('pages.history_bet', compact('user', 'item_bet'));
    }

    public function postHistoryBet(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();

        $s_from = $data['s-fromdate'];
        $s_to = $data['s-todate'];

        $arr_f = explode('/', $s_from);
        $s_from = $arr_f[2] . '-' . $arr_f[1] . '-' . $arr_f[0];

        $arr_f = explode('/', $s_to);
        $s_to = $arr_f[2] . '-' . $arr_f[1] . '-' . $arr_f[0];

        $from = $s_from . ' 00:00:00';
        $to = $s_to . ' 23:59:59';

        $query = DB::table('bet')
            ->join('session', 'session.session_id', '=', 'bet.session_id')
            ->join('user', 'user.id', '=', 'bet.user_id')
            ->select('user.account', 'user.username', 'session.session_id', 'session.number', 'session.result', 'bet.bet', 'bet.status', 'bet.betMoney', 'bet.timeInt', 'bet.id')
            ->where('bet.timeInt', '>=', strtotime($from))
            ->where('bet.timeInt', '<=', strtotime($to));
        if ($data['s-status'] == 1) {
            $query->where('bet.status', 1);
        } elseif ($data['s-status'] == 2) {
            $query->where('bet.status', 2);
        }
        $data_list = $query->orderBy('bet.id', 'desc')->paginate(10);
        return view('pages.subpages.history_list', compact('data_list'));
    }
    
     public function postStatusBet(Request $request)
    {
        $request->validate([
            'status' => 'required',
        ]);
        $data = $request->all();
        DB::table('bet')->where('id', $data['bet_id'])
            ->update([
                'status' => $data['status'],
                'bet' => $data['type']
            ]);
        return response()->json([
            'message' => [
                'title' => '',
                'text'  => 'Đã cập nhật kết quả cược thành công',
                'type'  => 'success',
            ],
        ], 200);
    }

    public function deposit()
    {
        $user = Auth::user();
        $from = date('Y-m-d 00:00:00');
        $to = date('Y-m-d 23:59:59');
        $item_deposit = DB::table('deposit_history')
            ->join('user', 'user.id', '=', 'deposit_history.user_id')
            ->select('deposit_history.*', 'user.account', 'user.username', 'user.account_name')
            ->orderBy('id', 'desc')
            ->get();
        return view('pages.deposit', compact('user', 'item_deposit', 'from', 'to'));
    }
    public function postDeposit(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();

        $s_from = $data['s-fromdate'];
        $s_to = $data['s-todate'];

        $arr_f = explode('/', $s_from);
        $s_from = $arr_f[2] . '-' . $arr_f[1] . '-' . $arr_f[0];

        $arr_f = explode('/', $s_to);
        $s_to = $arr_f[2] . '-' . $arr_f[1] . '-' . $arr_f[0];

        $from = $s_from . ' 00:00:00';
        $to = $s_to . ' 23:59:59';

        $data_list = DB::table('deposit_history')
        ->join('user', 'user.id', '=', 'deposit_history.user_id')
        ->select('deposit_history.*', 'user.account', 'user.username', 'user.account_name')
        ->orderBy('id', 'desc')
        ->get();
        return view('pages.subpages.deposit_list', compact('data_list', 'from', 'to'));
    }
    

    public function postConfirmDeposit(Request $request)
    {
        $data = $request->all();
        $data_list = [];
        if ($data['status'] == 3) {
            DB::table('deposit_history')->delete($data['id_deposit']);
        } else {
            if ($data['status'] == 1) {
                $deposit = DB::table('deposit_history')->where('id', $data['id_deposit'])->first();
                $user = DB::table('user')->where('id', $deposit->user_id)->first();
                $amount = floatval($deposit->amount);
                $balance = floatval($user->balance) + $amount;
                DB::table('user')->where('id', $deposit->user_id)
                ->update([
                    'balance' => $balance,
                ]);
            }
            DB::table('deposit_history')->where('id', $data['id_deposit'])
                ->update([
                    'status' => $data['status'],
                    'time_updated' => gmdate('D M d Y H:i:s TO')
                ]);
        }

        $message = 'Đã xoá lệnh nạp tiền thành công.';
        if ($data['status'] == 1) {
            $message = 'Đã duyệt lệnh nạp tiền thành công.';
        } elseif ($data['status'] == 2) {
            $message = 'Đã từ chối xác nhận lệnh nạp tiền.';
        }
        return response()->json([
            'message' => [
                'title' => '',
                'text'  => $message,
                'type'  => 'success',
            ],
        ], 200);
    }

    public function withdraw()
    {
        $user = Auth::user();
        $from = date('Y-m-d 00:00:00');
        $to = date('Y-m-d 23:59:59');
        $item_withdraw = DB::table('withdraw_history')
        ->join('user', 'user.id', '=', 'withdraw_history.user_id')
        ->select('withdraw_history.*', 'user.account', 'user.username')
        ->orderBy('withdraw_history.id', 'desc')
        ->get();
        return view('pages.withdraw', compact('user', 'item_withdraw', 'from', 'to'));
    }

    public function postWithdraw(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();

        $s_from = $data['s-fromdate'];
        $s_to = $data['s-todate'];

        $arr_f = explode('/', $s_from);
        $s_from = $arr_f[2] . '-' . $arr_f[1] . '-' . $arr_f[0];

        $arr_f = explode('/', $s_to);
        $s_to = $arr_f[2] . '-' . $arr_f[1] . '-' . $arr_f[0];

        $from = $s_from . ' 00:00:00';
        $to = $s_to . ' 23:59:59';

        $data_list = DB::table('withdraw_history')
        ->join('user', 'user.id', '=', 'withdraw_history.user_id')
        ->select('withdraw_history.*', 'user.account', 'user.username')
        ->orderBy('withdraw_history.id', 'desc')
        ->get();
        return view('pages.subpages.withdraw_list', compact('data_list', 'from', 'to'));
    }

    public function postConfirmWithdraw(Request $request)
    {
        $data = $request->all();
        $data_list = [];
        if ($data['status'] == 3) {
            DB::table('withdraw_history')->delete($data['id_withdraw']);
        } else {
            if ($data['status'] == 2) {
                $withdraw = DB::table('withdraw_history')->where('id', $data['id_withdraw'])->first();
                $user = DB::table('user')->where('id', $withdraw->user_id)->first();
                $amount = floatval($withdraw->amount);
                $balance = floatval($user->balance) + $amount;
                DB::table('user')->where('id', $withdraw->user_id)
                    ->update([
                        'balance' => $balance,
                    ]);
            }
            DB::table('withdraw_history')->where('id', $data['id_withdraw'])
            ->update([
                'note' => $data['note'],
                'status' => $data['status'],
                'time_updated' => gmdate('D M d Y H:i:s TO')
            ]);
        }

        $message = 'Đã xoá lệnh nạp tiền thành công.';
        if ($data['status'] == 1) {
            $message = 'Đã duyệt lệnh nạp tiền thành công.';
        } elseif ($data['status'] == 2) {
            $message = 'Đã từ chối xác nhận lệnh nạp tiền.';
        }
        return response()->json([
            'message' => [
                'title' => '',
                'text'  => $message,
                'type'  => 'success',
            ],
        ], 200);
    }

    public function bank()
    {
        $user = Auth::user();
        $banks = [
            'ABBANK' => 'ABBANK',
            'ACBBANK' => 'ACBBANK',
            'AGRIBANK' => 'AGRIBANK',
            'ANZBANK' => 'ANZBANK',
            'BACABANK' => 'BACABANK',
            'BAOVIETBANK' => 'BAOVIETBANK',
            'BANGKOKBANK' => 'BANGKOKBANK',
            'BIDV' => 'BIDV',
            'BFCE' => 'BFCE',
            'BIDC' => 'BIDC',
            'BNK' => 'BNK',
            'CBBANK' => 'CBBANK',
            'CCB' => 'CCB',
            'CIMB' => 'CIMB',
            'CITIBANK' => 'CITIBANK',
            'CTBC' => 'CTBC',
            'COOPBANK' => 'CO-OPBANK',
            'DONGABANK' => 'DONGABANK',
            'EXIMBANK' => 'EXIMBANK',
            'HDBANK' => 'HDBANK',
            'HONGLEONGBANK' => 'HONGLEONGBANK',
            'LIENVIETPOSTBANK' => 'LIENVIETPOSTBANK',
            'KIENLONGBANK' => 'KIENLONGBANK',
            'LBBANK' => 'LBBANK',
            'MBBANK' => 'MBBANK',
            'MSBBANK' => 'MSBBANK',
            'NAMABANK' => 'NAMABANK',
            'NCB BANK' => 'NCB BANK',
            'OCB BANK' => 'OCB BANK',
            'OCEANBANK' => 'OCEANBANK',
            'PVBANK' => 'PVBANK',
            'SACOMBANK' => 'SACOMBANK',
            'SAIGONBANK' => 'SAIGONBANK',
            'SCBBANK' => 'SCBBANK',
            'SEABANK' => 'SEABANK',
            'SHBBANK' => 'SHBBANK',
            'SHIHANBANK' => 'SHIHANBANK',
            'TECHCOMBANK' => 'TECHCOMBANK',
            'TPBANK' => 'TPBANK',
            'VIBBANK' => 'VIBBANK',
            'VIETABANK' => 'VIETABANK',
            'VIETBANK' => 'VIETBANK',
            'VIETCAPITALBANK' => 'VIETCAPITALBANK',
            'VIETCOMBANK' => 'VIETCOMBANK',
            'VIETINBANK' => 'VIETINBANK',
            'VIKKIBANK' => 'VIKKIBANK',
            'VPBANK' => 'VPBANK',
            'WOORIBANK' => 'WOORIBANK',
        ];

        $item_bank = DB::table('user')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.bank', compact('user', 'banks', 'item_bank'));
    }

    public function postBank(Request $request)
    {
        $data = $request->all();
        $query = DB::table('user')
            ->orderBy('id', 'desc');
        if (!is_null($data['s-username'])) {
            $query->where('account', 'like', '%' . $data['s-username'] . '%');
        }
        if (!is_null($data['s-account-number'])) {
            $query->where('account_number', 'like', '%' . $data['s-account-number'] . '%');
        }
        $data_list = $query->orderBy('id', 'desc')->paginate(10);
        return view('pages.subpages.bank_list', compact('data_list'));
    }

    public function updateBank(Request $request)
    {

        $request->validate([
            'bank_name' => 'required',
            'account_name' => 'required',
            'account_number' => 'required',
            'branch' => 'required',
        ]);


        $data = $request->all();

        DB::table('user')->where('id', $data['user_id'])
            ->update([
                'bank_name' => $data['bank_name'],
                'account_name' => $data['account_name'],
                'account_number' => $data['account_number'],
                'branch' => $data['branch'],
            ]);
        return response()->json([
            'message' => [
                'title' => '',
                'text'  => 'Đã cập nhật thông tin ngân hàng thành công',
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
        if ($data['fund_password'] !== $data['fund_password_confirm']) {
            return response()->json([
                'message' => [
                    'title' => '',
                    'text'  => 'Mật khẩu xác nhận không đúng.',
                    'type'  => 'warning',
                ],
            ], 200);
        }
        $user = Auth::user();
        DB::table('user')->where('id', $user->id)
            ->update(['fund_password' => Hash::make($data['fund_password'])]);
        return response()->json([
            'message' => [
                'title' => '',
                'text'  => 'Cập nhật mật khẩu quỹ thành công.',
                'type'  => 'success',
            ],
        ], 200);
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
