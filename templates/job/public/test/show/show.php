<div class="content">
  <?php echo $this->Submenu;?>

  <div class="vacancies jobtest">
    <ul>
      <li>
        <span class="time"><?=$this->Date;?> г.</span>
        <div class="job_title">
          <?if (! empty($this->VacancyId)):?>
          Для отзыва на вакансию
          <a href="<?=RouteRegistry::GetUrl('job', '', 'show', array('id'=>$this->VacancyId));?>"><?=$this->VacancyTitle;?></a>
          <span class="salary"><span class="salary_end">
      <?if ($this->SalaryMin == $this->SalaryMax):?>
            <?=$this->SalaryMin;?>&nbsp;000
            <?elseif (empty($this->SalaryMin)):?>
            до&nbsp;<?=$this->SalaryMax;?>&nbsp;000
            <?elseif (empty($this->SalaryMax)):?>
            от&nbsp;<?=$this->SalaryMin;?>&nbsp;000
            <?else:?>
            <?=$this->SalaryMin;?>&nbsp;000&nbsp;&mdash;&nbsp;<?=$this->SalaryMax;?>&nbsp;000
            <?endif;?>&nbsp;рублей
    </span></span>
          необходимо пройти тест
          <strong><?=$this->TestTitle;?></strong>
          <?else:?>
          <a href="<?=RouteRegistry::GetUrl('job', 'test', 'show', array('id'=>$this->TestId));?>"><?=$this->TestTitle;?></a>
        <?endif;?>
        </div>
        <div class="description_full">
          <?=$this->Description;?>
        </div>

        <?php echo $this->Info;?>
        <?php echo $this->Results;?>

        <?if ($this->RetestDeny):?>
          <div class="additional_info">
            <h3>Вы недавно проходили тест</h3>
            <strong>Повторное прохождение возможно через:</strong>
            <?if ($this->RetestTime > 24*60*60):?>
              <?$days = ceil($this->RetestTime / (24*60*60));?>
              <?=$days;?> <?=Texts::GetRightFormByCount($days, 'день', 'дня', 'дней');?>
            <?elseif ($this->RetestTime > 60*60):?>
              <?$hours = ceil($this->RetestTime / (60*60));?>
              <?=$hours;?> <?=Texts::GetRightFormByCount($hours, 'час', 'часа', 'часов');?>
            <?else:?>
              <?$minutes = ceil($this->RetestTime / 60);?>
              <?=$minutes;?> <?=Texts::GetRightFormByCount($minutes, 'минуту', 'минуты', 'минут');?>
            <?endif;?>
          </div>
        <?else:?>
          <div class="response">
            <a href="<?=RouteRegistry::GetUrl('job', 'test', 'process', array('id' => $this->TestId))?>">Начать тест</a>
          </div>
        <?endif;?>


      </li>

    </ul>
  </div>
  <div id="sidebar" class="sidebar sidebarcomp">
    <?php echo $this->PartnerBanner;?>
    <?php echo $this->JobTestPartnerBanner;?>
    <?php echo $this->Banner;?>
  </div>
</div>