<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'المنصة')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')
</head>

<body>

    <!-- الهيدر -->
    <header class="header">
        <div class="container nav">
            <a class="brand" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="الشعار">
                <span class="title">منصة افتتاح الفروع</span>
            </a>
            <nav class="navlinks">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">الرئيسية</a>
                <a href="{{ route('opportunities') }}" class="{{ request()->routeIs('opportunities.*') ? 'active' : '' }}">الفرص</a>
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">لوحة المستثمر</a>
                <a href="{{ route('support') }}" class="{{ request()->routeIs('support') ? 'active' : '' }}">الدعم</a>
            </nav>
            <div class="cta">
                @guest
                    <a class="btn ghost" href="{{ route('registeration') }}">تسجيل الدخول</a>
                @endguest
                <a class="btn primary" href="{{ route('opportunities') }}">استثمر الآن</a>
            </div>
            <div class="cta">
                <button class="btn" id="themeToggle" title="تبديل السمة">السمة</button>
                <button class="btn" id="dirToggle" title="RTL/LTR">RTL / LTR</button>
            </div>
        </div>
    </header>

    <!-- المحتوى -->
    <main>
        @yield('content')
    </main>

    <!-- الفوتر -->
    <footer class="footer">
        <div class="container" style="display:flex; justify-content:space-between; align-items:center; gap:10px; flex-wrap:wrap;">
            <div>© 2025 منصة افتتاح الفروع. جميع الحقوق محفوظة.</div>
            <div class="chips">
                <a class="chip" href="{{ url('/faq') }}">الأسئلة الشائعة</a>
                <a class="chip" href="{{ url('/terms') }}">الشروط والأحكام</a>
                <a class="chip" href="{{ url('/privacy') }}">سياسة الخصوصية</a>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>

</html>