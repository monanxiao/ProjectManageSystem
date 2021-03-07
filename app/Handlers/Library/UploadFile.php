<?php 

namespace App\Handlers\Library;
use  Illuminate\Support\Str;
use App\Handlers\Library\Oss\AliYunOss;
use Image;
use Log;

/**
 * 构建文件上传公共方法
 *
 * 作者： 墨楠
 * 邮箱： monanxiao@qq.com
 * 联系QQ: 3528419209
 * 时间：2021/02/28
 *
 * @return void
 */

class UploadFile{

	//允许上传的文件类型
	protected $allowed_ext = ['png','jpg', "gif",'jpeg','doc','docx','pdf'];

	private $ossClient;

	public function __construct(){

		$this->ossClient = new AliYunOss();
	}
	/**
	 * 文件保存
	 *
	 * 作者： 墨楠
	 * 邮箱： monanxiao@qq.com
	 * 联系QQ: 3528419209
	 * 时间：2021/02/28
	 *
	 * $file：上传的文件
	 * $file_prefix :文件前缀
	 * $folder : 文件夹
	 * $max_width :图片宽度
	 *
	 * @return void
	 */
	public function save($file,$file_prefix,$folder,$max_width = false){

		// 构建存储的文件夹规则，值如：images/avatars/20170921/
		$folder_path = "$folder/" . date('Ymd') ;//文件夹路径
		// 文件具体存储的物理路径，`public_path()` 获取的是 `public` 文件夹的物理路径。
		// 值如：/home/vagrant/Code/larabbs/public/uploads/images/avatars/20170921/
		$upload_path = public_path() . '/' . $folder_path;

		//获取旧文件名称
		$fileoldname = $file->getClientOriginalName(); 

		//获取文件后缀名，因图片从剪贴板里黏贴时后缀名为空，所以此处确保后缀一直存在
		$suffix = $file->getClientOriginalExtension();

		// 获取文件的后缀名，因图片从剪贴板里黏贴时后缀名为空，所以此处确保后缀一直存在
		//文件后缀转为小写 不存在的时候返回png
        $extension = strtolower($suffix) ?: 'png';

        //拼接文件名,加前缀是为了增加辨析度3，前缀可以是相关数据模型的ID
        //例如：12_1493521050_7BVc9v9ujP.png
        $filename = $file_prefix . '_' . time() . '_' . Str::random(10) . '.' . $extension;

        //如果上传的类型不允许终止操作
        if(!in_array($extension,$this->allowed_ext)){

        	abort('403','文件上传错误，只允许上传：png,jpg,gif,jpeg,doc,docx');
        }


        /*
        *
        *
        * 默认上传到本地服务器
        * 可选储存地址：阿里云、腾讯云、七牛云
        *
        *
        */

        //检测储存方式
        switch (env('CLOUD_STORE')) {

        	case 'local'://本地

        		//文件移动到目标储存路径 本地储存
		        $file->move($upload_path,$filename);
		        	 
		        //图片裁剪 如果限制了图片宽度就进行裁剪  图片裁剪 仅支持本地
		        $reduce_suffix = ["png", "jpg", 'jpeg'];

		        //仅限几个类型支持裁剪
		        if( $max_width && in_array($extension,$reduce_suffix) ){
		        	
		        	//此类中封装的函数，用于裁剪图片 图片绝对路径
		        	$this->reduceSize("$upload_path/$filename",$max_width);

		        }

        		$filesize = $this->trans_byte(filesize("$upload_path/$filename"));//文件大小
        		$fileurl = config('app.url') . "/$folder_path/$filename";//绝对路径

        		//返回参数
        		return $this->redata(
        								$fileurl,//url访问路径
        								$filename,//新文件名称
        								$fileoldname,//旧文件名称
        								$extension,//文件后缀
        								$filesize,//文件大小
        								$folder_path //文件夹地址
        							);

        		break;

        	case 'aliyunoss'://阿里云

        		//上传到阿里云
        		$aliyundata = $this->ossClient->uploadFile(env('OSS_BUCKET'),"$folder_path/$filename",$file);

        		$fileurl = $aliyundata['oss-request-url'];//url访问路径
        		$filesize = $aliyundata['info']['size_upload'];

        		break;
        	case 'tencentco'://腾讯云
        		abort('403','腾讯云储存正在开发中');
        		break;
        	case 'qiniukodo'://七牛云
        		abort('403','七牛云储存正在开发中');
        		break;
        	
        	default://本地
        		abort('404','出现错误，请联系管理员！');
        		break;
        }

        //返回参数
		return $this->redata(
								$fileurl,//url访问路径
								$filename,//新文件名称
								$fileoldname,//旧文件名称
								$extension,//文件后缀
								$filesize,//文件大小
								$folder_path //文件夹地址
							);

	}

	/*
	*
	* url 文件url访问地址
	* store_type 文件储存平台
	* file_name 文件名
	* file_old_name 旧文件名
	* extension 文件后缀
	* filesize 文件大小
	* folder_path 所在文件夹
	* 
	*/
	//处理返回数据
	public function redata($url,$filename,$file_old_name,$extension,$filesize,$folder_path){

		//返回上传信息
        return [
	            'url_path' 		=> $url,//绝对路径
	            'store_type' 	=> env('CLOUD_STORE'),//储存云平台
	            'file_name' 	=> $filename,//文件名
	            'file_old_name' => $file_old_name,//文件名
	            'extension' 	=> $extension,//文件后缀
	            'file_size' 	=> $filesize,//文件大小
	            'folder_path'	=> $folder_path//储存文件夹
	        ];
	}

	/**
	 * 
	 *图片裁剪
	 *
	 * 作者： 墨楠
	 * 邮箱： monanxiao@qq.com
	 * 联系QQ: 3528419209
	 * 时间：2021/02/28
	 *
	 * $file_path：文件路径
	 * $max_width :图片宽度
	 *
	 * @return void
	 */

	public function reduceSize($file_path,$max_width){

		// 先实例化，传参是文件的磁盘物理路径
        $image = Image::make($file_path);

        // 进行大小调整的操作
        $image->resize($max_width, null, function ($constraint) {

            // 设定宽度是 $max_width，高度等比例缩放
            $constraint->aspectRatio();

            // 防止裁图时图片尺寸变大
            $constraint->upsize();

	    });

        // 对图片修改后进行保存
      	$image->save();

	}

	//字节转换
	public function trans_byte($byte)

	{

	    $KB = 1024;

	    $MB = 1024 * $KB;

	    $GB = 1024 * $MB;

	    $TB = 1024 * $GB;

	    if ($byte < $KB) {

	        return $byte . "B";

	    } elseif ($byte < $MB) {

	        return round($byte / $KB, 2) . "KB";

	    } elseif ($byte < $GB) {

	        return round($byte / $MB, 2) . "MB";

	    } elseif ($byte < $TB) {

	        return round($byte / $GB, 2) . "GB";

	    } else {

	        return round($byte / $TB, 2) . "TB";

	    }

	}


	/**
	 * 
	 * 文件删除
	 *
	 * 作者： 墨楠
	 * 邮箱： monanxiao@qq.com
	 * 联系QQ: 3528419209
	 * 时间：2021/03/05
	 *
	 * $type：储存平台
	 * $path :图片路径
	 *
	 * @return void
	 */
	public function filedestroy($type,$path){

		//判断删除方式
		switch ($type) {
			case 'local':

				return unlink($path);//本地删除文件
				break;
			
			case 'aliyunoss':
				//阿里云删除文件
				return $this->ossClient->deleteObject(env('OSS_BUCKET'),$path);
				break;
		}

	}
}

