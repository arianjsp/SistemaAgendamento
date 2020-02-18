<?php

function traduzDadosTurma ()
{
    global $nivel_ensino, $serie, $nome_turma, $frase; // VARIÁVEIS GLOBAIS    

    if ($nivel_ensino == 1) // TRADUZ O CÓDIGO DA TURMA E SÉRIE NO TEXTO COMPREENSIVEL PARA O USUÁRIO.
    {
        if ($serie == 11)
        {
            $frase = "Educação Infantil - N1 - ";
        }
        elseif ($serie == 12)
        {
            $frase = "Educação Infantil - N2 - ";
        }
        else
        {
            $frase = "Educação Infantil - N3 - ";
        }
    }
    elseif ($nivel_ensino == 2)
    {
        if ($serie == 21)
        {
            $frase = "Ensino Fundamental - 1º ano - ";
        }
        elseif ($serie == 22)
        {
            $frase = "Ensino Fundamental - 2º ano - ";
        }
        elseif ($serie == 23)
        {
            $frase = "Ensino Fundamental - 3º ano - ";
        }
        elseif ($serie == 24)
        {
            $frase = "Ensino Fundamental - 4º ano - ";
        }
        elseif ($serie == 25)
        {
            $frase = "Ensino Fundamental - 5º ano - ";
        }
        elseif ($serie == 26)
        {
            $frase = "Ensino Fundamental - 6º ano - ";
        }
        elseif ($serie == 27)
        {
            $frase = "Ensino Fundamental - 7º ano - ";
        }
        elseif ($serie == 28)
        {
            $frase = "Ensino Fundamental - 8º ano - ";
        }
        else
        {
            $frase = "Ensino Fundamental - 9º ano - ";
        }
    }
    else
    {
        if ($serie == 31)
        {
            $frase = "Ensino Médio - 1º ano - ";
        }
        elseif ($serie == 32)
        {
            $frase = "Ensino Médio - 2º ano - ";
        }
        else
        {
            $frase = "Ensino Médio - 3º ano - ";
        }
    }    
}

?>