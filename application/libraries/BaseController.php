<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 
error_reporting(E_ERROR | E_PARSE);
/**
 * Class : BaseController
 * Base Class to control over all the classes
 * @author : Sachin Gupta
 * @version : 1.1
 * @since : 12 March 2019
 */
class BaseController extends CI_Controller {
	protected $role = '';
	protected $vendorId = '';
	protected $name = '';
	protected $roleText = '';
	public $global = array ();
	protected $lastLogin = '';

	protected $hotel_partner_id = '';
	protected $email = '';
	protected $hotel_name = '';
	protected $address_line_1 = '';
	protected $address_line_2 = '';
	protected $city_name = '';
	protected $state_name = '';
	protected $country_name = '';
	protected $zip = '';

	protected $partner_id = '';
	protected $mobile_no = '';
	protected $markup = '';
	protected $logo = '';
	protected $roleId = '';
	//protected $is_tl = '';
	protected $hotel_management = '';
	protected $query_management = '';
	protected $client_management = '';
	protected $vendor_management = '';
	protected $tourcard_management = '';
	protected $accounts_management = '';
	


	/**
	 * Takes mixed data and optionally a status code, then creates the response
	 *
	 * @access public
	 * @param array|NULL $data
	 *        	Data to output to the user
	 *        	running the script; otherwise, exit
	 */
	public function response($data = NULL) {
		$this->output->set_status_header ( 200 )->set_content_type ( 'application/json', 'utf-8' )->set_output ( json_encode ( $data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) )->_display ();
		exit ();
	}
	
	/**
	 * This function used to check the user is logged in or not
	 */
	function isLoggedIn() {
		$adminSessionData = $this->session->userdata ('admin');

		$isLoggedIn = isset($adminSessionData['isLoggedIn']);
		
		if (! isset ( $isLoggedIn ) || $isLoggedIn != TRUE) {
			redirect (ADMIN_URL);
		} else {
			$this->role 		= $adminSessionData['role'];
			$this->vendorId 	= $adminSessionData['userId'];
			$this->name 		= $adminSessionData['name'];
			$this->roleText 	= $adminSessionData['roleText'];
			$this->lastLogin 	= $adminSessionData['lastLogin'];
			
			$this->global ['name'] = $this->name;
			$this->global ['role'] = $this->role;
			$this->global ['user_id'] 	= $this->vendorId;
			$this->global ['role_text'] = $this->roleText;
			$this->global ['last_login'] = $this->lastLogin;
		}
	}

	public function isHotelPartnerLoggedIn()
	{
		$hotelSessionData = $this->session->userdata ('hotel');
		$isLoggedIn = isset($hotelSessionData['isLoggedIn']);

		if(!isset( $isLoggedIn ) || $isLoggedIn != TRUE) {
			redirect(base_url());
		}else {
			$this->hotel_partner_id 	= $hotelSessionData['hotel_partner_id'];
			$this->name 				= $hotelSessionData['name'];
			$this->email 				= $hotelSessionData['email'];
			$this->hotel_name 			= $hotelSessionData['hotel_name'];
			$this->contact_no           = $hotelSessionData['contact_no'];
			$this->address_line_1 		= $hotelSessionData['address_line_1'];
			$this->address_line_2 		= $hotelSessionData['address_line_2'];
			$this->city_name 			= $hotelSessionData['city_name'];
			$this->state_name			= $hotelSessionData['state_name'];
			$this->country_name 		= $hotelSessionData['country_name'];
			$this->zip 					= $hotelSessionData['zip'];
			
			$this->global ['hotel_partner_id'] 	= $this->hotel_partner_id;
			$this->global ['name'] 				= $this->name;
			$this->global ['email'] 			= $this->email;
			$this->global ['hotel_name'] 		= $this->hotel_name;
			$this->global ['contact_no']        = $this->contact_no;
			$this->global ['address_line_1'] 	= $this->address_line_1;
			$this->global ['address_line_2'] 	= $this->address_line_2;
			$this->global ['city_name'] 		= $this->city_name;
			$this->global ['state_name'] 		= $this->state_name;
			$this->global ['country_name'] 		= $this->country_name;
			$this->global ['zip'] 				= $this->zip;
		}
	}

