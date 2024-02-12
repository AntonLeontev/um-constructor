<style>
    .um-cover{{ $block->id }} {
        position: relative;
        padding: 7.5rem 0;
    }

    .um-cover{{ $block->id }} .um-cover__inner {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
    }

    .um-cover{{ $block->id }}._img-fs .um-cover__inner {
        display: -ms-grid;
        display: grid;
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
    }

    .um-cover{{ $block->id }} .um-cover__text {
        font-size: 18px;
        line-height: 130%;
    }

    .um-cover{{ $block->id }} .um-cover__text p + p {
        margin-top: 20px;
    }

    @media (min-width: 47.99875em) {
        .um-cover{{ $block->id }}._img-fs .um-cover__inner {
            -ms-grid-columns: (1fr)[2];
            grid-template-columns: repeat(2, 1fr);
        }

        .um-cover{{ $block->id }}._img-fs .um-cover__img {
            -ms-grid-column-span: 2;
            grid-column: span 2;
        }

        .um-cover{{ $block->id }} .um-cover__title {
            margin-bottom: 20px;
        }
    }

    @media (min-width: 100em) {
        .um-cover{{ $block->id }} .um-cover__inner {
            gap: 3.75rem;
        }
    }

    @media (max-width: 75em) {
        .um-cover{{ $block->id }} .um-cover__inner {
            gap: 1.25rem;
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

    @media (max-width: 47.99875em) {
        .um-cover{{ $block->id }} {
            padding: 2.5rem 0;
        }

        .um-cover{{ $block->id }} .um-cover__text {
            -ms-grid-row: 3;
            grid-row: 3;
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
<section class="um-cover um-cover{{ $block->id }} _img-fs">
    <div class="um-container">
        <div class="um-cover__inner">
            <div data-key="title" class="um-cover__title">
				{{ data_get($data, 'title.value') }}
			</div>
			<div class="um-cover__text">
				<p data-key="text">
					{!! data_get($data, 'text.value') !!}
				</p>
			</div>
            <div class="um-cover__img">
                <img data-key="image" src="{{ data_get($data, 'image.value') }}" alt="Image">
            </div>
        </div>
    </div>
</section>
