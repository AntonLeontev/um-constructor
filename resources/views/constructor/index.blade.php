@extends('layouts.app')

@section('title', $site->title)

@section('content')
    @include('partials.gptRawForm')

    <div class="flex h-[calc(100vh-67px)] overflow-hidden" x-data="siteConstructor" @add-block="blocks">

        {{-- sidebar --}}
        @include('constructor.partials.blocks-list')

        <div class="flex basis-full">
            <div class="flex basis-2/5 flex-col items-center border-x p-1">

                @include('constructor.partials.preview')


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
                                        alert('Error');
                                        console.log(error);
                                    })

                            },
                        }))
                    })
                </script>

            </div>

            <div class="h-full basis-3/5 overflow-auto border-x px-2">

                @include('constructor.partials.neural')

            </div>
        </div>

        <div class="w-[80px] border-l"></div>


    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('siteConstructor', () => ({
                siteId: {{ $site->id }},
                selectedBlock: null,
                tab: 'text',


            }))
        })
    </script>
@endsection
