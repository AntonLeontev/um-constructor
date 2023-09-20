@extends('layouts.app')

@section('title', 'First page generation')

@section('content')
	@include('partials.gptRawForm')
	
	<div class="flex h-screen overflow-hidden" x-data="firstPage">

		{{-- sidebar --}}
		<div class="w-[200px] border-r p-1">Список блоков сайта (превью + переключение)</div>

		<div class="flex basis-full">
			<div class="flex items-center justify-center p-1 border-x basis-2/5">
				@include('partials.first-page.preview')
			</div>
	
			<div class="h-full px-2 overflow-auto basis-3/5 border-x">
	
				<x-shared.tabs class="py-5">
					<a class="transition tab tab-lg" :class="tab === 'text' && 'tab-active'" @click="tab = 'text'">
						Текст
					</a>
					<a class="transition tab tab-lg" :class="tab === 'pic' && 'tab-active'" @click="tab = 'pic'">
						Картинки
					</a>
				</x-shared.tabs>
		
				<div class="mx-auto border shadow card">
					<div x-show="tab === 'text'" x-transition>
						@include('partials.first-page.text')
					</div>
					
					<div class="" x-show="tab === 'pic'" x-transition>
						@include('partials.first-page.pics')
					</div>
				</div>
			</div>
		</div>

		<div class="w-[80px] border-l"></div>


	</div>

	<script>
		document.addEventListener('alpine:init', () => {
			Alpine.data('firstPage', () => ({
				tab: 'text',

			}))
		})
	</script>
@endsection
