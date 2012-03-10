<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Muelles extends CI_Controller {

    private $data = null;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('ion_auth');
        $this->load->library('grocery_CRUD');

        if (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        }else{
            $this->load->library('session');
            #$this->load->library('salidas_lib');
            #$this->load->model(array('contratos_model','clientes_model','buques_model','bodegas_model','destinos_model'));
            $this->load->helper(array('url','form'));
        }


    }

    public function admin()
    {
        $crud = new grocery_CRUD();

        $crud->set_theme('datatables');
        $crud->set_table('muelles');

        $output = $crud->render();

        $this->load->view('template/header',$output);
        $this->load->view('admin/muelles',$output);
        $this->load->view('template/footer');
    }

    public function lista_muelles()
    {
        $this->load->model('muelles_model');

        $lst = $this->muelles_model->get_listado();

        $data['lst_muelles'] = $lst;


        $this->load->view('template/header');
        $this->load->view('muelles/lista_muelles', $data);
        $this->load->view('template/footer');


    }

    public function select()
    {
        $this->session->set_userdata('nombre_bd_access',$this->uri->segment(3));

        if (!$this->ion_auth->is_admin())
        {
            redirect('contratos');
        }
        else
        {
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            redirect('admin/grocery_usuarios');

        }
    }


}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */