@extends('layouts.master')
@section('content')

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
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
                            <thead class="table-light">
                                <tr>
                                    <th class="all">Project</th>
                                    <th>Student</th>
                                    <th>Teacher</th>
                                    <th>Avis</th>
                                    <th style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($soutenances as $soutenance)
                                @if($soutenance->status == 0 )
                                <tr>
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
                                        <span class="badge bg-success">Valide</span>


                                        @else
                                        <span class="badge bg-danger">Non valide</span>
                                        @endif

                                    </td>

                                    @can('soutenance_validate')
                                    <td class="table-action">
                                        @if($soutenance->status == 0)
                                        <form method="POST" action="{{route('approve',$soutenance->id)}}">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-info mb-2 me-1"  type="submit"><i class="dripicons-lock"></i></button>
                                        </form>
                                      @else
                                      <button class="btn btn-success  mb-2 me-1"  type="submit"><i class="dripicons-lock-open"></i></button>
                                      @endif
                                    </td>
                                    @endcan
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

     <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Liste Soutenance finale</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                {{-- <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog-outline"></i></button>
                                <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                <button type="button" class="btn btn-light mb-2">Export</button> --}}
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
                            <thead class="table-light">
                                <tr>
                                    <th class="all">Project</th>
                                    <th>Student</th>
                                    <th>Teacher</th>
                                    <th>Avis Soutenance Technique</th>
                                    <th>Avis Finale</th>
                                    <th style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($soutenances as $soutenance)
                                @if ($soutenance->status == 1 )
                            <tr>
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
                                        <span class="badge bg-success">Valide</span>


                                        @else
                                        <span class="badge bg-danger">Non Valide</span>
                                        @endif

                                    </td>
                                    <td>
                                        @if ($soutenance->status_t != 'pending')
                                        <span class="badge bg-success">Validate</span>


                                        @else
                                        <span class="badge bg-danger">Pending</span>
                                        @endif
                                    </td>

                                    <td>
                                        {{$soutenance->date_f}}
                                    </td>
                                    @can('soutenance_validate')
                                    <td class="table-action">
                                        @if($soutenance->status_t == 'pending')
                                        <form method="POST" action="{{route('avis',$soutenance->id)}}">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-info mb-2 me-1"  type="submit"><i class="dripicons-lock"></i></button>
                                        </form>
                                      @else
                                      <button class="btn btn-success  mb-2 me-1"  type="submit"><i class="dripicons-lock-open"></i></button>
                                      @endif
                                    </td>
                                    @endcan
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
