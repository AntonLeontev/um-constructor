<style>

    .um-info-img {
        padding: 120px 0;
    }

    .um-info-img .um-info-img__container {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        gap: 60px;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .um-info-img .um-info-img__accent {
        font-size: 32px;
        margin-bottom: 40px;
    }

    .um-info-img .um-info-img__block {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        gap: 60px;
    }

    .um-info-img .um-info-img__col strong {
        font-size: 25px;
        margin-bottom: 10px;
        color: var(--text-grey);
        font-weight: 600;
        line-height: 120%;
    }

    .um-info-img .um-info-img__text {
        font-size: 18px;
        line-height: 130%;
    }

    @media (min-width: 47.99875em) {

        .um-info-img .um-info-img__img {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 31%;
            flex: 0 0 31%;
        }

        .um-info-img .um-info-img__col {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
        }
    }

    @media (min-width: 100em) {
        .um-info-img .um-info-img__container {
            gap: 3.75rem;
        }

        .um-info-img .um-info-img__block {
            gap: 3.75rem;
        }
    }

    @media (max-width: 48em) {

        .um-info-img .um-info-img__container {
            gap: 1.25rem;
        }

        .um-info-img .um-info-img__block {
            gap: 0.625rem;
        }
    }

    @media (max-width: 47.99875em) {

        .um-info-img .um-info-img__container {
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .um-info-img .um-info-img__img {
            -webkit-box-ordinal-group: 3;
            -ms-flex-order: 2;
            order: 2;
        }

        .um-info-img .um-info-img__block {
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .um-info-img {
            padding: 40px 0;
        }

        .um-info-img .um-info-img__container {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .um-info-img .um-info-img__content {
            -ms-flex-item-align: center;
            -ms-grid-row-align: center;
            align-self: center;
        }

        .um-info-img .um-info-img__accent {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .um-info-img .um-info-img__col strong {
            font-size: 18px;
            line-height: 120%;
        }

        .um-info-img .um-info-img__text {
            font-size: 16px;
        }
    }

    @media (min-width: 48em) and (max-width: 100em) {
        @supports (gap: clamp( 1.25rem , -1.0576923077rem  +  4.8076923077vw , 3.75rem )) {
            .um-info-img .um-info-img__container {
                gap: clamp( 1.25rem , -1.0576923077rem  +  4.8076923077vw , 3.75rem );
            }
        }

        @supports not (gap: clamp( 1.25rem , -1.0576923077rem  +  4.8076923077vw , 3.75rem )) {
            .um-info-img .um-info-img__container {
                gap: calc(1.25rem + 2.5 * (100vw - 48rem) / 52);
            }
        }

        @supports (gap: clamp( 0.625rem , -2.2596153846rem  +  6.0096153846vw , 3.75rem )) {
            .um-info-img .um-info-img__block {
                gap: clamp( 0.625rem , -2.2596153846rem  +  6.0096153846vw , 3.75rem );
            }
        }

        @supports not (gap: clamp( 0.625rem , -2.2596153846rem  +  6.0096153846vw , 3.75rem )) {
            .um-info-img .um-info-img__block {
                gap: calc(0.625rem + 3.125 * (100vw - 48rem) / 52);
            }
        }
    }

</style>
<section class="um-info-img">
    <div class="um-info-img__container um-container">
        <div class="um-info-img__img">
            <img data-key="image" src="{{ data_get($data, 'image.value') }}" alt="Image">
        </div>
        <div class="um-info-img__content">
            <div class="um-info-img__accent" data-key="main_text">
                {{ data_get($data, 'main_text.value') }}
            </div>
            <div class="um-info-img__block">
                <div class="um-info-img__col">
                    <strong data-key="title1">{{ data_get($data, 'title1.value') }}</strong>
                    <div class="um-info-img__text" data-key="text1">
                        {{ data_get($data, 'text1.value') }}
                    </div>
                </div>
                <div class="um-info-img__col">
                    <strong data-key="title2">{{ data_get($data, 'title2.value') }}</strong>
                    <div class="um-info-img__text" data-key="text2">
                        {{ data_get($data, 'text2.value') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
