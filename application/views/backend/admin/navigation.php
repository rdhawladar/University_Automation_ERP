<div class="sidebar-menu">
    <header class="logo-env" >
        <!-- logo -->
        <div class="logo" style="">
            <a href="<?php echo base_url(); ?>">
                <img src="uploads/logopundro.jpg"  style="max-height:60px;"/>
            </a>
        </div>

        <!-- logo collapse icon -->
        <div class="sidebar-collapse" style="">
            <a href="#" class="sidebar-collapse-icon with-animation">

                <i class="entypo-menu"></i>
            </a>
        </div>

        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
            <a href="#" class="with-animation">
                <i class="entypo-menu"></i>
            </a>
        </div>
    </header>

    <div style=""></div>	
    <ul id="main-menu" class="">
        <!-- DASHBOARD -->
        <li class="<?php if ($page_name == 'dashboard') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/dashboard">
                <i class="entypo-gauge"></i>
                <span><?php echo get_phrase('dashboard'); ?></span>
            </a>
        </li>
        <li class="<?php
        if (
            $page_name == 'selection_criteria' ||
            /*$page_name == 'seat_capacity' ||*/
            $page_name == 'semester_calendar' ||
            $page_name == 'subjects' ||
            $page_name == 'admission_configuration' ||
            $page_name == 'year' ||
            $page_name == 'batch' ||
            //$page_name == 'semester' ||
            $page_name == 'course_numbering_system' ||
            $page_name == 'courses_of_the_program' ||
            $page_name == 'distribution_of_credit_hours' ||
            $page_name == 'major_courses' ||
            $page_name == 'minor_courses' ||
            $page_name == 'courses_mapping_with_instructor' ||
            $page_name == 'semester_wise_distribution_of_courses'
            )
            echo 'opened active';
        ?> ">
            <a href="#">
                <span><i class="entypo-suitcase"></i> <?php echo get_phrase('basic_settings'); ?></span>
            </a>
            <ul>
                <li class="<?php
                if (
                    $page_name == 'faculty_setup' ||
                    $page_name == 'course_program' ||
                    $page_name == 'subjects' ||
                    $page_name == 'course_instructor' ||
                    $page_name == 'courses_mapping_with_instructor' ||
                    $page_name == 'major_courses' ||
                    $page_name == 'minor_courses' ||
                    $page_name == 'batch' ||
                    $page_name == 'elective_subject'
                )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('academic_landscape_setup'); ?></span>
                    </a>
                    <ul>
                        <!-- <li class="<?php //if ($page_name == 'faculty_setup') echo 'active'; ?> ">
                            <a href="<?php //echo base_url(); ?>index.php?admin/faculty_setup">
                                <span><i class="entypo-dot"></i> <?php //echo get_phrase('faculty'); ?></span>
                            </a>
                        </li>
                        <li class="<?php //if ($page_name == 'course_program') echo 'active'; ?> ">
                            <a href="<?php //echo base_url(); ?>index.php?admin/course_program">
                                <span><i class="entypo-dot"></i> <?php //echo get_phrase('program'); ?></span>
                            </a>
                        </li> -->
                        <li class="<?php if ($page_name == 'subjects') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/subjects">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('courses'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'course_instructor') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/course_instructor">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('course_instructor'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'courses_mapping_with_instructor') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/courses_mapping_with_instructor">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('courses_mapping_with_instructor'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'major_courses') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/major_courses">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('major_courses_setup'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'minor_courses') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/minor_courses">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('minor_courses_setup'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php if ($page_name == 'selection_criteria') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/selection_criteria">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('selection_criteria'); ?></span>
                    </a>
                </li>
                <!-- <li class="<?php if ($page_name == 'seat_capacity') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/seat_capacity">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('seat_capacity'); ?></span>
                    </a>
                </li> -->
                <li class="<?php if ($page_name == 'semester_calendar') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/semester_calendar">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('semester_calendar'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'admission_configuration') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/admission_configuration">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('admission_configuration'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'year') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/year">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('year'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'batch') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/batch">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('batch'); ?></span>
                    </a>
                </li>
                <!-- <li class="<?php if ($page_name == 'semester') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/semester">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('semester_setup'); ?></span>
                    </a>
                </li> -->
                <li class="<?php if ($page_name == 'course_numbering_system') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/course_numbering_system">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('course_numbering_system'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'courses_of_the_program') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/courses_of_the_program">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('courses_of_the_program'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'distribution_of_credit_hours') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/distribution_of_credit_hours">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('distribution_of_credit_hours'); ?></span>
                    </a>
                </li>
                <!--<li class="<?php /*if ($page_name == 'semester_wise_distribution_of_courses') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/semester_wise_distribution_of_courses">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('semester_wise_distribution_of_courses'); */?></span>
                    </a>
                </li>-->
            </ul>
        </li>
        <!--<li class="<?php /*if ($page_name == 'configuration') echo 'active'; */?> ">
            <a href="<?php /*echo base_url(); */?>index.php?admin/configuration">
                <span><i class="entypo-suitcase"></i> <?php /*echo get_phrase('configuration'); */?></span>
            </a>
        </li>-->
        <li class="<?php
        if (
            $page_name == 'faculty_setup' ||
            $page_name == 'course_program' ||
            $page_name == 'admission_mark_setup' ||
            //$page_name == 'subjects' ||
            $page_name == 'course_instructor' ||
            $page_name == 'major_courses' ||
            $page_name == 'minor_courses' ||
            $page_name == 'batch' ||
            $page_name == 'elective_subject' ||
            $page_name == 'online_admission' ||
            $page_name == 'student_id_card' ||
            $page_name == 'std_status' ||
            $page_name == 'student_management' ||
            $page_name == 'profile_updates' ||
            $page_name == 'admitted_student' ||
            $page_name == 'credit_course' ||
            $page_name == 'assign_subjects' ||
            $page_name == 'registration_adm' ||
            $page_name == 'office_holidays' ||
            $page_name == 'board_of_trustees' ||
            $page_name == 'class_holidays_pundro' ||
            $page_name == 'calendar_pundro' 
            )
            echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-suitcase"></i>
                <span><?php echo get_phrase('admission_and_record_system'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'online_admission') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/online_admission">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('admission_form'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'admission_mark_setup') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/admission_mark_setup">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('admission_mark_setup'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'admitted_student') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/admitted_student">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('admitted_student'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'student_id_card') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/student_id_card">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('student_id_card'); ?></span>
                    </a>
                </li>
                
                <!-- <li class="<?php
                if (
                    $page_name == 'assign_subjects'
                    )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php //echo get_phrase('course_registration'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php //if ($page_name == 'assign_subjects') echo 'active'; ?> ">
                            <a href="<?php //echo base_url(); ?>index.php?admin/assign_subjects">
                                <span><i class="entypo-dot"></i> <?php //echo get_phrase('courses_per_semester'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li> -->
            </ul>
        </li>
        <li class="<?php
        if (
            $page_name == 'std_fee_sub_category' ||
            $page_name == 'std_fee_collection' ||
            $page_name == 'money_receipt' ||
            $page_name == 'programs_fees' ||
            $page_name == 'semester_particulars'
            )
            echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-suitcase"></i>
                <span><?php echo get_phrase('student_finance'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'std_fee_sub_category') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/std_fee_sub_category">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('fee_structure'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'money_receipt') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/money_receipt">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('money_receipt'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'std_fee_collection') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/std_fee_collection">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('payment_collection'); ?></span>
                    </a>
                </li>
                <!--<li class="<?php /*if ($page_name == 'arrears') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/arrears">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('arrears'); */?></span>
                    </a>
                </li>-->
                <li class="<?php if ($page_name == 'programs_fees') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/programs_fees">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('programs_fees'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'semester_particulars') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/semester_particulars">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('semester_wise_fees'); ?></span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="<?php
        if (
            $page_name == 'std_syllabus' ||
            $page_name == 'class_routine_pundro' ||
            /*$page_name == 'manage_attendance' ||*/
            $page_name == 'examroutine'
            )
            echo 'opened active';
        ?> ">
            <a href="#">
                <span><i class="entypo-suitcase"></i> <?php echo get_phrase('timetable_system'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'std_syllabus') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/std_syllabus">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('student_syllabus'); ?></span>
                    </a>
                </li>
                <!-- <li class="<?php if ($page_name == 'manage_attendance') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/manage_attendance">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('attendance'); ?></span>
                    </a>
                </li> -->
                <li class="<?php if ($page_name == 'class_routine_pundro') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/class_routine_pundro">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('class_routine'); ?></span>
                    </a>
                </li>
                <li class="<?php
                if (
                    $page_name == 'office_holidays' ||
                    $page_name == 'board_of_trustees' ||
                    $page_name == 'class_holidays_pundro' ||
                    $page_name == 'calendar_pundro' ||
                    $page_name == 'examroutine'
                )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('calendar'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'office_holidays') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/office_holidays">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('office_holidays'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'board_of_trustees') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/board_of_trustees">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('board_of_trustees'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'class_holidays_pundro') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/class_holidays_pundro">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('class_holidays'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'calendar_pundro') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/calendar_pundro">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('calendar'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'examroutine') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/examroutine">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('exam_routine'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        
        <li class="<?php
        if (
            $page_name == 'reports_pundro'
            )
            echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-suitcase"></i>
                <span><?php echo get_phrase('reports'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'reports_pundro') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/reports_pundro">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('reports'); ?></span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="<?php
        if (
            $page_name == 'exam_set_term' ||
            $page_name == 'admission_subjects_list' ||
            $page_name == 'exam_create_exam' ||
            $page_name == 'exam_set_grade_scale' ||
            $page_name == 'exam_enter_marks' ||
            $page_name == 'exam_mark_distribution' ||
            $page_name == 'exam_set_assessment' ||
            $page_name == 'exam_enter_assessment_mark' ||
            $page_name == 'exam_assess_mark_list' ||
            $page_name == 'exam_set_exam' ||
            $page_name == 'add_new_subject' ||
            $page_name == 'grading_system' ||
            $page_name == 'marks_setup' ||
            $page_name == 'attendance_pundro' ||
            $page_name == 'questions_paper_setup' ||
            $page_name == 'subject_marks_verification' ||
            $page_name == 'add_grading_system' ||
            $page_name == 'exam_term_create' ||
            $page_name == 'subject_select' ||
            $page_name == 'marks_entry' ||
            $page_name == 'terms_trabulation_sheet' ||
            $page_name == 'final_trabulation_sheet' ||
            $page_name == 'term_progress_report' ||
            $page_name == 'final_mark_sheet'    ||
            $page_name == 'duty_roster'
        )
            echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-suitcase"></i>
                <span><?php echo get_phrase('examination_system'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'marks_setup') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/marks_setup">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('marks_setup'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'questions_paper_setup') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/questions_paper_setup">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('questions_paper_setup'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'exam_enter_marks') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/exam_enter_marks">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('mid_term_exam'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'exam_enter_marks') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/exam_enter_marks">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('assignments'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'exam_enter_marks') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/exam_enter_marks">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('final_exam'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'exam_enter_marks') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/exam_enter_marks">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('final_result_publication'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'grading_system') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/grading_system">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('grading_system'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'timetable_exam') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/timetable_exam">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('calculate_GPA/CGPA'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'duty_roster') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/duty_roster">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('exam_duty_roster'); ?></span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>