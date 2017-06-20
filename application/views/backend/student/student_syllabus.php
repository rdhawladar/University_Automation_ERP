<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('syllabus');?>
                </a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane box active" id="list">
                <div class="">
                    <table class="table table-bordered datatable table321 table31">
                        <tr>
                            <td>
                                <?php
                                /***************************************************************/
                                $this->db->where('id', $this->session->userdata('id'));
                                $tz = $this->db->get('student_pundro')->result_array();
                                foreach($tz as $rz):
                                endforeach;
                                $this->db->where('BatchName', $rz['NameofBatch']);
                                $tx = $this->db->get('std_syllabus')->result_array();
                                foreach($tx as $rx):
                                ?>
                                    <a class="btn btn-success" target="_blank" href="<?php echo "uploads/syllabus/".$rx['Content']; ?>">Download Syllabus</a><a target="_blank" href="<?php echo "uploads/syllabus/".$rx['Content']; ?>"><?php echo $rx['Content']; ?></a>
                                <?php
                                endforeach;
                                /***************************************************************/
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
