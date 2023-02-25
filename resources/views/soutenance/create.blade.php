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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Soutenances</a></li>
                        <li class="breadcrumb-item active">Create Soutenance</li>
                    </ol>
                </div>
                <h4 class="page-title">Create Soutenance</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('soutenances.store') }}">
                        @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-0">
                                @if($projects->count() > 0)
                                <label for="project-overview" class="form-label">Project</label>

                                <select name="project_titre" id="titre" class="form-control select2" data-toggle="select2">
                                    <option name="project" id="project">Select</option>
                                    @foreach($projects as $project)
                                    <option value="{{ $project->id }}" $id ? 'selected = "selected"' : '' }}>{{ $project->titre }}</option>
                                    @endforeach
                                </select>
                                @else
                                <tr><td colspan="9" style="text-align:center">There is no students</td></tr>
                                @endif

{{--

                            </div>
                            <div class="mb-3">
                                <label for="titre" class="form-label">ID:</label>
                                <input type="text" name="titre" id="titre" class="form-control" disabled>>
                            </div>
                            <div class="mb-3">
                                <label for="student" class="form-label">Etudiant</label>
                                <input type="text" name="student" id="student" class="form-control" disabled>>
                            </div>
                            <div class="mb-3">
                                <label for="teacher" class="form-label">Enseigant</label>
                                <input type="text" name="teacher" id="teacher" class="form-control" disabled>>
                            </div>
                            <div class="mb-3">
                                <label for="ste" class="form-label">STE</label>
                                <input type="text" name="ste" id="ste" class="form-control" disabled>>
                            </div>
                            </div>
                            </div> --}}

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
    </div>
    <!-- end row-->

</div> <!-- container -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.slim.js" integrity="sha512-M3zrhxXOYQaeBJYLBv7DsKg2BWwSubf6htVyjSkjc9kPqx7Se98+q1oYyBJn2JZXzMaZvUkB8QzKAmeVfzj9ug==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.slim.min.js" integrity="sha512-jxwTCbLJmXPnV277CvAjAcWAjURzpephk0f0nO2lwsvcoDMqBdy1rh1jEwWWTabX1+Grdmj9GFAgtN22zrV0KQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">


</script>
@endsection
