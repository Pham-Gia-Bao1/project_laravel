@extends('profile.Profile')
@section('content-profile')

<div class="col-12 col-xl-8 col-lg-12">
    <div class="cart-info">
        <div class="row gy-3">
            <div class="col-12">
                <h2 class="cart-info__heading">
                    <a href="profile">
                        <img
                            src="./assets/icons/arrow-left.svg"
                            alt=""
                            class="icon cart-info__back-arrow"
                        />
                    </a>
                    Edit personal infomations

                            </h2>
                                <form action="profile" method="post" class="form form-card">
                                    <input type="hidden" name="id" value="1">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <!-- Form row 1 -->

                                    <div class="form__row">
                                        <div class="form__group">
                                            <label for="full-name" class="form__label form-card__label">
                                                Full name
                                            </label>
                                            <div class="form__text-input">
                                                <input
                                                    type="text"
                                                    name="name"
                                                    id="full-name"
                                                    placeholder="Full name"
                                                    class="form__input"
                                                    required
                                                    autofocus
                                                    value="{{old('name') ?? $user->name}}"
                                                />
                                                <img
                                                    src="./assets/icons/form-error.svg"
                                                    alt=""
                                                    class="form__input-icon-error"
                                                />
                                            </div>
                                            @error('name')
                                                <span style="color: red; margin-top:5px;" class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form__group">
                                            <label for="email-adress" class="form__label form-card__label">
                                                Email address
                                            </label>
                                            <div class="form__text-input">
                                                <input
                                                    type="text"
                                                    name="email"
                                                    id="email-adress"
                                                    placeholder="Email address"
                                                    class="form__input"
                                                    required
                                                    value="{{old('email') ?? $user->email}}"

                                                />
                                                <img
                                                    src="./assets/icons/form-error.svg"
                                                    alt=""
                                                    class="form__input-icon-error"
                                                />
                                            </div>
                                            @error('email')
                                            <span style="color: red; margin-top:5px;" class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>

                                    <!-- Form row 2 -->
                                    <div class="form__row">
                                        <div class="form__group">
                                            <label for="phone-number" class="form__label form-card__label">
                                                Phone Number
                                            </label>
                                            <div class="form__text-input">
                                                <input
                                                    type="text"
                                                    name="phone_number"
                                                    id="phone-number"
                                                    placeholder="Phone Number"
                                                    class="form__input"
                                                    required
                                                    value="{{old('phone_number') ?? $user->phone_number}}"

                                                />
                                                <img
                                                    src="./assets/icons/form-error.svg"
                                                    alt=""
                                                    class="form__input-icon-error"
                                                />
                                            </div>
                                            @error('phone_number')
                                            <span style="color: red; margin-top:5px;" class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form__group">
                                            <label for="passowrd" class="form__label form-card__label">
                                                Password
                                            </label>
                                            <div class="form__text-input">
                                                <input
                                                    type="password"
                                                    name="password"
                                                    id="passowrd"
                                                    placeholder="Password"
                                                    class="form__input"
                                                    required
                                                    value="{{old('password') ?? $user->password}}"


                                                />
                                                <img
                                                    src="./assets/icons/form-error.svg"
                                                    alt=""
                                                    class="form__input-icon-error"
                                                />
                                            </div>
                                            @error('password')
                                                <span style="color: red; margin-top:5px;" class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-card__bottom">
                                        <a class="btn btn--text" href="profile">Cancel</a>
                                        <button class="btn btn--primary btn--rounded">Save</button>
                                    </div>
                                </form>
            </div>
        </div>
    </div>
</div>
@endsection
