@extends('layout.usermaster')
@section('usercontent')
    <title>Salem Apparel - Premium Custom Apparel Solutions</title>
    <meta name="description" content="Professional custom apparel and corporate clothing solutions. High-quality embroidery, printing, and branding services.">
    <meta name="keywords" content="custom apparel, corporate clothing, embroidery, printing, branded clothing, workwear">
    <meta name="author" content="Salem Apparels">

    <style>
        /* Professional Homepage Styles */
        :root {
            --primary-color: #1a1a1a;
            --secondary-color: #E2B808;
            --accent-color: #f8f9fa;
            --text-dark: #2c3e50;
            --text-light: #6c757d;
            --border-light: #e9ecef;
        }

        .salem-hero {
            position: relative;
            height: 80vh;
            min-height: 600px;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .salem-hero-slider {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .salem-hero-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.8s ease-in-out;
            display: flex;
            align-items: center;
        }

        .salem-hero-slide.active {
            opacity: 1;
        }

        .salem-hero-slide-1 {
            background: linear-gradient(135deg, #1a1a1a 0%, #2c3e50 100%);
        }

        .salem-hero-slide-2 {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        }

        .salem-hero-slide-3 {
            background: linear-gradient(135deg, #1a1a1a 0%, #34495e 100%);
        }

        .salem-hero-slide::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0.1;
            z-index: 1;
        }

        .salem-hero-slide-1::before {
            background: url('{{ asset("userasset/imgs/slider/swiper/1.png") }}') center/cover;
        }

        .salem-hero-slide-2::before {
            background: url('{{ asset("userasset/imgs/slider/swiper/2.png") }}') center/cover;
        }

        .salem-hero-slide-3::before {
            background: url('{{ asset("userasset/imgs/slider/swiper/3.png") }}') center/cover;
        }

        .salem-hero-content {
            position: relative;
            z-index: 2;
            color: white;
        }

        .salem-hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .salem-hero p {
            font-size: 1.25rem;
            opacity: 0.9;
            margin-bottom: 2rem;
            max-width: 600px;
        }

        /* Slider Navigation */
        .salem-slider-nav {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 15px;
            z-index: 3;
        }

        .salem-slider-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.4);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .salem-slider-dot.active {
            background: var(--secondary-color);
            transform: scale(1.2);
        }

        .salem-slider-arrows {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 3;
        }

        .salem-slider-arrow {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .salem-slider-arrow:hover {
            background: var(--secondary-color);
            border-color: var(--secondary-color);
            color: var(--primary-color);
        }

        .salem-slider-prev {
            left: 30px;
        }

        .salem-slider-next {
            right: 30px;
        }

        .salem-cta-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .salem-btn {
            padding: 15px 30px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .salem-btn-primary {
            background: var(--secondary-color);
            color: var(--primary-color);
        }

        .salem-btn-primary:hover {
            background: transparent;
            border-color: var(--secondary-color);
            color: var(--secondary-color);
            text-decoration: none;
        }

        .salem-btn-outline {
            background: transparent;
            border-color: white;
            color: white;
        }

        .salem-btn-outline:hover {
            background: white;
            color: var(--primary-color);
            text-decoration: none;
        }

        .salem-features {
            padding: 80px 0;
            background: white;
        }

        .salem-feature-card {
            text-align: center;
            padding: 40px 20px;
            border-radius: 16px;
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid var(--border-light);
        }

        .salem-feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .salem-feature-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: var(--secondary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
        }

        .salem-section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .salem-section-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 15px;
        }

        .salem-section-title p {
            font-size: 1.1rem;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }

        .salem-categories {
            padding: 100px 0;
            background: white;
        }

        .salem-category-card {
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            padding: 20px;
        }

        .salem-category-card:hover {
            transform: translateY(-5px);
        }

        .salem-category-image {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            margin: 0 auto 20px;
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .salem-category-card:hover .salem-category-image {
            transform: scale(1.05);
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.15);
        }

        .salem-category-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.1) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .salem-category-card:hover .salem-category-image::before {
            opacity: 1;
        }

        .salem-category-content {
            text-align: center;
        }

        .salem-category-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-dark);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 0;
            transition: color 0.3s ease;
        }

        .salem-category-card:hover .salem-category-title {
            color: var(--secondary-color);
        }

        @media (max-width: 768px) {
            .salem-category-image {
                width: 150px;
                height: 150px;
            }

            .salem-category-title {
                font-size: 1rem;
            }
        }

        @media (max-width: 576px) {
            .salem-category-image {
                width: 120px;
                height: 120px;
            }
        }

        .salem-products {
            padding: 80px 0;
            background: white;
        }

        .salem-product-tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
            border-bottom: 1px solid var(--border-light);
        }

        .salem-tab {
            padding: 15px 30px;
            border: none;
            background: none;
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-light);
            cursor: pointer;
            transition: all 0.3s ease;
            border-bottom: 3px solid transparent;
        }

        .salem-tab.active {
            color: var(--secondary-color);
            border-bottom-color: var(--secondary-color);
        }

        .salem-product-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
        }

        .salem-product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .salem-product-image {
            height: 250px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .salem-product-content {
            padding: 20px;
        }

        .salem-brand {
            font-size: 0.9rem;
            color: var(--text-light);
            margin-bottom: 5px;
        }

        .salem-product-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .salem-price {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 15px;
        }

        .salem-customize-btn {
            width: 100%;
            padding: 12px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .salem-customize-btn:hover {
            background: var(--secondary-color);
            color: var(--primary-color);
            text-decoration: none;
        }

        .salem-brands {
            padding: 60px 0;
            background: var(--accent-color);
        }

        .salem-brand-logo {
            height: 60px;
            object-fit: contain;
            opacity: 0.6;
            transition: opacity 0.3s ease;
            filter: grayscale(100%);
        }

        .salem-brand-logo:hover {
            opacity: 1;
            filter: grayscale(0%);
        }

        .salem-cta-section {
            padding: 80px 0;
            background: var(--primary-color);
            color: white;
            text-align: center;
        }

        .salem-cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .salem-cta-section p {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 30px;
        }

        /* About Us Section Styles */
        .salem-about {
            padding: 100px 0;
            background: #1a1a1a;
            position: relative;
        }

        .salem-about-image {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            height: 500px;
            background-size: cover;
            background-position: center;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }

        .salem-about-content {
            padding-left: 60px;
        }

        .salem-about-badge {
            display: inline-block;
            padding: 8px 20px;
            background: var(--secondary-color);
            color: var(--primary-color);
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .salem-about h2 {
            font-size: 2.8rem;
            font-weight: 700;
            color: white;
            margin-bottom: 25px;
            line-height: 1.2;
        }

        .salem-about p {
            font-size: 1.1rem;
            color: #cccccc;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .salem-about-stats {
            margin: 40px 0;
        }

        .salem-stat {
            text-align: center;
            padding: 20px;
        }

        .salem-stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--secondary-color);
            display: block;
            margin-bottom: 5px;
        }

        .salem-stat-label {
            font-size: 0.9rem;
            color: #aaaaaa;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .salem-about-features {
            margin-top: 30px;
        }

        .salem-about-feature {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .salem-about-feature-icon {
            width: 24px;
            height: 24px;
            background: var(--secondary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .salem-about-feature-icon i {
            color: white;
            font-size: 12px;
        }

        .salem-about-feature span {
            color: white;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .salem-about-content {
                padding-left: 0;
                margin-top: 40px;
            }

            .salem-about h2 {
                font-size: 2.2rem;
            }

            .salem-about-image {
                height: 300px;
            }
        }

        /* Testimonials Section Styles */
        .salem-testimonials {
            position: relative;
        }

        .salem-testimonial-card {
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid var(--border-light);
        }

        .salem-testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .salem-testimonial-stars {
            display: flex;
            gap: 5px;
            margin-bottom: 20px;
        }

        .salem-testimonial-stars i {
            color: #ffc107;
            font-size: 1.1rem;
        }

        .salem-testimonial-content {
            margin-bottom: 25px;
        }

        .salem-testimonial-content p {
            font-size: 1rem;
            line-height: 1.6;
            color: var(--text-dark);
            font-style: italic;
            margin: 0;
        }

        .salem-testimonial-author {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .salem-testimonial-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            flex-shrink: 0;
        }

        .salem-testimonial-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .salem-avatar-placeholder {
            background: var(--secondary-color);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .salem-avatar-placeholder span {
            color: white;
            font-weight: 600;
            font-size: 1rem;
        }

        .salem-testimonial-info h5 {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-dark);
            margin: 0;
        }

        .salem-testimonial-info span {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .salem-review-summary {
            margin-top: 60px;
            padding-top: 40px;
            border-top: 1px solid var(--border-light);
        }

        .salem-review-stats {
            background: var(--accent-color);
            padding: 40px;
            border-radius: 16px;
            border: 1px solid var(--border-light);
        }

        .salem-review-stat {
            text-align: center;
            padding: 20px 10px;
        }

        .salem-review-number {
            display: block;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 10px;
        }

        .salem-review-stars {
            display: flex;
            justify-content: center;
            gap: 3px;
            margin-bottom: 10px;
        }

        .salem-review-stars i {
            color: #ffc107;
            font-size: 1rem;
        }

        .salem-review-label {
            font-size: 0.9rem;
            color: var(--text-light);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        @media (max-width: 768px) {
            .salem-hero h1 {
                font-size: 2.5rem;
            }

            .salem-hero p {
                font-size: 1.1rem;
            }

            .salem-cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .salem-btn {
                width: 100%;
                max-width: 300px;
                text-align: center;
            }

            .salem-section-title h2 {
                font-size: 2rem;
            }

            .salem-product-tabs {
                flex-wrap: wrap;
                gap: 10px;
            }

            .salem-tab {
                padding: 10px 20px;
                font-size: 1rem;
            }

            .salem-testimonial-card {
                padding: 25px;
            }

            .salem-review-number {
                font-size: 2rem;
            }

            .salem-review-stats {
                padding: 30px 20px;
            }

            /* Mobile Slider Navigation Fixes */
            .salem-slider-arrows {
                display: none; /* Hide arrows on mobile to prevent covering text */
            }

            .salem-slider-nav {
                bottom: 15px; /* Move dots closer to bottom */
                gap: 10px; /* Reduce gap between dots */
            }

            .salem-slider-dot {
                width: 10px;
                height: 10px; /* Smaller dots on mobile */
            }

            .salem-hero-content {
                padding-bottom: 60px; /* Add padding to prevent content overlap with dots */
            }
        }
    </style>

    <main class="main">
        <!-- Hero Slider Section -->
        <section class="salem-hero">
            <div class="salem-hero-slider">
                <!-- Slide 1 -->
                <div class="salem-hero-slide salem-hero-slide-1 active">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="salem-hero-content">
                                    <h1>Premium Custom Apparel Solutions</h1>
                                    <p>Professional embroidery, printing, and branding services for businesses, teams, and individuals. Quality craftsmanship meets innovative design.</p>
                                    <div class="salem-cta-buttons">
                                        <a href="/shop" class="salem-btn salem-btn-primary">Explore Products</a>
                                        <a href="/contact-us" class="salem-btn salem-btn-outline">Get Quote</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="salem-hero-slide salem-hero-slide-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="salem-hero-content">
                                    <h1>Corporate Branding Excellence</h1>
                                    <p>Transform your business identity with our premium corporate apparel solutions. Professional uniforms, branded merchandise, and custom workwear.</p>
                                    <div class="salem-cta-buttons">
                                        <a href="/shop" class="salem-btn salem-btn-primary">Browse Corporate Range</a>
                                        <a href="/contact-us" class="salem-btn salem-btn-outline">Request Catalog</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="salem-hero-slide salem-hero-slide-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="salem-hero-content">
                                    <h1>Sports & Team Apparel</h1>
                                    <p>Unite your team with professional sports apparel and custom jerseys. High-performance materials with cutting-edge customization technology.</p>
                                    <div class="salem-cta-buttons">
                                        <a href="/shop" class="salem-btn salem-btn-primary">Team Solutions</a>
                                        <a href="/contact-us" class="salem-btn salem-btn-outline">Team Quote</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slider Navigation -->
            <div class="salem-slider-nav">
                <div class="salem-slider-dot active" data-slide="0"></div>
                <div class="salem-slider-dot" data-slide="1"></div>
                <div class="salem-slider-dot" data-slide="2"></div>
            </div>

            <!-- Slider Arrows -->
            <div class="salem-slider-arrows">
                <div class="salem-slider-arrow salem-slider-prev">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div class="salem-slider-arrow salem-slider-next">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
        </section>


         <!-- Brands Section -->
        <section class="salem-brands">
            <div class="container">
                <div class="salem-section-title">
                    <h2>Trusted Brands</h2>
                    <p>We work with industry-leading manufacturers to ensure the highest quality</p>
                </div>
                <div class="row align-items-center g-4">
                    <div class="col-lg-2 col-md-3 col-6 text-center">
                        <img src="{{ asset('userasset/imgs/slider/logo/awdis.png') }}" alt="Awdis" class="salem-brand-logo">
                    </div>
                    <div class="col-lg-2 col-md-3 col-6 text-center">
                        <img src="{{ asset('userasset/imgs/slider/logo/adc.avif') }}" alt="ADC" class="salem-brand-logo">
                    </div>
                    <div class="col-lg-2 col-md-3 col-6 text-center">
                        <img src="{{ asset('userasset/imgs/slider/logo/anthem.jpg') }}" alt="Anthem" class="salem-brand-logo">
                    </div>
                    <div class="col-lg-2 col-md-3 col-6 text-center">
                        <img src="{{ asset('userasset/imgs/slider/logo/bagbase.png') }}" alt="Bagbase" class="salem-brand-logo">
                    </div>
                    <div class="col-lg-2 col-md-3 col-6 text-center">
                        <img src="{{ asset('userasset/imgs/slider/logo/brook.png') }}" alt="Brook" class="salem-brand-logo">
                    </div>
                    <div class="col-lg-2 col-md-3 col-6 text-center">
                        <img src="{{ asset('userasset/imgs/slider/logo/baby.jpg') }}" alt="Baby" class="salem-brand-logo">
                    </div>
                </div>
            </div>
        </section>


         <!-- Categories Section -->
        <section class="salem-categories bg-white" style="background-color: white!important;" >
            <div class="container bg-white" style="background-color: white!important;" >
                <div class="salem-section-title">
                    <h2>Popular Categories</h2>
                    <p>Explore our most popular apparel categories designed for every style and occasion</p>
                </div>
                <div class="row justify-content-center">
                    @php
                        // Define the specific popular categories with proper display names
                        $popularCategoryTypes = [
                            'T-shirt' => 'T-shirts',
                            'Hood' => 'Hoodies',
                            'Sweatshirt' => 'Sweatshirts',
                            'Hi-Vis' => 'Hi-Vis',
                            'Bag' => 'Bags',
                            'Headwear' => 'Headwear',
                            'Jacket' => 'Jackets',
                            'Polo' => 'Polos'
                        ];

                        $popularCategoriesDisplay = collect();

                        // Get categories with proper images, ensuring diverse representation
                        foreach($popularCategoryTypes as $categoryType => $displayName) {
                            // Find a product with a proper image for this category
                            if($categoryType === 'Hi-Vis') {
                                // For Hi-Vis, search by title instead of type
                                $productWithImage = \App\Models\Product::where('title', 'LIKE', '%Hi-Vis%')
                                    ->whereHas('galleries', function($q) {
                                        $q->whereNotNull('image_url')
                                          ->where('image_url', '!=', '');
                                    })
                                    ->with(['galleries' => function($q) {
                                        $q->whereNotNull('image_url')
                                          ->where('image_url', '!=', '');
                                    }])
                                    ->first();
                            } else {
                                // For other categories, search by type
                                $productWithImage = \App\Models\Product::where('type', $categoryType)
                                    ->whereHas('galleries', function($q) {
                                        $q->whereNotNull('image_url')
                                          ->where('image_url', '!=', '');
                                    })
                                    ->with(['galleries' => function($q) {
                                        $q->whereNotNull('image_url')
                                          ->where('image_url', '!=', '');
                                    }])
                                    ->first();
                            }

                            if($productWithImage && $productWithImage->galleries->isNotEmpty()) {
                                $categoryData = (object)[
                                    'type' => $categoryType,
                                    'display_name' => $displayName,
                                    'category_image' => $productWithImage->galleries->first()->image_url
                                ];
                                $popularCategoriesDisplay->push($categoryData);
                            }
                        }
                    @endphp

                    @foreach ($popularCategoriesDisplay->take(8) as $index => $category)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                            @if($category->type === 'Hi-Vis')
                                <a href="/shop?search=Hi-Vis" class="text-decoration-none">
                            @else
                                <a href="/shop/category/{{ $category->type }}" class="text-decoration-none">
                            @endif
                                <div class="salem-category-card">
                                    <div class="salem-category-image" style="background-image: url('{{ $category->category_image ?? asset('userasset/imgs/template/no-image.png') }}')"></div>
                                    <div class="salem-category-content">
                                        <h3 class="salem-category-title">{{ strtoupper($category->display_name) }}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

         <!-- Features Section -->
        <section class="salem-brands">
            <div class="container">
                <div class="salem-section-title">
                    <h2>Why Choose Salem Apparel?</h2>
                    <p>We deliver exceptional quality and service that sets us apart from the competition</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="salem-feature-card">
                            <div class="salem-feature-icon">
                                <i class="fas fa-paint-brush"></i>
                            </div>
                            <h4>Custom Design</h4>
                            <p>Professional design services and custom embroidery solutions tailored to your brand</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="salem-feature-card">
                            <div class="salem-feature-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <h4>Premium Quality</h4>
                            <p>Only the finest materials and craftsmanship for durable, professional results</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="salem-feature-card">
                            <div class="salem-feature-icon">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <h4>Fast Delivery</h4>
                            <p>Quick turnaround times without compromising on quality or attention to detail</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- About Us Section -->
        <section class="salem-about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="salem-about-image" style="background-image: url('{{ asset('userasset/imgs/slider/swiper/4.png') }}')"></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="salem-about-content">

                            <h2>About Us</h2>
                            <p>With years of expertise in the custom apparel industry, Salem Apparel has established itself as a trusted partner for businesses, teams, and individuals seeking premium quality customization services.</p>
                            <p>Our commitment to excellence, attention to detail, and innovative approach to design ensures that every piece we create reflects the unique identity and vision of our clients.</p>

                            <div class="salem-about-stats">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="salem-stat">
                                            <span class="salem-stat-number">5000+</span>
                                            <span class="salem-stat-label">Happy Clients</span>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="salem-stat">
                                            <span class="salem-stat-number">50K+</span>
                                            <span class="salem-stat-label">Products Delivered</span>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="salem-stat">
                                            <span class="salem-stat-number">99%</span>
                                            <span class="salem-stat-label">Satisfaction Rate</span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div style="margin-top: 30px;">
                                <a href="/about-us" class="salem-btn salem-btn-primary">Learn More About Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Products Section -->
        {{-- <section class="salem-products">
            <div class="container">
                <div class="salem-section-title">
                    <h2>Featured Products</h2>
                    <p>High-quality apparel ready for your custom branding and design</p>
                </div>

                <!-- Product Tabs -->
                <div class="salem-product-tabs">
                    <button class="salem-tab active" data-tab="men">Men's</button>
                    <button class="salem-tab" data-tab="ladies">Women's</button>
                    <button class="salem-tab" data-tab="kids">Kids</button>
                </div>

                <!-- Men's Products -->
                <div class="salem-tab-content active" id="men-products">
                    <div class="row g-4">
                        @foreach ($men->take(8) as $product)
                            <div class="col-lg-3 col-md-6">
                                <div class="salem-product-card">
                                    <div class="salem-product-image" style="background-image: url('{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}')"></div>
                                    <div class="salem-product-content">
                                        <div class="salem-brand">{{ $product->brand }}</div>
                                        <div class="salem-product-title">{{ $product->title }}</div>
                                        <div class="salem-price">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</div>
                                        <a href="/product/customise/{{ $product->slug }}" class="salem-customize-btn">Customize Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Women's Products -->
                <div class="salem-tab-content" id="ladies-products" style="display: none;">
                    <div class="row g-4">
                        @foreach ($ladies->take(8) as $product)
                            <div class="col-lg-3 col-md-6">
                                <div class="salem-product-card">
                                    <div class="salem-product-image" style="background-image: url('{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}')"></div>
                                    <div class="salem-product-content">
                                        <div class="salem-brand">{{ $product->brand }}</div>
                                        <div class="salem-product-title">{{ $product->title }}</div>
                                        <div class="salem-price">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</div>
                                        <a href="/product/customise/{{ $product->slug }}" class="salem-customize-btn">Customize Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Kids Products -->
                <div class="salem-tab-content" id="kids-products" style="display: none;">
                    <div class="row g-4">
                        @foreach ($kids->take(8) as $product)
                            <div class="col-lg-3 col-md-6">
                                <div class="salem-product-card">
                                    <div class="salem-product-image" style="background-image: url('{{ $product->galleries->first()?->image_url ?? asset('userasset/imgs/template/no-image.png') }}')"></div>
                                    <div class="salem-product-content">
                                        <div class="salem-brand">{{ $product->brand }}</div>
                                        <div class="salem-product-title">{{ $product->title }}</div>
                                        <div class="salem-price">£{{ $product->price->single_list_price + 3 ?? 'N/A' }}</div>
                                        <a href="/product/customise/{{ $product->slug }}" class="salem-customize-btn">Customize Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section> --}}



        <!-- Reviews & Testimonials Section -->
        <section class="salem-testimonials" style="padding: 100px 0; background: white;">
            <div class="container">
                <div class="salem-section-title">
                    <h2>What Our Customers Say</h2>
                    <p>Don't just take our word for it - hear from our satisfied customers who trust Salem Apparel</p>
                </div>

                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="salem-testimonial-card">
                            <div class="salem-testimonial-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="salem-testimonial-content">
                                <p>"Exceptional quality and service! The custom embroidery on our corporate uniforms was flawless. Salem Apparel delivered exactly what we needed, on time and within budget."</p>
                            </div>
                            <div class="salem-testimonial-author">
                                <div class="salem-testimonial-avatar salem-avatar-placeholder">
                                    <span>SJ</span>
                                </div>
                                <div class="salem-testimonial-info">
                                    <h5>Sarah Johnson</h5>
                                    <span>Marketing Director, TechFlow Solutions</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="salem-testimonial-card">
                            <div class="salem-testimonial-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="salem-testimonial-content">
                                <p>"Outstanding results for our football team jerseys! The print quality is brilliant and has lasted through numerous washes. Highly recommend Salem Apparel for sports teams."</p>
                            </div>
                            <div class="salem-testimonial-author">
                                <div class="salem-testimonial-avatar salem-avatar-placeholder" style="background: #4CAF50;">
                                    <span>MT</span>
                                </div>
                                <div class="salem-testimonial-info">
                                    <h5>Mike Thompson</h5>
                                    <span>Team Manager, Lions FC</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="salem-testimonial-card">
                            <div class="salem-testimonial-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="salem-testimonial-content">
                                <p>"Professional service from start to finish. The design team helped bring our vision to life with custom hoodies for our startup. Great quality and attention to detail!"</p>
                            </div>
                            <div class="salem-testimonial-author">
                                <div class="salem-testimonial-avatar salem-avatar-placeholder" style="background: #FF9800;">
                                    <span>ED</span>
                                </div>
                                <div class="salem-testimonial-info">
                                    <h5>Emma Davis</h5>
                                    <span>Co-Founder, InnovateLab</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="salem-testimonial-card">
                            <div class="salem-testimonial-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="salem-testimonial-content">
                                <p>"Fast turnaround and excellent customer service. Our hi-vis workwear order was completed ahead of schedule with perfect branding. Will definitely use again!"</p>
                            </div>
                            <div class="salem-testimonial-author">
                                <div class="salem-testimonial-avatar salem-avatar-placeholder" style="background: #2196F3;">
                                    <span>JW</span>
                                </div>
                                <div class="salem-testimonial-info">
                                    <h5>James Wilson</h5>
                                    <span>Operations Manager, BuildRight Construction</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="salem-testimonial-card">
                            <div class="salem-testimonial-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="salem-testimonial-content">
                                <p>"Amazing quality polo shirts for our golf club. The embroidered logo looks fantastic and the fabric quality is top-notch. Great value for money!"</p>
                            </div>
                            <div class="salem-testimonial-author">
                                <div class="salem-testimonial-avatar salem-avatar-placeholder" style="background: #9C27B0;">
                                    <span>HR</span>
                                </div>
                                <div class="salem-testimonial-info">
                                    <h5>Helen Roberts</h5>
                                    <span>Club Secretary, Riverside Golf Club</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="salem-testimonial-card">
                            <div class="salem-testimonial-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="salem-testimonial-content">
                                <p>"Brilliant service for our charity event t-shirts. Salem Apparel went above and beyond to ensure everything was perfect. Couldn't be happier with the results!"</p>
                            </div>
                            <div class="salem-testimonial-author">
                                <div class="salem-testimonial-avatar salem-avatar-placeholder" style="background: #795548;">
                                    <span>DB</span>
                                </div>
                                <div class="salem-testimonial-info">
                                    <h5>David Brown</h5>
                                    <span>Event Coordinator, Hope Foundation</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review Summary -->
                <div class="salem-review-summary">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="salem-review-stats">
                                <div class="row text-center">
                                    <div class="col-md-3 col-6">
                                        <div class="salem-review-stat">
                                            <span class="salem-review-number">4.9</span>
                                            <div class="salem-review-stars">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <span class="salem-review-label">Average Rating</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="salem-review-stat">
                                            <span class="salem-review-number">1,250+</span>
                                            <span class="salem-review-label">Happy Customers</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="salem-review-stat">
                                            <span class="salem-review-number">98%</span>
                                            <span class="salem-review-label">Satisfaction Rate</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="salem-review-stat">
                                            <span class="salem-review-number">500+</span>
                                            <span class="salem-review-label">5-Star Reviews</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="salem-cta-section" style="margin-top: 70px">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2>Ready to Get Started?</h2>
                        <p>Contact our team today for a personalized quote and discover how we can bring your vision to life</p>
                        <a href="/contact-us" class="salem-btn salem-btn-primary">Get Your Quote</a>
                    </div>
                </div>
            </div>
        </section>

    <script>
        // Professional Tab Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.salem-tab');
            const tabContents = document.querySelectorAll('.salem-tab-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const targetTab = this.getAttribute('data-tab');

                    // Remove active class from all tabs and contents
                    tabs.forEach(t => t.classList.remove('active'));
                    tabContents.forEach(content => {
                        content.style.display = 'none';
                        content.classList.remove('active');
                    });

                    // Add active class to clicked tab
                    this.classList.add('active');

                    // Show corresponding content
                    const targetContent = document.getElementById(targetTab + '-products');
                    if (targetContent) {
                        targetContent.style.display = 'block';
                        targetContent.classList.add('active');
                    }
                });
            });

            // Hero Slider Functionality
            const slides = document.querySelectorAll('.salem-hero-slide');
            const dots = document.querySelectorAll('.salem-slider-dot');
            const prevBtn = document.querySelector('.salem-slider-prev');
            const nextBtn = document.querySelector('.salem-slider-next');
            let currentSlide = 0;
            const totalSlides = slides.length;

            function showSlide(index) {
                // Remove active class from all slides and dots
                slides.forEach(slide => slide.classList.remove('active'));
                dots.forEach(dot => dot.classList.remove('active'));

                // Add active class to current slide and dot
                slides[index].classList.add('active');
                dots[index].classList.add('active');
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % totalSlides;
                showSlide(currentSlide);
            }

            function prevSlide() {
                currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                showSlide(currentSlide);
            }

            // Event listeners for navigation
            nextBtn.addEventListener('click', nextSlide);
            prevBtn.addEventListener('click', prevSlide);

            // Event listeners for dots
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    currentSlide = index;
                    showSlide(currentSlide);
                });
            });

            // Auto-play slider
            setInterval(nextSlide, 5000); // Change slide every 5 seconds
        });
    </script>





        <style>
            .category-card {
                border-radius: 18px;
                transition: box-shadow 0.2s, transform 0.2s;
                background: #fff;
                min-height: 180px;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .category-card:hover {
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.10);
                transform: translateY(-6px) scale(1.04);
                border-color: #c8e6f9;
            }

            .category-icon {
                width: 80px;
                height: 80px;
                background: linear-gradient(135deg, #e3f2fd 0%, #fff 100%);
                border: 2px solid #c8e6f9;
                box-shadow: 0 2px 8px rgba(200, 230, 249, 0.15);
                overflow: hidden;
            }

            @media (max-width: 991.98px) {
                .col-xl-2 {
                    flex: 0 0 auto;
                    width: 33.333333%;
                }
            }

            @media (max-width: 767.98px) {

                .col-xl-2,
                .col-lg-3,
                .col-md-4,
                .col-sm-6,
                .col-6 {
                    flex: 0 0 auto;
                    width: 50%;
                }

                .category-icon {
                    width: 60px;
                    height: 60px;
                }
            }
        </style>
        <!-- End Popular Categories Section -->





    </main>
@endsection
