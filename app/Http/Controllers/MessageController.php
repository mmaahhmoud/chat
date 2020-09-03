<?php

namespace App\Http\Controllers;
use App\Message;
use Illuminate\Http\Request;
use App\Events\MessageDelivered;

class MessageController extends Controller
{
    
     public function __construct()
     {
         
       $this->middleware(['auth']);  
     }
     public function index()
     {
         $messages = Message::all();
         return view('messages.index',compact('messages'));
     }
    public function store(Request $request)
    {
      $message = auth()->user()->messages()->create($request->all());
//        $d = $message->load('user');
//        dd($d);
    //  broadcast(new MessageDelivered($message->load('user')))->toOthers();
        broadcast(new MessageDelivered($message))->toOthers();
      
        
    }
    
}
