<div {{ $attributes->merge(['class' => 'flex justify-center']) }}>
    <div class="tabs tabs-boxed max-w-fit">
        {{ $slot }}
    </div>
</div>
