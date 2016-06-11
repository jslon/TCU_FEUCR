<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Savings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Associations'), ['controller' => 'Associations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Association'), ['controller' => 'Associations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="savings form large-9 medium-8 columns content">
    <?= $this->Form->create($saving) ?>
    <fieldset>
        <legend><?= __('Add Saving') ?></legend>
        <?php
            echo $this->Form->input('amount');
            echo $this->Form->input('state');
            echo $this->Form->input('date');
            echo $this->Form->input('association_id', ['options' => $associations]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
