<style>
	.header {
		display: grid;
		grid-template-columns: 1fr 100px 1fr;
		align-items: center;
		height: 110px;
		background-color: #fff;
	}
	.company {
		padding-left: 10px;
		justify-self: start;
	}
	.contact {
		padding-right: 10px;
		justify-self: end;
	}
</style>

<header class="header">
	<div class="company">
		<span data-key="company">{{ data_get($data, 'company.value') }}</span>
	</div>
	
	<div class="logo">
		<img 
			data-key="logo" 
			src="{{ data_get($data, 'logo.value') }}" 
			alt="logo" 
			width="{{ data_get($data, 'logo.width') }}"  
			height="{{ data_get($data, 'logo.height') }}"
		>
	</div>

	<div class="contact">
		<span data-key="phone">{{ data_get($data, 'phone.value') }}</span>
	</div>
</header>
