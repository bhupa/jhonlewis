<?php

namespace App\Http\Controllers;

use App\Http\Requests\Frontend\EmailSubscribe\EmailSubscribeStoreRequest;
use App\Repositories\EmailSubscribeRepository;
use Illuminate\Http\Request;

class EmailSubscribeController extends Controller
{
    protected $emailSubscribe;

    public function __construct(EmailSubscribeRepository $emailSubscribe)
    {
        $this->emailSubscribe = $emailSubscribe;
    }
    public function store(EmailSubscribeStoreRequest $request){

        $data = $request->except('_token');

        if($this->emailSubscribe->create($data)){
           return response()->json(['success'=>true,'message'=>'Your details are registered successfully'],200);
        }

        return response()->json(['error'=>true,'message'=>'Your details cannot registered successfully'],400);

    }
}
