<style>
    .um-cover{{ $block->id }} {
        position: relative;
        padding: 120px 0;
    }

    .um-cover{{ $block->id }} .um-cover__inner {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
    }

    .um-cover{{ $block->id }} .um-cover__img img {
        -o-object-fit: cover;
        object-fit: cover;
    }

    .um-cover{{ $block->id }} .um-cover__content {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
    }

    .um-cover{{ $block->id }} .um-cover__title {
        font-weight: 600;
        font-size: 40px;
        line-height: 110%;
        margin-bottom: 20px;
    }

    .um-cover{{ $block->id }} .um-cover__text {
        font-size: 18px;
        line-height: 130%;
    }

    .um-cover{{ $block->id }} .um-cover__text p + p {
        margin-top: 20px;
    }

    @media (min-width: 29.99875em) {
        .um-cover{{ $block->id }} .um-cover__img._big-picture {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 66%;
            flex: 0 0 66%;
        }
    }

    @media (min-width: 75em) {
        .um-cover{{ $block->id }} .um-cover__inner {
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }
    }

    @media (min-width: 100em) {
        .um-cover{{ $block->id }} .um-cover__inner {
            gap: 3.75rem;
        }
    }

    @media (max-width: 75em) {
        .um-cover{{ $block->id }} {
            position: relative;
            padding: 40px 0;
        }
        .um-cover{{ $block->id }} .um-cover__inner {
            gap: 1.25rem;
        }

        .um-cover{{ $block->id }} .um-cover__inner {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        .um-cover{{ $block->id }} .um-cover__img._big-picture {
            -webkit-box-ordinal-group: 3;
            -ms-flex-order: 2;
            order: 2;
        }
    }

    @media (max-width: 639.98px) {
        .um-cover{{ $block->id }} .um-cover__title {
            font-size: 26px;
        }

        .um-cover{{ $block->id }} .um-cover__text {
            font-size: 16px;
        }
    }

    @media (max-width: 29.99875em) {
        .um-cover{{ $block->id }} .um-cover__text p + p {
            margin-top: 10px;
        }
    }

    @media (min-width: 75em) and (max-width: 100em) {
        @supports (gap: clamp( 1.25rem , -6.25rem  +  10vw , 3.75rem )) {
            .um-cover{{ $block->id }} .um-cover__inner {
                gap: clamp( 1.25rem , -6.25rem  +  10vw , 3.75rem );
            }
        }

        @supports not (gap: clamp( 1.25rem , -6.25rem  +  10vw , 3.75rem )) {
            .um-cover{{ $block->id }} .um-cover__inner {
                gap: calc(1.25rem + 2.5 * (100vw - 75rem) / 25);
            }
        }
    }
</style>
<section class="um-cover um-cover{{ $block->id }}">
    <div class="um-container">
        <div class="um-cover__inner">
            <div class="um-cover__img _big-picture">
                <x-shared.image key="image" :$data :$block />
            </div>
            <div class="um-cover__content">
                <div class="um-cover__title">
                    <x-shared.paragraph key="title" :$data :$block />
                </div>
                <div class="um-cover__text">
                    <x-shared.paragraph key="text" :$data :$block />
                </div>
            </div>
        </div>
    </div>
</section>
