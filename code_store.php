<?php
    $this->db->where('NameofProgram',$data['ProgramName']);
    $this->db->where('stdstatus',$data['SemesterName']);
    $fee_structure = $this->db->get('applicants_details')->result_array();
    foreach($fee_structure as $row22):
        ?>
        <div class="col-md-12 part">
            <table>
                <tr>
                    <td><input type="text" class="part1 form-control" name="particulars1[]" value="<?php echo $row22['ClassRollNo'];?>"><?php echo $row22['ClassRollNo'];?></td>
                    <td><input type="text" class="part1 form-control" name="" value="<?php echo $row22['NameofApplicant'];?>"><?php echo $row22['NameofApplicant'];?></td>
                    <td><select name="particulars2[]" id="">
                            <option value="1"><?php echo get_phrase('present');?></option>
                            <option value="0"><?php echo get_phrase('absent');?></option>
                        </select></td>
                </tr>
            </table>
        </div>
        <?php
    endforeach;
?>
<?php
    $particulars1 = implode(',', $this->input->post('particulars1[]'));
    $particulars2 = implode(',', $this->input->post('particulars2[]'));
    $data['StdRoll'] = json_encode($particulars1);
    $data['AttendanceStatus'] = json_encode($particulars2);
?>
<?php
    $str = substr($row['particulars1'],1,-1);
    $val = explode(',', $str);
    foreach($val as $out) {
    ?>
    <?php
    echo $out."<br/>";
    }
?>
/*********************************************************************************************/
<?php
$data['Session']         = $this->input->post('Session');
$this->db->where('id', $data['Session']);
$as = $this->db->get('session_pundro')->result_array();
foreach($as as $row334):
    echo $row334['SessionName']." (".$row334['SemesterDuration'].")";
endforeach;
echo "<br/>";
?>
/*********************************************************************************************/
<a href="#" onclick="history.go(-1)">Go Back</a>&nbsp;&nbsp;<button onclick="myFunction()">Print</button>
<?php
echo "<a href='./index.php?admin/online_admission/'>Go Back</a>";
?>
class="btn btn-success"
/*********************************************************************************************/
<?php
$as = $this->db->get('session_pundro')->result_array();
foreach($as as $row334):
    echo $row334['SessionName'];
endforeach;
?>
/*********************************************************************************************/
<select name="course" class="form-control">
    <option value=""><?php echo get_phrase('select');?></option>
    <?php
    $faculty_setup = $this->db->get('course_program')->result_array();
    foreach($faculty_setup as $row):
        ?>
        <option value="<?php echo $row['id'];?>">
            <?php echo $row['course_name'];?>
        </option>
        <?php
    endforeach;
    ?>
</select>
/*********************************************************************************************/
<select name="Year" class="form-control">
    <?php
    //echo $row['Year'];
    $this->db->where('id', $row['Year']);
    $aas = $this->db->get('year_calendar')->result_array();
    foreach($aas as $r334):
    endforeach;
    ?>
    <option value="<?php echo $r334['id'];?>"><?php echo $r334['Name'];?></option>
    <?php
    $wqw = $this->db->get('year_calendar')->result_array();
    foreach($wqw as $oqw):
        ?>
        <option value="<?php echo $oqw['id'];?>">
            <?php echo $oqw['Name'];?>
        </option>
        <?php
    endforeach;
    ?>
</select>
/*********************************************************************************************/
<td>
    <?php
    $this->db->where('id', $row['SemesterName']);
    $aas = $this->db->get('session_pundro')->result_array();
    foreach($aas as $r334):
    endforeach;
    $this->db->where('id', $row['Year']);
    $aa = $this->db->get('year_calendar')->result_array();
    foreach($aa as $r34):
    endforeach;
    echo $r334['SessionName']."&nbsp;".$r34['Name'];
    ?>
</td>
/*********************************************************************************************/
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>

    <div class="col-sm-5">
        <select name="class_id" class="form-control" data-validate="required" id="class_id"
                data-message-required="<?php echo get_phrase('value_required');?>"
                onchange="return get_class_sectionsa(this.value)">
            <option value=""><?php echo get_phrase('select');?></option>
            <?php
            $classes = $this->db->get('class')->result_array();
            foreach($classes as $row):
                ?>
                <option value="<?php echo $row['class_id'];?>">
                    <?php echo $row['name'];?>
                </option>
                <?php
            endforeach;
            ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('section');?></label>
    <div class="col-sm-5">
        <select name="section_id" class="form-control" id="section_selector_holder">
            <option value=""><?php echo get_phrase('select_class_first');?></option>

        </select>
    </div>
