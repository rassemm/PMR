@extends('layouts.master')

@section('content')

    <div class="card">
        <div class="card-header">{{ __('Admins List') }}</div>

        <div class="card-body">
            @can('user_create')
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Add New User</a>
            @endcan
            <br /><br />
                <table class="table table-borderless table-hover">
                            <tr class="bg-info text-light">
                                <th class="text-center">ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            @if($admins->count() > 0)
                            @foreach($admins as $user)
                              <tr>
                                <th>{{ $user->id }}</th>
                                <td><b>{{ $user->name }}</b></td>
                                <td>{{ $user->email }}</td>
                                <td>

                                  <span class="badge badge-secondary" style=" font-size: 0.75rem">{{$user->role->title ?? "--"}}</span>

                                </td>
                                <td> @can('user_show')
                                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-success">Show</a>
                                @endcan</td>
                                <td> @can('user_edit')
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                @endcan</td>

                                <td>
                                    @can('user_delete')
                                  @if( $uid->id !== $user->id )
                                  <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                      @method('DELETE')
                                      @csrf
                                      <button class="btn btn-block btn-sm btn-danger">Delete</button>
                                  </form>
                                  @endif
                                </td>
                                @endcan
                                <td>
                                  @if( $uid->id !== $user->id )
                                  <form method="POST" action="/users/{{ $user->id }}">
                                      @csrf
                                      @method('PUT')
                                      <input name="role" value="removeAdmin" hidden/>
                                      <button class="btn btn-block btn-sm btn-danger">Remove Admin</button>
                                  </form>
                                  @endif
                                </td>
                              </tr>
                            @endforeach
                          @else
                          <tr><td colspan="9" style="text-align:center">There is no admins</td></tr>
                          @endif

                    {{-- @forelse ($users as $user)
                        <tr>
                            <td class="text-center">{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role->title ?? "--"}}</td>
                            <td>
                                    @can('user_show')
                                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-success">Show</a>
                                    @endcan
                                    @can('user_edit')
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    @endcan
                                    @can('user_delete')
                                <form action="{{ route('admin.users.destroy', $user->id) }}" class="d-inline-block" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="100%" class="text-center text-muted py-3">No Users Found</td>
                            </tr>
                    @endforelse --}}
                </table>
        </div>
    </div>


    <div class="card">
        <div class="card-header">{{ __('Teacher List') }}</div>

        <div class="card-body">
            <br /><br />
                <table class="table table-borderless table-hover">
                            <tr class="bg-info text-light">
                                <th class="text-center">ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            @if($teachers->count() > 0)
                            @foreach($teachers as $user)
                            @if(!$admins->contains($user))
                              <tr>
                                <th>{{ $user->id }}</th>
                                <td><b>{{ $user->name }}</b></td>
                                <td>{{ $user->email }}</td>
                                <td>

                                  <span class="badge badge-secondary" style=" font-size: 0.75rem">{{$user->role->title ?? "--"}}</span>

                                </td>
                                <td> @can('user_show')
                                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-success">Show</a>
                                @endcan</td>
                                <td> @can('user_edit')
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                @endcan</td>

                                <td>
                                    @can('user_delete')
                                  @if( $uid->id !== $user->id )
                                  <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                      @method('DELETE')
                                      @csrf
                                      <button class="btn btn-block btn-sm btn-danger">Delete</button>
                                  </form>
                                  @endif
                                </td>
                                @endcan
                              </tr>
                              @endif
                              @endforeach
                          @else
                          <tr><td colspan="9" style="text-align:center">There is no Teachers</td></tr>
                          @endif

                    {{-- @forelse ($users as $user)
                        <tr>
                            <td class="text-center">{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role->title ?? "--"}}</td>
                            <td>
                                    @can('user_show')
                                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-success">Show</a>
                                    @endcan
                                    @can('user_edit')
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    @endcan
                                    @can('user_delete')
                                <form action="{{ route('admin.users.destroy', $user->id) }}" class="d-inline-block" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="100%" class="text-center text-muted py-3">No Users Found</td>
                            </tr>
                    @endforelse --}}
                </table>

        </div>
    </div>

    <div class="card">
        <div class="card-header">{{ __('Student List') }}</div>

        <div class="card-body">
            <br /><br />
                <table class="table table-borderless table-hover">
                            <tr class="bg-info text-light">
                                <th class="text-center">ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            @if($students->count() > 0)
                            @foreach($students as $user)
                            @if(!$admins->contains($user))
                              <tr>
                                <th>{{ $user->id }}</th>
                                <td><b>{{ $user->name }}</b></td>
                                <td>{{ $user->email }}</td>
                                <td>

                                    <span class="badge badge-secondary" style=" font-size: 0.75rem">{{$user->role->title ?? "--"}}</span>

                                </td>
                                <td> @can('user_show')
                                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-success">Show</a>
                                @endcan</td>
                                <td> @can('user_edit')
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                @endcan</td>

                                <td>
                                    @can('user_delete')
                                  @if( $uid->id !== $user->id )
                                  <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                      @method('DELETE')
                                      @csrf
                                      <button class="btn btn-block btn-sm btn-danger">Delete</button>
                                  </form>
                                  @endif
                                </td>
                                @endcan
                              </tr>
                              @endif
                              @endforeach
                          @else
                          <tr><td colspan="9" style="text-align:center">There is no Teachers</td></tr>
                          @endif

                    {{-- @forelse ($users as $user)
                        <tr>
                            <td class="text-center">{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role->title ?? "--"}}</td>
                            <td>
                                    @can('user_show')
                                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-success">Show</a>
                                    @endcan
                                    @can('user_edit')
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    @endcan
                                    @can('user_delete')
                                <form action="{{ route('admin.users.destroy', $user->id) }}" class="d-inline-block" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="100%" class="text-center text-muted py-3">No Users Found</td>
                            </tr>
                    @endforelse --}}
                </table>

        </div>
    </div>
@endsection
