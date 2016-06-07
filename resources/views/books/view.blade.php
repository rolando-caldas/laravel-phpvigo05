@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">View Book</div>

                <div class="panel-body">
                    
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-md-4">
                                <img src="{{ url('/static/' . $book->poster) }}" alt="" title="" class="img-responsive">
                            </div>
                            <div class="col-xs-12 col-md-8">
                                <div class="h2">
                                    {{$book->title }} <a href="{{url('/author/' . $book->author->slug)}}" class="small">{{$book->author->fullname()}}</a>
                                </div>
                                <div>
                                    {{$book->extract}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>
@endsection
