<?php	
	$link = "http://riw.moscow/auth/fast?runet_id=" . $user->RunetId . "&key=" . substr(md5($user->RunetId.'awjdn2iuh4i3hudaiubdiwuabd'), 0, 16) . "&redirect=/my";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
    <!--[if (gte mso 9)|(IE)]>
      <style>
        td {
        	                font-family: Helvetica, Arial, sans-serif;
        	            }
      </style>
    <![endif]-->
    <style type="text/css">
      @media only screen and (min-device-width: 601px) {
                      .content {
      	                width: 600px !important
      	            }
                  }
                  @media screen and (max-width: 600px) {
                      .content {
      	                width: 100%!important
      	            }
                      .wrapper {
                          padding: 20px!important
                      }
                  }
    </style>
  </head>
  <body yahoo bgcolor="#F1F1F1" style="margin:0;padding:0;min-width:100% !important">
    <table width="100%" bgcolor="#F1F1F1" border="0" cellpadding="0" cellspacing="0" style="padding-bottom: 20px">
      <tr>
        <td style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px">
          <!--[if (gte mso 9)|(IE)]>
            <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td>
          <![endif]-->
          <table class="content" align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:600px;position:relative">
            <tr>
              <td class="wrapper" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;padding:20px 33px">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center" class="h2" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;color:#111111;font-family:&quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif;font-weight:200;line-height:1.2em;margin:10px 0;font-size:28px"><?=$user->getShortName();?>, здравствуйте!</td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <!--[if (gte mso 9)|(IE)]>
          </td>
        </tr>
      </table>
          <![endif]-->
          <!--[if (gte mso 9)|(IE)]>
            <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td>
          <![endif]-->
          <table class="content" align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:600px;position:relative">
            <tr>
              <td class="wrapper section-white" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;padding:20px 33px;background-color:#ffffff">
                <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0">
                  <!--[if (gte mso 9)|(IE)]>
                    <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td height="30px">
                        </td>
                      </tr>
                    </table>
                  <![endif]-->
                  <tr class="table-list">
                    <td style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;text-align: center; vertical-align: top; font-size: 0">
                      <div class="ou" style="width: 267px; display: inline-block; vertical-align: top; margin-left: 0;margin-right: 0; mso-width-alt: 260px !important">
                        <table width="267" align="left" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
                          <tr>
                            <td width="51" valign="middle" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px">
                              <img class="person-photo" src="https://runet-id.com/<?=$user->getPhoto()->get50px();?>" width="51" height="51">
                            </td>
                            <td class="person-name" width="203" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;text-align:center"><a href="<?=$user->getProfileUrl();?>"><?=$user->getName();?></a></td>
                            <td width="16" valign="middle" align="left" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px">
                              <a href="<?=$link?>">
                                <img class="person-photo" src="http://vizh.share.s3.amazonaws.com/ruvents/riw2016/img-lk.jpg" width="16" height="16" style="padding-top: 4px">
                              </a>
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div class="ou" style="width: 242px; display: inline-block; vertical-align: top; margin-left: 25px;margin-right: 0; mso-width-alt: 235px !important">
                        <table width="242" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
                          <tr>
                            <td width="219" height="51" valign="middle" align="center" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px">
                              <a href="<?=$link?>" target="_blank" class=" btn-registration" style="display:inline-block">
                                <img src="http://vizh.share.s3.amazonaws.com/ruvents/riw2016/%D0%A0%D0%B0%D1%81%D1%81%D1%8B%D0%BB%D0%BA%D0%B0/img-btn-reg-pink.jpg" height="37" style="padding: 7px 0">
                              </a>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <!--[if (gte mso 9)|(IE)]>
          </td>
        </tr>
      </table>
          <![endif]-->
          <!--[if (gte mso 9)|(IE)]>
            <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td>
          <![endif]-->
          <table class="content section-white" align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:600px;position:relative;background-color:#ffffff">
            <tr class="wrapper" style="padding:20px 33px">
              <td valign="top" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px">
                <img src="http://vizh.share.s3.amazonaws.com/ruvents/riw2016/img-top-01.jpg" width="600" class="head-img" style="width:100%;display:block">
              </td>
            </tr>
          </table>
          <!--[if (gte mso 9)|(IE)]>
          </td>
        </tr>
      </table>
          <![endif]-->
          <!--[if (gte mso 9)|(IE)]>
            <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td>
          <![endif]-->
          <table class="content section-white" align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:600px;position:relative;background-color:#ffffff">
            <tr>
              <td class="wrapper section-white" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;padding:20px 33px;background-color:#ffffff;padding-bottom: 0">
                <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0">
                  <!--[if (gte mso 9)|(IE)]>
                    <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td height="1" style="padding:0; margin: 0">
                        </td>
                      </tr>
                    </table>
                  <![endif]-->
                  <tr>
                    <td style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;padding-bottom: 15px">
                      <p class="h3" align="center" style="font-size:1.45em;font-weight:bold;display:block">Следите онлайн за&nbsp;спецпроектами и&nbsp;предложениями партнеров RIW 2016</p>
                      <p>Главное событие Рунета&nbsp;&mdash; <a href="http://riw.moscow" target="_blank" class="black-a" style="color:#000000">Russian Interactive Week</a> (<a href="http://riw.moscow" target="_blank" class="black-a" style="color:#000000">RIW 2016</a>)&nbsp;&mdash; стартует уже совсем скоро!</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="pink-border" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;border:solid 2px #e3227f;padding:10px 30px">
                      <p>Выставка INTERNET 2016 и&nbsp;Softool 2016, Форум RIW 2016 и&nbsp;множество спецмероприятий&nbsp;&mdash; пройдут <nobr>1&mdash;3 ноября</nobr> 2016 года на&nbsp;площадке московского Экспоцентра (павильон 8).</p>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;padding: 12px 0 15px 0">
                      <p>Традиционно на&nbsp;RIW&nbsp;&mdash; очень много партнерских и&nbsp;спонсорских мероприятий и&nbsp;активностей, направленных как на&nbsp;посетителей выставки, так и&nbsp;проф.участников (акции, спецпредложения, конкурсы и&nbsp;розыгрыши призов, купоны и&nbsp;<nobr>промо-коды</nobr>). А&nbsp;в&nbsp;этом году их&nbsp;даже больше чем обычно.</p>
                      <p>Для удобства участников&nbsp;&mdash; в&nbsp;этом году оргкомитет RIW представляет <a href="http://riw.moscow/info/partners/list" target="_blank" class="pink-a" style="color:#e3227f">Клуб Партнеров RIW 2016</a>&nbsp;&mdash; интерактивный сборник самых интересных партнерских активностей и&nbsp;спецпредложений.</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="pink-border" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;border:solid 2px #e3227f;padding:10px 30px">
                      <p><a href="http://riw.moscow/info/partners/list" target="_blank" class="black-a" style="color:#000000;text-decoration: none;font-weight: bold; font-size: 18px">Клуб Партнеров RIW 2016</a>&nbsp;&mdash; это площадка для тех, кто разделяет наше стремление изменить к&nbsp;лучшему повседневную жизнь всех участников RIW, да&nbsp;и&nbsp;вообще всех, кто связан с&nbsp;технологиями.</p>
                      <p><a href="http://riw.moscow/info/partners/list" target="_blank" class="black-a" style="color:#000000;text-decoration: none;font-weight: bold; font-size: 18px">Клуб Партнеров RIW 2016</a>&nbsp;&mdash; это клуб поклонников Рунета.</p>
                      <p><a href="http://riw.moscow/info/partners/list" target="_blank" class="black-a" style="color:#000000;text-decoration: none;font-weight: bold; font-size: 18px">Клуб Партнеров RIW 2016</a>&nbsp;&mdash; это уникальные и&nbsp;выгодные предложения и&nbsp;сюрпризы. Это полезная информация и&nbsp;интересные мероприятия для участников от&nbsp;партнеров RIW.</p>
                      <p align="center" style="font-size: 16px"><b>А&nbsp;еще это наш способ сказать Вам &laquo;спасибо&raquo;!</b></p>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;padding-top: 15px">
                      <p>Клуб Партнеров RIW 2016 открыт для всех участников и&nbsp;партнеров RIW.</p>
                      <p>Вы&nbsp;можете <a href="http://riw.moscow/info/partners/list" target="_blank" class="black-a" style="color:#000000">подписаться на&nbsp;новости Клуба</a> и&nbsp;получать его рассылки, быть в&nbsp;курсе всех спецпредложений партнеров RIW, получать максимум возможностей для ваших <nobr>бизнес-идей</nobr>.</p>
                      <p>Раздел постоянно пополняется новыми предложениями и&nbsp;спецакциями!</p>
                      <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;padding: 10px 0">
                            <a href="http://riw.moscow/info/partners/list" target="_blank" class=" btn-registration" style="display:inline-block">
                              <img src="http://vizh.share.s3.amazonaws.com/ruvents/riw2016/%D0%A0%D0%B0%D1%81%D1%81%D1%8B%D0%BB%D0%BA%D0%B0/img-btn-sign-pink.jpg" height="37">
                            </a>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;padding-bottom: 15px">
                      <p class="h3 pink" style="font-size:1.45em;font-weight:bold;display:block;color:#e3227f !important">НАПОМИНАНИЕ!</p>
                      <p>Доступ на&nbsp;Выставку имеют все зарегистрированные участники RIW. Но&nbsp;только участники со&nbsp;статусом &laquo;Проф.участник&raquo; могут посещать залы Проф.программы Форума.</p>
                      <p>Проверить Ваш статус, оплатить участие (Ваше и&nbsp;Ваших коллег)&nbsp;&mdash; можно в&nbsp;<a href="http://riw.moscow/my" target="_blank" class="pink-a" style="color:#e3227f">Личном кабинете</a>.</p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <!--[if (gte mso 9)|(IE)]>
          </td>
        </tr>
      </table>
          <![endif]-->
          <!--[if (gte mso 9)|(IE)]>
            <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td>
          <![endif]-->
          <table class="content section-white" align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:600px;position:relative;background-color:#ffffff">
            <tr>
              <td class="wrapper section-white" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;padding:20px 33px;background-color:#ffffff;padding: 5px 33px 20px;">
                <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0" style="border-top: solid 1px #111111; padding-top: 20px">
                  <tr>
                    <td align="center" valign="top" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px">
                      <!--[if (gte mso 9)|(IE)]>
                        <table width="300px" align="left" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td>
                      <![endif]-->
                      <table align="left" width="50%" border="0" cellspacing="0" cellpadding="0">
                        <!--[if (gte mso 9)|(IE)]>
                          <table width="260" align="center" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                              <td height="1px">
                              </td>
                            </tr>
                          </table>
                        <![endif]-->
                        <tr>
                          <td align="left" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;padding-right: 10px">
                            <p>
                              <b>RIW 2016</b> пройдет<br>
                              <b><nobr>1&mdash;3 ноября</nobr></b> в&nbsp;московском Экспоцентре<br>
                              на&nbsp;Красной Пресне:<br>
                              <a href="http://riw.moscow" target="_blank" class="black-a" style="color:#000000">www.riw.moscow</a>
                            </p>
                          </td>
                        </tr>
                      </table>
                      <!--[if (gte mso 9)|(IE)]>
                      </td>
                      <td width="300px" align="left" cellpadding="0" cellspacing="0" border="0">
                      <![endif]-->
                      <table align="left" width="50%" border="0" cellspacing="0" cellpadding="0">
                        <!--[if (gte mso 9)|(IE)]>
                          <table width="260" align="center" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                              <td height="1px">
                              </td>
                            </tr>
                          </table>
                        <![endif]-->
                        <tr>
                          <td align="left" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px">
                            <p style="padding-bottom: 20px">
                              <b>Премия Рунета 2016</b><br>
                              пройдет <b>22 ноября</b><br>
                              на&nbsp;площадке &laquo;Известия Холл&raquo;:<br>
                              <a href="http://premiaruneta.ru" target="_blank" class="black-a" style="color:#000000">www. PremiaRuneta.ru</a>
                            </p>
                            <p>
                              <b>Номинирование организаций и&nbsp;проектов</b> на&nbsp;соискание Премии Рунета 2016 (продлится до&nbsp;конца сентября)&nbsp;&mdash; по&nbsp;адресу: <a class="small-a black-a" href="http://reg.premiaruneta.ru" target="_blank" style="color:#000000;font-size:13px !important">http://reg.premiaruneta.ru</a></p>
                          </td>
                        </tr>
                      </table>
                      <!--[if (gte mso 9)|(IE)]>
                      </td>
                    </tr>
                  </table>
                      <![endif]-->
                    </td>
                  </tr>
                  <!--[if (gte mso 9)|(IE)]>
                    <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td height="1px">
                        </td>
                      </tr>
                    </table>
                  <![endif]-->
                </table>
              </td>
            </tr>
          </table>
          <!--[if (gte mso 9)|(IE)]>
          </td>
        </tr>
      </table>
          <![endif]-->
          <!--[if (gte mso 9)|(IE)]>
            <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td>
          <![endif]-->
          <table class="content section-white" align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:600px;position:relative;background-color:#ffffff">
            <tr>
              <td class="wrapper section-white" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;padding:20px 33px;background-color:#ffffff;padding-top: 5px; padding-bottom: 30px">
                <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                  <!--[if (gte mso 9)|(IE)]>
                    <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td height="1px">
                        </td>
                      </tr>
                    </table>
                  <![endif]-->
                  <tr class="table-list">
                    <td style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;text-align: center; vertical-align: top; font-size: 0">
                      <div class="ou" style="width: 170px; display: inline-block; vertical-align: top; margin-left: 0;margin-right: 0; mso-width-alt: 170px !important; text-align: center">
                        <table width="170" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="padding-bottom: 10px">
                          <tr>
                            <td width="170" valign="middle" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px">
                              <a href="<?=$link?>" target="_blank">
                                <img src="http://vizh.share.s3.amazonaws.com/ruvents/riw2016/img-riw16jpg" width="78">
                              </a>
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div class="ou" style="width: 170px; display: inline-block; vertical-align: top; margin-left: 0;margin-right: 0; mso-width-alt: 170px !important; text-align: center">
                        <table width="170" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="padding-bottom: 10px">
                          <tr>
                            <td width="170" valign="middle" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px">
                              <a href="https://www.facebook.com/russianinteractiveweek" target="_blank" class="btn-footer-ss" style="display:inline-block;text-decoration:none;margin:0;margin:0 2px">
                                <img src="http://vizh.share.s3.amazonaws.com/ruvents/riw2016/img-icon-fb.jpg" style="vertical-align:middle">
                              </a>
                              <a href="https://twitter.com/ru_riw" target="_blank" class="btn-footer-ss" style="display:inline-block;text-decoration:none;margin:0;margin:0 2px">
                                <img src="http://vizh.share.s3.amazonaws.com/ruvents/riw2016/img-icon-tweet.jpg" style="vertical-align:middle">
                              </a>
                              <a href="https://vk.com/club27733454" target="_blank" class="btn-footer-ss" style="display:inline-block;text-decoration:none;margin:0;margin:0 2px">
                                <img src="http://vizh.share.s3.amazonaws.com/ruvents/riw2016/img-icon-vk.jpg" style="vertical-align:middle">
                              </a>
                              <a href="https://instagram.com/ru_riw/" target="_blank" class="btn-footer-ss" style="display:inline-block;text-decoration:none;margin:0;margin:0 2px">
                                <img src="http://vizh.share.s3.amazonaws.com/ruvents/riw2016/img-icon-instagram.jpg" style="vertical-align:middle">
                              </a>
                              <a href="https://telegram.me/riwmoscow" target="_blank" class="btn-footer-ss" style="display:inline-block;text-decoration:none;margin:0;margin:0 2px">
                                <img src="http://vizh.share.s3.amazonaws.com/ruvents/riw2016/img-icon-telegram.jpg" style="vertical-align:middle">
                              </a>
                              <a href="https://runet-id.com/event/riw16/" target="_blank" class="btn-footer-ss" style="display:inline-block;text-decoration:none;margin:0;margin:0 2px">
                                <img src="http://vizh.share.s3.amazonaws.com/ruvents/riw2016/img-icon-id.jpg" style="vertical-align:middle">
                              </a>
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div class="ou" style="width: 170px; display: inline-block; vertical-align: top; margin-left: 0;margin-right: 0;  mso-width-alt: 170px !important; text-align: center">
                        <table width="170" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="padding-bottom: 10px">
                          <tr>
                            <td width="170" valign="middle" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px">
                              <a href="http://www.riw.moscow" target="_blank" style="color: #000000; text-decoration: none">
                                www.riw.moscow
		                                                                </a>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <!--[if (gte mso 9)|(IE)]>
          </td>
        </tr>
      </table>
          <![endif]-->
        </td>
      </tr>
    </table>
  </body>
</html>