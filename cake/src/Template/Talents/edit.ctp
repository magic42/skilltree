<?= $this->Nav->display(['actions' => ['delete'], 'id' => $talent->id]); ?>

<div class="talents form large-9 medium-8 columns content">
    <?= $this->Form->create($talent) ?>
    <fieldset>
        <legend><?= __('Edit Talent') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
