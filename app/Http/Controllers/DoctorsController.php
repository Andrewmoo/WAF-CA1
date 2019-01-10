<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;

class DoctorsController extends Controller
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
        $doctors = Doctor::orderBy('created_at','desc')->paginate(10);
        return view('doctors.index')->with('doctors', $doctors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctors.create');
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
          'name' => 'required',
          'phone' => 'required',
          'email' => 'required',
          'employment_date' => 'required',
          'address' => 'required'
        ]);

        //create post
        $doctor = new Doctor;
        $doctor->name = $request->input('name');
        $doctor->phone = $request->input('phone');
        $doctor->email = $request->input('email');
        $doctor->employment_date = $request->input('employment_date');
        $doctor->address = $request->input('address');
        $doctor->save();

        return redirect('/doctors')->with('success', 'Doctor Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::find($id);
        return view('doctors.show')->with('doctor', $doctor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $doctor = Doctor::find($id);

      return view('doctors.edit')->with('doctor', $doctor);
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
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required',
        'employment_date' => 'required',
        'address' => 'required'
      ]);

      //create post
      $doctor = Doctor::find($id);
      $doctor->name = $request->input('name');
      $doctor->phone = $request->input('phone');
      $doctor->email = $request->input('email');
      $doctor->employment_date = $request->input('employment_date');
      $doctor->address = $request->input('address');
      $doctor->save();

      return redirect('/doctors')->with('success', 'Doctor Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor =Doctor::find($id);
        //Check for correct user_id


        $doctor->delete();
        return redirect('/doctors')->with('success', 'Doctor Removed');
    }
}
