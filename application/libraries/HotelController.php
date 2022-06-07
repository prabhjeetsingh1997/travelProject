<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 

/**
 * Class : BaseController
 * Base Class to control over all the classes
 * @author : Sachin Gupta
 * @version : 1.1
 * @since : 12 March 2019
 */
class HotelController extends CI_Controller {
	
	/**
     * This function used to load views
     * @param {string} $viewName : This is view name
     * @param {mixed} $headerInfo : This is array of header information
     * @param {mixed} $pageInfo : This is array of page information
     * @param {mixed} $footerInfo : This is array of footer information
     * @return {null} $result : null
     */
    function loadViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL){

        $this->load->view('hotel/includes/custom_header', $headerInfo);
        $this->load->view($viewName, $pageInfo);
        $this->load->view('hotel/includes/custom_footer', $footerInfo);
    }

    function loadThis() {
        $this->global ['pageTitle'] = 'Lid Travel : Access Denied';
        $this->load->view ( 'access' );
    }
}