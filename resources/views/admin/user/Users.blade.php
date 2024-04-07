@extends('admin.Layout')
@section('main_content_admin')
<style>
    main{
        font-size: 15px;
    }
</style>
    <main>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li>
                        <a class="active" href="{{ route('admin') }}">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a class="active" href="{{  route('admin.users') }}">users</a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Users List</h3>
                </div>
                <a href="{{ route('admin.users.create') }}">
                    <button type="button" class="btn btn-primary mb-4"> + </button>
                </a>
                
                <table>
                        <tr>
                            <thead>
                                <tr>
                                    <th style="padding-right: 10px; text-align: center;">ID</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Image</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Address</th>
                                    <th class="px-4 py-2">Phone Number</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Action</th>
                                </tr>
                            </thead>
                        </tr>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td style="display: flex;align-items: center;text-align: center;">{{ $user->id }}</td>
                            <td style="padding-right: 10px;">{{ $user->name }}</td>
                            <td style="padding-right: 10px">
                                <img src="/assets/img/avatar/{{ $user->img }}" alt="">
                            </td>
                            <td style="padding-right: 10px">{{ $user->email }}</td>
                            <td style="padding-right: 10px">{{ $user->address }}</td>
                            <td style="padding-right: 10px">{{ $user->phone_number }}</td>
                            <td style="width:10px; padding-right: 20px">{{ $user->status }}</td>
                            <td>
                                <a href="{{ route('admin.user.update',$user->id) }}" class="btn btn-info" style="margin: 10px 20px 10px 20px">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection