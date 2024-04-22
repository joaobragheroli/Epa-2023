<?php
    session_start();
    include './conexao.php';
    include './cors.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
  <script src="../script/scriptGame.js" defer></script>
  <link rel="stylesheet" href="../style/style.css">
  <title>Jogo</title>
</head>

<body>
  <header>
    <span class="nomePrincipal"><i class="ph ph-game-controller"></i>GAME</span>
    <div class="menujogo">
      <a href="../html/ansiedade.html"> <i class="ph ph-person-simple-run"></i>Ansiedade</a><br>
      <a href="../html/depressao.html"> <i class="ph ph-heart-break"></i> Depressão</a><br>
      <a href="../html/tdah.html"> <i class="ph ph-book"></i>TDAH</a><br>

    </div>

  </header>

  <div id="timer">
      <div class="nomePessoa">
      <?php
          $sql ="SELECT nome FROM login1";
          $result = $conn->query($sql);
          $Users = array();
          if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
           array_push($Users, $row["nome"]);
          }
          echo "Boa Sorte: ";
          echo end ($Users).'<br>';

} else {
    echo "Nenhum registro encontrado!";
}
      ?>
  </div>
</div>


  
  <main class="games">


    <div id="frase-chave">

    </div>

    <div id="palavra-secreta">

    </div>

    <div id="teclado">
      <div class="teclas">
        <button id="teclas-A" onclick="verificaLetraEscolhida('A')">A</button>
        <button id="teclas-B" onclick="verificaLetraEscolhida('B')">B</button>
        <button id="teclas-C" onclick="verificaLetraEscolhida('C')">C</button>
        <button id="teclas-D" onclick="verificaLetraEscolhida('D')">D</button>
        <button id="teclas-E" onclick="verificaLetraEscolhida('E')">E</button>
        <button id="teclas-F" onclick="verificaLetraEscolhida('F')">F</button>
        <button id="teclas-G" onclick="verificaLetraEscolhida('G')">G</button>
        <button id="teclas-H" onclick="verificaLetraEscolhida('H')">H</button>
        <button id="teclas-I" onclick="verificaLetraEscolhida('I')">I</button>
      </div>
      <div class="teclas">
        <button id="teclas-J" onclick="verificaLetraEscolhida('J')">J</button>
        <button id="teclas-K" onclick="verificaLetraEscolhida('K')">K</button>
        <button id="teclas-L" onclick="verificaLetraEscolhida('L')">L</button>
        <button id="teclas-M" onclick="verificaLetraEscolhida('M')">M</button>
        <button id="teclas-N" onclick="verificaLetraEscolhida('N')">N</button>
        <button id="teclas-O" onclick="verificaLetraEscolhida('O')">O</button>
        <button id="teclas-P" onclick="verificaLetraEscolhida('P')">P</button>
        <button id="teclas-Q" onclick="verificaLetraEscolhida('Q')">Q</button>
        <button id="teclas-R" onclick="verificaLetraEscolhida('R')">R</button>
      </div>
      <div class="teclas">
        <button id="teclas-S" onclick="verificaLetraEscolhida('S')">S</button>
        <button id="teclas-T" onclick="verificaLetraEscolhida('T')">T</button>
        <button id="teclas-U" onclick="verificaLetraEscolhida('U')">U</button>
        <button id="teclas-V" onclick="verificaLetraEscolhida('V')">V</button>
        <button id="teclas-W" onclick="verificaLetraEscolhida('W')">w</button>
        <button id="teclas-X" onclick="verificaLetraEscolhida('X')">X</button>
        <button id="teclas-Y" onclick="verificaLetraEscolhida('Y')">Y</button>
        <button id="teclas-Z" onclick="verificaLetraEscolhida('Z')">Z</button>
        <button id="btnReiniciar">🎮</button>
      </div>
    </div>


    <div id="quadradinhos">
      <div id="imagem">

      </div>

      <div id="imagem2">

      </div>

      <div id="imagem3">

      </div>

      <div id="imagem4">

      </div>

      <div id="imagem5">

      </div>

      <div id="imagem6">

      </div>
    </div>

    <h2 class="setas"><i class="ph ph-arrow-up-right"></i>Tentativas<i class="ph ph-arrow-up-left"></i></h2>
  </main>



  <footer>
    <h4>&copy; Projeto EPA - Etec Sales Gomes</h4>
  </footer>

<div class="modal" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">JOGO DA MENTE</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="modalBody">
              NÃO FOI DESSAS VEZ DESCULPE!
            </div>
            <div class="modal-footer">
              <a class="modal-btn"  href="../php/jogo.php">Jogar Outra Vez</a>
            </div>
          </div>
        </div>
      </div> 

      <div class="modal" id="mymodalVenceu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">JOGO DA MENTE</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="modalBody">
              Parabéns! Pegue seu prêmio. 
            </div>
            <div class="modal-footer">
              <a class="modal-btn"  href="index.php">Pagina de Login </a>
            </div>
          </div>
        </div>
      </div> 

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

</body>

</html>