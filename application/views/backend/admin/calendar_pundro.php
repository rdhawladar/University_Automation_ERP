<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li>
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo get_phrase('calendar');?>
                </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_record');?>
                </a></li>
            <li class="active">
                <a href="#view" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('print');?>
                </a></li>
        </ul>
        <!------CONTROL TABS END------>

        <div class="tab-content">
            <div class="tab-pane box active" id="view">
                <div class="col-md-6">
                    <table class="table table-bordered datatable">
                        <tbody>
                        <?php
                        $jan = 'জানুয়ারী';
                        $feb = 'ফেব্রুয়ারী';

                        //$this->db->limit(1);
                        //$this->db->where('month_english', $jan);
                        //$calendar    = $this->db->get('calendar_pundro')->result_array();
                        //foreach($calendar as $row22):
                            ?>
                            <tr>
                                <td colspan="3">
                                    <h3>
                                    <?php
                            $this->db->limit(1);
                            $this->db->where('month_english', $jan);
                            $calendar    = $this->db->get('calendar_pundro')->result_array();
                            foreach($calendar as $row22):
                                    echo $row22['month_english'];
                                    ?>
                            <?php endforeach;?>
                                    </h3>
                                </td>
                                <td colspan="4" style="text-align: right;">
                                    <div>
                                        <h3>
                                            <?php
                                            $this->db->limit(1);
                                            $this->db->where('month_english', $jan);
                                            $calendar    = $this->db->get('calendar_pundro')->result_array();
                                            foreach($calendar as $row22):
                                                echo $row22['month_bangla'];
                                                ?>
                                            <?php endforeach;?>
                                        </h3>
                                    </div>
                                    <div>
                                        <h3>
                                            <?php
                                            $this->db->limit(1);
                                            $this->db->where('month_english', $jan);
                                            $calendar    = $this->db->get('calendar_pundro')->result_array();
                                            foreach($calendar as $row22):
                                                echo $row22['month_arabic'];
                                                ?>
                                            <?php endforeach;?>
                                        </h3>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <?php
                                $this->db->group_by('day');
                                $this->db->order_by('id ASC');
                                $this->db->where('month_english', $jan);
                                $calendar    = $this->db->get('calendar_pundro')->result_array();
                                foreach($calendar as $row22):
                                    ?>
                                <td>
                                      <?php
                                        echo $row22['day'];
                                        ?>
                                </td>
                                <?php endforeach;?>
                            </tr>
                        <tr>
                            <?php
/*                            $this->db->order_by('id ASC');
                            $this->db->where('month_english', $jan);
                            $calendar    = $this->db->get('calendar_pundro')->result_array();
                            $count=0;

                            foreach($calendar as $row22):
                            if($count < 7 ){
                                echo $count++;
                                */?><!--
                                <td colspan="1">
                                    <div>
                                    <?php
/*                                    echo $row22['date_english'];
                                    */?>
                                    </div>
                                </td>
                            <?php
/*                            if($count == 7){
                                echo "<br/>";
                            }
                            }
                                */?>
                            --><?php /*endforeach;*/?>
                        </tr>
                        </tbody>
                    </table>
                    <div class="date_rows_blocks">
                    <?php
                    $this->db->order_by('id ASC');
                    $this->db->where('month_english', $jan);
                    $calendar    = $this->db->get('calendar_pundro')->result_array();
                    $count = 0;
                    ?>
                    <?php
                    foreach($calendar as $row22):
                        if($count < 31){
                            ?>
                    <div class="daterows">
                                    <?php
                                    if($row22['calendar_title']){
                                        ?>
                        <span><a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_calendar_events/<?php echo $row22['id'];?>');">
                                <?php echo $row22['date_english'];?>
                                        </a></span>
                                        <!--<span><a href="#"><?php /*echo $row22['date_english'];*/?></a></span>-->
                        <?php
                                    }else{
                                    echo $row22['date_english'];
                                    }
                                    ?>
                    </div>
                            <?php
                        }
                        if( $count == 27 || $count == 20 || $count == 13 || $count == 6 ){
                            echo "<div class='clearboth'>";
                            echo "<br/>";
                            echo "</div>";
                        }
                        $count++;
                        ?>
                    <?php endforeach;?>
                        <p>&nbsp;</p>
                    </div>
                </div>
                <div class="col-md-6">
                    2
                </div>
            </div>
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box" id="list">

                <table class="table table-bordered datatable" id="table_export">
                    <thead>
                    <tr>
                        <th><div>#</div></th>
                        <th><div><?php echo get_phrase('day');?></div></th>
                        <th><div><?php echo get_phrase('date_english');?></div></th>
                        <th><div><?php echo get_phrase('date_bangla');?></div></th>
                        <th><div><?php echo get_phrase('date_arabic');?></div></th>
                        <th><div><?php echo get_phrase('month_english');?></div></th>
                        <th><div><?php echo get_phrase('month_bangla');?></div></th>
                        <th><div><?php echo get_phrase('month_arabic');?></div></th>
                        <th><div><?php echo get_phrase('title');?></div></th>
                        <th><div><?php echo get_phrase('content');?></div></th>
                        <th><div><?php echo get_phrase('options');?></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;foreach($acdSession as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $row['day'];?></td>
                            <td><?php echo $row['date_english'];?></td>
                            <td><?php echo $row['date_bangla'];?></td>
                            <td><?php echo $row['date_arabic'];?></td>
                            <td><?php echo $row['month_english'];?></td>
                            <td><?php echo $row['month_bangla'];?></td>
                            <td><?php echo $row['month_arabic'];?></td>
                            <td><?php echo $row['calendar_title'];?></td>
                            <td><?php echo $row['calendar_content'];?></td>
                            <td>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_calendar_pundro/<?php echo $row['id'];?>');">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                                </a>
                                &nbsp;  &nbsp;  &nbsp;
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/calendar_pundro/delete/<?php echo $row['id'];?>');">
                                    <i class="entypo-trash"></i>
                                    <?php echo get_phrase('delete');?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <!----TABLE LISTING ENDS--->


            <!----CREATION FORM STARTS---->
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open(base_url() . 'index.php?admin/calendar_pundro/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('day');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="day"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('date_english');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="date_english"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('date_bangla');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="date_bangla"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('date_arabic');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="date_arabic"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('month_english');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="month_english"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('month_bangla');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="month_bangla"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('month_arabic');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="month_arabic"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('title');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="calendar_title"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('content');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="calendar_content"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('add_calendar');?></button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!----CREATION FORM ENDS-->
            </div>
        </div>
    </div>



    <!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
    <script type="text/javascript">

        jQuery(document).ready(function($)
        {


            var datatable = $("#table_export").dataTable({

                //"sPaginationType": "full_numbers",
                //"lengthMenu": [ 10, 25, 50, 75, 100 ],
                /*"lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]],
                 "pageLength" : 25,*/
                /*"aLengthMenu": [ [2, 4, 8, -1], [2, 4, 8, "All"] ],*/
                "aLengthMenu": [ [30, 50, 100, 200, 500, 1000, 2000, 3000,  -1], [30, 50, 100, 200, 500, 1000, 2000, 3000, "All"] ],
                "iDisplayLength" : 30,
                /*"aLengthMenu": "bootstrap",*/
                //"iDisplayLength": "500",
                "paging": "false",
                //"lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],
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

    </script>