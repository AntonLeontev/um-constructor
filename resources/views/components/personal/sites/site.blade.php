<div class="relative shadow-xl card card-compact bg-base-100 w-96" x-data="{
	id: site.id,
	title: site.title,
	isRenaming: false,
	
	deleteSite(id) {
		const elem = document.activeElement;
		if(elem){
			elem?.blur();
		}
		
		
		axios
			.delete(route('sites.destroy', id))
			.then(response => {
				let site = this.sites.find(el => el.id == id);
				let index = this.sites.indexOf(site);
				this.sites.splice(index, 1);
			})
			.catch(error => {
				this.$dispatch('toast', {type: 'error', message: error.response.data.message})
			})
	},
	renaming() {
		this.isRenaming = true; 
		$nextTick(() => this.$refs.title.focus());
	},
	rename() {
		this.isRenaming = false;
		if (this.title === this.$refs.title.value) return;

		axios
			.put(route('sites.update', this.id), {title: this.$refs.title.value})
			.then(response => {
				this.title = this.$refs.title.value;
			})
			.catch(error => {
				this.$dispatch('toast', {type: 'error', message: error.response.data.message})
			})
	},
}">
    <figure>
        <img class="w-full aspect-video" src="https://place-hold.it/384x216/00d0a0&text=preview" alt="Preview" />
    </figure>
    <div class="card-body">
		<form x-show="isRenaming"  x-ref="renameForm" @click.outside="isRenaming = false" @submit.prevent="rename">
			<input type="text" name="title" class="w-full border-0" :value="title" x-ref="title" @blur="rename">
		</form>
        <a :href="route('personal.site', site.id)" class="truncate" x-show="!isRenaming" x-text="title" :title="title"></a>
    </div>

    <div class="absolute dropdown dropdown-left right-1 top-1">
        <label tabindex="0" class="m-1 btn btn-ghost btn-circle btn-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
            </svg>
        </label>
        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
            <li>
                <button class="flex justify-between" @click="renaming">
                    Rename
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25" />
                    </svg>
                </button>
            </li>
            <li>
                <a :href="route('constructor', site.id)" class="flex justify-between">
                    Edit
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                    </svg>

                </a>
            </li>
            <li>
                <button class="flex justify-between" @click="deleteSite(site.id)">
                    Delete
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </button>
            </li>
        </ul>
    </div>
</div>

