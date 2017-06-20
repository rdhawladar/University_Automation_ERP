<?php
$edit_data		=	$this->db->get_where('applicants_details' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('promote_student');?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/std_status/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-style-10">
                    <h1>Promote Student</h1>
                    <div class="inner-wrap">
                        <table>
                            <tr>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <label>
                                                    Name of Program
                                                    <input type="text" readonly value="<?php echo $row['NameofProgram']?>"/>
                                                </label>
                                            </td>
                                            <td>
                                                <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
                                                <label>Class Roll No <input type="text" readonly name="ClassRollNo" value="<?php echo $row['ClassRollNo']?>"/></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Registration/ID No <input type="text" readonly name="RegistratioNo" value="<?php echo $row['RegistratioNo'];?>"/></label>
                                            </td>
                                            <td>
                                                <label>Session:
                                                    <input type="text" name="session" readonly value="<?php echo $row['Session']?>" />
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <label>Select semester
                                                    <select name="StdStatus" id="StdStatus" class="form-control">
                                                        <?php
                                                        $this->db->where('id', $row['StdStatus']);
                                                        $course_program = $this->db->get('semester')->result_array();
                                                        foreach($course_program as $e1e):
                                                            echo $e1e['name'];
                                                        endforeach;
                                                        ?>
                                                        <option value="<?php echo $e1e['id'];?>"><?php echo $e1e['name'];?></option>
                                                        <?php
                                                        $course_program12 = $this->db->get('semester')->result_array();
                                                        foreach($course_program12 as $row12):
                                                            ?>
                                                            <option value="<?php echo $row12['id'];?>">
                                                                <?php echo $row12['name'];?>
                                                            </option>
                                                            <?php
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </label>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <div class="inner-wrap">
                                        <label>
                                            <a target="_blank" href="<?php echo "uploads/student_image/".$row[PhotoApplicant]; ?>"><img src="<?php echo "uploads/student_image/".$row[PhotoApplicant]; ?>" width="150" height="150" /></a>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('promote');?></button>
                    </div>
                </div>
        		</form>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>


