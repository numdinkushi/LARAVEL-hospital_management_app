<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::User()->usertype == '0') {
                $doctor = Doctor::all();
                return view('user.home', compact('doctor'));
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }

    public function index()
    {
        if (Auth::id()) {
            return redirect('home');
        } else {

            $doctor = Doctor::all();
            return view('user.home', compact('doctor'));
        }
    }

    public function appointment(Request $request)
    {
        $data=new appointment();

        $data->name=$request->name;

        $data->doctor=$request->doctor;

        $data->email=$request->email;

        $data->date=$request->date;

        $data->phone=$request->number;

        $data->message=$request->message;

        $data->doctor=$request->doctor;

        $data->status='In progress';

        if(Auth::id()){
            $data->user_id=Auth::user()->id;
        }

           $data->save();

           return redirect()->back()->with('message', "appointment successfully booked. We will contact you soon.");
    }

    public function my_appointment()
    {
        if(Auth::id()){
            $userId=Auth::user()->id;
            $userAppointments=appointment::where('user_id', $userId )->get();
            return view('user.my_appointment', compact('userAppointments'));
        }
        else {
            return redirect()->back();
        }

    }

    public function cancel_appointment($id)
    {
        $data=Appointment::find($id);
        $data->delete();

        return redirect()->back();
    }
}
