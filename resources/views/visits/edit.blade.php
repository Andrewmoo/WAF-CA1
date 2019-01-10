@extends('layouts.app')
@section('content')
  <h1>Edit Visit</h1>
  {!! Form::open(['action' => ['VisitsController@update', $visit->id ], 'method' => 'POST']) !!}
    <div class = "form-group">
      {{Form::label('date', 'Date')}}
      {{Form::date('date', '', ['class' => 'form-control', 'placeholder' => 'Date'])}}
    </div>
    <div class = "form-group">
      {{Form::label('time', 'Time')}}
      {{Form::text('time', '', ['class' => 'form-control', 'placeholder' => 'Time'])}}
    </div>
    <div class = "form-group">
      {{Form::label('duration', 'Duration')}}
      {{Form::text('duration', '', ['class' => 'form-control', 'placeholder' => 'Duration'])}}
    </div>
    <div class = "form-group">
      {{Form::label('cost', 'Cost')}}
      {{Form::text('cost', '', ['class' => 'form-control', 'placeholder' => 'Cost'])}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
  {!! Form::close() !!}
@endsection
