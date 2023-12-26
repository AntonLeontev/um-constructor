<style>
    .um-info {
        padding: 120px 0;
    }


     .um-info  .um-numbers__item strong {
        font-weight: 300;
        font-size: 64px;
        display: block;
        margin-bottom: 5px;
        line-height: 110%;
		white-space: nowrap;
    }
     .um-info  .um-numbers_big .um-numbers__item strong {
        border-top: 0;
        padding-top: 0;
        font-size: 96px;
		white-space: nowrap;
    }
     .um-info  .um-numbers__item small {
        font-size: 14px;
    }

    @media (min-width: 47.99875em) {
         .um-info  .um-numbers__item strong {
            padding-top: 20px;
            border-top: 1px solid var(--text-second);
        }
    }

    @media (max-width: 61.99875em) {
         .um-info  .um-numbers__item strong {
            font-size: 64px;
        }
         .um-info  .um-numbers_big .um-numbers__item strong {
            font-size: 64px;
        }
    }
    @media (max-width: 639.98px) {
        .um-info {
            padding: 20px 0;
        }
    }
</style>
<section class="um-info">
    <div class="um-info__container um-container">
        <div class="um-numbers d-grid_3 um-numbers_big">
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
</section>
