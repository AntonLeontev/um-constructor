<style>
	.first_screen {
		display: grid;
		grid-template-columns: 60% 40%;
		padding: 100px 50px;
		background-color: #fff;
	}
	.text {
		padding-left: 10px;
		justify-self: start;
	}
	.title {
		margin-bottom: 15px;
	}
	.subtitle {
		margin-bottom: 50px;
	}
	.button {
		padding: 10px;
		background: yellowgreen;
		border: none;
		border-radius: 6px;
		outline: none;
	}
</style>

<section class="first_screen">
	<div class="text">
		<h1 class="title">
			<span data-key="title">{{ data_get($data, 'title.value') }}</span>
		</h1>
		<h3 class="subtitle">
			<span data-key="subtitle">{{ data_get($data, 'subtitle.value') }}</span>
		</h3>
		<button class="button">
			<span data-key="action">{{ data_get($data, 'action.value') }}</span>
		</button>
	</div>
	
	<div class="image">
		<img 
			data-key="image" 
			src="{{ data_get($data, 'image.value') }}" 
			alt="image" 
			width="{{ data_get($data, 'image.width') }}"  
			height="{{ data_get($data, 'image.height') }}"
		>
	</div>

</section>
