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
                                                    ThS. Phan Kim Ngọc
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    Trường ĐH KHTN-ĐHQG TP.HCM
                                                </p>
                                                <p>
                                                    Trưởng phòng PTN Nghiên cứu và ứng dụng TBG
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    BSCK2. Phù Chí Dũng
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    BV Huyết học truyền máu
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    PGS.TS.Trần Cát Đông
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    Khoa Dược-ĐHYD
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    TS. Trần Lê Bảo Hà
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    ĐH KHTN ĐHQG TPHCM
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    TS. Bùi Hồng Thiên Khanh
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    BV ĐHYD
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    BS. Phạm Xuân Khiêm
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    Giám đốc BV thẩm mỹ EMCAS
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    TS. Nguyễn Thị Thanh Kiều
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    Ban tuyên giáo Thành ỦY
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    DS. Đặng Thị Kim Lan
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    Công ty Mekophar
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    TS. Huỳnh Nghĩa
                                                </h3>
                                                <p>
                                                    Phó Chủ nhiệm Bộ môn Huyết học Khoa Y ĐHYD
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    TS. Nguyễn Đình Phú
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
                                                    PGS.TS. Nguyễn Kỳ Phùng
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    Sở KHCN
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    ThS. Lê Thị Bích Phượng
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    Bác sĩ BV đa khoa BV Vạn Hạnh
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    PGS.TS. Hoàng Nghĩa Sơn
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    Viện Sinh Học Nhiệt Đới
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    PGS. TS. Nguyễn Trường Sơn
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    BV Chợ rẫy
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    TS. DS. Nguyễn Đức Thái
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    Trường ĐH KHTN-ĐHQG TP.HCM
                                                </p>
                                                <p>
                                                    Cố vấn PTN NC&UD TBG
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    TS. Phạm Việt Thanh
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    ĐH Y khoa Phạm Ngọc Thạch
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    TS. Tăng Chí Thượng
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    Sở Y tế
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    GS.TS. Trương Đình Kiệt
                                                </h3>
                                                <p>
                                                    Chủ tịch
                                                </p>
                                                <p>
                                                    Nguyên phó Hiệu trưởng ĐH Y Dược Tp. HCM
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    ThS. Đặng Quang Vinh
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    Hội nội tiết sinh sản
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    PGS.TS. Trần Văn Bé
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    BV Truyền máu huyết học
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-6 col-sm-6 col-xl-3">
                                            <div class="executive__info">
                                                <h3>
                                                    BS. Hoàng Thị Diễm Tuyết
                                                </h3>
                                                <p>
                                                    UV
                                                </p>
                                                <p>
                                                    BV Từ Dũ
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