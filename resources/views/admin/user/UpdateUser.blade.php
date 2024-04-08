
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
                        <a class="active" href="{{ route('admin') }}">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a class="active" href="{{  route('admin.users') }}">users</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>

                    <li>
                        <a class="active" href="{{ route('admin.users.create') }}">update</a>
                    </li>
                </ul>
            </div> 

        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3 style="text-align: center;width:100%">Update User Form</h3>
                </div>
                <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data" class="p-3">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ? old('name') : $user->name }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror   
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') ? old('email') : $user->email }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror   
                    </div>
                    <div class="form-group">
                        <label for="password">Pasword:</label>
                        <input type="text" name="password" id="password" class="form-control" value="{{ old('password') ? old('password') : $user->password }}">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror   
                    </div>
                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') ? old('first_name') : $user->first_name }}">
                        @error('first_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror   
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') ? old('last_name') : $user->last_name }}">
                        @error('last_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror   
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address') ? old('address') : $user->address }}">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror   
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image" onchange="previewImage(event)" class="form-control" accept="image/" value="{{ old('image') ? old('image') : $user->img }}">
                        <div class="imgg">
                            <img src="" alt="Preview Image" id="imagePreview" style="display: none; max-width: 200px; max-height: 200px">
                        </div>
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror   
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number:</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number') ? old('phone_number') : $user->phone_number }}">
                        @error('phone_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror   
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select name="status" id="status" class="form-control">
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror   
                    </div>
                    <div class="form-group">
                        <label for="role">Role:</label>
                        <select name="role" id="role" class="form-control">
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                        </select>
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror   
                    </div>                    
        
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
        
            </div>
        
        </div>
        
        <script>
            window.addEventListener('DOMContentLoaded', (event) => {
                var previousImage = localStorage.getItem('selectedImage');

                if (previousImage) {
                    var imagePreview = document.getElementById('imagePreview');
                    imagePreview.src = previousImage;
                    imagePreview.style.display = 'block';

                }
            })

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
        
    </main>

@endsection
