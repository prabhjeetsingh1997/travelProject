<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Admin_model (Admin Model)
 * User model class to get to handle user related data 
 * @author : Sachin Gupta
 * @version : 1.1
 * @since : 13 March 2019
 */
class Admin_model extends CI_Model
{
    
    // public function getHotelDetailById()
    // {
    //     $this->db->select('*');
    //     $this->db->from('hotel_details')
        
    // }
    public function getAllCountries()
    {
        $this->db->select('*');
        $this->db->from('countries');
        $this->db->where('status', 1);
        $this->db->order_by('country_name', 'ASC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function addNewCountry($data)
    {
    	$this->db->trans_start();
        $this->db->insert('countries', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    public function getCountry($country_id)
    {
    	$this->db->select('*');
        $this->db->from('countries');
        $this->db->where('status', 1);
        $this->db->where('id', $country_id);
        $query = $this->db->get();
        
        return $query->row();
    }

    public function updateCountry($data, $country_id)
    {
    	$this->db->where('id', $country_id);
        $this->db->update('countries', $data);
        
        return $this->db->affected_rows();
    }

    public function getAllState()
    {
    // 	$this->db->select("state_tbl.id, state_tbl.state_name, state_tbl.country_id, country_tbl.country_name");
    // 	$this->db->from("states as state_tbl");
    // 	$this->db->join("countries as country_tbl",'country_tbl.id = state_tbl.country_id', 'LEFT');
    // 	$this->db->order_by('country_tbl.country_name', 'ASC');
        $this->db->select("states.id, states.state_name, states.country_id, countries.country_name"); 
        $this->db->from("states");
        $this->db->join("countries", "countries.id = states.country_id"); 
        // countries ON countries.id = states.country_id WHERE states.id=202
    	$query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function addNewState($data)
    {
        $this->db->trans_start();
        $this->db->insert('states', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    public function getState($state_id, $country_id)
    {
        $this->db->select('*');
        $this->db->from('states');
        $this->db->where('status', 1);
        $this->db->where('id', $state_id);
        $this->db->where('country_id', $country_id);
        $query = $this->db->get();
        
        return $query->row();
    }

    public function updateState($data, $state_id)
    {
        $this->db->where('id', $state_id);
        $this->db->update('states', $data);
        
        return $this->db->affected_rows();
    }

    public function getAllCity()
    {
        $this->db->select("city_tbl.*,state_tbl.state_name,,state_tbl.country_id,country_tbl.country_name");
        $this->db->from("city as city_tbl");
        $this->db->join("states as state_tbl","state_tbl.id = city_tbl.state_id");
        $this->db->join("countries as country_tbl","country_tbl.id = state_tbl.country_id");
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function getStateByCountryId($country_id)
    {
       $this->db->select("*");
       $this->db->from("states");
       $this->db->where("country_id",$country_id);
       $this->db->order_by("state_name",'ASC');
       $query = $this->db->get();
       $result = $query->result();        
       return $result;
    }

    public function addNewCity($data)
    {
        $this->db->trans_start();
        $this->db->insert('city', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    public function getCity($city_id, $state_id)
    {
       $this->db->select('*');
        $this->db->from('city');
        $this->db->where('status', 1);
        $this->db->where('id', $city_id);
        $this->db->where('state_id', $state_id);
        $query = $this->db->get();
        
        return $query->row();
    }

    public function updateCity($data, $city_id)
    {
        $this->db->where('id', $city_id);
        $this->db->update('city', $data);
        
        return $this->db->affected_rows();
    }

    public function getCityByStateId($state_id)
    {
       $this->db->select("*");
       $this->db->from("city");
       $this->db->where("state_id",$state_id);
       $this->db->order_by("city_name",'ASC');
       $query = $this->db->get();
       $result = $query->result();        
       return $result;
    }

    public function addUserDetails($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_users', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    public function addUserprimaryAddress($addressInfo)
    {
        $this->db->trans_start();
        $this->db->insert('user_permanent_address', $addressInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    public function addUserOfficialAddress($officialDetails)
    {
        $this->db->trans_start();
        $this->db->insert('user_official_detail', $officialDetails);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    public function addUserBankingDetails($bankingDetails)
    {
        $this->db->trans_start();
        $this->db->insert('user_banking_detail', $bankingDetails);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    public function getAllEmployeeList()
    {
        $this->db->select("tbl_users.*, user_permanent_address.*, user_official_detail.*,user_banking_detail.*,countries.country_name,states.state_name,city.city_name");
        $this->db->from("tbl_users");
        $this->db->join("user_permanent_address",'user_permanent_address.user_id = tbl_users.userId');
        $this->db->join("countries","countries.id = user_permanent_address.country_id");
        $this->db->join("states","states.id = user_permanent_address.state_id");
        $this->db->join("city","city.id = user_permanent_address.city_id");
        $this->db->join("user_official_detail",'user_official_detail.user_id = tbl_users.userId');
        $this->db->join("user_banking_detail",'user_banking_detail.user_id = tbl_users.userId');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function getAllEmployeeById($employee_id)
    {
        $this->db->select("tbl_users.*, user_permanent_address.*, user_official_detail.*,user_banking_detail.*,countries.country_name,states.state_name,city.city_name");
        $this->db->from("tbl_users");
        $this->db->join("user_permanent_address",'user_permanent_address.user_id = tbl_users.userId');
        $this->db->join("countries","countries.id = user_permanent_address.country_id");
        $this->db->join("states","states.id = user_permanent_address.state_id");
        $this->db->join("city","city.id = user_permanent_address.city_id");
        $this->db->join("user_official_detail",'user_official_detail.user_id = tbl_users.userId');
        $this->db->join("user_banking_detail",'user_banking_detail.user_id = tbl_users.userId');
        $this->db->where("userId",$employee_id);
        $query = $this->db->get();
        
        return $query->row();
    }

    public function updateUserDetails($userInfo, $employee_id)
    {
        $this->db->where('userId', $employee_id);
        $this->db->update('tbl_users', $userInfo);
        
        return $this->db->affected_rows();
    }

    public function updateUserprimaryAddress($primary_address, $employee_id)
    {
        $this->db->where('user_id', $employee_id);
        $this->db->update('user_permanent_address', $primary_address);
        
        return $this->db->affected_rows();
    }

    public function updateUserOfficialAddress($official_address, $employee_id)
    {
        $this->db->where('user_id', $employee_id);
        $this->db->update('user_official_detail', $official_address);
        
        return $this->db->affected_rows();
    }

    public function updateUserBankingDetails($banking_detail, $employee_id)
    {
        $this->db->where('user_id', $employee_id);
        $this->db->update('user_banking_detail', $banking_detail);
        
        return $this->db->affected_rows();
    }

    public function deleteEmployeeById($employee_id)
    {
        $this ->db->where('userId', $employee_id);
        $this ->db-> delete('tbl_users');

        $this ->db->where('user_id', $employee_id);
        $this ->db-> delete('user_permanent_address');

        $this ->db->where('user_id', $employee_id);
        $this ->db-> delete('user_official_detail');

        $this ->db->where('user_id', $employee_id);
        $this ->db-> delete('user_banking_detail');

        return $this->db->affected_rows();
    }

    public function addVendorDetails($vendorDetails)
    {
        $this->db->trans_start();
        $this->db->insert('vendor_details', $vendorDetails);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    public function addvendorExtraDetails($vendorExtraDetails)
    {
        $this->db->trans_start();
        $this->db->insert('vendor_extra_details', $vendorExtraDetails);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    public function addVendorBankingDetails($vendorBankingDetails)
    {
        $this->db->trans_start();
        $this->db->insert('vendor_banking_details', $vendorBankingDetails);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    public function getAllVendorList()
    {
       $this->db->select("vendor_details.*, vendor_extra_details.*,vendor_banking_details.*,countries.country_name,states.state_name,city.city_name");
        $this->db->from("vendor_details");
        $this->db->join("vendor_extra_details",'vendor_extra_details.vendor_id = vendor_details.vendorId');
        $this->db->join("countries","countries.id = vendor_details.country_id");
        $this->db->join("states","states.id = vendor_details.state_id");
        $this->db->join("city","city.id = vendor_details.city_id");
        $this->db->join("vendor_banking_details",'vendor_banking_details.vendor_id = vendor_details.vendorId');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function getVendorById($vendor_id)
    {
        $this->db->select("vendor_details.*, vendor_extra_details.*,vendor_banking_details.*,countries.country_name,states.state_name,city.city_name");
        $this->db->from("vendor_details");
        $this->db->join("vendor_extra_details",'vendor_extra_details.vendor_id = vendor_details.vendorId');
        $this->db->join("countries","countries.id = vendor_details.country_id");
        $this->db->join("states","states.id = vendor_details.state_id");
        $this->db->join("city","city.id = vendor_details.city_id");
        $this->db->join("vendor_banking_details",'vendor_banking_details.vendor_id = vendor_details.vendorId');
        $this->db->where("vendorId",$vendor_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function updateVendorDetails($vendorInfo,$vendor_id)
    {
        $this->db->where('vendorId', $vendor_id);
        $this->db->update('vendor_details', $vendorInfo);
        
        return $this->db->affected_rows();
    }

    public function updatevendorExtraDetails($extra_details,$vendor_id)
    {
        $this->db->where('vendor_id', $vendor_id);
        $this->db->update('vendor_extra_details', $extra_details);
        
        return $this->db->affected_rows();
    }

    public function updateVendorBankingDetails($banking_detail,$vendor_id)
    {
        $this->db->where('vendor_id', $vendor_id);
        $this->db->update('vendor_banking_details', $banking_detail);
        
        return $this->db->affected_rows();
    }

    public function deleteVendorById($vendor_id)
    {
        $this ->db->where('vendorId', $vendor_id);
        $this ->db-> delete('vendor_details');

        $this ->db->where('vendor_id', $vendor_id);
        $this ->db-> delete('vendor_extra_details');

        $this ->db->where('vendor_id', $vendor_id);
        $this ->db-> delete('vendor_banking_details');

        return $this->db->affected_rows();
    }

    public function getAllHotelPartner()
    {
        // $this->db->select("hotel_partner.*,countries.country_name,states.state_name,city.city_name,group_concat(hotel_details.hotel_name) as hotel_names, group_concat(country.country_name) as hotel_countries, group_concat(state.state_name) as hotel_states,group_concat(cities.city_name) as hotel_cities");
        // $this->db->from("hotel_partner");
        // $this->db->join("hotel_details","hotel_details.hotel_partner_id = hotel_partner.hotel_partner_id",'left');
        // $this->db->join("countries","countries.id = hotel_partner.country_id");
        // $this->db->join("states","states.id = hotel_partner.state_id");
        // $this->db->join("city","city.id = hotel_partner.city_id");
        // $this->db->join("countries as country","country.id = hotel_details.country_id");
        // $this->db->join("states as state","state.id = hotel_details.state_id");
        // $this->db->join("city as cities","cities.id = hotel_details.city_id");
        // $this->db->group_by('hotel_partner.hotel_partner_id');
        // $this->db->order_by('hotel_partner.hotel_partner_id', DESC);
        // $query = $this->db->get();
        // $result = $query->result();     
        // return $result;
        
        $this->db->select("*");
        $this->db->from("hotel_partner");
        //$this->db->join("hotel_details","hotel_details.hotel_partner_id = hotel_partner.hotel_partner_id");
        //$this->db->join("countries","countries.id = hotel_partner.country_id");
        //$this->db->join("states","states.id = hotel_partner.state_id");
        //$this->db->join("city","city.id = hotel_partner.city_id");
        $this->db->order_by('hotel_partner_id', DESC);
        $query = $this->db->get();
        $result = $query->result();     
        return $result;
    }

    public function activateHotelPartner($hotel_partner_id,$data)
    {
        $this->db->where('hotel_partner_id', $hotel_partner_id);
        $this->db->update('hotel_partner', $data);
        
        return $this->db->affected_rows();
    }
    
    public function deactivateHotelPartner($hotel_partner_id, $data)
    {
        $this->db->where('hotel_partner_id', $hotel_partner_id);
        $this->db->update('hotel_partner', $data);
        
        $this->db->where('hotel_partner_id', $hotel_partner_id);
        $this->db->update('hotel_details', $data);
        //return $this->db->affected_rows();
        
        return $this->db->affected_rows();
    }
    
    public function ActivateHotel($data, $hotel_id)
    {
        $this->db->where('hotel_id', $hotel_id);
        $this->db->update('hotel_details', $data);
        
        return $this->db->affected_rows();
    }

    public function addNewPartner($data)
    {
        $this->db->trans_start();
        $this->db->insert('partner_list', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    public function getAllPartners()
    {
        $this->db->select("partner_list.*,countries.country_name,states.state_name,city.city_name");
        $this->db->from("partner_list");
        $this->db->join("countries","countries.id = partner_list.country_id");
        $this->db->join("states","states.id = partner_list.state_id");
        $this->db->join("city","city.id = partner_list.city_id");
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    public function getPartnerById($partner_id)
    {
        // $this->db->select("partner_list.*, partners_purchased_subscriptions.hotel_management, partners_purchased_subscriptions.query_management, partners_purchased_subscriptions.client_management, partners_purchased_subscriptions.vendor_management, partners_purchased_subscriptions.tourcard_management, partners_purchased_subscriptions.accounts_management");
        $this->db->select("*");
        $this->db->from("partner_list");
        //$this->db->join("partners_purchased_subscriptions","partners_purchased_subscriptions.partner_id = partner_list.partner_id");
        //$this->db->join("states","states.id = partner_list.state_id");
        //$this->db->join("city","city.id = partner_list.city_id");
        $this->db->where('partner_id', $partner_id);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function updatePartner($data, $partner_id)
    {
        $this->db->where('partner_id', $partner_id);
        $this->db->update('partner_list', $data);
        
        return $this->db->affected_rows();
        
    }
    
    public function getAllActiveHotel()
    {
        $this->db->select('hotel_details.*,countries.country_name,states.state_name,city.city_name');
        $this->db->from('hotel_details');
        $this->db->join("countries","countries.id = hotel_details.country_id");
        $this->db->join("states","states.id = hotel_details.state_id");
        $this->db->join("city","city.id = hotel_details.city_id");
        $this->db->where('hotel_details.status',1);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function getAllInActiveHotel()
    {
        $this->db->select('hotel_details.*,countries.country_name,states.state_name,city.city_name,hotel_partner.name as partner_name, hotel_partner.contact_no as partner_contact_no');
        $this->db->from('hotel_details');
        $this->db->join("countries","countries.id = hotel_details.country_id");
        $this->db->join("states","states.id = hotel_details.state_id");
        $this->db->join("city","city.id = hotel_details.city_id");
        $this->db->join("hotel_partner","hotel_partner.hotel_partner_id = hotel_details.hotel_partner_id");
        $this->db->where('hotel_details.status',0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function deActivateHotel($data, $hotel_id)
    {
        $this->db->where('hotel_id', $hotel_id);
        $this->db->update('hotel_details', $data);
        return $this->db->affected_rows();
    }

    public function getAllVehicle()
    {
        $this->db->select("*");
        $this->db->from("itinerary_vehicle_master");
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function addNewVehicle($data)
    {
        $this->db->trans_start();
        $this->db->insert('itinerary_vehicle_master', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    public function updateVehicle($data, $vehicle_id)
    {
        $this->db->where('id', $vehicle_id);
        $this->db->update('itinerary_vehicle_master', $data);
        
        return $this->db->affected_rows();
    }

    public function deleteVehicle($vehicle_id)
    {
        $this ->db->where('id', $vehicle_id);
        $this ->db-> delete('itinerary_vehicle_master');
        return $this->db->affected_rows();
    }

    public function getItineraryState($id)
    {
        return $this->db->query("SELECT * FROM states WHERE country_id IN($id) order by id")->result_array();
    }

    public function getItinerarycity($id)
    {
       return $this->db->query("SELECT * FROM city WHERE state_id IN($id) order by id")->result_array();
    }

    public function getMasterVehicle()
    {
        $this->db->select("id, vehicle_name");
        $this->db->from("itinerary_vehicle_master");
        $query = $this->db->get();
        $result = $query->result_array();        
        return $result;
    }

    public function getVendorDetails()
    {
        $this->db->select("vendorId, company_name");
        $this->db->from("vendor_details");
        $query = $this->db->get();
        $result = $query->result_array();        
        return $result;
    }

    public function addNewItinerary($data)
    {
        $this->db->trans_start();
        $this->db->insert('itinerary_management', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    public function addNewItineraryVehicleCost($data)
    {
        $this->db->trans_start();
        $this->db->insert('itinerary_vehicle_cost', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    public function getItinerarymultiplevehicle($itinerary_id)
    {
        $this->db->select("*");
        $this->db->from("itinerary_vehicle_mutiple");
        $this->db->where("itinerary_id",$itinerary_id);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function getAllBasicItineraryDetails()
    {
        $this->db->select("*");
        $this->db->from("itinerary_management");
        $query = $this->db->get();
        $result = $query->result_array();        
        return $result;
    }

    public function getStateNameById($state_id)
    {
        $this->db->select("state_name");
        $this->db->from("states");
        $this->db->where("id",$state_id);
        $query = $this->db->get();
        $result = $query->result_array();        
        return $result;
    }

    public function getCityNameById($city_id)
    {
        $this->db->select("city_name");
        $this->db->from("city");
        $this->db->where("id",$city_id);
        $query = $this->db->get();
        $result = $query->result_array();        
        return $result;
    }

    public function getCountryNameById($country_id)
    {
        $this->db->select("country_name");
        $this->db->from("countries");
        $this->db->where("id",$country_id);
        $query = $this->db->get();
        $result = $query->result_array();        
        return $result;
    }

    public function getItineraryById($itinerary_id)
    {
        $this->db->select("*");
        $this->db->from("itinerary_management");
        $this->db->where("id",$itinerary_id);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
    }

    public function getItineraryVehicleById($itinerary_id)
    {
        $this->db->select("*");
        $this->db->from("itinerary_vehicle_cost");
        $this->db->where("itinerary_id",$itinerary_id);
        $this->db->order_by("id","ASE");
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function updateItinerary($data, $itinerary_id)
    {
        $this->db->where('id', $itinerary_id);
        $this->db->update('itinerary_management', $data);
        
        return $this->db->affected_rows();
    }

    public function updateItineraryVehicleCost($data, $itinerary_id)
    {
        $this->db->where('id', $itinerary_id);
        $this->db->update('itinerary_vehicle_cost', $data);
        
        return $this->db->affected_rows();
    }
    
    public function updatemultipleItineraryVehicle($multiplevehicle, $itinerary_id, $allvehicleid)
    {
        $this->db->where('id', $allvehicleid);
        $this->db->where('itinerary_id', $itinerary_id);
        $this->db->update('itinerary_vehicle_mutiple', $multiplevehicle);
        
        return $this->db->affected_rows();
    }

    public function deleteItineraryVehicleCost($itinerary_id)
    {
        $this ->db->where('itinerary_id', $itinerary_id);
        $this ->db-> delete('itinerary_vehicle_cost');
        return $this->db->affected_rows();
    }

    public function deleteItinerary($itinerary_id)
    {
        $this ->db->where('id', $itinerary_id);
        $this ->db-> delete('itinerary_management');

        $this ->db->where('itinerary_id', $itinerary_id);
        $this ->db-> delete('itinerary_vehicle_cost');
        
        return $this->db->affected_rows();
    }

    public function addItineraryDetails($data)
    {
        $this->db->trans_start();
        $this->db->insert('itinerary_details', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    public function addmulitiplevehicleforitinerary($multiplevehicle)
    {
        $this->db->trans_start();
        $this->db->insert('itinerary_vehicle_mutiple', $multiplevehicle);
        
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    public function getItineraryImagesDetails($itinerary_id)
    {
        $this->db->select("*");
        $this->db->from("itinerary_details");
        $this->db->where("itinerary_id",$itinerary_id);
        $this->db->order_by('id','ASE');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function updateItineraryDetails($data, $itinerary_details_id)
    {
        if(array_key_exists('itinerary_images', $data)) {
           $table = "itinerary_details";
            $id = $itinerary_details_id;
            $column = "itinerary_images";
            $where = "id";
            $exiting_images = $this->getExisitingPhotos($table,$id, $column, $where);
            $images = json_decode($exiting_images['itinerary_images'] );
            foreach ($images as $image){
                unlink('uploads/itinerary_images/'.$image);
            }
        }
        $this->db->where('id', $itinerary_details_id);
        $this->db->update('itinerary_details', $data);
        
        return $this->db->affected_rows();
    }

    public function addNewActivites($data)
    {
        $this->db->trans_start();
        $this->db->insert('activities', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    public function addNewChildActivitiesPrice($data)
    {
        $this->db->trans_start();
        $this->db->insert('activites_child_price', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    //activities by unit 
    
    public function getAllActivitesByUnit()
    {
        $this->db->select('activitiesbyunit.*,countries.country_name,states.state_name,city.city_name');
        $this->db->from('activitiesbyunit');
        $this->db->join("countries","countries.id = activitiesbyunit.country_id");
        $this->db->join("states","states.id = activitiesbyunit.state_id");
        $this->db->join("city","city.id = activitiesbyunit.city_id");
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    public function addNewActivitesByUnit($data)
    {
        $this->db->trans_start();
        $this->db->insert('activitiesbyunit', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    public function getItenerarymultipleVehicleById($veh_id)
    {
        $this->db->select("*");
        $this->db->from("itinerary_vehicle_mutiple");
        $this->db->where("id", $veh_id);
        //$this->db->order_by("id","ASC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    
    //end

    public function getAllActivites()
    {
        $this->db->select('activities.*,countries.country_name,states.state_name,city.city_name');
        $this->db->from('activities');
        $this->db->join("countries","countries.id = activities.country_id");
        $this->db->join("states","states.id = activities.state_id");
        $this->db->join("city","city.id = activities.city_id");
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function getActivitesById($activity_id)
    {
        $this->db->select('activities.*,countries.country_name,states.state_name,city.city_name');
        $this->db->from('activities');
        $this->db->join("countries","countries.id = activities.country_id");
        $this->db->join("states","states.id = activities.state_id");
        $this->db->join("city","city.id = activities.city_id");
        $this->db->where("activities.id", $activity_id);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
    }

    public function getActivitesChildPriceById($activity_id)
    {
        $this->db->select('*');
        $this->db->from('activites_child_price');
        $this->db->where("activity_id", $activity_id);
        $this->db->order_by('id','ASE');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function updateActivites($data, $activity_id)
    {
        if (array_key_exists('activities_images', $data)) {
            $table = "activities";
            $id = $activity_id;
            $column = "activities_images";
            $where = "id";
            $exiting_images = $this->getExisitingPhotos($table,$id, $column, $where);
            $images = json_decode($exiting_images['activities_images'] );
            foreach ($images as $image){
                unlink('uploads/activities_images/'.$image);
            }
        }
        $this->db->where('id', $activity_id);
        $this->db->update('activities', $data);
        
        return $this->db->affected_rows();
    }

    public function updateChildActivitiesPrice($data, $child_price_id)
    {
        $this->db->where('id', $child_price_id);
        $this->db->update('activites_child_price', $data);
        
        return $this->db->affected_rows();
    }

    public function deleteActivities($activity_id)
    {
        $this ->db->where('id', $activity_id);
        $this ->db-> delete('activities');

        $this ->db->where('activity_id', $activity_id);
        $this ->db-> delete('activites_child_price');
        
        return $this->db->affected_rows();
    }

    public function getExisitingPhotos($table, $id, $column, $where)
    {
        $this->db->select($column);
        $this->db->from($table);
        $this->db->where($where, $id);
        $query = $this->db->get();
        $result = $query->row_array();        
        return $result;
    }

    public function deleteActivitiesChildPriceRow($id)
    {   
        $this ->db->where('id', $id);
        $this ->db-> delete('activites_child_price');
        return $this->db->affected_rows();
    }

    public function searchHotel($data)
    {
        extract($data);
        $startDate='';
        $endDate ='';
        
        $sDate = explode('/',$startdate);
        $startdate = $sDate[2].'-'.$sDate[1].'-'.$sDate[0];
        
        $eDate = explode('/',$enddate);
        $enddate = $eDate[2].'-'.$eDate[1].'-'.$eDate[0];
        
        $startDate = date('Y-m-d',strtotime($startdate));
        $endDate = date('Y-m-d',strtotime($enddate));

        if($startDate == '1970-01-01' || $startDate == '' || $endDate == '1970-01-01' || $endDate == ''){
            $startDate = '';
            $endDate = '';
        }else{
            $queryDate = "AND ((DATE_FORMAT(str_to_date(hdr.from_date, '%Y-%m-%d'), '%Y-%m-%d')<='$startDate') && (DATE_FORMAT(str_to_date(hdr.to_date, '%Y-%m-%d'), '%Y-%m-%d')>='$startDate')) && ((DATE_FORMAT(str_to_date(hdr.from_date, '%Y-%m-%d'), '%Y-%m-%d')<='$endDate') && (DATE_FORMAT(str_to_date(hdr.to_date, '%Y-%m-%d'), '%Y-%m-%d')>='$endDate'))";
            
            $destinationsql = "d.city_id ='$city_id' AND d.state_id = '$state_id' AND d.country_id = '$country_id' AND d.status = 1";

            $sql_query = "SELECT * FROM (SELECT hotel_details.*,city.city_name,countries.country_name, states.state_name,hdr.from_date,hdr.to_date FROM hotel_details INNER JOIN city ON city.id = hotel_details.city_id INNER JOIN countries ON countries.id = hotel_details.country_id INNER JOIN states ON states.id = hotel_details.state_id INNER JOIN hotel_dates_rate AS hdr ON hdr.hotel_id = hotel_details.hotel_id WHERE 1=1 $queryDate) as d WHERE $destinationsql";

            $dataArr = $this->db->query($sql_query)->result_array();
            
            $hotelwithImgAll = array();

            foreach($dataArr as $data)
            {
                $hotelwithImg = array();
                $hotelwithImg['hotel_id']       = $data['hotel_id'];
                $hotelwithImg['hotel_name']     = $data['hotel_name'];
                $hotelwithImg['hotel_type']     = $data['hotel_type'];
                $hotelwithImg['star_rating']    = $data['hotel_star'];
                $hotelwithImg['from_date']      = $data['from_date'];
                $hotelwithImg['to_date']        = $data['to_date'];
                $hotelwithImg['city']           = $data['city_name'];
                $hotelwithImg['address_1']      = $data['address_line_1'];
                $hotelwithImg['address_2']      = $data['address_line_2'];
                $hotelwithImg['country']        = $data['country_name'];
                $hotelwithImg['state']          = $data['state_name'];
                $hotelId                        = $data['hotel_id'];
                $seleQuery = $this->db->query("SELECT hotel_photos FROM hotel_photos WHERE hotel_id = $hotelId")->row_array();
                $hotelwithImg['image'] = $seleQuery['hotel_photos'];
                
                $hotelwithImgAll[] = $hotelwithImg;
            }

            return $hotelwithImgAll;
        }
    }

    public function searchPackage($data)
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
                $this->db->from('itinerary_management');
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
                $this->db->from('itinerary_management');
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
        
        
        $queryA = "SELECT * FROM itinerary_management WHERE id IN ($itineraryIds) AND duration = $duration";
        return $dataArr = $this->db->query($queryA)->result_array();
    }

    public function getCitiesById($ids)
    {
        
        $query = "SELECT * FROM city WHERE id IN($ids) ORDER BY id ASC";
        return $result = $this->db->query($query)->result_array();
        //return $result;
    }
    
    public function getCitiesByIdforPackage($ids)
    {
        $query = "SELECT * FROM city WHERE id IN ($ids) ORDER BY id ASC";
        return $result = $this->db->query($query)->result_array();

    }

    public function getDateRatesByid_calculate($hotel_id, $startdate, $enddate)
    {
        $query = "select * from (SELECT * FROM hotel_dates_rate WHERE ((DATE_FORMAT(from_date, '%Y-%m-%d')<='$startdate') && (DATE_FORMAT(to_date,'%Y-%m-%d')>='$enddate')) || ((DATE_FORMAT(from_date,'%Y-%m-%d')<='$startdate') && (DATE_FORMAT(to_date,'%Y-%m-%d')>='$enddate'))) as d where d.hotel_id = $hotel_id";
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function getHotelRoomTypeByid($hotel_id)
    {
        $this->db->select('*');
        $this->db->from("hotel_room_details");
        $this->db->where("hotel_id", $hotel_id);
        $this->db->order_by("room_id","ASE");
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function getHotelRatesByid($hotel_id, $date_id, $room_type_id)
    {
        $this->db->select('*');
        $this->db->from("hotel_room_rates");
        $this->db->where("hotel_id", $hotel_id);
        $this->db->where("date_id", $date_id);
        $this->db->where("room_type_id", $room_type_id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function getHotelRoomRatesFilter($hotelId,$dateIds)
    {
        $query = "SELECT * FROM hotel_room_rates WHERE hotel_id = $hotelId AND date_id IN ($dateIds)";
        $result = $this->db->query($query)->result_array();
        return $result;
    }


    public function getIteneraryById($itinerary_id)
    {
        $this->db->select("itinerary_management.*, group_concat(itinerary_vehicle_cost.duration_city ORDER BY itinerary_vehicle_cost.id ASC) as duration_city");
        $this->db->from("itinerary_management");
        $this->db->join("itinerary_vehicle_cost","itinerary_vehicle_cost.itinerary_id = itinerary_management.id");
        $this->db->where("itinerary_management.id", $itinerary_id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }
    //view package data for pdf

    public function getIteneraryByIdforpdf($editItiId)
	{
        $this->db->select("*");
        $this->db->from("itinerary_management");
        $this->db->where("id", $editItiId);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;

		// $query = $this->db->prepare("SELECT * FROM itinerary_management WHERE id = ?");
		// $query->bindValue(1, $id);

		// try{
		// 	$query->execute();
		// 	return $query->fetch(PDO::FETCH_ASSOC);
		// } catch(PDOException $e){
		// 	die($e->getMessage());
		// }
	}
	
	public function getIteneraryDurationcityById($editItiId)
    {
        //var_dump($editItiId);
        $this->db->select("*");
        $this->db->from("itinerary_vehicle_cost");
        $this->db->where("itinerary_id", $editItiId);
        $this->db->order_by("id","ASC");
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    //end of pdf data


    public function getIteneraryDetailsById($itinerary_id)
    {
        $this->db->select("*");
        $this->db->from("itinerary_details");
        $this->db->where("itinerary_id", $itinerary_id);
        $this->db->order_by("id","ASC");
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function getItineraryVehicle($itinerary_id)
    {
        $this->db->select("itinerary_vehicle_cost.*, v1.vehicle_name as vehicle_1_name, v2.vehicle_name as vehicle_2_name, v3.vehicle_name as vehicle_3_name ");
        $this->db->from("itinerary_vehicle_cost");
        $this->db->join("itinerary_vehicle_master as v1",'v1.id = itinerary_vehicle_cost.vehicle_1','left');
        $this->db->join("itinerary_vehicle_master as v2",'v2.id = itinerary_vehicle_cost.vehicle_2','left');
        $this->db->join("itinerary_vehicle_master as v3",'v3.id = itinerary_vehicle_cost.vehicle_3','left');
        $this->db->where("itinerary_id", $itinerary_id);
        $this->db->order_by("itinerary_vehicle_cost.id","ASC");
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function getHotelsByCityDate($cityId, $searchDate)
    {
        $cityStr = '';
        if($cityId != '')
        {
            $cityStr = " AND hotel_details.city_id = '$cityId' AND hotel_details.status = 1";
        }

        $searchDate=date('Y-m-d',strtotime($searchDate));
        if($searchDate == '1970-01-01' || $searchDate == ''){
            $searchDate='';
        }else{
            $queryDate = " AND ((DATE_FORMAT(hdr.from_date, '%Y-%m-%d')<='$searchDate') && (DATE_FORMAT(hdr.to_date, '%Y-%m-%d')>='$searchDate')) && ((DATE_FORMAT(hdr.from_date, '%Y-%m-%d')<='$searchDate') && (DATE_FORMAT(hdr.to_date, '%Y-%m-%d')>='$searchDate'))";
        }

        $query = "SELECT hotel_details.hotel_id,hotel_details.hotel_name,hotel_details.hotel_type,hotel_details.hotel_star,hotel_details.city_id,hdr.from_date,hdr.to_date,hdr.meal_plan FROM hotel_details INNER JOIN hotel_dates_rate AS hdr ON hdr.hotel_id = hotel_details.hotel_id WHERE 1=1 $cityStr $queryDate";

        $dataArr = $this->db->query($query)->result_array();

        $hotelwithImgAll = array();

        foreach($dataArr as $data)
        {
            $hotelwithImg = array();
            $hotelwithImg['hotel_id']       = $data['hotel_id'];
            //$hotelwithImg['hotel_partner']  = $data['hotel_partner_id'];
            $hotelwithImg['hotel_name']     = $data['hotel_name'];
            $hotelwithImg['hotel_type']     = $data['hotel_type'];
            $hotelwithImg['star_rating']    = $data['hotel_star'];
            $hotelwithImg['from_date']      = $data['from_date'];
            $hotelwithImg['to_date']        = $data['to_date'];
            $hotelwithImg['city']           = $data['city_id'];
            //$hotelwithImg['address_1']      = $data['address_line_1'];
            //$hotelwithImg['address_2']      = $data['address_line_2'];
            //$hotelwithImg['country']        = $data['country_id'];
            //$hotelwithImg['state']          = $data['state_id'];
            $hotelId                        = $data['hotel_id'];
            $seleQuery = $this->db->query("SELECT hotel_photos FROM hotel_photos WHERE hotel_id = $hotelId")->row_array();
            $hotelwithImg['image'] = $seleQuery['hotel_photos'];
            
            $hotelwithImgAll[] = $hotelwithImg;
        }

        return $hotelwithImgAll;
    }

    public function getAcivitiesByCity($cityId)
    {
        $this->db->select("*");
        $this->db->from("activities");
        $this->db->where("city_id", $cityId);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    
    //Per Unit Activities By City
    public function getPerUnitAcivitiesByCity($cityId)
    {
        $this->db->select("*");
        $this->db->from("activitiesbyunit");
        $this->db->where("city_id", $cityId);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function getMealPlanByhotelId($hotelId, $startdate, $enddate, $searchType, $selectedDate)
    {
        if($hotelId != '')
        {
            if($searchType == 'Package')
            {
                $selectedDate1 = explode('-',$selectedDate);
                $startDate = $selectedDate1[0].'-'.$selectedDate1[1].'-'.$selectedDate1[2];

                $query = "SELECT * FROM hotel_dates_rate as d where d.hotel_id = '$hotelId' AND ((DATE_FORMAT(from_date, '%Y-%m-%d')<='$selectedDate') && (DATE_FORMAT(to_date, '%Y-%m-%d')>='$selectedDate')) && ((DATE_FORMAT(from_date, '%Y-%m-%d')<='$selectedDate') && (DATE_FORMAT(to_date, '%Y-%m-%d')>='$selectedDate'))";

            }else{
                $startdate = date('Y-m-d',strtotime($startdate));
                $enddate = date('Y-m-d',strtotime($enddate));
                    
                $query = "SELECT * FROM(SELECT * FROM hotel_dates_rate WHERE ((DATE_FORMAT(str_to_date(from_date, '%Y-%m-%d'), '%Y-%m-%d')<='$startdate') && (DATE_FORMAT(str_to_date(to_date, '%Y-%m-%d'), '%Y-%m-%d')>='$startdate')) && ((DATE_FORMAT(str_to_date(from_date, '%Y-%m-%d'), '%Y-%m-%d')<='$enddate') && (DATE_FORMAT(str_to_date(to_date, '%Y-%m-%d'), '%Y-%m-%d')>='$enddate'))) as d WHERE d.hotel_id = $hotelId";
            }
            $result = $this->db->query($query)->result_array();
            return $result;
        }
    }

    public function getVehicleVendorDetails($vendor_id)
    {
        $this->db->select('vendorId, company_name');
        $this->db->from('vendor_details');
        $this->db->where('vendorId', $vendor_id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

    public function getHotelRoomRatesFilter1($hotelId,$dateIds)
    {
        if($hotelId != 0)
        {
            $query = "SELECT * FROM hotel_room_rates WHERE hotel_id = $hotelId AND date_id IN ($dateIds)";
            $result = $this->db->query($query)->result_array();
            return $result;
        }
    }

    public function getVehiclePriceByIds($vehicle,$count)
    {
        if ($vehicle != 0) {
            $ids = explode('|', $vehicle);
            $c = $count + 1;
            $this->db->select("price_".$c."");
            $this->db->from('itinerary_vehicle_cost');
            $this->db->where(array('id' => $ids[0], 'vehicle_'.$c.'' => $ids[1],'vendor_'.$c.''=> $ids[2]));
            $query = $this->db->get();
            $result = $query->row_array();
            return $result;
        }
    }

    public function getActivitiesPriceByAdult($activities_ids, $adult)
    {
        //echo $adult;
        $ids = implode(',',$activities_ids);
        $query = "SELECT act.adult_cost FROM activities as act WHERE act.id IN ($ids)";
        $result = $this->db->query($query)->result_array();

        $final_price = 0;
        foreach ($result as $price) {
           $final_price = $final_price + ($price['adult_cost'] * $adult);
        }

        return $final_price;
        //return $result;
    }

    public function getActivitiesPriceByChild($activities_ids, $child, $child_age)
    {
        $ids = implode(',',$activities_ids);
        $query = "SELECT act.* FROM activites_child_price as act WHERE act.activity_id IN ($ids)";
        $result = $this->db->query($query)->result_array();

        $child_price = array();
        $ages = explode(',', $child_age);
        foreach ($ages as $ag) {
            foreach ($result as $cprice) {
                if (($ag >= $cprice['child_from_age']) && ($ag <= $cprice['child_to_age'])) {
                    $child_price[] = $cprice['price'];
                }
            }
        }

        return array_sum($child_price);
   }
   
   //Get Activities Price By Unit
   
    public function getActivitiesPriceByUnit($activities_ids, $adult, $unitarr)
    {
        $ids = implode(',',$activities_ids);
        //var_dump($ids);

        $query = "SELECT act.perunit_cost FROM activitiesbyunit as act WHERE act.id IN ($ids)";
        $result = $this->db->query($query)->result_array();

        //$perunit_final_price = 0;
        $perunit_final_price = array();
        $totalunit = explode(',', $unitarr);
        //var_dump($totalunit);
        foreach($result as $key=>$activities){

            //var_dump($activities['perunit_cost']);
            $perunit_final_price[] = $activities['perunit_cost'] * $totalunit[$key] * $adult;
            
        }
        //var_dump(array_sum($perunit_final_price));
        return array_sum($perunit_final_price);       
    }

    public function getActivitiesPriceByUnitChild($activities_ids, $childVal, $unitarr)
    {
        $ids = implode(',',$activities_ids);
        //var_dump($ids);

        $query = "SELECT act.perunit_cost FROM activitiesbyunit as act WHERE act.id IN ($ids)";
        $result = $this->db->query($query)->result_array();

        //$perunit_final_price = 0;
        $perunit_final_price = array();
        $totalunit = explode(',', $unitarr);
        //var_dump($totalunit);
        foreach($result as $key=>$activities){

            //var_dump($activities['perunit_cost']);
            $perunit_final_price[] = $activities['perunit_cost'] * $totalunit[$key] * $childVal;
            
        }
        //var_dump(array_sum($perunit_final_price));
        return array_sum($perunit_final_price);       
    }

    public function getHotelRoomTypeRatesFilter($hotelId,$dateId,$roomTypeId) {
        //echo "SELECT * FROM hotel_room_rates WHERE hotel_id = $hotelId AND date_id=$dateId AND room_name_id=$hotelRoomid AND room_type_id = $roomTypeId";
        $query = "SELECT hr.*, h.hotel_name, hh.room_type FROM hotel_room_rates hr INNER JOIN hotel_details h ON hr.hotel_id = h.hotel_id INNER JOIN hotel_room_details hh ON hr.room_type_id = hh.room_id WHERE hr.hotel_id = $hotelId AND hr.date_id=$dateId AND hr.room_type_id = $roomTypeId AND (hr.room_name = 'Extra Breakfast' || hr.room_name = 'Lunch' || hr.room_name = 'Dinner')";
        
        return $result = $this->db->query($query)->result_array();
    }
    
    public function getAllSavedHotelPackages()
    {
        $this->db->select("saved_hotel_packages.*, hotel_details.*, countries.country_name, states.state_name, city.city_name, partner_list.markup, partner_list.company_name");
        $this->db->from("saved_hotel_packages");
        $this->db->join("hotel_details",'hotel_details.hotel_id = saved_hotel_packages.hotel_id');
        $this->db->join("countries","countries.id = hotel_details.country_id");
        $this->db->join("states","states.id = hotel_details.state_id");
        $this->db->join("city","city.id = hotel_details.city_id");
        $this->db->join("partner_list", 'partner_list.partner_id = saved_hotel_packages.partner_id');
        // $this->db->where('emp_id', $emp_id);
        // $this->db->where('partner_id', $this->global['partner_id']);
        $this->db->order_by("id",'DESC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    public function getSavedHotelPackageByid($package_id)
    {
        $this->db->select("saved_hotel_packages.*, hotel_details.*, countries.country_name, states.state_name, city.city_name, partner_list.company_name, hotel_partner.email");
        $this->db->from("saved_hotel_packages");
        $this->db->join("hotel_details",'hotel_details.hotel_id = saved_hotel_packages.hotel_id');
        $this->db->join("countries","countries.id = hotel_details.country_id");
        $this->db->join("states","states.id = hotel_details.state_id");
        $this->db->join("city","city.id = hotel_details.city_id");
        $this->db->join("partner_list", 'partner_list.partner_id = saved_hotel_packages.partner_id');
        $this->db->join("hotel_partner", 'hotel_partner.hotel_partner_id = saved_hotel_packages.hotel_partner_id');
        $this->db->where('saved_hotel_packages.id', $package_id);
        //$this->db->where('partner_id', $this->global['partner_id']);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;

    }
    
    public function updateHotelpackageConfirmStatus($packageid, $data)
    {
        $this->db->where('id', $packageid);
        $this->db->update('saved_hotel_packages', $data);
        
        return $this->db->affected_rows();
        
    }
}

  