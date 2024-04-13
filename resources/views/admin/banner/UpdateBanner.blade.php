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
                        <a href="{{ route('admin') }}">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="{{ route('admin.banner') }}">banner</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>

                    <li>
                        <a class="active" href="{{ route('admin.banner.update',$banner->id) }}">update</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3 style="text-align: center;width:100%">Update banner form</h3>
                </div>
                <form method="post" action="{{ route('admin.banner.store',$banner->id) }}" enctype="multipart/form-data" class="p-3">
                    {{-- @method('PATCH') --}}
                    @csrf
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image" onchange="previewImage(event)" class="form-control" accept="image/" value="{{ old('image') ? old('image') : $banner->img }}">
                        <div class="image">
                            <img src="" alt="Preview Image" id="imagePreview" style="display: none; max-width: 50rem;margin-top:20px;">
                        </div>
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
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
    function previewImage(event) {
                var input = event.target;

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        var imagePreview = document.getElementById('imagePreview');
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                    }
                    reader.readAsDataURL(input.files[0]);
                    localStorage.setItem('selectedImage', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
</script>