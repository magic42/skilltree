<?= $this->Nav->display(['actions' => ['delete'], 'id' => $user->id]); ?>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('role');
            echo $this->Form->input('skills._ids', ['options' => $skills]);
            echo $this->Form->input('stats._ids', ['options' => $stats]);
            echo $this->Form->input('photo', ['type' => 'file']);
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
