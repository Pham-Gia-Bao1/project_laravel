<div class="home__row row pt-10">
    <h2 class="home__heading">Total LavAzza 1320</h2>
    <div class="filter-wrap">
        <button class="filter-btn js-toggle" toggle-target="#home-filter">
            Filter
            <img src="./assets/icons/filter.svg" alt="" class="filter-btn__icon icon" />
        </button>

        <div id="home-filter" class="filter hide">
            <img src="./assets/icons/arrow-up.png" alt="" class="filter__arrow" />
            <h3 class="filter__heading">Filter</h3>
            <form action="" class="filter__form form">
                <div class="filter__row filter__content">
                    <!-- Filter column 1 -->
                    <div class="filter__col">
                        <label for="" class="form__label">Price</label>
                        <div class="filter__form-group">
                            <div
                                class="filter__form-slider"
                                style="--min-value: 10%; --max-value: 60%"
                            ></div>
                        </div>
                        <div class="filter__form-group filter__form-group--inline">
                            <div>
                                <label for="" class="form__label form__label--small"> Minimum </label>
                                <div class="filter__form-text-input filter__form-text-input--small">
                                    <input
                                        type="text"
                                        name=""
                                        id=""
                                        class="filter__form-input"
                                        value="$30.00"
                                    />
                                </div>
                            </div>
                            <div>
                                <label for="" class="form__label form__label--small"> Maximum </label>
                                <div class="filter__form-text-input filter__form-text-input--small">
                                    <input
                                        type="text"
                                        name=""
                                        id=""
                                        class="filter__form-input"
                                        value="$100.00"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                



                    </div>
                </div>
                <div class="filter__row filter__footer">
                    <button class="btn btn--text filter__cancel js-toggle" toggle-target="#home-filter">
                        Cancel
                    </button>
                    <button
                        class="btn btn--primary filter__submit js-toggle"
                        toggle-target="#home-filter"
                    >
                        Show Result
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
