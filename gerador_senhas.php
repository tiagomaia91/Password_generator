<?php

function gerarSenha($tamanho = 8, $maiusculas = true, $minusculas = true, $numeros = true, $simbolos = false)
{
    $ma = "ABCDEFEGPZ";
    $mi = "qiuvwxyz";
    $nu = "0123456789";
    $si = "!@#$%&*()_+=";
    $senha = '';
    $caracteres = '';

    // define os caracteres que serão utilizados na senha
    $caracteres .= $maiusculas ? $ma : '';
    $caracteres .= $minusculas ? $mi : '';
    $caracteres .= $numeros ? $nu : '';
    $caracteres .= $simbolos ? $si : '';

    // gera um array com os caracteres definidos
    $caracteres = str_split($caracteres);

    // gera a senha aleatória
    for ($i = 0; $i < $tamanho; $i++) {
        $senha .= $caracteres[array_rand($caracteres)];
    }

    return $senha;
}
