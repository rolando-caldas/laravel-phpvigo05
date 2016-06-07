@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">View Author</div>

                <div class="panel-body">
                    
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-md-4">
                                <img src="{{ url('/static/' . $author->photo) }}" alt="" title="" class="img-responsive">
                            </div>
                            <div class="col-xs-12 col-md-8">
                                <div class="h2">
                                    {{$author->name . ' ' . $author->surname }} <span class="small">{{$author->birthdate}}</span>
                                </div>
                                <div>
                                    {{$author->bio}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Author's Books</div>
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
                            @forelse($author->books as $book)
                            <tr>
                                <td>{{$book->title}}</td>
                                <td>{{$author->fullname()}}</td>
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
        </div>
    </div>
</div>
@endsection
