<section class="main">
  <h2>Основная компания</h2>
  <table class="persons">
    <?php echo $this->MainCompany;?>
  </table>

  <h2>Дополнительные</h2>
  <table class="persons">
    <?php echo $this->SecondCompanies;?>
  </table>
</section>
<section class="main">
  <form id="form_check" action="" method="post">
    <input type="hidden" name="main_id" value="<?=$this->Main;?>">
    <input type="hidden" name="second_id" value="<?=$this->Second;?>">
    <input type="hidden" name="checked" value="checked">
    <a class="button big" href="#" onclick="$('#form_check')[0].submit(); return false;">Объединить</a>
    <a class="button big" href="<?=RouteRegistry::GetAdminUrl('user', '', 'merge');?>">Сбросить</a>
  </form>
</section>