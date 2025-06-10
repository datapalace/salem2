@extends('layout.usermaster')
@section('usercontent')
<title>Register - Salem Apparels</title>
<meta name="description" content="Terms and Conditions for our website.">
<meta name="keywords" content="terms, conditions, user agreement">
<meta name="author" content="Salem Apparels">
<main class="main">
  <section class="section-box shop-template mt-60">
    <div class="container">
      <div class="row mb-100">
        <div class="col-lg-1"></div>
        <div class="col-lg-5">
          <h3>Create an account</h3>
          <p class="font-md color-gray-500">Access to all features. No credit card required.</p>
          <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="form-register mt-30 mb-30">
              <div class="form-group">
                <label class="mb-5 font-sm color-gray-700">Full Name *</label>
                <input class="form-control" type="text" name="name" placeholder="Steven job">
              </div>
              <div class="form-group">
                <label class="mb-5 font-sm color-gray-700">Email *</label>
                <input class="form-control" type="text" name="email" placeholder="stevenjob@gmail.com">
              </div>
              <div class="form-group">
                <label class="mb-5 font-sm color-gray-700">Username *</label>
                <input class="form-control" name="username" type="text" placeholder="stevenjob">
              </div>
              <div class="form-group">
                <label class="mb-5 font-sm color-gray-700">Password *</label>
                <input class="form-control" id="password" type="password" name="password" placeholder="******************">
              </div>
              <div class="form-group">
                <label class="mb-5 font-sm color-gray-700">Confirm Password *</label>
                <input class="form-control" id="repassword" type="password" placeholder="******************">
                <small id="passwordHelp" class="text-danger" style="display:none;">Passwords do not match.</small>
              </div>
              <div class="form-group">
                <label>
                  <input class="checkagree" id="checkagree" type="checkbox">By clicking Register button, you agree our terms and policy,
                </label>
                <br>
                <small id="agreementHelp" class="text-danger" style="display:none;">You must agree to the terms and policy.</small>
              </div>
              <div class="form-group">
                <button class="font-md-bold btn btn-buy" id="signupBtn" type="submit" disabled>Sign Up</button>
              </div>
              <div class="mt-20"><span class="font-xs color-gray-500 font-medium">Already have an account?</span><a class="font-xs color-brand-3 font-medium" href="page-login.html"> Sign In</a></div>
            </div>
          </form>
        </div>
        <div class="col-lg-5">
          <div class="box-login-social pt-65 pl-50">
            <h5 class="text-center">Use Social Network Account</h5>
            <div class="box-button-login mt-25"><a class="btn btn-login font-md-bold color-brand-3 mb-15">Sign up with<img src="{{ asset('userasset/imgs/page/account/google.svg')}}" alt="Salem Apparel"></a><a class="btn btn-login font-md-bold color-brand-3 mb-15">Sign up with<span class="color-blue font-md-bold">Facebook</span></a></div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-box box-newsletter">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-7 col-sm-12">
          <h3 class="color-white">Subscrible &amp; Get <span class="color-warning">10%</span> Discount</h3>
          <p class="font-lg color-white">Get E-mail updates about our latest shop and <span class="font-lg-bold">special offers.</span></p>
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
@endsection

<script>
  window.onload = function() {


    const password = document.getElementById('password');
    const repassword = document.getElementById('repassword');
    const checkagree = document.getElementById('checkagree');
    const signupBtn = document.getElementById('signupBtn');
    const passwordHelp = document.getElementById('passwordHelp');
    const agreementHelp = document.getElementById('agreementHelp');

    function validateForm() {
      const passMatch = password.value && repassword.value && password.value === repassword.value;
      passwordHelp.style.display = passMatch || (!password.value && !repassword.value) ? 'none' : 'block';

      if (!checkagree.checked) {
        agreementHelp.style.display = 'block';
      } else {
        agreementHelp.style.display = 'none';
      }

      signupBtn.disabled = !(passMatch && checkagree.checked);
    }

    password.addEventListener('input', validateForm);
    repassword.addEventListener('input', validateForm);
    checkagree.addEventListener('change', validateForm);
  };
</script>