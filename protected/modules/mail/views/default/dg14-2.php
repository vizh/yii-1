Здравствуйте, <?=$user->getShortName();?>.

4 марта 2014 года в Digital October пройдет конференция Digital Goods 2014, посвященная развитию электронной коммерции и потреблению цифровых товаров в интернете – http://www.dgconf.com

Формула цифрового товара:
____________________________________________

Digital Goods = Buy Online & Consume Online
____________________________________________

Digital Goods — это все то, что покупается и потребляется в онлайне: от кино, литературы и периодических изданий до игр и мобильных приложений. Это товары, не требующие физической доставки и формирующие сегодня интенсивно растущий рынок цифрового контента, сервисов и развлечений.

Главные акценты конференции: новые тренды в электронной коммерции, аналитика, Big Data, монетизации контента, мобильная коммерция, безопасность покупок, новые сферы применения электронных денег, а также многое другое, что связывает бизнес, цифровой товар и пользователя.

К участию в конференции приглашены как российские, так и западные спикеры, представители ведущих компаний, развивающих рынок электронной коммерции, разработчики, агентства, профессиональные производители контента и правообладатели, информационные посредники, интернет-площадки и рекламодатели.

Конференционная программа будет дополнена тематической выставкой с участием профильных игроков отрасли.

Конференция Digital Goods 2014 организована РАЭК и PayPal при участии банка ВТБ24.

Программа конференции: http://www.dgconf.com/program/
Выставка: http://www.dgconf.com/scheme/

Участие в конференции – доступно для зарегистрированных участников, оплативших регистрационный взнос (5000 рублей), который включает участие в программе, все кофе-брейки и ланч, участие в вечерних мероприятиях, регистрационный пакет участника и раздаточные материалы, доступ к онлайн-видео и видеоархивам, а также к презентациям докладчиков.
<?
$role = \event\models\Role::model()->findByPk(24);
$event = \event\models\Event::model()->findByPk(866);
$registerLink = $event->getFastRegisterUrl($user, $role, '/event/dg14/');
?>

Регистрация на конференцию:
<?=$registerLink;?>


До встречи на конференции Digital Goods 2014!


--
С уважением,
Оргкомитет Digital Goods 2014
http://dgconf.com/

Отписаться: <?=$user->getFastauthUrl('/user/setting/subscription/');?>