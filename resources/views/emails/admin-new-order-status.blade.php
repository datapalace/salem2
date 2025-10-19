<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Order Notification - Salem Apparel</title>
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
            max-width: 800px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #E2B808, #f4d03f);
            color: #1a1a1a;
            padding: 30px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        .header .subtitle {
            margin: 10px 0 0 0;
            font-size: 16px;
            opacity: 0.9;
        }

        .content {
            padding: 40px 30px;
        }

        .order-summary {
            background-color: #f8f9fa;
            border-left: 5px solid #E2B808;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
        }

        .order-summary h2 {
            margin: 0 0 15px 0;
            color: #1a1a1a;
            font-size: 20px;
            border-bottom: 2px solid #E2B808;
            padding-bottom: 10px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin: 20px 0;
        }

        .info-card {
            background-color: #ffffff;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .info-card h3 {
            margin: 0 0 15px 0;
            color: #E2B808;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid #E2B808;
            padding-bottom: 8px;
        }

        .info-item {
            margin: 8px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .info-label {
            font-weight: bold;
            color: #555;
            min-width: 100px;
        }

        .info-value {
            color: #333;
            text-align: right;
            flex: 1;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            background-color: #28a745;
            color: white;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .action-section {
            background-color: #e8f4fd;
            border: 1px solid #bee5eb;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            text-align: center;
        }

        .action-button {
            display: inline-block;
            background-color: #E2B808;
            color: #1a1a1a;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            box-shadow: 0 3px 10px rgba(226, 184, 8, 0.3);
        }

        .footer {
            background-color: #1a1a1a;
            color: #ffffff;
            padding: 20px 30px;
            text-align: center;
            font-size: 14px;
        }

        .footer .company-name {
            color: #E2B808;
            font-weight: bold;
        }

        @media (max-width: 600px) {
            .email-container {
                margin: 10px;
                border-radius: 5px;
            }

            .info-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .header, .content, .footer {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>🎉 New Order Received!</h1>
            <p class="subtitle">Salem Apparel Admin Notification</p>
        </div>

        <!-- Content -->
        <div class="content">
            <p style="font-size: 16px; margin-bottom: 25px;">
                Great news! A new order has been placed on Salem Apparel and requires your attention.
            </p>

            <!-- Order Summary -->
            <div class="order-summary">
                <h2>📦 Order Summary</h2>
                <div class="info-item">
                    <span class="info-label">Order ID:</span>
                    <span class="info-value" style="font-weight: bold; color: #E2B808;">#{{ $order->ref }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Status:</span>
                    <span class="status-badge">{{ ucfirst($order->status) }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Order Date:</span>
                    <span class="info-value">{{ $order->created_at->format('F j, Y \a\t g:i A') }}</span>
                </div>
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

                <div class="info-item">
                    <span class="info-label">Total Quantity:</span>
                    <span class="info-value">{{ $totalQuantity }} items</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Unit Price:</span>
                    <span class="info-value">£{{ number_format($order->unit_price, 2) }}</span>
                </div>
                @if($totalDesignPrice > 0)
                <div class="info-item">
                    <span class="info-label">Design/Decoration:</span>
                    <span class="info-value">£{{ number_format($totalDesignPrice, 2) }}</span>
                </div>
                @endif
                <div class="info-item">
                    <span class="info-label">Total Amount:</span>
                    <span class="info-value" style="font-weight: bold; color: #28a745;">£{{ number_format($calculatedTotal, 2) }}</span>
                </div>
            </div>

            <!-- Customer & Delivery Information -->
            <div class="info-grid">
                <!-- Customer Information -->
                <div class="info-card">
                    <h3>👤 Customer Details</h3>
                    <div class="info-item">
                        <span class="info-label">Name:</span>
                        <span class="info-value">{{ $order->user->name }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Email:</span>
                        <span class="info-value">{{ $order->user->email }}</span>
                    </div>
                    @if($order->user->phone)
                    <div class="info-item">
                        <span class="info-label">Phone:</span>
                        <span class="info-value">{{ $order->user->phone }}</span>
                    </div>
                    @endif
                </div>

                <!-- Shipping Information -->
                <div class="info-card">
                    <h3>🚚 Delivery Address</h3>
                    @if($order->shipping)
                        <div class="info-item">
                            <span class="info-label">Address:</span>
                            <span class="info-value">{{ $order->shipping->address }}</span>
                        </div>
                        @if($order->shipping->city)
                        <div class="info-item">
                            <span class="info-label">City:</span>
                            <span class="info-value">{{ $order->shipping->city }}</span>
                        </div>
                        @endif
                        @if($order->shipping->postcode)
                        <div class="info-item">
                            <span class="info-label">Postcode:</span>
                            <span class="info-value">{{ $order->shipping->postcode }}</span>
                        </div>
                        @endif
                        @if($order->shipping->country)
                        <div class="info-item">
                            <span class="info-label">Country:</span>
                            <span class="info-value">{{ $order->shipping->country }}</span>
                        </div>
                        @endif
                    @else
                        <p style="color: #666; font-style: italic;">No shipping address provided</p>
                    @endif
                </div>
            </div>

            <!-- Action Section -->
            <div class="action-section">
                <p style="margin: 0 0 15px 0; color: #0c5460; font-weight: bold;">
                    ⚡ Immediate Action Required
                </p>
                <p style="margin: 0 0 20px 0; color: #666;">
                    Please review and process this order in your admin dashboard to ensure timely fulfillment.
                </p>
                <!-- Note: Add your actual admin dashboard URL -->
                <!-- <a href="{{ url('/admin/orders/' . $order->id) }}" class="action-button">View Order Details</a> -->
            </div>

            <p style="margin-top: 30px; color: #666; font-size: 14px;">
                This is an automated notification from Salem Apparel's order management system.
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p style="margin: 0;">
                <span class="company-name">Salem Apparel</span> - Professional Workwear & Custom Apparel
            </p>
            <p style="margin: 5px 0 0 0; opacity: 0.8;">
                Admin Notification System
            </p>
        </div>
    </div>
</body>

</html>
