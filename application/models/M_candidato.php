<?php

class M_candidato extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Seleciona os candidatos com seus planos do banco de dados
     * @return CI_DB_result
     */
    public function selecionarCandidatos() {

        $this->db->select('c.id as id, c.nome, c.idade, c.cpf, c.endereco, p.id as idPlano, p.nome as planoNome, p.valor, cp.valido');
        $this->db->from('pdcase_candidato c');
        $this->db->join('pdcase_candidato_plano cp', 'cp.id_candidato = c.id', 'left');
        $this->db->join('pdcase_plano p', 'p.id = cp.id_plano', 'left');

        return $this->db->get();
    }

    /**
     * Cria um novo candidato
     * @return int(id do candidato/0)
     */
    public function cadastrarCandidato($nome,$idade,$cpf,$endereco) {

        $dados = array(
            "nome" => $nome,
            "idade" => $idade,
            "cpf" => $cpf,
            "endereco" => $endereco
        );

        if ($this->db->insert("pdcase_candidato", $dados)) {
            return $this->db->insert_id();
        } else {
            return 0;
        }

    }

}
