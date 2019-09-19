@extends('layouts.app')

@section('content')
  <h1>Quotes</h1>
<hr>
<div class="container">
  @foreach ($quotes as $key => $quote)
    <div class="card">
      <div class="card-body">
        <blockquote class="blockquote">
        <p class="mb-0"><a href="{{route('quotes.show',$quote->id)}}">{{$quote->quote}}</a></p>
        <br>
        <footer class="blockquote-footer">{{$quote->author}}<cite title="Source Title">{{$quote->category}}</cite></footer>
      </blockquote>
      </div>
    </div><br>
  @endforeach
</div>
@endsection
