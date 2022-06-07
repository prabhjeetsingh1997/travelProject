<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Sachin Gupta
 * @version : 1.1
 * @since : 12 March 2019
 */
class User extends BaseController
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
        $this->isLoggedIn();   
        //$this->load->library('email');
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Travwhizz : Dashboard';
        
        $this->loadViews("admin/dashboard", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the user list
     */
    function userListing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->user_model->userListingCount($searchText);

			$returns = $this->paginationCompress ( "userListing/", $count, 10 );
            
            $data['userRecords'] = $this->user_model->userListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Travwhizz : User Listing';
            
            $this->loadViews("users", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function addNew()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('user_model');
            $data['roles'] = $this->user_model->getUserRoles();
            
            $this->global['pageTitle'] = 'Travwhizz : Add New User';

            $this->loadViews("addNew", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to check whether email already exist or not
     */
    function checkEmailExists()
    {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if(empty($userId)){
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }
    
    /**
     * This function is used to add new user to the system
     */
    function addNewUser()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password','Password','required|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                
                $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId, 'name'=> $name,
                                    'mobile'=>$mobile, 'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));
                
                $this->load->model('user_model');
                $result = $this->user_model->addNewUser($userInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New User created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User creation failed');
                }
                
                redirect('addNew');
            }
        }
    }

    
    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editOld($userId = NULL)
    {
        if($this->isAdmin() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('userListing');
            }
            
            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->getUserInfo($userId);
            
            $this->global['pageTitle'] = 'Travwhizz : Edit User';
            
            $this->loadViews("editOld", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the user information
     */
    function editUser()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('userId');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password','Password','matches[cpassword]|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','matches[password]|max_length[20]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($userId);
            }
            else
            {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                
                $userInfo = array();
                
                if(empty($password))
                {
                    $userInfo = array('email'=>$email, 'roleId'=>$roleId, 'name'=>$name,
                                    'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                else
                {
                    $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId,
                        'name'=>ucwords($name), 'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 
                        'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                
                $result = $this->user_model->editUser($userInfo, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect('userListing');
            }
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $userId = $this->input->post('userId');
            $userInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->user_model->deleteUser($userId, $userInfo);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
    
    /**
     * Page not found : error 404
     */
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Travwhizz : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }

    /**
     * This function used to show login history
     * @param number $userId : This is user id
     */
    function loginHistoy($userId = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $userId = ($userId == NULL ? 0 : $userId);

            $searchText = $this->input->post('searchText');
            $fromDate = $this->input->post('fromDate');
            $toDate = $this->input->post('toDate');

            $data["userInfo"] = $this->user_model->getUserInfoById($userId);

            $data['searchText'] = $searchText;
            $data['fromDate'] = $fromDate;
            $data['toDate'] = $toDate;
            
            $this->load->library('pagination');
            
            $count = $this->user_model->loginHistoryCount($userId, $searchText, $fromDate, $toDate);

            $returns = $this->paginationCompress ( "login-history/".$userId."/", $count, 10, 3);

            $data['userRecords'] = $this->user_model->loginHistory($userId, $searchText, $fromDate, $toDate, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Travwhizz : User Login History';
            
            $this->loadViews("loginHistory", $this->global, $data, NULL);
        }        
    }

    /**
     * This function is used to show users profile
     */
    function profile($active = "details")
    {
        $data["userInfo"] = $this->user_model->getUserInfoWithRole($this->vendorId);
        $data["active"] = $active;
        
        $this->global['pageTitle'] = $active == "details" ? 'Travwhizz : My Profile' : 'Travwhizz : Change Password';
        $this->loadViews("profile", $this->global, $data, NULL);
    }

    /**
     * This function is used to update the user details
     * @param text $active : This is flag to set the active tab
     */
    function profileUpdate($active = "details")
    {
        $this->load->library('form_validation');
            
        $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
        $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]|callback_emailExists');        
        
        if($this->form_validation->run() == FALSE)
        {
            $this->profile($active);
        }
        else
        {
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            
            $userInfo = array('name'=>$name, 'email'=>$email, 'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->user_model->editUser($userInfo, $this->vendorId);
            
            if($result == true)
            {
                $this->session->set_userdata('name', $name);
                $this->session->set_flashdata('success', 'Profile updated successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Profile updation failed');
            }

            redirect('profile/'.$active);
        }
    }

    /**
     * This function is used to change the password of the user
     * @param text $active : This is flag to set the active tab
     */
    function changePassword($active = "changepass")
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('oldPassword','Old password','required|max_length[20]');
        $this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->profile($active);
        }
        else
        {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');
            
            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);
            
            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Your old password is not correct');
                redirect('profile/'.$active);
            }
            else
            {
                $usersData = array('password'=>getHashedPassword($newPassword), 'updatedBy'=>$this->vendorId,
                                'updatedDtm'=>date('Y-m-d H:i:s'));
                
                $result = $this->user_model->changePassword($this->vendorId, $usersData);
                
                if($result > 0) { $this->session->set_flashdata('success', 'Password updation successful'); }
                else { $this->session->set_flashdata('error', 'Password updation failed'); }
                
                redirect('profile/'.$active);
            }
        }
    }

    /**
     * This function is used to check whether email already exist or not
     * @param {string} $email : This is users email
     */
    function emailExists($email)
    {
        $userId = $this->vendorId;
        $return = false;

        if(empty($userId)){
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if(empty($result)){ $return = true; }
        else {
            $this->form_validation->set_message('emailExists', 'The {field} already taken');
            $return = false;
        }

        return $return;
    }

    public function viewCountries($var = null)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            $data['countries'] = $this->admin_model->getAllCountries();

            $this->global['pageTitle'] = 'Travwhizz : All Countires List';
            
            $this->loadViews("admin/viewCountries", $this->global, $data, NULL);
        }
    }

    public function addCountry($var = null)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $this->global['pageTitle'] = 'Travwhizz : Add Country';
            
            $this->loadViews("admin/addCountry", $this->global, NULL);
        }
    }

    public function uploadCountry()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $country_name   = $this->input->post('country_name');
            $country_status = $this->input->post('country_status');

            $data = array(
                'country_name'  => $this->input->post('country_name'),
                'status'        => $this->input->post('country_status')
            );

            $result = $this->admin_model->addNewCountry($data);

            $this->global['pageTitle'] = 'Travwhizz : Add Country';

            if($result > 0)
            {
                $this->session->set_flashdata('success', 'New Country created successfully');
                redirect(ADMIN_URL.'/viewCountries');
            }
            else
            {
                $this->session->set_flashdata('error', 'New Country creation failed');
                 redirect(ADMIN_URL.'/viewCountries');
            }
        }
    }

    public function editCountry($country_id)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
            if ($country_id == '') {
               redirect(ADMIN_URL.'/viewCountries');
            }

            $data['country'] = $this->admin_model->getCountry($country_id);
            
            $this->global['pageTitle'] = 'Travwhizz : Edit Country';
            
            $this->loadViews("admin/editCountry", $this->global, $data, NULL);
        }
    }

    public function updateCountry()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $country_name   = $this->input->post('country_name');
            $country_id = $this->input->post('country_id');

            $data = array(
                'country_name'  => $this->input->post('country_name')
            );

            $result = $this->admin_model->updateCountry($data, $country_id);

            $this->global['pageTitle'] = 'Travwhizz : Add Country';

            if($result > 0)
            {
                $this->session->set_flashdata('success', 'Country updated successfully');
                redirect(ADMIN_URL.'/viewCountries');
            }
            else
            {
                $this->session->set_flashdata('error', 'Country updation failed');
                 redirect(ADMIN_URL.'/viewCountries');
            }
        }
    }

    public function viewState($var = null)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            $data['state'] = $this->admin_model->getAllState();

            $this->global['pageTitle'] = 'Travwhizz : All State List';
            
            $this->loadViews("admin/viewState", $this->global, $data, NULL);
        }
    }

    public function addState($var = null)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $data['countries'] = $this->admin_model->getAllCountries();
            
            $this->global['pageTitle'] = 'Travwhizz : Add State';
            
            $this->loadViews("admin/addState", $this->global, $data, NULL);
        }
    }

    public function uploadState()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $state_name     = $this->input->post('state_name');
            $state_status   = $this->input->post('state_status');
            $country_id     = $this->input->post('country_id');

            $data = array(
                'country_id'        => $country_id,
                'state_name'        => $state_name,
                'status'            => $state_status
            );

            $result = $this->admin_model->addNewState($data);

            $this->global['pageTitle'] = 'Travwhizz : Add State';

            if($result > 0)
            {
                $this->session->set_flashdata('success', 'New State created successfully');
                redirect(ADMIN_URL.'/viewState');
            }
            else
            {
                $this->session->set_flashdata('error', 'New State creation failed');
                 redirect(ADMIN_URL.'/viewState');
            }
        }
    }

    public function editState($state_id,$country_id)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
            if ($country_id == '' || $state_id == '') {
               redirect(ADMIN_URL.'/viewState');
            }
            $data['countries'] = $this->admin_model->getAllCountries();
            $data['state'] = $this->admin_model->getState($state_id,$country_id);
            
            $this->global['pageTitle'] = 'Travwhizz : Edit State';
            
            $this->loadViews("admin/editState", $this->global, $data, NULL);
        }
    }

    public function updateState()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $state_id       = $this->input->post('state_id');
            $country_id     = $this->input->post('country_id');
            $state_name     = $this->input->post('state_name');

            $data = array(
                'country_id'    => $country_id,
                'state_name'    => $state_name,
                'status'        => 1
            );  

            $result = $this->admin_model->updateState($data,$state_id);

            $this->global['pageTitle'] = 'Travwhizz : update State';

            if($result > 0)
            {
                $this->session->set_flashdata('success', 'State updated successfully');
                redirect(ADMIN_URL.'/viewState');
            }
            else
            {
                $this->session->set_flashdata('error', 'State updation failed');
                 redirect(ADMIN_URL.'/viewState');
            }
        }
    }

    public function viewCity($var = null)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $data['cities'] = $this->admin_model->getAllCity();

            $this->global['pageTitle'] = 'Travwhizz : All City List';
            
            $this->loadViews("admin/viewCity", $this->global, $data, NULL);
        }
    }

    public function addCity($var = null)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $data['countries'] = $this->admin_model->getAllCountries();
            
            $this->global['pageTitle'] = 'Travwhizz : Add State';
            
            $this->loadViews("admin/addCity", $this->global, $data, NULL);
        }
    }

    public function uploadCity()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $state_id       = $this->input->post('state_id');
            $city_status    = $this->input->post('city_status');
            $country_id     = $this->input->post('country_id');
            $city_name      = $this->input->post('city_name');

            $data = array(
                'state_id'          => $state_id,
                'city_name'         => $city_name,
                'status'            => $city_status
            );

            $result = $this->admin_model->addNewCity($data);

            $this->global['pageTitle'] = 'Travwhizz : Add City';

            if($result > 0)
            {
                $this->session->set_flashdata('success', 'New City created successfully');
                redirect(ADMIN_URL.'/viewCity');
            }
            else
            {
                $this->session->set_flashdata('error', 'New City creation failed');
                 redirect(ADMIN_URL.'/viewCity');
            }
        }
    }

    public function editCity($city_id, $state_id, $country_id)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
            if ($country_id == '' || ($state_id == '' || $city_id == '')) {
               redirect(ADMIN_URL.'/viewCity');
            }
            $data['states']         = $this->admin_model->getStateByCountryId($country_id);
            $data['city']         = $this->admin_model->getCity($city_id,$state_id);
            
            $this->global['pageTitle'] = 'Travwhizz : Edit State';
            
            $this->loadViews("admin/editCity", $this->global, $data, NULL);
        }
    }

    public function updateCity()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $city_id       = $this->input->post('city_id');
            $state_id     = $this->input->post('state_id');
            $city_name     = $this->input->post('city_name');

            $data = array(
                'state_id'      => $state_id,
                'city_name'     => $city_name,
                'status'        => 1
            );  

            $result = $this->admin_model->updateCity($data, $city_id);

            $this->global['pageTitle'] = 'Travwhizz : update City';

            if($result > 0)
            {
                $this->session->set_flashdata('success', 'City updated successfully');
                redirect(ADMIN_URL.'/viewCity');
            }
            else
            {
                $this->session->set_flashdata('error', 'City updation failed');
                 redirect(ADMIN_URL.'/viewCity');
            }
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

    public function addEmployee()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $data['countries'] = $this->admin_model->getAllCountries();
            
            $this->global['pageTitle'] = 'Travwhizz : Add Employee';
            
            $this->loadViews("admin/addEmployee", $this->global, $data, NULL);
        }
    }

    public function addNewEmployee()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $userInfo = array(
                'email'                 => $this->input->post('primary_email'),
                'secondary_email'       => $this->input->post('secondary_email'),
                'password'              => getHashedPassword($this->input->post('password')),
                'title'                 => $this->input->post('employee-title[0]'),
                'name'                  => $this->input->post('name'),
                'mobile'                => $this->input->post('mobile_no'),
                'alternative_number'    => $this->input->post('alternative_number'),
                'father_name'           => $this->input->post('father_name'),
                'mother_name'           => $this->input->post('mother_name'),
                'emergency_contact'     => $this->input->post('emergency_no'),
                'dob'                   => $this->input->post('dob'),
                'roleId'                => 2,
                'createdBy'             => 1,
                'createdDtm'            =>date('Y-m-d H:i:s')
            );

            $user_id = $this->admin_model->addUserDetails($userInfo);

            if ($user_id > 0) {
                
                $primary_address = array(
                    'user_id'              => $user_id,
                    'address_line_1'       => $this->input->post('address_line_1'),
                    'address_line_2'       => $this->input->post('address_line_2'),
                    'zip'                  => $this->input->post('zip'),
                    'country_id'           => $this->input->post('country_id'),
                    'state_id'             => $this->input->post('state_id'),
                    'city_id'              => $this->input->post('city_id'),
                );

                $address_id = $this->admin_model->addUserprimaryAddress($primary_address);

                $official_address  = array(
                    'user_id'           => $user_id,
                    'designation'       => $this->input->post('designation'),
                    'department'        => $this->input->post('department'),
                    'joining_date'      => $this->input->post('joining_date'),
                    'termination_date'  => $this->input->post('termination_date'),
                );

                $official_detail = $this->admin_model->addUserOfficialAddress($official_address);

                $banking_detail = array(
                    'user_id'               => $user_id,
                    'pan_no'                => $this->input->post('pan_no'),
                    'account_no'            => $this->input->post('account_no'),
                    'account_holder_name'   => $this->input->post('holder_name'),
                    'bank_name'             => $this->input->post('bank_name'),
                    'branch'                => $this->input->post('branch'),
                    'ifsc'                  => $this->input->post('ifsc'),
                );

                $banking_detail = $this->admin_model->addUserBankingDetails($banking_detail);

                $data['countries'] = $this->admin_model->getAllCountries();
            
                $this->session->set_flashdata('success', 'Employee Created successfully');
                
                redirect(ADMIN_URL.'/viewEmployee');

            }else{
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                
                redirect(ADMIN_URL.'/viewEmployee');
            }
        }
    }

    public function viewEmployee()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $data['employees'] = $this->admin_model->getAllEmployeeList();

            $this->global['pageTitle'] = 'Travwhizz : All Employee List';
            
            $this->loadViews("admin/viewEmployee", $this->global, $data, NULL);
        }
    }

    public function editEmployee($employee_id)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            if ($employee_id == '') {
               redirect(ADMIN_URL.'/viewEmployee');
            }

            $data['employee'] = $this->admin_model->getAllEmployeeById($employee_id);

            $data['countries'] = $this->admin_model->getAllCountries();

            $data['cities'] = $this->admin_model->getAllCity();

            $data['states'] = $this->admin_model->getAllState();

            if (!empty($data['employee'])) {
              
                $this->global['pageTitle'] = 'Travwhizz : Edit Employee';
                $this->loadViews("admin/editEmployee", $this->global, $data, NULL);
            }else{
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                
                redirect(ADMIN_URL.'/viewEmployee');
            }  
        }
    }

    public function updateEmployee()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $employee_id = $this->input->post('employee_id');

            $userInfo = array(
                'email'                 => $this->input->post('primary_email'),
                'secondary_email'       => $this->input->post('secondary_email'),
                'title'                 => $this->input->post('employee-title[0]'),
                'name'                  => $this->input->post('name'),
                'mobile'                => $this->input->post('mobile_no'),
                'alternative_number'    => $this->input->post('alternative_number'),
                'father_name'           => $this->input->post('father_name'),
                'mother_name'           => $this->input->post('mother_name'),
                'emergency_contact'     => $this->input->post('emergency_no'),
                'dob'                   => $this->input->post('dob'),
                'roleId'                => 1,
                'createdBy'             => 1,
                'createdDtm'            =>date('Y-m-d H:i:s')
            );

            $user_id = $this->admin_model->updateUserDetails($userInfo,$employee_id);

            if ($user_id > 0) {
                
                $primary_address = array(
                    'address_line_1'       => $this->input->post('address_line_1'),
                    'address_line_2'       => $this->input->post('address_line_2'),
                    'zip'                  => $this->input->post('zip'),
                    'country_id'           => $this->input->post('country_id'),
                    'state_id'             => $this->input->post('state_id'),
                    'city_id'              => $this->input->post('city_id'),
                );

                $address_id = $this->admin_model->updateUserprimaryAddress($primary_address,$employee_id);

                $official_address  = array(
                    'designation'       => $this->input->post('designation'),
                    'department'        => $this->input->post('department'),
                    'joining_date'      => $this->input->post('joining_date'),
                    'termination_date'  => $this->input->post('termination_date'),
                );

                $official_detail = $this->admin_model->updateUserOfficialAddress($official_address,$employee_id);

                $banking_detail = array(
                    'pan_no'                => $this->input->post('pan_no'),
                    'account_no'            => $this->input->post('account_no'),
                    'account_holder_name'   => $this->input->post('holder_name'),
                    'bank_name'             => $this->input->post('bank_name'),
                    'branch'                => $this->input->post('branch'),
                    'ifsc'                  => $this->input->post('ifsc'),
                );

                $banking_detail = $this->admin_model->updateUserBankingDetails($banking_detail,$employee_id);

                $data['countries'] = $this->admin_model->getAllCountries();
            
                $this->session->set_flashdata('success', 'Employee updated successfully');
                
                redirect(ADMIN_URL.'/viewEmployee');

            }else{
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                
                redirect(ADMIN_URL.'/viewEmployee');
            }
        }
    }

    public function deleteEmployee($employee_id)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            if ($employee_id == '') {
                redirect(ADMIN_URL.'/viewEmployee');
            }

            $data  = $this->admin_model->deleteEmployeeById($employee_id);

            if ($data > 0) {
                $this->session->set_flashdata('success', 'Employee Delete successfully');
                
                redirect(ADMIN_URL.'/viewEmployee');
            }else{
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                
                redirect(ADMIN_URL.'/viewEmployee');
            }
        }
    }

    public function addVendor()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $data['countries'] = $this->admin_model->getAllCountries();
            
            $this->global['pageTitle'] = 'Travwhizz : Add Vendor';
            
            $this->loadViews("admin/addVendor", $this->global, $data, NULL);
        }
    }

    public function addNewVendor()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $vendorInfo = array(
                'company_name'                  => $this->input->post('company_name'),
                'address_line_1'                => $this->input->post('address_line_1'),
                'address_line_2'                => $this->input->post('address_line_2'),
                'country_id'                    => $this->input->post('country_id'),
                'state_id'                      => $this->input->post('state_id'),
                'city_id'                       => $this->input->post('city_id'),
                'zip'                           => $this->input->post('zip'),
                'contact_no'                    => $this->input->post('travel_agent_contact'),
                'alternative_no'                => $this->input->post('travel_agent_alternative'),
                'description'                   => $this->input->post('description'),
                'created_at'                    =>date('Y-m-d H:i:s')
            );

            $vendor_id = $this->admin_model->addVendorDetails($vendorInfo);

            if ($vendorInfo > 0) {
                
                $extra_details = array(
                    'vendor_id'                 => $vendor_id,
                    'title'                     => $this->input->post('concerned-title[0]'),
                    'concern_person_name'       => $this->input->post('concern_name'),
                    'concern_contact_no'        => $this->input->post('concern_contact'),
                    'secondry_no'               => $this->input->post('concern_alternative'),
                    'email'                     => $this->input->post('concern_email'),
                    'alternative_email'         => $this->input->post('concern_secondry_email'),
                );

                $extra_detail_id = $this->admin_model->addvendorExtraDetails($extra_details);

                $banking_detail = array(
                    'vendor_id'               => $vendor_id,
                    'pan_no'                => $this->input->post('pan_no'),
                    'account_no'            => $this->input->post('account_no'),
                    'account_holder_name'   => $this->input->post('holder_name'),
                    'bank_name'             => $this->input->post('bank_name'),
                    'branch'                => $this->input->post('branch'),
                    'ifsc'                  => $this->input->post('ifsc'),
                );

                $banking_detail = $this->admin_model->addVendorBankingDetails($banking_detail);

                $this->session->set_flashdata('success', 'Vendor Created successfully');
                
                redirect(ADMIN_URL.'/viewVendor');

            }else{
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                
                redirect(ADMIN_URL.'/viewVendor');
            }
        }
    }

    public function viewVendor()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $data['vendors'] = $this->admin_model->getAllVendorList();

            $this->global['pageTitle'] = 'Travwhizz : All Vendor List';
            
            $this->loadViews("admin/viewVendor", $this->global, $data, NULL);
        }
    }

    public function editVendor($vendor_id)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            if ($vendor_id == '') {
               redirect(ADMIN_URL.'/viewVendor');
            }

            $data['vendor'] = $this->admin_model->getVendorById($vendor_id);

            $data['countries'] = $this->admin_model->getAllCountries();

            $data['cities'] = $this->admin_model->getAllCity();

            $data['states'] = $this->admin_model->getAllState();

            if (!empty($data['vendor'])) {
              
                $this->global['pageTitle'] = 'Travwhizz : Edit Vendor';
                $this->loadViews("admin/editVendor", $this->global, $data, NULL);
            }else{
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                
                redirect(ADMIN_URL.'/viewVendor');
            }  
        }
    }

    public function updateVendor()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $vendor_id = $this->input->post("vendor_id");

            $vendorInfo = array(
                'company_name'                  => $this->input->post('company_name'),
                'address_line_1'                => $this->input->post('address_line_1'),
                'address_line_2'                => $this->input->post('address_line_2'),
                'country_id'                    => $this->input->post('country_id'),
                'state_id'                      => $this->input->post('state_id'),
                'city_id'                       => $this->input->post('city_id'),
                'zip'                           => $this->input->post('zip'),
                'contact_no'                    => $this->input->post('travel_agent_contact'),
                'alternative_no'                => $this->input->post('travel_agent_alternative'),
                'description'                   => $this->input->post('description'),
                'created_at'                    =>date('Y-m-d H:i:s')
            );

            $vendor_id = $this->admin_model->updateVendorDetails($vendorInfo,$vendor_id);

            if ($vendorInfo > 0) {
                
                $extra_details = array(
                    'vendor_id'                 => $vendor_id,
                    'title'                     => $this->input->post('concerned-title[0]'),
                    'concern_person_name'       => $this->input->post('concern_name'),
                    'concern_contact_no'        => $this->input->post('concern_contact'),
                    'secondry_no'               => $this->input->post('concern_alternative'),
                    'email'                     => $this->input->post('concern_email'),
                    'alternative_email'         => $this->input->post('concern_secondry_email'),
                );

                $extra_detail_id = $this->admin_model->updatevendorExtraDetails($extra_details,$vendor_id);

                $banking_detail = array(
                    'vendor_id'               => $vendor_id,
                    'pan_no'                => $this->input->post('pan_no'),
                    'account_no'            => $this->input->post('account_no'),
                    'account_holder_name'   => $this->input->post('holder_name'),
                    'bank_name'             => $this->input->post('bank_name'),
                    'branch'                => $this->input->post('branch'),
                    'ifsc'                  => $this->input->post('ifsc'),
                );

                $banking_detail = $this->admin_model->updateVendorBankingDetails($banking_detail,$vendor_id);

                $this->session->set_flashdata('success', 'Vendor Updated successfully');
                
                redirect(ADMIN_URL.'/viewVendor');

            }else{
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                
                redirect(ADMIN_URL.'/viewVendor');
            }
        }
    }

    public function deleteVendor($vendor_id)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            if ($vendor_id == '') {
                redirect(ADMIN_URL.'/viewVendor');
            }

            $data  = $this->admin_model->deleteVendorById($vendor_id);

            if ($data > 0) {
                $this->session->set_flashdata('success', 'Vendor Delete successfully');
                
                redirect(ADMIN_URL.'/viewVendor');
            }else{
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                
                redirect(ADMIN_URL.'/viewEmployee');
            }
        }
    }

    public function viewHotelPartner()
    {
       if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            $data['hotel_partners'] = $hotel_partners = $this->admin_model->getAllHotelPartner();

            $this->global['pageTitle'] = 'Travwhizz : All Hotel Partner List';
            
            //print_r($hotel_partners);
            $this->loadViews("admin/viewHotelPartner", $this->global, $data, NULL);
        }
    }

    public function activateHotelPartner($hotel_partner_id)
    {
       if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            if($hotel_partner_id == '') {
               redirect(ADMIN_URL.'/viewHotelPartner');
            }

            $data = array(
                'status' => 1 
            );   

            $activated_hotel_partner = $this->admin_model->activateHotelPartner($hotel_partner_id,$data);

            if($activated_hotel_partner > 0) {
                $this->session->set_flashdata('success', 'Hotel Partner Activated successfully');
                redirect(ADMIN_URL.'/viewHotelPartner');
            }else{
                $this->session->set_flashdata('error', 'Could not activate at this Moment. Please try again later');
                redirect(ADMIN_URL.'/viewHotelPartner');
            }
        }
    }
    
    public function deactivateHotelPartner($hotel_partner_id)
    {
       if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            if($hotel_partner_id == '') {
               redirect(ADMIN_URL.'/viewHotelPartner');
            }

            $data = array(
                'status' => 0 
            );   

            $deactivate_hotel_partner = $this->admin_model->deactivateHotelPartner($hotel_partner_id, $data);

            if($deactivate_hotel_partner > 0) {
                $this->session->set_flashdata('success', 'Hotel Partner And All Hotels Deactivated successfully');
                redirect(ADMIN_URL.'/viewHotelPartner');
            }else{
                $this->session->set_flashdata('error', 'Could not deactivate at this moment. Please try again later');
                redirect(ADMIN_URL.'/viewHotelPartner');
            }
        }
    }

    public function addPartner()
    {
       if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            
            $data['countries'] = $this->admin_model->getAllCountries();

            $this->global['pageTitle'] = 'Travwhizz : All Partner';
            
            $this->loadViews("admin/addPartner", $this->global, $data, NULL);
        }
    }

    public function viewPartner()
    {
       if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            $data['partners'] = $this->admin_model->getAllPartners();

            $this->global['pageTitle'] = 'Travwhizz : All Partner List';
            
            $this->loadViews("admin/viewPartner", $this->global, $data, NULL);
        }
    }

    public function addNewPartner()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            if(!empty($_FILES['logo']['name'])){
                $config['upload_path'] = 'uploads/partner_logo/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['logo']['name'];

                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('logo')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
            }else{
                $picture = '';
            }

             //Prepare array of user data
            $data = array(
                'title'                 => $this->input->post('partner-title[0]'),
                'name'                  => $this->input->post('name'),
                'email'                 => $this->input->post('email'),
                'password'              => getHashedPassword($this->input->post('password')),
                'mobile_no'             => $this->input->post('mobile_no'),
                'alternative_no'        => $this->input->post('alternative_no'),
                'address_line_1'        => $this->input->post('address_line_1'),
                'address_line_2'        => $this->input->post('address_line_2'),
                'country_id'            => $this->input->post('country_id'),
                'state_id'              => $this->input->post('state_id'),
                'city_id'               => $this->input->post('city_id'),
                'zip'                   => $this->input->post('zip'),
                'markup'                => $this->input->post('markup'),
                'logo'                  => $picture,
                'roleId'                => 1,
                'email_varified'        => 1,
                'status'                => 1,
                'company_name'          => $this->input->post('compnay_name'),
                'company_address_1'     => $this->input->post('com_address_line_1'),
                'company_address_2'     => $this->input->post('com_address_line_2'),
                'company_country_id'    => $this->input->post('com_country_id'),
                'company_state_id'      => $this->input->post('com_state_id'),
                'company_city_id'       => $this->input->post('com_city_id'),
                'company_zip'           => $this->input->post('com_zip'),
                'company_email'         => $this->input->post('com_email'),
                'company_concern_person'=> $this->input->post('com_concern_name'),
                'concern_mobile'        => $this->input->post('concern_mobile_no'),
                'concern_email'         => $this->input->post('con_email'),
                'hotel_management'      => $this->input->post('hotel_management'),
                //'employee_management'   => $this->input->post('employee_management'),
                'query_management'      => $this->input->post('query_management'),
                'client_management'     => $this->input->post('client_management'),
                'vendor_management'     => $this->input->post('vendor_management'),
                'tourcard_management'   => $this->input->post('tourcard_management'),
                //'workout_management'    => $this->input->post('workout_management'),
                'accounts_management'   => $this->input->post('accounts_management'),
                'created_at'            => date('Y-m-d H:i:s')
            );

            $partner_id = $this->admin_model->addNewPartner($data);
            // if($data > 0){
                
            //     $purchaseddata = array(
            //         'partner_id'            => $partner_id,
            //         'hotel_management'      => $this->input->post('hotel_management'),
            //         //'employee_management'   => $this->input->post('employee_management'),
            //         'query_management'      => $this->input->post('query_management'),
            //         'client_management'     => $this->input->post('client_management'),
            //         'vendor_management'     => $this->input->post('vendor_management'),
            //         'tourcard_management'   => $this->input->post('tourcard_management'),
            //         //'workout_management'    => $this->input->post('workout_management'),
            //         'accounts_management'   => $this->input->post('accounts_management'),
            //         'created_at'            => date('Y-m-d H:i:s')
            //         );
                
            //     $partner_id = $this->admin_model->PartnerSubscription($purchaseddata);
            // }
            if($partner_id > 0) {
                 $this->session->set_flashdata('success', 'Partner Created successfully');
                redirect(ADMIN_URL.'/viewPartner');
            }else{
                $this->session->set_flashdata('error', 'There is something problem! Please try again later');
                redirect(ADMIN_URL.'/viewPartner');
            }
        }
    }
    
    public function editPartner($partner_id)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            if ($partner_id == '') {
               redirect(ADMIN_URL.'/viewPartner');
            }

            $data['partner'] = $this->admin_model->getPartnerById($partner_id);

            $data['countries'] = $this->admin_model->getAllCountries();

            $data['cities'] = $this->admin_model->getAllCity();

            $data['states'] = $this->admin_model->getAllState();

            if (!empty($data['partner'])) {
              
                $this->global['pageTitle'] = 'Travwhizz : Edit Partner';
                $this->loadViews("admin/editPartner", $this->global, $data, NULL);
            }else{
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                
                redirect(ADMIN_URL.'/viewPartner');
            }  
        }
    }
    
    public function updatePartner()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else{
            if(!empty($_FILES['logo']['name'])){
                $config['upload_path'] = 'uploads/partner_logo/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['logo']['name'];

                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('logo')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
            }else{
                $picture = '';
            }

            $partner_id = $this->input->post('partner_id');

            $data = array(
                'title'                 => $this->input->post('partner-title[0]'),
                'name'                  => $this->input->post('name'),
                'email'                 => $this->input->post('email'),
                //'password'              => getHashedPassword($this->input->post('password')),
                'mobile_no'             => $this->input->post('mobile_no'),
                'alternative_no'        => $this->input->post('alternative_no'),
                'address_line_1'        => $this->input->post('address_line_1'),
                'address_line_2'        => $this->input->post('address_line_2'),
                'country_id'            => $this->input->post('country_id'),
                'state_id'              => $this->input->post('state_id'),
                'city_id'               => $this->input->post('city_id'),
                'zip'                   => $this->input->post('zip'),
                'markup'                => $this->input->post('markup'),
                //'logo'                  => $picture,
                // 'roleId'                => 1,
                // 'email_varified'        => 1,
                // 'status'                => 1,
                'company_name'          => $this->input->post('compnay_name'),
                'company_address_1'     => $this->input->post('com_address_line_1'),
                'company_address_2'     => $this->input->post('com_address_line_2'),
                'company_country_id'    => $this->input->post('com_country_id'),
                'company_state_id'      => $this->input->post('com_state_id'),
                'company_city_id'       => $this->input->post('com_city_id'),
                'company_zip'           => $this->input->post('com_zip'),
                'company_email'         => $this->input->post('com_email'),
                'company_concern_person'=> $this->input->post('com_concern_name'),
                'concern_mobile'        => $this->input->post('concern_mobile_no'),
                'concern_email'         => $this->input->post('con_email'),
                'hotel_management'      => $this->input->post('hotel_management'),
                //'employee_management'   => $this->input->post('employee_management'),
                'query_management'      => $this->input->post('query_management'),
                'client_management'     => $this->input->post('client_management'),
                'vendor_management'     => $this->input->post('vendor_management'),
                'tourcard_management'   => $this->input->post('tourcard_management'),
                //'workout_management'    => $this->input->post('workout_management'),
                'accounts_management'   => $this->input->post('accounts_management'),
                'updated_at'            => date('Y-m-d H:i:s')
            );
            
             $data = $this->admin_model->updatePartner($data, $partner_id);
             
            }
            if($data > 0){
                 $this->session->set_flashdata('success', 'Partner updated successfully');
                 redirect(ADMIN_URL.'/viewPartner');

            }
            else{
                $this->session->set_flashdata('error', 'There is Something problem! please try again later');
                redirect(ADMIN_URL.'/viewPartner');
            }
        
        
    }

    public function viewHotel()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            $this->global['pageTitle'] = 'Travwhizz : View Hotel';

            $data['partners_hotel'] = $this->admin_model->getAllActiveHotel();
            
            $this->loadViews("admin/viewHotel", $this->global, $data , NULL);
        }
    }

    public function editHotel($tab, $hotel_id)
    {
        $this->global['pageTitle'] = 'Travwhizz : Edit Hotel';
        if ($hotel_id == '') {
            $this->session->set_flashdata('error', 'There is something problem. Please try again! ');
            redirect(ADMIN_URL.'/viewHotel');
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
            $data['hotel_detail'] = $this->hotel_model->getHotelByHotelId($hotel_id);
            $data['hotel_bank_details'] = $this->hotel_model->getHotelBankDetailById($hotel_id);
            $data['hotel_documents'] = $this->hotel_model->getHotelDocumentsById($hotel_id);
            $data['hotel_photos'] = $this->hotel_model->getHotelPhotosById($hotel_id);
            $data['hotel_rooms'] = $this->hotel_model->getHotelRoomsById($hotel_id);
            $data['room_service_details']   = $this->hotel_model->getHotelRoomDetails($hotel_id );
            $data['getallRoom'] = $this->hotel_model->getAllHotelRoom();
            $data['date_rates_detail'] = $this->hotel_model->getDateRatesByid($hotel_id);
            $data['countries'] = $this->admin_model->getAllCountries();
            $data['cities'] = $this->admin_model->getAllCity();
            $data['states'] = $this->admin_model->getAllState();

            $this->loadViews("admin/editHotel", $this->global, $data , NULL);
        }
    }

    public function viewInactiveHotel()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            $this->global['pageTitle'] = 'Travwhizz : View Inactive Hotel';

            $data['partners_hotel'] = $this->admin_model->getAllInActiveHotel();
            
            $this->loadViews("admin/viewInactiveHotel", $this->global, $data , NULL);
        }
    }

    public function activateHotel($hotel_id)
    {
       if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            if ($hotel_id == '') {
                $this->session->set_flashdata('error', 'There is something problem. Please try again! ');
                redirect(ADMIN_URL.'/viewHotel');
            }
            $this->global['pageTitle'] = 'Travwhizz : Activate Hotel';

            $data = array(
                'status' => 1
            );

            $activate_hotel= $this->admin_model->ActivateHotel($data,base64_decode($hotel_id));

            if ($activate_hotel > 0 ) {
               $this->session->set_flashdata('success', 'Hotel is Activated Successfully! ');
                redirect(ADMIN_URL.'/viewHotel');
            }else{
                $this->session->set_flashdata('error', 'There is something problem. Please try again! ');
                redirect(ADMIN_URL.'/viewInactiveHotel');
            }
        }
    }

    public function deactivateHotel($hotel_id)
    {
       if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            if ($hotel_id == '') {
                $this->session->set_flashdata('error', 'There is something problem. Please try again! ');
                redirect(ADMIN_URL.'/viewHotel');
            }
            $this->global['pageTitle'] = 'Travwhizz : DeActivate Hotel';

            $data = array(
                'status' => 0
            );

            $activate_hotel= $this->admin_model->deActivateHotel($data,base64_decode($hotel_id));

            if ($activate_hotel > 0 ) {
               $this->session->set_flashdata('success', 'Hotel is DeActivated Successfully! ');
                redirect(ADMIN_URL.'/viewInactiveHotel');
            }else{
                $this->session->set_flashdata('error', 'There is something problem. Please try again! ');
                redirect(ADMIN_URL.'/viewHotel');
            }
        }
    }

    public function viewVehicle()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            $data['vehicles'] = $this->admin_model->getAllVehicle();

            $this->global['pageTitle'] = 'Travwhizz : All Vehicle List';
            
            $this->loadViews("admin/viewVehicle", $this->global, $data, NULL);
        }
    }

    public function addVehicle()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

        	$data = array(
                'vehicle_name'  => $this->input->post('vehicle_name'),
                'status'        => 1,
                'created_at'  	=> date('Y-m-d H:i:s')
            );

            $result = $this->admin_model->addNewVehicle($data);

            if ($result != '') {
            	echo 1;
            	exit;
            }else{
            	echo 0;
            	exit;
            }
        }
    }

    public function editVehicle($country_id)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

        	$vehicle_id = $this->input->post("vehicle_id");

        	$data = array(
                'vehicle_name'  => $this->input->post('vehicle_name'),
                'updated_at'  	=> date('Y-m-d H:i:s')
            );

            $result = $this->admin_model->updateVehicle($data, $vehicle_id);

            if ($result != '') {
            	echo 1;
            	exit;
            }else{
            	echo 0;
            	exit;
            }
        }
    }

    public function deleteVehicle($vehicle_id)
    {
    	if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
        	if ($vehicle_id == '') {
        		$this->session->set_flashdata('error', 'There is something problem. Please try again! ');
                redirect(ADMIN_URL.'/viewVehicle');
        	}else{
        		$delete_vehicle = $this->admin_model->deleteVehicle($vehicle_id);
        		if ($delete_vehicle > 0) {
        			$this->session->set_flashdata('success', 'Vehicle deleted successfully! ');
                	redirect(ADMIN_URL.'/viewVehicle');
        		}else{
        			$this->session->set_flashdata('error', 'There is something problem. Please try again! ');
                	redirect(ADMIN_URL.'/viewVehicle');
        		}
        	}
        }
    }

    public function viewItinerary()
    {
    	if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            $data['itinerary_details'] = $this->admin_model->getAllBasicItineraryDetails();

            $this->global['pageTitle'] = 'Travwhizz : All Itinerary List';
            
            $this->loadViews("admin/viewItinerary", $this->global, $data, NULL);
        }
    }

    public function getItineraryState()
    {
    	if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
        	$id = $this->input->post('id');
        	if ($id == '') {
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
    }

    public function getItineraryCity()
    {
    	if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
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
    }

    public function getDurationTables()
    {
    	if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
        	extract($this->input->post());
        	if ($states == '' ) {
        		$durationsCity = array();
        	}else{
        		$durationsCity = $this->admin_model->getItinerarycity($states);

        		$durationsVehicle = $this->admin_model->getMasterVehicle();

        		$durationsVendors = $this->admin_model->getVendorDetails();

        		$data['cities'] = '<option value="0">Select City</option>';
				foreach($durationsCity as $newCity)
				{
					$data['cities'] .= '<option value="'.$newCity['id'].'">'.$newCity['city_name'].'</option>';
				}

				$data['vendors'] = '<option value="0">Select Vendors</option>';

				foreach($durationsVendors as $vendors)
				{
					$data['vendors'] .= '<option value="'.$vendors['vendorId'].'">'.$vendors['company_name'].'</option>';
				}

				$data['vehicles'] = '<option value="0">Select Vehicles</option>';

				foreach($durationsVehicle as $vehicles)
				{
					$data['vehicles'] .= '<option value="'.$vehicles['id'].'">'.$vehicles['vehicle_name'].'</option>';
				}

				$data['num'] = $num;


				echo $this->load->view("admin/template/durationableView", $data, true);
        	}
        }

    }

    public function addItinerary($tab = NUll, $itinerary_id = NUll)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            if ($tab == '') {
                $data['tab'] = 1;
                $data['itinerary_id'] = '';
                $data['action'] = "";
            }

            if ($tab == 1) {
                $data['tab'] = 1;

                $data['action'] = "edit";
                
                $itinerary_id =  $data['itinerary_id'] = $this->session->userdata('itinerary_id');

                $data['itinerary_details'] = $this->admin_model->getItineraryById($itinerary_id);

                $data['itinerary_vehicle'] = $this->admin_model->getItineraryVehicleById($itinerary_id);

                $data['cities'] = $this->admin_model->getAllCity();
                
                $data['states'] = $this->admin_model->getAllState();

                $data['durationsVehicle'] = $this->admin_model->getMasterVehicle();

                $data['durationsVendors'] = $this->admin_model->getVendorDetails();
            }

            if ($tab == 2) {
                $data['tab'] = 2;

                $data['action'] = "edit";

                $itinerary_id = $data['itinerary_id'] = $this->session->userdata('itinerary_id');

                $data['itinerary_details'] = $this->admin_model->getItineraryById($itinerary_id);
            }
            $data['durationsVehicle'] = $this->admin_model->getMasterVehicle();

            $data['durationsVendors'] = $this->admin_model->getVendorDetails();

            $data['countries'] = $this->admin_model->getAllCountries();

            $this->global['pageTitle'] = 'Travwhizz : Itinerary Management';
            
            $this->loadViews("admin/addItinerary", $this->global, $data, NULL);
        }
    }

    public function addNewItinerary()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            extract($this->input->post());
            if($type == "add_itinerary_management") {
                
                $country_id = implode(',', $country);
                $state_id = implode(',', $state);
                $city_id = implode(',', $city);

                $data = array(
                    'country'           => $country_id,
                    'state'             => $state_id,
                    'city'              => $city_id,
                    'title'             => $title,
                    'duration'          => $duration,
                    'duration_detail'   => $iteDurationDetail,
                    //'vehicle_1_total'   => $vehicle_1_total,
                    //'vehicle_2_total'   => $vehicle_2_total,
                    //'vehicle_3_total'   => $vehicle_3_total,
                    'status'            => 1,
                    'created_at'        => date('Y-m-d H:i:s'),
                    'vehiclecount'      => $vehiclecount    
                );

                $itinerary_id = $this->admin_model->addNewItinerary($data);

                $this->session->set_userdata('itinerary_id',$itinerary_id);

                if($itinerary_id != '') {
                    for($i=1; $i <=$duration ; $i++) { 
                        
                        $data = array(
                            'itinerary_id'      => $itinerary_id,
                            'duration_city'     => $this->input->post('tblCity_'.$i),
                            // 'vehicle_1'         => $this->input->post('tblVehicle_1_'.$i),
                            // 'price_1'           => $this->input->post('tblPrice_1_'.$i),
                            // 'vendor_1'          => $this->input->post('tblVendor_1_'.$i),
                            // 'vehicle_2'         => $this->input->post('tblVehicle_2_'.$i),
                            // 'price_2'           => $this->input->post('tblPrice_2_'.$i),
                            // 'vendor_2'          => $this->input->post('tblVendor_2_'.$i),
                            // 'vehicle_3'         => $this->input->post('tblVehicle_3_'.$i),
                            // 'price_3'           => $this->input->post('tblPrice_3_'.$i),
                            // 'vendor_3'          => $this->input->post('tblVendor_3_'.$i)

                        );

                        $vehicle_id = $this->admin_model->addNewItineraryVehicleCost($data);
                    }

                    echo 1;
                }else{
                    echo 0;
                }
                    $vehicle_name = $this->input->post('vehicle_name');
                    foreach($vehicle_name as $i => $value){

                        $multiplevehicle = array(
                          'itinerary_id'      => $itinerary_id,
                          'vehicle_name'      => $value,
                          'from_day'          => isset($from_day[$i]) ? $from_day[$i] : '',
                          'to_day'            => isset($to_day[$i]) ? $to_day[$i] : '',
                          'vendor_name'       => isset($vendor_name[$i]) ? $vendor_name[$i] : '',
                          'unit_cost'         => isset($unit_cost[$i]) ? $unit_cost[$i] : ''
                        );

                        $vehicledata = $this->admin_model->addmulitiplevehicleforitinerary($multiplevehicle);

                    }

            }

            if ($type == "add_itinerary") {
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
                        'itinerary_title'       => $this->input->post('itinerary_tilte_'.$i),
                        'itinerary_details'     => $this->input->post('itinerary_'.$i),
                        'itinerary_images'      => $itinerary_image
                    );

                    $itinerary = $this->admin_model->addItineraryDetails($itinerary_details);

                    unset($itinerary_image);
                }

                if ($itinerary != '') {
                    $this->session->unset_userdata('itinerary_id');
                    $this->session->set_flashdata('success', 'Itinerary Added successfully!!!! ');
                    redirect(ADMIN_URL.'/viewItinerary');
                }
            }
        }
    }

    public function editItinerary($tab, $itinerary_id)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            if ($itinerary_id == '') {
                $this->session->set_flashdata('error', 'There is something problem. Please try again! ');
                redirect(ADMIN_URL.'/viewItinerary');
            }else{
                $data['tab'] = $tab;

                $data['itinerary_details'] = $this->admin_model->getItineraryById($itinerary_id);

                $data['itinerary_vehicle'] = $this->admin_model->getItineraryVehicleById($itinerary_id);

                $data['multiple_vehicle'] = $this->admin_model->getItinerarymultiplevehicle($itinerary_id);

                $data['countries'] = $this->admin_model->getAllCountries();

                $data['cities'] = $this->admin_model->getAllCity();

                $data['itinerary_id'] = $itinerary_id; 
                
                $data['states'] = $this->admin_model->getAllState();

                $data['durationsVehicle'] = $this->admin_model->getMasterVehicle();

                $data['durationsVendors'] = $this->admin_model->getVendorDetails();

                $data['itinerary_images_details'] = $this->admin_model->getItineraryImagesDetails($itinerary_id);

                $this->global['pageTitle'] = 'Travwhizz : Edit Itinerary Management';
            
                $this->loadViews("admin/editItinerary", $this->global, $data, NULL);
            }
        }
    }

    public function updateItinerary()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            extract($this->input->post());
            if ($type == "update_itinerary_management") {
                $country_id = implode(',', $country);
                $state_id = implode(',', $state);
                $city_id = implode(',', $city);

                $data = array(
                    'country'           => $country_id,
                    'state'             => $state_id,
                    'city'              => $city_id,
                    'title'             => $title,
                    // 'vehicle_1_total'   => $vehicle_1_total,
                    // 'vehicle_2_total'   => $vehicle_2_total,
                    // 'vehicle_3_total'   => $vehicle_3_total,
                    'duration'          => $duration,
                    'duration_detail'   => $iteDurationDetail,
                    'updated_at'        => date('Y-m-d H:i:s'),
                    'vehiclecount'      => $vehiclecount   
                );

                $itinerary = $this->admin_model->updateItinerary($data, $itinerary_id);

                if ($itinerary > 0) {
                	$delete_old_itinerary = '';
                    for ($i=1; $i <=$duration; $i++) {
                    	if ($this->input->post('cost_'.$i) == '') {
                    		if ($delete_old_itinerary == '') {
                    			$delete_old_itinerary = $this->admin_model->deleteItineraryVehicleCost($itinerary_id);
                    		}
                    		$data = array(
                                'itinerary_id'      => $itinerary_id,
                                'duration_city'     => $this->input->post('tblCity_'.$i),
                                // 'vehicle_1'         => $this->input->post('tblVehicle_1_'.$i),
                                // 'price_1'           => $this->input->post('tblPrice_1_'.$i),
                                // 'vendor_1'          => $this->input->post('tblVendor_1_'.$i),
                                // 'vehicle_2'         => $this->input->post('tblVehicle_2_'.$i),
                                // 'price_2'           => $this->input->post('tblPrice_2_'.$i),
                                // 'vendor_2'          => $this->input->post('tblVendor_2_'.$i),
                                // 'vehicle_3'         => $this->input->post('tblVehicle_3_'.$i),
                                // 'price_3'           => $this->input->post('tblPrice_3_'.$i),
                                // 'vendor_3'          => $this->input->post('tblVendor_3_'.$i)
                        	);
                        	$vehicle_id = $this->admin_model->addNewItineraryVehicleCost($data);
                    	}else{
                    		$data = array(
                                'duration_city'     => $this->input->post('tblCity_'.$i),
                                // 'vehicle_1'         => $this->input->post('tblVehicle_1_'.$i),
                                // 'price_1'           => $this->input->post('tblPrice_1_'.$i),
                                // 'vendor_1'          => $this->input->post('tblVendor_1_'.$i),
                                // 'vehicle_2'         => $this->input->post('tblVehicle_2_'.$i),
                                // 'price_2'           => $this->input->post('tblPrice_2_'.$i),
                                // 'vendor_2'          => $this->input->post('tblVendor_2_'.$i),
                                // 'vehicle_3'         => $this->input->post('tblVehicle_3_'.$i),
                                // 'price_3'           => $this->input->post('tblPrice_3_'.$i),
                                // 'vendor_3'          => $this->input->post('tblVendor_3_'.$i)
                            );

                            $vehicle_id = $this->admin_model->updateItineraryVehicleCost($data,$this->input->post('cost_'.$i));
                    	}
                    }
                    echo 1;
                }else{
                    echo 0;
                }

                    // $vehicle_name = $this->input->post('vehicle_name');
                    $allvehicleid = $this->input->post('allvehicleid[]');
                    for($i=0; $i<count($allvehicleid); $i++){

                        $multiplevehicle = array(
                          //'itinerary_id'      => $itinerary_id,
                          'vehicle_name'      => isset($vehicle_name[$i]) ? $vehicle_name[$i] : '',
                          'from_day'          => isset($from_day[$i]) ? $from_day[$i] : '',
                          'to_day'            => isset($to_day[$i]) ? $to_day[$i] : '',
                          'vendor_name'       => isset($vendor_name[$i]) ? $vendor_name[$i] : '',
                          'unit_cost'         => isset($unit_cost[$i]) ? $unit_cost[$i] : ''
                        );

                        $vehicledata = $this->admin_model->updatemultipleItineraryVehicle($multiplevehicle, $itinerary_id, $allvehicleid[$i]);

                    }
                    
            }
                $vehicle_name_more = $this->input->post('vehicle_name_more');
                    if($vehicle_name_more > 0){

                        foreach($vehicle_name_more as $i => $value){

                            $multiplevehicle = array(
                              'itinerary_id'      => $itinerary_id,
                              'vehicle_name'      => $value,
                              'from_day'          => isset($from_day_more[$i]) ? $from_day_more[$i] : '',
                              'to_day'            => isset($to_day_more[$i]) ? $to_day_more[$i] : '',
                              'vendor_name'       => isset($vendor_name_more[$i]) ? $vendor_name_more[$i] : '',
                              'unit_cost'         => isset($unit_cost_more[$i]) ? $unit_cost_more[$i] : ''
                            );
     
                        $vehicledata = $this->admin_model->addmulitiplevehicleforitinerary($multiplevehicle);

                    }
                    
                }

            if ($type == "update_itinerary") {
                for ($i=1; $i <=$duration ; $i++) {
                    if ($this->input->post('image_id_'.$i) != '') {
                        if (!empty($_FILES['itinerary_image_'.$i]['name'])) {
                            /*$table = "itinerary_details";
                            $id = $this->input->post('image_id_'.$i);
                            echo $id;
                            $column = "itinerary_images";
                            $where = "id";
                            $exiting_images = $this->admin_model->getExisitingPhotos($table,$id, $column, $where);
                            $images = json_decode($exiting_images['itinerary_images'] );
                            foreach ($images as $image){
                                unlink('uploads/itinerary_images/'.$image);
                            }*/
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

                        if ($itinerary_image == '') {
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

                        $itinerary = $this->admin_model->updateItineraryDetails($itinerary_details,$this->input->post('image_id_'.$i));

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

                        $itinerary = $this->admin_model->addItineraryDetails($itinerary_details);

                        unset($itinerary_image);
                    }      
                }
                $this->session->unset_userdata('itinerary_id');
                $this->session->set_flashdata('success', 'Itinerary Updated successfully!!!! ');
                redirect(ADMIN_URL.'/viewItinerary');
            }
        }
    }

    public function deleteItinerary($itinerary_id)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            if ($itinerary_id == '') {
                $this->session->set_flashdata('error', 'There is something problem. Please try again! ');
                redirect(ADMIN_URL.'/viewItinerary');
            }else{
                $delete_itinerary = $this->admin_model->deleteItinerary($itinerary_id);

                if ($delete_itinerary) {
                     $this->session->set_flashdata('success', 'Itinerary Deleted successfully!!!! ');
                    redirect(ADMIN_URL.'/viewItinerary');
                }
            }
        }
    }

    public function viewActivities()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $data['activities'] = $this->admin_model->getAllActivites();
            
            $this->global['pageTitle'] = 'Travwhizz : Add Vendor';
            
            $this->loadViews("admin/viewActivities", $this->global, $data, NULL);
        }
    }

    public function addActivities()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $data['countries'] = $this->admin_model->getAllCountries();
            
            $this->global['pageTitle'] = 'Travwhizz : Add Activites';
            
            $this->loadViews("admin/addActivities", $this->global, $data, NULL);
        }
    }

    public function addNewActivites()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            extract($this->input->post());
            if (!empty($_FILES['activities_images']['name'])) {
               $filesCount = count($_FILES['activities_images']['name']);
               for($i = 0; $i < $filesCount; $i++){
                $_FILES['file']['name']         = $_FILES['activities_images']['name'][$i];
                $_FILES['file']['type']         = $_FILES['activities_images']['type'][$i];
                $_FILES['file']['tmp_name']     = $_FILES['activities_images']['tmp_name'][$i];
                $_FILES['file']['error']        = $_FILES['activities_images']['error'][$i];
                $_FILES['file']['size']         = $_FILES['activities_images']['size'][$i];
                
                // File upload configuration
                $uploadPath = 'uploads/activities_images/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                    // Upload file to server
                    if($this->upload->do_upload('file')){
                        // Uploaded file data
                        $fileData = $this->upload->data();
                        $upload_activities[] = $fileData['file_name'];
                    }else{
                        $upload_activities = '';
                    }
                }
                if (is_array($upload_activities)) {
                    $upload_activities = json_encode($upload_activities);
                }
            }else{
                $upload_activities = '';
            }

            $data = array(
                'country_id'            => $country_id,
                'state_id'              => $state_id,
                'city_id'               => $city_id,
                'details'               => $activities_details,
                'activities_images'     => $upload_activities,
                'redemption_point'      => $redemption_point,
                'description'           => $activities_description,
                'highlights'            => $highlights,
                'inclusion'             => $inclusions,
                'know_before_book'      => $know_before_book,
                'count_row'             => $count_row,
                'adult_cost'            => $adult_price,
                'created_by_admin'      => $this->global ['user_id'],
                'status'                => 1,
                'created_at'            => date('Y-m-d H:i:s'),
            );

            $activities_id = $this->admin_model->addNewActivites($data);
            if ($activities_id != '') {
                for ($i=1; $i <=$count_row ; $i++) { 
                    $data_price = array(
                        'activity_id'       => $activities_id,
                        'child_from_age'    => $this->input->post('from_age_'.$i),
                        'child_to_age'      => $this->input->post('to_age_'.$i),
                        'price'             => $this->input->post('child_price_'.$i),
                    );

                    $activities_child_price = $this->admin_model->addNewChildActivitiesPrice($data_price);
                }

                if ($activities_id) {
                    $this->session->set_flashdata('success', 'Activities Added successfully!!!! ');
                    redirect(ADMIN_URL.'/viewActivities');
                }
            }
        }
    }

    public function editActivities($activity_id)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            
            $data['activities'] = $this->admin_model->getActivitesById($activity_id);
            $data['countries'] = $this->admin_model->getAllCountries();
            $data['cities'] = $this->admin_model->getAllCity();
            $data['states'] = $this->admin_model->getAllState();
            $data['activities_child_price'] = $this->admin_model->getActivitesChildPriceById($activity_id);

            $this->global['pageTitle'] = 'Travwhizz : Edit Activity Management';
            
            $this->loadViews("admin/editActivities", $this->global, $data, NULL);
        }
    }

    public function updateActivites()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            extract($this->input->post());
            if (!empty($_FILES['activities_images']['name'])) {
               $filesCount = count($_FILES['activities_images']['name']);
               for($i = 0; $i < $filesCount; $i++){
                $_FILES['file']['name']         = $_FILES['activities_images']['name'][$i];
                $_FILES['file']['type']         = $_FILES['activities_images']['type'][$i];
                $_FILES['file']['tmp_name']     = $_FILES['activities_images']['tmp_name'][$i];
                $_FILES['file']['error']        = $_FILES['activities_images']['error'][$i];
                $_FILES['file']['size']         = $_FILES['activities_images']['size'][$i];
                
                // File upload configuration
                $uploadPath = 'uploads/activities_images/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                    // Upload file to server
                    if($this->upload->do_upload('file')){
                        // Uploaded file data
                        $fileData = $this->upload->data();
                        $upload_activities[] = $fileData['file_name'];
                    }else{
                        $upload_activities = '';
                    }
                }
                if (is_array($upload_activities)) {
                    $upload_activities = json_encode($upload_activities);
                }
            }else{
                $upload_activities = '';
            }

            if ($upload_activities == '') {
                $data = array(
                    'country_id'            => $country_id,
                    'state_id'              => $state_id,
                    'city_id'               => $city_id,
                    'details'               => $activities_details,
                    'redemption_point'      => $redemption_point,
                    'description'           => $activities_description,
                    'highlights'            => $highlights,
                    'inclusion'             => $inclusions,
                    'know_before_book'      => $know_before_book,
                    'count_row'             => $count_row,
                    'adult_cost'            => $adult_price,
                    'created_by_admin'      => $this->global ['user_id'],
                    'status'                => 1,
                    'created_at'            => date('Y-m-d H:i:s'),
                );
            }else{
                $data = array(
                    'country_id'            => $country_id,
                    'state_id'              => $state_id,
                    'city_id'               => $city_id,
                    'details'               => $activities_details,
                    'activities_images'     => $upload_activities,
                    'redemption_point'      => $redemption_point,
                    'description'           => $activities_description,
                    'highlights'            => $highlights,
                    'inclusion'             => $inclusions,
                    'know_before_book'      => $know_before_book,
                    'count_row'             => $count_row,
                    'adult_cost'            => $adult_price,
                    'created_by_admin'      => $this->global ['user_id'],
                    'updated_at'            => date('Y-m-d H:i:s'),
                );
            }

            $updated_activities = $this->admin_model->updateActivites($data,$activities_id);
            if ($updated_activities != '') {
                for ($i=1; $i <=$count_row ; $i++) {
                    if ($this->input->post('child_price_id_'.$i) != '') {
                       $data_price = array(
                        'child_from_age'    => $this->input->post('from_age_'.$i),
                        'child_to_age'      => $this->input->post('to_age_'.$i),
                        'price'             => $this->input->post('child_price_'.$i),
                    );

                    $update_activities_child_price = $this->admin_model->updateChildActivitiesPrice($data_price, $this->input->post('child_price_id_'.$i));
                    }else{
                        $data_price = array(
                        'activity_id'       => $activities_id,
                        'child_from_age'    => $this->input->post('from_age_'.$i),
                        'child_to_age'      => $this->input->post('to_age_'.$i),
                        'price'             => $this->input->post('child_price_'.$i),
                    );

                    $activities_child_price = $this->admin_model->addNewChildActivitiesPrice($data_price);
                    }
                }

                if ($updated_activities) {
                    $this->session->set_flashdata('success', 'Activities Updated successfully!!!! ');
                    redirect(ADMIN_URL.'/viewActivities');
                }
            }
        }
    }

    public function deleteActivities($activity_id)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            if ($activity_id == '') {
                $this->session->set_flashdata('error', 'There is something problem. Please try again! ');
                redirect(ADMIN_URL.'/viewActivities');
            }else{
                $delete_activities = $this->admin_model->deleteActivities($activity_id);

                if ($delete_activities) {
                     $this->session->set_flashdata('success', 'Activities Deleted successfully!!!! ');
                    redirect(ADMIN_URL.'/viewActivities');
                }
            }
        }
    }

    public function deleteActivityRow($activity_child_price_id, $count_row, $activity_id)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            if ($activity_child_price_id == '' && $activity_id == '') {
                $this->session->set_flashdata('error', 'There is something problem. Please try again! ');
                redirect(ADMIN_URL.'/viewActivities');
            }else{
                $delete_activities_price = $this->admin_model->deleteActivitiesChildPriceRow($activity_child_price_id);

                $data = array(
                    'count_row' => (int)$count_row - 1
                );

                $updated_activities = $this->admin_model->updateActivites($data,$activity_id);

                if ($delete_activities_price && $updated_activities) {
                    $this->session->set_flashdata('success', 'Activities Deleted successfully!!!! ');
                    redirect(ADMIN_URL.'/viewActivities');
                }
            }
        }
    }
    
    //Add Activities By Unit
    
    public function viewPerUnitActivities()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $data['activities'] = $this->admin_model->getAllActivitesByUnit();
            
            $this->global['pageTitle'] = 'Travwhizz : View Activities By Unit';
            
            $this->loadViews("admin/viewPerUnitActivities", $this->global, $data, NULL);
        }
    }
    
    public function addActivitiesByUnit()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{

            $data['countries'] = $this->admin_model->getAllCountries();
            
            $this->global['pageTitle'] = 'Travwhizz : Add Activites By Unit';
            
            $this->loadViews("admin/addActivitiesByUnit", $this->global, $data, NULL);
        }
    }
    
    public function addNewActivitesByUnit()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }else{
            extract($this->input->post());
            if (!empty($_FILES['activities_images']['name'])) {
               $filesCount = count($_FILES['activities_images']['name']);
               for($i = 0; $i < $filesCount; $i++){
                $_FILES['file']['name']         = $_FILES['activities_images']['name'][$i];
                $_FILES['file']['type']         = $_FILES['activities_images']['type'][$i];
                $_FILES['file']['tmp_name']     = $_FILES['activities_images']['tmp_name'][$i];
                $_FILES['file']['error']        = $_FILES['activities_images']['error'][$i];
                $_FILES['file']['size']         = $_FILES['activities_images']['size'][$i];
                
                // File upload configuration
                $uploadPath = 'uploads/activities_images/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                    // Upload file to server
                    if($this->upload->do_upload('file')){
                        // Uploaded file data
                        $fileData = $this->upload->data();
                        $upload_activities[] = $fileData['file_name'];
                    }else{
                        $upload_activities = '';
                    }
                }
                if (is_array($upload_activities)) {
                    $upload_activities = json_encode($upload_activities);
                }
            }else{
                $upload_activities = '';
            }

            $data = array(
                'country_id'            => $country_id,
                'state_id'              => $state_id,
                'city_id'               => $city_id,
                'details'               => $activities_details,
                'activities_images'     => $upload_activities,
                'redemption_point'      => $redemption_point,
                'description'           => $activities_description,
                'highlights'            => $highlights,
                'inclusion'             => $inclusions,
                'know_before_book'      => $know_before_book,
                'perunit_cost '         => $perunit_cost ,
                'created_by_admin'      => $this->global ['user_id'],
                'status'                => 1,
                'created_at'            => date('Y-m-d H:i:s'),
            );

            $activities_id = $this->admin_model->addNewActivitesByUnit($data);
            
                if ($activities_id) {
                    $this->session->set_flashdata('success', 'Activities Added successfully!!!! ');
                    redirect(ADMIN_URL.'/viewActivities');
                }
            
        }
    }

    public function workout($query_no = NULL)
    {
        if ($query_no == '') {
            $data['qn'] = '';
        }else{
            $data['qn'] = base64_decode($query_no);
        }

        $data['countries'] = $this->admin_model->getAllCountries();
        $this->global['pageTitle'] = 'Travwhizz : Workout Management';
        $this->loadViews("admin/workout", $this->global, $data, NULL);
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

                    $template   .= $this->load->view("admin/template/searchedHotel", $data, true);

                }
                echo $template;
            }else{
                echo "Sorry No Record Found";
            }
            echo '$abc#$'.$star_ratingArr.'$abc#$'.$hotelNames;
        }

        if ($queryType == 'Package') {
            
            $searchData = $this->admin_model->searchPackage($this->input->post());

            if(count($searchData) > 0)
            {
                $template    = '';

                $data['stayDuration'] = $stayDuration;
                foreach($searchData as $pakageData) 
                {
                    $data['itenryId'] = $itenryId = $pakageData['id'];

                    $data['pakageData'] =  $pakageData;

                    $template   .= $this->load->view("admin/template/searchedPackage", $data, true);;
                }
                echo $template;
            }else{
                echo "Note: No Packge Found!!";
            }
        }    
    }

    public function viewHotelDetails($hotel_id, $search_data)
    {
        if ($hotel_id == '' || $search_data == '') {
            $this->session->set_flashdata('error', 'There is Something Problem please Try again later.!!!! ');
            redirect(ADMIN_URL.'/workout');
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

            $data['hotelData']      = $hotelData = $this->hotel_model->getHotelByHotelId($hotel_id);

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

            $data['arrRoomType'] = $arrRoomType = $this->admin_model->getHotelRoomTypeByid($hotel_id);

            $roomTypeStr = '';
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
            
            $this->loadViews("admin/viewHotelDetails", $this->global, $data, NULL);
        }
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

        $date_rates_detail = $this->admin_model->getDateRatesByid_calculate($hotelId, $startdate, $enddate);

        $hotelDateId = $hotelDateId;

        $arrMasterRoom = unserialize($masterRoomArr);

        $roomTypeArr = unserialize($arrRoomType);

        $arrRoomTypesPrice = unserialize($roomTypesPriceArr);

        $userSelectRoomTypesArr = explode(',',rtrim($userSelectRoomTypes,','));

        $userSelectMealTypesArr = explode(',',rtrim($userSelectMealTypes,','));

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

            if (strpos($child_ageVal, ',') !== false)
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

            $roomPrices[$j+1] = ($RoomPriceCalculation+$chilePriceCalculation)*$paramArr['stayDuration'];
        }

        $roomPrices['description'] = $descArrString;
        echo json_encode($roomPrices);
    }

    public function viewPackageDetails($itinerary_id, $search_data)
    {
        if ($itinerary_id == '' || $search_data == '') {
            $this->session->set_flashdata('error', 'There is Something Problem please Try again later.!!!! ');
            redirect(ADMIN_URL.'/workout');
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
            
            $data['itineraryData']  = $itineraryData = $this->admin_model->getIteneraryById($itinerary_id);

            $data['itineraryDetails'] = $itineraryDetails = $this->admin_model->getIteneraryDetailsById($itinerary_id);

            $data['itineraryVehicle'] = $this->admin_model->getItinerarymultiplevehicle($itinerary_id);

            $data['itiTitle']       = $itineraryData['title'];

            $data['Itiduration']    = $itineraryData['duration'];
            $data['itiCity']        = $itineraryData['city'];

            $data['vehcle_detail']  = $vehcle_detail = $this->admin_model->getItineraryVehicle($itinerary_id);

            $this->global['pageTitle'] = 'Travwhizz : View Package Details';

            $data['searchData'] = $search_data;
            
            $this->loadViews("admin/viewPackageDetails", $this->global, $data, NULL);
        }
    }

    public function getselvehicleperunitcost()
    {
        extract($this->input->post());
        $veh_id = $this->input->post('id');
        echo $vehicleid = json_encode($this->admin_model->getItenerarymultipleVehicleById($veh_id));
    }

    public function getHotelRoomsForPackage()
    {
        extract($this->input->post());

        $date_rates_detail = $this->admin_model->getMealPlanByhotelId($hotId, $startDate, $endDate, $searchType, $selDate);
        
        $arrRoomType = $this->admin_model->getHotelRoomTypeByid($hotId);
        
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
        echo $roomTypeStr.'$##$'.$mealTypeStr;
    }

    public function getVehicleVendorName()
    {
       extract($this->input->post());
       $id_array = explode('|', $vehicle_id);
       $vendor_id = $id_array['2'];
       $vendor_details = $this->admin_model->getVehicleVendorDetails($vendor_id);
       
       echo $vendor_name .= '<option value="'.$vendor_details['vendorId'].'">'.$vendor_details['company_name'].'</option>';
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

            if ($selectVehicle != 0) {
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

                if ($activitiesIds = $this->input->post("activities_".($h+1))) {
                    if (is_array($this->input->post("activities_".($h+1)))) {
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

        foreach ($dayPriceArr as $k=>$subArray) {
            foreach ($subArray as $id=>$value) {
                $sumArray[$id]+=$value;
            }
        }

        echo json_encode($sumArray)."$##$".$v_price;
    }
    
    public function ViewsavedHotelPackages()
    {
        $data['hotelpackage'] = $hotelpackage = $this->admin_model->getAllSavedHotelPackages();
        $data['roomprices'] = $roomprices = json_decode($hotelpackage->room_prices, TRUE);
        $this->global['pageTitle'] = 'Travwhizz : Saved Hotel Packages';
        $this->loadViews("admin/savedHotelPackages", $this->global, $data, NULL);
    }
    
    public function EditSavedHotelPackages($package_id)
    {
        //echo $package_id;
        // $partner_id = $this->global['partner_id'];
        $data['hotelpackage'] = $hotelpackage = $this->admin_model->getSavedHotelPackageByid($package_id);
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
    
        $data['arrRoomType'] = $arrRoomType = $this->admin_model->getHotelRoomTypeByid($hotel_id);

        $data['date_rates_detail'] = $date_rates_detail = $this->admin_model->getDateRatesByid_calculate($hotel_id, $startdate, $enddate);
        
        $this->global['pageTitle'] = 'Travwhizz : Hotel Package';
        $this->loadViews("admin/editHotelPackage", $this->global, $data, NULL);
    }
    
    public function UpdateHotelpackageConfirmation()
    {
        $packageid = $this->input->post('id');
        
        $data = array(
            'hotel_confirmation' => $this->input->post('hotel_confirmation'),
            );
        
        
        $response = $this->admin_model->updateHotelpackageConfirmStatus($packageid, $data);
         
            if(($response) > 0)
                {
                    //echo ($this->session->set_flashdata('success', 'Hotel Confirmation Send'));
                    echo 1;
                    exit;
                }
                else
                {
                    //echo ($this->session->set_flashdata('error', 'Failed to Confirm Hotel'));
                    echo 0;
                    exit;
                }
        
    }
    
    
}

?>