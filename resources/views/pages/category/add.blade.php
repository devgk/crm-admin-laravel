@extends('layouts.appLayout')

@section('content')
    @include('components.sideNav')

    <main class="content">
        @include('components.topBar')

        <div class="py-4">
            <div class="row">
                <div class="col-12 mb-4">
                    <form method="POST" action="{{ route('category.add') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card border-0 shadow components-section">
                            <div class="card-header border-bottom">
                                <h3 class="m-0">Add Category</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-4">
                                    <label for="name">Category Name</label>
                                    <input type="text" class="form-control @error('name') border-danger @enderror" name="name" id="name" placeholder="Category Name" required>
                                    
                                    @if ($errors->has('name'))
                                        <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                                    @else
                                        <small class="form-text text-muted">Category Name. Please keep it unique.</small>
                                    @endif
                                </div>

                                <div class="mb-0">
                                    <label for="description">Category Description</label>
                                    <textarea class="form-control @error('description') border-danger @enderror" placeholder="Category Description" id="description" name="description" rows="4"></textarea>

                                    @if ($errors->has('description'))
                                        <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                                    @else
                                        <small class="form-text text-muted">Category description is optional.</small>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col">
                                        <button class="btn btn-secondary" type="submit">Add Category</button>
                                    </div>
                                    <div class="col text-end">
                                        <a class="btn btn-danger" type="submit" href="{{ route('category.listing') }}">Cancel</a>
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
