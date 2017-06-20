
function abc()
{
    var n=document.getElementById("name").value;
    var e=document.getElementById("email").value;
    var a=e.indexOf('@');
    var d=e.lastIndexOf('.');
    var l=e.length;
    var p=document.getElementById("phone").value;
    var r=document.getElementById("requirment").value;
    if(n=="")
    {
        document.getElementById("name_error_msg").innerHTML="You can't leave this empty.";

    }
    if(e=="" || a<1 || d>l-3 || d-a<3)
    {
        document.getElementById("email_error_msg").innerHTML="invalid Email !";

    }
    if(p=="")
    {
        document.getElementById("phone_error_msg").innerHTML="Phone number must be At-least 11 digits !"

    }
    if(r=="")
    {
        document.getElementById("req_error_msg").innerHTML="You can't leave this empty.";
        return false;
    }
    else
    {
        alert("Congratulations"+" "+ n +" "+"Message Sent Successfully");
    }
}



function erase()
{
        document.getElementById("name_error_msg").innerHTML="";
};

function erase1()
{
    document.getElementById("email_error_msg").innerHTML="";
}

function erase2()
{
    document.getElementById("phone_error_msg").innerHTML="";
}

function erase3()
{
    document.getElementById("req_error_msg").innerHTML="";
}




