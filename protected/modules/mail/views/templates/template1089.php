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
    <style>
      .coloured-line td a:hover{text-decoration:underline}
    </style>
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
                    <td align="center" class="h2" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;color:#111111;font-family:&quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif;font-weight:200;line-height:1.2em;margin:10px 0;font-size:28px">Здравствуйте!</td>
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
                      <div class="ou" style="width: 242px; display: inline-block; vertical-align: top; margin-left: 25px;margin-right: 0; mso-width-alt: 240px !important">
                        <table width="242" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
                          <tr>
                            <td width="219" height="51" valign="middle" align="center" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px">
                              <a href="<?=$link?>" target="_blank" class=" btn-registration" style="display:inline-block">
                                <img src="http://vizh.share.s3.amazonaws.com/ruvents/riw2016/img-btn-reg-pink.jpg" height="37" style="padding: 7px 0">
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
              <td class="wrapper section-white" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;padding:20px 33px;background-color:#ffffff">
                <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0" class="info">
                  <!--[if (gte mso 9)|(IE)]>
                    <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td height="1" style="padding:0; margin: 0">
                        </td>
                      </tr>
                    </table>
                  <![endif]-->
                  <tr>
                    <td style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;padding-bottom:20px">
                      <h2 align="center">Спешите зарегистрироваться<br>
                        на&nbsp;ноябрьский RIW&nbsp;&mdash; в&nbsp;августе!</h2>
                      <p>RIW 2015&nbsp;&mdash; главное осеннее мероприятие <nobr>интернет-отрасли</nobr>&nbsp;&mdash; пройдет <nobr>1&mdash;3 ноября</nobr> 2016 года в&nbsp;Экспоцентре&nbsp;&mdash; <a href="http://riw.moscow" target="_blank" class="pink-a" style="color:#e3227f">www.RIW.moscow</a></p>
                      <p><b>Всем, кто еще раздумывает &laquo;Регистрироваться на&nbsp;RIW 2016 или нет?&raquo;&nbsp;&mdash; сообщаем, регистрироваться!</b></p>
                      <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;padding-bottom:20px;padding: 8px 0 20px;">
                            <a href="<?=$link?>" target="_blank" class=" btn-registration" style="display:inline-block">
                              <img src="http://vizh.share.s3.amazonaws.com/ruvents/riw2016/img-btn-reg-salad.jpg" height="37">
                            </a>
                          </td>
                        </tr>
                      </table>
                      <p style="margin-bottom: 0" align="center"><b>Причем в&nbsp;августе! И вот почему:</b></p>
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
          <table class="content" align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:600px;position:relative">
            <tr>
              <td class="wrapper section-white" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;padding:20px 33px;background-color:#ffffff;background-color: #fcedf4">
                <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0">
                  <!--[if (gte mso 9)|(IE)]>
                    <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td height="1px">
                        </td>
                      </tr>
                    </table>
                  <![endif]-->
                  <tr>
                    <td style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px">
                      <p align="center"><span class="h3" style="font-size:1.45em;font-weight:bold;display:block">1. Быть в курсе</span></p>
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
          <table class="content" align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:600px;position:relative">
            <tr>
              <td class="wrapper section-white" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;padding:20px 33px;background-color:#ffffff;background-color: #ffffff">
                <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0">
                  <!--[if (gte mso 9)|(IE)]>
                    <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td height="1px">
                        </td>
                      </tr>
                    </table>
                  <![endif]-->
                  <tr>
                    <td style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px">
                      <p>Регистрация на&nbsp;RIW 2016 позволяет вам быть в&nbsp;курсе всех новостей проекта:</p>
                      <ul style="margin:0;padding:0 0 0 20px;list-style-type:disc">
                        <li style="padding-bottom:10px">оперативно получать информацию о&nbsp;его ходе подготовки,</li>
                        <li style="padding-bottom:10px">быть в&nbsp;курсе всех опций и&nbsp;спецпредложений.</li>
                      </ul>
                      <p>И&nbsp;самое главное&nbsp;&mdash; не&nbsp;пропустить тот момент, когда надо будет решить: остаться вирутальным участником или физически принять участие в&nbsp;выставке, форуме и&nbsp;сопутствующих мероприятиях RIW 2016.</p>
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
          <table class="content" align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:600px;position:relative">
            <tr>
              <td class="wrapper section-white" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;padding:20px 33px;background-color:#ffffff;background-color: #fcedf4">
                <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0">
                  <!--[if (gte mso 9)|(IE)]>
                    <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td height="1px">
                        </td>
                      </tr>
                    </table>
                  <![endif]-->
                  <tr>
                    <td style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px">
                      <p align="center"><span class="h3" style="font-size:1.45em;font-weight:bold;display:block">2. Посетить выставку INTERNET 2016</span></p>
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
          <table class="content" align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:600px;position:relative">
            <tr>
              <td class="wrapper section-white" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;padding:20px 33px;background-color:#ffffff;background-color: #ffffff">
                <!--[if (gte mso 9)|(IE)]>
                  <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                      <td height="1px">
                      </td>
                    </tr>
                  </table>
                <![endif]-->
                <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px">
                      <p>RIW 2016&nbsp;&mdash; главная <nobr>IT-выставка</nobr> России, которая:</p>
                      <ul style="margin:0;padding:0 0 0 20px;list-style-type:disc">
                        <li style="padding-bottom:10px">Объединяет несколько специальных экспозиций, таких как <b>INTERNET 2016</b> (интернет-компании, медиа-холдинги, пользовательские и бизнесовые продукты и решения) и <b>Softool 2016</b> (софт, ИТ-решения для бизнеса, программные продукты и разработки)</li>
                        <li style="padding-bottom:10px">Проходит <nobr>бок-о-бок</nobr> и&nbsp;в&nbsp;партнерстве с&nbsp;выставками <b><nobr>HI-TECH</nobr> Building (Умные здания)</b> и&nbsp;<b>Integrated Systems Russia</b>
                        </li>
                        <li style="padding-bottom:10px">Предлагает посетителям ежедневные технологические туры по&nbsp;этим выставкам и&nbsp;по&nbsp;специальной экспозиции <b>&laquo;Интернет вещей&raquo;</b>
                        </li>
                        <li style="padding-bottom:10px">Включает множество специальных зон и&nbsp;экспозиций (зона <b>Премии Рунета, Аллея инноваций, <nobr>Медиа-центр</nobr></b>, зал презентаций и&nbsp;новинок <b>Presentation Hall, BuduGuru Academy и&nbsp;др.</b>)</li>
                      </ul>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px">
                      <p><b>Зарегистрироваться в&nbsp;качестве посетителя выставки и&nbsp;получить безлимитный <nobr>3-дневный</nobr> доступ ко&nbsp;всему этому контенту&nbsp;&mdash; можно бесплатно, в&nbsp;один клик:</b></p>
                    </td>
                  </tr>
                  <tr>
                    <td align="center" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;padding: 10px 0 12px">
                      <a href="<?=$link?>" target="_blank" class="btn-registration" style="display:inline-block">
                        <img src="http://vizh.share.s3.amazonaws.com/ruvents/riw2016/img-btn-reg-salad.jpg" height="37">
                      </a>
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
                <img src="http://vizh.share.s3.amazonaws.com/ruvents/riw2016/%D0%A0%D0%B0%D1%81%D1%81%D1%8B%D0%BB%D0%BA%D0%B0/20160830-img-02.jpg" width="600" class="head-img" style="width:100%;display:block">
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
              <td class="wrapper section-white" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;padding:20px 33px;background-color:#ffffff;background-color: #ffffff">
                <!--[if (gte mso 9)|(IE)]>
                  <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                      <td height="1px">
                      </td>
                    </tr>
                  </table>
                <![endif]-->
                <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px">
                      <p>RIW&nbsp;&mdash; это также презентации и&nbsp;эксклюзивные выступления, которые пройдут в&nbsp;режиме <nobr>нон-стоп</nobr> в&nbsp;течение 3 дней в&nbsp;Presentation Hall. И&nbsp;мощная конференционная программа в&nbsp;8 параллельных потока разбитая с&nbsp;разной степенью проф.подготовки и&nbsp;<nobr>контент-погружения</nobr>:</p>
                      <ul style="margin:0;padding:0 0 0 20px;list-style-type:disc">
                        <li style="padding-bottom:10px">Для самых молодых участников RIW</li>
                        <li style="padding-bottom:10px">
                          <nobr>Экспресс-погружение</nobr> в&nbsp;<nobr>IT-бизнес</nobr>
                        </li>
                        <li style="padding-bottom:10px">Для <nobr>IT-профессионалов</nobr>.</li>
                      </ul>
                      <p>Все зарегистрированные участники RIW 2016&nbsp;&mdash; имеют доступ в&nbsp;<b>Presentation Hall</b> (главный зал презентаций), а&nbsp;также в&nbsp;зону <b>&laquo;Аллея инноваций&raquo;</b>, зону <b>&laquo;Премии Рунета&raquo;</b>, <b>BuduGuru Academy</b> и&nbsp;на&nbsp;многие специальные стенды и&nbsp;в&nbsp;партнерские зоны RIW 2016.</p>
                      <p>По&nbsp;оценке Оргкомитета, выставку в&nbsp;этом году посетят более 25&nbsp;000 человек.</p>
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
          <table class="content" align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:600px;position:relative">
            <tr>
              <td class="wrapper section-white" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;padding:20px 33px;background-color:#ffffff;background-color: #fcedf4">
                <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0">
                  <!--[if (gte mso 9)|(IE)]>
                    <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td height="1px">
                        </td>
                      </tr>
                    </table>
                  <![endif]-->
                  <tr>
                    <td style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px">
                      <p align="center"><span class="h3" style="font-size:1.45em;font-weight:bold;display:block">3. Стать профессиональным участником: в&nbsp;августе&nbsp;&mdash; по&nbsp;специальной цене!</span></p>
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
          <table class="content" align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:600px;position:relative">
            <tr>
              <td class="wrapper section-white" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;padding:20px 33px;background-color:#ffffff;background-color: #ffffff">
                <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0">
                  <!--[if (gte mso 9)|(IE)]>
                    <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td height="1px">
                        </td>
                      </tr>
                    </table>
                  <![endif]-->
                  <tr>
                    <td style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px">
                      <p>RIW 2016&nbsp;&mdash; это не&nbsp;только главная российская <nobr>IT-выставка</nobr>, это еще и&nbsp;мощный форум и&nbsp;множество специальных мероприятий, включая RIW.Night.</p>
                      <p>Самый интересный и&nbsp;востребованный контент Форума RIW 2016 (3 дня, 10 <nobr>конференц-залов</nobr>, более 700 докладчиков, все темы развития интернета и&nbsp;<nobr>интернет-зависимых</nobr> экономик, внепрограммное общение в&nbsp;<nobr>бизнес-зонах</nobr> и&nbsp;<nobr>лаундж-зонах</nobr>)&nbsp;&mdash; доступен участникам, зарегистрированным в&nbsp;статусе <b>&laquo;Профессиональный участник RIW 2016&raquo;</b>.</p>
                      <p class="pink-border" style="border:solid 2px #e3227f;padding:10px 30px;margin-top: 20px"><span style="color: #e3227f; font-weight: bold; display: block; padding-bottom: 5px">ВНИМАНИЕ!</span>Стать <b>профессиональным участником RIW 2016</b>&nbsp;&mdash; можно всегда, но&nbsp;только в&nbsp;августе это особенно выгодно: до&nbsp;31 августа 2016 года действует специальная цена на&nbsp;регистрацию участия в&nbsp;статусе &laquo;Проф.участник&raquo;: <b>6000&nbsp;рублей за&nbsp;все дни работы RIW, включая налоги</b>.</p>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px">
                      <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0" style="padding: 10px 0 0">
                        <tr>
                          <td align="center" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px">
                            <a href="http://riw.moscow/promo/" target="_blank" class=" btn-registration" style="display:inline-block">
                              <img src="http://vizh.share.s3.amazonaws.com/ruvents/riw2016/img-btn-reg-pink.jpg" height="37" style="padding: 7px 0">
                            </a>
                          </td>
                        </tr>
                      </table>
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
          <table class="content" align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:600px;position:relative">
            <tr>
              <td class="wrapper section-white" style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px;padding:20px 33px;background-color:#ffffff;background-color: #ffffff; padding-top: 0">
                <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0" style="border-top: solid 1px #111111; padding-top: 20px">
                  <!--[if (gte mso 9)|(IE)]>
                    <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td height="1px">
                        </td>
                      </tr>
                    </table>
                  <![endif]-->
                  <tr>
                    <td style="font-family:'Open Sans', Helvetica, Arial, sans-serif;font-size:14px">
                      <p>Если вы&nbsp;хотите <a href="http://riw.moscow/forum/requirements/" target="_blank" class="pink-a" style="color:#e3227f">стать докладчиком</a> на&nbsp;форуме или <a href="http://riw.moscow/expo/exponents" target="_blank" class="pink-a" style="color:#e3227f">партнером мероприятия</a>, свяжитесь с&nbsp;нами.</p>
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
          <table class="content" align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:600px;position:relative">
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
          <table class="content" align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:600px;position:relative">
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