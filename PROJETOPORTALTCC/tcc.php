<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="tcc.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <?php if(isset($_GET["tcc"])) { ?>
        <div class="row">
            <div class="col-2">
                <img src="centro-paula-souza-logo.svg" height="80px">
            </div>
            <div class="col-8">
                <h3 id="titulo"></h3>
                <p id="autores"></p>
                <p id="orientadores"></p>
            </div>
            <div class="col-2">
                <img src="etec.png" height="80px">
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                PROBLEMA
                OBJETIVO GERAL/ ESPECÍFICOS
                JUSTIFICATIVA
            </div>
            <div class="col-6">
                HIPÓTESE (S)
                METODOLOGIA
                REFERÊNCIAS BIBLIOGRÁFICAS
            </div>
        </div>
        <script>
        var titulo = document.getElementById("titulo")

        <?php
        echo "var arquivojson = '2023/".$_GET["tcc"]."'";
        ?>
        
        fetch(arquivojson)
            .then(resposta => resposta.json())
            .then(dados => {
                titulo.innerHTML = dados.titulo
            })        
        </script>
        <?php } ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>    
</body>
</html>