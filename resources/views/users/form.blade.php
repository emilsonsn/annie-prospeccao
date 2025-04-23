<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($user) ? 'Editar Usuário' : 'Criar Usuário' }}
        </h2>
    </x-slot>


    <div class="py-8 mt-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <form method="POST" action="{{ isset($user) ? route('users.update', $user) : route('users.store') }}">
                    @csrf
                    @if(isset($user))
                        @method('PUT')
                    @endif

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nome</label>
                        <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}"
                               class="w-full border-gray-300 rounded mt-1" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}"
                               class="w-full border-gray-300 rounded mt-1" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Telefone</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone ?? '') }}"
                               class="w-full border-gray-300 rounded mt-1">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Perfil</label>
                        <select name="role" class="w-full border-gray-300 rounded mt-1" required>
                            <option value="">Selecione</option>
                            <option value="admin" {{ old('role', $user->role ?? '') === 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ old('role', $user->role ?? '') === 'user' ? 'selected' : '' }}>Usuário</option>
                        </select>
                    </div>

                    @if(!isset($user))
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Senha</label>
                            <input type="password" name="password" class="w-full border-gray-300 rounded mt-1" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Confirme a Senha</label>
                            <input type="password" name="password_confirmation" class="w-full border-gray-300 rounded mt-1" required>
                        </div>
                    @endif

                    <div class="flex justify-end">
                        <a href="{{ route('users') }}"
                           class="mr-3 bg-gray-300 hover:bg-gray-400 text-black py-2 px-4 rounded">
                            Cancelar
                        </a>
                        <button type="submit"
                                class="bg-activa-primary hover:bg-activa-dark text-white py-2 px-4 rounded">
                            {{ isset($user) ? 'Atualizar' : 'Criar' }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
