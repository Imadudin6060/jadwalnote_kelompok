<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Catatan / Jadwal') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('notes.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-black">Judul</label>
                        <input type="text" name="title" id="title" class="w-full rounded p-2" required>
                    </div>

                    <div class="mb-4">
                        <label for="schedule_date" class="block text-sm font-medium text-black">Tanggal</label>
                        <input type="date" name="schedule_date" id="schedule_date" class="w-full rounded p-2" required>
                    </div>

                    <div class="mb-
                        <label for="content" class="block text-sm font-medium text-black">Isi Catatan</label>
                        <textarea name="content" id="content" rows="4" class="w-full rounded p-2"></textarea>
                    </div>

                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
