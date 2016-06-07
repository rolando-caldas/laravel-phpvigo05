@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Authors</div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Birthday</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($authors as $author)
                            <tr>
                                <td>{{$author->name}}</td>
                                <td>{{$author->surname}}</td>
                                <td>{{$author->birthdate}}</td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <a href="/author/{{$author->slug}}"
                                           class="btn btn-default" 
                                           role="button"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                        <a href="/author/{{$author->id}}/edit"
                                           class="btn btn-default" 
                                           role="button"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                        <a href="/author/{{$author->id}}/delete"
                                           class="btn btn-default" 
                                           role="button"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">No authors</td>
                            </tr>
                            @endforelse                    
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">New Author</div>

                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/author') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="photo" class="col-md-4 control-label">Photo</label>
                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control" name="photo" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="surname" class="col-md-4 control-label">Surname</label>
                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="birthday" class="col-md-4 control-label">Birthday</label>
                            <div class="col-md-6">
                                <input id="birthdate" type="date" class="form-control" name="birthdate" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bio" class="col-md-4 control-label">Bio</label>
                            <div class="col-md-6">
                                <textarea id="bio" class="form-control" name="bio"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Create</button>
                            </div>
                        </div>
                </div>
            </div>            
        </div>
    </div>
</div>
@endsection
