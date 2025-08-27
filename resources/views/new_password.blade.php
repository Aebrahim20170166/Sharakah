<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>استرجاع كلمة المرور - شارك</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center" style="height: 100vh;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <h3 class="mb-4 text-center">كلمة السر الجديدة</h3>
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
        <form action="{{ route('changePassoword') }}" method="POST">
          @csrf
          <input type="hidden" name="email" value="{{ $email }}">
          <div class="mb-3">
            <label class="form-label"> كلمة السر الجديدة</label>
            <input class="form-control" type="password" name="password" required>
          </div>
          <button class="btn btn-primary w-100">إرسال كلمة السر الجديدة</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>