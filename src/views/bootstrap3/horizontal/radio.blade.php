<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <div class="radio">
            <label>
                {!! $tag  !!} {{ $label }}
            </label>
        </div>
        @if(!is_null($help) && !empty($help))
            <p class="help-block">{{ $help }}</p>
        @endif
    </div>
</div>