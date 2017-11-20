@extends('layouts.userhelp')

@section('content')
    <div class="row">
      <div class="container container-content">
      {{--  style="margin-top: 10%"  --}}

      <div class="col-md-offset-1">
        <div style="text-align: justify; text-justify: inter-word;">
          {{-- Introdução --}}
          <div id="introducao">
              <div style="margin: 10% 10% 10% 10%">
                <h2> Introdução</h2>
                <p> A tela de login contém campos de identificação de usuário para que seja possível usar as funções do aplicativo.<br />
                    Todos os campos são obrigatórios.<br />
                <b>1. Login ou E-mail: </b> Use o teclado virtual para digitar o login ou e-mail do cliente cadastrado <br />
                <b>2. Senha:</b> Digite a senha do cliente <br />
                <b>3. Entrar:</b> Use o botão entrar para checar as informações fornecidas e acessar o menu principal do aplicativo <br />
                </p>

              </div>
          </div>

          {{-- Login --}}
          <div id="login">
              <div style="margin: 10% 10% 10% 10%">
                <h2> Login</h2>
                <p> A tela de login contém campos de identificação de usuário para que seja possível usar as funções do aplicativo.<br />
                    Todos os campos são obrigatórios.<br />
                <b>1. Login ou E-mail:</b> Use o teclado virtual para digitar o login ou e-mail do cliente cadastrado <br />
                <b>2. Senha:</b> Digite a senha do cliente <br />
                <b>3. Entrar:</b> Use o botão entrar para checar as informações fornecidas e acessar o menu principal do aplicativo <br />
                </p>

              </div>
          </div>

          {{-- Cadastro Cliente --}}
          <div id="createCliente">
              <div style="margin: 10% 10% 10% 10%">
                <h2> Cadastro de cliente</h2>
                <p>
                  A tela contém campos para cadastrar um novo cliente.<br />
                  É necessário preencher todos os campos com as informações pertinentes. <br />
                  <b>1. Nome Completo:</b> Use o teclado virtual para digitar seu nome completo<br />
                  <b>2. E-mail:</b> Digite seu e-mail para usar caso precise logar ou recuperar informações do aplicativo<br />
                  <b>3. Login:</b> O login é seu nome de usuário; digite um nome de usuário para logar-se no aplicativo<br />
                  <b>4. Senha:</b> A senha deve ter no mínimo três dígitos<br />
                  <b>5. Confirmar Senha:</b> Use o campo de confirmar senha para verificar se a senha definida foi digitada corretamete<br />
                  <b>6. Salvar:</b> O botão Salvar registra todas as informações digitadas e cria uma conta para o cliente<br />
                </p>
              </div>
          </div>

          {{-- Update Cliente --}}
          <div id="updateCliente">
              <div style="margin: 10% 10% 10% 10%">
                <h2> Alterando e atualizando os dados de um cliente </h2>
                <p>
                  A tela é composta por campos de dados pessoais e de localização do cliente. <br />
                  O nome completo é um dado obrigatório e deve ser preenchido. <br />
                  <b>1. Dados Pessoais:</b><br />
                    &nbsp;&nbsp;&nbsp;&nbsp;<b>1.1 Nome Completo:</b> Use o teclado virtual para digitar seu nome completo <br />
                    &nbsp;&nbsp;&nbsp;&nbsp;<b>1.2 Telefone:</b> Se desejar, informe seu número de telefone <br />
                    &nbsp;&nbsp;&nbsp;&nbsp;<b>1.3 CPF:</b> Se desejar, informe o número de seu CPF <br />
                  <b>2. Dados de Localização:</b><br />
                    &nbsp;&nbsp;&nbsp;&nbsp;Você pode utilizar os campos para fornecer uma localização com bairro, cidade, CEP.
                </p>
              </div>
          </div>

          {{-- Create Fazenda --}}
          <div id="createFazenda">
            <div style="margin: 10% 10% 10% 10%">
              <h2> Cadastro de Fazenda </h2>
              <p>
                A tela é composta por campos de informações básicas, informações de contato e de localização da fazenda. <br />
                Os campos Nome, Hectares e Telefone devem ser preenchidos.
                
                <b>1. Informações básicas:</b><br />
                &nbsp;&nbsp;&nbsp;&nbsp;<b>1.1 Nome:</b> Use o teclado virtual para digitar o nome da fazenda <br>
                &nbsp;&nbsp;&nbsp;&nbsp;<b>1.2 Hectares:</b> Informe o tamanho da fazenda em hectares <br />
                &nbsp;&nbsp;&nbsp;&nbsp;<b>1.3 Observações:</b> Se desejar, adicione observações quaisquer à fazenda <br />
                <b>2. Informações de Contato:</b> <br />
                &nbsp;&nbsp;&nbsp;&nbsp;<b>2.1 E-mail:</b> E-mail da fazenda <br />
                &nbsp;&nbsp;&nbsp;&nbsp;<b>2.2 Endereço Web:</b> Url do site (www.fazenda.com.br) ou qualquer rede (Facebook, Twitter, Instagram) alternativa que permita entrar em contato com a fazenda <br />
                &nbsp;&nbsp;&nbsp;&nbsp;<b>2.2 Telefone:</b> Número de telefone para contato <br />
                <b>3. Informações de Localização:</b> <br />
                &nbsp;&nbsp;&nbsp;&nbsp;Você pode utilizar os campos para fornecer uma localização com bairro, cidade, UF. <br />
                <b>4. Salvar:</b> Botão para salvar todos os dados <br />
              </p>
            </div>
          </div>

          {{-- Update Fazenda --}}
          <div id="updateFazenda">
            <div style="margin: 10% 10% 10% 10%">
              <h2> Alterando e atualizando os dados das fazendas </h2>
              <p>
                A tela é composta por campos de informações básicas, informações de contato e de localização da fazenda. <br />
                Os campos Nome, Hectares e Telefone devem ser preenchidos.
                
                <b>1. Informações básicas:</b><br />
                &nbsp;&nbsp;&nbsp;&nbsp;<b>1.1 Nome:</b> Use o teclado virtual para digitar o nome da fazenda <br>
                &nbsp;&nbsp;&nbsp;&nbsp;<b>1.2 Hectares:</b> Informe o tamanho da fazenda em hectares <br />
                &nbsp;&nbsp;&nbsp;&nbsp;<b>1.3 Observações:</b> Se desejar, adicione observações quaisquer à fazenda <br />
                <b>2. Informações de Contato:</b> <br />
                &nbsp;&nbsp;&nbsp;&nbsp;<b>2.1 E-mail:</b> E-mail da fazenda <br />
                &nbsp;&nbsp;&nbsp;&nbsp;<b>2.2 Endereço Web:</b> Url do site (www.fazenda.com.br) ou qualquer rede (Facebook, Twitter, Instagram) alternativa que permita entrar em contato com a fazenda <br />
                &nbsp;&nbsp;&nbsp;&nbsp;<b>2.2 Telefone:</b> Número de telefone para contato <br />
                <b>3. Informações de Localização:</b> <br />
                &nbsp;&nbsp;&nbsp;&nbsp;Você pode utilizar os campos para fornecer uma localização com bairro, cidade, UF. <br />
                <b>4. Excluir Fazenda:</b> Todos os dados da fazenda são deletados, impossibilitando a consulta e registro de semeaduras e talhões para a fazenda <br />
                <b>5. Salvar:</b> Botão para salvar todos os dados <br />
              </p>
            </div>
          </div>

          {{-- Fazenda List --}}
          <div id="listFazenda">
            <div style="margin: 10% 10% 10% 10%">
              <h2> Listando e filtrando fazendas cadastradas </h2>
              <p>
                É possível utilizar o campo de texto para procurar fazendas pelo nome. <br />
                Os campos Nome, Hectares e Telefone devem ser preenchidos.

                <b>1. Campo para digitar:</b> Use o teclado virtual para digitar algum trecho do nome da fazenda. <br />
                <b>2. Botão Buscar:</b> Lista os resultados obtidos com base no que foi digitado no campo de texto <br />
                <b>3. Lista de Fazendas:</b> Lista todas as fazendas registradas ou os resultados da busca.
                Toque na linha de determinada fazenda para obter mais detalhes sobre ela <br />
              </p>
            </div>
          </div>

          {{-- Create Talhão --}}
          <div id="createTalhao">
            <div style="margin: 10% 10% 10% 10%">
              <h2> Cadastro de Talhões </h2>
              <p>
                Para registrar um talhão, é necessário que ao menos uma fazenda esteja cadastrada.<br />
                Todos os campos são obrigatórios.<br />

                <b>1. Fazenda:</b> Toque no campo Selecionar Fazenda para listar as fazendas. Na lista, selecione a fazenda na qual o talhão pertencerá  <br />
                <b>2. Descrição:</b> Atribua uma descrição que permita identificar o talhão <br />
                <b>3. Tamanho:</b> Informe o tamanho do talhão <br />
                <b>4. Salvar:</b> Botão para salvar todos os dados <br />
              </p>
            </div>
          </div>

          {{-- Talhões List --}}
          <div id="listTalhao">
            <div style="margin: 10% 10% 10% 10%">
              <h2> Listando e filtrando talhões cadastrados </h2>
              <p>
                Listar os talhões de determinada fazenda. <br />

                <b>1. Selecionar Fazenda:</b> Todo talhão pertence à uma fazenda; use o campo Selecionar Fazenda para listar as fazendas registradas.<br /> Na lista, selecione uma fazenda para listar os talhões <br />
                <b>2. Campo para digitar:</b> Use o teclado virtual para digitar algum trecho do nome do talhão <br />
                <b>3. Botão Buscar:</b> Lista os resultados obtidos com base no que foi digitado no campo de texto <br />
                <b>4. Lista de Talhões:</b> Lista todos os talhões registrados ou os resultados da busca. Toque na linha de determinado talhão para obter mais detalhes sobre ele  <br />
                Toque na linha de determinada fazenda para obter mais detalhes sobre ela <br />
              </p>
            </div>
          </div>

          {{-- Talhões Update --}}
          <div id="updateTalhao">
            <div style="margin: 10% 10% 10% 10%">
              <h2>Alterando e atualizando os dados do talhão</h2>
              <p>
                Para registrar um talhão, é necessário que ao menos uma fazenda esteja cadastrada.<br />
                Todos os campos são obrigatórios.<br />
                <b>1. Fazenda:</b> Toque no campo Selecionar Fazenda para listar as fazendas. Na lista, selecione a fazenda na qual o talhão pertencerá <br />
                <b>2. Descrição:</b> Atribua uma descrição que permita identificar o talhão <br />
                <b>3. Tamanho:</b> Informe o tamanho do talhão <br />
                <b>4. Excluir Talhão:</b> Todos os dados do talhão são deletados<br />
                <b>5. Salvar:</b> Botão para salvar todos os dados
              </p>
            </div>
          </div>

          {{-- HomePage --}}
          <div id="homepage">
            <div style="margin: 10% 10% 10% 10%">
              <h2>Itens da tela principal</h2>
              <p>
                Os ícones representam cada conjunto de operações que podem ser realizadas sobre Cultivares, Semeaduras, Fazendas, Talhões e conta do cliente.<br />
                <b>1. Cultivares:</b> Toque no ícone de cultivares se desejar listar ou filtrar cultivares <br />
                <b>2. Semeaduras:</b> O ícone de semeaduras leva a uma tela para realizar cálculos de semeadura <br />
                <b>3. Fazendas:</b> Operações para registrar, listar ou alterar dados de uma fazenda <br />
                <b>4. Talhões:</b> Operações para registrar, listar ou alterar dados de um talhão <br />
                <b>5. Usuário:</b> Apresenta todos os dados do usuário <br />
              </p>
            </div>
          </div>

          {{-- CultivarList --}}
          <div id="listCultivar">
            <div style="margin: 10% 10% 10% 10%">
              <h2>Lista das variedades de cultivares</h2>
              <p>
                Lista todas as variedades de cultivares.<br />
                Para ver detalhes da variedade basta tocar na linha em que ela se encontra. Feito isso, uma nova tela com todas as características será exibida
              </p>
            </div>
          </div>

          {{-- Cultivar Selecionada --}}
          <div id="cultivarSelected">
            <div style="margin: 10% 10% 10% 10%">
              <h2>Variedade de cultivar selecionada</h2>
              <p>Exibe todas as características da variedade selecionada. <br />
                Lista todas as doenças e a respectiva tolerância. <br />
                As tolerâncias são representadas por siglas.<br />
                Cada sigla pode ter seu significado consultado na legenda que fica no rodapé da tela.
              </p>
            </div>
          </div>

          {{-- Cultivar Ciclo --}}
          <div id="cultivarCiclo">
            <div style="margin: 10% 10% 10% 10%">
              <h2>Filtrar variedades de cultivar por meio do ciclo</h2>
              <p>Todos os ciclos são listados na tela.<br />
                Selecione um ciclo para listar as variedades que pertencem à ele.
              </p>
            </div>
          </div>

          {{-- Cultivar Rendimento --}}
          <div id="cultivarRendimento">
            <div style="margin: 10% 10% 10% 10%">
              <h2>Lista de cultivares</h2>
              <p>Lista todas as variedades de cultivares ordenadas pelo maior rendimento de fibra.<br />
                Para ver detalhes da variedade basta tocar na linha em que ela se encontra.
                Feito isso, uma nova tela com todas as características será exibida
              </p>
            </div>
          </div>

          {{-- Cultivar Doencas --}}
          <div id="cultivarDoencas">
            <div style="margin: 10% 10% 10% 10%">
              <h2>Consultar variedades de cultivares e suas respectivas tolerâncias às doenças</h2>
              <p>Todas as doenças são listadas na tela.<br />
                Em cada linha, na frente do nome de cada doença, é possível ver um botão para Ativar e Desativar.<br />
                <b>1.</b> Quando o botão muda de cor e o círculo contido dentro dele vai para o lado direito significa que a doença foi selecionada <br />
                <b>2.</b> Quando o círculo contido no botão está no lado esquerdo significa que a doença não foi selecionada <br />
                <b>3.</b> O botão Próximo levará à tela com a lista das variedades, as doenças selecionadas e tolerâncias <br />
              </p>
            </div>
          </div>

          {{-- Semeadura --}}
          <div id="semeadura">
            <div style="margin: 10% 10% 10% 10%">
              <h2>Realizar cálculos para semeadura</h2>
              <p>A tela apresenta campos de informações cruciais para calcular o peso de sementes por metro, hectare, alqueire e o número de plantas por hectare.<br />
                <b>1. Cultivar:</b> Toque no campo Selecionar Cultivar para listar todas as variedades de cultivar. Na lista, selecione a variedade que deseja semear. <br />
                <b>2. Época de Semeadura:</b> Toque no campo Selecionar Época para listar todas as épocas de semeadura.
                Esta informação é importante para dizer se a variedade de cultivar escolhida é recomendada ou não para a época selecionada. <br />
                <b>3. Espaçamento:</b> Utilize o teclado numérico para informar o espaçamento. Ele deve ser um valor decimal, como por exemplo: 0.8 <br />
                <b>4. Germinação:</b> Utilize o teclado numérico para informar a taxa de germinação apresentada no saco de sementes <br />
                <b>5. Botão Calcular:</b> Para visualizar o resultado de todos os cálculos, toque no botão calcular <br />
              </p>
            </div>
          </div>

          {{-- Resultados dos Calculos --}}
          <div id="semeaduraCalculos">
            <div style="margin: 10% 10% 10% 10%">
              <h2>Resultados dos cálculos</h2>
              <p>
                São listadas todas as informações de semeadura e resultados dos cálculos.<br />
                <b>1. Época de Semeadura:</b> Toque no campo Selecionar Época para realizar novos cálculos <br />
                <b>2. Nome Cultivar:</b> Exibe o nome da variedade de cultivar selecionada para a semeadura <br />
                <b>3. Plantas/ha:</b> Exibe a quantidade de plantas por hectare na época selecionada <br />
                <b>4. Sementes (m):</b> Quantidade de sementes para semear em cada metro <br />
                <b>5. Sementes (kg/ha):</b> Peso, em quilogramas, que deve ser semeado em cada hectare <br />
                <b>6. Sementes (kg/alq):</b> Peso, em quilogramas, que deve ser semeado em cada alqueire <br />
                <b>7. Recomendação:</b> Um rótulo em vermelho pode surgir quando a varidade de cultivar não é recomendada para a época de semeadura selecionada <br />
                <b>8. Botão Salvar:</b> O Botão Salvar permite registrar todos os cálculos realizados
              </p>
            </div>
          </div>
        </div>
      </div>

      {{-- <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
      <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
      <br /><br /><br /><br /><br /><br /><br />
      <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /> --}}

    </div>
  </div>
@endsection
