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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Planning</a></li>
                        <li class="breadcrumb-item active">Planning</li>
                    </ol>
                </div>
                <h4 class="page-title">Planning</h4>
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
                            <form action="{{ route('planifie') }}" method="POST">
                                @csrf
                                <button type="submit"  class="btn btn-primary btn-rounded">{{__('Générer Planning')}}</button>
                            </form>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <form method="POST" action="{{ route('planning.publish') }}">
                                    @csrf
                                    {{-- <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                    <button type="button" class="btn btn-light mb-2">Export</button> --}}
                                    <button type="submit" class="btn btn-success  btn-rounded mb-2 me-1"> <i class="dripicons-export"></i>Publier</button>
                                </form>

                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
                            <thead class="table-light">
                                <tr>
                                    <th>Soutenance</th>
                                    <th>Salle</th>
                                    <th>Date</th>
                                    <th>Jurys</th>
                                    <th>Publié</th>
                                    <th style="width: 125px;">Note</th>
                                    <th style="width: 125px;">Mention</th>
                                    <th style="width: 85px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!$plannings->isEmpty())
                                @foreach($plannings as $planning)
                                <tr>
                                        <td>
                                            <p class="m-0 d-inline-block align-middle font-16">
                                                {{ \App\Models\Soutenance::find($planning->soutenance->id)->project->titre }}
                                            </p>
                                        </td>
                                        <td>
                                           {{ $planning->salle }}
                                        </td>
                                        <td>
                                    {{ $planning->date }}
                                        </td>
                                    <td>
                                        @foreach ($planning->users as $user)
                                        <span class="badge bg-success">  {{ $user->name }}</span>
                                    @endforeach

                                    </td>
                                    <td>
                                        @if ($planning->published)
                                        <span class="badge bg-success">Publié</span>
                                        @else
                                        <span class="badge bg-warning">  Non publié</span>
                                        @endif
                                    </td>
                                  @if($planning->date < now())

                                  <td>
                                    @if(!empty($planning->note))
                                    <button type="button" class="btn btn-outline-success btn-rounded">{{ $planning->note }}</button>
                                 @else
                                   <form action="{{ route('plannings.mention', $planning->id) }}" method="POST">
                                      @csrf
                                      <div class="btn-group mb-2">
                                      <input type="number" class="form-control" style="max-width: 125px" name="note" value="{{ $planning->note }}">
                                      <button type="submit" class="btn btn-primary btn-sm"><i class="mdi mdi-plus-circle"></i> </button>
                                    </div>
                                     </form>
                                     @endif
                                     </td>
                                  <td><button type="button" class="btn btn-outline-success btn-rounded">{{ $planning->mention }}</button>
                                  </td>
                                     @else
                                       <td>-</td>
                                       <td>-</td>
                                   @endif
                                    <td>
                                        <form action="{{ route('plannings.destroy', $planning->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette planification ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-rounded"><i class="mdi mdi-window-close"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->
@endsection
