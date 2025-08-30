<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center" scope="col">Número</th>
            <th class="text-center">Resultados da loteria</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($item_last as $value)
        <tr>
            <td class="text-center">{{ $value->number }}</td>
            <td class="text-center">
                <div class="number-2">
                    <span>{{ substr($value->result,0,1) }}</span>
                    <span>{{ substr($value->result,1,1) }}</span>
                    <span>{{ substr($value->result,2,1) }}</span>
                    <span>{{ substr($value->result,3,1) }}</span>
                    <span>{{ substr($value->result,4,1) }}</span>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>