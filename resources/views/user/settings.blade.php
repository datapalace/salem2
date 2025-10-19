@extends('layout.usermaster')

@section('usercontent')
<main class="main">
    <section class="section-box pt-60 pb-60 bg-gray-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="card shadow-sm">
                        <div class="card-header" style="background-color: #E2B808; color: #1a1a1a;">
                            <h4 class="mb-0" style="font-weight: 600;"><i class="fa fa-cog me-2"></i>Account Settings</h4>
                        </div>
                        <div class="card-body">
                            <!-- Success/Error Messages -->
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fa fa-exclamation-circle me-2"></i>{{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Settings Tabs -->
                            <ul class="nav nav-tabs" id="settingsTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab">
                                        <i class="fa fa-user me-2"></i>Profile
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password" type="button" role="tab">
                                        <i class="fa fa-lock me-2"></i>Password
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="notifications-tab" data-bs-toggle="tab" data-bs-target="#notifications" type="button" role="tab">
                                        <i class="fa fa-bell me-2"></i>Notifications
                                    </button>
                                </li>
                            </ul>

                            <div class="tab-content mt-4" id="settingsTabsContent">
                                <!-- Profile Settings -->
                                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                    <form action="{{ route('settings.update.profile') }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="name" class="form-label">Full Name *</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                       value="{{ old('name', Auth::guard('customer')->user()->name) }}" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="email" class="form-label">Email Address *</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                       value="{{ old('email', Auth::guard('customer')->user()->email) }}" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="username" class="form-label">Username *</label>
                                                <input type="text" class="form-control" id="username" name="username"
                                                       value="{{ old('username', Auth::guard('customer')->user()->username) }}" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="phone" class="form-label">Phone Number</label>
                                                <input type="tel" class="form-control" id="phone" name="phone"
                                                       value="{{ old('phone', Auth::guard('customer')->user()->phone ?? '') }}">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <textarea class="form-control" id="address" name="address" rows="3">{{ old('address', Auth::guard('customer')->user()->address ?? '') }}</textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="city" class="form-label">City</label>
                                                <input type="text" class="form-control" id="city" name="city"
                                                       value="{{ old('city', Auth::guard('customer')->user()->city ?? '') }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="country" class="form-label">Country</label>
                                                <select class="form-control" id="country" name="country">
                                                    <option value="">Select Country</option>
                                                    <option value="United Kingdom" {{ (Auth::guard('customer')->user()->country ?? '') == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                                                    <option value="United States" {{ (Auth::guard('customer')->user()->country ?? '') == 'United States' ? 'selected' : '' }}>United States</option>
                                                    <option value="Canada" {{ (Auth::guard('customer')->user()->country ?? '') == 'Canada' ? 'selected' : '' }}>Canada</option>
                                                    <option value="Australia" {{ (Auth::guard('customer')->user()->country ?? '') == 'Australia' ? 'selected' : '' }}>Australia</option>
                                                    <option value="Germany" {{ (Auth::guard('customer')->user()->country ?? '') == 'Germany' ? 'selected' : '' }}>Germany</option>
                                                    <option value="France" {{ (Auth::guard('customer')->user()->country ?? '') == 'France' ? 'selected' : '' }}>France</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="text-end">
                                            <button type="submit" class="btn btn-salem-primary">
                                                <i class="fa fa-save me-2"></i>Update Profile
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Password Settings -->
                                <div class="tab-pane fade" id="password" role="tabpanel">
                                    <form action="{{ route('settings.update.password') }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label for="current_password" class="form-label">Current Password *</label>
                                            <input type="password" class="form-control" id="current_password" name="current_password" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="new_password" class="form-label">New Password *</label>
                                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                                            <div class="form-text">Password must be at least 8 characters long.</div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="new_password_confirmation" class="form-label">Confirm New Password *</label>
                                            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                                        </div>

                                        <div class="text-end">
                                            <button type="submit" class="btn btn-salem-primary">
                                                <i class="fa fa-lock me-2"></i>Update Password
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Notification Settings -->
                                <div class="tab-pane fade" id="notifications" role="tabpanel">
                                    <form action="{{ route('settings.update.notifications') }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <h6 class="mb-3">Email Notifications</h6>

                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="order_updates" name="notifications[]" value="order_updates"
                                                       {{ in_array('order_updates', Auth::guard('customer')->user()->notification_preferences ?? []) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="order_updates">
                                                    Order Status Updates
                                                </label>
                                                <div class="form-text">Receive emails when your order status changes</div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="promotions" name="notifications[]" value="promotions"
                                                       {{ in_array('promotions', Auth::guard('customer')->user()->notification_preferences ?? []) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="promotions">
                                                    Promotional Offers
                                                </label>
                                                <div class="form-text">Receive emails about special offers and discounts</div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="new_products" name="notifications[]" value="new_products"
                                                       {{ in_array('new_products', Auth::guard('customer')->user()->notification_preferences ?? []) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="new_products">
                                                    New Product Announcements
                                                </label>
                                                <div class="form-text">Be the first to know about new arrivals</div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="newsletter" name="notifications[]" value="newsletter"
                                                       {{ in_array('newsletter', Auth::guard('customer')->user()->notification_preferences ?? []) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="newsletter">
                                                    Newsletter
                                                </label>
                                                <div class="form-text">Monthly newsletter with tips and updates</div>
                                            </div>
                                        </div>

                                        <div class="text-end">
                                            <button type="submit" class="btn btn-salem-primary">
                                                <i class="fa fa-bell me-2"></i>Update Preferences
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Account Actions -->
                    <div class="card mt-4 shadow-sm">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="fa fa-exclamation-triangle me-2"></i>Account Actions</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <h6>Download Your Data</h6>
                                    <p class="text-muted small">Download a copy of your account data and order history.</p>
                                    <a href="{{ route('settings.download.data') }}" class="btn btn-outline-info btn-sm">
                                        <i class="fa fa-download me-2"></i>Download Data
                                    </a>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <h6 class="text-danger">Delete Account</h6>
                                    <p class="text-muted small">Permanently delete your account and all associated data.</p>
                                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                                        <i class="fa fa-trash me-2"></i>Delete Account
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Delete Account Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Delete Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Warning:</strong> This action cannot be undone. Deleting your account will:</p>
                <ul>
                    <li>Permanently delete your profile and account data</li>
                    <li>Remove your order history</li>
                    <li>Clear your wishlist</li>
                    <li>Cancel any pending orders</li>
                </ul>
                <p>Are you sure you want to delete your account?</p>

                <form action="{{ route('settings.delete.account') }}" method="POST" id="deleteAccountForm">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3">
                        <label for="delete_password" class="form-label">Enter your password to confirm:</label>
                        <input type="password" class="form-control" id="delete_password" name="password" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="deleteAccountForm" class="btn btn-danger">
                    <i class="fa fa-trash me-2"></i>Delete My Account
                </button>
            </div>
        </div>
    </div>
</div>

<style>
/* Salem Theme Colors */
:root {
    --salem-primary: #E2B808;
    --salem-dark: #1a1a1a;
    --salem-light: #f8f9fa;
    --salem-border: #e9ecef;
    --salem-text: #6c757d;
}

.card {
    border: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.nav-tabs .nav-link {
    border: none;
    color: var(--salem-text);
    padding: 12px 20px;
    transition: all 0.3s ease;
}

.nav-tabs .nav-link.active {
    background-color: var(--salem-primary);
    color: var(--salem-dark);
    border-radius: 4px;
    font-weight: 600;
}

.nav-tabs .nav-link:hover {
    background-color: var(--salem-light);
    border: none;
    color: var(--salem-dark);
}

.form-control:focus {
    border-color: var(--salem-primary);
    box-shadow: 0 0 0 0.2rem rgba(226, 184, 8, 0.25);
}

.btn-salem-primary {
    background-color: var(--salem-primary);
    border-color: var(--salem-primary);
    color: var(--salem-dark);
    font-weight: 600;
    padding: 10px 25px;
    transition: all 0.3s ease;
}

.btn-salem-primary:hover {
    background-color: #d4a306;
    border-color: #d4a306;
    color: var(--salem-dark);
    transform: translateY(-1px);
}

.btn-salem-primary:focus {
    box-shadow: 0 0 0 0.2rem rgba(226, 184, 8, 0.5);
}

.form-check-input:checked {
    background-color: var(--salem-primary);
    border-color: var(--salem-primary);
}

.form-check-input:focus {
    border-color: var(--salem-primary);
    box-shadow: 0 0 0 0.25rem rgba(226, 184, 8, 0.25);
}

.alert-success {
    background-color: rgba(226, 184, 8, 0.1);
    border-color: var(--salem-primary);
    color: var(--salem-dark);
}

.alert-danger {
    background-color: rgba(220, 53, 69, 0.1);
    border-color: #dc3545;
    color: #721c24;
}

.btn-outline-info {
    color: var(--salem-primary);
    border-color: var(--salem-primary);
}

.btn-outline-info:hover {
    background-color: var(--salem-primary);
    border-color: var(--salem-primary);
    color: var(--salem-dark);
}

.btn-outline-danger:hover {
    background-color: #dc3545;
    border-color: #dc3545;
}

.modal-header {
    background-color: var(--salem-light);
    border-bottom: 2px solid var(--salem-primary);
}

.card-header h5 {
    color: var(--salem-dark);
    font-weight: 600;
}

@media (max-width: 768px) {
    .nav-tabs {
        flex-direction: column;
    }

    .nav-tabs .nav-link {
        text-align: center;
    }
}
</style><script>
// Password confirmation validation
document.getElementById('new_password_confirmation').addEventListener('input', function() {
    const password = document.getElementById('new_password').value;
    const confirmation = this.value;

    if (password !== confirmation) {
        this.setCustomValidity('Passwords do not match');
    } else {
        this.setCustomValidity('');
    }
});

// Form validation feedback
document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', function(e) {
        if (!form.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
        }
        form.classList.add('was-validated');
    });
});
</script>
@endsection
