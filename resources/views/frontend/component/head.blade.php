<base href="{{ config('app.url') }}" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1,user-scalable=0">
<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
<!-- Chặn iOS Safari / Android tự động bọc số điện thoại thành link tel: và áp màu
     mặc định của trình duyệt, khiến chữ bị lẫn vào nền tối. -->
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="date=no">
<meta name="format-detection" content="address=no">
<meta name="robots" content="index,follow"/>
<meta name="author" content="{{ $system['homepage_company'] }}"/>
<meta name="copyright" content="{{ $system['homepage_company'] }}" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="refresh" content="1800" />
<link rel="icon" href="{{ $system['homepage_favicon'] }}" type="image/png" sizes="30x30">
<!-- GOOGLE -->
@php
    // Zalo/Facebook chi doc og:image dang URL tuyet doi; truoc day la
    // "/userfiles/..." nen preview khi share bao loi / khong co anh.
    $ogBase = rtrim(config('app.url'), '/');
    $ogImage = trim((string) ($seo['meta_image'] ?? ''));
    if ($ogImage === '') {
        $ogImage = (string) ($system['homepage_logo'] ?? '');
    }
    if ($ogImage !== '' && !preg_match('#^https?://#i', $ogImage)) {
        $ogImage = $ogBase . '/' . ltrim($ogImage, '/');
    }
    $ogImage = str_replace(' ', '%20', $ogImage);
    $ogDescription = \Illuminate\Support\Str::limit(\Illuminate\Support\Str::squish(strip_tags((string) ($seo['meta_description'] ?? ''))), 300, '...');
    $ogSiteName = $system['homepage_company'] ?? '';
@endphp
<title>{{ $seo['meta_title'] }}</title>
<meta name="description"  content="{{ $ogDescription }}" />
<meta name="keyword"  content="{{ $seo['meta_keyword'] }}" />
<link rel="canonical" href="{{ $seo['canonical'] }}" />		
<meta property="og:locale" content="vi_VN" />
<!-- for Facebook -->
<meta property="og:title" content="{{ $seo['meta_title'] }}" />
<meta property="og:type" content="website" />
<meta property="og:image" content="{{ $ogImage }}" />
<meta property="og:image:secure_url" content="{{ $ogImage }}" />
<meta property="og:url" content="{{ $seo['canonical'] }}" />		
<meta property="og:description" content="{{ $ogDescription }}" />
<meta property="og:site_name" content="{{ $ogSiteName }}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $seo['meta_title'] }}" />
<meta name="twitter:description" content="{{ $ogDescription }}" />
<meta name="twitter:image" content="{{ $ogImage }}" />
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<script src="{{ asset('vendor/frontend/library/js/jquery.js') }}"></script>
