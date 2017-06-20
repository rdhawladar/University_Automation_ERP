<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*	
 *	@author 	: Noor-e Alam
 *	date		: June, 2016
 *	TMSS
 *	webmaster.noor@gmail.com
 */

class Admin extends CI_Controller
{
    
    
	function __construct()
	{
		parent::__construct();
		$this->load->database();
        $this->load->library('session','upload');
        //$this->load->library('upload');
        $this->load->helper(array('form', 'url'));
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    
    /***default functin, redirects to login page if no admin logged in yet***/
    public function testing($param1=''){
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'add') {
            $data12['test']         = $this->input->post('test');
            //exit();
            $this->db->insert('testing', $data12);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/testing/', 'refresh');
        }
        if($param1 == 'edit'){
            $this->db->where('id',$row['id']);
            $temp['temp'] = $this->db->get('testing')->result_array();
        }
        $page_data['page_name']  = 'testing';
        $page_data['page_title'] = get_phrase('testing_class');
        $this->load->view('backend/index', $page_data);
    }
    public function index()
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($this->session->userdata('admin_login') == 1)
            redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
    }
    
    /***ADMIN DASHBOARD***/
    function dashboard()
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = get_phrase('admin_dashboard');
        $this->load->view('backend/index', $page_data);
    }
    
    
    /****MANAGE STUDENTS CLASSWISE*****/
	function student_add()
	{
		if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
			
		$page_data['page_name']  = 'student_add';
		$page_data['page_title'] = get_phrase('add_student');
		$this->load->view('backend/index', $page_data);
	}
	
	
	    /****MANAGE Academic Session*****/
	
	function acd_session($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']         = $this->input->post('name');
			$data['strt_dt'] = date('Y-m-d',strtotime($this->input->post('strt_dt')));
            $data['end_dt'] = date('Y-m-d',strtotime($this->input->post('end_dt')));
            $data['is_open']   = $this->input->post('is_open');
            $this->db->insert('acd_session', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/acd_session/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']         = $this->input->post('name');
          	$data['strt_dt'] = date('Y-m-d',strtotime($this->input->post('strt_dt')));
            $data['end_dt'] = date('Y-m-d',strtotime($this->input->post('end_dt')));
            $data['is_open']   = $this->input->post('is_open');
            
            $this->db->where('id', $param2);
            $this->db->update('acd_session', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/acd_session/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('acd_session', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('acd_session');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/acd_session/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('acd_session')->result_array();
        $page_data['page_name']  = 'acd_session';
		$page_data['page_title'] = get_phrase('academic_session');
        $this->load->view('backend/index', $page_data);
    }
    function online_admission_details($param1 = '', $param2 = '', $param3 = ''){
        if ($param1 == 'details') {
            $page_data['page_name']  = 'details';
            $page_data['page_title'] = get_phrase('details');
            $this->load->view('backend/index', $page_data);
            //redirect(base_url() . 'index.php?admin/online_admission/details', 'refresh');
        }
    }
    /*function migration($param1 = '', $param2 = '', $param3 = ''){
        if ($param1 == 'details') {
            $page_data['page_name']  = 'details';
            $page_data['page_title'] = get_phrase('migration');
            $this->load->view('backend/index', $page_data);
        }
    }*/
    function migration($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'do_update') {

            $data['register_number']             = $this->input->post('register_number');
            $data['student_status']             = $this->input->post('student_status');
            //$this->db->where('register_number', $param2);
            //$this->db->update('student', $data);
            if($data['student_status'] == "1"){
                $data['register_number']             = $this->input->post('register_number');
                $this->db->insert('student', $data);
                $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
                redirect(base_url() . 'index.php?admin/migration/', 'refresh');
            }
            else if($data['student_status'] == "0"){
                redirect(base_url() . 'index.php?admin/migration/', 'refresh');
            }
            /*$this->db->insert('student', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/migration/', 'refresh');*/
        } else if ($param1 == 'personal_profile') {
            $page_data['personal_profile']   = true;
            $page_data['current_teacher_id'] = $param2;
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('student', array(
                'student_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('osad_student');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/migration/', 'refresh');
        }

        $page_data['osadStudent']    = $this->db->get('osad_student_12')->result_array();
        $page_data['page_name']  = 'migration';
        $page_data['page_title'] = get_phrase('migration_from_applicants_to_students');
        $this->load->view('backend/index', $page_data);
    }
	  /****MANAGE ONLINE ADMISSION*****/
    function pundro_candidates($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'listed_candidates') {
            $ttemppa =  $this->uri->segment(4);
            //exit();

            $student12 = "0";
            $this->db->where('EmailNotify', $ttemppa);
            //$asq = $this->db->get('applicants_details')->result_array();

            $this->db->where('CandidateStudent', $student12);
            $this->db->order_by('NameofProgram ASC');
            $page_data['osadStudent']    = $this->db->get('applicants_details')->result_array();
            //exit();
            $page_data['page_name']  = 'shortlisted_canddates';
            $page_data['page_title'] = get_phrase('shortlisted_candidates');
            $this->load->view('backend/index', $page_data);
            //exit();
        }
        if ($param1 == 'rejected_canddates') {
            $ttemppa =  $this->uri->segment(4);
            //exit();

            $student12 = "0";
            $this->db->where('EmailNotify', $ttemppa);
            //$asq = $this->db->get('applicants_details')->result_array();

            $this->db->where('CandidateStudent', $student12);
            $this->db->order_by('NameofProgram ASC');
            $page_data['osadStudent']    = $this->db->get('applicants_details')->result_array();
            //exit();
            $page_data['page_name']  = 'rejectlisted_canddates';
            $page_data['page_title'] = get_phrase('rejected_candidates');
            $this->load->view('backend/index', $page_data);
            //exit();
        }
    }
    function reports_pundro($param1 = '', $param2 = '', $param3 = '')
     {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
            $page_data['page_name']  = 'reports_pundro';
            $page_data['page_title'] = get_phrase('reports');
            $this->load->view('backend/index', $page_data);
    }
    function online_admission_preview($param1 = '', $param2 = '', $param3 = ''){
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        //$this->load->library('image_lib');
        if ($param1 == 'preview') {
            if ($this->session->userdata('admin_login') != 1)
                redirect(base_url(), 'refresh');
            if(
                $_FILES['NationalIDApplicant']['name'] ||
                $_FILES['PassportApplicant']['name'] ||
                $_FILES['DrivingLicenceApplicant']['name'] ||
                $_FILES['PhotoApplicant']['name'] ||
                $_FILES['CertificateDocumentscert1']['name'] ||
                $_FILES['CertificateDocumentsmark1']['name'] ||
                $_FILES['CertificateDocumentscert2']['name'] ||
                $_FILES['CertificateDocumentsmark2']['name'] ||
                $_FILES['CertificateDocumentscert3']['name'] ||
                $_FILES['CertificateDocumentsmark3']['name'] ||
                $_FILES['CertificateDocumentscert4']['name'] ||
                $_FILES['CertificateDocumentsmark4']['name']||
                $_FILES['EmploymentDocuments1']['name'] ||
                $_FILES['EmploymentDocuments2']['name'] ||
                $_FILES['SignatureApplicant']['name']
            ) {
                $uploaddir = './uploads/student_image/';
                $PhotoApplicant = $uploaddir . basename($_FILES['PhotoApplicant']['name']);
                $CertificateDocumentscert1 = $uploaddir . basename($_FILES['CertificateDocumentscert1']['name']);
                $CertificateDocumentsmark1 = $uploaddir . basename($_FILES['CertificateDocumentsmark1']['name']);
                $CertificateDocumentscert2 = $uploaddir . basename($_FILES['CertificateDocumentscert2']['name']);
                $CertificateDocumentsmark2 = $uploaddir . basename($_FILES['CertificateDocumentsmark2']['name']);
                $CertificateDocumentscert3 = $uploaddir . basename($_FILES['CertificateDocumentscert2']['name']);
                $CertificateDocumentsmark3 = $uploaddir . basename($_FILES['CertificateDocumentsmark2']['name']);
                $CertificateDocumentscert4 = $uploaddir . basename($_FILES['CertificateDocumentscert2']['name']);
                $CertificateDocumentsmark4 = $uploaddir . basename($_FILES['CertificateDocumentsmark2']['name']);
                $EmploymentDocuments1 = $uploaddir . basename($_FILES['EmploymentDocuments1']['name']);
                $EmploymentDocuments2 = $uploaddir . basename($_FILES['EmploymentDocuments2']['name']);
                $SignatureApplicant = $uploaddir . basename($_FILES['SignatureApplicant']['name']);
                $NationalIDApplicant = $uploaddir . basename($_FILES['NationalIDApplicant']['name']);
                $PassportApplicant = $uploaddir . basename($_FILES['PassportApplicant']['name']);
                $DrivingLicenceApplicant = $uploaddir . basename($_FILES['DrivingLicenceApplicant']['name']);

                if (move_uploaded_file($_FILES['PhotoApplicant']['tmp_name'], $PhotoApplicant)) {
                } else {
                }
                if (move_uploaded_file($_FILES['CertificateDocumentscert1']['tmp_name'], $CertificateDocumentscert1)) {
                } else {
                }
                if (move_uploaded_file($_FILES['CertificateDocumentsmark1']['tmp_name'], $CertificateDocumentsmark1)) {
                } else {
                }
                if (move_uploaded_file($_FILES['CertificateDocumentscert2']['tmp_name'], $CertificateDocumentscert2)) {
                } else {
                }
                if (move_uploaded_file($_FILES['CertificateDocumentsmark2']['tmp_name'], $CertificateDocumentsmark2)) {
                } else {
                }
                if (move_uploaded_file($_FILES['CertificateDocumentscert3']['tmp_name'], $CertificateDocumentscert2)) {
                } else {
                }
                if (move_uploaded_file($_FILES['CertificateDocumentsmark3']['tmp_name'], $CertificateDocumentsmark2)) {
                } else {
                }
                if (move_uploaded_file($_FILES['CertificateDocumentscert4']['tmp_name'], $CertificateDocumentscert2)) {
                } else {
                }
                if (move_uploaded_file($_FILES['CertificateDocumentsmark4']['tmp_name'], $CertificateDocumentsmark2)) {
                } else {
                }
                if (move_uploaded_file($_FILES['EmploymentDocuments1']['tmp_name'], $EmploymentDocuments1)) {
                } else {
                }
                if (move_uploaded_file($_FILES['EmploymentDocuments2']['tmp_name'], $EmploymentDocuments2)) {
                } else {
                }
                if (move_uploaded_file($_FILES['SignatureApplicant']['tmp_name'], $SignatureApplicant)) {
                } else {
                }
                if (move_uploaded_file($_FILES['NationalIDApplicant']['tmp_name'], $NationalIDApplicant)) {
                } else {
                }
                if (move_uploaded_file($_FILES['PassportApplicant']['tmp_name'], $PassportApplicant)) {
                } else {
                }
                if (move_uploaded_file($_FILES['DrivingLicenceApplicant']['tmp_name'], $DrivingLicenceApplicant)) {
                } else {
                }
            }
            $page_data['page_name']  = 'online_admission_preview';
            $page_data['page_title'] = get_phrase('online_admission_preview');
            $this->load->view('backend/index', $page_data);
        }
    }
    function questions_paper_preview($param1 = '', $param2 = '', $param3 = ''){
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        //$this->load->library('image_lib');
        if ($param1 == 'preview') {
            if ($this->session->userdata('admin_login') != 1)
                redirect(base_url(), 'refresh');
            $page_data['page_name']  = 'question_paper_preview';
            $page_data['page_title'] = get_phrase('question_paper_preview');
            $this->load->view('backend/index', $page_data);
        }
    }
    function online_admission($param1 = '', $param2 = '', $param3 = '')
     {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
         if ($param1 == 'create') {

            /*$dat22                                   = $_POST['Session'];
            foreach($dat22 as $rr):
            endforeach;*/
            /*$dat221                                   = $_POST['ApplicantGender'];
            foreach($dat221 as $rrr):
            endforeach;*/
            //echo $data['Session']                         = $rr;

             $data3321['CandidateDetails']                         = $this->input->post('CandidateDetails');
             $this->db->where('id', $data3321['CandidateDetails']);
             $det = $this->db->get('money_receipt')->result_array();
             foreach($det as $tr):
             //echo $tr['id'].$tr['ProgramName'];
             endforeach;
             //exit();
             //exit();
            $temp = '0';
            $temp321 = 'money_receipt';
            $temp21 = '1';
            $data['EmailNotify']                     = $temp321;
            $data['Session']                         = $tr['SemesterName'];
            $data['AdmFormSerialNo']                 = $this->input->post('AdmFormSerialNo');
            $data['AdmissionRollNo']                 = $this->input->post('AdmissionRollNo');
            $data['AdmissionYear']                   = $tr['Year'];
            $data['NameofProgram']                   = $tr['ProgramName'];
            $data['NameofBatch']                     = $temp;
            $data['ClassRollNo']                     = $temp;
            $data['RegistratioNo']                   = $temp;
            $data['CandidateStudent']                = $temp;
            $data['StdStatus']                       = $temp21;

            $data['NameofApplicant']                 = $tr['CandidateName'];
            $data['ApplicantBirthDate']              = $this->input->post('ApplicantBirthDate');
            $data['BloodGroup']              = $this->input->post('BloodGroup');
            $data['ApplicantFatherName']             = $this->input->post('ApplicantFatherName');
            $data['ApplicantMotherName']             = $this->input->post('ApplicantMotherName');
            $data['ApplicantNationality']            = $this->input->post('ApplicantNationality');
            /*$data['ApplicantGender']                 = $rrr;*/
            $data['ApplicantGender']                 = $this->input->post('ApplicantGender');
             //exit();
            $data['PresentHouse']                    = $this->input->post('PresentHouse');
            $data['PresentPhone']                    = $this->input->post('PresentPhone');
            $data['PresentVillage']                  = $this->input->post('PresentVillage');
            $data['PresentMobile']                   = $tr['MobileNumber'];
            $data['PresentPostOffice']               = $this->input->post('PresentPostOffice');
            $data['PresentFaxNo']                    = $this->input->post('PresentFaxNo');
            $data['PresentPoliceStation']            = $this->input->post('PresentPoliceStation');
            $data['PresentEmail']                    = $tr['Email'];
            //$data['email']                           = $tr['Email'];
            $data['PresentDistrict']                 = $this->input->post('PresentDistrict');
            $data['PermanentHouse']                  = $this->input->post('PermanentHouse');
            $data['PermanentPhone']                  = $this->input->post('PermanentPhone');
            $data['PermanentVillage']                = $this->input->post('PermanentVillage');
            $data['PermanentMobile']                 = $this->input->post('PermanentMobile');
            $data['PermanentPostOffice']             = $this->input->post('PermanentPostOffice');
            $data['PermanentFaxNo']                  = $this->input->post('PermanentFaxNo');
            $data['PermanentPoliceStation']          = $this->input->post('PermanentPoliceStation');
            $data['PermanentEmail']                  = $this->input->post('PermanentEmail');
            $data['PermanentDistrict']               = $this->input->post('PermanentDistrict');

            $data['CertificateName1']                = $this->input->post('CertificateName1');
            $data['CertificateGroup1']               = $this->input->post('CertificateGroup1');
            $data['CertificateYear1']                = $this->input->post('CertificateYear1');
            $data['CertificateNameofInstitute1']     = $this->input->post('CertificateNameofInstitute1');
            $data['CertificateCGPA1']                = $this->input->post('CertificateCGPA1');
            $data['CertificatePointsObtained1']      = $this->input->post('CertificatePointsObtained1');

            $data['CertificateName2']                = $this->input->post('CertificateName2');
            $data['CertificateGroup2']               = $this->input->post('CertificateGroup2');
            $data['CertificateYear2']                = $this->input->post('CertificateYear2');
            $data['CertificateNameofInstitute2']     = $this->input->post('CertificateNameofInstitute2');
            $data['CertificateCGPA2']                = $this->input->post('CertificateCGPA2');
            $data['CertificatePointsObtained2']      = $this->input->post('CertificatePointsObtained2');

            $data['CertificateName3']                = $this->input->post('CertificateName3');
            $data['CertificateGroup3']               = $this->input->post('CertificateGroup3');
            $data['CertificateYear3']                = $this->input->post('CertificateYear3');
            $data['CertificateNameofInstitute3']     = $this->input->post('CertificateNameofInstitute3');
            $data['CertificateCGPA3']                = $this->input->post('CertificateCGPA3');
            $data['CertificatePointsObtained3']      = $this->input->post('CertificatePointsObtained3');

            $data['CertificateName4']                = $this->input->post('CertificateName4');
            $data['CertificateGroup4']               = $this->input->post('CertificateGroup4');
            $data['CertificateYear4']                = $this->input->post('CertificateYear4');
            $data['CertificateNameofInstitute4']     = $this->input->post('CertificateNameofInstitute4');
            $data['CertificateCGPA4']                = $this->input->post('CertificateCGPA4');
            $data['CertificatePointsObtained4']      = $this->input->post('CertificatePointsObtained4');

            $data['TotalGPA']      = $data['CertificateCGPA1']+$data['CertificateCGPA2'];
            //exit();

            $data['EmploymentNameofOrganizations1']  = $this->input->post('EmploymentNameofOrganizations1');
            $data['EmploymentFromDate1']             = $this->input->post('EmploymentFromDate1');
            $data['EmploymentToDate1']               = $this->input->post('EmploymentToDate1');
            $data['EmploymentPositionHeld1']         = $this->input->post('EmploymentPositionHeld1');
            $data['EmploymentNameofOrganizations2']  = $this->input->post('EmploymentNameofOrganizations2');
            $data['EmploymentFromDate2']             = $this->input->post('EmploymentFromDate2');
            $data['EmploymentToDate2']               = $this->input->post('EmploymentToDate2');
            $data['EmploymentPositionHeld2']         = $this->input->post('EmploymentPositionHeld2');
            $data['ReferenceName1']                  = $this->input->post('ReferenceName1');
            $data['ReferenceAddress1']               = $this->input->post('ReferenceAddress1');
            $data['ReferencePhone1']                 = $this->input->post('ReferencePhone1');
            $data['ReferenceMobile1']                = $this->input->post('ReferenceMobile1');
            $data['ReferenceEmail1']                 = $this->input->post('ReferenceEmail1');
            $data['ReferenceName2']                  = $this->input->post('ReferenceName2');
            $data['ReferenceAddress2']               = $this->input->post('ReferenceAddress2');
            $data['ReferencePhone2']                 = $this->input->post('ReferencePhone2');
            $data['ReferenceMobile2']                = $this->input->post('ReferenceMobile2');
            $data['ReferenceEmail2']                 = $this->input->post('ReferenceEmail2');

             $data['SonofMartyrs']                 = $this->input->post('SonofMartyrs');
             $data['Upojati']                 = $this->input->post('Upojati');
             $data['PoliticalInvolve']                 = $this->input->post('PoliticalInvolve');
             $ttt =  date("d-m-Y|");
             $d=strtotime("+11 hours");
             $ttt1 = date("h:i:sa", $d);
             $datetime = $ttt.$ttt1;
             $data['ApplicationDate']                 = date('Y-m-d',strtotime($this->input->post('ApplicationDate')));
             //$datetime;
             //echo $_FILES['PhotoApplicant']['name'];
             //$this->db->insert('applicants_details', $data);
             //exit();

             $data['NationalIDApplicant']                = $this->input->post('NationalIDApplicant');
             $data['PassportApplicant']                = $this->input->post('PassportApplicant');
             $data['DrivingLicenceApplicant']                = $this->input->post('DrivingLicenceApplicant');
             $data['PhotoApplicant']                = $this->input->post('PhotoApplicant');
             $data['CertificateDocumentscert1']                = $this->input->post('CertificateDocumentscert1');
             $data['CertificateDocumentsmark1']                = $this->input->post('CertificateDocumentsmark1');
             $data['CertificateDocumentscert2']                = $this->input->post('CertificateDocumentscert2');
             $data['CertificateDocumentsmark2']                = $this->input->post('CertificateDocumentsmark2');
             $data['CertificateDocumentscert3']                = $this->input->post('CertificateDocumentscert3');
             $data['CertificateDocumentsmark3']                = $this->input->post('CertificateDocumentsmark3');
             $data['CertificateDocumentscert4']                = $this->input->post('CertificateDocumentscert4');
             $data['CertificateDocumentsmark4']                = $this->input->post('CertificateDocumentsmark4');
             $data['EmploymentDocuments1']                = $this->input->post('EmploymentDocuments1');
             $data['EmploymentDocuments2']                = $this->input->post('EmploymentDocuments2');
             $data['SignatureApplicant']                = $this->input->post('SignatureApplicant');

             if(
                $_FILES['NationalIDApplicant']['name'] ||
                $_FILES['PassportApplicant']['name'] ||
                $_FILES['DrivingLicenceApplicant']['name'] ||
                $_FILES['PhotoApplicant']['name'] ||
                $_FILES['CertificateDocumentscert1']['name'] ||
                $_FILES['CertificateDocumentsmark1']['name'] ||
                $_FILES['CertificateDocumentscert2']['name'] ||
                $_FILES['CertificateDocumentsmark2']['name'] ||
                $_FILES['CertificateDocumentscert3']['name'] ||
                $_FILES['CertificateDocumentsmark3']['name'] ||
                $_FILES['CertificateDocumentscert4']['name'] ||
                $_FILES['CertificateDocumentsmark4']['name']||
                $_FILES['EmploymentDocuments1']['name'] ||
                $_FILES['EmploymentDocuments2']['name'] ||
                $_FILES['SignatureApplicant']['name']
            ){
                $uploaddir = './uploads/student_image/';
                $PhotoApplicant = $uploaddir . basename($data['AdmFormSerialNo']."-".$_FILES['PhotoApplicant']['name']);
                $CertificateDocumentscert1 = $uploaddir . basename($data['AdmFormSerialNo']."-".$_FILES['CertificateDocumentscert1']['name']);
                $CertificateDocumentsmark1 = $uploaddir . basename($data['AdmFormSerialNo']."-".$_FILES['CertificateDocumentsmark1']['name']);
                $CertificateDocumentscert2 = $uploaddir . basename($data['AdmFormSerialNo']."-".$_FILES['CertificateDocumentscert2']['name']);
                $CertificateDocumentsmark2 = $uploaddir . basename($data['AdmFormSerialNo']."-".$_FILES['CertificateDocumentsmark2']['name']);
                $CertificateDocumentscert3 = $uploaddir . basename($data['AdmFormSerialNo']."-".$_FILES['CertificateDocumentscert2']['name']);
                $CertificateDocumentsmark3 = $uploaddir . basename($data['AdmFormSerialNo']."-".$_FILES['CertificateDocumentsmark2']['name']);
                $CertificateDocumentscert4 = $uploaddir . basename($data['AdmFormSerialNo']."-".$_FILES['CertificateDocumentscert2']['name']);
                $CertificateDocumentsmark4 = $uploaddir . basename($data['AdmFormSerialNo']."-".$_FILES['CertificateDocumentsmark2']['name']);
                $EmploymentDocuments1 = $uploaddir . basename($data['AdmFormSerialNo']."-".$_FILES['EmploymentDocuments1']['name']);
                $EmploymentDocuments2 = $uploaddir . basename($data['AdmFormSerialNo']."-".$_FILES['EmploymentDocuments2']['name']);
                $SignatureApplicant = $uploaddir . basename($data['AdmFormSerialNo']."-".$_FILES['SignatureApplicant']['name']);
                $NationalIDApplicant = $uploaddir . basename($data['AdmFormSerialNo']."-".$_FILES['NationalIDApplicant']['name']);
                $PassportApplicant = $uploaddir . basename($data['AdmFormSerialNo']."-".$_FILES['PassportApplicant']['name']);
                $DrivingLicenceApplicant = $uploaddir . basename($data['AdmFormSerialNo']."-".$_FILES['DrivingLicenceApplicant']['name']);

                if (move_uploaded_file($_FILES['PhotoApplicant']['tmp_name'], $PhotoApplicant)) {} else {}
                if (move_uploaded_file($_FILES['CertificateDocumentscert1']['tmp_name'], $CertificateDocumentscert1)) {} else {}
                if (move_uploaded_file($_FILES['CertificateDocumentsmark1']['tmp_name'], $CertificateDocumentsmark1)) {} else {}
                if (move_uploaded_file($_FILES['CertificateDocumentscert2']['tmp_name'], $CertificateDocumentscert2)) {} else {}
                if (move_uploaded_file($_FILES['CertificateDocumentsmark2']['tmp_name'], $CertificateDocumentsmark2)) {} else {}
                if (move_uploaded_file($_FILES['CertificateDocumentscert3']['tmp_name'], $CertificateDocumentscert2)) {} else {}
                if (move_uploaded_file($_FILES['CertificateDocumentsmark3']['tmp_name'], $CertificateDocumentsmark2)) {} else {}
                if (move_uploaded_file($_FILES['CertificateDocumentscert4']['tmp_name'], $CertificateDocumentscert2)) {} else {}
                if (move_uploaded_file($_FILES['CertificateDocumentsmark4']['tmp_name'], $CertificateDocumentsmark2)) {} else {}
                if (move_uploaded_file($_FILES['EmploymentDocuments1']['tmp_name'], $EmploymentDocuments1)) {} else {}
                if (move_uploaded_file($_FILES['EmploymentDocuments2']['tmp_name'], $EmploymentDocuments2)) {} else {}
                if (move_uploaded_file($_FILES['SignatureApplicant']['tmp_name'], $SignatureApplicant)) {} else {}
                if (move_uploaded_file($_FILES['NationalIDApplicant']['tmp_name'], $NationalIDApplicant)) {} else {}
                if (move_uploaded_file($_FILES['PassportApplicant']['tmp_name'], $PassportApplicant)) {} else {}
                if (move_uploaded_file($_FILES['DrivingLicenceApplicant']['tmp_name'], $DrivingLicenceApplicant)) {} else {}

                $data['PhotoApplicant']                = $data['AdmFormSerialNo']."-".$_FILES['PhotoApplicant']['name'];
                $data['CertificateDocumentscert1']     = $data['AdmFormSerialNo']."-".$_FILES['CertificateDocumentscert1']['name'];
                $data['CertificateDocumentsmark1']     = $data['AdmFormSerialNo']."-".$_FILES['CertificateDocumentsmark1']['name'];
                $data['CertificateDocumentscert2']     = $data['AdmFormSerialNo']."-".$_FILES['CertificateDocumentscert2']['name'];
                $data['CertificateDocumentsmark2']     = $data['AdmFormSerialNo']."-".$_FILES['CertificateDocumentsmark2']['name'];
                $data['CertificateDocumentscert3']     = $data['AdmFormSerialNo']."-".$_FILES['CertificateDocumentscert3']['name'];
                $data['CertificateDocumentsmark3']     = $data['AdmFormSerialNo']."-".$_FILES['CertificateDocumentsmark3']['name'];
                $data['CertificateDocumentscert4']     = $data['AdmFormSerialNo']."-".$_FILES['CertificateDocumentscert4']['name'];
                $data['CertificateDocumentsmark4']     = $data['AdmFormSerialNo']."-".$_FILES['CertificateDocumentsmark4']['name'];
                $data['EmploymentDocuments1']          = $data['AdmFormSerialNo']."-".$_FILES['EmploymentDocuments1']['name'];
                $data['EmploymentDocuments2']          = $data['AdmFormSerialNo']."-".$_FILES['EmploymentDocuments2']['name'];
                $data['SignatureApplicant']            = $data['AdmFormSerialNo']."-".$_FILES['SignatureApplicant']['name'];
                $data['NationalIDApplicant']            = $data['AdmFormSerialNo']."-".$_FILES['NationalIDApplicant']['name'];
                $data['PassportApplicant']            = $data['AdmFormSerialNo']."-".$_FILES['PassportApplicant']['name'];
                $data['DrivingLicenceApplicant']            = $data['AdmFormSerialNo']."-".$_FILES['DrivingLicenceApplicant']['name'];
            }
            else{}
            $this->db->insert('applicants_details', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/online_admission/', 'refresh');
        }

         if ($param1 == 'do_update') {
            $temp = '0';
            $data['Session']                         = $this->input->post('Session');
            $data['AdmFormSerialNo']                 = $this->input->post('AdmFormSerialNo');
            $data['AdmissionRollNo']                 = $this->input->post('AdmissionRollNo');
            $data['AdmissionYear']                   = $this->input->post('AdmissionYear');
            $data['NameofProgram']                   = $this->input->post('NameofProgram');
            $data['ClassRollNo']                     = $temp;
            $data['RegistratioNo']                   = $temp;
            $data['CandidateStudent']                = $temp;

            $data['NameofApplicant']                 = $this->input->post('NameofApplicant');
            $data['ApplicantBirthDate']              = $this->input->post('ApplicantBirthDate');
            $data['ApplicantFatherName']             = $this->input->post('ApplicantFatherName');
            $data['ApplicantMotherName']             = $this->input->post('ApplicantMotherName');
            $data['ApplicantNationality']            = $this->input->post('ApplicantNationality');
            $data['ApplicantGender']                 = $this->input->post('ApplicantGender');
            $data['PresentHouse']                    = $this->input->post('PresentHouse');
            $data['PresentPhone']                    = $this->input->post('PresentPhone');
            $data['PresentVillage']                  = $this->input->post('PresentVillage');
            $data['PresentMobile']                   = $this->input->post('PresentMobile');
            $data['PresentPostOffice']               = $this->input->post('PresentPostOffice');
            $data['PresentFaxNo']                    = $this->input->post('PresentFaxNo');
            $data['PresentPoliceStation']            = $this->input->post('PresentPoliceStation');
            $data['PresentEmail']                    = $this->input->post('PresentEmail');
            $data['PresentDistrict']                 = $this->input->post('PresentDistrict');
            $data['PermanentHouse']                  = $this->input->post('PermanentHouse');
            $data['PermanentPhone']                  = $this->input->post('PermanentPhone');
            $data['PermanentVillage']                = $this->input->post('PermanentVillage');
            $data['PermanentMobile']                 = $this->input->post('PermanentMobile');
            $data['PermanentPostOffice']             = $this->input->post('PermanentPostOffice');
            $data['PermanentFaxNo']                  = $this->input->post('PermanentFaxNo');
            $data['PermanentPoliceStation']          = $this->input->post('PermanentPoliceStation');
            $data['PermanentEmail']                  = $this->input->post('PermanentEmail');
            $data['PermanentDistrict']               = $this->input->post('PermanentDistrict');
            $data['CertificateName1']                = $this->input->post('CertificateName1');
            $data['CertificateGroup1']               = $this->input->post('CertificateGroup1');
            $data['CertificateYear1']                = $this->input->post('CertificateYear1');
            $data['CertificateNameofInstitute1']     = $this->input->post('CertificateNameofInstitute1');
            $data['CertificateCGPA1']                = $this->input->post('CertificateCGPA1');
            $data['CertificatePointsObtained1']      = $this->input->post('CertificatePointsObtained1');
            $data['CertificateName2']                = $this->input->post('CertificateName2');
            $data['CertificateGroup2']               = $this->input->post('CertificateGroup2');
            $data['CertificateYear2']                = $this->input->post('CertificateYear2');
            $data['CertificateNameofInstitute2']     = $this->input->post('CertificateNameofInstitute2');
            $data['CertificateCGPA2']                = $this->input->post('CertificateCGPA2');
            $data['CertificatePointsObtained2']      = $this->input->post('CertificatePointsObtained2');

            $data['CertificateName3']                = $this->input->post('CertificateName3');
            $data['CertificateGroup3']               = $this->input->post('CertificateGroup3');
            $data['CertificateYear3']                = $this->input->post('CertificateYear3');
            $data['CertificateNameofInstitute3']     = $this->input->post('CertificateNameofInstitute3');
            $data['CertificateCGPA3']                = $this->input->post('CertificateCGPA3');
            $data['CertificatePointsObtained3']      = $this->input->post('CertificatePointsObtained3');

            $data['CertificateName4']                = $this->input->post('CertificateName4');
            $data['CertificateGroup4']               = $this->input->post('CertificateGroup4');
            $data['CertificateYear4']                = $this->input->post('CertificateYear4');
            $data['CertificateNameofInstitute4']     = $this->input->post('CertificateNameofInstitute4');
            $data['CertificateCGPA4']                = $this->input->post('CertificateCGPA4');
            $data['CertificatePointsObtained4']      = $this->input->post('CertificatePointsObtained4');

            $data['TotalGPA']      = $this->input->post('TotalGPA');

            $data['EmploymentNameofOrganizations1']  = $this->input->post('EmploymentNameofOrganizations1');
            $data['EmploymentFromDate1']             = $this->input->post('EmploymentFromDate1');
            $data['EmploymentToDate1']               = $this->input->post('EmploymentToDate1');
            $data['EmploymentPositionHeld1']         = $this->input->post('EmploymentPositionHeld1');
            $data['EmploymentNameofOrganizations2']  = $this->input->post('EmploymentNameofOrganizations2');
            $data['EmploymentFromDate2']             = $this->input->post('EmploymentFromDate2');
            $data['EmploymentToDate2']               = $this->input->post('EmploymentToDate2');
            $data['EmploymentPositionHeld2']         = $this->input->post('EmploymentPositionHeld2');
            $data['ReferenceName1']                  = $this->input->post('ReferenceName1');
            $data['ReferenceAddress1']               = $this->input->post('ReferenceAddress1');
            $data['ReferencePhone1']                 = $this->input->post('ReferencePhone1');
            $data['ReferenceMobile1']                = $this->input->post('ReferenceMobile1');
            $data['ReferenceEmail1']                 = $this->input->post('ReferenceEmail1');
            $data['ReferenceName2']                  = $this->input->post('ReferenceName2');
            $data['ReferenceAddress2']               = $this->input->post('ReferenceAddress2');
            $data['ReferencePhone2']                 = $this->input->post('ReferencePhone2');
            $data['ReferenceMobile2']                = $this->input->post('ReferenceMobile2');
            $data['ReferenceEmail2']                 = $this->input->post('ReferenceEmail2');

             $data['SonofMartyrs']                 = $this->input->post('SonofMartyrs');
             $data['Upojati']                 = $this->input->post('Upojati');
             $data['PoliticalInvolve']                 = $this->input->post('PoliticalInvolve');
             
            $data['ApplicationDate']                 = $this->input->post('ApplicationDate');
            /*
            if($_FILES['PhotoApplicant']['name']){
                echo "don't get";
            }
            else{
                $uploaddir = './uploads/student_image/';
                $PhotoApplicant = $uploaddir . basename($data['AdmFormSerialNo']."-".$_FILES['PhotoApplicant']['name']);
                if (move_uploaded_file($_FILES['PhotoApplicant']['tmp_name'], $PhotoApplicant)) {} else {}
                echo $data['PhotoApplicant']                = $data['AdmFormSerialNo']."-".$_FILES['PhotoApplicant']['name'];
                echo "got";
                echo $_FILES['PhotoApplicant']['name'];
            }
            exit();
            */
            $this->db->where('id', $param2);
            $this->db->update('applicants_details', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/online_admission/', 'refresh');
        }
         if ($param1 == 'enrollall') {

         }
         if ($param1 == 'autoselection') {
             $ttemppqw['EmailNotify'] =  $this->uri->segment(4);
             $to = implode(', ', $this->input->post('SelectedEmail[]'));
             $we23 = implode(', ', $this->input->post('id[]'));
             $wesd = explode(',', $we23);
             foreach($wesd as $out1s) {
                 $this->db->where('id', $out1s);
                 $this->db->update('applicants_details', $ttemppqw);
                 ?>
                 <?php
                 }
             //exit();
             $to = implode(', ', $this->input->post('SelectedEmail[]'));
             $admy = implode(', ', $this->input->post('AdmissionYear[]'));
             $tempadm = explode(",", $admy);
             //$tempadm[0];
             $data12 = implode(', ', $this->input->post('ProgramName[]'));
             //echo $data['ProgramName']         = $this->input->post('ProgramName');
             $temp = explode(",", $data12);
             $temp[0];
             //$data['Session'] = $this->input->post['Session'];
             //echo $data['AdmissionYear'] = $this->input->post['AdmissionYear'];
             $semname = 1;
             ?>
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
             <?php
                echo $to = implode(', ', $this->input->post('SelectedEmail[]'));
             ?>
             <h3>Congratulations!. You are selected for admitting. Please pay the following Dues</h3>
             <table class="table table-bordered datatable dataTable">
                 <tr>
                     <th colspan="2">
                         <?php
                         echo "Program Name: ";
                         $this->db->where('id', $temp[0]);
                         $asa = $this->db->get('course_program')->result_array();
                         foreach($asa as $row334a):
                             echo $row334a['course_name'];
                         endforeach;
                         echo "<br/>";
                         echo "Semester Name: ";
                         $this->db->where('id', $semname);
                         $assa = $this->db->get('semester')->result_array();
                         foreach($assa as $rowa334a):
                             echo $rowa334a['name'];
                         endforeach;
                         ?>
                     </th>
                 </tr>
                 <tr>
                     <th>Particulars</th>
                     <th>Amount</th>
                 </tr>
             </table>
             <?php
             $this->db->where('ProgramName',$temp[0]);
             $this->db->where('SemesterName',$semname);
             //$this->db->where('SessionName',$row['Session']);
             //$this->db->where('Year',$row['AdmissionYear']);
             $sem_par = $this->db->get('semester_particulars')->result_array();
             foreach($sem_par as $ss):
                 ?>
                 <table class="table table-bordered datatable dataTable">
                     <tr>
                         <td><?php echo $ss['Particulars'];?></td>
                         <td><?php echo $ss['Amount'];?></td>
                     </tr>
                 </table>
<?php
endforeach;
             ?>
             <?php
             //echo $temp[0];
             //echo $tempadm[0];;
             //echo $data['AdmissionYear'];
             //$this->db->where('ProgramName',$temp[0]);
             //$this->db->where('id',$temp[0]);
             //$this->db->where('Year',$tempadm[0]);
             $this->db->where('id','1');
             //$this->db->where('Year',$row['AdmissionYear']);
             $asd = $this->db->get('session_pundro')->result_array();
             foreach($asd as $ssasd):
                 ?>
                 <table class="table table-bordered datatable dataTable sestr" style="
                 width: 100%;
                 background: #f2f2f2;
                 border: 1px solid #ccc;
                ">
                     <tr>
                         <td>
                         <?php echo "<b>Session: </b>" .$ssasd['SessionName'];?><br/>
                         <?php echo "<b>Admission Duration: </b>" .$ssasd['AdmissionDuration'];?><br/>
                         <?php echo "<b>Class Commencement: </b>" .$ssasd['ClassCommencement'];?><br/>
                         <?php echo "<b>Semester Duration: </b>" .$ssasd['SemesterDuration'];?>
                         </td>
                     </tr>
                 </table>
                 <?php
             endforeach;
             ?>
             <?php
             //echo "<a href='#' onclick='history.go(-1)'>Go Back</a>";
            echo "</div>";
             echo "<div style='
width: 100%;
    float: left;
    clear: both;
    margin: 2% 0;
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
             
             $to = implode(', ', $this->input->post('SelectedEmail[]'));

                 //$to = implode(', ', $this->input->post('email[]'));
                //$to      = $_POST['email'];
                //exit();
                 $subject = 'Congratulations!. You are selected for admitting. Please pay the following Dues ';
                 $message = 'Message Details';
                 //exit();
                 $headers = 'From: pundro@gmail.com' . "\r\n" .
                     'Reply-To: pundro@gmail.com' . "\r\n" .
                     'X-Mailer: PHP/' . phpversion();

                 mail($to, $subject, $message, $headers);
                 //echo "Success";

             exit();
         }
         if ($param1 == 'rejected_candidates') {
             $ttemppa =  $this->uri->segment(4);
             $this->db->where('EmailNotify', $ttemppa);
             $asq = $this->db->get('applicants_details')->result_array();
             foreach($asq as $row334q):
                 echo $row334q['id'];
             endforeach;
             exit();
         }
         if ($param1 == 'singleautoselection') {
             //echo "inside";
             $ttempp =  $this->uri->segment(4);
             //$this->db->where('id', $ttempp);
             //$rtrt = $this->db->get()->result_array();
             $this->db->where('id', $ttempp);
             $asqz = $this->db->get('applicants_details')->result_array();
             foreach($asqz as $row334qz):
                 //echo $row334qz['PresentEmail'];
             endforeach;

             $ttempp5['EmailNotify'] =  $this->uri->segment(5);
             //exit();
             $this->db->where('id', $ttempp);
             $this->db->update('applicants_details', $ttempp5);
             //exit();
             $this->db->where('id', $ttempp);
             $asq = $this->db->get('applicants_details')->result_array();
             foreach($asq as $row334q):
                 //echo $row334q['NameofProgram']." (".$row334q['Session'].")";
             endforeach;
             //exit();
             $semname = 1;
             ?>
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
             <?php
             echo "<b>Reference Number: </b>";
             echo $row334qz['PresentMobile'];
             echo "<br/>";
             echo "<b>Email Address: </b>";
             echo $row334qz['PresentEmail'];
             ?>
             <h3>Congratulations!. You are selected for admitting. Please pay the following Dues</h3>
             <table class="table table-bordered datatable dataTable">
                 <tr>
                     <th colspan="2">
                         <?php
                         echo "Program Name: ";
                         $this->db->where('id', $row334q['NameofProgram']);
                         $asa = $this->db->get('course_program')->result_array();
                         foreach($asa as $row334a):
                             echo $row334a['course_name'];
                         endforeach;
                         echo "<br/>";
                         echo "Semester Name: ";
                         $this->db->where('id', $semname);
                         $assa = $this->db->get('semester')->result_array();
                         foreach($assa as $rowa334a):
                             echo $rowa334a['name'];
                         endforeach;
                         ?>
                     </th>
                 </tr>
                 <tr>
                     <th>Particulars</th>
                     <th>Amount</th>
                 </tr>
             </table>
             <?php
             $this->db->where('ProgramName',$row334q['NameofProgram']);
             $this->db->where('SemesterName',$semname);
             //$this->db->where('SessionName',$row['Session']);
             //$this->db->where('Year',$row['AdmissionYear']);
             $sem_par = $this->db->get('semester_particulars')->result_array();
             foreach($sem_par as $ss):
                 ?>
                 <table class="table table-bordered datatable dataTable">
                     <tr>
                         <td><?php echo $ss['Particulars'];?></td>
                         <td><?php echo $ss['Amount'];?></td>
                     </tr>
                 </table>
                 <?php
             endforeach;
             ?>
             <h3>Session Details</h3>
             <?php
             //echo $temp[0];
             //echo $tempadm[0];;
             //echo $data['AdmissionYear'];
             //$this->db->where('ProgramName',$temp[0]);
             //$this->db->where('id',$temp[0]);
             $this->db->where('Year',$row334q['AdmissionYear']);
             //$this->db->where('SessionName',$row['Session']);
             //$this->db->where('Year',$row['AdmissionYear']);
             $asd = $this->db->get('session_pundro')->result_array();
             foreach($asd as $ssasd):
                 ?>
                 <table class="table table-bordered datatable dataTable">
                     <tr>
                         <td><?php echo $ssasd['SessionName'];?></td>
                         <td><?php echo $ssasd['AdmissionDuration'];?></td>
                         <td><?php echo $ssasd['ClassCommencement'];?></td>
                         <td><?php echo $ssasd['SemesterDuration'];?></td>
                     </tr>
                 </table>
                 <?php
             endforeach;
             ?>
             <?php
             //echo "<a href='#' onclick='history.go(-1)'>Go Back</a>";
             echo "</div>";
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
             echo "</div>";
             $this->session->set_flashdata('flash_message' , get_phrase('mailed_successfully'));
             redirect(base_url() . 'index.php?admin/online_admission/', 'refresh');
             //exit();
             /*echo $to = implode(', ', $this->input->post('SelectedEmail[]'));

             //$to = implode(', ', $this->input->post('email[]'));
             //$to      = $_POST['email'];
             //exit();
             $subject = 'Congratulations!. You are selected for admitting. Please pay the following Dues ';
             $message = 'Message Details';
             exit();
             $headers = 'From: pundro@gmail.com' . "\r\n" .
                 'Reply-To: pundro@gmail.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();

             mail($to, $subject, $message, $headers);
             echo "Success";*/

             //exit();

         }
         if ($param1 == 'singlerejected') {
             //echo "inside";
             $ttempp43 =  $this->uri->segment(4);
             $ttempp54['EmailNotify'] =  $this->uri->segment(5);
             $this->db->where('id', $ttempp43);
             $this->db->update('applicants_details', $ttempp54);
             //echo "<h3>We are Sorry.</h3>";
             $this->session->set_flashdata('flash_message' , get_phrase('mailed_successfully'));
             redirect(base_url() . 'index.php?admin/online_admission/', 'refresh');
         }
         if ($param1 == 'enroll') {
             $this->db->where('id', $param2);
             $query23 = $this->db->get('applicants_details');
             foreach ($query23->result() as $row43) {
                 $this->db->insert('student_pundro',$row43);
             }
             $student = "1";
             $data12['CandidateStudent']                = $student;
             $this->db->where('id', $param2);
             $this->db->update('applicants_details', $data12);

             $data13['ClassRollNo']                = $this->input->post('ClassRollNo');
             $data13['RegistratioNo']                = $this->input->post('RegistratioNo');
             $data13['CandidateStudent']                = $student;
             $data13['NameofBatch']                = $this->input->post('NameofBatch');
             //exit();
             $this->db->where('id', $param2);
             $this->db->update('student_pundro', $data13);

             $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
             redirect(base_url() . 'index.php?admin/admitted_student/', 'refresh');
         }
        else if ($param1 == 'personal_profile') {
            $page_data['personal_profile']   = true;
            $page_data['current_teacher_id'] = $param2;
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('applicants_details', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            //$this->db->where('id', $param2);
            //$this->db->delete('applicants_details');
            $data111['Trash']                = '1';
            $this->db->where('id', $param2);
            $this->db->update('applicants_details', $data111);
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/online_admission/', 'refresh');
        }
        if ($param1 == 'permanent_delete') {
            $this->db->where('id', $param2);
            $this->db->delete('applicants_details');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/online_admission/', 'refresh');
        }
        $student12 = "0";
        $student12a = 0;
        $Trash = '0';
        /**********************************************************/
        $this->db->where('Trash', $Trash);
        $this->db->where('EmailNotify', $student12a);
        $this->db->where('CandidateStudent', $student12);
        $this->db->order_by('NameofProgram ASC');
        $page_data['osadStudent']    = $this->db->get('applicants_details')->result_array();
        /**********************************************************/
        $this->db->where('EmailNotify', $student12a);
        $this->db->where('CandidateStudent', $student12);
        $this->db->where('Trash', '1');
        $page_data['trash']    = $this->db->get('applicants_details')->result_array();
        /**********************************************************/
        $page_data['page_name']  = 'online_admission';
		$page_data['page_title'] = get_phrase('student_admission_form');
        $this->load->view('backend/index', $page_data);
    }

    function admitted_student($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'do_update') {
            $data['Session']                         = $this->input->post('Session');
            /*$data['AdmFormSerialNo']                 = $this->input->post('AdmFormSerialNo');*/
            $data['AdmissionRollNo']                 = $this->input->post('AdmissionRollNo');
            $data['AdmissionYear']                   = $this->input->post('AdmissionYear');
            $data['NameofProgram']                   = $this->input->post('NameofProgram');
            $data['ClassRollNo']                     = $this->input->post('ClassRollNo');
            $data['RegistratioNo']                   = $this->input->post('RegistratioNo');
            $data['NameofApplicant']                 = $this->input->post('NameofApplicant');
            $data['ApplicantBirthDate']              = $this->input->post('ApplicantBirthDate');
            $data['ApplicantFatherName']             = $this->input->post('ApplicantFatherName');
            $data['ApplicantMotherName']             = $this->input->post('ApplicantMotherName');
            $data['ApplicantNationality']            = $this->input->post('ApplicantNationality');
            $data['ApplicantGender']                 = $this->input->post('ApplicantGender');
            $data['PresentHouse']                    = $this->input->post('PresentHouse');
            $data['PresentPhone']                    = $this->input->post('PresentPhone');
            $data['PresentVillage']                  = $this->input->post('PresentVillage');
            $data['PresentMobile']                   = $this->input->post('PresentMobile');
            $data['PresentPostOffice']               = $this->input->post('PresentPostOffice');
            $data['PresentFaxNo']                    = $this->input->post('PresentFaxNo');
            $data['PresentPoliceStation']            = $this->input->post('PresentPoliceStation');
            $data['PresentEmail']                    = $this->input->post('PresentEmail');
            $data['PresentDistrict']                 = $this->input->post('PresentDistrict');
            $data['PermanentHouse']                  = $this->input->post('PermanentHouse');
            $data['PermanentPhone']                  = $this->input->post('PermanentPhone');
            $data['PermanentVillage']                = $this->input->post('PermanentVillage');
            $data['PermanentMobile']                 = $this->input->post('PermanentMobile');
            $data['PermanentPostOffice']             = $this->input->post('PermanentPostOffice');
            $data['PermanentFaxNo']                  = $this->input->post('PermanentFaxNo');
            $data['PermanentPoliceStation']          = $this->input->post('PermanentPoliceStation');
            $data['PermanentEmail']                  = $this->input->post('PermanentEmail');
            $data['PermanentDistrict']               = $this->input->post('PermanentDistrict');
            $data['CertificateName1']                = $this->input->post('CertificateName1');
            $data['CertificateGroup1']               = $this->input->post('CertificateGroup1');
            $data['CertificateYear1']                = $this->input->post('CertificateYear1');
            $data['CertificateNameofInstitute1']     = $this->input->post('CertificateNameofInstitute1');
            $data['CertificateCGPA1']                = $this->input->post('CertificateCGPA1');
            $data['CertificatePointsObtained1']      = $this->input->post('CertificatePointsObtained1');
            $data['CertificateName2']                = $this->input->post('CertificateName2');
            $data['CertificateGroup2']               = $this->input->post('CertificateGroup2');
            $data['CertificateYear2']                = $this->input->post('CertificateYear2');
            $data['CertificateNameofInstitute2']     = $this->input->post('CertificateNameofInstitute2');
            $data['CertificateCGPA2']                = $this->input->post('CertificateCGPA2');
            $data['CertificatePointsObtained2']      = $this->input->post('CertificatePointsObtained2');
            $data['EmploymentNameofOrganizations1']  = $this->input->post('EmploymentNameofOrganizations1');
            $data['EmploymentFromDate1']             = $this->input->post('EmploymentFromDate1');
            $data['EmploymentToDate1']               = $this->input->post('EmploymentToDate1');
            $data['EmploymentPositionHeld1']         = $this->input->post('EmploymentPositionHeld1');
            $data['EmploymentNameofOrganizations2']  = $this->input->post('EmploymentNameofOrganizations2');
            $data['EmploymentFromDate2']             = $this->input->post('EmploymentFromDate2');
            $data['EmploymentToDate2']               = $this->input->post('EmploymentToDate2');
            $data['EmploymentPositionHeld2']         = $this->input->post('EmploymentPositionHeld2');
            $data['ReferenceName1']                  = $this->input->post('ReferenceName1');
            $data['ReferenceAddress1']               = $this->input->post('ReferenceAddress1');
            $data['ReferencePhone1']                 = $this->input->post('ReferencePhone1');
            $data['ReferenceMobile1']                = $this->input->post('ReferenceMobile1');
            $data['ReferenceEmail1']                 = $this->input->post('ReferenceEmail1');
            $data['ReferenceName2']                  = $this->input->post('ReferenceName2');
            $data['ReferenceAddress2']               = $this->input->post('ReferenceAddress2');
            $data['ReferencePhone2']                 = $this->input->post('ReferencePhone2');
            $data['ReferenceMobile2']                = $this->input->post('ReferenceMobile2');
            $data['ReferenceEmail2']                 = $this->input->post('ReferenceEmail2');
            $data['ApplicationDate']                 = $this->input->post('ApplicationDate');
            $this->db->where('id', $param2);
            $this->db->update('admitted_student', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/admitted_student/', 'refresh');
        } else if ($param1 == 'personal_profile') {
            $page_data['personal_profile']   = true;
            $page_data['current_teacher_id'] = $param2;
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('admitted_student', array(
                'id' => $param2
            ))->result_array();
        } else if ($param1 == 'profile') {
            $page_data['edit_data'] = $this->db->get_where('admitted_student', array(
                'id' => $param2
            ))->result_array();
        } else if ($param1 == 'admission_admit_card') {
            $student = '1';
            $page_data['osadStudent']    = $this->db->where('CandidateStudent=', $student);
            $page_data['osadStudent']    = $this->db->get('admitted_student')->result_array();
            //$page_data['page_name']  = 'modal_edit_student_id_card_profile12';
            $page_data['page_title'] = get_phrase('admission_admit_card');
            $this->load->view('backend/index', $page_data);
        } else if ($param1 == 'mid_term_admit_card') {
            $student = '1';
            $page_data['osadStudent']    = $this->db->where('CandidateStudent=', $student);
            $page_data['osadStudent']    = $this->db->get('admitted_student')->result_array();
            //$page_data['page_name']  = 'modal_student_midtermadmitcard';
            $page_data['page_title'] = get_phrase('mid_term_admit_card');
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == 'restore') {
            //$this->db->where('id', $param2);
            //$this->db->delete('admitted_student');
            $data111['Trash']                = '0';
            $this->db->where('id', $param2);
            $this->db->update('student_pundro', $data111);
            $this->session->set_flashdata('flash_message' , get_phrase('data_restored'));
            redirect(base_url() . 'index.php?admin/admitted_student/', 'refresh');
        }
        if ($param1 == 'delete') {
            //$this->db->where('id', $param2);
            //$this->db->delete('admitted_student');
            $data111['Trash']                = '1';
            $this->db->where('id', $param2);
            $this->db->update('student_pundro', $data111);
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/admitted_student/', 'refresh');
        }
        if ($param1 == 'permanent_delete') {
            $this->db->where('id', $param2);
            $this->db->delete('student_pundro');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted_permanently'));
            redirect(base_url() . 'index.php?admin/admitted_student/', 'refresh');
        }
        //$CandidateStudent = '1';
        //$page_data['osadStudent']    = $this->db->where('CandidateStudent', $CandidateStudent);
        $this->db->where('Trash', '0');
        $page_data['osadStudent']    = $this->db->get('student_pundro')->result_array();
        /**********************************************************/
        $this->db->where('Trash', '1');
        $page_data['trash']    = $this->db->get('student_pundro')->result_array();
        /**********************************************************/
        $page_data['page_name']  = 'admitted_student';
        $page_data['page_title'] = get_phrase('admitted_student');
        $this->load->view('backend/index', $page_data);
    }

    function std_status($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'do_update') {

            $temp12                 = $this->input->post('id');
            $temp1                 = $this->input->post('StdStatus');
            $this->db->where('id', $temp12);
            $curstatus = $this->db->get('applicants_details')->result_array();
            foreach($curstatus as $roee):
                $cur = $roee['StdStatus'];
            //echo $data12['temp']                 = $cur;
            endforeach;
            $data['StdStatus']                 = $cur.", ".$temp1;
            //exit();
            $this->db->where('id', $param2);
            $this->db->update('applicants_details', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/std_status/', 'refresh');
        } else if ($param1 == 'personal_profile') {
            $page_data['personal_profile']   = true;
            $page_data['current_teacher_id'] = $param2;
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('applicants_details', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('applicants_details');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/std_status/', 'refresh');
        }

        $page_data['osadStudent']    = $this->db->get('applicants_details')->result_array();
        $page_data['page_name']  = 'std_status';
        $page_data['page_title'] = get_phrase('promote');
        $this->load->view('backend/index', $page_data);
    }

    function auto_selection_and_short_listing($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'create') {

            if($_FILES['userfile']['name'] != '') {
                $filename = stripslashes($_FILES['userfile']['name']);
                $extension = strtolower($filename);
                $image_name1=time().'.'.$extension;
                $newname='uploads/student_image/'.$image_name1;
                $copied = copy($_FILES['userfile']['tmp_name'], $newname);
            }

//            $this->input->post('ff_son') = 'yes';
//            $this->input->post('upojati') = 'yes';

            $data['acd_session_id']        = $this->input->post('acd_session_id');
            $data['name_bn']        = $this->input->post('name_bn');
            $data['name_en']        = $this->input->post('name_en');
            $data['father_name']        = $this->input->post('father_name');
            $data['mother_name']        = $this->input->post('mother_name');
            $data['ff_son']        = $this->input->post('ff_son');
            $data['upjati']        = $this->input->post('upjati');
            $data['gardian_name']        = $this->input->post('gardian_name');
            $data['nationality']        = $this->input->post('nationality');
            $data['birthday']    = $this->input->post('birthday');
            $data['religion']    = $this->input->post('religion');
            $data['sex']         = $this->input->post('sex');
            $data['pr_address']     = $this->input->post('pr_address');
            $data['cur_address']     = $this->input->post('cur_address');
            $data['phone']       = $this->input->post('phone');
            $data['email']       = $this->input->post('email');
            $t1    = $this->input->post('technology1');
            $t2    = $this->input->post('technology2');
            //$t3    = $this->input->post('technology3');
            //$data['technology'] = $t1.", ".$t2.", ".$t3;
            $data['technology'] = $t1.", ".$t2;
            //exit();
            $data['app_date']    = date('Y-m-d');
            $photo=time().'.jpg';
            $data['photo']    = $image_name1;
            $this->db->insert('osad_student', $data);
            $osad_student_id = $this->db->insert_id();
            // Details
            for($i=0;$i<$this->input->post('ttldtl');$i++){

                $data1 = array(
                    'osad_student_id' => $osad_student_id,
                    'examtype' => $this->input->post('examtype'.$i, TRUE),
                    'group' => $this->input->post('group'.$i, TRUE),
                    'board' => $this->input->post('board'.$i, TRUE),
                    'passing_yr' => $this->input->post('passing_yr'.$i, TRUE),
                    'special_mark' => $this->input->post('special_mark'.$i, TRUE),
                    'ttl_mark' => $this->input->post('ttl_mark'.$i, TRUE),
                    'date' => date('Y-m-d')
                );

                $this->db->insert('osad_acd_history', $data1);

            }

            /*	if($_FILES['userfile']['userfile'] != '') {
                //$filename = stripslashes($_FILES['upload']['name']);
                //$extension = strtolower($filename);
                //$image_name1=time().'.'.$extension;
                $newname='uploads/student_image/'.$photo;
                $copied = copy($_FILES['userfile']['tmp_name'], $newname);
                 }*/

            // move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/'.$photo);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            //$this->email_model->account_opening_email('teacher', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            redirect(base_url() . 'index.php?admin/auto_selection_and_short_listing/', 'refresh');
        }
        if ($param1 == 'do_update') {
            //$data['name_en']        = $this->input->post('name_en');
            //$data['name_bn']        = $this->input->post('name_bn');
            $data['applicant_status']        = $this->input->post('applicant_status');
            /*$data['register_number']        = $this->input->post('register_number');*/
            /*$data['birthday']    = $this->input->post('birthday');
            $data['sex']         = $this->input->post('sex');
            $data['address']     = $this->input->post('address');
            $data['phone']       = $this->input->post('phone');
            $data['email']       = $this->input->post('email');*/
            //exit();
            if($data['applicant_status'] == "Short Listed"){
                /*$data['personal_register_number']        = $this->input->post('register_number');*/
                $this->db->where('id', $param2);
                $this->db->update('osad_student_12', $data);
                $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
                redirect(base_url() . 'index.php?admin/auto_selection_and_short_listing/', 'refresh');
            }
            else{
                /*$this->db->where('id', $param2);
                $this->db->update('osad_student', $data);*/
                $page_data['osadStudent']    = $this->db->get('osad_student_12')->result_array();
                $page_data['page_name']  = 'auto_selection_and_short_listing';
                $page_data['page_title'] = get_phrase('auto_selection_and_short_listing');
                $this->load->view('backend/index', $page_data);
            }
//            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $param2 . '.jpg');
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/auto_selection_and_short_listing/', 'refresh');
        } else if ($param1 == 'personal_profile') {
            $page_data['personal_profile']   = true;
            $page_data['current_teacher_id'] = $param2;
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('osad_student', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('osad_student');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/auto_selection_and_short_listing/', 'refresh');
        }

        $page_data['osadStudent']    = $this->db->get('osad_student_12')->result_array();
        $page_data['page_name']  = 'auto_selection_and_short_listing';
        $page_data['page_title'] = get_phrase('auto_selection_and_short_listing');
        $this->load->view('backend/index', $page_data);
    }

    function interview_applicant($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'create') {

            if($_FILES['userfile']['name'] != '') {
                $filename = stripslashes($_FILES['userfile']['name']);
                $extension = strtolower($filename);
                $image_name1=time().'.'.$extension;
                $newname='uploads/student_image/'.$image_name1;
                $copied = copy($_FILES['userfile']['tmp_name'], $newname);
            }

//            $this->input->post('ff_son') = 'yes';
//            $this->input->post('upojati') = 'yes';

            $data['acd_session_id']        = $this->input->post('acd_session_id');
            $data['name_bn']        = $this->input->post('name_bn');
            $data['name_en']        = $this->input->post('name_en');
            $data['father_name']        = $this->input->post('father_name');
            $data['mother_name']        = $this->input->post('mother_name');
            $data['ff_son']        = $this->input->post('ff_son');
            $data['upjati']        = $this->input->post('upjati');
            $data['gardian_name']        = $this->input->post('gardian_name');
            $data['nationality']        = $this->input->post('nationality');
            $data['birthday']    = $this->input->post('birthday');
            $data['religion']    = $this->input->post('religion');
            $data['sex']         = $this->input->post('sex');
            $data['pr_address']     = $this->input->post('pr_address');
            $data['cur_address']     = $this->input->post('cur_address');
            $data['phone']       = $this->input->post('phone');
            $data['email']       = $this->input->post('email');
            $t1    = $this->input->post('technology1');
            $t2    = $this->input->post('technology2');
            //$t3    = $this->input->post('technology3');
            //$data['technology'] = $t1.", ".$t2.", ".$t3;
            $data['technology'] = $t1.", ".$t2;
            //exit();
            $data['app_date']    = date('Y-m-d');
            $photo=time().'.jpg';
            $data['photo']    = $image_name1;
            $this->db->insert('osad_student', $data);
            $osad_student_id = $this->db->insert_id();
            // Details
            for($i=0;$i<$this->input->post('ttldtl');$i++){

                $data1 = array(
                    'osad_student_id' => $osad_student_id,
                    'examtype' => $this->input->post('examtype'.$i, TRUE),
                    'group' => $this->input->post('group'.$i, TRUE),
                    'board' => $this->input->post('board'.$i, TRUE),
                    'passing_yr' => $this->input->post('passing_yr'.$i, TRUE),
                    'special_mark' => $this->input->post('special_mark'.$i, TRUE),
                    'ttl_mark' => $this->input->post('ttl_mark'.$i, TRUE),
                    'date' => date('Y-m-d')
                );

                $this->db->insert('osad_acd_history', $data1);

            }

            /*	if($_FILES['userfile']['userfile'] != '') {
                //$filename = stripslashes($_FILES['upload']['name']);
                //$extension = strtolower($filename);
                //$image_name1=time().'.'.$extension;
                $newname='uploads/student_image/'.$photo;
                $copied = copy($_FILES['userfile']['tmp_name'], $newname);
                 }*/

            // move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/'.$photo);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            //$this->email_model->account_opening_email('teacher', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            redirect(base_url() . 'index.php?admin/interview_applicant/', 'refresh');
        }
        if ($param1 == 'do_update') {
            //$data['name_en']        = $this->input->post('name_en');
            //$data['name_bn']        = $this->input->post('name_bn');
            $data['applicant_status']        = $this->input->post('applicant_status');
            /*$data['register_number']        = $this->input->post('register_number');*/
            /*$data['birthday']    = $this->input->post('birthday');
            $data['sex']         = $this->input->post('sex');
            $data['address']     = $this->input->post('address');
            $data['phone']       = $this->input->post('phone');
            $data['email']       = $this->input->post('email');*/
            //exit();
            if($data['applicant_status'] == "Interview"){
                /*$data['personal_register_number']        = $this->input->post('register_number');*/
                $this->db->where('id', $param2);
                $this->db->update('osad_student_12', $data);
                $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
                redirect(base_url() . 'index.php?admin/interview_applicant/', 'refresh');
            }
            else{
                /*$this->db->where('id', $param2);
                $this->db->update('osad_student', $data);*/
                $page_data['osadStudent']    = $this->db->get('osad_student_12')->result_array();
                $page_data['page_name']  = 'auto_selection_and_short_listing';
                $page_data['page_title'] = get_phrase('interview_applicant');
                $this->load->view('backend/index', $page_data);
            }
//            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $param2 . '.jpg');
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/interview_applicant/', 'refresh');
        } else if ($param1 == 'personal_profile') {
            $page_data['personal_profile']   = true;
            $page_data['current_teacher_id'] = $param2;
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('osad_student_12', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('osad_student_12');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/interview_applicant/', 'refresh');
        }

        $page_data['osadStudent']    = $this->db->where('applicant_status =', 'Short Listed');
        $page_data['osadStudent']    = $this->db->get('osad_student_12')->result_array();
        $page_data['page_name']  = 'interview_applicant';
        $page_data['page_title'] = get_phrase('interview');
        $this->load->view('backend/index', $page_data);
    }

    function offer_letter_applicants($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'create') {

            if($_FILES['userfile']['name'] != '') {
                $filename = stripslashes($_FILES['userfile']['name']);
                $extension = strtolower($filename);
                $image_name1=time().'.'.$extension;
                $newname='uploads/student_image/'.$image_name1;
                $copied = copy($_FILES['userfile']['tmp_name'], $newname);
            }

//            $this->input->post('ff_son') = 'yes';
//            $this->input->post('upojati') = 'yes';

            $data['acd_session_id']        = $this->input->post('acd_session_id');
            $data['name_bn']        = $this->input->post('name_bn');
            $data['name_en']        = $this->input->post('name_en');
            $data['father_name']        = $this->input->post('father_name');
            $data['mother_name']        = $this->input->post('mother_name');
            $data['ff_son']        = $this->input->post('ff_son');
            $data['upjati']        = $this->input->post('upjati');
            $data['gardian_name']        = $this->input->post('gardian_name');
            $data['nationality']        = $this->input->post('nationality');
            $data['birthday']    = $this->input->post('birthday');
            $data['religion']    = $this->input->post('religion');
            $data['sex']         = $this->input->post('sex');
            $data['pr_address']     = $this->input->post('pr_address');
            $data['cur_address']     = $this->input->post('cur_address');
            $data['phone']       = $this->input->post('phone');
            $data['email']       = $this->input->post('email');
            $t1    = $this->input->post('technology1');
            $t2    = $this->input->post('technology2');
            //$t3    = $this->input->post('technology3');
            //$data['technology'] = $t1.", ".$t2.", ".$t3;
            $data['technology'] = $t1.", ".$t2;
            //exit();
            $data['app_date']    = date('Y-m-d');
            $photo=time().'.jpg';
            $data['photo']    = $image_name1;
            $this->db->insert('osad_student', $data);
            $osad_student_id = $this->db->insert_id();
            // Details
            for($i=0;$i<$this->input->post('ttldtl');$i++){

                $data1 = array(
                    'osad_student_id' => $osad_student_id,
                    'examtype' => $this->input->post('examtype'.$i, TRUE),
                    'group' => $this->input->post('group'.$i, TRUE),
                    'board' => $this->input->post('board'.$i, TRUE),
                    'passing_yr' => $this->input->post('passing_yr'.$i, TRUE),
                    'special_mark' => $this->input->post('special_mark'.$i, TRUE),
                    'ttl_mark' => $this->input->post('ttl_mark'.$i, TRUE),
                    'date' => date('Y-m-d')
                );

                $this->db->insert('osad_acd_history', $data1);

            }

            /*	if($_FILES['userfile']['userfile'] != '') {
                //$filename = stripslashes($_FILES['upload']['name']);
                //$extension = strtolower($filename);
                //$image_name1=time().'.'.$extension;
                $newname='uploads/student_image/'.$photo;
                $copied = copy($_FILES['userfile']['tmp_name'], $newname);
                 }*/

            // move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/'.$photo);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            //$this->email_model->account_opening_email('teacher', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            redirect(base_url() . 'index.php?admin/offer_letter_applicants/', 'refresh');
        }
        if ($param1 == 'do_update') {
            //$data['name_en']        = $this->input->post('name_en');
            //$data['name_bn']        = $this->input->post('name_bn');
            $data['applicant_status']        = $this->input->post('applicant_status');
            /*$data['register_number']        = $this->input->post('register_number');*/
            /*$data['birthday']    = $this->input->post('birthday');
            $data['sex']         = $this->input->post('sex');
            $data['address']     = $this->input->post('address');
            $data['phone']       = $this->input->post('phone');
            $data['email']       = $this->input->post('email');*/
            //exit();
            if($data['applicant_status'] == "Offer Letter"){
                /*$data['personal_register_number']        = $this->input->post('register_number');*/
                $this->db->where('id', $param2);
                $this->db->update('osad_student_12', $data);
                $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
                redirect(base_url() . 'index.php?admin/offer_letter_applicants/', 'refresh');
            }
            else{
                /*$this->db->where('id', $param2);
                $this->db->update('osad_student', $data);*/
                $page_data['osadStudent']    = $this->db->where('applicant_status=','Interview');
                $page_data['osadStudent']    = $this->db->get('osad_student_12')->result_array();
                $page_data['page_name']  = 'offer_letter_applicants';
                $page_data['page_title'] = get_phrase('offer_letter_applicants');
                $this->load->view('backend/index', $page_data);
            }
//            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $param2 . '.jpg');
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/offer_letter_applicants/', 'refresh');
        } else if ($param1 == 'personal_profile') {
            $page_data['personal_profile']   = true;
            $page_data['current_teacher_id'] = $param2;
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('osad_student', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('osad_student');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/offer_letter_applicants/', 'refresh');
        }

        $page_data['osadStudent']    = $this->db->where('applicant_status=','Interview');
        $page_data['osadStudent']    = $this->db->get('osad_student_12')->result_array();
        $page_data['page_name']  = 'offer_letter_applicants';
        $page_data['page_title'] = get_phrase('offer_letter');
        $this->load->view('backend/index', $page_data);
    }
    function registration_applicants($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'create') {

            if($_FILES['userfile']['name'] != '') {
                $filename = stripslashes($_FILES['userfile']['name']);
                $extension = strtolower($filename);
                $image_name1=time().'.'.$extension;
                $newname='uploads/student_image/'.$image_name1;
                $copied = copy($_FILES['userfile']['tmp_name'], $newname);
            }

//            $this->input->post('ff_son') = 'yes';
//            $this->input->post('upojati') = 'yes';

            $data['acd_session_id']        = $this->input->post('acd_session_id');
            $data['name_bn']        = $this->input->post('name_bn');
            $data['name_en']        = $this->input->post('name_en');
            $data['father_name']        = $this->input->post('father_name');
            $data['mother_name']        = $this->input->post('mother_name');
            $data['ff_son']        = $this->input->post('ff_son');
            $data['upjati']        = $this->input->post('upjati');
            $data['gardian_name']        = $this->input->post('gardian_name');
            $data['nationality']        = $this->input->post('nationality');
            $data['birthday']    = $this->input->post('birthday');
            $data['religion']    = $this->input->post('religion');
            $data['sex']         = $this->input->post('sex');
            $data['pr_address']     = $this->input->post('pr_address');
            $data['cur_address']     = $this->input->post('cur_address');
            $data['phone']       = $this->input->post('phone');
            $data['email']       = $this->input->post('email');
            $t1    = $this->input->post('technology1');
            $t2    = $this->input->post('technology2');
            //$t3    = $this->input->post('technology3');
            //$data['technology'] = $t1.", ".$t2.", ".$t3;
            $data['technology'] = $t1.", ".$t2;
            //exit();
            $data['app_date']    = date('Y-m-d');
            $photo=time().'.jpg';
            $data['photo']    = $image_name1;
            $this->db->insert('osad_student', $data);
            $osad_student_id = $this->db->insert_id();
            // Details
            for($i=0;$i<$this->input->post('ttldtl');$i++){

                $data1 = array(
                    'osad_student_id' => $osad_student_id,
                    'examtype' => $this->input->post('examtype'.$i, TRUE),
                    'group' => $this->input->post('group'.$i, TRUE),
                    'board' => $this->input->post('board'.$i, TRUE),
                    'passing_yr' => $this->input->post('passing_yr'.$i, TRUE),
                    'special_mark' => $this->input->post('special_mark'.$i, TRUE),
                    'ttl_mark' => $this->input->post('ttl_mark'.$i, TRUE),
                    'date' => date('Y-m-d')
                );

                $this->db->insert('osad_acd_history', $data1);

            }

            /*	if($_FILES['userfile']['userfile'] != '') {
                //$filename = stripslashes($_FILES['upload']['name']);
                //$extension = strtolower($filename);
                //$image_name1=time().'.'.$extension;
                $newname='uploads/student_image/'.$photo;
                $copied = copy($_FILES['userfile']['tmp_name'], $newname);
                 }*/

            // move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/'.$photo);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            //$this->email_model->account_opening_email('teacher', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            redirect(base_url() . 'index.php?admin/registration_applicants/', 'refresh');
        }
        if ($param1 == 'do_update') {
            //$data['name_en']        = $this->input->post('name_en');
            //$data['name_bn']        = $this->input->post('name_bn');
            $data['applicant_status']        = $this->input->post('applicant_status');
            /*$data['register_number']        = $this->input->post('register_number');*/
            /*$data['birthday']    = $this->input->post('birthday');
            $data['sex']         = $this->input->post('sex');
            $data['address']     = $this->input->post('address');
            $data['phone']       = $this->input->post('phone');
            $data['email']       = $this->input->post('email');*/
            //exit();
            if($data['applicant_status'] == "Registration"){
                /*$data['personal_register_number']        = $this->input->post('register_number');*/
                $this->db->where('id', $param2);
                $this->db->update('osad_student_12', $data);
                $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
                redirect(base_url() . 'index.php?admin/registration_applicants/', 'refresh');
            }
            else{
                /*$this->db->where('id', $param2);
                $this->db->update('osad_student', $data);*/
                $page_data['osadStudent']    = $this->db->where('applicant_status=','Offer Letter');
                $page_data['osadStudent']    = $this->db->get('osad_student_12')->result_array();
                $page_data['page_name']  = 'registration_applicants';
                $page_data['page_title'] = get_phrase('registration_applicants');
                $this->load->view('backend/index', $page_data);
            }
//            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $param2 . '.jpg');
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/registration_applicants/', 'refresh');
        } else if ($param1 == 'personal_profile') {
            $page_data['personal_profile']   = true;
            $page_data['current_teacher_id'] = $param2;
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('osad_student', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('osad_student');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/registration_applicants/', 'refresh');
        }

        $page_data['osadStudent']    = $this->db->where('applicant_status=','Offer Letter');
        $page_data['osadStudent']    = $this->db->get('osad_student_12')->result_array();
        $page_data['page_name']  = 'registration_applicants';
        $page_data['page_title'] = get_phrase('registration');
        $this->load->view('backend/index', $page_data);
    }

    function vehicles($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'vehicles';
        $page_data['page_title'] = get_phrase('vehicles');
        $this->load->view('backend/index', $page_data);
    }
    function text_file_converter($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'text_file_converter';
        $page_data['page_title'] = get_phrase('text_file_converter');
        $this->load->view('backend/index', $page_data);
    }
    function major_courses($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['course_name']         = $this->input->post('course_name');
            $data['course_code']         = $this->input->post('course_code');
            //$data['course_alias']         = $this->input->post('course_alias');

            $course_alias = implode(", ", $_POST['course_alias']);
            $data['course_alias']         = $course_alias;

            $this->db->insert('major_courses', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/major_courses/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['course_name']         = $this->input->post('course_name');
            $data['course_code']         = $this->input->post('course_code');
            $data['course_alias']         = $this->input->post('course_alias');

            $this->db->where('id', $param2);
            $this->db->update('major_courses', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/major_courses/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('major_courses', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('major_courses');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/major_courses/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('major_courses')->result_array();
        $page_data['page_name']  = 'major_courses';
        $page_data['page_title'] = get_phrase('major_courses_setup');
        $this->load->view('backend/index', $page_data);
    }
    function ged($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']         = $this->input->post('name');
            $data['code']         = $this->input->post('code');
            $data['alias']         = $this->input->post('alias');
            $data['description']         = $this->input->post('description');
            $data['status']         = $this->input->post('status');

            $this->db->insert('ged', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/ged/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']         = $this->input->post('name');
            $data['code']         = $this->input->post('code');
            $data['alias']         = $this->input->post('alias');
            $data['description']         = $this->input->post('description');
            $data['status']         = $this->input->post('status');

            $this->db->where('id', $param2);
            $this->db->update('ged', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/ged/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('ged', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('ged');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/ged/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('ged')->result_array();
        $page_data['page_name']  = 'ged';
        $page_data['page_title'] = get_phrase('ged_courses');
        $this->load->view('backend/index', $page_data);
    }
    function course_category($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'course_category';
        $page_data['page_title'] = get_phrase('course_category');
        $this->load->view('backend/index', $page_data);
    }
    function minor_courses($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['course_name']         = $this->input->post('course_name');
            $data['course_code']         = $this->input->post('course_code');
            //$data['course_alias']         = $this->input->post('course_alias');

            $course_alias = implode(", ", $_POST['course_alias']);
            $data['course_alias']         = $course_alias;

            $this->db->insert('minor_courses', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/minor_courses/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['course_name']         = $this->input->post('course_name');
            $data['course_code']         = $this->input->post('course_code');
            $data['course_alias']         = $this->input->post('course_alias');

            $this->db->where('id', $param2);
            $this->db->update('minor_courses', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/minor_courses/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('minor_courses', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('minor_courses');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/minor_courses/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('minor_courses')->result_array();
        $page_data['page_name']  = 'minor_courses';
        $page_data['page_title'] = get_phrase('minor_courses_setup');
        $this->load->view('backend/index', $page_data);
    }
    function payroll_accounts($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'payroll_accounts';
        $page_data['page_title'] = get_phrase('payroll_and_accounts');
        $this->load->view('backend/index', $page_data);
    }

    function store_management($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'store_management';
        $page_data['page_title'] = get_phrase('store_management');
        $this->load->view('backend/index', $page_data);
    }


    function office_time($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'office_time';
        $page_data['page_title'] = get_phrase('office_time');
        $this->load->view('backend/index', $page_data);
    }
    function attendance_fine($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'attendance_fine';
        $page_data['page_title'] = get_phrase('attendance_fine');
        $this->load->view('backend/index', $page_data);
    }
    function monthly_attendance($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'monthly_attendance';
        $page_data['page_title'] = get_phrase('monthly_attendance');
        $this->load->view('backend/index', $page_data);
    }
    function leave_head($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'leave_head';
        $page_data['page_title'] = get_phrase('leave_head');
        $this->load->view('backend/index', $page_data);
    }
    function leave_entry($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'leave_entry';
        $page_data['page_title'] = get_phrase('leave_entry');
        $this->load->view('backend/index', $page_data);
    }
    function leave_report($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'leave_report';
        $page_data['page_title'] = get_phrase('leave_report');
        $this->load->view('backend/index', $page_data);
    }
    /***************************************************************************/
    function lib_add_category($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'lib_add_category';
        $page_data['page_title'] = get_phrase('add_category');
        $this->load->view('backend/index', $page_data);
    }
    function lib_add_books($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'lib_add_books';
        $page_data['page_title'] = get_phrase('add_books');
        $this->load->view('backend/index', $page_data);
    }
    function lib_issue_book($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'lib_issue_book';
        $page_data['page_title'] = get_phrase('issue_book');
        $this->load->view('backend/index', $page_data);
    }
    function lib_request_details($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'lib_request_details';
        $page_data['page_title'] = get_phrase('request_details');
        $this->load->view('backend/index', $page_data);
    }
    function lib_book_return($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'lib_book_return';
        $page_data['page_title'] = get_phrase('book_return');
        $this->load->view('backend/index', $page_data);
    }
    function lib_reports($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'lib_reports';
        $page_data['page_title'] = get_phrase('reports');
        $this->load->view('backend/index', $page_data);
    }
    /***************************************************************************/
    function add_product_type($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'add_product_type';
        $page_data['page_title'] = get_phrase('add_product_type');
        $this->load->view('backend/index', $page_data);
    }
    function add_product_category($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'add_product_category';
        $page_data['page_title'] = get_phrase('add_product_category');
        $this->load->view('backend/index', $page_data);
    }
    function add_product($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'add_product';
        $page_data['page_title'] = get_phrase('add_product');
        $this->load->view('backend/index', $page_data);
    }
    function product_in($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'product_in';
        $page_data['page_title'] = get_phrase('product_in');
        $this->load->view('backend/index', $page_data);
    }
    function product_out($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'product_out';
        $page_data['page_title'] = get_phrase('product_out');
        $this->load->view('backend/index', $page_data);
    }
    function stock_info($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'stock_info';
        $page_data['page_title'] = get_phrase('stock_info');
        $this->load->view('backend/index', $page_data);
    }
    function product_in_report($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'product_in_report';
        $page_data['page_title'] = get_phrase('product_in_report');
        $this->load->view('backend/index', $page_data);
    }
    function product_out_report($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'product_out_report';
        $page_data['page_title'] = get_phrase('product_out_report');
        $this->load->view('backend/index', $page_data);
    }
    function stock_information($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'stock_information';
        $page_data['page_title'] = get_phrase('stock_information');
        $this->load->view('backend/index', $page_data);
    }


    function pay_head($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'pay_head';
        $page_data['page_title'] = get_phrase('pay_head');
        $this->load->view('backend/index', $page_data);
    }
    function employee_setup($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'employee_setup';
        $page_data['page_title'] = get_phrase('employee_setup');
        $this->load->view('backend/index', $page_data);
    }
    function employee_view($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'employee_view';
        $page_data['page_title'] = get_phrase('employee_view');
        $this->load->view('backend/index', $page_data);
    }
    function payroll_generate($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'payroll_generate';
        $page_data['page_title'] = get_phrase('payroll_generate');
        $this->load->view('backend/index', $page_data);
    }
    function payroll_approve($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'payroll_approve';
        $page_data['page_title'] = get_phrase('payroll_approve');
        $this->load->view('backend/index', $page_data);
    }
    function payroll_sheet($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'payroll_sheet';
        $page_data['page_title'] = get_phrase('payroll_sheet');
        $this->load->view('backend/index', $page_data);
    }




    /*function add_new_subject($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'add_new_subject';
        $page_data['page_title'] = get_phrase('add_new_subject');
        $this->load->view('backend/index', $page_data);
    }*/
    function add_grading_system($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'add_grading_system';
        $page_data['page_title'] = get_phrase('add_grading_system');
        $this->load->view('backend/index', $page_data);
    }
    /*function exam_term_create($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'exam_term_create';
        $page_data['page_title'] = get_phrase('exam_term_create');
        $this->load->view('backend/index', $page_data);
    }*/
    function subject_select($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'subject_select';
        $page_data['page_title'] = get_phrase('subject_select');
        $this->load->view('backend/index', $page_data);
    }
    function marks_entry($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'marks_entry';
        $page_data['page_title'] = get_phrase('marks_entry');
        $this->load->view('backend/index', $page_data);
    }
    function terms_trabulation_sheet($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'terms_trabulation_sheet';
        $page_data['page_title'] = get_phrase('terms_trabulation_sheet');
        $this->load->view('backend/index', $page_data);
    }
    function final_trabulation_sheet($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'final_trabulation_sheet';
        $page_data['page_title'] = get_phrase('final_trabulation_sheet');
        $this->load->view('backend/index', $page_data);
    }
    /*function term_progress_report($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'term_progress_report';
        $page_data['page_title'] = get_phrase('term_progress_report');
        $this->load->view('backend/index', $page_data);
    }*/
    /*function final_mark_sheet($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'final_mark_sheet';
        $page_data['page_title'] = get_phrase('final_mark_sheet');
        $this->load->view('backend/index', $page_data);
    }*/
/* Management Information System */
    function management_information_system($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'management_information_system';
        $page_data['page_title'] = get_phrase('management_information_system');
        $this->load->view('backend/index', $page_data);
    }
    function students($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'students';
        $page_data['page_title'] = get_phrase('students');
        $this->load->view('backend/index', $page_data);
    }
    function teaching($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'teaching';
        $page_data['page_title'] = get_phrase('teaching');
        $this->load->view('backend/index', $page_data);
    }
    function examination($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'examination';
        $page_data['page_title'] = get_phrase('examination');
        $this->load->view('backend/index', $page_data);
    }

    /* ************************** Examination System ************************** */
    function calendar_exam($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'calendar_exam';
        $page_data['page_title'] = get_phrase('calendar_examination');
        $this->load->view('backend/index', $page_data);
    }
    function timetable_exam($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'timetable_exam';
        $page_data['page_title'] = get_phrase('timetable_management_&_planning');
        $this->load->view('backend/index', $page_data);
    }
    function marks_setup($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['ProgramName']         = $this->input->post('ProgramName');
            $data['Batch']         = $this->input->post('Batch');
            $data['ExamName']         = $this->input->possparticularst('ExamName');
            $data['Particulars']         = $this->input->post('Particulars');
            $data['Marks']         = $this->input->post('Marks');

            $this->db->insert('marks_setup', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/marks_setup/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['ProgramName']         = $this->input->post('ProgramName');
            $data['Batch']         = $this->input->post('Batch');
            $data['ExamName']         = $this->input->post('ExamName');
            $data['Particulars']         = $this->input->post('Particulars');
            $data['Marks']         = $this->input->post('Marks');

            $this->db->where('id', $param2);
            $this->db->update('marks_setup', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/marks_setup/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('marks_setup', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('marks_setup');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/marks_setup/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('marks_setup')->result_array();
        $page_data['page_name']  = 'marks_setup';
        $page_data['page_title'] = get_phrase('marks_setup');
        $this->load->view('backend/index', $page_data);
    }

    function questions_paper_setup($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['ProgramName']         = $this->input->post('ProgramName');
            $data['Batch']         = $this->input->post('Batch');
            $data['Semester']         = $this->input->post('Semester');
            $data['ExamName']         = $this->input->post('ExamName');
            $data['CourseName']         = $this->input->post('CourseName');
            $data['Time']         = $this->input->post('Time');
            $data['FullMarks']         = $this->input->post('FullMarks');
            $data['Notification']         = $this->input->post('Notification');
            $data['Contents']         = $this->input->post('Contents');
            //exit();
            $this->db->insert('questions_paper_setup', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/questions_paper_setup/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['ProgramName']         = $this->input->post('ProgramName');
            $data['Batch']         = $this->input->post('Batch');
            $data['Semester']         = $this->input->post('Semester');
            $data['ExamName']         = $this->input->post('ExamName');
            $data['CourseName']         = $this->input->post('CourseName');
            $data['Time']         = $this->input->post('Time');
            $data['FullMarks']         = $this->input->post('FullMarks');
            $data['Notification']         = $this->input->post('Notification');
            $data['Contents']         = $this->input->post('Contents');

            $this->db->where('id', $param2);
            $this->db->update('questions_paper_setup', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/questions_paper_setup/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('questions_paper_setup', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('questions_paper_setup');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/questions_paper_setup/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('questions_paper_setup')->result_array();
        $page_data['page_name']  = 'questions_paper_setup';
        $page_data['page_title'] = get_phrase('questions_paper_setup');
        $this->load->view('backend/index', $page_data);
    }

    function grading_system($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['Range']         = $this->input->post('Range');
            $data['LetterGrade']         = $this->input->post('LetterGrade');
            $data['GradePoint']         = $this->input->post('GradePoint');
            $data['Comment']         = $this->input->post('Comment');

            $this->db->insert('grading_system', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/grading_system/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['Range']         = $this->input->post('Range');
            $data['LetterGrade']         = $this->input->post('LetterGrade');
            $data['GradePoint']         = $this->input->post('GradePoint');
            $data['Comment']         = $this->input->post('Comment');

            $this->db->where('id', $param2);
            $this->db->update('grading_system', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/grading_system/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('grading_system', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('grading_system');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/grading_system/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('grading_system')->result_array();
        $page_data['page_name']  = 'grading_system';
        $page_data['page_title'] = get_phrase('grading_system');
        $this->load->view('backend/index', $page_data);
    }

    function add_new_subject($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'add_new_subject';
        $page_data['page_title'] = get_phrase('add_new_subject');
        $this->load->view('backend/index', $page_data);
    }
    function arrears($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'arrears';
        $page_data['page_title'] = get_phrase('arrears');
        $this->load->view('backend/index', $page_data);
    }
    function exam_set_term($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = date('Y-m-d',strtotime($this->input->post('receipt_no')));
            $data['description']         = date('Y-m-d',strtotime($this->input->post('description')));

            $this->db->insert('exam_set_term', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/exam_set_term/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = date('Y-m-d',strtotime($this->input->post('receipt_no')));
            $data['description']         = date('Y-m-d',strtotime($this->input->post('description')));

            $this->db->where('id', $param2);
            $this->db->update('exam_set_term', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/exam_set_term/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('exam_set_term', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('exam_set_term');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/exam_set_term/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('exam_set_term')->result_array();
        $page_data['page_name']  = 'exam_set_term';
        $page_data['page_title'] = get_phrase('exam_set_term');
        $this->load->view('backend/index', $page_data);
    }
    function exam_enter_marks($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');
            $data['batch']         = $this->input->post('batch');
            $data['subject']         = $this->input->post('subject');
            $data['personal_roll_no']         = $this->input->post('personal_roll_no');
            $data['max_mark']         = $this->input->post('max_mark');
            $data['obt_mark']         = $this->input->post('obt_mark');
            $data['attn_mark']         = $this->input->post('attn_mark');
            $data['comment']         = $this->input->post('comment');

            $this->db->insert('exam_enter_marks', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/exam_enter_marks/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');
            $data['batch']         = $this->input->post('batch');
            $data['subject']         = $this->input->post('subject');
            $data['personal_roll_no']         = $this->input->post('personal_rol_no');
            $data['max_mark']         = $this->input->post('max_mark');
            $data['obt_mark']         = $this->input->post('obt_mark');
            $data['attn_mark']         = $this->input->post('attn_mark');
            $data['comment']         = $this->input->post('comment');

            $this->db->where('id', $param2);
            $this->db->update('exam_enter_marks', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/exam_enter_marks/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('exam_enter_marks', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('exam_enter_marks');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/exam_enter_marks/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('exam_enter_marks')->result_array();
        $page_data['page_name']  = 'exam_enter_marks';
        $page_data['page_title'] = get_phrase('exam_enter_marks');
        $this->load->view('backend/index', $page_data);
    }
    function exam_set_grade_scale($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');
            $data['grade_point']         = $this->input->post('grade_point');

            $this->db->insert('exam_set_grade_scale', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/exam_set_grade_scale/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');
            $data['grade_point']         = $this->input->post('grade_point');

            $this->db->where('id', $param2);
            $this->db->update('exam_set_grade_scale', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/exam_set_grade_scale/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('exam_set_grade_scale', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('exam_set_grade_scale');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/exam_set_grade_scale/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('exam_set_grade_scale')->result_array();
        $page_data['page_name']  = 'exam_set_grade_scale';
        $page_data['page_title'] = get_phrase('exam_set_grade_scale');
        $this->load->view('backend/index', $page_data);
    }
    function exam_set_exam($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');
            $data['exam_name']         = $this->input->post('exam_name');
            $data['subject']         = $this->input->post('subject');
            $data['max_mark']         = $this->input->post('max_mark');
            $data['pass_mark']         = $this->input->post('pass_mark');
            $data['exam_date']         = date('Y-m-d',strtotime($this->input->post('exam_date')));
            $data['start_time']         = $this->input->post('start_time');
            $data['end_time']         = $this->input->post('end_time');

            $this->db->insert('exam_set_exam', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/exam_set_exam/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');
            $data['exam_name']         = $this->input->post('exam_name');
            $data['subject']         = $this->input->post('subject');
            $data['max_mark']         = $this->input->post('max_mark');
            $data['pass_mark']         = $this->input->post('pass_mark');
            $data['exam_date']         = date('Y-m-d',strtotime($this->input->post('exam_date')));
            $data['start_time']         = $this->input->post('start_time');
            $data['end_time']         = $this->input->post('end_time');

            $this->db->where('id', $param2);
            $this->db->update('exam_set_exam', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/exam_set_exam/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('exam_set_exam', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('exam_set_exam');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/exam_set_exam/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('exam_set_exam')->result_array();
        $page_data['page_name']  = 'exam_set_exam';
        $page_data['page_title'] = get_phrase('exam_set_exam');
        $this->load->view('backend/index', $page_data);
    }
    function exam_mark_distribution($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');

            $this->db->insert('exam_mark_distribution', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/exam_mark_distribution/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');

            $this->db->where('id', $param2);
            $this->db->update('exam_mark_distribution', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/exam_mark_distribution/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('exam_mark_distribution', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('exam_mark_distribution');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/exam_mark_distribution/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('exam_mark_distribution')->result_array();
        $page_data['page_name']  = 'exam_mark_distribution';
        $page_data['page_title'] = get_phrase('exam_mark_distribution');
        $this->load->view('backend/index', $page_data);
    }

    function exam_enter_assessment_mark($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');

            $this->db->insert('exam_enter_assessment_mark', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/exam_enter_assessment_mark/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');

            $this->db->where('id', $param2);
            $this->db->update('exam_enter_assessment_mark', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/exam_enter_assessment_mark/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('exam_enter_assessment_mark', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('exam_enter_assessment_mark');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/exam_enter_assessment_mark/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('exam_enter_assessment_mark')->result_array();
        $page_data['page_name']  = 'exam_enter_assessment_mark';
        $page_data['page_title'] = get_phrase('exam_enter_assessment_mark');
        $this->load->view('backend/index', $page_data);
    }

    function exam_set_assessment($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');
            $data['max_mark']         = $this->input->post('max_mark');

            $this->db->insert('exam_set_assessment', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/exam_set_assessment/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');
            $data['max_mark']         = $this->input->post('max_mark');

            $this->db->where('id', $param2);
            $this->db->update('exam_set_assessment', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/exam_set_assessment/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('exam_set_assessment', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('exam_set_assessment');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/exam_set_assessment/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('exam_set_assessment')->result_array();
        $page_data['page_name']  = 'exam_set_assessment';
        $page_data['page_title'] = get_phrase('set_assessment');
        $this->load->view('backend/index', $page_data);
    }

    function exam_assess_mark_list($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');

            $this->db->insert('exam_assess_mark_list', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/exam_assess_mark_list/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');

            $this->db->where('id', $param2);
            $this->db->update('exam_assess_mark_list', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/exam_assess_mark_list/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('exam_assess_mark_list', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('exam_assess_mark_list');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/exam_assess_mark_list/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('exam_assess_mark_list')->result_array();
        $page_data['page_name']  = 'exam_assess_mark_list';
        $page_data['page_title'] = get_phrase('exam_assess_mark_list');
        $this->load->view('backend/index', $page_data);
    }

    function exam_create_exam($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');

            $this->db->insert('exam_create_exam', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/exam_create_exam/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');

            $this->db->where('id', $param2);
            $this->db->update('exam_create_exam', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/exam_create_exam/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('exam_create_exam', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('exam_create_exam');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/exam_create_exam/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('exam_create_exam')->result_array();
        $page_data['page_name']  = 'exam_create_exam';
        $page_data['page_title'] = get_phrase('exam_create_exam');
        $this->load->view('backend/index', $page_data);
    }
    function exam_term_create($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'exam_term_create';
        $page_data['page_title'] = get_phrase('exam_term_create');
        $this->load->view('backend/index', $page_data);
    }
    function subject_marks_verification($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'subject_marks_verification';
        $page_data['page_title'] = get_phrase('subject_marks_verification');
        $this->load->view('backend/index', $page_data);
    }
    function terms_tabulation_sheet($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'terms_tabulation_sheet';
        $page_data['page_title'] = get_phrase('terms_tabulation_sheet');
        $this->load->view('backend/index', $page_data);
    }
    function final_tabulation_sheet($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'final_tabulation_sheet';
        $page_data['page_title'] = get_phrase('final_tabulation_sheet');
        $this->load->view('backend/index', $page_data);
    }
    function term_progress_report($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'term_progress_report';
        $page_data['page_title'] = get_phrase('term_progress_report');
        $this->load->view('backend/index', $page_data);
    }
    function final_mark_sheet($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'final_mark_sheet';
        $page_data['page_title'] = get_phrase('final_mark_sheet');
        $this->load->view('backend/index', $page_data);
    }

    function barred_students($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'barred_students';
        $page_data['page_title'] = get_phrase('barred_students');
        $this->load->view('backend/index', $page_data);
    }
    function exam_slip($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'exam_slip';
        $page_data['page_title'] = get_phrase('exam_slip');
        $this->load->view('backend/index', $page_data);
    }
    function smart_scan($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'smart_scan';
        $page_data['page_title'] = get_phrase('smart_scan');
        $this->load->view('backend/index', $page_data);
    }
    function appeal_for_regrading($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'appeal_for_regrading';
        $page_data['page_title'] = get_phrase('appeal_for_regrading');
        $this->load->view('backend/index', $page_data);
    }
    function transcript_management($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'transcript_management';
        $page_data['page_title'] = get_phrase('transcript_management');
        $this->load->view('backend/index', $page_data);
    }
    function graduation_management($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'graduation_management';
        $page_data['page_title'] = get_phrase('graduation_management');
        $this->load->view('backend/index', $page_data);
    }
    function gowns_loaned($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'gowns_loaned';
        $page_data['page_title'] = get_phrase('gowns_loaned');
        $this->load->view('backend/index', $page_data);
    }

    function orientation($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'orientation';
        $page_data['page_title'] = get_phrase('orientation');
        $this->load->view('backend/index', $page_data);
    }
    function activities($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'activities';
        $page_data['page_title'] = get_phrase('activities');
        $this->load->view('backend/index', $page_data);
    }
    function counseling_advising($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'counseling_advising';
        $page_data['page_title'] = get_phrase('counseling_&_advising');
        $this->load->view('backend/index', $page_data);
    }
    function student_group($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'student_group';
        $page_data['page_title'] = get_phrase('student_group');
        $this->load->view('backend/index', $page_data);
    }
    function magazine_alumni($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'magazine_alumni';
        $page_data['page_title'] = get_phrase('magazine_alumni');
        $this->load->view('backend/index', $page_data);
    }
	/* ************************** Examination System ************************** */
    function messages_crm($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'messages_crm';
        $page_data['page_title'] = get_phrase('messages_crm');
        $this->load->view('backend/index', $page_data);
    }
    function teachers_students_parents($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'teachers_students_parents';
        $page_data['page_title'] = get_phrase('teachers_students_parents');
        $this->load->view('backend/index', $page_data);
    }
    function complaints($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'complaints';
        $page_data['page_title'] = get_phrase('complaints');
        $this->load->view('backend/index', $page_data);
    }
    function faqs_crm($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'faqs_crm';
        $page_data['page_title'] = get_phrase('faqs_crm');
        $this->load->view('backend/index', $page_data);
    }
    function report_statistics($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'report_statistics';
        $page_data['page_title'] = get_phrase('report_statistics');
        $this->load->view('backend/index', $page_data);
    }
    /********************************************/
    function applications_lms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'applications_lms';
        $page_data['page_title'] = get_phrase('applications_lms');
        $this->load->view('backend/index', $page_data);
    }
    function registration_lms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'registration_lms';
        $page_data['page_title'] = get_phrase('registration_lms');
        $this->load->view('backend/index', $page_data);
    }
    function bulk_registration_lms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'bulk_registration_lms';
        $page_data['page_title'] = get_phrase('bulk_registration_lms');
        $this->load->view('backend/index', $page_data);
    }
    function enrollment_lms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'enrollment_lms';
        $page_data['page_title'] = get_phrase('enrollment_lms');
        $this->load->view('backend/index', $page_data);
    }
    function status_lms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'status_lms';
        $page_data['page_title'] = get_phrase('status_lms');
        $this->load->view('backend/index', $page_data);
    }
    /********************************************/
    function students_report($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'students_report';
        $page_data['page_title'] = get_phrase('students_report');
        $this->load->view('backend/index', $page_data);
    }
    function degrees_certificates($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'degrees_certificates';
        $page_data['page_title'] = get_phrase('degrees_certificates');
        $this->load->view('backend/index', $page_data);
    }
    function list_of_degrees_certificates($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'list_of_degrees_certificates';
        $page_data['page_title'] = get_phrase('list_of_degrees_certificates');
        $this->load->view('backend/index', $page_data);
    }
    function curriculum_guides_for_certificate($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'curriculum_guides_for_certificate';
        $page_data['page_title'] = get_phrase('curriculum_guides_for_certificate');
        $this->load->view('backend/index', $page_data);
    }
    function learning_academic_services($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'learning_academic_services';
        $page_data['page_title'] = get_phrase('learning_academic_services');
        $this->load->view('backend/index', $page_data);
    }
    function learning_skills_courses($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'learning_skills_courses';
        $page_data['page_title'] = get_phrase('learning_skills_courses');
        $this->load->view('backend/index', $page_data);
    }
    function academic_computing_centers($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'academic_computing_centers';
        $page_data['page_title'] = get_phrase('academic_computing_centers');
        $this->load->view('backend/index', $page_data);
    }
    function study_practice_rooms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'study_practice_rooms';
        $page_data['page_title'] = get_phrase('study_practice_rooms');
        $this->load->view('backend/index', $page_data);
    }
    function forum($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'forum';
        $page_data['page_title'] = get_phrase('forum');
        $this->load->view('backend/index', $page_data);
    }
    /********************************************/
    function user_management_lms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'user_management_lms';
        $page_data['page_title'] = get_phrase('user_management_lms');
        $this->load->view('backend/index', $page_data);
    }
    function users_management_lms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'users_management_lms';
        $page_data['page_title'] = get_phrase('users_management_lms');
        $this->load->view('backend/index', $page_data);
    }
    function CSV_operations_lms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'CSV_operations_lms';
        $page_data['page_title'] = get_phrase('CSV_operations_lms');
        $this->load->view('backend/index', $page_data);
    }
    function roles_management_lms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'roles_management_lms';
        $page_data['page_title'] = get_phrase('roles_management_lms');
        $this->load->view('backend/index', $page_data);
    }
    function groups_classes_lms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'groups_classes_lms';
        $page_data['page_title'] = get_phrase('groups_classes_lms');
        $this->load->view('backend/index', $page_data);
    }
    function group_managers_lms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'group_managers_lms';
        $page_data['page_title'] = get_phrase('group_managers_lms');
        $this->load->view('backend/index', $page_data);
    }
    function assistants_lms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'assistants_lms';
        $page_data['page_title'] = get_phrase('assistants_lms');
        $this->load->view('backend/index', $page_data);
    }
    function group_members_lms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'group_members_lms';
        $page_data['page_title'] = get_phrase('group_members_lms');
        $this->load->view('backend/index', $page_data);
    }
    function students_management_lms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'students_management_lms';
        $page_data['page_title'] = get_phrase('students_management_lms');
        $this->load->view('backend/index', $page_data);
    }
    function assesment_tool_lms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'assesment_tool_lms';
        $page_data['page_title'] = get_phrase('assesment_tool_lms');
        $this->load->view('backend/index', $page_data);
    }
    function online_test_lms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'online_test_lms';
        $page_data['page_title'] = get_phrase('online_test_lms');
        $this->load->view('backend/index', $page_data);
    }
    function question_bank_lms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'question_bank_lms';
        $page_data['page_title'] = get_phrase('question_bank_lms');
        $this->load->view('backend/index', $page_data);
    }
    function assignment_lms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'assignment_lms';
        $page_data['page_title'] = get_phrase('assignment_lms');
        $this->load->view('backend/index', $page_data);
    }
    function grade_book_lms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'grade_book_lms';
        $page_data['page_title'] = get_phrase('grade_book_lms');
        $this->load->view('backend/index', $page_data);
    }
    /********************************************/
    function add_product_type_store($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'add_product_type_store';
        $page_data['page_title'] = get_phrase('add_product_type_store');
        $this->load->view('backend/index', $page_data);
    }
    function add_product_category_store($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'add_product_category_store';
        $page_data['page_title'] = get_phrase('add_product_category_store');
        $this->load->view('backend/index', $page_data);
    }
    function add_product_store($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'add_product_store';
        $page_data['page_title'] = get_phrase('add_product_store');
        $this->load->view('backend/index', $page_data);
    }
    function product_in_store($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'product_in_store';
        $page_data['page_title'] = get_phrase('product_in_store');
        $this->load->view('backend/index', $page_data);
    }
    function product_out_store($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'product_out_store';
        $page_data['page_title'] = get_phrase('product_out_store');
        $this->load->view('backend/index', $page_data);
    }
    function stock_info_store($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'stock_info_store';
        $page_data['page_title'] = get_phrase('stock_info_store');
        $this->load->view('backend/index', $page_data);
    }
    function product_in_report_store($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'product_in_report_store';
        $page_data['page_title'] = get_phrase('product_in_report_store');
        $this->load->view('backend/index', $page_data);
    }
    function product_out_report_store($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'product_out_report_store';
        $page_data['page_title'] = get_phrase('product_out_report_store');
        $this->load->view('backend/index', $page_data);
    }
    function stock_information_store($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'stock_information_store';
        $page_data['page_title'] = get_phrase('stock_information_store');
        $this->load->view('backend/index', $page_data);
    }
    function services_schedule_ams($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'services_schedule_ams';
        $page_data['page_title'] = get_phrase('services_schedule_ams');
        $this->load->view('backend/index', $page_data);
    }
    function maintenance_records_ams($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'maintenance_records_ams';
        $page_data['page_title'] = get_phrase('maintenance_records_ams');
        $this->load->view('backend/index', $page_data);
    }
    function dashboard_fms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'dashboard_fms';
        $page_data['page_title'] = get_phrase('dashboard_fms');
        $this->load->view('backend/index', $page_data);
    }
    function configuration_fms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'configuration_fms';
        $page_data['page_title'] = get_phrase('configuration_fms');
        $this->load->view('backend/index', $page_data);
    }
    function reports_fms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'reports_fms';
        $page_data['page_title'] = get_phrase('reports_fms');
        $this->load->view('backend/index', $page_data);
    }
    /********************************************/
    function libraries($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'libraries';
        $page_data['page_title'] = get_phrase('libraries');
        $this->load->view('backend/index', $page_data);
    }
    function finding_the_library($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'finding_the_library';
        $page_data['page_title'] = get_phrase('finding_the_library');
        $this->load->view('backend/index', $page_data);
    }
    function library_hours($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'library_hours';
        $page_data['page_title'] = get_phrase('library_hours');
        $this->load->view('backend/index', $page_data);
    }
    function library_workshops($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'library_workshops';
        $page_data['page_title'] = get_phrase('library_workshops');
        $this->load->view('backend/index', $page_data);
    }
    function study_rooms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'study_rooms';
        $page_data['page_title'] = get_phrase('study_rooms');
        $this->load->view('backend/index', $page_data);
    }
    function borrowing_renewing($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'borrowing_renewing';
        $page_data['page_title'] = get_phrase('borrowing_renewing');
        $this->load->view('backend/index', $page_data);
    }
    function computers_printing($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'computers_printing';
        $page_data['page_title'] = get_phrase('computers_printing');
        $this->load->view('backend/index', $page_data);
    }
    function ask_a_librarian($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'ask_a_librarian';
        $page_data['page_title'] = get_phrase('ask_a_librarian');
        $this->load->view('backend/index', $page_data);
    }
    function training_guidelines($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'training_guidelines';
        $page_data['page_title'] = get_phrase('training_guidelines');
        $this->load->view('backend/index', $page_data);
    }
    function faculty_resources($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'faculty_resources';
        $page_data['page_title'] = get_phrase('faculty_resources');
        $this->load->view('backend/index', $page_data);
    }
    function books_management($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'books_management';
        $page_data['page_title'] = get_phrase('books_management');
        $this->load->view('backend/index', $page_data);
    }
    function training_materials($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'training_materials';
        $page_data['page_title'] = get_phrase('training_materials');
        $this->load->view('backend/index', $page_data);
    }
    function higher_education_materials($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'higher_education_materials';
        $page_data['page_title'] = get_phrase('higher_education_materials');
        $this->load->view('backend/index', $page_data);
    }
    /*function reports_fms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'reports_fms';
        $page_data['page_title'] = get_phrase('reports_fms');
        $this->load->view('backend/index', $page_data);
    }*/
    function training_support($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'training_support';
        $page_data['page_title'] = get_phrase('training_support');
        $this->load->view('backend/index', $page_data);
    }
    function inventory_report_library($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'inventory_report_library';
        $page_data['page_title'] = get_phrase('inventory_report_library');
        $this->load->view('backend/index', $page_data);
    }
    function product_in_report_library($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'product_in_report_library';
        $page_data['page_title'] = get_phrase('product_in_report_library');
        $this->load->view('backend/index', $page_data);
    }
    function product_out_report_library($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'product_out_report_library';
        $page_data['page_title'] = get_phrase('product_out_report_library');
        $this->load->view('backend/index', $page_data);
    }
    function stock_information_library($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'stock_information_library';
        $page_data['page_title'] = get_phrase('stock_information_library');
        $this->load->view('backend/index', $page_data);
    }
    /********************************************/
    function dashboard_research($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'dashboard_research';
        $page_data['page_title'] = get_phrase('dashboard_research');
        $this->load->view('backend/index', $page_data);
    }
    function announcement_of_research_grants($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'announcement_of_research_grants';
        $page_data['page_title'] = get_phrase('announcement_of_research_grants');
        $this->load->view('backend/index', $page_data);
    }
    function instruction_research($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'instruction_research';
        $page_data['page_title'] = get_phrase('instruction_research');
        $this->load->view('backend/index', $page_data);
    }
    function application_research($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'application_research';
        $page_data['page_title'] = get_phrase('application_research');
        $this->load->view('backend/index', $page_data);
    }
    function statistics_reports_research($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'statistics_reports_research';
        $page_data['page_title'] = get_phrase('statistics_reports_research');
        $this->load->view('backend/index', $page_data);
    }
    function announcement_of_research_assistant($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'announcement_of_research_assistant';
        $page_data['page_title'] = get_phrase('announcement_of_research_assistant');
        $this->load->view('backend/index', $page_data);
    }
    function instruction_assistant($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'instruction_assistant';
        $page_data['page_title'] = get_phrase('instruction_assistant');
        $this->load->view('backend/index', $page_data);
    }
    function application_assistant($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'application_assistant';
        $page_data['page_title'] = get_phrase('application_research_assistant');
        $this->load->view('backend/index', $page_data);
    }
    function statistics_reports_assistant($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'statistics_reports_assistant';
        $page_data['page_title'] = get_phrase('statistics_reports_assistant');
        $this->load->view('backend/index', $page_data);
    }
    function announcement_of_conference_seminar($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'announcement_of_conference_seminar';
        $page_data['page_title'] = get_phrase('announcement_of_conference_seminar');
        $this->load->view('backend/index', $page_data);
    }
    function instruction_seminar($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'instruction_seminar';
        $page_data['page_title'] = get_phrase('instruction_seminar');
        $this->load->view('backend/index', $page_data);
    }
    function application_seminar($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'application_seminar';
        $page_data['page_title'] = get_phrase('application_seminar');
        $this->load->view('backend/index', $page_data);
    }
    function statistics_reports_seminar($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'statistics_reports_seminar';
        $page_data['page_title'] = get_phrase('statistics_reports_seminar');
        $this->load->view('backend/index', $page_data);
    }
    function students_mis($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'students_mis';
        $page_data['page_title'] = get_phrase('students_information');
        $this->load->view('backend/index', $page_data);
    }
    function teaching_mis($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'teaching_mis';
        $page_data['page_title'] = get_phrase('teaching_information');
        $this->load->view('backend/index', $page_data);
    }
    function examination_mis($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'examination_mis';
        $page_data['page_title'] = get_phrase('examination_information_system');
        $this->load->view('backend/index', $page_data);
    }
    function examination_information_id($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'examination_information_id';
        $page_data['page_title'] = get_phrase('student_id');
        $this->load->view('backend/index', $page_data);
    }
    function human_resource_mis($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'human_resource_mis';
        $page_data['page_title'] = get_phrase('human_resource_information_system');
        $this->load->view('backend/index', $page_data);
    }
    function finance_mis($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'finance_mis';
        $page_data['page_title'] = get_phrase('financial_information');
        $this->load->view('backend/index', $page_data);
    }
    /********************************************/
    function environment_setup($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'environment_setup';
        $page_data['page_title'] = get_phrase('environment_setup');
        $this->load->view('backend/index', $page_data);
    }
    function calendar_timetable($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'calendar_timetable';
        $page_data['page_title'] = get_phrase('calendar_timetable');
        $this->load->view('backend/index', $page_data);
    }
    function week_days_timetable($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'week_days_timetable';
        $page_data['page_title'] = get_phrase('week_days_timetable');
        $this->load->view('backend/index', $page_data);
    }
    function class_routine_timetable($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'class_routine_timetable';
        $page_data['page_title'] = get_phrase('class_routine_timetable');
        $this->load->view('backend/index', $page_data);
    }
    function class_cancellation_timetable($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'class_cancellation_timetable';
        $page_data['page_title'] = get_phrase('class_cancellation_timetable');
        $this->load->view('backend/index', $page_data);
    }
    function timetable($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'timetable';
        $page_data['page_title'] = get_phrase('timetable');
        $this->load->view('backend/index', $page_data);
    }
    function track_reporting_timetable($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'track_reporting_timetable';
        $page_data['page_title'] = get_phrase('track_reporting_timetable');
        $this->load->view('backend/index', $page_data);
    }


    function set_time_table($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'set_time_table';
        $page_data['page_title'] = get_phrase('set_time_table');
        $this->load->view('backend/index', $page_data);
    }

    /*function attendance_mark_setup($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'attendance_mark_setup';
        $page_data['page_title'] = get_phrase('attendance_mark_setup');
        $this->load->view('backend/index', $page_data);
    }*/
    function attendance_mark_setup($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');

            $this->db->insert('attendance_mark_setup', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/attendance_mark_setup/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');

            $this->db->where('id', $param2);
            $this->db->update('attendance_mark_setup', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/attendance_mark_setup/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('attendance_mark_setup', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('attendance_mark_setup');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/attendance_mark_setup/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('attendance_mark_setup')->result_array();
        $page_data['page_name']  = 'attendance_mark_setup';
        $page_data['page_title'] = get_phrase('attendance_mark_setup');
        $this->load->view('backend/index', $page_data);
    }
    function admission_subjects_list($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');

            $this->db->insert('admission_subjects_list', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/admission_subjects_list/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');

            $this->db->where('id', $param2);
            $this->db->update('admission_subjects_list', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/admission_subjects_list/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('admission_subjects_list', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('admission_subjects_list');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/admission_subjects_list/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('admission_subjects_list')->result_array();
        $page_data['page_name']  = 'admission_subjects_list';
        $page_data['page_title'] = get_phrase('admission_subjects_list');
        $this->load->view('backend/index', $page_data);
    }
    function admission_mark_setup($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            $id = implode(',', $this->input->post('id[]'));
            $data['RegisterNumber'] = json_encode($id);
            //$RegisterNumber = implode(',', $this->input->post('RegisterNumber[]'));

            $AdmMarksObtained = implode(',', $this->input->post('AdmMarksObtained[]'));
            $data['AdmMarksObtained'] = json_encode($AdmMarksObtained);
            //$AdmMarksObtained1 = implode(',', $this->input->post('AdmMarksObtained[]'));

            //$data['TotalMark']         = $this->input->post('TotalMark');
            $TotalMark         = $this->input->post('TotalMark');
            //exit();
            $str1213 = substr($data['AdmMarksObtained'],1,-1);
            $val1213 = explode(',', $str1213);

            $str12 = substr($data['RegisterNumber'],1,-1);
            $val12 = explode(',', $str12);

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
            //exit();
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/online_admission/', 'refresh');
        }
        if ($param1 == 'do_update') {

            $data['register_number'] = $this->input->post('register_number');
            $data['name'] = $this->input->post('name');
            $data['physics'] = $this->input->post('physics');
            $data['chemistry'] = $this->input->post('chemistry');
            $data['mathmatics'] = $this->input->post('mathmatics');
            $data['english'] = $this->input->post('english');
            $data['previous_exam'] = $this->input->post('previous_exam');
            $data['obtained_mark'] = $this->input->post('obtained_mark');
            $data['total_mark'] = $this->input->post('total_mark');
            $data['position'] = $this->input->post('position');


            $this->db->where('id', $param2);
            $this->db->update('admission_mark_setup', $data);

                $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/admission_mark_setup/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('admission_mark_setup', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('admission_mark_setup');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/admission_mark_setup/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('admission_mark_setup')->result_array();
        $page_data['page_name']  = 'admission_mark_setup';
        $page_data['page_title'] = get_phrase('admission_mark_setup');
        $this->load->view('backend/index', $page_data);
    }
    function active_time_table($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'active_time_table';
        $page_data['page_title'] = get_phrase('active_time_table');
        $this->load->view('backend/index', $page_data);
    }
    function view_batch_time_table($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'view_batch_time_table';
        $page_data['page_title'] = get_phrase('view_batch_time_table');
        $this->load->view('backend/index', $page_data);
    }
    function view_teacher_time_table($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'view_teacher_time_table';
        $page_data['page_title'] = get_phrase('view_teacher_time_table');
        $this->load->view('backend/index', $page_data);
    }
    function proxy($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'proxy';
        $page_data['page_title'] = get_phrase('proxy');
        $this->load->view('backend/index', $page_data);
    }
    function working_hours($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'working_hours';
        $page_data['page_title'] = get_phrase('working_hours');
        $this->load->view('backend/index', $page_data);
    }
    /********************************************/
    function hostel_details($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'hostel_details';
        $page_data['page_title'] = get_phrase('hostel_details');
        $this->load->view('backend/index', $page_data);
    }
    function hostel_room($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'hostel_room';
        $page_data['page_title'] = get_phrase('hostel_room');
        $this->load->view('backend/index', $page_data);
    }
    function hostel_allocation($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'hostel_allocation';
        $page_data['page_title'] = get_phrase('hostel_allocation');
        $this->load->view('backend/index', $page_data);
    }
    function request_details($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'request_details';
        $page_data['page_title'] = get_phrase('request_details');
        $this->load->view('backend/index', $page_data);
    }
    function hostel_transfer($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'hostel_transfer';
        $page_data['page_title'] = get_phrase('hostel_transfer');
        $this->load->view('backend/index', $page_data);
    }
    function hostel_register($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'hostel_register';
        $page_data['page_title'] = get_phrase('hostel_register');
        $this->load->view('backend/index', $page_data);
    }
    function hostel_visitors($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'hostel_visitors';
        $page_data['page_title'] = get_phrase('hostel_visitors');
        $this->load->view('backend/index', $page_data);
    }
    function hostel_fee_collection($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'hostel_fee_collection';
        $page_data['page_title'] = get_phrase('hostel_fee_collection');
        $this->load->view('backend/index', $page_data);
    }
    function hostel_details_reports($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'hostel_details_reports';
        $page_data['page_title'] = get_phrase('hostel_details_reports');
        $this->load->view('backend/index', $page_data);
    }


    function std_fee_category($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');

            $this->db->insert('std_fee_category', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/std_fee_category/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');

            $this->db->where('id', $param2);
            $this->db->update('std_fee_category', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/std_fee_category/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('std_fee_category', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('std_fee_category');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/std_fee_category/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('std_fee_category')->result_array();
        $page_data['page_name']  = 'std_fee_category';
        $page_data['page_title'] = get_phrase('student_fee_category');
        $this->load->view('backend/index', $page_data);
    }

    function std_fee_sub_category($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            //$data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');
            //$data['fee_type']         = $this->input->post('fee_type');

            $this->db->insert('std_fee_sub_category', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/std_fee_sub_category/', 'refresh');
        }
        if ($param1 == 'do_update') {
            //$data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');
            //$data['fee_type']         = $this->input->post('fee_type');

            $this->db->where('id', $param2);
            $this->db->update('std_fee_sub_category', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/std_fee_sub_category/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('std_fee_sub_category', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('std_fee_sub_category');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/std_fee_sub_category/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('std_fee_sub_category')->result_array();
        $page_data['page_name']  = 'std_fee_sub_category';
        $page_data['page_title'] = get_phrase('fee_structure');
        $this->load->view('backend/index', $page_data);
    }
    function std_syllabus($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['BatchName']         = $this->input->post('BatchName');
            $data['Semester']         = $this->input->post('Semester');

            if($_FILES['Content']['name']){
                $uploaddirr = './uploads/syllabus/';
                $photoApplicant = $uploaddirr . basename($_FILES['Content']['name']);
                if (move_uploaded_file($_FILES['Content']['tmp_name'], $photoApplicant)) {} else {}
                $data['Content']            = $_FILES['Content']['name'];
            }
            else{}
            $this->db->insert('std_syllabus', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/std_syllabus/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['BatchName']         = $this->input->post('BatchName');
            $data['Semester']         = $this->input->post('Semester');
            if($_FILES['Content']['name']){
                $uploaddirr = './uploads/syllabus/';
                $photoApplicant = $uploaddirr . basename($_FILES['Content']['name']);
                if (move_uploaded_file($_FILES['Content']['tmp_name'], $photoApplicant)) {} else {}
                $data['Content']            = $_FILES['Content']['name'];
            }
            else{}

            $this->db->where('id', $param2);
            $this->db->update('std_syllabus', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/std_syllabus/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('std_syllabus', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('std_syllabus');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/std_syllabus/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('std_syllabus')->result_array();
        $page_data['page_name']  = 'std_syllabus';
        $page_data['page_title'] = get_phrase('student_syllabus');
        $this->load->view('backend/index', $page_data);
    }
    function class_routine_pundro($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            $data['ProgramName']         = $this->input->post('ProgramName');
            $data['SessionName']         = $this->input->post('SessionName');
            $data['Year']         = $this->input->post('Year');
            $data['BatchName']         = $this->input->post('BatchName');
            $data['Semester']         = $this->input->post('Semester');

            $data['CourseName']         = $this->input->post('CourseName');
            $data['InstructorName']         = $this->input->post('InstructorName');
            $data['BuildingName']         = $this->input->post('BuildingName');
            $data['RoomNo']         = $this->input->post('RoomNo');
            $data['Day']         = $this->input->post('Day');
            $data['StrtTime']         = $this->input->post('StrtTime');
            $data['StrtFormat']         = $this->input->post('StrtFormat');
            $data['EndTime']         = $this->input->post('EndTime');
            $data['EndFormat']         = $this->input->post('EndFormat');

            $this->db->insert('class_routine_pundro', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/class_routine_pundro/', 'refresh');
        }
        if ($param1 == 'do_update') {
            //$data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');
            //$data['fee_type']         = $this->input->post('fee_type');

            $this->db->where('id', $param2);
            $this->db->update('class_routine_pundro', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/class_routine_pundro/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('class_routine_pundro', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('class_routine_pundro');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/class_routine_pundro/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('class_routine_pundro')->result_array();
        $page_data['page_name']  = 'class_routine_pundro';
        $page_data['page_title'] = get_phrase('class_routine');
        $this->load->view('backend/index', $page_data);
    }
    function session_pundro($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['SessionName']         = $this->input->post('SessionName');
            $data['AdmissionDuration']         = $this->input->post('AdmissionDuration');
            $data['ClassCommencement']         = $this->input->post('ClassCommencement');
            $data['SemesterDuration']         = $this->input->post('SemesterDuration');
            $data['Year']         = $this->input->post('Year');

            $this->db->insert('session_pundro', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/session_pundro/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['SessionName']         = $this->input->post('SessionName');
            $data['AdmissionDuration']         = $this->input->post('AdmissionDuration');
            $data['ClassCommencement']         = $this->input->post('ClassCommencement');
            $data['SemesterDuration']         = $this->input->post('SemesterDuration');
            $data['Year']         = $this->input->post('Year');

            $this->db->where('id', $param2);
            $this->db->update('session_pundro', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/session_pundro/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('class_routine_pundro', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('std_fee_sub_category');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/std_fee_sub_category/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('session_pundro')->result_array();
        $page_data['page_name']  = 'session_pundro';
        $page_data['page_title'] = get_phrase('session_pundro');
        $this->load->view('backend/index', $page_data);
    }
    function money_receipt($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['ProgramName']         = $this->input->post('ProgramName');
            $data['SemesterName']         = $this->input->post('SemesterName');
            $data['Year']         = $this->input->post('Year');
            $data['CandidateName']         = $this->input->post('CandidateName');
            $data['MobileNumber']         = $this->input->post('MobileNumber');
            $data['DateSale'] = date('Y-m-d',strtotime($this->input->post('DateSale')));
            $this->db->where('MobileNumber', $data['MobileNumber']);
            $aass = $this->db->get('money_receipt')->result_array();
            foreach($aass as $r334s):
            //echo $r334s['MobileNumber'];
            endforeach;
            if($r334s['MobileNumber'] == $data['MobileNumber']){
                echo "You have already paid money for form-fillup";
                redirect(base_url() . 'index.php?admin/money_receipt/', 'refresh');
            }else{
                //echo "Welcome at Pundro University";
            }
            //exit();

            $data['Email']         = $this->input->post('Email');
            /*if (!filter_var($data['Email'], FILTER_VALIDATE_EMAIL)) {
                echo $emailErr = "Invalid email format";
            }
            else{
                echo $emailErr = "OK";
            }
            exit();*/
            $data['Amount']         = $this->input->post('Amount');
            $data['Particulars']         = $this->input->post('Particulars');

            $this->db->insert('money_receipt', $data);
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
            echo "<h3>";
            echo "Email Notification: ";
            echo "</h3>";
            echo "Program Name: ";
            $this->db->where('id', $data['ProgramName']);
            $as = $this->db->get('course_program')->result_array();
            foreach($as as $row334):
                echo $row334['course_name'];
            endforeach;
            echo "<br/>";
            echo "Session Name: ";
            $this->db->where('id', $data['SemesterName']);
            $as1 = $this->db->get('session_pundro')->result_array();
            foreach($as1 as $row3341):
                echo $row3341['SessionName'];
            endforeach;
            echo "<br/>";
            echo "Year: ";
            $this->db->where('id', $data['Year']);
            $as2 = $this->db->get('year_calendar')->result_array();
            foreach($as2 as $row3342):
                echo $row3342['Name'];
            endforeach;
            echo "<br/>";
            echo "Candidate Name: ";
            echo $data['CandidateName'];
            echo "<br/>";
            echo "Reference No.: ";
            echo $data['MobileNumber'];
            echo "<br/>";
            echo "Email: ";
            echo $data['Email'];
            echo "<br/>";
            echo "Amount: ";
            echo $data['Amount'];
            echo "<br/>";
            echo "Particulars: ";
            echo $data['Particulars'];
            echo "<br/><br/>";
            echo "<a style='
            text-align: center;
    vertical-align: middle;
    cursor: pointer;
    border-radius: 4px;
    text-decoration: none;
    margin: 0 0%;
    background-color: #49afcd;
    background-image: linear-gradient(to bottom,#5bc0de,#2f96b4);
    display: inline-block;
    padding: 9px 11px;
    margin-bottom: 0;
    font-size: 16px;
    line-height: 14px;
            ' class='btn btn-success' href='./index.php?admin/money_receipt/'>Back</a>";
            echo "<a style='
            text-align: center;
    vertical-align: middle;
    cursor: pointer;
    border-radius: 4px;
    text-decoration: none;
    margin: 0 1%;
    background-color: #49afcd;
    background-image: linear-gradient(to bottom,#5bc0de,#2f96b4);
    display: inline-block;
    padding: 9px 11px;
    margin-bottom: 0;
    font-size: 16px;
    line-height: 14px;
            ' class='btn btn-success' href='./web/'>Form Fillup | Student</a>";
            echo "<a style='
        text-align: center;
    vertical-align: middle;
    cursor: pointer;
    border-radius: 4px;
    text-decoration: none;
    margin: 0 1%;
    background-color: #49afcd;
    background-image: linear-gradient(to bottom,#5bc0de,#2f96b4);
    display: inline-block;
    padding: 9px 11px;
    margin-bottom: 0;
    font-size: 16px;
    line-height: 14px;
            ' class='btn btn-success' href='./index.php?admin/online_admission/'>Form Fillup | Admin</a>";
            echo "</div>";
            echo "</div>";
            $to = $data['Email'];

                 //$to = implode(', ', $this->input->post('email[]'));
                //$to      = $_POST['email'];
                //exit();
                 $subject = 'Congratulations!. You are selected for admitting. Please pay the following Dues ';
                 $message = 'Message Details';
                 //exit();
                 $headers = 'From: pundro@gmail.com' . "\r\n" .
                     'Reply-To: pundro@gmail.com' . "\r\n" .
                     'X-Mailer: PHP/' . phpversion();

                 mail($to, $subject, $message, $headers);
                 //echo "Success";
            exit();
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/money_receipt/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['ProgramName']         = $this->input->post('ProgramName');
            $data['SemesterName']         = $this->input->post('SemesterName');
            $data['Year']         = $this->input->post('Year');
            $data['CandidateName']         = $this->input->post('CandidateName');
            $data['MobileNumber']         = $this->input->post('MobileNumber');
            $data['Email']         = $this->input->post('Email');
            $data['Amount']         = $this->input->post('Amount');
            $data['DateSale'] = date('Y-m-d',strtotime($this->input->post('DateSale')));
            $data['Particulars']         = $this->input->post('Particulars');

            $this->db->where('id', $param2);
            $this->db->update('money_receipt', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/money_receipt/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('money_receipt', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('money_receipt');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/money_receipt/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('money_receipt')->result_array();
        $page_data['page_name']  = 'money_receipt';
        $page_data['page_title'] = get_phrase('money_receipt');
        $this->load->view('backend/index', $page_data);
    }

    function selection_criteria($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['SelectionCriteria']         = $this->input->post('SelectionCriteria');
            $data['SemesterName']         = $this->input->post('SemesterName');
            $data['Year']         = $this->input->post('Year');

            $this->db->insert('selection_criteria', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/selection_criteria/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['SelectionCriteria']         = $this->input->post('SelectionCriteria');
            $data['SemesterName']         = $this->input->post('SemesterName');
            $data['Year']         = $this->input->post('Year');

            $this->db->where('id', $param2);
            $this->db->update('selection_criteria', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/selection_criteria/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('selection_criteria', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('selection_criteria');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/selection_criteria/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('selection_criteria')->result_array();
        $page_data['page_name']  = 'selection_criteria';
        $page_data['page_title'] = get_phrase('selection_criteria');
        $this->load->view('backend/index', $page_data);
    }

    function seat_capacity($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['ProgramName']         = $this->input->post('ProgramName');
            $data['SemesterName']         = $this->input->post('SemesterName');
            $data['Year']         = $this->input->post('Year');
            $data['SeatCount']         = $this->input->post('SeatCount');

            $this->db->insert('seat_capacity', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/seat_capacity/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['ProgramName']         = $this->input->post('ProgramName');
            $data['SemesterName']         = $this->input->post('SemesterName');
            $data['Year']         = $this->input->post('Year');
            $data['SeatCount']         = $this->input->post('SeatCount');

            $this->db->where('id', $param2);
            $this->db->update('seat_capacity', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/seat_capacity/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('seat_capacity', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('seat_capacity');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/seat_capacity/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('seat_capacity')->result_array();
        $page_data['page_name']  = 'seat_capacity';
        $page_data['page_title'] = get_phrase('seat_capacity');
        $this->load->view('backend/index', $page_data);
    }

    function semester_calendar($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['ProgramName']         = $this->input->post('ProgramName');
            $data['SemesterName']         = $this->input->post('SemesterName');
            $data['Year']         = $this->input->post('Year');
            $data['SemesterStartDate']         = $this->input->post('SemesterStartDate');
            $data['SemesterEndDate']         = $this->input->post('SemesterEndDate');
            $data['SeatCount']         = $this->input->post('SeatCount');

            $this->db->insert('semester_calendar', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/semester_calendar/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['ProgramName']         = $this->input->post('ProgramName');
            $data['SemesterName']         = $this->input->post('SemesterName');
            $data['Year']         = $this->input->post('Year');
            $data['SemesterStartDate']         = $this->input->post('SemesterStartDate');
            $data['SemesterEndDate']         = $this->input->post('SemesterEndDate');
            $data['SeatCount']         = $this->input->post('SeatCount');

            $this->db->where('id', $param2);
            $this->db->update('semester_calendar', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/semester_calendar/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('semester_calendar', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('semester_calendar');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/semester_calendar/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('semester_calendar')->result_array();
        $page_data['page_name']  = 'semester_calendar';
        $page_data['page_title'] = get_phrase('semester_calendar');
        $this->load->view('backend/index', $page_data);
    }

    function admission_configuration($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['ProgramName']         = $this->input->post('ProgramName');
            $data['SemesterName']         = $this->input->post('SemesterName');
            $data['Year']         = $this->input->post('Year');
            $data['AdmissionType']         = $this->input->post('AdmissionType');
            $data['AdmissionDate']         = $this->input->post('AdmissionDate');
            $data['AdmissionTime']         = $this->input->post('AdmissionTime');
            $data['AdmissionStartDate']         = $this->input->post('AdmissionStartDate');
            $data['AdmissionEndDate']         = $this->input->post('AdmissionEndDate');
            $data['IsActive']         = $this->input->post('IsActive');

            $this->db->insert('admission_configuration', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/admission_configuration/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['ProgramName']         = $this->input->post('ProgramName');
            $data['SemesterName']         = $this->input->post('SemesterName');
            $data['Year']         = $this->input->post('Year');
            $data['AdmissionType']         = $this->input->post('AdmissionType');
            $data['AdmissionDate']         = $this->input->post('AdmissionDate');
            $data['AdmissionTime']         = $this->input->post('AdmissionTime');
            $data['AdmissionStartDate']         = $this->input->post('AdmissionStartDate');
            $data['AdmissionEndDate']         = $this->input->post('AdmissionEndDate');
            $data['IsActive']         = $this->input->post('IsActive');

            $this->db->where('id', $param2);
            $this->db->update('admission_configuration', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/admission_configuration/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('admission_configuration', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('admission_configuration');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/admission_configuration/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('admission_configuration')->result_array();
        $page_data['page_name']  = 'admission_configuration';
        $page_data['page_title'] = get_phrase('admission_configuration');
        $this->load->view('backend/index', $page_data);
    }

    function examroutine($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['ProgramName']         = $this->input->post('ProgramName');
            $data['SemesterName']         = $this->input->post('SemesterName');
            $data['ExamYear']         = $this->input->post('ExamYear');
            $data['ExamName']         = $this->input->post('ExamName');
            $data['Session']         = $this->input->post('Session');
            $data['ExamDate1']         = $this->input->post('ExamDate1');
            $data['ExamDay1']         = $this->input->post('ExamDay1');
            $data['ExamTime1']         = $this->input->post('ExamTime1');
            $data['CourseName1']         = $this->input->post('CourseName1');
            $data['ExamDate2']         = $this->input->post('ExamDate2');
            $data['ExamDay2']         = $this->input->post('ExamDay2');
            $data['ExamTime2']         = $this->input->post('ExamTime2');
            $data['CourseName2']         = $this->input->post('CourseName2');
            $data['ExamDate3']         = $this->input->post('ExamDate3');
            $data['ExamDay3']         = $this->input->post('ExamDay3');
            $data['ExamTime3']         = $this->input->post('ExamTime3');
            $data['CourseName3']         = $this->input->post('CourseName3');
            $data['ExamDate4']         = $this->input->post('ExamDate4');
            $data['ExamDay4']         = $this->input->post('ExamDay4');
            $data['ExamTime4']         = $this->input->post('ExamTime4');
            $data['CourseName4']         = $this->input->post('CourseName4');
            $data['ExamDate5']         = $this->input->post('ExamDate5');
            $data['ExamDay5']         = $this->input->post('ExamDay5');
            $data['ExamTime5']         = $this->input->post('ExamTime5');
            $data['CourseName5']         = $this->input->post('CourseName5');

            $this->db->insert('examroutine', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/examroutine/', 'refresh');
        }
        if ($param1 == 'do_update') {
            //$data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');
            //$data['fee_type']         = $this->input->post('fee_type');

            $this->db->where('id', $param2);
            $this->db->update('examroutine', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/examroutine/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('examroutine', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('examroutine');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/examroutine/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('examroutine')->result_array();
        $page_data['page_name']  = 'examroutine';
        $page_data['page_title'] = get_phrase('exam_routine');
        $this->load->view('backend/index', $page_data);
    }

    function course_instructor($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            //$subject11 = implode(", ", $_POST['subject']);
            $data['NameofProgram']                   = $this->input->post('NameofProgram');
            $data['Designation']                   = $this->input->post('Designation');
            $data['InstructorName']                 = $this->input->post('InstructorName');
            $data['InstructorBirthDate']              = $this->input->post('InstructorBirthDate');
            $data['InstructorFatherName']             = $this->input->post('InstructorFatherName');
            $data['InstructorMotherName']             = $this->input->post('InstructorMotherName');
            $data['InstructorNationality']            = $this->input->post('InstructorNationality');
            $data['InstructorGender']                 = $this->input->post('InstructorGender');
            $data['PresentHouse']                    = $this->input->post('PresentHouse');
            $data['PresentPhone']                    = $this->input->post('PresentPhone');
            $data['PresentVillage']                  = $this->input->post('PresentVillage');
            $data['PresentMobile']                   = $this->input->post('PresentMobile');
            $data['PresentPostOffice']               = $this->input->post('PresentPostOffice');
            $data['PresentFaxNo']                    = $this->input->post('PresentFaxNo');
            $data['PresentPoliceStation']            = $this->input->post('PresentPoliceStation');
            $data['PresentEmail']                    = $this->input->post('PresentEmail');
            $data['PresentDistrict']                 = $this->input->post('PresentDistrict');
            $data['PermanentHouse']                  = $this->input->post('PermanentHouse');
            $data['PermanentPhone']                  = $this->input->post('PermanentPhone');
            $data['PermanentVillage']                = $this->input->post('PermanentVillage');
            $data['PermanentMobile']                 = $this->input->post('PermanentMobile');
            $data['PermanentPostOffice']             = $this->input->post('PermanentPostOffice');
            $data['PermanentFaxNo']                  = $this->input->post('PermanentFaxNo');
            $data['PermanentPoliceStation']          = $this->input->post('PermanentPoliceStation');
            $data['PermanentEmail']                  = $this->input->post('PermanentEmail');
            $data['PermanentDistrict']               = $this->input->post('PermanentDistrict');
            $data['CertificateName1']                = $this->input->post('CertificateName1');
            $data['CertificateGroup1']               = $this->input->post('CertificateGroup1');
            $data['CertificateYear1']                = $this->input->post('CertificateYear1');
            $data['CertificateNameofInstitute1']     = $this->input->post('CertificateNameofInstitute1');
            $data['CertificateCGPA1']                = $this->input->post('CertificateCGPA1');
            $data['CertificateName2']                = $this->input->post('CertificateName2');
            $data['CertificateGroup2']               = $this->input->post('CertificateGroup2');
            $data['CertificateYear2']                = $this->input->post('CertificateYear2');
            $data['CertificateNameofInstitute2']     = $this->input->post('CertificateNameofInstitute2');
            $data['CertificateCGPA2']                = $this->input->post('CertificateCGPA2');
            $data['CertificateName3']                = $this->input->post('CertificateName3');
            $data['CertificateGroup3']               = $this->input->post('CertificateGroup3');
            $data['CertificateYear3']                = $this->input->post('CertificateYear3');
            $data['CertificateNameofInstitute3']     = $this->input->post('CertificateNameofInstitute3');
            $data['CertificateCGPA3']                = $this->input->post('CertificateCGPA3');
            $data['CertificateName4']                = $this->input->post('CertificateName4');
            $data['CertificateGroup4']               = $this->input->post('CertificateGroup4');
            $data['CertificateYear4']                = $this->input->post('CertificateYear4');
            $data['CertificateNameofInstitute4']     = $this->input->post('CertificateNameofInstitute4');
            $data['CertificateCGPA4']                = $this->input->post('CertificateCGPA4');
            $data['CertificateName5']                = $this->input->post('CertificateName5');
            $data['CertificateGroup5']               = $this->input->post('CertificateGroup5');
            $data['CertificateYear5']                = $this->input->post('CertificateYear5');
            $data['CertificateNameofInstitute5']     = $this->input->post('CertificateNameofInstitute5');
            $data['CertificateCGPA5']                = $this->input->post('CertificateCGPA5');
            $data['TotalGPA']      = $data['CertificateCGPA1']+$data['CertificateCGPA2']+$data['CertificateCGPA3']+$data['CertificateCGPA4']+$data['CertificateCGPA5'];
            //$data['TotalGPA']      = $this->input->post('TotalGPA');

            $data['EmploymentNameofOrganizations1']  = $this->input->post('EmploymentNameofOrganizations1');
            $data['EmploymentFromDate1']             = $this->input->post('EmploymentFromDate1');
            $data['EmploymentToDate1']               = $this->input->post('EmploymentToDate1');
            $data['EmploymentPositionHeld1']         = $this->input->post('EmploymentPositionHeld1');
            $data['EmploymentNameofOrganizations2']  = $this->input->post('EmploymentNameofOrganizations2');
            $data['EmploymentFromDate2']             = $this->input->post('EmploymentFromDate2');
            $data['EmploymentToDate2']               = $this->input->post('EmploymentToDate2');
            $data['EmploymentPositionHeld2']         = $this->input->post('EmploymentPositionHeld2');
            $data['ReferenceName1']                  = $this->input->post('ReferenceName1');
            $data['ReferenceAddress1']               = $this->input->post('ReferenceAddress1');
            $data['ReferencePhone1']                 = $this->input->post('ReferencePhone1');
            $data['ReferenceMobile1']                = $this->input->post('ReferenceMobile1');
            $data['ReferenceEmail1']                 = $this->input->post('ReferenceEmail1');
            $data['ReferenceName2']                  = $this->input->post('ReferenceName2');
            $data['ReferenceAddress2']               = $this->input->post('ReferenceAddress2');
            $data['ReferencePhone2']                 = $this->input->post('ReferencePhone2');
            $data['ReferenceMobile2']                = $this->input->post('ReferenceMobile2');
            $data['ReferenceEmail2']                 = $this->input->post('ReferenceEmail2');
            $data['InstructorJoiningDate']                 = $this->input->post('InstructorJoiningDate');
            $data['InstructorEmail']                 = $this->input->post('InstructorEmail');
            $data['InstructorPassword']                 = $this->input->post('InstructorPassword');

            if(
                $_FILES['InstructorNationalID']['name'] ||
                $_FILES['InstructorPassport']['name'] ||
                $_FILES['InstructorDrivingLicence']['name'] ||
                $_FILES['InstructorPhoto']['name'] ||
                $_FILES['CertificateDocumentscert1']['name'] ||
                $_FILES['CertificateDocumentsmark1']['name'] ||
                $_FILES['CertificateDocumentscert2']['name'] ||
                $_FILES['CertificateDocumentsmark2']['name'] ||
                $_FILES['CertificateDocumentscert3']['name'] ||
                $_FILES['CertificateDocumentsmark3']['name'] ||
                $_FILES['CertificateDocumentscert4']['name'] ||
                $_FILES['CertificateDocumentsmark4']['name']||
                $_FILES['CertificateDocumentscert5']['name'] ||
                $_FILES['CertificateDocumentsmark5']['name']||
                $_FILES['EmploymentDocuments1']['name'] ||
                $_FILES['EmploymentDocuments2']['name'] ||
                $_FILES['InstructorSignature']['name']
            ){
                $uploaddir = './uploads/instructor_image/';
                $InstructorPhoto = $uploaddir . basename($data['InstructorName']."-".$_FILES['InstructorPhoto']['name']);
                $CertificateDocumentscert1 = $uploaddir . basename($data['InstructorName']."-".$_FILES['CertificateDocumentscert1']['name']);
                $CertificateDocumentsmark1 = $uploaddir . basename($data['InstructorName']."-".$_FILES['CertificateDocumentsmark1']['name']);
                $CertificateDocumentscert2 = $uploaddir . basename($data['InstructorName']."-".$_FILES['CertificateDocumentscert2']['name']);
                $CertificateDocumentsmark2 = $uploaddir . basename($data['InstructorName']."-".$_FILES['CertificateDocumentsmark2']['name']);
                $CertificateDocumentscert3 = $uploaddir . basename($data['InstructorName']."-".$_FILES['CertificateDocumentscert2']['name']);
                $CertificateDocumentsmark3 = $uploaddir . basename($data['InstructorName']."-".$_FILES['CertificateDocumentsmark2']['name']);
                $CertificateDocumentscert4 = $uploaddir . basename($data['InstructorName']."-".$_FILES['CertificateDocumentscert4']['name']);
                $CertificateDocumentsmark4 = $uploaddir . basename($data['InstructorName']."-".$_FILES['CertificateDocumentsmark4']['name']);
                $CertificateDocumentscert5 = $uploaddir . basename($data['InstructorName']."-".$_FILES['CertificateDocumentscert5']['name']);
                $CertificateDocumentsmark5 = $uploaddir . basename($data['InstructorName']."-".$_FILES['CertificateDocumentsmark5']['name']);

                $EmploymentDocuments1 = $uploaddir . basename($data['InstructorName']."-".$_FILES['EmploymentDocuments1']['name']);
                $EmploymentDocuments2 = $uploaddir . basename($data['InstructorName']."-".$_FILES['EmploymentDocuments2']['name']);
                $InstructorSignature = $uploaddir . basename($data['InstructorName']."-".$_FILES['InstructorSignature']['name']);
                $InstructorNationalID = $uploaddir . basename($data['InstructorName']."-".$_FILES['InstructorNationalID']['name']);
                $InstructorPassport = $uploaddir . basename($data['InstructorName']."-".$_FILES['InstructorPassport']['name']);
                $InstructorDrivingLicence = $uploaddir . basename($data['InstructorName']."-".$_FILES['InstructorDrivingLicence']['name']);

                if (move_uploaded_file($_FILES['InstructorPhoto']['tmp_name'], $InstructorPhoto)) {} else {}
                if (move_uploaded_file($_FILES['CertificateDocumentscert1']['tmp_name'], $CertificateDocumentscert1)) {} else {}
                if (move_uploaded_file($_FILES['CertificateDocumentsmark1']['tmp_name'], $CertificateDocumentsmark1)) {} else {}
                if (move_uploaded_file($_FILES['CertificateDocumentscert2']['tmp_name'], $CertificateDocumentscert2)) {} else {}
                if (move_uploaded_file($_FILES['CertificateDocumentsmark2']['tmp_name'], $CertificateDocumentsmark2)) {} else {}
                if (move_uploaded_file($_FILES['CertificateDocumentscert3']['tmp_name'], $CertificateDocumentscert3)) {} else {}
                if (move_uploaded_file($_FILES['CertificateDocumentsmark3']['tmp_name'], $CertificateDocumentsmark3)) {} else {}
                if (move_uploaded_file($_FILES['CertificateDocumentscert4']['tmp_name'], $CertificateDocumentscert4)) {} else {}
                if (move_uploaded_file($_FILES['CertificateDocumentsmark4']['tmp_name'], $CertificateDocumentsmark4)) {} else {}
                if (move_uploaded_file($_FILES['CertificateDocumentscert5']['tmp_name'], $CertificateDocumentscert5)) {} else {}
                if (move_uploaded_file($_FILES['CertificateDocumentsmark5']['tmp_name'], $CertificateDocumentsmark5)) {} else {}
                if (move_uploaded_file($_FILES['EmploymentDocuments1']['tmp_name'], $EmploymentDocuments1)) {} else {}
                if (move_uploaded_file($_FILES['EmploymentDocuments2']['tmp_name'], $EmploymentDocuments2)) {} else {}
                if (move_uploaded_file($_FILES['InstructorSignature']['tmp_name'], $InstructorSignature)) {} else {}
                if (move_uploaded_file($_FILES['InstructorNationalID']['tmp_name'], $InstructorNationalID)) {} else {}
                if (move_uploaded_file($_FILES['InstructorPassport']['tmp_name'], $InstructorPassport)) {} else {}
                if (move_uploaded_file($_FILES['InstructorDrivingLicence']['tmp_name'], $InstructorDrivingLicence)) {} else {}

                $data['InstructorPhoto']                = $data['InstructorName']."-".$_FILES['InstructorPhoto']['name'];
                $data['CertificateDocumentscert1']     = $data['InstructorName']."-".$_FILES['CertificateDocumentscert1']['name'];
                $data['CertificateDocumentsmark1']     = $data['InstructorName']."-".$_FILES['CertificateDocumentsmark1']['name'];
                $data['CertificateDocumentscert2']     = $data['InstructorName']."-".$_FILES['CertificateDocumentscert2']['name'];
                $data['CertificateDocumentsmark2']     = $data['InstructorName']."-".$_FILES['CertificateDocumentsmark2']['name'];
                $data['CertificateDocumentscert3']     = $data['InstructorName']."-".$_FILES['CertificateDocumentscert3']['name'];
                $data['CertificateDocumentsmark3']     = $data['InstructorName']."-".$_FILES['CertificateDocumentsmark3']['name'];
                $data['CertificateDocumentscert4']     = $data['InstructorName']."-".$_FILES['CertificateDocumentscert4']['name'];
                $data['CertificateDocumentsmark4']     = $data['InstructorName']."-".$_FILES['CertificateDocumentsmark4']['name'];
                $data['CertificateDocumentscert5']     = $data['InstructorName']."-".$_FILES['CertificateDocumentscert5']['name'];
                $data['CertificateDocumentsmark5']     = $data['InstructorName']."-".$_FILES['CertificateDocumentsmark5']['name'];
                $data['EmploymentDocuments1']          = $data['InstructorName']."-".$_FILES['EmploymentDocuments1']['name'];
                $data['EmploymentDocuments2']          = $data['InstructorName']."-".$_FILES['EmploymentDocuments2']['name'];
                $data['InstructorSignature']            = $data['InstructorName']."-".$_FILES['InstructorSignature']['name'];
                $data['InstructorNationalID']            = $data['InstructorName']."-".$_FILES['InstructorNationalID']['name'];
                $data['InstructorPassport']            = $data['InstructorName']."-".$_FILES['InstructorPassport']['name'];
                $data['InstructorDrivingLicence']            = $data['InstructorName']."-".$_FILES['InstructorDrivingLicence']['name'];
            }
            else{}
            $data['CreatedAt']         = date('Y-m-d');
            $data['UpdatedAt']         = date('Y-m-d');

            $this->db->insert('course_instructor', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/course_instructor/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['InstructorFirstName']         = $this->input->post('InstructorFirstName');
            $data['InstructorLastName']         = $this->input->post('InstructorLastName');
            $data['InstructorBloodGroup']         = $this->input->post('InstructorBloodGroup');
            $subject65 = implode(", ", $_POST['subject']);

            $subjects33 = $this->db->get_where('course_instructor' , array(
                'id' => $param2
            ))->result_array();
            foreach ($subjects33 as $row131) {
                //echo $row11['subject'];
            }
            //$data['subject']         = $row131['subject'].", ".$subject;

            $data['InstructorCourse']         = $row131['InstructorCourse'].", ".$subject65;
            //exit();
            $data['InstructorBirthdate']         = $this->input->post('InstructorBirthdate');
            $data['InstructorMaritalStatus']         = $this->input->post('InstructorMaritalStatus');
            $data['InstructorNationality']         = $this->input->post('InstructorNationality');
            $data['InstructorReligion']         = $this->input->post('InstructorReligion');
            $data['InstructorAddress']         = $this->input->post('InstructorAddress');
            $data['InstructorPhone']         = $this->input->post('InstructorPhone');
            $data['InstructorEmail']         = $this->input->post('InstructorEmail');
            $data['UpdatedAt']         = date('Y-m-d');

            $this->db->where('id', $param2);
            $this->db->update('course_instructor', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/course_instructor/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('course_instructor', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('course_instructor');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/course_instructor/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('course_instructor')->result_array();
        $page_data['page_name']  = 'course_instructor';
        $page_data['page_title'] = get_phrase('course_instructor');
        $this->load->view('backend/index', $page_data);
    }
    function courses_mapping_with_instructor($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $page_data['acdSession']    = $this->db->get('courses_course_instructor')->result_array();
        $page_data['page_name']  = 'courses_mapping_with_instructor';
        $page_data['page_title'] = get_phrase('courses_mapping_with_instructor');
        $this->load->view('backend/index', $page_data);
    }

    function attendance_pundro($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['ProgramName']         = $this->input->post('ProgramName');
            $data['CourseInstructor']         = $this->input->post('CourseInstructor');
            $data['BatchName']         = $this->input->post('BatchName');
            $data['CourseCode']         = $this->input->post('CourseCode');
            $data['SemesterName']         = $this->input->post('SemesterName');
            $data['Session']         = $this->input->post('Session');
            $data['Year']         = $this->input->post('Year');
            $data['ExamName']         = $this->input->post('ExamName');
            $data['AttendanceDate']         = $this->input->post('AttendanceDate');

            $particulars1 = implode(',', $this->input->post('particulars1[]'));
            $particulars2 = implode(',', $this->input->post('particulars2[]'));
            $data['StdRoll'] = json_encode($particulars1);
            $data['AttendanceStatus'] = json_encode($particulars2);
            //$data['StdRoll']         = $this->input->post('StdRoll');
            //$data['AttendanceStatus']         = $this->input->post('AttendanceStatus');
            //exit();
            $data['ClassStrt']         = $this->input->post('ClassStrt');
            $data['ClassEnd']         = $this->input->post('ClassEnd');
            $this->db->insert('attendance_pundro', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/attendance_pundro/', 'refresh');
        }
        if ($param1 == 'do_update') {
            //$data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');
            //$data['fee_type']         = $this->input->post('fee_type');

            $this->db->where('id', $param2);
            $this->db->update('attendance_pundro', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/attendance_pundro/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('attendance_pundro', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('attendance_pundro');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/attendance_pundro/', 'refresh');
        }
        //$page_data['acdSession']    = $this->db->get('attendance_pundro')->result_array();
        $page_data['acdSession']    = $this->db->get('subjects')->result_array();
        $page_data['page_name']  = 'attendance_pundro';
        $page_data['page_title'] = get_phrase('attendance');
        $this->load->view('backend/index', $page_data);
    }

    function print_attendance($param1 = '', $param2 = ''){
        $page_data['acdSession']    = $this->db->get('student_pundro')->result_array();
        $page_data['page_name']  = 'attendance_sheet_pundro';
        $page_data['page_title'] = get_phrase('attendance');
        $this->load->view('backend/index', $page_data);
    }
    function office_holidays($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');
            $data['fee_type']         = $this->input->post('fee_type');

            $this->db->insert('office_holidays', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/office_holidays/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');
            $data['fee_type']         = $this->input->post('fee_type');

            $this->db->where('id', $param2);
            $this->db->update('office_holidays', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/office_holidays/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('office_holidays', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('office_holidays');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/office_holidays/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('office_holidays')->result_array();
        $page_data['page_name']  = 'office_holidays';
        $page_data['page_title'] = get_phrase('office_holidays');
        $this->load->view('backend/index', $page_data);
    }
    function board_of_trustees($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');

            $this->db->insert('board_of_trustees', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/board_of_trustees/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');

            $this->db->where('id', $param2);
            $this->db->update('board_of_trustees', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/board_of_trustees/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('board_of_trustees', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('board_of_trustees');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/board_of_trustees/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('board_of_trustees')->result_array();
        $page_data['page_name']  = 'board_of_trustees';
        $page_data['page_title'] = get_phrase('board_of_trustees');
        $this->load->view('backend/index', $page_data);
    }
    function class_holidays_pundro($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');
            $data['fee_type']         = $this->input->post('fee_type');

            $this->db->insert('class_holidays_pundro', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/class_holidays_pundro/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');
            $data['fee_type']         = $this->input->post('fee_type');

            $this->db->where('id', $param2);
            $this->db->update('class_holidays_pundro', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/class_holidays_pundro/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('class_holidays_pundro', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('class_holidays_pundro');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/class_holidays_pundro/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('class_holidays_pundro')->result_array();
        $page_data['page_name']  = 'class_holidays_pundro';
        $page_data['page_title'] = get_phrase('class_holidays');
        $this->load->view('backend/index', $page_data);
    }
    function calendar_pundro($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['day']         = $this->input->post('day');
            $data['date_english']         = $this->input->post('date_english');
            $data['date_bangla']         = $this->input->post('date_bangla');
            $data['date_arabic']         = $this->input->post('date_arabic');
            $data['month_english']         = $this->input->post('month_english');
            $data['month_bangla']         = $this->input->post('month_bangla');
            $data['month_arabic']         = $this->input->post('month_arabic');
            $data['calendar_title']         = $this->input->post('calendar_title');
            $data['calendar_content']         = $this->input->post('calendar_content');

            $this->db->insert('calendar_pundro', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/calendar_pundro/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['day']         = $this->input->post('day');
            $data['date_english']         = $this->input->post('date_english');
            $data['date_bangla']         = $this->input->post('date_bangla');
            $data['date_arabic']         = $this->input->post('date_arabic');
            $data['month_english']         = $this->input->post('month_english');
            $data['month_bangla']         = $this->input->post('month_bangla');
            $data['month_arabic']         = $this->input->post('month_arabic');
            $data['calendar_title']         = $this->input->post('calendar_title');
            $data['calendar_content']         = $this->input->post('calendar_content');

            $this->db->where('id', $param2);
            $this->db->update('calendar_pundro', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/calendar_pundro/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('calendar_pundro', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('calendar_pundro');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/calendar_pundro/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('calendar_pundro')->result_array();
        $page_data['page_name']  = 'calendar_pundro';
        $page_data['page_title'] = get_phrase('calendar');
        $this->load->view('backend/index', $page_data);
    }

    function semester_particulars($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['ProgramName']         = $this->input->post('ProgramName');
            $data['BatchName']         = $this->input->post('BatchName');
            $data['SessionName']         = $this->input->post('SessionName');
            $data['Year']         = $this->input->post('Year');
            $data['SemesterName']         = $this->input->post('SemesterName');
            $data['Particulars']         = $this->input->post('Particulars');
            $data['Amount']         = $this->input->post('Amount');

            $this->db->insert('semester_particulars', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/semester_particulars/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['ProgramName']         = $this->input->post('ProgramName');
            $data['BatchName']         = $this->input->post('BatchName');
            $data['SessionName']         = $this->input->post('SessionName');
            $data['Year']         = $this->input->post('Year');
            $data['SemesterName']         = $this->input->post('SemesterName');
            $data['Particulars']         = $this->input->post('Particulars');
            $data['Amount']         = $this->input->post('Amount');

            $this->db->where('id', $param2);
            $this->db->update('semester_particulars', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/semester_particulars/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('semester_particulars', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('semester_particulars');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/semester_particulars/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('semester_particulars')->result_array();
        $page_data['page_name']  = 'semester_particulars';
        $page_data['page_title'] = get_phrase('semester_wise_particulars');
        $this->load->view('backend/index', $page_data);
    }
    function sparticulars($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        //if ($param1 == 'sparticulars') {
            $data['ProgramName']         = $this->input->post('ProgramName');
            $data['BatchName']         = $this->input->post('BatchName');
            $data['SessionName']         = $this->input->post('SessionName');
            $data['Year']         = $this->input->post('Year');
            $data['SemesterName']         = $this->input->post('SemesterName');
            //exit();
            $this->db->where('ProgramName', $data['ProgramName']);
            $this->db->where('SemesterName', $data['SemesterName']);
            $page_data['acdSession']    = $this->db->get('semester_particulars')->result_array();
            $page_data['page_name']  = 'sparticulars';
            $page_data['page_title'] = get_phrase('semester_wise_particulars');
            $this->load->view('backend/index', $page_data);
        //}
    }
    function mark_details($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        //if ($param1 == 'markdetails') {
            $data['ProgramName']         = $this->input->post('ProgramName');
            $data['batch']         = $this->input->post('Batch');
            $data['ExamName']         = $this->input->post('ExamName');
            //exit();
            $page_data['acdSession'] = $this->db->where('ProgramName', $data['ProgramName']);
            $page_data['acdSession'] = $this->db->where('Batch', $data['Batch']);
            $page_data['acdSession'] = $this->db->where('ExamName', $data['ExamName']);
            $page_data['acdSession']    = $this->db->get('marks_setup')->result_array();
            $page_data['page_name']  = 'mark_details';
            $page_data['page_title'] = get_phrase('semester_wise_particulars');
            $this->load->view('backend/index', $page_data);
        //}
    }
    function fee_condition($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $data['ProgramName']     = $this->input->post('ProgramName');
        $data['SemesterName']    = $this->input->post('SemesterName');
        $page_data['acdSession'] = $this->db->where('ProgramName', $data['ProgramName']);
        $page_data['acdSession'] = $this->db->where('SemesterName', $data['SemesterName']);
        $page_data['acdSession'] = $this->db->get('semester_particulars')->result_array();
        $page_data['page_name']  = 'fee_condition';
        $page_data['page_title'] = get_phrase('fee_condition');
        $this->load->view('backend/index', $page_data);
    }
    function filter_selection($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        //$data['SemesterName']         = $this->input->post('SemesterName');
        //$data['Year']         = $this->input->post('Year');
        //$data['ProgramName']         = $this->input->post('ProgramName');
        $data['AdmissionRollNo']         = $this->input->post('AdmissionRollNo');

        //$page_data['acdSession'] = $this->db->where('Session', $data['SemesterName']);
        //$page_data['acdSession'] = $this->db->where('AdmissionYear', $data['Year']);
        //$page_data['acdSession'] = $this->db->where('NameofProgram', $data['ProgramName']);
        $page_data['short'] = $this->db->where('PresentMobile', $data['AdmissionRollNo']);
        $page_data['short']    = $this->db->get('applicants_details')->result_array();

        $page_data['page_name']  = 'filter_selection';
        $page_data['page_title'] = get_phrase('filter_selection');
        $this->load->view('backend/index', $page_data);
    }
    function filter_selection_gpa($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        //$data['SemesterName']         = $this->input->post('SemesterName');
        //$data['Year']         = $this->input->post('Year');
        //$data['ProgramName']         = $this->input->post('ProgramName');

        $data['AdmissionRollNo']         = $this->input->post('AdmissionRollNo');
        $SeatCount         = $this->input->post('SeatCount');
        //exit();
        $ProgramName         = $this->input->post('ProgramName');
        $dataFromGPA         = $this->input->post('FromGPA');
        $tt1 = (int)$ProgramName;
        $tt = (float)$dataFromGPA;
        //exit();
        $weas = 0;
        $this->db->limit($SeatCount);
        $this->db->where('EmailNotify',$weas);
        $this->db->where('CandidateStudent',0);
        $this->db->where('NameofProgram', $tt1);
        $this->db->where('TotalGPA>=', $tt);
        $page_data['short']    = $this->db->get('applicants_details')->result_array();
        //exit();
        $page_data['page_name']  = 'filter_selection_gpa';
        $page_data['page_title'] = get_phrase('filter_selection_GPA');
        $this->load->view('backend/index', $page_data);
    }
    function reports_pundro_details($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        //$data['SemesterName']         = $this->input->post('SemesterName');
        //$data['Year']         = $this->input->post('Year');
        //$data['ProgramName']         = $this->input->post('ProgramName');

        $ProgramName         = $this->input->post('ProgramName');
        $dataFromGPA         = $this->input->post('FromGPA');
        $data['AdmissionRollNo']         = $this->input->post('AdmissionRollNo');
        $SeatCount         = $this->input->post('SeatCount');
        
        
        $tt1 = (int)$ProgramName;
        $tt = (float)$dataFromGPA;
        if($Gender){
            $ProgramName         = $this->input->post('ProgramName');
            $Gender         = $this->input->post('Gender');
            $page_data['short']    = $this->db->get('applicants_details')->result_array();
            $page_data['page_name']  = 'reports_pundro_details';
            $page_data['page_title'] = get_phrase('reports_pundro_details');
            $this->load->view('backend/index', $page_data);
            //echo "Gender";
        }
        else if($District){
            $ProgramName         = $this->input->post('ProgramName');
            $District         = $this->input->post('District');
            $page_data['short']    = $this->db->get('applicants_details')->result_array();
            $page_data['page_name']  = 'reports_pundro_details';
            $page_data['page_title'] = get_phrase('reports_pundro_details');
            $this->load->view('backend/index', $page_data);
        }
        else{
            $ProgramName         = $this->input->post('ProgramName');
            $page_data['short']    = $this->db->get('applicants_details')->result_array();
            $page_data['page_name']  = 'reports_pundro_details';
            $page_data['page_title'] = get_phrase('reports_pundro_details');
            $this->load->view('backend/index', $page_data);
        }
        
        
        //exit();
        /*$weas = 0;
        $this->db->limit($SeatCount);
        $this->db->where('EmailNotify',$weas);
        $this->db->where('CandidateStudent',0);
        $this->db->where('NameofProgram', $tt1);
        $this->db->where('TotalGPA>=', $tt);
        $page_data['short']    = $this->db->get('applicants_details')->result_array();
        //exit();
        $page_data['page_name']  = 'reports_pundro_details';
        $page_data['page_title'] = get_phrase('reports_pundro_details');
        $this->load->view('backend/index', $page_data);*/
    }
    function money_receipt_bank($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $ProgramName         = $this->input->post('ProgramName');
        $SessionName         = $this->input->post('SessionName');
        $Year         = $this->input->post('Year');
        $tt1 = (int)$ProgramName;
        if($ProgramName == '*' AND $SessionName == '*' AND $Year == '*'){
            $page_data['temp'] = '1';
            $page_data['ProgramName'] = 'All';
            $page_data['Session'] = 'All';
            $page_data['Year'] = 'All';
            $page_data['short']    = $this->db->get('money_receipt')->result_array();

            $this->db->select_sum('Amount');
            $this->db->from('money_receipt');
            $query12 = $this->db->get()->result_array();
            foreach($query12 as $row2412):
                $page_data['Amount']    = $row2412['Amount'];
            endforeach;
        }else if($ProgramName != '*' AND $SessionName == '*' AND $Year == '*'){
            $page_data['temp'] = '2';
            $page_data['ProgramName'] = $this->input->post('ProgramName');
            $page_data['Session'] = 'All';
            $page_data['Year'] = 'All';
            $this->db->where('ProgramName', $tt1);
            $page_data['short']    = $this->db->get('money_receipt')->result_array();

            $this->db->select_sum('Amount');
            $this->db->from('money_receipt');
            $this->db->where('ProgramName', $tt1);
            $query12 = $this->db->get()->result_array();
            foreach($query12 as $row2412):
                $page_data['Amount']    = $row2412['Amount'];
            endforeach;
        }else if($ProgramName == '*' AND $SessionName != '*' AND $Year == '*'){
            $page_data['temp'] = '3';
            $page_data['ProgramName'] = 'All';
            $page_data['Session'] = $this->input->post('SessionName');
            $page_data['Year'] = 'All';
            $this->db->where('SemesterName', $SessionName);
            $page_data['short']    = $this->db->get('money_receipt')->result_array();

            $this->db->select_sum('Amount');
            $this->db->from('money_receipt');
            $this->db->where('SemesterName', $SessionName);
            $query12 = $this->db->get()->result_array();
            foreach($query12 as $row2412):
                $page_data['Amount']    = $row2412['Amount'];
            endforeach;
        }else if($ProgramName == '*' AND $SessionName == '*' AND $Year != '*'){
            $page_data['temp'] = '4';
            $page_data['ProgramName'] = 'All';
            $page_data['Session'] = 'All';
            $page_data['Year'] = $this->input->post('Year');
            $this->db->where('Year', $Year);
            $page_data['short']    = $this->db->get('money_receipt')->result_array();

            $this->db->select_sum('Amount');
            $this->db->from('money_receipt');
            $this->db->where('Year', $Year);
            $query12 = $this->db->get()->result_array();
            foreach($query12 as $row2412):
                $page_data['Amount']    = $row2412['Amount'];
            endforeach;
        }else if($ProgramName != '*' AND $SessionName == '*' AND $Year != '*'){
            $page_data['temp'] = '5';
            $page_data['ProgramName'] = $this->input->post('ProgramName');
            $page_data['Session'] = 'All';
            $page_data['Year'] = $this->input->post('Year');
            $this->db->where('ProgramName', $tt1);
            $this->db->where('Year', $Year);
            $page_data['short']    = $this->db->get('money_receipt')->result_array();

            $this->db->select_sum('Amount');
            $this->db->from('money_receipt');
            $this->db->where('ProgramName', $tt1);
            $this->db->where('Year', $Year);
            $query12 = $this->db->get()->result_array();
            foreach($query12 as $row2412):
                $page_data['Amount']    = $row2412['Amount'];
            endforeach;
        }else if($ProgramName != '*' AND $SessionName != '*' AND $Year != '*'){
            $page_data['temp'] = '6';
            $page_data['ProgramName'] = $this->input->post('ProgramName');
            $page_data['Session'] = $this->input->post('SessionName');
            $page_data['Year'] = $this->input->post('Year');
            $this->db->where('ProgramName', $tt1);
            $this->db->where('SemesterName', $SessionName);
            $this->db->where('Year', $Year);
            $page_data['short']    = $this->db->get('money_receipt')->result_array();

            $this->db->select_sum('Amount');
            $this->db->from('money_receipt');
            $this->db->where('ProgramName', $tt1);
            $this->db->where('SemesterName', $SessionName);
            $this->db->where('Year', $Year);
            $query12 = $this->db->get()->result_array();
            foreach($query12 as $row2412):
                $page_data['Amount']    = $row2412['Amount'];
            endforeach;

        }else if($ProgramName != '*' AND $SessionName != '*' AND $Year == '*'){
            $page_data['temp'] = '7';
            $page_data['ProgramName'] = $this->input->post('ProgramName');
            $page_data['Session'] = $this->input->post('SessionName');
            $page_data['Year'] = 'All';
            $this->db->where('ProgramName', $tt1);
            $this->db->where('SemesterName', $SessionName);
            $page_data['short']    = $this->db->get('money_receipt')->result_array();

            $this->db->select_sum('Amount');
            $this->db->from('money_receipt');
            $this->db->where('ProgramName', $tt1);
            $this->db->where('SemesterName', $SessionName);
            $query12 = $this->db->get()->result_array();
            foreach($query12 as $row2412):
                $page_data['Amount']    = $row2412['Amount'];
            endforeach;
        }
        $page_data['page_name']  = 'money_receipt_bank';
        $page_data['page_title'] = get_phrase('money_receipt_bank');
        $this->load->view('backend/index', $page_data);
    }
    function payment_receipt_bank_old($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $ProgramName         = $this->input->post('ProgramName');
        $SessionName         = $this->input->post('SessionName');
        $Year         = $this->input->post('Year');
        $BatchName         = $this->input->post('BatchName');
        $this->db->where('ProgramName', $ProgramName);
        $this->db->where('SessionName', $SessionName);
        $this->db->where('Year', $Year);
        $this->db->where('BatchName', $BatchName);
        $page_data['short']    = $this->db->get('std_fee_collection')->result_array();
        $page_data['page_name']  = 'payment_receipt_bank';
        $page_data['page_title'] = get_phrase('payment_receipt_bank');
        $this->load->view('backend/index', $page_data);
    }

    function payment_receipt_bank($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $ProgramName         = $this->input->post('ProgramName');
        $SessionName         = $this->input->post('SessionName');
        $Year         = $this->input->post('Year');
        $BatchName         = $this->input->post('BatchName');
        //exit();
        $tt1 = (int)$ProgramName;

        if($ProgramName == '*' AND $SessionName == '*' AND $Year == '*' AND $BatchName == '*'){
            $page_data['temp'] = '1';
            $page_data['ProgramName'] = 'All';
            $page_data['SessionName'] = 'All';
            $page_data['Year'] = 'All';
            $page_data['BatchName'] = 'All';
            $page_data['short']    = $this->db->get('std_fee_collection')->result_array();

            $this->db->select_sum('actual_amount');
            $this->db->select_sum('paid_amount');
            $this->db->select_sum('remaining_amount');
            $this->db->from('std_fee_collection');
            $query12 = $this->db->get()->result_array();
            foreach($query12 as $row2412):
                $page_data['Amount']    = $row2412['actual_amount'];
                $page_data['paid_Amount']    = $row2412['paid_amount'];
                $page_data['remaining_Amount']    = $row2412['remaining_amount'];
            endforeach;
        }else if($ProgramName == '*' AND $SessionName == '*' AND $Year == '*' AND $BatchName != '*'){
            $page_data['temp'] = '2';
            //$BatchName;
            //exit();
            $page_data['ProgramName'] = 'All';
            $page_data['SessionName'] = 'All';
            $page_data['Year'] = 'All';
            $page_data['BatchName'] = $BatchName;
            $this->db->where('BatchName', $BatchName);
            $page_data['short']    = $this->db->get('std_fee_collection')->result_array();

            $this->db->select_sum('actual_amount');
            $this->db->select_sum('paid_amount');
            $this->db->select_sum('remaining_amount');
            $this->db->from('std_fee_collection');
            $this->db->where('BatchName', $BatchName);
            $query12 = $this->db->get()->result_array();
            foreach($query12 as $row2412):
                $page_data['Amount']    = $row2412['actual_amount'];
                $page_data['paid_Amount']    = $row2412['paid_amount'];
                $page_data['remaining_Amount']    = $row2412['remaining_amount'];
            endforeach;
        }else if($ProgramName == '*' AND $SessionName == '*' AND $Year != '*' AND $BatchName == '*'){
            $page_data['temp'] = '3';
            $page_data['ProgramName'] = 'All';
            $page_data['SessionName'] = 'All';
            $page_data['Year'] = $Year;
            $page_data['BatchName'] = 'All';
            $this->db->where('Year', $Year);
            $page_data['short']    = $this->db->get('std_fee_collection')->result_array();

            $this->db->select_sum('actual_amount');
            $this->db->select_sum('paid_amount');
            $this->db->select_sum('remaining_amount');
            $this->db->from('std_fee_collection');
            $this->db->where('Year', $Year);
            $query12 = $this->db->get()->result_array();
            foreach($query12 as $row2412):
                $page_data['Amount']    = $row2412['actual_amount'];
                $page_data['paid_Amount']    = $row2412['paid_amount'];
                $page_data['remaining_Amount']    = $row2412['remaining_amount'];
            endforeach;
        }else if($ProgramName == '*' AND $SessionName == '*' AND $Year != '*' AND $BatchName != '*'){
            $page_data['temp'] = '4';
            $page_data['ProgramName'] = 'All';
            $page_data['SessionName'] = 'All';
            $page_data['Year'] = $Year;
            $page_data['BatchName'] = $BatchName;
            $this->db->where('Year', $Year);
            $this->db->where('BatchName', $BatchName);
            $page_data['short']    = $this->db->get('std_fee_collection')->result_array();

            $this->db->select_sum('actual_amount');
            $this->db->select_sum('paid_amount');
            $this->db->select_sum('remaining_amount');
            $this->db->from('std_fee_collection');
            $this->db->where('Year', $Year);
            $this->db->where('BatchName', $BatchName);
            $query12 = $this->db->get()->result_array();
            foreach($query12 as $row2412):
                $page_data['Amount']    = $row2412['actual_amount'];
                $page_data['paid_Amount']    = $row2412['paid_amount'];
                $page_data['remaining_Amount']    = $row2412['remaining_amount'];
            endforeach;
        }else if($ProgramName == '*' AND $SessionName != '*' AND $Year == '*' AND $BatchName == '*'){
            $page_data['temp'] = '5';
            $page_data['ProgramName'] = 'All';
            $page_data['SessionName'] = $SessionName;
            $page_data['Year'] = 'All';
            $page_data['BatchName'] = 'All';
            $this->db->where('SessionName', $SessionName);
            $page_data['short']    = $this->db->get('std_fee_collection')->result_array();

            $this->db->select_sum('actual_amount');
            $this->db->select_sum('paid_amount');
            $this->db->select_sum('remaining_amount');
            $this->db->from('std_fee_collection');
            $this->db->where('SessionName', $SessionName);
            $query12 = $this->db->get()->result_array();
            foreach($query12 as $row2412):
                $page_data['Amount']    = $row2412['actual_amount'];
                $page_data['paid_Amount']    = $row2412['paid_amount'];
                $page_data['remaining_Amount']    = $row2412['remaining_amount'];
            endforeach;
        }else if($ProgramName == '*' AND $SessionName != '*' AND $Year == '*' AND $BatchName != '*'){
            $page_data['temp'] = '6';
            $page_data['ProgramName'] = 'All';
            $page_data['SessionName'] = $SessionName;
            $page_data['Year'] = 'All';
            $page_data['BatchName'] = $BatchName;
            $this->db->where('BatchName', $BatchName);
            $this->db->where('SessionName', $SessionName);
            $page_data['short']    = $this->db->get('std_fee_collection')->result_array();

            $this->db->select_sum('actual_amount');
            $this->db->select_sum('paid_amount');
            $this->db->select_sum('remaining_amount');
            $this->db->from('std_fee_collection');
            $this->db->where('BatchName', $BatchName);
            $this->db->where('SessionName', $SessionName);
            $query12 = $this->db->get()->result_array();
            foreach($query12 as $row2412):
                $page_data['Amount']    = $row2412['actual_amount'];
                $page_data['paid_Amount']    = $row2412['paid_amount'];
                $page_data['remaining_Amount']    = $row2412['remaining_amount'];
            endforeach;
        }else if($ProgramName == '*' AND $SessionName != '*' AND $Year != '*' AND $BatchName == '*'){
            $page_data['temp'] = '7';
            $page_data['ProgramName'] = 'All';
            $page_data['SessionName'] = $SessionName;
            $page_data['Year'] = $Year;
            $page_data['BatchName'] = 'All';
            $this->db->where('SessionName', $SessionName);
            $this->db->where('Year', $Year);
            $page_data['short']    = $this->db->get('std_fee_collection')->result_array();

            $this->db->select_sum('actual_amount');
            $this->db->select_sum('paid_amount');
            $this->db->select_sum('remaining_amount');
            $this->db->from('std_fee_collection');
            $this->db->where('SessionName', $SessionName);
            $this->db->where('Year', $Year);
            $query12 = $this->db->get()->result_array();
            foreach($query12 as $row2412):
                $page_data['Amount']    = $row2412['actual_amount'];
                $page_data['paid_Amount']    = $row2412['paid_amount'];
                $page_data['remaining_Amount']    = $row2412['remaining_amount'];
            endforeach;
        }else if($ProgramName == '*' AND $SessionName != '*' AND $Year != '*' AND $BatchName != '*'){
            $page_data['temp'] = '8';
            $page_data['ProgramName'] = 'All';
            $page_data['SessionName'] = $SessionName;
            $page_data['Year'] = $Year;
            $page_data['BatchName'] = $BatchName;
            $this->db->where('BatchName', $BatchName);
            $this->db->where('SessionName', $SessionName);
            $this->db->where('Year', $Year);
            $page_data['short']    = $this->db->get('std_fee_collection')->result_array();

            $this->db->select_sum('actual_amount');
            $this->db->select_sum('paid_amount');
            $this->db->select_sum('remaining_amount');
            $this->db->from('std_fee_collection');
            $this->db->where('BatchName', $BatchName);
            $this->db->where('SessionName', $SessionName);
            $this->db->where('Year', $Year);
            $query12 = $this->db->get()->result_array();
            foreach($query12 as $row2412):
                $page_data['Amount']    = $row2412['actual_amount'];
                $page_data['paid_Amount']    = $row2412['paid_amount'];
                $page_data['remaining_Amount']    = $row2412['remaining_amount'];
            endforeach;
        }else if($ProgramName != '*' AND $SessionName == '*' AND $Year == '*' AND $BatchName == '*'){
            $page_data['temp'] = '9';
            $page_data['ProgramName'] = $ProgramName;
            $page_data['SessionName'] = 'All';
            $page_data['Year'] = 'All';
            $page_data['BatchName'] = 'All';
            $this->db->where('ProgramName', $ProgramName);
            $page_data['short']    = $this->db->get('std_fee_collection')->result_array();

            $this->db->select_sum('actual_amount');
            $this->db->select_sum('paid_amount');
            $this->db->select_sum('remaining_amount');
            $this->db->from('std_fee_collection');
            $this->db->where('ProgramName', $ProgramName);
            $query12 = $this->db->get()->result_array();
            foreach($query12 as $row2412):
                $page_data['Amount']    = $row2412['actual_amount'];
                $page_data['paid_Amount']    = $row2412['paid_amount'];
                $page_data['remaining_Amount']    = $row2412['remaining_amount'];
            endforeach;
        }else if($ProgramName != '*' AND $SessionName == '*' AND $Year == '*' AND $BatchName != '*'){
            $page_data['temp'] = '10';
            $page_data['ProgramName'] = $ProgramName;
            $page_data['SessionName'] = 'All';
            $page_data['Year'] = 'All';
            $page_data['BatchName'] = $BatchName;
            $this->db->where('ProgramName', $ProgramName);
            $this->db->where('BatchName', $BatchName);
            $page_data['short']    = $this->db->get('std_fee_collection')->result_array();

            $this->db->select_sum('actual_amount');
            $this->db->select_sum('paid_amount');
            $this->db->select_sum('remaining_amount');
            $this->db->from('std_fee_collection');
            $this->db->where('ProgramName', $ProgramName);
            $this->db->where('BatchName', $BatchName);
            $query12 = $this->db->get()->result_array();
            foreach($query12 as $row2412):
                $page_data['Amount']    = $row2412['actual_amount'];
                $page_data['paid_Amount']    = $row2412['paid_amount'];
                $page_data['remaining_Amount']    = $row2412['remaining_amount'];
            endforeach;
        }else if($ProgramName != '*' AND $SessionName == '*' AND $Year != '*' AND $BatchName == '*'){
            $page_data['temp'] = '11';
            $page_data['ProgramName'] = $ProgramName;
            $page_data['SessionName'] = 'All';
            $page_data['Year'] = $Year;
            $page_data['BatchName'] = 'All';
            $this->db->where('ProgramName', $ProgramName);
            $this->db->where('Year', $Year);
            $page_data['short']    = $this->db->get('std_fee_collection')->result_array();

            $this->db->select_sum('actual_amount');
            $this->db->select_sum('paid_amount');
            $this->db->select_sum('remaining_amount');
            $this->db->from('std_fee_collection');
            $this->db->where('ProgramName', $ProgramName);
            $this->db->where('Year', $Year);
            $query12 = $this->db->get()->result_array();
            foreach($query12 as $row2412):
                $page_data['Amount']    = $row2412['actual_amount'];
                $page_data['paid_Amount']    = $row2412['paid_amount'];
                $page_data['remaining_Amount']    = $row2412['remaining_amount'];
            endforeach;
        }else if($ProgramName != '*' AND $SessionName == '*' AND $Year != '*' AND $BatchName != '*'){
            $page_data['temp'] = '12';
            $page_data['ProgramName'] = $ProgramName;
            $page_data['SessionName'] = 'All';
            $page_data['Year'] = $Year;
            $page_data['BatchName'] = $BatchName;
            $this->db->where('ProgramName', $ProgramName);
            $this->db->where('Year', $Year);
            $this->db->where('BatchName', $BatchName);
            $page_data['short']    = $this->db->get('std_fee_collection')->result_array();

            $this->db->select_sum('actual_amount');
            $this->db->select_sum('paid_amount');
            $this->db->select_sum('remaining_amount');
            $this->db->from('std_fee_collection');
            $this->db->where('ProgramName', $ProgramName);
            $this->db->where('Year', $Year);
            $this->db->where('BatchName', $BatchName);
            $query12 = $this->db->get()->result_array();
            foreach($query12 as $row2412):
                $page_data['Amount']    = $row2412['actual_amount'];
                $page_data['paid_Amount']    = $row2412['paid_amount'];
                $page_data['remaining_Amount']    = $row2412['remaining_amount'];
            endforeach;
        }else if($ProgramName != '*' AND $SessionName != '*' AND $Year == '*' AND $BatchName == '*'){
            $page_data['temp'] = '13';
            $page_data['ProgramName'] = $ProgramName;
            $page_data['SessionName'] = $SessionName;
            $page_data['Year'] = 'All';
            $page_data['BatchName'] = 'All';
            $this->db->where('ProgramName', $ProgramName);
            $this->db->where('SessionName', $SessionName);
            $page_data['short']    = $this->db->get('std_fee_collection')->result_array();

            $this->db->select_sum('actual_amount');
            $this->db->select_sum('paid_amount');
            $this->db->select_sum('remaining_amount');
            $this->db->from('std_fee_collection');
            $this->db->where('ProgramName', $ProgramName);
            $this->db->where('SessionName', $SessionName);
            $query12 = $this->db->get()->result_array();
            foreach($query12 as $row2412):
                $page_data['Amount']    = $row2412['actual_amount'];
                $page_data['paid_Amount']    = $row2412['paid_amount'];
                $page_data['remaining_Amount']    = $row2412['remaining_amount'];
            endforeach;
        }else if($ProgramName != '*' AND $SessionName != '*' AND $Year == '*' AND $BatchName != '*'){
            $page_data['temp'] = '14';
            $page_data['ProgramName'] = $ProgramName;
            $page_data['SessionName'] = $SessionName;
            $page_data['Year'] = 'All';
            $page_data['BatchName'] = $BatchName;
            $this->db->where('ProgramName', $ProgramName);
            $this->db->where('SessionName', $SessionName);
            $this->db->where('BatchName', $BatchName);
            $page_data['short']    = $this->db->get('std_fee_collection')->result_array();

            $this->db->select_sum('actual_amount');
            $this->db->select_sum('paid_amount');
            $this->db->select_sum('remaining_amount');
            $this->db->from('std_fee_collection');
            $this->db->where('ProgramName', $ProgramName);
            $this->db->where('SessionName', $SessionName);
            $this->db->where('BatchName', $BatchName);
            $query12 = $this->db->get()->result_array();
            foreach($query12 as $row2412):
                $page_data['Amount']    = $row2412['actual_amount'];
                $page_data['paid_Amount']    = $row2412['paid_amount'];
                $page_data['remaining_Amount']    = $row2412['remaining_amount'];
            endforeach;
        }else if($ProgramName != '*' AND $SessionName != '*' AND $Year != '*' AND $BatchName == '*'){
            $page_data['temp'] = '15';
            $page_data['ProgramName'] = $ProgramName;
            $page_data['SessionName'] = $SessionName;
            $page_data['Year'] = $Year;
            $page_data['BatchName'] = 'All';
            $this->db->where('ProgramName', $ProgramName);
            $this->db->where('SessionName', $SessionName);
            $this->db->where('Year', $Year);
            $page_data['short']    = $this->db->get('std_fee_collection')->result_array();

            $this->db->select_sum('actual_amount');
            $this->db->select_sum('paid_amount');
            $this->db->select_sum('remaining_amount');
            $this->db->from('std_fee_collection');
            $this->db->where('ProgramName', $ProgramName);
            $this->db->where('SessionName', $SessionName);
            $this->db->where('Year', $Year);
            $query12 = $this->db->get()->result_array();
            foreach($query12 as $row2412):
                $page_data['Amount']    = $row2412['actual_amount'];
                $page_data['paid_Amount']    = $row2412['paid_amount'];
                $page_data['remaining_Amount']    = $row2412['remaining_amount'];
            endforeach;
        }else if($ProgramName != '*' AND $SessionName != '*' AND $Year != '*' AND $BatchName != '*'){
            $page_data['temp'] = '16';
            $page_data['ProgramName'] = $ProgramName;
            $page_data['SessionName'] = $SessionName;
            $page_data['Year'] = $Year;
            $page_data['BatchName'] = $BatchName;
            $this->db->where('ProgramName', $ProgramName);
            $this->db->where('SessionName', $SessionName);
            $this->db->where('Year', $Year);
            $this->db->where('BatchName', $BatchName);
            $page_data['short']    = $this->db->get('std_fee_collection')->result_array();

            $this->db->select_sum('actual_amount');
            $this->db->select_sum('paid_amount');
            $this->db->select_sum('remaining_amount');
            $this->db->from('std_fee_collection');
            $this->db->where('ProgramName', $ProgramName);
            $this->db->where('SessionName', $SessionName);
            $this->db->where('Year', $Year);
            $this->db->where('BatchName', $BatchName);
            $query12 = $this->db->get()->result_array();
            foreach($query12 as $row2412):
                $page_data['Amount']    = $row2412['actual_amount'];
                $page_data['paid_Amount']    = $row2412['paid_amount'];
                $page_data['remaining_Amount']    = $row2412['remaining_amount'];
            endforeach;
        }
        $page_data['page_name']  = 'payment_receipt_bank';
        $page_data['page_title'] = get_phrase('payment_receipt_bank');
        $this->load->view('backend/index', $page_data);
    }

    function students_list_program_session_year($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        //$data['SemesterName']         = $this->input->post('SemesterName');
        //$data['Year']         = $this->input->post('Year');
        //$data['ProgramName']         = $this->input->post('ProgramName');

        $data['AdmissionRollNo']         = $this->input->post('AdmissionRollNo');
        $SeatCount         = $this->input->post('SeatCount');
        //exit();
        $ProgramName         = $this->input->post('ProgramName');
        $SessionName         = $this->input->post('SessionName');
        $Year         = $this->input->post('Year');

        $tt1 = (int)$ProgramName;
        //$tt = (float)$dataFromGPA;
        //exit();
        //$weas = 0;
        //$this->db->limit($SeatCount);
        //$this->db->where('EmailNotify =',$weas);
        //$this->db->where('CandidateStudent',0);
        $this->db->where('NameofProgram', $tt1);
        $this->db->where('Session', $SessionName);
        $this->db->where('AdmissionYear', $Year);
        //$this->db->where('TotalGPA>=', $tt);
        $page_data['short']    = $this->db->get('student_pundro')->result_array();

        //exit();
        $page_data['page_name']  = 'students_list_program_session_year';
        $page_data['page_title'] = get_phrase('students_list_program_session_year');
        $this->load->view('backend/index', $page_data);
    }

    function semester_wise_distri_of_courses($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $data['ProgramName']         = $this->input->post('ProgramName');
        $data['BatchName']         = $this->input->post('Batch');
        $data['Semester']         = $this->input->post('Semester');
        //$page_data['assign_subjects12'] = $this->db->where('course', $data['ProgramName']);
        $this->db->where('BatchName', $data['BatchName']);
        $this->db->where('Semester', $data['Semester']);
        $page_data['assign_subjects12']    = $this->db->get('assign_subjects')->result_array();
        $page_data['page_name']  = 'semester_wise_distri_of_courses';
        $page_data['page_title'] = get_phrase('semester_wise_distribution_of_courses');
        $this->load->view('backend/index', $page_data);
    }
    function students_list_program_semester($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $data['NameofProgram']         = $this->input->post('NameofProgram');
        $data['Session']         = $this->input->post('Session');
        $data12         = $this->input->post('StdStatus');

        $page_data['as'] = $this->db->where('Session', $data['Session']);
        $page_data['as'] = $this->db->where('NameofProgram', $data['NameofProgram']);
        //$page_data['acdSession'] = $this->db->where('StdStatus', $data['StdStatus']);
        //$page_data['as'] = $this->db->where('StdStatus', $data['StdStatus']);
        //$page_data['as'] = $this->db->where("StdStatus LIKE '%$data["StdStatus"]%'");
        //$page_data['as'] = $this->db->like('StdStatus', $data12);
        $page_data['as'] = $this->db->like('StdStatus', $data12);
        $page_data['as']    = $this->db->get('applicants_details')->result_array();
        $page_data['page_name']  = 'students_list_program_semester';
        $page_data['page_title'] = get_phrase('students_list_program_and_semester_wise');
        $this->load->view('backend/index', $page_data);
    }
    function get_class_section($class_id)
    {
        $sections = $this->db->get_where('semester_particulars' , array(
            'id' => $class_id
        ))->result_array();
        foreach ($sections as $row) {
            echo '<option value="' . $row['id'] . '">' . $row['description'] . '</option>';
        }
    }

    function get_class_sectionsa($class_id)
    {
        $sections = $this->db->get_where('money_receipt' , array(
            'id' => $class_id
        ))->result_array();
        foreach ($sections as $row) {
            echo '<option value="' . $row['id'] . '">' . $row['CandidateName']." - ".$row['MobileNumber']." - ".$row['Email'] . '</option>';
        }
    }

    function get_class_instructor($class_id)
    {
        $sections = $this->db->get_where('course_instructor' , array(
            'NameofProgram' => $class_id
        ))->result_array();
        foreach ($sections as $row) {
            echo '<option value="' . $row['id'] . '">' . $row['InstructorName'] . '</option>';
        }
    }

    function get_batch($program_id)
    {
        $sections22 = $this->db->get_where('batch' , array(
            'course' => $program_id
        ))->result_array();
        foreach ($sections22 as $row22) {
            echo '<option value="' . $row22['id'] . '">' . $row22['batch_alias'] . '</option>';
        }
    }
    function get_class_section12($class_id)
    {
        $sections = $this->db->get_where('student_pundro' , array(
            'NameofBatch' => $class_id
        ))->result_array();
        foreach ($sections as $row23) {
            //echo '<option value="' . $row['id'] . '">' . $row['ClassRollNo'] . '</option>';
            echo $row23['ClassRollNo'];
        }
    }

    function programs_fees($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['program_name']         = $this->input->post('program_name');
            $data['semester_total']         = $this->input->post('semester_total');
            $data['credit_total']         = $this->input->post('credit_total');
            $data['adm_regist_fee']         = $this->input->post('adm_regist_fee');
            $data['tuition_fee']         = $this->input->post('tuition_fee');
            $data['per_semester_tuition_fee']         = $this->input->post('per_semester_tuition_fee');
            $data['other_fee']         = $this->input->post('other_fee');
            $data['per_semester_other_fees']         = $this->input->post('per_semester_other_fees');
            $data['fee_total']         = $this->input->post('fee_total');

            $this->db->insert('programs_fees', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/programs_fees/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['program_name']         = $this->input->post('program_name');
            $data['semester_total']         = $this->input->post('semester_total');
            $data['credit_total']         = $this->input->post('credit_total');
            $data['adm_regist_fee']         = $this->input->post('adm_regist_fee');
            $data['tuition_fee']         = $this->input->post('tuition_fee');
            $data['per_semester_tuition_fee']         = $this->input->post('per_semester_tuition_fee');
            $data['other_fee']         = $this->input->post('other_fee');
            $data['per_semester_other_fees']         = $this->input->post('per_semester_other_fees');
            $data['fee_total']         = $this->input->post('fee_total');

            $this->db->where('id', $param2);
            $this->db->update('programs_fees', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/programs_fees/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('programs_fees', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('programs_fees');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/programs_fees/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('programs_fees')->result_array();
        $page_data['page_name']  = 'programs_fees';
        $page_data['page_title'] = get_phrase('programs_fees');
        $this->load->view('backend/index', $page_data);
    }
    function std_fee_waiver($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');
            $data['fee_type']         = $this->input->post('fee_type');

            $this->db->insert('std_fee_waiver', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/std_fee_waiver/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');
            $data['fee_type']         = $this->input->post('fee_type');

            $this->db->where('id', $param2);
            $this->db->update('std_fee_waiver', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/std_fee_waiver/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('std_fee_waiver', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('std_fee_waiver');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/std_fee_waiver/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('std_fee_waiver')->result_array();
        $page_data['page_name']  = 'std_fee_waiver';
        $page_data['page_title'] = get_phrase('waiver');
        $this->load->view('backend/index', $page_data);
    }
    function std_fee_template($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'std_fee_template';
        $page_data['page_title'] = get_phrase('student_fee_template');
        $this->load->view('backend/index', $page_data);
    }
    /*function std_fee_allocation($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'std_fee_allocation';
        $page_data['page_title'] = get_phrase('student_fee_allocation');
        $this->load->view('backend/index', $page_data);
    }*/
    function std_fee_allocation($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');

            $this->db->insert('std_fee_allocation', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/std_fee_allocation/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');

            $this->db->where('id', $param2);
            $this->db->update('std_fee_allocation', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/std_fee_allocation/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('std_fee_allocation', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('std_fee_allocation');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/std_fee_allocation/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('std_fee_allocation')->result_array();
        $page_data['page_name']  = 'std_fee_allocation';
        $page_data['page_title'] = get_phrase('student_fee_allocation');
        $this->load->view('backend/index', $page_data);
    }
    function credit_note_entry($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'credit_note_entry';
        $page_data['page_title'] = get_phrase('credit_note_entry');
        $this->load->view('backend/index', $page_data);
    }

    function waiver_note_entry($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');
            $data['department']         = $this->input->post('department');
            $data['batch']         = $this->input->post('batch');
            $data['income']         = $this->input->post('income');

            $this->db->insert('waiver_note_entry', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/waiver_note_entry/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');
            $data['department']         = $this->input->post('department');
            $data['batch']         = $this->input->post('batch');
            $data['income']         = $this->input->post('income');

            $this->db->where('id', $param2);
            $this->db->update('waiver_note_entry', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/waiver_note_entry/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('waiver_note_entry', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('waiver_note_entry');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/waiver_note_entry/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('waiver_note_entry')->result_array();
        $page_data['page_name']  = 'waiver_note_entry';
        $page_data['page_title'] = get_phrase('waiver_note_entry');
        $this->load->view('backend/index', $page_data);
    }
    function waiver_note_posting_and_approval($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'waiver_note_posting_and_approval';
        $page_data['page_title'] = get_phrase('waiver_note_posting_and_approval');
        $this->load->view('backend/index', $page_data);
    }
    function receipt_entry($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'receipt_entry';
        $page_data['page_title'] = get_phrase('receipt_entry');
        $this->load->view('backend/index', $page_data);
    }
    function receipt_printing($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'receipt_printing';
        $page_data['page_title'] = get_phrase('receipt_printing');
        $this->load->view('backend/index', $page_data);
    }
    function receipt_posting($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'receipt_posting';
        $page_data['page_title'] = get_phrase('receipt_posting');
        $this->load->view('backend/index', $page_data);
    }
    function bank_credit_terminal($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'bank_credit_terminal';
        $page_data['page_title'] = get_phrase('bank_credit_terminal');
        $this->load->view('backend/index', $page_data);
    }
    function receipt_entry_and_receipt_printing($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'receipt_entry_and_receipt_printing';
        $page_data['page_title'] = get_phrase('receipt_entry_and_receipt_printing');
        $this->load->view('backend/index', $page_data);
    }
    function reconciliation_process($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'reconciliation_process';
        $page_data['page_title'] = get_phrase('reconciliation_process');
        $this->load->view('backend/index', $page_data);
    }
    function import_data_from_bank($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'import_data_from_bank';
        $page_data['page_title'] = get_phrase('import_data_from_bank');
        $this->load->view('backend/index', $page_data);
    }
    function update_unsuccessful_data($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'update_unsuccessful_data';
        $page_data['page_title'] = get_phrase('update_unsuccessful_data');
        $this->load->view('backend/index', $page_data);
    }
    function bill_payment_processing($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'bill_payment_processing';
        $page_data['page_title'] = get_phrase('bill_payment_processing');
        $this->load->view('backend/index', $page_data);
    }
    function std_quick_payment($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');

            $this->db->insert('std_quick_payment', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/std_quick_payment/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');

            $this->db->where('id', $param2);
            $this->db->update('std_quick_payment', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/std_quick_payment/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('std_quick_payment', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('std_quick_payment');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/std_quick_payment/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('std_quick_payment')->result_array();
        $page_data['page_name']  = 'std_quick_payment';
        $page_data['page_title'] = get_phrase('quick_payment');
        $this->load->view('backend/index', $page_data);
    }
    function std_fee_due_list($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'std_fee_due_list';
        $page_data['page_title'] = get_phrase('student_fee_due_list');
        $this->load->view('backend/index', $page_data);
    }
    function std_fee_reports($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'std_fee_reports';
        $page_data['page_title'] = get_phrase('student_fee_reports');
        $this->load->view('backend/index', $page_data);
    }
    function std_fee_import($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'std_fee_import';
        $page_data['page_title'] = get_phrase('student_fee_import');
        $this->load->view('backend/index', $page_data);
    }
    function std_account_group($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'std_account_group';
        $page_data['page_title'] = get_phrase('student_account_group');
        $this->load->view('backend/index', $page_data);
    }
    function std_voucher_master($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'std_voucher_master';
        $page_data['page_title'] = get_phrase('student_voucher_master');
        $this->load->view('backend/index', $page_data);
    }
    function std_voucher_head($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'std_voucher_head';
        $page_data['page_title'] = get_phrase('student_voucher_head');
        $this->load->view('backend/index', $page_data);
    }
    function std_create_voucher($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'std_create_voucher';
        $page_data['page_title'] = get_phrase('student_create_voucher');
        $this->load->view('backend/index', $page_data);
    }
    function std_day_book($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'std_day_book';
        $page_data['page_title'] = get_phrase('student_day_book');
        $this->load->view('backend/index', $page_data);
    }
    function std_cash_book($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'std_cash_book';
        $page_data['page_title'] = get_phrase('student_cash_book');
        $this->load->view('backend/index', $page_data);
    }
    function std_bank_book($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'std_bank_book';
        $page_data['page_title'] = get_phrase('student_bank_book');
        $this->load->view('backend/index', $page_data);
    }

    function room_availability_report($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'room_availability_report';
        $page_data['page_title'] = get_phrase('room_availability_report');
        $this->load->view('backend/index', $page_data);
    }
    function room_request_report($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'room_request_report';
        $page_data['page_title'] = get_phrase('room_request_report');
        $this->load->view('backend/index', $page_data);
    }
    function room_occupancy_report($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'room_occupancy_report';
        $page_data['page_title'] = get_phrase('room_occupancy_report');
        $this->load->view('backend/index', $page_data);
    }
    function hostel_fee_reports($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'hostel_fee_reports';
        $page_data['page_title'] = get_phrase('hostel_fee_reports');
        $this->load->view('backend/index', $page_data);
    }
    function dormitory_setup($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'dormitory_setup';
        $page_data['page_title'] = get_phrase('dormitory_setup');
        $this->load->view('backend/index', $page_data);
    }
    function rooms_allocations($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'rooms_allocations';
        $page_data['page_title'] = get_phrase('rooms_allocations');
        $this->load->view('backend/index', $page_data);
    }
    function check_in_check_out($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'check_in_check_out';
        $page_data['page_title'] = get_phrase('check_in_check_out');
        $this->load->view('backend/index', $page_data);
    }
    function complaints_hostel($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'complaints_hostel';
        $page_data['page_title'] = get_phrase('complaints_hostel');
        $this->load->view('backend/index', $page_data);
    }
    function equipment_hostel($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'equipment_hostel';
        $page_data['page_title'] = get_phrase('equipment_hostel');
        $this->load->view('backend/index', $page_data);
    }
    function reports_students($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'reports_students';
        $page_data['page_title'] = get_phrase('reports_students');
        $this->load->view('backend/index', $page_data);
    }
    function reports_stock_in_stock_out($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'reports_stock_in_stock_out';
        $page_data['page_title'] = get_phrase('reports_stock_in_stock_out');
        $this->load->view('backend/index', $page_data);
    }
    function rooms_allocations_hostel($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'rooms_allocations_hostel';
        $page_data['page_title'] = get_phrase('rooms_allocations_hostel');
        $this->load->view('backend/index', $page_data);
    }
    function reports_maintenance_records($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'reports_maintenance_records';
        $page_data['page_title'] = get_phrase('reports_maintenance_records');
        $this->load->view('backend/index', $page_data);
    }
    function reports_maintenance_schedules($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'reports_maintenance_schedules';
        $page_data['page_title'] = get_phrase('reports_maintenance_schedules');
        $this->load->view('backend/index', $page_data);
    }
    /********************************************/
    function revenue_setup($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');
            $data['department']         = $this->input->post('department');
            $data['batch']         = $this->input->post('batch');
            $data['income']         = $this->input->post('income');
            $data['netincome']         = $this->input->post('netincome');

            $this->db->insert('revenue_setup', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/revenue_setup/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['fee_category']         = $this->input->post('fee_category');
            $data['receipt_no']         = $this->input->post('receipt_no');
            $data['description']         = $this->input->post('description');
            $data['department']         = $this->input->post('department');
            $data['batch']         = $this->input->post('batch');
            $data['income']         = $this->input->post('income');
            $data['netincome']         = $this->input->post('netincome');

            $this->db->where('id', $param2);
            $this->db->update('revenue_setup', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/revenue_setup/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('revenue_setup', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('revenue_setup');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/revenue_setup/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('revenue_setup')->result_array();
        $page_data['page_name']  = 'revenue_setup';
        $page_data['page_title'] = get_phrase('revenue_setup');
        $this->load->view('backend/index', $page_data);
    }
    function fee_types($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'fee_types';
        $page_data['page_title'] = get_phrase('fee_types');
        $this->load->view('backend/index', $page_data);
    }
    function credit_note($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'credit_note';
        $page_data['page_title'] = get_phrase('credit_note');
        $this->load->view('backend/index', $page_data);
    }
    function waiver_note($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'waiver_note';
        $page_data['page_title'] = get_phrase('waiver_note');
        $this->load->view('backend/index', $page_data);
    }
    function course_wise_fee_assign($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'course_wise_fee_assign';
        $page_data['page_title'] = get_phrase('course_wise_fee_assign');
        $this->load->view('backend/index', $page_data);
    }
    function batch_wise_fee_assign($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'batch_wise_fee_assign';
        $page_data['page_title'] = get_phrase('batch_wise_fee_assign');
        $this->load->view('backend/index', $page_data);
    }
    function scholarship_declare($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'scholarship_declare';
        $page_data['page_title'] = get_phrase('scholarship_declare');
        $this->load->view('backend/index', $page_data);
    }
    function attendance_fine_declare($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'attendance_fine_declare';
        $page_data['page_title'] = get_phrase('attendance_fine_declare');
        $this->load->view('backend/index', $page_data);
    }
    function fee_generate($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'fee_generate';
        $page_data['page_title'] = get_phrase('fee_generate');
        $this->load->view('backend/index', $page_data);
    }
    function fee_check_modify($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'fee_check_modify';
        $page_data['page_title'] = get_phrase('fee_check_modify');
        $this->load->view('backend/index', $page_data);
    }
    function fee_invoice_create($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'fee_invoice_create';
        $page_data['page_title'] = get_phrase('fee_invoice_create');
        $this->load->view('backend/index', $page_data);
    }
    function bill_entry($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'bill_entry';
        $page_data['page_title'] = get_phrase('bill_entry');
        $this->load->view('backend/index', $page_data);
    }
    function fee_invoice_print($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'fee_invoice_print';
        $page_data['page_title'] = get_phrase('fee_invoice_print');
        $this->load->view('backend/index', $page_data);
    }
    function fee_collections($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'fee_collections';
        $page_data['page_title'] = get_phrase('fee_collections');
        $this->load->view('backend/index', $page_data);
    }

    function attendance_sheet($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'attendance_sheet';
        $page_data['page_title'] = get_phrase('attendance_sheet');
        $this->load->view('backend/index', $page_data);
    }

    function std_fee_collection($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            //exit();
            //echo $str = "computerscienceengineering";
            //echo "<br>";
            //substr($str,-1, 1);
            //$str[0].$str[1].$str[2].$str[3];
            //echo substr($str,0, 5);
            //exit();

            /* Batch Name-Code Query*/
            $data13['BatchName']         = $this->input->post('BatchName');
            $this->db->where('id', $data13['BatchName']);
            $rere23 = $this->db->get('batch')->result_array();
            foreach($rere23 as $erd23):
                //echo $erd23['id'];
            endforeach;
            //exit();
            $tte = explode('-',$erd23['batch_alias']);
            //echo $tte[1];

            /* Applicants Details Query*/
            $data1212         = $this->input->post('MoneyReceipt');
            $vala = explode(' ', $data1212);
            $this->db->where('PresentMobile', $vala[0]);
            $rere = $this->db->get('applicants_details')->result_array();
            foreach($rere as $erd):
                $erd['id'];
            endforeach;
            //echo $erd['NameofProgram'];
            $this->db->select_max('ClassRollNo');
            $this->db->where('NameofProgram', $erd['NameofProgram']);
            $rerea = $this->db->get('applicants_details')->result_array();
            foreach($rerea as $erda):
                $erda['ClassRollNo'];
            endforeach;

            $NewClassRoll = $erda['ClassRollNo']+1;

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

            //exit();

            $this->db->where('id',$erd['NameofProgram']);
            $coursecode = $this->db->get('course_program')->result_array();
            foreach($coursecode as $ewew):
                //echo $ewew['course_code'];
            endforeach;
            //exit();

            $data['semester_name']         = $this->input->post('receipt_no');
            $data['SessionName']         = $this->input->post('SessionName');
            $data['Year']         = $this->input->post('Year');
            $data['ProgramName']         = $this->input->post('ProgramName');
            $data['BatchName']         = $this->input->post('BatchName');
            $data['register_number']         = $erd['id'];
            $data['actual_amount']         = $this->input->post('actual_amount');
            $data['paid_amount']         = array_sum($_POST['particulars2']);
            $data['remaining_amount']         = ($data['actual_amount'] - $data['paid_amount']);
            $particulars1 = implode(',', $this->input->post('particulars1[]'));
            $particulars2 = implode(',', $this->input->post('particulars2[]'));
            $data['particulars1'] = json_encode($particulars1);
            $data['particulars2'] = json_encode($particulars2);
            $data['created_at']         = date("Y-m-d");
            $data['updated_at']         = date("Y-m-d");

            $this->db->insert('std_fee_collection', $data);
            //exit();
            /*Update to applicants_details as enrolled as student*/
            $student = "1";

            /*$this->db->where('id', $erd['NameofProgram']);
            $prog32 = $this->db->get('course_program')->result_array();
            foreach($prog32 as $edrt):
                $str = $edrt['course_name'];
            endforeach;*/
            //echo $progfirstchar = $str[0];
            //exit();
            $data12['CandidateStudent']                = $student;
            $data12['NameofBatch']                = $erd23['id'];

            $data12['ClassRollNo'] = $NewClassRoll;
            $data12['RegistratioNo'] = $tte[1]."-".$erd['AdmissionYear']."-".$erd['Session']."-".$ewew['course_code']."-".$NewClassRoll;
            $data12['email'] = $erd['PresentEmail'];
            $data12['password'] = '1234';
            $this->db->where('id', $data['register_number']);
            $this->db->update('applicants_details', $data12);

            //echo $erd['NameofProgram']."-".$erd['Session']."-".$erd['AdmissionYear']."-".$data13['BatchName'];
            $this->db->where('id', $erd['id']);
            $sd = $this->db->get('applicants_details')->result_array();
            foreach($sd as $rret):
            endforeach;
            $rret['NameofProgram']."-".$rret['Session']."-".$rret['AdmissionYear']."-".$rret['NameofBatch'];
            echo "<br>";
            //$this->db->select('ClassRollNo');
            $this->db->where('NameofProgram', $rret['NameofProgram']);
            $this->db->where('Session', $rret['Session']);
            $this->db->where('AdmissionYear', $rret['AdmissionYear']);
            $this->db->where('NameofBatch', $rret['NameofBatch']);
            $sdzx = $this->db->get('applicants_details')->result_array();
            //echo
            foreach($sdzx as $rretzx):
                $rretzx['ClassRollNo'];
            endforeach;
            //exit();



            /*Add to student_pundro as enrolled as student*/
            $this->db->where('id', $data['register_number']);
            $query23z = $this->db->get('applicants_details');
            foreach ($query23z->result() as $row43z) {
                $this->db->insert('student_pundro',$row43z);
                //echo $row43z['id'];
            }

            /* Mail Configuration */
            //echo $rretzx['ClassRollNo'];
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

            echo "<h3>Successfully Payment Paid for First Semester. Please access your Panel by the following Informations.</h3>";
            echo "Reference number : ".$rretzx['PresentMobile'];
            echo "<br>";
            echo "UserID : ".$data12['email'];
            echo "<br>";
            echo "Password: ".$data12['password'];
            echo "<br>";
            echo "Class Roll No.: ".$data12['ClassRollNo'];
            echo "<br>";
            echo "Registration No.: ".$data12['RegistratioNo'];
            echo "<br/>";
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
    text-decoration: none;
            ' href='./index.php?admin/std_fee_collection/'>Go Back</a>";
            echo "</div>";
            echo "</div>";
            exit();

            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/std_fee_collection/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['actual_amount']         = $this->input->post('actual_amount');
            $data['paid_amount']         = array_sum($_POST['particulars2']);
            $data['remaining_amount']         = ($data['actual_amount'] - $data['paid_amount']);
            $particulars1 = implode(',', $this->input->post('particulars1[]'));
            $particulars2 = implode(',', $this->input->post('particulars2[]'));
            $data['particulars1'] = json_encode($particulars1);
            $data['particulars2'] = json_encode($particulars2);
            $data['updated_at']         = date("Y-m-d");
            $this->db->where('id', $param2);
            $this->db->update('std_fee_collection', $data);

            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/std_fee_collection/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('std_fee_collection', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('std_fee_collection');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/std_fee_collection/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('std_fee_collection')->result_array();
        $page_data['page_name']  = 'std_fee_collection';
        $page_data['page_title'] = get_phrase('student_fee_collection');
        $this->load->view('backend/index', $page_data);
    }
    function std_fee_collection1($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            //exit();
            //echo $str = "computerscienceengineering";
            //echo "<br>";
            //substr($str,-1, 1);
            //$str[0].$str[1].$str[2].$str[3];
            //echo substr($str,0, 5);
            //exit();

            /* Batch Name-Code Query*/
            $data13['BatchName']         = $this->input->post('BatchName');
            $this->db->where('id', $data13['BatchName']);
            $rere23 = $this->db->get('batch')->result_array();
            foreach($rere23 as $erd23):
                //echo $erd23['id'];
            endforeach;
            //exit();
            $tte = explode('-',$erd23['batch_alias']);
            //echo $tte[1];

            /* Applicants Details Query*/
            $data1212         = $this->input->post('MoneyReceipt');
            $vala = explode(' ', $data1212);
            $this->db->where('PresentMobile', $vala[0]);
            $rere = $this->db->get('applicants_details')->result_array();
            foreach($rere as $erd):
                $erd['id'];
            endforeach;
            //echo $erd['NameofProgram'];
            $this->db->select_max('ClassRollNo');
            $this->db->where('NameofProgram', $erd['NameofProgram']);
            $rerea = $this->db->get('applicants_details')->result_array();
            foreach($rerea as $erda):
                $erda['ClassRollNo'];
            endforeach;

            $NewClassRoll = $erda['ClassRollNo']+1;

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

            //exit();

            $this->db->where('id',$erd['NameofProgram']);
            $coursecode = $this->db->get('course_program')->result_array();
            foreach($coursecode as $ewew):
                //echo $ewew['course_code'];
            endforeach;
            //exit();

            $data['semester_name']         = $this->input->post('receipt_no');
            $data['SessionName']         = $this->input->post('SessionName');
            $data['Year']         = $this->input->post('Year');
            $data['ProgramName']         = $this->input->post('ProgramName');
            $data['BatchName']         = $this->input->post('BatchName');
            $data['register_number']         = $erd['id'];
            $data['actual_amount']         = $this->input->post('actual_amount');
            $data['paid_amount']         = array_sum($_POST['particulars2']);
            $data['remaining_amount']         = ($data['actual_amount'] - $data['paid_amount']);
            $particulars1 = implode(',', $this->input->post('particulars1[]'));
            $particulars2 = implode(',', $this->input->post('particulars2[]'));
            $data['particulars1'] = json_encode($particulars1);
            $data['particulars2'] = json_encode($particulars2);
            $data['created_at']         = date("Y-m-d");
            $data['updated_at']         = date("Y-m-d");

            $this->db->insert('std_fee_collection', $data);
            //exit();
            /*Update to applicants_details as enrolled as student*/
            $student = "1";

            /*$this->db->where('id', $erd['NameofProgram']);
            $prog32 = $this->db->get('course_program')->result_array();
            foreach($prog32 as $edrt):
                $str = $edrt['course_name'];
            endforeach;*/
            //echo $progfirstchar = $str[0];
            //exit();
            $data12['CandidateStudent']                = $student;
            $data12['NameofBatch']                = $erd23['id'];

            $data12['ClassRollNo'] = $NewClassRoll;
            $data12['RegistratioNo'] = $tte[1]."-".$erd['AdmissionYear']."-".$erd['Session']."-".$ewew['course_code']."-".$NewClassRoll;
            $data12['email'] = $erd['PresentEmail'];
            $data12['password'] = '1234';
            $this->db->where('id', $data['register_number']);
            $this->db->update('applicants_details', $data12);

            //echo $erd['NameofProgram']."-".$erd['Session']."-".$erd['AdmissionYear']."-".$data13['BatchName'];
            $this->db->where('id', $erd['id']);
            $sd = $this->db->get('applicants_details')->result_array();
            foreach($sd as $rret):
            endforeach;
            $rret['NameofProgram']."-".$rret['Session']."-".$rret['AdmissionYear']."-".$rret['NameofBatch'];
            echo "<br>";
            //$this->db->select('ClassRollNo');
            $this->db->where('NameofProgram', $rret['NameofProgram']);
            $this->db->where('Session', $rret['Session']);
            $this->db->where('AdmissionYear', $rret['AdmissionYear']);
            $this->db->where('NameofBatch', $rret['NameofBatch']);
            $sdzx = $this->db->get('applicants_details')->result_array();
            //echo
            foreach($sdzx as $rretzx):
                $rretzx['ClassRollNo'];
            endforeach;
            //exit();



            /*Add to student_pundro as enrolled as student*/
            $this->db->where('id', $data['register_number']);
            $query23z = $this->db->get('applicants_details');
            foreach ($query23z->result() as $row43z) {
                $this->db->insert('student_pundro',$row43z);
                //echo $row43z['id'];
            }

            /* Mail Configuration */
            //echo $rretzx['ClassRollNo'];
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

            echo "<h3>Successfully Payment Paid for First Semester. Please access your Panel by the following Informations.</h3>";
            echo "Reference number : ".$rretzx['PresentMobile'];
            echo "<br>";
            echo "UserID : ".$data12['email'];
            echo "<br>";
            echo "Password: ".$data12['password'];
            echo "<br>";
            echo "Class Roll No.: ".$data12['ClassRollNo'];
            echo "<br>";
            echo "Registration No.: ".$data12['RegistratioNo'];
            echo "<br/>";
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
    text-decoration: none;
            ' href='./index.php?admin/std_fee_collection/'>Go Back</a>";
            echo "</div>";
            echo "</div>";
            exit();

            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/std_fee_collection1/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['actual_amount']         = $this->input->post('actual_amount');
            $data['paid_amount']         = array_sum($_POST['particulars2']);
            $data['remaining_amount']         = ($data['actual_amount'] - $data['paid_amount']);
            $particulars1 = implode(',', $this->input->post('particulars1[]'));
            $particulars2 = implode(',', $this->input->post('particulars2[]'));
            $data['particulars1'] = json_encode($particulars1);
            $data['particulars2'] = json_encode($particulars2);
            $data['updated_at']         = date("Y-m-d");
            $this->db->where('id', $param2);
            $this->db->update('std_fee_collection', $data);

            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/std_fee_collection1/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('std_fee_collection', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('std_fee_collection');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/std_fee_collection1/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('std_fee_collection')->result_array();
        $page_data['page_name']  = 'std_fee_collection1';
        $page_data['page_title'] = get_phrase('student_fee_collection');
        $this->load->view('backend/index', $page_data);
    }
    function receipt_credit_card($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'receipt_credit_card';
        $page_data['page_title'] = get_phrase('receipt_credit_card');
        $this->load->view('backend/index', $page_data);
    }
    function bill_payment($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'bill_payment';
        $page_data['page_title'] = get_phrase('bill_payment');
        $this->load->view('backend/index', $page_data);
    }
    function online_payment($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'online_payment';
        $page_data['page_title'] = get_phrase('online_payment');
        $this->load->view('backend/index', $page_data);
    }
    function receivable_adjustment($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'receivable_adjustment';
        $page_data['page_title'] = get_phrase('receivable_adjustment');
        $this->load->view('backend/index', $page_data);
    }
    function refund($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'refund';
        $page_data['page_title'] = get_phrase('refund');
        $this->load->view('backend/index', $page_data);
    }
    function posting_ledger($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'posting_ledger';
        $page_data['page_title'] = get_phrase('posting_ledger');
        $this->load->view('backend/index', $page_data);
    }
    function student_ledger($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'student_ledger';
        $page_data['page_title'] = get_phrase('student_ledger');
        $this->load->view('backend/index', $page_data);
    }
    function aging_report($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'aging_report';
        $page_data['page_title'] = get_phrase('aging_report');
        $this->load->view('backend/index', $page_data);
    }
    function student_status($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'student_status';
        $page_data['page_title'] = get_phrase('student_status');
        $this->load->view('backend/index', $page_data);
    }
    function sponsor_information($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'sponsor_information';
        $page_data['page_title'] = get_phrase('sponsor_information');
        $this->load->view('backend/index', $page_data);
    }
    function sponsor_student_relationship_management($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'sponsor_student_relationship_management';
        $page_data['page_title'] = get_phrase('sponsor_student_relationship_management');
        $this->load->view('backend/index', $page_data);
    }
    function sponsor_bill_management($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'sponsor_bill_management';
        $page_data['page_title'] = get_phrase('sponsor_bill_management');
        $this->load->view('backend/index', $page_data);
    }
    function sponsor_payment_management($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'sponsor_payment_management';
        $page_data['page_title'] = get_phrase('sponsor_payment_management');
        $this->load->view('backend/index', $page_data);
    }
    function baring_information($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'baring_information';
        $page_data['page_title'] = get_phrase('baring_information');
        $this->load->view('backend/index', $page_data);
    }
    function students_on_barred($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'students_on_barred';
        $page_data['page_title'] = get_phrase('students_on_barred');
        $this->load->view('backend/index', $page_data);
    }
    function release_barred_student($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'release_barred_student';
        $page_data['page_title'] = get_phrase('release_barred_student');
        $this->load->view('backend/index', $page_data);
    }
    function reports_billing_credit_waiver($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'reports_billing_credit_waiver';
        $page_data['page_title'] = get_phrase('reports_billing_credit_waiver');
        $this->load->view('backend/index', $page_data);
    }
    function receipt_reports($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'receipt_reports';
        $page_data['page_title'] = get_phrase('receipt_reports');
        $this->load->view('backend/index', $page_data);
    }
    function refund_reports($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'refund_reports';
        $page_data['page_title'] = get_phrase('refund_reports');
        $this->load->view('backend/index', $page_data);
    }
    function receipt_cash($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'receipt_cash';
        $page_data['page_title'] = get_phrase('receipt_cash');
        $this->load->view('backend/index', $page_data);
    }
    /********************************************/
    function academic_calendar($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']         = $this->input->post('name');
            $data['strt_dt'] = date('Y-m-d',strtotime($this->input->post('strt_dt')));
            $data['end_dt'] = $this->input->post('end_dt');
            $data['is_open']   = 'Null';
            $this->db->insert('academic_calendar', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/academic_calendar/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']         = $this->input->post('name');
            $data['strt_dt'] = date('Y-m-d',strtotime($this->input->post('strt_dt')));
            $data['end_dt'] = $this->input->post('end_dt');
            $data['is_open']   = 'Null';

            $this->db->where('id', $param2);
            $this->db->update('academic_calendar', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/academic_calendar/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('academic_calendar', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('academic_calendar');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/academic_calendar/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('academic_calendar')->result_array();
        $page_data['page_name']  = 'academic_calendar';
        $page_data['page_title'] = get_phrase('academic_calendar');
        $this->load->view('backend/index', $page_data);
    }
    function training_and_camps($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']         = $this->input->post('name');
            $data['strt_dt'] = date('Y-m-d',strtotime($this->input->post('strt_dt')));
            $data['end_dt'] = $this->input->post('end_dt');
            $data['is_open']   = 'Null';
            $this->db->insert('training_and_camps', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/training_and_camps/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']         = $this->input->post('name');
            $data['strt_dt'] = date('Y-m-d',strtotime($this->input->post('strt_dt')));
            $data['end_dt'] = $this->input->post('end_dt');
            $data['is_open']   = 'Null';

            $this->db->where('id', $param2);
            $this->db->update('training_and_camps', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/training_and_camps/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('training_and_camps', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('training_and_camps');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/training_and_camps/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('training_and_camps')->result_array();
        $page_data['page_name']  = 'training_and_camps';
        $page_data['page_title'] = get_phrase('training_and_camps');
        $this->load->view('backend/index', $page_data);
    }
    /********************************************/
    function calendar_admission($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'calendar_admission';
        $page_data['page_title'] = get_phrase('calendar_admission');
        $this->load->view('backend/index', $page_data);
    }
    function academic_year($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'academic_year';
        $page_data['page_title'] = get_phrase('academic_year');
        $this->load->view('backend/index', $page_data);
    }
    function admission_form($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'admission_form';
        $page_data['page_title'] = get_phrase('admission_form');
        $this->load->view('backend/index', $page_data);
    }
    function registration_admission($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'registration_admission';
        $page_data['page_title'] = get_phrase('registration_admission');
        $this->load->view('backend/index', $page_data);
    }
    function auto_registration($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'auto_registration';
        $page_data['page_title'] = get_phrase('auto_registration');
        $this->load->view('backend/index', $page_data);
    }
    function online_pre_registration($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'online_pre_registration';
        $page_data['page_title'] = get_phrase('online_pre_registration');
        $this->load->view('backend/index', $page_data);
    }
    function registration_adm($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'registration_adm';
        $page_data['page_title'] = get_phrase('registration');
        $this->load->view('backend/index', $page_data);
    }
    function student_management($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'do_update') {
            
            $data['acd_session_id']              = $this->input->post('acd_session_id');
            $data['app_sno']                     = $this->input->post('app_sno');
            $data['applicant_status']            = $this->input->post('applicant_status');
            $data['name_en']                     = $this->input->post('name_en');
            $data['name_bn']                     = $this->input->post('name_bn');
            $data['photo']                       = $this->input->post('photo');
            $data['father_name']                 = $this->input->post('father_name');
            $data['mother_name']                 = $this->input->post('mother_name');
            $data['ssc_result']                  = $this->input->post('ssc_result');
            $data['hsc_result']                  = $this->input->post('hsc_result');
            $data['total_gpa']                   = $this->input->post('total_gpa');
            $data['nid_no']                      = $this->input->post('nid_no');
            $data['birth_certificate_no']        = $this->input->post('birth_certificate_no');
            $data['birthday']                    = $this->input->post('birthday');
            $data['sex']                         = $this->input->post('sex');
            $data['phone']                       = $this->input->post('phone');
            $data['email']                       = $this->input->post('email');
            $data['present_village_name']        = $this->input->post('present_village_name');
            $data['present_post_office']         = $this->input->post('present_post_office');
            $data['present_post_code']           = $this->input->post('present_post_code');
            $data['present_police_station']      = $this->input->post('present_police_station');
            $data['present_district_name']       = $this->input->post('present_district_name');
            $data['present_division_name']       = $this->input->post('present_division_name');
            $data['exam_name_1']                 = $this->input->post('exam_name_1');
            $data['institute_name_1']            = $this->input->post('institute_name_1');
            $data['ssc_board']                   = $this->input->post('ssc_board');
            $data['ssc_pass_year']               = $this->input->post('ssc_pass_year');
            $data['exam_name_2']                 = $this->input->post('exam_name_2');
            $data['institute_name_2']            = $this->input->post('institute_name_2');
            $data['hsc_board']                   = $this->input->post('hsc_board');
            $data['hsc_pass_year']               = $this->input->post('hsc_pass_year');
            $data['religion']                    = $this->input->post('religion');
            $data['nationality']                 = $this->input->post('nationality');
            $data['country']                     = $this->input->post('country');
            $data['ssc_certificate']             = $this->input->post('ssc_certificate');
            $data['hsc_certificate']             = $this->input->post('hsc_certificate');
            $data['level_status']                = $this->input->post('level_status');
            $data['faculty_name']                = $this->input->post('faculty_name');
            $data['first_choice']                = $this->input->post('first_choice');
            $data['second_choice']               = $this->input->post('second_choice');
            $data['roll']                        = $this->input->post('roll');
            $data['dormitory_id']                = $this->input->post('dormitory_id');
            $data['dormitory_room_number']       = $this->input->post('dormitory_room_number');
            $data['pay_no']                      = $this->input->post('pay_no');
            $data['pay_date']                    = $this->input->post('pay_date');
            $data['app_date']                    = $this->input->post('app_date');
            $data['pay_status']                  = $this->input->post('pay_status');
            $data['cur_address']                 = $this->input->post('cur_address');
            $data['register_number']             = $this->input->post('register_number');
            $this->db->where('id', $param2);
            $this->db->update('osad_student_12', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/student_management/', 'refresh');
        } else if ($param1 == 'personal_profile') {
            $page_data['personal_profile']   = true;
            $page_data['current_teacher_id'] = $param2;
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('student', array(
                'student_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('osad_student');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/student_management/', 'refresh');
        }

        $page_data['osadStudent']    = $this->db->get('osad_student_12')->result_array();
        $page_data['page_name']  = 'student_management';
        $page_data['page_title'] = get_phrase('student_status');
        $this->load->view('backend/index', $page_data);
    }
    function promote_student($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'promote_student';
        $page_data['page_title'] = get_phrase('promote_student');
        $this->load->view('backend/index', $page_data);
    }
    /*function renewal_of_visa($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'renewal_of_visa';
        $page_data['page_title'] = get_phrase('renewal_of_visa');
        $this->load->view('backend/index', $page_data);
    }*/
    function renewal_of_visa($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'do_update') {
            $data['register_number']             = $this->input->post('register_number');
            $data['visaperiod']        = $this->input->post('visaperiod');
            $data['visaexpireddate']        = $this->input->post('visaexpireddate');
            $data['visarenew']        = $this->input->post('visarenew');

            $this->db->where('student_id', $param2);
            $this->db->update('student', $data);

            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/renewal_of_visa/', 'refresh');
        } else if ($param1 == 'personal_profile') {
            $page_data['personal_profile']   = true;
            $page_data['current_teacher_id'] = $param2;
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('student', array(
                'student_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('student_id', $param2);
            $this->db->delete('student');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/renewal_of_visa/', 'refresh');
        }
        $page_data['osadStudent']    = $this->db->where('personal_nationality!=','BD');
        $page_data['osadStudent']    = $this->db->get('student')->result_array();
        $page_data['page_name']  = 'renewal_of_visa';
        $page_data['page_title'] = get_phrase('renewal_of_visa');
        $this->load->view('backend/index', $page_data);
    }
    function profile_updates($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['register_number']             = $this->input->post('register_number');
            $data['personal_joining_date']        = $this->input->post('personal_joining_date');
            $data['personal_department']        = $this->input->post('personal_department');
            $data['personal_batch']        = $this->input->post('personal_batch');
            $data['personal_photo']        = $this->input->post('personal_photo');
            $data['name_en']        = $this->input->post('name_en');
            $data['name_bn']        = $this->input->post('name_bn');
            $data['birthday']        = $this->input->post('birthday');
            $data['sex']        = $this->input->post('sex');
            $data['religion']        = $this->input->post('religion');
            $data['blood_group']        = $this->input->post('blood_group');
            $data['personal_birth_place']        = $this->input->post('personal_birth_place');
            $data['personal_nationality']        = $this->input->post('personal_nationality');
            $data['personal_roll_no']        = $this->input->post('personal_roll_no');
            $data['personal_mother_tongue']        = $this->input->post('personal_mother_tongue');
            $data['address']        = $this->input->post('address');
            $data['phone']        = $this->input->post('phone');
            $data['email']        = $this->input->post('email');
            $data['password']        = $this->input->post('password');
            $data['contact_pre_address']        = $this->input->post('contact_pre_address');
            $data['contact_city']        = $this->input->post('contact_city');
            $data['contact_pin']        = $this->input->post('contact_pin');
            $data['contact_country']        = $this->input->post('contact_country');
            $data['contact_state']        = $this->input->post('contact_state');
            $data['contact_mobile']        = $this->input->post('contact_mobile');
            $data['guardian_name']        = $this->input->post('guardian_name');
            $data['guardian_relation']        = $this->input->post('guardian_relation');
            $data['guardian_education']        = $this->input->post('guardian_education');
            $data['guardian_occupation']        = $this->input->post('guardian_occupation');
            $data['guardian_income']        = $this->input->post('guardian_income');
            $data['guardian_address']        = $this->input->post('guardian_address');
            $data['guardian_city']        = $this->input->post('guardian_city');
            $data['guardian_country']        = $this->input->post('guardian_country');
            $data['guardian_state']        = $this->input->post('guardian_state');
            $data['guardian_phone']        = $this->input->post('guardian_phone');
            $data['guardian_mobile']        = $this->input->post('guardian_mobile');
            $data['guardian_email']        = $this->input->post('guardian_email');
            $data['father_name']        = $this->input->post('father_name');
            $data['mother_name']        = $this->input->post('mother_name');
            $data['parents_father_mobile']        = $this->input->post('parents_father_mobile');
            $data['parents_father_job']        = $this->input->post('parents_father_job');
            $data['parents_mother_mobile']        = $this->input->post('parents_mother_mobile');
            $data['parents_mother_job']        = $this->input->post('parents_mother_job');

            $this->db->insert('student', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/profile_updates/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['register_number']             = $this->input->post('register_number');
            $data['personal_joining_date']        = $this->input->post('personal_joining_date');
            $data['personal_department']        = $this->input->post('personal_department');
            $data['personal_batch']        = $this->input->post('personal_batch');
            $data['personal_photo']        = $this->input->post('personal_photo');
            $data['name_en']        = $this->input->post('name_en');
            $data['name_bn']        = $this->input->post('name_bn');
            $data['birthday']        = $this->input->post('birthday');
            $data['sex']        = $this->input->post('sex');
            $data['religion']        = $this->input->post('religion');
            $data['blood_group']        = $this->input->post('blood_group');
            $data['personal_birth_place']        = $this->input->post('personal_birth_place');
            $data['personal_nationality']        = $this->input->post('personal_nationality');
            $data['personal_roll_no']        = $this->input->post('personal_roll_no');
            $data['personal_mother_tongue']        = $this->input->post('personal_mother_tongue');
            $data['address']        = $this->input->post('address');
            $data['phone']        = $this->input->post('phone');
            $data['email']        = $this->input->post('email');
            $data['password']        = $this->input->post('password');
            $data['contact_pre_address']        = $this->input->post('contact_pre_address');
            $data['contact_city']        = $this->input->post('contact_city');
            $data['contact_pin']        = $this->input->post('contact_pin');
            $data['contact_country']        = $this->input->post('contact_country');
            $data['contact_state']        = $this->input->post('contact_state');
            $data['contact_mobile']        = $this->input->post('contact_mobile');
            $data['guardian_name']        = $this->input->post('guardian_name');
            $data['guardian_relation']        = $this->input->post('guardian_relation');
            $data['guardian_education']        = $this->input->post('guardian_education');
            $data['guardian_occupation']        = $this->input->post('guardian_occupation');
            $data['guardian_income']        = $this->input->post('guardian_income');
            $data['guardian_address']        = $this->input->post('guardian_address');
            $data['guardian_city']        = $this->input->post('guardian_city');
            $data['guardian_country']        = $this->input->post('guardian_country');
            $data['guardian_state']        = $this->input->post('guardian_state');
            $data['guardian_phone']        = $this->input->post('guardian_phone');
            $data['guardian_mobile']        = $this->input->post('guardian_mobile');
            $data['guardian_email']        = $this->input->post('guardian_email');
            $data['father_name']        = $this->input->post('father_name');
            $data['mother_name']        = $this->input->post('mother_name');
            $data['parents_father_mobile']        = $this->input->post('parents_father_mobile');
            $data['parents_father_job']        = $this->input->post('parents_father_job');
            $data['parents_mother_mobile']        = $this->input->post('parents_mother_mobile');
            $data['parents_mother_job']        = $this->input->post('parents_mother_job');

            $this->db->where('student_id', $param2);
            $this->db->update('student', $data);

            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/profile_updates/', 'refresh');
        } else if ($param1 == 'personal_profile') {
            $page_data['personal_profile']   = true;
            $page_data['current_teacher_id'] = $param2;
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('student', array(
                'student_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('student_id', $param2);
            $this->db->delete('student');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/profile_updates/', 'refresh');
        }

        $page_data['osadStudent']    = $this->db->get('student')->result_array();
        $page_data['page_name']  = 'profile_updates';
        $page_data['page_title'] = get_phrase('students_profile_updates');
        $this->load->view('backend/index', $page_data);
    }
    function applications_credit($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'applications_credit';
        $page_data['page_title'] = get_phrase('applications_credit');
        $this->load->view('backend/index', $page_data);
    }
    function status_credit($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'status_credit';
        $page_data['page_title'] = get_phrase('status_credit');
        $this->load->view('backend/index', $page_data);
    }
    function applications_program($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'applications_program';
        $page_data['page_title'] = get_phrase('applications_program');
        $this->load->view('backend/index', $page_data);
    }
    function status_program($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'status_program';
        $page_data['page_title'] = get_phrase('status_program');
        $this->load->view('backend/index', $page_data);
    }
    /*function semester($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'semester';
        $page_data['page_title'] = get_phrase('semester');
        $this->load->view('backend/index', $page_data);
    }*/
    function semester($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']         = $this->input->post('name');
            $data['note']         = $this->input->post('note');

            $this->db->insert('semester', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/semester/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']         = $this->input->post('name');
            $data['note']         = $this->input->post('note');

            $this->db->where('id', $param2);
            $this->db->update('semester', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/semester/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('semester', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('semester');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/semester/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('semester')->result_array();
        $page_data['page_name']  = 'semester';
        $page_data['page_title'] = get_phrase('semester');
        $this->load->view('backend/index', $page_data);
    }
    function year($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['year']         = $this->input->post('year');
            $data['note']         = $this->input->post('note');

            $this->db->insert('year', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/year/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['year']         = $this->input->post('year');
            $data['note']         = $this->input->post('note');

            $this->db->where('id', $param2);
            $this->db->update('year', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/year/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('year', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('year');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/year/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('year')->result_array();
        $page_data['page_name']  = 'year';
        $page_data['page_title'] = get_phrase('year');
        $this->load->view('backend/index', $page_data);
    }

    function course_program($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['course_name']         = $this->input->post('course_name');
            $data['course_code']         = $this->input->post('course_code');
            $data['course_alias']         = $this->input->post('course_alias');

            $this->db->insert('course_program', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/course_program/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['course_name']         = $this->input->post('course_name');
            $data['course_code']         = $this->input->post('course_code');
            $data['course_alias']         = $this->input->post('course_alias');

            $this->db->where('id', $param2);
            $this->db->update('course_program', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/course_program/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('course_program', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('course_program');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/course_program/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('course_program')->result_array();
        $page_data['page_name']  = 'course_program';
        $page_data['page_title'] = get_phrase('courses_setup');
        $this->load->view('backend/index', $page_data);
    }
    function intake($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'intake';
        $page_data['page_title'] = get_phrase('intake');
        $this->load->view('backend/index', $page_data);
    }
    /*function batch($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'batch';
        $page_data['page_title'] = get_phrase('batch');
        $this->load->view('backend/index', $page_data);
    }*/
    function batch($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            //$data['academic_year']         = $this->input->post('academic_year');
            $data['academic_year']         = 'NULL';
            $data['course']         = $this->input->post('course');
            $data['batch_name']         = $this->input->post('batch_name');
            $data['batch_alias']         = $this->input->post('batch_alias');
            $data['strt_dt']         = date('Y-m-d',strtotime($this->input->post('strt_dt')));
            $data['end_dt']         = date('Y-m-d',strtotime($this->input->post('end_dt')));
            $data['maxstudents']         = $this->input->post('maxstudents');
            $data['status']         = $this->input->post('status');

            $this->db->insert('batch', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/batch/', 'refresh');
        }
        if ($param1 == 'do_update') {
            //$data['academic_year']         = $this->input->post('academic_year');
            $data['academic_year']         = 'NULL';
            $data['course']         = $this->input->post('course');
            $data['batch_name']         = $this->input->post('batch_name');
            $data['batch_alias']         = $this->input->post('batch_alias');
            $data['strt_dt']         = date('Y-m-d',strtotime($this->input->post('strt_dt')));
            $data['end_dt']         = date('Y-m-d',strtotime($this->input->post('end_dt')));
            $data['maxstudents']         = $this->input->post('maxstudents');
            $data['status']         = $this->input->post('status');

            $this->db->where('id', $param2);
            $this->db->update('batch', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/batch/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('batch', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('batch');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/batch/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('batch')->result_array();
        $page_data['page_name']  = 'batch';
        $page_data['page_title'] = get_phrase('batch');
        $this->load->view('backend/index', $page_data);
    }
    /*function faculty_setup($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'faculty_setup';
        $page_data['page_title'] = get_phrase('faculty_setup');
        $this->load->view('backend/index', $page_data);
    }*/
    function faculty_setup($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']         = $this->input->post('name');
            $data['code']         = $this->input->post('code');
            $data['description']         = $this->input->post('description');

            $this->db->insert('faculty_setup', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/faculty_setup/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']         = $this->input->post('name');
            $data['code']         = $this->input->post('code');
            $data['description']         = $this->input->post('description');

            $this->db->where('id', $param2);
            $this->db->update('faculty_setup', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/faculty_setup/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('faculty_setup', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('faculty_setup');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/faculty_setup/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('faculty_setup')->result_array();
        $page_data['page_name']  = 'faculty_setup';
        $page_data['page_title'] = get_phrase('faculty_setup');
        $this->load->view('backend/index', $page_data);
    }
    /*function class_teacher_allocation($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'class_teacher_allocation';
        $page_data['page_title'] = get_phrase('class_teacher_allocation');
        $this->load->view('backend/index', $page_data);
    }*/
    function class_teacher_allocation($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['department']         = $this->input->post('department');
            $data['batch_name']         = $this->input->post('batch_name');
            $data['class_teacher']         = $this->input->post('class_teacher');

            $this->db->insert('class_teacher_allocation', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/class_teacher_allocation/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['department']         = $this->input->post('department');
            $data['batch_name']         = $this->input->post('batch_name');
            $data['class_teacher']         = $this->input->post('class_teacher');

            $this->db->where('id', $param2);
            $this->db->update('class_teacher_allocation', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/class_teacher_allocation/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('class_teacher_allocation', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('class_teacher_allocation');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/class_teacher_allocation/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('class_teacher_allocation')->result_array();
        $page_data['page_name']  = 'class_teacher_allocation';
        $page_data['page_title'] = get_phrase('class_teacher_allocation');
        $this->load->view('backend/index', $page_data);
    }
    function sections($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'sections';
        $page_data['page_title'] = get_phrase('sections');
        $this->load->view('backend/index', $page_data);
    }

    function subjects($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        /********************************      Faculty Setup Start ***************************/

        if ($param1 == 'course_instructor') {
            $data['CourseName']         = $this->input->post('CourseID');
            $CourseInstructors = implode(', ', $this->input->post('section_id[]'));
            //exit();
            //$CourseInstructors = implode(', ', $this->input->post('CourseInstructors[]'));

            $data['CourseInstructors'] = $CourseInstructors;

            $this->db->insert('courses_course_instructor', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/courses_mapping_with_instructor/', 'refresh');
        }
        if ($param1 == 'faculty_setup') {
            $data['name']         = $this->input->post('name');
            $data['code']         = $this->input->post('code');
            $data['description']         = $this->input->post('description');

            $this->db->insert('faculty_setup', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/subjects/', 'refresh');
        }
        if ($param1 == 'facdo_update') {
            $data['name']         = $this->input->post('name');
            $data['code']         = $this->input->post('code');
            $data['description']         = $this->input->post('description');

            $this->db->where('id', $param2);
            $this->db->update('faculty_setup', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/subjects/', 'refresh');
        } else if ($param1 == 'facedit') {
            $page_data['edit_data'] = $this->db->get_where('faculty_setup', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'facdelete') {
            $this->db->where('id', $param2);
            $this->db->delete('faculty_setup');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/subjects/', 'refresh');
        }

        /********************************      Faculty Setup End ***************************/
        /********************************      Program Setup Start ***************************/
        if ($param1 == 'course_program') {
            $data['course_name']         = $this->input->post('course_name');
            $data['course_code']         = $this->input->post('course_code');
            $data['course_alias']         = $this->input->post('course_alias');

            $this->db->insert('course_program', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/subjects/', 'refresh');
        }

        if ($param1 == 'programdo_update') {
            $data['course_name']         = $this->input->post('course_name');
            $data['course_code']         = $this->input->post('course_code');
            $data['course_alias']         = $this->input->post('course_alias');

            $this->db->where('id', $param2);
            $this->db->update('course_program', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/subjects/', 'refresh');
        } else if ($param1 == 'programedit') {
            $page_data['edit_data'] = $this->db->get_where('course_program', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'programdelete') {
            $this->db->where('id', $param2);
            $this->db->delete('course_program');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/subjects/', 'refresh');
        }

        /********************************      Program Setup End ***************************/
        /********************************      Semester wise Courses Setup Start ***************************/

        if ($param1 == 'add_semester_wise_courses') {
            $data['ProgramName']         = $this->input->post('program_id');
            $data['SemesterName']         = $this->input->post('SemesterName');
            $data['Year']         = $this->input->post('Year');
            $data['BatchName']         = $this->input->post('section_id');
            $data['Semester']         = $this->input->post('SemesterName');

            $subject = implode(", ", $_POST['Courses']);
            $data['Courses']         = $subject;

            $this->db->insert('assign_subjects', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/subjects/', 'refresh');
        }
        if ($param1 == 'add_course_wise_instructors') {
            $data['ProgramName']         = $this->input->post('ProgramName');
            $data['SemesterName']         = $this->input->post('SemesterName');
            $data['Year']         = $this->input->post('Year');
            $data['BatchName']         = $this->input->post('BatchName');
            $data['CourseName']         = $this->input->post('CourseName');

            $subject = implode(", ", $_POST['Courses']);
            $data['Courses']         = $subject;

            $this->db->insert('add_course_wise_instructors', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/subjects/', 'refresh');
        }
        if ($param1 == 'semester_wise_coursesdo_update') {
            $data['course']         = $this->input->post('course');
            $data['batch']         = $this->input->post('batch');
            $data['semester']         = $this->input->post('semester');
            $subject = implode(", ", $_POST['subject']);

            $subjects = $this->db->get_where('assign_subjects' , array(
                'id' => $param2
            ))->result_array();
            foreach ($subjects as $row11) {
                //echo $row11['subject'];
            }
            $data['subject']         = $row11['subject'].", ".$subject;
            //echo $data['subject']         = $subject;
            //exit();
            $this->db->where('id', $param2);
            $this->db->update('assign_subjects', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/subjects/', 'refresh');
        } else if ($param1 == 'semester_wise_coursesedit') {
            $page_data['edit_data'] = $this->db->get_where('assign_subjects', array(
                'id' => $param2
            ))->result_array();
        } else if ($param1 == 'semester_wise_coursesdelete') {
            $this->db->where('id', $param2);
            $this->db->delete('assign_subjects');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/subjects/', 'refresh');
        } else if ($param1 == 'attend') {
            //$page_data['acdSession']    = $this->db->get('class_teacher_allocation')->result_array();
            $page_data['page_name']  = 'attendance_sheet';
            $page_data['page_title'] = get_phrase('attendance_sheet');
            $this->load->view('backend/index', $page_data);
        } else if ($param1 == 'attendance') {
            $data['ProgramName']         = $this->input->post('ProgramName');
            $data['SemesterName']         = $this->input->post('SemesterName');
            $data['Year']         = $this->input->post('Year');
            $data['BatchName']         = $this->input->post('BatchName');

            $data['CourseInstructor']         = $this->input->post('CourseInstructor');
            $data['CourseCode']         = $this->input->post('CourseID');
            $data['ExamName']         = $this->input->post('ExamName');
            $StudentID = implode(',', $this->input->post('StudentID[]'));
            $STDAtten = implode(',', $this->input->post('STDAtten[]'));
            //$AttendanceStatus = implode(',', $this->input->post('AttendanceStatus[]'));

            $data['StudentID'] = json_encode($StudentID);
            $data['STDAtten'] = json_encode($STDAtten);
            //$data['AttendanceStatus'] = json_encode($AttendanceStatus);
            //$data['Session']         = $this->input->post('Session');
            //$data['YearCalendar']         = $this->input->post('YearCalendar');

            $data['AttendanceDate']         = date("Y-m-d");
            $data['ClassStrt']         = $this->input->post('ClassStrt');
            $data['ClassEnd']         = $this->input->post('ClassEnd');



            /*$subject = implode(", ", $_POST['subject']);
            $data['subject']         = $subject;*/

            $this->db->insert('attendance_pundro', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/subjects/', 'refresh');
        } else if ($param1 == 'attend_report') {
            //$page_data['attnreport']    = $this->db->where('id', $param2);
            //$page_data['attnreport']    = $this->db->get('attendance_pundro')->result_array();
            //$page_data['page_name']  = 'subjects';
            $page_data['page_title'] = get_phrase('courses_registration');
            $this->load->view('backend/index', $page_data);
        }

        /********************************      Semester wise Courses Setup End ***************************/
        /********************************      Courses Setup Start ***************************/
        if ($param1 == 'create') {
            $data['CourseCode']         = $this->input->post('CourseCode');
            $data['CourseName']         = $this->input->post('CourseName');
            $data['Credits']         = $this->input->post('Credits');
            $data['Prerequisites']         = $this->input->post('Prerequisites');
            $data['CourseAreas']         = $this->input->post('CourseAreas');
            $data['Program']         = $this->input->post('Program');

            $this->db->insert('subjects', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/subjects/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['CourseCode']         = $this->input->post('CourseCode');
            $data['CourseName']         = $this->input->post('CourseName');
            $data['Credits']         = $this->input->post('Credits');
            $data['Prerequisites']         = $this->input->post('Prerequisites');
            $data['CourseAreas']         = $this->input->post('CourseAreas');
            $data['Program']         = $this->input->post('Program');

            $this->db->where('id', $param2);
            $this->db->update('subjects', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/subjects/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('subjects', array(
                'id' => $param2
            ))->result_array();
        } else if ($param1 == 'attend') {
            $page_data['edit_data'] = $this->db->get_where('subjects', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('subjects');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/subjects/', 'refresh');
        }

        /********************************      Courses Setup End ***************************/

        $page_data['faculty_setup']    = $this->db->get('faculty_setup')->result_array();
        $page_data['course_program']    = $this->db->get('course_program')->result_array();
        $page_data['assign_subjects']    = $this->db->get('assign_subjects')->result_array();
        $page_data['acdSession']    = $this->db->get('subjects')->result_array();
        $page_data['page_name']  = 'subjects';
        $page_data['page_title'] = get_phrase('courses_registration');
        $this->load->view('backend/index', $page_data);
    }
    function course_numbering_system($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['code']         = $this->input->post('code');
            $data['name']         = $this->input->post('name');
            $data['alias']         = $this->input->post('alias');
            /*$data['code']         = $this->input->post('code');*/
            /*$data['alias']         = $this->input->post('alias');
            $data['description']         = $this->input->post('description');
            $data['status']         = $this->input->post('status');*/

            $this->db->insert('course_numbering_system', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/course_numbering_system/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['code']         = $this->input->post('code');
            $data['name']         = $this->input->post('name');
            $data['alias']         = $this->input->post('alias');
            /*$data['alias']         = $this->input->post('alias');
            $data['description']         = $this->input->post('description');
            $data['status']         = $this->input->post('status');*/

            $this->db->where('id', $param2);
            $this->db->update('course_numbering_system', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/course_numbering_system/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('course_numbering_system', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('course_numbering_system');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/course_numbering_system/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('course_numbering_system')->result_array();
        $page_data['page_name']  = 'course_numbering_system';
        $page_data['page_title'] = get_phrase('course_numbering_system');
        $this->load->view('backend/index', $page_data);
    }

    function courses_of_the_program($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['CourseAreas']         = $this->input->post('CourseAreas');
            $data['NoOfCourses']         = $this->input->post('NoOfCourses');
            $data['CreditHours']         = $this->input->post('CreditHours');
            $data['Program']         = $this->input->post('Program');

            $this->db->insert('courses_of_the_program', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/courses_of_the_program/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['CourseAreas']         = $this->input->post('CourseAreas');
            $data['NoOfCourses']         = $this->input->post('NoOfCourses');
            $data['CreditHours']         = $this->input->post('CreditHours');
            $data['Program']         = $this->input->post('Program');

            $this->db->where('id', $param2);
            $this->db->update('courses_of_the_program', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/courses_of_the_program/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('courses_of_the_program', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('courses_of_the_program');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/courses_of_the_program/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('courses_of_the_program')->result_array();
        $page_data['page_name']  = 'courses_of_the_program';
        $page_data['page_title'] = get_phrase('courses_of_the_program');
        $this->load->view('backend/index', $page_data);
    }

    function distribution_of_credit_hours($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['SemesterName']         = $this->input->post('SemesterName');
            $data['TheoryCreditHours']         = $this->input->post('TheoryCreditHours');
            $data['LaboratoryCreditHours']         = $this->input->post('LaboratoryCreditHours');
            $data['ThesisOrProjectWorkCreditHours']         = $this->input->post('ThesisOrProjectWorkCreditHours');
            $data['SemesterCreditHours']         = $this->input->post('SemesterCreditHours');
            $data['Program']         = $this->input->post('Program');

            $this->db->insert('distribution_of_credit_hours', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/distribution_of_credit_hours/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['SemesterName']         = $this->input->post('SemesterName');
            $data['TheoryCreditHours']         = $this->input->post('TheoryCreditHours');
            $data['LaboratoryCreditHours']         = $this->input->post('LaboratoryCreditHours');
            $data['ThesisOrProjectWorkCreditHours']         = $this->input->post('ThesisOrProjectWorkCreditHours');
            $data['SemesterCreditHours']         = $this->input->post('SemesterCreditHours');
            $data['Program']         = $this->input->post('Program');

            $this->db->where('id', $param2);
            $this->db->update('distribution_of_credit_hours', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/distribution_of_credit_hours/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('distribution_of_credit_hours', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('distribution_of_credit_hours');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/distribution_of_credit_hours/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('distribution_of_credit_hours')->result_array();
        $page_data['page_name']  = 'distribution_of_credit_hours';
        $page_data['page_title'] = get_phrase('distribution_of_credit_hours');
        $this->load->view('backend/index', $page_data);
    }

    function semester_wise_distribution_of_courses($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['YearName']         = $this->input->post('YearName');
            $data['SemesterName']         = $this->input->post('SemesterName');
            $data['CourseName']         = $this->input->post('CourseName');
            $data['ProgramName']         = $this->input->post('ProgramName');

            $this->db->insert('semester_wise_distribution_of_courses', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/semester_wise_distribution_of_courses/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['YearName']         = $this->input->post('YearName');
            $data['SemesterName']         = $this->input->post('SemesterName');
            $data['CourseName']         = $this->input->post('CourseName');
            $data['ProgramName']         = $this->input->post('ProgramName');

            $this->db->where('id', $param2);
            $this->db->update('semester_wise_distribution_of_courses', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/semester_wise_distribution_of_courses/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('semester_wise_distribution_of_courses', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('semester_wise_distribution_of_courses');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/semester_wise_distribution_of_courses/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('semester_wise_distribution_of_courses')->result_array();
        $page_data['page_name']  = 'semester_wise_distribution_of_courses';
        $page_data['page_title'] = get_phrase('semester_wise_distribution_of_courses');
        $this->load->view('backend/index', $page_data);
    }

    function assign_subjects($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['course']         = $this->input->post('course');
            $data['batch']         = $this->input->post('batch');
            $data['semester']         = $this->input->post('semester');

            $subject = implode(", ", $_POST['subject']);
            //$data['subject']         = $this->input->post('subject');
            $data['subject']         = $subject;

            $this->db->insert('assign_subjects', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/assign_subjects/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['course']         = $this->input->post('course');
            $data['batch']         = $this->input->post('batch');
            $data['semester']         = $this->input->post('semester');
            $data['subject']         = $this->input->post('subject');

            $this->db->where('id', $param2);
            $this->db->update('assign_subjects', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/assign_subjects/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('assign_subjects', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('assign_subjects');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/assign_subjects/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('assign_subjects')->result_array();
        $page_data['page_name']  = 'assign_subjects';
        $page_data['page_title'] = get_phrase('semester_wise_courses');
        $this->load->view('backend/index', $page_data);
    }
    /*function subject_allocation($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'subject_allocation';
        $page_data['page_title'] = get_phrase('subject_allocation');
        $this->load->view('backend/index', $page_data);
    }*/
    function subject_allocation($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['department']         = $this->input->post('department');
            $data['faculty']         = $this->input->post('faculty');
            $data['course']         = $this->input->post('course');
            $data['batch']         = $this->input->post('batch');

            $this->db->insert('subject_allocation', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/subject_allocation/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['department']         = $this->input->post('department');
            $data['faculty']         = $this->input->post('faculty');
            $data['course']         = $this->input->post('course');
            $data['batch']         = $this->input->post('batch');

            $this->db->where('id', $param2);
            $this->db->update('subject_allocation', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/subject_allocation/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('subject_allocation', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('subject_allocation');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/subject_allocation/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('subject_allocation')->result_array();
        $page_data['page_name']  = 'subject_allocation';
        $page_data['page_title'] = get_phrase('subject_allocation');
        $this->load->view('backend/index', $page_data);
    }
    /*function elective_subject($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'elective_subject';
        $page_data['page_title'] = get_phrase('elective_subject');
        $this->load->view('backend/index', $page_data);
    }*/
    function elective_subject($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['department']         = $this->input->post('course');
            $data['faculty']         = $this->input->post('batch');
            $data['course']         = $this->input->post('semester');
            //$data['batch']         = $this->input->post('batch');
            $batch = implode(", ", $_POST['students']);
            //$data['subject']         = $this->input->post('subject');
            $data['batch']         = $batch;

            $this->db->insert('elective_subject', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/elective_subject/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['department']         = $this->input->post('course');
            $data['faculty']         = $this->input->post('batch');
            $data['course']         = $this->input->post('semester');
            //$data['batch']         = $this->input->post('batch');
            $batch = implode(", ", $_POST['students']);
            //$data['subject']         = $this->input->post('subject');
            $data['batch']         = $batch;

            $this->db->where('id', $param2);
            $this->db->update('elective_subject', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/elective_subject/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('elective_subject', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('elective_subject');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/elective_subject/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('elective_subject')->result_array();
        $page_data['page_name']  = 'elective_subject';
        $page_data['page_title'] = get_phrase('elective_subject');
        $this->load->view('backend/index', $page_data);
    }
    function teachers($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'teachers';
        $page_data['page_title'] = get_phrase('teachers');
        $this->load->view('backend/index', $page_data);
    }

    function sections_allocation($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'sections_allocation';
        $page_data['page_title'] = get_phrase('sections_allocation');
        $this->load->view('backend/index', $page_data);
    }
    function subjects_allocation($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'subjects_allocation';
        $page_data['page_title'] = get_phrase('subjects_allocation');
        $this->load->view('backend/index', $page_data);
    }
    function credit_transfer_rules($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'credit_transfer_rules';
        $page_data['page_title'] = get_phrase('credit_transfer_rules');
        $this->load->view('backend/index', $page_data);
    }

    function credit_course($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'credit_course';
        $page_data['page_title'] = get_phrase('credit_course');
        $this->load->view('backend/index', $page_data);
    }

    function nationalities($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'nationalities';
        $page_data['page_title'] = get_phrase('nationalities');
        $this->load->view('backend/index', $page_data);
    }
    function religion($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'religion';
        $page_data['page_title'] = get_phrase('religion');
        $this->load->view('backend/index', $page_data);
    }
    function qualifications($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'qualifications';
        $page_data['page_title'] = get_phrase('qualifications');
        $this->load->view('backend/index', $page_data);
    }
    function skills($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'skills';
        $page_data['page_title'] = get_phrase('skills');
        $this->load->view('backend/index', $page_data);
    }
    /********************************************/
    function user_management($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'user_management';
        $page_data['page_title'] = get_phrase('user_management');
        $this->load->view('backend/index', $page_data);
    }
    function job_titles($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'job_titles';
        $page_data['page_title'] = get_phrase('job_titles');
        $this->load->view('backend/index', $page_data);
    }
    function pay_grades($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'pay_grades';
        $page_data['page_title'] = get_phrase('pay_grades');
        $this->load->view('backend/index', $page_data);
    }
    function employment_status($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'employment_status';
        $page_data['page_title'] = get_phrase('employment_status');
        $this->load->view('backend/index', $page_data);
    }
    function job_categories($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'job_categories';
        $page_data['page_title'] = get_phrase('job_categories');
        $this->load->view('backend/index', $page_data);
    }
    function education_hr($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'education_hr';
        $page_data['page_title'] = get_phrase('education_hr');
        $this->load->view('backend/index', $page_data);
    }
    function work_shifts($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'work_shifts';
        $page_data['page_title'] = get_phrase('work_shifts');
        $this->load->view('backend/index', $page_data);
    }
    function general_information($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'general_information';
        $page_data['page_title'] = get_phrase('general_information');
        $this->load->view('backend/index', $page_data);
    }
    function locations($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'locations';
        $page_data['page_title'] = get_phrase('locations');
        $this->load->view('backend/index', $page_data);
    }
    function structure($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'structure';
        $page_data['page_title'] = get_phrase('structure');
        $this->load->view('backend/index', $page_data);
    }
    function skills_hr($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'skills_hr';
        $page_data['page_title'] = get_phrase('skills_hr');
        $this->load->view('backend/index', $page_data);
    }
    function licenses($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'licenses';
        $page_data['page_title'] = get_phrase('licenses');
        $this->load->view('backend/index', $page_data);
    }
    function languages_hr($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'languages_hr';
        $page_data['page_title'] = get_phrase('languages_hr');
        $this->load->view('backend/index', $page_data);
    }
    function memberships($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'memberships';
        $page_data['page_title'] = get_phrase('memberships');
        $this->load->view('backend/index', $page_data);
    }
    function nationalities_hr($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'nationalities_hr';
        $page_data['page_title'] = get_phrase('nationalities_hr');
        $this->load->view('backend/index', $page_data);
    }
    function configurations_hr($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'configurations_hr';
        $page_data['page_title'] = get_phrase('configurations_hr');
        $this->load->view('backend/index', $page_data);
    }
    function email_configuration($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'email_configuration';
        $page_data['page_title'] = get_phrase('email_configuration');
        $this->load->view('backend/index', $page_data);
    }
    function configuration_hr($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'configuration_hr';
        $page_data['page_title'] = get_phrase('configuration_hr');
        $this->load->view('backend/index', $page_data);
    }
    function data_import($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'data_import';
        $page_data['page_title'] = get_phrase('data_import');
        $this->load->view('backend/index', $page_data);
    }
    function reporting_methods($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'reporting_methods';
        $page_data['page_title'] = get_phrase('reporting_methods');
        $this->load->view('backend/index', $page_data);
    }
    function termination_reasons($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'termination_reasons';
        $page_data['page_title'] = get_phrase('termination_reasons');
        $this->load->view('backend/index', $page_data);
    }
    function employee_list($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'employee_list';
        $page_data['page_title'] = get_phrase('employee_list');
        $this->load->view('backend/index', $page_data);
    }
    function add_employee_hr($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'add_employee_hr';
        $page_data['page_title'] = get_phrase('add_employee_hr');
        $this->load->view('backend/index', $page_data);
    }
    function reports_hr($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'reports_hr';
        $page_data['page_title'] = get_phrase('reports_hr');
        $this->load->view('backend/index', $page_data);
    }
    function employee_details($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'employee_details';
        $page_data['page_title'] = get_phrase('employee_details');
        $this->load->view('backend/index', $page_data);
    }
    /*function office_time($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'office_time';
        $page_data['page_title'] = get_phrase('office_time');
        $this->load->view('backend/index', $page_data);
    }*/
    /*function attendance_fine($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'attendance_fine';
        $page_data['page_title'] = get_phrase('attendance_fine');
        $this->load->view('backend/index', $page_data);
    }*/
    function timesheets($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'timesheets';
        $page_data['page_title'] = get_phrase('timesheets');
        $this->load->view('backend/index', $page_data);
    }
    function attendance_hr($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'attendance_hr';
        $page_data['page_title'] = get_phrase('attendance_hr');
        $this->load->view('backend/index', $page_data);
    }
    function employee_records($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'employee_records';
        $page_data['page_title'] = get_phrase('employee_records');
        $this->load->view('backend/index', $page_data);
    }
    function configuration_hr_monthly($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'configuration_hr_monthly';
        $page_data['page_title'] = get_phrase('configuration_hr_monthly');
        $this->load->view('backend/index', $page_data);
    }
    function project_reports($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'project_reports';
        $page_data['page_title'] = get_phrase('project_reports');
        $this->load->view('backend/index', $page_data);
    }
    function employee_reports($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'employee_reports';
        $page_data['page_title'] = get_phrase('employee_reports');
        $this->load->view('backend/index', $page_data);
    }
    function attendance_summary($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'attendance_summary';
        $page_data['page_title'] = get_phrase('attendance_summary');
        $this->load->view('backend/index', $page_data);
    }
    function customers_hr($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'customers_hr';
        $page_data['page_title'] = get_phrase('customers_hr');
        $this->load->view('backend/index', $page_data);
    }
    function projects_hr($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'projects_hr';
        $page_data['page_title'] = get_phrase('projects_hr');
        $this->load->view('backend/index', $page_data);
    }
    function overtime_entitlements($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'overtime_entitlements';
        $page_data['page_title'] = get_phrase('overtime_entitlements');
        $this->load->view('backend/index', $page_data);
    }


    function overtime_records($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'overtime_records';
        $page_data['page_title'] = get_phrase('overtime_records');
        $this->load->view('backend/index', $page_data);
    }
    function overtime_rates($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'overtime_rates';
        $page_data['page_title'] = get_phrase('overtime_rates');
        $this->load->view('backend/index', $page_data);
    }
    function overtime_reports($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'overtime_reports';
        $page_data['page_title'] = get_phrase('overtime_reports');
        $this->load->view('backend/index', $page_data);
    }
    function approval_cancellation($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'approval_cancellation';
        $page_data['page_title'] = get_phrase('approval_cancellation');
        $this->load->view('backend/index', $page_data);
    }
    function payroll_hr($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'payroll_hr';
        $page_data['page_title'] = get_phrase('payroll_hr');
        $this->load->view('backend/index', $page_data);
    }
    function add_entitlements($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'add_entitlements';
        $page_data['page_title'] = get_phrase('add_entitlements');
        $this->load->view('backend/index', $page_data);
    }

    function employee_entitlements($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'employee_entitlements';
        $page_data['page_title'] = get_phrase('employee_entitlements');
        $this->load->view('backend/index', $page_data);
    }
    function leave_entitlements_and_usage_report($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'leave_entitlements_and_usage_report';
        $page_data['page_title'] = get_phrase('leave_entitlements_and_usage_report');
        $this->load->view('backend/index', $page_data);
    }
    function leave_period($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'leave_period';
        $page_data['page_title'] = get_phrase('leave_period');
        $this->load->view('backend/index', $page_data);
    }
    function leave_types($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'leave_types';
        $page_data['page_title'] = get_phrase('leave_types');
        $this->load->view('backend/index', $page_data);
    }
    function work_week($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'work_week';
        $page_data['page_title'] = get_phrase('work_week');
        $this->load->view('backend/index', $page_data);
    }
    function holidays($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'holidays';
        $page_data['page_title'] = get_phrase('holidays');
        $this->load->view('backend/index', $page_data);
    }
    function leave_list($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'leave_list';
        $page_data['page_title'] = get_phrase('leave_list');
        $this->load->view('backend/index', $page_data);
    }
    function assign_leave($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'assign_leave';
        $page_data['page_title'] = get_phrase('assign_leave');
        $this->load->view('backend/index', $page_data);
    }
    function candidates($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'candidates';
        $page_data['page_title'] = get_phrase('candidates');
        $this->load->view('backend/index', $page_data);
    }

    function vacancies($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'vacancies';
        $page_data['page_title'] = get_phrase('vacancies');
        $this->load->view('backend/index', $page_data);
    }
    function search_hr($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'search_hr';
        $page_data['page_title'] = get_phrase('search_hr');
        $this->load->view('backend/index', $page_data);
    }
    function kpis_hr($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'kpis_hr';
        $page_data['page_title'] = get_phrase('kpis_hr');
        $this->load->view('backend/index', $page_data);
    }
    function trackers($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'trackers';
        $page_data['page_title'] = get_phrase('trackers');
        $this->load->view('backend/index', $page_data);
    }
    function manage_reviews($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'manage_reviews';
        $page_data['page_title'] = get_phrase('manage_reviews');
        $this->load->view('backend/index', $page_data);
    }
    function employee_trackers($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'employee_trackers';
        $page_data['page_title'] = get_phrase('employee_trackers');
        $this->load->view('backend/index', $page_data);
    }
    function staff_movement($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'staff_movement';
        $page_data['page_title'] = get_phrase('staff_movement');
        $this->load->view('backend/index', $page_data);
    }
    function loan_types_interest_rates($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'loan_types_interest_rates';
        $page_data['page_title'] = get_phrase('loan_types_interest_rates');
        $this->load->view('backend/index', $page_data);
    }
    function loans_repayments_history_management($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'loans_repayments_history_management';
        $page_data['page_title'] = get_phrase('loans_repayments_history_management');
        $this->load->view('backend/index', $page_data);
    }
    function loan_application($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'loan_application';
        $page_data['page_title'] = get_phrase('loan_application');
        $this->load->view('backend/index', $page_data);
    }
    function loan_balance_details($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'loan_balance_details';
        $page_data['page_title'] = get_phrase('loan_balance_details');
        $this->load->view('backend/index', $page_data);
    }
    function loan_payment_details($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'loan_payment_details';
        $page_data['page_title'] = get_phrase('loan_payment_details');
        $this->load->view('backend/index', $page_data);
    }
    function loan_apply_list($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'loan_apply_list';
        $page_data['page_title'] = get_phrase('loan_apply_list');
        $this->load->view('backend/index', $page_data);
    }
    function loan_approval_details($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'loan_approval_details';
        $page_data['page_title'] = get_phrase('loan_approval_details');
        $this->load->view('backend/index', $page_data);
    }
    function disciplines_entry($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'disciplines_entry';
        $page_data['page_title'] = get_phrase('disciplines_entry');
        $this->load->view('backend/index', $page_data);
    }
    function discipline_action($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'discipline_action';
        $page_data['page_title'] = get_phrase('discipline_action');
        $this->load->view('backend/index', $page_data);
    }
    function reports_discipline($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'reports_discipline';
        $page_data['page_title'] = get_phrase('reports_discipline');
        $this->load->view('backend/index', $page_data);
    }
    function statistics_discipline($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'statistics_discipline';
        $page_data['page_title'] = get_phrase('statistics_discipline');
        $this->load->view('backend/index', $page_data);
    }
    function articles_materials($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'articles_materials';
        $page_data['page_title'] = get_phrase('articles_materials');
        $this->load->view('backend/index', $page_data);
    }
    function applications_learning($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'applications_learning';
        $page_data['page_title'] = get_phrase('applications_learning');
        $this->load->view('backend/index', $page_data);
    }
    function nomination_scheduling($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'nomination_scheduling';
        $page_data['page_title'] = get_phrase('nomination_scheduling');
        $this->load->view('backend/index', $page_data);
    }
    function training_enrollment($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'training_enrollment';
        $page_data['page_title'] = get_phrase('training_enrollment');
        $this->load->view('backend/index', $page_data);
    }
    function statistics_learning($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'statistics_learning';
        $page_data['page_title'] = get_phrase('statistics_learning');
        $this->load->view('backend/index', $page_data);
    }
    function reports_learning($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'reports_learning';
        $page_data['page_title'] = get_phrase('reports_learning');
        $this->load->view('backend/index', $page_data);
    }
    function training_calendar($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'training_calendar';
        $page_data['page_title'] = get_phrase('training_calendar');
        $this->load->view('backend/index', $page_data);
    }
    /*function pay_head($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'pay_head';
        $page_data['page_title'] = get_phrase('pay_head');
        $this->load->view('backend/index', $page_data);
    }
    function employee_setup($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'employee_setup';
        $page_data['page_title'] = get_phrase('employee_setup');
        $this->load->view('backend/index', $page_data);
    }
    function employee_view($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'employee_view';
        $page_data['page_title'] = get_phrase('employee_view');
        $this->load->view('backend/index', $page_data);
    }
    function payroll_generate($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'payroll_generate';
        $page_data['page_title'] = get_phrase('payroll_generate');
        $this->load->view('backend/index', $page_data);
    }
    function payroll_approve($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'payroll_approve';
        $page_data['page_title'] = get_phrase('payroll_approve');
        $this->load->view('backend/index', $page_data);
    }*/
    function payroll_sheet_hr($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name'] = 'payroll_sheet_hr';
        $page_data['page_title'] = get_phrase('payroll_sheet_hr');
        $this->load->view('backend/index', $page_data);
    }
    /********************************************/
    function human_resource($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'human_resource';
        $page_data['page_title'] = get_phrase('human_resource');
        $this->load->view('backend/index', $page_data);
    }
    function finance($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'finance';
        $page_data['page_title'] = get_phrase('finance');
        $this->load->view('backend/index', $page_data);
    }
    /*Research Management System*/
    function rooms($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'rooms';
        $page_data['page_title'] = get_phrase('rooms');
        $this->load->view('backend/index', $page_data);
    }
    function rooms_allocation($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'rooms_allocation';
        $page_data['page_title'] = get_phrase('rooms_allocation');
        $this->load->view('backend/index', $page_data);
    }
    function fee_collection($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'fee_collection';
        $page_data['page_title'] = get_phrase('fee_collection');
        $this->load->view('backend/index', $page_data);
    }

    function online_adm($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'online_adm';
        $page_data['page_title'] = get_phrase('online_admission');
        $this->load->view('backend/index', $page_data);
    }
    function bank_master($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'bank_master';
        $page_data['page_title'] = get_phrase('bank_master');
        $this->load->view('backend/index', $page_data);
    }
    function fees_category($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'fees_category';
        $page_data['page_title'] = get_phrase('fees_category');
        $this->load->view('backend/index', $page_data);
    }
    function student_fees($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'student_fees';
        $page_data['page_title'] = get_phrase('student_fees');
        $this->load->view('backend/index', $page_data);
    }
    function fees_collect($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'fees_collect';
        $page_data['page_title'] = get_phrase('fees_collect');
        $this->load->view('backend/index', $page_data);
    }

    function admission_applicants($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'admission_applicants';
        $page_data['page_title'] = get_phrase('admission_applicants');
        $this->load->view('backend/index', $page_data);
    }
    function admission_letter($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'admission_letter';
        $page_data['page_title'] = get_phrase('admission_letter');
        $this->load->view('backend/index', $page_data);
    }
    function source_type($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'source_type';
        $page_data['page_title'] = get_phrase('source_type');
        $this->load->view('backend/index', $page_data);
    }
    function enquiry($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'enquiry';
        $page_data['page_title'] = get_phrase('enquiry');
        $this->load->view('backend/index', $page_data);
    }
/*
    function academic_year($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'academic_year';
        $page_data['page_title'] = get_phrase('academic_year');
        $this->load->view('backend/index', $page_data);
    }*/
/*
    function course($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'course';
        $page_data['page_title'] = get_phrase('course');
        $this->load->view('backend/index', $page_data);
    }*/

    function year_wise_course($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'year_wise_course';
        $page_data['page_title'] = get_phrase('year_wise_course');
        $this->load->view('backend/index', $page_data);
    }

    function import_subjects($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'import_subjects';
        $page_data['page_title'] = get_phrase('import_subjects');
        $this->load->view('backend/index', $page_data);
    }

    function section_allocation($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'section_allocation';
        $page_data['page_title'] = get_phrase('section_allocation');
        $this->load->view('backend/index', $page_data);
    }

    function week_days($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'week_days';
        $page_data['page_title'] = get_phrase('week_days');
        $this->load->view('backend/index', $page_data);
    }

    function room_category($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'room_category';
        $page_data['page_title'] = get_phrase('room_category');
        $this->load->view('backend/index', $page_data);
    }
    function room_master($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'room_master';
        $page_data['page_title'] = get_phrase('room_master');
        $this->load->view('backend/index', $page_data);
    }
    function time_table($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'time_table';
        $page_data['page_title'] = get_phrase('time_table');
        $this->load->view('backend/index', $page_data);
    }

    function event_management($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'event_management';
        $page_data['page_title'] = get_phrase('event_management');
        $this->load->view('backend/index', $page_data);
    }
    function assignment($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'assignment';
        $page_data['page_title'] = get_phrase('assignment');
        $this->load->view('backend/index', $page_data);
    }

    function student_attendance($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'student_attendance';
        $page_data['page_title'] = get_phrase('student_attendance');
        $this->load->view('backend/index', $page_data);
    }

    function exam_group($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'exam_group';
        $page_data['page_title'] = get_phrase('exam_group');
        $this->load->view('backend/index', $page_data);
    }
    function grade_level($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'grade_level';
        $page_data['page_title'] = get_phrase('grade_level');
        $this->load->view('backend/index', $page_data);
    }
    function result_summary($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'result_summary';
        $page_data['page_title'] = get_phrase('result_summary');
        $this->load->view('backend/index', $page_data);
    }

    function question_category($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'question_category';
        $page_data['page_title'] = get_phrase('question_category');
        $this->load->view('backend/index', $page_data);
    }
    function questions($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'questions';
        $page_data['page_title'] = get_phrase('questions');
        $this->load->view('backend/index', $page_data);
    }
    function online_test($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'online_test';
        $page_data['page_title'] = get_phrase('online_test');
        $this->load->view('backend/index', $page_data);
    }
    function view_result($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'view_result';
        $page_data['page_title'] = get_phrase('view_result');
        $this->load->view('backend/index', $page_data);
    }



    function admission_category($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'admission_category';
        $page_data['page_title'] = get_phrase('admission_category');
        $this->load->view('backend/index', $page_data);
    }
    function add_student($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'add_student';
        $page_data['page_title'] = get_phrase('add_student');
        $this->load->view('backend/index', $page_data);
    }
    function manage_student($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'manage_student';
        $page_data['page_title'] = get_phrase('manage_student');
        $this->load->view('backend/index', $page_data);
    }
    function import_student($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'import_student';
        $page_data['page_title'] = get_phrase('import_student');
        $this->load->view('backend/index', $page_data);
    }
    /*function student_status($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'student_status';
        $page_data['page_title'] = get_phrase('student_status');
        $this->load->view('backend/index', $page_data);
    }*/
    /*function promote_student($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'promote_student';
        $page_data['page_title'] = get_phrase('promote_student');
        $this->load->view('backend/index', $page_data);
    }*/



    function add_employee($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'add_employee';
        $page_data['page_title'] = get_phrase('add_employee');
        $this->load->view('backend/index', $page_data);
    }
    function manage_employee($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'manage_employee';
        $page_data['page_title'] = get_phrase('manage_employee');
        $this->load->view('backend/index', $page_data);
    }
    function import_employee($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'import_employee';
        $page_data['page_title'] = get_phrase('import_employee');
        $this->load->view('backend/index', $page_data);
    }
    function department($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'department';
        $page_data['page_title'] = get_phrase('department');
        $this->load->view('backend/index', $page_data);
    }
    function designation($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'designation';
        $page_data['page_title'] = get_phrase('designation');
        $this->load->view('backend/index', $page_data);
    }
    function category($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'category';
        $page_data['page_title'] = get_phrase('category');
        $this->load->view('backend/index', $page_data);
    }
    function leave_type($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'leave_type';
        $page_data['page_title'] = get_phrase('leave_type');
        $this->load->view('backend/index', $page_data);
    }
    function leave_duration($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'leave_duration';
        $page_data['page_title'] = get_phrase('leave_duration');
        $this->load->view('backend/index', $page_data);
    }
    function leave_reporting($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'leave_reporting';
        $page_data['page_title'] = get_phrase('leave_reporting');
        $this->load->view('backend/index', $page_data);
    }
    function leave_assign($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'leave_assign';
        $page_data['page_title'] = get_phrase('leave_assign');
        $this->load->view('backend/index', $page_data);
    }
    function leave_application($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'leave_application';
        $page_data['page_title'] = get_phrase('leave_application');
        $this->load->view('backend/index', $page_data);
    }
    function manage_attendancehr($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'manage_attendancehr';
        $page_data['page_title'] = get_phrase('manage_attendancehr');
        $this->load->view('backend/index', $page_data);
    }



	function osadStudRept($param1 = ''){
	
	    if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
			
	    $page_data['osadStudent']    = $this->db->get('osad_student', array(
                'id' => $param1
            ))->result_array();
			$page_data['acdSession']    = $this->db->get('acd_session', array(
                'is_open' =>'1'
            ))->result_array();
			$page_data['osadacdhistory']    = $this->db->get_where('osad_acd_history', array(
                'osad_student_id' => $param1
            ))->result_array();
        $page_data['page_name']  = 'online_admission';
		$page_data['page_title'] = get_phrase('admission');
        $this->load->view('backend/admin/onlineAdmissionRept', $page_data);
		
		//$this->load->helper(array('dompdf', 'file'));
	    //$html=$this->load->view('backend/admin/onlineAdmissionRept', $page_data, true);     
        //pdf_create($html, 'AdmissionForm-'.$param1);
			
	}
	function student_bulk_add($param1 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
			
		if ($param1 == 'import_excel')
		{
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_import.xlsx');
			// Importing excel sheet for bulk student uploads

			include 'simplexlsx.class.php';
			
			$xlsx = new SimpleXLSX('uploads/student_import.xlsx');
			
			list($num_cols, $num_rows) = $xlsx->dimension();
			$f = 0;
			foreach( $xlsx->rows() as $r ) 
			{
				// Ignore the inital name row of excel file
				if ($f == 0)
				{
					$f++;
					continue;
				}
				for( $i=0; $i < $num_cols; $i++ )
				{
					if ($i == 0)	    $data['name']			=	$r[$i];
					else if ($i == 1)	$data['birthday']		=	$r[$i];
					else if ($i == 2)	$data['sex']		    =	$r[$i];
					else if ($i == 3)	$data['address']		=	$r[$i];
					else if ($i == 4)	$data['phone']			=	$r[$i];
					else if ($i == 5)	$data['email']			=	$r[$i];
					else if ($i == 6)	$data['password']		=	$r[$i];
					else if ($i == 7)	$data['roll']			=	$r[$i];
				}
				$data['class_id']	=	$this->input->post('class_id');
				
				$this->db->insert('student' , $data);
				//print_r($data);
			}
			redirect(base_url() . 'index.php?admin/student_information/' . $this->input->post('class_id'), 'refresh');
		}
		$page_data['page_name']  = 'student_bulk_add';
		$page_data['page_title'] = get_phrase('add_bulk_student');
		$this->load->view('backend/index', $page_data);
	}
	
	function student_information($class_id = '')
	{
		if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
			
		$page_data['page_name']  	= 'student_information';
		$page_data['page_title'] 	= get_phrase('student_information'). " - ".get_phrase('class')." : ".
											$this->crud_model->get_class_name($class_id);
		$page_data['class_id'] 	= $class_id;
		$this->load->view('backend/index', $page_data);
	}
	
	function student_marksheet($class_id = '')
	{
		if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
			
		$page_data['page_name']  = 'student_marksheet';
		$page_data['page_title'] 	= get_phrase('student_marksheet'). " - ".get_phrase('class')." : ".
											$this->crud_model->get_class_name($class_id);
		$page_data['class_id'] 	= $class_id;
		$this->load->view('backend/index', $page_data);
	}
	
    function student($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
        if ($param1 == 'create') {
            $data['name']       = $this->input->post('name');
            $data['birthday']   = $this->input->post('birthday');
            $data['sex']        = $this->input->post('sex');
            $data['address']    = $this->input->post('address');
            $data['phone']      = $this->input->post('phone');
            $data['email']      = $this->input->post('email');
            $data['password']   = $this->input->post('password');
            $data['class_id']   = $this->input->post('class_id');
            if ($this->input->post('section_id') != '') {
                $data['section_id'] = $this->input->post('section_id');
            }
            $data['parent_id']  = $this->input->post('parent_id');
            $data['roll']       = $this->input->post('roll');
            $this->db->insert('student', $data);
            $student_id = $this->db->insert_id();
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $student_id . '.jpg');
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            $this->email_model->account_opening_email('student', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            redirect(base_url() . 'index.php?admin/student_add/' . $data['class_id'], 'refresh');
        }
        if ($param2 == 'do_update') {
            $data['name']        = $this->input->post('name');
            $data['birthday']    = $this->input->post('birthday');
            $data['sex']         = $this->input->post('sex');
            $data['address']     = $this->input->post('address');
            $data['phone']       = $this->input->post('phone');
            $data['email']       = $this->input->post('email');
            $data['class_id']    = $this->input->post('class_id');
            $data['section_id']  = $this->input->post('section_id');
            $data['parent_id']   = $this->input->post('parent_id');
            $data['roll']        = $this->input->post('roll');
            
            $this->db->where('student_id', $param3);
            $this->db->update('student', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $param3 . '.jpg');
            $this->crud_model->clear_cache();
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/student_information/' . $param1, 'refresh');
        } 
		
        if ($param2 == 'delete') {
            $this->db->where('student_id', $param3);
            $this->db->delete('student');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/student_information/' . $param1, 'refresh');
        }
    }
     /****MANAGE PARENTS CLASSWISE*****/
    function parent($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
        if ($param1 == 'create') {
            $data['name']        			= $this->input->post('name');
            $data['email']       			= $this->input->post('email');
            $data['password']    			= $this->input->post('password');
            $data['phone']       			= $this->input->post('phone');
            $data['address']     			= $this->input->post('address');
            $data['profession']  			= $this->input->post('profession');
            $this->db->insert('parent', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            $this->email_model->account_opening_email('parent', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            redirect(base_url() . 'index.php?admin/parent/', 'refresh');
        }
        if ($param1 == 'edit') {
            $data['name']                   = $this->input->post('name');
            $data['email']                  = $this->input->post('email');
            $data['phone']                  = $this->input->post('phone');
            $data['address']                = $this->input->post('address');
            $data['profession']             = $this->input->post('profession');
            $this->db->where('parent_id' , $param2);
            $this->db->update('parent' , $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/parent/', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->db->where('parent_id' , $param2);
            $this->db->delete('parent');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/parent/', 'refresh');
        }
        $page_data['page_title'] 	= get_phrase('all_parents');
        $page_data['page_name']  = 'parent';
        $this->load->view('backend/index', $page_data);
    }
	
    
    /****MANAGE TEACHERS*****/
    function teacher($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']        = $this->input->post('name');
            $data['birthday']    = $this->input->post('birthday');
            $data['sex']         = $this->input->post('sex');
            $data['address']     = $this->input->post('address');
            $data['phone']       = $this->input->post('phone');
            $data['email']       = $this->input->post('email');
            $data['password']    = $this->input->post('password');
            $this->db->insert('teacher', $data);
            $teacher_id = $this->db->insert_id();
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $teacher_id . '.jpg');
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            $this->email_model->account_opening_email('teacher', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            redirect(base_url() . 'index.php?admin/teacher/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']        = $this->input->post('name');
            $data['birthday']    = $this->input->post('birthday');
            $data['sex']         = $this->input->post('sex');
            $data['address']     = $this->input->post('address');
            $data['phone']       = $this->input->post('phone');
            $data['email']       = $this->input->post('email');
            
            $this->db->where('teacher_id', $param2);
            $this->db->update('teacher', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $param2 . '.jpg');
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/teacher/', 'refresh');
        } else if ($param1 == 'personal_profile') {
            $page_data['personal_profile']   = true;
            $page_data['current_teacher_id'] = $param2;
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('teacher', array(
                'teacher_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('teacher_id', $param2);
            $this->db->delete('teacher');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/teacher/', 'refresh');
        }
        $page_data['teachers']   = $this->db->get('teacher')->result_array();
        $page_data['page_name']  = 'teacher';
        $page_data['page_title'] = get_phrase('manage_teacher');
        $this->load->view('backend/index', $page_data);
    }
    
    /****MANAGE SUBJECTS*****/
    function subject($param1 = '', $param2 = '' , $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']       = $this->input->post('name');
            $data['class_id']   = $this->input->post('class_id');
            $data['teacher_id'] = $this->input->post('teacher_id');
            $this->db->insert('subject', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/subject/'.$data['class_id'], 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']       = $this->input->post('name');
            $data['class_id']   = $this->input->post('class_id');
            $data['teacher_id'] = $this->input->post('teacher_id');
            
            $this->db->where('subject_id', $param2);
            $this->db->update('subject', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/subject/'.$data['class_id'], 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('subject', array(
                'subject_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('subject_id', $param2);
            $this->db->delete('subject');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/subject/'.$param3, 'refresh');
        }
		 $page_data['class_id']   = $param1;
        $page_data['subjects']   = $this->db->get_where('subject' , array('class_id' => $param1))->result_array();
        $page_data['page_name']  = 'subject';
        $page_data['page_title'] = get_phrase('manage_subject');
        $this->load->view('backend/index', $page_data);
    }
    
    /****MANAGE CLASSES*****/
    function classes($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']         = $this->input->post('name');
            $data['name_numeric'] = $this->input->post('name_numeric');
            $data['teacher_id']   = $this->input->post('teacher_id');
            $this->db->insert('class', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/classes/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']         = $this->input->post('name');
            $data['name_numeric'] = $this->input->post('name_numeric');
            $data['teacher_id']   = $this->input->post('teacher_id');
            
            $this->db->where('class_id', $param2);
            $this->db->update('class', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/classes/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('class', array(
                'class_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('class_id', $param2);
            $this->db->delete('class');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/classes/', 'refresh');
        }
        $page_data['classes']    = $this->db->get('class')->result_array();
        $page_data['page_name']  = 'class';
        $page_data['page_title'] = get_phrase('manage_class');
        $this->load->view('backend/index', $page_data);
    }

    /****MANAGE SECTIONS*****/
    function section($class_id = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        // detect the first class
        if ($class_id == '')
            $class_id           =   $this->db->get('class')->first_row()->class_id;

        $page_data['page_name']  = 'section';
        $page_data['page_title'] = get_phrase('manage_sections');
        $page_data['class_id']   = $class_id;
        $this->load->view('backend/index', $page_data);    
    }
/*
    function sections($param1 = '' , $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']       =   $this->input->post('name');
            $data['nick_name']  =   $this->input->post('nick_name');
            $data['class_id']   =   $this->input->post('class_id');
            $data['teacher_id'] =   $this->input->post('teacher_id');
            $this->db->insert('section' , $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/section/' . $data['class_id'] , 'refresh');
        }

        if ($param1 == 'edit') {
            $data['name']       =   $this->input->post('name');
            $data['nick_name']  =   $this->input->post('nick_name');
            $data['class_id']   =   $this->input->post('class_id');
            $data['teacher_id'] =   $this->input->post('teacher_id');
            $this->db->where('section_id' , $param2);
            $this->db->update('section' , $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/section/' . $data['class_id'] , 'refresh');
        }

        if ($param1 == 'delete') {
            $this->db->where('section_id' , $param2);
            $this->db->delete('section');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/section' , 'refresh');
        }
    }*/

    /*function get_class_section12($class_id)
    {
        $sections = $this->db->get_where('semester_particulars' , array(
            'receipt_no' => $class_id
        ))->result_array();
        foreach ($sections as $row) {
            echo '<option value="' . $row['id'] . '">' . $row['description'] ."&nbsp;&nbsp;" . $row['fee_type'] . '</option>';
        }
    }*/

    function get_class_subject($class_id)
    {
        $subjects = $this->db->get_where('subject' , array(
            'class_id' => $class_id
        ))->result_array();
        foreach ($subjects as $row) {
            echo '<option value="' . $row['subject_id'] . '">' . $row['name'] . '</option>';
        }
    }

    /****MANAGE EXAMS*****/
    function exam($param1 = '', $param2 = '' , $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']    = $this->input->post('name');
            $data['date']    = $this->input->post('date');
            $data['comment'] = $this->input->post('comment');
            $this->db->insert('exam', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/exam/', 'refresh');
        }
        if ($param1 == 'edit' && $param2 == 'do_update') {
            $data['name']    = $this->input->post('name');
            $data['date']    = $this->input->post('date');
            $data['comment'] = $this->input->post('comment');
            
            $this->db->where('exam_id', $param3);
            $this->db->update('exam', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/exam/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('exam', array(
                'exam_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('exam_id', $param2);
            $this->db->delete('exam');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/exam/', 'refresh');
        }
        $page_data['exams']      = $this->db->get('exam')->result_array();
        $page_data['page_name']  = 'exam';
        $page_data['page_title'] = get_phrase('manage_exam');
        $this->load->view('backend/index', $page_data);
    }

    /****** SEND EXAM MARKS VIA SMS ********/
    function exam_marks_sms($param1 = '' , $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'send_sms') {

            $exam_id    =   $this->input->post('exam_id');
            $class_id   =   $this->input->post('class_id');
            $receiver   =   $this->input->post('receiver');

            // get all the students of the selected class
            $students = $this->db->get_where('student' , array(
                'class_id' => $class_id
            ))->result_array();
            // get the marks of the student for selected exam
            foreach ($students as $row) {
                if ($receiver == 'student')
                    $receiver_phone = $row['phone'];
                if ($receiver == 'parent' && $row['parent_id'] != '') 
                    $receiver_phone = $this->db->get_where('parent' , array('parent_id' => $row['parent_id']))->row()->phone;
                

                $this->db->where('exam_id' , $exam_id);
                $this->db->where('student_id' , $row['student_id']);
                $marks = $this->db->get('mark')->result_array();
                $message = '';
                foreach ($marks as $row2) {
                    $subject       = $this->db->get_where('subject' , array('subject_id' => $row2['subject_id']))->row()->name;
                    $mark_obtained = $row2['mark_obtained'];  
                    $message      .= $row2['student_id'] . $subject . ' : ' . $mark_obtained . ' , ';
                    
                }
                // send sms
                $this->sms_model->send_sms( $message , $receiver_phone );
            }
            $this->session->set_flashdata('flash_message' , get_phrase('message_sent'));
            redirect(base_url() . 'index.php?admin/exam_marks_sms' , 'refresh');
        }
                
        $page_data['page_name']  = 'exam_marks_sms';
        $page_data['page_title'] = get_phrase('send_marks_by_sms');
        $this->load->view('backend/index', $page_data);
    }

    /****MANAGE EXAM MARKS*****/
    function marks($exam_id = '', $class_id = '', $subject_id = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        
        if ($this->input->post('operation') == 'selection') {
            $page_data['exam_id']    = $this->input->post('exam_id');
            $page_data['class_id']   = $this->input->post('class_id');
            $page_data['subject_id'] = $this->input->post('subject_id');
            
            if ($page_data['exam_id'] > 0 && $page_data['class_id'] > 0 && $page_data['subject_id'] > 0) {
                redirect(base_url() . 'index.php?admin/marks/' . $page_data['exam_id'] . '/' . $page_data['class_id'] . '/' . $page_data['subject_id'], 'refresh');
            } else {
                $this->session->set_flashdata('mark_message', 'Choose exam, class and subject');
                redirect(base_url() . 'index.php?admin/marks/', 'refresh');
            }
        }
        if ($this->input->post('operation') == 'update') {
            $data['mark_obtained'] = $this->input->post('mark_obtained');
            $data['comment']       = $this->input->post('comment');
            
            $this->db->where('mark_id', $this->input->post('mark_id'));
            $this->db->update('mark', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/marks/' . $this->input->post('exam_id') . '/' . $this->input->post('class_id') . '/' . $this->input->post('subject_id'), 'refresh');
        }
        $page_data['exam_id']    = $exam_id;
        $page_data['class_id']   = $class_id;
        $page_data['subject_id'] = $subject_id;
        
        $page_data['page_info'] = 'Exam marks';
        
        $page_data['page_name']  = 'marks';
        $page_data['page_title'] = get_phrase('manage_exam_marks');
        $this->load->view('backend/index', $page_data);
    }
    
    
    /****MANAGE GRADES*****/
    function grade($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']        = $this->input->post('name');
            $data['grade_point'] = $this->input->post('grade_point');
            $data['mark_from']   = $this->input->post('mark_from');
            $data['mark_upto']   = $this->input->post('mark_upto');
            $data['comment']     = $this->input->post('comment');
            $this->db->insert('grade', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/grade/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']        = $this->input->post('name');
            $data['grade_point'] = $this->input->post('grade_point');
            $data['mark_from']   = $this->input->post('mark_from');
            $data['mark_upto']   = $this->input->post('mark_upto');
            $data['comment']     = $this->input->post('comment');
            
            $this->db->where('grade_id', $param2);
            $this->db->update('grade', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/grade/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('grade', array(
                'grade_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('grade_id', $param2);
            $this->db->delete('grade');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/grade/', 'refresh');
        }
        $page_data['grades']     = $this->db->get('grade')->result_array();
        $page_data['page_name']  = 'grade';
        $page_data['page_title'] = get_phrase('manage_grade');
        $this->load->view('backend/index', $page_data);
    }
    
    /**********MANAGING CLASS ROUTINE******************/
    function class_routine($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['class_id']   = $this->input->post('class_id');
            $data['subject_id'] = $this->input->post('subject_id');
            $data['time_start'] = $this->input->post('time_start') + (12 * ($this->input->post('starting_ampm') - 1));
            $data['time_end']   = $this->input->post('time_end') + (12 * ($this->input->post('ending_ampm') - 1));
            $data['day']        = $this->input->post('day');
            $this->db->insert('class_routine', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/class_routine/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['class_id']   = $this->input->post('class_id');
            $data['subject_id'] = $this->input->post('subject_id');
            $data['time_start'] = $this->input->post('time_start') + (12 * ($this->input->post('starting_ampm') - 1));
            $data['time_end']   = $this->input->post('time_end') + (12 * ($this->input->post('ending_ampm') - 1));
            $data['day']        = $this->input->post('day');
            
            $this->db->where('class_routine_id', $param2);
            $this->db->update('class_routine', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/class_routine/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('class_routine', array(
                'class_routine_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('class_routine_id', $param2);
            $this->db->delete('class_routine');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/class_routine/', 'refresh');
        }
        $this->session->test('test');
        //$page_data['asas']  = 'class_routine';
        $page_data['page_name']  = 'class_routine';
        $page_data['page_title'] = get_phrase('manage_class_routine');
        $this->load->view('backend/index', $page_data);
    }
	
	/****** DAILY ATTENDANCE *****************/
	/*function manage_attendance($date='',$month='',$year='',$class_id='')
	{
		if($this->session->userdata('admin_login')!=1)redirect('login' , 'refresh');
		
		if($_POST)
		{
			// Loop all the students of $class_id
            $students   =   $this->db->get_where('student', array('class_id' => $class_id))->result_array();
            foreach ($students as $row)
            {
                $attendance_status  =   $this->input->post('status_' . $row['student_id']);

                $this->db->where('student_id' , $row['student_id']);
                $this->db->where('date' , $this->input->post('date'));

                $this->db->update('attendance' , array('status' => $attendance_status));
            }

			$this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
			redirect(base_url() . 'index.php?admin/manage_attendance/'.$date.'/'.$month.'/'.$year.'/'.$class_id , 'refresh');
		}
        $page_data['date']     =	$date;
        $page_data['month']    =	$month;
        $page_data['year']     =	$year;
        $page_data['class_id'] =	$class_id;
		
        $page_data['page_name']  =	'manage_attendance';
        $page_data['page_title'] =	get_phrase('manage_daily_attendance');
		$this->load->view('backend/index', $page_data);
	}*/
    function manage_attendance_sep_7($date='',$month='',$year='',$class_id='')
    {
        if($this->session->userdata('admin_login')!=1)redirect('login' , 'refresh');

        if($_POST)
        {
            // Loop all the students of $class_id
            $students   =   $this->db->get_where('student_pundro', array('NameofBatch' => $class_id))->result_array();
            foreach ($students as $row)
            {
                $tt['CourseInstructor'] = $this->input->post('CourseInstructor');
                $tt['CourseName'] = $this->input->post('CourseName');
                $tt['Duration'] = $this->input->post('Duration');
                $tt['BatchName'] = $class_id;
                $tt['ProgramName'] = $this->input->post('ProgramName');
                $tt['status']  =   $this->input->post('status_' . $row['id']);
                $tt['student_id']  =   $row['id'];
                $tt['date']  =   $this->input->post('date');

                $this->db->where('student_id' , $row['id']);
                $this->db->where('date' , $this->input->post('date'));

                $this->db->update('attendance' , $tt);
            }

            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/manage_attendance/'.$date.'/'.$month.'/'.$year.'/'.$class_id , 'refresh');
        }
        $page_data['date']     =	$date;
        $page_data['month']    =	$month;
        $page_data['year']     =	$year;
        $page_data['class_id'] =	$class_id;

        $page_data['page_name']  =	'manage_attendance';
        $page_data['page_title'] =	get_phrase('student_attendance');
        $this->load->view('backend/index', $page_data);
    }
    function duty_roster($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['ProgramName']    = $this->input->post('ProgramName');
            $data['BatchName']      = $this->input->post('BatchName');
            $data['SessionName']    = $this->input->post('SessionName');
            $data['Year']           = $this->input->post('Year');
            $data['SemesterName']   = $this->input->post('SemesterName');
            $data['CourseName']     = $this->input->post('CourseName');
            $data['ExamType']       = $this->input->post('ExamType');
            $data['DateDutyRoster'] = $this->input->post('DateDutyRoster');
            $data['StartTime']      = $this->input->post('StartTime') + (12 * ($this->input->post('starting_ampm') - 1));
            $data['EndTime']        = $this->input->post('EndTime') + (12 * ($this->input->post('ending_ampm') - 1));
            $data['RoomNo']         = $this->input->post('RoomNo');
            $data['InstructorId']   = $this->input->post('InstructorId');
            $data['InstructorName'] = $this->input->post('InstructorName');
            $data['Signature']      = $this->input->post('Signature');
            $data['Remarks']        = $this->input->post('Remarks');

            $this->db->insert('duty_roster', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/duty_roster/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['ProgramName']    = $this->input->post('ProgramName');
            $data['BatchName']      = $this->input->post('BatchName');
            $data['Session']        = $this->input->post('Session');
            $data['Year']           = $this->input->post('Year');
            $data['Semester']       = $this->input->post('Semester');
            $data['CourseName']     = $this->input->post('CourseName');
            $data['Date']           = $this->input->post('Date');
            $data['Time']           = $this->input->post('Time');
            $data['RoomNo']         = $this->input->post('RoomNo');
            $data['InstructorId']   = $this->input->post('InstructorId');
            $data['InstructorName'] = $this->input->post('InstructorName');
            $data['Signature']      = $this->input->post('Signature');
            $data['Remarks']        = $this->input->post('Remarks');
            

            $this->db->where('id', $param2);
            $this->db->update('duty_roster', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/duty_roster/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('duty_roster', array(
                'id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $param2);
            $this->db->delete('duty_roster');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/duty_roster/', 'refresh');
        }
        $page_data['acdSession']    = $this->db->get('duty_roster')->result_array();
        $page_data['page_name']  = 'duty_roster';
        $page_data['page_title'] = get_phrase('exam_duty_roster');
        $this->load->view('backend/index', $page_data);
    }
  
    function manage_attendance($date='',$month='',$year='',$class_id='')
    {
        if($this->session->userdata('admin_login')!=1)redirect('login' , 'refresh');

        if($_POST)
        {
            // Loop all the students of $class_id
            $students   =   $this->db->get_where('student_pundro', array('NameofBatch' => $class_id))->result_array();
            foreach ($students as $row)
            {
                $tt['CourseInstructor'] = $this->input->post('CourseInstructor');
                $tt['CourseName'] = $this->input->post('CourseName');
                $tt['Duration'] = $this->input->post('Duration');
                $tt['BatchName'] = $class_id;
                $tt['ProgramName'] = $this->input->post('ProgramName');
                $tt['status']  =   $this->input->post('status_' . $row['id']);
                $tt['student_id']  =   $row['id'];
                $tt['date']  =   $this->input->post('date');

                $this->db->where('student_id' , $row['id']);
                $this->db->where('date' , $this->input->post('date'));

                $this->db->update('attendance' , $tt);
            }

            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/manage_attendance/'.$date.'/'.$month.'/'.$year.'/'.$class_id , 'refresh');
        }
        $page_data['date']     =	$date;
        $page_data['month']    =	$month;
        $page_data['year']     =	$year;
        $page_data['class_id'] =	$class_id;

        $page_data['page_name']  =	'manage_attendance';
        $page_data['page_title'] =	get_phrase('student_attendance');
        $this->load->view('backend/index', $page_data);
    }
	/*function attendance_selector()
	{
		redirect(base_url() . 'index.php?admin/manage_attendance/'.$this->input->post('date').'/'.
					$this->input->post('month').'/'.
						$this->input->post('year').'/'.
							$this->input->post('class_id') , 'refresh');
	}*/
    function attendance_selector()
    {
        redirect(base_url() . 'index.php?admin/manage_attendance/'.$this->input->post('date').'/'.
            $this->input->post('month').'/'.
            $this->input->post('year').'/'.
            $this->input->post('class_id') , 'refresh');
    }
    /******MANAGE BILLING / INVOICES WITH STATUS*****/
    function invoice($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        
        if ($param1 == 'create') {
            $data['student_id']         = $this->input->post('student_id');
            $data['title']              = $this->input->post('title');
            $data['description']        = $this->input->post('description');
            $data['amount']             = $this->input->post('amount');
            $data['amount_paid']        = $this->input->post('amount_paid');
            $data['due']                = $data['amount'] - $data['amount_paid'];
            $data['status']             = $this->input->post('status');
            $data['creation_timestamp'] = strtotime($this->input->post('date'));
            
            $this->db->insert('invoice', $data);
            $invoice_id = $this->db->insert_id();

            $data2['invoice_id']        =   $invoice_id;
            $data2['student_id']        =   $this->input->post('student_id');
            $data2['title']             =   $this->input->post('title');
            $data2['description']       =   $this->input->post('description');
            $data2['payment_type']      =  'income';
            $data2['method']            =   $this->input->post('method');
            $data2['amount']            =   $this->input->post('amount_paid');
            $data2['timestamp']         =   strtotime($this->input->post('date'));

            $this->db->insert('payment' , $data2);

            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/invoice', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['student_id']         = $this->input->post('student_id');
            $data['title']              = $this->input->post('title');
            $data['description']        = $this->input->post('description');
            $data['amount']             = $this->input->post('amount');
            $data['status']             = $this->input->post('status');
            $data['creation_timestamp'] = strtotime($this->input->post('date'));
            
            $this->db->where('invoice_id', $param2);
            $this->db->update('invoice', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/invoice', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('invoice', array(
                'invoice_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'take_payment') {
            $data['invoice_id']   =   $this->input->post('invoice_id');
            $data['student_id']   =   $this->input->post('student_id');
            $data['title']        =   $this->input->post('title');
            $data['description']  =   $this->input->post('description');
            $data['payment_type'] =   'income';
            $data['method']       =   $this->input->post('method');
            $data['amount']       =   $this->input->post('amount');
            $data['timestamp']    =   strtotime($this->input->post('timestamp'));
            $this->db->insert('payment' , $data);

            $data2['amount_paid']   =   $this->input->post('amount');
            $this->db->where('invoice_id' , $param2);
            $this->db->set('amount_paid', 'amount_paid + ' . $data2['amount_paid'], FALSE);
            $this->db->set('due', 'due - ' . $data2['amount_paid'], FALSE);
            $this->db->update('invoice');

            $this->session->set_flashdata('flash_message' , get_phrase('payment_successfull'));
            redirect(base_url() . 'index.php?admin/invoice', 'refresh');
        }

        if ($param1 == 'delete') {
            $this->db->where('invoice_id', $param2);
            $this->db->delete('invoice');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/invoice', 'refresh');
        }
        $page_data['page_name']  = 'invoice';
        $page_data['page_title'] = get_phrase('manage_invoice/payment');
        $this->db->order_by('creation_timestamp', 'desc');
        $page_data['invoices'] = $this->db->get('invoice')->result_array();
        $this->load->view('backend/index', $page_data);
    }

    /**********ACCOUNTING********************/
    function income($param1 = '' , $param2 = '')
    {
       if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
        $page_data['page_name']  = 'income';
        $page_data['page_title'] = get_phrase('incomes');
        $this->db->order_by('creation_timestamp', 'desc');
        $page_data['invoices'] = $this->db->get('invoice')->result_array();
        $this->load->view('backend/index', $page_data); 
    }

    function expense($param1 = '' , $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
        if ($param1 == 'create') {
            $data['title']               =   $this->input->post('title');
            $data['expense_category_id'] =   $this->input->post('expense_category_id');
            $data['description']         =   $this->input->post('description');
            $data['payment_type']        =   'expense';
            $data['method']              =   $this->input->post('method');
            $data['amount']              =   $this->input->post('amount');
            $data['timestamp']           =   strtotime($this->input->post('timestamp'));
            $this->db->insert('payment' , $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/expense', 'refresh');
        }

        if ($param1 == 'edit') {
            $data['title']               =   $this->input->post('title');
            $data['expense_category_id'] =   $this->input->post('expense_category_id');
            $data['description']         =   $this->input->post('description');
            $data['payment_type']        =   'expense';
            $data['method']              =   $this->input->post('method');
            $data['amount']              =   $this->input->post('amount');
            $data['timestamp']           =   strtotime($this->input->post('timestamp'));
            $this->db->where('payment_id' , $param2);
            $this->db->update('payment' , $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/expense', 'refresh');
        }

        if ($param1 == 'delete') {
            $this->db->where('payment_id' , $param2);
            $this->db->delete('payment');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/expense', 'refresh');
        }

        $page_data['page_name']  = 'expense';
        $page_data['page_title'] = get_phrase('expenses');
        $this->load->view('backend/index', $page_data); 
    }

    function expense_category($param1 = '' , $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
        if ($param1 == 'create') {
            $data['name']   =   $this->input->post('name');
            $this->db->insert('expense_category' , $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/expense_category');
        }
        if ($param1 == 'edit') {
            $data['name']   =   $this->input->post('name');
            $this->db->where('expense_category_id' , $param2);
            $this->db->update('expense_category' , $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/expense_category');
        }
        if ($param1 == 'delete') {
            $this->db->where('expense_category_id' , $param2);
            $this->db->delete('expense_category');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/expense_category');
        }

        $page_data['page_name']  = 'expense_category';
        $page_data['page_title'] = get_phrase('expense_category');
        $this->load->view('backend/index', $page_data);
    }

    /**********MANAGE LIBRARY / BOOKS********************/
    function book($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
        if ($param1 == 'create') {
            $data['name']        = $this->input->post('name');
            $data['description'] = $this->input->post('description');
            $data['price']       = $this->input->post('price');
            $data['author']      = $this->input->post('author');
            $data['class_id']    = $this->input->post('class_id');
            $data['status']      = $this->input->post('status');
            $this->db->insert('book', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/book', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']        = $this->input->post('name');
            $data['description'] = $this->input->post('description');
            $data['price']       = $this->input->post('price');
            $data['author']      = $this->input->post('author');
            $data['class_id']    = $this->input->post('class_id');
            $data['status']      = $this->input->post('status');
            
            $this->db->where('book_id', $param2);
            $this->db->update('book', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/book', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('book', array(
                'book_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('book_id', $param2);
            $this->db->delete('book');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/book', 'refresh');
        }
        $page_data['books']      = $this->db->get('book')->result_array();
        $page_data['page_name']  = 'book';
        $page_data['page_title'] = get_phrase('manage_library_books');
        $this->load->view('backend/index', $page_data);
        
    }
    /**********MANAGE TRANSPORT / VEHICLES / ROUTES********************/
    function transport($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
        if ($param1 == 'create') {
            $data['route_name']        = $this->input->post('route_name');
            $data['number_of_vehicle'] = $this->input->post('number_of_vehicle');
            $data['description']       = $this->input->post('description');
            $data['route_fare']        = $this->input->post('route_fare');
            $this->db->insert('transport', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/transport', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['route_name']        = $this->input->post('route_name');
            $data['number_of_vehicle'] = $this->input->post('number_of_vehicle');
            $data['description']       = $this->input->post('description');
            $data['route_fare']        = $this->input->post('route_fare');
            
            $this->db->where('transport_id', $param2);
            $this->db->update('transport', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/transport', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('transport', array(
                'transport_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('transport_id', $param2);
            $this->db->delete('transport');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/transport', 'refresh');
        }
        $page_data['transports'] = $this->db->get('transport')->result_array();
        $page_data['page_name']  = 'transport';
        $page_data['page_title'] = get_phrase('manage_transport');
        $this->load->view('backend/index', $page_data);
        
    }
    /**********MANAGE DORMITORY / HOSTELS / ROOMS ********************/
    function dormitory($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
        if ($param1 == 'create') {
            $data['name']           = $this->input->post('name');
            $data['number_of_room'] = $this->input->post('number_of_room');
            $data['description']    = $this->input->post('description');
            $this->db->insert('dormitory', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/dormitory', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']           = $this->input->post('name');
            $data['number_of_room'] = $this->input->post('number_of_room');
            $data['description']    = $this->input->post('description');
            
            $this->db->where('dormitory_id', $param2);
            $this->db->update('dormitory', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/dormitory', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('dormitory', array(
                'dormitory_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('dormitory_id', $param2);
            $this->db->delete('dormitory');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/dormitory', 'refresh');
        }
        $page_data['dormitories'] = $this->db->get('dormitory')->result_array();
        $page_data['page_name']   = 'dormitory';
        $page_data['page_title']  = get_phrase('manage_dormitory');
        $this->load->view('backend/index', $page_data);
        
    }
    
    /***MANAGE EVENT / NOTICEBOARD, WILL BE SEEN BY ALL ACCOUNTS DASHBOARD**/
    function noticeboard($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        
        if ($param1 == 'create') {
            $data['notice_title']     = $this->input->post('notice_title');
            $data['notice']           = $this->input->post('notice');
            $data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));
            $this->db->insert('noticeboard', $data);

            $check_sms_send = $this->input->post('check_sms');

            if ($check_sms_send == 1) {
                // sms sending configurations

                $parents  = $this->db->get('parent')->result_array();
                $students = $this->db->get('student')->result_array();
                $teachers = $this->db->get('teacher')->result_array();
                $date     = $this->input->post('create_timestamp');
                $message  = $data['notice_title'] . ' ';
                $message .= get_phrase('on') . ' ' . $date;
                foreach($parents as $row) {
                    $reciever_phone = $row['phone'];
                    $this->sms_model->send_sms($message , $reciever_phone);
                }
                foreach($students as $row) {
                    $reciever_phone = $row['phone'];
                    $this->sms_model->send_sms($message , $reciever_phone);
                }
                foreach($teachers as $row) {
                    $reciever_phone = $row['phone'];
                    $this->sms_model->send_sms($message , $reciever_phone);
                }
            }

            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/noticeboard/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['notice_title']     = $this->input->post('notice_title');
            $data['notice']           = $this->input->post('notice');
            $data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));
            $this->db->where('notice_id', $param2);
            $this->db->update('noticeboard', $data);

            $check_sms_send = $this->input->post('check_sms');

            if ($check_sms_send == 1) {
                // sms sending configurations

                $parents  = $this->db->get('parent')->result_array();
                $students = $this->db->get('student')->result_array();
                $teachers = $this->db->get('teacher')->result_array();
                $date     = $this->input->post('create_timestamp');
                $message  = $data['notice_title'] . ' ';
                $message .= get_phrase('on') . ' ' . $date;
                foreach($parents as $row) {
                    $reciever_phone = $row['phone'];
                    $this->sms_model->send_sms($message , $reciever_phone);
                }
                foreach($students as $row) {
                    $reciever_phone = $row['phone'];
                    $this->sms_model->send_sms($message , $reciever_phone);
                }
                foreach($teachers as $row) {
                    $reciever_phone = $row['phone'];
                    $this->sms_model->send_sms($message , $reciever_phone);
                }
            }

            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/noticeboard/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('noticeboard', array(
                'notice_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('notice_id', $param2);
            $this->db->delete('noticeboard');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/noticeboard/', 'refresh');
        }
        $page_data['page_name']  = 'noticeboard';
        $page_data['page_title'] = get_phrase('manage_noticeboard');
        $page_data['notices']    = $this->db->get('noticeboard')->result_array();
        $this->load->view('backend/index', $page_data);
    }
    
    /* private messaging */

    function message($param1 = 'message_home', $param2 = '', $param3 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'send_new') {
            $message_thread_code = $this->crud_model->send_new_private_message();
            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
            redirect(base_url() . 'index.php?admin/message/message_read/' . $message_thread_code, 'refresh');
        }

        if ($param1 == 'send_reply') {
            $this->crud_model->send_reply_message($param2);  //$param2 = message_thread_code
            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
            redirect(base_url() . 'index.php?admin/message/message_read/' . $param2, 'refresh');
        }

        if ($param1 == 'message_read') {
            $page_data['current_message_thread_code'] = $param2;  // $param2 = message_thread_code
            $this->crud_model->mark_thread_messages_read($param2);
        }

        $page_data['message_inner_page_name']   = $param1;
        $page_data['page_name']                 = 'message';
        $page_data['page_title']                = get_phrase('private_messaging');
        $this->load->view('backend/index', $page_data);
    }
    
    /*****SITE/SYSTEM SETTINGS*********/
    function system_settings($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        
        if ($param1 == 'do_update') {
			 
            $data['description'] = $this->input->post('system_name');
            $this->db->where('type' , 'system_name');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('system_title');
            $this->db->where('type' , 'system_title');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('address');
            $this->db->where('type' , 'address');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('phone');
            $this->db->where('type' , 'phone');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('paypal_email');
            $this->db->where('type' , 'paypal_email');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('currency');
            $this->db->where('type' , 'currency');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('system_email');
            $this->db->where('type' , 'system_email');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('system_name');
            $this->db->where('type' , 'system_name');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('language');
            $this->db->where('type' , 'language');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('text_align');
            $this->db->where('type' , 'text_align');
            $this->db->update('settings' , $data);
			
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated')); 
            redirect(base_url() . 'index.php?admin/system_settings/', 'refresh');
        }
        if ($param1 == 'upload_logo') {
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'index.php?admin/system_settings/', 'refresh');
        }
        if ($param1 == 'change_skin') {
            $data['description'] = $param2;
            $this->db->where('type' , 'skin_colour');
            $this->db->update('settings' , $data);
            $this->session->set_flashdata('flash_message' , get_phrase('theme_selected')); 
            redirect(base_url() . 'index.php?admin/system_settings/', 'refresh'); 
        }
        $page_data['page_name']  = 'system_settings';
        $page_data['page_title'] = get_phrase('system_settings');
        $page_data['settings']   = $this->db->get('settings')->result_array();
        $this->load->view('backend/index', $page_data);
    }

    /*****SMS SETTINGS*********/
    function sms_settings($param1 = '' , $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($param1 == 'clickatell') {

            $data['description'] = $this->input->post('clickatell_user');
            $this->db->where('type' , 'clickatell_user');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('clickatell_password');
            $this->db->where('type' , 'clickatell_password');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('clickatell_api_id');
            $this->db->where('type' , 'clickatell_api_id');
            $this->db->update('settings' , $data);

            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/sms_settings/', 'refresh');
        }

        if ($param1 == 'twilio') {

            $data['description'] = $this->input->post('twilio_account_sid');
            $this->db->where('type' , 'twilio_account_sid');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('twilio_auth_token');
            $this->db->where('type' , 'twilio_auth_token');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('twilio_sender_phone_number');
            $this->db->where('type' , 'twilio_sender_phone_number');
            $this->db->update('settings' , $data);

            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/sms_settings/', 'refresh');
        }

        if ($param1 == 'active_service') {

            $data['description'] = $this->input->post('active_sms_service');
            $this->db->where('type' , 'active_sms_service');
            $this->db->update('settings' , $data);

            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/sms_settings/', 'refresh');
        }

        $page_data['page_name']  = 'sms_settings';
        $page_data['page_title'] = get_phrase('sms_settings');
        $page_data['settings']   = $this->db->get('settings')->result_array();
        $this->load->view('backend/index', $page_data);
    }
    
    /*****LANGUAGE SETTINGS*********/
    function manage_language($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
		
		if ($param1 == 'edit_phrase') {
			$page_data['edit_profile'] 	= $param2;	
		}
		if ($param1 == 'update_phrase') {
			$language	=	$param2;
			$total_phrase	=	$this->input->post('total_phrase');
			for($i = 1 ; $i < $total_phrase ; $i++)
			{
				//$data[$language]	=	$this->input->post('phrase').$i;
				$this->db->where('phrase_id' , $i);
				$this->db->update('language' , array($language => $this->input->post('phrase'.$i)));
			}
			redirect(base_url() . 'index.php?admin/manage_language/edit_phrase/'.$language, 'refresh');
		}
		if ($param1 == 'do_update') {
			$language        = $this->input->post('language');
			$data[$language] = $this->input->post('phrase');
			$this->db->where('phrase_id', $param2);
			$this->db->update('language', $data);
			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
			redirect(base_url() . 'index.php?admin/manage_language/', 'refresh');
		}
		if ($param1 == 'add_phrase') {
			$data['phrase'] = $this->input->post('phrase');
			$this->db->insert('language', $data);
			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
			redirect(base_url() . 'index.php?admin/manage_language/', 'refresh');
		}
		if ($param1 == 'add_language') {
			$language = $this->input->post('language');
			$this->load->dbforge();
			$fields = array(
				$language => array(
					'type' => 'LONGTEXT'
				)
			);
			$this->dbforge->add_column('language', $fields);
			
			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
			redirect(base_url() . 'index.php?admin/manage_language/', 'refresh');
		}
		if ($param1 == 'delete_language') {
			$language = $param2;
			$this->load->dbforge();
			$this->dbforge->drop_column('language', $language);
			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
			
			redirect(base_url() . 'index.php?admin/manage_language/', 'refresh');
		}
		$page_data['page_name']        = 'manage_language';
		$page_data['page_title']       = get_phrase('manage_language');
		//$page_data['language_phrases'] = $this->db->get('language')->result_array();
		$this->load->view('backend/index', $page_data);	
    }
    
    /*****BACKUP / RESTORE / DELETE DATA PAGE**********/
    function backup_restore($operation = '', $type = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        
        if ($operation == 'create') {
            $this->crud_model->create_backup($type);
        }
        if ($operation == 'restore') {
            $this->crud_model->restore_backup();
            $this->session->set_flashdata('backup_message', 'Backup Restored');
            redirect(base_url() . 'index.php?admin/backup_restore/', 'refresh');
        }
        if ($operation == 'delete') {
            $this->crud_model->truncate($type);
            $this->session->set_flashdata('backup_message', 'Data removed');
            redirect(base_url() . 'index.php?admin/backup_restore/', 'refresh');
        }
        
        $page_data['page_info']  = 'Create backup / restore from backup';
        $page_data['page_name']  = 'backup_restore';
        $page_data['page_title'] = get_phrase('manage_backup_restore');
        $this->load->view('backend/index', $page_data);
    }
    
    /******MANAGE OWN PROFILE AND CHANGE PASSWORD***/
    function manage_profile($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($param1 == 'update_profile_info') {
            $data['name']  = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            
            $this->db->where('admin_id', $this->session->userdata('admin_id'));
            $this->db->update('admin', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/admin_image/' . $this->session->userdata('admin_id') . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
            redirect(base_url() . 'index.php?admin/manage_profile/', 'refresh');
        }
        if ($param1 == 'change_password') {
            $data['password']             = $this->input->post('password');
            $data['new_password']         = $this->input->post('new_password');
            $data['confirm_new_password'] = $this->input->post('confirm_new_password');
            
            $current_password = $this->db->get_where('admin', array(
                'admin_id' => $this->session->userdata('admin_id')
            ))->row()->password;
            if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
                $this->db->where('admin_id', $this->session->userdata('admin_id'));
                $this->db->update('admin', array(
                    'password' => $data['new_password']
                ));
                $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
            } else {
                $this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));
            }
            redirect(base_url() . 'index.php?admin/manage_profile/', 'refresh');
        }
        $page_data['page_name']  = 'manage_profile';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data']  = $this->db->get_where('admin', array(
            'admin_id' => $this->session->userdata('admin_id')
        ))->result_array();
        $this->load->view('backend/index', $page_data);
    }
    
    function student_id_card($param1) {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $BatchName = $this->input->post('BatchName');
        $this->db->where('NameofBatch =', $BatchName);
        $page_data['q'] = $this->db->get('student_pundro')->result_array();   
        $page_data['page_name'] = 'student_id_card';
        $page_data['page_title'] = get_phrase('student_id_card');
        $this->load->view('backend/index', $page_data);
    }
    function student_id_card_preview($param1 = '') {
       
        if($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if($param1 == 'preview'){ 
            $StudentId = $this->input->post('RegistrationNo');
            $this->db->where('RegistratioNo = ', $StudentId);
            $page_data['q'] = $this->db->get('student_pundro')->result_array();
            $page_data['page_name'] = 'student_id_card_preview';
            $page_data['page_title'] = get_phrase('student_id_card');
            $this->load->view('backend/index', $page_data);
        }   
}
    function exam_admit_card($param1){
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
       
        
        if($this->input->post('TermName') == 1){    
            $BatchName = $this->input->post('BatchName');
            $semesterName = $this->input->post('SemesterName');
            $termName = $this->input->post('TermName');   
            
            $this->db->where('NameofBatch', $BatchName);
            $page_data['studentPundraDB'] = $this->db->get('student_pundro')->result_array();           

            $this->db->where('BatchName', $BatchName);
            $this->db->where('semester_name', $semesterName);
            $page_data['std_fee_collectionDB'] = $this->db->get('std_fee_collection')->result_array();
               
            $page_data['page_name'] = 'exam_admit_card';
            $this->load->view('backend/index', $page_data);
        }
        else{             
        $page_data['page_name'] = 'exam_admit_card';
        $page_data['page_title'] = get_phrase('exam_admit_card');
        $this->load->view('backend/index', $page_data);
        }
    }
    function exam_admit_card_preview($param1 = ''){
        if($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if($param1 == 'preview'){ 
            $StudentId = $this->input->post('RegistrationNo');
            $this->db->where('RegistratioNo = ', $StudentId);
            $page_data['q'] = $this->db->get('student_pundro')->result_array();
            $page_data['page_name'] = 'exam_admit_card_preview';
            $page_data['page_title'] = get_phrase('exam_admit_card');
            $this->load->view('backend/index', $page_data);
        }
    }
}
