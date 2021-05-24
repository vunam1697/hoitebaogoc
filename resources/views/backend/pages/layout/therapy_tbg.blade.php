@extends('backend.layouts.app')
@section('controller','Trang')
@section('controller_route',route('pages.list'))
@section('action','Danh sách')
@section('content')
	<div class="content">
		<div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
               	@include('flash::message')
               	<form action="{{ route('pages.build.post') }}" method="POST">
					{{ csrf_field() }}
					<input name="type" value="{{ $data->type }}" type="hidden">
					<input name="lang" value="{{ $data->lang }}" type="hidden">

	               	<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="">Trang</label>
								<input type="text" class="form-control" value="{{ $data->name_page }}" disabled="">
				 				
								@if (\Route::has($data->route))
									<h5>
										<a href="{{ route($data->route) }}" target="_blank">
					                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>
					                        Link: {{ route($data->route) }}
					                    </a>
									</h5>
				                @endif
							</div>
							
						</div>
					</div>
					<div class="nav-tabs-custom">
				        <ul class="nav nav-tabs">
				            <li class="active">
				            	<a href="#content-1" data-toggle="tab" aria-expanded="true">Nội dung</a>
							</li>
							<li class="">
				            	<a href="#seo" data-toggle="tab" aria-expanded="true">Cấu hình trang</a>
				            </li>
				        </ul>
					</div>
					<?php if(!empty($data->content)){
						$content = json_decode($data->content);
					} ?>
				    <div class="tab-content">
						<div class="tab-pane active" id="content-1">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label for="">Tiêu đề</label>
										<input type="text" name="content[title]" class="form-control" value="{{ @$content->title }}">
									</div>
                                    <div class="form-group">
										<label for="">Nội dung</label>
										<textarea name="content[content]" class="content">{!! @$content->content !!}</textarea>
									</div>
								</div>
                                <div class="col-sm-10">
									<div class="form-group">
										<label for="">Tiêu đề 1</label>
										<input type="text" name="content[title1]" class="form-control" value="{{ @$content->title1 }}">
									</div>
                                    <div class="form-group">
                                        <label for="">Nội dung 1</label>
                                        <textarea name="content[content1]" class="content">{!! @$content->content1 !!}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label for="">Hình ảnh 1</label>
                                    <div class="image">
                                        <div class="image__thumbnail">
                                            <img src="{{ @$content->image1 ?  $content->image1 : __IMAGE_DEFAULT__ }}"  
                                            data-init="{{ __IMAGE_DEFAULT__ }}">
                                            <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
                                             <i class="fa fa-times"></i></a>
                                            <input type="hidden" value="{{ @$content->image1 }}" name="content[image1]"  />
                                            <div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-10">
									<div class="form-group">
										<label for="">Tiêu đề 2</label>
										<input type="text" name="content[title2]" class="form-control" value="{{ @$content->title2 }}">
									</div>
                                    <div class="form-group">
                                        <label for="">Nội dung 2</label>
                                        <textarea name="content[content2]" class="content">{!! @$content->content2 !!}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label for="">Hình ảnh 2</label>
                                    <div class="image">
                                        <div class="image__thumbnail">
                                            <img src="{{ @$content->image2 ?  $content->image2 : __IMAGE_DEFAULT__ }}"  
                                            data-init="{{ __IMAGE_DEFAULT__ }}">
                                            <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
                                             <i class="fa fa-times"></i></a>
                                            <input type="hidden" value="{{ @$content->image2 }}" name="content[image2]"  />
                                            <div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
                                        </div>
                                    </div>
                                </div>
							</div>
						</div>

						<div class="tab-pane" id="seo">
							<div class="row">
								<div class="col-sm-2">
									<div class="form-group">
			                           <label>Hình ảnh</label>
			                           <div class="image">
			                               <div class="image__thumbnail">
			                                   <img src="{{ $data->image ?  $data->image : __IMAGE_DEFAULT__ }}"  
			                                   data-init="{{ __IMAGE_DEFAULT__ }}">
			                                   <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
			                                    <i class="fa fa-times"></i></a>
			                                   <input type="hidden" value="{{ @$data->image }}" name="image"  />
			                                   <div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
			                               </div>
			                           </div>
			                       </div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
			                           <label>Banner</label>
			                           <div class="image">
			                               <div class="image__thumbnail">
			                                   <img src="{{ $data->banner ?  $data->banner : __IMAGE_DEFAULT__ }}"  
			                                   data-init="{{ __IMAGE_DEFAULT__ }}">
			                                   <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
			                                    <i class="fa fa-times"></i></a>
			                                   <input type="hidden" value="{{ @$data->banner }}" name="banner"  />
			                                   <div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
			                               </div>
			                           </div>
			                       </div>
								</div>
								<div class="col-sm-8">
									<div class="form-group">
										<label for="">Tiêu đề trang</label>
										<input type="text" name="meta_title" class="form-control" value="{{ @$data->meta_title }}">
									</div>
									<div class="form-group">
										<label for="">Mô tả trang</label>
										<textarea name="meta_description" 
										class="form-control" rows="5">{!! @$data->meta_description !!}</textarea>
									</div>
									<div class="form-group">
										<label for="">Từ khóa</label>
										<input type="text" name="meta_keyword" class="form-control" value="{!! @$data->meta_keyword !!}">
									</div>
								</div>
							</div>
			            </div>
			           <button type="submit" class="btn btn-primary">Lưu lại</button>
			        </div>
				</form>
			</div>
		</div>
	</div>
@stop