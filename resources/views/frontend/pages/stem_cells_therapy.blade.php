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
<section class="page__therapy">
    <div class="container">
        <div class="module module-page__therapy">
            <div class="module__header">
                <h2 class="title">
                    {{ @$content->title }}
                </h2>
            </div>
            <div class="module__content">
                <div class="therapy">
                    {!! @$content->content !!}
                    <div class="therapy__group">
                        <div class="therapy__content">
                            <h3 class="therapy__title">
                                {{ @$content->title1 }}
                            </h3>
                            <div class="therapy__desc">
                                {!! @$content->content1 !!}
                            </div>
                        </div>
                        <div class="therapy__avata">
                            <img src="{{ @$content->image1 }}" alt="{{ @$content->title1 }}" />
                        </div>
                    </div>
                    <div class="therapy__group">
                        <div class="therapy__avata">
                            <img src="{{ @$content->image2 }}" alt="{{ @$content->title2 }}" />
                        </div>
                        <div class="therapy__content">
                            <h3 class="therapy__title">
                                {{ @$content->title2 }}
                            </h3>
                            <div class="therapy__desc">
                                {!! @$content->content2 !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection