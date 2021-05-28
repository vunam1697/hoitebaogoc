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
					{{ trans('message.chu_tich_hoi') }}: {{ app()->getLocale() == 'vi' ? @$site_info->chairman : @$site_info->chairman_en }}<br/>
					{{ trans('message.tong_thu_ki') }}: {{ app()->getLocale() == 'vi' ? @$site_info->secretary : @$site_info->secretary_en }}
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
									<input type="file" name="myfile" id="file" class="input__flie demoInputBox" />
									<span id="file_error"></span>
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

		function validate() {
			$("#file_error").html("");
			$(".demoInputBox").css("border-color","#F0F0F0");
			var file_upload = $('#file').val();
			if (file_upload) {
				var file_size = $('#file')[0].files[0].size;
							
				if(file_size > 8097152) {
					$("#file_error").html("File upload lớn hơn 8MB");
					$(".demoInputBox").css("border-color","#FF0000");
					$("#file").val('');
					alert('File upload lớn hơn 10MB');
					return false;
				} 
				return true;
			}
			
		}
		
	</script>
@endsection