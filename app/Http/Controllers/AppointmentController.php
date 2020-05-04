<?php

namespace App\Http\Controllers;

use App\Http\Requests\Frontend\Appointment\AppointmentStoreRequest;
use App\Models\EventModel;
use App\Repositories\AppointmentRepository;
use App\Repositories\AppointmentScheduleRepository;
use App\Repositories\BlogRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use Calendar;

use App\Event;

class AppointmentController extends Controller
{
    protected  $blog, $appointment,$schedule;

    public  function __construct(AppointmentScheduleRepository $schedule,BlogRepository $blog,AppointmentRepository $appointment)
    {
        $this->blog =$blog;
        $this->appointment = $appointment;
        $this->schedule = $schedule;
    }

    public function index(){
        $events = [];

        $data = $this->schedule->where('is_active','1')->get();

        if($data->count()){

            foreach ($data as $key => $value) {

                $events[] = Calendar::event(

                    $value->title.'--'.date('d', strtotime($value->date)),


                    true,

                    new \DateTime($value->date),

                    new \DateTime($value->end.' +1 day'),
                    null,


                    // Add color and link on event
                    [
                        'eventColor'=> 'yellow',   // an option!
                 'textColor'=> 'black',
                        'backgroundColor'=>'#54bfa8',
                        'className'=>'event-date',
                        'url'=>route('book-appointment',[$value->date])
                    ]

                );

            }

        }

        $calendar = Calendar::addEvents($events)

        ->setOptions([ //set fullcalendar options

                'height' => 'auto',
                'themeSystem' => "bootstrap4",
                'columnHeader' => false,
                'aspectRatio' => 1,
                'allDayDefault'=> false,
                'header' => [
                    'left' => 'today prev,next',
                    'center' =>'title',
                    'right' =>'']
            ]);

//        dd( $calendar);
//        $eloquentEvent = EventModel::first();
//        $calendar = Calendar::addEvents($events)->addEvent($eloquentEvent, [ //set custom color fo this event
//                'color' => '#ffffff',
//                    'background'=>'black'
//            ]);
        $date =today()->format('Y-m-d');
        $schedules = $this->schedule->where('date','>=',$date)->orderBy('created_at','desc')->get();

        $scheduls=[];
        foreach( $schedules as $item){
            $scheduls[] = date('d/m/Y', strtotime($item->date));
        }
        $schedules = $this->schedule->where('date','>=',$date)->orderBy('created_at','desc')->get();

        $scheduls=[];
        foreach( $schedules as $item){
            $scheduls[] = date('d-m-Y', strtotime($item->date));
        }

        $blogs = $this->blog->where('is_active','1')->orderBy('created_at','desc')->take(3)->get();
        return view('appointment.index')->withBlogs($blogs)->withCalendar($calendar)->withScheduls( $scheduls);
    }

    public function store(AppointmentStoreRequest $request){
//       $schedule =$this->schedule->find($request->schedule_id);

        $data = $request->except('_token');
            $data['user_id'] =Auth::user()->id;
        $LogintDate = strtotime($request->date);

            $data['date']= date('d-m-Y', $LogintDate);

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
    public function getBook($date){
        $schedule = $this->schedule->where('date',$date)->first();
        $blogs = $this->blog->where('is_active','1')->orderBy('created_at','desc')->take(3)->get();

        return view('appointment.form')->withBlogs($blogs)->withSchedule( $schedule)->withScheduls($scheduls);

    }


}
