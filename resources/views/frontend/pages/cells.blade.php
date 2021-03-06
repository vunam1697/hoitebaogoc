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
            <div class="module__header">
                <div class="info">
                    {!! @$content->content1->content !!}
                </div>
            </div>
            <div class="module__content">
                <div class="bs-tab">
                    <div class="tab-container">
                        <div class="tab-control">
                            <ul class="control-list">
                                <li class="control-list__item active" tab-show="#tab1">
                                    {{ @$content->content2->title }}
                                </li>
                                <li class="control-list__item" tab-show="#tab2">
                                    {{ @$content->content3->title }}
                                </li>
                                <li class="control-list__item" tab-show="#tab3">
                                    {{ @$content->content4->title }}
                                </li>
                                <li class="control-list__item" tab-show="#tab4">
                                    {{ @$content->content5->title }}
                                </li>
                                <li class="control-list__item" tab-show="#tab5">
                                    {{ @$content->content6->title }}
                                </li>
                                <li class="control-list__item" tab-show="#tab6">
                                    {{ @$content->content7->title }}
                                </li>
                                <li class="control-list__item" tab-show="#tab7">
                                    {{ @$content->content8->title }}
                                </li>
                                <span class="line"></span>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-item active" id="tab1">
                                <h2 class="table__title">
                                    {{ @$content->content2->title }}
                                </h2>
                                <div class="cells__group">
                                    <div class="cells__item">
                                        {!! @$content->content2->content !!}
                                    </div>
                                    @if (!empty(@$content->content2->image))
                                    <div class="cells__item">
                                        <img src="{{ @$content->content2->image }}" alt="{{ @$content->content2->title }}"/>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-item" id="tab2">
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
                            <div class="tab-item" id="tab3">
                                <h2 class="table__title">
                                    {{ @$content->content4->title }}
                                </h2>
                                <div class="cells__group">
                                    <div class="cells__item">
                                        {!! @$content->content4->content !!}
                                    </div>
                                    <div class="cells__item">
                                        <img src="{{ @$content->content4->image }}" alt="{{ @$content->content4->title }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-item" id="tab4">
                                <h2 class="table__title">
                                    {{ @$content->content5->title }}
                                </h2>
                                <div class="executive">
                                    <div class="row">
                                        @if (@$content->customer)
                                            @foreach ($content->customer as $item)
                                            <div class="col-12 col-xs-6 col-sm-6">
                                                <div class="executive__box">
                                                    <div class="executive__avata">
                                                        <img src="{{ $item->image }}" alt="{{ $item->name }}"/>
                                                    </div>
                                                    <div class="executive__content">
                                                        <h3 class="executive__title">
                                                            {{ $item->name }}
                                                        </h3>
                                                        {!! $item->position !!}
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    ThS. Phan Kim Ng???c
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    Tr?????ng ??H KHTN-??HQG TP.HCM
                                                </p>
                                                <p>
                                                    Tr?????ng ph??ng PTN Nghi??n c???u v?? ???ng d???ng TBG
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    BSCK2. Ph?? Ch?? D??ng
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    BV Huy???t h???c truy???n m??u
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    PGS.TS.Tr???n C??t ????ng
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    Khoa D?????c-??HYD
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    TS. Tr???n L?? B???o H??
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    ??H KHTN ??HQG TPHCM
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    TS. B??i H???ng Thi??n Khanh
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    BV ??HYD
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    BS. Ph???m Xu??n Khi??m
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    Gi??m ?????c BV th???m m??? EMCAS
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    TS. Nguy???n Th??? Thanh Ki???u
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    Ban tuy??n gi??o Th??nh ???Y
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    DS. ?????ng Th??? Kim Lan
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    C??ng ty Mekophar
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    TS. Hu???nh Ngh??a
                                                </h3>
                                                <p>
                                                    Ph?? Ch??? nhi???m B??? m??n Huy???t h???c Khoa Y ??HYD
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    TS. Nguy???n ????nh Ph??
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    BVND 115
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    PGS.TS. Nguy???n K??? Ph??ng
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    S??? KHCN
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    ThS. L?? Th??? B??ch Ph?????ng
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    B??c s?? BV ??a khoa BV V???n H???nh
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    PGS.TS. Ho??ng Ngh??a S??n
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    Vi???n Sinh H???c Nhi???t ?????i
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    PGS. TS. Nguy???n Tr?????ng S??n
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    BV Ch??? r???y
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    TS. DS. Nguy???n ?????c Th??i
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    Tr?????ng ??H KHTN-??HQG TP.HCM
                                                </p>
                                                <p>
                                                    C??? v???n PTN NC&UD TBG
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    TS. Ph???m Vi???t Thanh
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    ??H Y khoa Ph???m Ng???c Th???ch
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    TS. T??ng Ch?? Th?????ng
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    S??? Y t???
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    GS.TS. Tr????ng ????nh Ki???t
                                                </h3>
                                                <p>
                                                    Ch??? t???ch
                                                </p>
                                                <p>
                                                    Nguy??n ph?? Hi???u tr?????ng ??H Y D?????c Tp. HCM
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    ThS. ?????ng Quang Vinh
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    H???i n???i ti???t sinh s???n
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    PGS.TS. Tr???n V??n B??
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    BV Truy???n m??u huy???t h???c
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    BS. Ho??ng Th??? Di???m Tuy???t
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    BV T??? D??
                                                </p>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="tab-item" id="tab5">
                                <h2 class="table__title">
                                    {{ @$content->content6->title }}
                                </h2>
                                <div class="cells__group">
                                    <div class="cells__item">
                                        {!! @$content->content6->content !!}
                                    </div>
                                    <div class="cells__item">
                                        <img src="{{ @$content->content6->image }}" alt="{{ @$content->content6->title }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-item" id="tab6">
                                <h2 class="table__title">
                                    {{ @$content->content7->title }}
                                </h2>
                                <div class="cells__group">
                                    <div class="cells__item">
                                        {!! @$content->content7->content !!}
                                    </div>
                                    <div class="cells__item">
                                        <img src="{{ @$content->content7->image }}" alt="{{ @$content->content7->title }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-item" id="tab7">
                                <h2 class="table__title">
                                    {{ @$content->content8->title }}
                                </h2>
                                {!! @$content->content8->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection