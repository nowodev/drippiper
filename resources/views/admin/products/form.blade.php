<div class="flex flex-col max-w-sm space-y-6">
    <div class="grid grid-cols-1 gap-6 mdgrid-cols-2">
        <div>
            <x-input-label>Name</x-input-label>
            <x-input type="text" name="name" value="{{ old('name', $product->name) }}" />
            <x-input-error field="name" />
        </div>

        <div class="flex gap-x-6">
            <div>
                <x-input-label>Price</x-input-label>
                <x-input type="number" name="price" value="{{ old('price', $product->price) }}" />
                <x-input-error field="price" />
            </div>

            <div>
                <x-input-label>Sales Price</x-input-label>
                <x-input type="number" name="sales_price"
                    value="{{ old('sales_price', $product->sales_price) }}" />
                <x-input-error field="sales_price" />
            </div>
        </div>

        <div>
            <x-input-label>Description</x-input-label>
            <x-textarea type="name" name="description">
                {{ old('description', $product->description) }}
            </x-textarea>
            <x-input-error field="description" />
        </div>
    </div>

    {{-- @foreach ($product->stocks as $stock) --}}
    <div class="grid grid-cols-3 gap-6">
        <div>
            <x-input-label>Size</x-input-label>
            <x-input type="text" name="size" value="{{ old('size', $product->stocks->size ?? '') }}" />
            <x-input-error field="size" />
        </div>
        <div>
            <x-input-label>Colour</x-input-label>
            <x-input type="text" name="colour" value="{{ old('colour', $product->stocks->colour ?? '') }}" />
            <x-input-error field="colour" />
        </div>

        <div>
            <x-input-label>Quantity</x-input-label>
            <x-input type="number" name="quantity"
                value="{{ old('quantity', $product->stocks->quantity ?? '') }}" />
            <x-input-error field="quantity" />
        </div>
    </div>
    {{-- @endforeach --}}

    <div class="flex justify-end">
        <x-primary-button type="submit">{{ $buttonName }}</x-primary-button>
    </div>
</div>