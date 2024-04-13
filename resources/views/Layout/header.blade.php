
<div class="container">
    <style>
        .dropdown__inner{
             top: -40px;
             width: min-content;
             left: 30%;
        }

    .list_categories li{
            width:200px;
            padding: 10px;
        }

    </style>
    <div class="top-bar">
        <!-- More -->
        <button class="top-bar__more d-none d-lg-block js-toggle" id="navbarToggle" toggle-target="#navbar">
            <img src="./assets/icons/more.svg" alt="" class="icon top-bar__more-icon" />
        </button>

        <!-- Logo -->
        <a href="./" class="logo top-bar__logo">
            <img src="./assets/icons/logo.svg" alt="grocerymart" class="logo__img top-bar__logo-img" />
            <h1 class="logo__title top-bar__logo-title">grocerymart</h1>
        </a>

        <!-- Navbar -->
        <nav id="navbar" class="navbar hide">

            <ul class="navbar__list js-dropdown-list">
                <li class="navbar__item">
                    <a href="home" class="navbar__link">
                        <strong> Home</strong>
                    </a>
                </li>
                <li class="navbar__item">
                    <a href="categories" class="navbar__link">
                        Categories
                        <img src="./assets/icons/arrow-down.svg" alt="" class="icon navbar__arrow" />
                    </a>

                    <div class="dropdown js-dropdown">
                        <div class="dropdown__inner">
                            <div class="top-menu">
                                <div class="sub-menu sub-menu--not-main">

                                    <div class="sub-menu__column">
                                        <!-- Menu column 1 -->
                                        <div class="menu-column">
                                            <div class="menu-column__icon">
                                                <img
                                                    src="./assets/img/category/cate-18.1.svg"
                                                    alt=""
                                                    class="menu-column__icon-1"
                                                    />
                                                <img
                                                    src="./assets/img/category/cate-18.2.svg"
                                                    alt=""$65.42

                                                    class="menu-column__icon-2"
                                                />
                                            </div>
                                            <div class="menu-column__content">
                                                <h2 class="menu-column__heading">
                                                    <a href="#!">Category type</a>
                                                </h2>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
               

            </ul>
        </nav>
        <div class="navbar__overlay js-toggle" toggle-target="#navbar" id="navbarToggle_hidde"></div>
       @if (isset(Auth::user()->name) )
            @include('Layout.subNavBar')
    </div>
       @else
            @include('Layout.login-signup-button')
       @endif

    </div>
</div>

                                                    <script>
                                                        // Function to open navbar
                                                        function openNavbar() {
                                                            var navbar = document.getElementById('navbar');
                                                            navbar.classList.add('show'); // Add the 'show' class to display the navbar
                                                        }

                                                        // Function to close navbar
                                                        function closeNavbar() {
                                                            var navbar = document.getElementById('navbar');
                                                            navbar.classList.remove('show'); // Remove the 'show' class to hide the navbar
                                                        }

                                                        // Listen for click event on navbar toggle button
                                                        document.getElementById('navbarToggle').addEventListener('click', function() {
                                                            var navbar = document.getElementById('navbar');
                                                            if (navbar.classList.contains('show')) {
                                                                closeNavbar(); // If navbar is already open, close it
                                                            } else {
                                                                openNavbar(); // If navbar is closed, open it
                                                            }
                                                        });

                                                        // Listen for click event on navbar overlay to close navbar
                                                        document.getElementById('navbarToggle_hidde').addEventListener('click', function() {
                                                            closeNavbar(); // Close navbar when clicking on overlay
                                                        });
                                                    </script>
