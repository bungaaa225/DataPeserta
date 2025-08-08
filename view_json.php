    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9ff;
        }
        tr:nth-child(odd) {
            background-color: #fff;
        }
        caption {
            font-size: 1.5em;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-link:hover {
            background-color: #0056b3;
        }
    </style>

<?php
define('FILE_JSON', 'peserta.json');

function cekFileJson()
{
    if (!file_exists(FILE_JSON)) {
        file_put_contents(FILE_JSON, json_encode([]));
    }
    $json = file_get_contents(FILE_JSON);
    return json_decode($json, true);
}

$data_peserta = cekFileJson();
$total_data = count($data_peserta);
if ($total_data == 0) {
    echo "<center><h1>List Peserta</h1></center>";
    echo "<table border='1'>
    <th>No.</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Nomor Handphone</th>
    <th>Alamat</th>";
    echo "</table>";
    echo "<center><button onclick='window.location.href=\"tambah.php\";'>+</button></center>";
} else {
    echo "<center><h1>List Peserta</h1></center>";
    echo "<table border='1'>
		  <th>No.</th>
		  <th>Nama</th>
		  <th>Email</th>
		  <th>Nomor Handphone</th>
		  <th>Alamat</th>";

    for ($i = 0; $i < $total_data; $i++) {
        $peserta = $data_peserta[$i];

        // Menampilkan No
        echo "<tr>";
        echo "<td>" . ($i + 1) . "</td>";

        // Menampilkan Nama Peserta
        echo "<td>" . htmlspecialchars($peserta['namab']) . "</td>";

        // Menampilkan Email Peserta
        echo "<td>" . htmlspecialchars($peserta['emailb']) . "</td>";

        // Menampilkan Nomor HP Peserta
        echo "<td>" . htmlspecialchars($peserta['nohpb']) . "</td>";

        // Menampilkan Alamat Peserta
        echo "<td>" . htmlspecialchars($peserta['alamatb']) . "</td>";

        echo "</tr>";
    }
    echo "</table>";

    echo "<center><button onclick='window.location.href=\"indexPeserta.html\";'>+</button></center>";
}

?>