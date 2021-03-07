@extends('admin.layouts.app')

@section('content') 

    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">项目立项</div>
                    </div>
                    <div class="widget-body am-fr">
                        <form action="{{ route('project.update',$project->id) }}" class="am-form tpl-form-line-form" method="POST">

                        	{{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="am-form-group">
                                <label  class="am-u-sm-3 am-form-label">项目名称 <span class="tpl-form-line-small-title">ProjectName</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name='projectName' value="{{ $project->projectName }}" data-role="tagsinput">

                                    @error('projectName')
									    <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
										  <button type="button" class="am-close">&times;</button>
										  <p>{{ $message }}</p>
										</div>
									@enderror
                                </div>
                            </div>


                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">所属客户 <span class="tpl-form-line-small-title">Consumer</span></label>
                                <div class="am-u-sm-9">
                                    <select data-am-selected="{searchBox: 1}" name='customer_id' style="display: none;">

                                        @foreach($customer as $cv)
                                            <option value="{{ $cv->id }}" {{ $cv->id == $project->customer_id ? "selected" : "" }} >
                                                {{ $cv->customerName }}
                                            </option>
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
                                <label class="am-u-sm-3 am-form-label">预估金额 <span class="tpl-form-line-small-title">EstimatePrice</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='estimatedPrice' value='{{ $project->estimatedPrice }}'>
                                    @error('estimatedPrice')
                                        <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
                                          <button type="button" class="am-close">&times;</button>
                                          <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                           <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">实际金额 <span class="tpl-form-line-small-title">RealityPrice</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='realPrice' value='{{ $project->realPrice }}'>
                                    @error('realPrice')
									    <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
										  <button type="button" class="am-close">&times;</button>
										  <p>{{ $message }}</p>
										</div>
									@enderror
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">预付金额 <span class="tpl-form-line-small-title">PrepayPrice</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='prepayPrice' value='{{ $project->prepayPrice }}'>
                                    @error('prepayPrice')
                                        <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
                                          <button type="button" class="am-close">&times;</button>
                                          <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">开始/结束时间 <span class="tpl-form-line-small-title">ProjectPeriod</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='begindate' value="{{ $project->projectPeriod['startime'] }}" data-am-datepicker="" readonly="">
                                    @error('begindate')
                                        <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
                                          <button type="button" class="am-close">&times;</button>
                                          <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                    <input type="text" name='finishdate' value="{{ $project->projectPeriod['stoptime'] }}" data-am-datepicker="" readonly="">
                                    @error('finishdate')
                                        <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
                                          <button type="button" class="am-close">&times;</button>
                                          <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">实际完成时间 <span class="tpl-form-line-small-title">ActuaTime</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='actuaTime' value="{{ $project->actuaTime }}" data-am-datepicker="" readonly="">
                                    @error('actuaTime')
									    <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
										  <button type="button" class="am-close">&times;</button>
										  <p>{{ $message }}</p>
										</div>
									@enderror
                                </div>
                            </div>

                             <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">项目版本 <span class="tpl-form-line-small-title">ProjectVersions</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='versions' value="{{ $project->versions }}">
                                    @error('versions')
                                        <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
                                          <button type="button" class="am-close">&times;</button>
                                          <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <button type="sublime" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交变更</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection