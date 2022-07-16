<?php encabezado() ?>

<!-- Sidebar Navigation end-->
<div id="body" class="page-content bg-light pt-20">
    <section>
    <div class="page-header orange">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Panel de Administración</h2>
        </div>
    </div>
    <div class="no-padding-bottom contenedort">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class=" w-100" src="../Assets/img/categorias/computadoras.jpg" alt="First slide">                    
                </div>
                <div class="carousel-item">
                    <img class="w-100"   src="../Assets/img/categorias/computadoras.jpg" alt="Second slide">
                </div>                
                
                <div class="carousel-item">
                    <img class=" w-100" src="../Assets/img/categorias/computadoras.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    </section>

    <script>
        window.addEventListener("load", function () {
            reportes();
            reportesTorta();
        })
    </script>
</div>
<?php pie() ?>