<script type="text/javascript">
$(window).load(function() {

  new Chart({
    itemTemplate: $('#chart-item-template').html(),
    height: 220,
    avail: 2 * Math.PI,
    disp: 1.5 * Math.PI,
    clockwise: true,
    border: {
      size: 15,
      color: "#e6e6e6"
    },
    parts: [
      {color: "#ffd02e", val: 1, role: "слушателя"},
      {color: "#6363d2", val: 4, role: "докладчика"},
      {color: "#7d45a1", val: 7, role: "ведущего"}
    ],
    charts: [
      'charts-pie-canvas-1',
      'charts-pie-canvas-2',
      'charts-pie-canvas-3'
    ]          
  }).createOn('charts-pie');

  new RunetChart({
    itemTemplate: $('#single-chart-item-template').html(),
    height: 270,
    border: {
      size: 60,
      color: "#e6e6e6"
    },
    parts: [
      {color: "#88e9a0", val: 1, role: "В области рекламы"},
      {color: "#5dbccc", val: 2, role: "В вопросах поисковой оптимизации"},
      {color: "#d362b0", val: 3, role: "По информационной безопасности"},
      {color: "#e58074", val: 4, role: "В вопросах мобильных технологий и приложений"}
    ]
  }).createOn('charts-single');

  new LinearChart({
    items: [
      {
        year: "2012",
        parts: [
          {color: "#f6bf00", val: 10, role: "слушателем"},
          {color: "#6363d2", val: 1, role: "докладчиком"},
          {color: "#7d45a1", val: 1, role: "ведущим"}
        ]
      },
      {
        year: "2011",
        parts: [
          {color: "#f6bf00", val: 12, role: "слушателем"},
          {color: "#6363d2", val: 2, role: "докладчиком"},
          {color: "#7d45a1", val: 2, role: "ведущим"}
        ]
      },
      {
        year: "2010",
        parts: [
          {color: "#f6bf00", val: 11, role: "слушателем"},
          {color: "#6363d2", val: 3, role: "докладчиком"},
          {color: "#7d45a1", val: 1, role: "ведущим"}
        ]
      },
      {
        year: "2009",
        parts: [
          {color: "#f6bf00", val: 9, role: "слушателем"},
          {color: "#6363d2", val: 4, role: "докладчиком"}
        ]
      }
    ]
  }).createOn('charts-linear');

  $('.charts-linear').find('.item').tooltip();

});
</script>
    

<h2 class="b-header_large light">
  <div class="line"></div>
  <div class="container">
    <div class="title">
      <span class="backing runet">Runet</span>
      <span class="backing text"><?=\Yii::t('app', 'Профиль пользователя');?></span>
    </div>
  </div>
</h2>

