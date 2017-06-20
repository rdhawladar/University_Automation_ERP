<?php 
$view_contents		=	$this->db->get_where('calendar_pundro' , array('id' => $param2) )->result_array();
foreach ( $view_contents as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('events_contents');?>
            	</div>
            </div>
			<div class="panel-body">
                <div class="form-group">
                    <div class="col-sm-12">
                        <?php echo "<h3>".$row['calendar_title']."</h3>";?>
                        <?php echo "<p>".$row['calendar_content']."</p>";?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>


