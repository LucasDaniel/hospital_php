<?php

class M_usuario extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Recupera o registro de login do usuario
     * @return CI_DB_result
     */
    public function logar($login,$senha) {

        $this->db->like('login', $login);
        $this->db->like('senha', $senha);

        return $this->db->get('pdcase_usuario');
    }

}