	public function isPartnerLoggedIn()
	{
		$partnerSessionData = $this->session->userdata('partner');
		$isLoggedIn = isset($partnerSessionData['isLoggedIn']);

		if(!isset($isLoggedIn) || $isLoggedIn != TRUE) {
			redirect('partnerLogin');
		}else {
			$this->partner_id 	       = $partnerSessionData['partner_id'];
			$this->name 		       = $partnerSessionData['name'];
			$this->email 		       = $partnerSessionData['email'];
			$this->mobile_no 	       = $partnerSessionData['mobile_no'];
			$this->markup 		       = $partnerSessionData['markup'];
			$this->logo 		       = $partnerSessionData['logo'];
			$this->role 		       = $partnerSessionData['role'];
			//$this->is_tl 		       = $partnerSessionData['is_tl'];
			$this->emp_type 	       = $partnerSessionData['emp_type'];
			$this->roleId 		       = $partnerSessionData['roleId'];
			$this->state_id            = $partnerSessionData['state_id'];
			$this->hotel_management    = $partnerSessionData['hotel_management'];
			$this->query_management    = $partnerSessionData['query_management'];
			$this->client_management   = $partnerSessionData['client_management'];
			$this->vendor_management   = $partnerSessionData['vendor_management'];
			$this->tourcard_management = $partnerSessionData['tourcard_management'];
			$this->accounts_management = $partnerSessionData['accounts_management'];
			
			
			$this->global ['partner_id'] 	      = $this->partner_id;
			$this->global ['name'] 			      = $this->name;
			$this->global ['email'] 		      = $this->email;
			$this->global ['mobile_no'] 	      = $this->mobile_no;
			$this->global ['markup'] 		      = $this->markup;
			$this->global ['logo'] 			      = $this->logo;
			$this->global ['role'] 			      = $this->role;
			//$this->global ['is_tl']               = $this->is_tl;
			$this->global ['emp_type']            = $this->emp_type;
			$this->global ['roleId'] 		      = $this->roleId;
			$this->global ['state_id']            = $this->state_id;
			$this->global ['hotel_management']    = $this->hotel_management;
			$this->global ['query_management']    = $this->query_management;
			$this->global ['client_management']   = $this->client_management;
			$this->global ['vendor_management']   = $this->vendor_management;
			$this->global ['tourcard_management'] = $this->tourcard_management;
			$this->global ['accounts_management'] = $this->accounts_management;
		
		}
	}
	
	/**
	 * This function is used to check the access
	 */
	function isAdmin() {
		if ($this->role != ROLE_ADMIN) {
			return true;
		} else {
			return false;
		}
	}

	function isPartnerAdmin() {
		if ($this->roleId != ROLE_ADMIN ) {
			return true;
		} 
		else {
			return false;
		}
	
	}
	
// 	function isPartnerEmployeeistl() {
// 		if ($this->is_tl != 1 ) {
// 			return true;
// 		} 
// 		else {
// 			return false;
// 		}
	
// 	}
	
// 	function isPartnerEmployeeisAcc() {
// 		if ($this->emp_type != 2 ) {
// 			return true;
// 		} 
// 		else {
// 			return false;
// 		}
	
// 	}
	
	/**
	 * This function is used to check the access
	 */
	function isTicketter() {
		if($this->role != ROLE_ADMIN || $this->role != ROLE_MANAGER) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * This function is used to load the set of views
	 */
	function loadThis() {
		$this->global ['pageTitle'] = 'Lid Travel : Access Denied';
		
		$this->load->view('access');
	}
	
	/**
	 * This function is used to logged out user from system
	 */
	function logout() {
		$this->session->unset_userdata('admin');
		//$this->session->sess_destroy ();
		redirect(ADMIN_URL);
	}

	function hotelLogout() {
		$this->session->unset_userdata('hotel');
		//redirect(base_url(),'hotelPartner');
		redirect("index/hotelPartner");
		//$this->global['pageTitle'] = 'LidTravel : Home Page';
		//$this->loadViews("hotel/index", $this->global, NULL, NULL);
	}

	public function partnerLogout(){
		$this->session->unset_userdata('partner');
		redirect(base_url(PARTNER));
	}
	

	/**
     * This function used to load views
     * @param {string} $viewName : This is view name
     * @param {mixed} $headerInfo : This is array of header information
     * @param {mixed} $pageInfo : This is array of page information
     * @param {mixed} $footerInfo : This is array of footer information
     * @return {null} $result : null
     */
    function loadViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL){

        $this->load->view('admin/includes/header', $headerInfo);
        $this->load->view($viewName, $pageInfo);
        $this->load->view('admin/includes/footer', $footerInfo);
    }

    public function loadHotelViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL)
    {
    	$this->load->view('hotel/includes/header', $headerInfo);
        $this->load->view($viewName, $pageInfo);
        $this->load->view('hotel/includes/footer', $footerInfo);
    }

    public function loadPartnerViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL)
    {
    	$this->load->view('partner/includes/header', $headerInfo, $this->global);
    	$this->load->view('partner/includes/sidebar', $this->global);
        $this->load->view($viewName, $pageInfo);
        $this->load->view('partner/includes/footer', $footerInfo);
    }
	
	/**
	 * This function used provide the pagination resources
	 * @param {string} $link : This is page link
	 * @param {number} $count : This is page count
	 * @param {number} $perPage : This is records per page limit
	 * @return {mixed} $result : This is array of records and pagination data
	 */
	function paginationCompress($link, $count, $perPage = 10, $segment = SEGMENT) {
		$this->load->library ( 'pagination' );

		$config ['base_url'] = base_url () . $link;
		$config ['total_rows'] = $count;
		$config ['uri_segment'] = $segment;
		$config ['per_page'] = $perPage;
		$config ['num_links'] = 5;
		$config ['full_tag_open'] = '<nav><ul class="pagination">';
		$config ['full_tag_close'] = '</ul></nav>';
		$config ['first_tag_open'] = '<li class="arrow">';
		$config ['first_link'] = 'First';
		$config ['first_tag_close'] = '</li>';
		$config ['prev_link'] = 'Previous';
		$config ['prev_tag_open'] = '<li class="arrow">';
		$config ['prev_tag_close'] = '</li>';
		$config ['next_link'] = 'Next';
		$config ['next_tag_open'] = '<li class="arrow">';
		$config ['next_tag_close'] = '</li>';
		$config ['cur_tag_open'] = '<li class="active"><a href="#">';
		$config ['cur_tag_close'] = '</a></li>';
		$config ['num_tag_open'] = '<li>';
		$config ['num_tag_close'] = '</li>';
		$config ['last_tag_open'] = '<li class="arrow">';
		$config ['last_link'] = 'Last';
		$config ['last_tag_close'] = '</li>';
	
		$this->pagination->initialize ( $config );
		$page = $config ['per_page'];
		$segment = $this->uri->segment ( $segment );
	
		return array (
				"page" => $page,
				"segment" => $segment
		);
	}

	public function paginationmethod($url,$result,$per_page)
	{
		$this->load->library ('pagination');
		$config['base_url'] = $this->config->base_url($url);
		$config['total_rows'] = $result;
		$config['per_page'] = $per_page;
		$config['full_tag_open'] = "<ul class='pagination pagination-sm'>";
	    $config['full_tag_close'] ="</ul>";
	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';
	    $config['cur_tag_open'] = "<li class='active disable'><a>";
	    $config['cur_tag_close'] = "</a></li>";
	    $config['next_tag_open'] = "<li>";
	    $config['next_tagl_close'] = "</li>";
	    $config['prev_tag_open'] = "<li>";
	    $config['prev_tagl_close'] = "</li>";
	    $config['first_tag_open'] = "<li>";
	    $config['first_tagl_close'] = "</li>";
	    $config['last_tag_open'] = "<li>";
	    $config['last_tagl_close'] = "</li>";		
		$config['first_link'] = 'First';
    	$config['last_link'] = 'Last';
		$config['use_page_numbers'] = TRUE;
		/*$config['num_links'] = $result;*/
		/*$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';*/
    	$this->pagination->initialize($config);
    	return $config;
	}
}