@extends('frontend.master')
@section('main')
    <section class="section__banner">
        <div class="banner__slide">
            @foreach ($slider as $item)
            <div class="banner__item">
                <div class="banner__item--link">
                    <img class="slide__img" src="{{ $item->image }}" alt="{{ app()->getLocale() == 'vi' ? $item->name : $item->name_en }}" />
                    <div class="banner__box">
                        <div class="container">
                            <h2 class="banner__title">
                                {{ app()->getLocale() == 'vi' ? $item->name : $item->name_en }}
                            </h2>
                            <p class="banner__info">
                                {{ app()->getLocale() == 'vi' ? $item->decs : $item->decs_en }}
                            </p>
                        </div>
                    </div>
                    <span class="bg__gradien"></span>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <section class="home__introduce">
        <div class="container">
            <div class="module module-home__introduce">
                <div class="module__header">
                    <h2 class="title__global">
                        {{ @$content->about->title }}
                    </h2>
                </div>
                <div class="module__content">
                    <div class="introduce__group">
                        <div class="introduce__avata frame">
                            <img src="{{ @$content->about->image }}" alt="{{ @$content->about->title }}"/>
                        </div>
                        <div class="introduce__content">
                            <div class="instroduct__desc">
                                <p>
                                    {{ @$content->about->content }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <a href="{{ @$content->about->link }}" class="btn btn__view">{{ trans('message.xem_them') }}</a>
                </div>
            </div>
        </div>
    </section>
    <section class="home__cells">
        @if (@$content->content_2)
            @foreach ($content->content_2 as $item)
            <div class="cells__item frame">
                <img src="{{ $item->image }}" alt="{{ $item->title }}"/>
                <div class="cells__box">
                    <h2 class="cells__title">
                        {{ $item->title }}
                    </h2>
                    <a href="{{ $item->link }}" class="btn btn__link">{{ trans('message.xem_them') }}</a>
                </div>
            </div>
            @endforeach
        @endif
    </section>
    <section class="home__new">
        <div class="container">
            <div class="module module-home__new">
                <div class="module__header">
                    <h2 class="title__global">
                        {{ trans('message.tin_tuc_su_kien') }}
                    </h2>
                </div>
                <div class="module module__content">
                    <div class="new__slide">
                        @foreach ($news as $item)
                            <div class="new__slide-item">
                                <div class="new__slide-box">
                                    <div class="new__avata frame">
                                        <a href="{{ app()->getLocale() == 'vi' ? route('home.news-single_vi', ['slug'=> $item->slug]) : route('home.news-single_en', ['slug'=> $item->slug_en]) }}">
                                        <img src="{{ $item->image }}" alt="{{ app()->getLocale() == 'vi' ? $item->name : $item->name_en }}"/>
                                        </a>
                                    </div>
                                    <div class="new__content">
                                        <h3 class="new__title">
                                            <a href="{{ app()->getLocale() == 'vi' ? route('home.news-single_vi', ['slug'=> $item->slug]) : route('home.news-single_en', ['slug'=> $item->slug_en]) }}">{{ app()->getLocale() == 'vi' ? $item->name : $item->name_en }}</a>
                                        </h3>
                                        <time class="time__global">
                                            <span>{{ Carbon\Carbon::parse($item->created_at)->translatedFormat('l') }}, {{ $item->created_at->format('d/m/Y') }}</span>
                                            <span>{{ $item->created_at->format('h:s A') }}</span>
                                        </time>
                                        <div class="new__desc">
                                            {{ app()->getLocale() == 'vi' ? $item->desc : $item->desc_en }} 
                                        </div>
                                        <a href="{{ app()->getLocale() == 'vi' ? route('home.news-single_vi', ['slug'=> $item->slug]) : route('home.news-single_en', ['slug'=> $item->slug_en]) }}" class="btn btn__view-link">
                                        {{ trans('message.chi_tiet') }}
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center">
                        <a href="{{ app()->getLocale() == 'vi' ? route('home.news_vi') : route('home.news_en') }}" class="btn btn__view">{{ trans('message.xem_them') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="addon__partner">
        <div class="container">
            <div class="module module-addon__partner">
                <div class="module__header">
                    <h2 class="title__global">
                        {{ trans('message.thanh_vien') }}
                    </h2>
                </div>
                <div class="module__content">
                    <div class="partner">
                        <div class="partner__slide">
                            @if (@$content->partner->list)
                                @foreach ($content->partner->list as $item)
                                <a href="{{ $item->link }}" class="partner__item">
                                    <div class="partner__box">
                                        <div class="frame">
                                            <img src="{{ $item->image }}" alt="{{ $item->name }}"/>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection