<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Admin_model (Admin Model)
 * User model class to get to handle user related data 
 * @author : Sachin Gupta
 * @version : 1.1
 * @since : 13 March 2019
 */
class Hotel_model extends CI_Model
{
    /**
     * This function is used to check whether email id is already exist or not
     * @param {string} $email : This is email id
     * @param {number} $userId : This is user id
     * @return {mixed} $result : This is searched result
     */
    function checkEmailExists($email, $hotel_partner_id = 0)
    {
        $this->db->select("email");
        $this->db->from("hotel_partner");
        $this->db->where("email", $email);   
        //$this->db->where("status", 1);
        if($hotel_partner_id != 0){
            $this->db->where("hotel_partner_id !=", $hotel_partner_id);
        }
        $query = $this->db->get();

        return $query->result();
    }
    /**
     * This function is used to change users password
     * @param number $userId : This is user id
     * @param array $userInfo : This is user updation info
     */
    function changeHoteluserPassword($hotel_partnerId, $usersData)
    {
        $this->db->where('hotel_partner_id', $hotel_partnerId);
        $this->db->where('status', 1);
        $this->db->update('hotel_partner', $usersData);
        
        return $this->db->affected_rows();
    }
    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editHotelUser($userInfo, $hotel_partnerId)
    {
        $this->db->where('hotel_partner_id', $hotel_partnerId);
        $this->db->update('hotel_partner', $userInfo);
        return TRUE;
    }
    /**
     * This function used to get user information by id with role
     * @param number $userId : This is user id
     * @return aray $result : This is user information
     */
    function getHotelUserInfo($hotel_partner_id)
    {
        $this->db->select('*');
        $this->db->from('hotel_partner');
        //$this->db->join('tbl_roles as Roles','Roles.roleId = BaseTbl.roleId');
        $this->db->where('hotel_partner_id', $hotel_partner_id);
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->row();
    }
    /**
     * This function is used to match users password for change password
     * @param number $userId : This is user id
     */
    function matchHotelUserOldPassword($hotel_partnerId, $oldPassword)
    {
        $this->db->select('hotel_partner_id, password');
        $this->db->from('hotel_partner');
        $this->db->where('hotel_partner_id', $hotel_partnerId);
        //$this->db->where('password', verifyHashedPassword($oldPassword));
        $this->db->where('status', 1);
        $query = $this->db->get();
        $user = $query->result();
        //var_dump($user);

        if(!empty($user)){
            if(verifyHashedPassword($oldPassword, $user[0]->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
    
     // This function used to create new password by reset link
    function createHotelPartnerPasswordUser($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('status', 1);
        $this->db->update('hotel_partner', array('password'=>getHashedPassword($password)));
        $this->db->delete('tbl_reset_password', array('email'=>$email));
    }
    
    public function checkHotelPartnerActivationDetails($email, $activation_id)
    {
        $this->db->select('id');
        $this->db->from('tbl_reset_password');
        $this->db->where('email', $email);
        $this->db->where('activation_id', $activation_id);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    public function checkHotelPartnerEmailExist($email)
    {
        $this->db->select('email');
        $this->db->where('email', $email);
        $this->db->where('status', 1);
        $query = $this->db->get('hotel_partner');

        if($query->num_rows() > 0){
            return true;
        }else {
            return false;
        }
    }
    
    public function resetPasswordHotelUser($data)
    {
        $result = $this->db->insert('tbl_reset_password', $data);

        if($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function getHotelPartnerInfoByEmail($email)
    {
        $this->db->select('hotel_partner_id, email, name');
        $this->db->from('hotel_partner');
        $this->db->where('status', 1);
        $this->db->where('email', $email);
        $query = $this->db->get();

        return $query->row();
    }
    
    public function getSelmealDescriptionByid($startdate, $enddate, $hotel_id, $userSelectMealTypes)
    {
        $query = "select * from (SELECT * FROM hotel_dates_rate WHERE ((DATE_FORMAT(from_date, '%Y-%m-%d')<='$startdate') && (DATE_FORMAT(to_date,'%Y-%m-%d')>='$enddate')) || ((DATE_FORMAT(from_date,'%Y-%m-%d')<='$startdate') && (DATE_FORMAT(to_date,'%Y-%m-%d')>='$enddate'))) as d where d.hotel_id = $hotel_id AND d.meal_plan IN($userSelectMealTypes)";
        $result = $this->db->query($query)->result_array();
        return $result;
    }
    
    public function addNewHotelPartner($data)
    {
        $this->db->trans_start();
        $this->db->insert('hotel_partner', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    public function getHotelById($hotel_id)
    {
        $this->db->select("*");
        $this->db->from("hotel_partner");
        $this->db->where("hotel_partner_id",$hotel_id);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
    }

    public function varifyHotelPartnerEmail($hotel_id, $data)
    {
        $this->db->where('hotel_partner_id', $hotel_id);
        $this->db->update('hotel_partner', $data);
        
        return $this->db->affected_rows();
    }

    public function checkHotelParterByEmail($email)
    {
        $this->db->select("*");
        $this->db->from("hotel_partner");
        $this->db->where("email",$email);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
    }

    public function loginHotel($email, $password)
    {
        //$this->db->select("hotel_partner.*,countries.country_name,states.state_name,city.city_name");
        $this->db->select("*");
        $this->db->from("hotel_partner");
        // $this->db->join("countries","countries.id = hotel_partner.country_id");
        // $this->db->join("states","states.id = hotel_partner.state_id");
        // $this->db->join("city","city.id = hotel_partner.city_id");
        $this->db->where("email", $email);
        $this->db->where('email_varified', 1);
        $this->db->where('status', 1);
        $query = $this->db->get();
        $result = $query->row(); 
        
        if(!empty($result)){
            if(verifyHashedPassword($password, $result->password)){
                return $result;
            }else {
                return array();
            }
        }else {
            return array();
        }
    }

    public function addHotelDetails($data)
    {
        $this->db->trans_start();
        $this->db->insert('hotel_details', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    
    public function addHotelRoomTypeDetails($roomDetail, $hotel_id)
    {
        $this->db->where('hotel_id', $hotel_id);
        $this->db->update('hotel_details', $roomDetail);
            
        return $this->db->affected_rows();
    }

    public function addHotelRoomDetails($data)
    {
        $this->db->trans_start();
        $this->db->insert('hotel_room_details', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    public function AddHotelBankingDetails($data)
    {
        $this->db->trans_start();
        $this->db->insert('hotel_bank_details', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    public function AddHotelDocuments($data)
    {
        $this->db->trans_start();
        $this->db->insert('hotel_documents', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    public function AddHotelPhotos($data)
    {
        $this->db->trans_start();
        $this->db->insert('hotel_photos', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    public function getHotelRoomDetails($hotel_id)
    {
        $this->db->select('*');
        $this->db->from('hotel_room_details');
        $this->db->where('hotel_id', $hotel_id);
        $this->db->order_by('room_id','ASC');
        $query = $this->db->get();
        $result = $query->result_array();        
        return $result;
    }

    public function getAllHotelRoom()
    {
        $this->db->select('*');
        $this->db->from('hotel_master_room_name');
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function getDateRatesByid($hotel_id)
    {
        $this->db->select('*');
        $this->db->from('hotel_dates_rate');
        $this->db->where('hotel_id', $hotel_id);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function meal_plan_date($hotel_id, $meal_id)
    {
        $this->db->select('from_date,to_date');
        $this->db->from('hotel_dates_rate');
        $this->db->where('hotel_id', $hotel_id);
        $this->db->where('meal_plan', $meal_id);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    public function checkHotelExistwithZip($country_id, $state_id, $city_id, $hotel_name, $zip)
    {
        // $this->db->select('country_id, state_id, city_id, zip, hotel_name');
        
        // $this->db->from('hotel_details');
        // $this->db->where('country_id', $country_id);
        // $this->db->where('state_id', $state_id);
        // $this->db->where('city_id', $city_id);
        //$this->db->where('zip', $zip);
        //$this->db->where('hotel_name', $hotel_name);
        // $query = $this->db->get();
        // $result = $query->result();        
        // return $result;
        
        // Explode by " " to get an Array
        $search_explode = explode(" ",$hotel_name);
        // Create condition
        $condition_arr = array();
        foreach($search_explode as $value){
          $condition_arr[] = " hotel_name like '%".$value."%' AND country_id like '%".$country_id."%' AND state_id like '%".$state_id."%' AND city_id like '%".$city_id."%' AND zip like '%".$zip."%' ";
        }
        
        $condition = " ";
        if(count($condition_arr) > 0){
          $condition = "WHERE".implode(" or ",$condition_arr);
        }
        // Select Query
         
        $query = "SELECT * FROM hotel_details ".$condition;
        $result = $this->db->query($query)->result();
        return $result;

    }
    
    public function getcityByCityId($cityId)
    {
        $this->db->select("city_name");
        $this->db->from("city");
        $this->db->where("id", $cityId);
        $this->db->where('status', '1');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function checkHotelDateRates($fromdate, $todate, $mealType, $hotel_id)
    {
        $this->db->select('*');
        $this->db->from('hotel_dates_rate');
        $this->db->where('from_date', $fromdate);
        $this->db->where('to_date', $todate);
        $this->db->where('meal_plan', $mealType);
        $this->db->where('hotel_id', $hotel_id);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function addNewHotelDateRates($data)
    {
        $this->db->trans_start();
        $this->db->insert('hotel_dates_rate', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    public function AddNewHotelRates($data)
    {
        $this->db->trans_start();
        $this->db->insert('hotel_room_rates', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    public function getAllHotelRoom_edit($hotel_id, $date_id)
    {
        $this->db->select('DISTINCT(room_name), room_name_id');  
        $this->db->from('hotel_room_rates');  
        $this->db->where('hotel_id',$hotel_id);
        $this->db->where('date_id', $date_id);
        $this->db->order_by('id','ASC'); 
        $query=$this->db->get();  
        $result = $query->result_array();
        return $result;
    }

    public function getHotelRatesByid($hotel_id, $date_id, $room_id)
    {
        $this->db->select('*');  
        $this->db->from('hotel_room_rates');  
        $this->db->where('hotel_id',$hotel_id);
        $this->db->where('date_id', $date_id);
        $this->db->where('room_type_id', $room_id);
        $query=$this->db->get();  
        $result = $query->result_array();
        return $result;
    }

    public function updateHotelRates($data, $room_rate_id, $date_Id, $packdescription)
    {   
        if(!empty($room_rate_id))
        {
            $this->db->where('id', $room_rate_id);
            $this->db->update('hotel_room_rates', $data);
            
            $this->db->where('id', $date_Id);
            $this->db->update('hotel_dates_rate', $packdescription);
            
            return $this->db->affected_rows();
            
        }else{
            $this->db->trans_start();
            $this->db->insert('hotel_room_rates', $data);
            $insert_id = $this->db->insert_id();
            $this->db->trans_complete();
            return $insert_id;
        }
    }
    

    public function getAllPartnerHotel($hotel_partner_id)
    {
        $this->db->select('hotel_details.*,countries.country_name,states.state_name,city.city_name');
        $this->db->from('hotel_details');
        $this->db->join("countries","countries.id = hotel_details.country_id");
        $this->db->join("states","states.id = hotel_details.state_id");
        $this->db->join("city","city.id = hotel_details.city_id");
        $this->db->where('hotel_partner_id', $hotel_partner_id);
        $this->db->order_by("hotel_id", "DESC");
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    public function getAllinactivePartnerHotel($hotel_partner_id)
    {
        $this->db->select('hotel_details.*,countries.country_name,states.state_name,city.city_name');
        $this->db->from('hotel_details');
        $this->db->join("countries","countries.id = hotel_details.country_id");
        $this->db->join("states","states.id = hotel_details.state_id");
        $this->db->join("city","city.id = hotel_details.city_id");
        $this->db->where('hotel_partner_id', $hotel_partner_id);
        $this->db->where('hotel_details.status', 0);
        $this->db->order_by("hotel_id", "DESC");
        //$this->db->limit(2);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    public function getAllactivePartnerHotel($hotel_partner_id)
    {
        $this->db->select('hotel_details.*,countries.country_name,states.state_name,city.city_name');
        $this->db->from('hotel_details');
        $this->db->join("countries","countries.id = hotel_details.country_id");
        $this->db->join("states","states.id = hotel_details.state_id");
        $this->db->join("city","city.id = hotel_details.city_id");
        $this->db->where('hotel_partner_id', $hotel_partner_id);
        $this->db->where('hotel_details.status', 1);
        $this->db->order_by("hotel_id", "DESC");
        //$this->db->limit(2);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    public function getAllPartnerHotelBylimit($hotel_partner_id)
    {
        $this->db->select('hotel_details.*,countries.country_name,states.state_name,city.city_name');
        $this->db->from('hotel_details');
        $this->db->join("countries","countries.id = hotel_details.country_id");
        $this->db->join("states","states.id = hotel_details.state_id");
        $this->db->join("city","city.id = hotel_details.city_id");
        $this->db->where('hotel_partner_id', $hotel_partner_id);
        $this->db->order_by("hotel_id", "DESC");
        $this->db->limit(2);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    public function getAllactivePartnerHotelBylimit($hotel_partner_id)
    {
        $this->db->select('hotel_details.*,countries.country_name,states.state_name,city.city_name');
        $this->db->from('hotel_details');
        $this->db->join("countries","countries.id = hotel_details.country_id");
        $this->db->join("states","states.id = hotel_details.state_id");
        $this->db->join("city","city.id = hotel_details.city_id");
        $this->db->where('hotel_partner_id', $hotel_partner_id);
        $this->db->where('hotel_details.status', 1);
        $this->db->order_by("hotel_id", "DESC");
        $this->db->limit(2);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    public function getAllinactivePartnerHotelBylimit($hotel_partner_id)
    {
        $this->db->select('hotel_details.*,countries.country_name,states.state_name,city.city_name');
        $this->db->from('hotel_details');
        $this->db->join("countries","countries.id = hotel_details.country_id");
        $this->db->join("states","states.id = hotel_details.state_id");
        $this->db->join("city","city.id = hotel_details.city_id");
        $this->db->where('hotel_partner_id', $hotel_partner_id);
        $this->db->where('hotel_details.status', 0);
        $this->db->order_by("hotel_id", "DESC");
        $this->db->limit(2);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function getHotelByHotelId($hotel_id)
    {   
        $this->db->select('hotel_details.*,countries.country_name,states.state_name,city.city_name');
        $this->db->from('hotel_details');
        $this->db->join("countries","countries.id = hotel_details.country_id");
        $this->db->join("states","states.id = hotel_details.state_id");
        $this->db->join("city","city.id = hotel_details.city_id");
        //$this->db->join("hotel_photos", "hotel_photos.hotel_id = hotel_details.hotel_id");
        $this->db->where('hotel_details.hotel_id', $hotel_id);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
        
    }
    
    public function getHotelDetailforSearchById($hotel_id)
    {
        $this->db->select('hotel_details.*,countries.country_name,states.state_name,city.city_name,hotel_photos.hotel_photos');
        $this->db->from('hotel_details');
        $this->db->join("countries","countries.id = hotel_details.country_id");
        $this->db->join("states","states.id = hotel_details.state_id");
        $this->db->join("city","city.id = hotel_details.city_id");
        $this->db->join("hotel_photos", "hotel_photos.hotel_id = hotel_details.hotel_id");
        $this->db->where('hotel_details.hotel_id', $hotel_id);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
        
    }

    public function getHotelBankDetailById($hotel_id)
    {
        $this->db->select('*');
        $this->db->from('hotel_bank_details');
        $this->db->where('hotel_id', $hotel_id);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
    }

    public function getHotelDocumentsById($hotel_id)
    {
        $this->db->select('*');
        $this->db->from('hotel_documents');
        $this->db->where('hotel_id', $hotel_id);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
    }

    public function getHotelPhotosById($hotel_id)
    {
        $this->db->select('*');
        $this->db->from('hotel_photos');
        $this->db->where('hotel_id', $hotel_id);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
    }

    public function getHotelRoomsById($hotel_id)
    {
        $this->db->select('*');
        $this->db->from('hotel_room_details');
        $this->db->where('hotel_id', $hotel_id);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function updateHotelDetails($data, $hotel_id)
    {
        $this->db->where('hotel_id', $hotel_id);
        $this->db->update('hotel_details', $data);
            
        return $this->db->affected_rows();
    }
    
    public function updateHotelRoomDetails($data, $hotel_id, $room_id)
    {
        $this->db->where('hotel_id', $hotel_id);
        $this->db->where('room_id', $room_id);
        $this->db->update('hotel_room_details', $data);
            
        return $this->db->affected_rows();
    }

    public function updateHotelBankingDetails($data, $hotel_id)
    {
        $this->db->where('hotel_id', $hotel_id);
        $this->db->update('hotel_bank_details', $data);
            
        return $this->db->affected_rows();
    }

    public function updateHotelDocuments($data, $hotel_id)
    {
        $this->db->where('hotel_id', $hotel_id);
        $this->db->update('hotel_documents', $data);
            
        return $this->db->affected_rows();
    }

    public function updateHotelPhotos($data, $hotel_id)
    {
        $this->db->where('hotel_id', $hotel_id);
        $this->db->update('hotel_photos', $data);
            
        return $this->db->affected_rows();
    }

    public function deleteHotelById($hotel_id)
    {
        $this ->db->where('hotel_id', $hotel_id);
        $this ->db-> delete('hotel_details');

        $this ->db->where('hotel_id', $hotel_id);
        $this ->db-> delete('hotel_bank_details');

        $this ->db->where('hotel_id', $hotel_id);
        $this ->db-> delete('hotel_room_details');

        $this ->db->where('hotel_id', $hotel_id);
        $this ->db-> delete('hotel_dates_rate');

        $this ->db->where('hotel_id', $hotel_id);
        $this ->db-> delete('hotel_documents');

        $this ->db->where('hotel_id', $hotel_id);
        $this ->db-> delete('hotel_photos');

        $this ->db->where('hotel_id', $hotel_id);
        $this ->db-> delete('hotel_room_rates');

        return $this->db->affected_rows();
    }

    public function deleteDateRateTable($date_id)
    {
        $this->db->where('id', $date_id);
        $this->db->delete('hotel_dates_rate');

        $this->db->where('date_id', $date_id);
        $this->db->delete('hotel_room_rates');

        return $this->db->affected_rows();
    }

    public function updateHotelPhotosCaption($data, $hotel_id)
    {
        $this->db->where('hotel_id', $hotel_id);
        $this->db->update('hotel_photos', $data);
            
        return $this->db->affected_rows();
    }
    
    public function getAllPendingHotelBookings($hotel_partner_id)
    {
        $this->db->select("saved_hotel_packages.*, hotel_details.*, countries.country_name, states.state_name, city.city_name, partner_list.company_name");
        $this->db->from("saved_hotel_packages");
        $this->db->join("hotel_details",'hotel_details.hotel_id = saved_hotel_packages.hotel_id');
        $this->db->join("countries","countries.id = hotel_details.country_id");
        $this->db->join("states","states.id = hotel_details.state_id");
        $this->db->join("city","city.id = hotel_details.city_id");
        $this->db->join("partner_list", 'partner_list.partner_id = saved_hotel_packages.partner_id');
        $this->db->where('saved_hotel_packages.hotel_confirmation', "Pending");
        $this->db->where('saved_hotel_packages.hotel_partner_id', $hotel_partner_id);
        $this->db->order_by("id",'DESC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
        
    }
    
    public function getPendingHotelbookingById($booking_id, $hotel_partner_id)
    {
        $this->db->select("saved_hotel_packages.*, hotel_details.*, countries.country_name, states.state_name, city.city_name");
        $this->db->from("saved_hotel_packages");
        $this->db->join("hotel_details",'hotel_details.hotel_id = saved_hotel_packages.hotel_id');
        $this->db->join("countries","countries.id = hotel_details.country_id");
        $this->db->join("states","states.id = hotel_details.state_id");
        $this->db->join("city","city.id = hotel_details.city_id");
        //$this->db->join("partner_list", 'partner_list.partner_id = saved_hotel_packages.partner_id');
        $this->db->where('saved_hotel_packages.id', $booking_id);
        $this->db->where('saved_hotel_packages.hotel_partner_id', $hotel_partner_id);
        //$this->db->order_by("id",'DESC');
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
        
    }
    
    public function generateBookingNumberofHotelPackage($packageid, $hotel_partner_id, $data)
    {
        $this->db->where('id', $packageid);
        $this->db->where('hotel_partner_id', $hotel_partner_id);
        $this->db->update('saved_hotel_packages', $data);
        
        return $this->db->affected_rows();
    }
    
    public function getAllConfirmedHotelBookings($hotel_partner_id)
    {
        $this->db->select("saved_hotel_packages.*, hotel_details.*, countries.country_name, states.state_name, city.city_name, partner_list.company_name");
        $this->db->from("saved_hotel_packages");
        $this->db->join("hotel_details",'hotel_details.hotel_id = saved_hotel_packages.hotel_id');
        $this->db->join("countries","countries.id = hotel_details.country_id");
        $this->db->join("states","states.id = hotel_details.state_id");
        $this->db->join("city","city.id = hotel_details.city_id");
        $this->db->join("partner_list", 'partner_list.partner_id = saved_hotel_packages.partner_id');
        $this->db->where('saved_hotel_packages.hotel_confirmation', "Confirmed");
        $this->db->where('saved_hotel_packages.hotel_partner_id', $hotel_partner_id);
        $this->db->order_by("id",'DESC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
        
    }
}

  