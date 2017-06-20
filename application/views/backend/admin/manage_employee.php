<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered datatable" id="table_export">
            <thead>
            <tr><th>#</th><th><a href="/course/emp-section-allot/index?course%2Femp-section-allot%2Findex=&amp;sort=academic_year" data-sort="academic_year">Field1</a></th><th><a href="/course/emp-section-allot/index?course%2Femp-section-allot%2Findex=&amp;sort=section_id" data-sort="section_id">Field2</a></th><th><a href="/course/emp-section-allot/index?course%2Femp-section-allot%2Findex=&amp;sort=emp_full_name" data-sort="emp_full_name">Field3</a></th><th><a href="/course/emp-section-allot/index?course%2Femp-section-allot%2Findex=&amp;sort=is_class_teacher" data-sort="is_class_teacher">Field4</a></th><th>&nbsp;</th></tr><tr id="w1-filters" class="filters"><td>&nbsp;</td><td><select class="form-control" name="EmpSectionAllotSearch[academic_year]">
                        <option value=""></option>
                        <option value="4">2016 Summer Intake</option>
                        <option value="3">2017-18</option>
                        <option value="2">2016-17</option>
                        <option value="1">2015-16</option>
                    </select></td><td><select class="form-control" name="EmpSectionAllotSearch[section_id]">
                        <option value=""></option>
                        <optgroup label="MBA Summer">
                            <option value="6">MBA Summer Sec1</option>
                        </optgroup>
                    </select></td><td><input type="text" class="form-control" name="EmpSectionAllotSearch[emp_full_name]"></td><td><select class="form-control" name="EmpSectionAllotSearch[is_class_teacher]">
                        <option value=""></option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select></td><td>&nbsp;</td></tr>
            </thead>
            <tbody>

            <tr data-key="1"><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td><a href="/course/emp-section-allot/view?id=1" title="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/course/emp-section-allot/update?id=1" title="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="ajaxDelete" title="Delete" delete-url="/course/emp-section-allot/delete?id=1" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
            </tbody>
        </table>
    </div>
</div>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
<script type="text/javascript">

    jQuery(document).ready(function($)
    {


        var datatable = $("#table_export").dataTable();

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });

</script>