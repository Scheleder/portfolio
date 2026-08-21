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

---

## 🚀 Regras de Deploy e Git

- **Não commitar ou fazer push diretamente na branch `master`**: A Hostinger está configurada com deploy automático (via webhooks/auto-update) ao detectar alterações na branch `master`. Para evitar deploys prematuros de códigos em desenvolvimento, qualquer commit ou push deve ser feito em branches de desenvolvimento ou deixados para aprovação/ação manual do desenvolvedor.

## graphify

This project has a knowledge graph at graphify-out/ with god nodes, community structure, and cross-file relationships.

When the user types `/graphify`, use the installed graphify skill or instructions before doing anything else.

Rules:
- For codebase questions, first run `graphify query "<question>"` when graphify-out/graph.json exists. Use `graphify path "<A>" "<B>"` for relationships and `graphify explain "<concept>"` for focused concepts. These return a scoped subgraph, usually much smaller than GRAPH_REPORT.md or raw grep output.
- Dirty graphify-out/ files are expected after hooks or incremental updates; dirty graph files are not a reason to skip graphify. Only skip graphify if the task is about stale or incorrect graph output, or the user explicitly says not to use it.
- If graphify-out/wiki/index.md exists, use it for broad navigation instead of raw source browsing.
- Read graphify-out/GRAPH_REPORT.md only for broad architecture review or when query/path/explain do not surface enough context.
- After modifying code, run `graphify update .` to keep the graph current (AST-only, no API cost).
