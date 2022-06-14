@props(['disabled' => false, 'data'])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
    @foreach ($data as $key => $value)
        <option value="{{ $value }}">{{ $key }}</option>
    @endforeach
</select>
