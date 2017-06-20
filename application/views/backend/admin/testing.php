<?php
$view = $this->db->get('testing')->result_array();
foreach($view as $row):
    ?>
    <a href="<?php echo base_url(). 'index.php?admin/testing/edit'?>/$row['id']"><?php echo "$row['id']";?></a>
<?php
    echo $row['test'];
endforeach;
?>
<?php echo form_open(base_url() . 'index.php?admin/testing/add' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
    <input type="text" name="test">
    <button type="submit" class="btn btn-info"><?php echo get_phrase('submit');?></button>
</form>