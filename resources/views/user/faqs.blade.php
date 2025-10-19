@extends('layout.usermaster')
@section('usercontent')
<title>Salem Apparel - Frequently Asked Questions</title>
<meta name="description" content="Frequently Asked Questions about Salem Apparel.">
<meta name="keywords" content="about us, company information, mission, values, custom apparel">
<meta name="author" content="Salem Apparel">
<main class="main">
  <!-- Breadcrumb -->
  <div class="section-box">
    <div class="breadcrumbs-div">
      <div class="container">
        <ul class="breadcrumb">
          <li><a class="font-xs color-gray-1000" href="/">Home</a></li>
          <li><a class="font-xs color-gray-500" href="/faqs">FAQs</a></li>
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
                <h1 class="color-gray-1000 mb-20">Frequently Asked Questions</h1>
                <p class="font-md color-gray-500">Find answers to common questions about our products and services</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-50">
        <div class="col-lg-3">
          <!-- FAQ Categories -->
          <div class="sidebar-border">
            <h4 class="mb-20 color-brand-3">Categories</h4>
            <ul class="list-nav-arrow">
              <li><a href="#ordering" class="faq-nav-link">Ordering & Payment</a></li>
              <li><a href="#customization" class="faq-nav-link">Customization</a></li>
              <li><a href="#shipping" class="faq-nav-link">Shipping & Delivery</a></li>
              <li><a href="#returns" class="faq-nav-link">Returns & Exchanges</a></li>
              <li><a href="#products" class="faq-nav-link">Products & Quality</a></li>
              <li><a href="#support" class="faq-nav-link">Customer Support</a></li>
            </ul>
          </div>

          <div class="sidebar-border mt-30">
            <h4 class="mb-20 color-brand-3">Still Need Help?</h4>
            <div class="contact-info">
              <p class="font-md color-gray-900 mb-15">
                <strong>Email:</strong><br>
                <a href="mailto:enquiry@salemapparel.co.uk" class="color-brand-3">enquiry@salemapparel.co.uk</a>
              </p>
              <p class="font-md color-gray-900 mb-15">
                <strong>Phone:</strong><br>
                <a href="tel:+447487384030" class="color-brand-3">+447487384030</a>
              </p>
              <p class="font-sm color-gray-600">
                Mon - Sat: 10:00AM - 07:00PM
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-9">
          <div class="content-detail">

            <!-- Ordering & Payment -->
            <div id="ordering" class="faq-section mb-50">
              <h3 class="color-brand-3 mb-30">Ordering & Payment</h3>

              <div class="accordion" id="orderingFAQ">
                <div class="accordion-item mb-15">
                  <h5 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#order1">
                      How do I place an order?
                    </button>
                  </h5>
                  <div id="order1" class="accordion-collapse collapse show" data-bs-parent="#orderingFAQ">
                    <div class="accordion-body">
                      <p class="font-md color-gray-900">You can place an order in several ways:</p>
                      <ul>
                        <li>Browse our catalog and add items to your cart</li>
                        <li>Use our customization tool to design your own apparel</li>
                        <li>Contact us directly for bulk orders or complex requirements</li>
                        <li>Upload your artwork and we'll provide a quote</li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="accordion-item mb-15">
                  <h5 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#order2">
                      What payment methods do you accept?
                    </button>
                  </h5>
                  <div id="order2" class="accordion-collapse collapse" data-bs-parent="#orderingFAQ">
                    <div class="accordion-body">
                      <p class="font-md color-gray-900">We accept:</p>
                      <ul>
                        <li>All major credit cards (Visa, MasterCard, American Express)</li>
                        <li>PayPal</li>
                        <li>Apple Pay and Google Pay</li>
                        <li>Bank transfers for large orders</li>
                      </ul>
                      <p class="font-md color-gray-900">All payments are processed securely using SSL encryption.</p>
                    </div>
                  </div>
                </div>

                <div class="accordion-item mb-15">
                  <h5 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#order3">
                      Can I get a quote before ordering?
                    </button>
                  </h5>
                  <div id="order3" class="accordion-collapse collapse" data-bs-parent="#orderingFAQ">
                    <div class="accordion-body">
                      <p class="font-md color-gray-900">Yes! We provide instant quotes through our website. For custom orders, simply upload your artwork and select your products to see real-time pricing. For complex projects, contact us for a detailed quote.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Customization -->
            <div id="customization" class="faq-section mb-50">
              <h3 class="color-brand-3 mb-30">Customization</h3>

              <div class="accordion" id="customFAQ">
                <div class="accordion-item mb-15">
                  <h5 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#custom1">
                      What file formats do you accept for artwork?
                    </button>
                  </h5>
                  <div id="custom1" class="accordion-collapse collapse" data-bs-parent="#customFAQ">
                    <div class="accordion-body">
                      <p class="font-md color-gray-900">We accept the following formats:</p>
                      <ul>
                        <li><strong>Vector files (preferred):</strong> AI, EPS, SVG, PDF</li>
                        <li><strong>High-resolution images:</strong> PNG, JPG, TIFF (300 DPI minimum)</li>
                        <li><strong>Design files:</strong> PSD, INDD</li>
                      </ul>
                      <p class="font-md color-gray-900">Vector files ensure the best quality for printing and embroidery.</p>
                    </div>
                  </div>
                </div>

                <div class="accordion-item mb-15">
                  <h5 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#custom2">
                      Do you offer design services?
                    </button>
                  </h5>
                  <div id="custom2" class="accordion-collapse collapse" data-bs-parent="#customFAQ">
                    <div class="accordion-body">
                      <p class="font-md color-gray-900">Yes! Our design services include:</p>
                      <ul>
                        <li>Logo design and creation</li>
                        <li>Artwork modification and optimization</li>
                        <li>Vector conversion from low-resolution images</li>
                        <li>Color separation for screen printing</li>
                        <li>Typography and layout design</li>
                      </ul>
                      <p class="font-md color-gray-900">Design fees start from £15-75 depending on complexity.</p>
                    </div>
                  </div>
                </div>

                <div class="accordion-item mb-15">
                  <h5 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#custom3">
                      What's the difference between screen printing and embroidery?
                    </button>
                  </h5>
                  <div id="custom3" class="accordion-collapse collapse" data-bs-parent="#customFAQ">
                    <div class="accordion-body">
                      <p class="font-md color-gray-900"><strong>Screen Printing:</strong></p>
                      <ul>
                        <li>Best for large quantities and simple designs</li>
                        <li>Vibrant colors and smooth finish</li>
                        <li>Cost-effective for bulk orders</li>
                        <li>Great for t-shirts and flat surfaces</li>
                      </ul>
                      <p class="font-md color-gray-900"><strong>Embroidery:</strong></p>
                      <ul>
                        <li>Premium, professional appearance</li>
                        <li>Durable and long-lasting</li>
                        <li>Perfect for logos and text</li>
                        <li>Ideal for polo shirts, caps, and business wear</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Shipping & Delivery -->
            <div id="shipping" class="faq-section mb-50">
              <h3 class="color-brand-3 mb-30">Shipping & Delivery</h3>

              <div class="accordion" id="shippingFAQ">
                <div class="accordion-item mb-15">
                  <h5 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ship1">
                      How long does delivery take?
                    </button>
                  </h5>
                  <div id="ship1" class="accordion-collapse collapse" data-bs-parent="#shippingFAQ">
                    <div class="accordion-body">
                      <p class="font-md color-gray-900">Delivery times depend on the service chosen:</p>
                      <ul>
                        <li><strong>Standard delivery:</strong> 3-5 business days (£4.99)</li>
                        <li><strong>Express delivery:</strong> 1-2 business days (£9.99)</li>
                        <li><strong>Next day delivery:</strong> Next working day (£15.99)</li>
                        <li><strong>International:</strong> 5-14 business days (varies by location)</li>
                      </ul>
                      <p class="font-md color-gray-900">Free shipping on orders over £150!</p>
                    </div>
                  </div>
                </div>

                <div class="accordion-item mb-15">
                  <h5 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ship2">
                      Do you ship internationally?
                    </button>
                  </h5>
                  <div id="ship2" class="accordion-collapse collapse" data-bs-parent="#shippingFAQ">
                    <div class="accordion-body">
                      <p class="font-md color-gray-900">Yes, we ship to most countries worldwide. International shipping costs vary by destination and weight. Customs duties and taxes may apply and are the customer's responsibility.</p>
                    </div>
                  </div>
                </div>

                <div class="accordion-item mb-15">
                  <h5 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ship3">
                      Can I track my order?
                    </button>
                  </h5>
                  <div id="ship3" class="accordion-collapse collapse" data-bs-parent="#shippingFAQ">
                    <div class="accordion-body">
                      <p class="font-md color-gray-900">Yes! Once your order ships, you'll receive a tracking number via email. You can track your package through our website or directly with the carrier.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Returns & Exchanges -->
            <div id="returns" class="faq-section mb-50">
              <h3 class="color-brand-3 mb-30">Returns & Exchanges</h3>

              <div class="accordion" id="returnsFAQ">
                <div class="accordion-item mb-15">
                  <h5 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#return1">
                      What is your return policy?
                    </button>
                  </h5>
                  <div id="return1" class="accordion-collapse collapse" data-bs-parent="#returnsFAQ">
                    <div class="accordion-body">
                      <p class="font-md color-gray-900">We offer 30-day returns on most items. Items must be unworn, unwashed, and have original tags. Custom printed items can only be returned if defective or if we made an error.</p>
                      <p class="font-md color-gray-900">Free returns on orders over £200, otherwise £5.99 return shipping fee applies.</p>
                    </div>
                  </div>
                </div>

                <div class="accordion-item mb-15">
                  <h5 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#return2">
                      Can I exchange for a different size?
                    </button>
                  </h5>
                  <div id="return2" class="accordion-collapse collapse" data-bs-parent="#returnsFAQ">
                    <div class="accordion-body">
                      <p class="font-md color-gray-900">Yes! We're happy to exchange items for different sizes or colors (subject to availability). Free exchange shipping on orders over £150. Contact us to arrange an exchange.</p>
                    </div>
                  </div>
                </div>

                <div class="accordion-item mb-15">
                  <h5 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#return3">
                      What if my order arrives damaged?
                    </button>
                  </h5>
                  <div id="return3" class="accordion-collapse collapse" data-bs-parent="#returnsFAQ">
                    <div class="accordion-body">
                      <p class="font-md color-gray-900">Contact us immediately (within 48 hours) with photos of the damage. We'll arrange a replacement or full refund at no cost to you. You typically won't need to return the damaged item.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Products & Quality -->
            <div id="products" class="faq-section mb-50">
              <h3 class="color-brand-3 mb-30">Products & Quality</h3>

              <div class="accordion" id="productsFAQ">
                <div class="accordion-item mb-15">
                  <h5 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#product1">
                      What brands do you carry?
                    </button>
                  </h5>
                  <div id="product1" class="accordion-collapse collapse" data-bs-parent="#productsFAQ">
                    <div class="accordion-body">
                      <p class="font-md color-gray-900">We work with quality brands including Gildan, Fruit of the Loom, B&C, Anvil, and many others. All our garments are selected for quality, comfort, and printability.</p>
                    </div>
                  </div>
                </div>

                <div class="accordion-item mb-15">
                  <h5 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#product2">
                      How do I choose the right size?
                    </button>
                  </h5>
                  <div id="product2" class="accordion-collapse collapse" data-bs-parent="#productsFAQ">
                    <div class="accordion-body">
                      <p class="font-md color-gray-900">Each product page includes a detailed size chart. Sizes can vary between brands, so always check the specific size chart for the item you're ordering. When in doubt, contact us for sizing advice.</p>
                    </div>
                  </div>
                </div>

                <div class="accordion-item mb-15">
                  <h5 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#product3">
                      How long will the print/embroidery last?
                    </button>
                  </h5>
                  <div id="product3" class="accordion-collapse collapse" data-bs-parent="#productsFAQ">
                    <div class="accordion-body">
                      <p class="font-md color-gray-900">With proper care, our prints and embroidery should last the lifetime of the garment. We use high-quality inks and threads, and our processes are designed for durability. Always follow care instructions for best results.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Customer Support -->
            <div id="support" class="faq-section mb-50">
              <h3 class="color-brand-3 mb-30">Customer Support</h3>

              <div class="accordion" id="supportFAQ">
                <div class="accordion-item mb-15">
                  <h5 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#support1">
                      How can I contact customer support?
                    </button>
                  </h5>
                  <div id="support1" class="accordion-collapse collapse" data-bs-parent="#supportFAQ">
                    <div class="accordion-body">
                      <p class="font-md color-gray-900">You can reach us:</p>
                      <ul>
                        <li><strong>Email:</strong> enquiry@salemapparel.co.uk</li>
                        <li><strong>Phone:</strong> +447487384030</li>
                        <li><strong>Hours:</strong> 10:00AM - 07:00PM, Monday to Saturday</li>
                        <li><strong>Response time:</strong> Email responses within 24 hours</li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="accordion-item mb-15">
                  <h5 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#support2">
                      Can I visit your showroom?
                    </button>
                  </h5>
                  <div id="support2" class="accordion-collapse collapse" data-bs-parent="#support2">
                    <div class="accordion-body">
                      <p class="font-md color-gray-900">Yes! We welcome appointments to view our products and discuss your requirements in person. Please call ahead to schedule a convenient time.</p>
                    </div>
                  </div>
                </div>

                <div class="accordion-item mb-15">
                  <h5 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#support3">
                      Do you offer bulk order discounts?
                    </button>
                  </h5>
                  <div id="support3" class="accordion-collapse collapse" data-bs-parent="#supportFAQ">
                    <div class="accordion-body">
                      <p class="font-md color-gray-900">Yes! We offer quantity discounts starting from 10 items (5% discount) up to 20% discount for orders over 100 items. Contact us for special pricing on very large orders.</p>
                    </div>
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
.faq-section {
  scroll-margin-top: 100px;
}
.faq-nav-link {
  color: var(--color-gray-700);
  text-decoration: none;
  padding: 8px 0;
  display: block;
  border-bottom: 1px solid #eee;
}
.faq-nav-link:hover {
  color: var(--color-brand-3);
}
.accordion-button {
  background-color: #f8f9fa;
  border: 1px solid #dee2e6;
  color: var(--color-gray-900);
  font-weight: 500;
  padding: 15px 20px;
  border-radius: 8px 8px 0 0;
}
.accordion-button:not(.collapsed) {
  background-color: var(--color-brand-3);
  color: white;
}
.accordion-button:focus {
  box-shadow: none;
  border-color: var(--color-brand-3);
}
.accordion-body {
  padding: 20px;
  border: 1px solid #dee2e6;
  border-top: none;
  border-radius: 0 0 8px 8px;
  background-color: white;
}
.accordion-body ul {
  margin-bottom: 15px;
}
.accordion-body ul li {
  margin-bottom: 8px;
  padding-left: 15px;
  position: relative;
}
.accordion-body ul li:before {
  content: "•";
  color: var(--color-brand-3);
  font-weight: bold;
  position: absolute;
  left: 0;
}
.sidebar-border {
  border: 1px solid #eee;
  padding: 20px;
  border-radius: 8px;
}
.contact-info a {
  text-decoration: none;
}
.contact-info a:hover {
  text-decoration: underline;
}
</style>

<script>
// Smooth scrolling for FAQ navigation
document.addEventListener('DOMContentLoaded', function() {
  const navLinks = document.querySelectorAll('.faq-nav-link');

  navLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      const targetId = this.getAttribute('href');
      const targetSection = document.querySelector(targetId);

      if (targetSection) {
        targetSection.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  });
});
</script>
@endsection
