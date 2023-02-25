@extends('layouts.master')

@section('content')

<div class="container">
    @if (Session::has('error_message'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error_message') }}
        </div>
    @endif

 <div class="card">
    <div class="card-header">{{ __('Messager liste') }}</div>

    <div class="card-body">
    
        <a href="" class="btn btn-primary">Add New message</a>
      

        <br /><br />

            <table class="table table-borderless table-hover">
                        <tr class="bg-info text-light">
                            <th class="text-center">#</th>
                            <th>Sender</th>
                            <th>Subject</th>
                            <th>Receiver</th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                        @if($threads->count() > 0)
                        @foreach($threads as $thread)
                        <?php $class = $thread->isUnread(Auth::id()) ? 'New Message' : ''; ?>
                    <tr>
                        <td class="text-center">{{ $class }}</td>
                        <td>{{ $thread->creator()->name }}</td>
                        <td> <h4 class="media-heading">
                            <a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a></h4></td>
                        <td> {{ $thread->participantsString(Auth::id()) }}</td>
                    </tr>
                    @endforeach
                   </table>
                @else
                    <p>Sorry, no threads.</p>
                @endif
</div>
</div>
@stop