@extends('layouts.app')
@section('content')
  <a href="/patients" class="btn btn-default" role="button">Go Back</a>
  <h1>Patient Name: {!!$patient->name!!}</h1>
  <div>
    <p> Address: {!!$patient->address!!}</p>
  </div>
  <div>
    <p> Mobile: {!!$patient->phone!!}</p>
  </div>
  <div>
    <p> Email: {!!$patient->email!!}</p>
  </div>
  <div>
    <p>Insurnce Company: {{$patient->insurance_company}}</p>
  </div>
  <div>
    <p>Policy Number: {{$patient->policy_number}}</p>
  </div>
  <hr>
  <small>Patient created at: {{$patient->created_at}}</small>
  <hr>
  @if(!Auth::guest())
    @if(Auth::user()->id == $patient->user_id)
      <a href="/patients/{{$patient->id}}/edit" class="btn btn-default">Edit</a>

      {!!Form::open(['action' => ['PatientsController@destroy', $patient->id], 'method' => 'POST', 'class'=> 'float-right'])!!}
          {{Form::hidden('_method', 'DELETE')}}
          {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
      {!!Form::close()!!}
    @endif
  @endif
@endsection
