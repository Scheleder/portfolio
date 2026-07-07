<?php

namespace App\Http\Controllers;

use App\Mail\UserAccessApproved;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserApprovalController
{
    public function handle(Request $request, User $user)
    {
        // Valida se o link assinado é legítimo e ainda não expirou
        if (! $request->hasValidSignature()) {
            abort(401, 'Link de autorização expirado ou inválido.');
        }

        // Processa a aprovação via POST
        if ($request->isMethod('post')) {
            $status = $request->input('status');

            if ($status === 'approve') {
                $user->is_blocked = false;
                $user->save();

                // Envia e-mail de confirmação para o novo usuário
                Mail::to($user->email)->send(new UserAccessApproved($user));

                return redirect()->route('portfolio.index')->with('success', "O acesso de {$user->name} foi liberado e o e-mail de confirmação enviado!");
            }

            return redirect()->route('portfolio.index')->with('success', "O cadastro de {$user->name} permanece bloqueado.");
        }

        // Exibe a página de análise via GET
        return view('portfolio.user-approval', compact('user'));
    }
}
