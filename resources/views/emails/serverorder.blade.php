<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>{{ $subjects }}</title>
    <style>.qmbox .open_email{
      background:url(http://pic.sc.chinaz.com/files/pic/pic9/201601/apic18482.jpg) no-repeat 0 -35px;;
      width:760px;
      padding:10px;
      font-family: Tahoma,"宋体";
      margin:0 auto;
      margin-bottom:20px;
      text-align:left;
      }
      .qmbox .genEmailNicker{
          text-align:left;
          padding:10px;
          font-family: Tahoma,"宋体";
          font-weight:bold;
           margin:0 auto;
          margin-bottom:40px;
      }
      .qmbox .genEmailContent{

          padding:10px;
         padding-left:40px;
          font-family: Tahoma,"宋体";
          margin:0 auto;
          margin-bottom:40px;
      text-align:center;
      }
      .qmbox .genEmailTail
      {
       float:right;
          margin:auto 0 auto auto;
          padding:10px;
         text-align:right;
          font-family: Tahoma,"宋体";
          margin-right:0px;
          margin-bottom:40px;

      }
    </style>
    <style>
      .qmbox .renew_notice{border-collapse: collapse;width: 100%;}
      .qmbox .renew_notice tr td {text-align:center;border: 1px solid black;}
    </style>
</head>
<body>
  <div id="mailContentContainer" class="qmbox qm_con_body_content qqmail_webmail_only" style="">
  <div id="cTMail-Wrap" style="word-break: break-all;box-sizing:border-box;text-align:center;min-width:320px; max-width:660px; border:1px solid #f6f6f6; background-color:#f7f8fa; margin:auto; padding:20px 0 30px; font-family:'helvetica neue',PingFangSC-Light,arial,'hiragino sans gb','microsoft yahei ui','microsoft yahei',simsun,sans-serif">
    <div class="main-content" style="">
      <table style="width:100%;font-weight:300;margin-bottom:10px;border-collapse:collapse">
        <tbody>
          <tr style="font-weight:300">
            <td style="width:3%;max-width:30px;"></td>
            <td style="max-width:600px;">
              <div id="cTMail-logo" style="width:92px; height:25px;">
                <a href="https://cloud.tencent.com" rel="noopener" target="_blank"><img border="0" src="https://imgcache.qq.com/open_proj/proj_qcloud_v2/mc_2014/cdn/css/img/mail/logo-pc.png" style="width:92px; height:25px;display:block"></a>
              </div>
              <p style="height:2px;background-color: #00a4ff;border: 0;font-size:0;padding:0;width:100%;margin-top:20px;"></p>
              <div id="cTMail-inner" style="background-color:#fff; padding:23px 0 20px;box-shadow: 0px 1px 1px 0px rgba(122, 55, 55, 0.2);text-align:left;">
                <table style="width:100%;font-weight:300;margin-bottom:10px;border-collapse:collapse;text-align:left;">
                  <tbody>
                    <tr style="font-weight:300">
                      <td style="width:3.2%;max-width:30px;"></td>
                      <td style="max-width:480px;text-align:left;">
                        <h1 id="cTMail-title" style="font-size: 20px; line-height: 36px; margin: 0px 0px 22px;">【{{ $title }}】服务即将到期，请及时续费！</h1>

                        <p class="cTMail-content" style="font-size: 14px; color: rgb(51, 51, 51); line-height: 24px; margin: 6px 0px 0px; overflow-wrap: break-word; word-break: break-all;">{{ $content }}</p>

                        <p class="cTMail-content" style="font-size: 14px; color: rgb(51, 51, 51); line-height: 24px; margin: 6px 0px 0px; overflow-wrap: break-word; word-break: break-all;">详情如下：</p>

                        <p class="cTMail-content" style="font-size: 14px; color: rgb(51, 51, 51); line-height: 24px; margin: 6px 0px 0px; overflow-wrap: break-word; word-break: break-all;"><br></p>

                        <table class="renew_notice">
                          <tbody>
                            <tr>
                              <td>&nbsp; 服务名称&nbsp; </td>
                              <td>&nbsp; 到期时间&nbsp; </td>
                            </tr>
                            <tr>
                              <td>{{ $title }}</td>
                              <td><span style="border-bottom:1px dashed #ccc;" t="5" times="">{{ $stoptime }}</span></td>
                            </tr>

                          </tbody>
                        </table>
                        <br>
                        <p></p>
                        <p class="cTMail-content" style="font-size: 14px; color: rgb(51, 51, 51); line-height: 24px; margin: 6px 0px 0px; overflow-wrap: break-word; word-break: break-all;"><br>
                        </p>
                        <p class="cTMail-content" style="line-height: 24px; margin: 6px 0px 0px; overflow-wrap: break-word; word-break: break-all;"><span style="color: rgb(51, 51, 51); font-size: 14px;">备注：以上信息仅为通知，具体请以订单详情为准。</span></p>
                        <p class="cTMail-content" style="font-size: 14px; color: rgb(51, 51, 51); line-height: 24px; margin: 6px 0px 0px; word-wrap: break-word; word-break: break-all;"><a id="cTMail-btn" href="https://console.cloud.tencent.com/domain" title="https://console.cloud.tencent.com/domain" style="font-size: 16px; line-height: 45px; display: block; background-color: rgb(0, 164, 255); color: rgb(255, 255, 255); text-align: center; text-decoration: none; margin-top: 20px; border-radius: 3px;" rel="noopener" target="_blank">立即续费</a></p>
                        <p style="border-top: 1px solid rgb(234, 237, 240); margin: 20px 0px;"></p>
                        <dl style="font-size: 14px; color: rgb(51, 51, 51); line-height: 18px;">
                          <dt style="margin: 0px 0px 8px; padding: 0px;"></dt>
                          <dt style="margin: 0px 0px 8px; padding: 0px;">温馨提示：</dt>
                          <dd style="margin: 0px 0px 6px; padding: 0px; font-size: 12px; line-height: 22px;">
                            1. 服务续费常见问题可<a href="https://cloud.tencent.com/document/product/242/3705" title="https://cloud.tencent.com/document/product/242/3705" style="color: rgb(0, 164, 255); text-decoration-line: none; word-break: break-all; overflow-wrap: normal;" rel="noopener" target="_blank">点此查看</a>&nbsp;。
                          </dd>
                          <span style="font-size: 12px;">2. 如果您忘记账号，可通过</span><a href="https://cloud.tencent.com/services/forgotAccount" title="https://cloud.tencent.com/services/forgotAccount" style="font-size: 12px; color: rgb(0, 164, 255); text-decoration-line: none; word-break: break-all; overflow-wrap: normal;" rel="noopener" target="_blank">查找账号</a><span style="font-size: 12px;">找回。</span>
                        </dl>
                        <dl style="font-size: 14px; color: rgb(51, 51, 51); line-height: 18px;">
                          <dd style="margin: 0px 0px 6px; padding: 0px; font-size: 12px; line-height: 22px;">
                            <p id="cTMail-sender" style="font-size: 14px; line-height: 26px; word-wrap: break-word; word-break: break-all; margin-top: 32px;">此致 <br>
                              <strong>墨豆团队</strong>
                            </p>

                          </dd>
                        </dl>
                      </td>
                      <td style="width:3.2%;max-width:30px;"></td>
                    </tr>
                  </tbody>
                </table>
              </div>

<!--               <div id="cTMail-copy" style="text-align:center; font-size:12px; line-height:18px; color:#999">
                <table style="width:100%;font-weight:300;margin-bottom:10px;border-collapse:collapse">
                  <tbody>
                    <tr style="font-weight:300">
                      <td style="width:3.2%;max-width:30px;"></td>
                      <td style="max-width:540px;">
                        <p style="text-align:center; margin:20px auto 14px auto;font-size:12px;color:#999;">此为系统邮件，请勿回复。 <a href="https://console.cloud.tencent.com/messageCenter/messageConfig" style="text-decoration:none;word-break:break-all;word-wrap:normal;    color: #333;" target="_blank" rel="noopener">取消订阅</a></p>
                        <p style="text-align:center;margin:0 auto 4px;"><img border="0" src="http://imgcache.qq.com/open_proj/proj_qcloud_v2/tools/edm/css/img/wechat-qrcode-2x.jpg" style="width:64px; height:64px; margin:0 auto;"></p>
                        <p id="cTMail-rights" style="max-width: 100%; margin:auto;font-size:12px;color:#999;text-align:center;line-height:22px;">关注服务号，移动管理云资源
                          <br>
                          <img src="https://imgcache.qq.com/open_proj/proj_qcloud_v2/gateway/mail/cr.svg" style="margin-top: 10px;">
                        </p>
                      </td>
                      <td style="width:3.2%;max-width:30px;"></td>
                    </tr>
                  </tbody>
                </table>
              </div> -->
              
            </td>
            <td style="width:3%;max-width:30px;"></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
</html>