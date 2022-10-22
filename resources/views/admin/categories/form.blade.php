<div class="flex flex-col max-w-sm space-y-6">
    <div class="grid grid-cols-1 gap-6 mdgrid-cols-2">
        <div>
            <x-input-label>Name</x-input-label>
            <x-input type="text" name="name" value="{{ old('name', $category->name ?? '') }}" />
            <x-input-error for="name" />
        </div>
    </div>

    <div class="flex justify-end">
        <x-primary-button type="submit">{{ $buttonName }}</x-primary-button>
    </div>
</div>