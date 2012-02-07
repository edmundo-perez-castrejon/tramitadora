<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contratos extends CI_Controller {

    private $user = null;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('ion_auth');
        $this->load->library('grocery_crud');

        if (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        }else{
            $this->load->library('session');
            $this->load->library('salidas_lib');
            $this->load->model(array('contratos_model','clientes_model','buques_model','bodegas_model','destinos_model','empresas_model'));
            $this->load->helper(array('url','form'));

            $this->user = $this->ion_auth->user()->row();

            if($datos_empresa = $this->empresas_model->get_datos_empresa($this->user->id_empresa))
            {
                $this->session->set_userdata('nombre_empresa', $datos_empresa->nombre);
                $this->session->set_userdata('imagen_empresa', base_url().'images/empresas/'.$datos_empresa->imagen);
            }
        }
    }

	public function index()
	{
        $user_id = $this->session->userData('user_id');

        #obtener los datos del cliente
        $cves_cliente = $this->clientes_model->get_claves($user_id);

        $cve_cliente = $cves_cliente[0];

        $data_cliente = $this->clientes_model->get_datos($cve_cliente);



        if(count($data_cliente)>0){

            $data['nombre_cliente'] = $this->user->first_name.' '.$this->user->last_name;

            $lst_contratos = array();
            foreach($cves_cliente as $cve_cliente)
            {
                $lst_contratos[] = $this->contratos_model->get_contratos_by_cliente($cve_cliente);
            }
            $data['lst_contratos'] = $lst_contratos;

            $this->load->view('template/header');
            $this->load->view('contratos',$data);
            $this->load->view('template/footer');
        }else{
            echo 'Ese cliente no es valido';
        }

	}

    public function get_datos()
    {

        if($cve_contrato = $this->uri->segment(3))
        {
            $this->session->set_userdata('cve_contrato',$cve_contrato);
        }else{
            $cve_contrato = $this->session->userdata('cve_contrato');
        }

        if($cve_cliente = $this->uri->segment(4))
        {
            $this->session->set_userdata('cve_cliente',$cve_cliente);
        }else{
            $cve_cliente = $this->session->userdata('cve_cliente');
        }

        $imagen_buque = $this->contratos_model->get_imagen_contrato($cve_contrato);

        if($imagen_buque)
        {
            $data['imagen_buque'] = base_url().'images/contratos/'.$imagen_buque->imagen;
        }

        $datos_buque = $this->buques_model->get_datos($cve_contrato);
        $datos_bodegas = $this->bodegas_model->get_datos($cve_contrato);

        $data['datos_buque'] = $datos_buque;
        $data['datos_bodegas'] = $datos_bodegas;

        $data['cve_cliente'] = $cve_cliente;
        $data['cve_contrato'] = $cve_contrato;


        $this->load->view('template/header');
        $this->load->view('buques',$data);
        $this->load->view('template/footer');
    }

    public function get_destinos()
    {
        $cve_contrato = $this->session->userdata('cve_contrato');
        $cve_cliente = $this->session->userdata('cve_cliente');

        $datos_buque = $this->buques_model->get_datos($cve_contrato);

        $datos_destinos = $this->destinos_model->get_datos($cve_cliente, $cve_contrato);

        $data['datos_destinos'] = $datos_destinos;
        $data['datos_buque'] = $datos_buque;

        $this->load->view('template/header');
        $this->load->view('destinos',$data);
        $this->load->view('template/footer');
    }



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */