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
                        <li class="breadcrumb-item active">Create Project</li>
                    </ol>
                </div>
                <h4 class="page-title">Create Project</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('projects.store') }}">
                        @csrf
                           <div class="row">
                              <div class="col-lg-6">
                               <div class="mb-3 position-relative" id="datepicker1">
                                         <label class="form-label">Titre</label>
                                        <input type="text" class="form-control" name="titre" data-provide="datepicker" data-date-container="">
                                    </div>
                                </div>
                                    <!-- Date View -->
                                    <div class="col-lg-6">
                                    <div class="mb-3 position-relative" id="datepicker2">
                                        <label class="form-label">Description</label>
                                        <input type="text" class="form-control" name="description"  data-provide="datepicker" data-date-format="d-M-yyyy" data-date-container="">
                                    </div>
                                </div>
                            </div>
                    <div class="row">
                              <div class="col-lg-6">
                                <div class="mb-3 position-relative" id="datepicker3">
                                        <label class="form-label">Société</label>
                                        <input type="text" class="form-control" name="ste"  data-provide="datepicker" data-date-multidate="true" data-date-container="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 position-relative" id="datepicker3">
                                        <label class="form-label">Class</label>
                                        <input type="text" class="form-control" name="class"  data-provide="datepicker" data-date-multidate="true" data-date-container="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3 position-relative" id="">
                                        @if($students->count() > 0)
                                        <label for="project-overview" class="form-label">Etudiant</label>

                                        <select name="student" class="form-control select2" data-toggle="select2">
                                            <option name="student">Select</option>
                                            @foreach($students as $user)
                                            <option value="{{ $user->id }}" name="student">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                    <tr><td colspan="9" style="text-align:center">There is no students</td></tr>
                                    @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        @if($teachers->count() > 0)
                                        <label for="project-overview" class="form-label">Encadrant</label>
                                        <select name="teacher" class="form-control select2" data-toggle="select2">
                                            <option name="teacher">Select</option>
                                            @foreach($teachers as $user)
                                            <option value="{{ $user->id }}" name="teacher">{{ $user->name }}</option> @endforeach
                                        </select>
                                    @else
                                    <tr><td colspan="9" style="text-align:center">There is no Teachers</td></tr>
                                    @endif
                                     </div>
                                    </div>
                                  </div>
                                   <div class="form-group">
                                       <button type="submit" class="btn btn-dark form-control">Ajouter</button>
                                   </div> <!-- end col-->

                    </form>
                    </div>
                    <!-- end row -->

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    {{-- <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('projects.store') }}">
                        @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-lg-6">


                            <div class="mb-3">
                                <label for="projectname" class="form-label">Title</label>
                                <input type="text" name="titre" id="projectname" class="form-control" placeholder="Enter project name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="project-overview" class="form-label">Description</label>
                                <input type="text" name="description" id="projectname" class="form-control" placeholder="Enter project name">
                            </div>
                        </div>
                    </div>
                            <div class="mb-3">
                                <label for="project-overview" class="form-label">Société</label>
                                <textarea class="form-control" name="ste" id="project-overview" rows="5" placeholder="Enter some brief about project.."></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="project-overview" class="form-label">Class</label>
                                <textarea class="form-control" name="class" id="project-overview" rows="5" placeholder="Enter some brief about project.."></textarea>
                            </div>

                            <div class="mb-0">
                                @if($students->count() > 0)
                                <label for="project-overview" class="form-label">Student</label>

                                <select name="student" class="form-control select2" data-toggle="select2">
                                    <option name="student">Select</option>
                                    @foreach($students as $user)
                                    <option value="{{ $user->id }}" name="student">{{ $user->name }}</option>
                                    @endforeach
                                </select>


                            @else
                            <tr><td colspan="9" style="text-align:center">There is no students</td></tr>
                            @endif
                            </div>
                            <div class="mb-0">
                                @if($teachers->count() > 0)

                                <label for="project-overview" class="form-label">Teacher</label>

                                <select name="teacher" class="form-control select2" data-toggle="select2">
                                    <option name="teacher">Select</option>
                                    @foreach($teachers as $user)
                                    <option value="{{ $user->id }}" name="teacher">{{ $user->name }}</option> @endforeach
                                </select>


                            @else
                            <tr><td colspan="9" style="text-align:center">There is no Teachers</td></tr>
                            @endif
                            </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary form-control">Submit</button>
                        </div> <!-- end col-->
                    </form>
                    </div>
                    <!-- end row -->

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> --}}
    <!-- end row-->

</div> <!-- container -->
@endsection
