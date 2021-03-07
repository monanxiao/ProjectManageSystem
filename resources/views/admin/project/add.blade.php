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
                        <form action="{{ route('project.store') }}" class="am-form tpl-form-line-form" method="POST">

                        	{{ csrf_field() }}

                            <div class="am-form-group">
                                <label  class="am-u-sm-3 am-form-label">项目名称 <span class="tpl-form-line-small-title">ProjectName</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name='projectName' placeholder="请输入项目名称" data-role="tagsinput">

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
                                            <option value="{{ $cv->id }}">{{ $cv->customerName }}</option>
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
                                    <input type="text" name='estimatedPrice' placeholder='0.00'>
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
                                    <input type="text" name='realPrice' placeholder='0.00'>
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
                                    <input type="text" name='prepayPrice' placeholder='0.00'>
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

<!--                             <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">实际完成时间 <span class="tpl-form-line-small-title">ActuaTime</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='actuaTime' data-am-datepicker="" readonly="">
                                    @error('actuaTime')
									    <div class="am-alert am-alert-danger am-u-sm-6" data-am-alert>
										  <button type="button" class="am-close">&times;</button>
										  <p>{{ $message }}</p>
										</div>
									@enderror
                                </div>
                            </div> -->

                             <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">项目版本 <span class="tpl-form-line-small-title">ProjectVersions</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" name='versions' value='1.0'>
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
                                    <button type="sublime" class="am-btn am-btn-primary tpl-btn-bg-color-success ">立项</button>
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