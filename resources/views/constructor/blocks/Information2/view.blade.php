<style>
    .um-info {
        padding: 120px 0;
    }

      .um-info .um-info__subtitle {
        font-size: 12px;
        margin-bottom: 25px;
        text-transform: uppercase;
        color: var(--text-grey);
        font-weight: 700;
    }

      .um-info .um-info__text-block {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
    }

      .um-info .um-info__text {
        font-size: 18px;
        line-height: 130%;
    }

      .um-info .um-info__accent-text {
        font-weight: 500;
        line-height: 120%;
        font-size: 32px;
    }

    @media (min-width: 100em) {
          .um-info .um-info__text-block {
            gap: 3.75rem;
        }
    }

    @media (max-width: 48em) {
          .um-info .um-info__text-block {
            gap: 1.25rem;
        }
    }

    @media (max-width: 639.98px) {
        .um-info {
            padding: 20px 0;
        }

          .um-info .um-info__subtitle {
            margin-bottom: 10px;
        }

          .um-info .um-info__text {
            font-size: 16px;
        }

          .um-info .um-info__accent-text {
            font-size: 18px;
            line-height: 110%;
            font-weight: 600;
        }
    }

    @media (max-width: 47.99875em) {
          .um-info .um-info__text-block {
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

          .um-info .um-info__accent-text {
            -webkit-box-ordinal-group: 0;
            -ms-flex-order: -1;
            order: -1;
        }
    }

    @media (min-width: 48em) and (max-width: 100em) {
        @supports (gap: clamp( 1.25rem , -1.0576923077rem  +  4.8076923077vw , 3.75rem )) {
              .um-info .um-info__text-block {
                gap: clamp( 1.25rem , -1.0576923077rem  +  4.8076923077vw , 3.75rem );
            }
        }

        @supports not (gap: clamp( 1.25rem , -1.0576923077rem  +  4.8076923077vw , 3.75rem )) {
              .um-info .um-info__text-block {
                gap: calc(1.25rem + 2.5 * (100vw - 48rem) / 52);
            }
        }
    }
</style>
<section class="um-info">
    <div class="um-info__container um-container">
        <div class="um-info__subtitle"><x-shared.paragraph key="title" :$data :$block /></div>
        <div class="um-info__text-block">
            <div class="um-info__text">
                <x-shared.paragraph key="small_text" :$data :$block />
            </div>
            <div class="um-info__accent-text">
                <x-shared.paragraph key="big_text" :$data :$block />
            </div>
        </div>
    </div>
</section>
