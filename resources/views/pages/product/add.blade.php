@extends('layouts.appLayout')

@section('content')
@include('components.sideNav')

<main class="content">
    @include('components.topBar')

    <div class="py-4">
        <div class="row">
            <div class="col-12 mb-4">
                <form method="POST" action="{{ route('product.add') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="card border-0 shadow components-section">
                        <div class="card-header border-bottom">
                            <h3 class="m-0">Add Products</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <label for="title">Product Title</label>
                                <input type="text" class="form-control @error('name') border-danger @enderror"
                                    name="title" id="title" placeholder="Product Title" required>

                                @if ($errors->has('title'))
                                <small class="form-text text-danger">{{ $errors->first('title') }}</small>
                                @else
                                <small class="form-text text-muted">Product Name. Please keep it unique.</small>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label for="description">Product Description</label>
                                <textarea class="form-control @error('name') border-danger @enderror"
                                    placeholder="Product Description" id="description" name="description" rows="4"
                                    required></textarea>

                                @if ($errors->has('description'))
                                <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                                @else
                                <small class="form-text text-muted">Product description</small>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="my-1 me-2" for="category">Product Category</label>
                                @if (count($categories))
                                <select class="form-select" id="category" name="category" required>
                                    <option selected>Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>

                                    @endforeach
                                </select>
                                @else
                                <select class="form-select" id="category" name="category" disabled required>
                                    <option selected>Select Category</option>
                                </select>
                                @endif
                            </div>
                            <div class="mb-0">
                                <div class="row">
                                    <div class="col">
                                        <label for="price">Product Price</label>
                                        <input type="price" class="form-control @error('price') border-danger @enderror" name="price" id="price" placeholder="Product Price" required>

                                        @if ($errors->has('price'))
                                        <small class="form-text text-danger">{{ $errors->first('price') }}</small>
                                        @else
                                        <small class="form-text text-muted">Product price in USD.</small>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <label for="image" class="form-label">Product Image</label>
                                        <input class="form-control" type="file" id="image" name="image">
                                        <small class="form-text text-muted">Product image is optional.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-secondary" type="submit">Add Product</button>
                                </div>
                                <div class="col text-end">
                                    <a class="btn btn-danger" type="submit"
                                        href="{{ route('product.listing') }}">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
