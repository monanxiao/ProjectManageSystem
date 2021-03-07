@extends('admin.layouts.app')

@section('content') 

    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">新增提醒服务</div>
                    </div>
                    <div class="widget-body am-fr">
                        <form action="{{ route('remindserver.store') }}" class="am-form tpl-form-line-form" method="POST">

                            {{ csrf_field() }}

                            <div class="am-form-group">
                                <label  class="am-u-sm-3 am-form-label">服务名称 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name='serverName' placeholder="请输入服务名称" data-role="tagsinput">

                                    @error('serverName')
                                        <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
                                          <button type="button" class="am-close">&times;</button>
                                          <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">所属客户</label>
                                <div class="am-u-sm-9">

                                    <select  name='customer_id'>
                                        <option value="">请选择客户</option>
                                        @foreach($consumer as $cv)
                                            <option value="{{ $cv->id }}">客户--{{ $cv->customerName }}</option>
                                        @endforeach
                                      
                                    </select>
                                    @error('customer_id')
                                        <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
                                          <button type="button" class="am-close">&times;</button>
                                          <p>{{ $message }}</p>
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">所属项目（可选）</label>
                                <div class="am-u-sm-9">
                                    <select  name='project_id' >

                                        <option value="">请选择项目</option>

                                        @foreach($project as $pv)
                                            <option value="{{ $pv->id }}">项目--{{ $pv->projectName }}</option>
                                        @endforeach
                                      
                                    </select>
                                    @error('project_id')
                                        <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
                                          <button type="button" class="am-close">&times;</button>
                                          <p>{{ $message }}</p>
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="am-form-group">

                                <label class="am-u-sm-3 am-form-label">提醒方式 </label>

                                <div class="am-u-sm-9">
                                    <label class="am-checkbox-inline">
                                        <input type="checkbox" name="email" value="email" checked /> 邮件
                                    </label>
                                    <label class="am-checkbox-inline">
                                        <input type="checkbox" name="sms" value="sms"> 短信
                                    </label>
                                    <label class="am-checkbox-inline">
                                        <input type="checkbox" name="wechat" value="wechat" checked /> 微信公众号
                                    </label>
                                </div>

                            </div>
                              

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">服务价格 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='serverPrice' placeholder='0.00'>
                                    @error('estimatedPrice')
                                        <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
                                          <button type="button" class="am-close">&times;</button>
                                          <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">开始/结束时间 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='begindate' value="{{ date('Y-m-d H:i:s') }}" id="my-start-2">
                                    @error('begindate')
                                        <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
                                          <button type="button" class="am-close">&times;</button>
                                          <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                    <input type="text" name='finishdate' value="{{ date('Y-m-d H:i:s',strtotime('7 days')) }}" id="my-end-2">
                                    @error('finishdate')
                                        <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
                                          <button type="button" class="am-close">&times;</button>
                                          <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <button type="sublime" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection