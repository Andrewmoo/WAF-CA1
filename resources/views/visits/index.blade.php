@extends('layouts.app')
@section('content')
<div class="container J-margin">
  <h1>Visits</h1>
  @if(count($visits) > 0)
    @foreach($visits as $visit)
      <div class="card cardMargin">
        <div class="card-body">
          <h2><a href="/visits/{{$visit->id}}">{{$visit->date}}</a></h2>
          <small>Created at {{$visit->created_at}}</small>
        </div>
      </div>
    @endForeach
    {{$visits->links()}}
  @else
    <p>No visits found</p>
  @endif
</div>
@endsection
