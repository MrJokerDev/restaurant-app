<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-create :route="route('admin.reservations.create')"></x-create>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                <th scope="col" class="px-6 py-3">
                                    Full name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Contacts
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Reservation Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                     Table
                               </th>
                                <th scope="col" class="px-6 py-3">
                                    Guest number
                                </th>
                                <th scope="col" class="px-6 py-3">
                                     Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reservations as $reservation)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $reservation->first_name }} {{ $reservation->last_name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        Mail: {{ $reservation->email }} <br>
                                        Phone: {{ $reservation->phone_number }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $reservation->res_date }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $reservation->table->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $reservation->guest_number }}
                                    </td>
                                    <td class="px-6 py-4 flex">
                                        <x-edit :route="route('admin.reservations.edit', $reservation->id)"></x-edit>
                                        <x-delete :route="route('admin.reservations.destroy', $reservation->id)"></x-delete>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="p-5">
                        {{ $reservations->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
