<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>rocID мероприятия</title>
  <style type="text/css">

    .tbl .message{

    }
  </style>
</head>
<body>
  <div style="text-align:center;margin:0;font-family:tahoma, arial, verdana;padding-top:20px;">
    <div style="width:602px;padding:50px;margin:0 auto;">
      <table style="width: 100%;">
        <tr>
          <td style="text-align:left;">
            <a href="http://<?=$this->Host;?>/">
              <img src="http://<?=$this->Host;?>/images/logo.png" alt="rocID:// - Информационный портал профессионалов Рунета">
            </a>
          </td>
        </tr>
        <tr>
          <td style="font-size:12px;padding-top:20px;color:#444;text-align:left;">
            <h2>Получено новое мероприятие</h2>
            <br>
            <br>
            Контактное лицо: <?=$this->Fio;?><br>
            Контактный телефон: <?=$this->Phone;?><br>
            Контактный email: <?=$this->Email;?><br>
            Название мероприятия: <?=$this->Title;?><br>
            Место проведения: <?=$this->Place;?><br>
            Дата: <?if ($this->DateEnd):?>от <?=$this->DateStart;?> до <?=$this->DateEnd;?><?else:?><?=$this->DateStart;?><?endif?>
            <br>
            Сайт мероприятия: <?=!$this->NoSite?$this->Site:'нет сайта';?><br>
            <br>
            Краткое описание: <?=$this->Info;?><br>
            Подробное описание: <?=$this->FullInfo;?><br>
            <br>
            Дополнительные опции: <?=$this->Options;?><br>
            <br>
            Вакансию отправил:  <?=$this->LastName;?> <?=$this->FirstName;?> (rocID: <?=$this->RocId;?>)
            <br>
          </td>
        </tr>
      </table>
    </div>
  </div>
</body>
</html>