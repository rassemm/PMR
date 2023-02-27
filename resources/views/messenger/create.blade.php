@extends('layouts.master')

@section('content')
{{-- <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="mb-3">
                            <form action="{{ route('messages.store') }}" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                                {{ csrf_field() }}
                            <label for="projectname" class="form-label">Subject</label>
                            <input type="text" name="subject" id="projectname" class="form-control" placeholder="Enter project Subject" {{ old('subject') }}>
                        </div>

                        <div class="mb-3">
                            <label for="project-overview" class="form-label">Message</label>
                            <textarea class="form-control" name="message" id="project-overview" rows="5" placeholder="Enter some brief about project..">{{ old('message') }}</textarea>
                        </div>
                        <div class="mb-0">
                            <label for="project-overview" class="form-label">Receiver</label>
                            @if($users->count() > 0)
                            <select class="form-control select2" data-toggle="select2">
                                <option>Select</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}" name="recipients[]">{!!$user->name!!}</option>
                                @endforeach
                            </select>
                             @endif

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary form-control">Submit</button>
                        </div>
                </form>
                    </div> <!-- end col-->



                    </div> <!-- end col-->
                </div>
                <!-- end row -->

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div> --}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="compose-header-modalLabel">New Message</h4>
            </div>
            <div class="p-1">
                <div class="modal-body">
                    <form action="{{ route('messages.store') }}" method="post" >
                        {{ csrf_field() }}
                        <div class="mb-2">
                            <label for="project-overview" class="form-label">Receiver</label>
                            @if($users->count() > 0)
                            <select class="form-control select2" data-toggle="select2">
                                <option>Select</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}" name="recipients[]">{!!$user->name!!}</option>
                                @endforeach
                            </select>
                             @endif
                        </div>
                        <div class="mb-2">
                            <label for="mailsubject" class="form-label">Subject</label>
                            <input type="text" name="subject" id="mailsubject" class="form-control" placeholder="Your subject" {{ old('subject') }}>
                        </div>
                        <div class="write-mdg-box mb-3">
                            <label class="form-label">Message</label>
                            <textarea id="simplemde1" name="message">{{ old('message') }}</textarea>
                        </div>

                </div>
                <div class="px-3 pb-3">
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"><i class="mdi mdi-send me-1"></i> Send Message</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop
