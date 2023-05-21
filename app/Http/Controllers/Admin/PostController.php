<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::query()->paginate(5);

        return view('admin.pages.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::query()->get();

        return view('admin.pages.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data=$request->all();
        $data['slug']=Str::slug($request->title);
        if($request->image){
            $data['image'] = $request->file('image')->store('posts','public');
        }
        Post::create($data);
        
        return redirect()->back()->with('success','Post Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::query()->findOrFail($id);

        return view('admin.pages.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::query()->findOrFail($id);
        $categories=Category::query()->get();

        return view('admin.pages.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data=$request->all();
        $data['slug']=Str::slug($request->title);
        $post=Post::query()->findOrFail($id);
        if($request->image){
            $data['image'] = $request->file('image')->store('posts','public');
            if(File::exists('storage/'.$post->image)){
                File::delete('storage/'.$post->image);
            }
        }
        $post->update($data);
        
        return redirect()->back()->with('success','Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function delete($id)
    // {
    //     Post::query()->findOrFail($id)->delete();

    //     return redirect()->back()->with('success','Post Deleted Successfully');
    // }
    public function destroy($id)
    {
        $post=Post::query()->findOrFail($id);
        if(File::exists('storage/'.$post->image)){
            File::delete('storage/'.$post->image);
        }
        $post->delete();
        return redirect()->back()->with('success','Post Deleted Successfully');
    }
}
