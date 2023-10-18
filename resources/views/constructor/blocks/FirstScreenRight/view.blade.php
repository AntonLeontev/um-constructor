<style>
	.first-screen-right .um-container {
		box-sizing: border-box;
		max-width: 1440px;
		width: 100%;
		margin: 0 auto;
		padding-left: 16px;
		padding-right: 16px;
	}

	@media (min-width: 768px) {
		.first-screen-right .um-container {
			padding-left: 40px;
			padding-right: 40px;
		}
	}

	@media (min-width: 1200px) {
		.first-screen-right .um-container {
			padding-left: 80px;
			padding-right: 80px;
		}
	}

	.first-screen-right.um-response {
		background: #0B1331;
		color: #ffffff;
		padding-top: 58px;
		padding-bottom: 61px;
	}

	.first-screen-right .um-response__title {
		/* max-width: 281px; */
		margin-bottom: 58px;
		font-weight: 500;
		font-size: 36px;
		line-height: 100%;
		color: inherit;
		text-align: center;
	}

	.first-screen-right .um-response__text {
		/* max-width: 654px; */
		margin-bottom: 40px;
		font-weight: 700;
		font-size: 24px;
		line-height: 143%;
		color: inherit;
		text-align: center;
	}

	.first-screen-right .um-response__img {
		max-width: 100%;
		margin: 0 auto;
		height: auto;
		aspect-ratio: {{ data_get($data, 'image.width') }} / {{ data_get($data, 'image.height') }};
		object-fit: cover;
	}

	@media (min-width: 992px) {
		.first-screen-right .um-response {
			padding-top: 100px;
			padding-bottom: 150px;
		}

		.first-screen-right .um-response__title {
			margin-bottom: 100px;
			max-width: 550px;
			font-weight: 500;
			font-size: 68px;
			line-height: 100%;
			text-align: start;
		}

		.first-screen-right .um-response__text {
			margin-bottom: 100px;
			font-weight: 700;
			font-size: 36px;
			line-height: 143%;
			text-align: start;
		}
	}

	@media (min-width: 1200px) {
		.first-screen-right .um-response__title {
			font-size: 80px;
		}
	}

	.first-screen-right .um-response-my-wrapper {
		display: flex;
		column-gap: 1rem;
		flex-direction: column;
		justify-content: center;
	}

	.first-screen-right .um-response__img-wrapp {
		display: flex;
		justify-content: center;
		align-items: start;
		flex-shrink: 0;
	}

	@media (min-width: 1200px) {
		.first-screen-right .um-response-my-wrapper {
			display: flex;
			flex-direction: row;
			justify-content: space-between;
		}
	}
</style>
<section class="um-response first-screen-right" style="background-color: {{ data_get($data, 'background_color.value') }}; color: {{ data_get($data, 'font_color.value') }}">
	<div class="um-container">
		<div class="um-response-my-wrapper">

			<div>
				<div>
					<h2 class="um-response__title"><span data-key="title">{{ data_get($data, 'title.value') }}</span></h2>
				</div>

				<p class="um-response__text">
					<span data-key="subtitle">{{ data_get($data, 'subtitle.value') }}</span>
				</p>
			</div>

			<div class="um-response__img-wrapp">
				<img 
				 	class="um-response__img"
					data-key="image" 
					src="{{ data_get($data, 'image.value') }}" 
					alt="image" 
					width="{{ data_get($data, 'image.width') }}"  
					height="{{ data_get($data, 'image.height') }}"
				>
			</div>
		</div>

	</div>
</section>
