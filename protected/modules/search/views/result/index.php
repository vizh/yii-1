<?if (\Yii::app()->request->getParam('tab') !== null):?>
<script>
  $(function () {
    $('a[href="#<?=$tab;?>"]').trigger('click');
  });
</script>
<?endif;?>

<h2 class="b-header_large light">
  <div class="line"></div>
  <div class="container">
    <div class="title">
      <span class="backing runet">Runet</span>
      <span class="backing text"><?=\Yii::t('app', 'Результаты поиска');?></span>
    </div>
  </div>
</h2>

<div class="search-results">
  <div class="container">
    <div id="search-tabs" class="tabs">
      <?if (empty($term)):?>
        <header class="h">
          <h4 class="t"><?=\Yii::t('app', 'Вы не указали поисковый запрос!');?></h4>
        </header>
      <?elseif (empty($results->Results)):?>
        <header class="h">
          <h4 class="t"><?=\Yii::t('app', 'По запросу &laquo;<b>{term}</b>&raquo; ничего не найдено!', array('{term}' => $term));?></h4>
        </header>
      <?else:?>
      <header class="h">
        <h4 class="t"><?=\Yii::t('app', 'По запросу &laquo;<b>{term}</b>&raquo; найдено:', array('{term}' => $term));?></h4>
      </header>
      
      <ul class="nav">
        <li><a href="#<?=\search\components\SearchResultTabId::User;?>" class="pseudo-link">
          <?=\Yii::t('app', '{n} пользователь|{n} пользователя|{n} пользователей|{n} пользователя', $results->Counts['user\models\User']);?>
        </a></li>
        <li>/</li>
        <li><a href="#<?=\search\components\SearchResultTabId::Companies;?>" class="pseudo-link">
          <?=\Yii::t('app', '{n} компания|{n} компании|{n} компаний|{n} компания', $results->Counts['company\models\Company']);?>
        </a></li>
      </ul>
      
      <?if (!empty($results->Results['user\models\User'])):?>
      <div id="<?=\search\components\SearchResultTabId::User;?>" class="tab users-list">
        <div class="row">
          <div class="span8 offset2">
            <table class="table">
              <tbody>
                <?foreach ($results->Results['user\models\User'] as $user):?>
                <tr class="user-h">
                  <td colspan="3">
                    <div>
                      <b class="h pull-left muted">Runet ID</b>
                      <hr>
                      <b class="id pull-right"><?=$user->RunetId;?></b>
                    </div>
                  </td>
                </tr>
                <tr class="user-cnt">
                  <td class="span1">
                    <a href="<?=$this->createUrl('/user/view/index', array('runetId' => $user->RunetId));?>">
                      <?=\CHtml::image($user->getPhoto()->get58px(), $user->getFullName());?>
                    </a>
                  </td>
                  <td class="span4 user">
                    <a href="<?=$this->createUrl('/user/view/index', array('runetId' => $user->RunetId));?>">
                      <h4 class="title"><?=$user->FirstName;?></h4>
                      <p class="name"><?=$user->LastName;?> <?if ($user->getIsShowFatherName()):?><?=$user->FatherName;?><?endif;?></p>
                    </a>
                  </td>
                  <td class="span3">
                    <p class="job muted">
                      <?php $employment = $user->getEmploymentPrimary();?>
                      <b><?=$employment->Company->Name;?></b><br><?=$employment->Position;?>
                    </p>
                  </td>
                </tr>
                <?endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
        
        <?php $this->widget('\application\widgets\Paginator', array(
          'paginator' => $paginators->User
        ));?>
      </div>
      <?endif;?>

      <?if (!empty($results->Results['company\models\Company'])):?>
      <div id="<?=\search\components\SearchResultTabId::Companies;?>" class="tab companies-list">
        <div class="row">
          <div class="span8 offset2">
            <table class="table">
              <tbody>
                <?foreach ($results->Results['company\models\Company'] as $company):?>
                <tr>
                  <td class="span1">
                    <a href="<?=$this->createUrl('/company/view/index', array('companyId' => $company->Id));?>">
                      <?=\CHtml::image($company->getLogo(), $company->Name, array('width' => 58));?>
                    </a>
                  </td>
                  <td class="span3">
                    <h4 class="title">
                      <a href="<?=$this->createUrl('/company/view/index', array('companyId' => $company->Id));?>"><?=$company->Name;?></a>
                    </h4>
                    <?if (!empty($company->LinkAddress)):?>
                    <p class="location"><?=$company->LinkAddress->Address->City->Name;?></p>
                    <?endif;?>
                    <p class="employees"><?=\Yii::t('app', '<b>{n}</b> сотрудник|<b>{n}</b> сотрудника|<b>{n}</b> сотрудников|<b>{n}</b> сотрудника', sizeof($company->Employments));?></p>
                  </td>
                  <td class="span2">
                    <?foreach ($company->LinkPhones as $link):?>
                    <p><?=$link->Phone;?></p>
                    <?endforeach;?>
                  </td>
                  <td class="span2 t-right">
                    <?php foreach ($company->LinkEmails as $link):?>
                    <p><a href="mailto:<?=$link->Email->Email;?>"><?=$link->Email->Email;?></a> <?if(!empty($link->Email->Title)):?>(<?=$link->Email->Title;?>)<?php endif;?></p>
                    <?php endforeach;?>

                    <?if(!empty($company->LinkSite)):?>
                    <p><a href="<?=$company->LinkSite->Site;?>"><?=$company->LinkSite->Site->Url;?></a></p>
                    <?endif;?>
                  </td>
                </tr>
                <?endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
        
        <?php $this->widget('\application\widgets\Paginator', array(
          'paginator' => $paginators->Company
        ));?>
      </div>
      <?endif;?>
      <?endif;?>
    </div>
  </div>
</div>