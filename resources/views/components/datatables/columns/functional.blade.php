{
    data: '{{ $alias }}',
    name: '{{ $name }}',
    title: '{{ $title }}',
    orderable: {{ $orderable }},
    searchable: {{ $searchable }},
    "render": function(data, type, full, meta){
        {!! $function !!}
    }
},