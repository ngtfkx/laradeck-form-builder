<div class="form-group{{ $errors->has($fieldName) ? ' has-error' : '' }}">
    <label for="{{ $id }}" class="col-sm-2 control-label">{{ $label }}</label>
    <div class="col-sm-10">
        {!! $tag  !!}
        @if ($errors->has($fieldName))
            <span class="help-block">
                <strong>{{ $errors->first($fieldName) }}</strong>
            </span>
        @endif
        @if(!is_null($help) && !empty($help))
            <p class="help-block">{{ $help }}</p>
        @endif
    </div>
</div>
