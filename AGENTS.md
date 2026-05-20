# 🤖 AGENTS.md - Contexto Técnico (Portfólio Scheleder)

Este documento contém o contexto arquitetural e as regras de implementação para este projeto de portfólio. Serve como guia principal para IA ou desenvolvedores atuando no repositório.

---

## 🏗️ Arquitetura e Padrões

1. **Stack Simplificada (Monolito Vanilla):**
   - O projeto não utiliza frameworks JavaScript complexos (como React, Vue ou Angular).
   - O renderizador primário é o **PHP Vanilla**, mas os arquivos são majoritariamente compostos por marcação HTML5 direta.
   - Não há build step (Webpack, Vite). O projeto está "pronto para produção" da forma como está.

2. **Gerenciamento de Estilos (UI):**
   - A base responsiva do layout é garantida pelo **Bootstrap 5.2.0** importado via CDN.
   - Modificações específicas de layout (cores, ajustes finos, background) devem ser feitas em `css/styles.css`.
   - Evite injetar CSS inline (`style=""`) nos elementos; dê preferência à utilização de classes utilitárias do Bootstrap ou a criação de novas classes no `styles.css`.

3. **Navegação:**
   - O projeto utiliza uma barra de navegação responsiva embutida em todas as páginas `<nav class="navbar...">`.
   - Se uma nova página for criada, o link deve ser adicionado manualmente a todas as outras páginas `.php` no menu de navegação, a menos que as páginas passem por uma refatoração para incluir partes modulares (ex: `include('header.php')`). No formato atual, a navbar é repetida por arquivo.

4. **Ícones:**
   - Para inserir ícones adicionais, utilize a sintaxe de Web Component do Ionicons: `<ion-icon name="nome-do-icone"></ion-icon>`. Não utilize bibliotecas redundantes de ícones como FontAwesome se o Ionicons já estiver suprindo a necessidade.

---

## 🔒 Restrições Técnicas

- **Sem Banco de Dados:** O portfólio atual opera sem comunicação com bancos de dados. Textos, experiências profissionais e descrições de projetos estão "hardcoded" no HTML.
- **Formulários de Contato:** Atualmente a página de contatos (`contact.php`) redireciona para URLs e envios nativos do sistema operacional (ex: links `mailto:` ou da API do WhatsApp). Caso seja implementado um envio via backend (ex: `PHPMailer`), deverá ser criado um endpoint dedicado no próprio PHP.

---

## 📝 Estilo de Código

- Mantenha a indentação coerente e feche apropriadamente todas as tags HTML.
- Evite misturar muita lógica PHP pesada no topo das views se isso for implementado futuramente; caso aconteça, abstraia lógicas em arquivos auxiliares e os inclua (`require_once`).
- Nomenclatura de arquivos e pastas adota padrão de caixa baixa em inglês (`education.php`, `projects.php`).
