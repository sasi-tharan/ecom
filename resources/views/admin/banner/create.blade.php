@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h4>
                        Add Banner
                        <a href="{{url('admin/banners')}}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Description</label>
                                <textarea name="description" id=""  class="form-control"  rows="3"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Status</label><br/>
                                <input type="checkbox" name="status"  />
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary float-end">Save</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
