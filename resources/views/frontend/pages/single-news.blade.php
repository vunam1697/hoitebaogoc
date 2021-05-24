@extends('frontend.master')
@section('main')
<section class="banner__global">
    <img src="{{ $dataSeo->banner }}" alt="{{ $dataSeo->meta_title }}" />
    <div class="banner__box">
        <div class="container">
            <h2 class="banner__title">
                {{ $dataSeo->meta_title }}
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
                        <div class="detail">
                            <h2 class="detail__title">
                                {{ app()->getLocale() == 'vi' ? $data->name : $data->name_en }}
                            </h2>
                            <time class="time__global">
                                <span>{{ Carbon\Carbon::parse($data->created_at)->translatedFormat('l') }}, {{ $data->created_at->format('d/m/Y') }}</span>
                                <span>{{ $data->created_at->format('h:s A') }}</span>
                            </time>
                            {!! app()->getLocale() == 'vi' ? $data->content : $data->content_en !!}
                            
                            @include('frontend.components.fb-comment')
                        </div>
                    </div>
                    <div class="sidebar">
                        <h3 class="sidebar__title">
                            {{ trans('message.bai_viet_lien_quan') }}
                        </h3>
                        <div class="sidebar__body">
                            @foreach ($post_same as $item)
                                <a href="{{ app()->getLocale() == 'vi' ? route('home.news-single_vi', ['slug'=> $item->slug]) : route('home.news-single_en', ['slug'=> $item->slug_en]) }}"
                                    class="sidebar__post"
                                    title="{{ app()->getLocale() == 'vi' ? $item->name : $item->name_en }}">
                                    <h3 class="siderbar__post-title">
                                        {{ app()->getLocale() == 'vi' ? $item->name : $item->name_en }}
                                    </h3>
                                    <time class="time__global">
                                        <span>{{ Carbon\Carbon::parse($item->created_at)->translatedFormat('l') }}, {{ $item->created_at->format('d/m/Y') }}</span>
                                        <span>{{ $item->created_at->format('h:s A') }}</span>
                                    </time>
                                </a>
                            @endforeach
                        </div>
                        <h3 class="sidebar__title">
                            {{ trans('message.thong_bao') }}
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
@section('script')
	<script>
		$(document).ready(function($) {
			$('.page-blog').addClass('active');
		});
	</script>
@endsection