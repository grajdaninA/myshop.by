<?php foreach ($this->groups as $group_id => $group_item): ?>
<section class="form-group">
    <h4><?= $group_item; ?></h4>
    <div class="row">
        <div class="wish-list">
            <?php foreach ($this->attrs[$group_id] as $attr_id => $value): ?>
            <label class="checkbox">
                <input type="checkbox" name="checkbox" value="<?=$attr_id?>"><i class="filter"></i><?=$value?>
            </label>
            <?php endforeach; ?>
        </div>
    </div>    
</section>
<?php endforeach; ?>