<div class="row">
    <div class="col-md-12">
        <?php
        echo "GPA From";
        echo $first = $_POST['first'];
        echo "<br/>";
        echo "GPA To";
        echo $second = $_POST['second'];
        echo "<br/>";
        //exit();
        /*$first = '4321';
        $second = '5432';*/
        //$applications="SELECT * from osad_student WHERE register_number BETWEEN $first AND $second";
        //$applications="SELECT * FROM osad_student WHERE register_number BETWEEN 7 AND 10";
        $this->db->where('register_number >=', '10');
        $this->db->where('register_number <=', '8');
        $applications = $this->db->get('osad_student')->result_array();
        /*$rowcount = $applications->num_rows();*/
        $count = 1;
            ?>
        <table class="table table-bordered datatable">
            <thead>
            <tr>
                <th><div>#</div></th>
                <th width="80"><div><?php echo get_phrase('Photo');?></div></th>
                <th><div><?php echo get_phrase('Name');?></div></th>
                <th><div><?php echo get_phrase('departments');?></div></th>
                <th><div><?php echo get_phrase('birthday');?></div></th>
                <th><div><?php echo get_phrase('gender');?></div></th>
                <th><div><?php echo get_phrase('phone');?></div></th>
                <th><div><?php echo get_phrase('email');?></div></th>
                <th><div><?php echo get_phrase('SSC+HSC');?></div></th>
                <th><div><?php echo get_phrase('total_mark');?></div></th>
                <th><div><?php echo get_phrase('Apply_Date');?></div></th>
            </tr>
            </thead>
            <tbody>

            <?php foreach($applications as $row12): ?>
                <tr>
                    <td><?php echo $count++;?></td>
                    <!--<td><img src="<?php /*echo $this->crud_model->get_image_url('osad_student',$row['id']);*/?>" class="img-circle" width="30" /></td>-->
                    <td><img src="<?php echo "assets/images/applicants/".$row12[photo]; ?>" width="30" height="30" /></td>
                    <td><?php echo $row12['name_en'];?></td>
                    <td><?php echo $row12['technology'];?></td>
                    <td><?php echo $row12['birthday'];?></td>
                    <td><?php echo $row12['sex'];?></td>
                    <td><?php echo $row12['phone'];?></td>
                    <td><?php echo $row12['email'];?></td>
                    <td>
                        <?php
                        $acd_quali = $this->db->where('osad_student_id',$row12['id']);
                        $acd_quali = $this->db->get('osad_acd_history')->result_array();
                        foreach($acd_quali as $row13):
                            ?>
                            <div style=" float: left;border: 1px solid #cccccc; padding: 5%;"><?php echo $row13['special_mark'];?></div>
                            <?php
                        endforeach;
                        ?>
                    </td>
                    <td><?php echo $row12['register_number'];?></td>
                    <!--<td>
                        <?php
/*                        $query = $this->db->select_sum('special_mark');
                        $query = $this->db->from('osad_acd_history');
                        $query = $this->db->where('osad_student_id', $row12['id']);
                        $query = $this->db->get()->result_array();
                        foreach($query as $row4):
                            echo $row4['special_mark'];
                        endforeach;
                        */?>
                    </td>-->
                    <td><?php echo $row12['app_date'];?></td>
                </tr>
                </tbody>
                    <?php
                endforeach;
                ?>
            </table>
    </div>
</div>