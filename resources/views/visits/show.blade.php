@extends('layouts.app')
@section('content')
  <a href="/visits" class="btn btn-default" role="button">Go Back</a>
  <h1>Visit Date: {!!$visit->date!!}</h1>
  <div>
    <p> Time: {!!$visit->time!!}</p>
  </div>
  <div>
    <p> Duration: {!!$visit->duration!!} minutes</p>
  </div>
  <div>
    <p> Cost: €{!!$visit->cost!!}</p>
  </div>
  <hr>
  <small>Created at {{$visit->created_at}}</small>
  <hr>
  @if(!Auth::guest())
    @if(Auth::user()->id == $visit->user_id)
      <a href="/visits/{{$visit->id}}/edit" class="btn btn-default">Edit</a>

      {!!Form::open(['action' => ['VisitsController@destroy', $visit->id], 'method' => 'POST', 'class'=> 'float-right'])!!}
          {{Form::hidden('_method', 'DELETE')}}
          {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
      {!!Form::close()!!}
    @endif
  @endif
@endsection
