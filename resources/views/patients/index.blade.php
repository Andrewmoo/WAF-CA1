@extends('layouts.app')
@section('content')
<div class="container J-margin">
  <h1>Patients</h1>
  @if(count($patients) > 0)
    @foreach($patients as $patient)
      <div class="card cardMargin">
        <div class="card-body">
          <h2><a href="/patients/{{$patient->id}}">{{$patient->name}}</a></h2>
          <small>Created at {{$patient->created_at}}</small>
        </div>
      </div>
    @endForeach
    {{$patients->links()}}
  @else
    <p>No patients found</p>
  @endif
</div>
@endsection
