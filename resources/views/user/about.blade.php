@extends('layout.usermaster')
@section('usercontent')
<title>Salem Apparel - About Us</title>
<meta name="description" content="Learn more about Salem Apparel.">
<meta name="keywords" content="about us, company information, mission, values, custom apparel">
<meta name="author" content="Salem Apparel">

<style>
  /* Add this to your CSS file or inside a <style> tag */
  .box-testimonial {
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 4px 24px rgba(0, 0, 0, 0.07);
    padding: 40px 30px;
    margin-bottom: 40px;
  }

  .testimonial-item {
    text-align: center;
    padding: 30px 20px;
    border-radius: 12px;
    background: #f8f9fa;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    transition: box-shadow 0.3s;
  }

  .testimonial-item:hover {
    box-shadow: 0 6px 24px rgba(0, 0, 0, 0.10);
  }

  .testimonial-content p {
    font-size: 1.15rem;
    font-style: italic;
    color: #333;
    margin-bottom: 20px;
    line-height: 1.7;
  }

  .testimonial-author h5 {
    font-weight: 700;
    color: #2a2a2a;
    margin-bottom: 2px;
  }

  .testimonial-author span {
    font-size: 0.95rem;
    color: #888;
    letter-spacing: 0.5px;
  }

  /* FAQ Accordion Orange Active State */
  #faqAccordion .accordion-button {
    background-color: #fff;
    color: #333;
    border: none;
    font-weight: 500;
    transition: all 0.3s ease;
  }

  #faqAccordion .accordion-button:hover {
    background-color: #fff8f0;
    color: #E2B808;
  }

  #faqAccordion .accordion-button:not(.collapsed) {
    background-color: #E2B808 !important;
    color: #fff !important;
    font-weight: 600;
    box-shadow: none;
  }

  #faqAccordion .accordion-button:not(.collapsed)::after {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ffffff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e") !important;
  }

  #faqAccordion .accordion-button::after {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23333333'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
  }

  #faqAccordion .accordion-item {
    border: 1px solid #e9ecef;
    margin-bottom: 8px;
    border-radius: 8px;
    overflow: hidden;
  }

  #faqAccordion .accordion-body {
    background-color: #fff;
    color: #666;
    padding: 20px;
    font-size: 14px;
    line-height: 1.6;
  }

  #faqAccordion .accordion-header {
    margin-bottom: 0;
  }

  /* Smooth transition for accordion expand/collapse */
  #faqAccordion .accordion-collapse {
    transition: all 0.3s ease-in-out;
  }
