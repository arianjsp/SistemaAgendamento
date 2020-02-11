
<!-- Modal -->
<div class="modal fade" id="modal-acesso" tabindex="-1" role="dialog" aria-labelledby="modal-acesso" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-acesso"> Área Restrita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
        <div>
          <img src="img/antares_modal.png" alt="icone" class="icone_antares" style="margin-top: -5px;">
        </div>
        <form class="form-signin" method="POST" action="access/checar.php">
          <div class="form-group">    
            <label for="email"> Usuário: </label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Digite o E-mail" required autofocus>              
          </div>
          <div class="form-group">
            <label for="senha"> Senha: </label>
            <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite a Senha">
          </div>
          <div class="text-center">
            <button class="btn btn-secondary" type="button"  data-dismiss="modal"> Cancelar </button>        
            <button class="btn btn-success" type="submit" > Entrar </button>              
          </div>
        </form>        
      </div>                           
    </div>
  </div>
</div>

<div class="modal fade" id="modal-cadastro-escola" tabindex="-1" role="dialog" aria-labelledby="modal-cadastro-escola" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-cadastro-escola"> Cadastre sua Instituição de Ensino</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">        
        <form method="POST" action="escola/proc-cad-escola.php">
          <div class="form-group">    
            <label for="nome"> Nome: </label>
            <input type="text" class="form-control" name="nome" id="nome" aria-describedby="emailHelp" placeholder="Digite o nome da Instituição" required autofocus>              
          </div>          
          <div class="form-group">    
            <label for="email"> E-mail: </label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Digite o E-mail">              
          </div>
          <div class="form-group">
            <label for="senha"> Senha: </label>
            <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite a Senha">
          </div>
          <div class="form-group">
            <label for="fone"> Telefone: </label>
            <input type="text" class="form-control" name="fone" id="fone" placeholder="Digite o Telefone">
          </div>
          <h6 align="center">E N D E R E Ç O : </h6>
          <div class="form-group">
            <label for="cep"> CEP: </label>
            <input type="text" class="form-control" name="cep" id="cep" placeholder="Digite o CEP">
          </div>
          <div class="form-group">
            <label for="rua"> Rua/Avenida/Caminho: </label>
            <input type="text" class="form-control" name="rua" id="rua" placeholder="Digite a Rua/Avenida/Caminho">
          </div>
          <div class="form-group">
            <label for="numero"> Número: </label>
            <input type="text" class="form-control" name="numero" id="numero" placeholder="Digite o Número da casa / prédio">
          </div>
          <div class="form-group">
            <label for="bairro"> Bairro/Conjunto: </label>
            <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Digite o Bairro/Conjunto">
          </div>
          <div class="form-group">
            <label for="complemento"> Complemento: </label>
            <input type="text" class="form-control" name="complemento" id="complemento" placeholder="Digite o Complemento">
          </div>
          <div class="form-group">
            <label for="ponto_referencia"> Ponto de Referência: </label>
            <input type="text" class="form-control" name="ponto_referencia" id="ponto_referencia" placeholder="Digite o Ponto de Referência">
          </div>
          <div class="form-group">
            <label for="cidade"> Cidade: </label>
            <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Digite a Cidade">
          </div>
          <div class="form-group">
            <label for="estado"> Estado / UF: </label>
            <input type="text" class="form-control" name="estado" id="estado" placeholder="Digite o Estado / UF">
          </div>
          <div class="form-group">
            <label for="pais"> País: </label>
            <input type="text" class="form-control" name="pais" id="pais" placeholder="Digite o País">
          </div>
          <div class="text-center">
            <button class="btn btn-secondary" type="button"  data-dismiss="modal"> Cancelar </button>        
            <button class="btn btn-primary" type="submit" > Cadastrar </button>              
          </div>
        </form>        
      </div>                           
    </div>
  </div>
</div>