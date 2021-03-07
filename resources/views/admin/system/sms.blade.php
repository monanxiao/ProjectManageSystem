@extends('admin.layouts.app')

@section('content')
	
	<div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">短信配置</div>
                        <div class="widget-function am-fr">
                            <a href="javascript:;" class="am-icon-cog"></a>
                        </div>
                    </div>
                    <div class="widget-body am-fr">

                        <form action="{{ URL('admin/system/update') }}" method="POST" class="am-form tpl-form-line-form">

                        	{{ csrf_field() }}
                        	
                        	<div class="am-form-group">
                                <label for="user-phone" class="am-u-sm-3 am-form-label">短信Api <span class="tpl-form-line-small-title">SmsApi</span></label>
                                <div class="am-u-sm-9">
                                    <select name='CLOUD_SMS' data-am-selected="{searchBox: 1}" style="display: none;">
                                      <option value="smschinese" {{ systemGet("CLOUD_SMS") == "smschinese" ? "selected" : ""}}>网建</option>
                                      <!-- <option value="aliyunoss" >阿里云</option> -->
                                      <!-- <option value="tencentco">腾讯云COS</option>
                                      <option value="qiniukodo" >七牛云Kodo</option> -->
                                    </select>
                                </div>
                            </div>
                            
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">用户 <span class="tpl-form-line-small-title">Account</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='SMSUID' class="tpl-form-input" placeholder="请输入用户名" value="{{ env('SMSUID') }}">
                                    <small>用户账号获取：<a class="am-badge am-badge-success am-round item-feed-badge" href="http://www.smschinese.cn/User/?action=pass" target="_blank">直达链接！</a></small>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">密钥 <span class="tpl-form-line-small-title">Key</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='SMSKEY' class="tpl-form-input" placeholder="请输入接口Key" value="{{ env('SMSKEY') }}">
                                    <small>短信Key获取：<a class="am-badge am-badge-success am-round item-feed-badge" href="http://www.smschinese.cn/User/?action=key" target="_blank">直达链接！</a></small>
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