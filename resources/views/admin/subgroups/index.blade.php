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
                        Sub Group List
                        <a href="{{ url('admin/subgroups/create') }}" class="btn btn-primary btn-sm text-white float-end">
                            Add Sub Group
                        </a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Group</th>
                                <th>Sub Group Title</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subgroups as $subgroup)
                                <tr>
                                    <td>{{ $subgroup->id }}</td>
                                    <td>{{ $subgroup->group->group_title }}</td>
                                    <td>{{ $subgroup->sub_group_title }}</td>
                                    <td>
                                        <img src="{{asset("$subgroup->image")}}" style="width:70px; hieght:70px" alt="Slider">
                                    </td>
                                    <td>{{ $subgroup->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('admin.subgroups.edit', $subgroup->id) }}"
                                            class="btn btn-success">Edit</a>
                                        <a href="{{ url('admin/subgroups/' . $subgroup->id . '/delete') }}"
                                            onclick="return confirm('Are you sure you want to delete this?')"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
