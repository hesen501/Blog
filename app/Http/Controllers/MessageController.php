<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages=Message::query()->get();

        return view('admin.pages.messages.index',compact('messages'));
    }


    public function destroy($id)
    {
        Message::query()->findOrFail($id)->delete();
        return redirect()->back()->with('success','Message Deleted Successfully');
    }
}
