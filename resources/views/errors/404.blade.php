@extends('errors::minimal')
@section('title', __('404 - Không tìm thấy'))
<main class="main-site page-site page-404-site">
	<div class="main-container">

		<section class="section__error">
			<div class="section__error--box">
			  <h1>
				404
			  </h1>
			  <h2>
				Không tìm thấy trang
			  </h2>
			  <h3>
				Trang đã bị xóa hoặc địa chỉ URL không đúng
			  </h3>
			  <a href="{{ url('/') }}">
				quay về trang chủ
			  </a>
			</div>
		  </section>

	</div>
</main> <!-- main-site -->
