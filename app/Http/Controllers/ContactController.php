<?php

namespace App\Http\Controllers;

use App\Repositories\SettingRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    protected $setting;
    public  function __construct(SettingRepository $setting)
    {
        $this->setting = $setting;
    }

    public  function  index() {
        $settings = $this->setting->where('is_active','1')->get();
        return view('contact.index')->withSettings($settings);
    }
}
