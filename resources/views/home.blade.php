@extends('layouts.app')

@section('title', 'Home')

@section('content')
	<div class="container mx-auto min-h-screen">
		<div class="flex items-center w-full h-screen py-3" x-data="requests">
			<div class="flex items-center justify-between max-h-[300px] h-[50vh] w-full">
				<textarea 
					name="request" class="w-[40%] h-full border rounded-xl resize-none p-1 shadow-lg" 
					placeholder="Request"
					@keyup.enter.prevent="submit"
					x-ref="request"
				></textarea>
	
				<div class="relative">
					<svg class="absolute -left-[50px]" x-show="loading" x-cloak xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" width="40px" height="40px" viewBox="0 0 128 128" xml:space="preserve"><path fill="#012c79" id="ball1" class="cls-1" d="M67.712,108.82a10.121,10.121,0,1,1-1.26,14.258A10.121,10.121,0,0,1,67.712,108.82Z"><animateTransform attributeName="transform" type="rotate" values="0 64 64;4 64 64;0 64 64;0 64 64;0 64 64;0 64 64;0 64 64;0 64 64;0 64 64;0 64 64;0 64 64;0 64 64;0 64 64;" dur="800ms" repeatCount="indefinite"></animateTransform></path><path fill="#012c79" id="ball2" class="cls-1" d="M51.864,106.715a10.125,10.125,0,1,1-8.031,11.855A10.125,10.125,0,0,1,51.864,106.715Z"><animateTransform attributeName="transform" type="rotate" values="0 64 64;10 64 64;0 64 64;0 64 64;0 64 64;0 64 64;0 64 64;0 64 64;0 64 64;0 64 64;0 64 64;0 64 64;0 64 64;" dur="800ms" repeatCount="indefinite"></animateTransform></path><path fill="#012c79" id="ball3" class="cls-1" d="M33.649,97.646a10.121,10.121,0,1,1-11.872,8A10.121,10.121,0,0,1,33.649,97.646Z"><animateTransform attributeName="transform" type="rotate" values="0 64 64;20 64 64;40 64 64;65 64 64;85 64 64;100 64 64;120 64 64;140 64 64;160 64 64;185 64 64;215 64 64;255 64 64;300 64 64;" dur="800ms" repeatCount="indefinite"></animateTransform></path></svg>
					<button 
						class="rounded-xl bg-black text-white p-3 shadow-lg active:translate-y-[2px]"
						@click.throttle="submit"
					>
						Submit
					</button>
				</div>
	
				<div class="relative w-[40%] h-full">
					<div class="absolute -top-[25px]">Роль: <span x-text="role"></span></div>
					<textarea 
						name="response" 
						class="w-full h-full border rounded-xl resize-none p-1 shadow-lg" 
						placeholder="Response" 
						readonly
						x-model="response"
						x-ref="response"
					></textarea>
					<div class="relative -botton-[25px] flex gap-x-3">
						<div>Prompt tokens: <span x-text="promptTokens"></span></div>
						<div>Completion tokens: <span x-text="comletionTokens"></span></div>
						<div>Total tokens: <span x-text="totalTokens"></span></div>
					</div>
				</div>
			</div>
		</div>

		<script>
			document.addEventListener('alpine:init', () => {
				Alpine.data('requests', () => ({
					request: '',
					response: '',
					role: '',
					promptTokens: 0,
					comletionTokens: 0,
					totalTokens: 0,
					loading: false,

					submit() {
						if (this.$refs.request.value.trim() === this.request) return;

						this.request = this.$refs.request.value.trim();
						this.loading = true;

						axios
							.post(route('request'), {request: this.request})
							.then(response => {
								this.role = response.data.choices[0].message.role;
								this.response = response.data.choices[0].message.content;
								this.promptTokens = response.data.usage.prompt_tokens;
								this.comletionTokens = response.data.usage.completion_tokens;
								this.totalTokens = response.data.usage.total_tokens;

								this.loading = false;
							})
							.catch(error => {
								console.log(error);
								this.loading = false;
							})
					},
				}))
			})
		</script>
	</div>
@endsection
