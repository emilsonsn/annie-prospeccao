<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($setting) ? 'Editar Configuração de Email' : 'Criar Configuração de Email' }}
        </h2>
    </x-slot>

    <div class="py-8 mt-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <form method="POST" action="{{ isset($setting) ? route('settings.update', $setting->id) : route('settings.store') }}">
                    @csrf
                    @if(isset($setting))
                        @method('PUT')
                    @endif

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email', $setting->email ?? '') }}"
                               class="w-full border-gray-300 rounded mt-1" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Senha</label>
                        <input type="password" name="password" value="{{ old('password', $setting->password ?? '') }}"
                               class="w-full border-gray-300 rounded mt-1" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Servidor</label>
                        <input type="text" name="server" value="{{ old('server', $setting->server ?? '') }}"
                               class="w-full border-gray-300 rounded mt-1" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Porta</label>
                        <input type="text" name="port" value="{{ old('port', $setting->port ?? '') }}"
                               class="w-full border-gray-300 rounded mt-1" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Criptografia</label>
                        <select name="encryption" class="w-full border-gray-300 rounded mt-1">
                            <option value="">Nenhuma</option>
                            <option value="ssl" {{ old('encryption', $setting->encryption ?? '') === 'ssl' ? 'selected' : '' }}>SSL</option>
                            <option value="tls" {{ old('encryption', $setting->encryption ?? '') === 'tls' ? 'selected' : '' }}>TLS</option>
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('dashboard') }}"
                           class="mr-3 bg-gray-300 hover:bg-gray-400 text-black py-2 px-4 rounded">
                            Cancelar
                        </a>
                        <button type="submit"
                                class="bg-activa-primary hover:bg-activa-dark text-white py-2 px-4 rounded">
                            {{ isset($setting) ? 'Atualizar' : 'Criar' }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
