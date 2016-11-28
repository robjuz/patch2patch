<input id="patchwork-content" type="hidden" name="content" value=""/>
<input id="patchwork-fabrics" type="hidden" name="fabrics" />
<div class="form-group">
    <label for="title">Nazwa</label>
    <input type="text" name="title" value="<% $patchwork->title %>"/>
</div>
<div class="form-group">
    <label for="description">Opis</label>
    <textarea name="description" value="<% $patchwork->description %>"></textarea>
</div>
<button type="submit" class="save"> Zapisz </button>
