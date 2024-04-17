
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
                                                    @foreach ($categories as $category)
                                                    <li class="menu-column__item">
                                                        <a href="{{ route('categories',"box=$category->name") }}" class="menu-column__link">{{ $category->name }}</a>
                                                    </li>
                                                    @endforeach
                                                   
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="navbar__item">
                    <a href="/contact-us" class="navbar__link">
                        <strong> Contact us</strong>
                    </a>
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
                                           function openNavbar() {
    var navbar = document.getElementById('navbar');
    navbar.classList.add('show'); // Add the 'show' class to display the navbar

    // Create the list item element for Favorite
    var li1 = document.createElement('li');
    li1.className = 'navbar__item';

    // Create the link element for Favorite
    var a1 = document.createElement('a');
    a1.href = '{{ route("FavoriteList")}}';
    a1.className = 'navbar__link favorite_reponsive';

    // Create the strong element for Favorite
    var strong1 = document.createElement('strong');
    strong1.textContent = 'Favorite';

    // Append the strong element to the link for Favorite
    a1.appendChild(strong1);

    // Append the link to the list item for Favorite
    li1.appendChild(a1);

    // Append the list item for Favorite to the navbar
    document.querySelector('.navbar__list').appendChild(li1);

    // Create the list item element for Checkout
    var li2 = document.createElement('li');
    li2.className = 'navbar__item';

    // Create the link element for Checkout
    var a2 = document.createElement('a');
    a2.href = '{{ route("CheckOut")}}';
    a2.className = 'navbar__link checkout_reponsive';

    // Create the strong element for Checkout
    var strong2 = document.createElement('strong');
    strong2.textContent = 'Checkout';

    // Append the strong element to the link for Checkout
    a2.appendChild(strong2);

    // Append the link to the list item for Checkout
    li2.appendChild(a2);

    // Append the list item for Checkout to the navbar
    document.querySelector('.navbar__list').appendChild(li2);
}

function closeNavbar() {
    var navbar = document.getElementById('navbar');
    navbar.classList.remove('show'); // Remove the 'show' class to hide the navbar

    // Remove the elements with classes 'favorite_reponsive' and 'checkout_reponsive' from the navbar
    var favoriteResponsive = document.querySelector('.navbar__list .favorite_reponsive');
    var checkoutResponsive = document.querySelector('.navbar__list .checkout_reponsive');

    if (favoriteResponsive) {
        favoriteResponsive.remove();
    }
    if (checkoutResponsive) {
        checkoutResponsive.remove();
    }
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
