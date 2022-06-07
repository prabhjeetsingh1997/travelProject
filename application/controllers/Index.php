<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/HotelController.php';
/**
 * Class : Index (LoginController)
 * @author : Sachin Gupta
 * @version : 1.1
 * @since : 20 March 2019
 */
class Index extends HotelController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('hotel_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->isLoggedIn();
    }

    function isLoggedIn()
    {
        $hotelSessionData = $this->session->userdata ('hotel');
        $isLoggedIn = isset($hotelSessionData['isLoggedIn']);
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->global['pageTitle'] = 'Travwhizz : Home Page';
            $this->loadViews("hotel/index", $this->global, NULL , NULL);
        }
        else
        {
            redirect(HOTEL.'/dashboard');
        }
    }

    public function hotelRegistration()
    {
        $this->global['pageTitle'] = 'Travwhizz : Hotel Registration Page';
        $data['countries'] = $this->admin_model->getAllCountries();
        $this->loadViews("hotel/hotelRegistration", $this->global, $data , NULL);
    }
    
    public function contactUs()
    {
        $this->global['pageTitle'] = 'Travwhizz : Contact Us Page';
        //$data['countries'] = $this->admin_model->getAllCountries();
        $this->loadViews("hotel/Contact", $this->global, NULL);
    }

    public function becomeHotelPartner()
    {
       $this->global['pageTitle'] = 'Travwhizz : Hotel Registration Page';

       $checkHotelpartnerExists = $this->hotel_model->checkHotelParterByEmail($this->input->post("email"));

        if(!empty($checkHotelpartnerExists)) {
            
            $responsemsg = "You are already registered with us";
            echo json_encode($responsemsg);
            //$this->session->set_flashdata('error', 'Your are already Register with us.');
            //redirect('hotelRegistration');
        }else{
            
        $data = array(
            'name'                  => $this->input->post("name"),
            'email'                 => $this->input->post("email"),
            'password'              => getHashedPassword($this->input->post("password")),
            'contact_no'            => $this->input->post("contact_no"),
            'hotel_name'            => $this->input->post("hotel_name"),
            //'address_line_1'        => $this->input->post("hotel_address1"),
            //'address_line_2'        => $this->input->post("hotel_address2"),
            //'country_id'            => $this->input->post("hotel_country"),
            //'state_id'              => $this->input->post("hotel_state"),
            //'city_id'               => $this->input->post("hotel_city"),
            //'zip'                   => $this->input->post("hotel_pincode"),
            'status'                => 0,
            'email_varified'        => 0,
            'created_at'            => date('Y-m-d H:i:s')
        );

        $hotel_partner_id = $this->hotel_model->addNewHotelPartner($data);

        if($hotel_partner_id > 0) {
            
            $this->load->library('email');
            $this->load->library('encrypt');
            $fromemail= EMAIL_FROM;
            $toemail = $this->input->post("email");
            $subject = FROM_HOEL_NAME;
           // $data['hotel_partner_id'] = $this->encrypt->encode($hotel_partner_id);
            $data['hotel_partner_id'] = strtr($this->encrypt->encode($hotel_partner_id),array('+' => '.', '=' => '-', '/' => '~'));
            $mesg = $this->load->view('email/varifyHotelRegistration',$data,true);
            $config=array(
                'charset'=>'utf-8',
                'wordwrap'=> TRUE,
                'mailtype' => 'html'
            );

            $this->email->initialize($config);
            $this->email->to($toemail);
            $this->email->from($fromemail, "Verification Mail");
            $this->email->subject($subject);
            $this->email->message($mesg);
            $mail = $this->email->send();
            if($mail) {
                $responsemsg = "Verification mail sent on your email, Please check spam as well";
                echo json_encode($responsemsg);
                //$this->session->set_flashdata('success', 'Verification mail sent on your email, Please check spam as well.');
                //redirect('hotelRegistration');
            }else{
                $responsemsg = "Registration Complete but verification mail could not be sent. Please contact our team.";
                echo json_encode($responsemsg);
                //$this->session->set_flashdata('success', 'Registration Complete but verification mail could not be sent. Please contact our team.');
                //redirect('hotelRegistration');
            }
        }else{
             $responsemsg = "There is Something problem! please try again later.";
             echo json_encode($responsemsg);
            // $this->session->set_flashdata('error', 'There is Something problem! please try again later');
            // redirect('hotelRegistration');
        }
        //echo json_encode($responsemsg);
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

    public function varifyHotelEmail($hotel_partner_id)
    {
        if ($hotel_partner_id == '') {
            $this->loadThis();
        }else{
            $this->load->library('encrypt');
            $hotel_enc_key = strtr($hotel_partner_id,array('.' => '+', '-' => '=', '~' => '/'));
            $hotel_id = $this->encrypt->decode($hotel_enc_key);
            $hotel = $this->hotel_model->getHotelById($hotel_id);
            if(empty($hotel)) {
                $this->session->set_flashdata('error', 'You seems to be not register with us!');
                redirect('hotelRegistration');
            }else{
                $email_varified = $hotel->email_varified;
                $status = $hotel->status;
                if ($email_varified == 1 && $status = 1) {
                    $this->session->set_flashdata('error', 'Your Email is Already verified, Please try login with your Credentials!');
                    redirect('hotelRegistration');
                }else if($email_varified == 1) {
                    $this->session->set_flashdata('error', 'Your Email is Already verified, Please wait for the Admin Approval to login!');
                    redirect('hotelRegistration');
                }else{
                    $data = array(
                        'email_varified' => 1,
                        'status' => 1
                    );

                    $varified = $this->hotel_model->varifyHotelPartnerEmail($hotel_id, $data);
                    if($varified > 0) {
                        $this->session->set_flashdata('success', 'Your Email is verified, Please try login with your Credentials!');
                        redirect('hotelRegistration');
                    }else{
                        $this->session->set_flashdata('success', 'Your Email could not be verified Please try again later!');
                        redirect('hotelRegistration');
                    }
                }
            }
        }
    }
    
    // public function partnerRegister()
    // {
        
    // }

    public function hotelPartner()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('hotel_email', 'Email', 'required|valid_email|max_length[128]|trim');
        $this->form_validation->set_rules('hotel_password', 'Password', 'required|max_length[32]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            $email = strtolower($this->security->xss_clean($this->input->post('hotel_email')));
            $password = $this->input->post('hotel_password');
            
            $result = $this->hotel_model->loginHotel($email, $password);
            
            if(!empty($result))
            {

            $sessionArray = array(
                'hotel_partner_id'  => $result->hotel_partner_id,                    
                'name'              => $result->name,
                'email'             => $result->email,
                'contact_no'        => $result->contact_no,
                'hotel_name'        => $result->hotel_name,
                'address_line_1'    => $result->address_line_1,
                'address_line_2'    => $result->address_line_2,
                // 'country_name'      => $result->country_name,
                // 'state_name'        => $result->state_name,
                // 'city_name'         => $result->city_name,
                'zip'               => $result->zip,
                'isLoggedIn'        => TRUE
            );
            
               //else{
                    $this->session->set_userdata('hotel',$sessionArray);
                    redirect(HOTEL.'/dashboard');    
                //}
            
            }
            
            else
            {
               
                    $this->session->set_flashdata('error', 'Email or password mismatch');
                    $this->index();    
                
            }
        }
    }
    
    public function forgotPasswordHotel()
    {
        $hotelSessionData = $this->session->userdata('hotel');
        $isLoggedIn = isset($hotelSessionData['isLoggedIn']);
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            //$this->global['pageTitle'] = 'LidTravel : Forgot Password';
            //$this->loadViews("hotel/forgotPasswordHotel", $this->global, NULL);
        }else{
            redirect(HOTEL.'/dashboard');
        }
        
    }
    
    function resetPasswordConfirmUser($activation_id, $email)
    {
        // Get email and activation code from URL values at index 3-4
        $email = urldecode($email);
        
        // Check activation id in database
        $is_correct = $this->hotel_model->checkHotelPartnerActivationDetails($email, $activation_id);
        
        $data['email'] = $email;
        $data['activation_code'] = $activation_id;
        
        if($is_correct == 1)
        {
            $this->load->view('hotel/newPassword', $data);
        }
        else
        {
            redirect('/loginHotel');
        }
    }
    
    function resetPasswordHotelUser()
    {
        $status = '';
        
        // $this->load->library('form_validation');
        
        // $this->form_validation->set_rules('login_email','Email','trim|required|valid_email');
                
        // if($this->form_validation->run() == FALSE)
        // {
        //     $this->forgotPasswordHotel();
        // }
        // else 
        // {
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            
            if($this->hotel_model->checkHotelPartnerEmailExist($email))
            {
                $encoded_email = urlencode($email);
                
                $this->load->helper('string');
                $data['email'] = $email;
                $data['activation_id'] = random_string('alnum',15);
                $data['createdDtm'] = date('Y-m-d H:i:s');
                $data['agent'] = getBrowserAgent();
                $data['client_ip'] = $this->input->ip_address();
                
                $save = $this->hotel_model->resetPasswordHotelUser($data);                
                
                if($save)
                {
                    
                    $data1['reset_link'] = base_url() . "resetPasswordConfirmUser/" . $data['activation_id'] . "/" . $encoded_email;
                    $userInfo = $this->hotel_model->getHotelPartnerInfoByEmail($email);
                    
                    if(!empty($userInfo)){
                        $data1["name"] = $userInfo->name;
                        $data1["email"] = $userInfo->email;
                        $data1["message"] = "Reset Your Password";
                    }
                    
                    $this->load->library('email');
                    $this->load->library('encrypt');
                    $fromemail= EMAIL_FROM;
                    $toemail = $email;
                    $subject = "Reset Password";
                    $mesg = $this->load->view('email/resetHotelPartnerPassword', $data1, true);
                    $config=array(
                        'charset'=>'utf-8',
                        'wordwrap'=> TRUE,
                        'mailtype' => 'html'
                    );

                    $this->email->initialize($config);
                    $this->email->to($toemail);
                    $this->email->from($fromemail, "Reset Password");
                    $this->email->subject($subject);
                    $this->email->message($mesg);
                    $sendStatus = $this->email->send();

                    //$sendStatus = resetPasswordEmail($data1);
                    //echo json_encode($sendStatus);

                    if($sendStatus){
                        
                        //$status = "send";
                        $status = "Reset password link sent successfully, please check your email.";
                        //echo json_encode($status);
                        setFlashData($status, "Reset password link sent successfully, please check mails.");
                    } else {
                        //$status = "notsend";
                        $status = "Failed to send the link, try again later.";
                        //echo json_encode($status);
                        setFlashData($status, "Email has been failed, try again.");
                    }
                }
                else
                {
                    //$status = 'unable';
                    $status = 'It seems an error while sending your details, try again.';
                    //echo json_encode($status);
                    setFlashData($status, "It seems an error while sending your details, try again.");
                }
            }
            else
            {
                //$status = 'invalid';
                $status = 'This email is not registered with us.';
                //echo json_encode($status);
                setFlashData($status, "This email is not registered with us.");
            }
            
            echo json_encode($status);
            //redirect('/forgotPasswordHotel');
        //}
    }
    
    /**
     * This function used to create new password for user
     */
    function createHotelPartnerPasswordUser()
    {
        $status = '';
        $message = '';
        $email = strtolower($this->input->post("email"));
        $activation_id = $this->input->post("activation_code");
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('password','Password','required|max_length[20]');
        $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->resetPasswordConfirmUser($activation_id, urlencode($email));
        }
        else
        {
            $password = $this->input->post('password');
            $cpassword = $this->input->post('cpassword');
            
            // Check activation id in database
            $is_correct = $this->hotel_model->checkHotelPartnerActivationDetails($email, $activation_id);
            
            if($is_correct == 1)
            {                
                $this->hotel_model->createHotelPartnerPasswordUser($email, $password);
                
                $status = 'success';
                $message = 'Password reset successfully';
            }
            else
            {
                $status = 'error';
                $message = 'Password reset failed';
            }
            
            setFlashData($status, $message);

            redirect('/loginHotel');
        }
    }
    
}
?>