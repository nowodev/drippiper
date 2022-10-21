<div x-data="{ colour: @entangle($attributes->wire('model')) }" x-init="
        picker = new Picker($refs.button);
        picker.onDone = rawColor => {
            colour = rawColor.hex;
            $dispatch('input', colour)
        }
    " wire:ignore {{ $attributes }}>

    <button x-ref="button" class="w-full h-full">
        <span class="block mt-1 text-left w-full rounded-md form-input focus:border-indigo-600"
            x-text="colour" :style="`background: ${colour}`">
        </span>
    </button>
</div>