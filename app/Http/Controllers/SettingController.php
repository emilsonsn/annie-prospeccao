<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::where('user_id', Auth::id())->first();
        return view('settings.form', compact('setting'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'server' => 'required',
            'port' => 'required',
            'encryption' => 'nullable|in:ssl,tls',
        ]);

        Setting::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'email' => $request['email'],
                'password' => $request['password'],
                'server' => $request['server'],
                'port' => $request['port'],
                'encryption' => $request['encryption'],
                'is_active' => $request->has('is_active'),
            ]
        );

        return redirect()->route('setting')->with('success', 'Configuração salva.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'server' => 'required',
            'port' => 'required',
            'encryption' => 'nullable|in:ssl,tls',
        ]);

        $setting = Setting::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $setting->update([
            'email' => $request['email'],
            'password' => $request['password'],
            'server' => $request['server'],
            'port' => $request['port'],
            'encryption' => $request['encryption'],
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('setting')->with('success', 'Configuração atualizada.');
    }
}
