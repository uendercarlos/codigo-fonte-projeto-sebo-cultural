/* global ajax */


var dadosAtuais; // array que guarda os dados atuais da linha antes de editá-la
var linhaEmEdicao = null;// guardar o id da linha a ser editada, incluída ou excluída
var linhasNovas = 0; // variável auxiliar


var buscar = 'revistas';


function  Alert() {


    if (document.getElementById("minhaTabela").rows.length > 2) {
        document.getElementById('vazio').style.display = 'none';

    } else {
        document.getElementById('vazio').style.display = 'block';

    }
}


function  LinhaSelecionada(idlinha) {
    if (!linhaEmEdicao) {

        var linha, celula;

        var linhacor = document.getElementById(idlinha); // obtém a linha a ser editada e altera sua cor



        var tabela = document.getElementById('minhaTabela');


        celula = tabela.rows;


        celula.onmouseover = function () {
            linhacor.className = 'linhaSelecionada';
        };
        //celula.onclick = function () {
        //     PreencherCaixa(this);
        // };
        celula.onmouseout = function () {
            linhacor.className = 'linha';
        };


    }
}

// prepara uma linha para edição
function EditarLinha(idLinha, produto) {
    if (!linhaEmEdicao) {
        linhaEmEdicao = idLinha;
        var linha = document.getElementById(idLinha); // obtém a linha a ser editada e altera sua cor
        //linha.className = 'linhaSelecionada';
        var celulas = linha.cells;
        SalvaDados(idLinha);// salva os dados atuais (para o caso de cancelamento)

        if (produto == 'revista') {
            document.forms[0].elements[0].value = celulas[1].innerHTML;
            document.forms[0].elements[1].value = celulas[2].innerHTML;
            document.forms[0].elements[2].value = celulas[3].innerHTML;
            document.forms[0].elements[3].value = celulas[4].innerHTML;
            document.forms[0].elements[4].value = celulas[5].innerHTML;
            document.forms[0].elements[5].value = celulas[6].innerHTML;
            document.forms[0].elements[6].value = celulas[7].innerHTML;

        }
        if (produto == 'livro') {
            document.forms[0].elements[0].value = celulas[1].innerHTML;
            document.forms[0].elements[1].value = celulas[2].innerHTML;
            document.forms[0].elements[2].value = celulas[3].innerHTML;
            document.forms[0].elements[3].value = celulas[4].innerHTML;
            document.forms[0].elements[4].value = celulas[5].innerHTML;



        }

        //cria os campos de texto editáveis
        /*alert(celulas[1].innerHTML);
         celulas[1].innerHTML = '<input id="linha"  type="text" name="nome" value="' + celulas[1].innerHTML + '">';
         celulas[2].innerHTML = '<input type="text" name="preco" value="' + celulas[2].innerHTML + '">';
         celulas[3].innerHTML = '<a href="#" onclick="Atualizar(\'' + produto + '\')" >Atualizar</a><br>';
         celulas[4].innerHTML = '<a href="#" onclick="Cancelar()">Cancelar</a>';*/
    } else
        alert("Você já está editando um registro!");
}


// exclui uma linha da tabela
function ExcluirLinha(idLinha, produto) {
    if (!linhaEmEdicao) {
        var linha = document.getElementById(idLinha);
        //linha.className = 'linhaSelecionada';
        if (confirm("Tem certeza que deseja excluir este registro?")) {
            Aviso(true); // exibe o aviso "Aguarde..."
            linhaEmEdicao = idLinha;
            var celulas = document.getElementById(idLinha).cells;
            var cod = celulas[0].innerHTML;

            var url;
            if (produto == "livro") {
                url = "tabelaDadosLivros.php?acao=excluir&cod=" + cod;

            } else if (produto == "revista") {
                url = "tabelaDadosRevistas.php?acao=excluir&cod=" + cod;

            }

            //var url = "tabelaDados.php?acao=excluir&cod=" + cod;
            requisicaoHTTP("GET", url, true);


        }
        
    } else {
        alert("Você está com um registro aberto. Feche-o antes de prosseguir.");
    }
}

