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
                <div class="widget-title am-fl">{{ $project->projectName }}</div>
            </div>

            <div class="widget-body  widget-body-lg am-fr">

            	<div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                    <div class="am-form-group">
                        <div class="am-btn-toolbar">
                            <div class="am-btn-group am-btn-group-xs file">
                            	<form id='filesub' action="{{ route('file.store.project',$project->id) }}" method="POST" enctype="multipart/form-data">
                            		{{ csrf_field() }}
                            		<input type="file" name="upfile" onchange="uploadFile()">
	                            	上传
                            	</form>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">

                	//提交文件
                	function uploadFile(){

                		$('#filesub').submit();

                	}

                </script>
                <table width="100%" class="am-table am-table-compact am-table-bordered tpl-table-black " id="example-r">
                    <thead>
                        <tr>
                            <th>文件名</th>
                            <th>文件大小</th>
                            <th>文件类型</th>
                            <!-- <th>文件描述</th> -->
                            <th>储存平台</th>
                            <th>上传时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($fileData as $fv)

                            <tr class="gradeX">
                                <td>{{ $fv->file_old_name }}</td>
                                <td>{{ $fv->file_size }}</td>
                                <td>{{ $fv->extension }}</td>
                                <!-- <td>{{ $fv->description }}</td> -->
                                <td>
                                    @switch($fv->store_type)
                                        @case('local')
                                            本地服务器
                                            @break
                                        @case('aliyunoss')
                                            阿里云OSS
                                            @break

                                    @endswitch
                                </td>
                                <td>{{ $fv->created_at }}</td>
                                <td>
                                    <div class="tpl-table-black-operation">
                                        <a href="{{ $fv->url_path }}" download="{{ $fv->file_old_name }}">
                                            <i class="am-icon-cloud-download"></i> 下载
                                        </a>

                                       <a href="javascript:;" class="tpl-table-black-operation-del" onclick="document.getElementById('delete_form_{{ $fv->id }}').submit();">
                                            <form id='delete_form_{{ $fv->id }}' action="{{ route('file.delete.attach.project',[$fv->id,$project->id]) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                    <i class="am-icon-trash"></i> 删除
                                            </form>
                                        </a>
                                        
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>

@endsection