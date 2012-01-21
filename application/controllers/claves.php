<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Claves extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('ion_auth');
        $this->load->library('grocery_CRUD');
        $this->load->library('claves_lib');

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

    public function claves_usuarios()
    {
        $this->claves_lib->sincroniza();

        $crud = new grocery_CRUD();

        $crud->unset_columns('id');
        $output = $crud->render();
        $this->load->view('admin/listado_claves', $output);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */