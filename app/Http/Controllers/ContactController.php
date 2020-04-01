<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequestStore;
use App\Http\Requests\Frontend\Appointment\AppointmentStoreRequest;
use App\Repositories\ContactRepository;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{

    protected $setting,$contact;
    public  function __construct(SettingRepository $setting,ContactRepository $contact)
    {
        $this->setting = $setting;
        $this->contact = $contact;
    }

    public  function  index() {
        $settings = $this->setting->where('is_active','1')->get();
        return view('contact.index')->withSettings($settings);
    }
    public function store(ContactRequestStore $request){
        $data = $request->except('_token');

        if($this->contact->create($data)){

            return redirect()->to('/contact-us')->with('success','Message register successfully!'.'<br>'.' We will contact you soon');
        }
        return redirect()->back()->with('errors','Message cannot registerd successfully');
    }
}
