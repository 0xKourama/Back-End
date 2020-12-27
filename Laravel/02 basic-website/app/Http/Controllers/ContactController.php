<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Message;

class ContactController extends Controller
{
    public function submit(ContactRequest $request)
    {
        $message = new  Message();
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->subject = $request->input('subject');
        $message->message = $request->input('message');
        $message->save();

        return redirect()->route('home')->with('success','Message Succesfully Sent, thank you');
    }
    public function getMessage()
    {
        $message = Message::all();

        return view('messages', ['messages' => $message]);
    }

}
