<?= $this->Nav->display(['actions' => ['edit', 'delete'], 'id' => $talent->id]); ?>

<div class="talents view large-9 medium-8 columns content">
    <h3><?= h($talent->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= h($talent->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($talent->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Photo') ?></th>
            <td>
                <?php if($talent->get('photo_dir') != "") : ?>
                    <?php echo $this->Html->image('../files/talents/photo/' . $talent->get('photo_dir') . '/' . $talent->get('photo')); ?>
                <?php else :?>
                    <h5>No image found</h5>
                <?php endif;?>
             </td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Skills') ?></h4>
        <?php if (!empty($talent->skills)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Talent Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($talent->skills as $skills): ?>
            <tr>
                <td><?= h($skills->id) ?></td>
                <td><?= h($skills->title) ?></td>
                <td><?= h($skills->description) ?></td>
                <td><?= h($skills->talent_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Skills', 'action' => 'view', $skills->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Skills', 'action' => 'edit', $skills->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Skills', 'action' => 'delete', $skills->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skills->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
