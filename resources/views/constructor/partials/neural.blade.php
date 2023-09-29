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
