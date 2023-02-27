@extends('layouts.master')

@section('content')
<div class="row">

    <!-- Right Sidebar -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- Left sidebar -->
                <div class="page-aside-left">
                    <div class="d-grid">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#compose-modal">Compose</button>
                    </div>

                    <div class="email-menu-list mt-3">
                        <a href="javascript: void(0);" class="text-danger fw-bold"><i class="dripicons-inbox me-2"></i>Inbox<span class="badge badge-danger-lighten float-end ms-2">@include('messenger.unread-count')</span></a>
                    </div>
                </div>
                <!-- End Left sidebar -->

                <div class="page-aside-right">

                 <div class="btn-group">
                        <button type="button" class="btn btn-secondary"><i class="mdi mdi-archive font-16"></i></button>
                        <button type="button" class="btn btn-secondary"><i class="mdi mdi-alert-octagon font-16"></i></button>
                        <button type="button" class="btn btn-secondary"><i class="mdi mdi-delete-variant font-16"></i></button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-folder font-16"></i>
                            <i class="mdi mdi-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu">
                            <span class="dropdown-header">Move to:</span>
                            <a class="dropdown-item" href="javascript: void(0);">Social</a>
                            <a class="dropdown-item" href="javascript: void(0);">Promotions</a>
                            <a class="dropdown-item" href="javascript: void(0);">Updates</a>
                            <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-label font-16"></i>
                            <i class="mdi mdi-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu">
                            <span class="dropdown-header">Label as:</span>
                            <a class="dropdown-item" href="javascript: void(0);">Updates</a>
                            <a class="dropdown-item" href="javascript: void(0);">Social</a>
                            <a class="dropdown-item" href="javascript: void(0);">Promotions</a>
                            <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                        </div>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-horizontal font-16"></i> More
                            <i class="mdi mdi-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu">
                            <span class="dropdown-header">More Options :</span>
                            <a class="dropdown-item" href="javascript: void(0);">Mark as Unread</a>
                            <a class="dropdown-item" href="javascript: void(0);">Add to Tasks</a>
                            <a class="dropdown-item" href="javascript: void(0);">Add Star</a>
                            <a class="dropdown-item" href="javascript: void(0);">Mute</a>
                        </div>
                    </div>

                    <div class="mt-3">
                        <ul class="email-list">
                            @foreach ($thread->messages as $message)
                            <li class="unread">
                                <div class="email-sender-info">
                                    <div class="checkbox-wrapper-mail">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="mail4">
                                            <label class="form-check-label" for="mail4"></label>
                                        </div>
                                    </div>
                                    <span class="star-toggle mdi mdi-star-outline">{{ $thread->subject }}</span>
                                    <a href="javascript: void(0);" class="email-title"></a>
                                </div>

                                <div class="email-content">
                                    <a href="javascript: void(0);" class="email-subject">{{ $message->body }}&nbsp;&ndash;&nbsp;
                                        {{ $message->user->name }}
                                    </a>
                                    <div class="email-date">{{ $message->created_at->diffForHumans() }}</div>
                                </div>
                                <div class="email-action-icons">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <form action="{{ route('messages.destroy', $thread->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                          <i class="mdi mdi-delete email-action-icons-item" type="submit"></i>
                                        </form>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- end .mt-4 -->

                    <div class="row">
                        <div class="col-7 mt-1">
                            Showing 1 - 20 of 289
                        </div> <!-- end col-->
                        <div class="col-5">
                            <div class="btn-group float-end">
                                <button type="button" class="btn btn-light btn-sm"><i class="mdi mdi-chevron-left"></i></button>
                                <button type="button" class="btn btn-info btn-sm"><i class="mdi mdi-chevron-right"></i></button>
                            </div>
                        </div> <!-- end col-->
                    </div>
                    <!-- end row-->
                </div>
                <!-- end inbox-rightbar-->
            </div>
            <!-- end card-body -->
            <div class="clearfix"></div>
        </div> <!-- end card-box -->

    </div> <!-- end Col -->
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
</div>
    {{-- <div class="col-xxl-6 col-xl-12 order-xl-2">
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
    </div> --}}




@stop
