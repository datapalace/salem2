@extends('layout.usermaster')
@section('usercontent')
<title>Salem Apparel - Pricing and Process</title>
<meta name="description" content="Learn about the pricing and process for custom apparel at Salem Apparel.">
<meta name="keywords" content="pricing, process, custom apparel, order, design, printing, Salem Apparel">
<meta name="author" content="Salem Apparel">
<main class="main">
  <!-- Breadcrumb -->
  <div class="section-box">
    <div class="breadcrumbs-div">
      <div class="container">
        <ul class="breadcrumb">
          <li><a class="font-xs color-gray-1000" href="/">Home</a></li>
          <li><a class="font-xs color-gray-500" href="/pricing-process">Pricing and Process</a></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <section class="section-box shop-template mt-60">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="banner-hero banner-single">
            <div class="chaset">
              <div class="text-center">
                <h1 class="color-gray-1000 mb-20">Pricing and Process</h1>
                <p class="font-md color-gray-500">Transparent pricing for custom apparel and printing services</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-50">
        <div class="col-lg-12">
          <div class="content-detail">

            <!-- Process Overview -->
            <h2 class="color-brand-3 mb-30 text-center">Our Simple 4-Step Process</h2>
            <div class="row mb-50">
              <div class="col-md-3 text-center mb-30">
                <div class="process-step">
                  <div class="step-icon mb-20">
                    <div class="icon-circle">1</div>
                  </div>
                  <h5 class="mb-15">Choose & Design</h5>
                  <p class="font-sm color-gray-700">Select your apparel and upload your artwork or use our design tools</p>
                </div>
              </div>
              <div class="col-md-3 text-center mb-30">
                <div class="process-step">
                  <div class="step-icon mb-20">
                    <div class="icon-circle">2</div>
                  </div>
                  <h5 class="mb-15">Get Quote</h5>
                  <p class="font-sm color-gray-700">Receive instant pricing based on quantity, decoration, and specifications</p>
                </div>
              </div>
              <div class="col-md-3 text-center mb-30">
                <div class="process-step">
                  <div class="step-icon mb-20">
                    <div class="icon-circle">3</div>
                  </div>
                  <h5 class="mb-15">Approve & Pay</h5>
                  <p class="font-sm color-gray-700">Review your proof, approve the design, and complete secure payment</p>
                </div>
              </div>
              <div class="col-md-3 text-center mb-30">
                <div class="process-step">
                  <div class="step-icon mb-20">
                    <div class="icon-circle">4</div>
                  </div>
                  <h5 class="mb-15">Receive</h5>
                  <p class="font-sm color-gray-700">Your custom apparel is produced and shipped directly to you</p>
                </div>
              </div>
            </div>

            <!-- Pricing Structure -->
            <h3 class="color-brand-3 mb-30">Pricing Structure</h3>

            <div class="row mb-40">
              <div class="col-lg-6">
                <h4 class="mb-20">Base Garment Pricing</h4>
                <div class="pricing-table">
                  <table class="table table-bordered">
                    <thead>
                      <tr class="bg-light">
                        <th>Item Type</th>
                        <th>Starting From</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="font-md">T-Shirts</td>
                        <td class="font-md font-bold">£8.99</td>
                      </tr>
                      <tr>
                        <td class="font-md">Polo Shirts</td>
                        <td class="font-md font-bold">£12.99</td>
                      </tr>
                      <tr>
                        <td class="font-md">Hoodies</td>
                        <td class="font-md font-bold">£18.99</td>
                      </tr>
                      <tr>
                        <td class="font-md">Sweatshirts</td>
                        <td class="font-md font-bold">£15.99</td>
                      </tr>
                      <tr>
                        <td class="font-md">Jackets</td>
                        <td class="font-md font-bold">£24.99</td>
                      </tr>
                      <tr>
                        <td class="font-md">Bags</td>
                        <td class="font-md font-bold">£6.99</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="col-lg-6">
                <h4 class="mb-20">Decoration Pricing</h4>
                <div class="pricing-table">
                  <table class="table table-bordered">
                    <thead>
                      <tr class="bg-light">
                        <th>Service</th>
                        <th>Price per Item</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="font-md">Single Color Print</td>
                        <td class="font-md font-bold">£2.50</td>
                      </tr>
                      <tr>
                        <td class="font-md">Multi-Color Print</td>
                        <td class="font-md font-bold">£4.99</td>
                      </tr>
                      <tr>
                        <td class="font-md">Embroidery (up to 10k stitches)</td>
                        <td class="font-md font-bold">£3.99</td>
                      </tr>
                      <tr>
                        <td class="font-md">Large Format Print</td>
                        <td class="font-md font-bold">£6.99</td>
                      </tr>
                      <tr>
                        <td class="font-md">Heat Transfer Vinyl</td>
                        <td class="font-md font-bold">£3.50</td>
                      </tr>
                      <tr>
                        <td class="font-md">Setup Fee (one-time)</td>
                        <td class="font-md font-bold">£15.00</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- Quantity Discounts -->
            <h3 class="color-brand-3 mb-20">Volume Discounts</h3>
            <p class="font-md color-gray-900 mb-20">Save more when you order in larger quantities:</p>

            <div class="row mb-40">
              <div class="col-md-12">
                <div class="discount-table">
                  <table class="table table-striped">
                    <thead class="bg-brand-3 text-white">
                      <tr>
                        <th>Quantity</th>
                        <th>Discount</th>
                        <th>Example: T-Shirt + Print</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="font-md">1-9 items</td>
                        <td class="font-md">0%</td>
                        <td class="font-md">£11.49 each</td>
                      </tr>
                      <tr>
                        <td class="font-md">10-24 items</td>
                        <td class="font-md color-green-700 font-bold">5%</td>
                        <td class="font-md">£10.92 each</td>
                      </tr>
                      <tr>
                        <td class="font-md">25-49 items</td>
                        <td class="font-md color-green-700 font-bold">10%</td>
                        <td class="font-md">£10.34 each</td>
                      </tr>
                      <tr>
                        <td class="font-md">50-99 items</td>
                        <td class="font-md color-green-700 font-bold">15%</td>
                        <td class="font-md">£9.77 each</td>
                      </tr>
                      <tr>
                        <td class="font-md">100+ items</td>
                        <td class="font-md color-green-700 font-bold">20%</td>
                        <td class="font-md">£9.19 each</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- Production Timeline -->
            <h3 class="color-brand-3 mb-20">Production Timeline</h3>
            <div class="row mb-40">
              <div class="col-md-6">
                <div class="timeline-item p-20 border-1 border-gray-200 mb-20">
                  <h5 class="color-brand-3 mb-10">Standard Orders</h5>
                  <p class="font-md color-gray-900 mb-10"><strong>5-7 business days</strong></p>
                  <p class="font-sm color-gray-700">For most screen printing and embroidery orders</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="timeline-item p-20 border-1 border-gray-200 mb-20">
                  <h5 class="color-brand-3 mb-10">Rush Orders</h5>
                  <p class="font-md color-gray-900 mb-10"><strong>2-3 business days</strong></p>
                  <p class="font-sm color-gray-700">Additional £5 per item rush fee applies</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="timeline-item p-20 border-1 border-gray-200 mb-20">
                  <h5 class="color-brand-3 mb-10">Large Orders (100+)</h5>
                  <p class="font-md color-gray-900 mb-10"><strong>7-14 business days</strong></p>
                  <p class="font-sm color-gray-700">Timeline depends on complexity and quantity</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="timeline-item p-20 border-1 border-gray-200 mb-20">
                  <h5 class="color-brand-3 mb-10">Complex Embroidery</h5>
                  <p class="font-md color-gray-900 mb-10"><strong>7-10 business days</strong></p>
                  <p class="font-sm color-gray-700">Detailed designs requiring digitization</p>
                </div>
              </div>
            </div>

            <!-- Additional Services -->
            <h3 class="color-brand-3 mb-20">Additional Services</h3>
            <div class="row mb-40">
              <div class="col-md-6">
                <h5 class="mb-15">Design Services</h5>
                <ul class="mb-20">
                  <li class="font-md color-gray-900 mb-10">Logo design: £25-75</li>
                  <li class="font-md color-gray-900 mb-10">Artwork modification: £15</li>
                  <li class="font-md color-gray-900 mb-10">Vector conversion: £10</li>
                  <li class="font-md color-gray-900 mb-10">Color separation: £20</li>
                </ul>
              </div>
              <div class="col-md-6">
                <h5 class="mb-15">Shipping Options</h5>
                <ul class="mb-20">
                  <li class="font-md color-gray-900 mb-10">Standard delivery: £4.99</li>
                  <li class="font-md color-gray-900 mb-10">Express delivery: £9.99</li>
                  <li class="font-md color-gray-900 mb-10">Next day delivery: £15.99</li>
                  <li class="font-md color-gray-900 mb-10">Free shipping on orders over £150</li>
                </ul>
              </div>
            </div>

            <!-- How to Get Started -->
            <div class="bg-light p-40 mb-40">
              <h3 class="color-brand-3 mb-20 text-center">Ready to Get Started?</h3>
              <div class="row">
                <div class="col-md-8 mx-auto text-center">
                  <p class="font-md color-gray-900 mb-30">
                    Get an instant quote for your custom apparel project. Upload your design, select your products, and see pricing in real-time.
                  </p>
                  <div class="mb-30">
                    <a href="/shop" class="btn btn-brand-2 mr-20">Browse Products</a>
                    <a href="/customize-shop" class="btn btn-outline-brand-2">Start Designing</a>
                  </div>
                  <p class="font-sm color-gray-600">
                    Need help? Contact our design team: <a href="mailto:enquiry@salemapparel.co.uk" class="color-brand-3">enquiry@salemapparel.co.uk</a>
                  </p>
                </div>
              </div>
            </div>

            <!-- FAQ Section -->
            <h3 class="color-brand-3 mb-20">Frequently Asked Questions</h3>
            <div class="accordion" id="pricingFAQ">
              <div class="accordion-item mb-15">
                <h5 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                    Do you charge for artwork setup?
                  </button>
                </h5>
                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#pricingFAQ">
                  <div class="accordion-body">
                    <p class="font-md color-gray-900">Yes, there's a one-time £15 setup fee for new artwork. This covers artwork preparation, color separation, and screen setup for printing.</p>
                  </div>
                </div>
              </div>

              <div class="accordion-item mb-15">
                <h5 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                    What file formats do you accept?
                  </button>
                </h5>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#pricingFAQ">
                  <div class="accordion-body">
                    <p class="font-md color-gray-900">We accept AI, EPS, PDF, PNG, JPG files. Vector formats (AI, EPS) are preferred for best quality. High-resolution PNG/JPG files (300 DPI minimum) also work well.</p>
                  </div>
                </div>
              </div>

              <div class="accordion-item mb-15">
                <h5 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                    Can I get a sample before placing a large order?
                  </button>
                </h5>
                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#pricingFAQ">
                  <div class="accordion-body">
                    <p class="font-md color-gray-900">Yes! We offer samples for £25 (including decoration). The sample cost will be deducted from your main order if you proceed with 25 or more items.</p>
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

<style>
.icon-circle {
  width: 60px;
  height: 60px;
  background: var(--color-brand-3);
  color: white;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 24px;
  font-weight: bold;
  margin: 0 auto;
}
.process-step {
  position: relative;
}
.pricing-table .table th {
  background-color: #f8f9fa;
  border-color: #dee2e6;
}
.discount-table .bg-brand-3 {
  background-color: var(--color-brand-3) !important;
}
.timeline-item {
  border-radius: 8px;
  height: 100%;
}
.accordion-button {
  background-color: #f8f9fa;
  border: 1px solid #dee2e6;
  color: var(--color-gray-900);
  font-weight: 500;
  padding: 15px 20px;
}
.accordion-button:not(.collapsed) {
  background-color: var(--color-brand-3);
  color: white;
}
.accordion-body {
  padding: 20px;
  border: 1px solid #dee2e6;
  border-top: none;
}
</style>
@endsection
