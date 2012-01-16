<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Salidas extends CI_Controller {

    private $lst_salidas = array();
    private $cve_destino = null;

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session','salidas_lib'));

        $this->load->model(array('salidas_model'));

        $this->load->helper('url');

        $this->session->set_userdata('cliente' , 'GA-1');
    }


    public function info_salidas()
    {
        $this->cve_destino = $this->uri->segment(3);
        $this->lst_salidas = $this->salidas_model->get_datos($this->cve_destino);
        $data['lst_salidas'] = $this->lst_salidas ;

        $data['peso_bruto_total'] = $this->salidas_lib->get_peso_total($this->cve_destino);

        $lst_detalle_bodegas = $this->salidas_model->get_salidas_por_bodega($this->cve_destino);
        $data['lst_detalle_bodegas'] = $lst_detalle_bodegas;

        $this->load->view('salidas',$data);
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */