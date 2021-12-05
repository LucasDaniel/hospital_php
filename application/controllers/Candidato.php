<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property m_candidato $m_candidato
 * @property m_candidato_plano $m_candidato_plano
 */
class Candidato extends CI_Controller {

    /**
     * Recupera todos os planos do banco de dados
     * @return boolean/array
     */
	public function selecionarCandidatos() {

        $result['candidatos'] = $this->m_candidato->selecionarCandidatos()->result();

        if ($result != NULL) {
            echo json_encode($result);
        } else {
            echo 0;
        }
    }
    
    /**
     * Salva o candidato com seu novo plano
     * @return boolean
     */
    public function salvarCandidatoPlano() {

        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        if ($request->id != "") $id = $request->id;
        else $id = 0;
        if ($request->id_plano != "") $id_plano = $request->id_plano;
        else $id_plano = 0;

        $return = $this->m_candidato_plano->salvaCandidatoPlano($id,$id_plano);

        echo $return;

    }

    /**
     * Cria um novo candidato
     * @return boolean
     */
    public function cadastrarCandidato() {

        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        if ($request->nome != "") $nome = $request->nome;
        else $nome = "";
        if ($request->idade != "") $idade = $request->idade;
        else $idade = "";
        if ($request->cpf != "") $cpf = $request->cpf;
        else $cpf = "";
        if ($request->endereco != "") $endereco = $request->endereco;
        else $endereco = "";
        if ($request->id_plano != "") $id_plano = $request->id_plano;
        else $id_plano = 0;

        $id = $this->m_candidato->cadastrarCandidato($nome,$idade,$cpf,$endereco,$id_plano);
        
        if ($id) {
            $result = $this->m_candidato_plano->criarCandidatoPlano($id,$id_plano);
            return $result;
        } else {
            echo 0;
        }
    
    }

}
