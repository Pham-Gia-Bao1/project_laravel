
@extends('admin.Layout')

<style>
        .alert-success{
        border-left: 10px solid #00c069 !important;
        }
        form{
            width: 50%;
            border-radius: 10px;
        }
            form.bg-primary {
        background-color: #c5e1ff !important;
        color: #ffffff;
    }

    form.bg-primary button {
        background-color: #ffffff;
        color: #007bff;
        border: 1px solid #007bff;
    }
    form div {
        width: 100%;

        margin: 10px 0;
    }

    form input[type="text"], form button {
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #ced4da;
        width: 100%;
    }

    form input[type="text"] {
        width: 200px; /* Điều chỉnh kích thước input nếu cần */
    }
    form input[type="text"], form button {
        font-family: Arial, sans-serif;
        font-size: 16px;
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
    @if(session('message'))
    <div class="alert alert-danger">
        {{ session('message') }}
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
                        <a class="active" href="{{ route('admin.categories') }}">categories</a>
                    </li>
                    <li>
                        <i class='bx bx-chevron-right' ></i>
                        <a class="active" href="#">update</a>
                    </li>
                </ul>
            </div>

        </div>

       <h4  >Form update</h4>
       <form action="" class="bg-primary p-3">
        <div class="form-group">
            <input type="text" name="category" value="{{ old('category') ?? $category->name }}" class="form-control" id="categoryInput">
            @error('category')
            <span style="color: #ed4337; margin-top:5px;" class="text-danger">{{ $message }}</span>
        @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>


    </main>

@endsection
