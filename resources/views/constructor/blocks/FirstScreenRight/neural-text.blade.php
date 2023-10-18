<form class="items-center justify-center py-3 card-body" @submit.prevent="submitText" x-data="{
	loading: false,
	choices: [],

	submitText() {
		let data = new FormData(this.$event.target);

		this.loading = true;
		
		axios
			.post(route('blocks.text-generation', this.selectedBlock.id), data)
			.then(response => {
				response.data.forEach(el => {
					try {
						this.choices.push(JSON.parse(el))
					} catch (error) {
						
					}
				});
				console.log(response.data);

				this.loading = false;
			})
			.catch(error => {
				this.$dispatch('toast-error', error.response?.data.message ?? error.message)
				this.loading = false;
			})
	},
}">
    <div class="flex w-full max-w-[1000px] flex-col gap-3 px-2">
		<div class="flex gap-x-2">
			<x-shared.forms.input class="w-1/2" name="goal" placeholder="Sale of wedding photographer services"
				label="What is the purpose of your landing page?" required />
			<x-shared.forms.input class="w-1/2" name="ta" placeholder="Unmarried women from 18 to 35 years old"
				label="Who is the target audience of your landing page?" />
		</div>
		<div class="flex gap-x-2">
			<x-shared.forms.input name="benefit" placeholder="Processing 10 photos as a gift"
				label="Briefly describe the main offer or advantage of your product or service" />
			<x-shared.forms.input name="action" placeholder="Left a request for a callback"
				label="What specific action do you want visitors to perform on your landing page?" />
		</div>
		<div class="flex items-end gap-x-2">
			<x-shared.forms.input class="w-1/2" name="message" placeholder="Let's take mental and emotional pictures"
				label="What is the general message that you would like to convey to visitors?" />
			<x-shared.forms.input class="w-1/2" name="keywords" placeholder="For example, the name of the organization"
				label="What keywords or phrases to use?" />
		</div>
		<div class="flex items-end gap-x-2">
			<x-shared.forms.input class="w-1/2" name="additionally" placeholder="" label="What should be taken into account additionally?" />
			<x-shared.forms.input name="n" placeholder="" label="How many options to generate?"
				class="w-1/2" type="number" value="3" min="1" max="5" />
		</div>
        <button type="submit" class="relative btn btn-accent" x-ref="button">
			Generate
			<span class="absolute right-[10px] text-black loading loading-ball loading-sm" x-show="loading" x-cloak></span>
		</button>

    </div>

	<div class="w-full">
		<template x-for="choice in choices">
			<div class="p-2">
				<div>
					Title: 
					<span 
						class="p-1 cursor-pointer hover:bg-accent" 
						x-text="choice.title"
						@click="$dispatch('insert-title', choice.title)"
					></span>
				</div>
				<div>
					Subtitle: 
					<span 
						class="p-1 cursor-pointer hover:bg-accent" 
						x-text="choice.subtitle"
						@click="$dispatch('insert-subtitle', choice.subtitle)"
					></span>
				</div>
				{{-- <div>
					Button: 
					<span 
						class="p-1 cursor-pointer hover:bg-accent" 
						x-text="choice.button"
						@click="$dispatch('insert-action', choice.button)"
					></span>
				</div> --}}
			</div>
		</template>
	</div>
	
</form>
