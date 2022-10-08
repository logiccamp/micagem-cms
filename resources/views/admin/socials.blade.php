@extends('layouts.admin')

@section('content')
<div class="panel box-shadow-none content-header">
    <div class="panel-body">
        <div class="col-md-12">
            <h3 class="animated fadeInLeft">Social Media </h3>
            <p class="animated fadeInDown">
                Home <span class="fa-angle-right fa"></span> Social Media
            </p>
        </div>
    </div>
</div>
<div class="container-fluid settings">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="card p-2 h-100">
                                @if (Session::has('message'))
                                <p class="text-danger">{{Session::get('message')}}</p>
                                @endif
                                <p></p>
                                <h3 class="text-center">ADD NEW</h3>
                                <form action="{{route('addSocial')}}" method="POST" class="form p-3">
                                    @csrf
                                    <input type="text" name="social" class="form-control" placeholder="Enter Social media name">
                                    <button class="btn my-3 btn-gradient btn-default">Add New</button>
                                </form>
                                <div>
                                    <table class="table table-stripped">
                                        <thead>
                                            <tr>
                                                <th align="center">Name</th>
                                                <th align="center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allSocials as $social)
                                            <tr>
                                                <td>
                                                    <strong>{{$social->title}}</strong>
                                                </td>
                                                <td align="center">
                                                    <form action="{{route('deleteSocial')}}" method="post">
                                                        @csrf
                                                        <input type="text" value="{{$social->id}}" hidden name="social">
                                                        <button class="btn btn-danger text-danger">&times;</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form action="{{route('updateSocial')}}" method="post">
                                @csrf
                                <ul class="card p-3">
                                    @foreach ($allSocials as $social)
                                    <li class="my-2 p-2">
                                        <strong>{{$social->title}}</strong>
                                        <input type="text" value="{{ $social->Handle == null ? '' : $social->Handle->handle }}" name="{{$social->id}}" class="form-control" placeholder="Paste your link here">
                                    </li>
                                    @endforeach
                                    <button class="btn w-100 btn-gradient btn-success"> Save </button>
                                </ul>
                            </form>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection