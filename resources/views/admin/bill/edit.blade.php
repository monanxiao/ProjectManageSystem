@extends('admin.layouts.app')

@section('content') 

	<div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12"> 
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">{{ $bill->BillName }}-账单编辑</div>
                    </div>
                    <div class="widget-body am-fr">
                        <form action="{{ route('bill.update',$bill->id) }}" class="am-form tpl-form-line-form" method="POST">

                        	{{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="am-form-group">
                                <label  class="am-u-sm-3 am-form-label">账单名称 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name='BillName' value="{{ $bill->BillName }}" data-role="tagsinput">

                                    @error('BillName')
									    <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
										  <button type="button" class="am-close">&times;</button>
										  <p>{{ $message }}</p>
										</div>
									@enderror
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">所属客户 </label>
                                <div class="am-u-sm-9">
                                    <select name='customer_id' >
                                    	<option value="">请选择客户</option>
                                        @foreach($customer as $cv)
                                            <option value="{{ $cv->id }}" {{ $bill->customer_id == $cv->id ?: 'selected' }}>{{ $cv->customerName }}</option>
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
                                <label class="am-u-sm-3 am-form-label">收款方式 </label>
                                <div class="am-u-sm-9">
                                    <select name='EarningMode' >

                                        <option value="支付宝" {{ $bill->EarningMode == '支付宝' ?: 'selected' }}>支付宝</option>
                                        <option value="微信" {{ $bill->EarningMode == '微信' ?: 'selected' }}>微信</option>
                                        <option value="银行卡" {{ $bill->EarningMode == '银行卡' ?: 'selected' }}>银行卡</option>
                                      
                                    </select>
                                    @error('EarningMode')
									    <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
										  <button type="button" class="am-close">&times;</button>
										  <p>{{ $message }}</p>
										</div>
									@enderror
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">收款时间 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='earningTime' value="{{ $bill->earningTime }}" id="my-start-2">
                                    @error('earningTime')
                                        <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
                                          <button type="button" class="am-close">&times;</button>
                                          <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">收款金额 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='earningPrice' value="{{ $bill->earningPrice }}">
                                    @error('earningPrice')
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
                                            <option value="{{ $pv->id }}" {{ $bill->project_id == $cv->id ?: 'selected' }}>项目--{{ $pv->projectName }}</option>
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
                                <label class="am-u-sm-3 am-form-label">所属服务（可选）</label>
                                <div class="am-u-sm-9">
                                    <select  name='server_id' >

                                        <option value="">请选择项目</option>

                                        @foreach($server as $sv)
                                            <option value="{{ $sv->id }}" {{ $bill->server_id == $cv->id ?: 'selected' }}>服务--{{ $sv->serverName }}</option>
                                        @endforeach
                                      
                                    </select>
                                    @error('server_id')
                                        <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
                                          <button type="button" class="am-close">&times;</button>
                                          <p>{{ $message }}</p>
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-intro" class="am-u-sm-3 am-form-label">注释内容</label>
                                <div class="am-u-sm-9">
                                    <textarea class="" name="earningAnnotation" rows="10" id="user-intro" placeholder="请输入文章内容">{{ $bill->earningAnnotation }}</textarea>
                                </div>
                            </div>


                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <button type="sublime" class="am-btn am-btn-primary tpl-btn-bg-color-success ">更新账单</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

      $(function() {
        var nowTemp = new Date();
        var nowDay = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0).valueOf();
        var nowMoth = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), 1, 0, 0, 0, 0).valueOf();
        var nowYear = new Date(nowTemp.getFullYear(), 0, 1, 0, 0, 0, 0).valueOf();
        var $myStart2 = $('#my-start-2');

        var checkin = $myStart2.datepicker({
          onRender: function(date, viewMode) {
            // 默认 days 视图，与当前日期比较
            var viewDate = nowDay;

            switch (viewMode) {
              // moths 视图，与当前月份比较
              case 1:
                viewDate = nowMoth;
                break;
              // years 视图，与当前年份比较
              case 2:
                viewDate = nowYear;
                break;
            }

            return date.valueOf() < viewDate ? 'am-disabled' : '';
          }
        }).on('changeDate.datepicker.amui', function(ev) {
            if (ev.date.valueOf() > checkout.date.valueOf()) {
              var newDate = new Date(ev.date)
              newDate.setDate(newDate.getDate() + 1);
              checkout.setValue(newDate);
            }
            checkin.close();
            $('#my-end-2')[0].focus();
        }).data('amui.datepicker');

        var checkout = $('#my-end-2').datepicker({
          onRender: function(date, viewMode) {
            var inTime = checkin.date;
            var inDay = inTime.valueOf();
            var inMoth = new Date(inTime.getFullYear(), inTime.getMonth(), 1, 0, 0, 0, 0).valueOf();
            var inYear = new Date(inTime.getFullYear(), 0, 1, 0, 0, 0, 0).valueOf();

            // 默认 days 视图，与当前日期比较
            var viewDate = inDay;

            switch (viewMode) {
              // moths 视图，与当前月份比较
              case 1:
                viewDate = inMoth;
                break;
              // years 视图，与当前年份比较
              case 2:
                viewDate = inYear;
                break;
            }

            return date.valueOf() <= viewDate ? 'am-disabled' : '';
          }
        }).on('changeDate.datepicker.amui', function(ev) {
          checkout.close();
        }).data('amui.datepicker');
      });
    </script>
@endsection