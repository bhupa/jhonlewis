<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\EmailSubscribeRepository;
use App\Repositories\SettingRepository;
use App\Http\Controllers\Controller;

class EmailSubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $emailSubscribe,$setting;

    public function __construct(EmailSubscribeRepository $emailSubscribe,SettingRepository $setting)
    {
        $this->emailSubscribe = $emailSubscribe;
        $this->setting = $setting;

    }
    public function index()
    {
        $emailsubscribes = $this->emailSubscribe->orderBy('created_at','desc')->paginate('20');
        return view('backend.email-subscribe.view')->withEmailsubscribes($emailsubscribes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $categories = $this->category->where('is_active','1')->orderBy('name')->get();
//        return view('backend.email-subscribe.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(emailSubscribeReplyStore $request)
    {
//        $data= $request->except('_token','description');
//        $data = $this->email-subscribe->find($request->id);
//        $data['description']= $request->description;
//        $data['cc'] ='CC of email-subscribe message reply';
//        $adminEmail = $this->setting->where('slug','for-admin')->first();
//        $companyName = $this->setting->where('slug','compant-name')->first();
//        $fromEmail = $this->setting->where('slug','reply-email')->first();
//        $company = [
//            'name'=>$companyName['value'],
//            'email'=> $fromEmail['value'],
//            'compnay_email'=> $adminEmail['value']
//        ];
//
//        Mail::to($adminEmail['value'])->send(new Adminemail-subscribeReplyMail($data,$company));
//        Mail::to($data->email)->send(new email-subscribeReplyMail($data,$company));
//
//        if (Mail::failures()){
//            return redirect()->back()->with('errors','Email cannot send succeefully');
//        }
//        else{
//            return redirect()->to('/email-subscribes')->with('success','Email has sent successfully');
//
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $email-subscribe = $this->email-subscribe->find($id);
//        return view('backend.email-subscribe.show')->withemail-subscribe($email-subscribe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $email-subscribe = $this->email-subscribe->find($id);
//        return view('backend.email-subscribe.edit')->withemail-subscribe($email-subscribe);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(emailSubscribeUpdateRequest $request, $id)
    {


//        $data = $request->except('_token','image');
//        $email-subscribe = $this->email-subscribe->find($id);
//        if($request->file('image')){
//            $image= $request->file('image');
//            $fileName = time().$image->getClientOriginalName();
//            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
//            $data['image'] = 'email-subscribe/'.$fileName;
//            Storage::disk('public')->delete($email-subscribe->image);
//
//        }
//        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
//        if($this->email-subscribe->update( $email-subscribe->id,$data)){
//
//
//            return redirect()->to('/email-subscribe')->with('success','email-subscribe updated successfully');
//        }
//        return redirect()->back()->with('errors','email-subscribe cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emailSubscribe = $this->emailSubscribe->find($id);

        if($this->emailSubscribe->destroy($emailSubscribe->id)){

            $message = 'Email-Subscribe delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'Email-Subscribe cannot be delete'],422);
    }

}
