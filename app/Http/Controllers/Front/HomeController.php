<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use App\Models\Post;
use App\Models\Message;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SendRequest;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function __construct()
    {
        View::share('pages',Page::query()->get());
        View::share('categories',Category::query()->get());

    }
    public function home(){

        $posts=Post::orderBy('created_at','DESC')->paginate(3);

        return view('front.home',compact('posts'));
    }    
    public function post_single($slug){
        $post=Post::query()->whereSlug($slug)->first() ?? abort(403,"Post does not exist");
        $post->increment('hit');

        return view('front.post-single',compact('post'));
    }
    public function category($slug){
        $category=Category::query()->whereSlug($slug)->first();
        $posts=Post::whereCategoryId($category->id)->orderBy('created_at','DESC')->paginate(3);

        return view('front.home',compact('posts'));
    }    
    public function page($page){
        $page=Page::query()->whereSlug($page)->first();

        return view('front.page',compact('page'));
    }
    public function contact(){

        return view('front.contact');
    }    
    public function send(SendRequest $req){

        Message::create($req->all());
        
        return redirect()->back()->with('success','Message Sent Successfully');
   } 
}
