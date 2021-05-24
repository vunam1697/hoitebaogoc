@extends('frontend.master')
@section('main')
<section class="banner__global">
    <img src="{{ $dataSeo->banner }}" alt="{{ $dataSeo->meta_title }}"/>
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
                                <li class="control-list__item" tab-show="#tab3">
                                    {{ @$content->content3->title }}
                                </li>
                                <li class="control-list__item" tab-show="#tab4">
                                    {{ @$content->content4->title }}
                                </li>
                                <li class="control-list__item" tab-show="#tab5">
                                    {{ @$content->content5->title }}
                                </li>
                                <span class="line"></span>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-item active" id="tab1">
                                <h2 class="table__title">
                                    {{ @$content->content1->title }}
                                </h2>
                                <div class="cells__group">
                                    <div class="cells__item">
                                        {!! @$content->content1->content !!}
                                    </div>
                                    <div class="cells__item">
                                        <img class="img__cell2" src="{{ @$content->content1->image }}" alt="{{ @$content->content1->title }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-item" id="tab2">
                                <h2 class="table__title">
                                    {{ @$content->content2->title }}
                                </h2>
                                {!! @$content->content2->content !!}
                            </div>
                            <div class="tab-item" id="tab3">
                                <h2 class="table__title">
                                    {{ @$content->content3->title }}
                                </h2>
                                <div class="cells__group">
                                    <div class="cells__item">
                                        {!! @$content->content3->content !!}
                                    </div>
                                    <div class="cells__item">
                                        <img src="{{ @$content->content3->image }}" alt="{{ @$content->content3->title }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-item" id="tab4">
                                <h2 class="table__title">
                                    {{ @$content->content4->title }}
                                </h2>
                                {!! @$content->content4->content !!}
                            </div>
                            <div class="tab-item" id="tab5">
                                <h2 class="table__title">
                                    {{ @$content->content5->title }}
                                </h2>
                                {!! @$content->content5->content !!} 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection