@extends('admin.layouts.app')

@section('content') 

	<div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">附件配置</div>
                        <div class="widget-function am-fr">
                            <a href="javascript:;" class="am-icon-cog"></a>
                        </div>
                    </div>
                    <div class="widget-body am-fr">

                        <form action="{{ URL('admin/system/update') }}" method="POST" class="am-form tpl-form-line-form">

                        	{{ csrf_field() }}
                        	
                        	<div class="am-form-group">
                                <label for="user-phone" class="am-u-sm-3 am-form-label">储存服务器 <span class="tpl-form-line-small-title">Server</span></label>
                                <div class="am-u-sm-9">
                                    <select name='CLOUD_STORE' data-am-selected="{searchBox: 1}" style="display: none;">
                                      <option value="local" {{ env("CLOUD_STORE") == "local" ? "selected" : ""}}>本地服务器</option>
                                      <option value="aliyunoss" {{ env("CLOUD_STORE") == "aliyunoss" ? "selected" : ""}}>阿里云OSS</option>
                                      <!-- <option value="tencentco" {{ env("cloud_store") == "tencentco" ? "selected" : ""}}>腾讯云COS</option>
                                      <option value="qiniukodo" {{ env("cloud_store") == "qiniukodo" ? "selected" : ""}}>七牛云Kodo</option> -->
                                    </select>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-phone" class="am-u-sm-3 am-form-label">网络 <span class="tpl-form-line-small-title">Network</span></label>
                                <div class="am-u-sm-9">
                                    <select name='OSS_NETWORK_TYPE' data-am-selected="{searchBox: 1}" style="display: none;">
                                      <option value="外网" {{ env("OSS_NETWORK_TYPE") == "外网" ? "selected" : ""}}>外网</option>
                                      <option value="内网" {{ env("OSS_NETWORK_TYPE") == "内网" ? "selected" : ""}}>内网</option>
                                    </select>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-phone" class="am-u-sm-3 am-form-label">请求方式 <span class="tpl-form-line-small-title">GetType</span></label>
                                <div class="am-u-sm-9">
                                    <select name='OSS_GET_TYPE' data-am-selected="{searchBox: 1}" style="display: none;">
                                      <option value="http" {{ env("OSS_GET_TYPE") == "http" ? "selected" : ""}}>http</option>
                                      <option value="https" {{ env("OSS_GET_TYPE") == "https" ? "selected" : ""}}>https</option>
                                    </select>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-phone" class="am-u-sm-3 am-form-label">区域 <span class="tpl-form-line-small-title">Area</span></label>
                                <div class="am-u-sm-9">
                                    <select name='OSS_CITY' data-am-selected="{searchBox: 1}" style="display: none;">

                                      @foreach(config('aliyunoss.CityURLArray') as $ak => $av)
                                      	<option value="{{ $ak }}" {{ env("OSS_CITY") == $ak ? "selected" : ""}}>{{ $ak }}</option>
                                      @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">AccessKeyId <span class="tpl-form-line-small-title">AccessKeyId</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='OSS_AccessKeyId' class="tpl-form-input" placeholder="请输入AccessKeyId" value="{{ env('OSS_AccessKeyId') }}">
                                    <small>AccessKeyId获取：<a class="am-badge am-badge-success am-round item-feed-badge" href="https://usercenter.console.aliyun.com/#/manage/ak" target="_blank">直达链接！</a></small>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">AccessKeySecret <span class="tpl-form-line-small-title">Bucket</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='OSS_AccessKeySecret' class="tpl-form-input" placeholder="请输入AccessKeySecret" value="{{ env('OSS_AccessKeySecret') }}">
                                    <small>AccessKeySecret获取：<a class="am-badge am-badge-success am-round item-feed-badge" href="https://usercenter.console.aliyun.com/#/manage/ak" target="_blank">直达链接！</a></small>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">Bucket名称 <span class="tpl-form-line-small-title">Bucket</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='OSS_BUCKET' class="tpl-form-input" placeholder="请输入Bucket" value="{{ env('OSS_BUCKET') }}">
                                    <small>请输入创建的Bucket名称，如创建的:oss-item，就填入：oss-item即可！</small>
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