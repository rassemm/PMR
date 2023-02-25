@extends('layouts.master')
@section('content')


    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Liste Soutenance technique</h4>
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
                            <a href="javascript:void(0);" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add new</a>
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
                                    <th class="all" style="width: 20px;">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customCheck1">
                                            <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th class="all">#</th>
                                    <th class="all">Project</th>
                                    <th>Student</th>
                                    <th>Teacher</th>
                                    <th>Avis Soutenance Technique</th>
                                    <th style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($soutenances as $soutenance)
                                @if($soutenance->status == 0 )
                                <tr>
                                    <td>



                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customCheck2">
                                            <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="m-0 d-inline-block align-middle font-16">
                                            {{ $soutenance->id }}
                                        </p>
                                    </td>
                                        <td>
                                            <p class="m-0 d-inline-block align-middle font-16">
                                                {{ $soutenance->project->titre}}
                                            </p>
                                        </td>
                                        <td>
                                            {{ \App\Models\User::find($soutenance->project->student)->name }}
                                        </td>
                                        <td>
                                            {{ \App\Models\User::find($soutenance->project->teacher)->name }}
                                        </td>
                                    <td>
                                        @if ($soutenance->status !=0)
                                        <span class="badge bg-success">Approved</span>


                                        @else
                                        <span class="badge bg-danger">Pending</span>
                                        @endif

                                    </td>


                                    <td class="table-action">
                                        @if($soutenance->status == 0)
                                        <form method="POST" action="{{route('approve',$soutenance->id)}}">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-success"  type="submit"><i class="fas fa-check">Published</i></button>
                                        </form>
                                      @else
                                            <button class="btn btn-danger"  type="submit"><i class="fas fa-times">Pending</i></button>

                                      @endif
                                </tr>
                                {{-- @else
                            <tr><td colspan="9" style="text-align:center">There is no Student</td></tr>--}}
                            @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

    <!-- end row -->


     <!-- start page title -->
     <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Liste Soutenance finale</h4>
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
                            <a href="javascript:void(0);" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add new</a>
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
                                    <th class="all" style="width: 20px;">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customCheck1">
                                            <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th class="all">Project</th>
                                    <th>Student</th>
                                    <th>Teacher</th>
                                    <th>Jerry President</th>
                                    <th>protractor</th>
                                    <th>Avis Soutenance Technique</th>
                                    <th>Avis Soutenance Finale</th>
                                    <th>Date</th>
                                    <th style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($soutenances as $soutenance)
                                @if ($soutenance->status == 1 && $soutenance->project == $project_id)
                            <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customCheck2">
                                            <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="m-0 d-inline-block align-middle font-16">
                                            {{ $soutenance->project->titre }}
                                        </p>
                                    </td>
                                    <td>
                                        {{ \App\Models\Project::find($soutenance->project)->student }}
                                    </td>
                                    <td>
                                      {{ \App\Models\Project::find($soutenance->project)->teacher }}
                                    </td>
                                    <td>
                                        {{ \App\Models\User::find($soutenance->president)->name }}
                                    </td>

                                    <td>
                                        {{ \App\Models\User::find($soutenance->protactor)->name }}
                                    </td>
                                    <td>
                                        @if ($soutenance->status !=0)
                                        <span class="badge bg-success">Approved</span>


                                        @else
                                        <span class="badge bg-danger">Pending</span>
                                        @endif

                                    </td>
                                    <td>
                                        @if ($soutenance->status_t != 'pending')
                                        <span class="badge bg-success">Approved</span>


                                        @else
                                        <span class="badge bg-danger">Pending</span>
                                        @endif
                                    </td>

                                    <td>
                                        {{$soutenance->date_f}}
                                    </td>
                                    <td class="table-action">
                                        @if($soutenance->status_t == 'pending')
                                        <form method="POST" action="{{route('approve',$soutenance->id)}}">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-success"  type="submit"><i class="fas fa-check">Approve</i></button>
                                        </form>
                                      @else

                                            <button class="btn btn-danger"  type="submit"><i class="fas fa-times">Pending</i></button>

                                      @endif
                                </tr>
                                {{-- @else
                                <tr><td colspan="9" style="text-align:center">There is no Student</td></tr>--}}
                                @endif

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
