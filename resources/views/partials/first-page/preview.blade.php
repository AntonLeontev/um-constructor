<div 
	class="w-full" 
	x-data="preview" 
	@insert-image.window="image = $event.detail"
	@insert-title.window="title = $event.detail"
	@insert-subtitle.window="subtitle = $event.detail"
	@insert-button.window="button = $event.detail"
>
    <h3 class="mb-3 text-center text-[25px]">Предпросмотр</h3>

    <div class="border-2">

        <div class="relative flex aspect-[1200/500] items-center px-[5%]">
            <div class="relative flex flex-col justify-center w-full @container">
                <textarea
                    class="relative z-10 mb-[3%] bg-transparent text-[100%] @5xl:text-[3rem] font-bold uppercase focus-visible:outline-none max-w-[50%] resize-none overflow-hidden"
                    x-model="title"></textarea>
                <textarea class="relative z-10 mb-[3%] bg-transparent text-[60%] focus-visible:outline-none max-w-[50%] resize-none"
                    x-model="subtitle"></textarea>	
                <input class="relative z-10 w-[40%] bg-black text-center text-[70%] text-white uppercase focus-visible:outline-none" x-model="button">
                <img class="bg-red absolute right-0 z-0 aspect-[700/300] w-[70%]" :src="image" alt="Picture">
            </div>
        </div>

    </div>

	<button class="mt-3 btn" @click="fullscreen = true">Fullscreen</button>

	<div 
		class="fixed top-0 bottom-0 right-0 left-0 z-30 flex justify-center items-center bg-[#000000cf]"
		x-show="fullscreen"
		style="display: none"
	>
		<button class="absolute top-1 right-1 btn btn-circle btn-primary" @click="fullscreen = false">
			<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
		</button>

		<div class="w-full">

			<div class="relative flex aspect-[1200/500] items-center px-[5%] bg-white">
				<div class="relative flex flex-col justify-center w-full @container">
					<textarea
						class="relative z-10 mb-[3%] bg-transparent text-[100%] @5xl:text-[3rem] font-bold uppercase focus-visible:outline-none max-w-[50%] resize-none overflow-hidden"
						x-model="title"></textarea>
					<textarea 
						class="relative z-10 mb-[3%] bg-transparent text-[60%] @5xl:text-[1.8rem] focus-visible:outline-none max-w-[50%] resize-none"
						x-model="subtitle"></textarea>
					<input class="relative z-10 w-min bg-black text-center text-[70%] @5xl:text-[2.1rem] uppercase text-white focus-visible:outline-none" x-model="button">
					<img class="bg-red absolute right-0 z-0 aspect-[700/300] w-[70%]" :src="image" alt="Picture">
				</div>
			</div>

		</div>
	</div>

    {{-- <div class="">
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
	</div> --}}
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('preview', () => ({
            image: '',
            title: 'Заголовок очень-очень длинный на три строчки для проверки',
            subtitle: 'Подзаголовок',
            button: 'Кнопка',
			fullscreen: false,
        }))
    })
</script>
