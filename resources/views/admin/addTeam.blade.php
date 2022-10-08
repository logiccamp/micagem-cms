@extends('layouts.admin')

@section('content')
<div class="panel box-shadow-none content-header" style="position: relative;">
    <div class="panel-body">
        <div class="col-md-12">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="animated fadeInLeft">{{isset($team) ? 'Edit Team' : 'Add Team'}} </h3>
                    <p class="animated fadeInDown">
                        Home <span class="fa-angle-right fa"></span> {{isset($team) ? 'Edit Team' : 'Add Team'}}
                    </p>
                </div>
                <div>
                    <h3>
                        <a href="/admin/team/">go back</a>
                    </h3>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="container-fluid settings">
    <div class="row">
        <div class="col-12 m-2">
            <div class="card">
                <div class="card-heading py-5">

                </div>
                <div class="card-body">
                    <form action="{{isset($team) ? route('updateTeam', $team->id) : route('addTeam')}}" class="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex align-items-center justify-content-end">
                            <button type="submit" class="btn btn-gradient btn-success">{{isset($team) ? 'Update' : 'Add Team'}}</button>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="">Name</label>
                                <input id="name" value="{{isset($team) ? $team->name : ''}}" type="text" require name="name" id="" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Post <small>[optional]</small></label>
                                <input id="post" type="text" name="post" value="{{isset($team) ? $team->post : ''}}" id="" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">Picture</label>
                                @if(isset($team))
                                <input type="file" class="form-control" name="image" id="" class="form-group">
                                @else
                                <input required type="file" class="form-control" name="image" id="" class="form-group">
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Information</label>
                                <textarea required name="description" id="" cols="30" rows="10" class="form-control">{{isset($team) ? $team->description : ''}}</textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection