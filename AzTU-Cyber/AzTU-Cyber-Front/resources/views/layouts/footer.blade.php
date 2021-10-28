<footer>
    @php
        $setting2 = \App\Models\Setting::first();
    @endphp
    <div class="footer-container">
        <div class="footer-left">
            <div class="fl-container">
                <img class="fl__logo-img"  src="{{asset('/assets/logo/web/'.$setting2->logo)}}" alt=""/>

                <div class="fl-body">{{$setting2->content}}</div>
            </div>
        </div>

        <div class="footer-mid">
            <div class="fm-container">
                <div class="fm__links">
                    <h5 class="fm__links-title">Lorem, ipsum dolor.</h5>
                    <a class="fm__link" href="#">Lorem ipsum dolor.</a>
                    <a class="fm__link" href="#">Lorem ipsum dolor sit.</a>
                    <a class="fm__link" href="#">Lorem ipsum.</a>
                    <a class="fm__link" href="#">Lorem ipsum dolor sit.</a>
                </div>
            </div>
        </div>

        <div class="footer-right">
            <div class="fr-container">
                <h5 class="fr__contact-header">Bizimlə Əlaqə</h5>
                <div class="fr__contact-body">
                    <div>Tel: {{$setting2->number}}</div>
                    <p>Daha ətraflı əlaqə üçün <a href="{{route('contact_view')}}">keçid et</a>.</p>
                </div>
                <div class="fr-social-media-accounts">
                    <a class="fr-sma__facebook" href="{{$setting2->facebook}}"
                    ><i class="fab fa-facebook"></i
                        ></a>
                    <a class="fr-sma__instagram" href="{{$setting2->instagram}}"
                    ><i class="fab fa-instagram"></i
                        ></a>
                    <a class="fr-sma__twitter" href="{{$setting2->twitter}}"
                    ><i class="fab fa-twitter-square"></i
                        ></a>
                    <a class="fr-sma__telegram" href="{{$setting2->telegram}}"
                    ><i class="fab fa-telegram"></i
                        ></a>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="copyright">
            Copyright © 2021: <span>www.cybersecurityspace.com</span>
        </div>
    </div>
</footer>
