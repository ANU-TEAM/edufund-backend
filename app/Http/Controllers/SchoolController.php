<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use App\Traits\ApiResponder;
use App\Http\Resources\SchoolResource;

class SchoolController extends Controller
{
    use ApiResponder;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.schools.index')->with('schools', School::all());
    }

    public function apiIndex()
    {
        return $this->success(
            SchoolResource::collection(School::all()), 'Schools fetched successfully', 200
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.schools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'abbr' => 'required|string',
            'name' => 'required|string|min:10',
        ]);

        $school = new School;


        if ($school->where('name', $request->name)->exists()) {


            $request->session()->flash('info', '"'.$request->name.'" already exists.');
            $request->session()->flash('title', 'School');

            return  redirect()->back();

        }

        if ($school->where('abbr', $request->abbr)->exists()) {


            $request->session()->flash('info', 'A School with the abbreviation "'.$request->abbr.'" already exists.');
            $request->session()->flash('title', 'School');

            return  redirect()->back();

        }

        $school->name = $request->name;
        $school->abbr = $request->abbr;

        $school->saveOrFail();

        $request->session()->flash('success', ''.$request->abbr.' has been successfully created.');
        $request->session()->flash('title', 'School');

        return  redirect()->route('schools.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        return view('admin.schools.edit')->with('school', $school);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        $this->validate($request, [
            'abbr' => 'required|string',
            'name' => 'required|string|min:10',
        ]);
        
        if ((School::where('abbr', $request->abbr)->exists()) and
            ($request->abbr != $school->abbr)) {

            $request->session()->flash('info', 'A School with the abbreviation "'.$request->abbr.'" already exists.');
            $request->session()->flash('title', 'School');

            return  redirect()->back();

        }
        
        if ((School::where('name', $request->name)->exists()) and
            ($request->name != $school->name)) {

            $request->session()->flash('info', '"'.$request->name.'" already exists.');
            $request->session()->flash('title', 'School');

            return  redirect()->back();

        }


        $school->update([
            'name' => $request->name,
            'abbr' => $request->abbr,
        ]);

        $request->session()->flash('success', ''.$request->abbr.' has been successfully updated.');
        $request->session()->flash('title', 'School');

        return  redirect()->route('schools.index');

    }

    /**
     * Delete the specified school.
     *
     * @param  School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        if($school->applications->count() === 0){
            $school->delete();

            session()->flash('success', ''.$school->abbr.' has been successfully deleted.');
            session()->flash('title', 'School');
        } else{
            session()->flash('info', ''.$school->abbr.' has applications associated with it.');
            session()->flash('title', 'School');
        }

        return  redirect()->route('schools.index');
    }
}
