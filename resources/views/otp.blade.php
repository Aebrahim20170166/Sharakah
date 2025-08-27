<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>تفعيل الحساب - شارك</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <!-- rel icon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('images/fav.png') }}">
</head>

<body class="d-flex align-items-center" style="height: 100vh;">
  <div class="d-flex login-split">
    <!-- Right: Cover & Info -->
    <div class="login-right flex-grow-1 position-relative">
      <div class="login-logo">
        <img src="{{ asset('images/logo.png') }}" alt="شارك">
      </div>
      <div class="d-flex flex-column justify-content-center align-items-start h-100"
        style="margin-top:80px;z-index: 2;">
        <span class="badge-modal">نموذج شفاف 👌</span>
        <h1 class="fw-bold mb-3" style="font-size:2.5rem;">ابدأ استثمارك على شارك <span
            style="font-size:2rem;">🚀</span></h1>
      </div>
      <div class="login-footer">
        جميع الحقوق محفوظة لموقع شارك | 2025@ Sharik
      </div>
    </div>
    <!-- Left: Login Form -->
    <div class="login-left flex-grow-1">
      <!-- <a href="register.html" class="otp-back">
        <svg width="22" height="22" fill="none" stroke="#299FDA" stroke-width="2" viewBox="0 0 24 24">
          <path d="M15 18l-6-6 6-6" />
        </svg>
        عودة
      </a> -->
      <div class="otp-box position-relative">
        <div class="otp-icon mb-2">
          <svg width="36" height="36" fill="none" stroke="#299FDA" stroke-width="2" viewBox="0 0 24 24">
            <polygon points="12,2 22,8 22,16 12,22 2,16 2,8" fill="#f5fbff" stroke="#299FDA" />
            <path d="M8 12l2 2 4-4" stroke="#299FDA" stroke-width="2" fill="none" />
          </svg>
        </div>
        <h4 class="fw-bold mb-3">تفعيل حسابك</h4>
        <div class="text-muted mb-4" style="font-size:1.05rem;">
          أدخل كود التفعيل المرسل إلى بريدك الإلكتروني<br>
          <span class="fw-bold text-dark"> {{ $email ?? '' }}</span>
        </div>
        {{-- رسائل النجاح/الحالة --}}
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('status'))
        <div class="alert alert-info">{{ session('status') }}</div>
        @endif

        {{-- ملخص الأخطاء --}}
        @if ($errors->any())
        <div class="alert alert-danger">
          <div class="fw-bold mb-1">فضلًا صحّح الأخطاء التالية:</div>
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <form method="post" action="{{ route('web.verify_otp') }}">
          @csrf
          <div class="otp-inputs mb-5">
            <input type="hidden" name="email" value="{{ $email ?? '' }}">
            <input type="hidden" name="type" value="{{ $type ?? '' }}">
            <input name="otp[]" type="text" maxlength="1" pattern="[0-9]*" inputmode="numeric" required>
            <input name="otp[]" type="text" maxlength="1" pattern="[0-9]*" inputmode="numeric" required>
            <input name="otp[]" type="text" maxlength="1" pattern="[0-9]*" inputmode="numeric" required>
            <input name="otp[]" type="text" maxlength="1" pattern="[0-9]*" inputmode="numeric" required>
            <input name="otp[]" type="text" maxlength="1" pattern="[0-9]*" inputmode="numeric" required>
          </div>
          <button type="submit" class="btn w-100"
            style="background:#1E4262;color:#fff;font-size:1.15rem;">تأكيد</button>
        </form>
        <div class="mt-4">
          <span class="text-muted">لم يصلك الكود ؟</span>
          <a href="#" class="fw-bold text-primary">أعد إرسال الكود</a>
        </div>
      </div>
    </div>

  </div>

  <script>
    // Auto-focus next input
    document.querySelectorAll('.otp-inputs input').forEach((input, idx, arr) => {
      input.addEventListener('input', function() {
        if (this.value.length === 1 && idx < arr.length - 1) arr[idx + 1].focus();
      });
      input.addEventListener('keydown', function(e) {
        if (e.key === "Backspace" && !this.value && idx > 0) arr[idx - 1].focus();
      });
    });
  </script>
</body>

</html>