<form 
	x-data="picture"
	class="items-center justify-center py-3 card-body" 
	x-show="tab === 'pic'" 
	@submit.prevent="submitPic" x-transition
>
    <textarea class="w-full resize-none textarea textarea-primary basis-5/12" name="prompt" required placeholder="Запрос"></textarea>
    <button type="submit" class="btn btn-accent">Отправить</button>
	<div>
		Progress: <span x-text="progress"></span>
		<span class="loading loading-ball loading-sm text-primary" x-show="loading" x-cloak></span>
	</div>
	<img :src="imageUrl">
	<div class="flex">
		<template x-for="button in buttons">
			<button type="button" class="btn btn-primary" x-text="button" @click="pushButton"></button>
		</template>
	</div>
</form>

<script>
	document.addEventListener('alpine:init', () => {
		Alpine.data('picture', () => ({
			messageId: null,
			progress: 0,
			buttons: [],
			buttonMessageId: null,
			imageUrl: null,
			loading: false,

			init() {
				this.$watch('messageId', () => {
					setTimeout(() => {
						this.getMessage();
					}, 6000);
				});
			},
			submitPic() {
				let data = new FormData(this.$event.target);
				this.progress = 0;
				this.loading = true;
				this.buttons = [];
				this.imageUrl = null;

				axios
					.post(route('midjourney.imagine'), data)
					.then(response => {
						this.messageId = response.data.messageId;
					})
					.catch(error => {
						this.loading = false;
						alert('Ошибка!')
						console.log(error);
					})
			},
			getMessage() {
				axios
					.post(route('midjourney.get-message'), {messageId: this.messageId})
					.then(response => {
						this.progress = response.data.progress;
						
						if (response.data.progress < 100) {
							this.imageUrl = response.data.progressImageUrl;

							setTimeout(() => this.getMessage(), 3000);

							return;
						}

						this.imageUrl = response.data.response.imageUrl;
						this.buttons = response.data.response.buttons;
						this.buttonMessageId = response.data.response.buttonMessageId;
						this.loading = false;
					})
					.catch(error => {
						this.loading = false;
						alert('Ошибка!')
						console.log(error);
					})
			},
			pushButton() {
				this.progress = 0;
				this.loading = true;
				this.buttons = [];
				this.imageUrl = null;

				axios
					.post(route('midjourney.push-button'), {
						buttonMessageId: this.buttonMessageId,
						button: this.$event.target.innerText,
					})
					.then(response => {
						this.messageId = response.data.messageId;
					})
					.catch(error => {
						this.loading = false;
						alert('Ошибка!')
						console.log(error);
					})
			},
		}))
	})
</script>
