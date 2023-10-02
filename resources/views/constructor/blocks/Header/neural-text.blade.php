<form 
	class="items-center justify-center py-3 card-body" 
	@submit.prevent="submitText"
	x-data="{
		loading: false,
		choices: [],

		submitText() {
			let data = new FormData(this.$event.target);

			this.loading = true;
			
			axios
				.post(route('blocks.text-generation', this.selectedBlock.id), data)
				.then(response => {
					this.choices = response.data;
					this.loading = false;
				})
				.catch(error => {
					this.$dispatch('toast-error', error.response.data.message)
					this.loading = false;
				})
		},
	}" 
>
    <div class="flex w-full max-w-[1000px] flex-col gap-3 px-2">
		<div class="flex gap-x-2">
			<x-shared.forms.input class="w-full" name="goal" placeholder="Sale of wedding photographer services"
				label="What does your company do?" required />
		</div>
        <button type="submit" class="relative btn btn-accent" x-ref="button">
			Сгенерировать
			<span class="absolute right-[10px] text-black loading loading-ball loading-sm" x-show="loading" x-cloak></span>
		</button>

    </div>

	<div class="w-full">
		<template x-for="choice in choices">
			<div class="p-2">
				<div>
					<span 
						class="p-1 cursor-pointer hover:bg-accent" 
						x-text="choice.name"
						@click="$dispatch('insert-company', choice.name)"
					></span>
				</div>
			</div>
		</template>
	</div>
	
</form>

