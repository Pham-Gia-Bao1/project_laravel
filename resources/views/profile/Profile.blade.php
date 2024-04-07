
@extends('Layout.layout')
@section('content')

<main class="profile">
    <div class="container">

        <!-- Search bar -->
        @include('components.search_small_screen')


        <!-- Profile content -->
        <div class="profile-container">
            <div class="row gy-md-3">
                <div class="col-3 col-xl-4 col-lg-5 col-md-12">
                    <aside class="profile__sidebar">
                        <!-- User -->
                        <div class="profile-user">
                            <img src="./assets/img/avatar/{{Auth::user()->img}}" alt="" class="profile-user__avatar" />
                            <a href="changeAvatar" id="update_btn" class="btn btn-primary" style="color:black; height:30px; padding:10px;margin:5px;"><span class="material-symbols-outlined">
                                edit_note
                                </span></a>
                            <h1 class="profile-user__name">{{Auth::user()->name}}</h1>
                            <p class="profile-user__desc">Registered: {{Auth::user()->created_at}}</p>
                        </div>

                        <!-- Menu 1 -->
                        <div class="profile-menu">
                            <h3 class="profile-menu__title">Manage Account</h3>
                            <ul class="profile-menu__list">
                                <li>
                                    <a href="profile_edit" class="profile-menu__link">
                                        <span class="profile-menu__icon">
                                            <img src="./assets/icons/profile.svg" alt="" class="icon" />
                                        </span>
                                        Personal info
                                    </a>
                                </li>
                                <li>
                                    <a href="#!" class="profile-menu__link">
                                        <span class="profile-menu__icon">
                                            <img src="./assets/icons/location.svg" alt="" class="icon" />
                                        </span>
                                        Addresses
                                    </a>
                                </li>
                                <li>
                                    <a href="#!" class="profile-menu__link">
                                        <span class="profile-menu__icon">
                                            <img src="./assets/icons/message-2.svg" alt="" class="icon" />
                                        </span>
                                        Communications & privacy
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Menu 2 -->
                        <div class="profile-menu">
                            <h3 class="profile-menu__title">My items</h3>
                            <ul class="profile-menu__list">
                                <li>
                                    <a href="#!" class="profile-menu__link">
                                        <span class="profile-menu__icon">
                                            <img src="./assets/icons/download.svg" alt="" class="icon" />
                                        </span>
                                        Reorder
                                    </a>
                                </li>
                                <li>
                                    <a href="#!" class="profile-menu__link">
                                        <span class="profile-menu__icon">
                                            <img src="./assets/icons/heart.svg" alt="" class="icon" />
                                        </span>
                                        Lists
                                    </a>
                                </li>
                                <li>
                                    <a href="#!" class="profile-menu__link">
                                        <span class="profile-menu__icon">
                                            <img src="./assets/icons/gift-2.svg" alt="" class="icon" />
                                        </span>
                                        Registries
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Menu 3 -->
                        <div class="profile-menu">
                            <h3 class="profile-menu__title">Subscriptions & plans</h3>
                            <ul class="profile-menu__list">
                                <li>
                                    <a href="#!" class="profile-menu__link">
                                        <span class="profile-menu__icon">
                                            <img src="./assets/icons/shield.svg" alt="" class="icon" />
                                        </span>
                                        Protection plans
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Menu 4 -->
                        <div class="profile-menu">
                            <h3 class="profile-menu__title">Customer Service</h3>
                            <ul class="profile-menu__list">
                                <li>
                                    <a href="#!" class="profile-menu__link">
                                        <span class="profile-menu__icon">
                                            <img src="./assets/icons/info.svg" alt="" class="icon" />
                                        </span>
                                        Help
                                    </a>
                                </li>
                                <li>
                                    <a href="#!" class="profile-menu__link">
                                        <span class="profile-menu__icon">
                                            <img src="./assets/icons/danger.svg" alt="" class="icon" />
                                        </span>
                                        Terms of Use
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="col-9 col-xl-8 col-lg-7 col-md-12">
                    <div class="cart-info">
                        <div class="row gy-3">
                            {{-- content profile --}}
                            @yield('content-profile')
                            <!-- My Wallet -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
