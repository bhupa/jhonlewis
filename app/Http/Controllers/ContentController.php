<?php

namespace App\Http\Controllers;

use App\Repositories\ContentRepository;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    protected  $content;

    public  function __construct(ContentRepository $content)
    {
        $this->content = $content;
    }

    public  function index(){}
    public  function create(){}
    public  function edit(){}
    public  function update(){}
    public  function show($slug){
        $content = $this->content->where('slug',$slug)->first();
        return view('content.show')->withContent($content);

    }
    public  function destroy(){}

}
