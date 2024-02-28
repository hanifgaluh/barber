<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function index()
    {
        $appointment = Appointment::all();

        return view('appointment.index', compact('appointment'));
    }

    public function create()
    {
        return view('appointment.create');
    }

    public function process_create(request $request)
    {
        $request->validate([
            'name_customer' => 'required',
            'hair_artist' => 'required',
            'date' => 'required',
            'time' => 'required',
            'price' => 'required',
            'store' => 'required',
        ]);

        Appointment::create($request->all());

        return redirect('/dashboard/appointment');
    }
    public function process_update(Request $request, string $id)
    {
        $request->validate([
            'name_customer' => 'required',
            'hair_artist' => 'required',
            'date' => 'required',
            'time' => 'required',
            'price' => 'required',
            'store' => 'required',
        ]);

        $appointment = Appointment::findOrFail($request->id);
        $appointment->update([
            'name_customer' => $request->name_customer,
            'hair_artist' => $request->hair_artist,
            'date' => $request->date,
            'time' => $request->time,
            'price' => $request->price,
            'store' => $request->store,
        ]);

        return redirect('/dashboard/appointment');
    }
    public function show_appointment(string $id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('appointment.show', compact('appointment'));
    }

    public function edit_appointment($id)
    {
        $appointment = Appointment::findOrFail('appointment');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_customer' => 'required',
            'hair_artist' => 'required',
            'date' => 'required',
            'time' => 'required',
            'price' => 'required',
            'store' => 'required',
        ]);
        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->all());

        $redirect = redirect()->route('appointment.index');
        return $redirect->with('success','Appointment update successfully');
    }

    public function destroy(string $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        $redirect = redirect()->route('appointment.index');
        return $redirect->with('success', 'Appointment deleted successfully');   
    }
}
