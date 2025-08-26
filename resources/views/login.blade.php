
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>تسجيل الدخول - شارك</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/style.css" rel="stylesheet">
  <!-- rel icon -->
    <link rel="icon" type="image/x-icon" href="../assets/images/fav.png">
</head>
<body class="d-flex align-items-center" style="height: 100vh;">
  <div class="d-flex login-split">
    <!-- Right: Cover & Info -->
    <div class="login-right flex-grow-1 position-relative">
      <div class="login-logo">
        <img src="./assets/images/logo.png" alt="شارك">
      </div>
      <div class="d-flex flex-column justify-content-center align-items-start h-100" style="margin-top:80px;z-index: 2;">
        <span class="badge-modal">نموذج شفاف 👌</span>
        <h1 class="fw-bold mb-3" style="font-size:2.5rem;">ابدأ استثمارك على شارك <span style="font-size:2rem;">🚀</span></h1>
      </div>
      <div class="login-footer">
        جميع الحقوق محفوظة لموقع شارك | 2025@ Sharik
      </div>
    </div>
    <!-- Left: Login Form -->
    <div class="login-left flex-grow-1">
      <div class="login-form-box">
        <div class="login-avatar mb-2">
          <svg width="48" height="48" fill="none" stroke="#1E4262" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-3.314 3.134-6 7-6s7 2.686 7 6"/></svg>
        </div>
        <h4 class="fw-bold text-center mb-1">تسجيل دخول</h4>
        <div class="text-center text-muted mb-5" style="font-size:1.05rem;">
          قم بتسجيل دخول لحسابك على منصة شارك <span style="font-size:1.2em;">👋</span>
        </div>
        <form action="{{route('web.login')}}" method="POST">
          @csrf
          <div class="mb-3">
            <label class="form-label fw-bold">رقم الجوال / البريد الإلكتروني</label>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="رقم جوالك أو إيميلك ..." name="email">
              <span class="input-group-text ">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M24 0V24H0V0H24Z" fill="white" fill-opacity="0.01"/>
<g opacity="0.3">
<path d="M20 18.5C20 20.433 16.4183 21 12 21C7.58172 21 4 20.433 4 18.5C4 16.567 7.58172 14 12 14C16.4183 14 20 16.567 20 18.5Z" fill="#1E4262"/>
<path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" fill="#1E4262"/>
</g>
<path d="M20 18.5C20 20.433 16.4183 21 12 21C7.58172 21 4 20.433 4 18.5C4 16.567 7.58172 14 12 14C16.4183 14 20 16.567 20 18.5Z" stroke="#1E4262" stroke-width="1.5"/>
<path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#1E4262" stroke-width="1.5"/>
</svg>
              </span>
            </div>
          </div>
          <div class="mb-2">
            <label class="form-label fw-bold">كلمة المرور</label>
            <div class="input-group">
              <input type="password" name="password" class="form-control" placeholder="اكتب كلمة مرورك ...">
              <span class="input-group-text">
                <svg width="20" height="20" fill="none" stroke="#1E4262" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/></svg>
              </span>
            </div>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
            <!-- <div class="form-check">
              <input class="form-check-input" type="checkbox" id="rememberMe" checked>
              <label class="form-check-label" for="rememberMe">تذكرني</label>
            </div> -->
            <!-- <div>
              <a href="#" class="text-primary fw-bold" style="font-size:0.98rem;">نسيت كلمة المرور؟</a>
            </div> -->
            
          </div>
          <button type="submit" class="btn w-100" style="background:#1E4262;color:#fff;font-size:1.15rem;">تسجيل دخول</button>
        </form>
        <div class="text-center mt-5">
          <span>ليس لديك حساب ؟ <a href="{{ route('web.register') }}" class="fw-bold text-primary">إنشاء حساب جديد</a></span>
        </div>
      </div>
    </div>
    
  </div>
</body>
</html>
