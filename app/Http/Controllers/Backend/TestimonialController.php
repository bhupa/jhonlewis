<?php

namespace App\Http\Controllers\Backend;


use App\Repositories\TestimonialRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    protected $testimonial;

    public function __construct(TestimonialRepository $testimonial)
    {
        $this->testimonial = $testimonial;

    }
    public function index()
    {

        $testimonials = $this->testimonial->orderBy('created_at','desc')->paginate('2000');

        return view('backend.testimonial.index')->withTestimonials($testimonials);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
        $testimonial = $this->testimonial->find($id);

        if($this->testimonial->destroy($testimonial->id)){

            $message = 'testimonial delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'testimonial cannot be delete'],422);
    }
    public function changeStatus(Request $request)
    {
        $testimonial = $this->testimonial->find($request->get('id'));
        if ($testimonial->is_active == 0) {
            $status = '1';
            $message = 'testimonial with name "' . $testimonial->name . '" is published.';
        } else {
            $status = '0';
            $message = 'testimonial with name "' . $testimonial->name . '" is unpublished.';
        }

        $this->testimonial->changeStatus($testimonial->id, $status);
        $this->testimonial->update($testimonial->id, array('is_active' => $status));
        $updated = $this->testimonial->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'testimonial' => $updated], 200);
    }
    public function show($id)
    {
        $testimonial = $this->testimonial->find($id);
        return view('backend.testimonial.show')->withTestimonial($testimonial);
    }

}
