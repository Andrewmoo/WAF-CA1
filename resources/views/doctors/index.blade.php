@extends('layouts.app')
@section('content')
<div class="container J-margin">
  <h1>Doctors</h1>
  @if(count($doctors) > 0)
    @foreach($doctors as $doctor)
      <div class="card cardMargin">
        <div class="card-body">
          <h2><a href="/doctors/{{$doctor->id}}">{{$doctor->name}}</a></h2>
          <small>Employed on {{$doctor->employment_date}}</small>
        </div>
      </div>
    @endForeach
    {{$doctors->links()}}
  @else
    <p>No doctors found</p>
  @endif
</div>
@endsection
