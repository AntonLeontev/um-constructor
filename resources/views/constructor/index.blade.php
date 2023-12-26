@extends('layouts.app')

@section('title', $site->title)

@section('head_scripts')
	@vite(['resources/css/common.css'])
@endsection

@section('content')
    @include('partials.gptRawForm')

    <div class="flex h-[calc(100vh-67px)] overflow-hidden" x-data="siteConstructor" @add-block="blocks">

        {{-- sidebar --}}
        @include('constructor.partials.blocks-list')


		<div class="overflow-y-auto basis-full">
			@include('constructor.partials.preview')

			<div class="flex h-full basis-full">
				
				<div class="flex flex-col items-center p-1 overflow-y-auto basis-1/2 border-x">
	
	
	
					<div x-data="inputView" class="w-full" x-html="view">
	
					</div>
					<script>
						document.addEventListener('alpine:init', () => {
							Alpine.data('inputView', () => ({
								view: '',
	
								init() {
									this.$watch('selectedBlock', block => this.update(block))
								},
								update(block) {
									axios
										.get(route('blocks.input-view', block.id))
										.then(response => this.view = response.data.html)
										.catch(error => {
											this.$dispatch('toast-error', error.response.data.message)
										})
	
								},
							}))
						})
					</script>
	
				</div>
	
				<div class="h-full px-2 overflow-auto basis-1/2 border-x">
	
					@include('constructor.partials.neural')
	
				</div>
			</div>
		</div>

        <div class="w-[80px] border-l"></div>


    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('siteConstructor', () => ({
                siteId: {{ $site->id }},
                selectedBlock: null,
                


            }))
        })
    </script>
@endsection
