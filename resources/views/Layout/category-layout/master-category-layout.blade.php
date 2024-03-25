@extends('Layout.layout')
    @section('content')
    <script>
        setTimeout(function(){
    document.getElementById('notification').style.display = 'none';
    // Sau khi ẩn thông báo, tải lại trang
    window.location.href = '/'; // Điều hướng về trang chính (home)

}, 3000);
    </script>
<style>

    .home {
    padding: 0 5% 0 5%;
    width: 100vw;
    background-color: #ffffff;
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    gap: 30px;
    /* height: 100vh; */
    padding-top: 30px;
}

.child {
    /* background-color: green; */
    grid-column: span 3; /* Mỗi phần tử con sẽ chiếm 3 cột */
}

.child2 {
    grid-column: span 9; /* Mỗi phần tử con sẽ chiếm 9 cột */
}

.child ul{
    padding-top: 40px;
    display: flex;
flex-direction: column;
align-items: flex-start;
gap: 20px;
}
.child ul li{

    width: 100%;
    height: 60px;
    border-radius: 10px;
    background: var(--Background-3, #EEE);
    box-shadow: 0px 20px 60px 10px rgba(237, 237, 246, 0.20);
    display: flex;
padding-left: 20px;
flex-direction: column;
align-items: flex-start;
gap: 10px;
border-radius: 10px;
justify-content: center;

/* align-items: center; */

}
.child ul li:hover{
    background: var(--secondary-color, #77DAE6);
    cursor: pointer;
}

.child-item img{
    width: 70px;
height: 59.5px;
flex-shrink: 0;
}

</style>

@if (isset($message))
 <h1 class="notification" id="notification" style="background-color: green;float:right; width: 20%;padding:30px;position:fixed;right:0;z-index:99999;color:white">{{$message}}</h1>
@endif

        <!-- MAIN -->
        <main class="container home">
            <div class="child">
                @include('Layout.category-layout.sided-bar')

            </div>
            <div class="child2">
                @include('Layout.hero')
                {{-- @include('Layout.category-layout.filter') --}}
                @yield('main-category')

            </div>

        </main>
    @endsection
