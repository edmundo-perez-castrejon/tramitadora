<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contratos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        $this->load->model(array('contratos_model','clientes_model','buques_model','bodegas_model','destinos_model'));


        $this->load->helper('url');

        $this->session->set_userdata('cliente' , 'GA-1');
    }

	public function index()
	{

        #obtener los datos del cliente
        $data_cliente = $this->clientes_model->get_datos($this->session->userdata('cliente'));

        $data['nombre_cliente'] = $data_cliente['NOMBRE_CLIENTE'];
        $data['lst_contratos'] = $this->contratos_model->get_contratos_by_cliente($this->session->userdata('cliente'));
		$this->load->view('contratos',$data);

	}

    public function get_datos()
    {
        $cve_contrato = $this->uri->segment(3);
        $datos_buque = $this->buques_model->get_datos($cve_contrato);
        $datos_bodegas = $this->bodegas_model->get_datos($cve_contrato);

        $datos_destinos = $this->destinos_model->get_datos($this->session->userdata('cliente'), $cve_contrato);


        $data['datos_buque'] = $datos_buque;
        $data['datos_bodegas'] = $datos_bodegas;
        $data['datos_destinos'] = $datos_destinos;

        $this->load->view('buques',$data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */