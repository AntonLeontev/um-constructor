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

     .um-info-img .um-numbers__item .number {
        font-weight: 300;
        font-size: 36px;
        display: block;
        margin-bottom: 5px;
        line-height: 110%;
		white-space: nowrap;
    }

    .um-info-img .um-numbers__item .small {
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
                <x-shared.paragraph key="title" :$data :$block />
            </div>
            <div class="um-info-img__text um-mb-40" data-key="text">
                <x-shared.paragraph key="text" :$data :$block />
            </div>
            <div class="um-numbers d-grid_3">
                <div class="um-numbers__item">
                    <div class="number"><x-shared.paragraph key="number1" :$data :$block /></div>
                    <div class="small"><x-shared.paragraph key="text1" :$data :$block /></div>
                </div>
                <div class="um-numbers__item">
                    <div class="number"><x-shared.paragraph key="number2" :$data :$block /></div>
                    <div class="small"><x-shared.paragraph key="text2" :$data :$block /></div>
                </div>
                <div class="um-numbers__item">
                    <div class="number"><x-shared.paragraph key="number3" :$data :$block /></div>
                    <div class="small"><x-shared.paragraph key="text3" :$data :$block /></div>
                </div>
            </div>
        </div>
        <div class="um-info-img__img">
            <x-shared.image key="image" :$data :$block />
        </div>
    </div>
</section>
