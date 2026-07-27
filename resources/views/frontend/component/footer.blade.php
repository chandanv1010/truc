<footer class="footer">
    <div class="uk-container uk-container-center">
        <!-- Flex grid instead of UIkit grid to guarantee columns stay inline and centered correctly -->
        <div class="footer-main-flex">
            <!-- Left Info Column (28%) -->
            <div class="footer-info-col">
                <div class="footer-logo">
                    <img src="{{ $system['homepage_logo'] ?? asset('userfiles/image/logo/logo.png') }}" alt="{{ $system['homepage_brand'] ?? 'TRUC GPS' }}">
                </div>

                <ul class="footer-contact-list uk-list">
                    <li class="uk-flex uk-flex-top">
                        <i class="fa fa-map-marker contact-icon"></i>
                        <span>{{ $system['contact_address'] ?? 'No11D LK 35 Phố Nông Quốc Chấn - Vạn Phúc - Hà Đông - Hà Nội | Hệ thống đại lý phục vụ toàn quốc.' }}</span>
                    </li>
                    <li class="uk-flex uk-flex-middle">
                        <i class="fa fa-phone contact-icon"></i>
                        <span><strong>{{ $system['contact_hotline'] ?? '0987622266 | 0845622266 | 0399622266' }}</strong></span>
                    </li>
                    <li class="uk-flex uk-flex-middle">
                        <i class="fa fa-envelope contact-icon"></i>
                        <span>{{ $system['contact_email'] ?? 'truccomvn66@gmail.com' }}</span>
                    </li>
                </ul>
            </div>
            
            <!-- Middle Group: Contains the 3 menus and the Support Banner below them -->
            <div class="footer-middle-group">
                <div class="footer-menus-row">
                    @if(isset($menu['footer-menu']) && count($menu['footer-menu']))
                        @foreach($menu['footer-menu'] as $footerCol)
                            @php
                                $colName = $footerCol['item']->languages->first()->pivot->name ?? '';
                            @endphp
                            <div class="footer-col">
                                <h3 class="footer-col-title">{{ $colName }}</h3>
                                <ul class="footer-col-list uk-list">
                                    @foreach($footerCol['children'] as $footerChild)
                                        @php
                                            $childName = $footerChild['item']->languages->first()->pivot->name ?? '';
                                            $childUrl = write_url($footerChild['item']->languages->first()->pivot->canonical ?? '');
                                        @endphp
                                        <li><a href="{{ $childUrl }}" title="{{ $childName }}">{{ $childName }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    @endif
                </div>
                
                <!-- Yellow Support Banner (positioned inside footer-middle-group, centered under 3 menus) -->
                <div class="footer-yellow-banner uk-flex uk-flex-middle uk-flex-space-between">
                    <div class="banner-item">
                        <span>Góp ý khiếu nại:</span>
                        <strong>{{ $system['contact_complaint'] ?? '0765622266 | 0773622266' }}</strong>
                    </div>
                    <div class="banner-item">
                        <span>Kỹ thuật bảo hành:</span>
                        <strong>{{ $system['contact_technical'] ?? '0343622266 | 0877622266' }}</strong>
                    </div>
                    <div class="banner-item">
                        <span>Thời gian làm việc:</span>
                        <strong>{{ $system['contact_working_hours'] ?? 'Từ 08h - 21h' }}</strong>
                    </div>
                </div>
            </div>
            
            <!-- Right Newsletter & Social Column (20%) -->
            <div class="footer-newsletter-col">
                <h3 class="footer-col-title">ĐĂNG KÝ NHẬN TIN</h3>
                
                <form action="/subscribe" method="post" class="footer-newsletter-form">
                    @csrf
                    <input type="email" name="email" class="newsletter-input" placeholder="Nhập email...">
                    <button type="submit" class="newsletter-btn">ĐĂNG KÝ</button>
                </form>
                
                <div class="footer-socials uk-flex uk-flex-middle">
                    <a href="{{ $system['social_facebook'] ?? '#' }}" class="social-icon"><i class="fa fa-facebook-f"></i></a>
                    <a href="{{ $system['social_twitter'] ?? '#' }}" class="social-icon"><i class="fa fa-twitter"></i></a>
                    <a href="{{ $system['social_instagram'] ?? '#' }}" class="social-icon"><i class="fa fa-instagram"></i></a>
                    <a href="{{ $system['social_google'] ?? '#' }}" class="social-icon"><i class="fa fa-google"></i></a>
                    <a href="{{ $system['social_tiktok'] ?? '#' }}" class="social-icon"><i class="fa fa-music"></i></a>
                    <a href="{{ $system['social_youtube'] ?? '#' }}" class="social-icon"><i class="fa fa-youtube-play"></i></a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Full-width copyright bar at the bottom -->
    <div class="footer-copyright-bar">
        <div class="uk-container uk-container-center uk-text-center">
            <span>{{ $system['contact_copyright'] ?? 'Bản quyền thuộc về TRUC GPS - Website thương mại điện tử đã được Bộ Công Thương cấp phép' }}</span>
        </div>
    </div>
</footer>

<div id="fb-root"></div>