<table
    id="{{$id}}"
    data-ajax-url="{{$ajax_url}}"
    class="advance-datatables table table-striped w-100">
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
                        'orderable' => isset($column['orderable']) ? $column['orderable'] : 'false',
                        'searchable'=> isset($column['searchable']) ? $column['searchable'] : 'false',
                    ])
                @break

                @case('functional')
                    @include('components.datatables.columns.functional', [
                        'alias'     => $column['alias'],
                        'title'     => $column['title'],
                        'name'      => $column['name'],
                        'orderable' => isset($column['orderable']) ? $column['orderable'] : 'false',
                        'searchable'=> isset($column['searchable']) ? $column['searchable'] : 'false',
                        'function'  => $column['function'],
                    ])
                @break

                @case('action')
                    @include('components.datatables.columns.action', [
                        'title'     => $column['title'],
                        'function'  => $column['function'],
                    ])
                @break

                @case('hidden')
                    @include('components.datatables.columns.hidden', [
                        'alias'     => $column['alias'],
                        'name'      => $column['name'],
                        'orderable' => isset($column['orderable']) ? $column['orderable'] : 'false',
                        'searchable'=> isset($column['searchable']) ? $column['searchable'] : 'false',
                    ])
                @break
            
                @default
                @break
            @endswitch
        @endforeach
    ];

    var datatable_order_by = [
        @foreach ($columns as $index => $column)
            @if (isset($column['initial_order']) && 'true' == $column['initial_order'])
                [{{$index}}, 'DESC']
            @endif
        @endforeach
    ];
</script>