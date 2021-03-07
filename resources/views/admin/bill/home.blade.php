@extends('admin.layouts.app')

@section('content') 
	<style type="text/css">
	    .file {
	        position: relative;/*绝对定位!*/
	        display: inline-block;/*设置为行内元素*/
	        background: #D0EEFF;
	        border: 1px solid #99D3F5;
	        border-radius: 4px;
	        padding: 4px 12px;
	        overflow: hidden;
	        color: #1E88C7;
	        text-decoration: none;
	        text-indent: 0;
	        line-height: 20px;
	    }
	    .file input {
	        position: absolute;/*相对定位*/
	        right: 0;
	        top: 0;
	        opacity: 0;/*将上传组件设置为透明的*/
	        font-size: 100px;
	        width:57px;
	        height:30px;
	    }
	    .file:hover {
	        background: #AADDFF;
	        border-color: #78C3F3;
	        color: #004974;
	        text-decoration: none;
	    }
	</style>
	<div class="row-content am-cf">
		<div class="row">
	            <div class="widget am-cf">
	                <div class="widget-head am-cf">
	                    <div class="widget-title am-fl">财务账单</div>
	                </div>
	                <div class="widget-body  widget-body-lg am-fr">

	                	<div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                            <div class="am-form-group">
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <button type="button" class="am-btn am-btn-default am-btn-success" onclick='window.location.href="{{ route("bill.create") }}" '><span class="am-icon-plus"></span> 新增</button>
                                        <!-- <button type="button" class="am-btn am-btn-default am-btn-secondary"><span class="am-icon-save"></span> 保存</button>
                                        <button type="button" class="am-btn am-btn-default am-btn-warning"><span class="am-icon-archive"></span> 审核</button>
                                        <button type="button" class="am-btn am-btn-default am-btn-danger"><span class="am-icon-trash-o"></span> 删除</button>  -->
                                    </div>
                                </div>
                            </div>
                        </div>

	                    <table width="100%" class="am-table am-table-compact am-table-bordered am-table-radius am-table-striped tpl-table-black " >
	                        <thead>
	                            <tr>
	                                <th>流水号</th>
	                                <th>账单名称</th>
	                                <th>客户</th>
	                                <th>所属项目/服务</th>
	                                <th>金额</th>
	                                <th>状态</th>
	                                <th>收款方式</th>
	                                <th>付款时间</th>
	                                <th>备注</th>
	                                <th>附件</th>
	                                <th>时间</th>
	                                <th>操作</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	@foreach($billdata as $bv)
		                            <tr class="gradeX">
		                                <td>{{ $bv->BillNumber }}</td>
		                                <td>{{ $bv->BillName }}</td>
		                                <td>{{ $bv->consumers->customerName }}</td>
		                                <td>{{ $bv->projectServerId['projectId'] ?? '无' }} / {{ $bv->projectServerId['serverId'] ?? '无' }}</td>
		                                <td>{{ $bv->earningPrice }}</td>
		                                <td>
		                                	@switch($bv->earningStatus)
		                                		@case(0)
		                                			<span class="am-badge am-badge-warning am-round item-feed-badge">待付款</span>
		                                			@break
		                                		@case(1)
		                                			<span class="am-badge am-badge-success am-round item-feed-badge">已付款</span>
		                                			@break
		                                		@case(2)
		                                			<span class="am-badge am-badge-default am-round item-feed-badge">失败</span>
		                                			@break
		                                		@case(3)
		                                			<span class="am-badge am-badge-danger am-round item-feed-badge">退款</span>
		                                			@break
		                                	@endswitch
		                                </td>
		                                <td> 
		                                	@if($bv->EarningMode != '未记录')
		                                		<span class="am-badge am-badge-secondary am-round item-feed-badge">{{ $bv->EarningMode }}</span>
		                                	@endif
		                                	
		                                </td>
		                                <td>{{ $bv->earningTime ?? '未记录' }}</td>
		                                <td>{{ $bv->earningAnnotation }}</td>
		                                <td>
		                                	@if(empty($bv->attache_id))

						                        <div class="am-btn-toolbar">
						                            <div class="am-btn-group am-btn-group-xs file">
						                            	<form id='filesub' action="{{ route('file.store.bill',$bv->id) }}" method="POST" enctype="multipart/form-data">
						                            		{{ csrf_field() }}
						                            		<input type="file" name="upfile" onchange="uploadFile()">
							                            	待上传
						                            	</form>
						                            </div>
						                        </div>
						                        <script type="text/javascript">

								                	//提交文件
								                	function uploadFile(){

								                		$('#filesub').submit();

								                	}

								                </script>
		                                	@else
		                                		<a style="width: 57px;height: 30px;line-height: 23px;" class="am-badge am-badge-secondary am-round item-feed-badge" href="{{ $bv->attachs->url_path }}" download="{{ $bv->attachs->file_old_name }}">查看</a>
		                                	@endif
		                                </td>
		                                <td>{{ $bv->created_at }}</td>
		                                <td>
		                                    <div class="tpl-table-black-operation">
		                                        <a href="{{ route('bill.edit',$bv->id) }}">
		                                            <i class="am-icon-pencil"></i> 编辑
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

                            {{ $billdata->links() }}
                            
                        </div>
                   </div>
	            </div>
	    </div>
	</div>


@endsection