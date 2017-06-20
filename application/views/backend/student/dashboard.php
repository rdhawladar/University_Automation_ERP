<?php
    $this->db->where('id',$this->session->userdata('id'));
    $temp = $this->db->get('student_pundro')->result_array();
    foreach($temp as $row12):
?>
<div class="row">
    <div class="col-md-4 stddiv">
        <ul>
            <li>
                <?php
                    echo "Class Roll No: ";
                    //echo $row12['NameofProgram'];
                $this->db->where('id', $row12['NameofProgram']);
                $asxx = $this->db->get('course_program')->result_array();
                foreach($asxx as $row334xx):
                    $str = $row334xx['course_name'];
                endforeach;
                echo $str['0']."-".$row12['ClassRollNo'];
                ?>
            </li>
            <li>
                <?php
                    echo "Registration No: ";
                    echo $row12['RegistratioNo'];
                ?>
            </li>
            <li>
                <?php
                    echo "Batch Name: ";
                    //echo $row12['NameofBatch'];
                $this->db->where('id', $row12['NameofBatch']);
                $asx = $this->db->get('batch')->result_array();
                foreach($asx as $row334x):
                    echo $row334x['batch_name']." (".$row334x['batch_alias'].")";
                endforeach;
                ?>
            </li>
        </ul>
    </div>
</div>
<div class="row">
    <?php
        echo "<h2 class='stdpanelh2'>Congratulations Mr.";
        echo $row12['NameofApplicant'];
        echo " for being a valuable member of <br/><span>PUNDRO UNIVERSITY OF SCIENCE & TECHNOLOGY (PUST)</span></h2>";
    ?>
</div>
<?php
endforeach;
?>
<div class="row">
    <!--<div class="col-md-12">
        yearly Calendar
        <table>
            <tr>
                <?php
/*                $val = 'জানুয়ারী';
                $this->db->distinct();
                $this->db->select('day');
                $this->db->where('month_english', $val);
                $asxx = $this->db->get('calendar_pundro')->result_array();
                foreach($asxx as $row334xax):
                */?>
                <td><?php /*echo $row334xax['day'];*/?></td>
                    <?php
/*                endforeach;
                */?>
            </tr>
        </table>
    </div>-->
    <div class="col-md-12 ofccla">
        <div class="col-md-6">
            <h4>Class Holidays</h4>
            <table>
                <th>Date</th>
                <th>Description</th>
                <th>Period</th>
                <?php
                $asxa = $this->db->get('class_holidays_pundro')->result_array();
                foreach($asxa as $row334xa):
                ?>
                <tr>
                    <td><?php echo $row334xa['receipt_no'];?></td>
                    <td><?php echo $row334xa['description'];?></td>
                    <td><?php echo $row334xa['fee_type'];?></td>
                </tr>
                    <?php
                endforeach;
                ?>
            </table>
        </div>
        <!--<div class="col-md-6">
            <h4>Board of Trustees</h4>
            <table>
                <th>Name</th>
                <th>Designation</th>
                <?php
/*                $as = $this->db->get('board_of_trustees')->result_array();
                foreach($as as $roa):
                    */?>
                    <tr>
                        <td><?php /*echo $roa['receipt_no'];*/?></td>
                        <td><?php /*echo $roa['description'];*/?></td>
                    </tr>
                    <?php
/*                endforeach;
                */?>
            </table>
        </div>-->
        <!--<div class="col-md-4">
            <h4>Office Holidays</h4>
            <table>
                <th>Date</th>
                <th>Description</th>
                <th>Period</th>
                <?php
/*                $axa = $this->db->get('office_holidays')->result_array();
                foreach($axa as $rxa):
                    */?>
                    <tr>
                        <td><?php /*echo $rxa['receipt_no'];*/?></td>
                        <td><?php /*echo $rxa['description'];*/?></td>
                        <td><?php /*echo $rxa['fee_type'];*/?></td>
                    </tr>
                    <?php
/*                endforeach;
                */?>
            </table>
        </div>-->
    </div>
</div>
