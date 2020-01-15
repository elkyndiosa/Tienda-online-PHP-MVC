<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Tienda</title>
        <link rel="stylesheet" href="assets/css/style2.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <header>
                <div class="bg-light p-3">
                    <a href="#"><img src="assets/img/camiseta.png" alt="" width="120"></a>
                    <a href="#" class="title ml-4 mt-1 ">Tieda Textil Store</a>
                </div>
                <nav class="navbar navbar-expand-sm bg-light navbar-light border-top">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-start mr-4" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Inicio </a>
                            </li> 
                            <li class="nav-item">
                                <a class="nav-link" href="#">Categoria 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Categoria 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Categoria 3</a>
                            </li> 

                            <li class="nav-item">
                                <a class="nav-link" href="#">Categoria 4</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <div class="d-flex ">

                <aside class="w-25 bg-light mt-3 p-3 shadow" >
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" placeholder="Ingrese email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" placeholder="Ingrese password" id="password">
                        </div>
                        <div class="form-group form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox"> Remember me
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Entrar</button>
                    </form>
                    <a href="#" class="btn text-success w-100 mt-5">Ver pedidos</a>
                    <a href="#" class="btn text-success w-100">Historial de pedidos</a>
                    <a href="#" class="btn text-success w-100">Perfil</a>

                </aside>
                <div class="w-75 bg-light mt-3 p-3 pl-4 border-left shadow">
                    <div class="row d-flex justify-content-around text-center">
                        <div class="card col-4 p-3 bg-light border-light" >
                            <img src="assets/img/camiseta.png" class="card-img-top w-50 p-3 mx-auto" alt="">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">100$</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <a href="#" class="btn btn-success">Comprar</a>
                        </div>
                        <div class="card col-4 p-3 bg-light border-light" >
                            <img src="assets/img/camiseta.png" class="card-img-top w-50 p-3 mx-auto" alt="">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">100$</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <a href="#" class="btn btn-success">Comprar</a>
                        </div>
                        <div class="card col-4 p-3 bg-light border-light" >
                            <img src="assets/img/camiseta.png" class="card-img-top w-50 p-3 mx-auto" alt="">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">100$</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <a href="#" class="btn btn-success">Comprar</a>
                        </div>
                        <div class="card col-4 p-3 bg-light border-light" >
                            <img src="assets/img/camiseta.png" class="card-img-top w-50 p-3 mx-auto" alt="">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">100$</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <a href="#" class="btn btn-success">Comprar</a>
                        </div>
                        <div class="card col-4 p-3 bg-light border-light" >
                            <img src="assets/img/camiseta.png" class="card-img-top w-50 p-3 mx-auto" alt="">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">100$</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <a href="#" class="btn btn-success">Comprar</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="text-center bg-light py-2 border-top">
                <p class="mb-0">Desarrollado por Gustavo Diosa &COPY; <?= date('Y') ?></p>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>