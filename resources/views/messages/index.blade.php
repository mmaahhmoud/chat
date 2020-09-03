@extends('layouts.app')

@section('content')
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h3>Online users</h3>
                <hr>
                <h5 id="no-online-users">No online users</h5>
                <ul class="list-group" id="online-users">
                    
                </ul>

            
            </div>
            
            <div class="col-md-9 d-flex flex-column" style="height:80vh;">
                <div style="background-color:white;height:80vh; overflow-y:scroll;" class="h-100 bg-white mb-4 p-5" id="chat"  >
                 @foreach($messages as $message)
                 <div   class="mt-4 w-50 text-white p-3 rounded {{ auth()->user()->id == $message->user_id ? 'float-right bg-primary' : 'float-left bg-warning' }}">
                        <p>{{$message->user->name}}</p>
                     <p>{{$message->body}}</p>
                    
                    </div>   
                    
              <div class="clearfix"></div>      
                
                @endforeach    
                    
                
                </div>
                
                <form action="" class="d-flex">
               <input style="width:784px;" type="text" name="" data-url="{{route('messages.store')}}" style="margin-right:10px" class="form-control" id="chat-text"> 
                <button class="btn btn-primary">Send</button>
                </form>
                
                <br>
                <br>
                <br>
                
            
            </div>
        
        </div>

    </div>


@endsection