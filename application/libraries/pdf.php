<?php 

defined('BASEPATH') or exit('No direct script access allowed');
/**
 * CodeIgniter DomPDF Library
 *
 * Generate PDF's from HTML in CodeIgniter
 */
 require 'vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;
class Pdf extends Dompdf
{
    /**
     * PDF filename
     * @var String
     */
    public $filename;
    public function __construct()
    {
        parent::__construct();
        $this->filename = "laporan.pdf";
    }
    /**
     * Get an instance of CodeIgniter
     *
     * @access    protected
     * @return    void
     */
    // protected function ci()
    // {
    //     return get_instance();
    // }
    /**
     * Load a CodeIgniter view into domPDF
     *
     * @access    public
     * @param    string    $view The view to load
     * @param    array    $data The view data
     * @return    void
     */
    public function load_view($view, $data = array())
    {

        $CI = &get_instance();

        $options = new Options();
        $options->setChroot(FCPATH);
        $options->setDefaultFont('courier');

        $this->setOptions($options);

        $html = $CI->load->view($view, $data, TRUE);
        $this->load_html($html);

        // Render the PDF
        $this->render();

        // Output the generated PDF to Browser
        $this->stream($this->filename, array("Attachment" => false));
    }
}