function NovoRegistro() {
    // se houver linha sendo editada, cancela edição
    if (linhaEmEdicao) {
        alert("Você está com um registro aberto. Feche-o antes de prosseguir.");
    } else {
        // insere uma nova linha na tabela
        proxIndice = document.getElementById('minhaTabela').rows.length - 0;
        var novaLinha = document.getElementById('minhaTabela').insertRow(proxIndice);

        // define o id da nova linha (que será usado em caso de edição/exclusão)
        novoId = "nova" + linhasNovas;
        novaLinha.setAttribute('id', novoId);
        linhasNovas++;
        linhaEmEdicao = novoId;

        // insere as células na linha criada
        /* var novasCelulas = new Array(5);
         for (var i = 0; i < novasCelulas.length; i++)
         novasCelulas[i] = novaLinha.insertCell(i);
         
         // cria os campos do formulário
         novasCelulas[0].innerHTML = '*';// código
         novasCelulas[1].innerHTML = '<input  name="nome">'; // nome
         novasCelulas[2].innerHTML = '<input  name="preco">'; // preço
         novasCelulas[3].innerHTML = '<a href="#" onclick="EditarLinha()">Editar</a>'; // botão de cadastro
         novasCelulas[4].innerHTML = '<a href="javascript:Atualizar">Atualizar</a>'; // botão de cancelamento
         */

    }
}

// salva os dados atuais da linha em um array
function SalvaDados(idLinha) {
    var celulas = document.getElementById(idLinha).cells;
    dadosAtuais = new Array(celulas.length);
    for (var i = 0; i < celulas.length; i++)
        dadosAtuais[i] = celulas[i].innerHTML;
}

// cancela a edição de uma linha
function Cancelar() {
    var linha = document.getElementById(linhaEmEdicao); // volta o formato original
    //linha.className = 'corLinha';
    var celulas = linha.cells; // coloca os dados anteriores
    for (var i = 0; i < dadosAtuais.length; i++)
        celulas[i].innerHTML = dadosAtuais [i];
    linhaEmEdicao = null;
}

// cancela a inclusão de uma linha, excluindo-a
function CancelarInclusao() {
    var linha = document.getElementById(linhaEmEdicao);
    linha.parentNode.removeChild(linha);
    linhasNovas--;
    linhaEmEdicao = null;
}

// atualiza o conteúdo da linha
function Atualizar(produto) {
    Aviso(1); // exibe o aviso "Aguarde..."
    var meuForm = document.forms[0];
    var dados = ObtemDadosForm(meuForm);

    var cod = dadosAtuais[0];

    var url;

    if (produto == "livro") {
        url = "tabelaDadosLivros.php?acao=atualizar";
    } else if (produto == "revista") {
        url = "tabelaDadosRevistas.php?acao=atualizar";

    }

    url += "&cod=" + cod + "&" + dados;
    requisicaoHTTP("GET", url, true);

}
// chamada programa PHP que cadastra no banco de dados
function Cadastrar(produto) {
    Aviso(1);

    var meuForm = document.forms[0];


    var dados = ObtemDadosForm(meuForm);
    var url;

    if (produto == "livro") {
        url = "tabelaDados.php?acao=cadastrar&" + dados;
    } else if (produto == "revista") {
        url = "tabelaDados2.php?acao=cadastrar&" + dados;

    }
    requisicaoHTTP("GET", url, true);

    NovoRegistro();

}


// coloca os dados do formulário em formato de query string
function ObtemDadosForm(meuForm) {
    var parametros = new Array();
    // percorre os elementos do formulário
    for (var i = 0; i < meuForm.elements.length; i++) {
        var param = meuForm.elements[i].name;
        param += "=";
        param += encodeURIComponent(meuForm.elements[i].value);
        parametros.push(param);

    }
    // retona os parâmetros separados por &, para uso na query string

    return parametros.join("&");
}

