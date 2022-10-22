@props([
'name' => 'Select',
'options' => []
])

<select {{ $attributes->merge(['class' => 'mt-1 bg-gray-50 border border-gray-300 text-gray-900
    text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5']) }}>
    <option selected>{{ $name }}</option>

    @foreach ($options as $option)
    <option value="{{ $option->id }}">
        {{ $option->name }}
    </option>
    @endforeach
</select>