<?php

namespace App\Http\Controllers\Backend;



use App\Http\Requests\Backend\Schedule\ScheduleUpdateRequest;
use App\Repositories\AppointmentScheduleRepository;
use App\Http\Requests\Backend\Schedule\ScheduleStoreRequest;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ScheduleController extends Controller
{
    protected $schedules, $category,$setting;

    public function __construct(AppointmentScheduleRepository $schedules,SettingRepository $setting)
    {
        $this->schedules = $schedules;
        $this->setting = $setting;

    }
    public function index()
    {
        $schedules = $this->schedules->orderBy('created_at','desc')->paginate('10000');
        return view('backend.schedule.index')->withschedules($schedules);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $schedules = $this->schedules->find($id);
        return view('backend.schedule.edit')->withschedules($schedules);
    }
    public function show($id){
        $schedule = $this->schedules->find($id);
        return view('backend.schedule.show')->withschedule($schedule);
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
        $schedules = $this->schedules->find($id);

        if($this->schedules->destroy($schedules->id)){

            $message = 'schedules delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'schedules cannot be delete'],422);
    }
    public function store(ScheduleStoreRequest $request){
        $data= $request->except('_token','description');
        $data['user_id'] =Auth::user()->id;
        if($this->schedules->create($data)){

            return redirect()->to('/schedules')->with('success','Schedule created successfully!');
        }
        return redirect()->back()->with('errors','Schedule cannot created  successfully');


    }
    public function update(ScheduleUpdateRequest $request,$id){
        $data = $request->except('_token');
        $schedule = $this->schedules->find($id);
        $data['user_id'] =Auth::user()->id;
        if($this->schedules->update($schedule->id,$data)){

            return redirect()->to('/schedules')->with('success','Schedule Updated successfully!');
        }
        return redirect()->back()->with('errors','Schedule cannot booked successfully');
    }
    public function changeStatus(Request $request)
    {
        $schedules = $this->schedules->find($request->get('id'));
        if ($schedules->is_active == 0) {
            $status = '1';
            $message = 'Schedules with title "' . $schedules->title . '" is published.';
        } else {
            $status = '0';
            $message = 'Schedules with title "' . $schedules->title . '" is unpublished.';
        }

        $this->schedules->changeStatus($schedules->id, $status);
        $this->schedules->update($schedules->id, array('is_active' => $status));
        $updated = $this->schedules->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'schedules' => $updated], 200);
    }
}
