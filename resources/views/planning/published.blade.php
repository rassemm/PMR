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

                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
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
                                    <th class="all">Id</th>
                                    <th>Soutenance</th>
                                    <th>Salle</th>
                                    <th>Date</th>
                                    <th>Jurys</th>
                                    <th style="width: 85px;">Publié</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!$plannings->isEmpty())
                                @foreach($plannings as $planning)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customCheck2">
                                            <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="m-0 d-inline-block align-middle font-16">
                                            {{ $planning->id }}
                                        </p>
                                    </td>
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
                                        {{ $planning->published ? 'Oui' : 'Non' }}

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
