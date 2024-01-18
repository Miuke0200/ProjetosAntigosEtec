<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php

        $tcc = [];

        $iter = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('./2023MKTA/'));
        foreach ($iter as $file) {
            if ($file->getFilename() == '.') {

                $itens = new DirectoryIterator($file->getPath());
                foreach ($itens as $item) {
                    if ($item->getExtension() == "json") {
                        $grupo = json_decode(file_get_contents($file->getPath() . "/" . $item->getFilename()));

                        $foto = "";
                        $video = "";
                        $pasta_grupo = $file->getPath(); //."/".str_replace(".json","",$item->getBasename())."/";
                        $itensgrupo = new DirectoryIterator($pasta_grupo);
                        foreach ($itensgrupo as $itemgrupo) {
                            if (in_array($itemgrupo->getExtension(), ["jpg", "jpeg", "gif", "png"])) {
                                $foto = $pasta_grupo . "/" . $itemgrupo->getFilename();
                            } elseif ($itemgrupo->getExtension() == "mp4") {
                                $video = $pasta_grupo . "/" . $itemgrupo->getFilename();
                            }

                        }
                        array_push(
                            $tcc,
                            array(
                                "titulo" => $grupo->titulo,
                                "curso" => $grupo->curso,
                                "turma" => $grupo->turma,
                                "arquivo" => str_replace("\\", "/", $pasta_grupo . "/" . $item->getFilename()),
                                "foto" => $foto,
                                "video" => $video
                            )
                        );
                    }
                }

            }
        }


        array_multisort(array_column($tcc, 'curso'), SORT_ASC, $tcc);

        echo "<table class='table table-condensed table-hover'>";
        foreach ($tcc as $item) {
            echo "<tr><td><img src='" . $item["foto"] . "' width='300' height='180></td><td><video src='" . $item["video"] . "' width='300' controls></td><td>" . $item["curso"] . "</td><td>" . $item["turma"] . "</td><td><a href='tcc.php?tcc=" . $item["arquivo"] . "'>" . $item["titulo"] . "</a></td></tr>";
        }
        echo "</table>";
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>
</body>

</html>