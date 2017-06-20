<div class="row">
    <div class="col-md-12">
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">

            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('student_id_card');?>
                </a>
            </li>
        </ul>
        <!------CONTROL TABS END------>

        <div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active onad" id="list">

                <table class="table table-bordered datatable" id="table_export">
                    <thead>
                    <tr>
                        <th><div>#</div></th>
                        <th width="80"><div><?php echo get_phrase('Photo');?></div></th>
                        <th><div><?php echo get_phrase('Name');?></div></th>
                        <th><div><?php echo get_phrase('father_name');?></div></th>
                        <th><div><?php echo get_phrase('mother_name');?></div></th>
                        <th><div><?php echo get_phrase('faculty_name');?></div></th>
                        <th><div><?php echo get_phrase('Actions');?></div></th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($osadStudent as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <!--<td><img src="<?php /*echo $this->crud_model->get_image_url('osad_student',$row['id']);*/?>" class="img-circle" width="30" /></td>-->
                            <td><img src="<?php echo base_url()."/assets/images/applicants/" .$row['photo'];?>" alt=""></td>
                            <td><?php echo $row['name_en'];?></td>
                            <td><?php echo $row['father_name'];?></td>
                            <td><?php echo $row['mother_name'];?></td>
                            <td><?php echo $row['faculty_name'];?></td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_student_id_card_profile/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('id_card_print');?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
<script type="text/javascript">

    jQuery(document).ready(function($)
    {


        var datatable = $("#table_export").dataTable({
            "sPaginationType": "bootstrap",
            "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
            "oTableTools": {
                "aButtons": [

                    {
                        "sExtends": "xls",
                        "mColumns": [1,2]
                    },
                    {
                        "sExtends": "pdf",
                        "mColumns": [1,2]
                    },
                    {
                        "sExtends": "print",
                        "fnSetText"	   : "Press 'esc' to return",
                        "fnClick": function (nButton, oConfig) {
                            datatable.fnSetColumnVis(0, false);
                            datatable.fnSetColumnVis(3, false);

                            this.fnPrint( true, oConfig );

                            window.print();

                            $(window).keyup(function(e) {
                                if (e.which == 27) {
                                    datatable.fnSetColumnVis(0, true);
                                    datatable.fnSetColumnVis(3, true);
                                }
                            });
                        },

                    },
                ]
            },

        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });


    $(document).ready(function(){
        var i=1;
        $("#add_row").click(function(){
            $('#addr'+i).html("<td>"+ (i+1) +"</td><td><select name='examtype"+i+"' class='form-control'><option value=''>select</option><option value='SSC-GENERAL'>SSC(General)</option><option value='SSC-VOCATIONAL'>SSC(Vocational)</option><option value='TRADE'>Trade(Two-Years)</option><option value='DAKHIL'>Dakhil(Vocational)</option></select></td><td><input  name='group"+i+"' type='text' placeholder='Group'  class='form-control input-md'></td><td><input  name='board"+i+"' type='text' placeholder='Board'  class='form-control input-md'></td><td><input  name='passing_yr"+i+"' type='text' placeholder='Passing Year'  class='form-control input-md'></td><td><input  name='special_mark"+i+"' type='text' placeholder='special mark'  class='form-control input-md'></td><td><input  name='ttl_mark"+i+"' type='text' placeholder='Total Marks'  class='form-control input-md'></td>");

            $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
            i++;
            $("#ttldtl").val(i);
        });
        $("#delete_row").click(function(){
            if(i>1){
                $("#addr"+(i-1)).html('');
                i--;
                $("#ttldtl").val(i);
            }
        });
        $("#ttldtl").val(i);
    });

</script>
