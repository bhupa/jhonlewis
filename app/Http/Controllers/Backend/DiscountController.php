<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Discount\DiscountStoreRequest;
use App\Http\Requests\Backend\Discount\DiscountUpdateRequest;
use App\Http\Requests\Backend\Doctor\DoctorStoreRequest;
use App\Repositories\DiscountRespository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Auth;

class DiscountController extends Controller
{
    protected $discounts, $category;

    public function __construct(DiscountRespository $discounts)
    {
        $this->discounts = $discounts;
        $this->upload_path = DIRECTORY_SEPARATOR.'discounts'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');

    }
    public function index()
    {
        $discounts = $this->discounts->orderBy('created_at','desc')->paginate('10000');
        return view('backend.discount.view')->withDiscounts($discounts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.discount.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscountStoreRequest $request)
    {

        $data = $request->except('_token','image');

        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'discounts/'.$fileName;

        }
        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;
        $data['created_by'] = Auth::user()->id;
        if($this->discounts->create($data)){


            return redirect()->to('/discounts')->with('success','discounts created successfully');
        }
        return redirect()->back()->with('errors','discounts cannot created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {


        $discounts = $this->discounts->where('slug',$slug)->first();

        return view('backend.discount.edit')->withDiscounts($discounts );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiscountUpdateRequest $request, $id)
    {


        $data = $request->except('_token','image');
        $discounts = $this->discounts->find($id);
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'discounts/'.$fileName;
            Storage::disk('public')->delete($discounts->image);

        }
        if($this->discounts->update( $discounts->id,$data)){


            return redirect()->to('/discounts')->with('success','discounts updated successfully');
        }
        return redirect()->back()->with('errors','discounts cannot updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discounts = $this->discounts->find($id);

        if($this->discounts->destroy($discounts->id)){

            $message = 'discounts delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'discounts cannot be delete'],422);
    }
    public function changeStatus(Request $request)
    {
        $discounts = $this->discounts->find($request->get('id'));
        if ($discounts->is_active == 0) {
            $status = '1';
            $message = 'discounts with title "' . $discounts->name . '" is published.';
        } else {
            $status = '0';
            $message = 'discounts with title "' . $discounts->name . '" is unpublished.';
        }

        $this->discounts->changeStatus($discounts->id, $status);
        $this->discounts->update($discounts->id, array('is_active' => $status));
        $updated = $this->discounts->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'discount' => $updated], 200);
    }
}
