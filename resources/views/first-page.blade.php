@extends('layouts.app')

@section('title', 'First page generation')

@section('content')
	<div class="container flex items-center min-h-screen mx-auto" x-data="firstPage">
		<div class="border card max-w-[700px] mx-auto shadow">
			<form class="items-center justify-center py-3 card-body" @submit.prevent="submit" x-ref="form">
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
		</div>

		<div x-data="rawForm">
			<div class="fixed z-10 top-3 right-3">
				<button class="btn btn-circle btn-primary" @click="active = true">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
						<path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
					</svg>
				</button>
			</div>
	
			<div 
				class="fixed top-0 right-0 w-1/2 min-w-[300px] h-screen bg-base-100 transition border-l-2 shadow-lg p-3 z-20 translate-x-full" 
				:class="active && '!translate-x-0'"
			>
				<div class="flex justify-end w-full mb-3">
					<button class="btn btn-circle btn-outline" @click="active = false">
						<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
					</button>
				</div>
				<form class="flex flex-col h-full gap-y-5 w-fill" @submit.prevent="submit">
					<textarea class="w-full resize-none textarea textarea-primary basis-5/12" name="request" required placeholder="Запрос"></textarea>
					<div class="flex justify-center">
						<div class="relative flex items-center">
							<input class="btn btn-accent" type="submit" value="Отправить">
							<span class="absolute -right-8 loading loading-ball loading-md text-primary" x-show="loading"></span>
						</div>
					</div>
					<textarea class="w-full resize-none textarea textarea-primary basis-5/12" placeholder="Ответ" readonly x-text="response"></textarea>
				</form>
			</div>
		</div>

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
								console.log(response.data);

								this.loading = false;
							})
							.catch(error => {
								alert('Ошибка!')
								console.log(error);
								this.loading = false;
							})
					}
				}))
			})
		</script>


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
				rawForm: false,
				loading: false,
				choices: [],
				title: 'Заголовок',
				subtitle: 'Подзаголовок',
				button: 'Кнопка',

				submit() {
					let data = new FormData(this.$refs.form);

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