</div>
/************************************/
<script type="text/javascript">

    function get_class_sectionsa(class_id) {

        $.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_class_sectionsa/' + class_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder').html(response);
            }
        });

    }

</script>
/************************************/
<?php
function get_class_sectionsa($class_id)
    {
        $sections = $this->db->get_where('semester_particulars' , array(
            'id' => $class_id
        ))->result_array();
        foreach ($sections as $row) {
            echo '<option value="' . $row['id'] . '">' . $row['Particulars'] . '</option>';
        }
    }
?>
/*********************************************************************************************/
<?php
$data12 = 8;
    $this->db->where('TotalGPA>=', $data12);
    $as = $this->db->get('applicants_details')->result_array();
    foreach($as as $row334):
        echo $row334['TotalGPA']."-";
    endforeach;
?>
/*********************************************************************************************/
<?php
echo $this->session->userdata('id');
?>
/*********************************************************************************************/
<?php
$this->db->order_by('id', 'DESC');
?>
/*********************************************************************************************/
<?php
$temp = '1';
$this->db->where('IsActive',$temp);
$semester = $this->db->get('admission_configuration')->result_array();
foreach($semester as $wee):
endforeach;
$this->db->where('id',$wee['SemesterName']);
$semester12 = $this->db->get('session_pundro')->result_array();
foreach($semester12 as $wee12):
endforeach;
$this->db->where('id',$wee['Year']);
$semester13 = $this->db->get('year_calendar')->result_array();
foreach($semester13 as $wee13):
endforeach;
?>
<h3 class="adm_form_head_setting">
    <?php
    echo "&nbsp;for ".$wee12['SessionName']."&nbsp;".$wee13['Name']." for ".$wee['ProgramName']." Program(s)";
    ?>
