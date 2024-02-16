<?php

namespace App\Http\Controllers;

use App\Models\staff;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;


class StaffController extends Controller
{

    public function index()
    {
        $staffs = Staff::all();
        return view('staff.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() : view
    {
        
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'price' => 'required|integer',
            'loc_store' => 'required'
        ]);

        $staff = new Staff([
            'name' => $request->input('name'),
            'photo' => $request->file('photo')->store('public/photos'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'loc_store' => $request->input('loc_store')
        ]);

        $staff->save();
        return redirect('/staff')->with('success', 'Staff has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff) : view
    {
        return view('staff.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff) : view
    {
        return view('staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'price' => 'required|integer',
            'loc_store' => 'required'
        ]);

        $staff->name = $request->input('name');
        $staff->photo = $request->file('photo')->store('public/photos');
        $staff->description = $request->input('description');
        $staff->price = $request->input('price');
        $staff->loc_store = $request->input('loc_store');
        $staff->save();

        return redirect('/staff')->with('success', 'Staff has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff) : view
    {
        $staff->delete();
        return redirect('/staff')->with('success', 'Staff has been deleted');
    }
}