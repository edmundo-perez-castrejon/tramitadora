<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function date_mdy($dmy)
{
    $date_split= explode('/', $dmy);
    return $date_split[1].'/'.$date_split[0].'/'.$date_split[2];
}

function make_array_result($rs){
    $Array_result = array();
    while (!$rs->EOF) {
        $Reg = array();
        foreach($rs->Fields as $field){
            $Reg[$field->name] = $field->value;
        }

        $rs->MoveNext();
        $Array_result[] = $Reg;
    }

    return $Array_result;
}