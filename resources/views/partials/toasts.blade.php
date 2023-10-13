<div 
	class="toast toast-end" 
	x-data="toasts" 
	@toast.window="add"
	@toast-error.window="addError"
	@toast-success.window="addSuccess"
>
	<template x-for="toast in toasts">
		<div class="transition alert" :class="typeObject(toast.type)" @click="remove(toast.id)">
			<span class="max-w-[400px] whitespace-normal" x-text="toast.message"></span>
		</div>
	</template>
</div>

<script>
	document.addEventListener('alpine:init', () => {
		Alpine.data('toasts', () => ({
			toasts: [],

			typeObject(type) {
				return {
					'alert-info': type === 'info',
					'alert-error': type === 'error',
					'alert-success': type === 'success',
				}
			},
			push(mesage, type, delay = 0) {
				this.toasts.push({
					id: this.toasts.length + 1,
					message: mesage,
					type: type,
				})

				if (delay > 0) {
					setTimeout(() => {
						this.remove(this.toasts.length + 1);
					}, delay);
				}
			},
			remove(id) {
				let toast = this.toasts.find(el => el.id === id);
				let index = this.toasts.indexOf(toast);
				this.toasts.splice(index, 1);
			},
			add() {
				this.push(
					this.$event.detail.message, 
					this.$event.detail.type,
					this.$event.detail.delay
				)
			},
			addError() {
				this.push(
					this.$event.detail, 
					'error',
				)
			},
			addSuccess() {
				this.push(
					this.$event.detail.message, 
					'success',
					this.$event.detail.delay, 
				)
			}

		}))
	})
</script>
