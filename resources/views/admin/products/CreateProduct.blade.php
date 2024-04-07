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
                        <a class="active" href="{{ route('admin') }}">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="{{ route('admin.products') }}">products</a>
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
                    <h3 style="text-align: center;width:100%">Create Product Form</h3>
                </div>
                <form method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data"
                    class="p-3">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                         @error('name')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="size">Size:</label>
                        <br>
                        <select name="size" id="size" class="form-control" value="{{ old('size') }}">
                            <option value="" disabled selected>Select a size</option>
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
                        <input type="number" name="weight" id="weight" class="form-control" value="{{ old('weight') }}" min="1">
                         @error('weight')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}">
                         @error('price')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Main image:</label>
                        <input type="file" name="image" id="image" class="form-control mb-2" onchange="previewImage(event, 'preview1')">
                        <img id="preview1" src="#" style="display: none; max-width: 80%; height: auto;">
                        @error('image')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Secondary image 1:</label>
                        <input type="file" name="image1" id="image1" class="form-control mb-2" onchange="previewImage(event, 'preview2')">
                        <img id="preview2" src="#" style="display: none; max-width: 80%; height: auto;">
                        @error('image')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Secondary image 2:</label>
                        <input type="file" name="image2" id="image2" class="form-control mb-2" onchange="previewImage(event, 'preview3')">
                        <img id="preview3" src="#" style="display: none; max-width: 80%; height: auto;">
                        @error('image')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Secondary image 3:</label>
                        <input type="file" name="image3" id="image3" class="form-control mb-2" onchange="previewImage(event, 'preview4')">
                        <img id="preview4" src="#" style="display: none; max-width: 50%; max-height: 150px;">
                        @error('image')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="reviews">Reviews:</label>
                        <input type="text" name="reviews" id="reviews" class="form-control" value="{{ old('reviews') }}">
                        @error('reviews')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating:</label>
                        <select name="rating" id="rating" class="form-control" value="{{ old('rating') }}">
                            <option value="" disabled selected>Rating for this product</option>
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
                        <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="{{ old('quantity') }}">
                        @error('quantity')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="coffee_shop_id">Coffee Shop name:</label>
                        <select name="coffee_shop_id" id="coffee_shop_id" class="form-control" value="{{ old('coffee_shop_id') }}">
                             <option value="" disabled selected>Select shop name</option>
                            @foreach ($coffe_shops as $shop)
                                <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                            @endforeach
                        </select>
                        @error('coffee_shop_id')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category name:</label>
                        <select name="category_id" id="category_id" class="form-control" value="{{ old('category_id') }}">
                            <option value="" disabled selected>Choose a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
    function previewImage(event, previewId) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function(){
        var preview = document.getElementById(previewId);
        preview.src = reader.result;
        preview.style.display = 'block';
    };
    reader.readAsDataURL(input.files[0]);
}
</script>