<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Color\ColorStoreRequest;
use App\Http\Requests\Backend\Colors\ColorsUpdateRequest;
use App\Repositories\ColorsRepository;
use App\Repositories\ColorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    protected $color;

    public function __construct(ColorRepository $color)
    {
        $this->color = $color;

    }
    public function index(Request $request)
    {
        $data = $this->color
            ->where("name","LIKE","%{$request->input('query')}%")->orderBy('name')
            ->get();

        if($data->isNotEmpty()){
            $output = '<ul class="dropdown-menu" id="color-list" style="display:block; position:relative">';
            foreach($data as $row)
            {
                $output .= '<li><a href="#">'.$row->name.'</a></li>';
            }
            $output .= '</ul>';

            return $output;
        }else {
            return $data_empty='';
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColorStoreRequest $request)
    {
        $data = $request->except('_token','image');


        $data['is_active'] =(isset($request['is_active'])) ? 1 : 0;


        if($this->color->create($data)){


            return redirect()->to('/color')->with('success','color created successfully');
        }
        return redirect()->back()->with('errors','color cannot created Successfully');
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

        $colors = $this->color->where('slug', $slug)->first();
        return view('backend.colors.edit')->withcolors($colors);
    }

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
        $color = $this->color->find($id);

        if($this->color->destroy($color->id)){

            $message = 'color delete successfully';
            return response()->json(['status'=>'ok','message'=>$message],200);

        }
        return response()->json(['status'=>'ok','message'=>'Blog Categories cannot be delete'],422);
    }

}
