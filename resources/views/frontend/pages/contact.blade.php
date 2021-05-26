@extends('frontend.master')
@section('main')
<section class="banner__global">
	<img src="{{ $dataSeo->banner }}" alt="{{ trans('message.lien_he') }}"/>
	<div class="banner__box">
		<div class="container">
			<h2 class="banner__title">
				{{ trans('message.lien_he') }}
			</h2>
		</div>
	</div>
</section>
<section class="page__contact">
	<div class="container">
		<div class="module module-page__contact">
			<div class="module__header">
				<h2 class="title">
					{{ trans('message.thong_tin_lien_he') }}:
				</h2>
				<p class="info">
					{{ trans('message.chu_tich_hoi') }}: {{ @$site_info->name_company }}<br/>
					{{ trans('message.tong_thu_ki') }}: {{ @$site_info->name_company_en }}
				</p>
			</div>
			<div class="module__content">
				<div class="row">
					<div class="col-12 col-md-6">
						<form class="form" id="frm_contact" enctype="multipart/form-data">
							<div class="form-group">
								<input type="text" class="form-control" name="name" placeholder="{{ trans('message.ho_ten') }}"/>
								<span class="fr-error" id="error_name"></span>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="address" placeholder="{{ trans('message.dia_chi') }}"/>
								<span class="fr-error" id="error_address"></span>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="phone" placeholder="{{ trans('message.so_dien_thoai') }}"/>
								<span class="fr-error" id="error_phone"></span>
							</div>
							<div class="form-group">
								<input type="email" class="form-control" name="email" placeholder="Email"/>
								<span class="fr-error" id="error_email"></span>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="topic" placeholder="{{ trans('message.chu_de') }}"/>
								<span class="fr-error" id="error_topic"></span>
							</div>
							<div class="form-group">
								<textarea class="form-control" name="content" placeholder="{{ trans('message.noi_dung') }}"></textarea>
								<span class="fr-error" id="error_content"></span>
							</div>
							<div class="form-group">
								<div class="group__file">
									<label>{{ trans('message.dinh_kem_file') }}</label>
									<input type="file" name="myfile" class="input__flie"/>
								</div>
								<span class="fr-error" id="error_myfile"></span>
							</div>
							<div class="form-group">
								<div class="captcha">
									<span>{!! captcha_img() !!}</span>
									<button type="button" class="btn btn-success"><i class="fa fa-refresh" id="refresh"></i></button>
								</div>
							</div>
							<div class="form-group">
								<input type="text"id="CaptchaCode" name="CaptchaCode">
								<span class="fr-error" id="error_captchacode"></span>
							</div>
							<input type="hidden" name="type" value="contact">
							<div class="button">
								<button class="btn btn__view btn--18 btn_contactform">{{ trans('message.gui') }}</button>
								<button type="reset" class="btn btn__reset btn--18">{{ trans('message.nhap_lai') }}</button>
								<div class="click-btn">
									<span class=""><img src="{{ url('/uploads/images/rotate-pulsating-loading-animation.gif') }}" alt="loading"></span>
								</div>
							</div>
						</form>
					</div>
					<div class="col-12 col-md-6">
						<div class="google__map">
							{!! @$content->google_map !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@stop
@section('script')
	<script>
		$('#refresh').click(function(){
			$.ajax({
				type:'GET',
				url:'{{ route('home.refresh-captcha') }}',
				success:function(data){
					$(".captcha span").html(data.captcha);
				}
			});
		});
	</script>
@endsection