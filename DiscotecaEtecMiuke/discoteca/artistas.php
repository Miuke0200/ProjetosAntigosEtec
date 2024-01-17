<?php
include "topo.php";

if(isset($_POST["gravar"])) {
    $codigo = $_POST["codigo"];
    $nome = $_POST["nome"];
    $genero = $_POST["genero"];

    $uploadOk = 1;
    $extensao = substr($_FILES["foto"]["name"], strrpos($_FILES["foto"]["name"], '.') + 1);
    $arquivo_destino = "fotos_artistas/".substr($nome, 0, 10)."_".date("YmdHis").".".$extensao; 

    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $arquivo_destino)) {

        if($codigo==0) {
            $sql = "INSERT INTO tb01_artista VALUES (null, ?, ?, ?)";
            $comando = $banco->prepare($sql);
            $comando->execute(array($nome, $genero, $arquivo_destino));
        } else {
            $sql = "UPDATE tb01_artista SET tb01_nome = ?, tb01_cod_genero = ?, tb01_foto = ? WHERE tb01_cod_artista = ?";
            $comando = $banco->prepare($sql);
            $comando->execute(array($nome, $genero, $arquivo_destino, $codigo));
        }

    } else {
        echo "Erro ao enviar o arquivo.";
    }

}
if(isset($_GET["acao"])) {
    if($_GET["acao"]=="excluir") {
        $cod = $_GET["cod"];

        $sql = "DELETE FROM tb01_artista WHERE tb01_cod_artista = ?";
        $comando = $banco->prepare($sql);
        $comando->execute(array($cod));
    }
}

?>
<br>
<h2>Artistas</h2>

<?php
    $codigo = 0;
    $nome = "";
    $genero = "";
    $foto = "";

    if(isset($_GET["cod"])) {
        $sql = "SELECT * FROM tb01_artista WHERE tb01_cod_artista = ?";
        $consulta = $banco->prepare($sql);
        $consulta->execute(array($_GET["cod"]));
        if($registro = $consulta->fetch()) {
            $codigo = $registro["tb01_cod_artista"];
            $nome = $registro["tb01_nome"];
            $genero = $registro["tb01_cod_genero"];
            $foto = $registro["tb01_foto"];
        }   
    }
?>
<form action="artistas.php" method="post">
    <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
    <div class="mb-3 col-4">
        <label for="nome" class="form-label">Artista</label>
        <input type="text" class="form-control" required id="nome" name="nome" value="<?php echo $nome; ?>">
    </div>
    <div class="mb-3 col-4">
        <label for="genero" class="form-label">Gênero</label>
        <select class="form-select" required id="genero" name="genero">
            
<?php
    $sql = "SELECT * FROM tb02_genero ORDER BY tb02_nome";
    $consulta = $banco->prepare($sql);
    $consulta->execute();
    while($registro = $consulta->fetch()) {
        echo "<option value=".$registro["tb02_cod_genero"].">".$registro["tb02_nome"]."</option>";
    }
?>
        </select>
    </div>
    <div class="mb-3 col-4">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" required id="foto" name="foto" value="<?php echo $genero; ?>">
    </div>
    <div class="mb-3 col-4">
    <input type="submit" class="btn btn-primary" name="gravar">
</form>
</div>
<br>
<?php
    $sql = "SELECT * from tb01_artista
    LEFT JOIN tb02_genero ON (tb02_cod_genero = tb01_cod_genero)
    ORDER BY tb01_nome";

    $consulta = $banco->query( $sql );
?>
<table class="table table-striped">
    <tr>
        <td>Foto</td>
        <td>Nome</td>
        <td>Gênero</td>
        <td></td>
        <td></td>
    </tr>
<?php
while($registro = $consulta->fetch()) {
    echo "<tr>";
    echo "<td><img src='".$registro["tb01_foto"]."' class='img-thumbnail' width='80' height='80'></td>";
    echo "<td>".$registro["tb01_nome"]."</td>";
    echo "<td>".$registro["tb02_nome"]."</td>";
    echo '<td><a href="artistas.php?cod='.$registro["tb01_cod_artista"].'&acao=editar">Editar</a></td>';
    echo '<td><a href="artistas.php?cod='.$registro["tb01_cod_artista"].'&acao=excluir">Excluir</a></td>';
    echo "</tr>";
}     
?>
</table>
<div style="height:100px;"></div>
<?php
include "rodape.php"
?>