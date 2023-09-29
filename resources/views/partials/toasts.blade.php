<div class="toast toast-end" x-data="toasts" @toast.window="add">
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
			remove(id) {
				let toast = this.toasts.find(el => el.id === id);
				let index = this.toasts.indexOf(toast);
				this.toasts.splice(index, 1);
			},
			add() {
				this.toasts.push({
					id: this.toasts.length + 1,
					message: this.$event.detail.message,
					type: this.$event.detail.type,
				})
			},

		}))
	})
</script>
