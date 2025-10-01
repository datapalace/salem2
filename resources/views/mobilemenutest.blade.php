<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Menu Test</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; }
        .burger {
            position: fixed; top: 20px; left: 20px; z-index: 2000;
            width: 40px; height: 40px; background: #E2B808; border-radius: 8px;
            display: flex; align-items: center; justify-content: center; cursor: pointer;
        }
        .burger span {
            display: block; width: 24px; height: 3px; background: #fff; margin: 3px 0;
        }
        .mobile-header-active {
            position: fixed; top: 0; left: 0; width: 80vw; max-width: 320px; height: 100vh;
            background: #fff; z-index: 3000; box-shadow: 2px 0 16px rgba(0,0,0,0.08);
            transform: translateX(-100%); transition: transform 0.3s;
        }
        .mobile-header-active.show { transform: translateX(0); }
        .mobile-header-close { position: absolute; top: 15px; right: 15px; font-size: 24px; cursor: pointer; }
        .mobile-menu-list { padding: 60px 0 0 0; }
        .mobile-menu-list a {
            display: block; padding: 18px 30px; color: #333; text-decoration: none; font-size: 18px;
            border-bottom: 1px solid #eee; transition: background 0.2s, color 0.2s;
        }
        .mobile-menu-list a:hover { background: #fff8e1; color: #E2B808; }
        .mobile-menu-overlay {
            position: fixed; top: 0; left: 0; width: 100vw; height: 100vh;
            background: rgba(0,0,0,0.3); z-index: 2500; display: none;
        }
        .mobile-menu-overlay.show { display: block; }
    </style>
</head>
<body>
    <div class="burger" id="burgerMenu">
        <span></span><span></span><span></span>
    </div>
    <div class="mobile-header-active" id="mobileMenu">
        <div class="mobile-header-close" id="closeMenu">&times;</div>
        <nav class="mobile-menu-list">
            <a href="/">🏠 Home</a>
            <a href="/shop">🛒 Shop</a>
            <a href="/about-us">ℹ️ About Us</a>
            <a href="/contact-us">📧 Contact</a>
            <a href="/privacy-policy">🛡️ Privacy Policy</a>
        </nav>
    </div>
    <div class="mobile-menu-overlay" id="menuOverlay"></div>
    <script>
        const burger = document.getElementById('burgerMenu');
        const menu = document.getElementById('mobileMenu');
        const closeBtn = document.getElementById('closeMenu');
        const overlay = document.getElementById('menuOverlay');
        burger.onclick = function() {
            menu.classList.add('show');
            overlay.classList.add('show');
            document.body.style.overflow = 'hidden';
        };
        closeBtn.onclick = overlay.onclick = function() {
            menu.classList.remove('show');
            overlay.classList.remove('show');
            document.body.style.overflow = '';
        };
        document.querySelectorAll('.mobile-menu-list a').forEach(link => {
            link.onclick = function() {
                setTimeout(() => {
                    menu.classList.remove('show');
                    overlay.classList.remove('show');
                    document.body.style.overflow = '';
                }, 100);
            };
        });
    </script>
    <div style="padding: 100px 20px; text-align: center; color: #888;">This is a standalone mobile menu test page.<br>Try it on your phone or resize your browser.</div>
</body>
</html>
