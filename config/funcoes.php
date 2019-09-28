<?php
    function Data( $data ) {
            //receber 10/02/2019 -> 2019-02-10
            $data = explode("/", $data);

            //[0] - dia, [1] - mes, [2] - ano

            //verificar se não for válido
            if ( !checkdate($data[1], $data[0], $data[2]) ) {
                echo "<script>alert('Data Inválida');history.back();</script>";
                exit;
            }

            //montar a data com -
            $data = $data[2]."-".$data[1]."-".$data[0];

            return $data;
        }

        function validaCPF($cpf) {
	 
            // Extrai somente os números
            $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
             
            // Verifica se foi informado todos os digitos corretamente
            if (strlen($cpf) != 11) {
                return "O CPF precisa ter ao menos 11 números";
            }
            // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
            if (preg_match('/(\d)\1{10}/', $cpf)) {
                return "CPF inválido";
            }
            // Faz o calculo para validar o CPF
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return "CPF inválido";
                }
            }
            return true;
           
           }