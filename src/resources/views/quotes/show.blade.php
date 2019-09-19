@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-body">
        <blockquote class="blockquote">
          <p class="mb-0">{{$quote->quote}}</p>
          <footer class="blockquote-footer" style="color:red"><cite title="Source Title">{{$quote->category}}</cite></footer>
          <footer class="blockquote-footer">{{$quote->author}}</footer>
          <a href="{{route('quotes.edit',$quote->id)}}">Edit</a>
          {!! Form::model($quote, ['route' => ['quotes.destroy', $quote->id], 'method' => 'DELETE']) !!}


              <div class="btn-group pull-right">
                  {!! Form::submit("Delete", ['class' => 'btn btn-danger']) !!}
              </div>

          {!! Form::close() !!}
        </blockquote>
      </div>
    </div>
  </div>

@endsection