function regform()
{
   var org_name=document.getElementById("org_name").value;
   var course_name=document.getElementById("course_name").value;
   var training_venue=document.getElementById("training_venue").value;
   var Residential=document.getElementById("Residential").checked;
   var Non_Residential=document.getElementById("Non_Residential").checked;
   var applicant_name=document.getElementById("applicant_name").value;
   var employment_status_yes=document.getElementById("employment_status_yes").checked;
   var employment_status_no=document.getElementById("employment_status_no").checked;
   var fathers_name=document.getElementById("fathers_name").value;
   var fathers_occupation=document.getElementById("fathers_occupation").value;
   var mothers_name=document.getElementById("mothers_name").value;
   var mothers_occupation=document.getElementById("mothers_occupation").value;
   var nid_no=document.getElementById("nid_no").value;
   var birth_date=document.getElementById("birth_date").value;
   var male=document.getElementById("male").checked;
   var female=document.getElementById("female").checked;
   var mobile_no=document.getElementById("mobile_no").value;
   var email=document.getElementById("email").value;
   var atindex=email.indexOf('@');
   var dotindex=email.lastIndexOf(".");
   var emaillength=email.length;
   var present_village_name=document.getElementById("present_village_name").value;
   var present_post_office=document.getElementById("present_post_office").value;
   var present_post_code=document.getElementById("present_post_code").value;
   var present_police_station=document.getElementById("present_police_station").value;
   var present_district=document.getElementById("present_district").value;
   var present_address_division=document.getElementById("present_address_division").value;
   var parmanent_village_name=document.getElementById("parmanent_village_name").value;
   var parmanent_post_office=document.getElementById("parmanent_post_office").value;
   var parmanent_post_code=document.getElementById("parmanent_post_code").value;
   var parmanent_police_station=document.getElementById("parmanent_police_station").value;
   var parmanent_district=document.getElementById("parmanent_district").value;
   var parmanent_address_division=document.getElementById("parmanent_address_division").value;
   var exam_name_1=document.getElementById("exam_name_1").value;
   var institute_name_1=document.getElementById("institute_name_1").value;
   var result_exam_1=document.getElementById("result_exam_1").value;
   var board_exam_1=document.getElementById("board_exam_1").value;
   var pass_year_exam_1=document.getElementById("pass_year_exam_1").value;
   var exam_name_2=document.getElementById("exam_name_2").value;
   var result_exam_2=document.getElementById("result_exam_2").value;
   var institute_name_exam_2=document.getElementById("institute_name_exam_2").value;
   var board_exam_2=document.getElementById("board_exam_2").value;
   var pass_year_exam_2=document.getElementById("pass_year_exam_2").value;
   var religion=document.getElementById("religion").value;
   var nationality=document.getElementById("nationality").value;
   var country=document.getElementById("country").value;
   var monthly_income=document.getElementById("monthly_income").value;
   var yearly_income=document.getElementById("yearly_income").value;


   if(org_name=="")
   {
       document.getElementById("org_name_error").innerHTML="Select the Organization!";

   }
   if(course_name=="")
   {
       document.getElementById("course_name_error").innerHTML="Select the Course Name!";

   }

   if(training_venue=="")
   {
       document.getElementById("training_venue_error").innerHTML="Select the training venue!";

   }

    if(Residential==false && Non_Residential==false)
    {
        document.getElementById("accommodation_error").innerHTML="Select the accommodation!";

    }
    if(applicant_name=="")
    {
            document.getElementById("applicant_name_error").innerHTML="You can't leave this empty.";

    }

    if(employment_status_yes==false && employment_status_no==false)
    {
        document.getElementById("employment_status_error").innerHTML="Please Select the Employment Status!";

    }
    if(fathers_name=="")
    {
         document.getElementById("fathers_name_error").innerHTML="You can't leave this empty.";

    }
    if(fathers_occupation=="")
    {
        document.getElementById("fathers_occupation_error").innerHTML="You can't leave this empty.";

    }
    if(mothers_name=="")
    {
        document.getElementById("mothers_name_error").innerHTML="You can't leave this empty.";

    }
    if(mothers_occupation=="")
    {
        document.getElementById("mothers_occupation_error").innerHTML="You can't leave this empty.";

    }
    if(nid_no=="")
    {
        document.getElementById("nid_error").innerHTML="You can't leave this empty.";

    }
    if(birth_date=="")
    {
        document.getElementById("birth_date_error").innerHTML="You can't leave this empty.";

    }
    if(male==false && female==false)
    {
        document.getElementById("gender_error").innerHTML="Please Select Your Gender!";

    }
    if(mobile_no=="")
    {
        document.getElementById("mobile_no_error").innerHTML="You can't leave this empty.";

    }
    if(email=="")
    {
        document.getElementById("email_error").innerHTML="You can't leave this empty.";

    }
    if(atindex<1 || dotindex>emaillength-3 )
    {
        document.getElementById("email_error").innerHTML="Invalid Email !";

    }
    if(present_village_name=="")
    {
        document.getElementById("present_village_name_error").innerHTML="You can't leave this empty.";

    }
    if(present_post_office=="")
    {
        document.getElementById("present_post_office_error").innerHTML="You can't leave this empty.";

    }
    if(present_post_code=="")
    {
        document.getElementById("present_post_code_error").innerHTML="You can't leave this empty.";

    }
    if(present_police_station=="")
    {
        document.getElementById("present_police_station_error").innerHTML="You can't leave this empty.";

    }
    if(present_district=="")
    {
        document.getElementById("present_district_error").innerHTML="You can't leave this empty.";

    }
     if(present_address_division=="")
    {
        document.getElementById("present_address_division_error").innerHTML="You can't leave this empty.";

    }
    if(parmanent_village_name=="")
    {
        document.getElementById("parmanent_village_name_error").innerHTML="You can't leave this empty.";

    }
    if(parmanent_post_office=="")
    {
        document.getElementById("parmanent_post_office_error").innerHTML="You can't leave this empty.";

    }
    if(parmanent_post_code=="")
    {
        document.getElementById("parmanent_post_code_error").innerHTML="You can't leave this empty.";

    }
    if(parmanent_police_station=="")
    {
        document.getElementById("parmanent_police_station_error").innerHTML="You can't leave this empty.";

    }
    if(parmanent_district=="")
    {
        document.getElementById("parmanent_district_error").innerHTML="You can't leave this empty.";

    }
     if(parmanent_address_division=="")
    {
        document.getElementById("parmanent_address_division_error").innerHTML="You can't leave this empty.";

    }
      if(exam_name_1=="")
    {
        document.getElementById("exam_name_1_error").innerHTML="You can't leave this empty.";

    }
      if(institute_name_1=="")
    {
        document.getElementById("institute_name_1_error").innerHTML="You can't leave this empty.";

    }
      if(result_exam_1=="")
    {
        document.getElementById("result_exam_1_error").innerHTML="You can't leave this empty.";

    }
        if(board_exam_1=="")
    {
        document.getElementById("board_exam_1_error").innerHTML="You can't leave this empty.";

    }
    if(pass_year_exam_1=="")
    {
        document.getElementById("pass_year_exam_1_error").innerHTML="You can't leave this empty.";

    }
    if(exam_name_2=="")
    {
        document.getElementById("exam_name_2_error").innerHTML="You can't leave this empty.";

    }
    if(result_exam_2=="")
    {
        document.getElementById("result_exam_2_error").innerHTML="You can't leave this empty.";

    }
    if(institute_name_exam_2=="")
    {
        document.getElementById("institute_name_exam_2_error").innerHTML="You can't leave this empty.";

    }
     if(board_exam_2=="")
    {
        document.getElementById("board_exam_2_error").innerHTML="You can't leave this empty.";

    }
     if(pass_year_exam_2=="")
    {
        document.getElementById("pass_year_exam_2_error").innerHTML="You can't leave this empty.";

    }
     if(religion=="")
    {
        document.getElementById("religion_error").innerHTML="You can't leave this empty.";

    }
     if(nationality=="")
    {
        document.getElementById("nationality_error").innerHTML="You can't leave this empty.";

    }
     if(country=="")
    {
        document.getElementById("country_error").innerHTML="You can't leave this empty.";

    }
     if(monthly_income=="")
    {
        document.getElementById("monthly_income_error").innerHTML="You can't leave this empty.";

    }

     if(yearly_income=="")
    {
        document.getElementById("yearly_income_error").innerHTML="You can't leave this empty.";
        return false
    }

}

