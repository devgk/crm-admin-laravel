@extends('layouts.appLayout')

@section('content')
    @include('components.sideNav')

    <main class="content">
        @include('components.topBar')

        <div class="py-4">
            <div class="row justify-md-content-start justify-content-around">

                @if (count($products))
                    @foreach ($products as $product)
                        <div class="col-lg-3 col-md-4 col-8 mb-4">
                            <div class="card border-0 shadow components-section">
                                <img class="card-img-top" src="@php
                                    if(!empty($product->image)) echo '/storage/'.$product->image;
                                    else echo 'http://placehold.it/640x400';
                                @endphp" >
                                <div class="card-body">
                                    <h3 class="m-0">{{ $product->title }}</h3>
                                    <p>
                                        @if ($product->description)
                                            {{ substr($product->description, 0, 100) }}
                                        @else
                                            This product dose not have any description.
                                        @endif
                                    </p>
                                    <a class="btn btn-primary" href="{{ route('product.singleProduct', [$product->slug]) }}" type="button">View Product</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                <div class="col-12 mb-4">
                    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                        There is not products. Please add product first.
                    </div>
                </div>
                @endif

            </div>
        </div>
    </main>
@endsection
