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
                            {{ Form::text('query','Search for...', ['class' => 'form-control']) }}
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Go!</button>
                            </span>
                        </div><!-- /input-group -->
                    {!! Form::close() !!}
                </div>
            </div>
            @if (session()->has('posts'))
                @foreach (session('posts') as $post)
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $post->title }}</div>

                    <div class="panel-body">
                        {{ $post->id }}
                    </div>
                </div>
                    
                @endforeach

            {{ session('posts')->appends(request()->input())->links() }}
            @endif
        </div>
    </div>
</div>
@endsection
