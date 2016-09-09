<?= $this->Nav->display(); ?>

<div class="skillsTree form large-9 medium-8 columns content">
    <?= $this->Form->create($skillsTree) ?>
    <fieldset>
        <legend><?= __('Add Skills Tree') ?></legend>
        <?php
            echo $this->Form->input('parent_id', ['options' => $parentSkillsTree, 'empty' => true]);
            echo $this->Form->input('skill_id', ['empty' => __("Pick a skill..."), 'options' => $skills]);
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
