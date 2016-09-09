<?= $this->Nav->display(); ?>

<div class="ranks index large-9 medium-8 columns content">
    <h3><?= __('Ranks') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Description') ?></th>
                <th><?= $this->Paginator->sort('skill_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ranks as $rank): ?>
            <tr>
                <td><?= h($rank->description) ?></td>
                <td><?= $rank->has('skill') ? $this->Html->link($rank->skill->title, ['controller' => 'Skills', 'action' => 'view', $rank->skill->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rank->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rank->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rank->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rank->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
