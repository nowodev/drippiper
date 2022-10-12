<!-- component -->
<div class="antialiased sans-serif bg-gray-200">
    <style>
        [x-cloak] {
            display: none;
        }
    </style>

    <div x-data="app()" x-init="[initColor()]" x-cloak wire:ignore>
        <div class="max-w-sm mx-auto">
            <div class="flex items-center">
                <div class="relative w-full">
                    <div class="relative">
                        <x-input x-model="colorSelected" {{ $attributes }} />

                        <button type="button" @click="isOpen = !isOpen"
                            class="absolute top-0 right-0 w-1/4 h-full rounded-r focus:outline-none focus:shadow-outline inline-flex p-2 shadow"
                            :style="`background: ${colorSelected}; color: white`">
                        </button>
                    </div>

                    <div x-show="isOpen" @click.away="isOpen = false"
                        x-transition:enter="transition ease-out duration-100 transform"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75 transform"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="origin-top-right absolute right-0 mt-2 w-40 z-30 rounded-md shadow-lg">
                        <div class="rounded-md bg-white shadow-xs px-4 py-3">
                            <div class="flex flex-wrap -mx-2">
                                <template x-for="(color, index) in colors" :key="index">
                                    <div class="px-2">
                                        <template x-if="colorSelected === color">
                                            <div class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white"
                                                :style="`background: ${color}; box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.2);`">
                                            </div>
                                        </template>

                                        <template x-if="colorSelected != color">
                                            <div @click="setColor(color)"
                                                @keydown.enter="colorSelected = color"
                                                role="checkbox" tabindex="0"
                                                :aria-checked="colorSelected" class="w-8 h-8 inline-flex rounded-full
                                                    cursor-pointer border-4 border-white
                                                    focus:outline-none focus:shadow-outline"
                                                :style="`background: ${color};`">
                                            </div>
                                        </template>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function app() {
            return {
                isOpen: false,
                colors: ['#2196F3', '#009688', '#9C27B0', '#FFEB3B', '#afbbc9', '#4CAF50', '#2d3748', '#f56565', '#ed64a6'],
                colorSelected: @entangle($attributes->wire('model')->value()),
                
                initColor () {
                    this.setColor('#2196F3');
                },

                setColor(color) {
                    this.colorSelected = color;
                    this.isOpen = false;
                }
            }
        }
    </script>
</div>