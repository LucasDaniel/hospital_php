<?php

class M_candidato_plano extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Atualiza o plano
     * @return boolean
     */
    public function validarPlano($id_candidato,$valido) {
    
        $dados = array(
          "valido" => $valido
        );
        
        $this->db->where('id_candidato', $id_candidato);

        if ($this->db->update("pdcase_candidato_plano", $dados)) {
            return 1;
        } else {
            return 0;
        }

    }

    /**
     * Salva o novo plano do candidato
     * @return boolean
     */
    public function salvaCandidatoPlano($id_candidato, $id_plano) {

        $dados = array(
            "id_plano" => $id_plano,
            "valido" => null
        );
        
        $this->db->where('id_candidato', $id_candidato);

        if ($this->db->update("pdcase_candidato_plano", $dados)) {
            return 1;
        } else {
            return 0;
        }

    }

    /**
     * Cria o candidato plano do id do candidato
     * @return boolean
     */
    public function criarCandidatoPlano($id_candidato, $id_plano) {

        $dados = array(
            "id_candidato" => $id_candidato,
            "id_plano" => $id_plano,
            "valido" => null
        );

        if ($this->db->insert("pdcase_candidato_plano", $dados)) {
            return 1;
        } else {
            return 0;
        }

    }

}
