<?php
/**
 * @var bool $done
 * @var competence\models\Test $test
 */
?>

<div class="row">
    <div class="span12 m-top_30 text-center">
        <?php if (!empty($test->AfterEndText)): ?>
            <?= $test->AfterEndText ?>
        <?php else: ?>
            <?php if ($test->EventId == 2318 /* svyaz16 */): ?>
                <?= Yii::t('app', 'Спасибо! Ваша анкета отправлена. Для регистрации нового участника перейдите к шагу 1') ?>!
            <?php else: ?>
                <?= Yii::t('app', 'БОЛЬШОЕ СПАСИБО ЗА УЧАСТИЕ В НАШЕМ ИССЛЕДОВАНИИ') ?>!
            <?php endif ?>
        <?php endif ?>

        <?php if ($done): ?>
            <p style="color: #ff9900;">Вы уже ответили на вопросы исследования ранее.</p>
        <?php endif ?>
    </div>
</div>

<?php if ($test->EventId == 2318 /* svyaz16 */): ?>
    <script>
        var el = parent.document.getElementById('runetId').children[0];
        el.style.height = '300px';
        el.style.overflow = 'hidden';
    </script>
<?php endif ?>