<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visit;

class VisitsController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth', ['except' => ['index', 'show']]);
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        $visits = Visit::orderBy('created_at','desc')->paginate(10);
        return view('visits.index')->with('visits', $visits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'date' => 'required',
          'time' => 'required',
          'duration' => 'required',
          'cost' => 'required'
        ]);

        //create post
        $visit = new Visit;
        $visit->date = $request->input('date');
        $visit->time = $request->input('time');
        $visit->duration = $request->input('duration');
        $visit->cost = $request->input('cost');
        $visit->user_id = auth()->user()->id;
        $visit->save();

        return redirect('/visits')->with('success', 'Visit Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visit = Visit::find($id);
        return view('visits.show')->with('visit', $visit);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $visit = Visit::find($id);

      //Check for correct user_id
      if(auth()->user()->id !==$visit->user_id){
          return redirect('/visits')->with('error', 'Unauthorised Page');
      }
      return view('visits.edit')->with('visit', $visit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request,[
        'date' => 'required',
        'time' => 'required'
      ]);

      //create post
      $visit = Visit::find($id);
      $visit->date = $request->input('date');
      $visit->time = $request->input('time');
      $visit->save();

      return redirect('/visits')->with('success', 'Visit Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visit =Visit::find($id);
        //Check for correct user_id
        if(auth()->user()->id !==$visit->user_id){
            return redirect('/visits')->with('error', 'Unauthorised Page');
        }

        $visit->delete();
        return redirect('/visits')->with('success', 'Visit Removed');
    }
}
