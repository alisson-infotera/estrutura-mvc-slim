<?php

/**
 * Método responsável por exibir o conteúdo recebido por parâmetro formatado
 * @param  mixed $params
 * @param  bool $die true se deseja encerrar a aplicação e false para o contrário
 * @return void
 */
function pre($params = [], $die = true) {
    echo '<pre>';
    print_r($params);
    echo '</pre>';

    if ($die) die();
}

/**
 * Método responsável por retornar o número de telefone formatado
 * @param  string $phone
 * @return string
 */
function formatPhone($phone) {
    $formatedPhone = preg_replace('/[^0-9]/', '', $phone);
    $matches = [];
    preg_match('/^([0-9]{2})([0-9]{4,5})([0-9]{4})$/', $formatedPhone, $matches);
    if ($matches) {
        return "({$matches[1]}) {$matches[2]}-{$matches[3]}";
    }

    return $phone;
}