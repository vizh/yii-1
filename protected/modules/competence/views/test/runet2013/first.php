<?php
/**
 * @var $question \competence\models\tests\runet2013\First
 */
?>
<h3>Ваши фамилия, имя, отчество (полностью).</h3>

<?$this->widget('competence\components\ErrorsWidget', array('question' => $question))?>

<ul class="unstyled">
  <li>
    <?=CHtml::activeTextField($question, 'value', ['class' => 'input-block-level'])?>
  </li>
</ul>
