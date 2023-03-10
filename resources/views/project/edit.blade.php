@extends('layouts.master')

@section('content')
<div class="container-fluid">

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                        <li class="breadcrumb-item active">Edit Project</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Project</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('projects.update',$project->id) }}">
                        @csrf
                        @method('put')
                           <div class="row">
                              <div class="col-lg-6">
                               <div class="mb-3 position-relative" id="datepicker1">
                                         <label class="form-label">Titre</label>
                                        <input type="text" class="form-control" name="titre" value="{{$project->titre}}" data-provide="datepicker" data-date-container="">
                                    </div>
                                </div>
                                    <!-- Date View -->
                                    <div class="col-lg-6">
                                    <div class="mb-3 position-relative" id="datepicker2">
                                        <label class="form-label">Description</label>
                                        <input type="text" class="form-control" name="description" value="{{$project->description}}"  data-provide="datepicker" data-date-format="d-M-yyyy" data-date-container="">
                                    </div>
                                </div>
                            </div>
                    <div class="row">
                              <div class="col-lg-6">
                                <div class="mb-3 position-relative" id="datepicker3">
                                        <label class="form-label">Soci??t??</label>
                                        <input type="text" class="form-control" name="ste" value="{{$project->ste}}" data-provide="datepicker" data-date-multidate="true" data-date-container="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 position-relative" id="datepicker3">
                                        <label class="form-label">Class</label>
                                        <input type="text" class="form-control" name="class" value="{{$project->class}}" data-provide="datepicker" data-date-multidate="true" data-date-container="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3 position-relative" id="">
                                        <select class="form-control select2" data-toggle="select2">
                                            <option>Student</option>
                                            <option name="student">Select</option>
                                                                        @foreach($students as $user)
                                                                        <option value="{{ $user->id }}" name="student">{{ $user->name }}</option>
                                                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <select class="form-control select2" data-toggle="select2">
                                            <option>Teacher</option>
                                            <option name="teacher">Select</option>
                                                                        @foreach($teachers as $user)
                                                                        <option value="{{ $user->id }}" name="teacher">{{ $user->name }}</option> @endforeach
                                                                    </select>
                                                                  </select>
                                                                 </div>
                                                                </div> </div>
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-primary form-control">Modifier</button>
                                                            </div> <!-- end col-->

                    </form>
                    </div>
                    <!-- end row -->

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->

</div> <!-- container -->
@endsection
