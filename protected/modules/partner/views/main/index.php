<div class="row">
  <div class="span8">
    <h2 class="indent-bottom1">Участники</h2>
    <?php if (!empty($event->Days)):?>
      <?php foreach ($event->Days as $day):?>
        <h4><?php echo $day->Title;?></h4>
        <table class="table">
          <thead>
            <th>Роль</th>
            <th>Кол-во</th>
            <th>За сегодня</th>
            <th>За неделю</th>
          </thead>
          <tbody>
            <?php $totalCol1 = 0; $totalCol2 = 0; $totalCol3 = 0;?>
            <?php foreach ($stat->Participants[$day->DayId] as $roleId => $item):?>
              <?php 
                $totalCol1 += $item->Count;
                $totalCol2 += $item->CountToday;
                $totalCol3 += $item->CountWeek;
              ?>
              <tr>
                <td><?php echo $stat->Roles[$roleId];?></td>
                <td><?php echo $item->Count;?></td>
                <td><?php echo (int) $item->CountToday;?></td>
                <td><?php echo (int) $item->CountWeek;?></td>
              </tr>
            <?php endforeach;?>
            <tr>
              <td><strong>Всего:</strong></td>
              <td><?php echo $totalCol1;?></td>
              <td><?php echo $totalCol2;?></td>
              <td><?php echo $totalCol3;?></td>
            </tr>
          </tbody>
        </table>
      <?php endforeach;?>
    <?php else:?>
      <table class="table">
        <thead>
          <th>Роль</th>
          <th>Кол-во</th>
          <th>За Сегодня</th>
          <th>За неделю</th>
        </thead>
        <tbody>
          <?php $totalCol1 = 0; $totalCol2 = 0; $totalCol3 = 0;?>
          <?php foreach ($stat->Participants as $roleId => $item):?>
            <?php 
              $totalCol1 += $item->Count;
              $totalCol2 += $item->CountToday;
              $totalCol3 += $item->CountWeek;
            ?>
            <tr>
              <td><?php echo $stat->Roles[$roleId];?></td>
              <td><?php echo $item->Count;?></td>
              <td><?php echo (int) $item->CountToday;?></td>
              <td><?php echo (int) $item->CountWeek;?></td>
            </tr>
          <?php endforeach;?>
          <tr>
            <td><strong>Всего:</strong></td>
            <td><?php echo $totalCol1;?></td>
            <td><?php echo $totalCol2;?></td>
            <td><?php echo $totalCol3;?></td>
          </tr>
        </tbody>
      </table>
    <?php endif;?>
  </div>
</div>