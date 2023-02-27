@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Nombre des soutenances par mention</h4>
                <div class="chart-container">
                    <canvas id="myChart" width="400" height="400"></canvas>
                </div>
            </div> <!-- end card body-->
        </div>
    </div><!-- end card -->
    </div><!-- end col-->
</div>
<div class="container">
<div class="row">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-4">Liste des planifications des soutenances</h4>
            <div class="table-responsive">
                <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
                    <thead class="table-light">
                        <tr>
                            <th>Soutenance</th>
                            <th>Etudiant</th>
                            <th>Encadrant</th>
                            <th>Société</th>
                            <th>Class</th>
                            <th>Salle</th>
                            <th>Date</th>
                            <th style="width: 100px;">Jurys</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$publishedPlannings->isEmpty())
                        @foreach($publishedPlannings as $planning)
                        <tr>
                                <td>
                                    <p class="m-0 d-inline-block align-middle font-16">
                                        {{ \App\Models\Soutenance::find($planning->soutenance->id)->project->titre }}
                                    </p>
                                </td>
                                <td>
                                    {{ \App\Models\User::find(\App\Models\Project::find($planning->soutenance->project_id)->student)->name }}
                                </td>
                                <td>
                                    {{ \App\Models\User::find(\App\Models\Project::find($planning->soutenance->project_id)->teacher)->name }}
                                </td>
                                <td>
                                    {{ \App\Models\Soutenance::find($planning->soutenance->id)->project->ste }}
                                </td>
                                <td>
                                    {{ \App\Models\Soutenance::find($planning->soutenance->id)->project->class }}
                                </td>
                                <td>
                                   {{ $planning->salle }}
                                </td>
                                <td>
                            {{ $planning->date }}
                                </td>
                                @foreach ($planning->users as $user)
                                <td>
                                <span class="badge bg-success">  {{ $user->name }}</span>
                            </td>
                            @endforeach
                            <td>
                            </td>
                        </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div> <!-- end card body-->
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script>
    <script>
          var data = JSON.parse('{!! $data !!}');
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom',
            },
            title: {
                display: true,
                text: 'Répartition des mentions'
            }
        }
    }
});
</script>

@endsection

