<div class="flex flex-col max-w-sm space-y-6">
    <div class="grid grid-cols-1 gap-6 mdgrid-cols-2">
        <div>
            <x-input-label>Name</x-input-label>
            <x-input type="text" wire:model="product.name" />
            <x-input-error for="product.name" />
        </div>

        <div class="flex gap-x-6">
            <div>
                <x-input-label>Price</x-input-label>
                <x-input type="number" wire:model="product.price" />
                <x-input-error for="product.price" />
            </div>

            <div>
                <x-input-label>Sales Price</x-input-label>
                <x-input type="number" wire:model="product.sales_price" />
                <x-input-error for="product.sales_price" />
            </div>
        </div>

        <div>
            <x-input-label>Description</x-input-label>
            <x-textarea type="name" wire:model="product.description"></x-textarea>
            <x-input-error for="product.description" />
        </div>
    </div>

    @foreach ($stocks as $key => $stock)
    <div class="grid grid-cols-3 gap-6" wire:key="stock-{{ $key }}">
        <div>
            <x-input-label>Size</x-input-label>
            <x-input type="text" wire:model="stocks.{{ $key }}.size" />
            <x-input-error for="stocks.{{ $key }}.size" />
        </div>
        <div>
            <x-input-label>Colour</x-input-label>
            <x-input type="text" wire:model="stocks.{{ $key }}.colour" />
            <x-input-error for="stocks.{{ $key }}.colour" />
        </div>

        <div>
            <x-input-label>Quantity</x-input-label>
            <x-input type="number" wire:model="stocks.{{ $key }}.quantity" />
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

        <x-primary-button wire:click="add">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                class="w-5 h-5">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z"
                    clip-rule="evenodd" />
            </svg>
        </x-primary-button>

        <x-primary-button wire:click.prevent="remove({{ $key }})">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                class="w-5 h-5">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM6.75 9.25a.75.75 0 000 1.5h6.5a.75.75 0 000-1.5h-6.5z"
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