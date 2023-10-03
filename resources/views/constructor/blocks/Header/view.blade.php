<style>
	.header {
		display: flex;
		justify-content: space-between;
		align-items: center;
		height: 110px;
		padding: 5px;
		background-color: #87ff6f;
	}
</style>

<header class="header">
	<span data-key="company">{{ data_get($data, 'company.value') }}</span>
	
	<img 
		data-key="logo" 
		src="{{ data_get($data, 'logo.value') }}" 
		alt="logo" 
		width="{{ data_get($data, 'logo.width') }}"  
		height="{{ data_get($data, 'logo.height') }}"
	>

	<span data-key="phone">{{ data_get($data, 'phone.value') }}</span>
</header>
