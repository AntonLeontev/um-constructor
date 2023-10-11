<form 
	x-data="picture"
	class="items-center justify-center py-3 card-body" 
	@submit.prevent="submitPic" x-transition
>
    <textarea class="w-full resize-none textarea textarea-primary basis-5/12" name="prompt" required placeholder="Запрос"></textarea>
	<input type="text" class="w-full input input-primary" placeholder="--no" name="no">
	<div class="flex justify-between w-full gap-5">
		<x-shared.forms.range class="w-full" min="0" max="100" value="0" label="Chaos" id="1" name="chaos" />
		<x-shared.forms.range class="w-full" min="0" max="1000" value="100" label="Stylize" id="2" name="stylize" />
		<x-shared.forms.range class="w-full" min="0" max="1000" value="0" label="Weird" id="3" name="weird" />
		<select name="quality" id="" class="select select-primary">
			<option value=".25">0.25</option>
			<option value=".5">0.5</option>
			<option value="1">1</option>
		</select>
		<input type="hidden" name="aspect" value="700:300">
	</div>
    <button type="submit" class="btn btn-accent">Отправить</button>
	<div>
		Progress: <span x-text="progress"></span>
		<span class="loading loading-ball loading-sm text-primary" x-show="loading" x-cloak></span>
	</div>
	<img :src="imageUrl">
	<div class="flex flex-wrap justify-center gap-1">
		<template x-for="button in buttons">
			<button type="button" class="btn btn-primary" x-text="button" @click="pushButton"></button>
		</template>
	</div>
	<div class="flex flex-wrap gap-1" x-show="imageUrls.length === 4">
		<button type="button" class="btn btn-accent" @click="$dispatch('insert-image', imageUrls[0])">Применить 1</button>
		<button type="button" class="btn btn-accent" @click="$dispatch('insert-image', imageUrls[1])">Применить 2</button>
		<button type="button" class="btn btn-accent" @click="$dispatch('insert-image', imageUrls[2])">Применить 3</button>
		<button type="button" class="btn btn-accent" @click="$dispatch('insert-image', imageUrls[3])">Применить 4</button>
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
			imageUrls: [],
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
						this.imageUrls = response.data.response.imageUrls;
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
