# 👨‍💻 Portfólio Profissional - João Scheleder Neto

Um website de portfólio pessoal e profissional com foco em apresentar a trajetória, as habilidades, os projetos e as experiências de João Scheleder Neto, atuante como **Desenvolvedor Full-stack** e **Técnico de Automação Industrial**.

---

## 📖 Sobre o Projeto

Este projeto consiste em um site estático e responsivo estruturado em PHP (para facilidade de navegação e componentização futura) e HTML5. A interface foi construída para exibir de forma elegante o currículo e as realizações profissionais do desenvolvedor, com design adaptável para múltiplos dispositivos.

---

## 🚀 Estrutura de Páginas

A navegação do portfólio é dividida nas seguintes seções:
- **`index.php` (Home):** Página de boas-vindas com introdução rápida e link para o currículo em PDF.
- **`welcome.php` (Perfil):** Detalhes adicionais sobre o autor.
- **`education.php` (Formação):** Histórico acadêmico e qualificações técnicas.
- **`carreer.php` (Experiência):** Histórico de trabalho e posições ocupadas.
- **`projects.php` (Projetos):** Galeria de sistemas desenvolvidos (Apps Android, ERP, Softwares desktop, projetos de automação).
- **`contact.php` (Contato):** Links rápidos de comunicação (E-mail, WhatsApp, LinkedIn, GitHub, etc.).

---

## 🛠️ Tecnologias Utilizadas

- **Linguagem Principal:** PHP 8+ (utilizado majoritariamente como renderizador de páginas HTML).
- **Estrutura:** HTML5.
- **Estilização:** 
  - CSS3 puro (`css/styles.css`).
  - **Bootstrap 5.2.0** via CDN para grid responsivo e componentes de interface (navbar, botões).
- **Tipografia e Ícones:** 
  - Google Fonts (família *Roboto*).
  - **Ionicons 5.5** para ícones vetorizados na interface.
- **Interatividade:** JavaScript Vanilla (`js/scripts.js`).

---

## ⚙️ Como Executar o Projeto Localmente

Como o projeto possui extensão `.php`, você precisará de um servidor web com suporte a PHP para executá-lo corretamente.

1. **Requisito:** Instale um ambiente de desenvolvimento local (ex: [Laragon](https://laragon.org/), [XAMPP](https://www.apachefriends.org/), ou WAMP).
2. **Clone ou Mova** os arquivos do projeto para o diretório raiz do seu servidor local:
   - Laragon: `C:\laragon\www\portfolio\`
   - XAMPP: `C:\xampp\htdocs\portfolio\`
3. **Inicie o Servidor:** Inicie o serviço Apache no seu ambiente local.
4. **Acesse no Navegador:**
   Abra `http://localhost/portfolio` (ou o virtual host configurado no Laragon, como `http://portfolio.test`).

---

## 📂 Organização de Diretórios

```text
portfolio/
├── css/              # Folhas de estilo customizadas (styles.css)
├── docs/             # Arquivos para download (ex: currículo em PDF)
├── ico/              # Favicons e manifestos PWA (apple-touch-icon, etc)
├── img/              # Imagens e assets (logo, fotos de perfil, wallpapers)
├── js/               # Scripts customizados
└── *.php             # Páginas estruturais do portfólio
```

---
*João Scheleder Neto &copy; 2022-2023*
