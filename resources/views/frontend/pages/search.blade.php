@extends('frontend.master')
@section('main')
<section class="banner__global">
	<img src="{{ $dataSeo->banner }}" alt="{{ $dataSeo->meta_title }}" />
	<div class="banner__box">
		<div class="container">
			<h2 class="banner__title">
				{{ trans('message.tim_kiem_tu_khoa') }} : {{ $q }}
			</h2>
		</div>
	</div>
</section>
	<section class="page__post">
		<div class="container">
			<div class="module module-page__post">
				<div class="module__content">
					<div class="post">
						<div class="post__main">
							@if (count($data))
								@foreach ($data as $item)
								<div class="new">
									<h3 class="new__title">
										<a href="{{ app()->getLocale() == 'vi' ? route('home.news-single_vi', ['slug'=> $item->slug]) : route('home.news-single_en', ['slug'=> $item->slug_en]) }}" >
											{{ app()->getLocale() == 'vi' ? $item->name : $item->name_en }}
										</a>
									</h3>
									<time class="time__global">
										<span>{{ Carbon\Carbon::parse($item->created_at)->translatedFormat('l') }}, {{ $item->created_at->format('d/m/Y') }}</span>
                                        <span>{{ $item->created_at->format('h:s A') }}</span>
									</time>
									<a href="{{ app()->getLocale() == 'vi' ? route('home.news-single_vi', ['slug'=> $item->slug]) : route('home.news-single_en', ['slug'=> $item->slug_en]) }}" class="frame">
										<img src="{{ $item->image }}" alt="{{ app()->getLocale() == 'vi' ? $item->name : $item->name_en }}" />
									</a>
									<div class="new__desc">
										{{ app()->getLocale() == 'vi' ? $item->desc : $item->desc_en }} 
									</div>
									<div class="new__control">
										<a href="{{ app()->getLocale() == 'vi' ? route('home.news-single_vi', ['slug'=> $item->slug]) : route('home.news-single_en', ['slug'=> $item->slug_en]) }}" class="btn btn__view">
										Xem thêm
										</a>
									</div>
								</div>
								@endforeach
							@endif
							
							{!! $data->links('frontend.components.pagination') !!}
						</div>
						<div class="sidebar">
							<h3 class="sidebar__title">
								Thông báo
							</h3>
							<div class="sidebar__body">
								<a href="#"
									class="sidebar__info"
									title="Thông báo mời nộp hồ sơ đăng ký đề tài Tiềm năng năm 2018
									theo Thông tư số 67/2014/TT-BKHCN - 08/03/2019">
									<span class="icon__info"></span>
									<p>
										Thông báo mời nộp hồ sơ đăng ký đề tài Tiềm năng năm 2018
										theo Thông tư số 67/2014/TT-BKHCN - 08/03/2019
									</p>
								</a>
								<a href="#"
									class="sidebar__info"
									title="Thông báo mời nộp hồ sơ đăng ký đề tài Tiềm năng năm 2018
									theo Thông tư số 67/2014/TT-BKHCN - 08/03/2019">
									<span class="icon__info"></span>
									<p>
										Thông báo mời nộp hồ sơ đăng ký đề tài Tiềm năng năm 2018
										theo Thông tư số 67/2014/TT-BKHCN - 08/03/2019
									</p>
								</a>
								<a href="#"
									class="sidebar__info"
									title="Thông báo mời nộp hồ sơ đăng ký đề tài Tiềm năng năm 2018
									theo Thông tư số 67/2014/TT-BKHCN - 08/03/2019">
									<span class="icon__info"></span>
									<p>
										Thông báo mời nộp hồ sơ đăng ký đề tài Tiềm năng năm 2018
										theo Thông tư số 67/2014/TT-BKHCN - 08/03/2019
									</p>
								</a>
								<a href="#"
									class="sidebar__info"
									title="Thông báo mời nộp hồ sơ đăng ký đề tài Tiềm năng năm 2018
									theo Thông tư số 67/2014/TT-BKHCN - 08/03/2019">
									<span class="icon__info"></span>
									<p>
										Thông báo mời nộp hồ sơ đăng ký đề tài Tiềm năng năm 2018
										theo Thông tư số 67/2014/TT-BKHCN - 08/03/2019
									</p>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@stop