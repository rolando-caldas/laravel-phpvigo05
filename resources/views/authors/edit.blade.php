@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Author</div>

                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/author/' . $author->id . '/edit') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="photo" class="col-md-4 control-label">Photo</label>
                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control" name="photo" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$author->name}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="surname" class="col-md-4 control-label">Surname</label>
                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname" value="{{$author->surname}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="birthday" class="col-md-4 control-label">Birthday</label>
                            <div class="col-md-6">
                                <input id="birthdate" type="date" class="form-control" name="birthdate" value="{{$author->birthdate}}" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bio" class="col-md-4 control-label">Bio</label>
                            <div class="col-md-6">
                                <textarea id="bio" class="form-control" name="bio">{{$author->bio}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Update</button>
                            </div>
                        </div>
                </div>
            </div>            
        </div>
    </div>
</div>
@endsection
