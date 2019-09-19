@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header">
        Add New Quote
      </div>
      <div class="card-body">
        {!! Form::open(['method' => 'POST', 'route' => 'quotes.store', 'class' => 'form-horizontal']) !!}

            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                {!! Form::label('category', 'Category') !!}
                {!! Form::text('category', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('category') }}</small>
            </div>

            <div class="form-group{{ $errors->has('quote') ? ' has-error' : '' }}">
                {!! Form::label('quote', 'Quote') !!}
                {!! Form::textarea('quote', null, ['class' => 'form-control', 'required' => 'required','rows'=>3]) !!}
                <small class="text-danger">{{ $errors->first('quote') }}</small>
            </div>

            <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                {!! Form::label('author', 'Author') !!}
                {!! Form::text('author', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('author') }}</small>
            </div>

            <div class="btn-group pull-right">
                {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
                {!! Form::submit("Create Quote", ['class' => 'btn btn-success']) !!}
            </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection
