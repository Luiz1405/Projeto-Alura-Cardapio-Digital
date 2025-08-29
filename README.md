# 🛒 CRUD de Produtos – Aplicação Web  

Este projeto é uma **aplicação web para gerenciamento de produtos (CRUD)** desenvolvida em **PHP (POO)**, utilizando conceitos de **Domain-Driven Design (DDD)**, **repositories** e **PDO para persistência em banco de dados**.  

Foi construído como parte de um processo de aprendizado para reforçar **habilidades de desenvolvimento backend** e demonstrar boas práticas de organização de projetos.  

---

## ✨ Funcionalidades  

- ✅ **Listar produtos** com detalhes (nome, tipo, descrição, preço e imagem)  
- ➕ **Criar (Cadastrar)** novos produtos  
- ✏️ **Atualizar (Editar)** produtos existentes  
- ❌ **Excluir (Remover)** produtos do banco de dados  
- 📄 **Gerar relatório em PDF** com os dados dos produtos  
- 🗂️ Estrutura organizada em **Domain**, **Repository** e **Infrastructure**  

---

## 🏗️ Estrutura do Projeto  

```
projeto-inicial/
├── css/
├── img/
├── js/
├── src/
│ ├── Domain/
│ │ └── Model/
│ │ └── Repository/
│ ├── Infrastructure/
│ │ └── Persistence/
│ │ └── Repository/
├── vendor/
├── cadastrar-produto.php
├── editar-produto.php
├── excluir-produto.php
├── admin.php
├── index.php
├── conteudo-pdf.php
├── gerador-pdf.php
├── composer.json
└── README.md
```

---

## 🛠️ Tecnologias Utilizadas  

- **PHP 8+** (Programação Orientada a Objetos)  
- **PDO** (Conexão e persistência com banco de dados)  
- **MySQL** (Banco de dados relacional)  
- **Composer** (Gerenciamento de dependências e autoload)  
- **HTML + CSS + JS** (Frontend)  
- **TCPDF / DomPDF** (Geração de relatórios em PDF)  

---

## 📸 Demonstração das Telas

### Listagem de Produtos
<img width="937" height="452" alt="lista-produtos" src="https://github.com/user-attachments/assets/df4e5ac5-ee81-46f2-a301-ddb7e005b418" />


### Tela de Administrador
<img width="897" height="341" alt="tela-adm" src="https://github.com/user-attachments/assets/d4744588-2d1a-439f-9768-c33080e9d40f" />

### Cadastro de Produto
<img width="239" height="316" alt="cadastro-produto" src="https://github.com/user-attachments/assets/d3dd49a8-9118-43bb-86ee-5db8e0fc451e" />

### Relatório em PDF

<img width="806" height="472" alt="pdf-relatorio" src="https://github.com/user-attachments/assets/7f232d32-d7ae-4a1d-bf10-efefa930ee47" />

---

📚 Objetivos de Aprendizado

- Praticar operações de CRUD em PHP
- Aplicar conceitos de Domain-Driven Design (DDD)
- Utilizar PDO para conexão segura com banco de dados
- Aprender a gerar relatórios em PDF
- Estruturar um projeto PHP com separação de responsabilidades

---

🚀 Melhorias Futuras

- Adicionar autenticação para acesso ao painel administrativo
- Implementar upload de imagens em vez de campo de texto
- Melhorar o frontend com design responsivo
- Criar testes automatizados

---

👨‍💻 Autor

Desenvolvido por Luiz Kubaszewski como parte do projeto da Alura – Criando Aplicação Web.

