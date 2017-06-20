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

    <div style="border-top:1px solid rgba(69, 74, 84, 0.7);"></div>	
    <ul id="main-menu" class="">
        <li class="<?php if ($page_name == 'dashboard') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/dashboard">
                <i class="entypo-lock"></i>
                <span><?php echo get_phrase('dashboard'); ?></span>
            </a>
        </li>
        <li class="<?php if ($page_name == 'manage_profile_new') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/manage_profile_new">
                <i class="entypo-lock"></i>
                <span><?php echo get_phrase('profile'); ?></span>
            </a>
        </li>
        <li class="<?php if ($page_name == 'class_routine_pundro') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/class_routine_pundro">
                <i class="entypo-lock"></i>
                <span><?php echo get_phrase('class_routine'); ?></span>
            </a>
        </li>
        <li class="<?php if ($page_name == 'student_syllabus') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/student_syllabus">
                <i class="entypo-lock"></i>
                <span><?php echo get_phrase('syllabus'); ?></span>
            </a>
        </li>
        <li class="<?php if ($page_name == 'student_courses') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/student_courses">
                <i class="entypo-lock"></i>
                <span><?php echo get_phrase('courses'); ?></span>
            </a>
        </li>
        <li class="<?php if ($page_name == 'student_dues') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/student_dues">
                <i class="entypo-lock"></i>
                <span><?php echo get_phrase('finance'); ?></span>
            </a>
        </li>
        <li class="<?php if ($page_name == 'semester_details') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/semester_details">
                <i class="entypo-lock"></i>
                <span><?php echo get_phrase('semester_duration'); ?></span>
            </a>
        </li>
    </ul>
</div>