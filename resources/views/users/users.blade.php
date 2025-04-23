<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usuários') }}
        </h2>
    </x-slot>

    <div class="bg-green-600 hover:bg-green-700"></div>

    <div class="py-8 mt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('users.create') }}"
                   class="bg-activa-primary hover:bg-activa-dark text-white font-semibold py-2 px-4 rounded">
                    Criar Usuário
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-activa-dark text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium">Nome</th>
                            <th class="px-6 py-3 text-left text-sm font-medium">Email</th>
                            <th class="px-6 py-3 text-left text-sm font-medium">Telefone</th>
                            <th class="px-6 py-3 text-left text-sm font-medium">Perfil</th>
                            <th class="px-6 py-3 text-left text-sm font-medium">Status</th>
                            <th class="text-center px-6 py-3 text-left text-sm font-medium">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-center px-6 py-4 text-sm text-gray-900">{{ $user->name }}</td>
                                <td class="text-center px-6 py-4 text-sm text-gray-900">{{ $user->email }}</td>
                                <td class="text-center px-6 py-4 text-sm text-gray-900">{{ $user->phone }}</td>
                                <td class="text-center px-6 py-4 text-sm text-gray-900">{{ ucfirst($user->role) }}</td>
                                <td class="text-center px-6 py-4 text-sm">
                                    @if ($user->blocked)
                                        <span class="text-center text-red-600 font-semibold">Bloqueado</span>
                                    @else
                                        <span class="text-center text-green-600 font-semibold">Ativo</span>
                                    @endif
                                </td>
                                <td class="text-center px-6 py-4 text-sm text-gray-900 space-x-2">
                                    <a href="{{ route('users.edit', $user) }}"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded">Editar</a>
            
                                    <form action="{{ route('users.block', $user) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                                class="{{ $user->blocked ? 'bg-green-600 hover:bg-green-700' : 'bg-red-600 hover:bg-red-700' }} text-white py-1 px-3 rounded">
                                            {{ $user->blocked ? 'Desbloquear' : 'Bloquear' }}
                                        </button>
                                    </form>
                                    
                                </td>
                            </tr>
                        @endforeach
                        @if ($users->isEmpty())
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">Nenhum usuário encontrado.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>                        
        </div>
    </div>
</x-app-layout>
