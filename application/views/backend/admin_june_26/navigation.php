<div class="sidebar-menu">
    <header class="logo-env" >
        <div class="logo" style="">
            <a href="<?php echo base_url(); ?>">
                <img src="uploads/logo.png"  style="max-height:60px;"/>
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
        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->


        <!-- DASHBOARD -->
        <li class="<?php if ($page_name == 'dashboard') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/dashboard">
                <i class="entypo-gauge"></i>
                <span><?php echo get_phrase('dashboard'); ?></span>
            </a>
        </li>

        <li class="<?php
        if (
            $page_name == 'academic_calendar' ||
            $page_name == 'faculty_setup' ||
            $page_name == 'course_program' ||
            $page_name == 'subjects' ||
            $page_name == 'major_courses' ||
            $page_name == 'minor_courses' ||
            $page_name == 'ged' ||
            $page_name == 'semester' ||
            $page_name == 'course_category' ||
            $page_name == 'online_application' ||
            $page_name == 'text_file_converter' ||
            $page_name == 'auto_selection_and_short_listing' ||
            $page_name == 'interview_applicant' ||
            $page_name == 'offer_letter_applicants' ||
            $page_name == 'registration_applicants' ||
            $page_name == 'student_id_card' ||
            $page_name == 'student_management' ||
            $page_name == 'migration_from_applicants_to_student' ||
            $page_name == 'profile_updates' ||
            $page_name == 'renewal_of_visa' ||
            $page_name == 'credit_course' ||
            $page_name == 'credit_transfer_rules' ||
            $page_name == 'applications_credit' ||
            $page_name == 'applications_program' ||
            $page_name == 'approval_program' ||
            $page_name == 'applications_status' ||
            $page_name == 'applications_approval' ||
            $page_name == 'assign_subjects' ||
            $page_name == 'auto_registration' ||
            $page_name == 'online_pre_registration' ||
            $page_name == 'registration_adm' ||
            $page_name == 'add_and_drop_sub_application' ||
            $page_name == 'add_and_drop_sub_approval' ||
            $page_name == 'auto_drop_subject'
            )
            echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-suitcase"></i>
                <span><?php echo get_phrase('admission_and_record_system'); ?></span>
            </a>
            <ul>
                <!--<li class="<?php /*if ($page_name == 'calendar_admission') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/calendar_admission">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('calendar_admission'); */?></span>
                    </a>
                </li>-->
                <li class="<?php
                if (
                    $page_name == 'academic_calendar'
                )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('academic_calendar'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'academic_calendar') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/academic_calendar">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('academic_calendar'); ?></span>
                            </a>
                        </li>
                        <!--<li class="<?php /*if ($page_name == 'training_and_camps') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/training_and_camps">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('field_work/training_and_camps'); */?></span>
                            </a>
                        </li>-->
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'faculty_setup' ||
                    $page_name == 'course_program' ||
                    $page_name == 'subjects' ||
                    $page_name == 'major_courses' ||
                    $page_name == 'minor_courses' ||
                    $page_name == 'ged' ||
                    $page_name == 'semester' ||
                    $page_name == 'course_category'
                )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('academic_landscape_setup'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'faculty_setup') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/faculty_setup">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('faculty'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'course_program') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/course_program">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('departments'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'subjects') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/subjects">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('courses'); ?></span>
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
                        <li class="<?php if ($page_name == 'ged') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/ged">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('GED'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'semester') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/semester">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('semester_setup'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'course_category') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/course_category">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('course_category'); ?></span>
                            </a>
                        </li>
                        <!--<li class="<?php /*if ($page_name == 'year') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/year">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('year'); */?></span>
                            </a>
                        </li>-->
                        <!-- <li class="<?php if ($page_name == 'acd_session') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/acd_session">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('academic_year'); ?></span>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'online_application' ||
                    $page_name == 'text_file_converter' ||
                    $page_name == 'auto_selection_and_short_listing' ||
                    $page_name == 'interview_applicant' ||
                    $page_name == 'offer_letter_applicants' ||
                    $page_name == 'registration_applicants' ||
                    $page_name == 'student_id_card'
                    )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('admission'); ?></span>
                    </a>
                    <ul>
                        <!-- <li class="<?php if ($page_name == 'nationalities') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/nationalities">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('country'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'nationalities') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/nationalities">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('state'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'nationalities') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/nationalities">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('district'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'nationalities') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/nationalities">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('race'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'religion') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/religion">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('religion'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'nationalities') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/nationalities">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('citizenship'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'qualifications') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/qualifications">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('qualification_level'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'nationalities') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/nationalities">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('student_group'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'nationalities') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/nationalities">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('intake'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'batch') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/batch">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('batch'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'skills') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/skills">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('skills'); ?></span>
                            </a>
                        </li> -->
                        <li class="<?php if ($page_name == 'online_application') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/online_application">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('online_application'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'text_file_converter') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/text_file_converter">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('convert_manual_form_into_text_file'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'auto_selection_and_short_listing') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/auto_selection_and_short_listing">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('auto_selection_and_short_listing'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'interview_applicant') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/interview_applicant">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('interview'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'offer_letter_applicants') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/offer_letter_applicants">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('offer_letter'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'registration_applicants') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/registration_applicants">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('registration'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'student_id_card') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/student_id_card">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('student_id_card_printing'); ?></span>
                            </a>
                        </li>
                        <!-- <li class="<?php if ($page_name == 'online_admission') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/online_admission">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('admission'); ?></span>
                            </a>
                        </li> -->
                        <!-- <li class="<?php if ($page_name == 'registration_admission') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/registration_admission">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('registration_admission'); ?></span>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'student_management' ||
                    $page_name == 'migration_from_applicants_to_student' ||
                    $page_name == 'profile_updates' ||
                    $page_name == 'renewal_of_visa'
                    )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('student_profile'); ?></span>
                    </a>
                    <ul>
                        <!--<li class="<?php /*if ($page_name == 'student_management') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/student_management">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('student_management'); */?></span>
                            </a>
                        </li>-->
                        <li class="<?php if ($page_name == 'student_management') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/student_management">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('status'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'migration_from_applicants_to_student') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/migration_from_applicants_to_student">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('migration_from_applicants_to_student'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'profile_updates') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/profile_updates">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('profile_updates'); ?></span>
                            </a>
                        </li>
                        <!--<li class="<?php /*if ($page_name == 'promote_student') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/promote_student">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('promote_student'); */?></span>
                            </a>
                        </li>-->
                        <li class="<?php if ($page_name == 'renewal_of_visa') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/renewal_of_visa">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('renewal_of_visa'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'credit_course' ||
                    $page_name == 'credit_transfer_rules' ||
                    $page_name == 'applications_credit'
                    )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('credit_transfer'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'credit_course') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/credit_course">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('application'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'credit_transfer_rules') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/credit_transfer_rules">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('approval'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_credit') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_credit">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('integration_with_transcript'); ?></span>
                            </a>
                        </li>
                        <!--<li class="<?php /*if ($page_name == 'status_credit') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/status_credit">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('status_credit'); */?></span>
                            </a>
                        </li>-->
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'applications_program' ||
                    $page_name == 'approval_program'
                    )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('change_program'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'applications_program') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_program">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('application'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'approval_program') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/approval_program">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('approval'); ?></span>
                            </a>
                        </li>
                        <!-- <li class="<?php if ($page_name == 'applications_program') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_program">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('integration_with_student_finance'); ?></span>
                            </a>
                        </li> -->
                        <!--<li class="<?php /*if ($page_name == 'status_program') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/status_program">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('status_program'); */?></span>
                            </a>
                        </li>-->
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'applications_status' ||
                    $page_name == 'applications_approval'
                )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('change_status'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'applications_status') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_status">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('application'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_approval') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_approval">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('approval'); ?></span>
                            </a>
                        </li>
                        <!-- <li class="<?php if ($page_name == 'applications_program') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_program">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('student_finance'); ?></span>
                            </a>
                        </li> -->
                        <!--<li class="<?php /*if ($page_name == 'status_program') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/status_program">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('status_program'); */?></span>
                            </a>
                        </li>-->
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'assign_subjects' ||
                    $page_name == 'auto_registration' ||
                    $page_name == 'online_pre_registration' ||
                    $page_name == 'registration_adm'
                    )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('course_registration'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'assign_subjects') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/assign_subjects">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('courses_offer_per_semester'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'auto_registration') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/auto_registration">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('auto_registration'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'online_pre_registration') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/online_pre_registration">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('online_pre-registration'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'registration_adm') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/registration_adm">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('registration'); ?></span>
                            </a>
                        </li>
                        <!-- <li class="<?php if ($page_name == 'subject_allocation') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/subject_allocation">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('course_teacher_allocation'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'elective_subject') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/elective_subject">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('elective_subject'); ?></span>
                            </a>
                        </li> -->
                        
                        <!-- <li class="<?php if ($page_name == 'intake') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/intake">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('intake'); ?></span>
                            </a>
                        </li> -->
                        <!-- <li class="<?php if ($page_name == 'sections') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/sections">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('sections'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'sections_allocation') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/sections_allocation">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('sections_allocation'); ?></span>
                            </a>
                        </li> -->
                        
                        
                        <!-- <li class="<?php if ($page_name == 'teacher') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/teacher">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('teachers'); ?></span>
                            </a>
                        </li>                         -->
                        <!--<li class="<?php /*if ($page_name == 'teachers_allocation') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/teachers_allocation">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('teachers_allocation'); */?></span>
                            </a>
                        </li>-->
                        <!-- <li class="<?php if ($page_name == 'class_teacher_allocation') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/class_teacher_allocation">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('class_teacher_allocation'); ?></span>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'add_and_drop_sub_application' ||
                    $page_name == 'add_and_drop_sub_approval' ||
                    $page_name == 'auto_drop_subject'
                    )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('add_and_drop_subject'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'add_and_drop_sub_application') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/add_and_drop_sub_application">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('application'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'add_and_drop_sub_approval') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/add_and_drop_sub_approval">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('approval'); ?></span>
                            </a>
                        </li>
                        <!-- <li class="<?php if ($page_name == 'qualifications') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/qualifications">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('student_finance'); ?></span>
                            </a>
                        </li> -->
                        <li class="<?php if ($page_name == 'auto_drop_subject') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/auto_drop_subject">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('auto_drop_subject'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="<?php
        if (
            $page_name == 'building_setup' ||
            $page_name == 'room_setup' ||
            $page_name == 'lecturer_setup' ||
            $page_name == 'subject_and_time_slot' ||
            $page_name == 'slot_conditions' ||
            $page_name == 'generate_timetable_slots' ||
            $page_name == 'assignment_to_slot' ||
            $page_name == 'online_registration' ||
            $page_name == 'class_routine' ||
            $page_name == 'class_cancellation_timetable' ||
            $page_name == 'track_and_reporting_timetable'
            )
            echo 'opened active';
        ?> ">
            <a href="#">
                <span><i class="entypo-suitcase"></i> <?php echo get_phrase('timetable_system'); ?></span>
            </a>
            <ul>
                <!-- <li class="<?php if ($page_name == 'environment_setup') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/environment_setup">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('environment_setup'); ?></span>
                    </a>
                </li> -->
                <!-- <li class="<?php if ($page_name == 'calendar_timetable') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/calendar_timetable">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('calendar_timetable'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'week_days_timetable') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/week_days_timetable">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('week_days_timetable'); ?></span>
                    </a>
                </li> -->
                <!-- <li class="<?php if ($page_name == 'class_routine_timetable') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/class_routine_timetable">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('class_routine_timetable'); ?></span>
                    </a>
                </li> -->
                
                <!-- <li class="<?php if ($page_name == 'timetable') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/timetable">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('timetable'); ?></span>
                    </a>
                </li> -->
                <!-- <li class="<?php if ($page_name == 'track_reporting_timetable') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/track_reporting_timetable">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('track_reporting_timetable'); ?></span>
                    </a>
                </li> -->


                <!--<li class="<?php /*if ($page_name == 'attendance_mark_setup') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/attendance_mark_setup">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('attendance_mark_setup'); */?></span>
                    </a>
                </li>-->
                <li class="<?php
                if (
                    $page_name == 'building_setup' ||
                    $page_name == 'room_setup' ||
                    $page_name == 'lecturer_setup' ||
                    $page_name == 'subject_and_time_slot' ||
                    $page_name == 'slot_conditions'
                    )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-suitcase"></i> <?php echo get_phrase('setup'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'building_setup') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/building_setup">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('building'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'room_setup') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/room_setup">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('room'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'lecturer_setup') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/lecturer_setup">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('lecturer'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'subject_and_time_slot') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/subject_and_time_slot">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('subject_and_time_slot'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'slot_conditions') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/slot_conditions">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('slot_conditions'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php if ($page_name == 'generate_timetable_slots') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/generate_timetable_slots">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('generate_timetable_slots'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'assignment_to_slot') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/assignment_to_slot">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('assignment_to_slot'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'online_registration') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/online_registration">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('online_registration'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'class_routine') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/class_routine">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('publish_timetable_for_administrator,_lecturers_and_students'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'class_cancellation_timetable') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/class_cancellation_timetable">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('class_cancellation'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'track_and_reporting_timetable') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/track_and_reporting_timetable">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('track_and_reporting'); ?></span>
                    </a>
                </li>
                <!--<li class="<?php /*if ($page_name == 'set_time_table') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/set_time_table">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('environment_setup'); */?></span>
                    </a>
                </li>
                <li class="<?php /*if ($page_name == 'active_time_table') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/active_time_table">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('time_table'); */?></span>
                    </a>
                </li>
                <li class="<?php /*if ($page_name == 'view_batch_time_table') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/view_batch_time_table">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('batch_time_table'); */?></span>
                    </a>
                </li>
                <li class="<?php /*if ($page_name == 'class_routine') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/class_routine">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('batch_class_routine'); */?></span>
                    </a>
                </li>
                <li class="<?php /*if ($page_name == 'view_teacher_time_table') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/view_teacher_time_table">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('teacher_time_table'); */?></span>
                    </a>
                </li>
                <li class="<?php /*if ($page_name == 'proxy') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/proxy">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('proxy'); */?></span>
                    </a>
                </li>
                <li class="<?php /*if ($page_name == 'working_hours') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/working_hours">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('track_&_reporting'); */?></span>
                    </a>
                </li>
                <li class="<?php /*if ($page_name == 'class_cancellation_timetable') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/class_cancellation_timetable">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('class_cancellation_timetable'); */?></span>
                    </a>
                </li>-->
            </ul>
        </li>

        <li class="<?php
        if (
            $page_name == 'hostel_details' ||
            $page_name == 'hostel_allocation' ||
            $page_name == 'hostel_register' ||
            $page_name == 'complaints' ||
            $page_name == 'equipment_registration' ||
            $page_name == 'maintenance_updates'
            )
            echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-suitcase"></i>
                <span><?php echo get_phrase('hostel_management_system'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'hostel_details') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/hostel_details">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('branch_and_room_parameters_setup'); ?></span>
                    </a>
                </li>
                <!-- <li class="<?php if ($page_name == 'hostel_room') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/hostel_room">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('rooms_setup'); ?></span>
                    </a>
                </li> -->
                <li class="<?php if ($page_name == 'hostel_allocation') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/hostel_allocation">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('auto_room_allocation'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'hostel_register') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/hostel_register">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('check-in_check-out'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'complaints') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/complaints">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('complaints'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'equipment_registration') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/equipment_registration">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('equipment_registration'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'maintenance_updates') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/maintenance_updates">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('maintenance_updates'); ?></span>
                    </a>
                </li>
                <!--<li class="<?php /*if ($page_name == 'request_details') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/request_details">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('request_details'); */?></span>
                    </a>
                </li>-->
                <!--<li class="<?php /*if ($page_name == 'hostel_transfer') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/hostel_transfer">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('hostel_transfer/vacate'); */?></span>
                    </a>
                </li>-->
                <!--<li class="<?php /*if ($page_name == 'hostel_register') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/hostel_register">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('hostel_register/check-in_check-out'); */?></span>
                    </a>
                </li>-->
                <!--<li class="<?php /*if ($page_name == 'hostel_visitors') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/hostel_visitors">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('hostel_visitors'); */?></span>
                    </a>
                </li>-->
                <!-- <li class="<?php if ($page_name == 'hostel_fee_collection') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/hostel_fee_collection">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('hostel_fee_collection'); ?></span>
                    </a>
                </li> -->
                <!--<li class="<?php
/*                    if (
                        $page_name == 'hostel_details_reports' ||
                        $page_name == 'room_availability_report' ||
                        $page_name == 'room_request_report' ||
                        $page_name == 'room_occupancy_report' ||
                        $page_name == 'hostel_fee_reports'
                        )
                        echo 'opened active';
                    */?>">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/reports">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('reports'); */?></span>
                    </a>
                    <ul>
                        <li class="<?php /*if ($page_name == 'hostel_details_reports') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/hostel_details_reports">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('hostel_details_reports'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'room_availability_report') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/room_availability_report">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('room_availability_report'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'room_request_report') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/room_request_report">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('room_request_report'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'room_occupancy_report') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/room_occupancy_report">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('room_occupancy_report'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'hostel_fee_reports') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/hostel_fee_reports">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('hostel_fee_reports'); */?></span>
                            </a>
                        </li>
                    </ul>
                </li>-->

                <!--<li class="<?php /*if ($page_name == 'dormitory_setup') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/dormitory_setup">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('dormitory_setup'); */?></span>
                    </a>
                </li>-->
                <!-- <li class="<?php if ($page_name == 'rooms_allocations') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/rooms_allocations">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('rooms_allocations'); ?></span>
                    </a>
                </li> -->
                <!--<li class="<?php /*if ($page_name == 'check_in_check_out') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/check_in_check_out">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('check_in_check_out'); */?></span>
                    </a>
                </li>-->
                <!--<li class="<?php /*if ($page_name == 'complaints_hostel') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/complaints_hostel">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('complaints_hostel'); */?></span>
                    </a>
                </li>
                <li class="<?php /*if ($page_name == 'equipment_hostel') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/equipment_hostel">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('equipment_hostel'); */?></span>
                    </a>
                </li>
                <li class="<?php /*if ($page_name == 'reports_students') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/reports_students">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('reports_students'); */?></span>
                    </a>
                </li>
                <li class="<?php /*if ($page_name == 'reports_stock_in_stock_out') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/reports_stock_in_stock_out">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('reports_stock_in_stock_out'); */?></span>
                    </a>
                </li>-->
                 <!--<li class="<?php /*if ($page_name == 'rooms_allocations_hostel') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/rooms_allocations_hostel">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('rooms_allocations_hostel'); */?></span>
                    </a>
                </li>-->
                <!--<li class="<?php /*if ($page_name == 'reports_maintenance_records') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/reports_maintenance_records">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('reports_maintenance_records'); */?></span>
                    </a>
                </li>
                <li class="<?php /*if ($page_name == 'reports_maintenance_schedules') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/reports_maintenance_schedules">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('reports_maintenance_schedules'); */?></span>
                    </a>
                </li>-->
            </ul>
        </li>

        <li class="<?php
        if (
            $page_name == 'revenue_setup' ||
            $page_name == 'std_fee_category' ||
            $page_name == 'std_fee_sub_category' ||
            $page_name == 'std_quick_payment' ||
            $page_name == 'credit_note_entry' ||
            $page_name == 'waiver_note_entry' ||
            $page_name == 'waiver_note_posting_and_approval' ||
            $page_name == 'receipt_entry' ||
            $page_name == 'receipt_printing' ||
            $page_name == 'receipt_posting' ||
            $page_name == 'bank_credit_terminal' ||
            $page_name == 'receipt_entry_and_receipt_printing' ||
            $page_name == 'reconciliation_process' ||
            $page_name == 'import_data_from_bank' ||
            $page_name == 'bill_payment_processing' ||
            $page_name == 'update_unsuccessful_data' ||
            $page_name == 'import_data_from_bank_online' ||
            $page_name == 'reconciliation_process_bank' ||
            $page_name == 'receivable_adjustment_entry' ||
            $page_name == 'refund_entry_and_approval' ||
            $page_name == 'voucher_creation' ||
            $page_name == 'cheque_preparation_and_printing' ||
            $page_name == 'posting_to_ledger' ||
            $page_name == 'posting_to_ledger_student' ||
            $page_name == 'view_student_ledger' ||
            $page_name == 'student_statement_printing' ||
            $page_name == 'aging_report' ||
            $page_name == 'sponsor_information' ||
            $page_name == 'sponsor_student_relationship_management' ||
            $page_name == 'sponsor_bill_management' ||
            $page_name == 'sponsor_payment_management' ||
            $page_name == 'students_on_barred' ||
            $page_name == 'release_barred_student' ||
            $page_name == 'transaction_reports' ||
            $page_name == 'summary_reports' ||
            $page_name == 'collection_report' ||
            $page_name == 'transaction_reports' ||
            $page_name == 'individual_student_financial_statement' ||
            $page_name == 'student_outstanding_balance' ||
            $page_name == 'report_by_semester' ||
            $page_name == 'student_listing_by_sponsor' ||
            $page_name == 'reports_sponsorship'
            )
            echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-suitcase"></i>
                <span><?php echo get_phrase('student_finance'); ?></span>
            </a>
            <ul>
                <li class="<?php
                if (
                    $page_name == 'revenue_setup' ||
                    $page_name == 'std_fee_category' ||
                    $page_name == 'std_fee_sub_category' ||
                    $page_name == 'std_quick_payment'
                    )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('billing_setup'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'revenue_setup') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/revenue_setup">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('revenue_setup'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'std_fee_category') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/std_fee_category">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('fee_structure'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'std_fee_sub_category') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/std_fee_sub_category">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('fee_structure_note'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'std_quick_payment') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/std_quick_payment">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('bill_entry'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'credit_note_entry'
                )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('credit_note'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'credit_note_entry') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/credit_note_entry">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('credit_note_entry'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>    
                <li class="<?php
                if (
                    $page_name == 'waiver_note_entry' ||
                    $page_name == 'waiver_note_posting_and_approval'
                    )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('waiver_note'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'waiver_note_entry') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/waiver_note_entry">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('waiver_note_entry'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'waiver_note_posting_and_approval') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/waiver_note_posting_and_approval">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('waiver_note_posting_and_approval'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>    
                <li class="<?php
                if (
                    $page_name == 'receipt_entry' ||
                    $page_name == 'receipt_printing' ||
                    $page_name == 'receipt_posting'
                    )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('receipt_cash/cheque_setup'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'receipt_entry') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/receipt_entry">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('receipt_entry'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'receipt_printing') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/receipt_printing">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('receipt_printing'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'receipt_posting') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/receipt_posting">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('receipt_posting'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>    
                <li class="<?php
                if (
                    $page_name == 'bank_credit_terminal' ||
                    $page_name == 'receipt_entry_and_receipt_printing' ||
                    $page_name == 'reconciliation_process'
                    )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('receipt_credit_card'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'bank_credit_terminal') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/bank_credit_terminal">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('bank_card_type,_credit_card_type,_terminal_id'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'receipt_entry_and_receipt_printing') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/receipt_entry_and_receipt_printing">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('receipt_entry_and_receipt_printing'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'reconciliation_process') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/reconciliation_process">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('reconciliation_process'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>    
                <li class="<?php
                if (
                    $page_name == 'import_data_from_bank' ||
                    $page_name == 'bill_payment_processing' ||
                    $page_name == 'update_unsuccessful_data'
                    )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('bill_payment'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'import_data_from_bank') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/import_data_from_bank">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('import_data_from_bank'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'bill_payment_processing') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/bill_payment_processing">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('bill_payment_processing,_posting_and_approval'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'update_unsuccessful_data') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/update_unsuccessful_data">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('update_unsuccessful_data'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>    
                <li class="<?php
                if (
                    $page_name == 'import_data_from_bank_online' ||
                    $page_name == 'reconciliation_process_bank'
                    )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('online_payment(from_student_portal)'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'import_data_from_bank_online') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/import_data_from_bank_online">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('import_data_from_bank'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'reconciliation_process_bank') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/reconciliation_process_bank">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('reconciliation_process'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>    
                <li class="<?php
                if (
                    $page_name == 'receivable_adjustment_entry'
                    )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('receivable_adjustment'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'receivable_adjustment_entry') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/receivable_adjustment_entry">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('receivable_adjustment_entry,_posting_and_arrival'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>    
                <li class="<?php
                if (
                    $page_name == 'refund_entry_and_approval' ||
                    $page_name == 'voucher_creation' ||
                    $page_name == 'cheque_preparation_and_printing' ||
                    $page_name == 'posting_to_ledger'
                    )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('refund(student/applicant'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'refund_entry_and_approval') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/refund_entry_and_approval">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('refund_entry_and_approval'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'voucher_creation') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/voucher_creation">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('voucher_creation'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'cheque_preparation_and_printing') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/cheque_preparation_and_printing">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('cheque_preparation_and_printing'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'posting_to_ledger') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/posting_to_ledger">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('posting_to_ledger'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>    
                <li class="<?php
                if (
                    $page_name == 'posting_to_ledger_student' ||
                    $page_name == 'view_student_ledger' ||
                    $page_name == 'student_statement_printing' ||
                    $page_name == 'aging_report'
                    )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('student_account'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'posting_to_ledger_student') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/posting_to_ledger_student">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('posting_to_ledger_student'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'view_student_ledger') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/view_student_ledger">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('view_student_ledger'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'student_statement_printing') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/student_statement_printing">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('student_statement_printing'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'aging_report') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/aging_report">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('aging_report'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'sponsor_information' ||
                    $page_name == 'sponsor_student_relationship_management' ||
                    $page_name == 'sponsor_bill_management' ||
                    $page_name == 'sponsor_payment_management'
                    )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('sporsorship_management_setup'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'sponsor_information') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/sponsor_information">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('sponsor_information'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'sponsor_student_relationship_management') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/sponsor_student_relationship_management">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('sponsor_student_relationship_management'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'sponsor_bill_management') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/sponsor_bill_management">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('sponsor_bill_management'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'sponsor_payment_management') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/sponsor_payment_management">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('sponsor_payment_management'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'students_on_barred' ||
                    $page_name == 'release_barred_student'
                    )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('barring_integration_with_student_registration'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'students_on_barred') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/students_on_barred">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('barring_based_student'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'release_barred_student') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/release_barred_student">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('release_student_from_barring'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'transaction_reports' ||
                    $page_name == 'summary_reports'
                    )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('billing/credit_note/waiver_note'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'transaction_reports') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/transaction_reports">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('transaction_reports'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'summary_reports') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/summary_reports">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('summary_reports'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'collection_report'
                    )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('receipt'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'collection_report') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/collection_report">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('collection_report'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'transaction_reports'
                    )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('refund'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'transaction_reports') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/transaction_reports">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('transaction_reports'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'individual_student_financial_statement' ||
                    $page_name == 'student_outstanding_balance' ||
                    $page_name == 'report_by_semester'
                    )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('student_account'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'individual_student_financial_statement') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/individual_student_financial_statement">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('individual_student_financial_statement'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'student_outstanding_balance') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/student_outstanding_balance">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('student_outstanding_balance'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'report_by_semester') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/report_by_semester">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('report_by_semester'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'student_listing_by_sponsor'
                    )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('sponsorship'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'student_listing_by_sponsor') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/student_listing_by_sponsor">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('student_listing_by_sponsor'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php if ($page_name == 'reports_sponsorship') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/reports_sponsorship">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('reports'); ?></span>
                    </a>
                </li>
                <!-- <li class="<?php
                if (
                    $page_name == 'std_fee_category' ||
                    $page_name == 'std_fee_sub_category' ||
                    $page_name == 'std_fee_waiver' ||
                    $page_name == 'std_fee_template' ||
                    $page_name == 'std_fee_allocation' ||
                    $page_name == 'std_fee_collection' ||
                    $page_name == 'std_quick_payment' ||
                    $page_name == 'std_fee_due_list' ||
                    $page_name == 'std_fee_reports' ||
                    $page_name == 'std_fee_import'
                    )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('fees'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'std_fee_category') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/std_fee_category">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('fee_category'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'std_fee_sub_category') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/std_fee_sub_category">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('fee_note'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'std_fee_waiver') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/std_fee_waiver">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('fee_waiver'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'std_fee_template') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/std_fee_template">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('fee_template'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'std_fee_allocation') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/std_fee_allocation">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('fee_allocation'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'std_fee_collection') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/std_fee_collection">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('fee_collection'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'std_quick_payment') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/std_quick_payment">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('quick_payment'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'std_fee_due_list') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/std_fee_due_list">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('fee_due_list'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'std_fee_reports') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/std_fee_reports">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('fee_reports'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'std_fee_import') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/std_fee_import">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('fee_import'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li> -->
                <!-- <li class="<?php
                if ($page_name == 'std_account_group' ||
                    $page_name == 'std_voucher_master' ||
                    $page_name == 'std_voucher_head' ||
                    $page_name == 'std_create_voucher' ||
                    $page_name == 'std_day_book' ||
                    $page_name == 'std_cash_book' ||
                    $page_name == 'std_bank_book'
                )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('accounting'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'std_account_group') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/std_account_group">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('account_group'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'std_voucher_master') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/std_voucher_master">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('voucher_master'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'std_voucher_head') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/std_voucher_head">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('voucher_head'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'std_create_voucher') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/std_create_voucher">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('create_voucher'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'std_day_book') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/std_day_book">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('day_book'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'std_cash_book') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/std_cash_book">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('cash_book'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'std_bank_book') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/std_bank_book">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('bank_book'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li> -->
                <!-- <li class="<?php
                if ($page_name == 'fees_category' ||
                    $page_name == 'fees_collect' ||
                    $page_name == 'student_fees')
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('general_configuration'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'revenue_setup') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/revenue_setup">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('revenue_setup'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'fee_types') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/fee_types">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('fee_types'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'credit_note') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/credit_note">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('credit_note'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'waiver_note') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/waiver_note">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('waiver_note'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                if ($page_name == 'fees_category' ||
                    $page_name == 'fees_collect' ||
                    $page_name == 'student_fees')
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('fee_setting'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'course_wise_fee_assign') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/course_wise_fee_assign">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('course_wise_fee_assign'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'batch_wise_fee_assign') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/batch_wise_fee_assign">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('batch_wise_fee_assign'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'scholarship_declare') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/scholarship_declare">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('scholarship_declare'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'attendance_fine_declare') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/attendance_fine_declare">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('attendance_fine_declare'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'fee_generate') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/fee_generate">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('fee_generate'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'fee_check_modify') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/fee_check_modify">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('fee_check_modify'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'fee_invoice_create') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/fee_invoice_create">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('fee_invoice_create'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li> -->
                <!-- <li class="<?php
                if ($page_name == 'fees_category' ||
                    $page_name == 'fees_collect' ||
                    $page_name == 'student_fees')
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('student_fee'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'bill_entry') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/bill_entry">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('bill_entry'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'fee_invoice_print') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/fee_invoice_print">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('fee_invoice_print'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'fee_collections') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/fee_collections">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('fee_collections'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li> -->
                <!-- <li class="<?php if ($page_name == 'receipt_cash') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/receipt_cash">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('fee_collections'); ?></span>
                    </a>
                </li> -->
                <!-- <li class="<?php /*if ($page_name == 'receipt_credit_card') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/receipt_credit_card">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('receipt_credit_card'); */?></span>
                    </a>
                </li> -->
                <!-- <li class="<?php if ($page_name == 'bill_payment') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/bill_payment">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('bill_payment'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'online_payment') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/online_payment">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('online_payment'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'receivable_adjustment') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/receivable_adjustment">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('receivable_adjustment'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'refund') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/refund">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('refund'); ?></span>
                    </a>
                </li> -->
                
                 <!--<li class="<?php
/*                if ($page_name == 'fees_category' ||
                    $page_name == 'fees_collect' ||
                    $page_name == 'student_fees')
                    echo 'opened active';
                */?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('reports'); */?></span>
                    </a>
                    <ul>
                        <li class="<?php /*if ($page_name == 'reports_billing_credit_waiver') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/reports_billing_credit_waiver">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('reports_billing_credit_waiver'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'receipt_reports') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/receipt_reports">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('receipt_reports'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'refund_reports') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/refund_reports">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('refund_reports'); */?></span>
                            </a>
                        </li>
                    </ul>
                </li>-->
            </ul>
        </li>

        <li class="<?php
        if (
            $page_name == 'enterprise_setup' ||
            $page_name == 'faculty_department_setup' ||
            $page_name == 'program_setup_lms' ||
            $page_name == 'color_and_banner' ||
            $page_name == 'block_menu_management' ||
            $page_name == 'language_management' ||
            $page_name == 'registration_lms' ||
            $page_name == 'bulk_registration_lms' ||
            $page_name == 'user_previlege_management' ||
            $page_name == 'course_creation' ||
            $page_name == 'bulk_registration' ||
            $page_name == 'self_enrollment' ||
            $page_name == 'lecturer_admin' ||
            $page_name == 'approved_enrollment' ||
            $page_name == 'timed_enrollment' ||
            $page_name == 'course_tools_setup' ||
            $page_name == 'community_management' ||
            $page_name == 'tracking_of_systems_and_users_learning_andteaching_information' ||
            $page_name == 'email_lms' ||
            $page_name == 'bulletin_board_lms' ||
            $page_name == 'online_community_lms' ||
            $page_name == 'public_forum_lms' ||
            $page_name == 'online_discussion_lms' ||
            $page_name == 'chat_rooms_lms' ||
            $page_name == 'file_exchange_lms' ||
            $page_name == 'wiki_lms' ||
            $page_name == 'glossary_and_group_lms' ||
            $page_name == 'content_templates_lms' ||
            $page_name == 'content_repository_lms' ||
            $page_name == 'import_learning_package_lms' ||
            $page_name == 'content_subscription_lms' ||
            $page_name == 'customized_look_and_feel_lms' ||
            $page_name == 'course_schedule_lms' ||
            $page_name == 'course_and_programme' ||
            $page_name == 'calendar_lms' ||
            $page_name == 'search_engine_lms' ||
            $page_name == 'online_test_lms' ||
            $page_name == 'question_bank_lms' ||
            $page_name == 'individual_and_group_lms' ||
            $page_name == 'portfolio_lms' ||
            $page_name == 'gradebook_lms'
        )
            echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-suitcase"></i>
                <span><?php echo get_phrase('learning_management_system_(LMS)'); ?></span>
            </a>
            <ul>
                <li class="<?php
                if (
                    $page_name == 'enterprise_setup' ||
                    $page_name == 'faculty_department_setup' ||
                    $page_name == 'program_setup_lms'
                )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('system_management'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'enterprise_setup') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/enterprise_setup">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('enterprise_setup'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'faculty_department_setup') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/faculty_department_setup">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('faculty/department_setup'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'program_setup_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/program_setup_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('program_setup'); ?></span>
                            </a>
                        </li>

                        <!--<li class="<?php
/*                            if (
                                $page_name == 'list_of_degrees_certificates' ||
                                $page_name == 'curriculum_guides_for_certificate'
                            )
                                echo 'opened active';
                            */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/degrees_certificates">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('degrees_certificates'); */?></span>
                            </a>
                            <ul>
                                <li class="<?php /*if ($page_name == 'list_of_degrees_certificates') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/list_of_degrees_certificates">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('list_of_degrees_certificates'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'curriculum_guides_for_certificate') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/curriculum_guides_for_certificate">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('curriculum_guides_for_certificate'); */?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>-->
                        <!--<li class="<?php
/*                            if (
                                $page_name == 'learning_skills_courses' ||
                                $page_name == 'academic_computing_centers' ||
                                $page_name == 'study_practice_rooms'
                            )
                                echo 'opened active';
                            */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/learning_academic_services">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('learning_academic_services'); */?></span>
                            </a>
                            <ul>
                                <li class="<?php /*if ($page_name == 'learning_skills_courses') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/learning_skills_courses">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('learning_skills_courses'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'academic_computing_centers') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/academic_computing_centers">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('academic_computing_centers'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'study_practice_rooms') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/study_practice_rooms">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('study_practice_rooms'); */?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>-->
                        <!--<li class="<?php /*if ($page_name == 'forum') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/forum">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('forum'); */?></span>
                            </a>
                        </li>-->
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'color_and_banner' ||
                    $page_name == 'block_menu_management' ||
                    $page_name == 'language_management'
                )
                    echo 'opened active';
                ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/pay_head">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('interface_setup'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'color_and_banner') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/color_and_banner">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('color_and_banner'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php if ($page_name == 'block_menu_management') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/block_menu_management">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('block/menu_management'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'language_management') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/language_management">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('language_management'); ?></span>
                    </a>
                </li>
                <li class="<?php
                if (
                    $page_name == 'registration_lms' ||
                    $page_name == 'bulk_registration_lms' ||
                    $page_name == 'user_previlege_management'
                )
                    echo 'opened active';
                ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/pay_head">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('user_management'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'registration_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/registration_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('user_creation'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'bulk_registration_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/bulk_registration_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('bulk_user_creation'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'user_previlege_management') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/user_previlege_management">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('user_previlege_management'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'course_creation' ||
                    $page_name == 'bulk_registration' ||
                    $page_name == 'self_enrollment' ||
                    $page_name == 'lecturer_admin' ||
                    $page_name == 'approved_enrollment' ||
                    $page_name == 'timed_enrollment' ||
                    $page_name == 'course_tools_setup' ||
                    $page_name == 'community_management'
                )
                    echo 'opened active';
                ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/pay_head">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('course_management'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'course_creation') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/course_creation">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('course_creation'); ?></span>
                            </a>
                        </li>
                        <li class="<?php
                        if (
                            $page_name == 'bulk_registration' ||
                            $page_name == 'self_enrollment' ||
                            $page_name == 'lecturer_admin' ||
                            $page_name == 'approved_enrollment' ||
                            $page_name == 'timed_enrollment'
                        )
                            echo 'opened active';
                        ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/pay_head">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('course_registration'); ?></span>
                            </a>
                            <ul>
                                <li class="<?php if ($page_name == 'bulk_registration') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/bulk_registration">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('bulk_registration'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'self_enrollment') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/self_enrollment">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('self_enrollment'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'lecturer_admin') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/lecturer_admin">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('lecturer-admin'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'approved_enrollment') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/approved_enrollment">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('approved_enrollment'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'timed_enrollment') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/timed_enrollment">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('timed_enrollment/password_enabled_enrollment'); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php if ($page_name == 'course_tools_setup') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/course_tools_setup">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('course_tools_setup'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php if ($page_name == 'community_management') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/community_management">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('community_management'); ?></span>
                    </a>
                </li>
                <li class="<?php
                if (
                    $page_name == 'tracking_of_systems_and_users_learning_andteaching_information'
                )
                    echo 'opened active';
                ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/pay_head">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('tracking_and_reporting'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'tracking_of_systems_and_users_learning_andteaching_information') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/tracking_of_systems_and_users_learning_andteaching_information">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('tracking_of_systems_and_users_learning_andteaching_information'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'email_lms' ||
                    $page_name == 'bulletin_board_lms' ||
                    $page_name == 'online_community_lms' ||
                    $page_name == 'public_forum_lms' ||
                    $page_name == 'online_discussion_lms' ||
                    $page_name == 'chat_rooms_lms' ||
                    $page_name == 'file_exchange_lms' ||
                    $page_name == 'wiki_lms' ||
                    $page_name == 'glossary_and_group_lms' ||
                    $page_name == 'content_templates_lms' ||
                    $page_name == 'content_repository_lms' ||
                    $page_name == 'import_learning_package_lms' ||
                    $page_name == 'content_subscription_lms' ||
                    $page_name == 'customized_look_and_feel_lms' ||
                    $page_name == 'course_schedule_lms' ||
                    $page_name == 'course_and_programme' ||
                    $page_name == 'calendar_lms' ||
                    $page_name == 'search_engine_lms' ||
                    $page_name == 'online_test_lms' ||
                    $page_name == 'question_bank_lms' ||
                    $page_name == 'individual_and_group_lms' ||
                    $page_name == 'portfolio_lms' ||
                    $page_name == 'gradebook_lms'
                )
                    echo 'opened active';
                ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/pay_head">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('course_delivery_module'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php
                        if (
                            $page_name == 'email_lms' ||
                            $page_name == 'bulletin_board_lms' ||
                            $page_name == 'online_community_lms' ||
                            $page_name == 'public_forum_lms'
                        )
                            echo 'opened active';
                        ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/pay_head">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('communication_tool'); ?></span>
                            </a>
                            <ul>
                                <li class="<?php if ($page_name == 'email_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/email_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('email'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'bulletin_board_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/bulletin_board_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('bulletin_board/announcement'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'online_community_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/online_community_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('online_community'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'public_forum_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/public_forum_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('public_forum'); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php
                        if (
                            $page_name == 'online_discussion_lms' ||
                            $page_name == 'chat_rooms_lms' ||
                            $page_name == 'file_exchange_lms' ||
                            $page_name == 'wiki_lms' ||
                            $page_name == 'glossary_and_group_lms'
                        )
                            echo 'opened active';
                        ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/pay_head">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('collaborative_tools'); ?></span>
                            </a>
                            <ul>
                                <li class="<?php if ($page_name == 'online_discussion_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/online_discussion_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('online_discussion'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'chat_rooms_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/chat_rooms_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('chat_rooms'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'file_exchange_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/file_exchange_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('file_exchange'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'wiki_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/wiki_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('wiki'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'glossary_and_group_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/glossary_and_group_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('glossary_and_group'); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php
                        if (
                            $page_name == 'content_templates_lms' ||
                            $page_name == 'content_repository_lms' ||
                            $page_name == 'import_learning_package_lms' ||
                            $page_name == 'content_subscription_lms' ||
                            $page_name == 'customized_look_and_feel_lms'
                        )
                            echo 'opened active';
                        ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/pay_head">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('content_development_and_delivery_tools'); ?></span>
                            </a>
                            <ul>
                                <li class="<?php if ($page_name == 'content_templates_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/content_templates_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('content_templates'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'content_repository_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/content_repository_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('content_repository,_reusability_and_repackaging'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'import_learning_package_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/import_learning_package_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('import_learning_package'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'content_subscription_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/content_subscription_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('content_subscription'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'customized_look_and_feel_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/customized_look_and_feel_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('customized_look_and_feel'); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php
                        if (
                            $page_name == 'course_schedule_lms' ||
                            $page_name == 'course_and_programme' ||
                            $page_name == 'calendar_lms' ||
                            $page_name == 'search_engine_lms'
                        )
                            echo 'opened active';
                        ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/pay_head">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('productivity_tool'); ?></span>
                            </a>
                            <ul>
                                <li class="<?php if ($page_name == 'course_schedule_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/course_schedule_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('course_schedule'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php
                                if (
                                    $page_name == 'course_and_programme'
                                )
                                    echo 'opened active';
                                ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/pay_head">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('progress_review'); ?></span>
                                    </a>
                                    <ul>
                                        <li class="<?php if ($page_name == 'course_and_programme') echo 'active'; ?> ">
                                            <a href="<?php echo base_url(); ?>index.php?admin/course_and_programme">
                                                <span><i class="entypo-dot"></i> <?php echo get_phrase('course_and_programme'); ?></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="<?php if ($page_name == 'calendar_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/calendar_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('calendar'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'search_engine_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/search_engine_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('search_engine'); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php
                        if (
                            $page_name == 'online_test_lms' ||
                            $page_name == 'question_bank_lms' ||
                            $page_name == 'individual_and_group_lms' ||
                            $page_name == 'portfolio_lms' ||
                            $page_name == 'gradebook_lms'
                        )
                            echo 'opened active';
                        ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/pay_head">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('assessment_tool'); ?></span>
                            </a>
                            <ul>
                                <li class="<?php if ($page_name == 'online_test_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/online_test_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('online_test'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'question_bank_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/question_bank_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('question_bank'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php
                                if (
                                    $page_name == 'individual_and_group_lms'
                                )
                                    echo 'opened active';
                                ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/pay_head">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('assignment'); ?></span>
                                    </a>
                                    <ul>
                                        <li class="<?php if ($page_name == 'individual_and_group_lms') echo 'active'; ?> ">
                                            <a href="<?php echo base_url(); ?>index.php?admin/individual_and_group_lms">
                                                <span><i class="entypo-dot"></i> <?php echo get_phrase('individual_and_group'); ?></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="<?php if ($page_name == 'portfolio_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/portfolio_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('portfolio'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'gradebook_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/gradebook_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('gradebook'); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!--<li class="<?php
/*                            if (
                                $page_name == 'users_management_lms' ||
                                $page_name == 'CSV_operations_lms' ||
                                $page_name == 'roles_management_lms' ||
                                $page_name == 'groups_classes_lms' ||
                                $page_name == 'group_managers_lms' ||
                                $page_name == 'assistants_lms' ||
                                $page_name == 'group_members_lms' ||
                                $page_name == 'students_management_lms'
                            )
                                echo 'opened active';
                            */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/user_management_lms">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('user_management_lms'); */?></span>
                    </a>
                    <ul>
                        <li class="<?php /*if ($page_name == 'users_management_lms') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/users_management_lms">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('users_management_lms'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'CSV_operations_lms') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/CSV_operations_lms">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('CSV_operations_lms'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'roles_management_lms') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/roles_management_lms">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('roles_management_lms'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'groups_classes_lms') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/groups_classes_lms">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('groups_classes_lms'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'group_managers_lms') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/group_managers_lms">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('group_managers_lms'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'assistants_lms') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/assistants_lms">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('assistants_lms'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'group_members_lms') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/group_members_lms">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('group_members_lms'); */?></span>
                            </a>
                        </li>

                        <li class="<?php /*if ($page_name == 'students_management_lms') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/students_management_lms">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('students_management_lms'); */?></span>
                            </a>
                        </li>
                    </ul>
                </li>-->
                <!--<li class="<?php
/*                            if (
                                $page_name == 'online_test_lms' ||
                                $page_name == 'question_bank_lms' ||
                                $page_name == 'assignment_lms' ||
                                $page_name == 'grade_book_lms'
                            )
                                echo 'opened active';
                            */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/assesment_tool_lms">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('assesment_tool_lms'); */?></span>
                    </a>
                    <ul>
                        <li class="<?php /*if ($page_name == 'online_test_lms') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/online_test_lms">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('online_test_lms'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'question_bank_lms') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/question_bank_lms">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('question_bank_lms'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'assignment_lms') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/assignment_lms">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('assignment_lms'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'grade_book_lms') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/grade_book_lms">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('grade_book_lms'); */?></span>
                            </a>
                        </li>
                    </ul>
                </li>-->
            </ul>
        </li>

        <li class="<?php
        if ($page_name == 'fees_category' ||
            $page_name == 'fees_collect' ||
            $page_name == 'student_fees')
            echo 'opened active';
        ?> ">
            <a href="#">
                <span><i class="entypo-suitcase"></i> <?php echo get_phrase('student_affairs'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'orientation') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/orientation">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('new_student_orientation'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'activities') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/activities">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('co-curriculum'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'activities') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/activities">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('students_activities'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'activities') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/activities">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('communication'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'activities') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/activities">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('disciplinary'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'counseling_advising') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/counseling_advising">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('counseling_and_advising'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'student_group') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/student_group">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('student_group'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'activities') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/activities">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('campus_activities'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'magazine_alumni') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/magazine_alumni">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('alumni'); ?></span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="<?php
        if (
            $page_name == 'exam_set_term' ||
            $page_name == 'admission_subjects_list' ||
            $page_name == 'admission_mark_setup' ||
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
            $page_name == 'subject_marks_verification' ||
            $page_name == 'add_grading_system' ||
            $page_name == 'exam_term_create' ||
            $page_name == 'subject_select' ||
            $page_name == 'marks_entry' ||
            $page_name == 'terms_trabulation_sheet' ||
            $page_name == 'final_trabulation_sheet' ||
            $page_name == 'term_progress_report' ||
            $page_name == 'final_mark_sheet'
        )
            echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-suitcase"></i>
                <span><?php echo get_phrase('examination_system'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'calendar_exam') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/calendar_exam">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('examination_event_date_control'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'timetable_exam') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/timetable_exam">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('online_coursework_marks_entry'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'timetable_exam') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/timetable_exam">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('online_coursework_marks_verification'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'timetable_exam') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/timetable_exam">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('exam_timetable_management_&_planning'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'timetable_exam') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/timetable_exam">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('student_barring'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'timetable_exam') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/timetable_exam">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('exam_slip_printing_and_distribution'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'timetable_exam') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/timetable_exam">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('smartscan'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'timetable_exam') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/timetable_exam">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('online_final_exam_marks_entry'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'timetable_exam') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/timetable_exam">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('online_final_exam_marks_verifications'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'timetable_exam') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/timetable_exam">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('generate_grade'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'timetable_exam') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/timetable_exam">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('calculate_gpa/cgpa'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'timetable_exam') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/timetable_exam">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('change_grade'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'timetable_exam') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/timetable_exam">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('appeal_for_regrading'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'timetable_exam') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/timetable_exam">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('refer_exam'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'timetable_exam') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/timetable_exam">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('graduation_landscape'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'timetable_exam') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/timetable_exam">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('online_transcript'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'timetable_exam') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/timetable_exam">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('generate_graduation_list'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'timetable_exam') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/timetable_exam">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('forcasted_no_of_graduate_students'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'timetable_exam') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/timetable_exam">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('gowns_loaned'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'timetable_exam') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/timetable_exam">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('scroll'); ?></span>
                    </a>
                </li>
                <li class="<?php
                if (
                    $page_name == 'admission_subjects_list' ||
                    $page_name == 'admission_mark_setup'
                )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('admission_exam'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'admission_subjects_list') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/admission_subjects_list">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('admission_subjects_list'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'admission_mark_setup') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/admission_mark_setup">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('admission_mark_setup'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="<?php if ($page_name == 'grading_system') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/grading_system">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('grading_system'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'subject_marks_verification') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/subject_marks_verification">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('subjects,_marks_&_verification'); ?></span>
                    </a>
                </li>
                <li class="<?php
                if (
                    $page_name == 'admission_subjects_list' ||
                    $page_name == 'admission_mark_setup'
                )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('admission_exam'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'admission_subjects_list') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/admission_subjects_list">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('admission_subjects_list'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'admission_mark_setup') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/admission_mark_setup">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('admission_mark_setup'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li> -->
                <!-- <li class="<?php
                if (
                    $page_name == 'exam_set_term' ||
                    $page_name == 'exam_create_exam' ||
                    $page_name == 'exam_set_grade_scale' ||
                    $page_name == 'exam_enter_marks' ||
                    $page_name == 'exam_mark_distribution' ||
                    $page_name == 'exam_set_assessment' ||
                    $page_name == 'exam_enter_assessment_mark' ||
                    $page_name == 'exam_assess_mark_list' ||
                    $page_name == 'exam_set_exam' ||
                    $page_name == 'add_new_subject' ||
                    $page_name == 'add_grading_system' ||
                    $page_name == 'exam_term_create'
                )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('exam_settings'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'exam_set_term') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/exam_set_term">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('set_term'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'exam_create_exam') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/exam_create_exam">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('create_exam'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'exam_set_grade_scale') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/exam_set_grade_scale">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('set_grade_scale'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'exam_enter_marks') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/exam_enter_marks">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('enter_marks'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'exam_mark_distribution') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/exam_mark_distribution">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('mark_distribution(total_mark_%)'); ?></span>
                            </a>
                        </li>
                        <li class="<?php
                        if (
                            $page_name == 'exam_set_assessment' ||
                            $page_name == 'exam_enter_assessment_mark' ||
                            $page_name == 'exam_assess_mark_list'
                        )
                            echo 'opened active';
                        ?> ">
                            <a href="#">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('assessment'); ?></span>
                            </a>
                            <ul>
                                <li class="<?php if ($page_name == 'exam_set_assessment') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/exam_set_assessment">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('set_assessment'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'exam_enter_assessment_mark') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/exam_enter_assessment_mark">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('enter_assessment_mark'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'exam_assess_mark_list') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/exam_assess_mark_list">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('mark_list'); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php if ($page_name == 'exam_set_exam') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/exam_set_exam">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('set_exam'); ?></span>
                            </a>
                        </li>

                        <li class="<?php /*if ($page_name == 'add_new_subject') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/add_new_subject">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('add_new_subject'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'exam_term_create') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/exam_term_create">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('exam_term_create'); */?></span>
                            </a>
                        </li>
                    </ul>
                </li> -->
                <!-- <li class="<?php
                if (
                    $page_name == 'terms_tabulation_sheet' ||
                    $page_name == 'final_tabulation_sheet' ||
                    $page_name == 'term_progress_report' ||
                    $page_name == 'final_mark_sheet'
                )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('exam_report'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'terms_tabulation_sheet') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/terms_tabulation_sheet">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('terms_tabulation_sheet'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'final_tabulation_sheet') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/final_tabulation_sheet">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('final_tabulation_sheet'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'term_progress_report') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/term_progress_report">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('term_progress_report'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'final_mark_sheet') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/final_mark_sheet">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('final_mark_sheet'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php if ($page_name == 'barred_students') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/barred_students">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('barred_students'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'exam_slip') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/exam_slip">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('exam_slip'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'smart_scan') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/smart_scan">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('smart_scan'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'appeal_for_regrading') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/appeal_for_regrading">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('appeal_for_regrading'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'transcript_management') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/transcript_management">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('transcript_management'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'graduation_management') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/graduation_management">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('graduation_management'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'gowns_loaned') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/gowns_loaned">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('gowns_loaned'); ?></span>
                    </a>
                </li>                    -->
            </ul>
        </li>

        <li class="<?php
        if (
            $page_name == 'message' ||
            $page_name == 'teachers_students_parents' ||
            $page_name == 'complaints' ||
            $page_name == 'faqs_crm' ||
            $page_name == 'report_statistics'

        )
            echo 'opened active';
        ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/message">
                <i class="entypo-mail"></i>
                <span><?php echo get_phrase('customer_relationship_management_system(CRMS)'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'message') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/message">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('online_inquiry/complaint_management'); ?></span>
                    </a>
                </li><li class="<?php if ($page_name == 'message') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/message">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('online_inquiry/complaining_status'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'message') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/message">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('auto_escalation_of_inquiry/complaint_based_on_conditions_setup'); ?></span>
                    </a>
                </li>
                <!--<li class="<?php /*if ($page_name == 'teachers_students_parents') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/teachers_students_parents">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('teachers/students/parents'); */?></span>
                    </a>
                </li>
                <li class="<?php /*if ($page_name == 'complaints') echo 'active'; */?> ">
                    <a href="<?php /*echo base_url(); */?>index.php?admin/complaints">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('complaints'); */?></span>
                    </a>
                </li>-->
                <li class="<?php if ($page_name == 'faqs_crm') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/faqs_crm">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('knowledge_base_(FAQ)'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'message') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/message">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('real_time_monitoring_and_tracking'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'report_statistics') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/report_statistics">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('reports_&_statistics'); ?></span>
                    </a>
                </li>
            </ul>
        </li>        

        <li class="<?php
            if (
                $page_name == 'user_management' ||
                $page_name == 'job_titles' ||
                $page_name == 'pay_grades' ||
                $page_name == 'employment_status' ||
                $page_name == 'job_categories' ||
                $page_name == 'education_hr' ||
                $page_name == 'work_shifts' ||
                $page_name == 'general_information' ||
                $page_name == 'locations' ||
                $page_name == 'structure' ||
                $page_name == 'skills_hr' ||
                $page_name == 'licenses' ||
                $page_name == 'languages_hr' ||
                $page_name == 'memberships' ||
                $page_name == 'nationalities_hr' ||
                $page_name == 'configurations_hr' ||
                $page_name == 'email_configuration' ||
                $page_name == 'configuration_hr' ||
                $page_name == 'data_import' ||
                $page_name == 'reporting_methods' ||
                $page_name == 'termination_reasons' ||
                $page_name == 'employee_list' ||
                $page_name == 'add_employee_hr' ||
                $page_name == 'reports_hr' ||
                $page_name == 'timesheets' ||
                $page_name == 'attendance_hr' ||
                $page_name == 'employee_records' ||
                $page_name == 'configuration_hr_monthly' ||
                $page_name == 'project_reports' ||
                $page_name == 'employee_reports' ||
                $page_name == 'attendance_summary' ||
                $page_name == 'customers_hr' ||
                $page_name == 'projects_hr' ||
                $page_name == 'overtime_entitlements' ||
                $page_name == 'overtime_records' ||
                $page_name == 'overtime_rates' ||
                $page_name == 'overtime_reports' ||
                $page_name == 'approval_cancellation' ||
                $page_name == 'payroll_hr' ||
                $page_name == 'add_entitlements' ||
                $page_name == 'employee_entitlements' ||
                $page_name == 'leave_entitlements_and_usage_report' ||
                $page_name == 'leave_period' ||
                $page_name == 'leave_types' ||
                $page_name == 'work_week' ||
                $page_name == 'holidays' ||
                $page_name == 'leave_list' ||
                $page_name == 'assign_leave' ||
                $page_name == 'candidates' ||
                $page_name == 'vacancies' ||
                $page_name == 'search_hr' ||
                $page_name == 'kpis_hr' ||
                $page_name == 'trackers' ||
                $page_name == 'manage_reviews' ||
                $page_name == 'employee_trackers' ||
                $page_name == 'staff_movement' ||
                $page_name == 'loan_types_interest_rates' ||
                $page_name == 'loans_repayments_history_management' ||
                $page_name == 'loan_application' ||
                $page_name == 'loan_balance_details' ||
                $page_name == 'loan_payment_details' ||
                $page_name == 'loan_apply_list' ||
                $page_name == 'loan_approval_details' ||
                $page_name == 'disciplines_entry' ||
                $page_name == 'discipline_action' ||
                $page_name == 'reports_discipline' ||
                $page_name == 'statistics_discipline' ||
                $page_name == 'articles_materials' ||
                $page_name == 'applications_learning' ||
                $page_name == 'nomination_scheduling' ||
                $page_name == 'training_enrollment' ||
                $page_name == 'statistics_learning' ||
                $page_name == 'reports_learning' ||
                $page_name == 'training_calendar' ||
                $page_name == 'payroll_sheet_hr' ||
                $page_name == 'pay_head' ||
                $page_name == 'employee_setup' ||
                $page_name == 'employee_view' ||
                $page_name == 'payroll_generate' ||
                $page_name == 'payroll_approve' ||
                $page_name == 'payroll_sheet_hr'
            )
                echo 'opened active';
            ?> ">
            <a href="#">
                <i class="entypo-suitcase"></i>
                <span><?php echo get_phrase('human_resource_management_system'); ?></span>
            </a>
            <ul>
                <li class="<?php
                    if (
                        $page_name == 'applications_lms' ||
                        $page_name == 'registration_lms' ||
                        $page_name == 'bulk_registration_lms' ||
                        $page_name == 'enrollment_lms' ||
                        $page_name == 'status_lms'
                    )
                        echo 'opened active';
                    ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/pay_head">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('staff_information'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('personal_details'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('next_of_kin_information'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'staff_movement'
                )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('staff_movement'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'staff_movement') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/staff_movement">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('staff_movement_process'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'staff_movement'
                )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('leave_module'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'staff_movement') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/staff_movement">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('leave_history'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'staff_movement') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/staff_movement">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('leave_balance'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'staff_movement') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/staff_movement">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('leave_application'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'staff_movement') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/staff_movement">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('leave_plan'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'staff_movement') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/staff_movement">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('leave_approval'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'staff_movement') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/staff_movement">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('supervisor_reduce_leave'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'staff_movement') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/staff_movement">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('cancel_approved_leave_and_reporting'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                    if (
                        $page_name == 'applications_lms' ||
                        $page_name == 'registration_lms' ||
                        $page_name == 'bulk_registration_lms' ||
                        $page_name == 'enrollment_lms' ||
                        $page_name == 'status_lms'
                    )
                        echo 'opened active';
                    ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/pay_head">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('recruitment_module'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('manpower_planning'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('job_position_requirement_setup'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('public_portal_job_application'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('register_check_application_status/job_searching/application'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('resume_bank'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('resume_searching'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('shortlist_process'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('interview_process'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('selection_process_and_convert_to_employee_details'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('offer/reject_letter'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                    if (
                        $page_name == 'applications_lms' ||
                        $page_name == 'registration_lms' ||
                        $page_name == 'bulk_registration_lms' ||
                        $page_name == 'enrollment_lms' ||
                        $page_name == 'status_lms'
                    )
                        echo 'opened active';
                    ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/pay_head">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('overtime'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php
                            if (
                                $page_name == 'applications_lms' ||
                                $page_name == 'registration_lms' ||
                                $page_name == 'bulk_registration_lms' ||
                                $page_name == 'enrollment_lms' ||
                                $page_name == 'status_lms'
                            )
                                echo 'opened active';
                            ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/pay_head">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('employee_self_srvice'); ?></span>
                            </a>
                            <ul>
                                <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('task_planning'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('task_aproval'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('admin_overtime_entry'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('overtime_entry/submission(self-service)'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('overtime_entry/submission(OT_admin)'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('overtime-approval'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('calculate_different_types_of_overtime_rates'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('overtime_report_and_overtime_approval_for_payroll'); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                    if (
                        $page_name == 'applications_lms' ||
                        $page_name == 'registration_lms' ||
                        $page_name == 'bulk_registration_lms' ||
                        $page_name == 'enrollment_lms' ||
                        $page_name == 'status_lms'
                    )
                        echo 'opened active';
                    ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/pay_head">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('benefit'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('computer_loan'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('medical_claim'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('vehicle_loan'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('staff_and_family_study_loan'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('maternity_claim'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('dental_claim'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('hospitalization_claim'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('HR_to_initiate_payment_voucher'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                    if (
                        $page_name == 'applications_lms' ||
                        $page_name == 'registration_lms' ||
                        $page_name == 'bulk_registration_lms' ||
                        $page_name == 'enrollment_lms' ||
                        $page_name == 'status_lms'
                    )
                        echo 'opened active';
                    ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/pay_head">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('discipline'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('staff_discipline_entry'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('staff_discipline_action_taken'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('reports'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('statistics'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('domestic_inquiry_entry'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                    if (
                        $page_name == 'applications_lms' ||
                        $page_name == 'registration_lms' ||
                        $page_name == 'bulk_registration_lms' ||
                        $page_name == 'enrollment_lms' ||
                        $page_name == 'status_lms'
                    )
                        echo 'opened active';
                    ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/pay_head">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('training_management'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('online_application'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('online_approval'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('nomination_scheduling'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('training_enrollment'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('training_completion'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('training_yearly_plan'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                    if (
                        $page_name == 'applications_lms' ||
                        $page_name == 'registration_lms' ||
                        $page_name == 'bulk_registration_lms' ||
                        $page_name == 'enrollment_lms' ||
                        $page_name == 'status_lms'
                    )
                        echo 'opened active';
                    ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/pay_head">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('performance_appraisal_information'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'applications_lms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('managing_the_performance_of_HR'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php if ($page_name == 'applications_lms12') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/applications_lms">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('reports'); ?></span>
                    </a>
                </li>
                <!--<li class="<?php
/*                if (
                    $page_name == 'user_management' ||
                    $page_name == 'job_titles' ||
                    $page_name == 'pay_grades' ||
                    $page_name == 'employment_status' ||
                    $page_name == 'job_categories' ||
                    $page_name == 'education_hr' ||
                    $page_name == 'work_shifts' ||
                    $page_name == 'general_information' ||
                    $page_name == 'locations' ||
                    $page_name == 'structure' ||
                    $page_name == 'skills_hr' ||
                    $page_name == 'licenses' ||
                    $page_name == 'languages_hr' ||
                    $page_name == 'memberships' ||
                    $page_name == 'nationalities_hr' ||
                    $page_name == 'configurations_hr' ||
                    $page_name == 'email_configuration'
                )
                    echo 'opened active';
                */?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('admin'); */?></span>
                    </a>
                    <ul>
                        <li class="<?php /*if ($page_name == 'user_management') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/user_management">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('user_management'); */?></span>
                            </a>
                        </li>
                        <li class="<?php
/*                            if (
                                $page_name == 'job_titles' ||
                                $page_name == 'pay_grades' ||
                                $page_name == 'employment_status' ||
                                $page_name == 'job_categories' ||
                                $page_name == 'education_hr' ||
                                $page_name == 'work_shifts'
                            )
                                echo 'opened active';
                            */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/job">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('job'); */?></span>
                            </a>
                            <ul>
                                <li class="<?php /*if ($page_name == 'job_titles') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/job_titles">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('job_titles'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'pay_grades') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/pay_grades">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('pay_grades'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'employment_status') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/employment_status">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('employment_status'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'job_categories') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/job_categories">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('job_categories'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'work_shifts') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/work_shifts">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('work_shifts'); */?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php
/*                            if (
                                $page_name == 'general_information' ||
                                $page_name == 'locations' ||
                                $page_name == 'structure'
                            )
                                echo 'opened active';
                            */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/organization">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('organization'); */?></span>
                            </a>
                            <ul>
                                <li class="<?php /*if ($page_name == 'general_information') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/general_information">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('general_information'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'locations') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/locations">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('locations'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'structure') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/structure">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('structure'); */?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php
/*                            if (
                                $page_name == 'skills_hr' ||
                                $page_name == 'licenses' ||
                                $page_name == 'languages_hr' ||
                                $page_name == 'memberships'
                            )
                                echo 'opened active';
                            */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/qualifications">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('qualifications'); */?></span>
                            </a>
                            <ul>
                                <li class="<?php /*if ($page_name == 'skills_hr') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/skills_hr">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('skills'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'education_hr') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/education_hr">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('education'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'licenses') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/licenses">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('licenses'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'languages_hr') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/languages_hr">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('languages'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'memberships') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/memberships">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('memberships'); */?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php /*if ($page_name == 'nationalities_hr') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/nationalities_hr">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('nationalities'); */?></span>
                            </a>
                        </li>
                        <li class="<?php
/*                            if (
                                $page_name == 'email_configuration'
                            )
                                echo 'opened active';
                            */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/configurations_hr">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('configurations'); */?></span>
                            </a>
                            <ul>
                                <li class="<?php /*if ($page_name == 'email_configuration') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/email_configuration">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('email_configuration'); */?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>-->
                <!--<li class="<?php
/*                if (
                    $page_name == 'configuration_hr' ||
                    $page_name == 'data_import' ||
                    $page_name == 'reporting_methods' ||
                    $page_name == 'termination_reasons' ||
                    $page_name == 'employee_list' ||
                    $page_name == 'add_employee_hr' ||
                    $page_name == 'reports_hr'
                )
                    echo 'opened active';
                */?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('personal_information_management_system_(PIM)'); */?></span>
                    </a>
                    <ul>
                        <li class="<?php
/*                            if (
                                $page_name == 'data_import' ||
                                $page_name == 'reporting_methods' ||
                                $page_name == 'termination_reasons'                            )
                                echo 'opened active';
                            */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/configuration_hr">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('configuration'); */?></span>
                            </a>
                            <ul>
                                <li class="<?php /*if ($page_name == 'data_import') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/data_import">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('data_import'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'reporting_methods') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/reporting_methods">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('reporting_methods'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'termination_reasons') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/termination_reasons">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('termination_reasons'); */?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php /*if ($page_name == 'employee_list') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/employee_list">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('employee_list'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'add_employee_hr') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/add_employee_hr">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('add_employee'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'reports_hr') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/reports_hr">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('reports'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'employee_details') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/employee_details">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('employee_details'); */?></span>
                            </a>
                        </li>
                    </ul>
                </li>-->
                <!--<li class="<?php
/*                if (
                    $page_name == 'office_time' ||
                    $page_name == 'attendance_fine'
                )
                    echo 'opened active';
                */?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('HR_setting'); */?></span>
                    </a>
                    <ul>
                        <li class="<?php /*if ($page_name == 'office_time') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/office_time">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('office_time'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'attendance_fine') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/attendance_fine">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('attendance_fine'); */?></span>
                            </a>
                        </li>
                    </ul>
                </li>-->
                <!--<li class="<?php
/*                    if (
                        $page_name == 'timesheets' ||
                        $page_name == 'attendance_hr' ||
                        $page_name == 'employee_records' ||
                        $page_name == 'configuration_hr_monthly' ||
                        $page_name == 'project_reports' ||
                        $page_name == 'employee_reports' ||
                        $page_name == 'attendance_summary' ||
                        $page_name == 'customers_hr' ||
                        $page_name == 'projects_hr' ||
                        $page_name == 'overtime_entitlements' ||
                        $page_name == 'overtime_records' ||
                        $page_name == 'overtime_rates' ||
                        $page_name == 'overtime_reports' ||
                        $page_name == 'approval_cancellation' ||
                        $page_name == 'payroll_hr'
                    )
                        echo 'opened active';
                    */?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('time_&_attendance'); */?></span>
                    </a>
                    <ul>
                        <li class="<?php /*if ($page_name == 'timesheets') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/timesheets">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('timesheets'); */?></span>
                            </a>
                        </li>
                        <li class="<?php
/*                            if (
                                $page_name == 'employee_records' ||
                                $page_name == 'configuration_hr_monthly'
                            )
                                echo 'opened active';
                            */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/attendance_hr">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('attendance'); */?></span>
                            </a>
                            <ul>
                                <li class="<?php /*if ($page_name == 'employee_records') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/employee_records">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('employee_records'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'configuration_hr_monthly') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/configuration_hr_monthly">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('configuration'); */?></span>
                                    </a>
                                </li>
                            </ul>    
                        </li>
                        <li class="<?php
/*                            if (
                                $page_name == 'project_reports' ||
                                $page_name == 'employee_reports' ||
                                $page_name == 'attendance_summary'
                            )
                                echo 'opened active';
                            */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/attendance_fine">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('reports'); */?></span>
                            </a>
                            <ul>
                                <li class="<?php /*if ($page_name == 'project_reports') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/project_reports">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('project_reports'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'employee_reports') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/employee_reports">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('employee_reports'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'attendance_summary') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/attendance_summary">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('attendance_summary'); */?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php
/*                            if (
                                $page_name == 'customers_hr' ||
                                $page_name == 'projects_hr'
                            )
                                echo 'opened active';
                            */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/project_info">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('project_info'); */?></span>
                            </a>
                            <ul>
                                <li class="<?php /*if ($page_name == 'customers_hr') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/customers_hr">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('customers'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'projects_hr') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/projects_hr">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('projects'); */?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php
/*                            if (
                                $page_name == 'overtime_entitlements' ||
                                $page_name == 'overtime_records' ||
                                $page_name == 'overtime_rates' ||
                                $page_name == 'overtime_reports' ||
                                $page_name == 'approval_cancellation' ||
                                $page_name == 'payroll_hr'
                            )
                                echo 'opened active';
                            */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/overtime_hr">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('overtime_hr'); */?></span>
                            </a>
                            <ul>
                                <li class="<?php /*if ($page_name == 'overtime_entitlements') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/overtime_entitlements">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('overtime_entitlements'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'overtime_records') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/overtime_records">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('overtime_records'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'overtime_rates') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/overtime_rates">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('overtime_rates'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'overtime_reports') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/overtime_reports">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('overtime_reports'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'approval_cancellation') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/approval_cancellation">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('approval_cancellation'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'payroll_hr') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/payroll_hr">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('payroll'); */?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>-->
                <!--<li class="<?php
/*                if (
                    $page_name == 'add_entitlements' ||
                    $page_name == 'employee_entitlements' ||
                    $page_name == 'leave_entitlements_and_usage_report' ||
                    $page_name == 'leave_period' ||
                    $page_name == 'leave_types' ||
                    $page_name == 'work_week' ||
                    $page_name == 'holidays' ||
                    $page_name == 'leave_list' ||
                    $page_name == 'assign_leave'
                )
                    echo 'opened active';
                */?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('leave_management'); */?></span>
                    </a>
                    <ul>
                        <li class="<?php
/*                            if (
                                $page_name == 'add_entitlements' ||
                                $page_name == 'employee_entitlements'
                            )
                                echo 'opened active';
                            */?>">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/leave_head">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('entitlements'); */?></span>
                            </a>
                            <ul>
                                <li class="<?php /*if ($page_name == 'add_entitlements') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/add_entitlements">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('add_entitlements'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'employee_entitlements') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/employee_entitlements">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('employee_entitlements'); */?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php /*if ($page_name == 'leave_entitlements_and_usage_report') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/reports_leave">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('reports_leave'); */?></span>
                            </a>
                            <ul>
                                <li class="<?php /*if ($page_name == 'leave_entitlements_and_usage_report') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/leave_entitlements_and_usage_report">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('leave_entitlements_and_usage_report'); */?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php
/*                            if (
                                $page_name == 'leave_period' ||
                                $page_name == 'leave_types' ||
                                $page_name == 'work_week' ||
                                $page_name == 'holidays'
                            )
                                echo 'opened active';
                            */?>">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/leave_report">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('configure'); */?></span>
                            </a>
                            <ul>
                                <li class="<?php /*if ($page_name == 'leave_period') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/leave_period">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('leave_period'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'leave_types') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/leave_types">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('leave_types'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'work_week') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/work_week">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('work_week'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'holidays') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/holidays">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('holidays'); */?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php /*if ($page_name == 'leave_list') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/leave_list">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('leave_list'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'assign_leave') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/assign_leave">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('assign_leave'); */?></span>
                            </a>
                        </li>
                    </ul>
                </li>-->
                <!--<li class="<?php
/*                if (
                    $page_name == 'candidates' ||
                    $page_name == 'vacancies' ||
                    $page_name == 'search_hr'
                )
                    echo 'opened active';
                */?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('recruitment'); */?></span>
                    </a>
                    <ul>
                        <li class="<?php /*if ($page_name == 'candidates') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/candidates">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('candidates'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'vacancies') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/vacancies">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('vacancies'); */?></span>
                            </a>
                        </li>
                    </ul>
                </li>-->
                <!--<li class="<?php
/*                if (
                    $page_name == 'kpis_hr' ||
                    $page_name == 'trackers' ||
                    $page_name == 'manage_reviews' ||
                    $page_name == 'employee_trackers'
                )
                    echo 'opened active';
                */?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('performance'); */?></span>
                    </a>
                    <ul>
                        <li class="<?php
/*                            if (
                                $page_name == 'kpis_hr' ||
                                $page_name == 'trackers'
                            )
                                echo 'opened active';
                            */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/leave_head">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('configure'); */?></span>
                            </a>
                            <ul>
                                <li class="<?php /*if ($page_name == 'kpis_hr') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/kpis_hr">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('kpis_hr'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'trackers') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/trackers">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('trackers'); */?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php /*if ($page_name == 'manage_reviews') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/manage_reviews">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('manage_reviews'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'employee_trackers') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/employee_trackers">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('employee_trackers'); */?></span>
                            </a>
                        </li>
                    </ul>
                </li>-->
                <!-- <li class="<?php
/*                if (
                    $page_name == 'staff_movement'
                )
                    echo 'opened active';
                */?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('movement'); */?></span>
                    </a>
                    <ul>
                        <li class="<?php /*if ($page_name == 'staff_movement') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/staff_movement">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('staff_movement'); */?></span>
                            </a>
                        </li>
                    </ul>
                </li> -->
                <!--<li class="<?php
/*                if (
                    $page_name == 'loan_types_interest_rates' ||
                    $page_name == 'loans_repayments_history_management' ||
                    $page_name == 'loan_application' ||
                    $page_name == 'loan_balance_details' ||
                    $page_name == 'loan_payment_details' ||
                    $page_name == 'loan_apply_list' ||
                    $page_name == 'loan_approval_details'
                )
                    echo 'opened active';
                */?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('loans_and_advances'); */?></span>
                    </a>
                    <ul>
                        <li class="<?php /*if ($page_name == 'loan_types_interest_rates') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/loan_types_interest_rates">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('loan_types_interest_rates'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'loans_repayments_history_management') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/loans_repayments_history_management">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('loans_repayments_history_management'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'loan_application') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/loan_application">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('loan_application'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'loan_balance_details') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/loan_balance_details">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('loan_balance_details'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'loan_payment_details') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/loan_payment_details">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('loan_payment_details'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'loan_apply_list') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/loan_apply_list">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('loan_apply_list'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'loan_approval_details') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/loan_approval_details">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('loan_approval_details'); */?></span>
                            </a>
                        </li>
                    </ul>
                </li>-->
                <!--<li class="<?php
/*                if (
                    $page_name == 'disciplines_entry' ||
                    $page_name == 'discipline_action' ||
                    $page_name == 'reports_discipline' ||
                    $page_name == 'statistics_discipline'
                )
                    echo 'opened active';
                */?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('discipline'); */?></span>
                    </a>
                    <ul>
                        <li class="<?php /*if ($page_name == 'disciplines_entry') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/disciplines_entry">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('disciplines_entry'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'discipline_action') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/discipline_action">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('discipline_action'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'reports_discipline') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/reports_discipline">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('reports_discipline'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'statistics_discipline') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/statistics_discipline">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('statistics_discipline'); */?></span>
                            </a>
                        </li>
                    </ul>
                </li>-->
                <!--<li class="<?php
/*                    if (
                        $page_name == 'articles_materials' ||
                        $page_name == 'applications_learning' ||
                        $page_name == 'nomination_scheduling' ||
                        $page_name == 'training_enrollment' ||
                        $page_name == 'statistics_learning' ||
                        $page_name == 'reports_learning' ||
                        $page_name == 'training_calendar'
                    )
                        echo 'opened active';
                    */?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('training/learning_management'); */?></span>
                    </a>
                    <ul>
                        <li class="<?php /*if ($page_name == 'articles_materials') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/articles_materials">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('articles_materials'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'applications_learning') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/applications_learning">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('applications_learning'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'nomination_scheduling') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/nomination_scheduling">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('nomination_scheduling'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'training_enrollment') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/training_enrollment">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('training_enrollment'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'statistics_learning') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/statistics_learning">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('statistics_learning'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'reports_learning') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/reports_learning">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('reports_learning'); */?></span>
                            </a>
                        </li>
                        <li class="<?php /*if ($page_name == 'training_calendar') echo 'active'; */?> ">
                            <a href="<?php /*echo base_url(); */?>index.php?admin/training_calendar">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('training_calendar'); */?></span>
                            </a>
                        </li>
                    </ul>
                </li>-->
                <!--<li class="<?php
/*                    if (
                        $page_name == 'pay_head' ||
                        $page_name == 'employee_setup' ||
                        $page_name == 'employee_view' ||
                        $page_name == 'payroll_generate' ||
                        $page_name == 'payroll_approve' ||
                        $page_name == 'payroll_sheet_hr'
                    )
                        echo 'opened active';
                    */?> ">
                    <a href="#">
                        <i class="entypo-suitcase"></i>
                        <span><?php /*echo get_phrase('payroll_&_arrears'); */?></span>
                    </a>
                    <ul>
                        <li class="<?php
/*                        if (
                            $page_name == 'pay_head' ||
                            $page_name == 'employee_setup' ||
                            $page_name == 'employee_view'
                        )
                            echo 'opened active';
                        */?> ">
                            <a href="#">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('payroll_settings'); */?></span>
                            </a>
                            <ul>
                                <li class="<?php /*if ($page_name == 'pay_head') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/pay_head">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('pay_head'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'employee_setup') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/employee_setup">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('employee_setup'); */?></span>
                                    </a>
                                </li>
                                <li class="<?php /*if ($page_name == 'employee_view') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/employee_view">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('employee_view'); */?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php
/*                        if (
                            $page_name == 'payroll_generate'
                        )
                            echo 'opened active';
                        */?> ">
                            <a href="#">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('payroll_generate'); */?></span>
                            </a>
                            <ul>
                                <li class="<?php /*if ($page_name == 'payroll_generate') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/payroll_generate">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('payroll_generate'); */?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php
/*                        if ($page_name == 'payroll_approve')
                            echo 'opened active';
                        */?> ">
                            <a href="#">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('payroll_approve'); */?></span>
                            </a>
                            <ul>
                                <li class="<?php /*if ($page_name == 'payroll_approve') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/payroll_approve">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('payroll_approve'); */?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php
/*                        if (
                            $page_name == 'payroll_sheet_hr'
                        )
                            echo 'opened active';
                        */?> ">
                            <a href="#">
                                <span><i class="entypo-dot"></i> <?php /*echo get_phrase('report'); */?></span>
                            </a>
                            <ul>
                                <li class="<?php /*if ($page_name == 'payroll_sheet_hr') echo 'active'; */?> ">
                                    <a href="<?php /*echo base_url(); */?>index.php?admin/payroll_sheet_hr">
                                        <span><i class="entypo-dot"></i> <?php /*echo get_phrase('payroll_sheet_hr'); */?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>-->
            </ul>
        </li>

        <li class="<?php
        if (
            $page_name == 'add_product_type_store' ||
            $page_name == 'add_product_category_store' ||
            $page_name == 'add_product_store' ||
            $page_name == 'product_in_store' ||
            $page_name == 'product_out_store' ||
            $page_name == 'stock_info_store' ||
            $page_name == 'product_in_report_store' ||
            $page_name == 'product_out_report_store' ||
            $page_name == 'stock_information_store'
        )
            echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-suitcase"></i>
                <span><?php echo get_phrase('facility/asset_&_store_management_system'); ?></span>
            </a>
            <ul>
                <li class="<?php
                if (
                    $page_name == 'add_product_type_store' ||
                    $page_name == 'add_product_category_store' ||
                    $page_name == 'add_product_store'
                )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('store_setting'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'add_product_type_store') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/add_product_type_store">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('add_product_type'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'add_product_category_store') echo 'active'; ?> ">
                            <a href="<?php echo base_url();?>index.php?admin/add_product_category_store">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('add_product_category');?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'add_product_store') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/add_product_store">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('add_product'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'product_in_store' ||
                    $page_name == 'product_out_store' ||
                    $page_name == 'stock_info_store'
                )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('inventory'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'product_in_store') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/product_in_store">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('product_in'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'product_out_store') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/product_out_store">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('product_out'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'stock_info_store') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/stock_info_store">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('stock_information'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'product_in_report_store' ||
                    $page_name == 'product_out_report_store' ||
                    $page_name == 'stock_information_store'
                )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('inventory_report'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'product_in_report_store') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/product_in_report_store">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('product_in_report'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'product_out_report_store') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/product_out_report_store">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('product_out_report'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'stock_information_store') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/stock_information_store">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('stock_information'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'product_in_report' ||
                    $page_name == 'product_out_report' ||
                    $page_name == 'stock_information'
                )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('asset_management_system(AMS)'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'services_schedule_ams') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/services_schedule_ams">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('services_schedule'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'maintenance_records_ams') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/maintenance_records_ams">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('maintenance_records'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'product_in_report' ||
                    $page_name == 'product_out_report' ||
                    $page_name == 'stock_information'
                )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('facility_management_system'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'dashboard_fms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/dashboard_fms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('availability_of_computer_laboratory'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'configuration_fms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/configuration_fms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('availability_of_seminar_rooms'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'reports_fms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/reports_fms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('availability_meeting_rooms'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>


        <li style="display:none;" class="<?php
            if (
                $page_name == 'acd_session' ||
                $page_name == 'course' ||
                $page_name == 'batch' ||
                $page_name == 'sections' ||
                $page_name == 'subjects' ||
                $page_name == 'section_allocation' ||
                $page_name == 'subject_allocation' ||
                $page_name == 'event_management' ||
                $page_name == 'assignment' ||
                $page_name == 'student_attendance' ||
                $page_name == 'question_category' ||
                $page_name == 'questions' ||
                $page_name == 'online_test' ||
                $page_name == 'view_result'
            )
                echo 'opened active';
            ?> ">
            <a href="#">
                <i class="entypo-suitcase"></i>
                <span><?php echo get_phrase('academic'); ?></span>
            </a>
            <ul>
                <li class="<?php
                if ($page_name == 'acd_session' ||
                    $page_name == 'course' ||
                    $page_name == 'batch' ||
                    $page_name == 'sections' ||
                    $page_name == 'subjects' ||
                    $page_name == 'section_allocation' ||
                    $page_name == 'subject_allocation')
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('course_management'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'academic_year') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/academic_year">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('academic_year'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'course') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/course">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('course'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'batch') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/batch">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('batch'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'class_teacher_allocation') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/class_teacher_allocation">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('class_teacher_allocation'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'sections') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/sections">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('sections'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'subjects') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/subjects">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('subjects'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'assign_subjects') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/assign_subjects">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('assign_subjects'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'subject_allocation') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/subject_allocation">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('course_teacher_allocation'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'elective_subject') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/elective_subject">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('elective_subject'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'section_allocation') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/section_allocation">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('section_allocation'); ?></span>
                            </a>
                        </li>                        
                    </ul>
                </li>

                <li class="<?php
                    if ($page_name == 'event_management' ||
                        $page_name == 'assignment')
                        echo 'opened active';
                    ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('academic'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'event_management') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/event_management">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('event_management'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'assignment') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/assignment">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('assignment'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                if ($page_name == 'student_attendance')
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('student_attendance'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'student_attendance') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/student_attendance">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('student_attendance'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="<?php
                if ($page_name == 'question_category' ||
                    $page_name == 'questions' ||
                    $page_name == 'online_test' ||
                    $page_name == 'view_result')
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('online_test'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'question_category') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/question_category">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('question_category'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'questions') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/questions">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('questions'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'online_test') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/online_test">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('online_test'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'view_result') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/view_result">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('view_result'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        <!-- STUDENT -->
        <li style="display: none;" class="<?php
        if ($page_name == 'admission_category' ||
		        $page_name == 'add_student' ||
		        $page_name == 'manage_student' ||
                $page_name == 'student_status' ||
                $page_name == 'promote_student')
            echo 'opened active';
        ?> ">
            <a href="#">
                <i class="fa fa-group"></i>
                <span><?php echo get_phrase('students'); ?></span>
            </a>
            <ul>
                 <li class="<?php if ($page_name == 'admission_category') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/admission_category">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('admission_category'); ?></span>
                    </a>
                </li>
                 <li class="<?php if ($page_name == 'add_student') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/add_student">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('add_student'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'manage_student') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/manage_student">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('manage_student'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'student_status') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/student_status">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('student_status'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'promote_student') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/promote_student">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('promote_student'); ?></span>
                    </a>
                </li>
            </ul>
        </li>

        <li style="display:none;" class="<?php
        if ($page_name == 'exam_group' ||
            $page_name == 'grade_level' ||
            $page_name == 'result_summary')
            echo 'opened active';
        ?> ">
            <a href="#">
                <span><i class="entypo-suitcase"></i> <?php echo get_phrase('exam_management'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'exam_group') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/exam_group">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('exam_group'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'grade_level') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/grade_level">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('grade_level'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'result_summary') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/result_summary">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('result_summary'); ?></span>
                    </a>
                </li>
            </ul>
        </li>


        <li style="display:none;" class="<?php if ($page_name == 'payroll_accounts') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/payroll_accounts">
                <i class="entypo-doc-text-inv"></i>
                <span><?php echo get_phrase('payroll_accounts'); ?></span>
            </a>
        </li>


        <li style="display:none;" class="<?php
        if ($page_name == 'student_add' ||
                $page_name == 'acd_session' ||
                $page_name == 'online_admission' ||
                $page_name == 'student_bulk_add' ||
                $page_name == 'student_information' ||
                $page_name == 'student_marksheet')
            echo 'opened active has-sub';
        ?> ">
            <a href="#">
                <i class="fa fa-group"></i>
                <span><?php echo get_phrase('student'); ?></span>
            </a>
            <ul>
                <!-- STUDENT ADMISSION -->
                
                 <li class="<?php if ($page_name == 'acd_session') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/acd_session">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('academic_session'); ?></span>
                    </a>
                </li>
                
                   
                 <li class="<?php if ($page_name == 'online_admission') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/online_admission">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('online_admission'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'student_add') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/student_add">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('admit_student'); ?></span>
                    </a>
                </li>

                <!-- STUDENT BULK ADMISSION -->
                <li class="<?php if ($page_name == 'student_bulk_add') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/student_bulk_add">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('admit_bulk_student'); ?></span>
                    </a>
                </li>

                <!-- STUDENT INFORMATION -->
                <li class="<?php if ($page_name == 'student_information') echo 'opened active'; ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('student_information'); ?></span>
                    </a>
                    <ul>
                        <?php
                        $classes = $this->db->get('class')->result_array();
                        foreach ($classes as $row):
                            ?>
                            <li class="<?php if ($page_name == 'student_information' && $class_id == $row['class_id']) echo 'active'; ?>">
                                <a href="<?php echo base_url(); ?>index.php?admin/student_information/<?php echo $row['class_id']; ?>">
                                    <span><?php echo get_phrase('class'); ?> <?php echo $row['name']; ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>

                <!-- STUDENT MARKSHEET -->
                <li class="<?php if ($page_name == 'student_marksheet') echo 'opened active'; ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('student_marksheet'); ?></span>
                    </a>
                    <ul>
                        <?php
                        $classes = $this->db->get('class')->result_array();
                        foreach ($classes as $row):
                            ?>
                            <li class="<?php if ($page_name == 'student_marksheet' && $class_id == $row['class_id']) echo 'active'; ?>">
                                <a href="<?php echo base_url(); ?>index.php?admin/student_marksheet/<?php echo $row['class_id']; ?>">
                                    <span><?php echo get_phrase('class'); ?> <?php echo $row['name']; ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>
        </li>

        <!-- TEACHER -->
        <li style="display:none;" class="<?php if ($page_name == 'teacher') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/teacher">
                <i class="entypo-users"></i>
                <span><?php echo get_phrase('teacher'); ?></span>
            </a>
        </li>

        <!-- PARENTS -->
        <li style="display:none;" class="<?php if ($page_name == 'parent') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/parent">
                <i class="entypo-user"></i>
                <span><?php echo get_phrase('parents'); ?></span>
            </a>
        </li>
        <li style="display:none;" class="<?php
        if ($page_name == 'class' ||
            $page_name == 'section')
            echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-flow-tree"></i>
                <span><?php echo get_phrase('class'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'class') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/classes">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('manage_classes'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'section') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/section">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('manage_sections'); ?></span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- SUBJECT -->
        <li style="display: none;" class="<?php if ($page_name == 'subject') echo 'opened active'; ?> ">
            <a href="#">
                <i class="entypo-docs"></i>
                <span><?php echo get_phrase('subject'); ?></span>
            </a>
            <ul>
                <?php
                $classes = $this->db->get('class')->result_array();
                foreach ($classes as $row):
                    ?>
                    <li class="<?php if ($page_name == 'subject' && $class_id == $row['class_id']) echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>index.php?admin/subject/<?php echo $row['class_id']; ?>">
                            <span><?php echo get_phrase('class'); ?> <?php echo $row['name']; ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>

        <!-- CLASS ROUTINE -->
        <!--<li class="<?php /*if ($page_name == 'class_routine') echo 'active'; */?> ">
            <a href="<?php /*echo base_url(); */?>index.php?admin/class_routine">
                <i class="entypo-target"></i>
                <span><?php /*echo get_phrase('class_routine'); */?></span>
            </a>
        </li>
        -->
        <!-- DAILY ATTENDANCE -->
        <li style="display:none;" class="<?php if ($page_name == 'manage_attendance') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/manage_attendance/<?php echo date("d/m/Y"); ?>">
                <i class="entypo-chart-area"></i>
                <span><?php echo get_phrase('daily_attendance'); ?></span>
            </a>

        </li>

        <!-- EXAMS -->
        <li style="display:none;" class="<?php
        if ($page_name == 'exam' ||
                $page_name == 'grade' ||
                $page_name == 'marks' ||
                    $page_name == 'exam_marks_sms')
                        echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-graduation-cap"></i>
                <span><?php echo get_phrase('exam'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'exam') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/exam">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('exam_list'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'grade') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/grade">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('exam_grades'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'marks') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/marks">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('manage_marks'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'exam_marks_sms') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/exam_marks_sms">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('send_marks_by_sms'); ?></span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- PAYMENT -->
        <li style="display:none;" class="<?php if ($page_name == 'invoice') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/invoice">
                <i class="entypo-credit-card"></i>
                <span><?php echo get_phrase('payment'); ?></span>
            </a>
        </li>

        <!-- ACCOUNTING -->
        <li style="display:none;" class="<?php
        if ($page_name == 'income' ||
                $page_name == 'expense' ||
                    $page_name == 'expense_category')
                        echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-suitcase"></i>
                <span><?php echo get_phrase('accounting'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'income') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/income">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('income'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'expense') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/expense">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('expense'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'expense_category') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/expense_category">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('expense_category'); ?></span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- LIBRARY -->
        

        <!-- TRANSPORT -->
        <li style="display:none;" class="<?php if ($page_name == 'transport') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/transport">
                <i class="entypo-location"></i>
                <span><?php echo get_phrase('transport'); ?></span>
            </a>
        </li>


        
        <!-- DORMITORY -->
        <li style="display:none;" class="<?php if ($page_name == 'dormitory') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/dormitory">
                <i class="entypo-home"></i>
                <span><?php echo get_phrase('dormitory'); ?></span>
            </a>
        </li>

        <!-- NOTICEBOARD -->

        <li style="display:none;" class="<?php if ($page_name == 'store_management') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/store_management">
                <i class="entypo-doc-text-inv"></i>
                <span><?php echo get_phrase('store_management'); ?></span>
            </a>
        </li>

        <li class="<?php
        if (
            $page_name == 'instruction_research' ||
            $page_name == 'application_research' ||
            $page_name == 'statistics_reports_research' ||
            $page_name == 'instruction_assistant' ||
            $page_name == 'application_assistant' ||
            $page_name == 'statistics_reports_assistant' ||
            $page_name == 'instruction_seminar' ||
            $page_name == 'application_seminar' ||
            $page_name == 'statistics_reports_seminar'
        )
            echo 'opened active';
        ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/message">
                <i class="entypo-mail"></i>
                <span><?php echo get_phrase('conference/research_management_system'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'dashboard_research') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/dashboard_research">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('dashboard'); ?></span>
                    </a>
                </li>
                <li class="<?php
                    if ($page_name == 'instruction_research' ||
                        $page_name == 'application_research' ||
                        $page_name == 'statistics_reports_research'
                    )
                        echo 'opened active';
                    ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/announcement_of_research_grants">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('announcement_of_research_grants'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'instruction_research') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/instruction_research">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('instruction'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'application_research') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/application_research">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('application'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'application_research') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/application_research">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('awarding_process'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'application_research') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/application_research">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('management_and_monitoring'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'statistics_reports_research') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/statistics_reports_research">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('statistics_and_reports'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                if (
                    $page_name == 'instruction_assistant' ||
                    $page_name == 'application_assistant' ||
                    $page_name == 'statistics_reports_assistant'
                )
                    echo 'opened active';
                ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/announcement_of_research_assistant">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('announcement_of_research_assistant'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'instruction_assistant') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/instruction_assistant">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('instruction'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'application_assistant') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/application_assistant">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('application'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'application_research') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/application_research">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('awarding_process'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'application_research') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/application_research">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('management_and_monitoring'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'statistics_reports_assistant') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/statistics_reports_assistant">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('statistics_and_reports'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php
                if ($page_name == 'instruction_seminar' ||
                    $page_name == 'application_seminar' ||
                    $page_name == 'statistics_reports_seminar'
                )
                    echo 'opened active';
                ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/announcement_of_conference_seminar">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('announcement_of_conference_seminar'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'instruction_seminar') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/instruction_seminar">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('instruction'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'application_seminar') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/application_seminar">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('application'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'application_research') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/application_research">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('awarding_process'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'application_research') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/application_research">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('management_and_monitoring'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'statistics_reports_seminar') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/statistics_reports_seminar">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('statistics_and_reports'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="<?php
            if ($page_name == 'students_mis' ||
                $page_name == 'teaching_mis' ||
                $page_name == 'examination_mis' ||
                $page_name == 'examination_information_id' ||
                $page_name == 'human_resource_mis' ||
                $page_name == 'finance_mis'
                )
                echo 'opened active';
            ?>">
            <a href="<?php echo base_url(); ?>index.php?admin/message">
                <i class="entypo-mail"></i>
                <span><?php echo get_phrase('management_information_system'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'students_mis') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/students_mis">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('student_information'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'teaching_mis') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/teaching_mis">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('teaching_information'); ?></span>
                    </a>
                </li>
                <li class="<?php
                if ($page_name == 'examination_mis' ||
                    $page_name == 'examination_information_id'
                )
                    echo 'opened active';
                ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/examination_mis">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('examination_information'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'examination_mis') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/examination_mis">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('examination_information'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'examination_information_id') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/examination_information_id">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('student_id'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php if ($page_name == 'human_resource_mis') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/human_resource_mis">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('human_resource_information'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'finance_mis') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/finance_mis">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('financial_information'); ?></span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- SETTINGS -->
        <li style="display:none;" class="<?php
        if ($page_name == 'system_settings' ||
                $page_name == 'manage_language' ||
                    $page_name == 'sms_settings')
                        echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-lifebuoy"></i>
                <span><?php echo get_phrase('settings'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'system_settings') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/system_settings">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('general_settings'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'sms_settings') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/sms_settings">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('sms_settings'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'manage_language') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/manage_language">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('language_settings'); ?></span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/manage_profile">
                <i class="entypo-lock"></i>
                <span><?php echo get_phrase('my_account'); ?></span>
            </a>
        </li>
        <li class="<?php
        if (
            $page_name == 'add_product_type' ||
            $page_name == 'add_product_category' ||
            $page_name == 'add_product' ||
            $page_name == 'product_in' ||
            $page_name == 'product_out' ||
            $page_name == 'stock_info' ||
            $page_name == 'product_in_report' ||
            $page_name == 'product_out_report' ||
            $page_name == 'stock_information' ||
            $page_name == 'lib_add_category' ||
            $page_name == 'lib_add_books' ||
            $page_name == 'lib_issue_book' ||
            $page_name == 'lib_request_details' ||
            $page_name == 'lib_book_return' ||
            $page_name == 'lib_reports'
        )
            echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-suitcase"></i>
                <span><?php echo get_phrase('library_management_system'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'lib_add_category') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/lib_add_category">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('add_category'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'lib_add_books') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/lib_add_books">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('add_books'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'lib_issue_book') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/lib_issue_book">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('issue_book'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'lib_request_details') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/lib_request_details">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('request_details'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'lib_book_return') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/lib_book_return">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('book_return'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'lib_reports') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/lib_reports">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('reports'); ?></span>
                    </a>
                </li>
                <li style="display:none;" class="<?php
                if (
                    $page_name == 'add_product_type' ||
                    $page_name == 'add_product_category' ||
                    $page_name == 'add_product'
                )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('library_services'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'libraries') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/libraries">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('libraries'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'finding_the_library') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/finding_the_library">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('finding_the_library'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'library_hours') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/library_hours">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('library_hours'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'library_workshops') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/library_workshops">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('library_workshops'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'study_rooms') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/study_rooms">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('study_rooms'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'borrowing_renewing') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/borrowing_renewing">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('borrowing_renewing'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'computers_printing') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/computers_printing">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('computers_printing'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'ask_a_librarian') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/ask_a_librarian">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('ask_a_librarian'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li style="display:none;" class="<?php
                if (
                    $page_name == 'product_in' ||
                    $page_name == 'product_out' ||
                    $page_name == 'stock_info'
                )
                    echo 'opened active';
                ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('faculty_resources'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'training_guidelines') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/training_guidelines">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('training_guidelines'); ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'faculty_resources') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/faculty_resources">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('faculty_resources'); ?></span>
                            </a>
                            <ul>
                                <li class="<?php if ($page_name == 'books_management') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/books_management">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('books_management'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'training_materials') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/training_materials">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('training_materials'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'higher_education_materials') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/higher_education_materials">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('higher_education_materials'); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php if ($page_name == 'training_support') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/training_support">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('training_support'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li style="display:none;" class="<?php if ($page_name == 'equipment_library') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/equipment_library">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('equipment_library'); ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'inventory_report_library') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/inventory_report_library">
                                <span><i class="entypo-dot"></i> <?php echo get_phrase('inventory_report_library'); ?></span>
                            </a>
                            <ul>
                                <li class="<?php if ($page_name == 'product_in_report_library') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/product_in_report_library">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('product_in_report_library'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'product_out_report_library') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/product_out_report_library">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('product_out_report_library'); ?></span>
                                    </a>
                                </li>
                                <li class="<?php if ($page_name == 'stock_information_library') echo 'active'; ?> ">
                                    <a href="<?php echo base_url(); ?>index.php?admin/stock_information_library">
                                        <span><i class="entypo-dot"></i> <?php echo get_phrase('stock_information_library'); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="<?php
        if ($page_name == 'transport' ||
            $page_name == 'vehicles')
            echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-suitcase"></i>
                <span><?php echo get_phrase('transport'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'transport') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/transport">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('transport'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'vehicles') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/vehicles">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('vehicles'); ?></span>
                    </a>
                </li>
            </ul>
        </li>
        <li style="display:;" class="<?php if ($page_name == 'noticeboard') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/noticeboard">
                <i class="entypo-doc-text-inv"></i>
                <span><?php echo get_phrase('noticeboard'); ?></span>
            </a>
        </li>
    </ul>

</div>