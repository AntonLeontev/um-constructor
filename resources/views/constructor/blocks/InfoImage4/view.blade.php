<style>
    .um-quote {
        padding: 120px 0;
    }

    .um-quote .um-quote__container {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
    }

    .um-quote .um-quote__avatar {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        gap: 20px;
    }

    .um-quote .um-quote__title {
        font-size: 12px;
        font-weight: 700;
        line-height: 140%;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: var(--text-grey);
    }

    .um-quote .um-quote__content {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        font-size: 32px;
        font-weight: 500;
        line-height: 120%;
    }

    .um-quote .um-avatar__img {
        width: 180px;
        height: 180px;
        overflow: hidden;
        border-radius: 50%;
        margin-bottom: 20px;
    }

    .um-quote .um-avatar__img img {
        width: 100%;
        -o-object-fit: cover;
        object-fit: cover;
    }

    .um-quote .um-avatar__title {
        font-size: 18px;
        line-height: 130%;
        margin-bottom: 5px;
    }

    .um-quote .um-avatar__text {
        color: var(--text-grey);
        font-size: 14px;
        line-height: 140%;
    }

    @media (min-width: 47.99875em) {
         .um-quote .um-quote__avatar {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
        }

         .um-quote .um-avatar__body {
            padding-left: 45px;
        }

         .um-quote .um-avatar__title {
            position: relative;
        }

         .um-quote .um-avatar__title::before {
            content: "";
            position: absolute;
            width: 35px;
            height: 1px;
            top: 50%;
            left: -45px;
            translate: 0 -50%;
            background-color: var(--text-second);
        }
    }

    @media (min-width: 100em) {

        .um-quote .um-quote__container {
            gap: 3.75rem;
        }
    }

    @media (max-width: 48em) {

        .um-quote .um-quote__container {
            gap: 1.25rem;
        }
    }

    @media (max-width: 47.99875em) {
        .um-quote {
            padding: 40px 0;
            position: relative;
        }

        .um-quote .um-quote__container {
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        .um-quote .um-quote__avatar {
            text-align: center;
            -webkit-box-flex: 0;
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
        }

        .um-quote .um-quote__title {
            position: absolute;
            top: 30px;
            left: 20px;
        }

        .um-quote .um-quote__content {
            font-size: 20px;
        }

        .um-quote .um-avatar {
            margin: 0 auto;
        }

        .um-quote .um-avatar__img {
            margin-bottom: 10px;
            width: 250px;
            height: 250px;
            margin-top: 10px;
        }
    }

    @media (max-width: 29.99875em) {
        .um-quote .um-quote__title {
            left: 10px;
        }
    }

    @media (min-width: 48em) and (max-width: 100em) {

        @supports (gap: clamp( 1.25rem , -1.0576923077rem  +  4.8076923077vw , 3.75rem )) {
            .um-quote .um-quote__container {
                gap: clamp( 1.25rem , -1.0576923077rem  +  4.8076923077vw , 3.75rem );
            }
        }

        @supports not (gap: clamp( 1.25rem , -1.0576923077rem  +  4.8076923077vw , 3.75rem )) {
            .um-quote .um-quote__container {
                gap: calc(1.25rem + 2.5 * (100vw - 48rem) / 52);
            }
        }
    }
</style>
<section class="um-quote">
    <div class="um-quote__container um-container">
        <div class="um-quote__avatar">
            <div class="um-quote__title">
                Quote
            </div>
            <div class="um-avatar">
                <div class="um-avatar__img">
                    <img data-key="image" src="{{ data_get($data, 'image.value') }}" alt="Image" width="{{ data_get($data, 'image.width') }}px"  height="{{ data_get($data, 'image.height') }}px">
                </div>
                <div class="um-avatar__body">
                    <div class="um-avatar__title" data-key="name">
                        {{ data_get($data, 'name.value') }}
                    </div>
                    <div class="um-avatar__text" data-key="description">
                        {{ data_get($data, 'description.value') }}
                    </div>
                </div>

            </div>
        </div>
        <div class="um-quote__content" data-key="text">
            {{ data_get($data, 'text.value') }}
        </div>
    </div>
</section>
