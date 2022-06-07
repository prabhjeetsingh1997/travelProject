<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');  
 
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Pdf extends Dompdf {

    public function __construct() {
        parent::__construct();
    }

    protected function ci() {
        return get_instance();
    }

    public function load_view($view, $data = array()) {
        $dompdf = new Dompdf();
        $html = $this->ci()->load->view($view, $data, TRUE);

        $dompdf->loadHtml($html);
        //$dompdf->set_option('isRemoteEnabled', TRUE);
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();
        $time = time();
        
        // Parameters
        $x          = 505;
        $y          = 790;
        $text       = "{PAGE_NUM} of {PAGE_COUNT}";     
        $font       = $dompdf->getFontMetrics()->get_font('Helvetica', 'normal');   
        $size       = 10;    
        $color      = array(0,0,0);
        $word_space = 0.0;
        $char_space = 0.0;
        $angle      = 0.0;

        $dompdf->getCanvas()->page_text(
          $x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle
        );

        // Output the generated PDF to Browser
        $dompdf->stream("file-" . $time, array("Attachment"=>0));
    }

}
?>