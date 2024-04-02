@extends('admin.Layout')
@section('main_content_admin')
<main>
    <div class="head-title">
        <div class="left">
            <h1>Dashboard</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right' ></i></li>
                <li>
                    <a class="active" href="#">Home</a>
                </li>
            </ul>
        </div>
        {{-- <a href="#" class="btn-download">
            <i class='bx bxs-cloud-download' ></i>
            <span class="text">Download PDF</span>
        </a> --}}
    </div>

    <ul class="box-info">
        <li>
            <i class='bx bxs-calendar-check' ></i>
            <span class="text">
                <h3>{{count($orders)}}</h3>
                <p>Orders</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-group' ></i>
            <span class="text">
                <h3>{{count($users)}}</h3>
                <p>Users</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-dollar-circle' ></i>
            <span class="text">
                <h3>{{count($coffees)}}</h3>
                <p>Total porducts</p>
            </span>
        </li>
    </ul>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Recent Orders</h3>
                {{-- <i class='bx bx-search' ></i> --}}
                {{-- <i class='bx bx-filter' ></i> --}}
            </div>
            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Date Order</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)

                    <tr>
                        <td>
                            <img src="assets/img/avatar/{{$item->img}}">
                            <p>{{$item->name}}</p>
                        </td>
                        <td>{{$item->order_date}}</td>
                        <td><span class="status completed">{{$item->status}}</span></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
</main>

@endsection
