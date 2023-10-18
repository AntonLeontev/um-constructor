<style>
	.um-information {
		background-color: #fff;
		color: #0B1331;
		padding: 0 1rem;
	}

    .um-container {
        box-sizing: border-box;
        max-width: 1440px;
        width: 100%;
        margin: 0 auto;
        padding-left: 16px;
        padding-right: 16px;
    }

    @media (min-width: 768px) {
        .um-container {
            padding-left: 40px;
            padding-right: 40px;
        }
    }

    @media (min-width: 1200px) {
        .um-container {
            padding-left: 80px;
            padding-right: 80px;
        }
    }

    .um-information .um-container {
        padding: 50px 0;
        background-repeat: no-repeat;
        background-size: 300px;
        background-position: 94px 20%;
        background-position: right bottom;
    }

    .um-information__text {
        max-width: 491px;
        margin: 0 auto;
        font-weight: 500;
        font-size: 20px;
        line-height: 120%;
        text-align: center;
		color: inherit;
    }
	
    @media (min-width: 768px) {
		.um-information {
			padding: 100px 0 120px;
        }
    }

    @media (min-width: 992px) {
        .um-information .um-container {
            background-size: 618px;
            background-position: 94px 20%;
            background-position: right -34px;
        }

        .um-information__text {
            max-width: 897px;
            font-weight: 500;
            font-size: 36px;
            line-height: 100%;
            text-align: center;
            color: inherit;
        }
    }

    @media (min-width: 1200px) {
        .um-information .um-container {
            padding: 200px 0 220px;
            background-position: right 112px;
        }
    }
</style>

<section class="um-information" style="background-color: {{ data_get($data, 'background_color.value') }}; color: {{ data_get($data, 'font_color.value') }}">
    <div class="um-container">
        <p class="um-information__text">
			<span data-key="text">{{ data_get($data, 'text.value') }}</span>
        </p>
    </div>
</section>
