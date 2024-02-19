<div class="card border-0 --gray-background">
    @if (isset($header))
        <div class="card-header --gray-background text-white fs-3 fw-semibold border-0">
            {{ $header }}

            @if (isset($headerActions))
                <div class="card-header-actions">
                    {{ $headerActions }}
                </div><!--card-header-actions-->
            @endif
        </div><!--card-header-->
    @endif

    @if (isset($body))
        <div class="card-body">
            {{ $body }}
        </div><!--card-body-->
    @endif

    @if (isset($footer))
        <div class="card-footer --gray-background border-0">
            {{ $footer }}
        </div><!--card-footer-->
    @endif
</div><!--card-->
