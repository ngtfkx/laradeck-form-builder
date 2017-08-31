<div class="form-group">
    <div class="checkbox">
        <label>
            {!! $tag  !!} {{ $label }}
        </label>
    </div>
    @if(!is_null($help) && !empty($help))
        <p class="help-block">{{ $help }}</p>
    @endif
</div>