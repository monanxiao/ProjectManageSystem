<!DOCTYPE html>
<html lang="en">

@include('admin.layouts._head')

<body data-type="login">
    <script src="/assets/js/theme.js"></script>
    <div class="am-g tpl-g">
        <div class="tpl-login">
            <div class="tpl-login-content">
                <div class="tpl-login-logo">
                </div>

                <form action="{{ route('login') }}" method="POST" class="am-form tpl-form-line-form">

                    {{ csrf_field() }}
                    
                    <div class="am-form-group">
                        <input type="text" name='account' class="tpl-form-input" id="user-name" value='monanxiao' placeholder="请输入账号">

                    </div>

                    <div class="am-form-group">
                        <input type="password" name='password' class="tpl-form-input" id="user-name" value='123456' placeholder="请输入密码">

                    </div>
                    <div class="am-form-group tpl-login-remember-me">
                        <input id="remember-me" name='remember' type="checkbox">
                        <label for="remember-me">
       
                        记住密码
                         </label>
                    </div>

                    <div class="am-form-group">

                        <button type="submit" class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn">登入</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/assets/js/amazeui.min.js"></script>
    <script src="/assets/js/app.js"></script>

</body>

</html>