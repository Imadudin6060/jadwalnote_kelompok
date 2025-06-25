<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="flex justify-center space-x-4 mt-8 mb-6">
    <a href="{{ route('notes.index') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded">
        📝 Lihat Daftar Jadwal
    </a>
    <a href="{{ route('notes.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded">
        ➕ Tambah Jadwal Manual
    </a>
</div>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-xl font-bold mb-4 text-black">📅 Kalender Jadwal</h3>
                <div id="calendar"></div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendarEl = document.getElementById('calendar');

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                events: '/calendar-events',

                dateClick: function (info) {
                    const title = prompt('Masukkan judul jadwal:');
                    if (title) {
                        fetch('/notes', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                title: title,
                                schedule_date: info.dateStr,
                                content: 'Dibuat dari kalender'
                            })
                        }).then(response => {
                            if (response.ok) {
                                alert('Jadwal berhasil ditambahkan!');
                                calendar.refetchEvents();
                            } else {
                                alert('Gagal menyimpan jadwal.');
                            }
                        });
                    }
                }
            });

            calendar.render();
        });
    </script>
</x-app-layout>
