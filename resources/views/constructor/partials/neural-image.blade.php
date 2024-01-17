<div id="image_generation"
	x-data="{
		messageId: null,
		selectedModel: null,
		models: [],
		images: [],
		loading: false,

		init() {
			axios
				.get(route('leonardo.index'))
				.then(resp => {
					this.models = resp.data
					this.selectedModel = this.models[0]
				})

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
				.post(route('image.imagine'), data)
				.then(response => {
					this.messageId = response.data.messageId;
				})
				.catch(error => {
					this.loading = false;
					this.$dispatch('toast-error', error.response.data.publicMessage ?? error.response.data.message)
				})
		},
		getMessage() {
			axios
				.post(route('image.get-message'), {messageId: this.messageId})
				.then(response => {
					console.log(response)
					this.progress = response.data.generations_by_pk.status;
					
					if (response.data.generations_by_pk.status !== 'COMPLETE') {
						setTimeout(() => this.getMessage(), 3000);
						return;
					}

					this.images = response.data.generations_by_pk.generated_images;
					this.loading = false;
				})
				.catch(error => {
					this.$dispatch('toast-error', error.response.data.publicMessage ?? error.response.data.message)
					this.loading = false;
				})
		},
		selectModel() {
			this.selectedModel = this.models.find(el => this.$el.value == el.uuid)
		},
		accept(url) {
			axios
				.post(route('blocks.image-data.update', this.selectedBlock.id), {
					key: 'image',
					link: url,
				})
				.then(response => {
					this.$dispatch('image-updated', {key: 'image', value: response.data})
				})
				.catch(error => {
					this.$dispatch('toast-error', error.response.data.publicMessage ?? error.response.data.message);
				})
		},
	}"
	@submit.prevent="submitPic" x-transition
>
	<form class="items-center justify-center py-3 card-body">
		<textarea class="w-full resize-none textarea textarea-primary basis-5/12" name="prompt" required placeholder="Запрос"></textarea>
		<input type="text" class="w-full input input-primary" placeholder="--no" name="no">
		<input type="hidden" name="width" value="{{ data_get($data, 'image.width') }}">
		<input type="hidden" name="height" value="{{ data_get($data, 'image.height') }}">
		<div class="flex w-full gap-2">
			<select name="model_id" id="" class="w-full select select-primary" @change="selectModel">
				<template x-for="model in models">
					<option	:value="model.uuid" x-text="model.name"></option>
				</template>
			</select>
			<button class="btn btn-info" type="button" onclick="my_modal_2.showModal()">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
					<path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
				</svg>
			</button>
		</div>
		{{-- <div class="flex justify-between w-full gap-5">
			<x-shared.forms.range class="w-full" min="0" max="100" value="0" label="Chaos" id="1" name="chaos" />
			<x-shared.forms.range class="w-full" min="0" max="1000" value="100" label="Stylize" id="2" name="stylize" />
			<x-shared.forms.range class="w-full" min="0" max="1000" value="0" label="Weird" id="3" name="weird" />
			<select name="quality" id="" class="select select-primary">
				<option value=".25">0.25</option>
				<option value=".5">0.5</option>
				<option value="1">1</option>
			</select>
		</div> --}}
	
		<div class="flex justify-center gap-1">
			<button type="submit" class="btn btn-accent">Generate</button>
			<div x-show="loading" x-cloak>
				<span class="loading loading-ball loading-sm text-primary"></span>
			</div>
		</div>
	
		<div class="relative">
			<div class="grid grid-cols-2 gap-1">
				<template x-for="image in images">
					<div class="relative">
						<img :src="image.url">
						<div 
							class="absolute top-0 left-0 flex items-center gap-3 justify-evenly right-0 bottom-0 bg-[#00000080] opacity-0 hover:opacity-100 transition"
						>
							<a class="btn btn-circle btn-primary" :href="image.url" download target="_blank">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
								</svg>
							</a>
	
							{{-- <button class="btn btn-circle btn-primary" type="button">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
								</svg>
							</button> --}}
	
							<button class="btn btn-circle btn-primary" type="button" @click="accept(image.url)">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
								</svg>
							</button>
						</div>
					</div>
				</template>
			</div>
		</div>
	</form>
	<dialog id="my_modal_2" class="modal">
		<div class="modal-box">
			<h3 class="text-lg font-bold" x-text="selectedModel?.name"></h3>
			<p class="py-4" x-text="selectedModel?.description"></p>
			<template x-if="selectedModel?.generated_image">
				<img :src="selectedModel?.generated_image.url" alt="">
			</template>
		</div>
		<form method="dialog" class="modal-backdrop">
			<button type="button" @click="my_modal_2.close()">close</button>
		</form>
	</dialog>
</div>

