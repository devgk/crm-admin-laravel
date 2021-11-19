<table
    id="{{$id}}"
    class="simple-datatables table table-striped w-100">
    <thead>
        <tr>
            @foreach ($columns as $column)
                @if ('hidden' != $column['type'])
                    <th>{{$column['title']}}</th>
                @endif
            @endforeach
        </tr>
    </thead>
    <tbody></tbody>
</table>

<script>
    var datatable_columns_structure = [
        @foreach ($columns as $column)
            @switch($column['type'])
                @case('simple')
                    @include('components.datatables.columns.simple', [
                        'alias'     => $column['alias'],
                        'title'     => $column['title'],
                        'name'      => $column['name'],
                        'orderable' => 'false',
                        'searchable'=> 'false',
                    ])
                @break

                @case('action')
                    @include('components.datatables.columns.action', [
                        'title'     => $column['title'],
                        'function'  => $column['function'],
                    ])
                @break
            
                @default
                @break
            @endswitch
        @endforeach
    ];

    var datatable_order_by = [[0, 'DESC']];
</script>