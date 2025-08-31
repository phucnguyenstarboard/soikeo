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
                                    <th class="text-center">操作</th>
                                    <th class="text-center">帐户名称</th>
                                    <th class="text-center">提款金额</th>
                                    <th class="text-center">银行账户名称</th>
                                    <th class="text-center">银行帐号</th>
                                    <th class="text-center">银行名称</th>
                                    <th class="text-center">IP地址</th>
                                    <th class="text-center">地位</th>
                                    <th class="text-center">创建时间</th>
                                    <th class="text-center">更新时间</th>
                                    <th class="text-center">笔记</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_list as $k => $item)
                                @php
                                $d_create = '';
                                $d_update = '';

                                $date = $item->time_created;

                                if(!empty($date)){
                                $tz1 = 'UTC';
                                $tz2 = 'Asia/Ho_Chi_Minh'; // UTC +7
                                $findme = '(';
                                $pos = strpos($date, $findme );
                                if ($pos !== false) {
                                $date = substr($date,0, $pos);
                                }
                                $d_create = new DateTime($date, new DateTimeZone($tz1));
                                $d_create->setTimeZone(new DateTimeZone($tz2));
                                $d_create = $d_create->format('Y-m-d H:i:s');
                                }

                                $date = $item->time_updated;

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
                                @if(strtotime($from) < strtotime($d_update) && strtotime($to)> strtotime($d_update))
                                    <tr>
                                        <td class="text-center">{{ $k + 1 }}</td>
                                        <td class="text-center">
                                            @if($item->status == 0)
                                            <button data-status="1" data-id="{{ $item->id }}" type="button" class="btn-confirm btn btn-primary">接受</button>
                                            <button data-status="2" data-id="{{ $item->id }}" type="button" class="btn-confirm btn btn-outline-danger">拒绝</button>
                                            @endif
                                            <button data-status="3" data-id="{{ $item->id }}" type="button" class="btn-confirm btn btn-danger">删除</button>
                                        </td>
                                        <td class="text-center">{{ $item->account }}</td>
                                        <td class="text-center">R$ {{ number_format($item->amount) }}</td>
                                        <td class="text-center">{{ $item->account_name }}</td>
                                        <td class="text-center">{{ $item->account_number }}</td>
                                        <td class="text-center">{{ $item->bank_name }}</td>
                                        <td class="text-center">{{ $item->ip }}</td>
                                        <td class="text-center">{{ $item->status == 1 ? 'Approved' : ($item->status == 2 ? 'Rejected' : 'Pending') }}</td>
                                        <td class="text-center">{{ $d_create }}</td>
                                        <td class="text-center">{{ $d_update }}</td>
                                        <td class="text-center">{{ $item->note }}</td>

                                    </tr>
                                    @endif
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>