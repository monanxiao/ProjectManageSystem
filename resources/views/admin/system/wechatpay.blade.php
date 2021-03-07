@extends('admin.layouts.app')

@section('content')

<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-fl">微信支付</div>
                    <div class="widget-function am-fr">
                        <a href="javascript:;" class="am-icon-cog"></a>
                    </div>
                </div>
                <div class="widget-body am-fr">

                    <form action="{{ URL('admin/system/update') }}" method="POST" class="am-form tpl-form-line-form">

                    	{{ csrf_field() }}
                    	
                    	<div class="am-form-group">
                            <label for="user-phone" class="am-u-sm-3 am-form-label">沙箱模式 </label>
                            <div class="am-u-sm-9">

                                <select name='WECHAT_PAYMENT_SANDBOX' data-am-selected="{searchBox: 1}" style="display: none;">
                                      <option value="false" {{ env("WECHAT_PAYMENT_SANDBOX") == "false" ? "selected" : ""}}>关闭</option>
                                      <option value="true" {{ env("WECHAT_PAYMENT_SANDBOX") == "true" ? "selected" : ""}}>开启</option>
         
                                    </select>
                            </div>
                        </div>
                        
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">公众号APPID </label>
                            <div class="am-u-sm-9">
                                <input type="text" name='WECHAT_PAYMENT_APPID' class="tpl-form-input" placeholder="请输入公众号APPID" value="{{ env('WECHAT_PAYMENT_APPID') }}">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">商户号mch_id</label>
                            <div class="am-u-sm-9">
                                <input type="text" name='WECHAT_PAYMENT_MCH_ID' class="tpl-form-input" placeholder="请输入商户号" value="{{ env('WECHAT_PAYMENT_MCH_ID') }}">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">API 密钥</label>
                            <div class="am-u-sm-9">
                                <input type="text" name='WECHAT_PAYMENT_KEY' class="tpl-form-input" placeholder="请输入API 密钥" value="{{ env('WECHAT_PAYMENT_KEY') }}">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">回调地址</label>
                            <div class="am-u-sm-9">
                                <input type="text" name='WECHAT_PAYMENT_NOTIFY_URL' class="tpl-form-input" placeholder="请输入API 密钥" value="{{ env('WECHAT_PAYMENT_NOTIFY_URL') }}">
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