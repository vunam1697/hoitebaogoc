<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-6 col-md-4">
				<div class="footer__logo">
					<a href="{{ url('/') }}">
						<img src="{{ @$site_info->logo_footer }}" alt="icon__logo.png"/>
					</a>
				</div>
				<h2 class="footer__title">
					{{ trans('message.thong_tin_lien_he') }}
				</h2>
				<ul class="footer__list">
					<li>
						<span>{{ trans('message.chu_tich_hoi') }}: {{ @$site_info->name_company }}</span>
						<a href="mailto:{{ @$site_info->email_1 }}">Email: {{ @$site_info->email_1 }}</a>
					</li>
					<li>
						<span>{{ trans('message.tong_thu_ki') }}: {{ @$site_info->name_company_en }}</span>
						<a href="mailto:{{ @$site_info->email_2 }}">
							Email: {{ @$site_info->email_2 }}
						</a>
					</li>
				</ul>
			</div>
			<div class="col-12 col-sm-6 col-md-4">
				<ul class="menu__footer">
                    @foreach ($menuFooter as $item)
                    <?php 
                        if (app()->getLocale() == 'vi') {
                            $url = 'vi' . $item->url;
                        } else {
                            $url = 'en' . $item->url_en;
                        }
                    ?>
                    <li class="list__item {{ $item->class }} {{ url($url) == url()->current() ? 'active' : null }}">
                        <a href="{{ url($url) }}" title="{{ app()->getLocale() == 'vi' ? $item->title : $item->title_en }}">
                            {{ app()->getLocale() == 'vi' ? $item->title : $item->title_en }}
                        </a>
                    </li>
                    @endforeach
				</ul>
			</div>
			<div class="col-12 col-sm-6 col-md-4">
				<h2 class="footer__title">
					FOLLOW US
				</h2>
				<div class="follow">
                    @if (!empty($site_info->social))
                        @foreach ($site_info->social as $item)
                        <a href="{{ $item->link }}" class="header__society-link" target="_blank" title="{{ $item->name }}">
                            <img src="{{ $item->icon }}" alt="{{ $item->name }}"/>
                        </a>
                        @endforeach
                    @endif
				</div>
				<div class="fg__facebook">
					{!! @$site_info->fanpage_facebook !!}
				</div>
			</div>
		</div>
		<div class="copyRight">
			{{ @$site_info->copyright }}
		</div>
	</div>
</footer>