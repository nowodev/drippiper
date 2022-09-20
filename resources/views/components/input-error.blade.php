@props(['field'])

@error($field)
<span class="text-red-500 text-sm">
    <em>{{ $message }}</em>
</span>
@enderror