</style>
<main class="main">
  <div class="section-box">
    <div class="breadcrumbs-div mb-0">
      <div class="container">
        <ul class="breadcrumb">
          <li><a class="font-xs color-gray-1000" href="/">Home</a></li>
          {{-- <li><a class="font-xs color-gray-500" href="index.html">Page</a></li> --}}
          <li><a class="font-xs color-gray-500" href="about-us">About Us</a></li>
        </ul>
      </div>
    </div>
  </div>
  <section class="section-box shop-template mt-30">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h5 class="color-gray-500 mb-10">About us</h5>
          <h4>Who We Are</h4>
          <div class="row mt-20">
            <div class="col-lg-6">
              <p class="font-sm font-medium color-dark-900 mb-15" style="text-align: justify">Salem Apparel is part of the Salem Enterprise Limited group, formed in 2024 and is a family-run business. We are based in the Midlands of the UK. Our slogan, 'Made for Kings,' is a reflection of the uniqueness that YOU - our community, possess. You are a King through and through, and your apparel should signify it. Come experience the value that we have to offer.</p>
              <h4>What We Do</h4>
              <p class="font-sm font-medium color-dark-900 mb-15" style="text-align: justify">Our clothing store offers high-quality customised items, such as T-shirts, Hoodies, Sweatshirts, Aprons, Hi-Vis, and Totes. Our goal is to provide blank garments as a canvas for our customers to ‘paint’ with whatever they desire, be it a text, scripture, logo, or art. We cater to individuals, businesses, charities, sports teams, schools, bridal or wedding parties, dance classes, and other variety of other groups.</p>
              <h4>What Makes us Difference</h4>
              <p class="font-sm font-medium color-dark-900 mb-15">Our product is a catalyst for personal empowerment, a social conversation starter, for brand identity or for fostering team unity.</p>
              <p class="font-sm font-medium color-dark-900 mb-15" style="text-align: justify">We are not just a clothing store; we are a community that values individuality and creativity. Our team is dedicated to providing you with the best service and products, ensuring that your apparel reflects your unique style and personality. Whether you are looking for something casual or professional, we have got you covered.</p>
              <p class="font-sm font-medium color-dark-900 mb-15" style="text-align: justify">At Salem Apparel, we believe that clothing is more than just fabric; it is a form of self-expression. We understand that each piece of apparel tells a story, and we are here to help you tell yours. Our commitment to quality and customer satisfaction sets us apart, making us the go-to destination for all your custom apparel needs.</p>

              <p>
                Wherever your destination may be, know that your apparel made by us is there to accompany you every step of the way.</p>

              </p>

              <ul class="list-services mt-20">
                <li class="hover-up">Custom Apparel</li>
                <li class="hover-up">Print & Embroidery</li>
                <li class="hover-up">Professional Looks</li>
                <li class="hover-up">Corporate Workwear</li>
              </ul>
            </div>
            <div class="col-lg-6"><img src="{{asset('userasset/imgs/template/about-us.png')}}" alt="Ecom"></div>
          </div>
          <div class="box-contact-support pt-80 pb-50 pl-50 pr-50 background-gray-50 mt-50 mb-90">
            <div class="row">
              <div class="col-lg-3 mb-30 text-center text-lg-start">
                <h4 class="mb-5">Our Mission</h4>
                <p class="font-md color-dark-900">We offer custom basic design creation, printing and embroidery</p>
              </div>
              <div class="col-lg-3 mb-30 text-center text-lg-start">
                <h4 class="mb-5">Our Materials</h4>
                <p class="font-md color-dark-900 mb-5">We use organic cotton for our materials as we want them to last longer.

                  Our shirts are 180- 200 gsm, Hoodies and Sweats are 300- 350 gsm. If it is not quality, we do not sell</p>
              </div>
              <div class="col-lg-3 mb-30 text-center text-lg-start">
                <h4 class="mb-5">Our Services</h4>
                <p class="font-md color-dark-900 mb-5">We offer custom basic design creation, printing and embroidery</p>
              </div>
              <div class="col-lg-3 mb-30 text-center text-lg-start">
                <h4 class="mb-5">Our Values</h4>
                <p class="font-md color-dark-900 mb-5">We value our customers and their needs. We are here to serve you.</p>

              </div>
            </div>


          </div>
        </div>
      </div>
      <div class="box-contact-support pt-80 pb-50 background-gray-50">
        <div class="container">
          <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
              {{-- What our customer say slide --}}
              <div class="box-testimonial pt-50 pb-50">
                <h2 class="mb-30">What our customers say</h2>
                <div class="swiper-container swiper-testimonial">
                  <div class="swiper-wrapper">

                    <div class="swiper-slide">
                      <div class="testimonial-item">
                        <div class="testimonial-content">
                          <p class="font-md color-dark-900">"Salem Apparel has been a game-changer for our team. The quality of the apparel is outstanding, and the customization options are endless. We love our new uniforms!"</p>
                        </div>
                        <div class="testimonial-author">
                          <h5>John Doe</h5>
                          <span>Team Manager</span>
                        </div>
                      </div>
                    </div>

                    <div class="swiper-slide">
                      <div class="testimonial-item">
                        <div class="testimonial-content">
                          <p class="font-md color-dark-900">"I ordered custom T-shirts for my business, and I couldn't be happier. The design process was easy, and the final product exceeded my expectations."</p>
                        </div>
                        <div class="testimonial-author">
                          <h5>Jane Smith</h5>
                          <span>Business Owner</span>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="testimonial-item">
                        <div class="testimonial-content">
                          <p class="font-md color-dark-900">"The team at Salem Apparel is fantastic! They helped me create the perfect hoodie for my event, and everyone loved it. Highly recommend!"</p>
                        </div>
                        <div class="testimonial-author">
                          <h5>Emily Johnson</h5>
                          <span>Event Organizer</span>
                        </div>
                      </div>

                    </div>
                    <div class="swiper-slide">
                      <div class="testimonial-item">
                        <div class="testimonial-content">
                          <p class="font-md color-dark-900">"I was impressed with the quality of the materials used. The shirts are comfortable and durable, perfect for everyday wear."</p>
                        </div>
                        <div class="testimonial-author">
                          <h5>Michael Brown</h5>
                          <span>Regular Customer</span>
                        </div>
                      </div>
                    </div>


                  </div>

                </div>
              </div>
            </div>


          </div>

  </section>
  <section>
    <div class="container">
        <div class="box-contact-address pt-80 pb-50">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="mb-4">Frequently Asked Questions</h3>
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faqHeading1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="false" aria-controls="faqCollapse1">
                                        What is your response time for contact requests?
                                    </button>
                                </h2>
                                <div id="faqCollapse1" class="accordion-collapse collapse" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        We aim to respond to all contact requests within 24 hours during business days.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faqHeading2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                                        Where are you located?
                                    </button>
                                </h2>
                                <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Our main office is at Northampton, UK.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faqHeading3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                                        What are your business hours?
                                    </button>
                                </h2>
                                <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        We are open Monday to Friday, from 8am to 5pm.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faqHeading4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4" aria-expanded="false" aria-controls="faqCollapse4">
                                        How can I get support?
                                    </button>
                                </h2>
                                <div id="faqCollapse4" class="accordion-collapse collapse" aria-labelledby="faqHeading4" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        You can contact our support team via email at support@salemapparels.com or by phone.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faqHeading5">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse5" aria-expanded="false" aria-controls="faqCollapse5">
                                        Can I visit your office without an appointment?
                                    </button>
                                </h2>
                                <div id="faqCollapse5" class="accordion-collapse collapse" aria-labelledby="faqHeading5" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        We recommend scheduling an appointment before visiting to ensure availability.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faqHeading6">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse6" aria-expanded="false" aria-controls="faqCollapse6">
                                        Do you offer customer support on weekends?
                                    </button>
                                </h2>
                                <div id="faqCollapse6" class="accordion-collapse collapse" aria-labelledby="faqHeading6" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Currently, our support is available only on weekdays.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faqHeading7">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse7" aria-expanded="false" aria-controls="faqCollapse7">
                                        How do I track my inquiry status?
                                    </button>
                                </h2>
                                <div id="faqCollapse7" class="accordion-collapse collapse" aria-labelledby="faqHeading7" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        After submitting your inquiry, you will receive an email with a tracking link.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faqHeading8">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse8" aria-expanded="false" aria-controls="faqCollapse8">
                                        What information should I include in my message?
                                    </button>
                                </h2>
                                <div id="faqCollapse8" class="accordion-collapse collapse" aria-labelledby="faqHeading8" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Please include your name, contact details, and a clear description of your inquiry.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faqHeading9">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse9" aria-expanded="false" aria-controls="faqCollapse9">
                                        Is my personal information safe?
                                    </button>
                                </h2>
                                <div id="faqCollapse9" class="accordion-collapse collapse" aria-labelledby="faqHeading9" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Yes, we take your privacy seriously and protect your information according to our privacy policy.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faqHeading10">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse10" aria-expanded="false" aria-controls="faqCollapse10">
                                        Can I get a quote for your services?
                                    </button>
                                </h2>
                                <div id="faqCollapse10" class="accordion-collapse collapse" aria-labelledby="faqHeading10" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Absolutely! Please fill out the contact form with your requirements and we will get back to you with a quote.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </div>
  </section>

  @endsection
