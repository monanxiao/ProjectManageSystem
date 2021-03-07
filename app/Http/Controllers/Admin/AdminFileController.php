<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Handlers\Library\UploadFile;
use App\Models\Attach;
use App\Models\Project;
use App\Models\Bill;
use Illuminate\Support\Facades\Storage;
use Log;

class AdminFileController extends Controller
{
    //上传页面
    public function filelist(Project $project,$fileData=null){

        //附件id转数组
        $jihe = json_decode($project->attachedFiles,true) ?:[];

        //取出附件
        $fileData = Attach::whereIn('id',$jihe)->get();


        return view('admin.file.list',compact('fileData','project'));
    }

    //接收项目文件
    public function projectStore(Project $project,Request $request,UploadFile $uploadfile){

    	//接收文件
    	$file = $request->file('upfile');

        //调用文件上传，1参数：文件 2参数：文件前缀 3参数：文件夹 4参数：裁剪宽度
        $result = $uploadfile->save($file,11,'project',416);

        //保存附件
        $attach = Attach::create($result);

        //转为数组
        $data = json_decode($project->attachedFiles,true)?:[];
        array_push($data, $attach->id);//追加数据

        $project->attachedFiles = $data;//赋值新数据

        //执行保存
        if($project->save()){

            return back();

        }else{

            return '上传错误';
        }
    }

    //接收财务文件上传
    public function billStore(Bill $bill,Request $request,UploadFile $uploadfile){

        //接收文件
        $file = $request->file('upfile');

        //调用文件上传，1参数：文件 2参数：文件前缀 3参数：文件夹 4参数：裁剪宽度
        $result = $uploadfile->save($file,11,'bill',416);

        //保存附件
        $attach = Attach::create($result);

        $bill->attache_id = $attach->id;//财务附件赋值新数据

        //执行保存
        if($bill->save()){

            return back();

        }else{

            return '上传错误';
        }
    }

    //文件删除
    public function destroy(Attach $attach,Project $project,UploadFile $uploadfile){

        //文件路径
        $path = public_path($attach->folder_path . '/' . $attach->file_name);

        //删除文件方法调用
        $data = $uploadfile->filedestroy($attach->store_type,$path);

        if($data){

            //删除文件
            $attach->delete();

            //转为数组
            $jihe = json_decode($project->attachedFiles,true);

            //查询值
            $key = array_search($attach->id,$jihe);

            unset($jihe[$key]);//删除数据
            //重新赋值数据
            $project->attachedFiles = $jihe;
            //保存修改后数据
            $project->save();

            return back();
        }

    }
}
