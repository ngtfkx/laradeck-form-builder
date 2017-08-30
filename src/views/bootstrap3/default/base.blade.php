<div class="form-group">
    <label for="{{ $id }}">{{ $label }}</label>
    {!! $tag  !!}
    @if(!is_null($help) && !empty($help))
        <p class="help-block">{{ $help }}</p>
    @endif
</div>