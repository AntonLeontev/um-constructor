<style>
	.header {
		display: flex;
		justify-content: space-between;
		align-items: center;
		height: 50px;
		padding: 5px;
		background-color: #87ff6f;
	}
</style>

<header class="header">
	<span data-key="company">{{ data_get($data, 'company') }}</span>
	<span data-key="phone">{{ data_get($data, 'phone') }}</span>
</header>