</h3>
/*********************************************************************************************/
<?php
echo "Global Session Name: ";
echo $wee['SemesterName'];
echo "Global Year: ";
echo $wee['Year'];
?>
/*********************************************************************************************/
/* Array values single entry to mysql */
<?php
foreach($val1213 as $key=>$value13) {
    $reg_dat = array(
        'AdmMarksObtained'   => $value13,
    );
}
?>
/*********************************************************************************************/
<?php
for($i = 0;$i < 3; $i++){
    $this->db->insert('admission_mark_setup', 
      array( "AdmMarksObtained" =>$data["AdmMarksObtained"][$i],
             "RegisterNumber" => $data["RegisterNumber"][$i],
             "TotalMark" =>$data["TotalMark"]);
}
?>
/*********************************************************************************************/
<?php
for($i=0;$i<8;$i++){
    $reg_dat13 = array(
    'AdmMarksObtained'   => $val1213[$i],
    'RegisterNumber'   =>$val12[$i],
);
    $this->db->insert('admission_mark_setup', $reg_dat13);
}
?>
/*********************************************************************************************/
<?php
for($i=0;$i<8;$i++){
        /*$reg_dat13 = array(
        'AdmMarksObtained'   => $val1213[$i],
        'RegisterNumber'   =>$val12[$i],
        'TotalMark'   =>$TotalMark,
    );
        $this->db->insert('admission_mark_setup', $reg_dat13);*/
        $reg_dat14 = array(
            'AdmMarksObtained'   => $val1213[$i],
            //'id'   =>$val12[$i],
            'TotalMarkAdm'   =>$TotalMark,
        );
        $this->db->where('id', $val12[$i]);
        $this->db->update('applicants_details', $reg_dat14);
    }
?>
/*********************************************************************************************/
<?php
for ($i=0, $k=10; $i<=10 ; $i++, $k--) {
    echo "Var " . $i . " is " . $k . "<br>";
}
?>
/*********************************************************************************************/
<?php
for($i=0;$i<8;$i++){
    $reg_dat13 = array(
    'AdmMarksObtained'   => $val1213[$i],
    'RegisterNumber'   =>$val12[$i],
    'TotalMark'   =>$TotalMark,
);
    $this->db->insert('admission_mark_setup', $reg_dat13);
}
?>
/*********************************************************************************************/
style='
            width: 50%;
    text-align: left;
    background: cadetblue;
    margin: auto;
    border-radius: 6px;
    padding: 2%;
    color: #ffffff;
    font-size: 20px;
    margin-top:3%;
            '
/*********************************************************************************************/            
echo "<div style='
width: 100%;
    float: left;
    clear: both;
    margin: 2% 0;
'>";
             echo "<a style='
                width: 100px;
    text-align: center;
    background: cadetblue;
    /* margin: auto; */
    border-radius: 6px;
    padding: 1%;
    color: #ffffff;
    font-size: 17px;
    margin-top: 1%;
    clear: both;
    margin: none;
    /* float: left; */
    text-decoration: none;
            ' href='./index.php?admin/online_admission/'>Go Back</a>";
             echo "<a style='
                    width: 100px;
    text-align: center;
    background: green;
    /* margin: auto; */
    border-radius: 6px;
    padding: 1%;
    color: #ffffff;
    font-size: 17px;
    margin: 1%;
    clear: both;
    margin: none;
    /* float: left; */
    text-decoration: none;
            ' href='./index.php?admin/std_fee_collection/'>Pay Dues</a>";
             echo "</div>";
/*********************************************************************************************/                         
echo '<script type="text/javascript"> window.location = "http://localhost/pundro_demo/web/" </script>';
/*********************************************************************************************/        
echo "<div class='moneydi'>";
            echo "<h3>You have already submitted the application</h3>";
            echo "<a class='moneydibutton btn btn-success' href='#' onclick='history.go(-1)'>Go Back</a>";
            echo "</div>";
/*********************************************************************************************/
<div class="printback">
<a class="btn btn-success" href="#" onclick="history.go(-1)">Go Back</a>&nbsp;&nbsp;<button class="btn btn-success" onclick="myFunction()">Print</button>
</div>
/**************************************************************************************************************/
<?php
            echo "<div style='
            width: 100%;
    background-image: url(http://localhost/pundro_demo/email_background.png);
    background-repeat: no-repeat;
    background-size: 100% 100%;    
            '>";
            echo "<div class='monemailnot' style='
                width: 50%;
    margin: auto;
    padding: 9% 0 0 11%;
            '>";
            echo "
            <a href='http://localhost/pundro_demo/'' class='logo'>
                <img src='http://localhost/pundro_demo/uploads/logopundro.png' height='' alt=''>
            </a>
            ";
            echo "</div>";
            echo "<div class='monemailnot' style='
                    width: 38%;
    text-align: left;
    /* background: #f2f2f2; */
    margin: auto;
    border-radius: 6px;
    padding: 1% 1%;
    color: #000000;
    font-size: 20px;
    margin-top: 0;
            '>";
             ?>



             echo "</div>";
             echo "<div style='
width: 100%;
    float: left;
    clear: both;
    margin: 2% 0;
    text-align: center;
'>";
             echo "<a style='
                    width: 100px;
    text-align: center;
    background: green;
    /* margin: auto; */
    border-radius: 6px;
    padding: 1%;
    color: #ffffff;
    font-size: 17px;
    margin: 1%;
    clear: both;
    margin: none;
    /* float: left; */
    text-decoration: none;' href='./index.php?admin/online_admission/'>Go Back</a>";
             echo "</div>";
             echo "</div>";

/****************************************************************************************************/             
echo $this->uri->segment(3);
/****************************************************************************************************/             
if(strlen($NewClassRoll) == 1){
    $f = "00";
    $NewClassRoll = $f.$NewClassRoll;
    //echo $NewClassRoll = $f.$NewClassRoll12;
}
if(strlen($NewClassRoll) == 2){
    $f = "0";
    $NewClassRoll = $f.$NewClassRoll;
    //echo $NewClassRoll = $f.$NewClassRoll12;
}
/***********************************************************************************************/
<?php $count = 1;foreach($acdSession as $row):?>
<tr>
    <td><?php echo $count++;?></td>
/***********************************************************************************************/