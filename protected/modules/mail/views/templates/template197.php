<?php
$regLink = "http://riw.moscow/my/?RUNETID=" . $user->RunetId . "&KEY=" . substr(md5($user->RunetId.'vyeavbdanfivabfdeypwgruqe'), 0, 16);
?>

<h3>Здравствуйте, <?=$user->getShortName()?>.</h3>

<p>Мы рады, что вы зарегистрировались на RIW 2014, который пройдет 12-14 ноября в московском Экспоцентре.</p>

<p>Статус <b>&laquo;Посетитель выставки&raquo;&nbsp;</b>дает право свободного посещения выставки &laquo;Интернет 2014&raquo; и Softool 2014 все три дня их работы.</p>

<p>Вами был&nbsp;выставилен&nbsp;счет на оплату статуса <strong>&laquo;Участник Форума&raquo;</strong>&nbsp;(который дает право на посещение <a href="http://riw.moscow/program/">конференционных мероприятий</a>, проход в бизнес-зону, на участие в конференции Russian Affiliate Days и на участие в других активностях). При этом, на данный момент,&nbsp;Вы не оплатили этот счет.</p>

<p>Просим Вас поторопиться с оплатой выставленного счета.</p>

<div style="border: 2px dashed #999;padding: 5px 15px;">
<p><b>Внимание!</b><br />
Только при оплате до 31 октября включительно &ndash; действует специальная цена 7000 рублей, включая налоги. Уже с 1 ноября цена вырастет до 8000 рублей.</p>

<p>Распечатать или оплатить счет Вы можете в Вашем <a href="<?=$regLink?>">Личном кабинете</a>.</p>
</div>

<p>Программа Форума &ndash; это 120 секций и круглых столов по темам развития Интернета, Телекома и Медиа-среды, в которых выступят более 600 докладчиков. В Программе Форума примут участие около 4,5 тыс. слушателей. Конференционные мероприятия RIW 2014 &ndash; это около 250 часов полезных знаний: кейсы от топ-экспертов, обмен опытом и презентации достижений лидеров Отрасли.</p>
