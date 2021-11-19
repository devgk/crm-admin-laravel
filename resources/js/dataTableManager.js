window.addEventListener('load', (event) => {
    $('.advance-datatables').each(function(index){
        let datatable = $(this);
        let datatable_id = $(this).attr('id');

        let search_container = "#" + datatable_id + "_filter input";

        datatable.DataTable({
            responsive: true,
            pageLength: 25,
            dom: "<'row'<'col-md-6 col-12 export-column'lB><'col-md-6 col-12'f>>" + "<'row'<'col-12'tr>>" + "<'row'<'col-md-5 col-12'i><'col-md-7 col-12'p>>",
            lengthMenu: [
                [ 25, 50, 100 ],
                [ '25', '50', '100']
            ],
            buttons: [
                {
                    extend: 'csv',
                    text: 'CSV',
                    className: 'btn btn-secondary btn-sm'
                }, {
                    extend: 'excel',
                    text: 'EXCEL',
                    className: 'btn btn-secondary btn-sm'
                }
            ],
            processing: true,
            serverSide: true,
            search: {
                "regex": true
            },
            initComplete: function(){
                var api = this.api();
                $(search_container).off('.DT').on('keypress.DT', function (e) {
                    if (e.key == 13) {
                        api.search(this.value).draw();
                    }
                });
            },
            ajax: {
                'url' : datatable.data('ajax-url'),
                'type': 'POST',
                'headers': {
                    'X-CSRF-TOKEN': csrf_token
                },
            },
            columns: datatable_columns_structure,
            "order": datatable_order_by,
        });
    });
});