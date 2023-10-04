<form 
	x-data="{
		messageId: 'N8HyRkKIshWNj0mLLLkV',
		progress: 0,
		buttons: [],
		buttonMessageId: null,
		imageUrl: null,
		imageUrls: {},
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
					this.$dispatch('toast-error', error.response.data.message)
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
					this.$dispatch('toast-error', error.response.data.message)
				})
		},
		pushButton(button) {
			this.progress = 0;
			this.loading = true;
			this.buttons = [];
			this.imageUrl = null;

			axios
				.post(route('midjourney.push-button'), {
					buttonMessageId: this.buttonMessageId,
					button: button,
				})
				.then(response => {
					this.messageId = response.data.messageId;
				})
				.catch(error => {
					this.loading = false;
					this.$dispatch('toast-error', error.response.data.message)
				})
		},
		accept(number) {
			axios
				.post(route('blocks.image-data.update', this.selectedBlock.id), {
					key: 'logo',
					link: this.imageUrl,
					number: number,
				})
				.then(response => {
					this.$dispatch('image-updated', {key: 'logo', value: response.data})
				})
				.catch(error => {
					this.$dispatch('toast-error', error.response.data.message);
				})
		},
	}"
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
		<input type="hidden" name="aspect" value="{{ data_get($data, 'logo.width') }}:{{ data_get($data, 'logo.height') }}">
	</div>
	<div class="flex gap-1">
		<button type="submit" class="btn btn-accent">Generate</button>
		<button 
			type="button" 
			class="btn btn-accent" 
			x-show="Object.values(buttons).indexOf('🔄') > -1"
			@click="pushButton('🔄')"
		>
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
				<path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
			</svg>
		</button>
	</div>
	<div>
		Progress: <span x-text="progress"></span>
		<span class="loading loading-ball loading-sm text-primary" x-show="loading" x-cloak></span>
	</div>

	<div class="relative">
		<div 
			class="absolute top-0 left-0 flex items-center gap-3 justify-evenly right-1/2 bottom-1/2 bg-[#00000080] opacity-0 hover:opacity-100 transition"
			x-show="Object.values(buttons).length > 0"
		>
			<a class="btn btn-circle btn-primary" :href="imageUrls[0]" download target="_blank">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
					<path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
				</svg>
			</a>

			<button class="btn btn-circle btn-primary" type="button" x-show="Object.values(buttons).indexOf('V1') > -1" @click="pushButton('V1')">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
					<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
				</svg>
			</button>

			<button class="btn btn-circle btn-primary" type="button" @click="accept(1)">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
					<path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
				</svg>
			</button>
		</div>

		<div 
			class="absolute top-0 left-1/2 flex items-center gap-3 justify-evenly right-0 bottom-1/2 bg-[#00000080] opacity-0 hover:opacity-100 transition"
			x-show="Object.values(buttons).length > 1"
		>
			<a class="btn btn-circle btn-primary" :href="imageUrls[1]" download target="_blank">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
					<path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
				</svg>
			</a>

			<button class="btn btn-circle btn-primary" type="button" x-show="Object.values(buttons).indexOf('V2') > -1" @click="pushButton('V2')">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
					<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
				</svg>
			</button>

			<button class="btn btn-circle btn-primary" type="button" @click="accept(2)">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
					<path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
				</svg>
			</button>
		</div>

		<div 
			class="absolute top-1/2 left-0 flex items-center gap-3 justify-evenly right-1/2 bottom-0 bg-[#00000080] opacity-0 hover:opacity-100 transition"
			x-show="Object.values(buttons).length > 2"
		>
			<a class="btn btn-circle btn-primary" :href="imageUrls[2]" download target="_blank">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
					<path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
				</svg>
			</a>

			<button class="btn btn-circle btn-primary" type="button" x-show="Object.values(buttons).indexOf('V3') > -1" @click="pushButton('V3')">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
					<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
				</svg>
			</button>

			<button class="btn btn-circle btn-primary" type="button" @click="accept(3)">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
					<path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
				</svg>
			</button>
		</div>

		<div 
			class="absolute top-1/2 left-1/2 flex items-center gap-3 justify-evenly right-0 bottom-0 bg-[#00000080] opacity-0 hover:opacity-100 transition"
			x-show="Object.values(buttons).length > 3"
		>
			<a class="btn btn-circle btn-primary" :href="imageUrls[3]" download target="_blank">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
					<path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
				</svg>
			</a>

			<button class="btn btn-circle btn-primary" type="button" x-show="Object.values(buttons).indexOf('V4') > -1" @click="pushButton('V4')">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
					<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
				</svg>
			</button>

			<button class="btn btn-circle btn-primary" type="button" @click="accept(4)">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
					<path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
				</svg>
			</button>
		</div>
		<img :src="imageUrl">
	</div>
</form>
