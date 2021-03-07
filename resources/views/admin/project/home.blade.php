@extends('admin.layouts.app')


@section('content') 

    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title  am-cf">项目列表</div>
                    </div>
                    <div class="widget-body  am-fr">
                        <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                            <div class="am-form-group">
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <button type="button" class="am-btn am-btn-default am-btn-success" onclick='window.location.href="{{ route("project.create") }}" '><span class="am-icon-plus"></span> 立项</button>
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
                                        <th>项目名称</th>
                                        <th>客户名称</th>
                                        <th>预估金额</th>
                                        <th>实际金额</th>
                                        <th>预付金额</th>
                                        <th>项目状态</th>
                                        <th>预开始/结束时间</th>
                                        <th>实际结束时间</th>
                                        <th>项目版本</th>
                                        <th>附件材料</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($project as $pv)
                                        <tr class="gradeX">
                                            <td>{{ $pv->projectName }}</td>
                                            <td>{{ $pv->consumers->customerName }}</td>
                                            <td>{{ $pv->estimatedPrice }}</td>
                                            <td>{{ $pv->realPrice }}</td>
                                            <td>{{ $pv->prepayPrice }}</td>
                                            <td>
                                                @switch($pv->implementStatus)
                                                    @case(0)
                                                        <span class="am-badge am-badge-success am-round item-feed-badge">已完成</span>
                                                        @break
                                                    @case(1)
                                                        <span class="am-badge am-badge-default am-round item-feed-badge">进行中</span>
                                                        @break
                                                    @case(2)
                                                        <span class="am-badge am-badge-danger am-round item-feed-badge">终止</span>
                                                        @break
                                                    @case(3)
                                                        <span class="am-badge am-badge-warning am-round item-feed-badge">暂停</span>
                                                        @break
                                                    @case(4)
                                                        <span class="am-badge am-badge-secondary am-round item-feed-badge">未开始</span>
                                                        @break
                                                    @default
                                                        状态错误
                                                @endswitch
                                            </td>
                                            <td>{{ $pv->projectPeriod['startime'] }} --- {{ $pv->projectPeriod['stoptime'] }}</td>
                                            <td>{{ $pv->actuaTime ?? '***'}}</td>
                                            <td>{{ $pv->versions }}</td>
                                            <td>
                                                <span>{{ $pv->attachedFiles ? count(json_decode($pv->attachedFiles,true)) : '0' }}个</span>
                                                <a class="am-badge am-badge-secondary am-round item-feed-badge" href="{{ route('file.all.project',$pv->id) }}">查看</a> 
                                            </td>
                                            <td>
                                                <div class="tpl-table-black-operation">
                                                    <a href="{{ route('project.edit',$pv->id) }}">
                                                        <i class="am-icon-pencil"></i> 编辑
                                                    </a>

                                                    <a class="tpl-table-black-operation-del" href="javascript:;"  onclick="document.getElementById('delete_form_{{ $pv->id }}').submit();">
                                                        <form id='delete_form_{{ $pv->id }}' action="{{ route('project.destroy',$pv->id) }}" method="POST">

                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            
                                                            <i class="am-icon-trash" ></i> 删除

                                                        </form> 
                                                    </a>
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>


                        <div class="am-u-lg-12 am-cf">

                            <div class="am-fr">

                                {{ $project->links() }}
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

