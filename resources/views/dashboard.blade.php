@extends('layouts.app')

@section('content')
<div class="container J-margin">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/visits/create" class="btn btn-default noPadding">Create Visit</a>
                    <h3>Your Visits</h3>
                    @if(count($visits) > 0)
                    <table class="table table-striped">
                      <tr>
                        <th>Date</th>
                        <th></th>
                        <th></th>
                      </tr>
                      @foreach($visits as $visit)
                        <tr>
                          <td>{{$visit->date}}</td>
                          <td><a href="/visits/{{$visit->id}}/edit" class="btn btn-default">Edit</a></td>
                          <td>  {!!Form::open(['action' => ['VisitsController@destroy', $visit->id], 'method' => 'POST', 'class'=> 'float-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}</td>
                        </tr>
                      @endforeach
                    </table>
                  @else
                    <p>You have no visits scheduled</p>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
