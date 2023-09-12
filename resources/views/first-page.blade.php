@extends('layouts.app')

@section('title', 'First page generation')

@section('content')
	<div class="container min-h-screen mx-auto">
		<form action="{{ route('copywriter.first-page') }}" method="POST" class="flex flex-col items-center justify-center py-3">
			@csrf
			<div class="flex flex-col max-w-[700px] px-2 gap-3">
				<label class="flex flex-col">
					Какую цель преследует ваш лендинг?
					<input 
						type="text" 
						name="goal" 
						class="p-3 text-black border rounded shadow-lg"
					>
				</label>
				<label class="flex flex-col">
					Кто является целевой аудиторией вашего лендинга?
					<input 
						type="text" 
						name="ta" 
						class="p-3 text-black border rounded shadow-lg"
					>
				</label>
				<label class="flex flex-col">
					Кратко опишите основное предложение или преимущество вашего продукта или услуги
					<input 
						type="text" 
						name="benefit" 
						class="p-3 text-black border rounded shadow-lg"
					>
				</label>
				<label class="flex flex-col">
					Какое конкретное действие вы хотите, чтобы посетители совершили на вашем лендинге?
					<input 
						type="text" 
						name="action" 
						class="p-3 text-black border rounded shadow-lg"
					>
				</label>
				<label class="flex flex-col">
					Каково общее сообщение, которое хотели бы донести до посетителей?
					<input 
						type="text" 
						name="message" 
						class="p-3 text-black border rounded shadow-lg"
					>
				</label>
				<label class="flex flex-col">
					Какие ключевые слова или фразы нужно использовать?
					<input 
						type="text" 
						name="keywords" 
						class="p-3 text-black border rounded shadow-lg"
					>
				</label>
				{{-- <label class="flex flex-col">
					Стиль текста
					<select name="style" class="p-3 text-black uppercase normal-case bg-white border rounded shadow-lg">
						<option value="Neutral">Нейтральный</option>
						<option value="Official">Официальный</option>
						<option value="science">Научный</option>
						<option value="journalistic">Публицистический</option>
						<option value="conversational">Разговорный</option>
						<option value="artistic">Художественный</option>
						<option value="Analytical">Аналитический</option>
					</select>
				</label> --}}
				<label class="flex flex-col">
					Что нужно учесть дополнительно?
					<input 
						type="text" 
						name="additionally" 
						class="p-3 text-black border rounded shadow-lg"
					>
				</label>
				{{-- <label class="flex flex-row items-center justify-between gap-x-3">
					Максимум слов в заголовке
					<input 
						type="number" 
						name="max_title" 
						class="p-3 text-black border rounded shadow-lg"
						min="3"
						max="10"
						value="5"
					>
				</label>
				<label class="flex flex-row items-center justify-between gap-x-3">
					Максимум слов в подзаголовке
					<input 
						type="number" 
						name="max_subtitle" 
						class="p-3 text-black border rounded shadow-lg"
						min="3"
						max="10"
						value="8"
					>
				</label>
				<label class="flex flex-row items-center justify-between gap-x-3">
					Максимум слов в кнопке
					<input 
						type="number" 
						name="max_button" 
						class="p-3 text-black border rounded shadow-lg"
						min="3"
						max="10"
						value="3"
					>
				</label> --}}
				<label class="flex flex-row items-center justify-between gap-x-3">
					Сколько вариантов сгенерировать?
					<input 
						type="number" 
						name="n" 
						class="p-3 text-black border rounded shadow-lg"
						min="1"
						max="5"
						value="3"
					>
				</label>

				<button type="submit" class="p-4 bg-green-500 rounded shadow-lg">Сгенерировать</button>
				
			</div>
		</form>
	</div>
@endsection
