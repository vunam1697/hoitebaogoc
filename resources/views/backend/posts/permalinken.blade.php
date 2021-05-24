<label class="control-label required" for="current-slug" aria-required="true">Đường dẫn:</label>
<span id="sample-permalink-en">
	<a class="permalink" target="_blank" href="{{ route('home.news-single_en', $data->slug_en) }}">
    	<span class="default-slug-en">
    		{{ asset('en') }}/<span id="editable-post-name-en">{{ $data->slug_en }}</span>
    	</span>
	</a>
</span>
<span id="edit-slug-buttons">
    <button type="button" class="btn btn-secondary" id="change_slug_en">Sửa</button>
    <button type="button" class="save btn btn-secondary" id="btn-ok-en" style="display: none;">Ok</button>
    <button type="button" class="cancel button-link-en">Hủy</button>
</span>
<input type="hidden" id="current-slug-en"  value="{{ $data->slug_en }}">
<input type="hidden" id="baseUrlEn" value="{{ asset('en') }}">
<input type="hidden" id="idPost" value="{{ $data->id }}">


