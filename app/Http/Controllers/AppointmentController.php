<?php

namespace App\Http\Controllers;

use App\Http\Requests\Frontend\Appointment\AppointmentStoreRequest;
use App\Repositories\AppointmentRepository;
use App\Repositories\BlogRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    protected  $blog, $appointment;

    public  function __construct(BlogRepository $blog,AppointmentRepository $appointment)
    {
        $this->blog =$blog;
        $this->appointment = $appointment;
    }

    public function index(){
        $blogs = $this->blog->where('is_active','1')->orderBy('created_at','desc')->take(3)->get();
    return view('appointment.index')->withBlogs($blogs);
    }

    public function store(AppointmentStoreRequest $request){
        $data = $request->except('_token');
            $data['user_id'] =Auth::user()->id;
        if($this->appointment->create($data)){

            return redirect()->to('/appointment')->with('success','Appointment booked successfully!'.'<br>'.' We will contact you soon');
        }
        return redirect()->back()->with('errors','Appointment cannot booked successfully');
    }

    public function show(){
        $id = Auth::user()->id;
        $appointments = $this->appointment->where('user_id',$id)->orderBy('created_at','desc')->paginate(1000);
        return view('appointment.show')->withAppointments($appointments);
    }
}
