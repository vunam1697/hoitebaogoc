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
<section class="page__cells">
    <div class="container">
        <div class="module module-page__cells">
            <div class="module__content">
                <div class="bs-tab">
                    <div class="tab-container">
                        <div class="tab-control">
                            <ul class="control-list">
                                <li class="control-list__item active" tab-show="#tab1">
                                    {{ @$content->content1->title }}
                                </li>
                                <li class="control-list__item" tab-show="#tab2">
                                    {{ @$content->content2->title }}
                                </li>
                                <span class="line"></span>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-item active" id="tab1">
                                <h2 class="table__title">
                                    {{ @$content->content1->title }}
                                </h2>
                                {!! @$content->content1->content !!}
                            </div>
                            <div class="tab-item" id="tab2">
                                <h2 class="table__title">
                                    {{ @$content->content2->title }}
                                </h2>
                                {!! @$content->content2->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection