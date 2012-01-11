<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Contratos_model extends CI_Model
{
    private $db_connection = null;

    public function __construct()
    {
        parent::__construct();
        $this->db_connection = new COM("ADODB.Connection");

        $db_connstr = "DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=". realpath("../databases/Tramitadora 2008.mde") ." ;DefaultDir=". realpath("../databases");
        $this->db_connection->open($db_connstr);
    }

    public function __destruct()
    {
        $this->db_connection->Close();
    }

    public function get_contratos_by_cliente($clave_cliente = '')
    {

        $Array_result = array();
        if($clave_cliente<>''){
            $rs = $this->db_connection->execute("SELECT * FROM CLIENTES WHERE CLAVE_CLIENTE = '$clave_cliente'");

            $rs_fld1 = $rs->Fields(1); #Clave del contrato del cliente

            while (!$rs->EOF) {
                $Array_result[] = $rs_fld1->value;
                $rs->MoveNext();
            }

            $rs->Close();
        }

        return $Array_result;
    }
}
//end of file Contratos_model