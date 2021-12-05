<?php

class M_plano extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Recupera todos os planos no banco de dados
     * @return CI_DB_result
     */
    public function selecionarPlanos() {
    
        return $this->db->get('pdcase_plano');

    }

}
