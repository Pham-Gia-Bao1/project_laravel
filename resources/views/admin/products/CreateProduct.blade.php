
@extends('admin.Layout')

<style>
    .alert-success{
    border-left: 10px solid #00c069 !important;
    }
    form input, form select{
        border: none !important;
        margin: 5px 5px 0 0px;
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
                        <a class="" href="#">products</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>

                    <li>
                        <a class="active" href="#">create</a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3 style="text-align: center;width:100%">Create Product Form</h3>
                </div>
                <form method="get" enctype="multipart/form-data" class="p-3">

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="size">Size:</label>
                        <input type="text" name="size" id="size" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="weight">Weight:</label>
                        <input type="text" name="weight" id="weight" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" name="price" id="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    

                    <div class="form-group">
                        <label for="reviews">Reviews:</label>
                        <input type="text" name="reviews" id="reviews" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating:</label>
                        <select name="rating" id="rating" class="form-control">
                            @for ($i = 0; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="text" name="quantity" id="quantity" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="coffee_shop_id">Coffee Shop ID:</label>
                        <select name="coffee_shop_id" id="coffee_shop_id" class="form-control">
                            @foreach ($availableIdShops as $idShop)
                                <option value="{{ $idShop }}">{{ $idShop }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category ID:</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach ($availableIdCategory as $idShop)
                                <option value="{{ $idShop }}">{{ $idShop }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>

            </div>

        </div>
    </main>

@endsection
