<style>
	.footer {
		display: flex;
		justify-content: space-between;
		align-items: center;
		min-height: 50px;
		padding: 10px;
		color: #fff;
		background: #1d1d1d;
	}
</style>

<footer class="footer">
	<span data-key="copyright">{{ data_get($data, 'copyright.value') }}</span>
	<span data-key="phone">{{ data_get($data, 'phone.value') }}</span>
</footer>
