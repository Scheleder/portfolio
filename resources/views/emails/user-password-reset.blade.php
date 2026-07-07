@component('mail::message')
# Olá, {{ $user->name }}!

A sua senha de acesso ao **TechTips Repository** foi redefinida por um administrador.

Aqui está a sua nova senha temporária:
<div style="font-size: 20px; font-weight: bold; text-align: center; margin: 20px 0; padding: 10px; background-color: #f1f5f9; border-radius: 8px; font-family: monospace;">{{ $newPassword }}</div>

Por motivos de segurança, orientamos você a fazer o login e **alterar a sua senha imediatamente no seu próximo acesso** (através da opção "Meu Perfil" no painel).

@component('mail::button', ['url' => url('/admin/login'), 'color' => 'success'])
Acessar Plataforma
@endcomponent

Atenciosamente,<br>
**TechTips Repository**
@endcomponent
