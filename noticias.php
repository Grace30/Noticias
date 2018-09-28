<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Noticias</title>
    <link rel="stylesheet" href="estilosBoot.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body ng-app='myApp'>
    <header>El Sol de La Paz</header>

    <nav>
        <a href="#" >Deportes</a> &nbsp;
        <a href="#"  >Clima</a> &nbsp;
        <a href="#"  >Fotos</a>&nbsp;
        <a href="#"  >Videos</a>&nbsp;
    </nav>
    <hr>
    <section ng-controller='customerCtrl'>
        <article>
            <header>{{principal.Titulo}}</header>
            <h6>{{principal.Autor}} &nbsp; {{principal.Fecha}}</h6>
            <h4>{{principal.Copete}}</h4>
            <p>{{principal.Cuerpo}}</p>
        </article>
    </section>
    <aside ng-controller="customerCtrl2">
        <a ng-href="?idNoticia={{noticia.ID}}" ng-repeat="noticia in noticias">{{noticia.Titulo}}</a>
    </aside>
    <a href="#" id="js_up" class="boton-subir">
        <i class="fa fa-rocket" aria-hidden="true"></i>
    </a>
    <footer>
        <p>&copy; 2018 El Sol de La Paz. All rights reserved.</p>
    </footer>
</body>
</html>
<script> 
var idNoti = <?php echo isset($_GET['idNoticia']) ? $_GET['idNoticia'] : -1; ?> ;
console.log(idNoti);
var app = angular.module('myApp',[]);
app.controller('customerCtrl', function($scope,$http){
    $http.get("noticiasRegistros.php?idNoticia="+idNoti).then(function (response){
        $scope.principal = response.data;
    });
}).controller('customerCtrl2', function($scope,$http){
    $http.get("noticiasRegistros.php?noidNoticia="+idNoti).then(function (response){
        $scope.noticias = response.data;
    });
});





















$(window).scroll(function(){
  if($(this).scrollTop() > 300){ 
    $("#js_up").slideDown(300); 
  }else{ // si no
    $("#js_up").slideUp(300); 
  }
});

//creamos una función accediendo a la etiqueta i en su evento click
$("#js_up i").on('click', function (e) { 
  e.preventDefault(); 
  $("body,html").animate({ 
    scrollTop: 0 
  },700); 
  return false; 
});
</script>