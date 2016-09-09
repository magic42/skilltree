<?= $this->Nav->display(['actions' => ['delete'], 'id' => $link->id]); ?>

<div class="links form large-9 medium-8 columns content">
    <?= $this->Form->create($link) ?>
    <fieldset>
        <legend><?= __('Edit Link') ?></legend>
        <?php
            echo $this->Form->input('label');
            echo $this->Form->input('url');
            echo $this->Form->input('skill_id', ['options' => $skills]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
