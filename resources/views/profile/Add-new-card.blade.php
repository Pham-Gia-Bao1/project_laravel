@extends('profile.Profile')
@section('content-profile')

<div class="col-12 col-xl-12 col-lg-12">
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
                    Add credit or debit card
                </h2>
                <form action="create_card" method="post" class="form form-card">
                    <!-- Form row 1 -->
                    <input type="hidden" value={{Auth::user()->id}} name="user_id">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form__row">
                        <div class="form__group">
                            <label for="first-name" class="form__label form-card__label">
                                First Name
                            </label>
                            <div class="form__text-input">
                                <input
                                    type="text"
                                    name="first_name"
                                    id="first-name"
                                    placeholder="First name"
                                    class="form__input"
                                    required
                                    autofocus

                                />
                                <img
                                    src="./assets/icons/form-error.svg"
                                    alt=""
                                    class="form__input-icon-error"
                                />
                            </div>
                            @error('first_name')
                                    <span style="color: #ed4337; margin-top:5px;" class="text-danger">{{ $message }}</span>
                            @enderror
                            <p class="form__error">Please enter your first name</p>
                        </div>
                        <div class="form__group">
                            <label for="last-name" class="form__label form-card__label">
                                Last Name
                            </label>
                            <div class="form__text-input">
                                <input
                                    type="text"
                                    name="last_name"
                                    id="last-name"
                                    placeholder="Last name"
                                    class="form__input"
                                    required
                                />
                                <img
                                    src="./assets/icons/form-error.svg"
                                    alt=""
                                    class="form__input-icon-error"
                                />
                            </div>
                            @error('last_name')
                            <span style="color: #ed4337; margin-top:5px;" class="text-danger">{{ $message }}</span>
                    @enderror
                            <p class="form__error">Please enter your last name</p>
                        </div>
                    </div>

                    <!-- Form row 2 -->
                    <div class="form__row">
                        <div class="form__group">
                            <label for="card-number" class="form__label form-card__label">
                                Card Number
                            </label>
                            <div class="form__text-input">
                                <input
                                    type="text"
                                    name="card_number"
                                    id="card-number"
                                    placeholder="Card Number"
                                    class="form__input"
                                    required
                                />
                                <img
                                    src="./assets/icons/form-error.svg"
                                    alt=""
                                    class="form__input-icon-error"
                                />
                            </div>
                            @error('card_number')
                            <span style="color: #ed4337; margin-top:5px;" class="form__error text-danger">{{ $message }}</span>
                    @enderror

                            <p class="form__error">Please enter a valid card number</p>
                        </div>
                        <div class="form__group">
                            <label for="expiration-date" class="form__label form-card__label">
                                Expiration Date
                            </label>
                            <div class="form__text-input">
                                <input
                                    type="text"
                                    name="expiration_date"
                                    id="expiration-date"
                                    placeholder="Expiration Date"
                                    class="form__input"
                                    required
                                />
                                <img
                                    src="./assets/icons/form-error.svg"
                                    alt=""
                                    class="form__input-icon-error"
                                />
                            </div>
                            @error('expiration_date')
                            <span style="color: #ed4337; margin-top:5px;" class="text-danger">{{ $message }}</span>
                    @enderror
                            <p class="form__error">Please enter a valid expiration date</p>
                        </div>
                    </div>

                    <!-- Form row 3 -->
                    <div class="form__row">
                        <div class="form__group">
                            <label for="card-cvv" class="form__label form-card__label">
                                CVV
                            </label>
                            <div class="form__text-input">
                                <input
                                    type="text"
                                    name="cvv"
                                    id="card-cvv"
                                    placeholder="123"
                                    class="form__input"
                                    required
                                />
                                <img
                                    src="./assets/icons/form-error.svg"
                                    alt=""
                                    class="form__input-icon-error"
                                />
                            </div>
                            @error('cvv')
                            <span style="color: #ed4337; margin-top:5px;" class="form__error text-danger">{{ $message }}</span>
                    @enderror

                            <p class="form__error">Please enter a valid CVV</p>
                        </div>
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
                                />
                                <img
                                    src="./assets/icons/form-error.svg"
                                    alt=""
                                    class="form__input-icon-error"
                                />
                            </div>
                            @error('phone_number')
                            <span style="color: #ed4337; margin-top:5px;" class="form__error text-danger">{{ $message }}</span>
                    @enderror

                            <p class="form__error">Please enter a valid phone number</p>
                        </div>
                    </div>

                    <div class="form__group">
                        <label for="set-default-card" class="form__label form-card__label">
                            Card Preferences
                        </label>
                        <label class="form__checkbox">
                            <input
                                type="checkbox"
                                name="set_default_card"
                                id="set-default-card"
                                checked
                                value=1
                                class="form__checkbox-input d-none"
                            />

                            <span class="form__checkbox-label">Set as default card</span>
                        </label>
                    </div>
                    <div class="form-card__bottom">
                        <a class="btn btn--text" href="profile">Cancel</a>
                        <button class="btn btn--primary btn--rounded">Save card</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
