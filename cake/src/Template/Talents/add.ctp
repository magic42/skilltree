<?= $this->Nav->display(); ?>

<div class="talents form large-9 medium-8 columns content">
    <?= $this->Form->create($talent) ?>
    <fieldset>
        <legend><?= __('Add Talent') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
