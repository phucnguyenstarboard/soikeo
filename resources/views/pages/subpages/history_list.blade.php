<div class="row" id="tabpanel">
    <div class="col-12">
        <div class="card overflow-hidden">
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered t1-datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">Número</th>
                                    <th class="text-center">Você selecionou</th>
                                    <th class="text-center">Resultados da loteria</th>
                                    <th class="text-center">Valor da aposta</th>
                                    <th class="text-center">Valor recebido</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Tempo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_list as $item)
                                <tr>
                                    <td class="text-center">{{ $item->number }}</td>
                                    <td class="text-center">{{ $item->bet == 1 ? 'Exportar' : 'Importar' }}</td>
                                    <td class="text-center">{{ $item->status == 0 ? 'Pendente' : $item->result }}</td>
                                    <td class="text-center">R$ {{ number_format($item->betMoney) }}</td>
                                    <td class="text-center">R$ {{ $item->status == 1 ? number_format($item->betMoney) : ($item->status == 2 ? 0 : '0') }}</td>
                                    <td class="text-center">{{ $item->status == 1 ? 'Ganhar' : ($item->status == 2 ? 'Perder' : 'Pendente') }}</td>
                                    <td class="text-center">{{ date('d/m/Y H:i:s', $item->timeInt) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>