<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 
//error_reporting(E_ERROR | E_PARSE);
/**
 * Class : BaseController
 * Base Class to control over all the classes
 * @author : Sachin Gupta
 * @version : 1.1
 * @since : 12 March 2019
 */
require_once dirname(__FILE__).'/tcpdf/tcpdf.php';

class Pdftest extends TCPDF {

    //protected $ci;

    public function __construct(){
        //$this->ci -& get_instance();

    }

}