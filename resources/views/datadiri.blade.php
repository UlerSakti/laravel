<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Diri</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                        url('/urban-vintage-78A265wPiO4-unsplash.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .card {
            background: rgba(26, 29, 36, 0.88);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 460px;
            padding: 32px;
            color: #f3f4f6;
        }
        .title {
            margin: 0 0 20px 0;
            text-align: center;
            font-size: 22px;
            font-weight: 700;
            letter-spacing: 0.5px;
            color: #ffffff;
        }
        .divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.12);
            margin-bottom: 24px;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        .info-table td {
            padding: 7px 0;
            vertical-align: top;
        }
        .info-table .label {
            width: 32%;
            color: #9ca3af;
            font-weight: 500;
        }
        .info-table .separator {
            width: 5%;
            color: #6b7280;
            text-align: center;
        }
        .info-table .value {
            width: 63%;
            color: #e5e7eb;
            font-weight: 400;
            line-height: 1.4;
        }
        .skills-container {
            margin-top: 22px;
            padding-top: 18px;
            border-top: 1px dashed rgba(255, 255, 255, 0.12);
        }
        .skills-label {
            font-size: 13px;
            color: #9ca3af;
            margin-bottom: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .badge-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        .badge {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #e5e7eb;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12.5px;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <div class="card">
        <h2 class="title">Data Diri</h2>
        <div class="divider"></div>

        <table class="info-table">
            <tr>
                <td class="label">Nama</td>
                <td class="separator">:</td>
                <td class="value">{{ $data['nama'] ?? 'M Raditya Zauhair' }}</td>
            </tr>
            <tr>
                <td class="label">NIM</td>
                <td class="separator">:</td>
                <td class="value">{{ $data['nim'] ?? '2555200012' }}</td>
            </tr>
            <tr>
                <td class="label">Program Studi</td>
                <td class="separator">:</td>
                <td class="value">{{ $data['prodi'] ?? 'Informatika' }}</td>
            </tr>
            <tr>
                <td class="label">Semester</td>
                <td class="separator">:</td>
                <td class="value">{{ $data['semester'] ?? '5' }}</td>
            </tr>
            <tr>
                <td class="label">Angkatan</td>
                <td class="separator">:</td>
                <td class="value">{{ $data['angkatan'] ?? '2024' }}</td>
            </tr>
            <tr>
                <td class="label">Profesi</td>
                <td class="separator">:</td>
                <td class="value">{{ $data['profesi'] ?? 'Full Stack Developer' }}</td>
            </tr>
            <tr>
                <td class="label">Email</td>
                <td class="separator">:</td>
                <td class="value">{{ $data['email'] ?? 'radityazauhair@example.com' }}</td>
            </tr>
            <tr>
                <td class="label">Alamat</td>
                <td class="separator">:</td>
                <td class="value">{{ $data['alamat'] ?? 'Jl. Pahlawan 7 Sidoarjo, Jawa Timur, Indonesia' }}</td>
            </tr>
        </table>

        <div class="skills-container">
            <div class="skills-label">Keahlian</div>
            <div class="badge-list">
                @foreach($data['keahlian'] as $skill)
                    <span class="badge">{{ $skill }}</span>
                @endforeach
            </div>
        </div>
    </div>

</body>
</html>