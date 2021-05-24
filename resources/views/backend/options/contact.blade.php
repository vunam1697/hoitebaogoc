@extends('backend.layouts.app')
@section('controller','Liên hệ')
@section('action','Cập nhật')
@section('controller_route', route('backend.options.contact'))
@section('content')
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('flash::message')
                <form action="{{ route('backend.options.contact.post') }}" method="POST">
                    @csrf
                        <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                        <li class="active">
                                <a href="#activity" data-toggle="tab" aria-expanded="true">Nội dung</a>
                            </li>
                            <li class="">
                                <a href="#setting" data-toggle="tab" aria-expanded="true">Cấu hình seo</a>
                            </li>
                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane active" id="activity">
                                <div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label for="">Tiêu đề tiếng việt</label>
											<input type="text" name="content[title]" class="form-control" value="{{ @$content->title }}">
										</div>
										<div class="form-group">
											<label for="">Tiêu đề tiếng anh</label>
											<input type="text" name="content[title_en]" class="form-control" value="{{ @$content->title_en }}">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="">Địa chỉ</label>
										</div>
										<div class="form-group">
											<label for="">Hình ảnh</label>
											<div class="image">
													<div class="image__thumbnail">
													<img src="{{ !empty(@$content->image_address) ? @$content->image_address : __IMAGE_DEFAULT__ }}"  
													data-init="{{ __IMAGE_DEFAULT__ }}">
													<a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
													<i class="fa fa-times"></i></a>
													<input type="hidden" value="{{ @$content->image_address }}" name="content[image_address]"  />
													<div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
													</div>
												</div>
										</div>
										<div class="form-group">
											<label for="">Nội dung tiếng việt</label>
											<textarea name="content[content_address]" class="form-control" rows="2">{{ @$content->content_address }}</textarea>
										</div>
										<div class="form-group">
											<label for="">Nội dung tiếng anh</label>
											<textarea name="content[content_address_en]" class="form-control" rows="2">{{ @$content->content_address_en }}</textarea>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="">Website</label>
										</div>
										<div class="form-group">
											<label for="">Hình ảnh</label>
											<div class="image">
													<div class="image__thumbnail">
													<img src="{{ !empty(@$content->image_website) ? @$content->image_website : __IMAGE_DEFAULT__ }}"  
													data-init="{{ __IMAGE_DEFAULT__ }}">
													<a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
													<i class="fa fa-times"></i></a>
													<input type="hidden" value="{{ @$content->image_website }}" name="content[image_website]"  />
													<div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
													</div>
												</div>
										</div>
										<div class="form-group">
											<label for="">Nội dung</label>
											<textarea name="content[content_website]" class="form-control" rows="2">{{ @$content->content_website }}</textarea>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="">Email</label>
										</div>
										<div class="form-group">
											<label for="">Hình ảnh</label>
											<div class="image">
													<div class="image__thumbnail">
													<img src="{{ !empty(@$content->image_email) ? @$content->image_email : __IMAGE_DEFAULT__ }}"  
													data-init="{{ __IMAGE_DEFAULT__ }}">
													<a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
													<i class="fa fa-times"></i></a>
													<input type="hidden" value="{{ @$content->image_email }}" name="content[image_email]"  />
													<div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
													</div>
												</div>
										</div>
										<div class="form-group">
											<label for="">Nội dung</label>
											<textarea name="content[content_email]" class="form-control" rows="2">{{ @$content->content_email }}</textarea>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label for="">Điện thoại</label>
										</div>
										<div class="form-group">
											<label for="">Hình ảnh</label>
											<div class="image">
													<div class="image__thumbnail">
													<img src="{{ !empty(@$content->image_phone) ? @$content->image_phone : __IMAGE_DEFAULT__ }}"  
													data-init="{{ __IMAGE_DEFAULT__ }}">
													<a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
													<i class="fa fa-times"></i></a>
													<input type="hidden" value="{{ @$content->image_phone }}" name="content[image_phone]"  />
													<div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
													</div>
												</div>
										</div>
										<div class="form-group">
											<label for="">Điện thoại</label>
											<textarea name="content[content_phone]" class="form-control" rows="2">{{ @$content->content_phone }}</textarea>
										</div>
										<div class="form-group">
											<label for="">Fax</label>
											<textarea name="content[content_fax]" class="form-control" rows="2">{{ @$content->content_fax }}</textarea>
										</div>
									</div>
                                </div>
                            </div>

                            <div class="tab-pane" id="setting">
                                <div class="row">
									<div class="col-sm-2">
										<div class="form-group">
										   <label>Hình ảnh</label>
										   <div class="image">
											   <div class="image__thumbnail">
												   <img src="{{ @$content->image ?  @$content->image : __IMAGE_DEFAULT__ }}"  
												   data-init="{{ __IMAGE_DEFAULT__ }}">
												   <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
													<i class="fa fa-times"></i></a>
												   <input type="hidden" value="{{ @$content->image }}" name="content[image]"  />
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
												   <img src="{{ @$content->banner ?  @$content->banner : __IMAGE_DEFAULT__ }}"  
												   data-init="{{ __IMAGE_DEFAULT__ }}">
												   <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
													<i class="fa fa-times"></i></a>
												   <input type="hidden" value="{{ @$content->banner }}" name="content[banner]"  />
												   <div class="image__button" onclick="fileSelect(this)"><i class="fa fa-upload"></i> Upload</div>
											   </div>
										   </div>
									   </div>
									</div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="">Title SEO</label>
                                            <input type="text" class="form-control" name="content[meta_title]"
                                            value="{{ @$content->meta_title }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Meta Description</label>
                                            <textarea class="form-control" rows="5" 
                                            name="content[meta_description]">{{ @$content->meta_description }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Meta Keyword</label>
                                            <input type="text" class="form-control" name="content[meta_keyword]"
                                            value="{{ @$content->meta_keyword }}">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button class="btn btn-primary" type="submit">Lưu lại</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop