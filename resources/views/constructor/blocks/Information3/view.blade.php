<style>
    .um-info {
        padding: 120px 0;
    }

    .um-info .um-info__title {
        font-size: 40px;
        line-height: 110%;
        font-weight: 600;
    }


    .um-info .um-info__text {
        font-size: 18px;
        line-height: 130%;
    }

    .um-info .um-numbers__item .number {
        font-weight: 300;
        font-size: 64px;
        display: block;
        margin-bottom: 5px;
        line-height: 110%;
    }

    .um-info .um-d-flex .um-info__title {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 31%;
        flex: 0 0 31%;
        margin-bottom: 0;
    }

    .um-info .um-numbers__item .small {
        font-size: 14px;
        color: var(--text-grey);
    }

    @media (min-width: 47.99875em) {
        .um-info .um-numbers__item .number {
            padding-top: 20px;
            border-top: 1px solid var(--text-second);
        }
    }

    @media (max-width: 61.99875em) {
        .um-info .um-numbers__item .number {
            font-size: 44px;
        }
    }

    @media (max-width: 47.99875em) {
        .um-info .um-d-flex .um-info__title {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            margin-bottom: 0;
        }
    }

    @media (max-width: 639.98px) {
        .um-info {
            padding: 20px 0;
        }

        .um-info .um-info__title {
            font-size: 26px;
        }

        .um-info .um-info__text {
            font-size: 16px;
        }
    }
</style>
<section class="um-info">
    <div class="um-info__container um-container">
        <div class="um-d-flex um-mb-40">
            <div class="um-info__title"><x-shared.paragraph key="title" :$data :$block /></div>
            <div class="um-info__text">
                <x-shared.paragraph key="description" :$data :$block />
            </div>
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
</section>
