@props([
    'type' => 'text',
    'name',
    'message',
])

<div>
    <label class="form-label" for="{{ $name }}"> {{ $slot }}</label>
    <input name='{{ $name }}' {{ $attributes }}
        class="form-control @error('{{ $name }}') is-invalid @enderror @if (session('valid-{{ $name }}')) is-valid @endif"
        id="{{ $name }}" type={{ $type }}>
</div>