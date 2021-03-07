<?php

namespace App\Handlers\Library\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServerOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $subjects,$content,$title,$stoptime;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$content,$stoptime)
    {   
        //邮件主题
        $this->subjects = '【' . env('APP_NAME') .'】' . '温馨提示【' . $subject . '】服务即将到期，请及时续费！';

        $this->title = $subject;//内容标题
        $this->content = $content;//内容携带数据
        $this->stoptime = $stoptime;//到期时间


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {     

        return $this->subject($this->subjects)
                    ->view('emails.serverorder');//指定模板
    }
}
