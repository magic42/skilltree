<div>
    <?php echo $this->Html->script('jquery.min.js'); ?>
    <?php echo $this->Html->script('knockout.min.js'); ?>
    <?php echo $this->Html->script('app.js'); ?>
    <?php echo $this->Html->css('tree.css'); ?>
</div>
<div data-bind="text: character.name"></div>
<script>
$( document ).ready(function() {
    skillTree.character.populateFromJson();
    skillTree.populateFromJson();
    ko.applyBindings(skillTree);
    console.log(skillTree);
});
</script>
<script id="skillTemplate" type="text/html">
    <li class="skillNode">
        <div data-bind="attr: {class: skillTree.character.getClass(id)}">
            <img width=30px height=30px data-bind="attr: {src: skillTree.getURL(photo_dir, photo)}"/>
            <p data-bind="text: name"></p>
            <!-- ko if: skill -->
            <div class="ranks" data-bind="foreach: skill.ranks">
                <div data-bind="attr: {class: skillTree.character.achievedRank(id)}"></div>
            </div>
            <!-- /ko -->
            <div class="description">Placeholder description.</div>
        </div>
        <!-- ko if: children.length > 0 -->
        <ul>
            <li data-bind="template: { name: 'skillTemplate', foreach: children }">
            </li>
        </ul>
        <!-- /ko -->
    </li>
</script>
<div class="tree">
    <ul>
        <li data-bind="template: { name: 'skillTemplate', foreach: skillTree.treeStructure }">
        </li>
    </ul>
</div>

