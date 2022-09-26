@props(['for', 'customMessage'])

@error($for)
<span {{ $attributes->merge(['class' => 'text-xs tracking-tight text-red-500']) }}">
    <em>{{ $customMessage ?? $message }}</em>
</span>
@enderror