@extends('admin_layout')
@section('admin_content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon card-header-rose">
                <div class="card-text">
                    <h4 class="card-title ">{{__('Liệt Kê Users')}}</h4>
                </div>
            </div>
            <span class="" style="margin-left: 800px;">
     <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="badge badge-pill badge-danger" >' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
   </span>
            <br>
            <br>
            {{-- validate --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body table-full-width table-hover">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                        <th>
                            {{__('User Name')}}
                        </th>
                        <th>
                            {{__('Email')}}
                        </th>
                        <th>
                            {{__('Phone')}}
                        </th>
                        <th>
                            {{__('Password')}}
                        </th>
                        <th>
                            {{__('Author')}}
                        </th>
                        <th>
                            {{__('Admin')}}
                        </th>
                        <th>
                            {{__('User')}}
                        </th>
                        </thead>
                        <tbody>
                        @foreach($admin as $key => $user)
                            <form action="{{url('/assign-roles')}}" method="POST">
                                @csrf
                                <tr>
                                    <td>{{ $user->admin_name }}</td>
                                    <td>{{ $user->admin_email }} <input type="hidden" name="admin_email"
                                                                        value="{{ $user->admin_email }}">
                                        <input type="hidden" name="admin_id" value="{{ $user->admin_id }}"></td>
                                    <td>{{ $user->admin_phone }}</td>
                                    <td>{{ $user->admin_password }}</td>
                                    <td><input type="checkbox"
                                               name="author_role" {{$user->hasRole('author') ? 'checked' : ''}}></td>
                                    <td><input type="checkbox"
                                               name="admin_role" {{$user->hasRole('admin') ? 'checked' : ''}}></td>
                                    <td><input type="checkbox"
                                               name="user_role" {{$user->hasRole('user') ? 'checked' : ''}}>
                                    </td>

                                    <td>
                                        <input type="submit" value="Assign roles" class="btn btn-sm btn-default">

                                        <p><a style="margin: 5px 0;" class="btn btn-sm btn-danger"
                                              href="{{url('/delete-user-roles/'.$user->admin_id)}}">Delete User</a></p>

                                        <p><a style="margin: 5px 0;" class="btn btn-sm btn-success"
                                              href="{{url('/impersonate/'.$user->admin_id)}}">Change User</a></p>
                                    </td>

                                </tr>
                            </form>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
