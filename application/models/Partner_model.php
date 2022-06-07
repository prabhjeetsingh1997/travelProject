<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Admin_model (Admin Model)
 * User model class to get to handle user related data 
 * @author : Sachin Gupta
 * @version : 1.1
 * @since : 13 March 2019
 */
class Partner_model extends CI_Model
{
    public function confirmItIPakage($itiData)
    {   
        $this->db->trans_start();
        $this->db->insert('ConfirmedPackages', $itiData);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    
    public function NewConfpakHotel($hotelConfData)
    {
        $this->db->trans_start();
        $this->db->insert('confirmedHotelpackages', $hotelConfData);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
        
    }
    
    public function NewConfpakVehicle($vehData)
    {
        $this->db->trans_start();
        $this->db->insert('ConfirmedVehiclePak', $vehData);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
        
    }
    
    public function NewConfpakActivities($actvData)
    {
        $this->db->trans_start();
        $this->db->insert('ConfirmedActivityPak', $actvData);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
        
    }
    
    public function NewConfUnitpakActivities($unitActivities)
    {
        $this->db->trans_start();
        $this->db->insert('ConfirmedUnitActivityPak', $unitActivities);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
        
    }
    
    public function getAllconfirmedPakByempId($emp_id, $partner_id)
    {
        $this->db->select("ConfirmedPackages.*, itinerary_management.*, countries.country_name, states.state_name");
        $this->db->from("ConfirmedPackages");
        $this->db->join("itinerary_management",'itinerary_management.id = ConfirmedPackages.itinerary_id');
        $this->db->join("countries","countries.id = itinerary_management.country");
        $this->db->join("states","states.id = itinerary_management.state");
        //$this->db->join("city","city.id = hotel_details.city_id");
        //$status = array("Waiting", "Pending");
        //$this->db->or_where_in("saved_hotel_packages.hotel_confirmation", $status);
        //$this->db->where("saved_hotel_packages.hotel_confirmation", "Pending");
        $this->db->where('emp_id', $emp_id);
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->order_by("ConfirmedPackages.confpak_id",'DESC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    public function getConfPakDetailByid($confpak_id)
    {
        $this->db->select("ConfirmedPackages.*, itinerary_management.*, countries.country_name, states.state_name");
        $this->db->from("ConfirmedPackages");
        $this->db->join("itinerary_management",'itinerary_management.id = ConfirmedPackages.itinerary_id');
        $this->db->join("countries","countries.id = itinerary_management.country");
        $this->db->join("states","states.id = itinerary_management.state");
        //$this->db->join("hotel_room_details", 'hotel_room_details.room_id = saved_hotel_packages.room_types');
        $this->db->where('ConfirmedPackages.confpak_id', $confpak_id);
        $this->db->where('partner_id', $this->global['partner_id']);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
    }
    
    public function getConfPakHotelDetail($confpak_id)
    {
        $this->db->select("confirmedHotelpackages.*, hotel_details.*, hotel_room_details.room_type, countries.country_name, states.state_name, city.city_name");
        $this->db->from("confirmedHotelpackages");
        $this->db->join("hotel_details", 'hotel_details.hotel_id = confirmedHotelpackages.hotel_id');
        $this->db->join("hotel_room_details", 'hotel_room_details.room_id = confirmedHotelpackages.room_type_id');
        $this->db->join("countries","countries.id = hotel_details.country_id");
        $this->db->join("states","states.id = hotel_details.state_id");
        $this->db->join("city","city.id = hotel_details.city_id");
        $this->db->where("confirmedHotelpackages.confpak_id", $confpak_id);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    public function getConfPakvehicleDetail($confpak_id)
    {
        $this->db->select("ConfirmedVehiclePak.*, itinerary_vehicle_mutiple.*");
        $this->db->from("ConfirmedVehiclePak");
        $this->db->join("itinerary_vehicle_mutiple", 'itinerary_vehicle_mutiple.id = ConfirmedVehiclePak.selected_vehicle_Id');
        $this->db->where("ConfirmedVehiclePak.confpak_id", $confpak_id);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    public function getConfPakActivityDetail($confpak_id)
    {
        $this->db->select("*");
        $this->db->from("ConfirmedActivityPak");
        //$this->db->join("itinerary_vehicle_mutiple", 'itinerary_vehicle_mutiple.id = ConfirmedVehiclePak.selected_vehicle_Id');
        $this->db->where("confpak_id", $confpak_id);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    public function getConfPakUnitActivity($confpak_id)
    {
        $this->db->select("*");
        $this->db->from("ConfirmedUnitActivityPak");
        $this->db->where("confpak_id", $confpak_id);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
        
    }
    
    public function getItinerarycity($id)
    {
       return $this->db->query("SELECT * FROM city WHERE state_id IN($id) order by id")->result_array();
    }
    
    public function getActivitiesById($actvId)
    {
        $query = "SELECT * FROM activities WHERE id IN($actvId) ORDER BY id ASC";
        return $result = $this->db->query($query)->result_array();
    }
    
    public function getperUnitActivitiesById($unitactvId)
    {
        $query = "SELECT * FROM activitiesbyunit WHERE id IN($unitactvId) ORDER BY id ASC";
        return $result = $this->db->query($query)->result_array();
    }
    
    public function getPartnerDetails($partner_id)
    {
     $this->db->select("*");
     $this->db->from("partner_list");
     $this->db->where("partner_id", $partner_id);
     $this->db->where('status', 1);
     $query = $this->db->get();
     $result = $query->row();
     return $result;
    }
    
    public function editPartnerUser($userInfo, $partnerId)
    {
        $this->db->where('partner_id', $partnerId);
        $this->db->update('partner_list', $userInfo);
        return TRUE;
    }
    
    public function checkEmailExists($email, $partner_id = 0)
    {
        $this->db->select("email");
        $this->db->from("partner_list");
        $this->db->where("email", $email);   
        //$this->db->where("status", 1);
        if($partner_id != 0){
            $this->db->where("partner_id !=", $partner_id);
        }
        $query = $this->db->get();

        return $query->result();
    }
    
    public function getHotelRoomTypeByroomId($selectedRooms)
    {
        $this->db->select('*');
        $this->db->from("hotel_room_details");
        $this->db->where_in("room_id", $selectedRooms);
        //$this->db->order_by("room_id","ASE");
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    
    public function getSelmealDescrDeatilsByid($startdate, $enddate, $hotel_id, $userSelectMealTypes)
    {
        $query = "select * from (SELECT * FROM hotel_dates_rate WHERE ((DATE_FORMAT(from_date, '%Y-%m-%d')<='$startdate') && (DATE_FORMAT(to_date,'%Y-%m-%d')>='$enddate')) || ((DATE_FORMAT(from_date,'%Y-%m-%d')<='$startdate') && (DATE_FORMAT(to_date,'%Y-%m-%d')>='$enddate'))) as d where d.hotel_id = $hotel_id AND d.meal_plan IN($userSelectMealTypes)";
        $result = $this->db->query($query)->result_array();
        return $result;
    }
    
    public function getHotelRoomDetailsByid($room_id, $hotel_id)
    {
        $this->db->select("*");
        $this->db->from("hotel_room_details");
        $this->db->where('room_id', $room_id);
        $this->db->where('hotel_id', $hotel_id);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
    }
    
    public function getMealplanDescrByid($hotel_id, $startdate, $endate, $meal_id)
    {
        $query = "select * from (SELECT * FROM hotel_dates_rate WHERE ((DATE_FORMAT(from_date, '%Y-%m-%d')<='$startdate') && (DATE_FORMAT(to_date,'%Y-%m-%d')>='$endate')) || ((DATE_FORMAT(from_date,'%Y-%m-%d')<='$startdate') && (DATE_FORMAT(to_date,'%Y-%m-%d')>='$endate'))) as d where d.hotel_id = $hotel_id AND d.meal_plan = $meal_id";
        $result = $this->db->query($query)->row();
        return $result;
    }
    public function saved_hotel_package($data)
    {
        $this->db->trans_start();
        $this->db->insert('saved_hotel_packages', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    public function getAllConfirmedHotelPackagesByempId($emp_id, $partner_id)
    {
        $this->db->select("saved_hotel_packages.*, hotel_details.*, countries.country_name, states.state_name, city.city_name");
        $this->db->from("saved_hotel_packages");
        $this->db->join("hotel_details",'hotel_details.hotel_id = saved_hotel_packages.hotel_id');
        $this->db->join("countries","countries.id = hotel_details.country_id");
        $this->db->join("states","states.id = hotel_details.state_id");
        $this->db->join("city","city.id = hotel_details.city_id");
        $this->db->where("saved_hotel_packages.hotel_confirmation", "Confirmed");
        $this->db->where('emp_id', $emp_id);
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->order_by("id",'DESC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    public function getAllwaitingHotelPackagesByempId($emp_id, $partner_id)
    {
        $this->db->select("saved_hotel_packages.*, hotel_details.*, countries.country_name, states.state_name, city.city_name");
        $this->db->from("saved_hotel_packages");
        $this->db->join("hotel_details",'hotel_details.hotel_id = saved_hotel_packages.hotel_id');
        $this->db->join("countries","countries.id = hotel_details.country_id");
        $this->db->join("states","states.id = hotel_details.state_id");
        $this->db->join("city","city.id = hotel_details.city_id");
        $status = array("Waiting", "Pending");
        $this->db->or_where_in("saved_hotel_packages.hotel_confirmation", $status);
        //$this->db->where("saved_hotel_packages.hotel_confirmation", "Pending");
        $this->db->where('emp_id', $emp_id);
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->order_by("id",'DESC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    public function getAllCancelledHotelPackagesByempId($emp_id, $partner_id)
    {
        $this->db->select("saved_hotel_packages.*, hotel_details.*, countries.country_name, states.state_name, city.city_name");
        $this->db->from("saved_hotel_packages");
        $this->db->join("hotel_details",'hotel_details.hotel_id = saved_hotel_packages.hotel_id');
        $this->db->join("countries","countries.id = hotel_details.country_id");
        $this->db->join("states","states.id = hotel_details.state_id");
        $this->db->join("city","city.id = hotel_details.city_id");
        $this->db->where("saved_hotel_packages.hotel_confirmation", "Cancelled");
        $this->db->where('emp_id', $emp_id);
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->order_by("id",'DESC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    public function getAllCancelledHotelPackagesBypartnerId($partner_id)
    {
        $this->db->select("saved_hotel_packages.*, hotel_details.*, countries.country_name, states.state_name, city.city_name");
        $this->db->from("saved_hotel_packages");
        $this->db->join("hotel_details",'hotel_details.hotel_id = saved_hotel_packages.hotel_id');
        $this->db->join("countries","countries.id = hotel_details.country_id");
        $this->db->join("states","states.id = hotel_details.state_id");
        $this->db->join("city","city.id = hotel_details.city_id");
        $this->db->where("saved_hotel_packages.hotel_confirmation", "Cancelled");
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->order_by("id",'DESC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    public function getAllSavedHotelPackages($partner_id)
    {
        $this->db->select("saved_hotel_packages.*, hotel_details.*, countries.country_name, states.state_name, city.city_name");
        $this->db->from("saved_hotel_packages");
        $this->db->join("hotel_details",'hotel_details.hotel_id = saved_hotel_packages.hotel_id');
        $this->db->join("countries","countries.id = hotel_details.country_id");
        $this->db->join("states","states.id = hotel_details.state_id");
        $this->db->join("city","city.id = hotel_details.city_id");
        //$this->db->join("partner_employee", 'partner_employee.id = saved_hotel_packages.emp_id');
        //$this->db->where('emp_id', $emp_id);
        $this->db->where("saved_hotel_packages.hotel_confirmation", "Confirmed");
        $this->db->where('saved_hotel_packages.partner_id', $partner_id);
        $this->db->order_by("id",'DESC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    public function getAllwaitingHotelPackagesInadmin($partner_id)
    {
        $this->db->select("saved_hotel_packages.*, hotel_details.*, countries.country_name, states.state_name, city.city_name");
        $this->db->from("saved_hotel_packages");
        $this->db->join("hotel_details",'hotel_details.hotel_id = saved_hotel_packages.hotel_id');
        $this->db->join("countries","countries.id = hotel_details.country_id");
        $this->db->join("states","states.id = hotel_details.state_id");
        $this->db->join("city","city.id = hotel_details.city_id");
        //$this->db->join("partner_employee", 'partner_employee.id = saved_hotel_packages.emp_id');
        //$this->db->where('emp_id', $emp_id);
        $status = array("Waiting", "Pending");
        $this->db->or_where_in("saved_hotel_packages.hotel_confirmation", $status);
        $this->db->where('saved_hotel_packages.partner_id', $partner_id);
        $this->db->order_by("id",'DESC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    public function getSavedHotelPackageByid($package_id)
    {
        $this->db->select("saved_hotel_packages.*, hotel_details.*, countries.country_name, states.state_name, city.city_name");
        $this->db->from("saved_hotel_packages");
        $this->db->join("hotel_details",'hotel_details.hotel_id = saved_hotel_packages.hotel_id');
        $this->db->join("countries","countries.id = hotel_details.country_id");
        $this->db->join("states","states.id = hotel_details.state_id");
        $this->db->join("city","city.id = hotel_details.city_id");
        //$this->db->join("hotel_room_details", 'hotel_room_details.room_id = saved_hotel_packages.room_types');
        $this->db->where('saved_hotel_packages.id', $package_id);
        $this->db->where('partner_id', $this->global['partner_id']);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;

    }
    
    public function cancelHotelBookingbyId($hotelbooking_id, $data)
    {
        $this->db->where('id', $hotelbooking_id);
        $this->db->update('saved_hotel_packages', $data);
        return $this->db->affected_rows();
    }

    public function getclientwithqueryid($queryid)
    {
        $this->db->select("partner_query.*, partner_client.organization");
        $this->db->from("partner_query");
        $this->db->join("partner_client",'partner_client.client_number = partner_query.contact_no');
        $this->db->where('partner_query.partner_id', $this->global['partner_id']);
        $this->db->where("partner_query.id", $queryid);
        $query = $this->db->get();
        return $query->row();        
    }
	public function getHotelByCityId($city_id)
    {
       $this->db->select("*");
       $this->db->from("partner_hotel_details");
       $this->db->where("city_id",$city_id);
       $this->db->order_by("hotel_name",'ASC');
       $query = $this->db->get();
       $result = $query->result();        
       return $result;
    }
    
    public function checkVendorExistwithName($vendorName)
    {
        $partner_id = $this->global['partner_id'];
        // Explode by " " to get an Array
        $search_explode = explode(" ",$vendorName);
        // Create condition
        $condition_arr = array();
        foreach($search_explode as $value){
          $condition_arr[] = " company_name like '%".$value."%' AND partner_id like '%".$partner_id."%' ";
        }
        $condition = " ";
        if(count($condition_arr) > 0){
          $condition = "WHERE".implode(" or ",$condition_arr);
        }
        // Select Query
        $query = "SELECT * FROM vendor_details ".$condition;
        $result = $this->db->query($query)->result();
        return $result;
        // $this->db->select('company_name, address_line_1, address_line_2');
        // $this->db->from('vendor_details');
        // $this->db->where('company_name', $vendorName);
        // $this->db->where('partner_id', $this->global['partner_id']);
        // $query = $this->db->get();
        // $result = $query->result();        
        // return $result;
    }
    
    public function addVendorDetails($companyInfo)
    {
        $this->db->trans_start();
        $this->db->insert('vendor_details', $companyInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    public function addConcernPersonDetails($concernInfo)
    {
        $this->db->trans_start();
        $this->db->insert('vendor_extra_details', $concernInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    public function addVendorBankingDetails($banking_detail)
    {
        $this->db->trans_start();
        $this->db->insert('vendor_banking_details', $banking_detail);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    public function checkVendorExists($contact_no)
    {
        $this->db->select("vendorId");
        $this->db->from("vendor_details");
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->where('contact_no', $contact_no);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
    }
    
    public function getAllVendors()
    {
        $this->db->select("vendor_details.*, vendor_extra_details.*, vendor_banking_details.*, countries.country_name, states.state_name, city.city_name");
        $this->db->from("vendor_details");
        $this->db->join("vendor_extra_details",'vendor_extra_details.vendor_id = vendor_details.vendorId');
        $this->db->join("countries","countries.id = vendor_details.country_id");
        $this->db->join("states","states.id = vendor_details.state_id");
        $this->db->join("city","city.id = vendor_details.city_id");
        //$this->db->join("partner_emp_official_details",'partner_emp_official_details.emp_id = partner_employee.id');
        $this->db->join("vendor_banking_details",'vendor_banking_details.vendor_id = vendor_details.vendorId');
        $this->db->where('partner_id', $this->global['partner_id']);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
     public function getAllVendorsById($vendorId)
    {
        
        $this->db->select("vendor_details.*, vendor_extra_details.*, vendor_banking_details.*, countries.country_name, states.state_name, city.city_name");
        $this->db->from("vendor_details");
        $this->db->join("vendor_extra_details",'vendor_extra_details.vendor_id = vendor_details.vendorId');
        $this->db->join("countries","countries.id = vendor_details.country_id");
        $this->db->join("states","states.id = vendor_details.state_id");
        $this->db->join("city","city.id = vendor_details.city_id");
        //$this->db->join("partner_emp_official_details",'partner_emp_official_details.emp_id = partner_employee.id');
        $this->db->join("vendor_banking_details",'vendor_banking_details.vendor_id = vendor_details.vendorId');
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->where("vendor_details.vendorId", $vendorId);
        $query = $this->db->get();
        
        return $query->row();
    }
    
    public function updateVendorDetails($companyInfo,$vendorId)
    {
        $this->db->where('vendorId', $vendorId);
        $this->db->update('vendor_details', $companyInfo);
        
        return $this->db->affected_rows();
    }

    public function updateConcernPersonDetails($concernInfo,$vendorId)
    {
        $this->db->where('vendor_id', $vendorId);
        $this->db->update('vendor_extra_details', $concernInfo);
        
        return $this->db->affected_rows();
    }
    
    public function updateVendorBankingDetails($banking_detail,$vendorId)
    {
        $this->db->where('vendor_id', $vendorId);
        $this->db->update('vendor_banking_details', $banking_detail);
        
        return $this->db->affected_rows();
    }
    
     public function deleteVendorById($vendorId)
    {
        $this->db->where('vendorId', $vendorId);
        $this->db-> delete('vendor_details');

        $this->db->where('vendor_id', $vendorId);
        $this->db-> delete('vendor_extra_details');

        $this->db->where('vendor_id', $vendorId);
        $this->db-> delete('vendor_banking_details');

        return $this->db->affected_rows();
    }
    
    public function addUserDetails($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('partner_employee', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    public function addUserprimaryAddress($addressInfo)
    {
        $this->db->trans_start();
        $this->db->insert('partner_emp_address_details', $addressInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    public function addUserOfficialAddress($officialDetails)
    {
        $this->db->trans_start();
        $this->db->insert('partner_emp_official_details', $officialDetails);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    public function addUserBankingDetails($bankingDetails)
    {
        $this->db->trans_start();
        $this->db->insert('partner_emp_banking_details', $bankingDetails);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    public function getAllEmployeeList()
    {
        $this->db->select("partner_employee.*, partner_emp_address_details.*, partner_emp_official_details.*,partner_emp_banking_details.*,countries.country_name,states.state_name,city.city_name");
        $this->db->from("partner_employee");
        $this->db->join("partner_emp_address_details",'partner_emp_address_details.emp_id = partner_employee.id');
        $this->db->join("countries","countries.id = partner_emp_address_details.country_id");
        $this->db->join("states","states.id = partner_emp_address_details.state_id");
        $this->db->join("city","city.id = partner_emp_address_details.city_id");
        $this->db->join("partner_emp_official_details",'partner_emp_official_details.emp_id = partner_employee.id');
        $this->db->join("partner_emp_banking_details",'partner_emp_banking_details.emp_id = partner_employee.id');
        $this->db->where('partner_id', $this->global['partner_id']);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function getAllEmployeeById($employee_id)
    {
        $this->db->select("partner_employee.*, partner_emp_address_details.*, partner_emp_official_details.*,partner_emp_banking_details.*,countries.country_name,states.state_name,city.city_name");
        $this->db->from("partner_employee");
        $this->db->join("partner_emp_address_details",'partner_emp_address_details.emp_id = partner_employee.id');
        $this->db->join("countries","countries.id = partner_emp_address_details.country_id");
        $this->db->join("states","states.id = partner_emp_address_details.state_id");
        $this->db->join("city","city.id = partner_emp_address_details.city_id");
        $this->db->join("partner_emp_official_details",'partner_emp_official_details.emp_id = partner_employee.id');
        $this->db->join("partner_emp_banking_details",'partner_emp_banking_details.emp_id = partner_employee.id');
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->where("partner_employee.id",$employee_id);
        $query = $this->db->get();
        
        return $query->row();
    }

    public function updateUserDetails($userInfo, $employee_id)
    {
        $this->db->where('id', $employee_id);
        $this->db->update('partner_employee', $userInfo);
        
        return $this->db->affected_rows();
    }

    public function updateUserprimaryAddress($primary_address, $employee_id)
    {
        $this->db->where('emp_id', $employee_id);
        $this->db->update('partner_emp_address_details', $primary_address);
        
        return $this->db->affected_rows();
    }

    public function updateUserOfficialAddress($official_address, $employee_id)
    {
        $this->db->where('emp_id', $employee_id);
        $this->db->update('partner_emp_official_details', $official_address);
        
        return $this->db->affected_rows();
    }

    public function updateUserBankingDetails($banking_detail, $employee_id)
    {
        $this->db->where('emp_id', $employee_id);
        $this->db->update('partner_emp_banking_details', $banking_detail);
        
        return $this->db->affected_rows();
    }

    public function deleteEmployeeById($employee_id)
    {
        $this->db->where('id', $employee_id);
        $this->db-> delete('partner_employee');

        $this->db->where('emp_id', $employee_id);
        $this->db-> delete('partner_emp_address_details');

        $this->db->where('emp_id', $employee_id);
        $this->db-> delete('partner_emp_official_details');

        $this->db->where('emp_id', $employee_id);
        $this->db-> delete('partner_emp_banking_details');

        return $this->db->affected_rows();
    }
    


    public function addNewQuery($data)
    {
        $this->db->trans_start();
        $this->db->insert('partner_query', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    public function getCityandState()
    {
       $this->db->select("city.*, states.state_name, countries.country_name");
       $this->db->from("city");
       $this->db->join("states", 'states.id = city.state_id');
       $this->db->join("countries", 'countries.id = states.country_id');
       $this->db->where("city.status", 1);
       $this->db->order_by("city_name",'ASC');
       $query = $this->db->get();
       $result = $query->result();        
       return $result;
    }
    
    public function getEmployeeDetails()
    {
        $this->db->select("id, name");
        $this->db->from("partner_employee");
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->where('email',$this->global['email']);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
    }
    
    public function getAllClient()
    {
        //$this->db->limit($limit,$id);
        $this->db->select('partner_client.*, city.city_name');
        $this->db->from('partner_client');
        $this->db->join('city','city.id = partner_client.city_id', 'left');
        $this->db->where('partner_client.partner_id', $this->global['partner_id']);
        $this->db->order_by("partner_client.id", "DESC");
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    public function makeTourCard($data)
    {
        $this->db->trans_start();
        $this->db->insert('other_tour_card_details', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    
    public function makeTourCarddays($datamore)
    {
        $this->db->trans_start();
        $this->db->insert('other_tourcard_days', $datamore);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    public function makePerformaInvoice($data)
    {
        $this->db->trans_start();
        $this->db->insert('performainvoice', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    
    public function makePerformaInvoiceParticulars($datamore)
    {
        $this->db->trans_start();
        $this->db->insert('performaparticulars', $datamore);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    public function MakeHotelVoucher($data)
    {
        $this->db->trans_start();
        $this->db->insert('partnerhotel_voucher', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    
    //make ledger for Hotel Voucher
    public function chkvendorExistInLedger($vendor_ID)
    {
        $this->db->select("*");
        $this->db->from("Vendor_ledgers");
        $this->db->where("vendor_id", $vendor_ID);
        $this->db->where("partner_id", $this->global['partner_id']);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
    }
    
    
    public function makeNewVendorLedger($ledgerData)
    {
        $this->db->trans_start();
        $this->db->insert('Vendor_ledgers', $ledgerData);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    
    
    public function updateHotelVoucher($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('partnerhotel_voucher', $data);
        
        return $this->db->affected_rows();
    }

    public function updateHotelvoucherstatus($datastatus, $tourdaysid)
    {
        $this->db->where('id', $tourdaysid);
        //$this->db->where('partner_id', $this->global['partner_id']);
        $this->db->update('other_tourcard_days', $datastatus);
        
        return $this->db->affected_rows();
    }
    
    public function removeHotelVoucher($voucherid)
    {
        $this->db->where('tourdaysid', $voucherid);
        $this->db->delete('partnerhotel_voucher');
        return $this->db->affected_rows();
    }
    
    public function updatehotelstatus($datastatus, $voucherid)
    {
        $this->db->where('id', $voucherid);
        //$this->db->where('partner_id', $this->global['partner_id']);
        $this->db->update('other_tourcard_days', $datastatus);
        return $this->db->affected_rows();
    }
    
    //Transport Voucher
    public function MakeTransportVoucher($data)
    {
        $this->db->trans_start();
        $this->db->insert('transport_voucher', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    
    public function updateTransportVoucher($data, $id)
    {
        $this->db->where('id', $id);
        //$this->db->where('partner_id', $this->global['partner_id']);
        $this->db->update('transport_voucher', $data);
        
        return $this->db->affected_rows();
    }
    
    public function updateTransportVoucherstatus($datastatus, $tourdaysid)
    {
        $this->db->where('id', $tourdaysid);
        //$this->db->where('partner_id', $this->global['partner_id']);
        $this->db->update('other_tourcard_days', $datastatus);
        
        return $this->db->affected_rows();
    }
    
    public function updateTransportvouchStatus($voucherstatus, $Tcid)
    {
        $this->db->where('tcid', $Tcid);
        //$this->db->where('partner_id', $this->global['partner_id']);
        $this->db->update('other_tour_card_details', $voucherstatus);
        return $this->db->affected_rows();
    }
    
    //Vendor Ledger
    
    public function getAllpartnerVendorLedger()
    {
        $this->db->select("*");
        $this->db->from("Vendor_ledgers");
        $this->db->where("partner_id", $this->global['partner_id']);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getVendorLedgerDetailsById($vendorLedId)
    {
        $this->db->select("*");
        $this->db->from("vendorLedger_particular");
        $this->db->where("vendor_id", $vendorLedId);
        $this->db->where("partner_id", $this->global['partner_id']);
        $query = $this->db->get();
        return $query->result();
    }
    
    
    //general Ledger
    public function getAllgeneralLedgers()
    {
        $this->db->select("*");
        $this->db->from("general_ledger");
        $this->db->where("partner_id", $this->global['partner_id']);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function makenewGeneralLedger($data)
    {
        $this->db->trans_start();
        $this->db->insert('general_ledger', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    
    public function makenewSubLedger($data)
    {
        $this->db->trans_start();
        $this->db->insert('sub_ledger', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    
    public function getAllSubLedgers()
    {
        $this->db->select("*");
        $this->db->from("sub_ledger");
        $this->db->where("partner_id", $this->global['partner_id']);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getSubLedgersById($subLedgerID)
    {
        $this->db->select("*");
        $this->db->from("sub_ledger");
        $this->db->where("gn_ledgerId", $subLedgerID);
        $this->db->where("partner_id", $this->global['partner_id']);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getGeneralLedgerName($ledgerId)
    {
        $this->db->select("*");
        $this->db->from("general_ledger");
        $this->db->where('id', $ledgerId);
        $this->db->where("partner_id", $this->global['partner_id']);
        $query = $this->db->get();
        return $query->row();
    }
    
     public function makeGeneralLedgerEntry($ledgerEntry)
    {
        $this->db->trans_start();
        $this->db->insert('generalLedger_particulars', $ledgerEntry);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
        
    }
    
    public function getLedgerDetailByID($ledgerIds)
    {
        $this->db->select("*");
        $this->db->from("vendorLedger_particular");
        $this->db->where_in("id", $ledgerIds);
        $this->db->where("partner_id", $this->global['partner_id']);
        $query = $this->db->get();
        return $query->result();
        
    }
    public function getgeneralLedgerDetailsByid($ledgerId)
    {
        $this->db->select("*");
        $this->db->from("generalLedger_particulars");
        $this->db->where("gledger_id", $ledgerId);
        $this->db->where("partner_id", $this->global['partner_id']);
        $query = $this->db->get();
        return $query->result();
    }
    
     public function insertVendorLedgerParticulars($vendorLedgerentries)
    {
        $this->db->trans_start();
        $this->db->insert('vendorLedger_particular', $vendorLedgerentries);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    
    public function getpartnerTransportVoucherbyId($voucher_id)
    {
        $this->db->select("*");
        $this->db->from('transport_voucher');
        // $this->db->join('states','states.id = transport_voucher.com_state_id');
        // $this->db->join('city','city.id = transport_voucher.com_city_id');
        // $this->db->join('countries','countries.id = transport_voucher.com_country_id');
        $this->db->where('tourdaysid', $voucher_id);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    public function getAllTourCard()
    {
        $this->db->select("*");
        $this->db->from("other_tour_card_details");
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->order_by("tcid", "DESC");
        $query = $this->db->get();
        $result = $query->result();        
        return $result;

    }
    
    public function getEmployeeTourCard($emp_id)
    {
        $this->db->select("*");
        $this->db->from("other_tour_card_details");
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->where('employee_id',$emp_id);
        //$this->db->where('status', 1);
        $this->db->order_by("tcid", "DESC");
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    

    public function getPartnerClientByTourCardid($tourcard_id)
    {
        $this->db->select("other_tour_card_details.*, countries.country_name, partner_client.client_name, partner_client.organization");
        $this->db->from("other_tour_card_details");
        $this->db->join("countries","countries.id = other_tour_card_details.country");
        $this->db->join("partner_client",'partner_client.id = other_tour_card_details.party');
        $this->db->where("other_tour_card_details.tcid",$tourcard_id);
        $this->db->where('other_tour_card_details.partner_id', $this->global['partner_id']);
        //$this->db->order_by("id", "DESC");
        $query = $this->db->get();
        return $query->row();
    }

    public function updateTourCardPerformInvoice($datastatus, $tourcard_id)
    {
        $this->db->where('tcid', $tourcard_id);
        //$this->db->where('partner_id', $this->global['partner_id']);
        $this->db->update('other_tour_card_details', $datastatus);
        
        return $this->db->affected_rows();
    }
    
    public function getEmployeeTourCarddaysById($tourcard_id)
    {
        $this->db->select('*');
        $this->db->from('other_tourcard_days');
        $this->db->where('other_tourcard_days.Tcid', $tourcard_id);
        $this->db->where('other_tourcard_days.partner_id', $this->global['partner_id']);
        //$this->db->join('partner_hotel_details','partner_hotel_details.hotel_id = other_tourcard_days.hotel_filter');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    public function getEmpTourCarddaydetails($day_id)
    {
        $this->db->select("*");
        $this->db->from('other_tourcard_days');
        //$this->db->join('vendor_details','vendor_details.vendorId = other_tourcard_days.vendor_name');
        $this->db->where('id', $day_id);
        $this->db->where('partner_id', $this->global['partner_id']);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function getEmpTourCarddayById($day_id)
    {
        $this->db->select("other_tourcard_days.*, partner_hotel_details.hotel_name, partner_hotel_details.address_line_1, partner_hotel_details.address_line_2, partner_hotel_details.country_id, partner_hotel_details.state_id, partner_hotel_details.city_id, partner_hotel_details.hotel_mobile_no");
        $this->db->from('other_tourcard_days');
        $this->db->join('partner_hotel_details','partner_hotel_details.hotel_id = other_tourcard_days.hotel_filter');
        //$this->db->where('other_tourcard_days.id', $tourcard_id);
        $this->db->where('other_tourcard_days.id', $day_id);
        //$this->db->where('other_tourcard_days.partner_id', $this->global['partner_id']);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function getpartnerHotelVoucherbyId($voucher_id){
        $this->db->select("partnerhotel_voucher.*, states.state_name, city.city_name, countries.country_name");
        $this->db->from('partnerhotel_voucher');
        $this->db->join('states','states.id = partnerhotel_voucher.state_id');
        $this->db->join('city','city.id = partnerhotel_voucher.city_id');
        $this->db->join('countries','countries.id = partnerhotel_voucher.country_id');
        $this->db->where('partnerhotel_voucher.tourdaysid', $voucher_id);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    public function getperformaInvoicebyId($invoice_id){
        $this->db->select("performainvoice.*, states.state_name, city.city_name, countries.country_name");
        $this->db->from('performainvoice');
        $this->db->join('states','states.id = performainvoice.state_id');
        $this->db->join('city','city.id = performainvoice.city_id');
        $this->db->join('countries','countries.id = performainvoice.country_id');
        $this->db->where('performainvoice.tourcard_id', $invoice_id);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    public function getperformaparticulars($invoice_id){
        $this->db->select("*");
        $this->db->from('performaparticulars');
        $this->db->where('performaparticulars.tourcard_id', $invoice_id);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    
    
    public function updateTourCard($data, $tourcard_id)
    {
        $this->db->where('tcid', $tourcard_id);
        $this->db->update('other_tour_card_details', $data);
        
        return $this->db->affected_rows();
    }
    
    public function updateTourCarddays($datamore, $tourcard_id, $tourdaysid)
    {
        $this->db->where('id', $tourdaysid);
        $this->db->where('Tcid', $tourcard_id);
        $this->db->update('other_tourcard_days', $datamore);
        
        return $this->db->affected_rows();
    }
    
    public function deleteTourCard($tourcard_id)
    {
        $this->db->where('tcid', $tourcard_id);
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->delete('other_tour_card_details');
        
        $this->db->where('Tcid', $tourcard_id);
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->delete('other_tourcard_days');
        return $this->db->affected_rows();
    }
    
    public function deleteTourCarddays($tourdaysid)
    {
        $this->db->where('id', $tourdaysid);
        $this->db->delete('other_tourcard_days');
        
        // $this->db->where('tcid', $Tcid);
        // $this->db->update('other_tour_card_details', $data);

        return $this->db->affected_rows();
    }
    

    public function getAllPartnerQuery($limit, $id)
    {
        $this->db->limit($limit,$id);
        $this->db->select('*');
        $this->db->from('partner_query');
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getPartnerQueryWithoutLimit()
    {
        
        $this->db->select('*');
        $this->db->from('partner_query');
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        return $query->result();
    }

    public function countAllPartnerQuery()
     {
        $this->db->select('*');
        $this->db->from('partner_query');
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        return $query->num_rows();
     } 

    public function getPartnerQueryById($query_id)
    {
        $this->db->select('*');
        $this->db->from('partner_query');
        $this->db->where('id', $query_id);
        $this->db->where('partner_id', $this->global['partner_id']);
        //$this->db->order_by("id", "DESC");
        $query = $this->db->get();
        return $query->row();
    }

    public function updateQuery($data, $query_id)
    {
        $this->db->where('id', $query_id);
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->update('partner_query', $data);
        
        return $this->db->affected_rows();
    }

    public function updateQuerytour($datastatus, $query_no)
    {
        $this->db->where('id', $query_no);
        //$this->db->where('partner_id', $this->global['partner_id']);
        $this->db->update('partner_query', $datastatus);
        
        return $this->db->affected_rows();
    }

    public function updatetourcardstatus($datastatus, $tcno)
    {
        $this->db->where('id', $tcno);
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->update('partner_query', $datastatus);
        
        return $this->db->affected_rows();
    }

    public function deletePartnerQueryById($query_id)
    {
        $this->db->where('id', $query_id);
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db-> delete('partner_query');

        return $this->db->affected_rows();
    }

    public function getAllPartnersEmployee()
    {
        $this->db->select("id, name");
        $this->db->from("partner_employee");
        $this->db->where('partner_id', $this->global['partner_id']);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function getAllPartnersEmployeeById($emp_id)
    {
        $this->db->select("name");
        $this->db->from("partner_employee");
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->where('id',$emp_id);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
    }

    public function updateQueryHandler($data, $query_id)
    {
        $this->db->where('id', $query_id);
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->update('partner_query', $data);
        
        return $this->db->affected_rows();
    }

    public function getEmployeeId()
    {
        $this->db->select("id, name, mobile, email");
        $this->db->from("partner_employee");
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->where('email',$this->global['email']);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
    }

    public function getEmployeeQueryInHand($emp_id)
    {
        $this->db->select("*");
        $this->db->from("partner_query");
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->where('handler_id',$emp_id);
        $this->db->where('status', 1);
        $this->db->order_by("query_assigndate", "DESC");
        //$this->db->order_by("id", "DESC");
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function getEmployeeConfirmedQuery($emp_id)
    {
        $this->db->select("*");
        $this->db->from("partner_query");
        //$this->db->join("partner_client",'partner_client.client_number = partner_query.contact_no');
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->where('handler_id',$emp_id);
        $this->db->where('status', 2);
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function getPartnerQueryByIdandclient($query_id)
    {
        $this->db->select('partner_query.*, partner_client.organization, partner_client.client_name');
        $this->db->from('partner_query');
        $this->db->join("partner_client",'partner_client.client_number = partner_query.contact_no');
        $this->db->where('partner_query.id', $query_id);
        $this->db->where('partner_query.partner_id', $this->global['partner_id']);
        $this->db->order_by("partner_query.id", "DESC");
        $query = $this->db->get();
        return $query->row();
    }


    public function getEmployeeCanceledQuery($emp_id)
    {
        $this->db->select("*");
        $this->db->from("partner_query");
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->where('handler_id',$emp_id);
        $this->db->where('status', 3);
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function ExportQuery()
    {
        $this->db->select("src, person_name, contact_no, email, message,destination, travel_date, nights, pax_no, no_of_rooms, hotel_category, meal_plan, vehicle, other, query_handled_by, cancel_reason, status, query_date");
        $this->db->from("partner_query");
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->order_by('query_date', 'ASC');
        $query = $this->db->get();
        $result = $query->result_array();        
        return $result;
    }

    public function checkPartnerEmployeeExists($email)
    {
        $this->db->select("id");
        $this->db->from("partner_employee");
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->where('email',$email);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
    }

    public function checkParterClient($mobile_no)
    {
        $this->db->select("id");
        $this->db->from("partner_client");
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->where('client_number',$mobile_no);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
    }

    public function addNewClient($data)
    {
        $this->db->trans_start();
        $this->db->insert('partner_client', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    public function getAllPartnerClient($limit, $id)
    {
        $this->db->limit($limit,$id);
        $this->db->select("pc.*");
        $this->db->from("partner_client as pc");
       /* $this->db->select("pc.*,country.country_name,state.state_name, c.city_name, com_country.country_name as com_country,com_state.state_name as com_state,com_city.city_name as com_city");
        $this->db->from("partner_client as pc");
        $this->db->join("countries as country","country.id = pc.country_id");
        $this->db->join("states as state","state.id = pc.state_id");
        $this->db->join("city as c","c.id = pc.city_id");
        $this->db->join("countries as com_country","com_country.id = pc.com_country_id");
        $this->db->join("states as com_state","com_state.id = pc.com_state_id");
        $this->db->join("city as com_city","com_city.id = pc.com_city_id");*/
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function countAllPartnerClient()
    {
        $this->db->select ('*');
        $this->db->from('partner_client');
         $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getPartnerClientById($client_id)
    {
        $this->db->select("pc.*");
        $this->db->from("partner_client as pc");
        $this->db->where('pc.id', $client_id);
        $this->db->where('pc.partner_id', $this->global['partner_id']);
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
    }

    public function updatePartnerClient($data, $client_id)
    {
        $this->db->where('id', $client_id);
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->update('partner_client', $data);
        return $this->db->affected_rows();
    }

    public function getRecordPerPage($id)
    {
        $this->db->select("record_per_page");
        $this->db->from("record_per_page");
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row_array();        
        return $result;
    }

    public function updateRecordPerPage($record_per_page)
    {
        $data = array(
            'record_per_page' => $record_per_page 
        );
        $this->db->where('id', 1);
        $this->db->update('record_per_page', $data);
        return $this->db->affected_rows();
    }

    public function deletePartnerClientById($client_id)
    {
        $this->db->where('id', $client_id);
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db-> delete('partner_client');
        return $this->db->affected_rows();
    }

    public function advanceQuerySearch($searchData)
    {
        extract($searchData);
        $this->db->select('*');
        $this->db->from('partner_query');
        $this->db->where('partner_id', $this->global['partner_id']);
        if ($ad_name != '' && $ad_email == '' && $ad_number == '' && $ad_destination == '' && $ad_handler == '' && $ad_date == '' && $ad_queryid == '' && $ad_status == '') {
            $this->db->like('person_name', $ad_name);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number == '' && $ad_destination == '' && $ad_handler == '' && $ad_date == '' && $ad_queryid == '' && $ad_status == '') {
           $this->db->like('email', $ad_email);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number != '' && $ad_destination == '' && $ad_handler == '' && $ad_date == '' && $ad_queryid == '' && $ad_status == '') {
           $this->db->like('contact_no', $ad_number);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_destination != '' && $ad_handler == '' && $ad_date == '' && $ad_queryid == '' && $ad_status == '') {
            $this->db->like('destination', $ad_destination);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_destination == '' && $ad_handler != '' && $ad_date == '' && $ad_queryid == '' && $ad_status == '') {
           $this->db->where('handler_id', $ad_handler);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_destination == '' && $ad_handler == '' && $ad_date != '' && $ad_queryid == '' && $ad_status == '') {
           $this->db->where('query_date', $ad_date);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_destination == '' && $ad_handler == '' && $ad_date == '' && $ad_queryid != '' && $ad_status == '') {
           $this->db->where('id', $ad_queryid);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_destination == '' && $ad_handler == '' && $ad_date == '' && $ad_queryid == '' && $ad_status != '') {
           $this->db->where('status', $ad_status);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number == '' && $ad_destination == '' && $ad_handler == '' && $ad_date == '' && $ad_queryid == '' && $ad_status == '') {
           $this->db->like('person_name', $ad_name);
           $this->db->like('email', $ad_email);
        }elseif ($ad_name != '' && $ad_email == '' && $ad_number != '' && $ad_destination == '' && $ad_handler == '' && $ad_date == '' && $ad_queryid == '' && $ad_status == '') {
           $this->db->like('person_name', $ad_name);
           $this->db->like('contact_no', $ad_number);
        }elseif ($ad_name != '' && $ad_email == '' && $ad_number == '' && $ad_destination != '' && $ad_handler == '' && $ad_date == '' && $ad_queryid == '' && $ad_status == '') {
           $this->db->like('person_name', $ad_name);
           $this->db->like('destination', $ad_destination);
        }elseif ($ad_name != '' && $ad_email == '' && $ad_number == '' && $ad_destination == '' && $ad_handler != '' && $ad_date == '' && $ad_queryid == '' && $ad_status == '') {
           $this->db->like('person_name', $ad_name);
           $this->db->where('handler_id', $ad_handler);
        }elseif ($ad_name != '' && $ad_email == '' && $ad_number == '' && $ad_destination == '' && $ad_handler == '' && $ad_date != '' && $ad_queryid == '' && $ad_status == '') {
           $this->db->like('person_name', $ad_name);
           $this->db->where('query_date', $ad_date);
        }elseif ($ad_name != '' && $ad_email == '' && $ad_number == '' && $ad_destination == '' && $ad_handler == '' && $ad_date == '' && $ad_queryid != '' && $ad_status == '') {
           $this->db->like('person_name', $ad_name);
           $this->db->where('id', $ad_queryid);
        }elseif ($ad_name != '' && $ad_email == '' && $ad_number == '' && $ad_destination == '' && $ad_handler == '' && $ad_date == '' && $ad_queryid == '' && $ad_status != '') {
           $this->db->like('person_name', $ad_name);
           $this->db->where('status', $ad_status);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number != '' && $ad_destination == '' && $ad_handler == '' && $ad_date == '' && $ad_queryid == '' && $ad_status == '') {
           $this->db->like('email', $ad_email);
           $this->db->like('contact_no', $ad_number);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number == '' && $ad_destination != '' && $ad_handler == '' && $ad_date == '' && $ad_queryid == '' && $ad_status == '') {
           $this->db->like('email', $ad_email);
           $this->db->like('destination', $ad_destination);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number == '' && $ad_destination == '' && $ad_handler != '' && $ad_date == '' && $ad_queryid == '' && $ad_status == '') {
           $this->db->like('email', $ad_email);
           $this->db->where('handler_id', $ad_handler);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number == '' && $ad_destination == '' && $ad_handler == '' && $ad_date != '' && $ad_queryid == '' && $ad_status == '') {
           $this->db->like('email', $ad_email);
           $this->db->where('query_date', $ad_date);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number == '' && $ad_destination == '' && $ad_handler == '' && $ad_date == '' && $ad_queryid != '' && $ad_status == '') {
           $this->db->like('email', $ad_email);
           $this->db->where('id', $ad_queryid);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number == '' && $ad_destination == '' && $ad_handler == '' && $ad_date == '' && $ad_queryid == '' && $ad_status != '') {
           $this->db->like('email', $ad_email);
           $this->db->where('status', $ad_status);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number != '' && $ad_destination != '' && $ad_handler == '' && $ad_date == '' && $ad_queryid == '' && $ad_status == '') {
           $this->db->like('contact_no', $ad_number);
           $this->db->like('destination', $ad_destination);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number != '' && $ad_destination == '' && $ad_handler != '' && $ad_date == '' && $ad_queryid == '' && $ad_status == '') {
           $this->db->like('contact_no', $ad_number);
           $this->db->where('handler_id', $ad_handler);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number != '' && $ad_destination == '' && $ad_handler == '' && $ad_date != '' && $ad_queryid == '' && $ad_status == '') {
           $this->db->like('contact_no', $ad_number);
           $this->db->where('query_date', $ad_date);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number != '' && $ad_destination == '' && $ad_handler == '' && $ad_date == '' && $ad_queryid != '' && $ad_status == '') {
           $this->db->like('contact_no', $ad_number);
           $this->db->where('id', $ad_queryid);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number != '' && $ad_destination == '' && $ad_handler == '' && $ad_date == '' && $ad_queryid == '' && $ad_status != '') {
           $this->db->like('contact_no', $ad_number);
           $this->db->where('status', $ad_status);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_destination != '' && $ad_handler != '' && $ad_date == '' && $ad_queryid == '' && $ad_status == '') {
           $this->db->like('destination', $ad_destination);
           $this->db->where('handler_id', $ad_handler);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_destination != '' && $ad_handler == '' && $ad_date != '' && $ad_queryid == '' && $ad_status == '') {
           $this->db->like('destination', $ad_destination);
           $this->db->where('query_date', $ad_date);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_destination != '' && $ad_handler == '' && $ad_date == '' && $ad_queryid != '' && $ad_status == '') {
           $this->db->like('destination', $ad_destination);
           $this->db->where('id', $ad_queryid);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_destination != '' && $ad_handler == '' && $ad_date == '' && $ad_queryid == '' && $ad_status != '') {
           $this->db->like('destination', $ad_destination);
           $this->db->where('status', $ad_status);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_destination == '' && $ad_handler != '' && $ad_date != '' && $ad_queryid == '' && $ad_status == '') {
           $this->db->where('handler_id', $ad_handler);
           $this->db->where('query_date', $ad_date);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_destination == '' && $ad_handler != '' && $ad_date == '' && $ad_queryid != '' && $ad_status == '') {
           $this->db->where('handler_id', $ad_handler);
           $this->db->where('id', $ad_queryid);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_destination == '' && $ad_handler != '' && $ad_date == '' && $ad_queryid == '' && $ad_status != '') {
           $this->db->where('handler_id', $ad_handler);
           $this->db->where('status', $ad_status);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_destination == '' && $ad_handler == '' && $ad_date != '' && $ad_queryid != '' && $ad_status == '') {
           $this->db->where('query_date', $ad_date);
            $this->db->where('id', $ad_queryid);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_destination == '' && $ad_handler == '' && $ad_date != '' && $ad_queryid == '' && $ad_status != '') {
            $this->db->where('query_date', $ad_date);
            $this->db->where('status', $ad_status);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_destination == '' && $ad_handler == '' && $ad_date == '' && $ad_queryid != '' && $ad_status != '') {
            $this->db->where('id', $ad_queryid);
            $this->db->where('status', $ad_status);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number != '' && $ad_destination == '' && $ad_handler == '' && $ad_date == '' && $ad_queryid == '' && $ad_status == '') {
            $this->db->like('person_name', $ad_name);
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number == '' && $ad_destination != '' && $ad_handler == '' && $ad_date == '' && $ad_queryid == '' && $ad_status == '') {
            $this->db->like('person_name', $ad_name);
            $this->db->like('email', $ad_email);
            $this->db->like('destination', $ad_destination);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number == '' && $ad_destination == '' && $ad_handler != '' && $ad_date == '' && $ad_queryid == '' && $ad_status == '') {
            $this->db->like('person_name', $ad_name);
            $this->db->like('email', $ad_email);
            $this->db->where('handler_id', $ad_handler);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number == '' && $ad_destination == '' && $ad_handler == '' && $ad_date != '' && $ad_queryid == '' && $ad_status == '') {
            $this->db->like('person_name', $ad_name);
            $this->db->like('email', $ad_email);
            $this->db->where('query_date', $ad_date);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number == '' && $ad_destination == '' && $ad_handler == '' && $ad_date == '' && $ad_queryid != '' && $ad_status == '') {
            $this->db->like('person_name', $ad_name);
            $this->db->like('email', $ad_email);
            $this->db->where('id', $ad_queryid);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number == '' && $ad_destination == '' && $ad_handler == '' && $ad_date == '' && $ad_queryid == '' && $ad_status != '') {
            $this->db->like('person_name', $ad_name);
            $this->db->like('email', $ad_email);
            $this->db->where('status', $ad_status);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number != '' && $ad_destination != '' && $ad_handler == '' && $ad_date == '' && $ad_queryid == '' && $ad_status == '') {
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number != '' && $ad_destination == '' && $ad_handler != '' && $ad_date == '' && $ad_queryid == '' && $ad_status == '') {
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->where('handler_id', $ad_handler);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number != '' && $ad_destination == '' && $ad_handler == '' && $ad_date != '' && $ad_queryid == '' && $ad_status == '') {
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->where('query_date', $ad_date);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number != '' && $ad_destination == '' && $ad_handler == '' && $ad_date == '' && $ad_queryid != '' && $ad_status == '') {
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->where('id', $ad_queryid);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number != '' && $ad_destination == '' && $ad_handler == '' && $ad_date == '' && $ad_queryid == '' && $ad_status != '') {
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->where('status', $ad_status);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number != '' && $ad_destination != '' && $ad_handler != '' && $ad_date == '' && $ad_queryid == '' && $ad_status == '') {
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number != '' && $ad_destination != '' && $ad_handler == '' && $ad_date != '' && $ad_queryid == '' && $ad_status == '') {
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('query_date', $ad_date);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number != '' && $ad_destination != '' && $ad_handler == '' && $ad_date == '' && $ad_queryid != '' && $ad_status == '') {
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('id', $ad_queryid);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number != '' && $ad_destination != '' && $ad_handler == '' && $ad_date == '' && $ad_queryid == '' && $ad_status != '') {
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('status', $ad_status);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_destination != '' && $ad_handler != '' && $ad_date != '' && $ad_queryid == '' && $ad_status == '') {
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('query_date', $ad_date);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_destination != '' && $ad_handler != '' && $ad_date == '' && $ad_queryid != '' && $ad_status == '') {
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('id', $ad_queryid);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_destination != '' && $ad_handler != '' && $ad_date == '' && $ad_queryid == '' && $ad_status != '') {
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('status', $ad_status);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_destination == '' && $ad_handler != '' && $ad_date != '' && $ad_queryid != '' && $ad_status == '') {
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('query_date', $ad_date);
            $this->db->where('id', $ad_queryid);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_destination == '' && $ad_handler != '' && $ad_date != '' && $ad_queryid == '' && $ad_status != '') {
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('query_date', $ad_date);
            $this->db->where('status', $ad_status);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_destination == '' && $ad_handler == '' && $ad_date != '' && $ad_queryid != '' && $ad_status != '') {
            $this->db->where('query_date', $ad_date);
            $this->db->where('id', $ad_queryid);
            $this->db->where('status', $ad_status);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number != '' && $ad_destination != '' && $ad_handler == '' && $ad_date == '' && $ad_queryid == '' && $ad_status == '') {
            $this->db->like('person_name', $ad_name);
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number != '' && $ad_destination == '' && $ad_handler != '' && $ad_date == '' && $ad_queryid == '' && $ad_status == '') {
            $this->db->like('person_name', $ad_name);
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->where('handler_id', $ad_handler);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number != '' && $ad_destination == '' && $ad_handler == '' && $ad_date != '' && $ad_queryid == '' && $ad_status == '') {
            $this->db->like('person_name', $ad_name);
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->where('query_date', $ad_date);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number != '' && $ad_destination == '' && $ad_handler == '' && $ad_date == '' && $ad_queryid != '' && $ad_status == '') {
            $this->db->like('person_name', $ad_name);
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->where('id', $ad_queryid);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number != '' && $ad_destination == '' && $ad_handler == '' && $ad_date == '' && $ad_queryid == '' && $ad_status != '') {
            $this->db->like('person_name', $ad_name);
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->where('status', $ad_status);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number != '' && $ad_destination != '' && $ad_handler != '' && $ad_date == '' && $ad_queryid == '' && $ad_status == '') {
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number != '' && $ad_destination != '' && $ad_handler == '' && $ad_date != '' && $ad_queryid == '' && $ad_status == '') {
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('query_date', $ad_date);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number != '' && $ad_destination != '' && $ad_handler == '' && $ad_date == '' && $ad_queryid != '' && $ad_status == '') {
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('id', $ad_queryid);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number != '' && $ad_destination != '' && $ad_handler == '' && $ad_date == '' && $ad_queryid == '' && $ad_status != '') {
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('status', $ad_status);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number != '' && $ad_destination != '' && $ad_handler != '' && $ad_date != '' && $ad_queryid == '' && $ad_status == '') {
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('query_date', $ad_date);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number != '' && $ad_destination != '' && $ad_handler != '' && $ad_date == '' && $ad_queryid != '' && $ad_status == '') {
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('id', $ad_queryid);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number != '' && $ad_destination != '' && $ad_handler != '' && $ad_date == '' && $ad_queryid == '' && $ad_status != '') {
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('status', $ad_status);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_destination != '' && $ad_handler != '' && $ad_date != '' && $ad_queryid != '' && $ad_status == '') {
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('query_date', $ad_date);
            $this->db->where('id', $ad_queryid);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_destination != '' && $ad_handler != '' && $ad_date != '' && $ad_queryid == '' && $ad_status != '') {
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('query_date', $ad_date);
            $this->db->where('status', $ad_status);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_destination == '' && $ad_handler != '' && $ad_date != '' && $ad_queryid != '' && $ad_status != '') {
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('query_date', $ad_date);
            $this->db->where('id', $ad_queryid);
            $this->db->where('status', $ad_status);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number != '' && $ad_destination != '' && $ad_handler != '' && $ad_date == '' && $ad_queryid == '' && $ad_status == '') {
            $this->db->like('person_name', $ad_name);
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number != '' && $ad_destination != '' && $ad_handler == '' && $ad_date != '' && $ad_queryid == '' && $ad_status == '') {
            $this->db->like('person_name', $ad_name);
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('query_date', $ad_date);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number != '' && $ad_destination != '' && $ad_handler == '' && $ad_date == '' && $ad_queryid != '' && $ad_status == '') {
            $this->db->like('person_name', $ad_name);
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('id', $ad_queryid);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number != '' && $ad_destination != '' && $ad_handler == '' && $ad_date == '' && $ad_queryid == '' && $ad_status != '') {
            $this->db->like('person_name', $ad_name);
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('status', $ad_status);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number != '' && $ad_destination != '' && $ad_handler != '' && $ad_date != '' && $ad_queryid == '' && $ad_status == '') {
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('query_date', $ad_date);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number != '' && $ad_destination != '' && $ad_handler != '' && $ad_date == '' && $ad_queryid != '' && $ad_status == '') {
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('id', $ad_queryid);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number != '' && $ad_destination != '' && $ad_handler != '' && $ad_date == '' && $ad_queryid == '' && $ad_status != '') {
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('status', $ad_status);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number != '' && $ad_destination != '' && $ad_handler != '' && $ad_date != '' && $ad_queryid != '' && $ad_status == '') {
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('query_date', $ad_date);
            $this->db->where('id', $ad_queryid);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number != '' && $ad_destination != '' && $ad_handler != '' && $ad_date != '' && $ad_queryid == '' && $ad_status != '') {
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('query_date', $ad_date);
            $this->db->where('status', $ad_status);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_destination != '' && $ad_handler != '' && $ad_date != '' && $ad_queryid != '' && $ad_status != '') {
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('query_date', $ad_date);
            $this->db->where('id', $ad_queryid);
            $this->db->where('status', $ad_status);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number != '' && $ad_destination != '' && $ad_handler != '' && $ad_date != '' && $ad_queryid == '' && $ad_status == '') {
            $this->db->like('person_name', $ad_name);
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('query_date', $ad_date);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number != '' && $ad_destination != '' && $ad_handler != '' && $ad_date == '' && $ad_queryid != '' && $ad_status == '') {
            $this->db->like('person_name', $ad_name);
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('id', $ad_queryid);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number != '' && $ad_destination != '' && $ad_handler != '' && $ad_date == '' && $ad_queryid == '' && $ad_status != '') {
            $this->db->like('person_name', $ad_name);
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('id', $ad_queryid);
            $this->db->where('status', $ad_status);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number != '' && $ad_destination != '' && $ad_handler != '' && $ad_date != '' && $ad_queryid != '' && $ad_status == '') {
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('query_date', $ad_date);
            $this->db->where('id', $ad_queryid);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number != '' && $ad_destination != '' && $ad_handler != '' && $ad_date != '' && $ad_queryid == '' && $ad_status != '') {
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('query_date', $ad_date);
            $this->db->where('status', $ad_status);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number != '' && $ad_destination != '' && $ad_handler != '' && $ad_date != '' && $ad_queryid != '' && $ad_status != '') {
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('query_date', $ad_date);
            $this->db->where('id', $ad_queryid);
            $this->db->where('status', $ad_status);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number != '' && $ad_destination != '' && $ad_handler != '' && $ad_date != '' && $ad_queryid != '' && $ad_status == '') {
            $this->db->like('person_name', $ad_name);
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('query_date', $ad_date);
            $this->db->where('id', $ad_queryid);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number != '' && $ad_destination != '' && $ad_handler != '' && $ad_date != '' && $ad_queryid == '' && $ad_status != '') {
            $this->db->like('person_name', $ad_name);
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('query_date', $ad_date);
            $this->db->where('status', $ad_status);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number != '' && $ad_destination != '' && $ad_handler != '' && $ad_date != '' && $ad_queryid != '' && $ad_status != '') {
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('query_date', $ad_date);
            $this->db->where('id', $ad_queryid);
            $this->db->where('status', $ad_status);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number != '' && $ad_destination != '' && $ad_handler != '' && $ad_date != '' && $ad_queryid != '' && $ad_status != '') {
            $this->db->like('person_name', $ad_name);
            $this->db->like('email', $ad_email);
            $this->db->like('contact_no', $ad_number);
            $this->db->like('destination', $ad_destination);
            $this->db->where('handler_id', $ad_handler);
            $this->db->where('query_date', $ad_date);
            $this->db->where('id', $ad_queryid);
            $this->db->where('status', $ad_status);
        }
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        return $query->result();
    }

    public function advanceClientSearch($searchData)
    {
        extract($searchData);
        $this->db->select('*');
        $this->db->from('partner_client');
        $this->db->where('partner_id', $this->global['partner_id']);
        if ($ad_name != '' && $ad_email == '' && $ad_number == '' && $ad_organization == '') {
            $this->db->like('client_name', $ad_name);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number == '' && $ad_organization == '') {
            $this->db->like('client_email', $ad_email);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number != '' && $ad_organization == '') {
            $this->db->like('client_number', $ad_number);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number == '' && $ad_organization != '') {
            $this->db->like('organization', $ad_organization);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number == '' && $ad_organization == '') {
            $this->db->like('client_name', $ad_name);
            $this->db->like('client_email', $ad_email);
        }elseif ($ad_name != '' && $ad_email == '' && $ad_number != '' && $ad_organization == '') {
            $this->db->like('client_name', $ad_name);
            $this->db->like('client_number', $ad_number);
        }elseif ($ad_name != '' && $ad_email == '' && $ad_number == '' && $ad_organization != '') {
            $this->db->like('client_name', $ad_name);
            $this->db->like('organization', $ad_organization);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number != '' && $ad_organization == '') {
            $this->db->like('client_email', $ad_email);
            $this->db->like('client_number', $ad_number);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number == '' && $ad_organization != '') {
            $this->db->like('client_email', $ad_email);
            $this->db->like('organization', $ad_organization);
        }elseif ($ad_name == '' && $ad_email == '' && $ad_number != '' && $ad_organization != '') {
            $this->db->like('client_number', $ad_number);
            $this->db->like('organization', $ad_organization);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number != '' && $ad_organization == '') {
            $this->db->like('client_name', $ad_name);
            $this->db->like('client_email', $ad_email);
            $this->db->like('client_number', $ad_number);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number == '' && $ad_organization != '') {
            $this->db->like('client_name', $ad_name);
            $this->db->like('client_email', $ad_email);
            $this->db->like('organization', $ad_organization);
        }elseif ($ad_name == '' && $ad_email != '' && $ad_number != '' && $ad_organization != '') {
            $this->db->like('client_number', $ad_number);
            $this->db->like('client_email', $ad_email);
            $this->db->like('organization', $ad_organization);
        }elseif ($ad_name != '' && $ad_email == '' && $ad_number != '' && $ad_organization != '') {
            $this->db->like('client_name', $ad_name);
            $this->db->like('client_number', $ad_number);
            $this->db->like('organization', $ad_organization);
        }elseif ($ad_name != '' && $ad_email != '' && $ad_number != '' && $ad_organization != '') {
            $this->db->like('client_name', $ad_name);
            $this->db->like('client_number', $ad_number);
            $this->db->like('client_email', $ad_email);
            $this->db->like('organization', $ad_organization);
        }

        $query = $this->db->get();
        return $query->result();
    }
    
    //check Hotel Details
    public function checkHotelExistwithZip($country_id, $state_id, $city_id, $zip, $hotel_name)
    {
        $partner_id = $this->global['partner_id'];
         // Explode by " " to get an Array
        $search_explode = explode(" ",$hotel_name);
        // Create condition
        $condition_arr = array();
        foreach($search_explode as $value){
          $condition_arr[] = " hotel_name like '%".$value."%' AND partner_id like '%".$partner_id."%' AND country_id like '%".$country_id."%' AND state_id like '%".$state_id."%' AND city_id like '%".$city_id."%' AND zip like '%".$zip."%' ";
        }
        
        $condition = " ";
        if(count($condition_arr) > 0){
          $condition = "WHERE".implode(" or ",$condition_arr);
        }
        // Select Query
         
        $query = "SELECT * FROM partner_hotel_details ".$condition;
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

    public function addHotelDetails($data)
    {
        $this->db->trans_start();
        $this->db->insert('partner_hotel_details', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    public function addHotelRoomDetails($data)
    {
        $this->db->trans_start();
        $this->db->insert('partner_hotel_room_details', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    public function AddHotelBankingDetails($data)
    {
        $this->db->trans_start();
        $this->db->insert('partner_hotel_bank_details', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    public function AddHotelDocuments($data)
    {
        $this->db->trans_start();
        $this->db->insert('partner_hotel_documents', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    public function getAllPartnerHotel($partner_id)
    {
        $this->db->select('partner_hotel_details.*,countries.country_name,states.state_name,city.city_name');
        $this->db->from('partner_hotel_details');
        $this->db->join("countries","countries.id = partner_hotel_details.country_id");
        $this->db->join("states","states.id = partner_hotel_details.state_id");
        $this->db->join("city","city.id = partner_hotel_details.city_id");
        $this->db->where('partner_id', $partner_id);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function getPartnerHotels()
    {
        $this->db->select('partner_hotel_details.*,countries.country_name,states.state_name,city.city_name');
        $this->db->from('partner_hotel_details');
        $this->db->join("countries","countries.id = partner_hotel_details.country_id");
        $this->db->join("states","states.id = partner_hotel_details.state_id");
        $this->db->join("city","city.id = partner_hotel_details.city_id");
        $this->db->where('partner_hotel_details.partner_id', $this->global['partner_id']);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;

    }
    
    public function getHotelByHotelId($hotel_id)
    {
        $this->db->select('partner_hotel_details.*,countries.country_name,states.state_name,city.city_name');
        $this->db->from('partner_hotel_details');
        $this->db->join("countries","countries.id = partner_hotel_details.country_id");
        $this->db->join("states","states.id = partner_hotel_details.state_id");
        $this->db->join("city","city.id = partner_hotel_details.city_id");
        //$this->db->join("other_tourcard_days","other_tourcard_days.hotel_filter = partner_hotel_details.hotel_id");
        $this->db->where('partner_hotel_details.hotel_id', $hotel_id);
        $this->db->where('partner_hotel_details.partner_id', $this->global['partner_id']);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
    }

    public function getHotelBankDetailById($hotel_id)
    {
        $this->db->select('*');
        $this->db->from('partner_hotel_bank_details');
        $this->db->where('hotel_id', $hotel_id);
        $this->db->where('partner_id', $this->global['partner_id']);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
    }

    public function getHotelDocumentsById($hotel_id)
    {
        $this->db->select('*');
        $this->db->from('partner_hotel_documents');
        $this->db->where('hotel_id', $hotel_id);
        $this->db->where('partner_id', $this->global['partner_id']);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
    }

    public function getHotelRoomsById($hotel_id)
    {
        $this->db->select('*');
        $this->db->from('partner_hotel_room_details');
        $this->db->where('hotel_id', $hotel_id);
        $this->db->where('partner_id', $this->global['partner_id']);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function updateHotelDetails($data, $hotel_id)
    {
        $this->db->where('hotel_id', $hotel_id);
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->update('partner_hotel_details', $data);
            
        return $this->db->affected_rows();
    }

    public function updateHotelRoomDetails($data, $hotel_id, $room_id)
    {
        $this->db->where('hotel_id', $hotel_id);
        $this->db->where('room_id', $room_id);
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->update('partner_hotel_room_details', $data);
            
        return $this->db->affected_rows();
    }

    public function updateHotelBankingDetails($data, $hotel_id)
    {
        $this->db->where('hotel_id', $hotel_id);
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->update('partner_hotel_bank_details', $data);
            
        return $this->db->affected_rows();
    }

    public function updateHotelDocuments($data, $hotel_id)
    {
        $this->db->where('hotel_id', $hotel_id);
        $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->update('partner_hotel_documents', $data);
            
        return $this->db->affected_rows();
    }

    public function deleteHotelById($hotel_id)
    {
        $this ->db->where('hotel_id', $hotel_id);
        $this ->db-> delete('partner_hotel_details');

        $this ->db->where('hotel_id', $hotel_id);
        $this ->db-> delete('partner_hotel_bank_details');

        $this ->db->where('hotel_id', $hotel_id);
        $this ->db-> delete('partner_hotel_room_details');

        $this ->db->where('hotel_id', $hotel_id);
        $this ->db-> delete('partner_hotel_documents');

        return $this->db->affected_rows();
    }
    
    //add new itinerary bypartner
    public function addNewItinerary($data)
    {
        $this->db->trans_start();
        $this->db->insert('partner_itineraries', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    public function addNewItineraryDurationDetail($data)
    {
        $this->db->trans_start();
        $this->db->insert('partner_itinerary_duration', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    public function addPartnerItineraryDetails($data)
    {
        $this->db->trans_start();
        $this->db->insert('partner_itineraries_details', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    public function getPartnerItineraryById($itinerary_id)
    {
        $this->db->select("*");
        $this->db->from("partner_itineraries");
        $this->db->where("id",$itinerary_id);
        $this->db->where("partner_id", $this->global['partner_id']);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
    }
    
    public function getAllPartnerItineraryDetails()
    {
        $this->db->select("*");
        $this->db->from("partner_itineraries");
        $this->db->where("partner_id", $this->global['partner_id']);
        $query = $this->db->get();
        $result = $query->result_array();        
        return $result;
    }
    
    public function getItineraryImagesDetails($itinerary_id)
    {
        $this->db->select("*");
        $this->db->from("partner_itineraries_details");
        $this->db->where("itinerary_id",$itinerary_id);
        $this->db->where("partner_id", $this->global['partner_id']);
        $this->db->order_by('id','ASE');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    public function getPartnerItineraryDuration($itinerary_id)
    {
        $this->db->select("*");
        $this->db->from("partner_itinerary_duration");
        $this->db->where("itinerary_id",$itinerary_id);
        $this->db->where("partner_id", $this->global['partner_id']);
        $this->db->order_by("id","ASE");
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    public function updatePartnerItinerary($data, $itinerary_id)
    {
        $this->db->where('id', $itinerary_id);
        $this->db->update('partner_itineraries', $data);
        return $this->db->affected_rows();
    }
    
    public function updatePartnerItineraryDuration($data, $itinerary_id)
    {
        $this->db->where('id', $itinerary_id);
        $this->db->update('partner_itinerary_duration', $data);
        return $this->db->affected_rows();
    }
    
    public function updatePartnerItineraryDetails($data, $itinerary_details_id)
    {

        $this->db->where('id', $itinerary_details_id);
        $this->db->update('partner_itineraries_details', $data);
        
        return $this->db->affected_rows();
    }
    
    public function searchPartnerPackage($data)
    {
        extract($data);
        $startDate='';
        $endDate ='';
        $duration = $stayDuration +1;

        $sDate = explode('/',$startdate);
        $startdate = $sDate[2].'-'.$sDate[1].'-'.$sDate[0];
        
        $eDate = explode('/',$enddate);
        $enddate = $eDate[2].'-'.$eDate[1].'-'.$eDate[0];
        
        $startDate=date('Y-m-d',strtotime($startdate));
        $endDate=date('Y-m-d',strtotime($enddate));
        $country = implode(',',$country);

        if(empty($this->input->post('city'))) {
           $countCity = 0;
        }else{
            $countCity = count($this->input->post('city'));
        }

        if($countCity == '0') {
            foreach($state as $stateIds)
            {
                $this->db->select('*');
                $this->db->from('partner_itineraries');
                $this->db->like('state', $stateIds);
                $query = $this->db->get();
                $dataArr = $query->result_array();
                foreach($dataArr as $iten)
                {
                    $itineraryIdArr[] = $iten['id'];
                }
            }
        }else{
            foreach($city as $cityIds)
            {
                $this->db->select('*');
                $this->db->from('partner_itineraries');
                $this->db->like('state', $stateIds);
                $query = $this->db->get();
                $itdataArr = $query->result_array();
                foreach($itdataArr as $cityData)
                {
                    $itineraryIdArr[] = $cityData['id'];
                }
            }
        }

        $itineraryIdArr = array_unique($itineraryIdArr);

        $d = array();
        if(count($itineraryIdArr) < 1)
        {
            return $d;
        }

        $itineraryIds = implode(',',$itineraryIdArr);
        
        
        $queryA = "SELECT * FROM partner_itineraries WHERE id IN ($itineraryIds) AND duration = $duration";
        return $dataArr = $this->db->query($queryA)->result_array();
    }
    
    public function getPartnerIteneraryById($itinerary_id)
    {
        $this->db->select("partner_itineraries.*, group_concat(partner_itinerary_duration.duration_city ORDER BY partner_itinerary_duration.id ASC) as duration_city");
        $this->db->from("partner_itineraries");
        $this->db->join("partner_itinerary_duration","partner_itinerary_duration.itinerary_id = partner_itineraries.id");
        $this->db->where("partner_itineraries.id", $itinerary_id);
        //$this->db->where("partner_itineraries.partner_id", $this);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }
    
    public function getPartnerIteneraryDetailsById($itinerary_id)
    {
        $this->db->select("*");
        $this->db->from("partner_itineraries_details");
        $this->db->where("itinerary_id", $itinerary_id);
        $this->db->order_by("id","ASC");
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    
    
}