<?php
include "topo.php";

if(isset($_POST["gravar"])) {
    $codigo = $_POST["codigo"];
    $nome = $_POST["nome"];

    if($codigo==0) {
        $sql = "INSERT INTO tb02_genero VALUES (null, ?)";
        $comando = $banco->prepare($sql);
        $comando->execute(array($nome));
    } else {
        $sql = "UPDATE tb02_genero SET tb02_nome = ? WHERE tb02_cod_genero = ?";
        $comando = $banco->prepare($sql);
        $comando->execute(array($nome, $codigo));
    }
}
if(isset($_GET["acao"])) {
    if($_GET["acao"]=="excluir") {
        $cod = $_GET["cod"];

        $sql = "DELETE FROM tb02_genero WHERE tb02_cod_genero = ?";
        $comando = $banco->prepare($sql);
        $comando->execute(array($cod));
    }
}

?>
<br>
<h2>Gêneros</h2>

<?php
    $codigo = 0;
    $nome = "";

    if(isset($_GET["cod"])) {
        $sql = "SELECT * FROM tb02_genero WHERE tb02_cod_genero = ?";
        $consulta = $banco->prepare($sql);
        $consulta->execute(array($_GET["cod"]));
        if($registro = $consulta->fetch()) {
            $codigo = $registro["tb02_cod_genero"];
            $nome = $registro["tb02_nome"];
        }   
    }
?>
<form action="generos.php" method="post">
    <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
    <div class="mb-3 col-4">
        <label for="nome" class="form-label">Gênero</label>
        <input type="text" class="form-control" required id="nome" name="nome" value="<?php echo $nome; ?>">
    </div>
    <input type="submit" class="btn btn-primary" name="gravar">
</form>
<br>
<?php
    $sql = "SELECT * from tb02_genero
    ORDER BY tb02_nome";

    $consulta = $banco->query( $sql );
?>
<table class="table table-striped">
    <tr>
        <td>Gêneros</td>
        <td></td>
        <td></td>
    </tr>
<?php
while($registro = $consulta->fetch()) {
    echo "<tr>";
    echo "<td>".$registro["tb02_nome"]."</td>";
    echo '<td><a href="generos.php?cod='.$registro["tb02_cod_genero"].'&acao=editar">Editar</a></td>';
    echo '<td><a href="generos.php?cod='.$registro["tb02_cod_genero"].'&acao=excluir">Excluir</a></td>';
    echo "</tr>";
}     
?>
</table>
<?php
include "rodape.php"
?>