<div class="flex flex-col max-w-sm space-y-6">
    <div class="grid grid-cols-1 gap-6 mdgrid-cols-2">
        <div>
            <x-input-label>Name</x-input-label>
            <x-input type="text" wire:model.defer="product.name" />
            <x-input-error for="product.name" />
        </div>

        <div class="flex gap-x-6">
            <div class="w-1/2">
                <x-input-label>Category</x-input-label>
                <x-select name="Select Category" :options="$categories"
                    wire:model.defer="product.category_id" />
                <x-input-error for="product.category_id" />
            </div>

            <div class="w-1/2">
                <x-input-label>Price</x-input-label>
                <x-input type="number" wire:model.defer="product.price" />
                <x-input-error for="product.price" />
            </div>
        </div>

        <div>
            <x-input-label>Description</x-input-label>
            <x-textarea wire:model.defer="product.description"></x-textarea>
            <x-input-error for="product.description" />
        </div>

        <div wire:poll.visible>
            <x-input-label>Cover Image</x-input-label>
            @if ($product && !is_array($this->product) && $product->cover_image)
            <div class="mt-2 relative">
                <button wire:click="deleteImage({{ $product }})"
                    class="absolute bg-red-500 right-0 p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </button>

                <img src="{{ asset('/storage/'. $product?->cover_image) }}">
            </div>

            @else
            <x-input type="file" wire:model="cover_image" />
            <x-input-error for="cover_image" />

            @endif

            <div class="mt-2">
                @if ($cover_image)
                <p class="mb-2">Cover Image Preview: </p>
                <img src="{{ $cover_image->temporaryUrl() }}">
                @endif
            </div>
        </div>

        <div>
            <x-input-label>Images</x-input-label>
            @if (!$image || count($image)
            < 1) <x-input type="file" wire:model="images" multiple />
            <x-input-error for="images" />

            @else

            @foreach ($image as $img)

            <div wire:poll.visible class="mt-2 relative">
                <button wire:click="deleteImage({{ $img }}, 'images')"
                    class="absolute bg-red-500 right-0 p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </button>

                <img src="{{ asset('/storage/'. $img->name) }}">
            </div>
            @endforeach

            @endif

            <div class="mt-2">
                @if ($images)
                <p class="mb-2">Images Preview: </p>
                @foreach ($images as $image)
                <img src="{{ $image->temporaryUrl() }}">
                @endforeach
                @endif
            </div>
        </div>
    </div>

    @foreach ($stocks as $key => $stock)
    <div class="grid grid-cols-3 gap-6" wire:key="stock-{{ $key }}">
        <div>
            <x-input-label>Size</x-input-label>
            <x-input type="text" wire:model.defer="stocks.{{ $key }}.size" />
            <x-input-error for="stocks.{{ $key }}.size" />
        </div>
        <div>
            <x-input-label>Colour</x-input-label>
            <x-color-picker wire:model="stocks.{{ $key }}.colour" />
            <x-input-error for="stocks.{{ $key }}.colour" />
        </div>

        <div>
            <x-input-label>Quantity</x-input-label>
            <x-input type="number" wire:model.defer="stocks.{{ $key }}.quantity" />
            <x-input-error for="stocks.{{ $key }}.quantity" />
        </div>
    </div>

    <div class="flex justify-end gap-x-3">
        @if ($loop->index === 0)
        <x-primary-button wire:click="add">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                class="w-5 h-5">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z"
                    clip-rule="evenodd" />
            </svg>
        </x-primary-button>

        @else

        <x-primary-button wire:click.prevent="remove({{ $key }}, {{ $stock->id ?? '' }})">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                class="w-5 h-5">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM6.75 9.25a.75.75 0 000 1.5h6.5a.75.75 0 000-1.5h-6.5z"
                    clip-rule="evenodd" />
            </svg>
        </x-primary-button>

        <x-primary-button wire:click="add">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                class="w-5 h-5">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z"
                    clip-rule="evenodd" />
            </svg>
        </x-primary-button>
        @endif
    </div>
    @endforeach

    <div class="flex justify-end">
        <x-primary-button type="submit" wire:click.prevent="store">
            {{ $buttonName }}
        </x-primary-button>
    </div>
</div>