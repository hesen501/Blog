<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $posts=Post::query()->get();

        return view('admin.pages.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.posts.create');
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
        $data['slug']=Str::slug($request->name);
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

        return view('admin.pages.posts.edit',compact('post'));
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
        $data['slug']=Str::slug($request->name);
        $post=Post::query()->findOrFail($id);
        $post->update($data);
        
        return redirect()->back()->with('success','Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Post::query()->findOrFail($id)->delete();

        return redirect()->back()->with('success','Post Deleted Successfully');
    }
    public function destroy($id)
    {
        Post::query()->findOrFail($id)->delete();

        return redirect()->back()->with('success','Post Deleted Successfully');
    }
}
