<div class="form-group{{ !empty($fieldName) && $errors->has($fieldName) ? ' has-error' : '' }}">
    <div class="radio">
        <label>
            {!! $tag  !!} {{ $label }}
        </label>
    </div>
    @if (!empty($fieldName) && $errors->has($fieldName))
        <span class="help-block">
            <strong>{{ $errors->first($fieldName) }}</strong>
        </span>
    @endif
    @if(!is_null($help) && !empty($help))
        <p class="help-block">{{ $help }}</p>
    @endif
</div>