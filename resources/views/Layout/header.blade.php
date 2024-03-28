<div class="container">
    <div class="top-bar">
        <!-- More -->
        <button class="top-bar__more d-none d-lg-block js-toggle" toggle-target="#navbar">
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
                        <strong> Categories</strong>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="navbar__overlay js-toggle" toggle-target="#navbar"></div>
       @if (isset(Auth::user()->name) )
            @include('Layout.subNavBar')
       @else
            @include('Layout.login-signup-button')
       @endif

    </div>
</div>
