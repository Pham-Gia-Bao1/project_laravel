<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style_admin.css') }}" />

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    @yield('categories_style');
    @yield('products_style');
    @yield('banner_style');
    @yield('user_style');
    @yield('order_style');
    @yield('contact_style');

	<title>Admin</title>
    <script>
        setTimeout(function(){
            document.querySelector('.alert').style.display = 'none';
        },4000);
    </script>
</head>
<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">AdminHub</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
                <a href="{{route('admin')}}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="{{route('admin.categories')}}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Categories</span>
				</a>
			</li>
			<li>
				<a href="{{route('admin.products')}}">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Products</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.banner') }}">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Banner</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.users') }}">
					<i class='bx bxs-group' ></i>
					<span class="text">Users</span>
				</a>
			</li>
            <li>
				<a href="{{route('admin.order')}}">
					<i class='bx bxs-cog' ></i>
					<span class="text">Order list</span>
				</a>
			</li>
            <li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Contact</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">

			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>


			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>

			<a href="#" class="profile">
				<img src="{{asset('assets/img/avatar')}}/{{Auth::user()->img}}">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		 @yield('main_content_admin')
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="script.js"></script>
</body>
</html>
