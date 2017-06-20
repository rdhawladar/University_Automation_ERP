    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo get_phrase('instructors_mapping_with_courses');?>
                    </div>
                </div>
                <div class="panel-body">

                    <?php echo form_open(base_url() . 'index.php?admin/subjects/course_instructor/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="col-md-12">
                        <table class="table table-bordered datatable">
                            <thead>
                            <tr>
                                <th><div>#</div></th>
                                <th><div><?php echo get_phrase('CourseCode');?></div></th>
                                <th><div><?php echo get_phrase('CourseName');?></div></th>
                                <th><div><?php echo get_phrase('Credits');?></div></th>
                                <th><div><?php echo get_phrase('Prerequisite(s)');?></div></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php
                                $CourseCode = $this->uri->segment(4);
                                $this->db->where('id', $CourseCode);
                                $as = $this->db->get('subjects')->result_array();
                                foreach($as as $row334):
                                //echo $row334['CourseCode'];
                                //endforeach;
                                //$edit_data		=	$this->db->get_where('subjects' , $CourseCode )->result_array();
                                //foreach ( $edit_data as $row):
                                ?>
                                    <input type="hidden" name="CourseID" value="<?php echo $row334['id'];?>">
                                <td><?php echo $count++;?></td>
                                <td><?php echo $row334['CourseCode'];?></td>
                                <td><?php echo $row334['CourseName'];?></td>
                                <td><?php echo $row334['Credits'];?></td>
                                <td><?php echo $row334['Prerequisites'];?></td>
                                <?php
                                endforeach;
                                ?>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <?php
                                $facul = $this->db->get('course_instructor')->result_array();
                                foreach($facul as $row21):
                                    ?>
                                    <input type="checkbox" name="CourseInstructors[]" value="<?php echo $row21['id'];?>">
                                    &nbsp;&nbsp;
                                    <?php echo $row21['InstructorName'];?>
                                    <br/>
                                    <?php
                                endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('submit');?></button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


