
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
                        <a class="active" href="#">categories</a>
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
                    <h3>Recent Orders</h3>
                </div>
                <table>
                    <thead>
                        <tr">
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)

                        <tr>
                            <td class="w-100">{{$item->name}}</td>
                            <td>

                                <button class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></button>
                                <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </main>

@endsection
