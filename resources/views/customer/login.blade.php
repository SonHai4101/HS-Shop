
<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.header')
</head>
<body class="login-page" style="min-height: 466px;">
    <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a class="h2">Chào mừng bạn đến với <b>HS Shop!</b></a>
        </div>
        <div class="card-body">
          <p class="login-box-msg">Vui lòng đăng nhập để mua hàng</p>
    
          <form action="../../index3.html" method="post">
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-7">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember">
                  <label for="remember">
                    Remember Me
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-5">
                <button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          {{-- <p class="mb-1">
            <a href="forgot-password.html">I forgot my password</a>
          </p> --}}
          <p class="mt-2 mb-0">
            <a href="register.html" class="text-center">Đăng ký tài khoản mới</a>
          </p>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.login-box -->
    
  @include('admin.footer')
    
    
    </body>
</html>
