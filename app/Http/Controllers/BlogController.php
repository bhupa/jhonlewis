<?php

namespace App\Http\Controllers;

use App\Repositories\BlogRepository;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //

    protected  $blog;

    public function __construct(BlogRepository $blog)
    {
        $this->blog= $blog;
    }

    public  function index(){
        $blogs  = $this->blog->where('is_active','1')->orderBy('created_at','desc')->paginate(8);
        return view('blog.index')->withBlogs($blogs);
    }

    public  function show($slug){
        $blog = $this->blog->where('slug',$slug)->first();
        if(empty($blog->view)){
            $data = 1;
        }else{
            $data = ++$blog->view;
        }

        $this->blog->update($blog->id, ['view'=>$data]);
        return view('blog.show')->withBlog($blog);
    }
}
