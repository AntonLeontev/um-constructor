<dialog id="text_generation_modal" class="modal">
    <div class="flex flex-col w-11/12 max-w-5xl modal-box h-[85vh]">
        <form
			x-data="rawForm"
			class="flex flex-col h-full p-3 bg-base-100"
			@submit.prevent="submit">
			<div class="flex justify-between w-full mb-3">
				<select id="" name="model" class="border-solid select select-primary">
					<option value="gpt-3.5-turbo">GPT-3.5</option>
					<option value="gpt-4">GPT-4</option>
				</select>
				<button class="btn btn-circle btn-outline" type="button" @click="text_generation_modal.close()" tabindex="-1">
					<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
						stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
					</svg>
				</button>
			</div>
			<div class="flex flex-col h-full w-fill gap-y-5">
				<textarea class="w-full border-solid resize-none textarea textarea-primary basis-3/12 " name="request" required placeholder="Request"></textarea>
				<div class="flex items-center justify-center basis-2/12">
					<div class="relative flex items-center">
						<input class="btn btn-accent" type="submit" value="Send">
						<span class="absolute loading loading-bars loading-md text-primary -right-8"
							x-show="loading"></span>
					</div>
				</div>
				<textarea class="w-full border-solid resize-none textarea textarea-primary basis-7/12" placeholder="Response" readonly
					x-text="response"></textarea>
			</div>
		</form>
    </div>
</dialog>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('rawForm', () => ({
            active: false,
            loading: false,
            response: '',

            submit() {
                let data = new FormData(this.$event.target);

                this.loading = true;

                axios
                    .post(route('request'), data)
                    .then(response => {
                        this.response = response.data.choices[0].message.content;
                    })
                    .catch(error => {
                        this.$dispatch('toast-error', error.response.data.message)
                        console.log(error);
                    })
					.finally(() => {
						this.loading = false;
					})
            }
        }))
    })
</script>
