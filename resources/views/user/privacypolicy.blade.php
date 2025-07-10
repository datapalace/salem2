@extends('layout.usermaster')
@section('usercontent')
<main class="main">
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="Privacy Policy for our website.">
    <meta name="keywords" content="privacy, policy, terms, conditions">
    <meta name="author" content="Salem Apparels">
    {{-- Add this style block at the top, after @section('usercontent') --}}
    <style>
        /* Style for privacy section paragraphs */
        .contact-form .col-12 p {
            margin-bottom: 1.4em;
            font-size: 1.08rem;
            line-height: 1.8;
            color: #333;
        }

        .contact-form .col-12 h6 {
            margin-top: 1.5em;
            margin-bottom: 0.5em;
            font-size: 1.12rem;
            color: #1a1a1a;
            font-weight: 600;
        }
    </style>
    <section class="section-box shop-template mt-0">
        <div class="container">
            <div class="box-contact">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact-form">
                            <h3 class="color-brand-3 mt-60">Our Privacy Policy</h3>
                            <p class="font-sm color-gray-700 mb-30">We value your privacy!</p>
                            <div class="row">
                                {{-- Privacy Policy --}}
                                <div class="col-12">
                                    <h6 class="mb-2">Privacy Policy</h6>
                                    <h6>1. Introduction</h6>
                                    <p>We value your privacy and are committed to protecting your personal information. This Privacy Policy explains how we collect, use, and safeguard your data when you use our website.</p>

                                    <h6>2. Information We Collect</h6>
                                    <p>We may collect personal information such as your name, email address, phone number, and any other details you provide when you contact us or use our services.</p>

                                    <h6>3. How We Use Your Information</h6>
                                    <p>Your information is used to respond to your inquiries, provide customer support, improve our services, and send you updates or promotional materials if you have opted in.</p>

                                    <h6>4. Data Sharing and Disclosure</h6>
                                    <p>We do not sell or rent your personal information to third parties. We may share your data with trusted partners who assist us in operating our website and conducting our business, provided they agree to keep your information confidential.</p>

                                    <h6>5. Data Security</h6>
                                    <p>We implement appropriate security measures to protect your personal data from unauthorized access, alteration, disclosure, or destruction.</p>

                                    <h6>6. Cookies and Tracking Technologies</h6>
                                    <p>Our website may use cookies and similar technologies to enhance your experience, analyze usage, and deliver personalized content. You can manage your cookie preferences through your browser settings.</p>

                                    <h6>7. Your Rights</h6>
                                    <p>You have the right to access, update, or delete your personal information. To exercise these rights, please contact us using the details provided below.</p>

                                    <h6>8. Changes to This Policy</h6>
                                    <p>We may update this Privacy Policy from time to time. Any changes will be posted on this page with an updated effective date.</p>

                                    <h6>9. Contact Us</h6>
                                    <p>If you have any questions or concerns about our Privacy Policy, please contact us at <a href="mailto:support@salemapparels.com">support@salemapparels.com</a>.</p>
                                </div>
                            </div>
                        </div>
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