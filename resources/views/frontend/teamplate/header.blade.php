<header id="header">
    <div class="container">
       <div class="header__top">
            <h1 class="addon__logo">
                <a href="{{ url('/') }}" class="logo" title="{{ trans('message.trang_chu') }}">
                    <img class="logo__link" src="{{ @$site_info->logo }}" alt="icon__logo.png" />
                </a>
            </h1>
            <div class="header__interactive">
                <a href="tel:{{ @$site_info->hotline }}">Hotline: {{ @$site_info->hotline }}</a>
                <a href="mailto:{{ @$site_info->email_1 }}">Email: {{ @$site_info->email_1 }}</a>
            </div>
            <div class="header__society header__top-item">
                @if (!empty($site_info->social))
                    @foreach ($site_info->social as $item)
                    <a href="{{ $item->link }}" class="header__society-link" target="_blank" title="{{ $item->name }}">
                        <img src="{{ $item->icon }}" alt="{{ $item->name }}" />
                    </a>
                    @endforeach
                @endif
            </div>
            <div class="search header__top-item">
                <form class="form__search" method="GET" action="{{ app()->getLocale() == 'vi' ? route('home.search_vi') : route('home.search_en') }}">
                    <input type="text" class="form-control form__input" name="q" placeholder="{{ trans('message.tim_kiem_thong_tin') }}" />
                    <button class="btn btn__search">
                        <img src="{{ url('/uploads/images/icons/icon__search.png') }}" alt="icon__search.png" />
                    </button>
                </form>
                <button class="btn btn__search btn__toggle--search">
                    <img src="{{ url('/uploads/images/icons/icon__search.png') }}" alt="icon__search.png" />
                </button>
            </div>
            <div class="header__lang header__top-item">
                <?php
                    if(request()->route()->getName() =='home.search_'.app()->getLocale()){

                    }
                ?>
                <a href="{{ route('home.change-language', ['lang'=> 'vi','route'=>request()->route()->getName(), 'slug' => @$data->slug, 'search' => request()->q]) }}" class="{{ app()->getLocale() =='vi' ? 'active' : '' }}">VN</a>
                <a href="{{ route('home.change-language', ['lang'=> 'en','route'=>request()->route()->getName(), 'slug' => @$data->slug, 'search' => request()->q]) }}" class="{{ app()->getLocale() =='en' ? 'active' : '' }}">EN</a>
            </div>
            <a href="{{ app()->getLocale() == 'vi' ? route('home.contact_vi') : route('home.contact_en') }}" class="btn btn__contact header__top-item">
                {{ trans('message.lien_he') }}
            </a>
            <button class="btn btn__menu">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
        </div>
    </div>
    <div class="header__scroll">
       <div class="container">
          <div class="header__group">
             <div class="addon-menu">
                <div class="addon-menu__container">
                    <ul class="menu">
                        @foreach ($menuHeader as $item)
                            @if ($item->parent_id == null)
                            <?php 
                                if (app()->getLocale() == 'vi') {
                                    $url = 'vi' . $item->url;
                                } else {
                                    $url = 'en' . $item->url_en;
                                }
                            ?>
                            <li class="menu__list {{ $item->class }} {{ url($url) == url()->current() ? 'active' : null }}">
                                <a href="{{ url($url) }}" class="menu__item" title="{{ app()->getLocale() == 'vi' ? $item->title : $item->title_en }}">
                                    {{ app()->getLocale() == 'vi' ? $item->title : $item->title_en }}
                                </a>
                                @if (count($item->get_child_cate()))
                                <ul>
                                    @foreach ($item->get_child_cate() as $value)
                                    <?php 
                                        if (app()->getLocale() == 'vi') {
                                            $sub_url = 'vi' . $value->url;
                                        } else {
                                            $sub_url = 'en' . $value->url_en;
                                        }
                                    ?>
                                    <li>
                                        <a href="{{ url($sub_url) }}" title="{{ app()->getLocale() == 'vi' ? $value->title : $value->title_en }}">
                                            {{ app()->getLocale() == 'vi' ? $value->title : $value->title_en }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
 </header>