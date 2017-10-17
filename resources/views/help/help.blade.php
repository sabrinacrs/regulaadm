@extends('layouts.userhelp')

@section('content')
    <div class="row">
      <div class="container container-content" style="margin-top: 10%">

      <div class="col-md-offset-1">
        <div style="text-align: justify; text-justify: inter-word;">
          {{-- Introdução --}}
          <div id="introducao">
              <div style="margin: 10% 10% 10% 10%">
                <h2> Introdução</h2>
                <p> A tela de login contém campos de identificação de usuário para que seja possível usar as funções do aplicativo.<br />
                    Todos os campos são obrigatórios.<br />
                1. Login ou E-mail: Use o teclado virtual para digitar o login ou e-mail do cliente cadastrado <br />
                2. Senha: Digite a senha do cliente <br />
                3. Entrar: Use o botão entrar para checar as informações fornecidas e acessar o menu principal do aplicativo <br />
                </p>

              </div>
          </div>

          {{-- Login --}}
          <div id="login">
              <div style="margin: 10% 10% 10% 10%">
                <h2> Login</h2>
                <p> A tela de login contém campos de identificação de usuário para que seja possível usar as funções do aplicativo.<br />
                    Todos os campos são obrigatórios.<br />
                1. Login ou E-mail: Use o teclado virtual para digitar o login ou e-mail do cliente cadastrado <br />
                2. Senha: Digite a senha do cliente <br />
                3. Entrar: Use o botão entrar para checar as informações fornecidas e acessar o menu principal do aplicativo <br />
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
                  1. Nome Completo: Use o teclado virtual para digitar seu nome completo<br />
                  2. E-mail: Digite seu e-mail para usar caso precise logar ou recuperar informações do aplicativo<br />
                  3. Login: O login é seu nome de usuário; digite um nome de usuário para logar-se no aplicativo<br />
                  4. Senha: A senha deve ter no mínimo três dígitos<br />
                  5. Confirmar Senha: Use o campo de confirmar senha para verificar se a senha definida foi digitada corretamete<br />
                  6. Salvar: O botão Salvar registra todas as informações digitadas e cria uma conta para o cliente<br />
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
                  1. Dados Pessoais: <br />
                    &nbsp;&nbsp;&nbsp;&nbsp;1.1 Nome Completo: Use o teclado virtual para digitar seu nome completo <br />
                    &nbsp;&nbsp;&nbsp;&nbsp;1.2 Telefone: Se desejar, informe seu número de telefone <br />
                    &nbsp;&nbsp;&nbsp;&nbsp;1.3 CPF: Se desejar, informe o número de seu CPF <br />
                  2. Dados de Localização: <br />
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

                1. Informações básicas: <br />
                &nbsp;&nbsp;&nbsp;&nbsp;1.1 Nome: Use o teclado virtual para digitar o nome da fazenda <br>
                &nbsp;&nbsp;&nbsp;&nbsp;1.2 Hectares: Informe o tamanho da fazenda em hectares <br />
                &nbsp;&nbsp;&nbsp;&nbsp;1.3 Observações: Se desejar, adicione observações quaisquer à fazenda <br />
                2. Informações de Contato: <br />
                &nbsp;&nbsp;&nbsp;&nbsp;2.1 E-mail: E-mail da fazenda <br />
                &nbsp;&nbsp;&nbsp;&nbsp;2.2 Endereço Web: Url do site (www.fazenda.com.br) ou qualquer rede (Facebook, Twitter, Instagram) alternativa que permita entrar em contato com a fazenda <br />
                &nbsp;&nbsp;&nbsp;&nbsp;2.2 Telefone: Número de telefone para contato <br />
                3. Informações de Localização: <br />
                &nbsp;&nbsp;&nbsp;&nbsp;Você pode utilizar os campos para fornecer uma localização com bairro, cidade, UF. <br />
                4. Salvar: Botão para salvar todos os dados <br />
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

                1. Informações básicas: <br />
                &nbsp;&nbsp;&nbsp;&nbsp;1.1 Nome: Use o teclado virtual para digitar o nome da fazenda <br>
                &nbsp;&nbsp;&nbsp;&nbsp;1.2 Hectares: Informe o tamanho da fazenda em hectares <br />
                &nbsp;&nbsp;&nbsp;&nbsp;1.3 Observações: Se desejar, adicione observações quaisquer à fazenda <br />
                2. Informações de Contato: <br />
                &nbsp;&nbsp;&nbsp;&nbsp;2.1 E-mail: E-mail da fazenda <br />
                &nbsp;&nbsp;&nbsp;&nbsp;2.2 Endereço Web: Url do site (www.fazenda.com.br) ou qualquer rede (Facebook, Twitter, Instagram) alternativa que permita entrar em contato com a fazenda <br />
                &nbsp;&nbsp;&nbsp;&nbsp;2.2 Telefone: Número de telefone para contato <br />
                3. Informações de Localização: <br />
                &nbsp;&nbsp;&nbsp;&nbsp;Você pode utilizar os campos para fornecer uma localização com bairro, cidade, UF. <br />
                4. Excluir Fazenda: Todos os dados da fazenda são deletados, impossibilitando a consulta e registro de semeaduras e talhões para a fazenda <br />
                5. Salvar: Botão para salvar todos os dados <br />
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

                1. Campo para digitar: Use o teclado virtual para digitar algum trecho do nome da fazenda. <br />
                2. Botão Buscar: Lista os resultados obtidos com base no que foi digitado no campo de texto <br />
                3. Lista de Fazendas: Lista todas as fazendas registradas ou os resultados da busca.
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

                1. Fazenda: Toque no campo Selecionar Fazenda para listar as fazendas. Na lista, selecione a fazenda na qual o talhão pertencerá  <br />
                2. Descrição: Atribua uma descrição que permita identificar o talhão <br />
                3. Tamanho: Informe o tamanho do talhão <br />
                4. Salvar: Botão para salvar todos os dados <br />
              </p>
            </div>
          </div>

          {{-- Talhões List --}}
          <div id="listTalhao">
            <div style="margin: 10% 10% 10% 10%">
              <h2> Listando e filtrando talhões cadastrados </h2>
              <p>
                Listar os talhões de determinada fazenda. <br />

                1. Selecionar Fazenda: Todo talhão pertence à uma fazenda; use o campo Selecionar Fazenda para listar as fazendas registradas.<br /> Na lista, selecione uma fazenda para listar os talhões <br />
                2. Campo para digitar: Use o teclado virtual para digitar algum trecho do nome do talhão <br />
                3. Botão Buscar: Lista os resultados obtidos com base no que foi digitado no campo de texto <br />
                4. Lista de Talhões: Lista todos os talhões registrados ou os resultados da busca. Toque na linha de determinado talhão para obter mais detalhes sobre ele  <br />
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
                1. Fazenda: Toque no campo Selecionar Fazenda para listar as fazendas. Na lista, selecione a fazenda na qual o talhão pertencerá <br />
                2. Descrição: Atribua uma descrição que permita identificar o talhão <br />
                3. Tamanho: Informe o tamanho do talhão <br />
                4. Excluir Talhão: Todos os dados do talhão são deletados<br />
                5. Salvar: Botão para salvar todos os dados
              </p>
            </div>
          </div>

          {{-- HomePage --}}
          <div id="homepage">
            <div style="margin: 10% 10% 10% 10%">
              <h2>Itens da tela principal</h2>
              <p>
                Os ícones representam cada conjunto de operações que podem ser realizadas sobre Cultivares, Semeaduras, Fazendas, Talhões e conta do cliente.<br />
                1. Cultivares: Toque no ícone de cultivares se desejar listar ou filtrar cultivares <br />
                2. Semeaduras: O ícone de semeaduras leva a uma tela para realizar cálculos de semeadura <br />
                3. Fazendas: Operações para registrar, listar ou alterar dados de uma fazenda <br />
                4. Talhões: Operações para registrar, listar ou alterar dados de um talhão <br />
                5. Usuário: Apresenta todos os dados do usuário <br />
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
                1. Quando o botão muda de cor e o círculo contido dentro dele vai para o lado direito significa que a doença foi selecionada <br />
                2. Quando o círculo contido no botão está no lado esquerdo significa que a doença não foi selecionada <br />
                3. O botão Próximo levará à tela com a lista das variedades, as doenças selecionadas e tolerâncias <br />
              </p>
            </div>
          </div>

          {{-- Semeadura --}}
          <div id="semeadura">
            <div style="margin: 10% 10% 10% 10%">
              <h2>Realizar cálculos para semeadura</h2>
              <p>A tela apresenta campos de informações cruciais para calcular o peso de sementes por metro, hectare, alqueire e o número de plantas por hectare.<br />
                1. Cultivar: Toque no campo Selecionar Cultivar para listar todas as variedades de cultivar. Na lista, selecione a variedade que deseja semear. <br />
                2. Época de Semeadura: Toque no campo Selecionar Época para listar todas as épocas de semeadura.
                Esta informação é importante para dizer se a variedade de cultivar escolhida é recomendada ou não para a época selecionada. <br />
                3. Espaçamento: Utilize o teclado numérico para informar o espaçamento. Ele deve ser um valor decimal, como por exemplo: 0.8 <br />
                4. Germinação: Utilize o teclado numérico para informar a taxa de germinação apresentada no saco de sementes <br />
                5. Botão Calcular: Para visualizar o resultado de todos os cálculos, toque no botão calcular <br />
              </p>
            </div>
          </div>

          {{-- Resultados dos Calculos --}}
          <div id="semeaduraCalculos">
            <div style="margin: 10% 10% 10% 10%">
              <h2>Resultados dos cálculos</h2>
              <p>
                São listadas todas as informações de semeadura e resultados dos cálculos.<br />
                1. Época de Semeadura: Toque no campo Selecionar Época para realizar novos cálculos <br />
                2. Nome Cultivar: Exibe o nome da variedade de cultivar selecionada para a semeadura <br />
                3. Plantas/ha: Exibe a quantidade de plantas por hectare na época selecionada <br />
                4. Sementes (m): Quantidade de sementes para semear em cada metro <br />
                5. Sementes (kg/ha): Peso, em quilogramas, que deve ser semeado em cada hectare <br />
                6. Sementes (kg/alq): Peso, em quilogramas, que deve ser semeado em cada alqueire <br />
                7. Recomendação: Um rótulo em vermelho pode surgir quando a varidade de cultivar não é recomendada para a época de semeadura selecionada <br />
                8. Botão Salvar: O Botão Salvar permite registrar todos os cálculos realizados
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
