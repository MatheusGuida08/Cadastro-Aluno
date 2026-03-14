# 📚 Sistema de Cadastro de Alunos

Sistema desenvolvido em PHP para gerenciar o cadastro de alunos de uma turma, permitindo armazenar, listar, buscar e calcular a média das notas dos alunos cadastrados.

---

## 📋 Descrição

O **Sistema de Cadastro de Alunos** é um programa de linha de comando que utiliza arrays para armazenar as informações de até **10 alunos**. O sistema conta com um menu interativo que permite ao usuário realizar diferentes operações sobre os dados cadastrados.

---

## ⚙️ Funcionalidades

- **Cadastrar aluno** — Registra nome, idade, curso e nota final do aluno nos arrays correspondentes.
- **Listar alunos** — Exibe todos os alunos cadastrados com suas respectivas informações. Caso não haja registros, exibe uma mensagem informando que não há alunos cadastrados.
- **Buscar aluno pelo nome** — Permite pesquisar um aluno pelo nome. Se encontrado, exibe todos os seus dados; caso contrário, informa que o aluno não foi encontrado.
- **Calcular média da turma** — Soma todas as notas dos alunos cadastrados e exibe a média da turma. Caso não haja alunos, informa que o cálculo não é possível.
- **Sair** — Encerra a execução do programa.

---

## 🗂️ Estrutura dos Dados

Cada aluno possui as seguintes informações, armazenadas em arrays separados:

| Campo       | Tipo    | Descrição                        |
|-------------|---------|----------------------------------|
| Nome        | string  | Nome completo do aluno           |
| Idade       | int     | Idade do aluno                   |
| Curso       | string  | Nome do curso que o aluno faz    |
| Nota Final  | float   | Nota final obtida pelo aluno     |

---

## 🖥️ Tecnologias Utilizadas

- **PHP** — Linguagem utilizada para o desenvolvimento do sistema.

---

## ▶️ Como Executar

**Pré-requisito:** ter o PHP instalado na máquina.

1. Clone o repositório:
   ```bash
   git clone https://github.com/MatheusGuida08/Cadastro-Aluno.git
   ```

2. Acesse a pasta do projeto:
   ```bash
   cd Cadastro-Aluno
   ```

3. Execute o programa:
   ```bash
   php index.php
   ```

---

## 📌 Observações

- O sistema suporta o cadastro de no máximo **10 alunos**.
- O programa continua em execução até que o usuário selecione a opção **Sair** no menu.

---

## 👨‍💻 Autor

Desenvolvido por **Matheus Guida** como atividade prática da disciplina.
