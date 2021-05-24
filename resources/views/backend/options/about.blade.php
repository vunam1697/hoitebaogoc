@extends('backend.layouts.app')
@section('controller','Giới thiệu')
@section('action','Cập nhật')
@section('controller_route', route('backend.options.about'))
@section('content')
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('flash::message')
                <form action="{{ route('backend.options.about.post') }}" method="POST">
                    @csrf
                        <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#activity_vi" data-toggle="tab" aria-expanded="true">Nội dung tiếng việt</a>
                            </li>
                            <li class="">
                                <a href="#activity_en" data-toggle="tab" aria-expanded="true">Nội dung tiếng anh</a>
                            </li>
                            <li class="">
                                <a href="#setting" data-toggle="tab" aria-expanded="true">Cấu hình seo</a>
                            </li>
                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane active" id="activity_vi">
                                <div class="row">
                                    <div class="repeater" id="repeater">
                                        <table class="table table-bordered table-hover introduce_vi">
                                            <thead>
                                                <tr>
                                                    <th style="width: 30px">STT</th>
                                                    <th width="100px">Hình ảnh</th>
                                                    <th>Nội dung</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="sortable">
                                                @if (!empty($content->introduce_vi))
                                                    @foreach ($content->introduce_vi as $key => $value)
                                                        <?php $index = $loop->index + 1 ; ?>
                                                        @include('backend.repeater.row-introduce_vi')
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                        <div class="text-right">
                                            <button class="btn btn-primary" 
                                                onclick="repeater(event,this,'{{ route('get.layout') }}','.index', 'introduce_vi', '.introduce_vi')">Thêm
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="activity_en">
                                <div class="row">
                                    <div class="repeater" id="repeater">
                                        <table class="table table-bordered table-hover introduce_en">
                                            <thead>
                                                <tr>
                                                    <th style="width: 30px">STT</th>
                                                    <th width="100px">Hình ảnh</th>
                                                    <th>Nội dung</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="sortable">
                                                @if (!empty($content->introduce_en))
                                                    @foreach ($content->introduce_en as $key => $value)
                                                        <?php $index = $loop->index + 1 ; ?>
                                                        @include('backend.repeater.row-introduce_en')
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                        <div class="text-right">
                                            <button class="btn btn-primary" 
                                                onclick="repeater(event,this,'{{ route('get.layout') }}','.index', 'introduce_en', '.introduce_en')">Thêm
                                            </button>
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