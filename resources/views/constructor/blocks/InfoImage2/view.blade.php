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

    .um-info-img .um-info-img__title {
        font-weight: 600;
        font-size: 32px;
        margin-bottom: 20px;
    }

    .um-info-img .um-info-img__text {
        font-size: 18px;
        line-height: 130%;
    }

     .um-info-img .um-numbers__item strong {
        font-weight: 300;
        font-size: 36px;
        display: block;
        margin-bottom: 5px;
        line-height: 110%;
		white-space: nowrap;
    }

    .um-info-img .um-numbers__item small {
        font-size: 14px;
    }

    @media (min-width: 47.99875em) {

        .um-info-img._numbers .um-info-img__img {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 48%;
            flex: 0 0 48%;
        }
    }

    @media (min-width: 100em) {

        .um-info-img .um-info-img__container {
            gap: 3.75rem;
        }
    }

    @media (max-width: 48em) {


        .um-info-img .um-info-img__container {
            gap: 1.25rem;
        }
    }

    @media (max-width: 47.99875em) {

        .um-info-img .um-info-img__container {
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .um-info-img {
            padding: 40px 0;
        }

        .um-info-img .um-info-img__title {
            font-size: 20px;
            margin-bottom: 10px;
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
    }

</style>
<section class="um-info-img _numbers">
    <div class="um-info-img__container um-container">
        <div class="um-info-img__content">
            <div class="um-info-img__title" data-key="title">
                {{ data_get($data, 'title.value') }}
            </div>
            <div class="um-info-img__text um-mb-40" data-key="text">
                {{ data_get($data, 'text.value') }}
            </div>
            <div class="um-numbers d-grid_3">
                <div class="um-numbers__item">
                    <strong data-key="number1">{{ data_get($data, 'number1.value') }}</strong>
                    <small data-key="text1">{{ data_get($data, 'text1.value') }}</small>
                </div>
                <div class="um-numbers__item">
                    <strong data-key="number2">{{ data_get($data, 'number2.value') }}</strong>
                    <small data-key="text2">{{ data_get($data, 'text2.value') }}</small>
                </div>
                <div class="um-numbers__item">
                    <strong data-key="number3">{{ data_get($data, 'number3.value') }}</strong>
                    <small data-key="text3">{{ data_get($data, 'text3.value') }}</small>
                </div>
            </div>
        </div>
        <div class="um-info-img__img">
            <img data-key="image" src="{{ data_get($data, 'image.value') }}" alt="Image">
        </div>
    </div>
</section>
