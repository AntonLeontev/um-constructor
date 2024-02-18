<dialog id="image_generation_modal" class="modal">
    <div class="modal-box flex h-[85vh] w-11/12 max-w-5xl flex-col">
		<div class="flex justify-end">
			<button class="btn btn-circle btn-outline" type="button" tabindex="-1"
				@click="image_generation_modal.close()">
				<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
					stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M6 18L18 6M6 6l12 12" />
				</svg>
			</button>
		</div>
		<div class="h-full overflow-auto">
			<form class="card-body" x-data="imageGeneration" @submit.prevent="submitPic">
				<textarea class="w-full border-solid resize-none textarea textarea-primary basis-5/12" name="prompt" required placeholder="Запрос"></textarea>
				<input type="text" class="w-full border-solid input input-primary" placeholder="--no" name="no">
				<template x-if="!selected.id">
					<div class="flex gap-3">
						<x-shared.forms.range class="w-full" min="512" max="1536" step="8" value="512" label="Width, px" id="1" name="width" />
						<x-shared.forms.range class="w-full" min="512" max="1536" step="8" value="512" label="Height, px" id="1" name="height" />
					</div>
				</template>
				<template x-if="selected.id">
					<div>
						<input type="hidden" name="width" :value="selected.width">
						<input type="hidden" name="height" :value="selected.height">
					</div>
				</template>
				<div class="relative flex w-full gap-2" x-data="{tooltip: false}">
					<select name="model_id" id="" class="w-full border-solid select select-primary" @change="selectModel">
						<template x-for="model in models">
							<option	:value="model.uuid" x-text="model.name"></option>
						</template>
					</select>
					<button class="btn btn-info" type="button" @click="tooltip = true">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
							<path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
						</svg>
					</button>
					<div class="absolute z-40 shadow-xl card card-compact w-96 bg-base-100 -top-1/2 left-1/2" x-cloak x-show="tooltip" @click.outside="tooltip = false" x-transition>
						<template x-if="selectedModel?.generated_image">
							<figure><img :src="selectedModel?.generated_image.url" /></figure>
						</template>
						<div class="card-body">
							<h2 class="card-title" x-text="selectedModel?.name"></h2>
							<p x-text="selectedModel?.description"></p>
						</div>
					</div>
				</div>
			
				<div class="flex items-center justify-center gap-1">
					<button type="submit" class="relative btn btn-accent">
						Generate
						<div class="absolute -right-6" x-show="loading" x-cloak>
							<span class="loading loading-bars loading-sm text-primary"></span>
						</div>
					</button>
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
			
			
									<button class="btn btn-circle btn-primary" type="button" @click="accept(image.url)" x-show="selected.id">
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
		</div>
    </div>
</dialog>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('imageGeneration', () => ({
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
                        this.$dispatch('toast-error', error.response.data.publicMessage ?? error
                            .response.data.message)
                    })
            },
            getMessage() {
                axios
                    .post(route('image.get-message'), {
                        messageId: this.messageId
                    })
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
                        this.$dispatch('toast-error', error.response.data.publicMessage ?? error
                            .response.data.message)
                        this.loading = false;
                    })
            },
            selectModel() {
                this.selectedModel = this.models.find(el => this.$el.value == el.uuid)
            },
            accept(url) {
                axios
                    .post(route('blocks.image-data.update', this.selected.id), {
                        key: this.selected.key,
                        link: url,
                    })
                    .then(response => {
                        this.$dispatch('block-update', this.selected.id)
						this.cleanSelection()
                    })
                    .catch(error => {
                        this.$dispatch('toast-error', error.response.data.publicMessage ?? error
                            .response.data.message);
                    })
					.finally(() => image_generation_modal.close())
            },
        }))
    })
</script>
