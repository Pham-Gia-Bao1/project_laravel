
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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="margin: 10px 0 10px 0">
                  <i class="fa-solid fa-plus"></i>
                </button>

                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <form class="modal-content" action="{{route('admin.categories.create')}}">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Create a new category</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        {{-- body --}}
                        <div class="modal-body">
                            <input type="text" name="category" class="form-control" placeholder="new category">
                        </div>
                        {{-- footer --}}
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                      </form>
                    </div>
                  </div>

                <div class="head">
                    <h3>Product List</h3>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Size</th>
                            <th>weight</th>
                            <th>Price</th>
                            <th>Images</th>
                            <th>Review</th>
                            <th>Quantity</th>
                            <th>Coffe Shop</th>
                            <th>Category</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td class="w-100">{{$product->id}}</td>
                            <td class="w-100">{{$product->name}}</td>
                            <td class="w-100">{{$product->size}}</td>
                            <td class="w-100">{{$product->weight}}</td>
                            <td class="w-100">{{$product->price}}</td>
                            <td class="w-100">
                                <img src="{{ asset('assets/img/product').'/'.json_decode($product->images)[0] }}" alt="">
                            </td>
                            <td class="w-100">{{$product->reviews}}</td>
                            <td class="w-100">{{$product->quantity}}</td>
                            <td class="w-100">{{$product->coffe_shop_id}}</td>
                            <td class="w-100">{{$product->category_id}}</td>

                            <td>

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

        </div>
    </main>

@endsection
