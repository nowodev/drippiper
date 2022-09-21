@props(['field'])

@error($field)
<span class="text-xs tracking-tight text-red-500">
    <em>{{ $message }}</em>
</span>
@enderror