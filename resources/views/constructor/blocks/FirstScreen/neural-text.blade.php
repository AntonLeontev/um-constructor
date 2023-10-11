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
			<x-shared.forms.input class="w-1/2" name="goal" placeholder="Продажа услуг свадебного фотографа"
				label="Какую цель преследует ваш лендинг?" required />
			<x-shared.forms.input class="w-1/2" name="ta" placeholder="Незамужние женщины от 18 до 35 лет"
				label="Кто является целевой аудиторией вашего лендинга?" />
		</div>
		<div class="flex gap-x-2">
			<x-shared.forms.input name="benefit" placeholder="Обработка 10 фотографий в подарок"
				label="Кратко опишите основное предложение или преимущество вашего продукта или услуги" />
			<x-shared.forms.input name="action" placeholder="Оставили заявку на обратный звонок"
				label="Какое конкретное действие вы хотите, чтобы посетители совершили на вашем лендинге?" />
		</div>
		<div class="flex items-end gap-x-2">
			<x-shared.forms.input class="w-1/2" name="message" placeholder="Сделаем душевные и эмоциональные снимки"
				label="Каково общее сообщение, которое хотели бы донести до посетителей?" />
			<x-shared.forms.input class="w-1/2" name="keywords" placeholder="Например название организации"
				label="Какие ключевые слова или фразы нужно использовать?" />
		</div>
		<div class="flex items-end gap-x-2">
			<x-shared.forms.input class="w-1/2" name="additionally" placeholder="" label="Что нужно учесть дополнительно?" />
			<x-shared.forms.input name="n" placeholder="" label="Сколько вариантов сгенерировать?"
				class="w-1/2" type="number" value="3" min="1" max="5" />
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
				<div>
					Button: 
					<span 
						class="p-1 cursor-pointer hover:bg-accent" 
						x-text="choice.button"
						@click="$dispatch('insert-action', choice.button)"
					></span>
				</div>
			</div>
		</template>
	</div>
	
</form>
