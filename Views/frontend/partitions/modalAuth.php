<div id="modal" class="modal">
        <div id="modal-body" class="modal-body">
            <!-- Register form  -->
            <div id="register-form" class="auth-form">
                <div class="auth-form-header">
                    <label class="auth-form-heading">
                        Đăng ký
                    </label>
                    <span id="btn-close-form-register"><i class="fa-solid fa-xmark"></i></span>
                </div>
                <form class="auth-form-body" action="?controller=home&action=register" method="post">
                    <input name="registered-name" type="text" placeholder="Name" required>
                    <input name="registered-email" type="email" placeholder="Email" required>
                    <input name="registered-password" type="password" minlength="6" placeholder="Password" required>
                    <button type="submit" name="submit" class="btn-auth">Đăng ký</button>
                    <div class="policy">
                        Bằng việc đăng ký, bạn đã đồng ý với 4 MEN về
                        <a href="#">Điều khoản dịch vụ</a>
                        &
                        <a href="#">Chính sách bảo mật</a>
                    </div>
                </form>
                <div class="auth-btn-switch">
                    Bạn đã có tài khoản? <span id="auth-btn-switch-login" class="auth-btn-switch-login"> Đăng
                        nhập</span>
                </div>
            </div>

            <!-- Login form  -->
            <div id="login-form" class="auth-form">
                <div class="auth-form-header">
                    <label class="auth-form-heading">
                        Đăng nhập
                    </label>
                    <span id="btn-close-form-login"><i class="fa-solid fa-xmark"></i></span>
                </div>
                <form class="auth-form-body" action="?controller=home&action=auth" method="post">
                    <input name="eCustomer" type="email" placeholder="Email" required>
                    <input name="pCustomer" type="password" minlength="6" placeholder="Password" required>
                    <button id="log-in" type="submit" name="submit" class="btn-auth">Đăng nhập</button>
                    <span>HOẶC</span>
                    <div class="auth-with">
                        <button class="auth-with-fb"> <i class="fa-brands fa-facebook"></i> Facebook</button>
                        <button class="auth-with-gg"><i class="fa-brands fa-google"></i> Google</button>
                    </div>

                </form>
                <div class="auth-btn-switch">
                    Bạn mới biết đến 4MEN ? <span id="auth-btn-switch-register" class="auth-btn-switch-login"> Đăng
                        ký</span>
                </div>
            </div>
        </div>
    </div>

