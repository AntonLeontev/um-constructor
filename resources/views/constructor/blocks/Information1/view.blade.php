<style>
    .um-info {
        padding: 120px 0;
    }

     .um-info .um-info__title {
        font-size: 40px;
        margin-bottom: 20px;
        line-height: 110%;
        font-weight: 600;
        max-width: 575px;
    }

     .um-info .um-info__text {
        font-size: 18px;
        line-height: 130%;
    }


    @media (min-width: 100em) {
        .um-info .um-info__text {
            gap: 3.75rem;
        }
    }

    @media (max-width: 48em) {
        .um-info .um-info__text {
            gap: 1.25rem;
        }
    }

    @media (max-width: 639.98px) {

        .um-info {
            padding: 20px 0;
        }

        .um-info .um-info__title {
            font-size: 26px;
            margin-bottom: 10px;
        }

        .um-info .um-info__text {
            font-size: 16px;
        }
    }

</style>
<section class="um-info">
    <div class="um-info__container um-container">
        <div class="um-info__title" data-key="title">{{ data_get($data, 'title.value') }}</div>
        <div class="um-info__text d-grid_3">
            <x-shared.paragraph key="text1" :$data :$block />
            <x-shared.paragraph key="text2" :$data :$block />
            <x-shared.paragraph key="text3" :$data :$block />
        </div>
    </div>
</section>
