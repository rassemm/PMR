@extends('layouts.master')
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tasks</a></li>
                        <li class="breadcrumb-item active">Project Detail</li>
                    </ol>
                </div>
                <h4 class="page-title">Project Detail</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xxl-8 col-xl-7">
            <!-- project card -->
            <div class="card d-block">
                <div class="card-body">
                    <div class="dropdown card-widgets">
                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='uil uil-ellipsis-h'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class='uil uil-file-upload me-1'></i>Attachment
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class='uil uil-edit me-1'></i>Edit
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class='uil uil-file-copy-alt me-1'></i>Mark as Duplicate
                            </a>
                            <div class="dropdown-divider"></div>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item text-danger">
                                <i class='uil uil-trash-alt me-1'></i>Delete
                            </a>
                        </div> <!-- end dropdown menu-->
                    </div> <!-- end dropdown-->

                    <div class="form-check float-start">
                        <input type="checkbox" class="form-check-input" id="completedCheck">
                        <label class="form-check-label" for="completedCheck">
                            Fiche Projet
                        </label>
                    </div> <!-- end form-check-->

                    <div class="clearfix"></div>

                    <h3 class="mt-3">{{$project->titre}}</h3>

                    <div class="row">
                        <div class="col-6">
                            <!-- assignee -->
                            <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Encadrant</p>
                            <div class="d-flex">
                                <img src="assets/images/users/avatar-9.jpg" alt="Arya S" class="rounded-circle me-2" height="24">
                                <div>
                                    <h5 class="mt-1 font-14">
                                        {{ \App\Models\User::find($project->teacher)->name }}
                                    </h5>
                                </div>
                            </div>
                            <!-- end assignee -->
                        </div> <!-- end col -->

                        <div class="col-6">
                            <!-- start due date -->
                            <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Etudiant</p>
                            <div class="d-flex">
                                <i class='uil uil-schedule font-18 text-success me-1'></i>
                                <div>
                                    <h5 class="mt-1 font-14">
                                        {{ \App\Models\User::find($project->student)->name }}
                                    </h5>
                                </div>
                            </div>
                            <!-- end due date -->
                        </div> <!-- end col -->
                    </div> <!-- end row -->


                    <h5 class="mt-3">Description:</h5>

                    <p class="text-muted mb-4">
                      {{$project->description}}</p>

                    <!-- start sub tasks/checklists -->
                    <h5 class="mt-4 mb-2 font-16">Société</h5>
                    <div class="form-check mt-1">
                        <label class="form-check-label strikethrough" for="checklist1">
                      {{$project->ste}}</label>
                    </div>
                    <h5 class="mt-4 mb-2 font-16">Class</h5>
                    <div class="form-check mt-1">
                        <label class="form-check-label strikethrough" for="checklist1">
                      {{$project->class}}</label>
                    </div>
                </div> <!-- end card-body-->

            </div> <!-- end card-->


        </div> <!-- end col -->

     <div class="col-xxl-4 col-xl-5">

        <div class="card">
                <div class="card-header">
                    <h4 class="my-1">Authorisation de dépot</h4>
                </div>
                <div class="card-body">


                    <div class="text-center mt-2">
                        <a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-spin mdi-loading me-1"></i> Load more </a>
                    </div>

                    <div class="border rounded mt-4">
                        <form action="#" class="comment-area-box">
                            <div class="p-2 bg-light d-flex justify-content-between align-items-center">
                                <div>
                                </div>
                                @if($project->status == false)
                                    <button class="btn btn-success"  type="submit"><i class="fas fa-check">Accepter</i></button>
                              @else
                                    <button class="btn btn-danger"  type="submit"><i class="fas fa-times">Authoriser</i></button>

                              @endif
                            </div>
                        </form>
                    </div> <!-- end .border-->

                </div> <!-- end card-body-->
            </div>
            <!-- end card-->
        </div>
    </div>
    <!-- end row -->

</div> <!-- container -->



@endsection