<div class="user-account">
  <div class="clearfix">
    <div class="container">
      <div class="b-card">
        <h5 class="b-header_small medium">
          <span class="backing">Runet</span>
          <span class="backing">ID</span>
        </h5>
        <div class="row">
          <div class="span3">
            <img src="/images/content/account-avatar_large.jpg" width="238" height="238" alt="" class="avatar">
          </div>
          <div class="span8">
            <div class="row">
              <div class="span4 b-details">
                <b class="id"><?=$user->RunetId;?></b>
                <header>
                  <h4 class="title">
                    <?=$user->getName();?><?if ($user->getIsShowFatherName()):?><br><span class="family-name"><?=$user->FatherName;?></span><?endif;?>
                  </h4>
                  <?php $age = $user->getAge();?>
                  <?if ($age > 0 || $user->LinkAddress !== null):?>
                    <small class="muted">
                      <?if ($age > 0):?><?=\Yii::t('app', '{n} год|{n} года|{n} лет|{n} года', $age);?><?endif;?>
                      <?if ($user->LinkAddress->Address->City !== null):?>, <?=$user->LinkAddress->Address->City->Name;?><?endif;?>
                    </small>
                  <?endif;?>
                </header>
                <?php $primaryEmployment = $user->getEmploymentPrimary();?>
                <?if ($primaryEmployment !== null):?>
                <div class="b-job">
                  <header>
                    <h6 class="title company"><?=$primaryEmployment->Company->Name;?></h6>
                  </header> 
                  <?if (!empty($primaryEmployment->Position)):?>
                  <article>
                    <p class="text post"><?=$primaryEmployment->Position;?></p>
                  </article>
                  <?endif;?>
                </div>
                <?endif;?>
                <div class="b-interests">
                  <header>
                    <h6 class="title">Профессиональные интересы</h6>
                  </header>
                  <article>
                    <p class="text">Аналитика, Веб-разработка / Технологии / API, Геосервисы, Государство и общество, Инвестиции и стартапы</p>
                  </article>
                </div>
                <div class="event-rank">Менеджер высшего уровня</div>
                <div class="b-raec">
                  <img src="/images/content/raec-logo_small.jpg" alt="РАЭК" class="logo">
                  <p class="text">Член РАЭК<br>Сопредседатель комиссии<br>Эксперт комиссии</p>
                </div>
              </div>
              <div class="span4 b-contacts">
                <?if ($user->LinkSite !== null):?>
                <dl class="dl-horizontal">
                  <dt><?=\Yii::t('app', 'Сайт:');?></dt>
                  <dd><a href="<?=$user->LinkSite->Site;?>"><?=$user->LinkSite->Site->Url;?></a></dd>
                </dl>
                <?endif;?>
                <?if (!empty($user->LinkServiceAccounts)):?>
                  <?foreach ($user->LinkServiceAccounts as $linkServiceAcc):?>
                  <dl class="dl-horizontal">
                    <dt><?=$linkServiceAcc->ServiceAccount->Type->Title;?>:</dt>
                    <dd><?=$linkServiceAcc->ServiceAccount;?></dd>
                  </dl>
                  <?endforeach;?>
                <?endif;?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="b-statistics">  
      <h4 class="b-header_large light">
        <div class="line"></div>
        <div class="container">
          <div class="title">
            <span class="backing text">Участие в профильных мероприятиях</span>
          </div>
        </div>
      </h4>
      <div class="container">
        <div class="charts">

          <!-- Charts pie -->
          <div class="clearfix">
            <div class="row">
              <div id="charts-pie-1" class="span4 charts-pie items"><canvas id="charts-pie-canvas-1"></canvas></div>
              <div id="charts-pie-2" class="span4 charts-pie items"><canvas id="charts-pie-canvas-2"></canvas></div>
              <div id="charts-pie-3" class="span4 charts-pie items"><canvas id="charts-pie-canvas-3"></canvas></div>
            </div>
          </div>

          <h5 class="title t-center">Центр компетенций / Профессиональная активность</h5>
          <div class="row">
            <div class="span6 t-right">

              <!-- Charts single -->
              <div id="charts-single"><canvas id="charts-single_canvas" class="clearfix"></canvas></div>

            </div>
            <div class="span6">

              <!-- Charts linear -->
              <div id="charts-linear"></div>

            </div>
          </div>
        </div>
        <div class="more">
          <a href="#">Еще тесты</a>
        </div>
      </div>
    </div>

    <div class="b-participated">
      <h4 class="b-header_large light">
        <div class="line"></div>
        <div class="container">
          <div class="title">
            <span class="backing text">
              Участние в мероприятиях за
              <form action="#" class="form-inline">
                <select>
                  <option value="2012" selected>2012</option>
                  <option value="2011">2011</option>
                  <option value="2010">2010</option>
                  <option value="2009">2009</option>
                </select>
              </form>
            </span>
          </div>
        </div>
      </h4> 
      <div class="container">
        <div class="row">
          <figure class="i span2">
            <img src="/images/content/event-logo-account-1.jpg" width="138" height="79" alt="" class="img">
            <figcaption class="cnt">
              <p class="tx">Участник профессиональной программы</p>
              <p class="tx">Дистанционное участие</p>
            </figcaption>
          </figure
          ><figure class="i span2">
            <img src="/images/content/event-logo-account-2.jpg" width="138" height="79" alt="" class="img">
            <figcaption class="cnt">
              <p class="tx">Слушатель</p>
            </figcaption>
          </figure
          ><figure class="i span2">
            <img src="/images/content/event-logo-account-3.jpg" width="138" height="79" alt="" class="img">
            <figcaption class="cnt">
              <p class="tx">Слушатель</p>
            </figcaption>
          </figure
          ><figure class="i span2">
            <img src="/images/content/event-logo-account-4.jpg" width="138" height="79" alt="" class="img">
            <figcaption class="cnt">
              <div><a href="javascript:void(0);" class="a pseudo-link">Докладчик</a></div>
              <div><a href="javascript:void(0);" class="a pseudo-link">Ведущий</a></div>
              <div><a href="javascript:void(0);" class="a pseudo-link">Ведущий</a></div>
            </figcaption>
            <div class="popup">
              <div class="cnt">
                <div><a href="javascript:void(0);" class="a pseudo-link">Докладчик</a></div>
                <p class="tx">Social Media Marketing от А до Я: лояльные клиенты из социальных сетей</p>
                <div><a href="javascript:void(0);" class="a pseudo-link">Ведущий</a></div>
                <p class="tx">Как за месяц поднять продажи на 20%</p>
                <div><a href="javascript:void(0);" class="a pseudo-link">Ведущий</a></div>
                <p class="tx">Как за месяц поднять продажи на 20%</p>
              </div>
            </div>
          </figure
          ><figure class="i span2">
            <img src="/images/content/event-logo-account-1.jpg" width="138" height="79" alt="" class="img">
            <figcaption class="cnt">
              <div><a href="javascript:void(0);" class="a pseudo-link">Ведущий</a></div>
            </figcaption>
            <div class="popup">
              <div class="cnt">
                <div><a href="javascript:void(0);" class="a pseudo-link">Ведущий</a></div>
                <p class="tx">Как за месяц поднять продажи на 20%</p>
              </div>
            </div>
          </figure
          ><figure class="i span2">
            <img src="/images/content/event-logo-account-2.jpg" width="138" height="79" alt="" class="img">
            <figcaption class="cnt">
              <p class="tx">Дистанционное участие</p>
            </figcaption>
          </figure>
        </div>
        <div class="row">
          <figure class="i span2">
            <img src="/images/content/event-logo-account-2.jpg" width="138" height="79" alt="" class="img">
            <figcaption class="cnt">
              <p class="tx">Участник профессиональной программы</p>
            </figcaption>
          </figure
          ><figure class="i span2">
            <img src="/images/content/event-logo-account-1.jpg" width="138" height="79" alt="" class="img">
            <figcaption class="cnt">
              <p class="tx">Слушатель</p>
            </figcaption>
          </figure
          ><figure class="i span2">
            <img src="/images/content/event-logo-account-4.jpg" width="138" height="79" alt="" class="img">
            <figcaption class="cnt">
              <p class="tx">Слушатель</p>
            </figcaption>
          </figure
          ><figure class="i span2">
            <img src="/images/content/event-logo-account-3.jpg" width="138" height="79" alt="" class="img">
            <figcaption class="cnt">
              <div><a href="javascript:void(0);" class="a pseudo-link">Докладчик</a></div>
              <div><a href="javascript:void(0);" class="a pseudo-link">Ведущий</a></div>
            </figcaption>
            <div class="popup">
              <div class="cnt">
                <div><a href="javascript:void(0);" class="a pseudo-link">Докладчик</a></div>
                <p class="tx">Social Media Marketing от А до Я: лояльные клиенты из социальных сетей</p>
                <div><a href="javascript:void(0);" class="a pseudo-link">Ведущий</a></div>
                <p class="tx">Как за месяц поднять продажи на 20%</p>
              </div>
            </div>
          </figure
          ><figure class="i span2">
            <img src="/images/content/event-logo-account-2.jpg" width="138" height="79" alt="" class="img">
            <figcaption class="cnt">
              <div><a href="javascript:void(0);" class="a pseudo-link">Ведущий</a></div>
            </figcaption>
            <div class="popup">
              <div class="cnt">
                <div><a href="javascript:void(0);" class="a pseudo-link">Ведущий</a></div>
                <p class="tx">Как за месяц поднять продажи на 20%</p>
              </div>
            </div>
          </figure
          ><figure class="i span2">
            <img src="/images/content/event-logo-account-1.jpg" width="138" height="79" alt="" class="img">
            <figcaption class="cnt">
              <p class="tx">Дистанционное участие</p>
            </figcaption>
          </figure>
        </div>
        <div class="all">
          <a href="#" class="pseudo-link">Все мероприятия</a>
        </div>
      </div>
    </div>

    <div class="b-participate"> 
      <h4 class="b-header_large light">
        <div class="line"></div>
        <div class="container">
          <div class="title">
            <span class="backing text">Примите участие</span>
          </div>
        </div>
      </h4>    
      <div id="participate-events" class="container">
        <div class="slider">
          <div class="slides">
            <div class="slide row">
              <div class="i span3">
                <header class="h">
                  <div class="date">
                    <div class="d">23-25</div>
                    <div class="m">сентября</div>
                  </div>
                  <p class="tx muted">Вебинар, Москва</p>
                  <h5 class="t"><a href="#" class="event-color_4">Как получать больше результатов, тратя меньше времени и денег в контекстной рекламе</a></h5>
                </header>
                <article class="cnt">
                  <p class="tx">В ходе мероприятия будут подробно рассматриваться все основные вопросы по работе с контекстной рекламой.</p>
                </article>
                <footer class="f">
                  <a href="#" class="a">
                    <i class="icon-circle-arrow-right"></i>Посетить мероприятие
                  </a>
                </footer>
              </div>
              <div class="i span3">
                <header class="h">
                  <div class="date">
                    <div class="d">12</div>
                    <div class="m">сентября</div>
                  </div>
                  <p class="tx muted">Круглый стол</p>
                  <h5 class="t"><a href="#">Интернет-магазин с нуля: от идеи до стабильных продаж</a></h5>
                </header>
                <article class="cnt">
                  <p class="tx">В ходе мероприятия будут подробно рассматриваться все основные вопросы по работе с контекстной рекламой.</p>
                </article>
                <footer class="f">
                  <a href="#" class="a">
                    <i class="icon-circle-arrow-right"></i>Посетить мероприятие
                  </a>
                </footer>
              </div>
              <div class="i span3">
                <header class="h">
                  <div class="date">
                    <div class="d">3</div>
                    <div class="m">августа</div>
                  </div>
                  <p class="tx muted">Вебинар, Москва</p>
                  <h5 class="t"><a href="#">Как получать больше результатов, тратя меньше времени и денег в контекстной рекламе</a></h5>
                </header>
                <article class="cnt">
                  <p class="tx">В ходе мероприятия будут подробно рассматриваться все основные вопросы по работе с контекстной рекламой.</p>
                </article>
                <footer class="f">
                  <a href="#" class="a">
                    <i class="icon-circle-arrow-right"></i>Посетить мероприятие
                  </a>
                </footer>
              </div>
              <div class="i span3">
                <header class="h">
                  <div class="date">
                    <div class="d">17-18</div>
                    <div class="m">мая</div>
                  </div>
                  <p class="tx muted">Конференция</p>
                  <h5 class="t"><a href="#">Конференция «Бизнес Мёртвых Деревьев»</a></h5>
                </header>
                <article class="cnt">
                  <p class="tx">Мероприятие длится два дня и предназначено для тех, кому нужен сайт, и тех, кто их разрабатывает.</p>
                </article>
                <footer class="f">
                  <a href="#" class="a">
                    <i class="icon-circle-arrow-right"></i>Посетить мероприятие
                  </a>
                </footer>
              </div>
            </div>
            <div class="slide row">
              <div class="i span3">
                <header class="h">
                  <div class="date">
                    <div class="d">17</div>
                    <div class="m">февраля</div>
                  </div>
                  <p class="tx muted">Вебинар, Москва</p>
                  <h5 class="t"><a href="#">Как получать больше результатов, тратя меньше времени и денег в контекстной рекламе</a></h5>
                </header>
                <article class="cnt">
                  <p class="tx">В ходе мероприятия будут подробно рассматриваться все основные вопросы по работе с контекстной рекламой.</p>
                </article>
                <footer class="f">
                  <a href="#" class="a">
                    <i class="icon-circle-arrow-right"></i>Посетить мероприятие
                  </a>
                </footer>
              </div>
              <div class="i span3">
                <header class="h">
                  <div class="date">
                    <div class="d">5-12</div>
                    <div class="m">февраля</div>
                  </div>
                  <p class="tx muted">Круглый стол</p>
                  <h5 class="t"><a href="#" class="event-color_2">Интернет-магазин с нуля: от идеи до стабильных продаж</a></h5>
                </header>
                <article class="cnt">
                  <p class="tx">В ходе мероприятия будут подробно рассматриваться все основные вопросы по работе с контекстной рекламой.</p>
                </article>
                <footer class="f">
                  <a href="#" class="a">
                    <i class="icon-circle-arrow-right"></i>Посетить мероприятие
                  </a>
                </footer>
              </div>
              <div class="i span3">
                <header class="h">
                  <div class="date">
                    <div class="d">29</div>
                    <div class="m">января</div>
                  </div>
                  <p class="tx muted">Вебинар, Москва</p>
                  <h5 class="t"><a href="#" class="event-color_3">Как получать больше результатов, тратя меньше времени и денег в контекстной рекламе</a></h5>
                </header>
                <article class="cnt">
                  <p class="tx">В ходе мероприятия будут подробно рассматриваться все основные вопросы по работе с контекстной рекламой.</p>
                </article>
                <footer class="f">
                  <a href="#" class="a">
                    <i class="icon-circle-arrow-right"></i>Посетить мероприятие
                  </a>
                </footer>
              </div>
              <div class="i span3">
                <header class="h">
                  <div class="date">
                    <div class="d">7</div>
                    <div class="m">января</div>
                  </div>
                  <p class="tx muted">Конференция</p>
                  <h5 class="t"><a href="#" class="event-color_4">Конференция «Бизнес Мёртвых Деревьев»</a></h5>
                </header>
                <article class="cnt">
                  <p class="tx">Мероприятие длится два дня и предназначено для тех, кому нужен сайт, и тех, кто их разрабатывает.</p>
                </article>
                <footer class="f">
                  <a href="#" class="a">
                    <i class="icon-circle-arrow-right"></i>Посетить мероприятие
                  </a>
                </footer>
              </div>
            </div>
          </div>
        </div>
        <i id="participate-events_prev" class="icon-chevron-left"></i>
        <i id="participate-events_next" class="icon-chevron-right"></i>
      </div>
    </div>
  </div>
</div>

<script type="text/template" id="chart-item-template">
  <div class="item">
    <div class="info">
      <div class="val"><%= value %></div>
      <div class="description">В качестве <b><%= role%></b></div>
    </div>
  </div>
</script>

<script type="text/template" id="single-chart-item-template">
  <div class="item">
    <span class="val"><b><%= value %></b>%</span>
    <span class="description"><%= role %></span>
  </div>
</script>