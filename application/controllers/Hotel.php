<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Sachin Gupta
 * @version : 1.1
 * @since : 12 March 2019
 */
class Hotel extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->isHotelPartnerLoggedIn();
        $this->load->model('admin_model');
        $this->load->model('hotel_model'); 
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Travwhizz :Hotel Dashboard';
        $hotel_partner_id = $this->global['hotel_partner_id'];

    	if($hotel_partner_id == '') {
    		$this->session->set_flashdata('error', 'No Hotel Added Yet! ');
    		$data['partners_hotel'] = '';
    	}else{
    		$data['partners_hotelactive'] = $this->hotel_model->getAllactivePartnerHotelBylimit($hotel_partner_id);
    		$data['partners_hotelinactive'] = $this->hotel_model->getAllinactivePartnerHotelBylimit($hotel_partner_id);
    		$data['partners_hotel'] = $this->hotel_model->getAllPartnerHotelBylimit($hotel_partner_id);
    		$data['totalinactive'] = count($this->hotel_model->getAllinactivePartnerHotel($hotel_partner_id));
    		$data['totalactive'] = count($this->hotel_model->getAllactivePartnerHotel($hotel_partner_id));
    		$data['totalhotels'] = count($this->hotel_model->getAllPartnerHotel($hotel_partner_id));
    	}
        
        $this->loadHotelViews("hotel/dashboard", $this->global, $data , NULL);
    }
 
    public function addHotel($tab = NULL, $hotel_id = NULL)
    {
        if (base64_decode($tab) == 1) {
            $data['tab'] = 1;
            $data['action'] = "edit";
            $data['hotel_id'] = $this->session->userdata('hotel_id');
        }
        if (base64_decode($tab) == 2) {
            $data['tab'] = 2;
            $data['action'] = "edit";
            $data['hotel_id'] = $this->session->userdata('hotel_id');
            $data['room_service_details']   = $this->hotel_model->getHotelRoomDetails($this->session->userdata('hotel_id'));
            $data['getallRoom'] = $this->hotel_model->getAllHotelRoom();
            $data['date_rates_detail'] = $this->hotel_model->getDateRatesByid($this->session->userdata('hotel_id'));
        }
        if (base64_decode($tab) == 3) {
            $data['tab'] = 3;
            $data['action'] = "edit";
            $data['hotel_id'] = $this->session->userdata('hotel_id');
            $data['room_service_details']   = $this->hotel_model->getHotelRoomDetails($this->session->userdata('hotel_id'));
            $data['getallRoom'] = $this->hotel_model->getAllHotelRoom();
            $data['date_rates_detail'] = $this->hotel_model->getDateRatesByid($this->session->userdata('hotel_id'));
        }
        if (base64_decode($tab) == 4) {
            $data['tab'] = 4;
            $data['action'] = "edit";
            $data['hotel_id'] = $this->session->userdata('hotel_id');
            $data['room_service_details']   = $this->hotel_model->getHotelRoomDetails($this->session->userdata('hotel_id'));
            $data['getallRoom'] = $this->hotel_model->getAllHotelRoom();
            $data['date_rates_detail'] = $this->hotel_model->getDateRatesByid($this->session->userdata('hotel_id'));
        }
        if(base64_decode($tab) == 5){
            $data['tab'] = 5;
            $data['hotel_id'] = $this->session->userdata('hotel_id');
            $data['room_service_details']   = $this->hotel_model->getHotelRoomDetails($this->session->userdata('hotel_id'));
            $data['action'] = "edit";
            $data['getallRoom'] = $this->hotel_model->getAllHotelRoom();
            $data['date_rates_detail'] = $this->hotel_model->getDateRatesByid($this->session->userdata('hotel_id'));
        }
        if(base64_decode($tab) == 6){
            $data['tab'] = 6;
            $data['hotel_id'] = $this->session->userdata('hotel_id');
            $data['room_service_details']   = $this->hotel_model->getHotelRoomDetails($this->session->userdata('hotel_id'));
            $data['action'] = "edit";
            $data['getallRoom'] = $this->hotel_model->getAllHotelRoom();
            $data['date_rates_detail'] = $this->hotel_model->getDateRatesByid($this->session->userdata('hotel_id'));
        }
        if ($tab == ''){
            $data['tab'] = 1;
            $data['hotel_id'] = '';
            $data['action'] = "";
            $data['getallRoom'] = $this->hotel_model->getAllHotelRoom();
            $data['room_service_details']   = $this->hotel_model->getHotelRoomDetails($this->session->userdata('hotel_id'));
        }
        $data['countries'] = $this->admin_model->getAllCountries();
        $this->global['pageTitle'] = 'Travwhizz :Add Hotel';
        $this->loadHotelViews("hotel/addHotel", $this->global, $data , NULL);
       
    }

    public function addNewHotel()
    {  
        $type = $this->input->post('type');

        if($type == 'AddHotelDetails') {
            // if($this->input->post('no_room_types') == 0) {
            //     $this->session->set_flashdata('error', 'please select no of room types');
            //     redirect(HOTEL.'/addHotel');
            // }
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
                // 'no_room_types'         => $this->input->post('no_room_types'),
                'hotel_type'            => $this->input->post('hotel_type'),
                'hotel_currency'        => $this->input->post('hotel_currency'),
                'hotel_star'            => $this->input->post('hotel_star'),
                'check_in'              => $this->input->post('check_in'),
                'check_out'             => $this->input->post('check_out'),
                'hotel_amenity'         => $this->input->post('hotel_amenity'),
                'hotel_description'     => $this->input->post('hotel_description'),
                'hotel_partner_id'      => $this->global ['hotel_partner_id'],
                'status'                => 0,
                'created_at'            => date('Y-m-d : H:i:s')
            );

            $hotel_id = $this->hotel_model->addHotelDetails($hotel_data);

            $this->session->set_userdata('hotel_id',$hotel_id);

            if ($hotel_id > 0) {
                // $no_room_types = $this->input->post('no_room_types');
                // for ($i=1; $i <=$no_room_types ; $i++) { 
                //     if (!empty($_FILES['room_images_'.$i]['name'])) {
                //         $config['upload_path'] = 'uploads/hotel_room_photos/';
                //         $config['allowed_types'] = 'jpg|jpeg|png|gif';
                //         $config['file_name'] = $_FILES['room_images_'.$i]['name'];
                //         //Load upload library and initialize configuration
                //         $this->load->library('upload',$config);
                //         $this->upload->initialize($config);
                //         if($this->upload->do_upload('room_images_'.$i)){
                //             $uploadData = $this->upload->data();
                //             $room_images = $uploadData['file_name'];
                //         }else{
                //             $room_images = '';
                //         }
                //     }else{
                //         $room_images = '';
                //     }

                //     $room_data = array(
                //         'hotel_id'          => $hotel_id,
                //         'room_type'         => $this->input->post('room_name_'.$i), 
                //         'room_description'  => $this->input->post('room_description_'.$i),
                //         'room_amenities'    => $this->input->post('room_amenities_'.$i),
                //         'units'             => $this->input->post('room_units_'.$i),
                //         'room_pics'         => $room_images,
                //     );

                //     $room_id = $this->hotel_model->addHotelRoomDetails($room_data);
                // } 
                $tab = base64_encode(2);
                redirect(HOTEL.'/addHotel/'.$tab);
            }else{
                $this->session->set_flashdata('error', 'There is something problem! Please try again later');
                $tab = base64_encode(1);
                redirect(HOTEL.'/addHotel/'.$tab);
            }
        }
        
        if($type == "hotelRoomdetails"){
            
            if($this->input->post('no_room_types') == 0) {
                $this->session->set_flashdata('error', 'please select no of room types');
                $tab = base64_encode(2);
                redirect(HOTEL.'/addHotel/'.$tab);
                //redirect(HOTEL.'/addHotel');
            }
            if($this->input->post('hotel_id') == '') {
               $hotel_id = $this->sesison->userdata('hotel_id');
            }else{
                $hotel_id = $this->input->post('hotel_id');
            }
            // $roomDetail = array(
            //      'no_room_types'   => $this->input->post('no_room_types'),
            //     );
            
            // $hotel_room_data = $this->hotel_model->addHotelRoomTypeDetails($roomDetail, $hotel_id);
            //$hotel_room_data = $roomDetail;
            if($hotel_id > 0) {
               //extract($this->input->post());
                $no_room_types = $this->input->post('no_room_types');
               
                   for($i=1; $i<=$no_room_types; $i++) {
                       
                    if(!empty($_FILES['room_images_'.$i]['name'])) {
                        $config['upload_path'] = 'uploads/hotel_room_photos/';
                        $config['allowed_types'] = 'jpg|jpeg|png';
                        //$config['max_size'] = 100;
                        $config['file_name'] = $_FILES['room_images_'.$i]['name'];
                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        if($this->upload->do_upload('room_images_'.$i)){
                            $uploadData = $this->upload->data();
                            $room_images = $uploadData['file_name'];
                            $roomDetail = array(
                            'no_room_types'   => $this->input->post('no_room_types'),
                             );
                             $hotel_room_data = $this->hotel_model->addHotelRoomTypeDetails($roomDetail, $hotel_id);
                        }else{
                            //$this->session->set_flashdata('error', $this->upload->display_errors());
                            //$tab = base64_encode(2);
                            //redirect(HOTEL.'/addHotel/'.$tab);
                            //$error = array('error' => $this->upload->display_errors()); 
                            $room_images = '';
                            //var_dump($error);
                        }
                    }
                    else{
                        $room_images = '';
                        //var_dump($uploadData['file_name']);
                    }

                    $room_data = array(
                        'hotel_id'          => $hotel_id,
                        'room_type'         => $this->input->post('room_name_'.$i), 
                        'room_description'  => $this->input->post('room_description_'.$i),
                        'room_amenities'    => $this->input->post('room_amenities_'.$i),
                        'units'             => $this->input->post('room_units_'.$i),
                        'room_pics'         => $room_images,
                    );

                    $room_id = $this->hotel_model->addHotelRoomDetails($room_data);
                   } 
                
                $tab = base64_encode(3);
                redirect(HOTEL.'/addHotel/'.$tab);
            }else{
                $this->session->set_flashdata('error', 'There is something problem! Please try again later');
                $tab = base64_encode(2);
                redirect(HOTEL.'/addHotel/'.$tab);
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
                'pan_no'                => $this->input->post('pan_no'),
                'acount_no'             => $this->input->post('acount_no'),
                'acount_holder_name'    => $this->input->post('acount_holder_name'),
                'bank'                  => $this->input->post('bank'),
                'branch'                => $this->input->post('branch'),
                'ifsc'                  => $this->input->post('ifsc')
            );

            $hotel_bank_id = $this->hotel_model->AddHotelBankingDetails($hotel_bank_details);

            if ($hotel_bank_id != '') {
                $tab = base64_encode(4);
                redirect(HOTEL.'/addHotel/'.$tab);
            }else{
                $this->session->set_flashdata('error', 'There is something problem while updating bank details! Please try again later');
                $tab = base64_encode(3);
                redirect(HOTEL.'/addHotel/'.$tab);
            }
        }

        if ($type == "AddHotelDocuments") {
            
            if(!empty($_FILES['pan_card']['name'])) {
                $config['upload_path'] = 'uploads/hotel_documents/';
                $config['allowed_types'] = '*';
                //$config['max_size'] = 100;
                $config['file_name'] = $_FILES['pan_card']['name'];
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('pan_card')){
                    $uploadData = $this->upload->data();
                    $hotel_pancard = $uploadData['file_name'];
                }else{
                    // $this->session->set_flashdata('error', $this->upload->display_errors());
                    // $tab = base64_encode(4);
                    // redirect(HOTEL.'/addHotel/'.$tab);
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
                $config['max_size'] = 100;
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                    // Upload file to server
                    //if(!empty($_FILES['contracts']['name'])){
                        if($this->upload->do_upload('file')){
                             $this->upload->do_upload('file');
                             // Uploaded file data
                             $fileData = $this->upload->data();
                             $upload_contract[] = $fileData['file_name'];
                        
                        }else{
                            // $this->session->set_flashdata('error', $this->upload->display_errors());
                            // $tab = base64_encode(4);
                            // redirect(HOTEL.'/addHotel/'.$tab);
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
                'pan_card_photo'  => $hotel_pancard,
                'contract'        => $upload_contract
            );

            $hotel_attached_id = $this->hotel_model->AddHotelDocuments($hotel_attached_documents);
            if($hotel_attached_id != '') {
                $tab = base64_encode(5);
                redirect(HOTEL.'/addHotel/'.$tab);
            }else{
                $this->session->set_flashdata('error', 'There is something problem while uploading documents! Please try again later');
                $tab = base64_encode(4);
                redirect(HOTEL.'/addHotel/'.$tab);
            }  
        }

        if($type == "AddHotelPhotos") {
            
            if (!empty($_FILES['hotel_photos']['name'])) {
               $filesCount = count($_FILES['hotel_photos']['name']);
               for($i = 0; $i < $filesCount; $i++){
                $_FILES['file']['name']         = $_FILES['hotel_photos']['name'][$i];
                $_FILES['file']['type']         = $_FILES['hotel_photos']['type'][$i];
                $_FILES['file']['tmp_name']     = $_FILES['hotel_photos']['tmp_name'][$i];
                $_FILES['file']['error']        = $_FILES['hotel_photos']['error'][$i];
                $_FILES['file']['size']         = $_FILES['hotel_photos']['size'][$i];
                
                // File upload configuration
                $uploadPath = 'uploads/hotel_photos/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png';
                //$config['max_size'] = 100;
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                    // Upload file to server
                    if($this->upload->do_upload('file')){
                        // Uploaded file data
                        $fileData = $this->upload->data();
                        $upload_photos[] = $fileData['file_name'];
                    }else{
                        // $this->session->set_flashdata('error', $this->upload->display_errors());
                        // $tab = base64_encode(5);
                        // redirect(HOTEL.'/addHotel/'.$tab);
                        $upload_photos = '';
                    }
                }
                if(is_array($upload_photos)) {
                    $upload_photos = json_encode($upload_photos);
                }
            }else{
                $upload_photos = '';
            }

            if($this->input->post('hotel_id') == '') {
               $hotel_id = $this->sesison->userdata('hotel_id');
            }else{
                $hotel_id = $this->input->post('hotel_id');
            }

            $hotel_photos = array(
                'hotel_id'      => $hotel_id,
                'hotel_photos'  => $upload_photos
            );

            $hotel_photos_id = $this->hotel_model->AddHotelPhotos($hotel_photos);
            if($hotel_photos_id != '') {
                $tab = base64_encode(6);
                redirect(HOTEL.'/addHotel/'.$tab);
            }else{
                $this->session->set_flashdata('error', 'There is something problem while uploading photos! Please try again later');
                $tab = base64_encode(5);
                redirect(HOTEL.'/addHotel/'.$tab);
            }
        }

        if ($type == "addHotelRatesDetail") {
            $hotel_id = $this->input->post('hotel_id');

            if ($hotel_id == '') {
                $hotel_id = $this->session->userdata('hotel_id');
            }

            $editId = $this->input->post('editid');
            if($editId != '')
            {
                $editId ; 
            }else{
                $editId=1;
            }
       
            $r = $editId;

            $fromdate       = date("Y-m-d", strtotime($this->input->post('fromdate_'.$r)));
            $todate         = date("Y-m-d", strtotime($this->input->post('todate_'.$r)));   
            $tblWiseItem    = $this->input->post('tbl_'.$r.'_item_count10');
            $mealType       = $this->input->post('mealPlan_'.$r);
            $cppakdescr     = $this->input->post('cppakdescription_'.$r);

            $update = $this->input->post('update');
            if ($update == 0) {
                $date_rates = $this->hotel_model->checkHotelDateRates($fromdate, $todate, $mealType,$hotel_id);
                if(!empty($date_rates)) {
                    $this->session->set_flashdata('error', 'Same Date and Meal Plan rate is already Exists. please try different date or meal plan');
                    echo 0;
                    exit;
                }else{
                    $data = array(
                        'hotel_id'    => $hotel_id,
                        'from_date'   => $fromdate,
                        'to_date'     => $todate,
                        'description' => $cppakdescr,
                        'meal_plan'   => $mealType
                    );
                    $new_date_rates_id = $this->hotel_model->addNewHotelDateRates($data);

                    if ($new_date_rates_id == '') {
                        $this->session->set_flashdata('error', 'There is something problem while adding price. Please try again! ');
                        echo 0;
                        exit;
                    }else{
                        $tblWiseItem=15;
                        $total_rates_itmes = $this->input->post('total_rates_itmes');
                        for($i=1; $i <= $tblWiseItem; $i++)
                        {
                            $k=2;
                            for($j=1;$j <= $total_rates_itmes;$j++)
                            {
                                $room_rates = array(
                                    'hotel_id'      => $hotel_id,
                                    'date_id'       => $new_date_rates_id,
                                    'room_name'     => $this->input->post('room_name_'.$r.'_'.$i.'_1'),
                                    'room_name_id'  => $this->input->post('roomName_'.$r.'_'.$i.'_1'),
                                    'room_type_id'  => $this->input->post('roomTypeId_'.$r.'_'.$i.'_'.$k),
                                    'price'         => $this->input->post('roomType_'.$r.'_'.$i.'_'.$k)
                                );
                                
                                $roomPrice = $this->input->post('roomType_'.$r.'_'.$i.'_'.$k);

                                if($roomPrice != '')
                                {
                                    $addHotelRates = $this->hotel_model->AddNewHotelRates($room_rates);
                                }
                                
                                $k++;
                            }
                        }

                        $this->session->set_flashdata('success', 'New Rates is added Successfully.');
                        echo 1;
                        exit;
                    }
                }
            }else{
            	$date_rates = $this->hotel_model->checkHotelDateRates($fromdate, $todate, $mealType,$hotel_id);
            	if (!empty($date_rates)) {
            		$date_Id = $this->input->post('date_id_'.$r);
            		
            		$packdescription = array(
            		    'description'=>$this->input->post('cppakdescription_'.$r),
            		    );
            		$tblWiseItem=15;
                    $total_rates_itmes = $this->input->post('total_rates_itmes');
                    for($i=1; $i <= $tblWiseItem; $i++)
                    {
                        $k=2;
                        for($j=1;$j <= $total_rates_itmes;$j++)
                        {
                            $room_rates = array(
                                'hotel_id'      => $hotel_id,
                                'date_id'       => $date_Id,
                                'room_name'     => $this->input->post('room_name_'.$r.'_'.$i.'_1'),
                                'room_name_id'  => $this->input->post('roomName_'.$r.'_'.$i.'_1'),
                                'room_type_id'  => $this->input->post('roomTypeId_'.$r.'_'.$i.'_'.$k),
                                'price'         => $this->input->post('roomType_'.$r.'_'.$i.'_'.$k)
                            );

                            $hotel_rate_id = $this->input->post('hotelRateId_'.$r.'_'.$i.'_'.$k);
                            
                            $roomPrice = $this->input->post('roomType_'.$r.'_'.$i.'_'.$k);

                            if($roomPrice != '')
                            {
                                $updateHotelRates = $this->hotel_model->updateHotelRates($room_rates, $hotel_rate_id, $date_Id, $packdescription);
                            }
                            
                            $k++;
                        }
                        
                    }
                    
                    //$updatehotelRatedescription = $this->hotel_model->updateHotelDescr($date_Id, $packdescription);
 
                    $this->session->set_flashdata('success', ' Rates updated Successfully.');
                    echo 1;
                    exit;
            	}else{
	        		$this->session->set_flashdata('error', 'There is something problem while updating price. Please try again! ');
	                echo 0;
	                exit;
            	}
            }
        }
    }
    
    public function checkHotelExistWithZip()
    {
        $country_id = $this->input->post('country_id');
        $state_id = $this->input->post('state_id');
        $city_id = $this->input->post('city_id');
        $zip = $this->input->post('zip');
        $hotel_name = $this->input->post('hotel_name');
        
        $hotelExist = $this->hotel_model->checkHotelExistwithZip($country_id, $state_id, $city_id, $hotel_name, $zip);
        
        //echo json_encode($hotelExist);
        $cityarr = array();
        foreach($hotelExist as $hotelData){
            
            $cityarr= $this->hotel_model->getcityByCityId($hotelData->city_id);
        }
        
        $data = array();
        $data['hotelDetail'] = $hotelExist;
        $data['countries'] = $this->admin_model->getAllCountries();
        $data['cities'] = $cityarr;

        $data['states'] = $this->admin_model->getAllState();
        echo json_encode($data);
        
    }

    public function getMealPlanDate($hotel_id, $meal_id)
    {
        if ($hotel_id == '' || $meal_id == '') {
            $hotel_meal_date = [];
            exit;
        }else{
            $hotel_meal_date = $this->hotel_model->meal_plan_date($hotel_id,$meal_id);
            echo json_encode($hotel_meal_date);
        }
       
    }

    public function viewHotel()
    {
    	$this->global['pageTitle'] = 'Travwhizz : View Hotel';

    	$hotel_partner_id = $this->global['hotel_partner_id'];

    	if ($hotel_partner_id == '') {
    		$this->session->set_flashdata('error', 'No Hotel Added Yet! ');
    		$data['partners_hotel'] = '';
    	}else{
    		$data['partners_hotel'] = $this->hotel_model->getAllPartnerHotel($hotel_partner_id);
    	}
        
        $this->loadHotelViews("hotel/viewHotel", $this->global, $data , NULL);
    }
    
    public function viewInactiveHotel()
    {
    	$this->global['pageTitle'] = 'Travwhizz : Inactive Hotels';

    	$hotel_partner_id = $this->global['hotel_partner_id'];

    	if ($hotel_partner_id == '') {
    		$this->session->set_flashdata('error', 'No Hotel Added Yet! ');
    		$data['partners_hotel'] = '';
    	}else{
    		$data['partners_hotel'] = $this->hotel_model->getAllinactivePartnerHotel($hotel_partner_id);
    	}
        
        $this->loadHotelViews("hotel/viewInactiveHotel", $this->global, $data , NULL);
    }
    
    public function viewActiveHotel()
    {
    	$this->global['pageTitle'] = 'Travwhizz : Active Hotels';

    	$hotel_partner_id = $this->global['hotel_partner_id'];

    	if ($hotel_partner_id == '') {
    		$this->session->set_flashdata('error', 'No Hotel Added Yet! ');
    		$data['partners_hotel'] = '';
    	}else{
    		$data['partners_hotel'] = $this->hotel_model->getAllactivePartnerHotel($hotel_partner_id);
    	}
        
        $this->loadHotelViews("hotel/viewActiveHotel", $this->global, $data , NULL);
    }

    public function editHotel($tab, $hotel_id)
    {
    	$this->global['pageTitle'] = 'Travwhizz : Edit Hotel';
        if($hotel_id == '') {
            $this->session->set_flashdata('error', 'There is something problem. Please try again! ');
            redirect(HOTEL.'/viewHotel');
        }else{
            $hotel_id = base64_decode($hotel_id);
            $data['hotel_id'] = $hotel_id;
            if($tab == '') {
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
            
            //var_dump($tab);
            //var_dump($data['hotel_detail']);

            $this->loadHotelViews("hotel/editHotel", $this->global, $data , NULL);
        }
    }

    public function updateHotel()
    {
        $type = $this->input->post('type');
        $hotel_id = $this->input->post('hotel_id');
        if ($type == 'updateHotelDetails') {
            if ($hotel_id == '') {
                $this->session->set_flashdata('error', 'Could not Update Hotel Please try again later');
                redirect(HOTEL.'/viewHotel');
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
                //'no_room_types'         => (int)$this->input->post('no_room_types') + (int)$this->input->post('add_more_rows'),
                'hotel_type'            => $this->input->post('hotel_type'),
                'hotel_currency'        => $this->input->post('hotel_currency'),
                'hotel_star'            => $this->input->post('hotel_star'),
                'check_in'              => $this->input->post('check_in'),
                'check_out'             => $this->input->post('check_out'),
                'hotel_amenity'         => $this->input->post('hotel_amenity'),
                'hotel_description'     => $this->input->post('hotel_description'),
                'updated_at'            => date('Y-m-d : H:i:s')
            );

            $updated_hotel = $this->hotel_model->updateHotelDetails($hotel_data,$hotel_id);

            if ($updated_hotel > 0) {
                // $no_room_types = $this->input->post('no_room_types');
                // for ($i=1; $i <=$no_room_types ; $i++) { 
                //     if (!empty($_FILES['room_images_'.$i]['name'])) {
                //         $config['upload_path'] = 'uploads/hotel_room_photos/';
                //         $config['allowed_types'] = 'jpg|jpeg|png|gif';
                //         $config['file_name'] = $_FILES['room_images_'.$i]['name'];
                //         //Load upload library and initialize configuration
                //         $this->load->library('upload',$config);
                //         $this->upload->initialize($config);
                //         if($this->upload->do_upload('room_images_'.$i)){
                //             $uploadData = $this->upload->data();
                //             $room_images = $uploadData['file_name'];
                //         }else{
                //             $room_images = '';
                //         }
                //     }else{
                //         $room_images = '';
                //     }

                //     if ($room_images == '') {
                //         $room_data = array(
                //             'room_type'         => $this->input->post('room_name_'.$i), 
                //             'room_description'  => $this->input->post('room_description_'.$i),
                //             'room_amenities'    => $this->input->post('room_amenities_'.$i),
                //             'units'             => $this->input->post('room_units_'.$i)
                //         );
                //     }else{
                //         $room_data = array(
                //             'room_type'         => $this->input->post('room_name_'.$i), 
                //             'room_description'  => $this->input->post('room_description_'.$i),
                //             'room_amenities'    => $this->input->post('room_amenities_'.$i),
                //             'units'             => $this->input->post('room_units_'.$i),
                //             'room_pics'         => $room_images
                //         );
                //     }

                //     $room_id = $this->input->post('room_id_'.$i);

                //     $updated_room_details = $this->hotel_model->updateHotelRoomDetails($room_data,$hotel_id, $room_id);
                // }

                // $add_more_rows = $this->input->post('add_more_rows');
                // if ($add_more_rows > 0) {
                //   for ($i=1; $i <=$add_more_rows ; $i++) { 
                //     if (!empty($_FILES['add_room_images_'.$i]['name'])) {
                //         $config['upload_path'] = 'uploads/hotel_room_photos/';
                //         $config['allowed_types'] = 'jpg|jpeg|png|gif';
                //         $config['file_name'] = $_FILES['add_room_images_'.$i]['name'];
                //         //Load upload library and initialize configuration
                //         $this->load->library('upload',$config);
                //         $this->upload->initialize($config);
                //         if($this->upload->do_upload('add_room_images_'.$i)){
                //             $uploadData = $this->upload->data();
                //             $room_images = $uploadData['file_name'];
                //         }else{
                //             $room_images = '';
                //         }
                //     }else{
                //         $room_images = '';
                //     }

                //     $room_data = array(
                //         'hotel_id'          => $hotel_id,
                //         'room_type'         => $this->input->post('add_room_name_'.$i), 
                //         'room_description'  => $this->input->post('add_room_description_'.$i),
                //         'room_amenities'    => $this->input->post('add_room_amenities_'.$i),
                //         'units'             => $this->input->post('add_room_units_'.$i),
                //         'room_pics'         => $room_images,
                //     );

                //     $room_id = $this->hotel_model->addHotelRoomDetails($room_data);
                // }
                // }
                $tab = base64_encode(2);
                $hotel_id = base64_encode($hotel_id);
                redirect(HOTEL.'/editHotel/'.$tab.'/'.$hotel_id);
            }else{
                 $this->session->set_flashdata('error', 'There is something problem! Please try again later');
                $tab = base64_encode(1);
                redirect(HOTEL.'/addHotel/'.$tab);
            }
        }
        
        if($type == "updateHotelroom_Details"){
            if($hotel_id == ''){
                $this->session->set_flashdata('error', 'Could not Update Hotel Please try again later');
                redirect(HOTEL.'/viewHotel');
            }
            $hotel_room_data = array(
                'no_room_types' => (int)$this->input->post('no_room_types') + (int)$this->input->post('add_more_rows'),
            );
            
            $updated_room_data = $this->hotel_model->updateHotelDetails($hotel_room_data, $hotel_id);
            
                $no_room_types = $this->input->post('no_room_types');
                for($i=1; $i<=$no_room_types; $i++) { 
                    if(!empty($_FILES['room_images_'.$i]['name'])) {
                        $config['upload_path'] = 'uploads/hotel_room_photos/';
                        $config['allowed_types'] = 'jpg|jpeg|png';
                        $config['file_name'] = $_FILES['room_images_'.$i]['name'];
                        //Load upload library and initialize configuration
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        if($this->upload->do_upload('room_images_'.$i)){
                            $uploadData = $this->upload->data();
                            $room_images = $uploadData['file_name'];
                        }else{
                            $room_images = '';
                        }
                    }else{
                        $room_images = '';
                    }

                    if($room_images == '') {
                        $room_data = array(
                            'room_type'         => $this->input->post('room_name_'.$i), 
                            'room_description'  => $this->input->post('room_description_'.$i),
                            'room_amenities'    => $this->input->post('room_amenities_'.$i),
                            'units'             => $this->input->post('room_units_'.$i)
                        );
                    }else{
                        $room_data = array(
                            'room_type'         => $this->input->post('room_name_'.$i), 
                            'room_description'  => $this->input->post('room_description_'.$i),
                            'room_amenities'    => $this->input->post('room_amenities_'.$i),
                            'units'             => $this->input->post('room_units_'.$i),
                            'room_pics'         => $room_images
                        );
                    }

                    $room_id = $this->input->post('room_id_'.$i);

                    $updated_room_details = $this->hotel_model->updateHotelRoomDetails($room_data,$hotel_id, $room_id);
                }

                $add_more_rows = $this->input->post('add_more_rows');
                if($add_more_rows > 0) {
                   for($i=1; $i <=$add_more_rows; $i++) { 
                    if(!empty($_FILES['add_room_images_'.$i]['name'])) {
                        $config['upload_path'] = 'uploads/hotel_room_photos/';
                        $config['allowed_types'] = 'jpg|jpeg|png';
                        $config['file_name'] = $_FILES['add_room_images_'.$i]['name'];
                        //Load upload library and initialize configuration
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        if($this->upload->do_upload('add_room_images_'.$i)){
                            $uploadData = $this->upload->data();
                            $room_images = $uploadData['file_name'];
                        }else{
                            $room_images = '';
                        }
                    }else{
                        $room_images = '';
                    }

                    $room_data = array(
                        'hotel_id'          => $hotel_id,
                        'room_type'         => $this->input->post('add_room_name_'.$i), 
                        'room_description'  => $this->input->post('add_room_description_'.$i),
                        'room_amenities'    => $this->input->post('add_room_amenities_'.$i),
                        'units'             => $this->input->post('add_room_units_'.$i),
                        'room_pics'         => $room_images,
                    );

                    $room_id = $this->hotel_model->addHotelRoomDetails($room_data);
                   }
                }
            
            if($updated_room_data > 0) {
                $tab = base64_encode(3);
                $hotel_id = base64_encode($hotel_id);
                redirect(HOTEL.'/editHotel/'.$tab.'/'.$hotel_id);
            }
            elseif($updated_room_details > 0){
                $tab = base64_encode(3);
                $hotel_id = base64_encode($hotel_id);
                redirect(HOTEL.'/editHotel/'.$tab.'/'.$hotel_id);
                }
            elseif($room_id > 0){
                $tab = base64_encode(3);
                $hotel_id = base64_encode($hotel_id);
                redirect(HOTEL.'/editHotel/'.$tab.'/'.$hotel_id);
                }
            else{
                $this->session->set_flashdata('error', 'There is something problem! Please try again later');
                $tab = base64_encode(2);
                redirect(HOTEL.'/addHotel/'.$tab);
            }
        }

        if($type == "updateHotelBankingDetails") {
            if ($hotel_id == '') {
                $this->session->set_flashdata('error', 'Could not Update Hotel Please try again later');
                redirect(HOTEL.'/viewHotel');
            }
            $hotel_bank_details = array(
                'pan_no'                => $this->input->post('pan_no'),
                'acount_no'             => $this->input->post('acount_no'),
                'acount_holder_name'    => $this->input->post('acount_holder_name'),
                'bank'                  => $this->input->post('bank'),
                'branch'                => $this->input->post('branch'),
                'ifsc'                  => $this->input->post('ifsc')
            );

            $hotel_bank_id = $this->hotel_model->updateHotelBankingDetails($hotel_bank_details, $hotel_id);
            
            if($hotel_bank_id >= 0) {
                $tab = base64_encode(4);
                $hotel_id = base64_encode($hotel_id);
                redirect(HOTEL.'/editHotel/'.$tab.'/'.$hotel_id);
            }else{
                $this->session->set_flashdata('error', 'There is something problem while updating bank details! Please try again later');
                $tab = base64_encode(3);
                $hotel_id = base64_encode($hotel_id);
                redirect(HOTEL.'/editHotel/'.$tab.'/'.$hotel_id);
            }
        }

        if($type == "updateHotelDocuments") {

            if($hotel_id == ''){
                $this->session->set_flashdata('error', 'Could not Update Hotel Please try again later');
                redirect(HOTEL.'/viewHotel');
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
                if (is_array($upload_contract)) {
                    $upload_contract = json_encode($upload_contract);
                }
            }else{
                $upload_contract = '';
            }

            if($hotel_pancard == '' && $upload_contract == '') {
                $tab = base64_encode(5);
                $hotel_id = base64_encode($hotel_id);
                redirect(HOTEL.'/editHotel/'.$tab.'/'.$hotel_id);
            }else{
                $hotel_attached_documents = array(
                    'pan_card_photo'  => $hotel_pancard,
                    'contract'        => $upload_contract
                );
            }

            $hotel_attached_id = $this->hotel_model->updateHotelDocuments($hotel_attached_documents, $hotel_id);
            if($hotel_attached_id > 0) {
                $tab = base64_encode(5);
                $hotel_id = base64_encode($hotel_id);
                redirect(HOTEL.'/editHotel/'.$tab.'/'.$hotel_id);
            }else{
                $this->session->set_flashdata('error', 'There is something problem while uploading documents! Please try again later');
                $tab = base64_encode(4);
                $hotel_id = base64_encode($hotel_id);
                redirect(HOTEL.'/editHotel/'.$tab.'/'.$hotel_id);
            }
        }

        if($type == "updateHotelPhotos") {
            if($hotel_id == '') {
               $this->session->set_flashdata('error', 'Could not Update Hotel Please try again later');
                redirect(HOTEL.'/viewHotel');
            }
            if(!empty($_FILES['hotel_photos']['name'])) {
               $filesCount = count($_FILES['hotel_photos']['name']);
               for($i = 0; $i < $filesCount; $i++){
                $_FILES['file']['name']         = $_FILES['hotel_photos']['name'][$i];
                $_FILES['file']['type']         = $_FILES['hotel_photos']['type'][$i];
                $_FILES['file']['tmp_name']     = $_FILES['hotel_photos']['tmp_name'][$i];
                $_FILES['file']['error']        = $_FILES['hotel_photos']['error'][$i];
                $_FILES['file']['size']         = $_FILES['hotel_photos']['size'][$i];
                
                // File upload configuration
                $uploadPath = 'uploads/hotel_photos/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                    // Upload file to server
                    if($this->upload->do_upload('file')){
                        // Uploaded file data
                        $fileData = $this->upload->data();
                        $upload_photos[] = $fileData['file_name'];
                    }else{
                        $upload_photos = '';
                    }
                }
                if (is_array($upload_photos)) {
                    $upload_photos = json_encode($upload_photos);
                }
            }else{
                $upload_photos = '';
            }

            if($upload_photos == '') {
                $tab = base64_encode(6);
                $hotel_id = base64_encode($hotel_id);
                redirect(HOTEL.'/editHotel/'.$tab.'/'.$hotel_id);
            }else{
                $hotel_photos = array(
                    'hotel_photos'  => $upload_photos
                );
            }

            $hotel_photos_id = $this->hotel_model->updateHotelPhotos($hotel_photos, $hotel_id);
            if ($hotel_photos_id != '') {
                $tab = base64_encode(6);
                $hotel_id = base64_encode($hotel_id);
                redirect(HOTEL.'/editHotel/'.$tab.'/'.$hotel_id);
            }else{
                $this->session->set_flashdata('error', 'There is something problem while uploading photos! Please try again later');
                $tab = base64_encode(5);
                $hotel_id = base64_encode($hotel_id);
                redirect(HOTEL.'/editHotel/'.$tab.'/'.$hotel_id);
            }
        }
    }

    public function deleteHotel($hotel_id)
    {
        if ($hotel_id == '') {
            $this->session->set_flashdata('error', 'There is something problem while Deleting Hotel! Please try again later');
             redirect(HOTEL.'/viewHotel');
        }else{
            $delete_id = $this->hotel_model->deleteHotelById(base64_decode($hotel_id));

            if ($delete_id > 0) {
                $this->session->set_flashdata('success', 'Hotel Deleted Successfully!!!');
                redirect(HOTEL.'/viewHotel');
            }else{
                $this->session->set_flashdata('error', 'There is something problem while Deleting Hotel! Please try again later');
                redirect(HOTEL.'/viewHotel'); 
            }
        }
    }

    public function deleteRateTable()
    {
        $date_id = $this->input->post('date_id');
        if ($date_id == '') {
            echo 0;
            exit;
        }else{
            $delete_date_rates_table = $this->hotel_model->deleteDateRateTable($date_id);

            if ($delete_date_rates_table > 0) {
                $this->session->set_flashdata('success', 'Rate Table Deleted Successfully!!!');
                echo 1;
                exit;
            }else{
               $this->session->set_flashdata('error', 'There is something problem while Deleting Rate Table! Please try again later');
               echo 0;
               exit;
            }
        }
    }

    public function updateHotelImageCaption()
    {
        $hotel_id = $this->input->post('hotel_id');
        $caption = json_encode($this->input->post('image_caption'));

        $data = array(
            'captions' => $caption
        );
        
        $update_caption = $this->hotel_model->updateHotelPhotosCaption($data, $hotel_id);

        if($update_caption > 0) {
            $this->session->set_flashdata('success', 'Image Captions Updated Successfully!!!');
            echo 1;
            exit;
        }else{
            $this->session->set_flashdata('error', 'There is something problem! Please try again later');
           echo 0;
           exit;
        }
    }
    
    public function getPendingHotelBookings()
    {
        $hotel_partner_id = $this->global['hotel_partner_id'];
        
        $data['hotelbookings'] = $this->hotel_model->getAllPendingHotelBookings($hotel_partner_id);
        
        $this->global['pageTitle'] = 'Travwhizz :Hotel Bookings';
        
        $this->loadHotelViews("hotel/ViewNewHotelBookings", $this->global, $data , NULL);
    }
    
    public function viewHotelBooking($booking_id)
    {
        //echo $booking_id;
        $hotel_partner_id = $this->global['hotel_partner_id'];
        
        $data['bookindetails']  = $bookindetails = $this->hotel_model->getPendingHotelbookingById($booking_id, $hotel_partner_id);
        $data['adultsinroom'] = $adultsinroom = unserialize($bookindetails->adults_in_room);
        $data['childsinroom'] = $childsinroom = unserialize($bookindetails->childs_in_room);
        $data['infantsinroom'] = $infantsinroom = unserialize($bookindetails->infants_in_room);
        $data['childsageinroom'] = $childsageinroom = unserialize($bookindetails->childs_age);
        $data['startdate'] = $startdate = $bookindetails->check_in_date;
        $data['enddate'] = $enddate = $bookindetails->check_out_date;
        $data['roomtypes'] = $roomtypes = explode(',', $bookindetails->room_types);
        $data['mealtypes'] = $mealtypes = explode(',', $bookindetails->meal_types);
        $data['roomprices'] = $roomprices = json_decode($bookindetails->room_prices);
        
        $hotel_id = $bookindetails->hotel_id;
    
        $data['arrRoomType'] = $arrRoomType = $this->admin_model->getHotelRoomTypeByid($hotel_id);

        $data['date_rates_detail'] = $date_rates_detail = $this->admin_model->getDateRatesByid_calculate($hotel_id, $startdate, $enddate);
        
        $this->global['pageTitle'] = 'Travwhizz :Hotel Bookings';
        
        $this->loadHotelViews("hotel/ViewhotelBookingByid", $this->global, $data , NULL);
    }
    
    public function generateHotelbookingNumber()
    {
        $hotel_partner_id = $this->global['hotel_partner_id'];
        $packageid = $this->input->post('packageid');
        $data = array(
            'voucher_number' => $this->input->post('voucher_number'),
            'hotel_confirmation' => "Confirmed",
            'confirmed_on' => date('Y-m-d : H:i:s'),
            );
            
        $response = $this->hotel_model->generateBookingNumberofHotelPackage($packageid, $hotel_partner_id, $data);
        
        if($response > 0)
        {
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }
    }
    
     public function getAllconfirmedHotelBookings()
    {
        $hotel_partner_id = $this->global['hotel_partner_id'];
        
        $data['hotelbookings'] = $this->hotel_model->getAllConfirmedHotelBookings($hotel_partner_id);
        
        $this->global['pageTitle'] = 'Travwhizz :Hotel Bookings';
        
        $this->loadHotelViews("hotel/ConfirmedHotelBookings", $this->global, $data , NULL);
    }
    
    
    /**
     * This function is used to show users profile
     */
    public function Profile($active = "details")
    {
        $hotel_partner_id = $this->global['hotel_partner_id'];
        $data["userInfo"] = $this->hotel_model->getHotelUserInfo($hotel_partner_id);
        $data["active"] = $active;
        
        $this->global['pageTitle'] = $active == "details" ? 'My Profile' : 'Change Password';
        $this->loadHotelViews("hotel/Profile", $this->global, $data, NULL);
    }
    
    /**
     * This function is used to update the user details
     * @param text $active : This is flag to set the active tab
     */
    public function HotelUserProfileUpdate($active = "details")
    {
        $this->load->library('form_validation');
            
        $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
        $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
        $this->form_validation->set_rules('email','Email','trim|valid_email|max_length[128]');        
        
        if($this->form_validation->run() == FALSE)
        {
            $this->Profile($active);
        }
        else
        {
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            $hotel_partnerId = $this->input->post('userId');
            if($email == ""){
                $email = strtolower($this->security->xss_clean($this->input->post('oldEmail')));
            }
            $userInfo = array('name'=>$name, 'email'=>$email, 'contact_no'=>$mobile, 'updated_at'=>date('Y-m-d H:i:s'));
            
            $result = $this->hotel_model->editHotelUser($userInfo, $hotel_partnerId);
            
            if($result == true)
            {
                $this->session->set_userdata('name', $name);
                $this->session->set_flashdata('success', 'Profile updated successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Profile updation failed');
            }

            redirect(HOTEL.'/Profile/'.$active);
        }
    }
    
      /**
     * This function is used to change the password of the user
     * @param text $active : This is flag to set the active tab
     */
    public function changeHotelUserPassword($active = "changepass")
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('oldPassword','Old password','required|max_length[20]');
        // $this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
        // $this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->Profile($active);
        }
        else
        {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');
            $hotel_partnerId = $this->input->post('userId');
            
            $resultPas = $this->hotel_model->matchHotelUserOldPassword($hotel_partnerId, $oldPassword);
            
            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Your old password is not correct');
                redirect(HOTEL.'/Profile/'.$active);
            }
            else
            {   
                $usersData = array('password'=>getHashedPassword($newPassword), 'updated_at'=>date('Y-m-d H:i:s'));
                
                $result = $this->hotel_model->changeHoteluserPassword($hotel_partnerId, $usersData);
                
                if($result > 0) { $this->session->set_flashdata('success', 'Password updation successful'); }
                else { $this->session->set_flashdata('error', 'Password updation failed'); }
                
                redirect(HOTEL.'/Profile/'.$active);
            }
        }
    }
    
    /**
     * This function is used to check whether email already exist or not
     * @param {string} $email : This is users email
     */
    function emailExists($email)
    {
        $hotel_partner_id = $this->global['hotel_partner_id'];
        $return = false;

        if(empty($userId)){
            $result = $this->hotel_model->checkEmailExists($email);
        } else {
            $result = $this->hotel_model->checkEmailExists($email, $hotel_partner_id);
        }

        if(empty($result)){ $return = true; }
        else {
            $this->form_validation->set_message('emailExists', 'The {field} already taken');
            $return = false;
        }

        return $return;
    }
    
    /**
     * This function is used to check whether email already exist or not
     */
    function checkEmailExists()
    {
        $hotel_partner_id = $this->input->post("userId");
        $email = $this->input->post("email");

        if(empty($userId)){
            $result = $this->hotel_model->checkEmailExists($email);
        } else {
            $result = $this->hotel_model->checkEmailExists($email, $hotel_partner_id);
        }

        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }
}