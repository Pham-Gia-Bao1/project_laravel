<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Sign in | Grocery Mart</title>

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="76x76" href="./assets/favicon/apple-touch-icon.png" />
        <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png" />
        <link rel="manifest" href="./assets/favicon/site.webmanifest" />
        <meta name="msapplication-TileColor" content="#da532c" />
        <meta name="theme-color" content="#ffffff" />

        <!-- Fonts -->
        <link rel="stylesheet" href="./assets/fonts/stylesheet.css" />

        <!-- Styles -->
        <link rel="stylesheet" href="./assets/css/main.css" />
        <link rel="stylesheet" href="./assets/css/login.css" />

        <!-- Scripts -->
        <script src="./assets/js/scripts.js"></script>
    </head>
    <body>
        @if (Session::has('error'))
            <div class="alert alert-danger text-center" style="width: 50%; margin: 0 auto;">
                {{ Session::get('error') }}
            </div>
        @endif
        <main class="auth">
            <!-- Auth intro -->
            <div class="auth__intro d-md-none">
                <img src="./assets/img/auth/intro.svg" alt="" class="auth__intro-img" />
                <p class="auth__intro-text">
                    The best of luxury brand values, high quality products, and innovative services
                </p>
            </div>

            <!-- Auth content -->
            <div class="auth__content">
                <div class="auth__content-inner">
                    <a href="./" class="logo">
                        <img src="./assets/icons/logo.svg" alt="grocerymart" class="logo__img" />
                        <h2 class="logo__title">grocerymart</h2>
                    </a>
                    <h1 class="auth__heading">Hello Again!</h1>
                    <p class="auth__desc">
                        Welcome back to sign in. As a returning customer, you have access to your previously saved all
                        information.
                    </p>


    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form class="form auth__form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email Address -->
                        <div class="form__group">
                            <div class="form__text-input">
                                <input
                                    type="email"
                                    name="email"
                                    id=""
                                    placeholder="Email"
                                    class="form__input"
                                    autofocus
                                    required
                                    value="{{old('email')}}"
                                    autocomplete="username"
                                />
                                <img src="./assets/icons/message.svg" alt="" class="form__input-icon" />
                                <img src="./assets/icons/form-error.svg" alt="" class="form__input-icon-error" />
                            </div>
                            <p class="form__error">Email is not in correct format</p>
                        </div>

                            <div class="form__group">
                                <div class="form__group">
                                    <div class="form__text-input">
                                        <input
                                            type="password"
                                            name="password"
                                            id=""
                                            placeholder="Password"
                                            class="form__input"
                                            required
                                            minlength="6"
                                            autocomplete="current-password"
                                        />
                                        <img src="./assets/icons/lock.svg" alt="" class="form__input-icon" />
                                        <img src="./assets/icons/form-error.svg" alt="" class="form__input-icon-error" />
                                    </div>
                                    <p class="form__error">Password must be at least 6 characters</p>
                                </div>

                            </div>

                        <!-- Remember Me -->
                        <div class="block mt-4 m-4">
                                <div class="checkbox-wrapper-46 check-box">
                                    <input class="inp-cbx" id="cbx-46" type="checkbox" name="remember" />
                                    <label class="cbx" for="cbx-46"><span>
                                      <svg width="12px" height="10px" viewbox="0 0 12 10">
                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                      </svg></span><span>Remember me</span>
                                    </label>
                                  </div>


                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif


                        </div>

                        <div class="form__group auth__btn-group">
                            <x-primary-button class="ml-3 btn btn--primary auth__btn form__submit-btn">
                                {{ __('Log in') }}
                            </x-primary-button>
                            {{-- <button class="btn btn--primary auth__btn form__submit-btn">Sign In</button> --}}


                        </div>
                    </form>
                    <a href="{{ url('/login/facebook') }}" style="margin-top: 30px;margin-bottom:-80px; width: 100%;">
                        <button class="btn btn--outline auth__btn">
                            <img src="./assets/icons/facebook.svg" alt="" class="btn__icon icon" />
                            Sign in with Facebook
                        </button>
                    </a>
                    <p class="auth__text">
                        Don’t have an account yet?
                        <a href="{{route('register')}}" class="auth__link auth__text-link">Sign Up</a>
                    </p>
                </div>
            </div>
        </main>
        <script>
            window.dispatchEvent(new Event("template-loaded"));
        </script>
    </body>
</html>
