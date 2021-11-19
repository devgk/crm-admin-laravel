@extends('layouts.appLayout')

@section('content')
    @include('components.sideNav')

    <main class="content">
        @include('components.topBar', [
            'route' => route('product.add'),
            'text'  => 'Product'
        ])

        <div class="py-4">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="m-0">Manage Products</h3>
                            </div>
                            <div class="card-body">
                                @include('components.datatables.advanceDataTable', [
                                    'id'        => 'product-datatable',
                                    'ajax_url'  => '/product/ajax',
                                    'columns'   => $datatable_columns
                                ])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
