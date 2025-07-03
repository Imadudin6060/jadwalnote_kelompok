<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Jadwal & Catatan') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

                {{-- Tambah Catatan --}}
                <a href="{{ route('notes.create') }}"
                   class="inline-block mb-4 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                    ➕ Tambah Catatan / Jadwal
                </a>

                {{-- Jadwal Aktif --}}
                <h3 class="text-lg font-semibold mb-2 text-gray-800 dark:text-gray-100">📅 Jadwal Aktif</h3>

                @if ($activeNotes->count())
                    <table class="min-w-full mb-6 text-sm text-left text-gray-800 dark:text-gray-100">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-2">Judul</th>
                                <th class="px-4 py-2">Tanggal</th>
                                <th class="px-4 py-2">Isi Catatan</th>
                                <th class="px-4 py-2 text-center">Selesai</th>
                                <th class="px-4 py-2 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300 dark:divide-gray-600">
                            @foreach ($activeNotes as $note)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-4 py-2">{{ $note->title }}</td>
                                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($note->schedule_date)->format('d M Y') }}</td>
                                    <td class="px-4 py-2">{{ $note->content }}</td>
                                    <td class="px-4 py-2 text-center">
                                        <form method="POST" action="{{ route('notes.toggle', $note->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <input type="checkbox" onchange="this.form.submit()" {{ $note->is_done ? 'checked' : '' }}>
                                        </form>
                                    </td>
                                    <td class="px-4 py-2 text-center space-x-2">
                                        <a href="{{ route('notes.edit', $note->id) }}" class="text-blue-500 hover:underline">✏️ Edit</a>
                                        <form method="POST" action="{{ route('notes.destroy', $note->id) }}" class="inline"
                                              onsubmit="return confirm('Yakin ingin menghapus catatan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">🗑️ Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-600 dark:text-gray-400 mb-6">Belum ada catatan aktif.</p>
                @endif

                {{-- Jadwal Selesai (Arsip) --}}
                <h3 class="text-lg font-semibold mb-2 text-gray-800 dark:text-gray-100">📁 Jadwal Selesai (Arsip)</h3>

                @if ($archivedNotes->count())
                    <table class="min-w-full text-sm text-left text-gray-800 dark:text-gray-100">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-2">Judul</th>
                                <th class="px-4 py-2">Tanggal</th>
                                <th class="px-4 py-2">Isi Catatan</th>
                                <th class="px-4 py-2 text-center">Aktifkan</th>
                                <th class="px-4 py-2 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300 dark:divide-gray-600">
                            @foreach ($archivedNotes as $note)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 opacity-80">
                                    <td class="px-4 py-2 line-through">{{ $note->title }}</td>
                                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($note->schedule_date)->format('d M Y') }}</td>
                                    <td class="px-4 py-2">{{ $note->content }}</td>
                                    <td class="px-4 py-2 text-center">
                                        <form method="POST" action="{{ route('notes.toggle', $note->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <input type="checkbox" checked onchange="this.form.submit()">
                                        </form>
                                    </td>
                                    <td class="px-4 py-2 text-center space-x-2">
                                        <a href="{{ route('notes.edit', $note->id) }}" class="text-blue-400 hover:underline">✏️ Edit</a>
                                        <form method="POST" action="{{ route('notes.destroy', $note->id) }}" class="inline"
                                              onsubmit="return confirm('Yakin ingin menghapus catatan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:underline">🗑️ Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-600 dark:text-gray-400">Belum ada catatan selesai.</p>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
