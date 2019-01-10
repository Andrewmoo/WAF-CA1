@extends('layouts.app')
@section('content')
  <h1>Edit Patient</h1>
  {!! Form::open(['action' => ['PatientssController@update', $patient->id ], 'method' => 'POST']) !!}
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
    {{Form::label('medical_insurance', 'Medical_insurance')}}
    {{Form::text('medical_insurance', '', ['class' => 'form-control', 'placeholder' => 'Medical_insurance'])}}
  </div>
  <div class = "form-group">
    {{Form::label('insurance_company', 'Insurance_company')}}
    {{Form::text('insurance_company', '', ['class' => 'form-control', 'placeholder' => 'Insurance_company'])}}
  </div>
  <div class = "form-group">
    {{Form::label('policy_number', 'Policy_number')}}
    {{Form::text('policy_number', '', ['class' => 'form-control', 'placeholder' => 'Policy_number'])}}
  </div>
  {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection
