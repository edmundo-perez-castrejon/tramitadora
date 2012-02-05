<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportes extends CI_Controller {

    private $data = null;

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
            $this->load->helper(array('dompdf', 'file'));
            $this->load->library('session');
            $this->load->library('salidas_lib');
            $this->load->model(array('contratos_model','clientes_model','buques_model','bodegas_model','destinos_model','salidas_model'));
            $this->load->helper(array('url','form'));

            $cve_contrato = $this->session->userdata('cve_contrato');
            $cve_cliente = $this->session->userdata('cve_cliente');

            $datos_bodegas = $this->bodegas_model->get_datos($cve_contrato);
            $datos_buque = $this->buques_model->get_datos($cve_contrato);
            $datos_destinos = $this->destinos_model->get_datos($cve_cliente, $cve_contrato);

            $this->data['datos_buque'] = $datos_buque;
            $this->data['datos_bodegas'] = $datos_bodegas;
            $this->data['cve_cliente'] = $cve_cliente;
            $this->data['cve_contrato'] = $cve_contrato;
            $this->data['datos_destinos'] = $datos_destinos;
        }

    }

    public function mov_por_bodega()
    {
        $html = $this->load->view('reportes/mov_por_bodega', $this->data, true);
        pdf_create($html, 'Movimientos_por_bodega_contrato'.$this->data['datos_buque']['CONTRATO']);
        #$this->load->view('reportes/mov_por_bodega', $data);
    }

    public function det_envios()
    {
        $this->data['title'] = 'DETALLE DE ENVIOS';


        $lst_salidas = array();
        foreach($this->data['datos_destinos'] as $destino){
            $lst_salidas[$destino['CLAVE_DESTINO']] = $this->salidas_model->get_datos($destino['CLAVE_DESTINO']);
        }

        $this->data['datos_salidas'] = $lst_salidas;

        #$data['peso_bruto_total'] = $this->salidas_lib->get_peso_total($this->cve_destino);

        $html = $this->load->view('reportes/det_envios', $this->data, true);
        pdf_create_landscape($html, 'Detalle_de_envios_contrato'.$this->data['datos_buque']['CONTRATO']);
        #$this->load->view('reportes/det_envios', $this->data);
    }

    public function det_destinos()
    {
        $this->data['title'] = 'DETALLE DE DESTINOS';

        $lst_salidas = array();
        foreach($this->data['datos_destinos'] as $destino){
            $lst_salidas[$destino['CLAVE_DESTINO']] = count($this->salidas_model->get_datos($destino['CLAVE_DESTINO']));
        }
        $this->data['datos_salidas'] = $lst_salidas;

        $html = $this->load->view('reportes/det_destinos', $this->data, true);
        pdf_create_landscape($html, 'Detalle_de_destinos_contrato'.$this->data['datos_buque']['CONTRATO']);
        #$this->load->view('reportes/det_destinos', $this->data);
    }


    public function det_transportes()
    {
        $this->data['title'] = 'DETALLE DE TRANSPORTES POR FECHA';

        $lst_salidas = array();
        foreach($this->data['datos_destinos'] as $destino){
            $lst_tmp = $this->salidas_model->get_datos($destino['CLAVE_DESTINO']);
            $lst_por_fecha = array();
            foreach($lst_tmp as $elemento){
                $lst_por_fecha[(string)$elemento['FECHA']][] = $elemento;
            }

            $lst_salidas[$destino['CLAVE_DESTINO']] = $lst_por_fecha;
        }
        $this->data['datos_salidas'] = $lst_salidas;

        $html = $this->load->view('reportes/det_transportes', $this->data, true);
        pdf_create($html, 'Detalle_de_destinos_contrato'.$this->data['datos_buque']['CONTRATO']);
        #$this->load->view('reportes/det_transportes', $this->data);
    }

    public function under_construction()
    {
        $data = array();
        $html = $this->load->view('reportes/under_construction', $data, true);
        pdf_create($html, 'nodisponible');
    }
}