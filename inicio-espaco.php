<div class="fluid-container" id="">
    <div id="" class="text-center" style="color:#fff">
        <div id="ceu" class="img_fundo" style="padding-bottom: 15%; padding-top: 7%">
            <?php
                if(isset($_SESSION['msg']))
                {                    
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>
            <img src="img/antares2.png" class="img-fluid overlay logo wow zoomIn" alt="" data-wow-delay="0.2s" style="margin-top: 4%">
            <h1 style="padding-top: 1.5%" class="wow slideInLeft" data-wow-delay="0.3s"><span class="color"> Observatório Astronômico Antares </span> </h1>            
            <p class="lead wow slideInUp" style="padding-top: 1.5%" data-wow-delay="0.2s">
                <strong>Universidade Estadual de Feira de Santana  - UEFS</strong>
                <br>
                <strong>Departamento de Física - DFIS</strong>
            </p>
            <h3 style="padding-top: 1.5%" class=" wow slideInRight" data-wow-delay="0.5s">Contribuindo para o desenvolvimento, formação acadêmica e científica dos jovens baianos</h3>
            <h4 class="wow slideInUp" style="font-size: 1.5rem;">&darr;</h4>            
        </div>
    </div>
</div>    
