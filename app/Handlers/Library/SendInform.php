<?php 
namespace App\Handlers\Library;

use App\Handlers\Library\Wechat;
use App\Handlers\Library\Sms;
use Illuminate\Support\Facades\Mail;
use App\Handlers\Library\Mail\ServerOrder;
use App\Models\RemindServer;
use Log;
/**
 * 
 * 消息通知公共方法
 * 作者： 墨楠
 * 邮箱： monanxiao@qq.com
 * 联系QQ: 3528419209
 * 时间：2021/03/04
 * 
 */

class SendInform
{
	
	protected $data;//实例数据
	protected $tempContent;//模板数据

	public function __construct($type,$data){

		//模板内容
		$tempContent =  '尊敬的' . $data->consumers->customerName . '用户，您的：【' . $data->serverName . '】服务即将到期，请及时续费，避免影响您的业务正常使用。';

		$serverName = $data->serverName;//服务名称
		$stoptime = $data->serverPeriod['stoptime'];//到期时间
		$email = $data->consumers->contactWay['email'];//接收邮箱
		$phone = $data->consumers->contactWay['phone'];//接收者手机号

		//判断是哪种类型
		switch ($type) {
			case 'email': 	//发送邮件

				//执行email方法
				return $this->emailSend($email,$serverName,$tempContent,$stoptime);
				break;

			case 'wechat':  //推送微信公众号
				
				$this->wechatSend(); //预留
				break;
			case 'sms': 	//发送短信

				//执行短信发送
				return $this->smsSend($phone,$tempContent);
				break;
			case 'all':

				$data['email'] = $this->emailSend($email,$serverName,$tempContent,$stoptime);//邮件
				$data['sms'] = $this->smsSend($phone,$tempContent);//短信
				//微信预留

				return $data;
				break;
		}

	}

	/**
	*
	*
	* 短信通知方法
	*
	* 作者： 墨楠
	* 邮箱： monanxiao@qq.com
	* 联系QQ: 3528419209
	* 时间：2021/03/03
	*
	* mobile 接收者手机号
	* contentTmp 发送内容模板
	*
	*/
	public function smsSend($mobile,$contentTmp){

		$sms = new Sms();//实例化短信类

	    return $sms->sendSms($mobile,$contentTmp);//发送短信
	}

	/**
	*
	* 邮件通知方法
	*
	* 作者： 墨楠
	* 邮箱： monanxiao@qq.com
	* 联系QQ: 3528419209
	* 时间：2021/03/03
	*
	* subject 发送主题
	* email 接收者邮箱
	* data 发送内容数据包 如：数组、对象
	*
	*/
	public function emailSend($email,$subject,$data,$stoptime){

		return Mail::to($email)
						->send(new ServerOrder($subject,$data,$stoptime));
	}

	/**
	*
	* 公众号通知方法
	*
	* 作者： 墨楠
	* 邮箱： monanxiao@qq.com
	* 联系QQ: 3528419209
	* 时间：2021/03/03
	*
	* subject 发送主题
	* email 接收者邮箱
	* data 发送内容数据包 如：数组、对象
	*
	*/
	public function wechatSend(){

		$app = wechatType('officialAccount');//实例化公众号实例

		//发送模板消息
		$result = 	$app->template_message->send([

				        'touser' => 'user-openid',
				        'template_id' => 'template-id',
				        'url' => 'https://easywechat.org',
				        'data' => [
				            'key1' => 'VALUE',
				            'key2' => 'VALUE2',
				        ],
				    ]);

		return $result;
	}
}