@extends('layouts.appLayout')

@section('content')
    @include('components.sideNav')

    <main class="content">
        @include('components.topBar')

        <a href="{{ route('dashboard') }}" class="btn btn-primary">Return Back</a>

        <div class="py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <img src="@php
                                        if(!empty($product->image)) echo '/storage/'.$product->image;
                                        else echo 'http://placehold.it/1280x800';
                                    @endphp" class="w-100">
                                </div>
                                <div class="col-8">
                                    <h1>{{ $product->title }}</h1>
                                    <p>Category: {{ $product->category->name }}</p>

                                    <h2 class="my-3">Price: {{ $product->price }} $USD</h2>

                                    <p>
                                        @if ($product->description)
                                            {{ $product->description }}
                                        @else
                                            This product dose not have any description.
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
