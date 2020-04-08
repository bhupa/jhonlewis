<?php

namespace App\Http\Controllers;

use App\Models\AppointmentSchedule;
use App\Repositories\AppointmentScheduleRepository;
use App\Repositories\ContentRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $content,$schedule;

    public function __construct(ContentRepository $content,AppointmentScheduleRepository $schedule)
    {
        $this->content = $content;
        $this->schedule = $schedule;
    }

    public function index(){
        return view('frontend.home');
    }


    public function getAbout(){
        $content = $this->content->where('slug','about-us')->first();
        return view('frontend.about')->withContent($content);
    }
    public function getTermCondition(){
        $content = $this->content->where('slug','terms-conditions')->first();
        return view('frontend.condition')->withContent($content);
    }
    public function getshipping(){
        $content = $this->content->where('slug','shipping')->first();
        return view('frontend.shipping')->withContent($content);
    }

    public  function getPrescription(){
        $content = $this->content->where('slug','how-to-get-prescription')->first();
        return view('frontend.prescription')->withContent($content);
    }
    public function getWarranty(){
        $content = $this->content->where('slug','guarantee-warranty')->first();
        return view('frontend.warranty')->withContent($content);
    }
    public  function getReturn(){
        $content = $this->content->where('slug','returns-refunds')->first();
        return view('frontend.warranty')->withContent($content);
    }
    public function getentitlement(){
        $content = $this->content->where('slug','nhs-entitlement')->first();
        return view('frontend.entitlement')->withContent($content);
    }

    public function getSchedule(){


        $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
        $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
        $data = AppointmentSchedule::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id','title','start', 'end']);
        return Response::json($data);



    }
}
