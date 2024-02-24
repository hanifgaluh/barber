<?php

namespace App\Http\Controllers;

use App\Models\StaffSchedule;
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
        return view('staff-schedule.index', compact('staffSchedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $staff = StaffSchedule::pluck('name', 'id');
        return view('staff-schedule.create', compact('staff'));
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        StaffSchedule::create($request->validated());
        return redirect()->route('staff-schedule.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('staff-schedule.show', compact('staffSchedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $staff = StaffSchedule::pluck('name', 'id');
        return view('staff-schedule.edit', compact('staffSchedule', 'staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $staffSchedule = StaffSchedule::findOrFail($id);
        $staffSchedule->update($request->validated());
        return redirect()->route('staff-schedule.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staffSchedule = StaffSchedule::findOrFail($id);
        $staffSchedule->delete();
        return redirect()->route('staff-schedule.index');
    }
}
