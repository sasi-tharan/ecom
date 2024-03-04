@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="card">

                <div class="card-header">
                    <h4>
                        Edit Product
                        <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm text-white float-end">
                            Back
                        </a>
                    </h4>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Add this line to specify the HTTP method for update -->

                        <!-- Rest of the code remains unchanged -->

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <!-- ... (unchanged) ... -->
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <!-- ... (unchanged) ... -->
                        </div>

                        <div class="py-2 float-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
