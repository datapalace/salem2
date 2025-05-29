@extends('layout.usermaster')
@section('usercontent')
    <main class="main">
        <div class="section-box">
        <div class="breadcrumbs-div mb-0">
          <div class="container">
            <ul class="breadcrumb">
              <li><a class="font-xs color-gray-1000" href="/">Home</a></li>
              {{-- <li><a class="font-xs color-gray-500" href="index.html">Page</a></li> --}}
              <li><a class="font-xs color-gray-500" href="contact-us">Contact</a></li>
            </ul>
          </div>
        </div>
      </div>
        <section class="section-box shop-template mt-0">
            <div class="container">
            <div class="box-contact">
                <div class="row">
                <div class="col-lg-6">
                    <div class="contact-form">
                    <h3 class="color-brand-3 mt-60">Contact Us</h3>
                    <p class="font-sm color-gray-700 mb-30">Our team would love to hear from you!</p>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="First name">
                        </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Last name">
                        </div>
                        </div>
                        <div class="col-lg-12">
                        <div class="form-group">
                            <input class="form-control" type="email" placeholder="Email">
                        </div>
                        </div>
                        <div class="col-lg-12">
                        <div class="form-group">
                            <input class="form-control" type="tel" placeholder="Phone number">
                        </div>
                        </div>
                        <div class="col-lg-12">
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Message" rows="5"></textarea>
                        </div>
                        </div>
                        <div class="col-lg-12">
                        <div class="form-group">
                            <input class="btn btn-buy w-auto" type="submit" value="Send message">
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="map" style="position: relative;"><div style="position: relative; padding-bottom: 75%; height: 0; overflow: hidden;"><iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border:0;" loading="lazy" allowfullscreen src="https://maps.google.com/maps?q=Northampton&output=embed"></iframe></div><a href="https://wordpress.org/plugins/super-simple-map-embeds/" rel="noopener" target="_blank" style="position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0,0,0,0); white-space: nowrap; border: 0;">google map wordpress</a></div>

                </div>
                </div>
            </div>
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
                                        You can contact our support team via email at support@ecom.com or by phone.
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
    </main>
@endsection
