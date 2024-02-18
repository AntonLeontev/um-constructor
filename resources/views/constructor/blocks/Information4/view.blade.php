<style>
    .um-info {
        padding: 120px 0;
    }


     .um-info  .um-numbers__item .number {
        font-weight: 300;
        font-size: 64px;
        display: block;
        margin-bottom: 5px;
        line-height: 110%;
		white-space: nowrap;
    }
     .um-info  .um-numbers_big .um-numbers__item .number {
        border-top: 0;
        padding-top: 0;
        font-size: 96px;
		white-space: nowrap;
    }
     .um-info  .um-numbers__item .small {
        font-size: 14px;
    }

    @media (min-width: 47.99875em) {
         .um-info  .um-numbers__item .number {
            padding-top: 20px;
            border-top: 1px solid var(--text-second);
        }
    }

    @media (max-width: 61.99875em) {
         .um-info  .um-numbers__item .number {
            font-size: 64px;
        }
         .um-info  .um-numbers_big .um-numbers__item .number {
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
