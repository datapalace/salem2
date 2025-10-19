<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="description" content="Salem Apparel">
    <meta name="keywords" content="Home, page">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ ('userasset/imgs/template/logo.png') }}">
    <link href="{{ asset('userasset/css/style.css?v=3.0.0') }}" rel="stylesheet">

    <!-- FontAwesome for Mobile Menu -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Working Mobile Menu CSS from Test -->
    <style>
        /* Mobile Menu - Working Version from Test */
        .test-mobile-menu-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
            padding: 10px;
            background: #f0f0f0;
            border: 2px solid #E2B808;
            border-radius: 4px;
            margin-left: auto;
            z-index: 99999;
        }

        .test-mobile-menu-toggle span {
            width: 25px;
            height: 3px;
            background-color: #333;
            margin: 3px 0;
            transition: 0.3s;
            border-radius: 2px;
        }

        .test-mobile-menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.5);
            z-index: 99998;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .test-mobile-menu-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .test-mobile-menu-sidebar {
            position: fixed;
            top: 0;
            left: -320px;
            width: 320px;
            height: 100vh;
            background: #fff;
            z-index: 99999;
            transition: left 0.3s ease;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }

        .test-mobile-menu-sidebar.active {
            left: 0;
        }

        .test-mobile-menu-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #eee;
            background: #f8f9fa;
        }

        .test-mobile-menu-close {
            cursor: pointer;
            font-size: 20px;
            color: white;
            padding: 5px;
            background: #E2B808;
            border: none;
            border-radius: 4px;
        }

        .test-mobile-menu-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .test-mobile-menu-item {
            border-bottom: 1px solid #f0f0f0;
        }

        .test-mobile-menu-link {
            display: block;
            padding: 15px 20px;
            color: #333;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
            transition: all 0.3s ease;
            position: relative;
        }

        .test-mobile-menu-link:hover {
            color: #E2B808;
            background: #f8f9fa;
            text-decoration: none;
        }

        .test-mobile-submenu {
            list-style: none;
            margin: 0;
            padding: 0;
            background: #f8f9fa;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .test-mobile-submenu.active {
            max-height: 300px;
        }

        .test-mobile-submenu li a {
            display: block;
            padding: 12px 20px 12px 40px;
            color: #555;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
            border-bottom: 1px solid #e9ecef;
        }

        .test-mobile-submenu li a:hover {
            color: #E2B808;
            background: #fff;
            text-decoration: none;
        }

        .test-submenu-toggle {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            transition: transform 0.3s ease;
            font-size: 14px;
        }

        .test-has-submenu.active .test-submenu-toggle {
            transform: translateY(-50%) rotate(180deg);
        }

        /* Show mobile menu on smaller screens */
        @media (max-width: 1199px) {
            .test-mobile-menu-toggle {
                display: flex !important;
            }
        }

        @media (min-width: 1200px) {
            .test-mobile-menu-toggle {
                display: none !important;
            }
        }
    </style>
    <!-- Fabric.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.0/fabric.min.js"></script>
   <script src="https://js.stripe.com/v3/"></script>
   <style>
        .search-results-dropdown a:hover {
    background: #f8f9fa;
}
    </style>
     <style>


    .toolbar {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 10px;
      margin: 15px 0;
    }

    .toolbar input, .toolbar select, .toolbar button {
      padding: 6px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .toolbar label {
      background: #007bff;
      color: white;
      padding: 6px 12px;
      border-radius: 5px;
      cursor: pointer;
    }

    .toolbar button {
      background: #28a745;
      color: white;
      border: none;
    }

    .toolbar button:hover {
      background: #218838;
    }

    canvas {
      border: 1px solid #ccc;
      margin: 10px auto;
      display: block;
    }

    .slider-nav-thumbnails {
      display: flex;
      justify-content: center;
      gap: 10px;
    }

    .slider-nav-thumbnails img {
      width: 80px;
      height: 80px;
      object-fit: cover;
      cursor: pointer;
      border: 2px solid transparent;
    }

    .slider-nav-thumbnails img:hover {
      border-color: #333;
    }
  </style>
  <script>
    // 1. Add the modal HTML to your page (once, outside any loop)
    $('body').append(`

    `);

    // 2. Add a button to open the modal in your customizer toolbar (add this to your toolbar HTML)
    $('#customCanvasToolbar').append(`
      <button type="button" id="openServerImageModals" class="btn btn-outline-secondary btn-sm mb-1">Add from Gallery</button>
    `);

    // 3. Show the modal when the button is clicked
    $(document).on('click', '#openServerImageModal', function() {
        $('#serverImageModal').modal('show');
    });
</script>

<!-- Working Mobile Menu JavaScript from Test -->
<script>
// Mobile Menu Test Script - Working Version
document.addEventListener('DOMContentLoaded', function() {
    console.log('Test Mobile menu script loading...');

    const testMobileMenuToggle = document.getElementById('testMobileMenuToggle');
    const testMobileMenuOverlay = document.getElementById('testMobileMenuOverlay');
    const testMobileMenuSidebar = document.getElementById('testMobileMenuSidebar');
    const testMobileMenuClose = document.getElementById('testMobileMenuClose');

    console.log('Test Elements found:', {
        toggle: !!testMobileMenuToggle,
        overlay: !!testMobileMenuOverlay,
        sidebar: !!testMobileMenuSidebar,
        close: !!testMobileMenuClose
    });

    if (!testMobileMenuToggle || !testMobileMenuOverlay || !testMobileMenuSidebar || !testMobileMenuClose) {
        console.error('Test mobile menu elements not found!');
        return;
    }

    function openTestMobileMenu() {
        console.log('Opening test menu...');
        testMobileMenuOverlay.classList.add('active');
        testMobileMenuSidebar.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeTestMobileMenu() {
        console.log('Closing test menu...');
        testMobileMenuOverlay.classList.remove('active');
        testMobileMenuSidebar.classList.remove('active');
        document.body.style.overflow = '';
    }

    testMobileMenuToggle.addEventListener('click', function(e) {
        console.log('Test Toggle clicked!');
        e.preventDefault();
        openTestMobileMenu();
    });

    testMobileMenuClose.addEventListener('click', function(e) {
        console.log('Test Close clicked!');
        e.preventDefault();
        closeTestMobileMenu();
    });

    testMobileMenuOverlay.addEventListener('click', function(e) {
        console.log('Test Overlay clicked!');
        e.preventDefault();
        closeTestMobileMenu();
    });

    // Submenu toggles
    const testSubmenuItems = document.querySelectorAll('.test-has-submenu');
    testSubmenuItems.forEach(function(item) {
        const link = item.querySelector('.test-mobile-menu-link');
        const submenu = item.querySelector('.test-mobile-submenu');

        if (link && submenu) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Test Submenu toggled');
                item.classList.toggle('active');
                submenu.classList.toggle('active');
            });
        }
    });

    // Close menu when clicking direct links
    const testDirectLinks = document.querySelectorAll('.test-mobile-menu-link[href]:not([href="#"])');
    testDirectLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            closeTestMobileMenu();
        });
    });

    console.log('Test Mobile menu initialized successfully');
});
</script>


  </head>
<body>
