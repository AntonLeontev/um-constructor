@extends('layouts.app')

@section('title', 'First page generation')

@section('content')
	@include('partials.gptRawForm')
	
	<div class="" x-data="firstPage">

		<x-shared.tabs class="py-5">
			<a class="transition tab tab-lg" :class="tab === 'text' && 'tab-active'" @click="tab = 'text'">
				Текст
			</a>
			<a class="transition tab tab-lg" :class="tab === 'pic' && 'tab-active'" @click="tab = 'pic'">
				Картинки
			</a>
		</x-shared.tabs>

		<div class="border card max-w-[700px] mx-auto shadow">
			<form class="items-center justify-center py-3 card-body" @submit.prevent="submitText" x-show="tab === 'text'" x-transition>
				<div class="flex flex-col max-w-[700px] px-2 gap-3">
					<x-shared.forms.input name="goal" placeholder="Продажа услуг свадебного фотографа" label="Какую цель преследует ваш лендинг?" required />
					<x-shared.forms.input name="ta" placeholder="Незамужние женщины от 18 до 35 лет" label="Кто является целевой аудиторией вашего лендинга?" />
					<x-shared.forms.input name="benefit" placeholder="Обработка 10 фотографий в подарок" label="Кратко опишите основное предложение или преимущество вашего продукта или услуги" />
					<x-shared.forms.input name="action" placeholder="Оставили заявку на обратный звонок" label="Какое конкретное действие вы хотите, чтобы посетители совершили на вашем лендинге?" />
					<x-shared.forms.input name="message" placeholder="Сделаем душевные и эмоциональные снимки" label="Каково общее сообщение, которое хотели бы донести до посетителей?" />
					<x-shared.forms.input name="keywords" placeholder="Например название организации" label="Какие ключевые слова или фразы нужно использовать?" />
					<x-shared.forms.input name="additionally" placeholder="" label="Что нужно учесть дополнительно?" />
					<x-shared.forms.input 
						name="n" 
						placeholder="" 
						label="Сколько вариантов сгенерировать?" 
						class="flex items-center gap-x-10" 
						type="number" 
						value="3"
						min="1" 
						max="5" 
					/>
					<button type="submit" class="btn btn-accent" x-ref="button">Сгенерировать</button>
					
				</div>
			</form>

			@include('partials.first-page.pics')
		</div>

		


		<dialog id="result_modal" class="modal bg-[#00000030]">
			<div class="relative w-11/12 max-w-5xl modal-box bg-base-100">
				<h3 class="mb-3 text-[25px] text-center">Предпросмотр</h3>

				<div class="w-full min-h-[200px] bg-info mb-5 flex flex-col gap-y-5 p-3">
					<input class="text-[32px] uppercase font-bold bg-transparent focus-visible:outline-none" x-model="title">
					<input class="text-[22px] bg-transparent focus-visible:outline-none" x-model="subtitle">
					<input class="btn btn-accent focus-visible:outline-none transform-none" x-model="button">
				</div>

				<div class="">
					<h3 class="mb-1 text-[25px] text-center">Варианты:</h3>
					<h4 class="mb-3 text-sm text-center">Выбирайте текст для предпросмотра</h4>
					<div class="w-full max-h-[350px] overflow-y-auto flex flex-col gap-y-2">
						<template x-for="(item, key) in choices">
							<div class="border card">
								<div class="flex-col w-full p-4 card-body gap-y-3">
									<div class="flex items-center">
										<div class="w-1/4">Заголовок: </div>
										<div class="w-3/4">
											<span 
												class="p-1 transition cursor-pointer hover:bg-accent" 
												x-text="item.title"
												@click="title = $el.innerText"
											></span>
										</div>
									</div>
									<div class="flex items-center">
										<div class="w-1/4">Подзаголовок: </div>
										<div class="w-3/4">
											<span 
												class="p-1 transition cursor-pointer hover:bg-accent" 
												x-text="item.subtitle"
												@click="subtitle = $el.innerText"
											></span>
										</div>
									</div>
									<div class="flex items-center">
										<div class="w-1/4">Кнопка: </div>
										<div class="w-3/4">
											<span 
												class="p-1 transition cursor-pointer hover:bg-accent" 
												x-text="item.button"
												@click="button = $el.innerText"
											></span>
										</div>
									</div>
								</div> 
							</div>
						</template>
					</div> 
				</div>

				
				<div class="modal-action">
					<button class="btn btn-accent" @click="$refs.button.click()">Перегенерировать</button>
					<form method="dialog">
						<!-- if there is a button, it will close the modal -->
						<button class="btn" @click="loading = true">Закрыть</button>
					</form>
				</div>

				
				<div class="absolute top-0 bottom-0 left-0 right-0 flex flex-col items-center justify-center bg-white" x-show="loading" x-transition.opacity>
					<span class="loading loading-ball loading-lg text-primary"></span>
					<div class="">Придумываем...</div>
				</div>
			</div>
		</dialog>
	</div>

	<script>
		document.addEventListener('alpine:init', () => {
			Alpine.data('firstPage', () => ({
				loading: false,
				choices: [],
				title: 'Заголовок',
				subtitle: 'Подзаголовок',
				button: 'Кнопка',
				tab: 'pic',

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
@endsection
