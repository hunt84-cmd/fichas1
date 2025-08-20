<div>
    @isset($jsPath)
        <script>{!! file_get_contents($jsPath) !!}</script>
    @endisset
    @isset($cssPath)
        <style>{!! file_get_contents($cssPath) !!}</style>

    @endisset
{{--        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>--}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">


        <style>

            /* ---------- Modal backdrop ---------- */
            .modal {
                position: fixed;
                top: 0;
                left: 0;
                z-index: 1055;
                display: block;
                width: 100%;
                height: 100%;
                overflow-x: hidden;
                overflow-y: auto;
                outline: 0;
                background-color: rgba(0, 0, 0, .5);
                transition: opacity .15s linear;
            }




        </style>

        <div
            x-data="LivewireUIModal()"
            x-on:close.stop="setShowPropertyTo(false)"
            x-on:keydown.escape.window="show && closeModalOnEscape()"
            x-show="show"
            class="modal fade show"
            style="display: none;"
        >
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">

                <div class="modal-header">
                    <h5 class="modal-title"
                        x-data="{ title: '' }"
                        @set-title.window="title = $event.detail"
                    >
                            <label x-text="title"></label>
                    </h5>
                    <div
                        x-show="show"
                        x-on:click="closeModalOnClickAway()"
                        x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="btn-close" data-bs-dismiss="modal" aria-label="Close"></div>
                </div>


{{--                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>--}}

                <div
                    x-show="show && showActiveComponent"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-bind:class="modalWidth"
                    class="modal-body"
                    id="modal-container"
                    x-trap.noscroll.inert="show && showActiveComponent"
                    aria-modal="true"
                >
                    @forelse($components as $id => $component)
                        <div x-show.immediate="activeComponent == '{{ $id }}'" x-ref="{{ $id }}" wire:key="{{ $id }}">
                            @livewire($component['name'], $component['arguments'], key($id))
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
            </div>
        </div>
</div>

