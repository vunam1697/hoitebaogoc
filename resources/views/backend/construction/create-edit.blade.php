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
				<div class="col-sm-12">
					<div class="nav-tabs-custom">
		                <ul class="nav nav-tabs">
							<li class="active">
		                        <a href="#info" data-toggle="tab" aria-expanded="true">Thông tin</a>
							</li>
							{{-- <li class="">
		                        <a href="#info_en" data-toggle="tab" aria-expanded="true">Thông tin hỏi đáp tiếng anh</a>
							</li> --}}
		                </ul>
		                <div class="tab-content">

							<div class="tab-pane active" id="info">
								<div class="row">
			                        <div class="col-sm-6">
			                            <div class="form-group">
											<label for="">Tiêu đề tiếng việt</label>
											<input type="text" name="name" class="form-control" value="{{ @$data->name }}">
										</div>
										<div class="form-group">
											<label for="">Mô tả tiếng việt</label>
											<textarea name="desc" class="form-control" rows="5">{!! @$data->desc !!}</textarea>
										</div>
									</div>
									<div class="col-sm-6">
			                            <div class="form-group">
											<label for="">Tiêu đề tiếng anh</label>
											<input type="text" name="name_en" class="form-control" value="{{ @$data->name_en }}">
										</div>
										<div class="form-group">
											<label for="">Mô tả tiếng anh</label>
											<textarea name="desc_en" class="form-control" rows="5">{!! @$data->desc_en !!}</textarea>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<label class="custom-checkbox">
												<input type="checkbox" name="status" value="1" checked=""> Hiển thị
											</label>
										   
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
										</div>
									</div>
			                    </div>
							</div>
							
						</div>
		            </div>
				</div>
				{{-- <div class="col-sm-3">
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
				</div> --}}
			</div>
		</form>
	</div>
@stop
