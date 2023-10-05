<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary w-100 br-7']) }}>
    {{ $slot }}
</button>
