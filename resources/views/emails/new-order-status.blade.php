<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - Salem Apparel</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #E2B808, #f4d03f);
            color: #1a1a1a;
            padding: 40px 30px;
            text-align: center;
        }

        .header h1 {
            margin: 0 0 10px 0;
            font-size: 32px;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        .header .subtitle {
            margin: 0;
            font-size: 18px;
            opacity: 0.9;
            font-weight: 500;
        }

        .content {
            padding: 40px 30px;
        }

        .greeting {
            font-size: 20px;
            color: #1a1a1a;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .thank-you-section {
            background: linear-gradient(135deg, #e8f5e8, #f0fdf0);
            border-left: 5px solid #28a745;
            padding: 25px;
            margin: 25px 0;
            border-radius: 8px;
        }

        .thank-you-section h2 {
            margin: 0 0 15px 0;
            color: #28a745;
            font-size: 22px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .order-details {
            background-color: #f8f9fa;
            border: 2px solid #E2B808;
            border-radius: 12px;
            padding: 25px;
            margin: 25px 0;
            text-align: center;
        }

        .order-details h3 {
            margin: 0 0 20px 0;
            color: #1a1a1a;
            font-size: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .order-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin: 20px 0;
        }

        .order-item {
            background-color: #ffffff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .order-item .label {
            font-size: 14px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
        }

        .order-item .value {
            font-size: 18px;
            font-weight: bold;
            color: #1a1a1a;
        }

        .order-id {
            color: #E2B808 !important;
            font-size: 24px !important;
            letter-spacing: 1px;
        }

        .status-badge {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border-radius: 25px;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 3px 10px rgba(40, 167, 69, 0.3);
        }

        .next-steps {
            background: linear-gradient(135deg, #e3f2fd, #f1f8ff);
            border: 1px solid #90caf9;
            border-radius: 12px;
            padding: 25px;
            margin: 25px 0;
        }

        .next-steps h3 {
            margin: 0 0 15px 0;
            color: #1976d2;
            font-size: 18px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .next-steps ul {
            margin: 15px 0;
            padding-left: 20px;
            color: #666;
        }

        .next-steps li {
            margin: 8px 0;
            line-height: 1.5;
        }

        .contact-section {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            text-align: center;
        }

        .contact-section h4 {
            margin: 0 0 10px 0;
            color: #856404;
            font-size: 16px;
        }

        .contact-section p {
            margin: 0;
            color: #664d03;
        }

        .social-links {
            text-align: center;
            margin: 25px 0;
        }

        .social-links a {
            display: inline-block;
            margin: 0 10px;
            padding: 10px 15px;
            background-color: #E2B808;
            color: #1a1a1a;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background-color: #1a1a1a;
            color: #E2B808;
            transform: translateY(-2px);
        }

        .footer {
            background-color: #1a1a1a;
            color: #ffffff;
            padding: 30px;
            text-align: center;
        }

        .footer .company-name {
            color: #E2B808;
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .footer .tagline {
            margin: 10px 0;
            opacity: 0.9;
            font-style: italic;
        }

        .footer .contact-info {
            margin: 15px 0;
            font-size: 14px;
            opacity: 0.8;
        }

        @media (max-width: 600px) {
            .email-container {
                margin: 10px;
                border-radius: 5px;
            }

            .order-info {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .header, .content, .footer {
                padding: 20px;
            }

            .social-links a {
                display: block;
                margin: 5px auto;
                max-width: 200px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>🎉 Order Confirmed!</h1>
            <p class="subtitle">Thank you for choosing Salem Apparel</p>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="greeting">
                Hello {{ $order->user->name }},
            </div>

            <!-- Thank You Section -->
            <div class="thank-you-section">
                <h2>✅ Thank You for Your Order!</h2>
                <p style="margin: 0; font-size: 16px; line-height: 1.6;">
                    We're thrilled that you've chosen Salem Apparel for your workwear and custom apparel needs.
                    Your order has been successfully received and is now being carefully processed by our team.
                </p>
            </div>

            <!-- Order Details -->
            <div class="order-details">
                <h3>📦 Your Order Details</h3>
                @php
                    // Calculate total price using the same logic as order-details.blade.php
                    $customDesigns = $order->custom_designs;
                    if (is_string($customDesigns)) {
                        $customDesigns = json_decode($customDesigns, true) ?: [];
                    }
                    $customDesigns = is_array($customDesigns) ? $customDesigns : [];
                    
                    // Calculate total quantity
                    $orderSizes = is_array($order->sizes) ? $order->sizes : json_decode($order->sizes, true);
                    $totalQuantity = collect($orderSizes)->map(fn($q) => (int)$q)->sum();
                    
                    // Calculate custom design prices
                    $totalDesignPrice = 0;
                    foreach($customDesigns as $design) {
                        if(isset($design['decoration']) && $design['decoration'] === 'print') {
                            $totalDesignPrice += 13 * $totalQuantity;
                        } elseif(isset($design['decoration']) && $design['decoration'] === 'embroidery') {
                            $totalDesignPrice += 15 * $totalQuantity;
                        }
                    }
                    
                    // Calculate final total: (unit price * quantity) + design prices
                    $calculatedTotal = ($order->unit_price * $totalQuantity) + $totalDesignPrice;
                @endphp
                
                <div class="order-info">
                    <div class="order-item">
                        <div class="label">Order Number</div>
                        <div class="value order-id">#{{ $order->ref }}</div>
                    </div>
                    <div class="order-item">
                        <div class="label">Current Status</div>
                        <div class="status-badge">{{ ucfirst($order->status) }}</div>
                    </div>
                    <div class="order-item">
                        <div class="label">Total Quantity</div>
                        <div class="value">{{ $totalQuantity }} items</div>
                    </div>
                    <div class="order-item">
                        <div class="label">Total Amount</div>
                        <div class="value" style="font-weight: bold; color: #28a745;">£{{ number_format($calculatedTotal, 2) }}</div>
                    </div>
                </div>

                @if($order->created_at)
                <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #dee2e6;">
                    <div class="label" style="color: #666; font-size: 14px;">Order Placed</div>
                    <div style="font-size: 16px; color: #333; margin-top: 5px;">
                        {{ $order->created_at->format('F j, Y \a\t g:i A') }}
                    </div>
                </div>
                @endif
            </div>

            <!-- Next Steps -->
            <div class="next-steps">
                <h3>📋 What Happens Next?</h3>
                <ul>
                    <li><strong>Order Processing:</strong> Our team is now reviewing your order details and custom requirements</li>
                    <li><strong>Production:</strong> Once confirmed, your items will go into production with our quality standards</li>
                    <li><strong>Quality Check:</strong> Every item is inspected to ensure it meets our high standards</li>
                    <li><strong>Shipping Notification:</strong> You'll receive an email with tracking information once your order ships</li>
                    <li><strong>Delivery:</strong> Your custom apparel will be delivered to your specified address</li>
                </ul>
            </div>

            <!-- Contact Section -->
            <div class="contact-section">
                <h4>💬 Questions About Your Order?</h4>
                <p>
                    Our customer service team is here to help! Feel free to reply to this email
                    or contact us if you have any questions about your order.
                </p>
            </div>

            <!-- Social Links -->
            <div class="social-links">
                <a href="#" style="text-decoration: none;">📧 Contact Us</a>
                <a href="#" style="text-decoration: none;">🌐 Visit Website</a>
                <a href="#" style="text-decoration: none;">📱 Follow Us</a>
            </div>

            <p style="margin-top: 30px; color: #666; font-size: 14px; text-align: center;">
                This is an automated confirmation email. Please keep this for your records.
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="company-name">Salem Apparel</div>
            <div class="tagline">"Professional Workwear & Custom Apparel Solutions"</div>
            <div class="contact-info">
                Quality clothing for professionals | Custom embroidery & printing services
            </div>
            <div style="margin-top: 15px; font-size: 12px; opacity: 0.7;">
                © {{ date('Y') }} Salem Apparel. All rights reserved.
            </div>
        </div>
    </div>
</body>

</html>
