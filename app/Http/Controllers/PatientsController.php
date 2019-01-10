<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class PatientsController extends Controller
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
        $patients = Patient::orderBy('created_at','desc')->paginate(10);
        return view('patients.index')->with('patients', $patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
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
          'address' => 'required',
          'phone' => 'required',
          'email' => 'required',
          'medical_insurance' => 'required',
          'insurance_company' => 'required',
          'policy_number' => 'required'
        ]);

        //create post
        $patient = new Patient;
        $patient->name = $request->input('name');
        $patient->address = $request->input('address');
        $patient->phone = $request->input('phone');
        $patient->email = $request->input('email');
        $patient->medical_insurance = $request->input('medical_insurance');
        $patient->insurance_company = $request->input('insurance_company');
        $patient->policy_number = $request->input('policy_number');
        $patient->save();

        return redirect('/patients')->with('success', 'Patient Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);
        return view('patients.show')->with('patient', $patient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $patient = Patient::find($id);

      //Check for correct user_id
      if(auth()->user()->id !==$patient->user_id){
          return redirect('/patients')->with('error', 'Unauthorised Page');
      }
      return view('patients.edit')->with('patient', $patient);
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
        'address' => 'required',
        'phone' => 'required',
        'email' => 'required',
        'medical_insurance' => 'required',
        'insurance_company' => 'required',
        'policy_number' => 'required'

      ]);

      //create post
      $patient = Patient::find($id);
      $patient->name = $request->input('name');
      $patient->address = $request->input('address');
      $patient->phone = $request->input('phone');
      $patient->email = $request->input('email');
      $patient->medical_insurance = $request->input('medical_insurance');
      $patient->insurance_company = $request->input('insurance_company');
      $patient->policy_number = $request->input('policy_number');
      $patient->save();

      return redirect('/patients')->with('success', 'Patient Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient =Patient::find($id);
        //Check for correct user_id
        if(auth()->user()->id !==$patient->user_id){
            return redirect('/patients')->with('error', 'Unauthorised Page');
        }

        $patient->delete();
        return redirect('/patients')->with('success', 'Patient Removed');
    }
}
