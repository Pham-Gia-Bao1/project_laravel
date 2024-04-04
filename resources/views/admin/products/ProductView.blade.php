
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
                    <h3>Product List</h3>
                </div>
                <a href="{{route('admin.product.create')}}">
                    <button type="button" class="btn btn-primary mb-4">Add new product</button>
                </a>
                <table>
                    <thead>
                        <tr>
                            <th style="padding-right: 10px; text-align: center;">ID</th>
                            <th>Name</th>
                            <th style="padding-right: 10px">Size</th>
                            <th style="padding-right: 10px">Weight</th>
                            <th>Price</th>
                            <th style="padding-right: 10px">Images</th>
                            <th>Review</th>
                            <th style="padding-right: 10px">Rating</th>
                            <th style="padding-right: 10px">Quantity</th>
                            <th>Coffe Shop</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td style="padding-right: 10px; width:10px">{{$product->name}}</td>
                            <td style="padding-right: 10px">{{$product->size}}</td>
                            <td style="padding-right: 10px">{{$product->weight}}</td>
                            <td>{{$product->price}}</td>
                            <td style="padding-right: 10px">
                                <img src="{{ asset('assets/img/product').'/'.json_decode($product->images)[0] }}" alt="">
                            </td>
                            <td class='reviews'>{{$product->reviews}}</td>
                            <td style="padding-right: 10px">{{$product->rating}}</td>

                            <td>{{$product->quantity}}</td>
                            <td style="width:10px; padding-right: 20px">{{$product->shop_name}}</td>
                            <td>{{$product->category_name}}</td>

                            <td>

                                <a href="{{route('admin.product.edit',$product->id)}}" class="btn btn-info" style="margin: 10px 0 10px 0">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="{{route('admin.product.delete',$product->id)}}" >
                                    <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
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
    .reviews {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100px; /* Đặt chiều rộng tối đa cho ô td */
    }
</style>
