<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property m_plano $m_plano
 * @property m_candidato_plano $m_candidato_plano
 */
class Plano extends CI_Controller {

    /**
     * Recupera todos os planos do banco de dados
     * @return boolean/array
     */
	public function selecionarPlanos() {

        $result = $this->m_plano->selecionarPlanos()->result_array();

        if ($result != NULL) {
            echo json_encode($result);
        } else {
            echo 0;
        }
    }
    
    /**
     * Atualiza o plano
     * @return boolean
     */
    public function validarPlano() {

        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        if ($request->id_candidato != "") $id_candidato = $request->id_candidato;
        else $id_candidato = 0;

        if ($request->validacao != "") $validacao = $request->validacao;
        else $validacao = null;
        if ($validacao != 1) $validacao = 0;

        $result = $this->m_candidato_plano->validarPlano($id_candidato,$validacao);

        echo $result;

    }

}
