# 🌌 Descubra seu Signo do Zodíaco

Este é um projeto web simples desenvolvido em PHP que permite aos usuários descobrirem qual é o seu signo do zodíaco com base na sua data de nascimento. O sistema calcula o signo do usuário e exibe as principais características e uma breve descrição sobre ele.

## 🚀 Funcionalidades

- **Entrada de Dados:** Formulário simples onde o usuário insere a sua data de nascimento.
- **Validação Front-end:** Impede o envio de datas vazias ou datas no futuro utilizando JavaScript e exibe alertas elegantes através de Modais do Bootstrap.
- **Processamento Back-end:** A lógica em PHP cruza a data fornecida com os períodos de cada signo para encontrar o resultado correto (mesmo lidando com a virada do ano, como no caso de Capricórnio).
- **Leitura de XML:** Todos os dados dos signos (nome, datas de início/fim e descrição) são dinamicamente extraídos de um arquivo XML.

## 🛠️ Tecnologias Utilizadas

- **PHP:** Linguagem back-end principal responsável por processar a data e buscar o signo correto.
- **XML:** Usado como "banco de dados" leve para armazenar as informações dos signos.
- **JavaScript:** Responsável pelas validações no lado do cliente.
- **HTML5 / CSS3 & Bootstrap:** Estruturação da página e estilização (incluindo responsividade e modais).

## 📂 Estrutura de Arquivos

```text
projetoSignosZodiacoPHP/
│
├── db/
│   └── signos.xml                  # Arquivo XML contendo os dados dos signos
│
├── assets/
│   ├── layouts/
│   │   ├── header.php              # Cabeçalho da página (inclusão de CSS/Fontes)
│   │   └── show_zodiac_sign.php    # Lógica em PHP e tela de exibição do resultado
│   │
│   └── js/
│       └── script.js               # Script de validação de datas no lado do cliente
│
└── index.php                       # Página inicial contendo o formulário (Ponto de entrada)
```

## ⚙️ Como executar o projeto localmente

Como o projeto utiliza PHP, você precisará de um servidor web local para rodá-lo. Você pode usar pacotes como **XAMPP**, **WAMP**, **Laragon**, ou o servidor embutido do próprio PHP.

### Opção 1: Usando XAMPP, WAMP ou similar

1. Faça o download e instale o [XAMPP](https://www.apachefriends.org/pt_br/index.html) (ou seu servidor local de preferência).
2. Copie a pasta inteira do projeto (`projetoSignosZodiacoPHP`) para o diretório raiz do seu servidor web:
   - No XAMPP: Cole dentro da pasta `htdocs` (ex: `C:\xampp\htdocs\projetoSignosZodiacoPHP`).
   - No WAMP: Cole dentro da pasta `www`.
3. Abra o Painel de Controle do XAMPP e inicie o serviço **Apache**.
4. Abra o seu navegador e acesse a URL:
   `http://localhost/projetoSignosZodiacoPHP/`

### Opção 2: Usando o servidor embutido do PHP (Requer PHP instalado na máquina)

1. Certifique-se de ter o PHP instalado e adicionado às variáveis de ambiente (Path) do seu sistema.
2. Abra o terminal (Prompt de Comando ou PowerShell).
3. Navegue até a raiz da pasta do projeto:
   ```bash
   cd C:\Users\diego\Documents\Projetos\projetoSignosZodiacoPHP
   ```
4. Inicie o servidor embutido do PHP executando o comando:
   ```bash
   php -S localhost:8000
   ```
5. Abra o seu navegador e acesse a URL:
   `http://localhost:8000`
