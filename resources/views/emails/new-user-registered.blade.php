@component('mail::message')
# Olá, Administrador

Um novo usuário se cadastrou no **TechTips Repository** e está aguardando a liberação de acesso:

* **Nome:** {{ $user->name }}
* **E-mail:** {{ $user->email }}
* **Data de Registro:** {{ $user->created_at->format('d/m/Y H:i') }}

Para aprovar ou recusar a liberação de acesso a este usuário, clique no botão abaixo:

@component('mail::button', ['url' => $approvalUrl, 'color' => 'success'])
Analisar Solicitação
@endcomponent

Atenciosamente,<br>
**TechTips Repository**
@endcomponent
