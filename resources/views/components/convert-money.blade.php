@props(['amount', 'text', 'currency'])

<div class="col-sm-4">
    <p>{{ $text }}:
        @if ($amount)
            @convert($amount, $currency)
        @endif
    </p>
</div>
