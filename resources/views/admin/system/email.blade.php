@extends('admin.layouts.app')

@section('content')
	
	<div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">邮箱配置</div>
                        <div class="widget-function am-fr">
                            <a href="javascript:;" class="am-icon-cog"></a>
                        </div>
                    </div>
                    <div class="widget-body am-fr">

                        <form action="{{ URL('admin/system/update') }}" method="POST" class="am-form tpl-form-line-form">

                        	{{ csrf_field() }}
                        	
                        	<div class="am-form-group">
                                <label for="user-phone" class="am-u-sm-3 am-form-label">SMTP 服务器地址 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='MAIL_HOST' class="tpl-form-input" placeholder="请输入邮箱服务器地址，如：smtp.qq.com" value="{{ env('MAIL_HOST') }}">
                                </div>
                            </div>
                            
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">SMTP 服务器端口 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='MAIL_PORT' class="tpl-form-input" placeholder="请输入邮箱服务器端口，如:25" value="{{ env('MAIL_PORT') }}">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">邮箱账号</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='MAIL_USERNAME' class="tpl-form-input" placeholder="请输入邮箱账号" value="{{ env('MAIL_USERNAME') }}">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">邮箱密码</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='MAIL_PASSWORD' class="tpl-form-input" placeholder="请输入邮箱密码" value="{{ env('MAIL_PASSWORD') }}">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection