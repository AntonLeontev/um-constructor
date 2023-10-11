<div x-data="rawForm">
    <div class="fixed z-10 right-3 top-20">
        <button class="btn btn-circle btn-primary" @click="active = true">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
            </svg>
        </button>
    </div>

    <form
        class="bg-base-100 fixed right-0 top-0 z-20 h-screen w-1/2 min-w-[300px] translate-x-full border-l-2 p-3 shadow-lg transition"
        :class="active && '!translate-x-0'" @submit.prevent="submit">
        <div class="flex justify-between w-full mb-3">
            <select id="" name="model" class="select select-primary">
                <option value="gpt-3.5-turbo">GPT-3.5</option>
                <option value="gpt-4" disabled>GPT-4</option>
            </select>
            <button class="btn btn-circle btn-outline" type="button" @click="active = false">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="flex flex-col h-full w-fill gap-y-5">
            <textarea class="w-full resize-none textarea textarea-primary basis-5/12" name="request" required placeholder="Запрос"></textarea>
            <div class="flex justify-center">
                <div class="relative flex items-center">
                    <input class="btn btn-accent" type="submit" value="Отправить">
                    <span class="absolute loading loading-ball loading-md text-primary -right-8"
                        x-show="loading"></span>
                </div>
            </div>
            <textarea class="w-full resize-none textarea textarea-primary basis-5/12" placeholder="Ответ" readonly
                x-text="response"></textarea>
        </div>
    </form>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('rawForm', () => ({
            active: false,
            loading: false,
            response: '',

            submit() {
                let data = new FormData(this.$event.target);

                this.loading = true;

                axios
                    .post(route('request'), data)
                    .then(response => {
                        this.response = response.data.choices[0].message.content;
                        console.log(response.data);

                        this.loading = false;
                    })
                    .catch(error => {
                        alert('Ошибка!')
                        console.log(error);
                        this.loading = false;
                    })
            }
        }))
    })
</script>