function erase_org_name()
{
    document.getElementById("org_name_error").innerHTML="";
}

function erase_course_name()
{
    document.getElementById("course_name_error").innerHTML="";
}

function erase_training_venue_error()
{
    document.getElementById("training_venue_error").innerHTML="";
}

function erase_accommodation_error()
{
    document.getElementById("accommodation_error").innerHTML="";
}

function erase_applicant_name_error()
{
    document.getElementById("applicant_name_error").innerHTML="";
}

function erase_employment_status_error()
{
    document.getElementById("employment_status_error").innerHTML="";
}

function erase_fathers_name_error()
{
    document.getElementById("fathers_name_error").innerHTML="";
}

function erase_fathers_occupation_error()
{
    document.getElementById("fathers_occupation_error").innerHTML="";
}
function erase_mothers_name_error()
{
    document.getElementById("mothers_name_error").innerHTML="";
}

function erase_mothers_occupation_error()
{
    document.getElementById("mothers_occupation_error").innerHTML="";
}

function erase_nid_error()
{
    document.getElementById("nid_error").innerHTML="";
}

function erase_birth_date_error()
{
    document.getElementById("birth_date_error").innerHTML="";
}
function erase_gender_error()
{
    document.getElementById("gender_error").innerHTML="";
}
function erase_mobile_no_error()
{
    document.getElementById("mobile_no_error").innerHTML="";
}
function erase_email_error()
{
    document.getElementById("email_error").innerHTML="";
}
function erase_present_village_name_error()
{
    document.getElementById("present_village_name_error").innerHTML="";
}
function erase_present_post_office_error()
{
    document.getElementById("present_post_office_error").innerHTML="";
}
function erase_present_post_code_error()
{
    document.getElementById("present_post_code_error").innerHTML="";
}
function erase_present_police_station_error()
{
    document.getElementById("present_police_station_error").innerHTML="";
}
function erase_present_district_error()
{
    document.getElementById("present_district_error").innerHTML="";
}
function erase_present_address_division_error()
{
    document.getElementById("present_address_division_error").innerHTML="";
}


function erase_parmanent_village_name_error()
{
    document.getElementById("parmanent_village_name_error").innerHTML="";
}
function erase_parmanent_post_office_error()
{
    document.getElementById("parmanent_post_office_error").innerHTML="";
}
function erase_parmanent_post_code_error()
{
    document.getElementById("parmanent_post_code_error").innerHTML="";
}
function erase_parmanent_police_station_error()
{
    document.getElementById("parmanent_police_station_error").innerHTML="";
}
function erase_parmanent_district_error()
{
    document.getElementById("parmanent_district_error").innerHTML="";
}
function erase_parmanent_address_division_error()
{
    document.getElementById("parmanent_address_division_error").innerHTML="";
}
function erase_exam_name_1()
{
    document.getElementById("exam_name_1_error").innerHTML="";
}
function erase_institute_name_1_error()
{
    document.getElementById("institute_name_1_error").innerHTML="";
}
function erase_result_exam_1_error()
{
    document.getElementById("result_exam_1_error").innerHTML="";
}
function erase_board_exam_1_error()
{
    document.getElementById("board_exam_1_error").innerHTML="";
}
function erase_pass_year_exam_1_error()
{
    document.getElementById("pass_year_exam_1_error").innerHTML="";
}
function erase_exam_name_2_error()
{
    document.getElementById("exam_name_2_error").innerHTML="";
}
function erase_result_exam_2_error()
{
    document.getElementById("exam_name_2_error").innerHTML="";
}
function erase_institute_name_exam_2_error()
{
    document.getElementById("institute_name_exam_2_error").innerHTML="";
}
function erase_board_exam_2_error()
{
    document.getElementById("board_exam_2_error").innerHTML="";
}
function erase_pass_year_exam_2_error()
{
    document.getElementById("pass_year_exam_2_error").innerHTML="";
}
function erase_religion_error()
{
    document.getElementById("religion_error").innerHTML="";
}
function erase_nationality_error()
{
    document.getElementById("nationality_error").innerHTML="";
}
function erase_country_error()
{
    document.getElementById("country_error").innerHTML="";
}
function erase_monthly_income_error()
{
    document.getElementById("monthly_income_error").innerHTML="";
}
function erase_yearly_income_error()
{
    document.getElementById("yearly_income_error").innerHTML="";
}