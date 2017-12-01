
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>CottonApp - Manual do Usuário</title>
<link rel="alternate" type="application/rss+xml" title="frittt.com" href="feed/index.html">
<link href="http://fonts.googleapis.com/css?family=Raleway:700,300" rel="stylesheet"
        type="text/css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/prettify.css">
</head>
<body>
<div class="wrapper">
<header>
  <div class="container">
    <h2 class="lone-header">CottonApp - Manual do Usuário</h2>
  </div>
</header>
<section>
  <div class="container">
    <ul class="docs-nav">
      <li><strong>Principal</strong></li>
      <li><a href="#login" class="cc-active">Login</a></li>
      <li><a href="#homepage" class="cc-active">Home Page</a></li>

      <li><strong>Cliente</strong></li>
      <li><a href="#clientecreate" class="cc-active">Cadastrar cliente</a></li>
      <li><a href="#clienteupdate" class="cc-active">Atualizar cliente</a></li>
      
      <li><strong>Fazendas</strong></li>
      <li><a href="#fazendacreate" class="cc-active">Cadastrar fazendas</a></li>
      <li><a href="#fazendaupdate" class="cc-active">Atualizar fazenda</a></li>
      <li><a href="#fazendalist" class="cc-active">Listar fazendas</a></li>
      
      <li><strong>Talhões</strong></li>
      <li><a href="#talhaocreate" class="cc-active">Cadastrar talhões</a></li>
      <li><a href="#talhaolist" class="cc-active">Listar talhões</a></li>
      <li><a href="#talhaolist" class="cc-active">Listar fazendas</a></li>

      <li><strong>Cultivares</strong></li>
      <li><a href="#cultivarlist" class="cc-active">Listar cultivares</a></li>
      <li><a href="#cultivarselected" class="cc-active">Cultivar selecionada</a></li>
      <li><a href="#cultivaresciclolist" class="cc-active">Cultivares e ciclo</a></li>
      <li><a href="#cultivaresrendimentolist" class="cc-active">Cultivares e rendimento</a></li>
      <li><a href="#cultivaresdoencaslist" class="cc-active">Cultivares e doenças</a></li>

      <li><strong>Semeadura</strong></li>
      <li><a href="#semeadura" class="cc-active">Semeadura</a></li>
      <li><a href="#semeaduraresultados" class="cc-active">Resultados dos cálculos</a></li>
      <li><a href="#consultarsemeadura" class="cc-active">Consultar semeadura</a></li>
    </ul>

    <div class="docs-content">
      <h2>Principal</h2>

      <!-- Tela de Login -->
      <h3 id="login"> Login</h3>
      <p> Interface para ter acesso ao sistema: </p>

      <!-- Imagem tela Login -->
      <img src="img/1_login_edit.png" alt="Tela de login" height="30%" width="30%" border="1">

      <p> A tela de login contém campos de identificação de usuário para que seja possível usar as funções do aplicativo.
        Todos os campos são obrigatórios.<br /></p>
      <ul style="list-style-type: none">
        <li><b>1. Login ou E-mail:</b> Use o teclado virtual para digitar o login ou e-mail do cliente cadastrado</li>
        <li><b>2. Senha:</b> Digite a senha do cliente <br /></li>
        <li><b>3. Entrar:</b> Use o botão entrar para checar as informações fornecidas e acessar o menu principal do aplicativo <br /></li>
      </ul>

      <!-- Home Page -->
      <h3 id="homepage">Home Page</h3>
      <p>Itens da tela principal que indicam as principais funcionalidades do sistema</p>

      <!-- Imagem da tela de listagem de talhões -->
      <img src="img/2_homepage.png" alt="Tela home page" height="30%" width="30%" border="1">

      <p>Os ícones representam cada conjunto de operações que podem ser realizadas sobre Cultivares, Semeaduras, Fazendas, Talhões e conta do cliente.</p>
      <ul style="list-style-type: none">
        <li><b>1. Cultivares:</b> Toque no ícone de cultivares se desejar listar ou filtrar cultivares</li>
        <li><b>2. Semeaduras:</b> O ícone de semeaduras leva a uma tela para realizar cálculos de semeadura</li>
        <li><b>3. Fazendas:</b> Operações para registrar, listar ou alterar dados de uma fazenda</li>
        <li><b>4. Talhões:</b> Operações para registrar, listar ou alterar dados de um talhão</li>
        <li><b>5. Usuário:</b> Apresenta todos os dados do usuário</li>
      </ul>
      <hr>

      <h2>Cliente</h2>
      <!-- Cadastro de Cliente -->
      <h3 id="clientecreate"> Cadastrar cliente</h3>
      <p> Interface para cadastrar clientes no sistema </p>
      <p>
        O cadastro de clientes tem como objetivo realizar o registro de cada cliente a partir dos dados informados. <br />
        A tela traz um formulário com todos os campos que devem ser preenchidos com os dados do cliente, para que ele possa ser cadastrado no sistema.
      </p>

      <!-- Imagem formulário para cadastro de cliente -->
      <img src="img/3_cadastrocliente.png" alt="Tela cliente create" height="30%" width="30%" border="1">

      <p>
        A tela contém campos para cadastrar um novo cliente.<br />
        É necessário preencher todos os campos com as informações pertinentes. <br />
      </p>

      <ul style="list-style-type: none">
        <li><b>1. Nome Completo:</b> Use o teclado virtual para digitar seu nome completo</li>
        <li><b>2. E-mail:</b> Digite seu e-mail para usar caso precise logar ou recuperar informações do aplicativo</li>
        <li><b>3. Login:</b> O login é seu nome de usuário; digite um nome de usuário para logar-se no aplicativo</li>
        <li><b>4. Senha:</b> A senha deve ter no mínimo três dígitos</li>
        <li><b>5. Confirmar Senha:</b> Use o campo de confirmar senha para verificar se a senha definida foi digitada corretamete</li>
        <li><b>6. Salvar:</b> O botão Salvar registra todas as informações digitadas e cria uma conta para o cliente</li>
      </ul>

      <!-- Update Cliente -->
      <h3 id="clienteupdate">Atualizar cliente</h3>
      <p>  Alterando e atualizando os dados de um cliente </p>

      <p>
          A tela é composta por campos de dados pessoais e de localização do cliente. <br />
          O nome completo é um dado obrigatório e deve ser preenchido. <br />
        </p>
      <!-- Imagem do formulário de alteração de cliente -->
      <img src="img/36_clienteupdate.png" alt="Tela cliente update" height="30%" width="30%" border="1">

      <ul style="list-style-type: none">
        <li>
          <b>1. Dados Pessoais:</b><br />
          <ul style="list-style-type: none">
            <li><b>1.1 Nome Completo:</b> Use o teclado virtual para digitar seu nome completo</li>
            <li><b>1.2 Telefone:</b> Se desejar, informe seu número de telefone</li>
            <li><b>1.3 CPF:</b> Se desejar, informe o número de seu CPF</li>
          </ul>
        </li>
        <li>
          <b>2. Dados de Localização:</b>
          <ul style="list-style-type: none">
            <li>Você pode utilizar os campos para fornecer uma localização com logradouro, bairro, número da residência, cidade, CEP e UF.</li>
          </ul>
        </li>
        <li><b>3. Excluir:</b>O botão excluir deleta todos os registros e dados pertencentes ao cliente</li>
        <li><b>4. Desativar:</b>O botão desativar torna a conta do cliente inativa, sem acesso ao sistema; podendo ser reativada a qualquer momento quando o cliente solicitar</li>
        <li><b>5. Salvar:</b>O botão salvar faz com que todas as alterações sejam salvas</li>
      </ul>
      <hr>

      <h2>Fazenda</h2>
      <!-- Cadastro de Fazenda -->
      <h3 id="fazendacreate"> Cadastrar fazendas</h3>
      <p> Interface para registrar fazendas no aplicativo</p>

      <!-- Imagem do formulário de criação da fazenda -->
      <div style="display: inline-block;">
          <img src="img/14_createfazenda1.png" alt="Tela create fazenda 1" height="30%" width="30%" border="1">
          <img src="img/15_createfazenda2.png" alt="Tela create fazenda 2" height="30%" width="30%" border="1">
      </div>
      

      <p>
        A tela é composta por campos de informações básicas, informações de contato e de localização da fazenda.
        Os campos Nome, Hectares e Telefone devem ser preenchidos.
      </p>

      <ul style="list-style-type: none">
        <li>
          <b>1. Informações básicas:</b>
          <ul style="list-style-type: none">
            <li><b>1.1 Nome:</b> Use o teclado virtual para digitar o nome da fazenda</li>
            <li><b>1.2 Hectares:</b> Informe o tamanho da fazenda em hectares</li>
            <li><b>1.3 Observações:</b> Se desejar, adicione observações quaisquer à fazenda</li>
          </ul>
        </li>
        <li>
          <b>1. Informações de contato:</b>
          <ul style="list-style-type: none">
            <li><b>2.1 E-mail:</b> E-mail da fazenda</li>
            <li><b>2.2 Endereço Web:</b> Url do site (www.fazenda.com.br) ou qualquer rede (Facebook, Twitter, Instagram) alternativa que permita entrar em contato com a fazenda</li>
            <li><b>2.3 Telefone:</b> Número de telefone para contato</li>
          </ul>
        </li>
        <li>
          <b>3. Informações de Localização:</b>
          <ul style="list-style-type: none">
            <li>Você pode utilizar os campos para fornecer uma localização com bairro, cidade, UF.</li>
          </ul>
        </li>
        <li>
          <b>4. Salvar:</b> Botão para salvar todos os dados
        </li>
      </ul>


      <!-- Update Fazenda -->
      <h3 id="fazendaupdate"> Alterar fazendas</h3>

      <!-- Imagem do formulário de alteração de fazenda -->
      <img src="img/17_updatefazenda.png" alt="Tela update fazenda" height="30%" width="30%" border="1">

      <p>
        A tela é composta por campos de informações básicas, informações de contato e de localização da fazenda.
        Os campos Nome, Hectares e Telefone devem ser preenchidos.
      </p>

      <ul style="list-style-type: none">
        <li>
          <b>1. Informações básicas:</b>
          <ul style="list-style-type: none">
            <li><b>1.1 Nome:</b> Use o teclado virtual para digitar o nome da fazenda</li>
            <li><b>1.2 Hectares:</b> Informe o tamanho da fazenda em hectares</li>
            <li><b>1.3 Observações:</b> Se desejar, adicione observações quaisquer à fazenda</li>
          </ul>
        </li>
        <li>
          <b>1. Informações de contato:</b>
          <ul style="list-style-type: none">
            <li><b>2.1 E-mail:</b> E-mail da fazenda</li>
            <li><b>2.2 Endereço Web:</b> Url do site (www.fazenda.com.br) ou qualquer rede (Facebook, Twitter, Instagram) alternativa que permita entrar em contato com a fazenda</li>
            <li><b>2.3 Telefone:</b> Número de telefone para contato</li>
          </ul>
        </li>
        <li>
          <b>3. Informações de Localização:</b>
          <ul style="list-style-type: none">
            <li>Você pode utilizar os campos para fornecer uma localização com bairro, cidade, UF.</li>
          </ul>
        </li>
        <li><b>4. Excluir Fazenda:</b> Todos os dados da fazenda são deletados, impossibilitando a consulta e registro de semeaduras e talhões para a fazenda</li>
        <li><b>5. Salvar:</b> Botão para salvar todos os dados</li>
      </ul>

      <!-- Listar Fazendas -->
      <h3 id="fazendalist">Listar fazendas</h3>
      <p>Listar e filtrar fazendas cadastradas.</p>

      <!-- Imagem da tela de listagem de fazendas -->
      <img src="img/16_listfazendas.png" alt="Tela listar fazendas" height="30%" width="30%" border="1">

      <p>É possível utilizar o campo de texto para procurar fazendas pelo nome.</p>
      <ul style="list-style-type: none">
        <li><b>1. Campo para digitar:</b> Use o teclado virtual para digitar algum trecho do nome da fazenda.</li>
        <li><b>2. Botão Buscar:</b> Lista os resultados obtidos com base no que foi digitado no campo de texto</li>
        <li><b>3. Lista de Fazendas:</b> Lista todas as fazendas registradas ou os resultados da busca</li>
        <li>Toque na linha de determinada fazenda para obter mais detalhes sobre ela.</li>
      </ul>
      <hr>

      <h2>Talhões</h2>
      <!-- Cadastrar Talhões -->
      <h3 id="talhaocreate">Cadastrar talhões</h3>
      <p> Interface para registrar taçhões no sistema</p>
      <p>
        Para registrar um talhão, é necessário que ao menos uma fazenda esteja cadastrada.<br />
        Todos os campos são obrigatórios.
      </p>

      <!-- Imagem formulário para cadastro de talhão -->
      <img src="img/21_createtalhao.png" alt="Tela criar talhão" height="30%" width="30%" border="1">

      <p>
        A tela contém campos para cadastrar um novo talhão.<br />
        É necessário preencher todos os campos com as informações pertinentes. <br />
      </p>

      <ul style="list-style-type: none">
        <li><b>1. Fazenda:</b> Toque no campo Selecionar Fazenda para listar as fazendas. Na lista, selecione a fazenda na qual o talhão pertencerá</li>
        <li><b>2. Descrição:</b> Atribua uma descrição que permita identificar o talhão</li>
        <li><b>3. Tamanho:</b> Informe o tamanho do talhão</li>
        <li><b>4. Salvar:</b> Botão para salvar todos os dados</li>
      </ul>

      <!-- Listar Talhões -->
      <h3 id="talhaolist">Listar talhões</h3>
      <p>Listar e filtrar talhões cadastrados que pertencem a determinada fazenda.</p>

      <!-- Imagem da tela de listagem de talhões -->
      <img src="img/22_talhaolist.png" alt="Tela listar talhões" height="30%" width="30%" border="1">

      <ul style="list-style-type: none">
        <li><b>1. Selecionar Fazenda:</b> Todo talhão pertence à uma fazenda; use o campo Selecionar Fazenda para listar as fazendas registradas.
          Na lista, selecione uma fazenda para listar os talhões</li>
        <li><b>2. Campo para digitar:</b> Use o teclado virtual para digitar algum trecho do nome do talhão</li>
        <li><b>3. Botão Buscar:</b> Lista os resultados obtidos com base no que foi digitado no campo de texto</li>
        <li><b>4. Lista de Talhões:</b> Lista todos os talhões registrados ou os resultados da busca. Toque na linha de determinado talhão para obter mais detalhes sobre ele</li>
      </ul>
      <hr>

      <h2>Cultivares</h2>
      <!-- Listar Cultivares -->
      <h3 id="cultivarlist">Listar cultivares</h3>
      <p>Lista todas as variedades de cultivares registradas na base de dados do sistema.</p>
      
      <!-- Imagem da tela de listagem de cultivares -->
      <img src="img/5_cultivareslist.png" alt="Tela listar cultivares" height="30%" width="30%" border="1">

      <p>Para ver detalhes da variedade, basta tocar na linha em que ela se encontra.</p>
      <p>Feito isso, uma nova tela com todas as características será exibida.</p>

      <!-- Cultivar Selecionada -->
      <h3 id="cultivarselected">Cultivar selecionada</h3>
      <p>Exibe todas as características da variedade selecionada.</p>

      <div style="display: inline-block;">
        <img src="img/38_cultivardetail1.png" alt="Tela listar cultivares" height="30%" width="30%" border="1">
        <img src="img/39_cultivardetail2.png" alt="Tela listar cultivares" height="30%" width="30%" border="1">
        <img src="img/40_cultivardetail3.png" alt="Tela listar cultivares" height="30%" width="30%" border="1">
      </div>
        
      <ul>
        <li>Lista todas as doenças e a respectiva tolerância.</li>
        <li>As tolerâncias são representadas por siglas.</li>
        <li>Cada sigla pode ter seu significado consultado na legenda que fica no rodapé da tela.</li>
      </ul>
      <hr>

      <!-- Cultivar Ciclo -->
      <h3 id="cultivaresciclolist">Cultivares e ciclos</h3>
      <p>Filtrar variedades de cultivar por meio do ciclo.</p>
      <p>Todos os ciclos são listados na tela.</p>

      <!-- Imagem da tela com lista de ciclos -->
      <img src="img/6_cicloslist.png" alt="Tela listar ciclos" height="30%" width="30%" border="1">

      <p>Selecione um ciclo para listar as variedades que pertencem à ele.</p>
      <hr>

      <!-- Cultivar Rendimento -->
      <h3 id="cultivaresrendimentolist">Cultivares e rendimento</h3>
      <p>Lista todas as variedades de cultivares ordenadas pelo maior rendimento de fibra.</p>
      <p>Para ver detalhes da variedade basta tocar na linha em que ela se encontra.
        Feito isso, uma nova tela com todas as características será exibida.</p>

      <!-- Imagem da tela com lista de cultivares ordenadas pelo rendimento -->
      <img src="img/7_cultivaresrendimento.png" alt="Tela cultivares ordenadas pelo rendimento" height="30%" width="30%" border="1">
      <hr>

      <!-- Cultivar Doencas -->
      <h3 id="cultivaresdoencaslist">Cultivares e doenças</h3>
      <p>Consultar variedades de cultivares e suas respectivas tolerâncias às doenças</p>
      <p>Todas as doenças são listadas na tela.</p>
      <p>Em cada linha, na frente do nome de cada doença, é possível ver um botão para Ativar e Desativar.</p>

      <ul style="list-style-type: none">
        <li>
          <b>1.</b> Quando o botão muda de cor e o círculo contido dentro dele vai para o lado direito significa que a doença foi selecionada.
          <br>
          <!-- Imagem da tela ilustrando esse passo -->
          <img src="img/12_componentedoencaselecionada.png" alt="Imagem do componente para selecionar uma doença" height="60%" width="60%">
        </li>
        <li>
          <b>2.</b> Quando o círculo contido no botão está no lado esquerdo significa que a doença não foi selecionada.
          <br>
          <!-- Imagem da tela ilustrando esse passo -->
          <img src="img/37_doencanaoselecionada.png" alt="Imagem do componente para selecionar uma doença" height="60%" width="60%">
        </li>
        <li>
          <b>3.</b> O botão Próximo levará à tela com a lista das variedades, as doenças selecionadas e tolerâncias.
          <br>
          <!-- Imagem da tela ilustrando esse passo -->
          <img src="img/9_resultadosbusca.png" alt="Imagem do componente para selecionar uma doença" height="30%" width="30%" border="1">
        </li>
      </ul>
      <hr>

      <!-- Semeadura -->
      <h2>Semeadura</h2>
      <h3 id="semeadura">Semeadura</h3>
      <p>Realizar cálculos para semeadura</p>
      <p>A tela apresenta campos de informações cruciais para calcular o peso de sementes por metro, hectare, alqueire e o número de plantas por hectare.</p>
      
      <!-- Imagem da tela ilustrando esse passo -->
      <div style="display: inline-block;">
          <img src="img/26_semeadura.png" alt="Tela de semeadura" height="30%" width="30%" border="1">
          <img src="img/29_semeaduraexample.png" alt="Tela de semeadura com formulário preenchdo" height="30%" width="30%" border="1">
      </div>
      

      <ul style="list-style-type: none">
        <li>
          <b>1. Cultivar:</b> Toque no campo Selecionar Cultivar para listar todas as variedades de cultivar. Na lista, selecione a variedade que deseja semear.
          <br>
          <img src="img/27_cultivarlistselect.png" alt="Lista das variedades de cultivares disponíveis para seleção" height="30%" width="30%" border="1">
        </li>
        <li>
          <b>2. Época de Semeadura:</b> Toque no campo Selecionar Época para listar todas as épocas de semeadura.
          Esta informação é importante para dizer se a variedade de cultivar escolhida é recomendada ou não para a época selecionada
          <br>
          <img src="img/28_epocasemeaduralistselect.png" alt="Lista épocas de semeadura disponíveis para seleção" height="30%" width="30%" border="1">
        </li>
        <li><b>3. Espaçamento:</b> Utilize o teclado numérico para informar o espaçamento. Ele deve ser um valor decimal, como por exemplo: 0.8</li>
        <li><b>4. Germinação:</b> Utilize o teclado numérico para informar a taxa de germinação apresentada no saco de sementes</li>
        <li><b>5. Botão Calcular:</b> Para visualizar o resultado de todos os cálculos, toque no botão calcular</li>
      </ul>

      <!-- Resultados dos calculos -->
      <h3 id="semeaduraresultados">Resultados dos cálculos</h3>
      <p>São listadas todas as informações de semeadura e resultados dos cálculos.</p>
      
      <img src="img/30_resultadosemeadura1.png" alt="Tela com resultados dos cálculos para semeadura" height="30%" width="30%" border="1">

      <ul style="list-style-type: none">
        <li><b>1. Época de Semeadura:</b> Toque no campo Selecionar Época para realizar novos cálculos</li>
        <li><b>2. Nome Cultivar:</b> Exibe o nome da variedade de cultivar selecionada para a semeadura</li>
        <li><b>3. Plantas/ha:</b> Exibe a quantidade de plantas por hectare na época selecionada</li>
        <li><b>4. Sementes (m):</b> Quantidade de sementes para semear em cada metro</li>
        <li><b>5. Sementes (kg/ha):</b> Peso, em quilogramas, que deve ser semeado em cada hectare</li>
        <li><b>6. Sementes (kg/alq):</b> Peso, em quilogramas, que deve ser semeado em cada alqueire</li>
        <li><b>7. Recomendação:</b> Um rótulo em vermelho pode surgir quando a varidade de cultivar não é recomendada para a época de semeadura selecionada</li>
        <li>
          <b>8. Botão Salvar:</b> O Botão Salvar permite registrar todos os cálculos realizados
          <br>
          <img src="img/31_resultadosemeadura2.png" alt="Tela com detalhes para salvar semeadura" height="30%" width="30%" border="1">
        </li>
      </ul>

      <!-- Consultar Semeadura -->
      <h3 id="consultarsemeadura">Consultar semeadura</h3>
      <p>Para consultar a lista de semeaduras, basta selecionar uma fazenda na lista de fazendas, pois cada semeadura está atrelada a uma fazenda.</p>
      
      <div style="display: inline-block;">
          <img src="img/16_listfazendastouch.png" alt="Tela com lista de semeaduras" height="30%" width="30%" border="1">
          <img src="img/34_fazendadetailstabber1.png" alt="Tela com lista de semeaduras" height="30%" width="30%" border="1">
      </div>
      
      <p>Para visualizar os detalhes da semeadura, basta selecioná-la na lista. 
        Ao selecionar, será redirecionado a uma nova tela com todas as informações da respectiva semeadura.</p>
      <img src="img/33_detailssemeaduraselected.png" alt="Tela com detalhes da semeadura selecionada" height="30%" width="30%" border="1">
      
    </div>
  </div>
</section>
<section class="vibrant centered">
  <div class="">
    <h4></h4>
  </div>
</section>
<footer>
  <div class="">
    <p> </p>
  </div>
</footer>
</div>
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/prettify/prettify.js"></script>
<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?lang=css&skin=sunburst"></script>
<script src="js/layout.js"></script>
</body>
</html>
