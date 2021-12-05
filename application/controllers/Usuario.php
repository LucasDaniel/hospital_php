<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property m_usuario $m_usuario
 */
class Usuario extends CI_Controller {

    /**
     * Faz o login no sistema
     * @return boolean/array
     */
	public function logar() {

        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        if ($request->login != "") $login = $request->login;
        else $login = "xxx";

        if ($request->senha != "") $senha = $request->senha;
        else $senha = "xxx";
        $senha = md5($senha);

        $result = $this->m_usuario->logar($login,$senha)->result()[0];

        if ($result != NULL) {
            echo json_encode($result);
        } else {
            echo 0;
        }
	}

}
