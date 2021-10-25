<?php
//conexão
include_once 'php_action/db_connect.php';
//header
include_once 'includes/header.php';
?>
<div class="selection no-pad-bot" id="index-banner">
  <div class="container">
    <br>
    <br>
    <div class="row center">
      <div class="col s12 m12 l12 xl12">
        <h3 class+="light">Estoque de Carros</h3>
        <table class="striped">
          <thead>
            <tr>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Descrição</th>
              <th>Modelo/Fabricação</th>
              <th>Cor</th>
              <th>Placa</th>
              <th>Valor (R$)</th>
            </tr>
          </thead>
          <?php
          $sql = "SELECT * FROM estoque";
          $resultado = mysqli_query($connect, $sql);
          while ($dados = mysqli_fetch_array($resultado)) :
          ?>
            <tr>
              <td><?php echo $dados['marca']; ?></td>
              <td><?php echo $dados['modelo']; ?></td>
              <td><?php echo $dados['descricao']; ?></td>
              <td><?php echo $dados['mod_fab']; ?></td>
              <td><?php echo $dados['cor']; ?></td>
              <td><?php echo $dados['placa']; ?></td>
              <td><?php echo $dados['valor']; ?></td>

              <td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating green"><i class="material-icons">edit</i></a></td>

              <td><a href="#modal <?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

              <!-- Modal Structure -->
              <div id="modal <?php echo $dados['id']; ?>" class="modal modal-fixed-footer">
                <div class="modal-content">
                  <h4>Deseja excluir esse carro?</h4>
                  <p><?php echo $dados['marca']; ?> - <?php echo $dados['modelo']; ?></p>
                </div>
                <div class="modal-footer">
                  <form action="php_action/delete.php" method="POST"> <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat btn green">Não Excluir</a>
                    <button type="submit" name="btn-deletar" class="btn red">Sim, quero Excluir</button>
                  </form>
                </div>
              </div>
            </tr>
          <?php endwhile; ?>
        </table>
      </div>
    </div>
    <br>
    <br>
  </div>
</div>


<?php
//footer
include_once 'includes/footer.php';
?>