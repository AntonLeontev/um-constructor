@extends('layouts.app')

@section('title', __('constructor.title') . " $site->title")

@section('content')
	@include('partials.gptRawForm')
	
	<div class="flex h-[calc(100vh-67px)] overflow-hidden" x-data="siteConstructor">

		{{-- sidebar --}}
		<div class="flex flex-col w-[200px] border-r p-1">
			<h3 class="text-center">Blocks</h3>
			<div class="overflow-auto basis-auto">
				
			</div>
			<div class="flex justify-center pb-2">
				<button class="btn btn-sm btn-success" @click="blocks_choice.showModal()">
					{{ __('constructor.add block') }}
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
						<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
					</svg>
				</button>
			</div>
		</div>

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




		<dialog id="blocks_choice" class="modal">
			<div class="modal-box">
				<h3 class="text-lg font-bold">Choose block type:</h3>
				@foreach (blocks_list() as $block)
					<p>{{ $block::class }}</p>
				@endforeach
				<p class="py-4">Press ESC key or click outside to close</p>
			</div>
			<form method="dialog" class="modal-backdrop">
				<button>close</button>
			</form>
		</dialog>
	</div>

	<script>
		document.addEventListener('alpine:init', () => {
			Alpine.data('siteConstructor', () => ({
				tab: 'text',

			}))
		})
	</script>
@endsection
