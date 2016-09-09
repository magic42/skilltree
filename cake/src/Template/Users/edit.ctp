<?= $this->Nav->display(['actions' => ['delete'], 'id' => $user->id]); ?>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('role');
        ?>
        <label>Skills</label>
        <div style="max-height: 200px; overflow: auto;">
            <?php
                echo $this->Form->multiCheckbox('skills._ids', $skills);
            ?>
        </div>
        <label>Stats</label>
        <div style="max-height: 200px; overflow: auto;">
            <?php
                echo $this->Form->multiCheckbox('stats._ids', $stats);
            ?>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
