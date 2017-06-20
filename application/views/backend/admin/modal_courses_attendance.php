<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('attendance');?>
                </div>
            </div>
            <div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/subjects/attendance/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="col-md-12">
                    <table class="table table-bordered datatable">
                        <thead>
                        <tr>
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
                <div>
                    <?php $CourseCode12 = $this->uri->segment(5);?>
                    <?php $CourseCode13 = $this->uri->segment(6);?>
                    <?php $CourseCode14 = $this->uri->segment(7);?>
                    <?php $CourseCode15 = $this->uri->segment(8);?>
                    <input type="hidden" name="BatchName" value="<?php echo $CourseCode12;?>">
                    <input type="hidden" name="Year" value="<?php echo $CourseCode13;?>">
                    <input type="hidden" name="SemesterName" value="<?php echo $CourseCode14;?>">
                    <input type="hidden" name="ProgramName" value="<?php echo $CourseCode15;?>">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-2">
                                Exam Name:
                            </div>
                            <div class="col-md-4">
                                <select name="ExamName" class="form-control">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                    <?php
                                    $exname = $this->db->get('exam_pundro')->result_array();
                                    foreach($exname as $rowe):
                                        ?>
                                        <option value="<?php echo $rowe['id'];?>">
                                            <?php echo $rowe['ExamName'];?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-sm-8">
                                <table class="table table-bordered datatable">
                                    <th>Class Roll</th>
                                    <th>Name</th>
                                    <th>Attendance</th>
                                    <?php $CourseCode12 = $this->uri->segment(5);?>
                                    <?php
                                    $this->db->where('NameofBatch', $CourseCode12);
                                    $facul = $this->db->get('student_pundro')->result_array();
                                    foreach($facul as $row21):
                                    ?>
                                    <tr>
                                        <td><input type="hidden" class="part1 form-control" name="StudentID[]" value="<?php echo $row21['id'];?>"><?php echo $row21['ClassRollNo'];?></td>
                                        <td><?php echo $row21['NameofApplicant'];?></td>
                                        <td><select name="STDAtten[]" id="">
                                                <option value="1"><?php echo get_phrase('P');?></option>
                                                <option value="2"><?php echo get_phrase('A');?></option>
                                                <option value="3"><?php echo get_phrase('L');?></option>
                                            </select></td>
                                    </tr>
                                        <?php
                                    endforeach;
                                    ?>
                                </table>
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