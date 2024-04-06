
@extends('admin.Layout')

<style>
    .alert-success{
    border-left: 10px solid #00c069 !important;
    }
</style>
@section('main_content_admin')
    <main>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a class="active" href="#">products</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Order List</h3>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th style="padding-right: 10px; text-align: center;">ID</th>
                            <th>Name customer</th>
                            <th style="padding-right: 10px">Email</th>
                            <th style="padding-right: 10px">Phone number</th>
                            <th>Name product</th>
                            <th style="padding-right: 10px">Quantity</th>
                            <th>Total price</th>
                            <th style="padding-right: 10px">Order date</th>
                            <th style="padding-right: 10px">Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td style="padding-right: 10px; width:10px">{{$order->name}}</td>
                            <td style="padding-right: 10px" class='email'>{{$order->email}}</td>
                            <td style="padding-right: 10px">{{$order->phone_number}}</td>
                            <td>{{$order->product_name}}</td>
                            <td class='reviews' style="padding-right: 10px">{{$order->product_quantity}}</td>
                            <td style="padding-right: 10px">{{$order->total_amount}}</td>

                            <td style="width:10px; padding-right: 20px">{{$order->order_date}}</td>
                            <td>{{$order->status}}</td>

                            <td>
                                <a href="{{route('admin.product.edit',$order->id)}}" class="btn btn-info" style="margin: 10px 0 10px 0">
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

<style>
    .email {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100px; /* Đặt chiều rộng tối đa cho ô td */
    }
</style>
