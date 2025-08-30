<div class="row" id="tabpanel">
    <div class="col-12">
        <div class="card overflow-hidden">
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered t1-datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">Tempo de transação</th>                                    
                                    <th class="text-center">Tipo de transação</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Valor da transação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_list as $item)
                                @php
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
                                $d_update = new DateTime($date, new DateTimeZone($tz1));
                                $d_update->setTimeZone(new DateTimeZone($tz2));
                                $d_update = $d_update->format('Y-m-d H:i:s');
                                }

                                @endphp
                                @if(strtotime($from) < strtotime($d_update) && strtotime($to)> strtotime($d_update))
                                    <tr>                                        
                                        <td class="text-center">{{ $d_update }}</td>                                        
                                        <td class="text-center">{{ (int)$item->type === 0 ? 'Saque' : 'Depósito' }}</td>
                                        <td class="text-center">{{ $item->status == 1 ? 'Aprovado' : ($item->status == 2 ? 'Recusar' : 'Pendente') }}</td>
                                        <td class="text-center">R$ {{ number_format($item->amount) }}</td>
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