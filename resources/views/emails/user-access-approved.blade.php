@component('mail::message')
# Olá, {{ $user->name }}!

Boas notícias! O seu acesso ao **TechTips Repository** foi analisado e **liberado** com sucesso por um administrador.

Agora você já pode fazer login na plataforma utilizando seu e-mail e a senha cadastrada:

@component('mail::button', ['url' => url('/admin/login'), 'color' => 'success'])
Acessar Plataforma
@endcomponent

Atenciosamente,<br>
**TechTips Repository**
@endcomponent
