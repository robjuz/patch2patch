<input id="patchwork-content" type="hidden" name="content" value=""/>
<input id="patchwork-fabrics" type="hidden" name="fabrics" />
<div class="form-group">
    <label for="title">@lang('translations.title')</label>
    <input type="text" name="title" value="{{ $patchwork->title or '' }}"/>
</div>
<div class="form-group">
    <label for="description">@lang('translations.description')</label>
    <textarea name="description" value="{{ $patchwork->description or '' }} "></textarea>
</div>
<button type="submit"> @lang('translations.save') </button>
