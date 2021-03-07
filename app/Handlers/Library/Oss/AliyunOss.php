<?php 

namespace App\Handlers\Library\Oss;

use OSS\OssClient;
use OSS\Core\OssException;
use Exception;
use DateTime;

/*
*
*
* 阿里云附件上传方法
*
* 作者： 墨楠
* 邮箱： monanxiao@qq.com
* 联系QQ: 3528419209
* 时间：2021/03/01
*
*/

class AliYunOss{

    private $ossClient;

  	public function __construct(){

  		$city = env('OSS_CITY') ?:config('aliyunoss.city');//地区
	    $networkType = env('OSS_NETWORK_TYPE') ?:config('aliyunoss.networkType');//域
	    $bucket = env('OSS_BUCKET') ?:config('aliyunoss.bucket');//空间
	    $AccessKeyId = env('OSS_AccessKeyId') ?:config('aliyunoss.AccessKeyId');//AccessKeyId
	    $AccessKeySecret = env('OSS_AccessKeySecret') ?:config('aliyunoss.AccessKeySecret');//AccessKeySecret
	    $http = env('OSS_GET_TYPE') ?:config('aliyunoss.gettype');//请求方式

	    $endpoint = $http . '://';//拼接url

	    //判断外网还是内网配置
	    if ($networkType == '外网') 
	    {

	    	//外网检测城市是否存在
		    if (!array_key_exists($city, config('aliyunoss.CityURLArray'))) {
		      throw new Exception("城市不存在");
		    }

	      $endpoint .= config('aliyunoss.CityURLArray')[$city];//地区域拼接

	    } else if ($networkType == '内网') 
	    {	
	    	//内网检测城市是否存在
	      	if (!array_key_exists($city, config('aliyunoss.CityURLArrayForVPC'))) {
		        throw new Exception("城市不存在");
		    }

	      	$endpoint .= config('aliyunoss.CityURLArrayForVPC')[$city];//地区域拼接

	    } else 
	    {
	      throw new Exception("\$networkType 必须是 '外网' 或 '内网'");
	    }

	    //阿里云地址拼接
	    $endpoint .= '.aliyuncs.com';

	    //初始化OSS参数
	    $this->ossClient = new OSSClient($AccessKeyId,$AccessKeySecret,$endpoint);

  	}


	//创建Bucket
	public function createBucket(){

	}

	//列出所有Bucket
	public function getAllBucket(){

		try {
			
			$bucketListInfo = $this->ossClient->listBuckets();

		} catch (OssException $e) {

			printf(__FUNCTION__ . ": FAILED\n");
		    printf($e->getMessage() . "\n");
		    return;
		}

		return $bucketListInfo->getBucketList();
	}

	//指定前缀的Bucket
	public function getAllPrefixBucket(){

	}

	//创建文件夹
	public function createObjectDir($bucket, $object, $options = NULL){

		try {
			
			$bucketListInfo = $this->ossClient->createObjectDir($bucket, $object, $options);//创建文件夹

		} catch (OssException $e) {

			printf(__FUNCTION__ . ": FAILED\n");
		    printf($e->getMessage() . "\n");
		    return;
		}

		return $bucketListInfo;

	}

	//上传文件
	public function uploadFile($bucket, $object, $filePath){

		return $this->ossClient->uploadFile($bucket, $object, $filePath);

	}

	//下载到本地并打开
	public function downObject($bucket, $object){

		return $this->ossClient->getObject($bucket, $object);
	}

	//下载文件到根目录文件  可同步OSS文件使用
	public function getObject($bucket, $object, $localfile){

		// <yourLocalFile>本地指定的文件路径加文件名包括后缀组成，例如/users/local/myfile.txt。
		$options = [OssClient::OSS_FILE_DOWNLOAD => $localfile];
		        
		return $this->ossClient->getObject($bucket, $object, $options);
	}

	//删除文件
	public function deleteObject($bucket, $object){

		return $this->ossClient->deleteObject($bucket, $object);
	}
}