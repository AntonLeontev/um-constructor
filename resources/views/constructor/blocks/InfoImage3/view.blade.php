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

    .um-info-img._two-col .um-info-img__accent {
        font-size: 32px;
    }

    @media (min-width: 47.99875em) {

        .um-info-img._two-col .um-info-img__img {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 31%;
            flex: 0 0 31%;
        }

        .um-info-img._two-col .um-info-img__img img {
            width: 100%;
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

        .um-info-img._two-col  .um-info-img__accent {
            font-size: 20px;
        }

        .um-info-img._two-col .um-info-img__accent {
            margin-bottom: 0;
        }
    }

    @media (min-width: 48em) and (max-width: 100em) {

        @supports (gap: clamp( 1.25rem , -1.0576923077rem  +  4.8076923077vw , 3.75rem )) {
            .um-info-img__container {
                gap: clamp( 1.25rem , -1.0576923077rem  +  4.8076923077vw , 3.75rem );
            }
        }

        @supports not (gap: clamp( 1.25rem , -1.0576923077rem  +  4.8076923077vw , 3.75rem )) {
            .um-info-img__container {
                gap: calc(1.25rem + 2.5 * (100vw - 48rem) / 52);
            }
        }
    }

</style>
<section class="um-info-img _two-col">
    <div class="um-info-img__container um-container">
        <div class="um-info-img__accent" data-key="text">
            {{ data_get($data, 'text.value') }}
        </div>
        <div class="um-info-img__img">
            <img data-key="image" src="{{ data_get($data, 'image.value') }}" alt="Image">
        </div>
    </div>
</section>
