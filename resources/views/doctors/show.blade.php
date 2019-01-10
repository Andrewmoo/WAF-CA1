@extends('layouts.app')
@section('content')
  <a href="/patients" class="btn btn-default" role="button">Go Back</a>
  <h1>Doctor Name: {!!$doctor->name!!}</h1>
  <div>
    <p> Address: {!!$doctor->address!!}</p>
  </div>
  <div>
    <p> Mobile: {!!$doctor->phone!!}</p>
  </div>
  <div>
    <p> Email: {!!$doctor->email!!}</p>
  </div>
  <div>
    <p>Employed on: {{$doctor->employment_date}}</p>
  </div>
  @if(!Auth::guest())
      <a href="/doctors/{{$doctor->id}}/edit" class="btn btn-default">Edit</a>

      {!!Form::open(['action' => ['DoctorsController@destroy', $doctor->id], 'method' => 'POST', 'class'=> 'float-right'])!!}
          {{Form::hidden('_method', 'DELETE')}}
          {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
      {!!Form::close()!!}

  @endif
@endsection
