@extends('layouts.master')

@section('content')
    <div class="col-xxl-6 col-xl-12 order-xl-2">
        <div class="card">
            <div class="card-body">
                <div class="card-header">{{ $thread->subject }}</div>
                <ul class="conversation-list" data-simplebar="" style="max-height: 537px">
                    <li class="clearfix">
                        <div class="chat-avatar">
                            @foreach ($thread->messages as $message)
                            <img src="{{asset('assets/images/users/avatar-5.jpg')}}" class="rounded-circle avatar-xs" alt="Shreyu N">
                            <i>{{ $message->created_at->diffForHumans() }}</i>
                        </div>
                        <div class="conversation-text">
                            <div class="ctext-wrap">
                                <i>{{ $message->user->name }}</i>
                                <p>
                                    {{ $message->body }} 
                                 </p>
                            </div>
                        </div>
                        <div class="conversation-actions dropdown">
                            <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>
                            <form action="{{ route('messages.destroy', $thread->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                    
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Copy Message</a>
                                    <a  class="dropdown-item" href="#">Edit</a>
                                    <button class="dropdown-item">Delete</button>
                                </div>
                            </div>
                            </form>
                         
                    </li>
                </ul>
                @endforeach
                <div class="row">
                    <div class="col">
                        <div class="mt-2 bg-light p-3 rounded">
                          <form class="needs-validation" novalidate="" name="chat-form" id="chat-form" action="{{ route('messages.update', $thread->id) }}" method="post">
                                {{ method_field('put') }}
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col mb-2 mb-sm-0">
                                        <input type="text" name="message" class="form-control border-0" placeholder="Enter your text" required="" value="{{ old('message') }}">
                                        <div class="invalid-feedback">
                                            Please enter your messsage
                                        </div>
                                    </div>
                                    <div class="col-sm-auto">
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-light"><i class="uil uil-paperclip"></i></a>
                                            <a href="#" class="btn btn-light"> <i class='uil uil-smile'></i> </a>
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-success chat-send"><i class='uil uil-message'></i></button>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row-->
                            </form>
                        </div> 
                    </div> <!-- end col-->
                </div>
                <!-- end row -->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> 



    
@stop 