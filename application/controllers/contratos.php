<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contratos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('ion_auth');

        if (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        }else{
            $this->load->library('session');
            $this->load->library('salidas_lib');
            $this->load->model(array('contratos_model','clientes_model','buques_model','bodegas_model','destinos_model'));
            $this->load->helper(array('url','form'));
        }
    }

	public function index()
	{
        $cve_cliente = $this->input->post('cve_cliente');

        if($cve_cliente == null){
            $cve_cliente = 'A-01';
        }
        #obtener los datos del cliente

        $data_cliente = $this->clientes_model->get_datos($cve_cliente);

        $this->load->view('frm_cambiacliente');
        if(count($data_cliente)>0){
            $this->session->set_userdata('cliente' , $cve_cliente);
            $data['nombre_cliente'] = $data_cliente['NOMBRE_CLIENTE'];
            $data['lst_contratos'] = $this->contratos_model->get_contratos_by_cliente($this->session->userdata('cliente'));

            $this->load->view('contratos',$data);
        }else{
            echo 'Ese cliente no es valido';
        }

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