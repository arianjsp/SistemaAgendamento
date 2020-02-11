<div class="container" id="contato" style="padding-top: 4%; padding-bottom: 2%">
    <div class="row " id="">
        <div class="col-md-6 wow fadeInUp" data-wow-delay="0.5s">
            <h3 class="topico ">CONTATO</h3>
            <br>
            <div class="row ">
                <div class="col-md-1">
                    <i class="fas fa-map-marker-alt fa-2x "></i>
                </div>
                <div class="col-md-10">
                    <h4 class="contato">ENDEREÇO:</h4>
                </div>
            </div>
            <p class="ml-4 info_contato cinza">R. Barra, 925 - Jardim Cruzeiro,<br> Feira de Santana - BA, 44015-430</p>
            <div class="row ">
                <div class="col-md-1">
                    <i class="fas fa-phone fa-2x"></i>
                </div>
                <div class="col-md-10">
                    <h4 class="contato">TELEFONE:</h4>
                </div>
            </div>
            <p class="ml-4 info_contato cinza ">(75) 3624-1921</p>
            <div class="row ">
                <div class="col-md-1">
                    <i class="fas fa-envelope fa-2x"></i>
                </div>
                <div class="col-md-10">
                    <h4 class="contato">EMAIL:</h4>
                </div>
            </div>
            <p class="cinza"></p>
        </div>
        <div class="col-md-6">
            <form method="post" action="#">
                <div class="row wow slideInRight" data-wow-delay="0.2s">
                    <label for="nome" class="form_contato">Nome Completo:</label>
                    <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite seu nome" value="<?php if (isset($_SESSION['nome'])){ echo $_SESSION['nome']; } ?>" required="">
                    <label for="email" class="form_contato" style="margin-top: 1%">E-mail:</label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Digite seu e-mail" value="<?php if (isset($_SESSION['email'])){ echo $_SESSION['email']; } ?>" required="">
                    <label for="assunto" class="form_contato" style="margin-top: 1%">Assunto:</label>
                    <input type="text" id="assunto" name="assunto" class="form-control" placeholder="Digite o assunto " required="">
                    <label for="mensagem" class="form_contato" style="margin-top: 1%">Mensagem:</label>
                    <textarea name="mensagem" id="mensagem" class="lg-textarea form-control form_contato" rows="6" required=""></textarea>
                    <button type="submit" class="btn btn-block btn_mensagem ">ENVIAR MENSAGEM</button>
                </div>
            </form>
        </div>
    </div>
</div>