// exibe ou oculta a mensagem de espera
function Aviso(exibir) {
    var saida = document.getElementById("avisos");
    if (exibir) {
        saida.className = "aviso";
        saida.innerHTML = "Aguarde. ..processando!";
    } else {
        saida.className = "";
        saida.innerHTML = "";
    }
}
//trata a resposta do servidor, de acordo com a operação realizada
function trataDados() {
    var resposta = ajax.responseText;

    var linha = document.getElementById(linhaEmEdicao);
    if (resposta == "atualizouRevista") {
        // registro foi atualizado


        //linha.className = 'corLinha'; // volta p estilo antigo
        var celulas = linha.cells;

        var meuForm = document.forms[0];// coloca os novos valores nas células
        var nome = meuForm[0].value;
        var autor = meuForm[1].value;
        var anoPub = meuForm[2].value;
        var datAq = meuForm[3].value;
        var editora = meuForm[4].value;
        var volume = meuForm[5].value;
        var assunto = meuForm[6].value;



        celulas[1].innerHTML = nome;
        celulas[2].innerHTML = autor;
        celulas[3].innerHTML = anoPub;

        celulas[4].innerHTML = datAq;
        celulas[5].innerHTML = editora;
        celulas[6].innerHTML = volume;
        celulas[7].innerHTML = assunto;



        celulas[8].innerHTML = dadosAtuais [8]; // botão de edição
        celulas [9].innerHTML = dadosAtuais [9]; // botão de exclusão
        popup();
        linhaEmEdicao = null;
    } else if (resposta == "atualizouLivro") {
        // registro foi atualizado


        //linha.className = 'corLinha'; // volta p estilo antigo
        var celulas = linha.cells;

        var meuForm = document.forms[0];// coloca os novos valores nas células
        var nome = meuForm[0].value;
        var autor = meuForm[1].value;
        var anoPub = meuForm[2].value;
        var datAq = meuForm[3].value;
        var editora = meuForm[4].value;


        celulas[1].innerHTML = nome;
        celulas[2].innerHTML = autor;
        celulas[3].innerHTML = anoPub;

        celulas[4].innerHTML = datAq;
        celulas[5].innerHTML = editora;


        celulas[6].innerHTML = dadosAtuais [6]; // botão de edição
        celulas [7].innerHTML = dadosAtuais [7]; // botão de exclusão
        popup();
        linhaEmEdicao = null;
    } else if (resposta == "excluiu") { // registro foi excluído
        linha.parentNode.removeChild(linha);
        linhaEmEdicao = null;
        Alert();

    } else if (resposta.substring(0, 14) == "cadastrouLivro") { // registro foi incluído

        linha.className = 'corLinha';
        var celulas = linha.cells;
        novoCodigo = resposta.substring(15); // obtém o código gerado para o produto no banco de dados
        var meuForm = document.forms[0]; // coloca os novos valores nas células
        var nome = meuForm.nome.value;
        var preco = meuForm.preco.value;
        celulas[0].innerHTML = novoCodigo;
        celulas[1].innerHTML = nome;
        celulas[2].innerHTML = preco;
        celulas[3].innerHTML = '<a href="#" onclick="EditarLinha(\'' + linhaEmEdicao + '\');"><img src="/PhpProject8/icons/edit.png" width="25px"></a>';
        celulas[4].innerHTML = '<a href="#" onclick="ExcluirLinha(\'' + linhaEmEdicao + '\',\'' + 'livro' + '\');"><img src="/PhpProject8/icons/delete.png" width="25px" ></a>';
        linhaEmEdicao = null;


    } else if (resposta.substring(0, 16) == "cadastrouRevista") { // registro foi incluído

        linha.className = 'corLinha';
        var celulas = linha.cells;
        novoCodigo = resposta.substring(17); // obtém o código gerado para o produto no banco de dados
        var meuForm = document.forms[0]; // coloca os novos valores nas células
        var nome = meuForm.nome.value;
        var preco = meuForm.preco.value;
        celulas[0].innerHTML = novoCodigo;
        celulas[1].innerHTML = nome;
        celulas[2].innerHTML = preco;
        celulas[3].innerHTML = '<a href="#" onclick="EditarLinha(\'' + linhaEmEdicao + '\');"><img src="/PhpProject8/icons/edit.png" width="25px"></a>';
        celulas[4].innerHTML = '<a href="#" onclick="ExcluirLinha(\'' + linhaEmEdicao + '\',\'' + 'revista' + '\');"><img src="/PhpProject8/icons/delete.png" width="25px" ></a>';
        linhaEmEdicao = null;


    } else // mensagem de erro
    if (resposta == "Para cadastrar deve preencher todos os campos!") {
        CancelarInclusao();
        alert("Para cadastrar deve preencher todos os campos!");
    } else if (resposta != "") {
        alert(resposta);
    }
    Aviso(false);

}

function PopupAbrir() {
    document.getElementById('modal-wrapper').style.display = 'block';
}
function PopupFechar() {

    document.getElementById('modal-wrapper').style.display = 'none';
    Cancelar();
}

function popup() {
    var popup = document.getElementById("modal-wrapper");
    popup.classList.toggle("modal2");
}
