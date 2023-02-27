@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                <li class="nav-item">
                    <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                        Settings
                    </a>
                </li>
            </ul>
            <div class="tab-content">

                <div class="tab-pane" id="settings">
                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info of {{$user->name}}'s Profile</h5>
                        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                            @csrf
                            @method('PUT')
                        <div class="row">

                                <div class="mb-3">
                                    <label for="firstname" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="firstname" value="{{ old('name', $user->name) }}" required autocomplete="name" >
                                    @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                                </div>

                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="useremail" class="form-label">Email Address</label>
                                    <input type="email" class="form-control@error('email') is-invalid @enderror" name="email" value="{{ old('name', $user->email) }}" required autocomplete="email" id="useremail" placeholder="Enter email">
                                    <span class="form-text text-muted"><small>If you want to change email please <a href="javascript: void(0);">click</a> here.</small></span>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="userpassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                    <span class="form-text text-muted"><small>If you want to change password please <a href="javascript: void(0);">click</a> here.</small></span>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="text-end">
                            <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                        </div>
                    </form>
                </div>
                <!-- end settings content-->

            </div> <!-- end tab-content -->
        </div> <!-- end card body -->
    </div> <!-- end card -->
</div> <!-- end col -->


@endsection
