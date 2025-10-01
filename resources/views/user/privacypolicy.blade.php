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
                            <p class="font-sm color-dark-900 mb-30">We value your privacy!</p>
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

        </div>

    </section>

    @endsection
