@extends('admin.layouts.app')

@section('content') 

    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">客户建档</div>
                    </div>
                    <div class="widget-body am-fr">
                        <form action="{{ route('consumer.store') }}" class="am-form tpl-form-line-form" method="POST">

                        	{{ csrf_field() }}

                            <div class="am-form-group">
                                <label  class="am-u-sm-3 am-form-label">客户名称 <span class="tpl-form-line-small-title">ConsumerName</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name='customerName' placeholder="请输入客户姓名" data-role="tagsinput">

                                    @error('customerName')
									    <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
										  <button type="button" class="am-close">&times;</button>
										  <p>{{ $message }}</p>
										</div>
									@enderror
                                </div>
                            </div>


                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">客户地址 <span class="tpl-form-line-small-title">ConsumerAddress</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='state' placeholder="请输入客户所在省">
                                    @error('address')
									    <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
										  <button type="button" class="am-close">&times;</button>
										  <p>{{ $message }}</p>
										</div>
									@enderror
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">客户地址 <span class="tpl-form-line-small-title">ConsumerAddress</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='city' placeholder="请输入客户所在市">
                                    @error('address')
                                        <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
                                          <button type="button" class="am-close">&times;</button>
                                          <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">客户地址 <span class="tpl-form-line-small-title">ConsumerAddress</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='address' placeholder="请输入客户所在区县">
                                    @error('address')
                                        <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
                                          <button type="button" class="am-close">&times;</button>
                                          <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                           <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">联系方式QQ <span class="tpl-form-line-small-title">ConsumerOne</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='qq' placeholder="联系方式">
                                    @error('qq')
									    <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
										  <button type="button" class="am-close">&times;</button>
										  <p>{{ $message }}</p>
										</div>
									@enderror
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">联系方式手机号 <span class="tpl-form-line-small-title">ConsumerTwo</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='phone' placeholder="联系方式">
                                    @error('phone')
									    <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
										  <button type="button" class="am-close">&times;</button>
										  <p>{{ $message }}</p>
										</div>
									@enderror
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">联系方式 <span class="tpl-form-line-small-title">ConsumerThree</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='email' placeholder="联系方式">
                                    @error('email')
									    <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
										  <button type="button" class="am-close">&times;</button>
										  <p>{{ $message }}</p>
										</div>
									@enderror
                                </div>
                            </div>

                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <button type="sublime" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交档案</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection