<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<style>
    .main_side_bar{
        background-color: aqua;
        position: fixed;
        border-radius: 0 20px 20px 0;
        left: 0;
        top: 0;
        bottom: 0;
        width: 30%;
        display: none;
        padding: 20px;
        transition: transform 0.3s ease-in-out; /* Thêm hiệu ứng transition */
        transform: translateX(-100%); /* Ban đầu sidebar sẽ được dịch sang trái 100% để ẩn */
    }
    .main_side_bar.show {
        display: block;
        transform: translateX(0%); /* Khi hiển thị, dịch sidebar về phải 0% */
    }
    .main_side_bar_logo img {
        width: 100px; /* Độ rộng của logo */
    }
    .main_side_bar_list {
        list-style-type: none; /* Ẩn các dấu chấm đầu dòng */
        padding: 0; /* Xóa khoảng cách lề bên trong của danh sách */
    }
    .side_bar_list_item {
        padding: 10px 0; /* Khoảng cách giữa các mục danh sách */
        cursor: pointer; /* Biến con trỏ thành hình cờ */
    }
    .close_button {
        margin-top: 20px; /* Khoảng cách từ danh sách menu đến nút đóng */
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    #sidebarClose{
        position: absolute;
        right: 5px;
        top: 0;
        margin-bottom: 10px;
    }
    .main_side_bar_logo{
        margin: 50px 0 10px 0;
    }
</style>
<button id="sidebarToggle">
    <span class="material-symbols-outlined">
        menu
    </span>
</button>
<div class="main_side_bar" id="sidebar">

    <span  id="sidebarClose"  class="material-symbols-outlined close_button">
        close
    </span>
    <div class="main_side_bar_logo">
        <img src="./assets/icons/logo.svg" alt="grocerymart" class="logo__img top-bar__logo-img" />
    </div>
    <ul class="main_side_bar_list">
        <li class="side_bar_list_item">
            <a href="">
                Home
            </a>
        </li>
        <li class="side_bar_list_item">
            <p>categories</p>
            <ul class="menu-column__list list_categories">
                <li class="menu-column__item">
                    <a href="{{ route('categories','box=Costa Coffee') }}" class="menu-column__link">Costa Coffee</a>
                </li>

                <li class="menu-column__item">
                    <a href="{{ route('categories','box=Dunkin') }}" class="menu-column__link">Dunkin</a>
                </li>
                <li class="menu-column__item">
                    <a href="{{ route('categories','box=LavAzza') }}" class="menu-column__link">LavAzza</a>
                </li>
                <li class="menu-column__item">
                    <a href="{{ route('categories','box=Classico') }}" class="menu-column__link">Classico</a>
                </li>
                <li class="menu-column__item">
                    <a href="{{ route('categories','box=Nescafe') }}" class="menu-column__link">Nescafe</a>
                </li>
                <li class="menu-column__item">
                    <a href="{{ route('categories','box=Patch Roast') }}" class="menu-column__link">Patch Roast</a>
                </li>
                <li class="menu-column__item">
                    <a href="{{ route('categories','box=Starbucks') }}" class="menu-column__link">Starbucks</a>
                </li>
            </ul>
        </li>
    </ul>
</div>

<script>
    var sidebar = document.getElementById('sidebar');

    // Lắng nghe sự kiện click vào nút menu
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        // Thêm class 'show' để hiển thị sidebar
        sidebar.classList.toggle('show');
    });

    // Lắng nghe sự kiện click vào nút đóng sidebar
    document.getElementById('sidebarClose').addEventListener('click', function() {
        // Loại bỏ class 'show' để ẩn sidebar
        sidebar.classList.remove('show');
    });
</script>
