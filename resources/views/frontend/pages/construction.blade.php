@extends('frontend.master')
@section('main')
<section class="banner__global">
    <img src="{{ $dataSeo->banner }}" alt="{{ $dataSeo->meta_title }}" />
    <div class="banner__box">
        <div class="container">
            <h2 class="banner__title">
                {!! $dataSeo->meta_title !!}
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
                        @foreach ($data as $item)
                            <a href="#"
                                class="construction__post" title="{{ app()->getLocale() == 'vi' ? $item->name : $item->name_en }}">
                                <h3 class="construction__title">
                                    {{ app()->getLocale() == 'vi' ? $item->name : $item->name_en }}
                                </h3>
                                <div class="construction__desc">
                                    {{ app()->getLocale() == 'vi' ? $item->desc : $item->desc_en }}
                                </div>
                            </a>
                        @endforeach
                        {!! $data->links('frontend.components.pagination') !!}
                    </div>
                    <div class="sidebar">
                        <h3 class="sidebar__title">
                            {{ trans('message.tin_tuc_noi_bat') }}
                        </h3>
                        <div class="sidebar__body">
                            @foreach ($news as $item)
                                <a href="{{ app()->getLocale() == 'vi' ? route('home.news-single_vi', ['slug'=> $item->slug]) : route('home.news-single_en', ['slug'=> $item->slug_en]) }}"
                                    class="sidebar__post" title="{{ app()->getLocale() == 'vi' ? $item->name : $item->name_en }}">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection