@extends('admin.Layout')

<style>
    .alert-success {
        border-left: 10px solid #00c069 !important;
    }

    form input,
    form select {
        border: none !important;
        margin: 5px 5px 0 0px;
    }
</style>
@section('main_content_admin')
    <main>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
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
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="" href="#">products</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>

                    <li>
                        <a class="active" href="#">create</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3 style="text-align: center;width:100%">Update product form</h3>
                </div>
                <form method="post" action="{{route('admin.product.update',$coffe->id)}}" enctype="multipart/form-data" class="p-3">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $coffe->name }}">
                         @error('name')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="size">Size:</label>
                        <br>
                        <select name="size" id="size" class="form-control" value="{{ $coffe->size }}">
                            <option value="Large">Large</option>
                            <option value="Medium">Medium</option>
                            <option value="Extra">Extra</option>
                        </select>
                        @error('size')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="weight">Weight:</label>
                        <input type="text" name="weight" id="weight" class="form-control" value="{{ $coffe->weight }}">
                         @error('weight')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" name="price" id="price" class="form-control" value="{{ $coffe->price }}">
                         @error('price')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Main image:</label>
                        <input type="file" name="image" id="image" class="form-control"  onchange="previewImage(event)">
                        <img id="preview-image" width="100px" src="{{ asset('assets/img/product').'/'.json_decode($coffe->images)[0] }}"
                            alt="image">
                        <input type="text" id='fileImage' name='fileImage' value='{{ isset(json_decode($coffe->images)[0]) ? json_decode($coffe->images)[0] : "" }}'>
                        @error('image')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Secondary image 1:</label>
                        <input type="file" name="image1" id="image1" class="form-control">
                         <input type="text" id='fileImage' name='fileImage' value='{{ isset(json_decode($coffe->images)[1]) ? json_decode($coffe->images)[1] : "" }}'>
                        @error('image')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Secondary image 2:</label>
                        <input type="file" name="image2" id="image2" class="form-control">
                         <input type="text" id='fileImage' name='fileImage' value='{{ isset(json_decode($coffe->images)[2]) ? json_decode($coffe->images)[2] : "" }}'>
                        @error('image')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Secondary image 3:</label>
                        <input type="file" name="image3" id="image3" class="form-control">
                         <input type="text" id='fileImage' name='fileImage' value='{{ isset(json_decode($coffe->images)[3]) ? json_decode($coffe->images)[3] : "" }}'>
                        @error('image')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="reviews">Reviews:</label>
                        <input type="text" name="reviews" id="reviews" class="form-control" value="{{ $coffe->reviews }}">
                        @error('reviews')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating:</label>
                        <select name="rating" id="rating" class="form-control" value="{{ $coffe->rating }}">
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                         @error('rating')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="{{ $coffe->quantity }}">
                        @error('quantity')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="coffe_shop_id">Coffee Shop name:</label>
                        <select name="coffe_shop_id" id="coffe_shop_id" class="form-control">
                            <option value="{{ $coffe->coffe_shop_id	 }}" selected>{{ $coffe->shop_name }}</option>
                            @foreach ($coffe_shops as $shop)
                                @if($shop->name !== $coffe->shop_name)
                                    <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('coffee_shop_id')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category name:</label>
                        <select name="category_id" id="category_id" class="form-control" value="{{ $coffe->category_name }}">
                            <option value="{{$coffe->category_id}}" selected>{{$coffe->category_name}}</option>
                            @foreach ($categories as $category)
                                @if($coffe->category_name!=$category->name){
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                }
                                @endif
                            @endforeach
                        </select>
                         @error('category_id')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
            </div>
        </div>
    </main>
@endsection
<script>
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var imgElement = document.getElementById('preview-image');
            imgElement.src = reader.result;
        }
        reader.readAsDataURL(input.files[0]);
        document.getElementById('fileImage').value = input.files[0].name;
    }
</script>