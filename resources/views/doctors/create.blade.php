@extends('layouts.app')
@section('content')
<div class="container J-margin">
  <h1>Create Doctor</h1>
  {!! Form::open(['action' => 'DoctorsController@store', 'method' => 'POST']) !!}
    <div class = "form-group">
      {{Form::label('name', 'Name')}}
      {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>
    <div class = "form-group">
      {{Form::label('address', 'Address')}}
      {{Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Address'])}}
    </div>
    <div class = "form-group">
      {{Form::label('phone', 'Phone')}}
      {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone'])}}
    </div>
    <div class = "form-group">
      {{Form::label('email', 'Email')}}
      {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email'])}}
    </div>
    <div class = "form-group">
      {{Form::label('employment_date', 'Employment_date')}}
      {{Form::text('employment_date', '', ['class' => 'form-control', 'placeholder' => 'Employment_date'])}}
    </div>

    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
  {!! Form::close() !!}
</div>
@endsection
