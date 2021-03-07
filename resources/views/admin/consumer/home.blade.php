@extends('admin.layouts.app')

@section('content') 
    
    <!-- 内容区域 -->
    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title  am-cf">客户管理</div>
                    </div>

                    <div class="widget-body  widget-body-lg am-fr">

                        <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                            <div class="am-form-group">
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <button type="button" class="am-btn am-btn-default am-btn-success" onclick='window.location.href="{{ route("consumer.create") }}" '><span class="am-icon-plus"></span> 新增</button>
                                        <!-- <button type="button" class="am-btn am-btn-default am-btn-secondary"><span class="am-icon-save"></span> 保存</button>
                                        <button type="button" class="am-btn am-btn-default am-btn-warning"><span class="am-icon-archive"></span> 审核</button>
                                        <button type="button" class="am-btn am-btn-default am-btn-danger"><span class="am-icon-trash-o"></span> 删除</button>  -->
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

                        <div class="am-scrollable-horizontal ">
                            <table width="100%" class="am-table am-table-compact am-text-nowrap tpl-table-black">
                                <thead>
                                    <tr>
                                        <th>姓名</th>
                                        <th>联系地址</th>
                                        <th>联系方式</th>
                                        <th>创建时间</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($customer as $cv)

                                        <tr class="gradeX">
                                            <td>{{ $cv->customerName }}</td>
                                            <td>
                                                {{ $cv->address['state'] . $cv->address['city'] . ' ' . $cv->address['address']}}
                                            </td>
                                            <td>
                                                邮箱:{{ $cv->contactWay['email'] ?? '无' }}
                                                手机:{{ $cv->contactWay['phone'] ?? '无' }}
                                                qq:{{ $cv->contactWay['qq'] ?? '无' }}
                                            </td>
                                            <td>{{ $cv->created_at }}</td>
                                            <td>
                                                <div class="tpl-table-black-operation">
                                                    <a href="{{ route('consumer.edit',$cv->id) }}">
                                                        <i class="am-icon-pencil"></i> 编辑
                                                    </a>
                                                    <a class="tpl-table-black-operation-del" href="javascript:;" onclick="document.getElementById('delete_form_{{ $cv->id }}').submit();">
                                                        <form id='delete_form_{{ $cv->id }}' action="{{ route('consumer.destroy',$cv->id) }}" method="POST">
                                                            
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
                                {{ $customer->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>



        </div>


    </div>
    
@endsection
