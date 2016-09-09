<?= $this->Nav->display(['actions' => ['edit', 'delete'], 'id' => $link->id]); ?>

<div class="links view large-9 medium-8 columns content">
    <h3><?= h($link->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= h($link->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Label') ?></th>
            <td><?= h($link->label) ?></td>
        </tr>
        <tr>
            <th><?= __('Skill') ?></th>
            <td><?= $link->has('skill') ? $this->Html->link($link->skill->title, ['controller' => 'Skills', 'action' => 'view', $link->skill->id]) : '' ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Url') ?></h4>
        <?= $this->Text->autoParagraph(h($link->url)); ?>
    </div>
</div>
