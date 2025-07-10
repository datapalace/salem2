<section class="section-box mt-90 mb-50">
  <div class="container">
    <ul class="list-col-5">
      <li>
        <div class="item-list">
          <div class="icon-left"><img src="{{ asset('userasset/imgs/template/delivery.svg') }}"
              alt="Salem Apparel"></div>
          <div class="info-right">
            <h5 class="font-lg-bold color-dark-100">Free Delivery</h5>
            <p class="font-sm color-dark-500">From all orders over £10</p>
          </div>
        </div>
      </li>
      <li>
        <div class="item-list">
          <div class="icon-left"><img src="{{ asset('userasset/imgs/template/support.svg') }}"
              alt="Salem Apparel"></div>
          <div class="info-right">
            <h5 class="font-lg-bold color-dark-100">Support 24/7</h5>
            <p class="font-sm color-dark-500">Shop with an expert</p>
          </div>
        </div>
      </li>
      <li>
        <div class="item-list">
          <div class="icon-left"><img src="{{ asset('userasset/imgs/template/voucher.svg') }}"
              alt="Salem Apparel"></div>
          <div class="info-right">
            <h5 class="font-lg-bold color-dark-100">Gift voucher</h5>
            <p class="font-sm color-dark-500">Refer a friend</p>
          </div>
        </div>
      </li>
      <li>
        <div class="item-list">
          <div class="icon-left"><img src="{{ asset('userasset/imgs/template/return.svg') }}"
              alt="Salem Apparel"></div>
          <div class="info-right">
            <h5 class="font-lg-bold color-dark-100">Return &amp; Refund</h5>
            <p class="font-sm color-dark-500">Free return over £200</p>
          </div>
        </div>
      </li>
      <li>
        <div class="item-list">
          <div class="icon-left"><img src="{{ asset('userasset/imgs/template/secure.svg') }}"
              alt="Salem Apparel"></div>
          <div class="info-right">
            <h5 class="font-lg-bold color-dark-100">Secure payment</h5>
            <p class="font-sm color-dark-500">100% Protected</p>
          </div>
        </div>
      </li>
    </ul>
  </div>
</section>

<section class="section-box box-newsletter" style="background-image: url('{{ asset('userasset/imgs/page/about/asus.svgs') }}');">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-7 col-sm-12">
        <h3 class="color-white">Subscrible &amp; Get <span class="color-warning">10%</span> Discount</h3>
        <p class="font-lg color-white">Get E-mail updates about our latest shop and <span
            class="font-lg-bold">special offers.</span></p>
      </div>
      <div class="col-lg-4 col-md-5 col-sm-12">
        <div class="box-form-newsletter mt-15">
          <form class="form-newsletter">
            <input class="input-newsletter font-xs" value="" placeholder="Your email Address">
            <button class="btn btn-brand-2">Sign Up</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>





</main>

<footer class="footer">
  <div class="footer-1">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 width-25 mb-30">
          <h4 class="mb-30 color-dark-1000">Contact</h4>
          {{-- <div class="font-md mb-20 color-dark-900"><strong class="font-md-bold">Address:</strong> 502 New Design Str, Melbourne, San Francisco, CA 94110, United States</div> --}}
          <div class="font-md mb-20 color-dark-900"><strong class="font-md-bold">Phone:</strong> +447487384030
          </div>
          <div class="font-md mb-20 color-dark-900"><strong class="font-md-bold">E-mail:</strong> enquiry@salemapparel.co.uk</div>
          <div class="font-md mb-20 color-dark-900"><strong class="font-md-bold">Hours:</strong> 9:00 - 20:00, Mon - Sat</div>
          <div class="mt-30"><a class="icon-socials icon-facebook" href="https://www.facebook.com/share/1Fu7DAVtQH/?mibextid=wwXIfr"></a><a class="icon-socials icon-instagram" href="https://www.instagram.com/salemappareluk?igsh=MXA0czB5Y25ueWN1eQ%3D%3D&utm_source=qr"></a><a class="icon-socials icon-twitter" href="https://x.com/salemappareluk?s=21"></a><a class="icon-socials icon-tiktok" href="https://www.tiktok.com/@salemappareluk?_t=ZN-8vjDBbUEBaY&_r=1"></a></div>
        </div>
        <div class="col-lg-4 width-25 mb-30">
          <h4 class="mb-30 color-dark-1000">Important Links</h4>
          <ul class="menu-footer">
            <li><a href="/about-us">About Us</a></li>
            <li><a href="/privacy-policy">Privacy Policy</a></li>
            <li><a href="/contact-us">Contact Us</a></li>
            <li><a href="#">Terms &amp; Conditions</a></li>
            <li><a href="#">Return &amp; Refund</a></li>
            <li><a href="#">Pricing and Process</a></li>
            <li><a href="#">FAQS</a></li>
          </ul>
        </div>
        <div class="col-lg-4 width-25 mb-30">
          <h4 class="mb-30 color-dark-1000">Quick Search</h4>
          <ul class="menu-footer">
            @foreach($shopByCatMenus->random(8) as $shopByCatMenu)
            <li>
              <a href="/shop/category/{{ $shopByCatMenu->type }}">
                {{ $shopByCatMenu->type }}
                <span class="number">{{ $shopByCatMenu->total }}</span>
              </a>
            </li>
            @endforeach

          </ul>
        </div>
        <div class="col-lg-4 width-25 mb-30">
          <h4 class="mb-30 color-dark-1000">Follow Us</h4>
          <p>
          <div class="mt-30"><a class="icon-socials icon-facebook" href="https://www.facebook.com/share/1Fu7DAVtQH/?mibextid=wwXIfr"></a><a class="icon-socials icon-instagram" href="https://www.instagram.com/salemappareluk?igsh=MXA0czB5Y25ueWN1eQ%3D%3D&utm_source=qr"></a><a class="icon-socials icon-twitter" href="https://x.com/salemappareluk?s=21"></a><a class="icon-socials icon-tiktok" href="https://www.tiktok.com/@salemappareluk?_t=ZN-8vjDBbUEBaY&_r=1"></a></div>
          </p>
          {{-- <ul class="menu-footer">
                <li><a href="#">FAQs</a></li>
                <li><a href="#">Editor Help</a></li>
                <li><a href="#">Community</a></li>
                <li><a href="#">Live Chatting</a></li>
                <li><a href="page-contact.html">Contact Us</a></li>
                <li><a href="#">Support Center</a></li>
              </ul> --}}
        </div>
        {{-- <div class="col-lg-3 width-23">
              <h4 class="mb-30 color-dark-1000">App &amp; Payment</h4>
              <div>
                <p class="font-md color-dark-900">Download our Apps and get extra 15% Discount on your first Order&mldr;!</p>
                <div class="mt-20"><a class="mr-10" href="#"><img src="assets/imgs/template/appstore.png" alt="Ecom"></a><a href="#"><img src="assets/imgs/template/google-play.png" alt="Ecom"></a></div>
                <p class="font-md color-dark-900 mt-20 mb-10">Secured Payment Gateways</p><img src="assets/imgs/template/payment-method.png" alt="Ecom">
              </div>
            </div> --}}
      </div>
    </div>
  </div>

</footer>