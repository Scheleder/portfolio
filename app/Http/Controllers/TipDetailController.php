<?php

namespace App\Http\Controllers;

use App\Events\TipViewed;
use App\Mail\ShareTip;
use App\Models\Tip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TipDetailController
{
    public function show($slug)
    {
        $tip = Tip::where('slug', $slug)
            ->where(function ($query) {
                $query->where('is_public', true);
                if (auth()->check()) {
                    $query->orWhere('user_id', auth()->id());
                }
            })
            ->with(['subcategory.category', 'images'])
            ->firstOrFail();

        // Dispara o evento de visualização
        event(new TipViewed($tip));

        return view('portfolio.tip-detail', compact('tip'));
    }

    public function share(Request $request, $slug)
    {
        $tip = Tip::where('slug', $slug)
            ->where(function ($query) {
                $query->where('is_public', true);
                if (auth()->check()) {
                    $query->orWhere('user_id', auth()->id());
                }
            })
            ->firstOrFail();

        $request->validate([
            'email' => 'required|email',
        ]);

        Mail::to($request->email)->send(new ShareTip($tip));

        return back()->with('success', 'Dica compartilhada com sucesso por e-mail!');
    }
}
