@extends('layouts.admin')

@section('content')
<div id="content" style="padding: 0; margin: 0;">
    <div class="container-fluid">
        <div class="mt-5 row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Account Security</h3>
                    </div>
                    @if(Session::has('message'))
                    @if(Session::get('message') == "success")
                    <div class="alert alert-success">
                        <p>{{Session::get('message')}}</p>
                    </div>
                    @else
                    <div class="alert alert-danger">
                        <p>{{Session::get('message')}}</p>
                    </div>
                    @endif
                    @endif
                    <div class="card-body">
                        <form action="{{route('updatePassword')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Current Password</label>
                                <input type="password" name="oldpassword" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">New Password</label>
                                <input type="password" name="password" required class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input type="password" name="password_confirmation" required class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="col-md-6" style="display: none;">
                <div class="card">
                    <div class="card-header">
                        <h3>All Users</h3>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->status}}</td>
                                    <td>
                                        <form action="" method="post">
                                            @csrf
                                            @if (auth()->user()->email == "admin@topclasscarpets.com")
                                            <button class="btn btn-success" type="submit">&times;</button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection