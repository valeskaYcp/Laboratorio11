<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            @if($contact->imagen)
                <div class="flex justify-center mb-6">
                    <img src="{{ asset($contact->imagen) }}" alt="Imagen de {{ $contact->first_name }} {{ $contact->last_name }}" class="w-32 h-32 rounded-full object-cover">
                </div>
            @else
                <div class="flex justify-center mb-6">
                    <p class="text-gray-400">No hay imagen disponible</p>
                </div>
            @endif
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Nombres</h3>
                    <p class="mt-1 text-sm text-gray-600">{{ $contact->first_name }}</p>
                </div>
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Apellidos</h3>
                    <p class="mt-1 text-sm text-gray-600">{{ $contact->last_name }}</p>
                </div>
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Número</h3>
                    <p class="mt-1 text-sm text-gray-600">{{ $contact->phone }}</p>
                </div>
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Correo electrónico</h3>
                    <p class="mt-1 text-sm text-gray-600">{{ $contact->email }}</p>
                </div>
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Edad</h3>
                    <p class="mt-1 text-sm text-gray-600">{{ $contact->edad }}</p>
                </div>
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Sexo</h3>
                    <p class="mt-1 text-sm text-gray-600">{{ $contact->sexo }}</p>
                </div>
                <div class="sm:col-span-2">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Apodo</h3>
                    <p class="mt-1 text-sm text-gray-600">{{ $contact->apodo }}</p>
                </div>
            </div>
            <div class="mt-6 flex justify-between">
                <x-secondary-button onclick="location.href='{{ route('contacts.edit', $contact) }}'">Editar</x-secondary-button>
                <x-secondary-button onclick="location.href='{{ route('contacts.index') }}'">Volver</x-secondary-button>
            </div>
        </div>
    </div>
</x-app-layout>
