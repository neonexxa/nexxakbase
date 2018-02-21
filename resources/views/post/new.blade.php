@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    {!! Form::open(['route' => 'post.store','files' => true]) !!}
                        
                        <div class="form-group">
                            {{Form::label('title', 'Title', ['class' => 'col-md-4 control-label'])}}
                            <div class="col-md-6">
                                {{Form::text('title', Null,['class' => 'form-control','required'])}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('description', 'Description', ['class' => 'col-md-4 control-label'])}}
                            <div class="col-md-6">
                                {{Form::textarea('description', Null,['class' => 'form-control','required'])}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('pdf', 'PDF', ['class' => 'col-md-4 control-label'])}}
                            <div class="col-md-6">
                                {{Form::file('pdf')}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::submit('Add',['class' => 'btn btn-success btn-block'])}}    
                        </div>
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
