<div>
    <?php echo $this->Html->script('jquery.min.js'); ?>
    <?php echo $this->Html->script('knockout.min.js'); ?>
    <?php echo $this->Html->script('app.js'); ?>
</div>
<h3>Name</h3>
<div data-bind="text: character.name"></div>
<h3>Stats</h3>

<ul data-bind="foreach: { data: character.stats2, as: 'stat' }">
    <li>
       <span data-bind="text: stat.skill"></span>
       <span data-bind="text: stat.level"></span>
    </li>
</ul>
<script>
ko.applyBindings(skillTree);
skillTree.character.populateFromJson();
</script>
