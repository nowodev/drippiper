<div x-data="{ color: '#000000' }" x-init="
        picker = new Picker($refs.button);
        picker.onDone = rawColor => {
            color = rawColor.hex;
            $dispatch('input', color)
        }
    " wire:ignore {{ $attributes }}>

    <button x-ref="button" class="w-full">
        <span class="block mt-1 text-left w-full rounded-md form-input focus:border-indigo-600"
            x-text="color" :style="`background: ${color}`">
        </span>
    </button>
</div>