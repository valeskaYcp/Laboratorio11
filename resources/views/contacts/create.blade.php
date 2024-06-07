<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('contacts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="first_name" class="block text-md font-medium leading-6 text-gray-900">Nombres</label>
                    <div class="mt-2">
                        <input type="text" name="first_name" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" required value="{{ old('first_name') }}">
                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="last_name" class="block text-md font-medium leading-6 text-gray-900">Apellidos</label>
                    <div class="mt-2">
                        <input type="text" name="last_name" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" value="{{ old('last_name') }}">
                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="phone" class="block text-md font-medium leading-6 text-gray-900">Número</label>
                    <div class="mt-2">
                        <input type="text" name="phone" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" value="{{ old('phone') }}" required>
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>
                </div>
                <div class="sm:col-span-4">
                    <label for="email" class="block text-md font-medium leading-6 text-gray-900">Correo electrónico</label>
                    <div class="mt-2">
                        <input type="email" name="email" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" value="{{ old('email') }}">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="edad" class="block text-md font-medium leading-6 text-gray-900">Edad</label>
                    <div class="mt-2">
                        <input type="number" name="edad" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" value="{{ old('edad') }}">
                        <x-input-error :messages="$errors->get('edad')" class="mt-2" />
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="sexo" class="block text-md font-medium leading-6 text-gray-900">Sexo</label>
                    <div class="mt-2">
                        <select name="sexo" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="">Seleccione</option>
                            <option value="Masculino" {{ old('sexo') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="Femenino" {{ old('sexo') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                            <option value="Otro" {{ old('sexo') == 'Otro' ? 'selected' : '' }}>Otro</option>
                        </select>
                        <x-input-error :messages="$errors->get('sexo')" class="mt-2" />
                    </div>
                </div>
                <div class="sm:col-span-6">
                    <label for="apodo" class="block text-md font-medium leading-6 text-gray-900">Apodo</label>
                    <div class="mt-2">
                        <input type="text" name="apodo" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" value="{{ old('apodo') }}">
                        <x-input-error :messages="$errors->get('apodo')" class="mt-2" />
                    </div>
                </div>
                <div class="sm:col-span-6">
                    <label for="imagen" class="block text-md font-medium leading-6 text-gray-900">Imagen</label>
                    <div class="mt-2">
                        <input type="file" name="imagen" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
                    </div>
                </div>
            </div>
        </form>
        <div class="mt-8 flex justify-center">
            <div class="space-x-6">
                <x-primary-button>Guardar</x-primary-button>
                <x-secondary-button onclick="location.href='{{ route('contacts.index') }}'">Cancelar</x-secondary-button>
            </div>
    </div>
</x-app-layout>

