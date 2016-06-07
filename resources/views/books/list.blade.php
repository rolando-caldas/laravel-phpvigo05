@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Books</div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($books as $book)
                            <tr>
                                <td>{{$book->title}}</td>
                                <td>{{$book->author->fullname()}}</td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <a href="/book/{{$book->slug}}"
                                           class="btn btn-default" 
                                           role="button"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                        <a href="/book/{{$book->id}}/edit"
                                           class="btn btn-default" 
                                           role="button"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                        <a href="/book/{{$book->id}}/delete"
                                           class="btn btn-default" 
                                           role="button"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">No books</td>
                            </tr>
                            @endforelse                    
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">New Book</div>

                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/book') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="poster" class="col-md-4 control-label">Poster</label>
                            <div class="col-md-6">
                                <input id="poster" type="file" class="form-control" name="poster" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">Title</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="author_id" class="col-md-4 control-label">Author</label>
                            <div class="col-md-6">
                                <select id="author_id" name="author_id">
                                    @foreach ($authors AS $author)
                                    <option value="{{$author->id}}">{{$author->fullname()}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="extract" class="col-md-4 control-label">Extract</label>
                            <div class="col-md-6">
                                <textarea id="extract" class="form-control" name="extract"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>            
        </div>
    </div>
</div>
@endsection
