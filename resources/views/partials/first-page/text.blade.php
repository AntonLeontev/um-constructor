<form class="items-center justify-center py-3 card-body" x-data="text" @submit.prevent="submitText">
    <div class="flex max-w-[700px] flex-col gap-3 px-2">
        <x-shared.forms.input name="goal" placeholder="Продажа услуг свадебного фотографа"
            label="Какую цель преследует ваш лендинг?" required />
        <x-shared.forms.input name="ta" placeholder="Незамужние женщины от 18 до 35 лет"
            label="Кто является целевой аудиторией вашего лендинга?" />
        <x-shared.forms.input name="benefit" placeholder="Обработка 10 фотографий в подарок"
            label="Кратко опишите основное предложение или преимущество вашего продукта или услуги" />
        <x-shared.forms.input name="action" placeholder="Оставили заявку на обратный звонок"
            label="Какое конкретное действие вы хотите, чтобы посетители совершили на вашем лендинге?" />
        <x-shared.forms.input name="message" placeholder="Сделаем душевные и эмоциональные снимки"
            label="Каково общее сообщение, которое хотели бы донести до посетителей?" />
        <x-shared.forms.input name="keywords" placeholder="Например название организации"
            label="Какие ключевые слова или фразы нужно использовать?" />
        <x-shared.forms.input name="additionally" placeholder="" label="Что нужно учесть дополнительно?" />
        <x-shared.forms.input name="n" placeholder="" label="Сколько вариантов сгенерировать?"
            class="flex items-center gap-x-10" type="number" value="3" min="1" max="5" />
        <button type="submit" class="btn btn-accent" x-ref="button">Сгенерировать</button>

    </div>
</form>


<script>
	document.addEventListener('alpine:init', () => {
		Alpine.data('text', () => ({
			loading: false,
			choices: [],

			submitText() {
				let data = new FormData(this.$event.target);

				result_modal.showModal();
				this.loading = true;
				
				axios
					.post(route('copywriter.first-page'), data)
					.then(response => {
						this.choices = response.data;
						console.log(response.data);

						this.loading = false;
					})
					.catch(error => {
						alert('Ошибка!')
						console.log(error);
						this.loading = false;
					})
			},
		}))
	})
</script>
