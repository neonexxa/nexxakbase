@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    {!! Form::open(['route' => 'search','method' => 'get']) !!}
                        <div class="input-group">
                            {{ Form::text('query',Null, ['class' => 'form-control','placeholder' => 'Search for...']) }}
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="submit">Go!</button>
                            </span>
                        </div><!-- /input-group -->
                    {!! Form::close() !!}
                </div>
            </div>
            @if (session()->has('posts'))
                @foreach (session('posts') as $post)
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>{{ $post->title }}</strong></div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8">
                                {{str_limit($post->description, 100)}}
                                
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-warning btn-block">View PDF</button>
                                <button class="btn btn-danger btn-block">Download PDF</button>
                            </div>
                        </div>
                    </div>
                </div>
                    
                @endforeach

            {{ session('posts')->appends(request()->input())->links() }}
            {{-- @else
                <div class="panel panel-default">
                    <div class="panel-body">
                        Opps.. Noting Found Here {{old('query')}}     
                    </div>
                </div> --}}
            @endif
        </div>
    </div>
</div>
@endsection
