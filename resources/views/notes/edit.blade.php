<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ✏️ Edit Catatan
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('notes.update', $note->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 font-medium">Judul</label>
                        <input type="text" name="title" value="{{ old('title', $note->title) }}" required
                            class="w-full mt-1 p-2 border rounded bg-white dark:bg-gray-700 dark:text-white">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 font-medium">Isi Catatan</label>
                        <textarea name="content" required
                            class="w-full mt-1 p-2 border rounded bg-white dark:bg-gray-700 dark:text-white">{{ old('content', $note->content) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 font-medium">Tanggal Jadwal</label>
                        <input type="date" name="schedule_date" value="{{ old('schedule_date', $note->schedule_date) }}" required
                            class="w-full mt-1 p-2 border rounded bg-white dark:bg-gray-700 dark:text-white">
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('notes.index') }}" class="text-gray-600 dark:text-gray-400">← Kembali</a>
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">💾 Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
