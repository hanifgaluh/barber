<?php

namespace App\Http\Controllers;

use App\Models\StaffSchedule;
use App\Models\Staff;
use App\Http\Requests\StoreStaffScheduleRequest;
use App\Http\Requests\UpdateStaffScheduleRequest;
use Illuminate\Http\Request;


class StaffScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffSchedules = StaffSchedule::with('staff')->get();

        return view('appointment/staff-schedule', compact('staffSchedules'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $staffs = Staff::pluck('name', 'id');
        return view('createSchedule', compact('staffs'));
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        StaffSchedule::create($request->validated());
        return redirect('/dashboard/appointment');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('showSchedule', compact('staffSchedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $staff = StaffSchedule::pluck('name', 'id');
        return view('editSchedule', compact('staffSchedule', 'staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $staffSchedule = StaffSchedule::findOrFail($id);
        $staffSchedule->update($request->validated());
        return redirect('/dashboard/appointment');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staffSchedule = StaffSchedule::findOrFail($id);
        $staffSchedule->delete();
        return redirect('/dashboard/appointment');
    }

    public function submitForm(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'staff_id' => 'required|exists:staff,id',
            'time' => 'required|date_format:H:i',
        ]);

        // Create a new instance of StaffSchedule model
        $staffSchedule = new StaffSchedule();
        $staffSchedule->staff_id = $validatedData['staff_id'];
        $staffSchedule->time = $validatedData['time'];

        // Save the staff schedule to the database
        $staffSchedule->save();

        // Redirect back to form or any other page
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
}
