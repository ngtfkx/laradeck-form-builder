<div class="form-group">
    <div class="radio">
        <label>
            {!! $tag  !!} {{ $label }}
        </label>
    </div>
    @if(!is_null($help) && !empty($help))
        <p class="help-block">{{ $help }}</p>
    @endif
</div>