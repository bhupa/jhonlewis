<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\Backend\Appointment\AppointmentReplyMailRequest;
use App\Http\Requests\Frontend\Appointment\AppointmentStoreRequest;
use App\Mail\AppointmentMail;
use App\Mail\Contact\AdminContactReplyMail;
use App\Mail\Contact\ContactReplyMail;
use App\Repositories\AppointmentRepository;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AppointmentController extends Controller
{
    protected $appointments, $category,$setting;

    public function __construct(AppointmentRepository $appointments,SettingRepository $setting)
    {
        $this->appointments = $appointments;
        $this->setting = $setting;

    }
    public function index()
    {
        $appointments = $this->appointments->orderBy('created_at','desc')->paginate('10000');
        return view('backend.appointment.index')->withappointments($appointments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.appointment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $appointments = $this->appointments->find($id);
        return view('backend.appointment.edit')->withAppointments($appointments);
    }
    public function show($id){
        $appointment = $this->appointments->find($id);
        return view('backend.appointment.show')->withAppointment($appointment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointments = $this->appointments->find($id);

        if($this->appointments->destroy($appointments->id)){

            $message = 'appointments delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'appointments cannot be delete'],422);
    }
    public function store(AppointmentReplyMailRequest $request){
        $data= $request->except('_token','description');
        $data = $this->appointments->find($request->id);
        $data['description']= $request->description;
        $data['cc'] ='CC of contact message reply';
        $adminEmail = $this->setting->where('slug','for-admin')->first();
        $companyName = $this->setting->where('slug','compant-name')->first();
        $fromEmail = $this->setting->where('slug','reply-email')->first();
        $company = [
            'name'=>$companyName['value'],
            'email'=> $fromEmail['value'],
            'compnay_email'=> $adminEmail['value']
        ];

        Mail::to($data->email)->send(new AppointmentMail($data,$company));

        if (Mail::failures()){
            return redirect()->back()->with('errors','Email cannot send succeefully');
        }
        else{
            return redirect()->to('/appointments')->with('success','Email has sent successfully');

        }
    }
    public function update(AppointmentStoreRequest $request){
        $data = $request->except('_token');
        $data['user_id'] =Auth::user()->id;
        if($this->appointments->create($data)){

            return redirect()->to('/appointments')->with('success','Appointment Updated successfully!'.'<br>'.' We will contact you soon');
        }
        return redirect()->back()->with('errors','Appointment cannot booked successfully');
    }


}
