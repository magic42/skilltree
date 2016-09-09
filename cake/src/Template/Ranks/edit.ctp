<?= $this->Nav->display(['actions' => ['delete'], 'id' => $rank->id]); ?>

<div class="ranks form large-9 medium-8 columns content">
    <?= $this->Form->create($rank) ?>
    <fieldset>
        <legend><?= __('Edit Rank') ?></legend>
        <?php
            echo $this->Form->input('description');
            echo $this->Form->input('skill_id', ['options' => $skills]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
