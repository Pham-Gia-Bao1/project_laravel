
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
                    <a href="{{ route('admin.banner.update',$banners[0]->id) }}">
                        <button type="button" class="btn btn-primary mb-4">Change 
                            <i class="fa-solid fa-pen-to-square"></i></button>
                    </a>
                    <div class="banner_img">
                        <img style="width:50rem" src="assets/img/slideshow/{{ $banners[0]->image }}" alt="">
                    </div>
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
@endsection
