<?php

$escola = $_SESSION['usuarioId'];

$query = "SELECT id, nivel, serie, nome_turma FROM turmas WHERE escola='$escola'";//PESQUISA TODAS AS TURMAS QUE A ESCOLA TEM CADASTRADA
$result_query = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result_query))
{
    $nivel_ensino = $row['nivel'];
    $serie = $row['serie'];
    $nome_turma = $row['nome_turma'];

    if ($nivel_ensino == 1) // TRADUZ O CÓDIGO DA TURMA E SÉRIE NO TEXTO COMPREENSIVEL PARA O USUÁRIO.
    {
        if ($serie == 11)
        {
?>
            <option value="<?php echo $row['id']; ?>"><?php echo "Educação Infantil - N1 - " . $row['nome_turma']; ?></option>
<?php       //TENTAR DESCOBRIR DEPOIS PORQUE SE TIRAR O ECHO DE VALUE ELE DEIXA DE FUNCIONAR
        }
        elseif ($serie == 12)
        {
?>
            <option value="<?php echo $row['id']; ?>"><?php echo "Educação Infantil - N2 - " . $row['nome_turma']; ?></option>
<?php       //TENTAR DESCOBRIR DEPOIS PORQUE SE TIRAR O ECHO DE VALUE ELE DEIXA DE FUNCIONAR        
        }
        else
        {
?>
            <option value="<?php echo $row['id']; ?>"><?php echo "Educação Infantil - N3 - " . $row['nome_turma']; ?></option>
<?php       //TENTAR DESCOBRIR DEPOIS PORQUE SE TIRAR O ECHO DE VALUE ELE DEIXA DE FUNCIONAR
        }
    }
    elseif ($nivel_ensino == 2)
    {
        if ($serie == 21)
        {
?>
            <option value="<?php echo $row['id']; ?>"><?php echo "Ensino Fundamental - 1º ano - " . $row['nome_turma']; ?></option>
<?php       //TENTAR DESCOBRIR DEPOIS PORQUE SE TIRAR O ECHO DE VALUE ELE DEIXA DE FUNCIONAR
        }
        elseif ($serie == 22)
        {
?>
            <option value="<?php echo $row['id']; ?>"><?php echo "Ensino Fundamental - 2º ano - " . $row['nome_turma']; ?></option>
<?php       //TENTAR DESCOBRIR DEPOIS PORQUE SE TIRAR O ECHO DE VALUE ELE DEIXA DE FUNCIONAR
        }
        elseif ($serie == 23)
        {
?>
            <option value="<?php echo $row['id']; ?>"><?php echo "Ensino Fundamental - 3º ano - " . $row['nome_turma']; ?></option>
<?php       //TENTAR DESCOBRIR DEPOIS PORQUE SE TIRAR O ECHO DE VALUE ELE DEIXA DE FUNCIONAR
        }
        elseif ($serie == 24)
        {
?>
            <option value="<?php echo $row['id']; ?>"><?php echo "Ensino Fundamental - 4º ano - " . $row['nome_turma']; ?></option>
<?php       //TENTAR DESCOBRIR DEPOIS PORQUE SE TIRAR O ECHO DE VALUE ELE DEIXA DE FUNCIONAR
        }
        elseif ($serie == 25)
        {
?>
            <option value="<?php echo $row['id']; ?>"><?php echo "Ensino Fundamental - 5º ano - " . $row['nome_turma']; ?></option>
<?php       //TENTAR DESCOBRIR DEPOIS PORQUE SE TIRAR O ECHO DE VALUE ELE DEIXA DE FUNCIONAR
        }
        elseif ($serie == 26)
        {
?>
            <option value="<?php echo $row['id']; ?>"><?php echo "Ensino Fundamental - 6º ano - " . $row['nome_turma']; ?></option>
<?php       //TENTAR DESCOBRIR DEPOIS PORQUE SE TIRAR O ECHO DE VALUE ELE DEIXA DE FUNCIONAR
        }
        elseif ($serie == 27)
        {
?>
            <option value="<?php echo $row['id']; ?>"><?php echo "Ensino Fundamental - 7º ano - " . $row['nome_turma']; ?></option>
<?php       //TENTAR DESCOBRIR DEPOIS PORQUE SE TIRAR O ECHO DE VALUE ELE DEIXA DE FUNCIONAR
        }
        elseif ($serie == 28)
        {
?>
            <option value="<?php echo $row['id']; ?>"><?php echo "Ensino Fundamental - 8º ano - " . $row['nome_turma']; ?></option>
<?php       //TENTAR DESCOBRIR DEPOIS PORQUE SE TIRAR O ECHO DE VALUE ELE DEIXA DE FUNCIONAR
        }
        else
        {
?>
            <option value="<?php echo $row['id']; ?>"><?php echo "Ensino Fundamental - 9º ano - " . $row['nome_turma']; ?></option>
<?php       //TENTAR DESCOBRIR DEPOIS PORQUE SE TIRAR O ECHO DE VALUE ELE DEIXA DE FUNCIONAR
        }
    }
    else
    {
        if ($serie == 31)
        {
?>
            <option value="<?php echo $row['id']; ?>"><?php echo "Ensino Médio - 1º ano - " . $row['nome_turma']; ?></option>
<?php       //TENTAR DESCOBRIR DEPOIS PORQUE SE TIRAR O ECHO DE VALUE ELE DEIXA DE FUNCIONAR
        }
        elseif ($serie == 32)
        {
?>
            <option value="<?php echo $row['id']; ?>"><?php echo "Ensino Médio - 2º ano - " . $row['nome_turma']; ?></option>
<?php       //TENTAR DESCOBRIR DEPOIS PORQUE SE TIRAR O ECHO DE VALUE ELE DEIXA DE FUNCIONAR
        }
        else
        {            
?>
            <option value="<?php echo $row['id']; ?>"><?php echo "Ensino Médio - 3º ano - " . $row['nome_turma']; ?></option>
<?php       //TENTAR DESCOBRIR DEPOIS PORQUE SE TIRAR O ECHO DE VALUE ELE DEIXA DE FUNCIONAR
        }
    }    
}

?>