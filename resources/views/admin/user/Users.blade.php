@extends('admin.Layout')
@section('main_content_admin')
    <div class="overflow-x-auto">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Image</th>
                    <th class="px-4 py-2">Email</th>
                    {{-- <th class="px-4 py-2">First Name</th>
                    <th class="px-4 py-2">Last Name</th> --}}
                    <th class="px-4 py-2">Address</th>
                    <th class="px-4 py-2">Phone Number</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="border px-4 py-2">{{ $user->id }}</td>
                    <td class="border px-4 py-2">{{ $user->name }}</td>
                    <td class="border px-4 py-2"><img src="/assets/img/avatar/{{ $user->img }}" style="width: 50px;" alt=""></td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">{{ $user->address }}</td>
                    <td class="border px-4 py-2">{{ $user->phone_number }}</td>
                    <td class="border px-4 py-2">{{ $user->status }}</td>
                    <td class="border px-4 py-2">
                        <a href="" class="btn btn-info" style="margin: 10px 0 10px 0">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a href="" >
                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection