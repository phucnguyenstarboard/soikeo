<div class="row" id="tabpanel">
    <div class="col-12">
        <div class="card overflow-hidden">
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered t2-datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">手术</th>
                                    <th class="text-center">帐户名称</th>
                                    <th class="text-center">银行名称</th>
                                    <th class="text-center">银行分行</th>
                                    <th class="text-center">银行账户名称 </th>
                                    <th class="text-center">银行帐号</th>
                                    <th class="text-center">创建时间</th>
                                    <th class="text-center">更新时间</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_list as $k => $item)
                                @php
                                $d_link = '';
                                $d_update = '';
                                $date = $item->time_linking_bank;
                                if(!empty($date)){
                                $tz1 = 'UTC';
                                $tz2 = 'Asia/Ho_Chi_Minh'; // UTC +7
                                $findme = '(';
                                $pos = strpos($date, $findme );
                                if ($pos !== false) {
                                $date = substr($date,0, $pos);
                                }
                                $d_link = new DateTime($date, new DateTimeZone($tz1));
                                $d_link->setTimeZone(new DateTimeZone($tz2));
                                $d_link = $d_link->format('Y-m-d H:i:s');
                                }

                                $date = $item->time_update_bank;

                                if(!empty($date)){
                                $tz1 = 'UTC';
                                $tz2 = 'Asia/Ho_Chi_Minh'; // UTC +7
                                $findme = '(';
                                $pos = strpos($date, $findme );
                                if ($pos !== false) {
                                $date = substr($date,0, $pos);
                                }
                                $d_update = new DateTime($date, new DateTimeZone($tz1));
                                $d_update->setTimeZone(new DateTimeZone($tz2));
                                $d_update = $d_update->format('Y-m-d H:i:s');
                                }

                                @endphp
                                <tr>
                                    <td class="text-center">{{ $k + 1 }}</td>
                                    <td class="text-center">
                                        <button data-accountnumber="{{ $item->account_number }}" data-accountname="{{ $item->account_name }}" data-branch="{{ $item->branch }}" data-bankname="{{ $item->bank_name }}" data-account="{{ $item->account }}" data-username="{{ $item->username }}" data-id="{{ $item->id }}" type="button" class="btn-show-modal btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-light">更新</button>
                                    </td>
                                    <td class="text-center">{{ $item->account }}</td>
                                    <td class="text-center">{{ $item->bank_name }}</td>
                                    <td class="text-center">{{ $item->branch }}</td>
                                    <td class="text-center">{{ $item->account_name }}</td>
                                    <td class="text-center">{{ $item->account_number }}</td>
                                    <td class="text-center">{{ $d_link }}</td>
                                    <td class="text-center">{{ $d_update }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-1"></div>
                    {{ $data_list->links() }}
                </div>
            </div>
        </div>
    </div>
</div>