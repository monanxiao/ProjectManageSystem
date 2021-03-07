@extends('admin.layouts.app')

@section('content') 

	<div class="row-content am-cf">

		<div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title  am-cf">提醒服务</div>
                    </div>
                    <div class="widget-body  am-fr">
                        <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                            <div class="am-form-group">
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <button type="button" class="am-btn am-btn-default am-btn-success" onclick='window.location.href="{{ route("remindserver.create") }}" '><span class="am-icon-plus"></span> 增加服务</button>
                                        <!-- <button type="button" class="am-btn am-btn-default am-btn-secondary"><span class="am-icon-save"></span> 保存</button>
                                        <button type="button" class="am-btn am-btn-default am-btn-warning"><span class="am-icon-archive"></span> 审核</button>
                                        <button type="button" class="am-btn am-btn-default am-btn-danger"><span class="am-icon-trash-o"></span> 删除</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                            <div class="am-form-group tpl-table-list-select">
                                <select data-am-selected="{btnSize: 'sm'}">
						            <option value="option1">所有类别</option>
						            <option value="option2">IT业界</option>
						            <option value="option3">数码产品</option>
						            <option value="option3">笔记本电脑</option>
						            <option value="option3">平板电脑</option>
						            <option value="option3">只能手机</option>
						            <option value="option3">超极本</option>
						        </select>
                            </div>
                        </div>
                        <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                            <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                <input type="text" class="am-form-field ">
                                <span class="am-input-group-btn">
					            	<button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" type="button"></button>
					          	</span>
                            </div>
                        </div>

                        <div class="am-u-sm-12">
                            <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                <thead>
                                    <tr>
                                        <th>项目总数</th>
                                        <th>即将到期</th>
                                        <th>正常运行</th>
                                        <th>暂停中</th>
                                        <th>已过期</th>
                                        <th>提醒次数</th>
                                        <th>短信提醒</th>
                                        <th>邮件提醒</th>
                                        <th>微信提醒</th>
                                        <th>剩余短信</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<tr class="gradeX">
                                            <td>{{ $remindserver->total() }}个</td>
                                            <td>{{ $datastat[2]['num'] }}个</td>
                                            <td>{{ $datastat[0]['num'] }}个</td>
                                            <td>{{ $datastat[1]['num'] }}个</td>
                                            <td>{{ $datastat[3]['num'] }}个</td>
                                            <td>{{ $times->timenum }}次</td>
                                            <td>{{ $times->smsnum }}条</td>
                                            <td>{{ $times->emailnum }}封</td>
                                            <td>{{ $times->wechatnum }}次</td>
                                            <td>{{ smsnum() }}条</td>
                                    </tr>

                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl"><span class="am-badge am-badge-danger am-round item-feed-badge">服务列表</span></div>
                    </div>
                    <div class="widget-body  widget-body-lg am-fr">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black">
                            <thead>
                                <tr>
                                    <th>服务名称</th>
                                    <th>项目/客户</th>
                                    <th>服务价格</th>
                                    <th>服务状态</th>
                                    <th>开始/截至日期</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($remindserver as $rv)
                                        <tr class="gradeX">
                                            <td>{{ $rv->serverName }}</td>
                                            <td>{{$rv->items->projectName ?? '无' }} / {{ $rv->consumers->customerName ?? '无' }}</td>
                                            <td>{{ $rv->serverPrice }} 元</td>
                                            <td>
                                                @switch($rv->serverStatus)
                                                    @case(0)
                                                        <span class="am-badge am-badge-success am-round item-feed-badge">运行中</span>
                                                        @break
                                                    @case(1)
                                                        <span class="am-badge am-badge-warning am-round item-feed-badge">暂停</span>
                                                        @break
                                                    @case(2)
                                                        <span class="am-badge am-badge-danger am-round item-feed-badge">欠费</span>
                                                        @break
                                                    @case(3)
                                                        <span class="am-badge am-badge-default am-round item-feed-badge">终止</span>
                                                        @break
                                                    @default
                                                        状态错误
                                                @endswitch
                                            </td>
                                            <td>{{ $rv->serverPeriod['startime'] }}---{{ $rv->serverPeriod['stoptime'] }}</td>
                                            <td>
                                            <div class="tpl-table-black-operation">
                                               <!--  <a href="javascript:;">
                                                    <i class="am-icon-pencil"></i> 编辑
                                                </a> -->

                                                <div class="am-btn-group">
                                                      <div class="am-dropdown" data-am-dropdown>
                                                        <button class="am-dropdown-toggle" data-am-dropdown-toggle> 
                                                            <i class="am-icon-volume-down"></i> 提醒
                                                        </button>
                                                        <ul class="am-dropdown-content">
                                                            <li class="am-dropdown-header">请选择提醒方式</li>
                                                            <li>
                                                                <a href="{{ route('send.type.remindserver',['email',$rv->id]) }}">邮箱</a>
                                                            </li>
                                                            <!-- <li>
                                                                <a href="{{ route('send.type.remindserver',['wechat',$rv->id]) }}">微信</a>
                                                            </li> -->
                                                            <li>
                                                                <a href="{{ route('send.type.remindserver',['sms',$rv->id]) }}">短信</a></li>
                                                            <li >
                                                                <a href="{{ route('send.type.remindserver',['all',$rv->id]) }}">全部</a>
                                                            </li>
                                                        </ul>
                                                      </div>
                                                </div>

                                            </div>
                                        </td>
                                        </tr>
                                    @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="am-u-lg-12 am-cf">

                        <div class="am-fr">

                            {{ $remindserver->links() }}
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>

@endsection