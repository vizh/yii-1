<?php
namespace competence\models\test\mailru2014_prof;

use competence\models\Result;

class C3 extends \competence\models\form\Base {

  public $values = [
    '' => 'Выберите регион',
    1 => 'Москва',2 => 'Санкт-Петербург',3 => 'Алтайский край',4 => 'Амурская область',5 => 'Архангельская область',6 => 'Астраханская область',7 => 'Белгородская область',8 => 'Брянская область',9 => 'Владимирская область',10 => 'Волгоградская область',11 => 'Вологодская область',12 => 'Воронежская область',13 => 'Еврейская автономная область',14 => 'Забайкальский край',15 => 'Ивановская область',16 => 'Иркутская область',17 => 'Кабардино-Балкарская республика',18 => 'Калининградская область',19 => 'Калужская область',20 => 'Камчатский край',21 => 'Карачаево-Черкесская республика',22 => 'Кемеровская область',23 => 'Кировская область',24 => 'Костромская область',25 => 'Краснодарский край',26 => 'Красноярский край',27 => 'Курганская область',28 => 'Курская область',29 => 'Ленинградская область',30 => 'Липецкая область',31 => 'Магаданская область',32 => 'Московская область',33 => 'Мурманская область',34 => 'Ненецкий автономный округ',35 => 'Нижегородская область',36 => 'Новгородская область',37 => 'Новосибирская область',38 => 'Омская область',39 => 'Оренбургская область',40 => 'Орловская область',41 => 'Пензенская область',42 => 'Пермский край',43 => 'Приморский край',44 => 'Псковская область',45 => 'Республика Адыгея',46 => 'Республика Алтай',47 => 'Республика Башкортостан',48 => 'Республика Бурятия',49 => 'Республика Дагестан',50 => 'Республика Ингушетия',51 => 'Республика Калмыкия',52 => 'Республика Карелия',53 => 'Республика Коми',54 => 'Республика Марий Эл',55 => 'Республика Мордовия',56 => 'Республика Саха (Якутия)',57 => 'Республика Северная Осетия — Алания',58 => 'Республика Татарстан',59 => 'Республика Тыва',60 => 'Республика Хакасия',61 => 'Ростовская область',62 => 'Рязанская область',63 => 'Самарская область',64 => 'Саратовская область',65 => 'Сахалинская область',66 => 'Свердловская область',67 => 'Смоленская область',68 => 'Ставропольский край',69 => 'Тамбовская область',70 => 'Тверская область',71 => 'Томская область',72 => 'Тульская область',73 => 'Тюменская область',74 => 'Удмуртская республика',75 => 'Ульяновская область',76 => 'Хабаровский край',77 => 'Ханты-Мансийский автономный округ - Югра',78 => 'Челябинская область',79 => 'Чеченская республика',80 => 'Чувашская республика',81 => 'Чукотский автономный округ',82 => 'Ямало-Ненецкий автономный округ',83 => 'Ярославская область', 98 => 'За пределами России'
  ];

  public function rules()
  {
    return [
      ['value', 'required', 'message' => 'Выберите регион из списка']
    ];
  }

    protected function getInternalExportValueTitles()
    {
        $titles = ['Город'];
        return array_values($titles);
    }

    protected function getInternalExportData(Result $result)
    {
        $questionData = $result->getQuestionResult($this->question);
        $key = $questionData['value'];
        $data[] = isset($this->values[$key]) ? $this->values[$key] : '';
        return $data;
    }
}
