<x-mail::message>
# Olá!

Alguém compartilhou uma dica de tecnologia com você diretamente do **TechTips Repository**:

## {{ $tip->title }}

* **Tipo:** {{ ucfirst($tip->type) }}
* **Categoria:** {{ $tip->subcategory->category->name }} ({{ $tip->subcategory->name }})
* **Tags:** {{ is_array($tip->tags) ? implode(', ', $tip->tags) : $tip->tags }}

---

### Conteúdo da Dica:

{!! Str::markdown($tip->content) !!}

---

Para visualizar esta dica de forma interativa com imagens anexadas, acesse:

<x-mail::button :url="route('tip.show', $tip->slug)">
Visualizar Dica no TechTips
</x-mail::button>

Obrigado,<br>
**{{ config('app.name') }}**
</x-mail::message>
