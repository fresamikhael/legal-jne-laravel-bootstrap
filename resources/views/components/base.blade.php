<div id="base" class="base section">
    @if ($alert)
        <div class="container" style="margin-bottom: 20px;">
            {{ $alert }}
        </div>
    @endif
    <div class="container">
        {{ $slot }}
    </div>
</div>