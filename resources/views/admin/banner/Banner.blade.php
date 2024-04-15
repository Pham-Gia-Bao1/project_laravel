
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
                        <a class="active" href="{{ route('admin') }}">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a class="active" href="{{ route('admin.banner') }}">banner</a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Banner</h3>
                </div>
                    <a href="{{ route('admin.banner.update')}}">
                        <button type="button" class="btn btn-primary mb-4">Change 
                            <i class="fa-solid fa-pen-to-square"></i></button>
                    </a>
                    <div class="banner_img">
                        <img style="width:50rem" src="assets/img/slideshow/{{ $banners[0]->image }}" alt="">
                    </div>
            </div>
            <div class="default_image">
                <form action="" method="get" enctype="multipart/form-data">
                    {{-- @csrf --}}
                    <div class="image">
                        <img src="" alt="Preview Image" id="imagePreview" style="display: none; max-width: 50rem;margin-top:20px;">
                    </div>
                    <a href="">
                        <button id="btn_change" style="background-color: #00c069;padding:10px;border-radius:10px;color:white;float:right;margin:10px;" type="submit">Add now</button>
                    </a>
                    <h3 >Select available photos: </h3>
                    <div style="display: grid;grid-template-columns:1fr 1fr; flex-wrap: wrap;gap:5px;margin-top:20px;">
                        @foreach ($banners as $item)
                        <input type="radio" id="radio{{ $loop->index + 1 }}" value="{{ $item->image }}" style="display: none;" onchange="updateImage(event)">
                        <label for="radio{{ $loop->index + 1 }}">
                            <img width="90%" src="/assets/img/slideshow/{{ $item->image }}" alt="">
                        </label>
                        <input type="hidden" id="banner_id{{ $loop->index + 1 }}"  value="{{$item->id}}">
                        @endforeach
                    </div>                                                       
                </form>  
            </div>
        </div>
    </main>
<style>
    .reviews {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100px; /* Đặt chiều rộng tối đa cho */
    }
</style>
<script>
   function updateImage(event) {
    var selectedImage = event.target.value; // Lấy giá trị ảnh từ radio button được chọn
    
    // Hiển thị ảnh được chọn trong preview
    var imagePreview = document.getElementById('imagePreview');
    imagePreview.src = '/assets/img/slideshow/' + selectedImage;
    imagePreview.style.display = 'block'; // Hiển thị preview image

    // Lấy id của trường input banner_id tương ứng với radio button được chọn
    var selectedBannerId = document.getElementById('banner_id' + event.target.id.slice(5)).value;
    
    // Hiển thị giá trị banner_id trong console để kiểm tra
    console.log("Selected Banner ID:", selectedBannerId);
    
    // Cập nhật giá trị của trường input có id là "id" với giá trị banner_id
    var idInput = document.getElementById('id');
    idInput.value = selectedBannerId;
}

</script>
@endsection
