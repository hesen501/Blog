<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Page\StoreRequest;
use App\Http\Requests\Admin\Page\UpdateRequest;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages=Page::query()->get();

        return view('admin.pages.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.pages.create');
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
        $data['order']=Page::query()->select('order')->max('order')+1;
        $data['slug']=Str::slug($request->name);
        if($request->image){
            $data['image'] = $request->file('image')->store('pages','public');
        }
        Page::create($data);
        
        return redirect()->back()->with('success','Page Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page=Page::query()->findOrFail($id);

        return view('admin.pages.pages.show',compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page=Page::query()->findOrFail($id);

        return view('admin.pages.pages.edit',compact('page'));
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
        $page=Page::query()->findOrFail($id);
        if($request->image){
            $data['image'] = $request->file('image')->store('pages','public');
            if(File::exists('storage/'.$page->image)){
                File::delete('storage/'.$page->image);
            }
        }
        $page->update($data);
        
        return redirect()->back()->with('success','Page Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page=Page::query()->findOrFail($id);
        if(File::exists('storage/'.$page->image)){
            File::delete('storage/'.$page->image);
        }
        $page->delete();

        return redirect()->back()->with('success','Page Deleted Successfully');
    }    
    public function sort(Request $request)
    {
        return $request;
        foreach($request->sorts as $order => $id) {
            Page::where('id', $id)->update(['order' => $order]);
        }
    }
}