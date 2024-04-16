<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Table Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('admin.tables.update', $table->id) }}" method="POST" enctype="multipart/form-data" class="max-w-sm mx-auto">
                        @csrf
                        @method('PUT')
                        <div class="mb-5">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Table Name</label>
                            <input type="text" name="name" id="name" value="{{ $table->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required />
                        </div>
                        <div class="mb-5">
                            <label for="guest_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                            <input type="number" name="guest_number" id="guest_number" value="{{ $table->guest_number }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required />
                        </div>
                        <div class="mb-5">
                            <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                            <select id="categories" name="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach(\App\Enums\TableLocation::cases() as $location)
                                    <option value="{{ $location->value }}" @if($table->location->value === $location->value) selected @endif>{{ $location->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                            <select id="categories" name="status"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach(\App\Enums\TableStatus::cases() as $status)
                                    <option value="{{ $status->value }}" @if($table->status->value === $status->value) selected @endif>{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
