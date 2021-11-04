<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $students = Student::orderBy('date')->get();
        $helpers = $students->sortBy('name');
        return view('list.index')->with('students', $students)->with('helpers', $helpers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('list.create', [
            'students' => Student::orderBy('date')->get()
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'name' => 'required',
        ]);
        $date = Carbon::parse($request->input('date'));
        Student::create([
            'name' => $request->input('name'),
            // 'date' => $date->format('y-m-d')

        ]);
        return redirect()->action([StudentController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $this->validate($request,
        [
            'date' => 'required',
            'helper' => 'required',
        ]);
        $date = Carbon::parse($request->input('date'));
        $student = Student::findOrFail($id);
        $student->date = $date->format('Y-m-d');
        $student->helper = $request->input('helper');
        $student->save();
        return redirect('/list')->withErrors(['msg' => 'Sėkmingai atnaujinta']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect('/dashboard');
    }
}
