<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

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

    /*public function lista_usuarios()
    {
        //list the users
        $this->data['message']=$this->session->flashdata('message');
        $this->data['users'] = $this->ion_auth->users()->result();
        foreach ($this->data['users'] as $k => $user)
        {
            $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
        }


        $this->load->view('auth/index', $this->data);
    }*/

    public function grocery_usuarios()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('users');
        $crud->set_relation_n_n('claves','claves_users','claves','id','id_clave','clave');


        $crud->columns('username','email','active','first_name','last_name','claves');

        $crud->fields('username','password','email','active','first_name','last_name','claves');

        $crud->change_field_type('password','password');

        $crud->display_as('username','Nombre de usuario')
            ->display_as('email','Correo Electronico')
            ->display_as('first_name','Nombre')
            ->display_as('last_name','Apellidos');

        $output = $crud->render();
        $this->load->view('admin/listado_usuarios',$output);
    }


}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */