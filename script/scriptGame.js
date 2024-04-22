let tentativas = 6;
let ListaDinamica = [];
let PalavraSecretaSorteada;
let FraseSecretaSorteada;

// Sequencia de Palavras

const palavras = [
    palavra001={
        fraseChave: "Qual é o principal sentimento da ansiedade?",
        palavraSecreta: "PESSIMISMO",
        selecionado:true
    },

    palavra002={
        fraseChave: "Para te ajudar numa crise de ansiedade é preciso praticar exercícios _________",
        palavraSecreta: "FISICOS",
        selecionado:false
    },

    palavra003={
        fraseChave: "Qual é o principal sentimento da depressão?",
        palavraSecreta: "TRISTEZA",
        selecionado:false
    },

    palavra004={
        fraseChave: "Acompanhamento com __________ é um dos possíveis tratamentos da depressão.",
        palavraSecreta: "TERAPEUTA",
        selecionado:false
    },

    palavra005={
        fraseChave: "TDAH significa “Déficit de Atenção com __________”.",
        palavraSecreta: "HIPERATIVIDADE",
        selecionado:false
    },

    palavra006={
        fraseChave: "Em qual fase da vida podemos notar o TDAH?",
        palavraSecreta: "INFANCIA",
        selecionado:false
    }
]



// Puxa as frases e perguntas
criarpalavraSecreta();
function criarpalavraSecreta(){
  const indexPalavra = parseInt(Math.random() * palavras.length);
  
  if (palavras[1].selecionado)
    indexPalavra = 1;
  
  if (palavras[2].selecionado)
    indexPalavra = 2;
  
  if (palavras[3].selecionado)
    indexPalavra = 3;
  

    
    FraseSecretaSorteada =palavras[indexPalavra].fraseChave;
    PalavraSecretaSorteada =palavras[indexPalavra].palavraSecreta;

    console.log(FraseSecretaSorteada)
    console.log(PalavraSecretaSorteada)
}



// Mostra a imagem na Tela
montarPalavraNaTela();
function montarPalavraNaTela(){
    const fraseChave = document.getElementById("frase-chave");
    fraseChave.innerHTML = FraseSecretaSorteada;

    const palavraSecreta = document.getElementById("palavra-secreta");
    palavraSecreta.innerHTML = "";

    for(i = 0; i < PalavraSecretaSorteada.length; i++){
        if(ListaDinamica[i] == undefined){
            ListaDinamica[i] = "&nbsp"
            palavraSecreta.innerHTML = palavraSecreta.innerHTML + "<div class='letras'>" +ListaDinamica[i]+ "</div>"
        }
        else{
            palavraSecreta.innerHTML = palavraSecreta.innerHTML + "<div class='letras'>" +ListaDinamica[i]+ "</div>"
        }
    }
}



// Faz funcionar o Teclado 
function verificaLetraEscolhida(letra){
    document.getElementById("teclas-" + letra).disabled = true;
    if(tentativas > 0){
        mudarStyleLetra("teclas-" + letra, false);
        comparalistas(letra);
        montarPalavraNaTela();
    }
}

function mudarStyleLetra(teclas, condicao){
    if (condicao == false){
        document.getElementById(teclas).style.background = "#FA1B03";
        document.getElementById(teclas).style.color = "#ffffff";
    }else {
        document.getElementById(teclas).style.background = "#008000";
        document.getElementById(teclas).style.color = "#ffffff";
    }
    
}


function carregaImagemQuadrado(){
    switch(tentativas){
        // case 6: 
        // document.getElementById("imagem").style.backgroundImage  = "url('../img/quadrado12.png')";
        // break;
        // case 5:
        //      document.getElementById("imagem").style.backgroundImage  = "url('../img/quadrado12.png')";
        //     break
        case 4:
            console.log(`Case 4`)
            document.getElementById("imagem").style.backgroundImage  = "url('../img/quadrado1.png')";
            break;
        case 3:
            document.getElementById("imagem2").style.backgroundImage  = "url('../img/quadrado1.png')";
            break;
        case 2:
            document.getElementById("imagem3").style.backgroundImage  = "url('../img/quadrado1.png')";
            break;
        case 1:
            document.getElementById("imagem4").style.backgroundImage  = "url('../img/quadrado1.png')";
            break;
        case 0:
            document.getElementById("imagem5").style.backgroundImage  = "url('../img/quadrado1.png')";
            break;
        default:
            document.getElementById("imagem6").style.backgroundImage  = "url('../img/quadrado1.png')";
            break;
    }
}



// Começa o Cronometro 
// function startTimer(duration,display){
//     var timer = duration, minutes, seconds;

//     setInterval(function(){

//         minutes = parseInt(timer / 60,10);
//         seconds = parseInt(timer % 60,10);

//         minutes = minutes < 10 ? "0" + minutes : seconds;
//         seconds = seconds < 10 ? "0" + seconds : seconds;

//         display.textContent = minutes + ":" + seconds;

//         if(--timer <0){
//             timer=duration;
//         }
        

//     },1000);

// }

function comparalistas(letra){
    const pos = PalavraSecretaSorteada.indexOf(letra)
    
    if(pos < 0){
        tentativas--
        carregaImagemQuadrado();
        // verificar se ainda tem tentativas 
        if(tentativas == 0){
        abreModal(" Ops!", "Não foi dessa vez... A Palavra Secreta era <br>" + PalavraSecretaSorteada);
        }


    }
    else {
        mudarStyleLetra("teclas-" + letra, true);
        for(i = 0; i < PalavraSecretaSorteada.length; i++){
            if(PalavraSecretaSorteada[i] == letra) {
                ListaDinamica[i] = letra;
            }
        }
    }

    let vitoria = true;
    for(i = 0; i < PalavraSecretaSorteada.length; i++){
        if(PalavraSecretaSorteada[i] != ListaDinamica[i]){
            vitoria= false
            
            
        }
    }

    if(vitoria == true) {
        abreModalVenceu();
      tentativas = 0;
      var i;

      palavras.forEach((palavra, index) => {
        if (palavra.selecionado) {
          palavra.selecionado = false
          i = index + 1
        }

        if (!palavra.selecionado && index == i) {
          palavra.selecionado = true
        }
      });
    }
}

// window.onload = function(){

//     var duration = 60 * 4; //conversao para segundos
//     var display = document.querySelector("#timer"); //Elemento para exibir o time

//     startTimer(duration,display);

// }

// modal do perdeu
function abreModal(titulo, mensagem){
    let modalTitulo = document.getElementById("exampleModalLabel");
    modalTitulo.innerText = titulo;

    let modalBody = document.getElementById("modalBody");
    modalBody.innerHTML = mensagem;

    $("#mymodal").modal({
        show: true
    });
}

// modal do venceu
function abreModalVenceu(titulo, mensagem){
    let modalTitulo = document.getElementById("exampleModalLabel");
    modalTitulo.innerText = titulo;

    let modalBody = document.getElementById("modalBody");
    modalBody.innerHTML = mensagem;

    $("#mymodalVenceu").modal({
        show: true
    });
}
// Botão de Reiniciar
let btnReiniciar = document.querySelector("#btnReiniciar")
btnReiniciar.addEventListener("click", function(){
    location.reload();
});