@extends('layouts.master')
@section('content')
     <!-- Start Content-->
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">{{ __('Project List') }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="{{route('projects.create')}}" class="btn btn-success btn-rounded"><i class="mdi mdi-plus-circle me-2"></i>Création</a>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog-outline"></i></button>
                                <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                <button type="button" class="btn btn-light mb-2">Export</button>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
                            <thead class="table-light">
                                <tr>
                                    <th class="all">Project title</th>
                                    <th>Description</th>
                                    <th>Sociéte</th>
                                    <th>Class</th>
                                    <th>Etudiant</th>
                                    <th>Encadrant</th>
                                    <th>Authorisation</th>
                                    <th style="width: 250px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                @foreach ($projects as $project)
                                    <td>
                                        <p class="m-0 d-inline-block align-middle font-16">
                                           {{$project->titre}}.
                                        </p>
                                    </td>
                                    <td>
                                        {{$project->description}}
                                    </td>
                                    <td>
                                      {{$project->ste}}
                                    </td>
                                    <td>
                                        {{$project->class}}
                                      </td>
                                      <td>
                                        {{ \App\Models\User::find($project->student)->name }}
                                    </td>


                                    <td>
                                        {{ \App\Models\User::find($project->teacher)->name }}
                                    </td>
                                    <td>
                                        @if($project->status == false)
                                        <form method="POST" action="{{route('projects.validate',$project->id)}}">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-info mb-2 me-1"  type="submit"><i class="dripicons-lock"></i></button>
                                        </form>
                                      @else
                                            <button class="btn btn-success  mb-2 me-1"  type="submit"><i class="dripicons-lock-open"></i></button>

                                      @endif
                                    </td>
                                     <td >
                                        <div class="btn-group mb-2">
                                        <a href="{{route('projects.edit',$project->id)}}"  class="btn btn-warning "><i class="dripicons-document-edit"></i></a>
                                        <a href="{{route('projects.show',$project->id)}}"  class="btn btn-info "> <i class="dripicons-preview"></i></a>
                                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-block btn-danger" > <i class="dripicons-cross"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

@endsection
