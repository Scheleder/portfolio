<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Tip;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Criar usuário administrador padrão
        User::create([
            'name' => 'João Scheleder',
            'email' => 'admin@scheleder.com',
            'password' => bcrypt('admin'),
            'is_admin' => true,
            'is_blocked' => false,
            'bio' => 'Desenvolvedor Full-stack e administrador do TechTips Repository.',
        ]);

        // 2. Criar Categorias e Subcategorias
        $categories = [
            'Backend' => [
                'description' => 'Dicas e receitas relacionadas a desenvolvimento backend e lógica de servidor.',
                'subcategories' => [
                    'Laravel' => 'Framework PHP moderno para artesãos da web.',
                    'PHP Vanilla' => 'Lógica e funções nativas do PHP estruturado.',
                    'Node.js' => 'Ambiente de execução Javascript server-side.',
                ]
            ],
            'Frontend' => [
                'description' => 'Guias e truques de design, layouts responsivos e lógica do lado do cliente.',
                'subcategories' => [
                    'Livewire' => 'Componentes dinâmicos e reativos para Laravel.',
                    'Tailwind CSS' => 'Framework CSS utilitário para estilização rápida.',
                    'ReactJS' => 'Biblioteca JS para interfaces de usuário.',
                ]
            ],
            'DevOps & Ferramentas' => [
                'description' => 'Servidores, conteinerização, controle de versão e ambientes de desenvolvimento.',
                'subcategories' => [
                    'Docker' => 'Conteinerização e gerenciamento de ambientes isolados.',
                    'Git' => 'Controle de versão de código fonte.',
                    'Laragon' => 'Ambiente de desenvolvimento web rápido e produtivo para Windows.',
                ]
            ],
            'Banco de Dados' => [
                'description' => 'Consultas SQL, modelagem e administração de sistemas de banco de dados.',
                'subcategories' => [
                    'MariaDB' => 'Banco de dados relacional de código aberto, rápido e robusto.',
                    'MySQL' => 'Sistema de gerenciamento de banco de dados SQL mais popular.',
                    'SQLite' => 'Banco de dados local leve e baseado em arquivo único.',
                ]
            ]
        ];

        foreach ($categories as $catName => $catData) {
            $category = Category::create([
                'name' => $catName,
                'slug' => str($catName)->slug()->toString(),
                'description' => $catData['description']
            ]);

            foreach ($catData['subcategories'] as $subName => $subDesc) {
                Subcategory::create([
                    'category_id' => $category->id,
                    'name' => $subName,
                    'slug' => str($subName)->slug()->toString(),
                    'description' => $subDesc
                ]);
            }
        }

        // 3. Criar Dicas/Tips de Exemplo
        $subLaravel = Subcategory::where('name', 'Laravel')->first();
        $subLivewire = Subcategory::where('name', 'Livewire')->first();
        $subTailwind = Subcategory::where('name', 'Tailwind CSS')->first();
        $subDocker = Subcategory::where('name', 'Docker')->first();
        $subMariaDB = Subcategory::where('name', 'MariaDB')->first();

        // Tip 1: Laravel Cache Clear
        Tip::create([
            'subcategory_id' => $subLaravel->id,
            'title' => 'Comandos Essenciais para Limpeza de Cache no Laravel',
            'content' => "Quando ocorrem problemas de sincronização de rotas, configurações ou views atualizadas que não refletem no navegador, execute esta sequência de comandos Artisan:\n\n```bash\n# Limpar o cache de configuração\nphp artisan config:clear\n\n# Limpar o cache de rotas\nphp artisan route:clear\n\n# Limpar o cache das Views compiladas\nphp artisan view:clear\n\n# Limpar o cache geral do sistema (Cache::put)\nphp artisan cache:clear\n```\n\nEstes comandos removem os arquivos compilados temporários e forçam o Laravel a recarregar as versões mais recentes do seu código.",
            'type' => 'comando',
            'tags' => ['laravel', 'cache', 'artisan', 'performance'],
            'is_public' => true,
            'view_count' => 15
        ]);

        // Tip 2: Livewire Loading States
        Tip::create([
            'subcategory_id' => $subLivewire->id,
            'title' => 'Como utilizar Estados de Carregamento (wire:loading) no Livewire',
            'content' => "Para melhorar a experiência do usuário (UX) em requisições assíncronas do Livewire, você pode usar a diretiva `wire:loading` para exibir spinners ou ocultar elementos durante o processamento:\n\n```html\n<div>\n    <button wire:click=\"save\" class=\"btn-primary\">\n        Salvar Registro\n    </button>\n\n    <!-- Elemento exibido apenas durante a execução de 'save' -->\n    <div wire:loading wire:target=\"save\" class=\"text-blue-500 font-medium mt-2\">\n        <svg class=\"animate-spin h-5 w-5 mr-3 inline\" viewBox=\"0 0 24 24\"><!-- Spinner --></svg>\n        Processando salvamento...\n    </div>\n</div>\n```\n\nA diretiva `wire:target` garante que o spinner seja exibido apenas para o método específico que está processando.",
            'type' => 'snippet',
            'tags' => ['livewire', 'frontend', 'ux', 'wire:loading'],
            'is_public' => true,
            'view_count' => 8
        ]);

        // Tip 3: Tailwind Custom Fonts
        Tip::create([
            'subcategory_id' => $subTailwind->id,
            'title' => 'Configurar Fontes Customizadas no tailwind.config.js',
            'content' => "Para adicionar uma fonte externa do Google Fonts (como 'Outfit' ou 'Inter') ao seu projeto Tailwind, siga as seguintes etapas:\n\n1. Importe a fonte no arquivo CSS principal ou no `<head>`:\n```html\n<link href=\"https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;700&display=swap\" rel=\"stylesheet\">\n```\n\n2. Configure o arquivo `tailwind.config.js`:\n```javascript\nmodule.exports = {\n  theme: {\n    extend: {\n      fontFamily: {\n        sans: ['Outfit', 'sans-serif'],\n        display: ['Outfit', 'sans-serif'],\n      },\n    },\n  },\n}\n```\n\nIsso estende a família padrão de fontes sans-serif para usar a fonte Outfit automaticamente.",
            'type' => 'tutorial',
            'tags' => ['tailwind', 'css', 'fontes', 'customização'],
            'is_public' => true,
            'view_count' => 12
        ]);

        // Tip 4: Docker Compose MariaDB
        Tip::create([
            'subcategory_id' => $subDocker->id,
            'title' => 'Docker Compose Pronto para MariaDB e phpMyAdmin',
            'content' => "Aqui está uma receita rápida de `docker-compose.yml` para levantar um container do MariaDB integrado com o phpMyAdmin para administração visual:\n\n```yaml\nversion: '3.8'\n\nservices:\n  db:\n    image: mariadb:10.11\n    container_name: mariadb_techtips\n    restart: always\n    environment:\n      MYSQL_ROOT_PASSWORD: root\n      MYSQL_DATABASE: tech_tips\n    ports:\n      - \"3306:3306\"\n    volumes:\n      - db_data:/var/lib/mysql\n\n  phpmyadmin:\n    image: phpmyadmin/phpmyadmin\n    container_name: phpmyadmin_techtips\n    restart: always\n    ports:\n      - \"8080:80\"\n    environment:\n      PMA_HOST: db\n\nvolumes:\n  db_data:\n```\n\nExecute `docker-compose up -d` para iniciar ambos os serviços.",
            'type' => 'snippet',
            'tags' => ['docker', 'compose', 'mariadb', 'phpmyadmin'],
            'is_public' => true,
            'view_count' => 24
        ]);

        // Tip 5: SQL Query Optimization
        Tip::create([
            'subcategory_id' => $subMariaDB->id,
            'title' => 'Otimização Básica de Consultas com EXPLAIN no MariaDB',
            'content' => "Antes de criar índices complexos, verifique o plano de execução de uma consulta SQL lenta utilizando o comando `EXPLAIN`:\n\n```sql\nEXPLAIN SELECT tips.*, subcategories.name \nFROM tips \nJOIN subcategories ON tips.subcategory_id = subcategories.id \nWHERE tips.type = 'dica' \nORDER BY tips.created_at DESC;\n```\n\nFoque nos campos:\n- `type`: Indica o tipo de junção/busca. Evite `ALL` (full table scan) em tabelas grandes.\n- `possible_keys`: Chaves/índices que poderiam ser usados.\n- `key`: O índice que foi realmente escolhido.\n- `rows`: Número estimado de linhas avaliadas.",
            'type' => 'método',
            'tags' => ['sql', 'explain', 'mariadb', 'performance'],
            'is_public' => true,
            'view_count' => 5
        ]);
    }
}
