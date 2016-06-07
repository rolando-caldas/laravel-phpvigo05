@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Book</div>

                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/book/' . $book->id . '/edit') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="poster" class="col-md-4 control-label">Poster</label>
                            <div class="col-md-6">
                                <input id="poster" type="file" class="form-control" name="photo" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">Title</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{$book->title}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="author_id" class="col-md-4 control-label">Author</label>
                            <div class="col-md-6">
                                <select id="author_id" name="author_id">
                                    @foreach ($authors AS $author)
                                    <option value="{{$author->id}}" @if($author->id === $book->author->id) selected @endif>{{$author->fullname()}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="extract" class="col-md-4 control-label">Extract</label>
                            <div class="col-md-6">
                                <textarea id="extract" class="form-control" name="extract">{{$book->extract}}</textarea>
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
