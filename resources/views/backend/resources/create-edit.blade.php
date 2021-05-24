@extends('backend.layouts.app')
@section('controller', $module['name'] )
@section('controller_route', route($module['module'].'.index'))
@section('action', renderAction(@$module['action']))
@section('content')
	<div class="content">
		<div class="clearfix"></div>
       	@include('flash::message')
       	<form action="{!! updateOrStoreRouteRender( @$module['action'], $module['module'], @$data) !!}" method="POST">
			@csrf
			@if(isUpdate(@$module['action']))
		        {{ method_field('put') }}
		    @endif
			<div class="row">
				<div class="col-sm-9">
					<div class="nav-tabs-custom">
		                <ul class="nav nav-tabs">
							<li class="active">
		                        <a href="#info" data-toggle="tab" aria-expanded="true">Thông tin tiếng việt</a>
							</li>
							<li class="">
		                        <a href="#info_en" data-toggle="tab" aria-expanded="true">Thông tin tiếng anh</a>
							</li>
							<li class="">
		                    	<a href="#setting" data-toggle="tab" aria-expanded="true">Cấu hình seo</a>
		                    </li>
		                </ul>
		                <div class="tab-content">

							<div class="tab-pane active" id="info">
								<div class="row">
			                        <div class="col-sm-12">
			                            <div class="form-group">
											<label for="">Tiêu đề</label>
											<input type="text" name="name" class="form-control" value="{{ @$data->name }}">
										</div>
										@if(isUpdate(@$module['action']))
										<div class="form-group" id="edit-slug-box">
		                                    @include('backend.resources.permalink')
		                                </div>
										@endif
										<div class="form-group">
											<label for="">Mô tả</label>
											<textarea name="desc" class="form-control" rows="5">{!! @$data->desc !!}</textarea>
										</div>
										<div class="form-group">
											<label for="">Nội dung</label>
											<textarea name="content" class="content">{!! @$data->content !!}</textarea>
										</div>
									</div>
			                    </div>
							</div>

							<div class="tab-pane" id="info_en">
								<div class="row">
									<div class="col-sm-12">
			                            <div class="form-group">
											<label for="">Tiêu đề</label>
											<input type="text" name="name_en" class="form-control" value="{{ @$data->name_en }}">
										</div>
										@if(isUpdate(@$module['action']))
										<div class="form-group" id="edit-slug-box">
		                                    @include('backend.resources.permalinken')
		                                </div>
										@endif
										<div class="form-group">
											<label for="">Mô tả</label>
											<textarea name="desc_en" class="form-control" rows="5">{!! @$data->desc_en !!}</textarea>
										</div>
										<div class="form-group">
											<label for="">Nội dung</label>
											<textarea name="content_en" class="content" >{!! @$data->content_en !!}</textarea>
										</div>
			                        </div>
			                    </div>
							</div>

							<div class="tab-pane" id="setting">
								<div class="form-group">
			                        <label>Title SEO</label>
			                        <label style="float: right;">Số ký tự đã dùng: <span id="countTitle">{{ @$data->meta_title != null ? mb_strlen( $data->meta_title, 'UTF-8') : 0 }}/70</span></label>
			                        <input type="text" class="form-control" name="meta_title" value="{!! old('meta_title', isset($data->meta_title) ? $data->meta_title : null) !!}" id="meta_title">
			                    </div>

			                    <div class="form-group">
			                        <label>Meta Description</label>
			                        <label style="float: right;">Số ký tự đã dùng: <span id="countMeta">{{ @$data->meta_description != null ? mb_strlen( $data->meta_description, 'UTF-8') : 0 }}/360</span></label>
			                        <textarea name="meta_description" class="form-control" id="meta_description" rows="3">{!! old('meta_description', isset($data->meta_description) ? $data->meta_description : null) !!}</textarea>
			                    </div>

			                    <div class="form-group">
			                        <label>Meta Keyword</label>
			                        <input type="text" class="form-control" name="meta_keyword" value="{!! old('meta_keyword', isset($data->meta_keyword) ? $data->meta_keyword : null) !!}">
			                    </div>
								@if(isUpdate(@$module['action']))
								<h4 class="ui-heading">Xem trước kết quả tìm kiếm</h4>
								<div class="google-preview">
									<span class="google__title"><span>{!! !empty($data->meta_title) ? $data->meta_title : @$data->name !!}</span></span>
									<div class="google__url">
										{{ asset( 'vi/tai-nguyen/'.@$data->slug ) }}
									</div>
									<div class="google__description">{!! old('meta_description', isset($data->meta_description) ? @$data->meta_description : '') !!}</div>
								</div>
								@endif
							</div>
						</div>
		            </div>
				</div>
				<div class="col-sm-3">
					<div class="box box-success">
		                <div class="box-header with-border">
		                    <h3 class="box-title">Đăng</h3>
		                </div>
		                <div class="box-body">
		                    <div class="form-group">
		                        <label class="custom-checkbox">
		                            <input type="checkbox" name="status" value="1" checked=""> Hiển thị
		                        </label>
		                       
		                    </div>
		                    <div class="form-group text-right">
		                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
		                    </div>
		                </div>
		            </div>
					<div class="box box-success">
		                <div class="box-header with-border">
		                    <h3 class="box-title">Ảnh đại diện</h3>
		                </div>
		                <div class="box-body">
		                    <div class="form-group" style="text-align: center;">
		                        <div class="image">
		                            <div class="image__thumbnail">
		                                <img src="{{ !empty($data->image) ? $data->image : __IMAGE_DEFAULT__ }}"
		                                     data-init="{{ __IMAGE_DEFAULT__ }}">
		                                <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
		                                    <i class="fa fa-times"></i></a>
		                                <input type="hidden" value="{{ old('image', @$data->image) }}" name="image"/>
		                                <div class="image__button" onclick="fileSelect(this)">
		                                	<i class="fa fa-upload"></i>
		                                    Upload
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
				</div>
			</div>
		</form>
	</div>
@stop
@section('scripts')
	<script>
		jQuery(document).ready(function($) {
			$('#btn-ok').click(function(event) {
		        var slug_new = $('#new-post-slug').val();
		        var name = $('#name').val();
		        $.ajax({
		        	url: '{{ route('resources.get-slug') }}',
		        	type: 'GET',
		        	data: {
		        		id: $('#idPost').val(),
		        		slug : slug_new.length > 0 ? slug_new : name,
		        	},
		        })
		        .done(function(data) {
		        	$('#change_slug').show();
			        $('#btn-ok').hide();
			        $('.cancel.button-link').hide();
			        $('#current-slug').val(data);
		        	cancelInput(data);
		        })
		    });
			$('#btn-ok-en').click(function(event) {
		        var slug_new_en = $('#new-post-slug-en').val();
		        var name_en = $('#name_en').val();
		        $.ajax({
		        	url: '{{ route('resources.get-slug') }}',
		        	type: 'GET',
		        	data: {
		        		id: $('#idPost').val(),
		        		slug_en : slug_new_en.length > 0 ? slug_new_en : name_en,
		        	},
		        })
		        .done(function(data) {
		        	$('#change_slug_en').show();
			        $('#btn-ok-en').hide();
			        $('.cancel.button-link-en').hide();
			        $('#current-slug-en').val(data);
		        	cancelInputEn(data);
		        })
		    });
		});	
	</script>
@endsection
