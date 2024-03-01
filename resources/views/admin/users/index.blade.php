@extends('layouts.admin')

@section('title', 'Users List')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="card">

                <div class="card-header">
                    <h4>
                        Users
                        <a href="{{ url('admin/users/create') }}" class="btn btn-primary btn-sm text-white float-end">
                            Add Users
                        </a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>User Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->user_type == 'user')
                                            <label for="" class="badge btn-primary">User</label>
                                        @elseif($user->user_type == 'admin')
                                            <label for="" class="badge btn-success">Admin</label>
                                        @elseif($user->user_type == 'staff')
                                            <label for="" class="badge btn-info">Staff</label>
                                        @else
                                            <label for="" class="badge btn-primary">None</label>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/users/' . $user->id . '/edit') }}"
                                            class="btn btn-success btn-sm">Edit</a>
                                        <a href="{{ url('admin/users/' . $user->id . '/delete') }}"
                                            onclick="return confirm('Are you sure, you want to delete this data?')"
                                            class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No User Available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>{{ $users->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
