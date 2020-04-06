<?php

namespace App\Http\Controllers;

use App\Repositories\SalesResportRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
        $this->upload_path = DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

    public  function index() {
        return view('profile.index');
    }

    public  function getProfile(){
        $user = Auth::user();
        return view('profile.show')->withUser( $user);
    }

    public function store(Request $request){
        $data = $request->except('__token','image');
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'users/'.$fileName;

        }
        $user = Auth::user();

        if($this->user->update($user->id,$data)){

            return redirect()->to('/profile/view')->with('success','Profile Updated Successfully');
        }
        return redirect()->back()->with('errors','Profile cannot Updated Successfully');
    }


}
