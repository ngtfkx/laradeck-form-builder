<div class="form-group{{ $errors->has($fieldName) ? ' has-error' : '' }}">
    <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
            <label>
                {!! $tag  !!} {{ $label }}
            </label>
        </div>
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