
@extends('admin.Layout')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
                            <th style="padding-right: 10px; text-align: center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td style="vertical-align: middle !important;">{{$order->id}}</td>
                            <td style="padding-right: 10px; width:10px">{{$order->name}}</td>
                            <td style="padding-right: 10px" class='email'>{{$order->email}}</td>
                            <td style="padding-right: 10px">{{$order->phone_number}}</td>
                            <td>{{$order->product_name}}</td>
                            <td class='reviews' style="padding-right: 10px">{{$order->product_quantity}}</td>
                            <td style="padding-right: 10px">{{$order->total_amount}}</td>
                            <td style="width:10px; padding-right: 20px">{{$order->order_date}}</td>
                            <td>
                                <form action=" {{ route('orders.update', $order->id) }}" id="updateStatusForm-{{ $order->id }}"
                                    method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="btn-group">
                                        <input onchange="handleUpdate('{{ $order->id }}')" type="radio" class="btn-check" name="status"
                                            id="new-{{ $order->id }}" value="pending" {{ $order->status == 'pending' ? 'checked' : '' }}>
                                        <label class="btn btn-outline-primary" for="new-{{ $order->id }}">Pending</label>
                                        <input onchange="handleUpdate('{{ $order->id }}')" type="radio" class="btn-check"
                                            name="status" id="delivering-{{ $order->id }}" value="processing"
                                            {{ $order->status == 'processing' ? 'checked' : '' }}>
                                        <label class="btn btn-outline-primary" for="delivering-{{ $order->id }}">Delivering</label>
                                        <input onchange="handleUpdate('{{ $order->id }}')" type="radio" class="btn-check"
                                            name="status" id="delivered-{{ $order->id }}" value="delivered"
                                            {{ $order->status == 'delivered' ? 'checked' : '' }}>
                                        <label class="btn btn-outline-primary" for="delivered-{{ $order->id }}">Delivered</label>
                                        <input onchange="handleUpdate('{{ $order->id }}')" type="radio" class="btn-check"
                                            name="status" id="canceled-{{ $order->id }}" value="canceled"
                                            {{ $order->status == 'canceled' ? 'checked' : '' }}>
                                        <label class="btn btn-outline-primary" for="canceled-{{ $order->id }}">Canceled</label>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
<script>
    function handleUpdate(id) {
        var confirmation = confirm("Are you sure you want to update the order status?");
        if (confirmation) {
            document.getElementById(`updateStatusForm-${id}`).submit();
        } else {
            location.reload()
        }
    }
</script>
<style>
    .email {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100px; /* Đặt chiều rộng tối đa cho ô td */
    }
</style>
