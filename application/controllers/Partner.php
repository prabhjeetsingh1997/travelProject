<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Sachin Gupta
 * @version : 1.1
 * @since : 12 March 2019
 */
class Partner extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('admin_model');
        $this->load->model('hotel_model');
        $this->load->model('partner_model');
        $this->isPartnerLoggedIn();   
        //$this->load->library('pdftest');
        
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Travwhizz :Partner Dashboard';
        $this->loadPartnerViews("partner/dashboard", $this->global, NULL , NULL);
    }
    
    public function addVendor()
    {
        // if($this->isPartnerAdmin() == TRUE)
        // {
        //     $this->loadThis();
        // }else{
            if($this->global['vendor_management'] == 1){
            
              $data['countries'] = $this->admin_model->getAllCountries();
            
              $this->global['pageTitle'] = 'Travwhizz : Add Vendor';
            
              $this->loadPartnerViews("partner/addVendor", $this->global, $data, NULL);    
            }else{
                
              $this->loadThis();
            }

        //}
    }
    
    public function checkinputVendorExist()
    {
        $vendorName = $this->input->post('vendorName');
        $vendorExist = $this->partner_model->checkVendorExistwithName($vendorName);
        //echo json_encode($vendorExist);
        $cityarr = array();
        foreach($vendorExist as $vendorData){
            $cityarr= $this->partner_model->getcityByCityId($vendorData->city_id);
        }
        $data = array();
        $data['vendorDetail'] = $vendorExist;
        $data['countries'] = $this->admin_model->getAllCountries();
        //$data['cities'] = $this->admin_model->getAllCity();
        $data['cities'] = $cityarr;
        $data['states'] = $this->admin_model->getAllState();
            
        //echo json_encode($hotelExist);
        echo json_encode($data);
    }
    
    public function addNewVendor()
    {
        // if($this->isPartnerAdmin() == TRUE)
        // {
        //     $this->loadThis();
        // }else{

            // $checkUserExists = $this->partner_model->checkVendorExists($this->input->post('contact_no'));
            // if(count($checkUserExists) > 0) {
            //     $this->session->set_flashdata('error', 'User is Already Exist. Please try diffrent User');
            //     redirect(PARTNER.'/addVendor');
            // }

            $companyInfo = array(
                'partner_id'            => $this->global['partner_id'],
                'company_name'          => $this->input->post('company_name'),
                'address_line_1'        => $this->input->post('address_line_1'),
                'address_line_2'        => $this->input->post('address_line_2'),
                'country_id'            => $this->input->post('country_id'),
                'state_id'              => $this->input->post('state_id'),
                'city_id'               => $this->input->post('city_id'),
                'zip'                   => $this->input->post('zip'),
                // 'contact_no'            => $this->input->post('contact_no'),
                // 'alternative_no'        => $this->input->post('alternative_no'),
                'created_at'            => date('Y-m-d H:i:s'),
            );

            $user_id = $this->partner_model->addVendorDetails($companyInfo);

            if($user_id > 0) {
                
                $concernInfo = array(
                    'vendor_id'             => $user_id,
                    'title'                 => $this->input->post('employee-title[0]'),
                    'concern_person_name'   => $this->input->post('concern_person_name'),
                    'concern_contact_no'    => $this->input->post('concern_contact_no'),
                    'secondry_no'           => $this->input->post('secondry_no'),
                    'email'                 => $this->input->post('email'),
                    'alternative_email'     => $this->input->post('alternative_email'),
                );

                $concern_id = $this->partner_model->addConcernPersonDetails($concernInfo);

                $banking_detail = array(
                    'vendor_id'             => $user_id,
                    'pan_no'                => $this->input->post('pan_no'),
                    'account_no'            => $this->input->post('account_no'),
                    'account_holder_name'   => $this->input->post('account_holder_name'),
                    'bank_name'             => $this->input->post('bank_name'),
                    'branch'                => $this->input->post('branch'),
                    'ifsc'                  => $this->input->post('ifsc'),
                );

                $banking_detail = $this->partner_model->addVendorBankingDetails($banking_detail);

                $data['countries'] = $this->admin_model->getAllCountries();
            
                $this->session->set_flashdata('success', 'Vendor Created successfully');
                
                redirect(PARTNER.'/viewVendor');

            }else{
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                
                redirect(PARTNER.'/addVendor');
            }
        //}
    }
    
    public function viewVendor()
    {
        $data['vendors'] = $this->partner_model->getAllVendors();

        $this->global['pageTitle'] = 'Travwhizz : All Vendor List';
            
        $this->loadPartnerViews("partner/viewVendor", $this->global, $data, NULL);
    }
    
    public function editVendor($vendorId)
    {
        // if($this->isPartnerAdmin() == TRUE)
        // {
        //     $this->loadThis();
        // }else{

            if($vendorId == '') {
               redirect(PARTNER.'/viewVendor');
            }

            $data['vendor'] = $this->partner_model->getAllVendorsById($vendorId);

            $data['countries'] = $this->admin_model->getAllCountries();

            $data['cities'] = $this->admin_model->getAllCity();

            $data['states'] = $this->admin_model->getAllState();

            if (!empty($data['vendor'])) {
              
                $this->global['pageTitle'] = 'Travwhizz : Edit Vendor';

                $this->loadPartnerViews("partner/editVendor", $this->global, $data, NULL);
                
            }else{
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                
                redirect(PARTNER.'/viewVendor');
            }  
       // }
    }
    
    public function updateVendor()
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $vendorId = $this->input->post('vendorId');

            $companyInfo = array(
                //'partner_id'            => $this->global['partner_id'],
                'company_name'          => $this->input->post('company_name'),
                'address_line_1'        => $this->input->post('address_line_1'),
                'address_line_2'        => $this->input->post('address_line_2'),
                'country_id'            => $this->input->post('country_id'),
                'state_id'              => $this->input->post('state_id'),
                'city_id'               => $this->input->post('city_id'),
                'zip'                   => $this->input->post('zip'),
                // 'contact_no'            => $this->input->post('contact_no'),
                // 'alternative_no'        => $this->input->post('alternative_no'),
                'created_at'            => date('Y-m-d H:i:s'),
                'updatd_at'             => date('Y-m-d H:i:s'),
                
            );

            $user_id = $this->partner_model->updateVendorDetails($companyInfo,$vendorId);

            if($user_id > 0) {
                
                $concernInfo = array(
                    //'vendor_id'             => $user_id,
                    'title'                 => $this->input->post('employee-title[0]'),
                    'concern_person_name'   => $this->input->post('concern_person_name'),
                    'concern_contact_no'    => $this->input->post('concern_contact_no'),
                    'secondry_no'           => $this->input->post('secondry_no'),
                    'email'                 => $this->input->post('email'),
                    'alternative_email'     => $this->input->post('alternative_email'),
                );

                $concern_id = $this->partner_model->updateConcernPersonDetails($concernInfo,$vendorId);

                 $banking_detail = array(
                    //'vendor_id'             => $user_id,
                    'pan_no'                => $this->input->post('pan_no'),
                    'account_no'            => $this->input->post('account_no'),
                    'account_holder_name'   => $this->input->post('account_holder_name'),
                    'bank_name'             => $this->input->post('bank_name'),
                    'branch'                => $this->input->post('branch'),
                    'ifsc'                  => $this->input->post('ifsc'),
                );


                $banking_detail = $this->partner_model->updateVendorBankingDetails($banking_detail,$vendorId);

                $data['countries'] = $this->admin_model->getAllCountries();
            
                $this->session->set_flashdata('success', 'Vendor updated successfully');
                
                redirect(PARTNER.'/viewVendor');

            }else{
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                
                redirect(PARTNER.'/viewVendor');
            }
        }
    }
    
    public function deleteVendor($vendorId)
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            if ($vendorId == '') {
                redirect(PARTNER.'/viewVendor');
            }

            $data  = $this->partner_model->deleteVendorById($vendorId);

            if ($data > 0) {
                $this->session->set_flashdata('success', 'Vendor Delete successfully');
                
                redirect(PARTNER.'/viewVendor');
            }else{
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                
                redirect(PARTNER.'/viewVendor');
            }
        }
    }

    public function addEmployee()
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $data['countries'] = $this->admin_model->getAllCountries();
            
            $this->global['pageTitle'] = 'Travwhizz : Add Employee';
            
            $this->loadPartnerViews("partner/addEmployee", $this->global, $data, NULL);
        }
    }
    

    public function addNewEmployee()
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $checkUserExists = $this->partner_model->checkPartnerEmployeeExists($this->input->post('primary_email'));
            if(count($checkUserExists) > 0) {
                $this->session->set_flashdata('error', 'User is Already Exist. Please try diffrent User');
                redirect(PARTNER.'/addEmployee');
            }

            $userInfo = array(
                'partner_id'            => $this->global['partner_id'],
                'email'                 => $this->input->post('primary_email'),
                'secondary_email'       => $this->input->post('secondary_email'),
                'password'              => getHashedPassword($this->input->post('password')),
                'emp_pass'              => base64_encode($this->input->post('password')),
                'title'                 => $this->input->post('employee-title[0]'),
                'name'                  => $this->input->post('name'),
                'mobile'                => $this->input->post('mobile_no'),
                'alternative_number'    => $this->input->post('alternative_number'),
                'father_name'           => $this->input->post('father_name'),
                'mother_name'           => $this->input->post('mother_name'),
                'emergency_contact'     => $this->input->post('emergency_no'),
                'dob'                   => $this->input->post('dob'),
                'emp_type'              => $this->input->post('emp_type'),
                'roleId'                => 2,
                //'is_tl'                 => $this->input->post('is_tl'),
                'createdBy'             => $this->global['partner_id'],
                'createdDtm'            => date('Y-m-d H:i:s')
            );

            $user_id = $this->partner_model->addUserDetails($userInfo);

            if ($user_id > 0) {
                
                $primary_address = array(
                    'emp_id'                => $user_id,
                    'address_line_1'        => $this->input->post('address_line_1'),
                    'address_line_2'        => $this->input->post('address_line_2'),
                    'zip'                   => $this->input->post('zip'),
                    'country_id'            => $this->input->post('country_id'),
                    'state_id'              => $this->input->post('state_id'),
                    'city_id'               => $this->input->post('city_id'),
                );

                $address_id = $this->partner_model->addUserprimaryAddress($primary_address);

                $official_address  = array(
                    'emp_id'            => $user_id,
                    'designation'       => $this->input->post('designation'),
                    //'is_tl'             => $this->input->post('is_tl'),
                    'department'        => $this->input->post('department'),
                    'joining_date'      => $this->input->post('joining_date'),
                    'termination_date'  => $this->input->post('termination_date'),
                );

                $official_detail = $this->partner_model->addUserOfficialAddress($official_address);

                $banking_detail = array(
                    'emp_id'                => $user_id,
                    'pan_no'                => $this->input->post('pan_no'),
                    'account_no'            => $this->input->post('account_no'),
                    'account_holder_name'   => $this->input->post('holder_name'),
                    'bank_name'             => $this->input->post('bank_name'),
                    'branch'                => $this->input->post('branch'),
                    'ifsc'                  => $this->input->post('ifsc'),
                );

                $banking_detail = $this->partner_model->addUserBankingDetails($banking_detail);

                $data['countries'] = $this->admin_model->getAllCountries();
            
                $this->session->set_flashdata('success', 'Employee Created successfully');
                
                redirect(PARTNER.'/viewEmployee');

            }else{
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                
                redirect(PARTNER.'/viewEmployee');
            }
        }
    }

    public function viewEmployee()
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $data['employees'] = $this->partner_model->getAllEmployeeList();

            $this->global['pageTitle'] = 'Travwhizz : All Employee List';
            
            $this->loadPartnerViews("partner/viewEmployee", $this->global, $data, NULL);
            
            //  $this->load->view('partner/includes/header', $this->global, $data, NULL);
        }
    }

    public function editEmployee($employee_id)
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            if ($employee_id == '') {
               redirect(PARTNER.'/viewEmployee');
            }

            $data['employee'] = $this->partner_model->getAllEmployeeById($employee_id);

            $data['countries'] = $this->admin_model->getAllCountries();

            $data['cities'] = $this->admin_model->getAllCity();

            $data['states'] = $this->admin_model->getAllState();

            if (!empty($data['employee'])) {
              
                $this->global['pageTitle'] = 'Travwhizz : Edit Employee';

                $this->loadPartnerViews("partner/editEmployee", $this->global, $data, NULL);
                
                // $this->load->view('partner/includes/header', $this->global, $data, NULL);
                
            }else{
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                
                redirect(PARTNER.'/viewEmployee');
            }  
        }
    }

    public function updateEmployee()
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $employee_id = $this->input->post('employee_id');

            $userInfo = array(
                'email'                 => $this->input->post('primary_email'),
                'secondary_email'       => $this->input->post('secondary_email'),
                'title'                 => $this->input->post('employee-title[0]'),
                'name'                  => $this->input->post('name'),
                'password'              => getHashedPassword($this->input->post('password')),
                'emp_pass'              => base64_encode($this->input->post('password')),
                'mobile'                => $this->input->post('mobile_no'),
                'alternative_number'    => $this->input->post('alternative_number'),
                'father_name'           => $this->input->post('father_name'),
                'mother_name'           => $this->input->post('mother_name'),
                'emergency_contact'     => $this->input->post('emergency_no'),
                'dob'                   => $this->input->post('dob'),
                'emp_type'              => $this->input->post('emp_type'),
                //'is_tl'                 => $this->input->post('is_tl'),
                'updatedDtm'            => date('Y-m-d H:i:s'),
                'updatedBy'             => $this->global['partner_id'], 
            );

            $user_id = $this->partner_model->updateUserDetails($userInfo,$employee_id);

            if ($user_id > 0) {
                
                $primary_address = array(
                    'address_line_1'       => $this->input->post('address_line_1'),
                    'address_line_2'       => $this->input->post('address_line_2'),
                    'zip'                  => $this->input->post('zip'),
                    'country_id'           => $this->input->post('country_id'),
                    'state_id'             => $this->input->post('state_id'),
                    'city_id'              => $this->input->post('city_id'),
                );

                $address_id = $this->partner_model->updateUserprimaryAddress($primary_address,$employee_id);

                $official_address  = array(
                    'designation'       => $this->input->post('designation'),
                    //'is_tl'             => $this->input->post('is_tl'),
                    'department'        => $this->input->post('department'),
                    'joining_date'      => $this->input->post('joining_date'),
                    'termination_date'  => $this->input->post('termination_date'),
                );

                $official_detail = $this->partner_model->updateUserOfficialAddress($official_address,$employee_id);

                $banking_detail = array(
                    'pan_no'                => $this->input->post('pan_no'),
                    'account_no'            => $this->input->post('account_no'),
                    'account_holder_name'   => $this->input->post('holder_name'),
                    'bank_name'             => $this->input->post('bank_name'),
                    'branch'                => $this->input->post('branch'),
                    'ifsc'                  => $this->input->post('ifsc'),
                );

                $banking_detail = $this->partner_model->updateUserBankingDetails($banking_detail,$employee_id);

                $data['countries'] = $this->admin_model->getAllCountries();
            
                $this->session->set_flashdata('success', 'Employee updated successfully');
                
                redirect(PARTNER.'/viewEmployee');

            }else{
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                
                redirect(PARTNER.'/viewEmployee');
            }
        }
    }

    public function deleteEmployee($employee_id)
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            if ($employee_id == '') {
                redirect(PARTNER.'/viewEmployee');
            }

            $data  = $this->partner_model->deleteEmployeeById($employee_id);

            if ($data > 0) {
                $this->session->set_flashdata('success', 'Employee Delete successfully');
                
                redirect(PARTNER.'/viewEmployee');
            }else{
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                
                redirect(PARTNER.'/viewEmployee');
            }
        }
    }
 
    public function addQuery()
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }
        
        else{
            if($this->global['query_management'] == 1){
            $this->global['pageTitle'] = 'Travwhizz : Add Query';
            $this->loadPartnerViews("partner/addQuery", $this->global, NULL, NULL);
            }else{
                $this->loadThis();
            }
            
        }
    }
    
    //Tour Card Start
    
    public function encodecity(){

        //$data['city'] = $this->partner_model->getCityandState();
        echo $cities = json_encode($this->partner_model->getCityandState());

    }

    public function NewTourCard()
    {
        if($this->global['tourcard_management'] == 1){
            
           //$empDetails = $this->partner_model->getEmployeeId();
           //$emp_id = $empDetails->id;
           //$data['inHandQuery'] = $this->partner_model->getEmployeeConfirmedQuery($emp_id);
           $query_id = $this->uri->segment(3);
           if($query_id !== ''){
               $data['query'] = $this->partner_model->getPartnerQueryById($query_id);
           }else{
               $data['query'] = '';
           }
           $data['empDetails'] = $this->partner_model->getEmployeeDetails();
           
           //$data['query'] = $this->partner_model->getPartnerQueryByIdandclient($query_id);
           $data['countries'] = $this->admin_model->getAllCountries();
           //$data['cities'] = $this->admin_model->getAllCity();
           $data['cities'] = $this->partner_model->getCityandState();
           $partner_id = $this->global['partner_id'];
           $data['partners_hotel'] = $this->partner_model->getAllPartnerHotel($partner_id);
           $data['vendors'] = $this->partner_model->getAllVendors();
           $data['clientDetails'] = $this->partner_model->getAllClient();
    
           $this->global['pageTitle'] = 'Travwhizz : Make Tour Card';
           $this->loadPartnerViews("partner/Newtourcard", $this->global, $data, NULL);    
        }
        else{
            $this->loadThis();
        }
        
    }
    public function makeTourCard()
    {
        extract($this->input->post());
        
        $data = array(
               'partner_id'     => $this->global['partner_id'],
               'query_no'       => $query_no,
               'contact_no'     => $contact_no,
               'employee_id'    => $employee_id,
               //'tc_no'          => $tc_no,
               'bkg_date'       => $bkg_date,
               'arrival_date'   => $arrival_date,
               'departure_date' => $departure_date,
               'bkg_by'         => $bkg_by,
               'queryType'      => $queryType,
               'name_prefix'    => $this->input->post('name_prefix[0]'),
               'pax_name'       => $pax_name,
               'country'        => $country,
               'party'          => $party,
               'party_name'     => $party_name,
               'file_no'        => $file_no,
               'totaldays'      => $totaldays,
               'adult'          => $adult,
               'children'       => $children,
               'child_age'      => $child_age,
               'nights'         => $nights,
               'profit'         => $profit,        
               'packagecost'    => $packagecost,
               'totalcost'      => $totalcost,
               'totalpakcost'   => $totalpakcost,
               //'gst'            => $gst,
               //'margin'         => $margin,
               //'cgst'           => $cgst,
               //'igstat'         => $igstat,
               //'cgstat'         => $cgstat,
               //'sgstat'         => $sgstat,
               //'gst_percent'    => $gst_percent,
               //'cgst_percent'   => $cgst_percent,
               //'sgst_percent'   => $sgst_percent,
               //'gst_amount'     => $gst_amount,
               'gstincldat'     => $this->input->post('gstINCL[0]'),
               'gstexcldat'     => $this->input->post('gstEXCL[0]'),
               'gstinclorexcl'  => $this->input->post('gstinclorexcl[0]'),
               'cgsttot'        => $cgsttot, 
               'sgsttot'        => $sgsttot, 
               'igsttot'        => $igsttot,
               'partner_url'    => $partner_url,
               'invoice'        => $invoice,
               'invoice_note'   => $invoice_note,
            );
            
           $user_id = $this->partner_model->makeTourCard($data);
           
           if($user_id > 0){
               //$count_row = count($this->input->post('count_row'));
               $start_date = $this->input->post('start_date');
               $from_city = $this->input->post('from_city');
               foreach ($start_date as $i => $value ) 
            {
               $datamore = array(
               'partner_id'     => $this->global['partner_id'],
               'Tcid'           => $user_id,
               'employee_id'    => $employee_id,
               //'tc_no'          => $query_no,
               'queryType'      => $queryType,
               'start_date'     => $value,
               'from_city'      => isset($from_city[$i]) ? $from_city[$i] : '',
               'to_city'        => isset($to_city[$i]) ? $to_city[$i] : '',
               'travel_by'      => isset($travel_by[$i]) ? $travel_by[$i] : '',
               'write_box'      => isset($write_box[$i]) ? $write_box[$i] : '',
               'start_time'     => isset($start_time[$i]) ? $start_time[$i] : '',
               'end_time'       => isset($end_time[$i]) ? $end_time[$i] : '',
               'city'           => isset($city[$i]) ? $city[$i] : '',
               'hotel_filter'   => isset($hotel_filter[$i]) ? $hotel_filter[$i] : '',
               'check_in'       => isset($check_in[$i]) ? $check_in[$i] : '',
               'check_out'      => isset($check_out[$i]) ? $check_out[$i] : '',
               'vendor'         => $vendor,
               'vendor_name'    => isset($vendor_name[$i]) ? $vendor_name[$i] : '',
               'cost'           => isset($cost[$i]) ? $cost[$i] : '',
               );
             
                $result=$this->partner_model->makeTourCarddays($datamore);
        
            }

                $datastatus = array(
                    
                    'tourcard' => 1,
                );

                $resulttwo = $this->partner_model->updateQuerytour($datastatus, $query_no);
            
                
                if($this->global['role'] == 'Employee'){
                  $this->session->set_flashdata('success', 'Tour Card Created Successfully');
                  redirect(PARTNER.'/confirmedQuery');
                }else{
                  $this->session->set_flashdata('success', 'Tour Card Created Successfully');
                  redirect(PARTNER.'/viewAllTourCard');
                }
           }else{
               if($this->global['role'] == 'Employee'){
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                redirect(PARTNER.'/confirmedQuery');   
               }else{
                  $this->session->set_flashdata('success', 'Tour Card Created Successfully');
                  redirect(PARTNER.'/viewAllTourCard');
               }
                
            }
        
    }


    public function viewOtherTourCard()
    {
        $empDetails = $this->partner_model->getEmployeeId();
        $emp_id = $empDetails->id;
        $this->session->set_userdata('previous_url', current_url());
        $data['tourcard'] = $this->partner_model->getEmployeeTourCard($emp_id);
        $data['clntDtls'] = $this->partner_model->getAllClient();
        $this->global['pageTitle'] = 'Travwhizz : Other Tour Card';
        $this->loadPartnerViews("partner/viewOtherTourCard", $this->global, $data, NULL);
    }
    
    public function viewAllTourCard()
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else{
        $data['tourcard'] = $this->partner_model->getAllTourCard();
        $data['clntDtls'] = $this->partner_model->getAllClient();

        $this->global['pageTitle'] = 'Travwhizz : All Tour Card';
            
        $this->loadPartnerViews("partner/viewalltourcards", $this->global, $data, NULL);

        }

    }
    
    public function editTourCard($tourcard_id)
    {
        if($tourcard_id == '') {
            $this->session->set_flashdata('error', 'There is Something problem! please try again later');
            redirect(PARTNER.'/viewOtherTourCard'); 
        }
        
        $data['clientDetails'] = $this->partner_model->getAllClient();
        //$data['tourdetails'] = $this->partner_model->getEmployeeTourCardById($tourcard_id);
        $data['tourdetails'] = $this->partner_model->getPartnerClientByTourCardid($tourcard_id);
        $data['tourdaysdetails'] = $this->partner_model->getEmployeeTourCarddaysById($tourcard_id);
        //$data['tourdaysdetails'] = $this->partner_model->getEmpTourCarddaysById($tourcard_id);
        $partner_id = $this->global['partner_id'];
        $data['countries'] = $this->admin_model->getAllCountries();
        $data['cities'] = $this->partner_model->getCityandState();
        //$data['cities'] = $this->admin_model->getAllCity();
        //$data['partners_hotel'] = $this->partner_model->getAllPartnerHotel();
        $data['partnerhotel'] = $this->partner_model->getPartnerHotels();
        $data['vendors'] = $this->partner_model->getAllVendors();
        $this->global['pageTitle'] = 'Travwhizz : Edit Tour Card';

        $this->loadPartnerViews("partner/editTourCard", $this->global, $data, NULL);
    }
    
      
    public function updateTourCard()
    {   
        extract($this->input->post());
        $tourcard_id = $this->input->post('tourcard_id');
        
        $data = array(
              //'query_no'       => $this->input->post('query_no'),
              //'employee_id'    => $this->input->post('employee_id'),
              //'tc_no'          => $this->input->post('tc_no'),
              'bkg_date'       => $this->input->post('bkg_date'),
              'arrival_date'   => $this->input->post('arrival_date'),
              'departure_date' => $this->input->post('departure_date'),
              'bkg_by'         => $this->input->post('bkg_by'),
              'queryType'      => $this->input->post('queryType'),
              'name_prefix'    => $this->input->post('name_prefix[0]'),
              'pax_name'       => $this->input->post('pax_name'),
              'country'        => $this->input->post('country'),
              'party'          => $this->input->post('party'),
              'party_name'     => $this->input->post('party_name'),
              'file_no'        => $this->input->post('file_no'),
              'totaldays'      => $this->input->post('totaldays'),
              'adult'          => $this->input->post('adult'),
              'children'       => $this->input->post('children'),
              'child_age'      => $this->input->post('child_age'),
              'nights'         => $this->input->post('nights'),
              'profit'         => $this->input->post('profit'),        
              'packagecost'    => $this->input->post('packagecost'),
              'totalcost'      => $this->input->post('totalcost'),
              'totalpakcost'   => $this->input->post('totalpakcost'),
            //   'gst'            => $this->input->post('gst'),
            //   'margin'         => $this->input->post('margin'),
            //   'cgst'           => $this->input->post('cgst'),
            //   'igstat'         => $this->input->post('igstat'),
            //   'cgstat'         => $this->input->post('cgstat'),
            //   'sgstat'         => $this->input->post('sgstat'),
            //   'gst_percent'    => $this->input->post('gst_percent'),
            //   'cgst_percent'   => $this->input->post('cgst_percent'),
            //   'sgst_percent'   => $this->input->post('sgst_percent'),
            //   'gst_amount'     => $this->input->post('gst_amount'),
              'gstincldat'     => $this->input->post('gstINCL[0]'),
              'gstexcldat'     => $this->input->post('gstEXCL[0]'),
              'gstinclorexcl'  => $this->input->post('gstinclorexcl[0]'),
              'cgsttot'        => $cgsttot, 
              'sgsttot'        => $sgsttot, 
              'igsttot'        => $igsttot,
              'partner_url'    => $this->input->post('partner_url'),
              'invoice'        => $this->input->post('invoice'),
              'invoice_note'   => $this->input->post('invoice_note'),
            );
          $tcData = $this->partner_model->updateTourCard($data, $tourcard_id);
           
          //if($data > 0){
              $start_date = $this->input->post('start_date');
              $from_city = $this->input->post('from_city');
              $tourdaysid = $this->input->post('tourdaysid[]');
              $result = '';
              
            for($i=0; $i<count($tourdaysid); $i++)  
            {
              $TCdatarows = array(
              //'Tcid'           => $user_id,
              //'employee_id'    => $employee_id,
              //'tc_no'          => $tc_no,
              //'queryType'      => $queryType,           
              'start_date'     => isset($start_date[$i]) ? $start_date[$i] : '',
              'from_city'      => isset($from_city[$i]) ? $from_city[$i] : '',
              'to_city'        => isset($to_city[$i]) ? $to_city[$i] : '',
              'travel_by'      => isset($travel_by[$i]) ? $travel_by[$i] : '',
              'write_box'      => isset($write_box[$i]) ? $write_box[$i] : '',
              'start_time'     => isset($start_time[$i]) ? $start_time[$i] : '',
              'end_time'       => isset($end_time[$i]) ? $end_time[$i] : '',
              'city'           => isset($city[$i]) ? $city[$i] : '',
              'hotel_filter'   => isset($hotel_filter[$i]) ? $hotel_filter[$i] : '',
              'check_in'       => isset($check_in[$i]) ? $check_in[$i] : '',
              'check_out'      => isset($check_out[$i]) ? $check_out[$i] : '',
              'vendor'         => $vendor,
              'vendor_name'    => isset($vendor_name[$i]) ? $vendor_name[$i] : '',
              'cost'           => isset($cost[$i]) ? $cost[$i] : '',
              );
              
              $result = $this->partner_model->updateTourCarddays($TCdatarows, $tourcard_id, $tourdaysid[$i]);
            
            }
            
          //}
    
            $start_date_more = $this->input->post('start_date_more');
            $resultData = '';
            foreach($start_date_more as $i => $value ) 
            {
              $addmoreRows = array(
              'partner_id'     => $this->global['partner_id'],
              'Tcid'           => $tourcard_id,
              'employee_id'    => $employee_id,
              //'tc_no'          => $tc_no,
              'queryType'      => $queryType,
              'start_date'     => $value,
              'from_city'      => isset($from_city_more[$i]) ? $from_city_more[$i] : '',
              'to_city'        => isset($to_city_more[$i]) ? $to_city_more[$i] : '',
              'travel_by'      => isset($travel_by_more[$i]) ? $travel_by_more[$i] : '',
              'write_box'      => isset($write_box_more[$i]) ? $write_box_more[$i] : '',
              'start_time'     => isset($start_time_more[$i]) ? $start_time_more[$i] : '',
              'end_time'       => isset($end_time_more[$i]) ? $end_time_more[$i] : '',
              'city'           => isset($city_more[$i]) ? $city_more[$i] : '',
              'hotel_filter'   => isset($hotel_filter_more[$i]) ? $hotel_filter_more[$i] : '',
              'check_in'       => isset($check_in_more[$i]) ? $check_in_more[$i] : '',
              'check_out'      => isset($check_out_more[$i]) ? $check_out_more[$i] : '',
              'vendor'         => $vendor,
              'vendor_name'    => isset($vendor_name_more[$i]) ? $vendor_name_more[$i] : '',
              'cost'           => isset($cost_more[$i]) ? $cost_more[$i] : '',
              );
             
                $resultData = $this->partner_model->makeTourCarddays($addmoreRows);
        
            }
            if($tcData > 0){
                if($this->global['role'] == 'Employee'){
                    $this->session->set_flashdata('success', 'Tour Card Updated Successfully');            
                    redirect(PARTNER.'/viewOtherTourCard'); 
                }else{
                    $this->session->set_flashdata('success', 'Tour Card Updated Successfully');
                    redirect(PARTNER.'/viewAllTourCard'); 
                }
            }else if($result > 0 || $result !== ''){
                if($this->global['role'] == 'Employee'){
                    $this->session->set_flashdata('success', 'Tour Card Updated Successfully');            
                    redirect(PARTNER.'/viewOtherTourCard'); 
                }else{
                    $this->session->set_flashdata('success', 'Tour Card Updated Successfully');
                    redirect(PARTNER.'/viewAllTourCard'); 
                }
            }else if($resultData > 0 || $resultData !== ''){
                if($this->global['role'] == 'Employee'){
                    $this->session->set_flashdata('success', 'Tour Card Updated Successfully');            
                    redirect(PARTNER.'/viewOtherTourCard'); 
                }else{
                    $this->session->set_flashdata('success', 'Tour Card Updated Successfully');
                    redirect(PARTNER.'/viewAllTourCard'); 
                }
            }
            else{
                if($this->global['role'] == 'Employee'){
                    $this->session->set_flashdata('error', 'There is Something problem! please try again later');            
                    redirect(PARTNER.'/viewOtherTourCard'); 
                }else{
                    $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                    redirect(PARTNER.'/viewAllTourCard'); 
                }
            }
            
    }
    
    public function deleteTourCard($tourcard_id)
    {
            if($tourcard_id == '') {
                redirect(PARTNER.'/viewOtherTourCard');
            }

            //echo $tourcard_id;

            $tcno = $this->uri->segment(4);

            //echo $tcno;
            

            $data = $this->partner_model->deleteTourCard($tourcard_id);

            $datastatus = array(
                'tourcard'  => 0,
            );
              $result = $this->partner_model->updatetourcardstatus($datastatus, $tcno);


            if($data > 0) {
                if($this->global['role'] == 'Employee'){
                    $this->session->set_flashdata('success', 'Delete successfully');            
                    redirect(PARTNER.'/viewOtherTourCard'); 
                }else{
                    $this->session->set_flashdata('success', 'Query Updated successfully');
                    redirect(PARTNER.'/viewAllTourCard'); 
                }
            }else{
                if($this->global['role'] == 'Employee'){
                    $this->session->set_flashdata('success', 'Delete successfully');            
                    redirect(PARTNER.'/viewOtherTourCard'); 
                }else{
                    $this->session->set_flashdata('success', 'Query Updated successfully');
                    redirect(PARTNER.'/viewAllTourCard'); 
                }
            }
        
    }
    
    public function deleteTourCarddays($tourdaysid)
    {
        if($tourdaysid == '') {
                redirect(PARTNER.'/editTourCard');
            }

            $previous_url = $_SERVER['HTTP_REFERER'];
            
            //print_r($previous_url);
                    
            // $data = array(
            //   'profit'         => $this->input->post('profit', 0),        
            //   'packagecost'    => $this->input->post('packagecost', 0),
            //   'totalcost'      => $this->input->post('totalcost', 0),
            //   'totalpakcost'   => $this->input->post('totalpakcost', 0),
            //   'gst'            => $this->input->post('gst', 0),
            //   'margin'         => $this->input->post('margin', 0),
            //   'cgst'           => $this->input->post('cgst', 0),
            //   'gst_percent'    => $this->input->post('gst_percent', 0),
            //   'gst_amount'     => $this->input->post('gst_amount', 0)
            //     );

        $result = $this->partner_model->deleteTourCarddays($tourdaysid);
        
        if($result > 0)
            {
                $this->session->set_flashdata('success', 'Deleted successfully');
                
                //$tourcard_id = base64_encode($tourcard_id);
                redirect($previous_url);     
            }
            else{
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                redirect($previous_url);
            }  
        
        
    }
    
    public function getVendorBytourcardday()
    {
        $day_id = $this->input->post('id');
        if($day_id == '') {
            echo 0;
            exit;
        }else{
            //echo $tourday = json_encode($this->partner_model->getVendorByEmpTourCardday($day_id));
            echo $tourday = json_encode($this->partner_model->getEmpTourCarddaydetails($day_id));
            exit;
        }
    }
    
    public function gettourcarddaybyid()
    {
        $day_id = $this->input->post('id');
        if ($day_id == '') {
            echo 0;
            exit;
        }else{
            echo $tourday = json_encode($this->partner_model->getEmpTourCarddayById($day_id));
            exit;
        }
    }

    public function getpartnerhotelvoucherbyid()
    {
        $voucher_id = $this->input->post('tourdaysid');
        if($voucher_id == '') {
            echo 0;
            exit;
        }else{
            echo $tourday = json_encode($this->partner_model->getpartnerHotelVoucherbyId($voucher_id));
            exit;
        }
    }
    
    public function transportvoucherpdf()
    {
        $this->load->library('Pdftest');
        $voucher_id = $this->uri->segment(3);
        $data['query'] = $this->partner_model->getpartnerTransportVoucherbyId($voucher_id);
        $this->loadPartnerViews("partner/transportvoucherpdf", $data);
        
    }
    
    public function getpartnerTransportVoucherbyId()
    {
        $voucher_id = $this->input->post('tourdaysid');
        if($voucher_id == '') {
            echo 0;
            exit;
        }else{
            echo $tourday = json_encode($this->partner_model->getpartnerTransportVoucherbyId($voucher_id));
            exit;
        }
    }

    public function MakeHotelvoucher()
    {
        //$previous_url = $_SERVER['HTTP_REFERER'];
        extract($this->input->post());

        //$hotel_name = $this->input->post('hotel_name');
          //$hotel_inclusions = 
        $data = array(
            'partner_id'     => $this->global['partner_id'],
            'vendor_id'      => $hotelVendor_Id,
            'tcid'           => $tcid,
            'tourdaysid'     => $tourdaysid,
            'hotelname'      => $hotel_name,
            'address_line_1' => $address_line_1,
            'address_line_2' => $address_line_2,
            'state_id'       => $state_id,
            'city_id'        => $city_id,
            'country_id'     => $country_id,
            'hotel_mobile_no'=> $hotel_mobile_no,
            'check_in'       => $check_in,
            'check_out'      => $check_out,
            'rooms'          => $this->input->post('rooms'),
            'pax_name'       => $pax_name,
            'confirmation_no'=> $confirmation_no,
            'total_pax'      => $total_pax,
            'payment_remark' => $payment_remarkchkbox,
            'otherpayemnt_remark' => $htlpymt_remarks,
            'hotel_inclusion' => $hotel_inclchkbox,
            'other_hotelinclusion' => $hotel_inclusions,
            'special_request' => $otherspclsrvc_chkbx,
            //'otherspcl_req'  => $othrspcl_srvc,
            'other_remark'   => $htlspecial_inclusions,
            //'hotel_inclusions'=> $hotel_inclusions

        );

         $result = $this->partner_model->MakeHotelVoucher($data);

        $datastatus = array(
                    
            'hotel_voucher' => 1,
        );

        $resulttwo = $this->partner_model->updateHotelvoucherstatus($datastatus, $tourdaysid);
        
        $chkvendorexistInLedger = $this->partner_model->chkvendorExistInLedger($hotelVendor_Id);
            
            if($chkvendorexistInLedger == 1){
                
                $vendorLedgerentries = array(
                    'vendor_id'     => $hotelVendor_Id,
                    'partner_id'    => $this->global['partner_id'],
                    'voucher_type'  => "HVR", 
                    'voucher_date'  => date("Y-m-d"),
                    'tourcard_no'   => $tcid,
                    'tourdays_id'   => $tourdaysid,
                    'pax_name'      => $pax_name,
                    'from_date'     => $check_in,
                    'to_date'       => $check_out,
                    'credit_amount' => $hotel_Cost,
                    'ledger_date'   => date("Y-m-d")
                );
                    
                $vndrPrticulars = $this->partner_model->insertVendorLedgerParticulars($vendorLedgerentries);
                
            }else{
                
                $ledgerData = array(
                    'partner_id'   => $this->global['partner_id'],
                    'vendor_id'    => $hotelVendor_Id,
                    'ledger_date'  => date("Y-m-d")
                );
                
                $newvendorLegder = $this->partner_model->makeNewVendorLedger($ledgerData);
                
                $vendorLedgerentries = array(
                    'vendor_id'     => $hotelVendor_Id,
                    'partner_id'    => $this->global['partner_id'],
                    'voucher_type'  => "HVR", 
                    'voucher_date'  => date("Y-m-d"),
                    'tourcard_no'   => $tcid,
                    'tourdays_id'   => $tourdaysid,
                    'pax_name'      => $pax_name,
                    'from_date'     => $check_in,
                    'to_date'       => $check_out,
                    'credit_amount' => $hotel_Cost,
                    'ledger_date'   => date("Y-m-d")
                );
                    
                $vndrPrticulars = $this->partner_model->insertVendorLedgerParticulars($vendorLedgerentries);
                
            }
        
        if($result > 0)
            {
                //$this->session->set_flashdata('success', 'made successfully');
                //$tourcard_id = base64_encode($tourcard_id);
                //redirect($previous_url);
                echo 1;
                exit;
            }
            else{
                //$this->session->set_flashdata('error', 'There is Something problem! please try again later');
                //redirect($previous_url);
                echo 0;
                exit;
            }

        //print_r($hotel_name);
    }
    
    public function updateHotelVoucher()
    {
        extract($this->input->post());
        $id = $this->input->post('id');

        $data = array(
            //'id' => $id,
            'partner_id'          => $this->global['partner_id'],
            'rooms'               => $rooms,
            'confirmation_no'     => $confirmation_no,
            'total_pax'           => $total_pax,
            'payment_remark'      => $payment_remark,
            'otherpayemnt_remark' => $otherpayemnt_remark,
            'hotel_inclusion'     => $hotel_inclusions,
            'other_hotelinclusion'=> $other_hotelinclusion,
            'other_remark'        => $other_remark,
            'special_request'     => $special_request
          
        );
        
        //print_r($data);

        $result = $this->partner_model->updateHotelVoucher($data, $id);
        
        if($result){
            //$this->session->set_flashdata('success', 'Query Updated successfully');
            echo 1;
            exit;

        }else{
            //$this->session->set_flashdata('error', 'Failed Try Again');
            echo 0;
            exit;
        }

    }
    
    public function deleteHotelVoucher($voucherid)
    {
        if($voucherid == '') {
            $this->session->set_flashdata('error', 'There is Something problem! please try again later');
            //redirect(PARTNER.'/viewOtherTourCard');
        }
        $voucherid = $this->uri->segment(3);
        $previous_url = $_SERVER['HTTP_REFERER'];

        //print_r($voucherid);
        $data = $this->partner_model->removeHotelVoucher($voucherid);

        $datastatus = array(
            'hotel_voucher'  => 0,
        );
          $result = $this->partner_model->updatehotelstatus($datastatus, $voucherid);

        if($result > 0){
            $this->session->set_flashdata('success', 'Delete successfully');            
            redirect($previous_url); 
        }
        else{
            $this->session->set_flashdata('error', 'There is Something problem! please try again later');            
            redirect($previous_url); 
        }

    }
    
    public function MakeTransportvoucher()
    {
        extract($this->input->post());

            $data = array(
                'partner_id'         => $this->global['partner_id'],
                //'vendor_name'        => $vendor_name,
                // 'com_address_line_1' => $com_address_line_1,
                // 'com_address_line_2' => $com_address_line_2,
                // 'com_state_id'       => $com_state_id,
                // 'com_city_id'        => $com_city_id,
                // 'com_country_id'     => $com_country_id,
                // 'com_contact_no'     => $com_contact_no,
                'Tcid'               => $Tcid,
                'tourdaysid'         => $tourdaysid,
                'arrival_date'       => $arrival_date,
                'departure_date'     => $departure_date,
                'vehicletype'        => $vehicletype,
                'pax_name'           => $pax_name,
                'confirmation_ref_no'=> $confirmation_ref_no,
                'total_pax_no'       => $total_pax_no,
                'payment_remarks'    => $payment_remarks,
                'other_remarks'      => $other_remarks,
                'other_inclusions'   => $other_inclusions,
                'date_of_issue'      => date("Y-m-d")
    
            );
             
            $result = $this->partner_model->MakeTransportVoucher($data);
    
            $datastatus = array(
                        
                'transport_voucher' => 1,
            );
    
            $resulttwo = $this->partner_model->updateTransportVoucherstatus($datastatus, $tourdaysid);

            $voucherstatus = array(

                'transport_voucher' => 1,
            );

            $transportvoucher = $this->partner_model->updateTransportvouchStatus($voucherstatus, $Tcid);
            
            $chkvendorexistInLedger = $this->partner_model->chkvendorExistInLedger($vendor_ID);
            
            if($chkvendorexistInLedger == 1){
                
                $vendorLedgerentries = array(
                    'vendor_id'     => $vendor_ID,
                    'partner_id'    => $this->global['partner_id'],
                    'voucher_type'  => "AVR", 
                    'voucher_date'  => date("Y-m-d"),
                    'tourcard_no'   => $Tcid,
                    'tourdays_id'   => $tourdaysid,
                    'pax_name'      => $pax_name,
                    'from_date'     => $arrival_date,
                    'to_date'       => $departure_date,
                    'credit_amount' => $amount,
                    'ledger_date'   => date("Y-m-d")
                );
                    
                $vndrPrticulars = $this->partner_model->insertVendorLedgerParticulars($vendorLedgerentries);
                
            }else{
                
                $ledgerData = array(
                    'partner_id'   => $this->global['partner_id'],
                    'vendor_id'    => $vendor_ID,
                    'ledger_date'  => date("Y-m-d")
                );
                
                $newvendorLegder = $this->partner_model->makeNewVendorLedger($ledgerData);
                
                $vendorLedgerentries = array(
                    'vendor_id'     => $vendor_ID,
                    'partner_id'    => $this->global['partner_id'],
                    'voucher_type'  => "AVR", 
                    'voucher_date'  => date("Y-m-d"),
                    'tourcard_no'   => $Tcid,
                    'tourdays_id'   => $tourdaysid,
                    'pax_name'      => $pax_name,
                    'from_date'     => $arrival_date,
                    'to_date'       => $departure_date,
                    'credit_amount' => $amount,
                    'ledger_date'   => date("Y-m-d")
                );
                    
                $vndrPrticulars = $this->partner_model->insertVendorLedgerParticulars($vendorLedgerentries);
                
            }
 
            if($result > 0)
            {
                echo 1;
                exit;
                //$this->session->set_flashdata('success', 'made successfully');
            }
            else{
                echo 0;
                exit;
                //$this->session->set_flashdata('error', 'There is Something problem! please try again later');
            }

    }
    
    public function updateTransportVoucher()
    {
        extract($this->input->post());
        $id = $this->input->post('id');

        $data = array(
            //'id' => $id,
            'partner_id'         => $this->global['partner_id'],
            'vehicletype'        => $vehicletype,
            'confirmation_ref_no'=> $confirmation_ref_no,
            'total_pax_no'       => $total_pax_no,
            'payment_remarks'    => $payment_remarks,
            'other_remarks'      => $other_remarks,
            'other_inclusions'   => $other_inclusions

        );

         $result = $this->partner_model->updateTransportVoucher($data, $id);
    
         if($result > 0){
            //$this->session->set_flashdata('success', 'Query Updated successfully');
            echo 1;
            exit;

         }else{
            //$this->session->set_flashdata('error', 'Failed Try Again');
            echo 0;
            exit;
         }
    }
    
    public function getAllVendorLedger()
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else{

        $data['vendorLedgers'] = $this->partner_model->getAllpartnerVendorLedger();
        $data['vendors'] = $this->partner_model->getAllVendors();
        $partner_id = $this->global['partner_id'];
        $data['partnerhotel'] = $this->partner_model->getAllPartnerHotel($partner_id);
        $data['clientDetails'] = $this->partner_model->getAllClient();
        $this->global['pageTitle'] = 'Travwhizz : View Vendor Ledger';
        $this->loadPartnerViews("partner/VendorLedger", $this->global, $data, NULL);
        }
    }
    
    public function getVendorLedgerById($vendorLedId)
    {   
        $data['ledgerDetails'] = $ledgerDetails = $this->partner_model->getVendorLedgerDetailsById($vendorLedId);
        $CRDamt = array();
        $DBamt = array();
        foreach($ledgerDetails as $detail){
            $CRDamt[] = $detail->credit_amount;
            $DBamt[] = $detail->debit_amount;
        }
        
        $crdamount = array($CRDamt[0]);
        $dbamount = array($DBamt[0]);
        //var_dump($crdamount);
        //var_dump($dbamount);
        $clbamount = array();
        if(array_filter($crdamount) == []){
            $clbamount = array($DBamt[0].'Dr');
        }else{
            $clbamount = array($CRDamt[0].'Cr');
        }
        //var_dump($clbamount);
        for($i=1; $i<count($ledgerDetails); $i++) {
            
            if(preg_replace('/[0-9]+/', '', $clbamount[$i-1]) == 'Dr'){
                if($DBamt[$i] !== ''){
                    $clbamount[$i] = (rtrim($clbamount[$i-1], 'Dr') + $DBamt[$i]).'Dr';
                }else if($DBamt[$i] == '' && rtrim($clbamount[$i-1], 'Dr') < $CRDamt[$i]){
                    $clbamount[$i] = ($CRDamt[$i] - rtrim($clbamount[$i-1], 'Dr')).'Cr';
                }else if($DBamt[$i] == '' && rtrim($clbamount[$i-1], 'Dr') > $CRDamt[$i]){
                    $clbamount[$i] = (rtrim($clbamount[$i-1], 'Dr') - $CRDamt[$i]).'Dr';
                }
            }else{
                if($DBamt[$i] !== '' && rtrim($clbamount[$i-1], 'Cr') < $DBamt[$i]){
                    $clbamount[$i] = ($DBamt[$i] - rtrim($clbamount[$i-1], 'Cr')).'Dr';
                }else if($DBamt[$i] !== '' && rtrim($clbamount[$i-1], 'Cr') > $DBamt[$i]){
                    $clbamount[$i] = (rtrim($clbamount[$i-1], 'Cr') - $DBamt[$i]).'Cr';
                }else if($DBamt[$i] == ''){
                    $clbamount[$i] = (rtrim($clbamount[$i-1], 'Cr') + $CRDamt[$i]).'Cr';
                }
            }
            
        }
        
        $newClbAmt = array();
        
        for($j=0; $j<count($clbamount); $j++){
            
            if(preg_replace('/[0-9]+/', '', $clbamount[$j]) == 'Dr'){
              $newClbAmt[$j] = "(".rtrim($clbamount[$j], 'Dr').")Dr";
            }else{
              $newClbAmt[$j] = "(".rtrim($clbamount[$j], 'Cr').")Cr";
            }
        }
        
        $data['closingBal'] = $newClbAmt;
        
        $vndledgerId = preg_replace('/[0-9]+/', '', $vendorLedId);
        if($vndledgerId == "VND"){
           $vendorId = ltrim($vendorLedId, 'VND');
           $data['vendorDetails'] = $this->partner_model->getAllVendorsById($vendorId);    
        }
        else if($vndledgerId == "HTL"){
           $vendorId = ltrim($vendorLedId, 'HTL');
           $data['vendorDetails'] = $this->partner_model->getHotelByHotelId($vendorId);    
        }
        // else if($vndledgerId == "CLNT"){
        //     $vendorId = ltrim($vendorLedId, 'CLNT');
        //     $data['vendorDetails'] = $this->partner_model->getPartnerClientById($vendorId);
        // }
        else{
            $data['vendorDetails'] = "";
        }
        $this->global['pageTitle'] = 'Travwhizz : View Vendor Ledger';
        $this->loadPartnerViews("partner/vendorLedgerDetails", $this->global, $data, NULL);
    }
    
    //General Ledger
    
    public function getAllGeneralLedger()
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else{

        //$partner_id = $this->global['partner_id'];
        $data['generalLedger'] = $this->partner_model->getAllgeneralLedgers();
        $data['subLedger'] = $this->partner_model->getAllSubLedgers();
        $this->global['pageTitle'] = 'Travwhizz : View General Ledger';
        $this->loadPartnerViews("partner/generalLedger", $this->global, $data, NULL);
        }
    }
    
    public function getSubLedgerById($subLedgerID)
    {
        if($subLedgerID == ''){
            $this->session->set_flashdata('error', 'There is Something problem! please try again later');
            //redirect(PARTNER.'/getAllGeneralLedger');
        }else{
            $data['subLedgers'] = $this->partner_model->getSubLedgersById($subLedgerID);
            $data['ledgerName'] = $this->partner_model->getGeneralLedgerName($subLedgerID);    
            $this->global['pageTitle'] = 'Travwhizz : View Sub Ledger';
            $this->loadPartnerViews("partner/subLedger", $this->global, $data, NULL);
        }
    }
    
    public function addNewgeneralLedger()
    {
        extract($this->input->post());
        
        $data = array(
            'ledger_name'  => $ledger_name,
            'ledger_type'  => $ledger_type,
            'partner_id'   => $this->global['partner_id'],
            'created_on'   => date("Y-m-d"),
            );
        $newgeneralLedger = $this->partner_model->makenewGeneralLedger($data);
        
        if($newgeneralLedger > 0){
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }
        
    }
    
    public function addNewsubLedger()
    {
        extract($this->input->post());
        
        $data = array(
            'gn_ledgerId'      => $SubGnLedger,
            'partner_id'       => $this->global['partner_id'],
            'sub_ledger_name'  => $subledger_name,
            'sub_ledger_type'  => $subledger_type,
            'created_on'       => date("Y-m-d"),
        );
        $newSubLedger = $this->partner_model->makenewSubLedger($data);
        
        
        if($newSubLedger > 0){
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }
        
    }
    
    public function getGeneralLedgerById($ledgerId)
    {
        if($ledgerId == ''){
            $this->session->set_flashdata('error', 'There is Something problem! please try again later');
            //redirect(PARTNER.'/getAllGeneralLedger');
        }else{
        $data['ledgerName'] = $this->partner_model->getGeneralLedgerName($ledgerId);    
        $data['ledgerData'] = $ledgerData = $this->partner_model->getgeneralLedgerDetailsByid($ledgerId);
        $CRDamt = array();
        $DBamt = array();
        foreach($ledgerData as $detail){
            $CRDamt[] = $detail->credit_amount;
            $DBamt[] = $detail->debit_amount;
        }
        
        $crdamount = array($CRDamt[0]);
        $dbamount = array($DBamt[0]);
        //var_dump($crdamount);
        //var_dump($dbamount);
        $clbamount = array();
        if(array_filter($crdamount) == []){
            $clbamount = array($DBamt[0].'Dr');
        }else{
            $clbamount = array($CRDamt[0].'Cr');
        }
        //var_dump($clbamount);
        for($i=1; $i<count($ledgerData); $i++) {
            
            if(preg_replace('/[0-9]+/', '', $clbamount[$i-1]) == 'Dr'){
                if($DBamt[$i] !== ''){
                    $clbamount[$i] = (rtrim($clbamount[$i-1], 'Dr') + $DBamt[$i]).'Dr';
                }else if($DBamt[$i] == '' && rtrim($clbamount[$i-1], 'Dr') < $CRDamt[$i]){
                    $clbamount[$i] = ($CRDamt[$i] - rtrim($clbamount[$i-1], 'Dr')).'Cr';
                }else if($DBamt[$i] == '' && rtrim($clbamount[$i-1], 'Dr') > $CRDamt[$i]){
                    $clbamount[$i] = (rtrim($clbamount[$i-1], 'Dr') - $CRDamt[$i]).'Dr';
                }
            }else{
                if($DBamt[$i] !== '' && rtrim($clbamount[$i-1], 'Cr') < $DBamt[$i]){
                    $clbamount[$i] = ($DBamt[$i] - rtrim($clbamount[$i-1], 'Cr')).'Dr';
                }else if($DBamt[$i] !== '' && rtrim($clbamount[$i-1], 'Cr') > $DBamt[$i]){
                    $clbamount[$i] = (rtrim($clbamount[$i-1], 'Cr') - $DBamt[$i]).'Cr';
                }else if($DBamt[$i] == ''){
                    $clbamount[$i] = (rtrim($clbamount[$i-1], 'Cr') + $CRDamt[$i]).'Cr';
                }
            }
            
        }
        
        $newClbAmt = array();
        
        for($j=0; $j<count($clbamount); $j++){
            
            if(preg_replace('/[0-9]+/', '', $clbamount[$j]) == 'Dr'){
              $newClbAmt[$j] = "(".rtrim($clbamount[$j], 'Dr').")Dr";
            }else{
              $newClbAmt[$j] = "(".rtrim($clbamount[$j], 'Cr').")Cr";
            }
        }
        
        $data['closingBal'] = $newClbAmt;
        
        $this->global['pageTitle'] = 'Travwhizz : General Ledger';
        $this->loadPartnerViews("partner/generalLedgerDetails", $this->global, $data, NULL);
        }        
    }
    
    public function newPaymentVoucher()
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else{
        $partner_id = $this->global['partner_id'];
        $data['partners_hotel'] = $this->partner_model->getAllPartnerHotel($partner_id);
        $data['vendors'] = $this->partner_model->getAllVendors();
        $data['clientDetails'] = $this->partner_model->getAllClient();
        $data['generalLedger'] = $this->partner_model->getAllgeneralLedgers();
        $this->global['pageTitle'] = 'Travwhizz : New Voucher';
        $this->loadPartnerViews("partner/newPaymentVoucher", $this->global, $data, NULL);
        }
    }
    
    public function getDetailForNewPaymentVoucher()
    {
        $id = $this->input->post('id');
        $ledgerDetails = $this->partner_model->getVendorLedgerDetailsById($id);
        
        function chkVouchType($vchType){
            return ($vchType->voucher_type == 'AVR'|| $vchType->voucher_type == 'HVR'); 
        }
        $newLedgerArr = array_filter($ledgerDetails, 'chkVouchType');
            //return ($vchType['voucher_type'] == 'HVR');
        
        //echo json_encode($newLedgerArr);
        
        foreach($newLedgerArr as $vendorDetail){
           $vndledgerId = preg_replace('/[0-9]+/', '', $vendorDetail->vendor_id);
           if($vndledgerId == "VND"){
           $vendorId = ltrim($vendorLedId, 'VND');
           $vendorDetails = $this->partner_model->getAllVendorsById($vendorId);    
           }
           else if($vndledgerId == "HTL"){
           $vendorId = ltrim($vendorLedId, 'HTL');
           $vendorDetails = $this->partner_model->getHotelByHotelId($vendorId);    
           }else{
               $vendorDetails = "";
           }
            
        }
        
        if(!empty($newLedgerArr)){
            //echo 1;
            //$data = array();
            //$data['ledgerDetails'] = $ledgerDetails;
            //$data['vendorDetails'] = $vendorDetails;
             echo json_encode($newLedgerArr);
        }else{
            echo 0;
            exit;
        }
        
    }
    
    public function getVendorLedgDetailForVoucher()
    {
        $ids = $this->input->post('id');
        
        $vendorLegderDetails = $this->partner_model->getLedgerDetailByID($ids);
        
        $totalAmount = array();
        foreach($vendorLegderDetails as $LedgerDetail){
            $totalAmount[] = $LedgerDetail->credit_amount;
        }
        
        $sumtotalAmt = array_sum($totalAmount);
        //print_r(array_sum($totalAmount));
        $data = array();
        $data['vendorLegderDetails'] = $vendorLegderDetails;
        $data['sumtotalAmt'] = $sumtotalAmt;
        echo json_encode($data);
    }
    
    public function makeNewLedgerVoucher()
    {
        // voucher fields
        $vouch_type = $this->input->post('vouch_type');
        $voucher_date = $this->input->post('voucher_date');
        $ledger_name = $this->input->post('ledger_name');
        $ledger_vendor = $this->input->post('ledger_vendor');
        
        //voucher entries
        $vnd_id = $this->input->post('vnd_id[]');
        $paxname = $this->input->post('paxname[]');
        if(count($paxname) > 0){
            $paxname = $this->input->post('paxname[]');
        }else{
            $paxname = '';
        }
        $vouch_date = $this->input->post('vouch_date[]');
        $tc_no      = $this->input->post('tc_no[]');
        $ref_no     = $this->input->post('ref_no[]');
        $chq_no     = $this->input->post('chq_no[]');
        $drandcr    = $this->input->post('drandcr[]');
        $vouch_amt  = $this->input->post('vouch_amt[]');
        $vouch_prt  = $this->input->post('vouch_prt[]');
        
        //from Ledger Entry
        $selLedger_name = $this->input->post('selLedger_name');
        $selLedger_date = $this->input->post('selLedger_date');
        $selLedger_tcno = $this->input->post('selLedger_tcno');
        $selLedger_refno = $this->input->post('selLedger_refno');
        $selLedgerchq_date = $this->input->post('selLedgerchq_date');
        $selLedger_drandcr = $this->input->post('selLedger_drandcr');
        $selLedger_amt = $this->input->post('selLedger_amt');
        $selLedger_prt = $this->input->post('selLedger_prt');
        
        //var_dump($vouch_date);
        $chkvendorexistInLedger = $this->partner_model->chkvendorExistInLedger($ledger_vendor);
        
        if($chkvendorexistInLedger == 1){
            for($i=0; $i<count($vnd_id); $i++){
                
                //if($vouch_type == 'BPV' || $vouch_type == 'CPV'){
                    
                   $vendorLedgerData = array(
                   'vendor_id'     =>  $ledger_vendor,
                   'partner_id'    =>  $this->global['partner_id'],
                   'genLedger'     =>  $ledger_name,
                   'voucher_type'  =>  $vouch_type,
                   'voucher_date'  =>  $vouch_date[$i],
                   'tourcard_no'   =>  ltrim($tc_no[$i], 'TC'),
                   'refrence_no'   =>  $ref_no[$i],
                   'cheque_date'   =>  $chq_no[$i],
                   'pax_name'      =>  $paxname[$i],
                   'debit_amount'  =>  $drandcr[$i] == 'D' ? $vouch_amt[$i]: '',
                   'credit_amount' =>  $drandcr[$i] == 'C' ? $vouch_amt[$i]: '',
                   'Dr/Cr'         =>  $drandcr[$i],
                   'particulars'   =>  $vouch_prt[$i],
                   'ledger_date'   =>  date("Y-m-d"),
                   );
                
                  $ledgerVoucherData = $this->partner_model->insertVendorLedgerParticulars($vendorLedgerData);    
               
                // }else if($vouch_type == 'BRV' || $vouch_type == 'CRV'){
                    
                //     $vendorLedgerData = array(
                //   'vendor_id'     =>  $ledger_vendor,
                //   'partner_id'    =>  $this->global['partner_id'],
                //   'genLedger'     =>  $ledger_name,
                //   'voucher_type'  =>  $vouch_type,
                //   'voucher_date'  =>  $vouch_date[$i],
                //   'tourcard_no'   =>  ltrim($tc_no[$i], 'TC'),
                //   'refrence_no'   =>  $ref_no[$i],
                //   'cheque_date'   =>  $chq_no[$i],
                //   'pax_name'      =>  $paxname[$i],
                //   'credit_amount' =>  $vouch_amt[$i],
                //   'Dr/Cr'         =>  $drandcr[$i],
                //   'particulars'   =>  $vouch_prt[$i],
                //   'ledger_date'   =>  date("Y-m-d"),
                //   );
                
                // //   $ledgerVoucherData = $this->partner_model->insertVendorLedgerParticulars($vendorLedgerData);
                   
                // }
                
                
            }
            
            //if($vouch_type == 'BPV' || $vouch_type == 'CPV'){
                $ledgerEntry = array(
                'gledger_id'    => $ledger_name,
                'ledger_name'   => $selLedger_name,
                'partner_id'    => $this->global['partner_id'],
                'voucher_type'  => $vouch_type,
                'vendor'        => $ledger_vendor,
                'voucher_date'  => $selLedger_date,
                'tourcard_no'   => ltrim($selLedger_tcno, 'TC'),
                'refrence_no'   => $selLedger_refno,
                'cheque_date'   => $selLedgerchq_date,
                'drandcr'       => $selLedger_drandcr,
                'debit_amount'  => $selLedger_drandcr == 'D' ? $selLedger_amt: '',
                'credit_amount' => $selLedger_drandcr == 'C' ? $selLedger_amt: '',
                'particulars'   => $selLedger_prt,
                'entry_date'    => date("Y-m-d"),
                );
                
              $ledgerData = $this->partner_model->makeGeneralLedgerEntry($ledgerEntry);    
              
            //}else if($vouch_type == 'BRV' || $vouch_type == 'CRV'){
                // $ledgerEntry = array(
                // 'gledger_id'    => $ledger_name,
                // 'ledger_name'   => $selLedger_name,
                // 'partner_id'    => $this->global['partner_id'],
                // 'voucher_type'  => $vouch_type,
                // 'vendor'        => $ledger_vendor,
                // 'voucher_date'  => $selLedger_date,
                // 'tourcard_no'   => ltrim($selLedger_tcno, 'TC'),
                // 'refrence_no'   => $selLedger_refno,
                // 'cheque_date'   => $selLedgerchq_date,
                // 'drandcr'       => $selLedger_drandcr,
                // 'debit_amount'  => $selLedger_amt,
                // 'particulars'   => $selLedger_prt,
                // 'entry_date'    => date("Y-m-d"),
                // );
                
            // $ledgerData = $this->partner_model->makeGeneralLedgerEntry($ledgerEntry);    
            //}
            $countrow = $this->input->post('count_row');
                if($countrow > 2){
                    $ldgrAccount = $this->input->post('ldgrAccount[]');
                    $vchr_no = $this->input->post('vchr_no[]');
                    $vchr_date = $this->input->post('vchr_date[]');
                    $vchrTC = $this->input->post('vchrTC[]');
                    $vchrRF = $this->input->post('vchrRF[]');
                    $vchrCHQ = $this->input->post('vchrCHQ[]');
                    $vchrDbCr = $this->input->post('vchrDbCr[]');
                    $vchrAmt = $this->input->post('vchrAmt[]');
                    $vchrPart = $this->input->post('vchrPart[]');
                    
                    var_dump($ldgrAccount);
                   
                    $ldgerAccnt = array();
                    for($j=0; $j<count($ldgrAccount); $j++){
                        //$ldgerAccnt[$j] = preg_replace('/[0-9]+/', '', $ldgrAccount[$j]);
                        if(preg_replace('/[0-9]+/', '', $ldgrAccount[$j]) == 'GNL') {
                            
                            $ldgrvchData = array(
                                'gledger_id'    => $ledger_name,
                                'ledger_name'   => $selLedger_name,
                                'partner_id'    => $this->global['partner_id'],
                                'voucher_type'  => $vouch_type,
                                'vendor'        => $ldgrAccount[$j],
                                'voucher_date'  => $vchr_date[$j],
                                'tourcard_no'   => ltrim($vchrTC[$j], 'TWZTC'),
                                'refrence_no'   => $vchrRF[$j],
                                'cheque_date'   => $vchrCHQ[$j],
                                'drandcr'       => $vchrDbCr[$j],
                                'debit_amount'  => $vchrDbCr[$j] == 'D' ? $vchrAmt[$j]: '',
                                'credit_amount' => $vchrDbCr[$j] == 'C' ? $vchrAmt[$j]: '',    
                                'particulars'   => $vchrPart[$j],
                                'entry_date'    => date("Y-m-d"),
                            );
                            
                              $ledgerData = $this->partner_model->makeGeneralLedgerEntry($ldgrvchData);    
                            
                        }else{
                            
                            $chkvndrexistInLedger = $this->partner_model->chkvendorExistInLedger($ldgrAccount[$j]);
                            
                            if($chkvndrexistInLedger == 1){
                                
                            $ldgr2vchdata = array(
                                'vendor_id'     =>  $ldgrAccount[$j],
                                'partner_id'    =>  $this->global['partner_id'],
                                'genLedger'     =>  $ledger_name,
                                'voucher_type'  =>  $vouch_type,
                                'voucher_date'  =>  $vchr_date[$j],
                                'tourcard_no'   =>  ltrim($vchrTC[$j], 'TWZTC'),
                                'refrence_no'   =>  $vchrRF[$j],
                                'cheque_date'   =>  $vchrCHQ[$j],
                                //'pax_name'      =>  $paxname[$i],
                                'debit_amount'  =>  $vchrDbCr[$j] == 'D' ? $vchrAmt[$j]: '',
                                'credit_amount' =>  $vchrDbCr[$j] == 'C' ? $vchrAmt[$j]: '',
                                'Dr/Cr'         =>  $vchrDbCr[$j],
                                'particulars'   =>  $vchrPart[$j],
                                'ledger_date'   =>  date("Y-m-d"),
                                );
                              $ledgerVoucherData = $this->partner_model->insertVendorLedgerParticulars($ldgr2vchdata);  
                              
                             //echo 1;
                            }
                            
                            else{
                                //echo 0;
                                
                                $ledgergnlData = array(
                                    'partner_id'   => $this->global['partner_id'],
                                    'vendor_id'    => $ldgrAccount[$j],
                                    'ledger_date'  => date("Y-m-d")
                                );
                
                                $newvendorLegder = $this->partner_model->makeNewVendorLedger($ledgergnlData);
                                
                                $ldgr2vchdata = array(
                                'vendor_id'     =>  $ldgrAccount[$j],
                                'partner_id'    =>  $this->global['partner_id'],
                                'genLedger'     =>  $ledger_name,
                                'voucher_type'  =>  $vouch_type,
                                'voucher_date'  =>  $vchr_date[$j],
                                'tourcard_no'   =>  ltrim($vchrTC[$j], 'TWZTC'),
                                'refrence_no'   =>  $vchrRF[$j],
                                'cheque_date'   =>  $vchrCHQ[$j],
                                //'pax_name'      =>  $paxname[$i],
                                'debit_amount'  =>  $vchrDbCr[$j] == 'D' ? $vchrAmt[$j]: '',
                                'credit_amount' =>  $vchrDbCr[$j] == 'C' ? $vchrAmt[$j]: '',
                                'Dr/Cr'         =>  $vchrDbCr[$j],
                                'particulars'   =>  $vchrPart[$j],
                                'ledger_date'   =>  date("Y-m-d"),
                                );
                                 
                                $ledgerVoucherData = $this->partner_model->insertVendorLedgerParticulars($ldgr2vchdata);     
                                
                             }
                        }
                    }
                    //print_r($ldgerAccnt);
                }
            
            if($ledgerData > 0) {
                $this->session->set_flashdata('success', 'Voucher Created successfully');
                redirect(PARTNER.'/getAllGeneralLedger');    
            }else{
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                redirect(PARTNER.'/makeNewLedgerVoucher');  
            }
            
            
        }else{
            $ledgerData = array(
                'partner_id'   => $this->global['partner_id'],
                'vendor_id'    => $ledger_vendor,
                'ledger_date'  => date("Y-m-d")
            );
                
            $newvendorLegder = $this->partner_model->makeNewVendorLedger($ledgerData);
            
            for($i=0; $i<count($vnd_id); $i++){
                
                //if($vouch_type == 'BPV' || $vouch_type == 'CPV'){
                    
                $vendorLedgerData = array(
                'vendor_id'     =>  $ledger_vendor,
                'partner_id'    =>  $this->global['partner_id'],
                'genLedger'     =>  $ledger_name,
                'voucher_type'  =>  $vouch_type,
                'voucher_date'  =>  $vouch_date[$i],
                'tourcard_no'   =>  ltrim($tc_no[$i], 'TC'),
                'refrence_no'   =>  $ref_no[$i],
                'cheque_date'   =>  $chq_no[$i],
                'pax_name'      =>  $paxname[$i],
                'debit_amount'  =>  $drandcr[$i] == 'D' ? $vouch_amt[$i]: '',
                'credit_amount' =>  $drandcr[$i] == 'C' ? $vouch_amt[$i]: '',
                'Dr/Cr'         =>  $drandcr[$i],
                'particulars'   =>  $vouch_prt[$i],
                'ledger_date'   =>  date("Y-m-d"),
                );
                
                $ledgerVoucherData = $this->partner_model->insertVendorLedgerParticulars($vendorLedgerData);
                
                // }else if($vouch_type == 'BRV' || $vouch_type == 'CRV'){
                    
                // $vendorLedgerData = array(
                // 'vendor_id'     =>  $ledger_vendor,
                // 'partner_id'    =>  $this->global['partner_id'],
                // 'genLedger'     =>  $ledger_name,
                // 'voucher_type'  =>  $vouch_type,
                // 'voucher_date'  =>  $vouch_date[$i],
                // 'tourcard_no'   =>  ltrim($tc_no[$i], 'TC'),
                // 'refrence_no'   =>  $ref_no[$i],
                // 'cheque_date'   =>  $chq_no[$i],
                // 'pax_name'      =>  $paxname[$i],
                // 'credit_amount'  =>  $vouch_amt[$i],
                // 'Dr/Cr'         =>  $drandcr[$i],
                // 'particulars'   =>  $vouch_prt[$i],
                // 'ledger_date'   =>  date("Y-m-d"),
                // );
                
                // // $ledgerVoucherData = $this->partner_model->insertVendorLedgerParticulars($vendorLedgerData);
                // }
                
            }
            
            //if($vouch_type == 'BPV' || $vouch_type == 'CPV'){
                $ledgerEntry = array(
                'gledger_id'    => $ledger_name,
                'ledger_name'   => $selLedger_name,
                'partner_id'    => $this->global['partner_id'],
                'voucher_type'  => $vouch_type,
                'vendor'        => $ledger_vendor,
                'voucher_date'  => $selLedger_date,
                'tourcard_no'   => ltrim($selLedger_tcno, 'TC'),
                'refrence_no'   => $selLedger_refno,
                'cheque_date'   => $selLedgerchq_date,
                'drandcr'       => $selLedger_drandcr,
                'debit_amount'  => $selLedger_drandcr == 'D' ? $selLedger_amt: '',
                'credit_amount' => $selLedger_drandcr == 'C' ? $selLedger_amt: '',
                'particulars'   => $selLedger_prt,
                'entry_date'    => date("Y-m-d"),
                );
                
            $ledgerData = $this->partner_model->makeGeneralLedgerEntry($ledgerEntry);
            
            // }else if($vouch_type == 'BRV' || $vouch_type == 'CRV'){
            //      $ledgerEntry = array(
            //     'gledger_id'    => $ledger_name,
            //     'ledger_name'   => $selLedger_name,
            //     'partner_id'    => $this->global['partner_id'],
            //     'voucher_type'  => $vouch_type,
            //     'vendor'        => $ledger_vendor,
            //     'voucher_date'  => $selLedger_date,
            //     'tourcard_no'   => ltrim($selLedger_tcno, 'TC'),
            //     'refrence_no'   => $selLedger_refno,
            //     'cheque_date'   => $selLedgerchq_date,
            //     'drandcr'       => $selLedger_drandcr,
            //     'debit_amount' => $selLedger_amt,
            //     'particulars'   => $selLedger_prt,
            //     'entry_date'    => date("Y-m-d"),
            //     );
                
            // // $ledgerData = $this->partner_model->makeGeneralLedgerEntry($ledgerEntry);
            // }
            
                $countrow = $this->input->post('count_row');
                if($countrow > 2){
                    $ldgrAccount = $this->input->post('ldgrAccount[]');
                    $vchr_no = $this->input->post('vchr_no[]');
                    $vchr_date = $this->input->post('vchr_date[]');
                    $vchrTC = $this->input->post('vchrTC[]');
                    $vchrRF = $this->input->post('vchrRF[]');
                    $vchrCHQ = $this->input->post('vchrCHQ[]');
                    $vchrDbCr = $this->input->post('vchrDbCr[]');
                    $vchrAmt = $this->input->post('vchrAmt[]');
                    $vchrPart = $this->input->post('vchrPart[]');
                   
                    var_dump($ldgrAccount);
                    $ldgerAccnt = array();
                    for($j=0; $j<count($ldgrAccount); $j++){
                        //$ldgerAccnt[$j] = preg_replace('/[0-9]+/', '', $ldgrAccount[$j]);
                        if(preg_replace('/[0-9]+/', '', $ldgrAccount[$j]) == 'GNL') {
                            
                            $ldgrvchData = array(
                                'gledger_id'    => $ledger_name,
                                'ledger_name'   => $selLedger_name,
                                'partner_id'    => $this->global['partner_id'],
                                'voucher_type'  => $vouch_type,
                                'vendor'        => $ldgrAccount[$j],
                                'voucher_date'  => $vchr_date[$j],
                                'tourcard_no'   => ltrim($vchrTC[$j], 'TWZTC'),
                                'refrence_no'   => $vchrRF[$j],
                                'cheque_date'   => $vchrCHQ[$j],
                                'drandcr'       => $vchrDbCr[$j],
                                'debit_amount'  => $vchrDbCr[$j] == 'D' ? $vchrAmt[$j]: '',
                                'credit_amount' => $vchrDbCr[$j] == 'C' ? $vchrAmt[$j]: '',    
                                'particulars'   => $vchrPart[$j],
                                'entry_date'    => date("Y-m-d"),
                            );
                            
                              $ledgerData = $this->partner_model->makeGeneralLedgerEntry($ldgrvchData);    
                            
                        }else{
                            
                            $chkvndrexistInLedger = $this->partner_model->chkvendorExistInLedger($ldgrAccount[$j]);
                            
                            if($chkvndrexistInLedger == 1){
                                
                            $ldgr2vchdata = array(
                                'vendor_id'     =>  $ldgrAccount[$j],
                                'partner_id'    =>  $this->global['partner_id'],
                                'genLedger'     =>  $ledger_name,
                                'voucher_type'  =>  $vouch_type,
                                'voucher_date'  =>  $vchr_date[$j],
                                'tourcard_no'   =>  ltrim($vchrTC[$j], 'TWZTC'),
                                'refrence_no'   =>  $vchrRF[$j],
                                'cheque_date'   =>  $vchrCHQ[$j],
                                //'pax_name'      =>  $paxname[$i],
                                'debit_amount'  =>  $vchrDbCr[$j] == 'D' ? $vchrAmt[$j]: '',
                                'credit_amount' =>  $vchrDbCr[$j] == 'C' ? $vchrAmt[$j]: '',
                                'Dr/Cr'         =>  $vchrDbCr[$j],
                                'particulars'   =>  $vchrPart[$j],
                                'ledger_date'   =>  date("Y-m-d"),
                                );
                              
                              $ledgerVoucherData = $this->partner_model->insertVendorLedgerParticulars($ldgr2vchdata);  
                              
                              //echo 1;
                             }else{
                                
                                //echo 0;
                                $ledgergnlData = array(
                                    'partner_id'   => $this->global['partner_id'],
                                    'vendor_id'    => $ldgrAccount[$j],
                                    'ledger_date'  => date("Y-m-d")
                                );
                
                                $newvendorLegder = $this->partner_model->makeNewVendorLedger($ledgergnlData);
                                
                                $ldgr2vchdata = array(
                                'vendor_id'     =>  $ldgrAccount[$j],
                                'partner_id'    =>  $this->global['partner_id'],
                                'genLedger'     =>  $ledger_name,
                                'voucher_type'  =>  $vouch_type,
                                'voucher_date'  =>  $vchr_date[$j],
                                'tourcard_no'   =>  ltrim($vchrTC[$j], 'TWZTC'),
                                'refrence_no'   =>  $vchrRF[$j],
                                'cheque_date'   =>  $vchrCHQ[$j],
                                //'pax_name'      =>  $paxname[$i],
                                'debit_amount'  =>  $vchrDbCr[$j] == 'D' ? $vchrAmt[$j]: '',
                                'credit_amount' =>  $vchrDbCr[$j] == 'C' ? $vchrAmt[$j]: '',
                                'Dr/Cr'         =>  $vchrDbCr[$j],
                                'particulars'   =>  $vchrPart[$j],
                                'ledger_date'   =>  date("Y-m-d"),
                                );
                                 
                                $ledgerVoucherData = $this->partner_model->insertVendorLedgerParticulars($ldgr2vchdata);     
                                
                             }
                        }
                    }
                    //print_r($ldgerAccnt);
                }
            
            if($ledgerData > 0) {
                $this->session->set_flashdata('success', 'Voucher Created successfully');
                redirect(PARTNER.'/getAllGeneralLedger');    
            }else{
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                redirect(PARTNER.'/makeNewLedgerVoucher');  
            }
        }
        
    }
    
    public function getHotelVoucher()
    {
        
        $voucher_id = $this->uri->segment(3);
        $data['query'] = $vchData = $this->partner_model->getpartnerHotelVoucherbyId($voucher_id);
        
        $htlincArr = '';
        $newOthrHtlIncl = '';
        $htlPymtRmrk = '';
        $newOthrPmtRmrk = '';
        $htlspclrmrkArr = '';
        $newOthrHtlSpclRmrk = '';
        foreach($vchData as $vcherdata){
            
            $htlincl = str_replace("+", " ", $vcherdata->hotel_inclusion);    
            $hotelInclarr = explode('&', $htlincl);
            
            for($i=0; $i<count($hotelInclarr); $i++){
                
                $htlnewarr[] = trim(substr($hotelInclarr[$i], strpos($hotelInclarr[$i], '=') + 1));
                $htlincArr .= "<li>".$htlnewarr[$i]."</li>";
            }
            
            $newOthrHtlIncl .= strip_tags($vcherdata->other_hotelinclusion, ["li"]);
            
            $pymtRmrk = str_replace("+", " ", $vcherdata->payment_remark);
            $nwpymtRmrk = trim(substr($pymtRmrk, strpos($pymtRmrk, '=') + 1));
            $htlPymtRmrk .="<li>".$nwpymtRmrk."</li>";
            $newOthrPmtRmrk .= strip_tags($vcherdata->otherpayemnt_remark, ["li"]);
            
            $htlspclRqst = str_replace("+", " ", $vcherdata->special_request);
            $hotelspclRemark = explode('&', $htlspclRqst);
            
            for($i=0; $i<count($hotelspclRemark); $i++){
                
                $spclRmrkarr[] = trim(substr($hotelspclRemark[$i], strpos($hotelspclRemark[$i], '=') + 1));
                $htlspclrmrkArr .= "<li>".$spclRmrkarr[$i]."</li>";
            }
            
            $newOthrHtlSpclRmrk .= strip_tags($vcherdata->other_remark, ["li"]);
        }
        
         $data['nwhtlIncl'] = "<ul>".$htlincArr.$newOthrHtlIncl."</ul>";
         $data['nwhtlPymtRmrk'] = "<ul>".$htlPymtRmrk.$newOthrPmtRmrk."</ul>";
         $data['htlspclrmrkArr'] = "<ul>".$htlspclrmrkArr.$newOthrHtlSpclRmrk."</ul>";
         $this->load->library('pdf');
         $this->pdf->load_view('partner/hotelVoucher', $data);
        
    }

    public function mypdf()
    {
        $this->load->library('pdftest');

        $voucher_id = $this->uri->segment(3);
        $data['query'] = $vchData = $this->partner_model->getpartnerHotelVoucherbyId($voucher_id);
        
        $htlincArr = '';
        $htlPymtRmrk = '';
        $htlspclrmrkArr = '';
        foreach($vchData as $vcherdata){
            
            $htlincl = str_replace("+", " ", $vcherdata->hotel_inclusion);    
            $hotelInclarr = explode('&', $htlincl);
            
            for($i=0; $i<count($hotelInclarr); $i++){
                
                $htlnewarr[] = trim(substr($hotelInclarr[$i], strpos($hotelInclarr[$i], '=') + 1));
                $htlincArr .= "<li>".$htlnewarr[$i]."</li>";
            }
            
            //$newOthrHtlIncl = str_replace("<ul></ul>","", $vcherdata->other_hotelinclusion);
            
            $pymtRmrk = str_replace("+", " ", $vcherdata->payment_remark);
            $nwpymtRmrk = trim(substr($pymtRmrk, strpos($pymtRmrk, '=') + 1));
            $htlPymtRmrk .="<li>".$nwpymtRmrk."</li>";
            
            $htlspclRqst = str_replace("+", " ", $vcherdata->special_request);
            $hotelspclRemark = explode('&', $htlspclRqst);
            
            for($i=0; $i<count($hotelspclRemark); $i++){
                
                $spclRmrkarr[] = trim(substr($hotelspclRemark[$i], strpos($hotelspclRemark[$i], '=') + 1));
                $htlspclrmrkArr .= "<li>".$spclRmrkarr[$i]."</li>";
            }
            //echo $hotelspclRemark;
        }
        
         $data['nwhtlIncl'] = "<ul>".$htlincArr."</ul>";
         $data['nwhtlPymtRmrk'] = "<ul>".$htlPymtRmrk."</ul>";
         $data['htlspclrmrkArr'] = "<ul>".$htlspclrmrkArr."</ul>";
         $data['logoPath'] = base_url(PARTNER)."uploads/partner_logo/".$this->global['logo'];
         
        $this->loadPartnerViews("partner/mypdf", $data);
        //echo $data->hotelname;
    }

    public function makePerformaInvoice()
    {
        extract($this->input->post());
            
        $data = array(
               'partner_id'         => $this->global['partner_id'],
               'tourcard_id'        => $tourcard_id,
               'queryno'            => $queryno,
               'employee_id'        => $employee_id,
               'bkg_by'             => $bkg_by,
               'clientorganization' => $clientorganization,
               'organizationaddress'=> $organizationaddress,
               'state_id'           => $state_id,
               'city_id'            => $city_id,
               'country_id'         => $country_id,
               'zip'                => $zip,
               'organizationgst'    => $organizationgst,
               'place'              => $place,
               'clientname'         => $clientname,
               'subtotal'           => $subtotal,
               'igst'               => $igst,
               'cgst'               => $cgst,
               'sgst'               => $sgst,
               'netpayable'         => $netpayable,
               'inwords'            => $inwords,
               'igstat'             => $igstat,
               'cgstat'             => $cgstat,
               'sgstat'             => $sgstat
            );
            
           $user_id = $this->partner_model->makePerformaInvoice($data);
           
           if($user_id > 0){
               //$count_row = count($this->input->post('count_row'));
               $particulars = $this->input->post('particulars');
               //$from_city = $this->input->post('from_city');
               foreach ($particulars as $i => $value ) 
            {
               $datamore = array(
               'performa_id'    => $user_id,
               'partner_id'     => $this->global['partner_id'],
               'tourcard_id'    => $tourcard_id,
               'queryno'        => $queryno,
               'employee_id'    => $employee_id,
               'bkg_by'         => $bkg_by,
               'particulars'    => $value,
               'arrivaldate'    => isset($arrivaldate[$i]) ? $arrivaldate[$i] : '',
               'departuredate'  => isset($departuredate[$i]) ? $departuredate[$i] : '',
               'amount'         => isset($amount[$i]) ? $amount[$i] : '',
               );
             
                $result=$this->partner_model->makePerformaInvoiceParticulars($datamore);
        
            }
             
                $datastatus = array(
                    
                    'performa_invoice' => 1,
                );

                $resulttwo = $this->partner_model->updateTourCardPerformInvoice($datastatus, $tourcard_id);
            
                
               $this->session->set_flashdata('success', 'Query Added successfully');
               redirect(PARTNER.'/viewOtherTourCard');       
           }
            else{
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                redirect(PARTNER.'/viewOtherTourCard');
            }
    }

    public function performinvoice()
    {
        $this->load->library('pdftest');

        $invoice_id = $this->uri->segment(3);
        $data['query'] = $this->partner_model->getperformaInvoicebyId($invoice_id);
        $data['particulars'] = $this->partner_model->getperformaparticulars($invoice_id);
        
        $this->loadPartnerViews("partner/performainvoice", $data);
        //echo $data->hotelname;

    }

    public function addNewQuery()
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else{
            extract($this->input->post());

            // $checkClientExist = $this->partner_model->checkParterClient($contact_no);
            // if(count((array)$checkClientExist) > 0){
                $data = array(
                    'partner_id'    => $this->global['partner_id'],
                    'src'           => "M",
                    'person_name'   => $person_name,
                    'contact_no'    => $contact_no,
                    'email'         => $email,
                    'message'       => $message,
                    'destination'   => $destination,
                    'travel_date'   => $travel_date,
                    'nights'        => $nights,
                    'pax_no '       => $pax_no,
                    'meal_plan'     => $meal_plan,
                    'no_of_rooms'   => $no_of_rooms,
                    'hotel_category'=> $hotel_category,
                    'vehicle'       => $vehicle,
                    'other'         => $other,
                    'query_date'    => date('Y-m-d H:i:a'),
                    'status'        => 4,
                );
                $result = $this->partner_model->addNewQuery($data);
        //   }
        //   else{
        //         $data = array(
        //             'partner_id'    => $this->global['partner_id'],
        //             'src'           => "M",
        //             'person_name'   => $person_name,
        //             'contact_no'    => $contact_no,
        //             'email'         => $email,
        //             'message'       => $message,
        //             'destination'   => $destination,
        //             'travel_date'   => $travel_date,
        //             'nights'        => $nights,
        //             'pax_no '       => $pax_no,
        //             'meal_plan'     => $meal_plan,
        //             'no_of_rooms'   => $no_of_rooms,
        //             'hotel_category'   => $hotel_category,
        //             'vehicle'       => $vehicle,
        //             'other'         => $other,
        //             'query_date'    => date('Y-m-d H:i:a'),
        //             'status'        => 4,
        //         );
        //          $result = $this->partner_model->addNewQuery($data);
                
        //         $client_data = array(
        //             'partner_id'        => $this->global['partner_id'],
        //             'src'               => "M",
        //             'client_name'       => $person_name,
        //             'client_number'     => $contact_no,
        //             'client_email'      => $email,
        //             'created_at'        => date("Y-m-d H:i:a") 
        //         );

        //         $client = $this->partner_model->addNewClient($client_data);
                
        //     }
            if($result > 0) {
                  $this->session->set_flashdata('success', 'Query Added successfully');
                  redirect(PARTNER.'/viewQuery');    
            }else{
                 $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                 redirect(PARTNER.'/addQuery');  
            }
        }
    }
    
    public function viewQuery()
    {
      if($this->isPartnerAdmin() == TRUE)
         {
          $this->loadThis();
         }else{
            $result=$this->partner_model->countAllPartnerQuery();

            $data['total_records'] = $result;

            $record_per_page = $this->partner_model->getRecordPerPage(1);

            $per_page_data =  $record_per_page['record_per_page'];

            $data['record_per_page'] = $per_page_data;

            $config=$this->paginationmethod(PARTNER.'/viewQuery',$result,$per_page_data);

            if((int)$this->uri->segment(3)){
                $page = ($this->uri->segment(3)-1)*$per_page_data;
            }else{
                $page = 0;
            }

             $data['count_rows']=$result;

             $data['queryDetails'] = $this->partner_model->getAllPartnerQuery($config['per_page'], $page);
             $data['Allqueries'] = $this->partner_model->getPartnerQueryWithoutLimit();

            if(count($data['queryDetails'])<1)      
            {
                $data['count_rows']=0;
            }

            $data['pagination']=$this->pagination->create_links();

            $data['partnerEmployee'] = $this->partner_model->getAllPartnersEmployee();

            $this->global['pageTitle'] = 'Travwhizz : View Query';

            $this->loadPartnerViews("partner/viewQuery", $this->global, $data, NULL);
        }
    }

    public function editQuery($query_id)
    {

        if($query_id == '') {
            $this->session->set_flashdata('error', 'There is Something problem! please try again later');
            redirect(PARTNER.'/viewQuery'); 
        }

        $data['query'] = $this->partner_model->getPartnerQueryById($query_id);

        $this->global['pageTitle'] = 'Travwhizz : Edit Query';

        $this->loadPartnerViews("partner/editQuery", $this->global, $data, NULL);
    }

    public function updateQuery()
    {
        // $previous_url = $this->session->userdata('previous_url');
        // if($previous_url != '') {
        //     $url = explode('/',$previous_url);
        //     //var_dump($url);
        //     $previous_url = $url[6];
        //     //var_dump($previous_url);
        // }

        $this->session->unset_userdata('previous_url');

        extract($this->input->post());

        $data = array(
            'src'           => $src,
            'person_name'   => $person_name,
            'contact_no'    => $contact_no,
            'email'         => $email,
            'message'       => $message,
            'destination'   => $destination,
            'travel_date'   => $travel_date,
            'nights'        => $nights,
            'pax_no '       => $pax_no,
            'meal_plan'     => $meal_plan,
            'no_of_rooms'   => $no_of_rooms,
            'hotel_category'=> $hotel_category,
            'vehicle'       => $vehicle,
            'other'         => $other,
            'updated_at'    => date('Y-m-d H:i:s')
        );

        $result = $this->partner_model->updateQuery($data, $query_id);

        if($result > 0) {
            if($this->global['role'] == 'Employee'){
                $this->session->set_flashdata('success', 'Query Updated successfully');
                redirect(PARTNER.'/queryInHand'); 
            }else{
                $this->session->set_flashdata('success', 'Query Updated successfully');
                redirect(PARTNER.'/viewQuery'); 
            }    
        }else{
            if($this->global['role'] == 'Employee') {
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                redirect(PARTNER.'/queryInHand'); 
            }else{
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                redirect(PARTNER.'/viewQuery');
            }
        }   
    }

    public function deleteQuery($query_id)
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            if($query_id == '') {
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                redirect(PARTNER.'/viewQuery'); 
            }

            $result = $this->partner_model->deletePartnerQueryById($query_id);

            if($result > 0) {
                $this->session->set_flashdata('success', 'Query Deleted successfully');
                redirect(PARTNER.'/viewQuery');     
            }else{
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                redirect(PARTNER.'/viewQuery');
            }  
        }
    }

    public function updateQueryHandledBy()
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            extract($this->input->post());
            if($qid == '') {
                echo 0; 
                exit;
            }

            if($eid == '') {
                echo 0;
                exit;
            }

            $emp_record = $this->partner_model->getAllPartnersEmployeeById($eid);

            if(!empty($emp_record)) {
                $emp_name = $emp_record->name;
                $data = array(
                    'query_handled_by'  => $emp_name,
                    'handler_id'        => $eid,
                    'status'            => 1,
                    'query_assigndate'  => date('Y-m-d H:i:s'),
                );

                $record = $this->partner_model->updateQueryHandler($data, $qid);

                if($record > 0) {
                    echo 1;
                    exit;
                }
            }else{
                echo 0;
                exit;
            }
        }
                   
    }

    public function queryInHand()
    {
        $empDetails = $this->partner_model->getEmployeeId();
        $emp_id = $empDetails->id;
        $this->session->set_userdata('previous_url', current_url());
        $data['inHandQuery'] = $this->partner_model->getEmployeeQueryInHand($emp_id);
        $this->global['pageTitle'] = 'Travwhizz : Query In Hand';
        $this->loadPartnerViews("partner/queryInHand", $this->global, $data, NULL);
    }

    public function queryStatusConfirmed($query_id)
    {
        if($query_id == '') {
            $this->session->set_flashdata('error', 'There is Something problem! please try again later');
            redirect(PARTNER.'/queryInHand'); 
        }

        $data = array('status' => 2);

        $result = $this->partner_model->updateQuery($data, $query_id);
        if($result > 0) {
            $this->session->set_flashdata('success', 'Query Updated successfully');
            redirect(PARTNER.'/queryInHand');     
        }else{
            $this->session->set_flashdata('error', 'There is Something problem! please try again later');
            redirect(PARTNER.'/queryInHand');
        } 
    }

    public function queryStatusCanceled()
    {
        extract($this->input->post());
        if($qid == '') {
            echo 0; 
            exit;
        }
        if($cancel_reasonn == '') {
            echo 0;
            exit;
        }
        $data = array(
            'status' => 3,
            'cancel_reason' => $cancel_reasonn,
        );
        $result = $this->partner_model->updateQuery($data, $qid);
        if($result > 0) {
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }
    }
    
    //Workout Panel Start
    
    public function getItineraryState()
    {
    	
        $id = $this->input->post('id');
        if($id == '') {
        	$this->session->set_flashdata('error', 'There is something problem. Please try again! ');
        	echo 0;
        	exit;
        }else{
            $itinerary_state = $this->admin_model->getItineraryState($id);
            $optStr = '<option value="" >-- Select State --</option>';
		    foreach($itinerary_state as $val)
		    {    
			    $state_name = $val['state_name'];
			    $stateId = $val['id'];
			    $optStr = $optStr.'<option value="'.$stateId.'">'.$state_name.'</option>';
		    }
		    echo $optStr;
		}
    }
    
    public function getItineraryCity()
    {
    	
        	$id = $this->input->post('id');
        	if ($id == '') {
        		$this->session->set_flashdata('error', 'There is something problem. Please try again! ');
        		echo 0;
        		exit;
        	}else{
        		$itinerary_city = $this->admin_model->getItinerarycity($id);
        		$optStr = '<option value="" >-- Select City --</option>';
				foreach($itinerary_city as $val)
				{
					$city_name = $val['city_name'];
					$cityId = $val['id'];
					$optStr = $optStr.'<option value="'.$cityId.'">'.$city_name.'</option>';
				}
				echo $optStr;
		    }
        
    }
    
    public function HotelworkoutPannel()
    {
        $empDetails = $this->partner_model->getEmployeeId();
        $data['emp_id'] = $empDetails->id;
        $data['emp_name'] = $empDetails->name;
        $data['emp_mobile'] = $empDetails->mobile;
        $data['emp_mail'] = $empDetails->email;
        $data['partner_id'] = $this->global['partner_id'];
        $data['countries'] = $this->admin_model->getAllCountries();
        $this->global['pageTitle'] = 'Travwhizz : Workout Query';
        $this->loadPartnerViews("partner/HotelPackageworkout", $this->global, $data, NULL);
        
    }
    
    public function PackageworkoutPannel()
    {
        $empDetails = $this->partner_model->getEmployeeId();
        $data['emp_id'] = $empDetails->id;
        $data['emp_name'] = $empDetails->name;
        $data['emp_mobile'] = $empDetails->mobile;
        $data['emp_mail'] = $empDetails->email;
        $data['partner_id'] = $this->global['partner_id'];
        $data['countries'] = $this->admin_model->getAllCountries();
        $this->global['pageTitle'] = 'Travwhizz : Workout Query';
        $this->loadPartnerViews("partner/TourPackageworkout", $this->global, $data, NULL);
        
    }
    
    public function searchWorkout()
    {
        extract($this->input->post());
        $dataStr = '';

        $star_ratingArr = '<option value="all">All</option>';

        $hotelNames = '<option value="all">All</option>';

        foreach($this->input->post() as $key=>$val)
        {
            if(is_array($val))

            {
                $val = implode($val,'#');
            }

            $dataStr .= $key.'='.$val.'S$S';

        }

        $data['dataStr'] = $dataStr = rtrim($dataStr,',');
        
        //var_dump($dataStr);

        if($queryType == 'Hotel') {
            
            $hotelSearchedData=$this->admin_model->searchHotel($this->input->post());

            $searchData = array();

            $hotelIdArr = array();

            foreach($hotelSearchedData as $dataArr)
            {
                if(!in_array($dataArr['hotel_id'], $hotelIdArr))
                {
                    $hotelIdArr[] = $dataArr['hotel_id'];

                    $searchData[] = $dataArr;
                }
            }

            $countData=count($searchData);
            //var_dump($searchData);

            if($countData>0){
                $template    = '';
                $ragingArr = Array();
                foreach($searchData as $key=>$val){

                    $data['hotelId'] = $hotelId=$val['hotel_id'];

                    $hotel_name=$val['hotel_name'];

                    $data['star_rating'] = $star_rating=$val['star_rating'];

                    if(!in_array($star_rating,$ragingArr))
                    {

                        $ragingArr[] = $star_rating;

                        $data['star_ratingArr'] = $star_ratingArr = $star_ratingArr.'<option value="'.$star_rating.'">'.$star_rating.' Star</option>';

                    }
                    $data['hotelNames'] = $hotelNames = $hotelNames .'<option value="'.$hotelId.'">'.$hotel_name.'</option>';

                    $data['hotel_detail'] = $val;

                    $data['base_url'] = base_url();

                    $template   .= $this->load->view("partner/template/searchedHotel", $data, true);

                }
                echo $template;
            }else{
                echo "Sorry No Record Found";
            }
            echo '$abc#$'.$star_ratingArr.'$abc#$'.$hotelNames;
        }

        if($queryType == 'Package') {
            
            $searchData = $this->admin_model->searchPackage($this->input->post());

            if(count($searchData) > 0)
            {
                $template    = '';

                $data['stayDuration'] = $stayDuration;
                foreach($searchData as $pakageData) 
                {
                    $data['itenryId'] = $itenryId = $pakageData['id'];

                    $data['pakageData'] =  $pakageData;

                    $template   .= $this->load->view("partner/template/searchedPackage", $data, true);;
                }
                echo $template;
            }else{
                echo "Note: No Packge Found!!";
            }
        }
        if($queryType == 'partnerPackage'){
            $searchData = $this->partner_model->searchPartnerPackage($this->input->post());

            if(count($searchData) > 0)
            {
                $template    = '';

                $data['stayDuration'] = $stayDuration;
                foreach($searchData as $pakageData) 
                {
                    $data['itenryId'] = $itenryId = $pakageData['id'];

                    $data['pakageData'] =  $pakageData;

                    $template   .= $this->load->view("partner/template/searchedPartnerPackage", $data, true);;
                }
                echo $template;
            }else{
                echo "Note: No Packge Found!!";
            }
            
        }
    }
    
    public function editSearchedHoteldata()
    {
        // if($this->input->post() == ""){
        //     redirect(PARTNER.'/HotelworkoutPannel');
        // }else{
        
            $data['searchData'] = $search_data = $this->input->post('searchDataStr');
            $searchDataStr = base64_decode($search_data);
            $searchDataArr = explode('S$S',$searchDataStr);
            $paramArr = array();
            foreach($searchDataArr as $searchedhoteldata)
            {
                $dataArr = explode('=',$searchedhoteldata);
                $val = $dataArr[1];
                if (strpos($val, '#') !== false)
                {
                    $val = explode('#', $val);  
                }
                $paramArr[$dataArr[0]] = $val;
            }

            $data['paramArr'] = $paramArr;

            $sDate = explode('/',$paramArr['startdate']);
            $data['startdate'] = $startdate  = $sDate[2].'-'.$sDate[1].'-'.$sDate[0];
        
            $eDate = explode('/',$paramArr['enddate']);
            $data['enddate'] = $enddate  = $eDate[2].'-'.$eDate[1].'-'.$eDate[0];

            $data['searchrooms'] = $searchrooms  = $paramArr['searchrooms'];
            $country_id     = $paramArr['country_id'];
            $state_id       = $paramArr['state_id'];
            $city_id        = $paramArr['city_id'];

            $data['stayDuration']   = $stayDuration   = $paramArr['stayDuration'];
            $data['adults']         = $adults = $paramArr['adults'];
            $data['child']          = $child  = $paramArr['child'];
            $data['child_age']      = $child_age = $paramArr['child_age'];
        
            $data['infants']        = $infants = $paramArr['infants'];
            
            $data['editHotelId'] = $hotel_id = $this->input->post('hotelId');
            
            $data['hotelData']   = $hotelData = $this->hotel_model->getHotelDetailforSearchById($hotel_id);
            
            $data['selectedRooms'] = $selectedRooms = explode(',', rtrim($this->input->post('userSelectRoomTypes'), ','));
            
            $data['arrRoomType'] = $arrRoomType = $this->admin_model->getHotelRoomTypeByid($hotel_id);

            $data['userSelectMealTypes'] = $userSelectMealTypes = explode(',', rtrim($this->input->post('userSelectMealTypes'),','));
            
            $data['selMealDescription'] = $this->partner_model->getSelmealDescrDeatilsByid($startdate, $enddate, $hotel_id, implode(',', $userSelectMealTypes));
            
            $data['date_rates_detail'] = $date_rates_detail = $this->admin_model->getDateRatesByid_calculate($hotel_id, $startdate, $enddate);
            
            $data['hotelDateIdStr'] = $this->input->post('hotelDateId');
            $data['arrMasterRooms'] = unserialize($this->input->post('masterRoomArr'));
            $data['arrRoomType'] = unserialize($this->input->post('arrRoomType'));
            $data['roomTypesPriceArr'] = unserialize($this->input->post('roomTypesPriceArr'));
            $data['userSelectRoomTypes'] = $this->input->post('userSelectRoomTypes');
            $data['userSelectedMealTypes'] = $this->input->post('userSelectMealTypes');
            $data['selectedRoomNames'] = $this->input->post('selectedRoomNames');
            $data['selectedMealNames'] = $this->input->post('selectedMealNames');
        
        $this->global['pageTitle'] = 'Travwhizz : Edit Hotel Package';
        $this->loadPartnerViews("partner/editSearchedHotelData", $this->global, $data, NULL);
        //}
    }
    
    public function viewHotelDetails($hotel_id, $search_data)
    {
        if($hotel_id == '' || $search_data == '') {
            $this->session->set_flashdata('error', 'There is Something Problem please Try again later.!!!! ');
            redirect(PARTNER.'/HotelworkoutPannel');
        }else{
            $searchDataStr = base64_decode($search_data);
            $searchDataArr = explode('S$S',$searchDataStr);
            $paramArr = array();
            foreach($searchDataArr as $searchedhoteldata)
            {
                $dataArr = explode('=',$searchedhoteldata);
                $val = $dataArr[1];
                if (strpos($val, '#') !== false)
                {
                    $val = explode('#', $val);  
                }
                $paramArr[$dataArr[0]] = $val;
            }

            $data['paramArr'] = $paramArr;

            $sDate = explode('/',$paramArr['startdate']);
            $data['startdate'] = $startdate  = $sDate[2].'-'.$sDate[1].'-'.$sDate[0];
        
            $eDate = explode('/',$paramArr['enddate']);
            $data['enddate'] = $enddate  = $eDate[2].'-'.$eDate[1].'-'.$eDate[0];

            $data['searchrooms'] = $searchrooms  = $paramArr['searchrooms'];
            $country_id     = $paramArr['country_id'];
            $state_id       = $paramArr['state_id'];
            $city_id        = $paramArr['city_id'];

            $data['stayDuration']   = $stayDuration   = $paramArr['stayDuration'];
            $data['adults']         = $adults = $paramArr['adults'];
            $data['child']          = $child  = $paramArr['child'];
            $data['child_age']      = $child_age = $paramArr['child_age'];
        
            $data['infants']        = $infants = $paramArr['infants'];
            $data['queryid']        = $queryid = $paramArr['queryid'];
            $data['queryname']      = $queryname = $paramArr['queryname'];
            $data['emp_id']         = $emp_id = $paramArr['emp_id'];
            $data['emp_name']       = $emp_name = $paramArr['emp_name'];
            $data['emp_mobile']     = $emp_mobile = $paramArr['emp_mobile'];
            $data['emp_mail']       = $emp_mail = $paramArr['emp_mail'];
            $data['partner_id']     = $partner_id = $this->global['partner_id'];

            $data['hotelData']      = $hotelData = $this->hotel_model->getHotelDetailforSearchById($hotel_id);

            $date_rates_detail = $this->admin_model->getDateRatesByid_calculate($hotel_id, $startdate, $enddate); 

            $mealStr = '';
            $hotelDateIdStr = '';
            foreach($date_rates_detail as $meal)
            {
                $hotelDateIdStr .= $meal['id'].',';
                $mealTxt = 'CP (Breakfast)';
                if($meal['meal_plan'] == 2)
                {
                    $mealTxt = 'MAP (Breakfast+Dinner)';
                }
                if($meal['meal_plan'] == 3)
                {
                    $mealTxt = 'AP (Breakfast+Lunch+Dinner)';
                }
                if($meal['meal_plan'] == 4)
                {
                    $mealTxt = 'EP (Room Only)';
                }
                if($meal['meal_plan'] == 5)
                {
                    $mealTxt = 'CP Package';
                }
                if($meal['meal_plan'] == 6)
                {
                    $mealTxt = 'MAP Package';
                }
                if($meal['meal_plan'] == 7)
                {
                    $mealTxt = 'AP Package';
                }
                if($meal['meal_plan'] == 8)
                {
                    $mealTxt = 'EP Package';
                }
                
                $mP = $meal['meal_plan'];
                    
                $mealStr .= '<option value="'.$mP.'">'.$mealTxt.'</option>';
            }

            $data['mealStr'] = $mealStr;

            $data['hotelDateIdStr'] = $hotelDateIdStr = rtrim($hotelDateIdStr,',');

            $hotelDateId = $date_rates_detail[0]['id'];
            
            $data['roomrate_descr'] = $date_rates_detail[0]['description'];
            
            $data['roommeal_plan'] = $date_rates_detail[0]['meal_plan'];

            $data['arrRoomType'] = $arrRoomType = $this->admin_model->getHotelRoomTypeByid($hotel_id);

            $roomTypeStr = '';
            //$roomId = '';
            $roomTypesPriceArr = array();
            $i=0;
            foreach($arrRoomType as $roomType)
            {
                $i++;
                $roomId = $roomType['room_id'];
                $room_type = $roomType['room_type'];
                $roomTypeStr .= '<option value="'.$roomId.'">'.$room_type.'</option>';
                
                $hotel_rates_detail = $this->admin_model->getHotelRatesByid($hotel_id,$hotelDateId,$roomId);
                
                $roomTypesPriceArr['roomprices_'.$roomId] = $hotel_rates_detail;
            }

            $data['roomTypeStr'] = $roomTypeStr;
            $data['roomId'] = $roomId;

            $data['roomTypesPriceArr'] = $roomTypesPriceArr;

            $data['arrMasterRooms'] = $arrMasterRooms=$this->hotel_model->getAllHotelRoom();
            $masterRooms = array();
            foreach($arrMasterRooms as $mrooms)
            {
                $masterRooms[$mrooms->id] = $mrooms->room_name;
            }

            $data['editHotelId'] = $hotel_id;

            $data['searchData'] = $search_data;

            $data['query_string'] = "action=view&id=".$hotel_id."&searcData=".$search_data;

            $this->global['pageTitle'] = 'Travwhizz : View Hotel Details';
            
            $this->loadPartnerViews("partner/viewHotelDetails", $this->global, $data, NULL);
        }
    }
    
    public function getRoomAmenitiesByid()
    {
        $hotel_id = $this->input->post('hotel_id');
        $room_id = $this->input->post('room_id');
        $roomDescr = $this->partner_model->getHotelRoomDetailsByid($room_id, $hotel_id);
        
        if(!empty($roomDescr)){
            echo $roomdescr = json_encode($roomDescr);
            exit;
        }else{
            echo 0;
            exit;
        }
    }
    
    public function getMealplanDescriptionByid()
    {
        $hotel_id = $this->input->post('hotel_id');
        $meal_id = $this->input->post('meal_id');
        $startdate = $this->input->post('startdate');
        $endate = $this->input->post('endate');
        $mealDescr = $this->partner_model->getMealplanDescrByid($hotel_id, $startdate, $endate, $meal_id);
        
        if(!empty($mealDescr)){
            echo $mealdescr = json_encode($mealDescr);
            exit;
        }else{
            echo 0;
            exit;
        }
    }
    
    public function editSearchedPackageData()
    {
        $data['searchData'] = $search_data = $this->input->post('searchDataStr');
        $searchDataStr = base64_decode($search_data);
        $searchDataArr = explode('S$S',$searchDataStr);
        $paramArr = array();
        foreach($searchDataArr as $searchedhoteldata)
        {
            $dataArr = explode('=',$searchedhoteldata);
            $val = $dataArr[1];
            if (strpos($val, '#') !== false)
            {
                $val = explode('#', $val);  
            }
            $paramArr[$dataArr[0]] = $val;
        }

            $data['paramArr'] = $paramArr;

            $sDate = explode('/',$paramArr['startdate']);
            $data['startdate'] = $startdate  = $sDate[2].'-'.$sDate[1].'-'.$sDate[0];
        
            $eDate = explode('/',$paramArr['enddate']);
            $data['enddate'] = $enddate  = $eDate[2].'-'.$eDate[1].'-'.$eDate[0];
            
            $data['searchType']     = $this->input->post('searchType');
            $data['searchrooms']    = $searchrooms = $paramArr['searchrooms'];
            $data['stayDuration']   = $stayDuration = $paramArr['stayDuration'];
            $data['queryid']        = $queryid = $paramArr['queryid'];
            $data['queryname']      = $queryname = $paramArr['queryname'];
            $data['emp_id']         = $emp_id = $paramArr['emp_id'];
            $data['emp_name']       = $emp_name = $paramArr['emp_name'];
            $data['emp_mobile']     = $emp_mobile = $paramArr['emp_mobile'];
            $data['emp_mail']       = $emp_mail = $paramArr['emp_mail'];
            $data['adults']         = $adults = $paramArr['adults'];
            $data['child']          = $child  = $paramArr['child'];
            $data['child_age']      = $child_age = $paramArr['child_age'];
            $data['infants']        = $infants = $paramArr['infants'];
            
            $data['editItiId']  = $itinerary_id = $this->input->post('editItiId');
            
            $data['itineraryData']  = $itineraryData = $this->admin_model->getIteneraryById($itinerary_id);

            $data['itineraryDetails'] = $itineraryDetails = $this->admin_model->getIteneraryDetailsById($itinerary_id);

            $data['itineraryVehicle'] = $this->admin_model->getItinerarymultiplevehicle($itinerary_id);

            $data['itiTitle']       = $itineraryData['title'];

            $data['Itiduration']    = $itineraryData['duration'];
            $data['itiCity']        = $itineraryData['city'];

            $data['vehcle_detail']  = $vehcle_detail = $this->admin_model->getItineraryVehicle($itinerary_id);
            $data['selected_hotels'] = $this->input->post('selected_hotels');
            $data['selected_rooms'] = $this->input->post('selected_rooms');
            $data['selected_mealPlans'] = $this->input->post('selected_mealPlans');
            $data['selected_vehicle']  = $this->input->post('selected_vehicle');
            $data['selected_vehicle_unit'] = $this->input->post('selected_vehicle_unit');
            $data['selected_activities'] = $this->input->post('selected_activities');
            $data['perunitselected_activities'] = $this->input->post('perunitselected_activities');
            $data['totalunitofactivities'] = $this->input->post('totalunitofactivities');
            $data['calculated_prices'] = $this->input->post('calculated_prices');
            $data['rooms_prices'] = $roomwiseTotal = $this->input->post('rooms_prices');
            $data['rooms_total'] = $this->input->post('rooms_total');
            $data['totalBookingRooms'] = $this->input->post('totalBookingRooms');
            $this->global['pageTitle'] = 'Travwhizz : Edit Package';
            $this->loadPartnerViews("partner/editSearchedPackageData", $this->global, $data, NULL);

    }
    public function viewPackageDetails($itinerary_id, $search_data)
    {
        if($itinerary_id == '' || $search_data == '') {
            $this->session->set_flashdata('error', 'There is Something Problem please Try again later.!!!! ');
            redirect(PARTNER.'/PackageworkoutPannel');
        }else{
            $data['editItiId'] = $itinerary_id;
            $searchDataStr = base64_decode($search_data);
            $searchDataArr = explode('S$S',$searchDataStr);
            //var_dump($searchDataArr);
            $paramArr = array();
            foreach($searchDataArr as $searcheddata)
            {
                $dataArr = explode('=',$searcheddata);
                $val = $dataArr[1];
                //var_dump($dataArr);
                if (strpos($val, '#') !== false)
                {
                    $val = explode('#', $val);  
                }
                $paramArr[$dataArr[0]] = $val;
            }

            if(is_array($paramArr['adults']))
            {
                $totalAdults = array_sum($paramArr['adults']);
            }
            else
            {
                $totalAdults = $paramArr['adults'];
            }
            if(is_array($paramArr['child']))
            {
                $totalKids = array_sum($paramArr['child']);
            }
            else
            {
                $totalKids = $paramArr['child'];
            }

            if(is_array($paramArr['infants']))
            {
                $totalinfants = array_sum($paramArr['infants']);
            }
            else
            {
                $totalinfants = $paramArr['infants'];

            }

            $data['totalAdults'] = $totalAdults;
            $data['totalKids'] = $totalKids;
            $data['totalinfants'] = $totalinfants;

            $sDate = explode('/',$paramArr['startdate']);
            $data['startdate'] = $startdate = $sDate[2].'-'.$sDate[1].'-'.$sDate[0];
            
            $eDate = explode('/',$paramArr['enddate']);
            $data['enddate'] = $enddate = $eDate[2].'-'.$eDate[1].'-'.$eDate[0];

            $data['searchrooms']    = $searchrooms = $paramArr['searchrooms'];
            
            $data['stayDuration']   = $stayDuration = $paramArr['stayDuration'];
            
            $data['adults']         = $adults = $paramArr['adults'];
            
            $data['child']          = $child = $paramArr['child'];
            
            $data['child_age']      = $child_age = $paramArr['child_age'];

            $data['infants']        = $infants = $paramArr['infants'];
            $data['queryid']        = $queryid = $paramArr['queryid'];
            $data['queryname']      = $queryname = $paramArr['queryname'];
            $data['emp_id']         = $emp_id = $paramArr['emp_id'];
            $data['emp_name']       = $emp_name = $paramArr['emp_name'];
            $data['emp_mobile']     = $emp_mobile = $paramArr['emp_mobile'];
            $data['emp_mail']       = $emp_mail = $paramArr['emp_mail'];
            
            $data['itineraryData']  = $itineraryData = $this->admin_model->getIteneraryById($itinerary_id);

            $data['itineraryDetails'] = $itineraryDetails = $this->admin_model->getIteneraryDetailsById($itinerary_id);

            $data['itineraryVehicle'] = $this->admin_model->getItinerarymultiplevehicle($itinerary_id);

            $data['itiTitle']       = $itineraryData['title'];

            $data['Itiduration']    = $itineraryData['duration'];
            $data['itiCity']        = $itineraryData['city'];

            $data['vehcle_detail']  = $vehcle_detail = $this->admin_model->getItineraryVehicle($itinerary_id);

            $this->global['pageTitle'] = 'Travwhizz : View Package Details';

            $data['searchData'] = $search_data;
            
            $this->loadPartnerViews("partner/viewPackageDetails", $this->global, $data, NULL);
        }
    }
    
    public function confirmHotelFromPackage()
    {
        $hotel_ids = $this->input->post('selected_hotels');
        $roomType_ids = $this->input->post('selected_rooms');
        $mealPlans_ids = $this->input->post('selected_mealPlans');
        $hotlePartnerIds = $this->input->post('hotel_partnerId');
        
        $selHotelPartnerId = explode(',', rtrim($hotlePartnerIds, ','));
        $selHData = explode('$#$', rtrim($hotel_ids, ','));
        $selHotelName = explode(',', rtrim($selHData[0], ','));
		$selHotelIds = explode(',', rtrim($selHData[1], ','));
		$hotelCheckIn = explode(',', rtrim($selHData[2], ','));
		$hotelCheckOut = explode(',', rtrim($selHData[3], ','));
		
		$selRoomType = explode('$#$', rtrim($roomType_ids, ','));
		$selRoomNAme = explode(',', rtrim($selRoomType[0], ','));
		$selRoomsIds = explode(',', rtrim($selRoomType[1], ','));
		
		$selMealType = explode('$#$', rtrim($mealPlans_ids, ','));
		$selMealName = explode(',', rtrim($selMealType[0], ','));
		$selMealIds = explode(',', rtrim($selMealType[1], ','));
		
		$sel_vehicle_Id = $this->input->post('sel_vehicle_Id');
		$selected_vehicle_unit = $this->input->post('selected_vehicle_unit');
		
		$selectedVeh_id = explode(',', rtrim($sel_vehicle_Id, ','));
		$selectedVeh_unit = explode(',', rtrim($selected_vehicle_unit, ','));
		
		$selected_activities = $this->input->post('selected_activities');
		$activities = explode('$#$', rtrim($selected_activities, ','));
		$activitiesDate = rtrim($activities[1], ',');
		
		$activitiesDateArr = explode(",", $activitiesDate);
		$selectedActvities_ID = $this->input->post('selectedActvities_ID');
		$newArr = json_decode($selectedActvities_ID);
	   
		//print_r($newArr);
	    $newActArr = array();
		foreach($newArr as $key => $newAct){
		    $newActArr[] = $newAct;
		}
		$tryNewArr = '';
		foreach($newActArr as $ind => $val){
		  $tryNewArr .= implode(",", $val). "\n";
		}
		
		//echo $tryNewArr;
		$activities_id = explode("\n", $tryNewArr);
		$activities_idArr = array_values(array_filter($activities_id));
		
		$perunitselected_activities = $this->input->post('perunitselected_activities');
		$perUnitActivitiesdata = explode('$#$', rtrim($perunitselected_activities, ','));
		$perUnitActivitiesDateArr = explode(',', rtrim($perUnitActivitiesdata[1], ','));
		$perUnitActvIdArr = json_decode($perUnitActivitiesdata[2]);
		$selPerUnitActivities = array_values(array_filter($perUnitActvIdArr));
		$totUnitOfActvArr = json_decode($this->input->post('totUnitOfActvArr'));
		$totalActvUnitArr = array_values(array_filter($totUnitOfActvArr));
		$newperUnitActArr = array();
		foreach($selPerUnitActivities as $key => $newperUnitAct){
		    $newperUnitActArr[] = $newperUnitAct;
		}
		$tryNewPerUnitArr = '';
		foreach($newperUnitActArr as $newInd => $Newval){
		  $tryNewPerUnitArr .= implode(",", $Newval). "\n";
		}
		
		$perUnitactivities_id = explode("\n", $tryNewPerUnitArr);
		
		$unitActivityArr = array_values(array_filter($perUnitactivities_id));
		
		//print_r($unitActivityArr);
		
		$itineraryId = $this->input->post('itineraryId');
		$startDate   = $this->input->post('startDate');
		$endDate     = $this->input->post('endDate');
		$paxName     = $this->input->post('paxName');
		$paxContact  = $this->input->post('paxContact');
		$rooms_req   = $this->input->post('rooms_req');
		$Kids        = $this->input->post('Kids');
		$adults      = $this->input->post('adults');
		$infants     = $this->input->post('infants');
		$kidsAge     = $this->input->post('kidsAge');
		$emp_ID      = $this->input->post('emp_ID');
		

		$itiData = array(
		    'itinerary_id'    => $itineraryId,
		    'start_date'      => $startDate,
		    'end_date'        => $endDate,
		    'pax_name'        => $paxName,
		    'pax_contact'     => $paxContact,
		    'partner_id'      => $this->global['partner_id'],
		    'emp_id'          => $emp_ID,
		    'total_adults'    => $adults,
		    'total_kids'      => $Kids,
		    'total_infants'   => $infants,
		    'kids_age'        => $kidsAge,
		    'pakConfirmed_on' => date('Y-m-d H:i:s')
		    );
		    
		    $confItiInfo = $this->partner_model->confirmItIPakage($itiData);
		    
		if($confItiInfo > 0){
		    
		    for($i=0; $i<count($selHotelIds); $i++){
		        
		        $hotelConfData = array(
		          'confpak_id'       => $confItiInfo,
		          'itinerary_id'     => $itineraryId,
		          'hotel_id'         => $selHotelIds[$i],
		          'room_type_id'     => $selRoomsIds[$i],
		          'meal_type_id'     => $selMealIds[$i],
		          'check_in_date'    => $hotelCheckIn[$i],
		          'check_out_date'   => $hotelCheckOut[$i],
		          'hotel_partner_id' => $selHotelPartnerId[$i],
		          'total_rooms'      => $rooms_req,
		          'total_adults'     => $adults,
		          'total_kids'       => $Kids,
		          'total_infants'    => $infants,
		          'kids_age'         => $kidsAge,
		          'emp_id'           => $emp_ID,
		          'booked_on'        => date('Y-m-d H:i:s')
		        );
		        
		       $pakHotelConf = $this->partner_model->NewConfpakHotel($hotelConfData);
		        //print_r($hotelConfData);
		    }
		    
		    if(!empty($selectedVeh_id)){
		        
		        for($i=0; $i<count($selectedVeh_id); $i++){
		            
		            $vehData = array(
		                'confpak_id'            =>$confItiInfo,
		                'itinerary_id'          =>$itineraryId,
		                'emp_id'                =>$emp_ID,
		                'selected_vehicle_Id'   =>$selectedVeh_id[$i],
		                'selected_vehicle_unit' =>$selectedVeh_unit[$i],
		                'booked_on'             =>date('Y-m-d H:i:s'),
		                );
		                
		            $pakVehConf = $this->partner_model->NewConfpakVehicle($vehData);
		        }
		        
		    }
		    
		    if(!empty($activities_idArr)){
		        
		        for($i=0; $i<count($activitiesDateArr); $i++){
		            
		            $actvData = array(
		                'confpak_id'      => $confItiInfo,
		                'itinerary_id'    => $itineraryId,
		                'emp_id'          => $emp_ID,
		                'activity_date'   => $activitiesDateArr[$i],
		                'activity_sel_Id' => $activities_idArr[$i],
		                'booked_on'       => date('Y-m-d H:i:s'),
		            );
		            
		            $pakActvConf = $this->partner_model->NewConfpakActivities($actvData);
		            //print_r($actvData);
		        }
		        
		    }
		    
		    if(!empty($unitActivityArr)){
		        
		        for($i=0; $i<count($unitActivityArr); $i++){
		            
		            $unitActivities = array(
		                'confpak_id'      => $confItiInfo,
		                'itinerary_id'    => $itineraryId,
		                'emp_id'          => $emp_ID,
		                'activity_unitId' => $unitActivityArr[$i],
		                'activity_date'   => $perUnitActivitiesDateArr[$i],
		                'activity_unit'   => $totalActvUnitArr[$i],
		                'booked_on'       => date('Y-m-d H:i:s'),
		            );
		            
		            $pakUnitActivity = $this->partner_model->NewConfUnitpakActivities($unitActivities);
		        }
		        
		    }
		    
		    if($pakHotelConf > 0){
		        echo 1;
		        exit;
		    }else{
		        echo 0;
		        exit;
		    }
		    
		}
		
    }
    
    public function ViewConfirmedPackagesinQue()
    {
        $empDetails = $this->partner_model->getEmployeeId();
        $emp_id = $empDetails->id;
        $partner_id = $this->global['partner_id'];
        $data['ConFpackageDtl'] = $this->partner_model->getAllconfirmedPakByempId($emp_id, $partner_id);
        $this->global['pageTitle'] = 'Travwhizz : Bookings in que';
        $this->loadPartnerViews("partner/viewConfirmedPak", $this->global, $data, NULL);
    }
    
    public function viewConfirmedPakDetails($confpak_id)
    {
        $data['ConfpakDetail'] = $ConfpakDetail = $this->partner_model->getConfPakDetailByid($confpak_id);
        $data['confHotelPak'] = $this->partner_model->getConfPakHotelDetail($confpak_id);
        $data['confVehiclePak'] = $this->partner_model->getConfPakvehicleDetail($confpak_id);
        $data['confActivityPak'] = $this->partner_model->getConfPakActivityDetail($confpak_id);
        $data['confUnitActivityPak'] = $this->partner_model->getConfPakUnitActivity($confpak_id);
        //$hotel_id = $hotelpackage->hotel_id;
        
        //$data['arrRoomType'] = $arrRoomType = $this->admin_model->getHotelRoomTypeByid($hotel_id);

        //$data['date_rates_detail'] = $date_rates_detail = $this->admin_model->getDateRatesByid_calculate($hotel_id, $startdate, $enddate);
        
        $this->global['pageTitle'] = 'Travwhizz : View Packages Details';
        $this->loadPartnerViews("partner/viewConfirmedPakDetail", $this->global, $data, NULL);
    }
    
    public function calculatePrice()
    {
        extract($this->input->post());
        
        $hotelId = $hotelId;
        $searchDataStr = base64_decode($searchDataStr);
        $searchDataArr = explode('S$S',$searchDataStr);
        $paramArr = array();
        foreach($searchDataArr as $searcheddata)
        {
            $dataArr = explode('=',$searcheddata);
            $val = $dataArr[1];
            if(strpos($val, '#') !== false)
            {
                $val = explode('#', $val);  
            }
            $paramArr[$dataArr[0]] = $val;
        }

        $sDate = explode('/',$paramArr['startdate']);

        $startdate = $sDate[2].'-'.$sDate[1].'-'.$sDate[0];

        $eDate = explode('/',$paramArr['enddate']);

        $enddate = $eDate[2].'-'.$eDate[1].'-'.$eDate[0];

        $date_rates_detail = $this->admin_model->getDateRatesByid_calculate($hotelId, $startdate, $enddate);

        $hotelDateId = $hotelDateId;

        $arrMasterRoom = unserialize($masterRoomArr);

        $roomTypeArr = unserialize($arrRoomType);

        $arrRoomTypesPrice = unserialize($roomTypesPriceArr);

        $userSelectRoomTypesArr = explode(',',rtrim($userSelectRoomTypes,','));

        $userSelectMealTypesArr = explode(',',rtrim($userSelectMealTypes,','));
        
        $partnerMarkupPercent = $partnerMarkup;

        $dateMealPlanArr = array();

        $dateIdStr = '';

        foreach($date_rates_detail as $dataData)
        {

            $dateMealPlanArr[$dataData['id']] = $dataData['meal_plan'];

            $dateIdStr .= $dataData['id'].',';
        }

        $dateIdStr = rtrim($dateIdStr,',');

        $hotel_rates_detail = $this->admin_model->getHotelRoomRatesFilter($hotelId,$dateIdStr);

        $roomPriceArr = array();    

        foreach($hotel_rates_detail as $rooms)
        {

            $dateId = $rooms['date_id'];

            $mealPlan = $dateMealPlanArr[$dateId];  //meal plan

            $rtId = $rooms['room_type_id']; // Room Type Id

            $rnId = $rooms['room_name_id']; // Room Name Id

            $roomPriceArr[$rtId][$mealPlan][$rnId] = $rooms['price'];
        }
        
        $roomPriceWithMargin = array();

        $roomPrices = array();

        $roomPriceByType = array();

        $countRooms=count($paramArr['adults']);

        for($j=0; $j<$countRooms; $j++)
        {

            $userSelectedMealPlan = $userSelectMealTypesArr[$j];
            $userSelectedTypes = $userSelectRoomTypesArr[$j];

            $roomPriceByType = $roomPriceArr[$userSelectedTypes][$userSelectedMealPlan];

            $adultVal = $paramArr['adults'][$j];

            $childVal = $paramArr['child'][$j];

            if(is_array($paramArr['child_age']))
            {
                $child_ageVal = $paramArr['child_age'][$j];
            }
            else
            {
                $child_ageVal = $paramArr['child_age'];
            }

            $RoomPriceCalculation = 0;

            $chilePriceCalculation = 0;
            
            if($adultVal == 1)
            {
                $RoomPriceCalculation += $roomPriceByType[1];
            }
            else if($adultVal == 2)
            {
                $RoomPriceCalculation += $roomPriceByType[2];
            }
            else
            {
                $restAdult = $adultVal-2;

                $otherPrice = $roomPriceByType[2] + ($restAdult*$roomPriceByType[3]);

                $RoomPriceCalculation += $otherPrice;
            }

            if(strpos($child_ageVal, ',') !== false)
            {
                $childAgeArr = explode(',', $child_ageVal);

                foreach($childAgeArr as $age)
                {
                    if($age>5)
                    {
                        if($age>5 && $age<=7)
                        {
                            $chilePriceCalculation += $roomPriceByType[4];
                        }
                        else{
                            $chilePriceCalculation += $roomPriceByType[5];
                        }
                    }
                }
            }
            else
            {
                if($child_ageVal>5)
                {
                    if($child_ageVal>5 && $child_ageVal<=7)
                    {
                        $chilePriceCalculation += $roomPriceByType[4];
                    }
                    else{
                        $chilePriceCalculation += $roomPriceByType[5];
                    }
                }
            }   
            
            //$roomPriceWithMargin = $RoomPriceCalculation+$chilePriceCalculation($RoomPriceCalculation+$chilePriceCalculation*$partnerMarkupPercent/100);
            $roomPrices[$j+1] = ($RoomPriceCalculation+$chilePriceCalculation)*$paramArr['stayDuration'] ;
        }

        $roomPrices['description'] = $descArrString;
        echo json_encode($roomPrices);
    }
    
    public function getHotelRoomsForPackage()
    {
        extract($this->input->post());

        $date_rates_detail = $this->admin_model->getMealPlanByhotelId($hotId, $startDate, $endDate, $searchType, $selDate);
        
        $arrRoomType = $this->admin_model->getHotelRoomTypeByid($hotId);
        
        $hotelDetailS = $this->hotel_model->getHotelByHotelId($hotId);
        
        $hotelPartnerId = $hotelDetailS->hotel_partner_id;
        
        $roomTypeStr = '<option value="0">Select Room Type</option>';
        $roomTypesPriceArr = array();
        $i=0;
        foreach($arrRoomType as $roomType)
        {
            $i++;
            $roomId = $roomType['room_id'];
            $room_type = $roomType['room_type'];
            $room_type_id=explode(",",$room_type_id);
            $sel_room_type ='';
            if($room_type_id[$i-1] == $roomId)
            {
                $sel_room_type .='selected';
            }
            else
            {
                $sel_room_type .='';
            }
            $roomTypeStr .= '<option '.$sel_room_type.' value="'.$roomId.'">'.$room_type.'</option>';
        }

        $mealTypeStr = '<option value="0">Select Meal Plan</option>';
        foreach($date_rates_detail as $mealData)
        {
            $meal_plan = $mealData['meal_plan'];
            
            $mealTxt = 'CP (Breakfast)';
            if($mealData['meal_plan'] == 2)
            {
                $mealTxt = 'MAP (Breakfast+Dinner)';
            }
            if($mealData['meal_plan'] == 3)
            {
                $mealTxt = 'AP (Breakfast+Lunch+Dinner)';
            }
            if($mealData['meal_plan'] == 4)
            {
                $mealTxt = 'EP (Room Only)';
            }
            if($mealData['meal_plan'] == 5)
            {
                $mealTxt = 'CP Package';
            }
            if($mealData['meal_plan'] == 6)
            {
                $mealTxt = 'MAP Package';
            }
            if($meal['meal_plan'] == 7)
            {
                $mealTxt = 'AP Package';
            }
            if($mealData['meal_plan'] == 8)
            {
                $mealTxt = 'EP Package';
            }
            $mealTypeStr .= '<option value="'.$meal_plan.'">'.$mealTxt.'</option>';
        }
        
        echo $roomTypeStr.'$##$'.$mealTypeStr.'$##$'.$hotelPartnerId;
    }
    
    public function getpakageHotelPrice()
    {
        extract($this->input->post());
        $searchDataStr = base64_decode($searchDataStr);
        $searchDataArr = explode('S$S',$searchDataStr);
        $paramArr = array();
        foreach($searchDataArr as $searcheddata)
        {
            $dataArr = explode('=',$searcheddata);
            $val = $dataArr[1];
            if (strpos($val, '#') !== false)
            {
                $val = explode('#', $val);  
            }
            $paramArr[$dataArr[0]] = $val;
        }

        $sDate = explode('/',$paramArr['startdate']);
        $startdate = $sDate[2].'-'.$sDate[1].'-'.$sDate[0];
        $eDate = explode('/',$paramArr['enddate']);
        $enddate = $eDate[2].'-'.$eDate[1].'-'.$eDate[0];
        $hotelIds = array();
        foreach($selectedHotel as $val)
        {
            if($val != '')
            {
                $hotelIds[] = $val;
            }
            else
            {
                $hotelIds[] = 0;
            }
        }

        $totalRoomWisePrice = array();
        $dayPriceArr = array();
        $v_price = 0;
        $a = 0;
        $adult_activities_price = array();
        $child_activities_price = array();
        $perunit_activities_price = array();
        $perunit_activities_price_bychild = array();
        $total_adult = array_sum($paramArr['adults']);
        
        $totaladults = $totaladultsforroom;
        $totalchilds = $totalkidsforroom;
        $totalnopax = intval($totaladults + $totalchilds);
        //echo json_encode($totalnopax);
        $itineryDuration = $_POST['itineryDuration'];
        $child_ages = $paramArr['child_age'];
        $child = $paramArr['child'];
        for($h=0; $h<count($hotelIds); $h++)
        {
            $hotelId = $hotelIds[$h];
            $roomTypeId = $selectedRoom[$h];
            $userSelectedMealPlan = $selectedMealPlans[$h];
            $date_rates_detail=$this->admin_model->getDateRatesByid_calculate($hotelId, $startdate, $enddate);
            $hotelDateId = $date_rates_detail[0]['id'];

            if($selectVehicle != 0) {
                $vehicle_arr = explode('|',$selectVehicle[$h]);
                $vehicle_price = $vehicle_arr[3];
                $v_price =  (int)$v_price + (int)$vehicle_price;
            }

            /*if ($activitiesIds= $this->input->post("activities_".($h+1))) {
                if (is_array($this->input->post("activities_".($h+1)))) {
                    $adult_activities_price[] = $this->admin_model->getActivitiesPriceByAdult($activitiesIds, $total_adult);
                    $child_activities_price[] = $this->admin_model->getActivitiesPriceByChild($activitiesIds, $child, $child_ages);
                }
            }*/

            $dateMealPlanArr = array();

            $dateIdStr = '';

            foreach($date_rates_detail as $dataData)
            {
                $dateMealPlanArr[$dataData['id']] = $dataData['meal_plan'];
                $dateIdStr .= $dataData['id'].',';
            }

            $dateIdStr = rtrim($dateIdStr,',');

            //echo "====================>".$dateIdStr;

            $hotel_rates_detail = $this->admin_model->getHotelRoomRatesFilter1($hotelId,$dateIdStr);

            $roomPriceArr = array();    

            foreach($hotel_rates_detail as $rooms)
            {
                $dateId = $rooms['date_id'];

                $rtId = $rooms['room_type_id']; // Room Type Id

                $rnId = $rooms['room_name_id']; // Room Name Id

                $mealPlan = $dateMealPlanArr[$dateId];

                $roomPriceArr[$rtId][$mealPlan][$rnId] = $rooms['price'];
            }

            /*echo "<pre>!!!!!!!!!!!!";
            print_r($roomPriceArr);*/

            $roomPrices = array();

            $roomPriceByType = array();

            $countRooms=count($paramArr['adults']);

            for($j=0; $j<$countRooms; $j++)
            {
                $userSelectedTypes = $roomTypeId;
                $roomPriceByType = $roomPriceArr[$userSelectedTypes][$userSelectedMealPlan];

                $adultVal = $paramArr['adults'][$j];
                $childVal = $paramArr['child'][$j];

                if(is_array($paramArr['child_age']))
                {
                    $child_ageVal = $paramArr['child_age'][$j];
                }
                else
                {
                    $child_ageVal = $paramArr['child_age'];
                }

                if($activitiesIds = $this->input->post("activities_".($h+1))) {
                    //print_r($activitiesIds);
                    if(is_array($this->input->post("activities_".($h+1)))) {
                        $adult_activities_price[$h][$j] = $this->admin_model->getActivitiesPriceByAdult($activitiesIds, $adultVal);
                        $child_activities_price[$h][$j] = $this->admin_model->getActivitiesPriceByChild($activitiesIds, $childVal, $child_ageVal);
                    }
                }
                
                if($activitiesIds = $this->input->post("activitiesperunit_".($h+1))) {
                    if($totalunitactivities = $this->input->post("totalactivityunit_".($h+1))){

                        for($l=0; $l<count($totalunitactivities); $l++){

                            $unitarr = $totalunitactivities[$l];
                            //var_dump($unitarr);
                        }    
                            if(is_array($this->input->post("activitiesperunit_".($h+1)))) {
                    
                                $perunit_activities_price[$h][$j] = $this->admin_model->getActivitiesPriceByUnit($activitiesIds, $adultVal, $unitarr);
                                $perunit_activities_price_bychild[$h][$j] = $this->admin_model->getActivitiesPriceByUnitChild($activitiesIds, $childVal, $unitarr);
        
                            }
                        
                    }
                    
                }

                if(is_array($paramArr['child_age']))
                {
                    $child_ageVal = $paramArr['child_age'][$j];
                }
                else
                {
                    $child_ageVal = $paramArr['child_age'];
                }

                $RoomPriceCalculation = 0;

                $chilePriceCalculation = 0;

                if($adultVal == 1)
                {
                    $RoomPriceCalculation += $roomPriceByType[1];
                }
                else if($adultVal == 2)
                {
                    $RoomPriceCalculation += $roomPriceByType[2];
                }
                else
                {
                    $restAdult = $adultVal-2;

                    $otherPrice = $roomPriceByType[2] + ($restAdult*$roomPriceByType[3]);

                    $RoomPriceCalculation += $otherPrice;
                }

                if (strpos($child_ageVal, ',') !== false)
                {
                    $childAgeArr = explode(',', $child_ageVal);
                    foreach($childAgeArr as $age)
                    {
                        if($age>5)
                        {
                            if($age>5 && $age<=8)
                            {
                                $chilePriceCalculation += $roomPriceByType[4];
                            }
                            else{
                                $chilePriceCalculation += $roomPriceByType[5];
                            }
                        }
                    }
                }
                else
                {
                    if($child_ageVal>5)
                    {
                        if($child_ageVal>5 && $child_ageVal<=8)
                        {
                            $chilePriceCalculation += $roomPriceByType[4];
                        }
                        else{
                            $chilePriceCalculation += $roomPriceByType[5];
                        }
                    }
                } 
                $roomPrices[$j+1] = $RoomPriceCalculation+$chilePriceCalculation+$adult_activities_price[$h][$j]+$child_activities_price[$h][$j]+($perunit_activities_price[$h][$j] / $totalnopax)+($perunit_activities_price_bychild[$h][$j] / $totalnopax);
            }
            $dayPriceArr[] = $roomPrices;
        }

        foreach($dayPriceArr as $k=>$subArray) {
            foreach ($subArray as $id=>$value) {
                $sumArray[$id]+=$value;
            }
        }

        echo json_encode($sumArray)."$##$".$v_price;
    }
    
    public function getselvehicleperunitcost()
    {
        extract($this->input->post());
        $veh_id = $this->input->post('id');
        echo $vehicleid = json_encode($this->admin_model->getItenerarymultipleVehicleById($veh_id));
    }
    
    public function saveHotelpackage()
    {
        extract($this->input->post());
        
        $data = array(
            
        'hotel_id'         => $this->input->post('hotelId'),    
        'lead_pax_name'    => $this->input->post('leadPaxname'),    
        'lead_pax_contact' => $this->input->post('PaxContact'),
        'total_adults'     => $this->input->post('totalAdults'),
        'total_kids'       => $this->input->post('totalKids'),
        'check_in_date'    => $this->input->post('check_in'),
        'check_out_date'   => $this->input->post('check_out'),
        'nights'           => $this->input->post('total_nights'),
        'total_rooms'      => $this->input->post('total_rooms'),
        'price_margin'     => $this->input->post('priceMargin'),
        'adults_in_room'   => $this->input->post('Adultsinroom'),
        'childs_in_room'   => $this->input->post('Childsinroom'),
        'infants_in_room'  => $this->input->post('Infantsinroom'),
        'childs_age'       => $this->input->post('Childsageforroom'),
        'room_types'       => $this->input->post('userSelectRoomTypes'),
        'meal_types'       => $this->input->post('userSelectMealTypes'),
        'room_prices'      => $this->input->post('prices'),
        'description'      => $this->input->post('hotel_description'),
        'hotel_confirmation' => $this->input->post('hotel_confirmation'),
        'emp_id'           => $this->input->post('emp_id'),
        'handler_name'     => $this->input->post('handler_name'),
        'hotel_partner_id' => $this->input->post('hotel_partner_id'),
        'partner_id'       => $this->global['partner_id'],
        'created_on'       => date("Y-m-d H:i:s"),
            
        );
        
        //print_r($data);
        
        $successdata = $this->partner_model->saved_hotel_package($data);
        
        if(($successdata)>0)
        {
            echo 1;
            exit;
            
        }else{
            echo 0;
            exit;
        }
    }
    
    public function cancelHotelpackageBooking()
    {
        $hotelbooking_id = $this->input->post('hotelpackage_id');
        $cancel_reason = $this->input->post('cancel_reason');
        
        $data = array(
            'hotel_confirmation'  => "Cancelled",
            'cancel_reason'  => $cancel_reason,
            'cancelled_on'   => date("Y-m-d H:i:s"),
            );
        $success = $this->partner_model->cancelHotelBookingbyId($hotelbooking_id, $data);
        
        if($success > 0)
        {
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }
        //echo $hotelbooking_id."<br>".$cancel_reason;
    }
    
    public function ViewsavedHotelPackages()
    {
        $empDetails = $this->partner_model->getEmployeeId();
        $emp_id = $empDetails->id;
        $partner_id = $this->global['partner_id'];
        $data['hotelpackage'] = $this->partner_model->getAllConfirmedHotelPackagesByempId($emp_id, $partner_id);
        $this->global['pageTitle'] = 'Travwhizz : Confirmed Hotel Bookings';
        $this->loadPartnerViews("partner/savedHotelPackages", $this->global, $data, NULL);
    }
    
    public function ViewsavedHotelPackagesinQue()
    {
        $empDetails = $this->partner_model->getEmployeeId();
        $emp_id = $empDetails->id;
        $partner_id = $this->global['partner_id'];
        $data['hotelpackage'] = $this->partner_model->getAllwaitingHotelPackagesByempId($emp_id, $partner_id);
        $this->global['pageTitle'] = 'Travwhizz : Bookings in que';
        $this->loadPartnerViews("partner/viewSavedHotelpackagesQue", $this->global, $data, NULL);
    }
    
    public function ViewsavedHotelPackagesforAdmin()
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            //$empDetails = $this->partner_model->getEmployeeId();
            //$emp_id = $empDetails->id;
            $partner_id = $this->global['partner_id'];
            $data['hotelpackage'] = $this->partner_model->getAllSavedHotelPackages($partner_id);
            $this->global['pageTitle'] = 'Travwhizz : Confirmed Hotel Bookings';
            $this->loadPartnerViews("partner/adminSavedHotelPackages", $this->global, $data, NULL);
        }
        
    }
    
    public function ViewWaitingHotelPackagesforAdmin()
    {
        
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            //$empDetails = $this->partner_model->getEmployeeId();
            //$emp_id = $empDetails->id;
            $partner_id = $this->global['partner_id'];
            $data['hotelpackage'] = $this->partner_model->getAllwaitingHotelPackagesInadmin($partner_id);
            $this->global['pageTitle'] = 'Travwhizz : Bookings in que';
            $this->loadPartnerViews("partner/adminWaitingHotelpackages", $this->global, $data, NULL);
        }
        
    }
    
    public function EditSavedHotelPackages($package_id)
    {
        //echo $package_id;
        // $partner_id = $this->global['partner_id'];
        $data['hotelpackage'] = $hotelpackage = $this->partner_model->getSavedHotelPackageByid($package_id);
        $data['adultsinroom'] = $adultsinroom = unserialize($hotelpackage->adults_in_room);
        $data['childsinroom'] = $childsinroom = unserialize($hotelpackage->childs_in_room);
        $data['infantsinroom'] = $infantsinroom = unserialize($hotelpackage->infants_in_room);
        $data['childsageinroom'] = $childsageinroom = unserialize($hotelpackage->childs_age);
        $data['startdate'] = $startdate = $hotelpackage->check_in_date;
        $data['enddate'] = $enddate = $hotelpackage->check_out_date;
        $data['roomtypes'] = $roomtypes = explode(',', $hotelpackage->room_types);
        $data['mealtypes'] = $mealtypes = explode(',', $hotelpackage->meal_types);
        $data['roomprices'] = $roomprices = json_decode($hotelpackage->room_prices);
        
        $hotel_id = $hotelpackage->hotel_id;
        //echo $hotel_id;
        
        $data['arrRoomType'] = $arrRoomType = $this->admin_model->getHotelRoomTypeByid($hotel_id);

        $data['date_rates_detail'] = $date_rates_detail = $this->admin_model->getDateRatesByid_calculate($hotel_id, $startdate, $enddate);
        
        $this->global['pageTitle'] = 'Travwhizz : Edit Hotel Packages';
        $this->loadPartnerViews("partner/editHotelPackage", $this->global, $data, NULL);
    }
    
    public function ViewCancelledHotelPackages()
    {
        $empDetails = $this->partner_model->getEmployeeId();
        $emp_id = $empDetails->id;
        $partner_id = $this->global['partner_id'];
        $data['hotelpackage'] = $this->partner_model->getAllCancelledHotelPackagesByempId($emp_id, $partner_id);
        $this->global['pageTitle'] = 'Travwhizz : Cancelled Hotel Packages';
        $this->loadPartnerViews("partner/viewCancelledHotelPakage", $this->global, $data, NULL);
    }
    
    public function ViewCancelledHotelPackagesInadmin()
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
            
        }else{
            
        $partner_id = $this->global['partner_id'];
        $data['hotelpackage'] = $this->partner_model->getAllCancelledHotelPackagesBypartnerId($partner_id);
        $this->global['pageTitle'] = 'Travwhizz : Cancelled Hotel Packages';
        $this->loadPartnerViews("partner/viewCancelledHotelinAdmin", $this->global, $data, NULL);
        }
    }
    
    
    //Workout Panel end
    
    public function confirmedQuery()
    {
        $empDetails = $this->partner_model->getEmployeeId();
        $emp_id = $empDetails->id;
        $data['inHandQuery'] = $this->partner_model->getEmployeeConfirmedQuery($emp_id);
        //$data['confquery'] = $this->partner_model->getPartnerQueryById($query_id);
        $data['countries'] = $this->admin_model->getAllCountries();
        $data['cities'] = $this->admin_model->getAllCity();
        $partner_id = $this->global['partner_id'];
        $data['partners_hotel'] = $this->partner_model->getAllPartnerHotel($partner_id);
        $data['vendors'] = $this->partner_model->getAllVendors();
        //$data['partner_client']= $this->partner_model->getclientwithqueryid($queryid);
        //$data['clientDetails'] = $this->partner_model->getPartnerClientById($client_id);
        //$data['clientDetails'] = $this->partner_model->getAllPartnerClient();
        $this->session->set_userdata('previous_url', current_url());
        $this->global['pageTitle'] = 'Travwhizz : Confirmed Query';
        $this->loadPartnerViews("partner/confirmedQuery", $this->global, $data, NULL);
    }
    

    public function canceledQuery()
    {
        $empDetails = $this->partner_model->getEmployeeId();
        $emp_id = $empDetails->id;
        $data['inHandQuery'] = $this->partner_model->getEmployeeCanceledQuery($emp_id);
        $this->session->set_userdata('previous_url', current_url());
        $this->global['pageTitle'] = 'Travwhizz : Confirmed Query';
        $this->loadPartnerViews("partner/canceledQuery", $this->global, $data, NULL);
    }

    public function undoConfirmed($query_id)
    {
        if ($query_id == '') {
            $this->session->set_flashdata('error', 'There is Something problem! please try again later');
            redirect(PARTNER.'/confirmedQuery'); 
        }

        $data = array('status' => 1);

        $result = $this->partner_model->updateQuery($data, $query_id);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Query Updated successfully');
            redirect(PARTNER.'/canceledQuery');     
        }else{
            $this->session->set_flashdata('error', 'There is Something problem! please try again later');
            redirect(PARTNER.'/confirmedQuery');
        }
    }

    public function exportQuery()
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            $result = $this->partner_model->ExportQuery();

            foreach($result as $key => $value)
            {
                if ($result[$key]['status'] == 1) {
                    $result[$key]['status'] = "In Hand";
                }else if ($result[$key]['status'] == 2) {
                    $result[$key]['status'] = "Confirmed";
                }else if ($result[$key]['status'] == 3) {
                    $result[$key]['status'] = "Cancelled";
                }else if ($result[$key]['status'] == 4) {
                    $result[$key]['status'] = "Open";
                }
                $result[$key]['query_date'] = date('Y/m/d H:i A', strtotime($result[$key]['query_date']));
            }

            $filename = 'export_query_'.time().'.csv';
            header("Content-Description: File Transfer"); 
            header("Content-Disposition: attachment; filename=$filename"); 
            header("Content-Type: application/csv; ");
            $file = fopen('php://output', 'w');
            $header = array("src","Person Name","Contact No.","Email","Message","Destination","Travel Date","nights","No of pax","No of Rooms","hotel Category","Meal Plan","No of Vehicle","other","Query Handler","cancel_reason","Status", "Query Date"); 
            fputcsv($file, $header);
            foreach ($result as $key=>$line){ 
                fputcsv($file,$line); 
            }
            fclose($file); 
            exit; 
        }
        
    }
    
    
    public function getHotelByCity()
    {
        $city_id = $this->input->post('id');
        if ($city_id == '') {
            echo 0;
            exit;
        }else{
            echo $hotel = json_encode($this->partner_model->getHotelByCityId($city_id));
            exit;
        }
    }

    public function getStateByCountry()
    {
        $country_id = $this->input->post('id');
        if ($country_id == '') {
            echo 0;
            exit;
        }else{
            echo $state = json_encode($this->admin_model->getStateByCountryId($country_id));
            exit;
        }
    }

    public function getCityByState()
    {
        $state_id = $this->input->post('id');
        if ($state_id == '') {
            echo 0;
            exit;
        }else{
            echo $cities = json_encode($this->admin_model->getCityByStateId($state_id));
            exit;
        }
    }
    

    public function UndoPushQuery($query_id)
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            if ($query_id == '') {
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                redirect(PARTNER.'/viewQuery');
            }

            $data = array(
                'handler_id'       => NULL,
                'query_handled_by' => '',
                'status'           => 4,
                'query_assigndate' => '',
            );

            $record = $this->partner_model->updateQueryHandler($data, $query_id);

            if ($record > 0) {
                $this->session->set_flashdata('success', 'Query Updated successfully');
                redirect(PARTNER.'/viewQuery'); 
            }else{
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                redirect(PARTNER.'/viewQuery');
            }
        }
    }

    public function importQuery()
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            $this->global['pageTitle'] = 'Travwhizz : Import Query ';
            $this->loadPartnerViews("partner/importQuery", $this->global, NULL, NULL);
        }
    }

    public function addImportedQuery()
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            if (!empty($_FILES['csv_file'])) 
            {
                if($_FILES['csv_file']['error'] == 0)
                {
                    $name = $_FILES['csv_file']['name'];
                    $ext = pathinfo($name, PATHINFO_EXTENSION);
                    $type = $_FILES['csv_file']['type'];
                    $tmpName = $_FILES['csv_file']['tmp_name'];
                    if($ext == 'csv')
                    {
                        if(($handle = fopen($tmpName,"r")) !== FALSE)
                        {
                            $row=0;
                            while (($data = fgetcsv($handle)) !== FALSE) 
                            {
                                if ($row>0) 
                                {

                                    try{
                                        if ($data[0] != ''  || $data[1] != '') {
                                            $checkClientExist = $this->partner_model->checkParterClient($data[1]);
                                            if (count($checkClientExist)>0) {
                                                $query_data = array(
                                                    'partner_id'        => $this->global['partner_id'],
                                                    'src'               => $data[0],
                                                    'person_name'       => $data[1],
                                                    'contact_no'        => $data[2],
                                                    'email'             => $data[3],
                                                    'message'           => $data[4],
                                                    'destination'       => $data[5],
                                                    'travel_date'       => $data[6],
                                                    'nights'            => $data[7],
                                                    'pax_no'            => $data[8],
                                                    'no_of_rooms'       => $data[9],
                                                    'hotel_category'    => $data[10],
                                                    'meal_plan'         => $data[11],
                                                    'vehicle'           => $data[12],
                                                    'other'             => $data[13],
                                                    'query_date'        => date("Y-m-d H:i:s"),
                                                    'status'            => 4
                                                );

                                                $query = $this->partner_model->addNewQuery($query_data);
                                            }else{
                                                $query_data = array(
                                                    'partner_id'        => $this->global['partner_id'],
                                                    'src'               => $data[0],
                                                    'person_name'       => $data[1],
                                                    'contact_no'        => $data[2],
                                                    'email'             => $data[3],
                                                    'message'           => $data[4],
                                                    'destination'       => $data[5],
                                                    'travel_date'       => $data[6],
                                                    'nights'            => $data[7],
                                                    'pax_no'            => $data[8],
                                                    'no_of_rooms'       => $data[9],
                                                    'hotel_category'    => $data[10],
                                                    'meal_plan'         => $data[11],
                                                    'vehicle'           => $data[12],
                                                    'other'             => $data[13],
                                                    'query_date'        => date("Y-m-d H:i:s"),
                                                    'status'            => 4
                                                );

                                                $query = $this->partner_model->addNewQuery($query_data);

                                                $client_data = array(
                                                    'partner_id'        => $this->global['partner_id'],
                                                    'src'               => $data[0],
                                                    'client_name'       => $data[1],
                                                    'client_number'     => $data[2],
                                                    'client_email'      => $data[3],
                                                    'created_at'        => date("Y-m-d H:i:s") 
                                                );

                                                $client = $this->partner_model->addNewClient($client_data);
                                            }
                                        }
                                    } 
                                    catch (Exception $e) 
                                    {
                                        echo $e;
                                    }
                                }
                                $row++;
                            }
                            $this->session->set_flashdata('success', 'Query Data Added successfully');
                             redirect(PARTNER.'/viewQuery');
                        }else{
                           $this->session->set_flashdata('error', 'System Can not open file due to Security Reason please try different CSV file.');
                            redirect(PARTNER.'/importQuery'); 
                        }
                        $this->session->set_flashdata('success', 'Query Uploaded successfully');
                        redirect(PARTNER.'/viewQuery');
                    }else{
                        $this->session->set_flashdata('error', 'Please select CSV File, You have uploaded worng file.');
                        redirect(PARTNER.'/importQuery');
                    }
                }else{
                    $this->session->set_flashdata('error', 'There is something problem, Please try again later.');
                    redirect(PARTNER.'/importQuery');
                }
            }else{
                $this->session->set_flashdata('error', 'Please Select CSV File');
                redirect(PARTNER.'/importQuery');
            }
        }
    }

    public function viewClient()
    {
        $result=$this->partner_model->countAllPartnerClient();

        $record_per_page = $this->partner_model->getRecordPerPage(1);

        $per_page_data =  $record_per_page['record_per_page'];

        $data['record_per_page'] = $per_page_data;

        $config=$this->paginationmethod(PARTNER.'/viewClient',$result,$per_page_data);

        if((int)$this->uri->segment(3)){
            $page = ($this->uri->segment(3)-1)*$per_page_data;
        }else{
            $page = 0;
        }

        $data['count_rows']=$result;

        $data['clientDetails'] = $this->partner_model->getAllPartnerClient($config['per_page'], $page);

        if(count($data['clientDetails'])<1)      
        {
            $data['count_rows']=0;
        }

        $data['pagination']=$this->pagination->create_links();

        $this->global['pageTitle'] = 'Travwhizz : View Client';

        $this->loadPartnerViews("partner/viewClient", $this->global, $data, NULL);
    }

    public function addClient()
    {
        if($this->global['client_management'] == 1) {
            
            $data['countries'] = $this->admin_model->getAllCountries();
            
            $this->global['pageTitle'] = 'Travwhizz : Add Client';
        
           $this->loadPartnerViews("partner/addClient", $this->global, $data, NULL);
        }else{
            
            $this->loadThis();
        }
        
    }
    
    public function checkClientExist()
    {
        $clientMobile = $this->input->post('clntMobile');
        $checkClientExist = $this->partner_model->checkParterClient($clientMobile);
        
        if($checkClientExist > 0){
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }
        //echo json_encode($checkClientExist);
    }

    public function addNewClient()
    {
        extract($this->input->post());
        // $checkClientExist = $this->partner_model->checkParterClient($mobile_no);
        // if($checkClientExist > 0) {
        //     $this->session->set_flashdata('error', 'This Client is already Exists.');
        //     redirect(PARTNER.'/addClient');
        // }else{
            $data = array(
                'partner_id'            => $this->global['partner_id'],
                'title'                 => $this->input->post('employee-title[0]'),
                'src'                   => "M",
                'client_name'           => rtrim($name),
                'client_email'          => $primary_email,
                'secondry_email'        => $secondary_email,
                'client_number'         => rtrim($mobile_no),
                'alternative_no'        => rtrim($alertnative_no),
                'doa'                   => $doa,
                'dob'                   => $dob,
                'address_line_1'        => rtrim($address_line_1),
                'address_line_2'        => rtrim($address_line_2),
                'country_id'            => $country_id,
                'state_id'              => $state_id,
                'city_id'               => $city_id,
                'zip'                   => $zip,
                'organization'          => $organization,
                'companyaddress'        => $companyaddress,
                'job_title'             => $job_title,
                'contact_no'            => $contact_no,
                'company_email'         => $company_email,
                'com_country_id'        => $com_country_id,
                'com_state_id'          => $com_state_id,
                'com_city_id'           => $com_city_id,
                'com_zip'               => $com_zip,
                'pan_no'                => $pan_no,
                'companygstin'          => $companygstin,
                'account_no'            => $account_no,
                'holder_name'           => $holder_name,
                'bank_name'             => $bank_name,
                'branch'                => $branch,
                'ifsc'                  => $ifsc,
                'created_at'            => date('Y-m-d H:i:s')
            );

            $client = $this->partner_model->addNewClient($data);

            if ($client > 0) {
                $this->session->set_flashdata('success', 'Client Added successfully!');
                redirect(PARTNER.'/viewClient');
            }else{
                $this->session->set_flashdata('error', 'There is something problem, Please try again later!');
                redirect(PARTNER.'/addClient');
            }
        //}
    }

    public function editClient($client_id)
    {
        if ($client_id == '') {
            $this->session->set_flashdata('error', 'There is something error please try again later.');
            redirect(PARTNER.'/viewClient');
        }else{
            $data['clientDetails'] = $this->partner_model->getPartnerClientById($client_id);

            $data['countries'] = $this->admin_model->getAllCountries();

            $data['cities'] = $this->admin_model->getAllCity();

            $data['states'] = $this->admin_model->getAllState();
            $this->global['pageTitle'] = 'Travwhizz : Edit Client';
            $this->loadPartnerViews("partner/editClient", $this->global, $data, NULL);
        }
    }

    public function updateClient()
    {
        extract($this->input->post());
        $data = array(
            'partner_id'            => $this->global['partner_id'],
            'src'                   => $src,
            'title'                 => $this->input->post('employee-title[0]'),
            'client_email'          => $primary_email,
            'secondry_email'        => $secondary_email,
            'alternative_no'        => $alertnative_no,
            'doa'                   => $doa,
            'dob'                   => $dob,
            'address_line_1'        => $address_line_1,
            'address_line_2'        => $address_line_2,
            'country_id'            => $country_id,
            'state_id'              => $state_id,
            'city_id'               => $city_id,
            'zip'                   => $zip,
            'organization'          => $organization,
            'job_title'             => $job_title,
            'contact_no'            => $contact_no,
            'company_email'         => $company_email,
            'companyaddress'        => $companyaddress,
            'companygstin'          => $companygstin,
            'com_country_id'        => $com_country_id,
            'com_state_id'          => $com_state_id,
            'com_city_id'           => $com_city_id,
            'com_zip'               => $com_zip,
            'pan_no'                => $pan_no,
            'account_no'            => $account_no,
            'holder_name'           => $holder_name,
            'bank_name'             => $bank_name,
            'branch'                => $branch,
            'ifsc'                  => $ifsc,
            'updated_at'            => date('Y-m-d H:i:s')
        );

        $client = $this->partner_model->updatePartnerClient($data, $client_id);

        if ($client > 0) {
            $this->session->set_flashdata('success', 'Client Added successfully!');
            redirect(PARTNER.'/viewClient');
        }else{
            $this->session->set_flashdata('error', 'There is something problem, Please try again later!');
            redirect(PARTNER.'/addClient');
        }
    }

    public function markQueryColor()
    {
        $data = array(
            'query_color' => $this->input->post('query_color')
        );

        $record = $this->partner_model->updateQueryHandler($data, $this->input->post('qid'));

        if($record > 0) {
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }
    }

    public function deleteMassQuery()
    {
        $ids = $this->input->post('ids');
        foreach ($ids as $id) {
            $result = $this->partner_model->deletePartnerQueryById($id);
        }

        if ($result > 0) {
            echo 1;
            exit;   
        }else{
            echo 0;
            exit;
        } 
    }

    public function updateMassQueryHandledBy()
    {
       if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            extract($this->input->post());
            if (count($this->input->post('qid')) == 0) {
                echo 0; 
                exit;
            }

            if ($eid == '') {
                echo 0;
                exit;
            }

            $emp_record = $this->partner_model->getAllPartnersEmployeeById($eid);

            if (!empty($emp_record)) {
                $emp_name = $emp_record->name;
                $data = array(
                    'query_handled_by'  => $emp_name,
                    'handler_id'        => $eid,
                    'status'            => 1,
                    'query_assigndate'  => date('Y-m-d H:i:s'),
                );

                $ids = $this->input->post('qid');
                foreach ($ids as $qid) {
                    $record = $this->partner_model->updateQueryHandler($data, $qid);
                }

                if ($record > 0) {
                    echo 1;
                    exit;
                }
            }else{
                echo 0;
                exit;
            }
        }
    }

    public function updateRecordPerPage()
    {
        extract($this->input->post());
        $result = $this->partner_model->updateRecordPerPage($page_per_record);
        if ($result > 0) {
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }
    }

    public function deleteMassClient()
    {
        $ids = $this->input->post('ids');
        foreach ($ids as $id) {
            $result = $this->partner_model->deletePartnerClientById($id);
        }

        if ($result > 0) {
            echo 1;
            exit;   
        }else{
            echo 0;
            exit;
        }
    }

    public function deleteClient($client_id)
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            if ($client_id == '') {
                $this->session->set_flashdata('error', 'There is something error please try again later.');
                redirect(PARTNER.'/viewClient'); 
            }
            $result = $this->partner_model->deletePartnerClientById($client_id);
            if ($result > 0) {
                $this->session->set_flashdata('success', 'Client Deleted successfully!');
                redirect(PARTNER.'/viewClient');
            }else{
                $this->session->set_flashdata('error', 'There is something error please try again later.');
                redirect(PARTNER.'/viewClient');
            }
        }
    }

    public function advanceQuerySearch()
    {
        $data['result'] = $this->partner_model->advanceQuerySearch($this->input->post());
        $this->load->view("partner/advanceQuerySearch", $data);
    }

    public function advanceClientSearch()
    {
        $data['result'] = $this->partner_model->advanceClientSearch($this->input->post());
        $this->load->view("partner/advanceClientSearch", $data);
    }

    public function addHotel($tab = NULL, $hotel_id = NULL)
    {
        // if($this->isPartnerAdmin() == TRUE)
        // {
        //     $this->loadThis();
        // }else{
            if($this->global['hotel_management'] == 1){

            if(base64_decode($tab) == 1) {
                $data['tab'] = 1;
                $data['action'] = "edit";
                $data['hotel_id'] = $this->session->userdata('hotel_id');
            }

            if($tab == ''){
                $data['tab'] = 1;
                $data['hotel_id'] = '';
                $data['action'] = "";
            }

            if(base64_decode($tab) == 2) {
                $data['tab'] = 2;
                $data['action'] = "edit";
                $data['hotel_id'] = $this->session->userdata('hotel_id');
            }
            if(base64_decode($tab) == 3) {
                $data['tab'] = 3;
                $data['action'] = "edit";
                $data['hotel_id'] = $this->session->userdata('hotel_id');
            }

            $data['countries'] = $this->admin_model->getAllCountries();
            
            $this->global['pageTitle'] = 'Travwhizz : Add Hotel';
            
            $this->loadPartnerViews("partner/addHotel", $this->global, $data, NULL);
            }
            else{
                $this->loadThis();
            }
        //}
    }
    
    //check for hotel exist
    public function checkHotelExistWithZip()
    {
        $country_id = $this->input->post('country_id');
        $state_id = $this->input->post('state_id');
        $city_id = $this->input->post('city_id');
        $zip = $this->input->post('zip');
        $hotel_name = $this->input->post('hotel_name');
        
        $hotelExist = $this->partner_model->checkHotelExistwithZip($country_id, $state_id, $city_id, $zip, $hotel_name);
        
        $cityarr = array();
        foreach($hotelExist as $hotelData){
            
            $cityarr= $this->partner_model->getcityByCityId($hotelData->city_id);
            
        }
        
        //print_r($cityarr);
        
        $data = array();
        $data['hotelDetail'] = $hotelExist;
        $data['countries'] = $this->admin_model->getAllCountries();

        //$data['cities'] = $this->admin_model->getAllCity();
        $data['cities'] = $cityarr;

        $data['states'] = $this->admin_model->getAllState();
            
        //echo json_encode($hotelExist);
        echo json_encode($data);
        // echo json_encode($data['countries']);
        // echo json_encode($data['cities']);
        // echo json_encode($data['states']);

    }

    public function addNewHotel()
    {
        $type = $this->input->post('type');

        if($type == 'AddHotelDetails') {
            // if ($this->input->post('no_room_types') == 0) {
            //     $this->session->set_flashdata('error', 'please select no of room types');
            //     redirect(PARTNER.'/addHotel');
            // }
            $hotel_data = array(
                'hotel_name'            => $this->input->post('hotel_name'),
                'partner_id'            => $this->global['partner_id'],
                'address_line_1'        => $this->input->post('address_line_1'),
                'address_line_2'        => $this->input->post('address_line_2'),
                'country_id'            => $this->input->post('country_id'),
                'state_id'              => $this->input->post('state_id'),
                'city_id'               => $this->input->post('city_id'),
                'zip'                   => $this->input->post('zip'),
                'hotel_mobile_no'       => $this->input->post('hotel_mobile_no'),
                'hotel_alternative_no'  => $this->input->post('hotel_alternative_no'),
                'hotel_landline'        => $this->input->post('hotel_landline'),
                'person_name'           => $this->input->post('person_name'),
                'person_email'          => $this->input->post('person_email'),
                'person_mobile_no'      => $this->input->post('person_mobile_no'),
                'person_alternative_no' => $this->input->post('person_alternative_no'),
                // 'no_room_types'         => $this->input->post('no_room_types'),
                // 'hotel_type'            => $this->input->post('hotel_type'),
                // 'hotel_currency'        => $this->input->post('hotel_currency'),
                // 'hotel_star'            => $this->input->post('hotel_star'),
                'check_in'              => $this->input->post('check_in'),
                'check_out'             => $this->input->post('check_out'),
                // 'hotel_amenity'         => $this->input->post('hotel_amenity'),
                // 'hotel_description'     => $this->input->post('hotel_description'),
                'status'                => 1,
                'created_at'            => date('Y-m-d : H:i:s')
            );

            $hotel_id = $this->partner_model->addHotelDetails($hotel_data);

            $this->session->set_userdata('hotel_id',$hotel_id);

            if($hotel_id > 0) {
                
                $tab = base64_encode(2);
                redirect(PARTNER.'/addHotel/'.$tab);
            }else{
                 $this->session->set_flashdata('error', 'There is something problem! Please try again later');
                $tab = base64_encode(1);
                redirect(PARTNER.'/addHotel/'.$tab);
            }
        }

        if($type == "AddHotelBankingDetails") {
            
            if($this->input->post('hotel_id') == '') {
               $hotel_id = $this->sesison->userdata('hotel_id');
            }else{
                $hotel_id = $this->input->post('hotel_id');
            }
            $hotel_bank_details = array(
                'hotel_id'              => $hotel_id,
                'partner_id'            => $this->global['partner_id'],
                'pan_no'                => $this->input->post('pan_no'),
                'acount_no'             => $this->input->post('acount_no'),
                'acount_holder_name'    => $this->input->post('acount_holder_name'),
                'bank'                  => $this->input->post('bank'),
                'branch'                => $this->input->post('branch'),
                'ifsc'                  => $this->input->post('ifsc')
            );

            $hotel_bank_id = $this->partner_model->AddHotelBankingDetails($hotel_bank_details);

            if($hotel_bank_id != '') {
                $tab = base64_encode(3);
                redirect(PARTNER.'/addHotel/'.$tab);
            }else{
                $this->session->set_flashdata('error', 'There is something problem while updating bank details! Please try again later');
                $tab = base64_encode(2);
                redirect(PARTNER.'/addHotel/'.$tab);
            }
        }

        if($type == "AddHotelDocuments") {
            
            if(!empty($_FILES['pan_card']['name'])) {
                $config['upload_path'] = 'uploads/partner_hotel_documents/';
                $config['allowed_types'] = '*';
                $config['file_name'] = $_FILES['pan_card']['name'];
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('pan_card')){
                    $uploadData = $this->upload->data();
                    $hotel_pancard = $uploadData['file_name'];
                }else{
                    $hotel_pancard = '';
                }
            }else{
                $hotel_pancard = '';
            }

            if(!empty($_FILES['contracts']['name'])) {
               $filesCount = count($_FILES['contracts']['name']);
               for($i = 0; $i < $filesCount; $i++){
                $_FILES['file']['name']         = $_FILES['contracts']['name'][$i];
                $_FILES['file']['type']         = $_FILES['contracts']['type'][$i];
                $_FILES['file']['tmp_name']     = $_FILES['contracts']['tmp_name'][$i];
                $_FILES['file']['error']        = $_FILES['contracts']['error'][$i];
                $_FILES['file']['size']         = $_FILES['contracts']['size'][$i];
                
                // File upload configuration
                $uploadPath = 'uploads/hotel_documents/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = '*';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                    // Upload file to server
                    if($this->upload->do_upload('file')){
                        // Uploaded file data
                        $fileData = $this->upload->data();
                        $upload_contract[] = $fileData['file_name'];
                    }else{
                        $upload_contract = '';
                    }
                }
                if(is_array($upload_contract)) {
                    $upload_contract = json_encode($upload_contract);
                }
            }else{
                $upload_contract = '';
            }

            if($this->input->post('hotel_id') == '') {
               $hotel_id = $this->sesison->userdata('hotel_id');
            }else{
                $hotel_id = $this->input->post('hotel_id');
            }

            $hotel_attached_documents = array(
                'hotel_id'        => $hotel_id,
                'partner_id'      => $this->global['partner_id'],
                'pan_card_photo'  => $hotel_pancard,
                'contract'        => $upload_contract
            );

            $hotel_attached_id = $this->partner_model->AddHotelDocuments($hotel_attached_documents);
            if($hotel_attached_id != '') {
                $this->session->set_flashdata('success', 'Hotel is added successfully');
                redirect(PARTNER.'/viewHotel');
            }else{
                $this->session->set_flashdata('error', 'There is something problem while uploading documents! Please try again later');
                $tab = base64_encode(3);
                redirect(PARTNER.'/addHotel/'.$tab);
            }  
        }
    }

    public function viewHotel()
    {
        $this->global['pageTitle'] = 'Travwhizz : View Hotel';

        $partner_id = $this->global['partner_id'];

        if($partner_id == '') {
            $this->session->set_flashdata('error', 'No Hotel Added Yet! ');
            $data['partners_hotel'] = '';
        }else{
            $data['partners_hotel'] = $this->partner_model->getAllPartnerHotel($partner_id);
        }
        
        $this->loadPartnerViews("partner/viewHotel", $this->global, $data, NULL);
    }

    public function editHotel($tab, $hotel_id)
    {
        $this->global['pageTitle'] = 'Travwhizz : Edit Hotel';
        if($hotel_id == '') {
            $this->session->set_flashdata('error', 'There is something problem. Please try again! ');
            redirect(PARTNER.'/viewHotel');
        }else{
            $hotel_id = base64_decode($hotel_id);
            $data['hotel_id'] = $hotel_id;
            if ($tab == '') {
                $tab = 1;
                $data['tab'] = 1;
            }else{
                $tab = base64_decode($tab);
                $data['tab'] = $tab;
            }
            $data['action'] = "edit";
            $data['hotel_detail'] = $this->partner_model->getHotelByHotelId($hotel_id);
            $data['hotel_bank_details'] = $this->partner_model->getHotelBankDetailById($hotel_id);
            $data['hotel_documents'] = $this->partner_model->getHotelDocumentsById($hotel_id);
            $data['hotel_rooms'] = $this->partner_model->getHotelRoomsById($hotel_id);
            $data['countries'] = $this->admin_model->getAllCountries();
            $data['cities'] = $this->admin_model->getAllCity();
            $data['states'] = $this->admin_model->getAllState();

            $this->loadPartnerViews("partner/editHotel", $this->global, $data , NULL);
        }
    }

    public function updateHotel()
    {
        $type = $this->input->post('type');
        $hotel_id = $this->input->post('hotel_id');
        if($type == 'updateHotelDetails') {
            if($hotel_id == '') {
                $this->session->set_flashdata('error', 'Could not Update Hotel Please try again later');
                redirect(PARTNER.'/viewHotel');
            }
            $hotel_data = array(
                'hotel_name'            => $this->input->post('hotel_name'),
                'address_line_1'        => $this->input->post('address_line_1'),
                'address_line_2'        => $this->input->post('address_line_2'),
                'country_id'            => $this->input->post('country_id'),
                'state_id'              => $this->input->post('state_id'),
                'city_id'               => $this->input->post('city_id'),
                'zip'                   => $this->input->post('zip'),
                'hotel_mobile_no'       => $this->input->post('hotel_mobile_no'),
                'hotel_alternative_no'  => $this->input->post('hotel_alternative_no'),
                'hotel_landline'        => $this->input->post('hotel_landline'),
                'person_name'           => $this->input->post('person_name'),
                'person_email'          => $this->input->post('person_email'),
                'person_mobile_no'      => $this->input->post('person_mobile_no'),
                'person_alternative_no' => $this->input->post('person_alternative_no'),
                // 'no_room_types'         => (int)$this->input->post('no_room_types') + (int)$this->input->post('add_more_rows'),
                // 'hotel_type'            => $this->input->post('hotel_type'),
                // 'hotel_currency'        => $this->input->post('hotel_currency'),
                // 'hotel_star'            => $this->input->post('hotel_star'),
                'check_in'              => $this->input->post('check_in'),
                'check_out'             => $this->input->post('check_out'),
                // 'hotel_amenity'         => $this->input->post('hotel_amenity'),
                // 'hotel_description'     => $this->input->post('hotel_description'),
                'updated_at'            => date('Y-m-d : H:i:s')
            );

            $updated_hotel = $this->partner_model->updateHotelDetails($hotel_data,$hotel_id);

            if($updated_hotel > 0) {
                
                $tab = base64_encode(2);
                $hotel_id = base64_encode($hotel_id);
                redirect(PARTNER.'/editHotel/'.$tab.'/'.$hotel_id);
            }else{
                $this->session->set_flashdata('error', 'There is something problem! Please try again later');
                $tab = base64_encode(1);
                redirect(PARTNER.'/addHotel/'.$tab);
            }
        }

        if($type == "updateHotelBankingDetails") {
            if($hotel_id == '') {
                $this->session->set_flashdata('error', 'Could not Update Hotel Please try again later');
                redirect(PARTNER.'/viewHotel');
            }
            $hotel_bank_details = array(
                'pan_no'                => $this->input->post('pan_no'),
                'acount_no'             => $this->input->post('acount_no'),
                'acount_holder_name'    => $this->input->post('acount_holder_name'),
                'bank'                  => $this->input->post('bank'),
                'branch'                => $this->input->post('branch'),
                'ifsc'                  => $this->input->post('ifsc')
            );

            $hotel_bank_id = $this->partner_model->updateHotelBankingDetails($hotel_bank_details, $hotel_id);
            
            if($hotel_bank_id >= 0) {
                $tab = base64_encode(3);
                $hotel_id = base64_encode($hotel_id);
                redirect(PARTNER.'/editHotel/'.$tab.'/'.$hotel_id);
            }else{
                $this->session->set_flashdata('error', 'There is something problem while updating bank details! Please try again later');
                $tab = base64_encode(2);
                $hotel_id = base64_encode($hotel_id);
                redirect(PARTNER.'/editHotel/'.$tab.'/'.$hotel_id);
            }
        }

        if($type == "updateHotelDocuments") {

            if($hotel_id == ''){
                $this->session->set_flashdata('error', 'Could not Update Hotel Please try again later');
                redirect(PARTNER.'/viewHotel');
            }
            if(!empty($_FILES['pan_card']['name'])) {
                $config['upload_path'] = 'uploads/hotel_documents/';
                $config['allowed_types'] = '*';
                $config['file_name'] = $_FILES['pan_card']['name'];
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('pan_card')){
                    $uploadData = $this->upload->data();
                    $hotel_pancard = $uploadData['file_name'];
                }else{
                    $hotel_pancard = '';
                }
            }else{
                $hotel_pancard = '';
            }

            if(!empty($_FILES['contracts']['name'])) {
               $filesCount = count($_FILES['contracts']['name']);
               for($i = 0; $i < $filesCount; $i++){
                $_FILES['file']['name']         = $_FILES['contracts']['name'][$i];
                $_FILES['file']['type']         = $_FILES['contracts']['type'][$i];
                $_FILES['file']['tmp_name']     = $_FILES['contracts']['tmp_name'][$i];
                $_FILES['file']['error']        = $_FILES['contracts']['error'][$i];
                $_FILES['file']['size']         = $_FILES['contracts']['size'][$i];
                
                // File upload configuration
                $uploadPath = 'uploads/hotel_documents/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = '*';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                    // Upload file to server
                    if($this->upload->do_upload('file')){
                        // Uploaded file data
                        $fileData = $this->upload->data();
                        $upload_contract[] = $fileData['file_name'];
                    }else{
                        $upload_contract = '';
                    }
                }
                if(is_array($upload_contract)) {
                    $upload_contract = json_encode($upload_contract);
                }
            }else{
                $upload_contract = '';
            }

            if($hotel_pancard == '' && $upload_contract == '') {
               $this->session->set_flashdata('success', 'Hotel updated successfully');
                redirect(PARTNER.'/viewHotel');
            }else{
                $hotel_attached_documents = array(
                    'pan_card_photo'  => $hotel_pancard,
                    'contract'        => $upload_contract
                );
            }

            $hotel_attached_id = $this->partner_model->updateHotelDocuments($hotel_attached_documents, $hotel_id);
            if($hotel_attached_id > 0) {
                $this->session->set_flashdata('success', 'Hotel updated successfully');
                redirect(PARTNER.'/viewHotel');
            }else{
                $this->session->set_flashdata('error', 'There is something problem while uploading documents! Please try again later');
                $tab = base64_encode(3);
                $hotel_id = base64_encode($hotel_id);
                redirect(PARTNER.'/editHotel/'.$tab.'/'.$hotel_id);
            }
        }
    }

    public function deleteHotel($hotel_id)
    {
        if ($hotel_id == '') {
            $this->session->set_flashdata('error', 'There is something problem while Deleting Hotel! Please try again later');
             redirect(PARTNER.'/viewHotel');
        }else{
            $delete_id = $this->partner_model->deleteHotelById(base64_decode($hotel_id));

            if ($delete_id > 0) {
                $this->session->set_flashdata('success', 'Hotel Deleted Successfully!!!');
                redirect(PARTNER.'/viewHotel');
            }else{
                $this->session->set_flashdata('error', 'There is something problem while Deleting Hotel! Please try again later');
                redirect(PARTNER.'/viewHotel'); 
            }
        }
    }
    
    //Make Itinerary
    public function makeItinerary($tab = NUll, $itinerary_id = NUll)
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            if($tab == '') {
                $data['tab'] = 1;
                $data['itinerary_id'] = '';
                $data['action'] = "";
            }

            if($tab == 1) {
                $data['tab'] = 1;

                $data['action'] = "edit";
                
                $itinerary_id =  $data['itinerary_id'] = $this->session->userdata('itinerary_id');

                $data['itinerary_details'] = $this->partner_model->getPartnerItineraryById($itinerary_id);

                //$data['itinerary_vehicle'] = $this->admin_model->getItineraryVehicleById($itinerary_id);

                $data['cities'] = $this->admin_model->getAllCity();
                
                $data['states'] = $this->admin_model->getAllState();

            }

            if($tab == 2) {
                $data['tab'] = 2;

                $data['action'] = "edit";

                $itinerary_id = $data['itinerary_id'] = $this->session->userdata('itinerary_id');

                $data['itinerary_details'] = $this->partner_model->getPartnerItineraryById($itinerary_id);
            }
            
            $data['countries'] = $this->admin_model->getAllCountries();

            $this->global['pageTitle'] = 'Travwhizz : Itinerary Management';
            
            $this->loadPartnerViews("partner/makeItinerary", $this->global, $data, NULL);
        }
    }
    
    public function getDurationTables()
    {
    	if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
        	extract($this->input->post());
        	if($states == '' ) {
        		$durationsCity = array();
        	}else{
        		$durationsCity = $this->partner_model->getItinerarycity($states);


        		$data['cities'] = '<option value="0">Select City</option>';
				foreach($durationsCity as $newCity)
				{
					$data['cities'] .= '<option value="'.$newCity['id'].'">'.$newCity['city_name'].'</option>';
				}
				
				$data['num'] = $num;

				echo $this->load->view("partner/template/durationableView", $data, true);
        	}
        }

    }
    
    public function addNewItinerary()
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            extract($this->input->post());
            if($type == "add_itinerary_management") {
                
                $country_id = implode(',', $country);
                $state_id = implode(',', $state);
                $city_id = implode(',', $city);

                $data = array(
                    'partner_id'        => $this->global['partner_id'],
                    'country'           => $country_id,
                    'state'             => $state_id,
                    'city'              => $city_id,
                    'title'             => $title,
                    'duration'          => $duration,
                    'duration_detail'   => $iteDurationDetail,
                    'status'            => 1,
                    'created_at'        => date('Y-m-d H:i:s')    
                );

                $itinerary_id = $this->partner_model->addNewItinerary($data);

                $this->session->set_userdata('itinerary_id',$itinerary_id);

                if($itinerary_id != '') {
                    for($i=1; $i <=$duration ; $i++) { 
                        
                        $data = array(
                            'itinerary_id'      => $itinerary_id,
                            'partner_id'        => $this->global['partner_id'],
                            'duration_city'     => $this->input->post('tblCity_'.$i),
                        );

                        $vehicle_id = $this->partner_model->addNewItineraryDurationDetail($data);
                    }

                    echo 1;
                }else{
                    echo 0;
                }
                    
            }

            if($type == "add_itinerary") {
               for ($i=1; $i <=$duration ; $i++) {
                    if (!empty($_FILES['itinerary_image_'.$i]['name'])) {
                       $filesCount = count($_FILES['itinerary_image_'.$i]['name']);
                       for($j = 0; $j < $filesCount; $j++){
                        $_FILES['file']['name']         = $_FILES['itinerary_image_'.$i]['name'][$j];
                        $_FILES['file']['type']         = $_FILES['itinerary_image_'.$i]['type'][$j];
                        $_FILES['file']['tmp_name']     = $_FILES['itinerary_image_'.$i]['tmp_name'][$j];
                        $_FILES['file']['error']        = $_FILES['itinerary_image_'.$i]['error'][$j];
                        $_FILES['file']['size']         = $_FILES['itinerary_image_'.$i]['size'][$j];
                        
                        // File upload configuration
                        $uploadPath = 'uploads/itinerary_images/';
                        $config['upload_path'] = $uploadPath;
                        $config['allowed_types'] = '*';
                        
                        // Load and initialize upload library
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        
                            // Upload file to server
                            if($this->upload->do_upload('file')){
                                // Uploaded file data
                                $fileData = $this->upload->data();
                                $itinerary_image[] = $fileData['file_name'];
                            }else{
                                $itinerary_image = '';
                            }
                        }
                        if (is_array($itinerary_image)) {
                            $itinerary_image = json_encode($itinerary_image);
                        }
                    }else{
                        $itinerary_image = '';
                    }

                    if ($itinerary_id == '') {
                       $itinerary_id = $this->sesison->userdata('itinerary_id');
                    }

                    $itinerary_details = array(
                        'itinerary_id'          => $itinerary_id,
                        'partner_id'            => $this->global['partner_id'],
                        'itinerary_title'       => $this->input->post('itinerary_tilte_'.$i),
                        'itinerary_details'     => $this->input->post('itinerary_'.$i),
                        'itinerary_images'      => $itinerary_image
                    );

                    $itinerary = $this->partner_model->addPartnerItineraryDetails($itinerary_details);

                    unset($itinerary_image);
                }

                if($itinerary != '') {
                    $this->session->unset_userdata('itinerary_id');
                    $this->session->set_flashdata('success', 'Itinerary Added successfully!!!! ');
                    redirect(PARTNER.'/viewPartnerItinerary');
                }
            }
        }
    }
    
    public function viewPartnerItinerary()
    {
    	if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            $data['itinerary_details'] = $this->partner_model->getAllPartnerItineraryDetails();

            $this->global['pageTitle'] = 'Travwhizz : All Itinerary List';
            
            $this->loadPartnerViews("partner/viewPartnerItinerary", $this->global, $data, NULL);
        }
    }
    
    public function editPartnerItinerary($tab, $itinerary_id)
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            if($itinerary_id == '') {
                $this->session->set_flashdata('error', 'There is something problem. Please try again! ');
                redirect(PARTNER.'/viewPartnerItinerary');
            }else{
                
                $data['tab'] = $tab;

                $data['itinerary_details'] = $this->partner_model->getPartnerItineraryById($itinerary_id);

                $data['itinerary_duration'] = $this->partner_model->getPartnerItineraryDuration($itinerary_id);

                $data['countries'] = $this->admin_model->getAllCountries();

                $data['cities'] = $this->admin_model->getAllCity();

                $data['itinerary_id'] = $itinerary_id; 
                
                $data['states'] = $this->admin_model->getAllState();

                $data['itinerary_images_details'] = $this->partner_model->getItineraryImagesDetails($itinerary_id);

                $this->global['pageTitle'] = 'Travwhizz : Edit Itinerary Management';
            
                $this->loadPartnerViews("partner/editPartnerItinerary", $this->global, $data, NULL);
            }
        }
    }
    
    public function updatePartnerItinerary()
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
            
        }else{
            extract($this->input->post());
            if($type == "update_itinerary_management") {
                $country_id = implode(',', $country);
                $state_id = implode(',', $state);
                $city_id = implode(',', $city);

                $data = array(
                    'country'           => $country_id,
                    'state'             => $state_id,
                    'city'              => $city_id,
                    'title'             => $title,
                    'duration'          => $duration,
                    'duration_detail'   => $iteDurationDetail
                    //'updated_at'        => date('Y-m-d H:i:s'),
                    //'vehiclecount'      => $vehiclecount   
                );

                $itinerary = $this->partner_model->updatePartnerItinerary($data, $itinerary_id);
                
                if($itinerary !== '') {
                	//$delete_old_itinerary = '';
                	for($i=1; $i<=$duration; $i++) {
                        $data = array(
                            'duration_city' => $this->input->post('tblCity_'.$i),
                        );
                        $vehicle_id = $this->partner_model->updatePartnerItineraryDuration($data, $this->input->post('cost_'.$i));
                    }
                       echo 1;
                }else{
                    echo 0;
                }

            }
            if($type == "update_itinerary") {
                for($i=1; $i <=$duration ; $i++) {
                    if($this->input->post('image_id_'.$i) != '') {
                        if(!empty($_FILES['itinerary_image_'.$i]['name'])) {
                           $filesCount = count($_FILES['itinerary_image_'.$i]['name']);
                           for($j = 0; $j < $filesCount; $j++){
                                $_FILES['file']['name']         = $_FILES['itinerary_image_'.$i]['name'][$j];
                                $_FILES['file']['type']         = $_FILES['itinerary_image_'.$i]['type'][$j];
                                $_FILES['file']['tmp_name']     = $_FILES['itinerary_image_'.$i]['tmp_name'][$j];
                                $_FILES['file']['error']        = $_FILES['itinerary_image_'.$i]['error'][$j];
                                $_FILES['file']['size']         = $_FILES['itinerary_image_'.$i]['size'][$j];
                                
                                // File upload configuration
                                $uploadPath = 'uploads/itinerary_images/';
                                $config['upload_path'] = $uploadPath;
                                $config['allowed_types'] = '*';
                                
                                // Load and initialize upload library
                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                
                                    // Upload file to server
                                    if($this->upload->do_upload('file')){
                                        // Uploaded file data
                                        $fileData = $this->upload->data();
                                        $itinerary_image[] = $fileData['file_name'];
                                    }else{
                                        $itinerary_image = '';
                                    }
                            }
                            if(is_array($itinerary_image)) {
                                $itinerary_image = json_encode($itinerary_image);
                            }
                        }else{
                             $itinerary_image = '';
                        }

                        if($itinerary_id == '') {
                           $itinerary_id = $this->sesison->userdata('itinerary_id');
                        }

                        if($itinerary_image == '') {
                            $itinerary_details = array(
                                'itinerary_title'       => $this->input->post('itinerary_title_'.$i),
                                'itinerary_details'     => $this->input->post('itinerary_'.$i)
                            );
                        }else{
                            $itinerary_details = array(
                                'itinerary_title'       => $this->input->post('itinerary_title_'.$i),
                                'itinerary_details'     => $this->input->post('itinerary_'.$i),
                                'itinerary_images'      => $itinerary_image
                            );
                        }

                        $itinerary = $this->partner_model->updatePartnerItineraryDetails($itinerary_details,$this->input->post('image_id_'.$i));

                        unset($itinerary_image);
                    }else{
                        if (!empty($_FILES['itinerary_image_'.$i]['name'])) {
                           $filesCount = count($_FILES['itinerary_image_'.$i]['name']);
                           for($j = 0; $j < $filesCount; $j++){
                                $_FILES['file']['name']         = $_FILES['itinerary_image_'.$i]['name'][$j];
                                $_FILES['file']['type']         = $_FILES['itinerary_image_'.$i]['type'][$j];
                                $_FILES['file']['tmp_name']     = $_FILES['itinerary_image_'.$i]['tmp_name'][$j];
                                $_FILES['file']['error']        = $_FILES['itinerary_image_'.$i]['error'][$j];
                                $_FILES['file']['size']         = $_FILES['itinerary_image_'.$i]['size'][$j];
                                
                                // File upload configuration
                                $uploadPath = 'uploads/itinerary_images/';
                                $config['upload_path'] = $uploadPath;
                                $config['allowed_types'] = '*';
                                
                                // Load and initialize upload library
                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                
                                    // Upload file to server
                                    if($this->upload->do_upload('file')){
                                        // Uploaded file data
                                        $fileData = $this->upload->data();
                                        $itinerary_image[] = $fileData['file_name'];
                                    }else{
                                        $itinerary_image = '';
                                    }
                            }
                            if (is_array($itinerary_image)) {
                                $itinerary_image = json_encode($itinerary_image);
                            }
                        }else{
                             $itinerary_image = '';
                        }

                        if ($itinerary_id == '') {
                           $itinerary_id = $this->sesison->userdata('itinerary_id');
                        }

                        $itinerary_details = array(
                            'itinerary_id'          => $itinerary_id,
                            'itinerary_title'       => $this->input->post('itinerary_title_'.$i),
                            'itinerary_details'     => $this->input->post('itinerary_'.$i),
                            'itinerary_images'      => $itinerary_image
                        );

                        $itinerary = $this->partner_model->addPartnerItineraryDetails($itinerary_details);

                        unset($itinerary_image);
                    }      
                }
                $this->session->unset_userdata('itinerary_id');
                $this->session->set_flashdata('success', 'Itinerary Updated successfully!!!! ');
                redirect(PARTNER.'/viewPartnerItinerary');
            }
        }
    }
    
    public function PartnerPackageworkout()
    {
        $queryid = $this->uri->segment(3);
        if($queryid == ''){
            $data['query_id'] = '';
        }else{
            $data['query_id'] = $queryid;
        }
        $empDetails = $this->partner_model->getEmployeeId();
        $data['emp_id'] = $empDetails->id;
        $data['emp_name'] = $empDetails->name;
        $data['emp_mobile'] = $empDetails->mobile;
        $data['emp_mail'] = $empDetails->email;
        $data['partner_id'] = $this->global['partner_id'];
        $data['countries'] = $this->admin_model->getAllCountries();
        
        $this->global['pageTitle'] = 'Travwhizz : Partner Package Workout';
        $this->loadPartnerViews("partner/partnerPackageworkout", $this->global, $data, NULL);
        
    }
    
    public function viewPartnerPackageDetails($itinerary_id, $search_data)
    {
        if($itinerary_id == '' || $search_data == '') {
            $this->session->set_flashdata('error', 'There is Something Problem please Try again later.!!!! ');
            redirect(PARTNER.'/PartnerPackageworkout');
        }else{
            $data['editItiId'] = $itinerary_id;
            $searchDataStr = base64_decode($search_data);
            $searchDataArr = explode('S$S',$searchDataStr);
            //var_dump($searchDataArr);
            $paramArr = array();
            foreach($searchDataArr as $searcheddata)
            {
                $dataArr = explode('=',$searcheddata);
                $val = $dataArr[1];
                //var_dump($dataArr);
                if (strpos($val, '#') !== false)
                {
                    $val = explode('#', $val);  
                }
                $paramArr[$dataArr[0]] = $val;
            }

            if(is_array($paramArr['adults']))
            {
                $totalAdults = array_sum($paramArr['adults']);
            }
            else
            {
                $totalAdults = $paramArr['adults'];
            }
            if(is_array($paramArr['child']))
            {
                $totalKids = array_sum($paramArr['child']);
            }
            else
            {
                $totalKids = $paramArr['child'];
            }

            if(is_array($paramArr['infants']))
            {
                $totalinfants = array_sum($paramArr['infants']);
            }
            else
            {
                $totalinfants = $paramArr['infants'];

            }

            $data['totalAdults'] = $totalAdults;
            $data['totalKids'] = $totalKids;
            $data['totalinfants'] = $totalinfants;

            $sDate = explode('/',$paramArr['startdate']);
            $data['startdate'] = $startdate = $sDate[2].'-'.$sDate[1].'-'.$sDate[0];
            
            $eDate = explode('/',$paramArr['enddate']);
            $data['enddate'] = $enddate = $eDate[2].'-'.$eDate[1].'-'.$eDate[0];

            $data['searchrooms']    = $searchrooms = $paramArr['searchrooms'];
            
            $data['stayDuration']   = $stayDuration = $paramArr['stayDuration'];
            
            $data['adults']         = $adults = $paramArr['adults'];
            
            $data['child']          = $child = $paramArr['child'];
            
            $data['child_age']      = $child_age = $paramArr['child_age'];

            $data['infants']        = $infants = $paramArr['infants'];
            $data['queryid']        = $queryid = $paramArr['queryid'];
            //$data['queryname']      = $queryname = $paramArr['queryname'];
            $data['emp_id']         = $emp_id = $paramArr['emp_id'];
            $data['emp_name']       = $emp_name = $paramArr['emp_name'];
            $data['emp_mobile']     = $emp_mobile = $paramArr['emp_mobile'];
            $data['emp_mail']       = $emp_mail = $paramArr['emp_mail'];
            
            $data['itineraryData']  = $itineraryData = $this->partner_model->getPartnerIteneraryById($itinerary_id);

            $data['itineraryDetails'] = $itineraryDetails = $this->partner_model->getPartnerIteneraryDetailsById($itinerary_id);

            //$data['itineraryVehicle'] = $this->partner_model->getItinerarymultiplevehicle($itinerary_id);

            $data['itiTitle']       = $itineraryData['title'];

            $data['Itiduration']    = $itineraryData['duration'];
            $data['itiCity']        = $itineraryData['city'];

            //$data['vehcle_detail']  = $vehcle_detail = $this->admin_model->getItineraryVehicle($itinerary_id);

            $this->global['pageTitle'] = 'Travwhizz : View Partner Package Details';

            $data['searchData'] = $search_data;
            
            $this->loadPartnerViews("partner/viewPartnerPackageDetails", $this->global, $data, NULL);
        }
    }

    //End Of Itinerary
    
    /**
     * This function is used to show users profile
     */
    public function partnerProfile($active = "details")
    {
        if($this->isPartnerAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

        $partner_id = $this->global['partner_id'];
        $data["userInfo"] = $this->partner_model->getPartnerDetails($partner_id);
        $data["active"] = $active;
        $this->global['pageTitle'] = $active == "details" ? 'My Profile' : 'Change Password';
        $this->loadPartnerViews("partner/partnerProfile", $this->global, $data, NULL);
        }
    }
    
        /**
     * This function is used to update the user details
     * @param text $active : This is flag to set the active tab
     */
    public function PartnerProfileUpdate($active = "details")
    {
        $this->load->library('form_validation');
            
        $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
        $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
        $this->form_validation->set_rules('email','Email','trim|valid_email|max_length[128]');        
        
        if($this->form_validation->run() == FALSE)
        {
            $this->partnerProfile($active);
        }
        else
        {
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            $partnerId = $this->input->post('userId');
            if($email == ""){
                $email = strtolower($this->security->xss_clean($this->input->post('oldEmail')));
            }
            
            if(!empty($_FILES['logo']['name'])) {
                $config['upload_path'] = 'uploads/partner_logo/';
                $config['allowed_types'] = '*';
                $config['file_name'] = $_FILES['logo']['name'];
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('logo')){
                    $uploadData = $this->upload->data();
                    $partner_logo = $uploadData['file_name'];
                }else{
                    
                    $partner_logo = '';
                }
            }else{
                $partner_logo = $this->input->post('oldLogo');
            }
            $userInfo = array('name'=>$name, 'email'=>$email, 'mobile_no'=>$mobile, 'logo'=>$partner_logo, 'updated_at'=>date('Y-m-d H:i:s'));
            
            $result = $this->partner_model->editPartnerUser($userInfo, $partnerId);
            
            if($result == true)
            {
                $this->session->set_userdata('name', $name);
                $this->session->set_flashdata('success', 'Profile updated successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Profile updation failed');
            }

            redirect(PARTNER.'/partnerProfile/'.$active);
        }
    }
    
     /**
     * This function is used to check whether email already exist or not
     */
    function checkEmailExists()
    {
        $partner_id = $this->input->post("userId");
        $email = $this->input->post("email");

        if(empty($userId)){
            $result = $this->partner_model->checkEmailExists($email);
        } else {
            $result = $this->partner_model->checkEmailExists($email, $partner_id);
        }

        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }
    

}