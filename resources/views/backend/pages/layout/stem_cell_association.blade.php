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
				            	<a href="#content-2" data-toggle="tab" aria-expanded="true">Sứ mệnh</a>
							</li>
							<li class="">
				            	<a href="#content-3" data-toggle="tab" aria-expanded="true">Cơ cấu tổ chức</a>
							</li>
							<li class="">
				            	<a href="#content-4" data-toggle="tab" aria-expanded="true">Hội viên</a>
							</li>
							<li class="">
				            	<a href="#content-5" data-toggle="tab" aria-expanded="true">Ban chấp hành</a>
							</li>
							<li class="">
				            	<a href="#content-6" data-toggle="tab" aria-expanded="true">Mạng lưới</a>
							</li>
							<li class="">
				            	<a href="#content-7" data-toggle="tab" aria-expanded="true">Nhóm giải pháp TBG</a>
							</li>
							<li class="">
				            	<a href="#content-8" data-toggle="tab" aria-expanded="true">Điều lệ hội</a>
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
										<label for="">Nội dung</label>
										<textarea class="content" name="content[content1][content]">{!! @$content->content1->content !!}</textarea>
									</div>
								</div>
							</div>
						</div>	

						<div class="tab-pane" id="content-2">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label for="">Tiêu đề</label>
										<input type="text" name="content[content2][title]" class="form-control" value="{{ @$content->content2->title }}">
									</div>
								</div>
								<div class="col-sm-10">
									<div class="form-group">
										<label for="">Nội dung</label>
										<textarea name="content[content2][content]" class="content">{!! @$content->content2->content !!}</textarea>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										<label for="">Hình ảnh</label>
										<div class="image">
											<div class="image__thumbnail">
												<img src="{{ @$content->content2->image ?  @$content->content2->image : __IMAGE_DEFAULT__ }}"  
												data-init="{{ __IMAGE_DEFAULT__ }}">
												<a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
												 <i class="fa fa-times"></i></a>
												<input type="hidden" value="{{ @$content->content2->image }}" name="content[content2][image]"  />
												<div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane" id="content-3">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label for="">Tiêu đề</label>
										<input type="text" name="content[content3][title]" class="form-control" value="{{ @$content->content3->title }}">
									</div>
								</div>
								<div class="col-sm-10">
									<div class="form-group">
										<label for="">Nội dung</label>
										<textarea name="content[content3][content]" class="content">{!! @$content->content3->content !!}</textarea>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										<label for="">Hình ảnh</label>
										<div class="image">
											<div class="image__thumbnail">
												<img src="{{ @$content->content3->image ?  @$content->content3->image : __IMAGE_DEFAULT__ }}"  
												data-init="{{ __IMAGE_DEFAULT__ }}">
												<a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
												 <i class="fa fa-times"></i></a>
												<input type="hidden" value="{{ @$content->content3->image }}" name="content[content3][image]"  />
												<div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

			            <div class="tab-pane" id="content-4">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label for="">Tiêu đề</label>
										<input type="text" name="content[content4][title]" class="form-control" value="{{ @$content->content4->title }}">
									</div>
								</div>
								<div class="col-sm-10">
									<div class="form-group">
										<label for="">Nội dung</label>
										<textarea name="content[content4][content]" class="content">{!! @$content->content4->content !!}</textarea>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										<label for="">Hình ảnh</label>
										<div class="image">
											<div class="image__thumbnail">
												<img src="{{ @$content->content4->image ?  @$content->content4->image : __IMAGE_DEFAULT__ }}"  
												data-init="{{ __IMAGE_DEFAULT__ }}">
												<a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
												 <i class="fa fa-times"></i></a>
												<input type="hidden" value="{{ @$content->content4->image }}" name="content[content4][image]"  />
												<div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane" id="content-5">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label for="">Tiêu đề</label>
										<input type="text" name="content[content5][title]" class="form-control" value="{{ @$content->content5->title }}">
									</div>
								</div>
								<div class="col-sm-12">
									<div class="repeater" id="repeater">
										<table class="table table-bordered table-hover customer">
											<thead>
												<tr>
													<th style="width: 30px;">STT</th>
													<th style="width: 200px">Ảnh đại diện</th>
													<th>Nội dung</th>
													<th></th>
												</tr>
											</thead>
											<tbody id="sortable">
												@if (!empty($content->customer))
													@foreach ($content->customer as $key => $value)
														<?php $index = $loop->index + 1; ?>
														@include('backend.repeater.row-customer')
													@endforeach
												@endif
											</tbody>
										</table>
										<div class="text-right">
											<button class="btn btn-primary" 
												onclick="repeater(event,this,'{{ route('get.layout') }}','.index', 'customer', '.customer')">Thêm
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane" id="content-6">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label for="">Tiêu đề</label>
										<input type="text" name="content[content6][title]" class="form-control" value="{{ @$content->content6->title }}">
									</div>
								</div>
								<div class="col-sm-10">
									<div class="form-group">
										<label for="">Nội dung</label>
										<textarea name="content[content6][content]" class="content">{!! @$content->content6->content !!}</textarea>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										<label for="">Hình ảnh</label>
										<div class="image">
											<div class="image__thumbnail">
												<img src="{{ @$content->content6->image ?  @$content->content6->image : __IMAGE_DEFAULT__ }}"  
												data-init="{{ __IMAGE_DEFAULT__ }}">
												<a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
												 <i class="fa fa-times"></i></a>
												<input type="hidden" value="{{ @$content->content6->image }}" name="content[content6][image]"  />
												<div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane" id="content-7">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label for="">Tiêu đề</label>
										<input type="text" name="content[content7][title]" class="form-control" value="{{ @$content->content7->title }}">
									</div>
								</div>
								<div class="col-sm-10">
									<div class="form-group">
										<label for="">Nội dung</label>
										<textarea name="content[content7][content]" class="content">{!! @$content->content7->content !!}</textarea>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										<label for="">Hình ảnh</label>
										<div class="image">
											<div class="image__thumbnail">
												<img src="{{ @$content->content7->image ?  @$content->content7->image : __IMAGE_DEFAULT__ }}"  
												data-init="{{ __IMAGE_DEFAULT__ }}">
												<a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
												 <i class="fa fa-times"></i></a>
												<input type="hidden" value="{{ @$content->content7->image }}" name="content[content7][image]"  />
												<div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane" id="content-8">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label for="">Tiêu đề</label>
										<input type="text" name="content[content8][title]" class="form-control" value="{{ @$content->content8->title }}">
									</div>
								</div>
								<div class="col-sm-10">
									<div class="form-group">
										<label for="">Nội dung</label>
										<textarea name="content[content8][content]" class="content">{!! @$content->content8->content !!}</textarea>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										<label for="">Hình ảnh</label>
										<div class="image">
											<div class="image__thumbnail">
												<img src="{{ @$content->content8->image ?  @$content->content8->image : __IMAGE_DEFAULT__ }}"  
												data-init="{{ __IMAGE_DEFAULT__ }}">
												<a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
												 <i class="fa fa-times"></i></a>
												<input type="hidden" value="{{ @$content->content8->image }}" name="content[content8][image]"  />
												<div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
											</div>
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