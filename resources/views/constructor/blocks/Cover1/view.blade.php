<style>
    .um-cover {
        position: relative;
    }

    .um-cover .um-cover__inner {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        gap: 20px;
    }

    .um-cover .um-cover__img img {
        -o-object-fit: cover;
        object-fit: cover;
    }

    .um-cover .um-cover__content {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
    }

    .um-cover .um-cover__title {
        font-weight: 600;
        font-size: 40px;
        line-height: 110%;
        margin-bottom: 20px;
    }

    .um-cover .um-cover__text {
        font-size: 18px;
        line-height: 130%;
    }

    @media (min-width: 75em) {
        .um-cover .um-cover__inner {
            min-height: 100vh;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .um-cover._absolute .um-cover__img {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }

        .um-cover._absolute .um-cover__img img {
            height: 100%;
        }

        .um-cover._absolute .um-cover__content {
            padding-left: 50%;
        }
    }

    @media (min-width: 75em) and (min-width: 100em) {
        .um-cover._absolute .um-cover__img {
            max-width: 48.125rem;
        }
    }

    @media (max-width: 75em) {
        .um-cover {
            padding: 40px 0;
        }
        .um-cover .um-cover__inner {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
        }
    }

    @media (max-width: 639.98px) {
        .um-cover .um-cover__title {
            font-size: 26px;
        }

        .um-cover .um-cover__text {
            font-size: 16px;
        }
    }

    @media (min-width: 75em) and (min-width: 75em) and (max-width: 100em) {
        @supports (max-width: clamp( 36.25rem , 0.625rem  +  47.5vw , 48.125rem )) {
            .um-cover._absolute .um-cover__img {
                max-width: clamp( 36.25rem , 0.625rem  +  47.5vw , 48.125rem );
            }
        }

        @supports not (max-width: clamp( 36.25rem , 0.625rem  +  47.5vw , 48.125rem )) {
            .um-cover._absolute .um-cover__img {
                max-width: calc(36.25rem + 11.875 * (100vw - 75rem) / 25);
            }
        }
    }

    @media (min-width: 75em) and (max-width: 75em) {
        .um-cover._absolute .um-cover__img {
            max-width: 36.25rem;
        }
    }
</style>

<section class="um-cover _absolute">
    <div class="um-container">
        <div class="um-cover__inner">
            <div class="um-cover__content">
                <div class="um-cover__title" data-key="title">
                    {{ data_get($data, 'title.value') }}
                </div>
                <div class="um-cover__text">
                    <p data-key="text">
                        {!! data_get($data, 'text.value') !!}
                    </p>
                </div>
            </div>
            <div class="um-cover__img">
                <img
					data-key="image" 
					src="{{ data_get($data, 'image.value') }}"
					alt="Image"
					width="{{ data_get($data, 'image.width') }}px"  
					height="{{ data_get($data, 'image.height') }}px"
				>
            </div>
        </div>
    </div>
</section>
