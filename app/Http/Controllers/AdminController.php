<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addView()
    {
        return view('admin.add_doctor');
    }

    public function upload(Request $request)
    {
        $doctor = new doctor;

        $image = $request->file;

        $imagename = time() . '.' . $image->getClientOriginalExtension();

        $request->file->move('doctorimage', $imagename);

        $doctor->image = $imagename;

        $doctor->name = $request->name;

        $doctor->phone = $request->number;

        $doctor->room = $request->room;

        $doctor->specialty = $request->specialty;

        $doctor->save();

        return redirect()->back()->with('message', 'Doctor added successfully');
    }

    public function manage_appointments()
    {
        $appointmentDetails = Appointment::all();
        return view('admin.manage_appointments', compact('appointmentDetails'));
    }

    public function approve($id)
    {
        $data = Appointment::find($id);
        $data->status = 'approved';

        $data->save();

        return redirect()->back();
    }

    public function rejectAppointment($id)
    {
        $data = Appointment::find($id);
        $data->status = 'cancelled';

        $data->save();

        return redirect()->back();
    }

    public function showDoctors()
    {
        $allDoctors = doctor::all();
        return view('admin.showDoctors', compact('allDoctors'));
    }

    public function deleteDoctor($id)
    {
        $selectedDoctor = doctor::find($id);
        $selectedDoctor->delete();

        return redirect()->back();
    }

    public function updateDoctor($id)
    {
        $selectedDoctor = doctor::find($id);

        return view('admin.updateDoctor', compact('selectedDoctor'));
    }

    public function editDoctor(Request $request, $id)
    {
        $selectedDoctor = doctor::find($id);

        $selectedDoctor->name = $request->name;

        $selectedDoctor->phone = $request->number;

        $selectedDoctor->specialty = $request->specialty;

        $selectedDoctor->room = $request->room;


        $image = $request->file;

        if ($image) {

            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->file->move('doctorimage', $imagename);

            $selectedDoctor->image = $imagename;
        }

        $selectedDoctor->save();

        return redirect()->back()->with('message', 'Doctor\'s details updated successfully');
    }
}
