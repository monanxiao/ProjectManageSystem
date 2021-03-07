<!-- 侧边导航栏 -->
<div class="left-sidebar">
    <!-- 用户信息 -->
    <div class="tpl-sidebar-user-panel">
        <div class="tpl-user-panel-slide-toggleable">
            <div class="tpl-user-panel-profile-picture">
                <img src="/assets/img/user04.png" alt="">
            </div>
            <span class="user-panel-logged-in-text">
                <i class="am-icon-circle-o am-text-success tpl-user-panel-status-icon"></i>
                @auth('admin')
                    {{ auth('admin')->user()->username }}
                @endauth

                @guest('admin')
                    未登录
                @endguest
            </span>
            <a href="javascript:;" class="tpl-user-panel-action-link"> <span class="am-icon-pencil"></span> 账号设置</a>
        </div>
    </div>

    <!-- 菜单 -->
    <ul class="sidebar-nav">
        <li class="sidebar-nav-link">
            <a href="{{ route('home') }}" class="active">
                <i class="am-icon-home sidebar-nav-link-logo"></i> 首页
            </a>
        </li>
        <li class="sidebar-nav-link">
            <a href="{{ route('consumer.index') }}">
                <i class="am-icon-table sidebar-nav-link-logo"></i> 客户档案
            </a>
        </li>
        <li class="sidebar-nav-link">
            <a href="{{ route('project.index') }}">
                <i class="am-icon-calendar sidebar-nav-link-logo"></i> 项目管理
            </a>
        </li>
        <li class="sidebar-nav-link">
            <a href="{{ route('remindserver.index') }}">
                <i class="am-icon-wpforms sidebar-nav-link-logo"></i> 服务通知
            </a>
        </li>
        <li class="sidebar-nav-link">
            <a href="{{ route('bill.index') }}">
                <i class="am-icon-bar-chart sidebar-nav-link-logo"></i> 账单流水

            </a>
        </li>

        <li class="sidebar-nav-link">
            <a href="javascript:;" class="sidebar-nav-sub-title">
                <i class="am-icon-table sidebar-nav-link-logo"></i> 系统配置
                <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
            </a>
            <ul class="sidebar-nav sidebar-nav-sub">
                <li class="sidebar-nav-link">
                    <a href="{{ route('system.attach') }}">
                        <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 附件上传
                    </a>
                </li>

                <li class="sidebar-nav-link">
                    <a href="{{ route('system.sms') }}">
                        <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 短信配置
                    </a>
                </li>
                <li class="sidebar-nav-link">
                    <a href="{{ route('system.email') }}">
                        <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 邮箱配置
                    </a>
                </li>
                <li class="sidebar-nav-link">
                    <a href="{{ route('system.offiaccount') }}">
                        <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 微信公众号
                    </a>
                </li>
                <li class="sidebar-nav-link">
                    <a href="{{ route('system.miniprogram') }}">
                        <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 微信小程序
                    </a>
                </li>
                <li class="sidebar-nav-link">
                    <a href="{{ route('system.wechatpay') }}">
                        <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 微信支付
                    </a>
                </li>

            </ul>
        </li>

    </ul>
</div>