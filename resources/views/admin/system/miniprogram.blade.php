@extends('admin.layouts.app')

@section('content')

<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-fl">微信小程序配置</div>
                    <div class="widget-function am-fr">
                        <a href="javascript:;" class="am-icon-cog"></a>
                    </div>
                </div>
                <div class="widget-body am-fr">

                    <form action="{{ URL('admin/system/update') }}" method="POST" class="am-form tpl-form-line-form">

                    	{{ csrf_field() }}
                    	
                    	<div class="am-form-group">
                            <label for="user-phone" class="am-u-sm-3 am-form-label">AppID </label>
                            <div class="am-u-sm-9">
                                <input type="text" name='WECHAT_MINI_PROGRAM_APPID' class="tpl-form-input" placeholder="请输入公众号APPID" value="{{ env('WECHAT_MINI_PROGRAM_APPID') }}">
                            </div>
                        </div>
                        
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">AppSecret </label>
                            <div class="am-u-sm-9">
                                <input type="text" name='WECHAT_MINI_PROGRAM_SECRET' class="tpl-form-input" placeholder="请输入公众号SECRET" value="{{ env('WECHAT_MINI_PROGRAM_SECRET') }}">
                            </div>
                        </div>

<!--                         <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">Token</label>
                            <div class="am-u-sm-9">
                                <input type="text" name='mini_program_token' class="tpl-form-input" placeholder="请输入公众号TOKEN" value="{{ env('mini_program_token') }}">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">AESKey</label>
                            <div class="am-u-sm-9">
                                <input type="text" name='mini_program_aeskey' class="tpl-form-input" placeholder="请输入公众号AESKEY " value="{{ env('mini_program_aeskey') }}">
                            </div>
                        </div> -->
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