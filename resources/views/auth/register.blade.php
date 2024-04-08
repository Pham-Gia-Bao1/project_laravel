



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Sign up | Grocery Mart</title>

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

        <!-- Scripts -->
        <script src="./assets/js/scripts.js"></script>
    </head>
    <body>
        <main class="auth">
            <!-- Auth intro -->
            <div class="auth__intro">
                <a href="./" class="logo auth__intro-logo d-none d-md-flex">
                    <img src="./assets/icons/logo.svg" alt="grocerymart" class="logo__img" />
                    <h1 class="logo__title">grocerymart</h1>
                </a>
                <img src="./assets/img/auth/intro.svg" alt="" class="auth__intro-img" />
                <p class="auth__intro-text">
                    The best of luxury brand values, high quality products, and innovative services
                </p>
                <button class="auth__intro-next d-none d-md-flex js-toggle" toggle-target="#auth-content">
                    <img src="./assets/img/auth/intro-arrow.svg" alt="" />
                </button>
            </div>

            <!-- Auth content -->
            <div id="auth-content" class="auth__content hide">
                <div class="auth__content-inner">
                    <a href="./" class="logo">
                        <img src="./assets/icons/logo.svg" alt="grocerymart" class="logo__img" />
                        <h1 class="logo__title">grocerymart</h1>
                    </a>
                    <h1 class="auth__heading">Sign Up</h1>
                    <p class="auth__desc">Let’s create your account and Shop like a pro and save money.</p>
                        <form method="POST" action="{{ route('register') }}" class="form auth__form">
                            @csrf
                        <div class="form__group">
                            <div class="form__text-input">

                                <input

                                placeholder="Name"
                                class="form__input"
                                autofocus
                                required
                                id="name"
                                class="block mt-1 w-full"
                                type="text"
                                name="name"
                                value="{{old('name')}}"
                                 autocomplete="name"

                            />

                            <img src="./assets/icons/user.svg" alt="" style="  width: 25px; opacity: 0.4;" class="form__input-icon user-icon" />
                            <img src="./assets/icons/form-error.svg" alt="" class="form__input-icon-error" />
                            </div>
                            <p class="form__error">Name is not in correct format</p>
                            
                        </div>
                        <div class="form__group">
                            <div class="form__text-input">

                                <input
                                    class="form__input"
                                    autofocus
                                    placeholder="Email"
                                    required
                                    id="email"
                                     class="block mt-1 w-full form__input"
                                     type="email"
                                    name="email"
                                    value="{{old('email')}}"
                                    autocomplete="username"
                                />
                                <img src="./assets/icons/message.svg" alt="" class="form__input-icon" />
                                <img src="./assets/icons/form-error.svg" alt="" class="form__input-icon-error" />
                            </div>
                            <p class="form__error">Email is not in correct format</p>
                        </div>
                        <div class="form__group">
                            <div class="form__text-input">
                                <input
                                    type="password"
                                    placeholder="Password"
                                    required
                                    minlength="6"
                                    id="password"
                                    class="form__input"
                                    name="password"
                                    autocomplete="new-password"
                                />
                                <img src="./assets/icons/lock.svg" alt="" class="form__input-icon" />
                                <img src="./assets/icons/form-error.svg" alt="" class="form__input-icon-error" />
                            </div>
                            <p class="form__error">Password must be at least 6 characters</p>
                        </div>
                        <div class="form__group">
                            <div class="form__text-input">
                                <input
                                    placeholder="Confirm password"
                                    class="form__input"
                                    minlength="6"
                                    id="password_confirmation" class="form__input"
                                    type="password"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password"
                                />
                                <img src="./assets/icons/lock.svg" alt="" class="form__input-icon" />
                                <img src="./assets/icons/form-error.svg" alt="" class="form__input-icon-error" />
                            </div>
                            <p class="form__error">Password must be at least 6 characters</p>
                        </div>

                        <div class="form__group auth__btn-group">

                            <x-primary-button class="btn btn--primary auth__btn form__submit-btn">
                                {{ __('Register') }}
                            </x-primary-button>
                            <button class="btn btn--outline auth__btn btn--no-margin">
                                <img src="./assets/icons/google.svg" alt="" class="btn__icon icon" />
                                Sign in with Google
                            </button>
                        </div>
                    </form>

                    <p class="auth__text">
                        You have an account yet?
                        <a href="{{route('login')}}" class="auth__link auth__text-link">Sign In</a>
                    </p>
                </div>
            </div>
        </main>
        <script>
            window.dispatchEvent(new Event("template-loaded"));
        </script>
    </body>
</html>
