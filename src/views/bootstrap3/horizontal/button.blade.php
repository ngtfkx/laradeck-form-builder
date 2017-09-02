<div class="form-group">
    <label for="{{ $id }}" class="col-sm-2 control-label">{{ $label }}</label>
    <div class="col-sm-10">
        <button class="{{ $class }}" style="{{ $style }}"{{$attributes}}>{{ $value }}</button>
        @if(!is_null($help) && !empty($help))
            <p class="help-block">{{ $help }}</p>
        @endif
    </div>
</div>