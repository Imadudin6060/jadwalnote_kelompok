<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Users</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif; 
            margin: 0;
            padding: 0;
            background-color: #20232A; 
            color: #E0E0E0; 
            line-height: 1.6;
        }

        .header-bar {
            background-color: #282C34; 
            padding: 20px 40px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #61DAFB;
            font-size: 1.8em;
            font-weight: 600;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            background-color: #282C34; 
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4); 
            animation: fadeIn 0.8s ease-out; 
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 {
            color: #61DAFB; 
            text-align: center;
            margin-bottom: 35px;
            font-size: 2.8em;
            font-weight: 700;
            letter-spacing: 0.05em;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 30px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        th, td {
            padding: 15px 25px;
            text-align: left;
            color: #E0E0E0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1); 
        }
        th {
            background-color: #3B3E46; 
            color: #61DAFB;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.95em;
        }
        tbody tr:nth-child(even) {
            background-color: #2D3039; 
        }
        tbody tr:hover {
            background-color: #3A3E4A; 
            cursor: pointer;
        }
        tbody tr:last-child td {
            border-bottom: none; /
        }

        .back-link {
            display: inline-block;
            margin-top: 40px;
            padding: 12px 25px;
            background-color: #61DAFB; 
            color: #20232A;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 10px rgba(97, 218, 251, 0.3);
        }
        .back-link:hover {
            background-color: #4FB0E0; 
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(97, 218, 251, 0.4);
        }
    </style>
</head>
<body>
    <div class="header-bar">
        <span>Admin Panel</span>
        <span>JadwalNote</span>
    </div>

    <div class="container">
        <h1>Daftar Pengguna Terdaftar</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Terdaftar Sejak</th>
                    <th>Aksi</th> </tr>
                </tr>
            </thead>
            <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at->format('d M Y H:i') }}</td>
            <td>
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>
        </table>
        <a href="/" class="back-link">Kembali ke Beranda</a>
    </div>
</body>
</html>