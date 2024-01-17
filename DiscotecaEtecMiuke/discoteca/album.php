<?php
include "topo.php";

if(isset($_POST["gravar"])) {
    $codigo = $_POST["codigo"];
    $titulo = $_POST["titulo"];
    $ano = $_POST["ano"];

    $uploadOk = 1;
    $extensao = substr($_FILES["foto"]["name"], strrpos($_FILES["foto"]["name"], '.') + 1);
    $arquivo_destino = "fotos_artistas/".substr($codigo, 0, 10)."_".date("YmdHis").".".$extensao;

    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $arquivo_destino)) {

        if($codigo==0) {
            $sql = "INSERT INTO tb03_album VALUES (null, ?, ?, ?, ?)";
            $comando = $banco->prepare($sql);
            $comando->execute(array($codigo, $titulo, $ano, $arquivo_destino));
        } else {
            $sql = "UPDATE tb03_album SET tb01_nome = ?, tb01_cod_genero = ?, tb01_foto = ? WHERE tb01_cod_artista = ?";
            $comando = $banco->prepare($sql);
            $comando->execute(array($nome, $artista, $arquivo_destino, $codigo));
        }

    } else {
        echo "Erro ao enviar o arquivo.";
    }

}
if(isset($_GET["acao"])) {
    if($_GET["acao"]=="excluir") {
        $cod = $_GET["cod"];

        $sql = "DELETE FROM tb03_album WHERE tb01_cod_artista = ?";
        $comando = $banco->prepare($sql);
        $comando->execute(array($cod));
    }
}

?>
<br>
<h2>Albums</h2>

<?php
    $codigo = 0;
    $artista = 0;
    $titulo = "";
    $ano = "";
    $foto = "";

    if(isset($_GET["cod"])) {
        $sql = "SELECT * FROM tb03_album WHERE tb03_cod_album = ?";
        $consulta = $banco->prepare($sql);
        $consulta->execute(array($_GET["cod"]));
        if($registro = $consulta->fetch()) {
            $codigo = $registro["tb03_cod_album"];
            $artista = $registro["tb03_cod_artista"];
            $titulo = $registro["tb03_titulo"];
            $ano = $registro["tb03_ano"];
            $foto = $registro["tb03_foto"];
        }   
    }
?>
<form action="album.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
    <div class="mb-3 col-4">
        <label for="titulo" class="form-label">Titulo</label>
        <input type="text" class="form-control" required id="titulo" name="titulo" value="<?php echo $titulo; ?>">
    </div>
    <div class="mb-3 col-4">
        <label for="artista" class="form-label">Artista</label>
        <select class="form-select" required id="artista" name="artista">
            
<?php
    $sql = "SELECT * FROM tb01_artista ORDER BY tb01_nome";
    $consulta = $banco->prepare($sql);
    $consulta->execute();
    while($registro = $consulta->fetch()) {
        echo "<option value=".$registro["tb01_cod_artista"].">".$registro["tb01_nome"]."</option>";
    }
?>
        </select>
    </div>
    <div class="mb-3 col-4">
        <label for="ano" class="form-label">Ano</label>
        <input type="text" class="form-control" required id="ano" name="ano" value="<?php echo $ano; ?>">
    </div>
    <div class="mb-3 col-4">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" required id="foto" name="foto" value="<?php echo $genero; ?>">
    </div>

    <input type="submit" class="btn btn-primary" name="gravar">
</form>
<br>
<?php
    $sql = "SELECT * from tb03_album
    LEFT JOIN tb01_artista ON (tb03_cod_artista = tb01_cod_artista)
    ORDER BY tb03_titulo";

    $consulta = $banco->query( $sql );
?>
<table class="table table-striped">
    <tr>
        <td>Foto</td>
        <td>Artista</td>
        <td>Titulo</td>
        <td>Ano</td>
        <td></td>
        <td></td>
    </tr>
<?php
while($registro = $consulta->fetch()) {
    echo "<tr>";
    echo "<td><img src='".$registro["tb03_foto"]."' class='img-thumbnail' width='80' height='80'></td>";
    echo "<td>".$registro["tb01_nome"]."</td>";
    echo "<td>".$registro["tb03_titulo"]."</td>";
    echo "<td>".$registro["tb03_ano"]."</td>";
    echo '<td><a href="album.php?cod='.$registro["tb03_cod_album"].'&acao=editar">Editar</a></td>';
    echo '<td><a href="album.php?cod='.$registro["tb03_cod_album"].'&acao=excluir">Excluir</a></td>';
    echo "</tr>";
}     
?>
</table>
<?php
include "rodape.php"
?>