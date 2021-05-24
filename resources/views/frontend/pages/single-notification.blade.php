@extends('frontend.master')
@section('main')
<section class="banner__global">
    <img src="{{ $dataSeo->banner }}" alt="{{ trans('message.thong_bao') }}" />
    <div class="banner__box">
        <div class="container">
            <h2 class="banner__title">
                {{ trans('message.thong_bao') }}
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
                            {{ trans('message.thong_bao_lien_quan') }}
                        </h3>
                        @if (count($notification_same))
                        <div class="sidebar__body">
                            @foreach ($notification_same as $item)
                                <a href="{{ app()->getLocale() == 'vi' ? route('home.notification-single_vi', ['slug'=> $item->slug]) : route('home.notification-single_en', ['slug'=> $item->slug_en]) }}"
                                    class="sidebar__info"
                                    title="{{ app()->getLocale() == 'vi' ? $item->name : $item->name_en }}">
                                    <span class="icon__info"></span>
                                    <p>
                                        {{ app()->getLocale() == 'vi' ? $item->name : $item->name_en }}
                                    </p>
                                </a>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop