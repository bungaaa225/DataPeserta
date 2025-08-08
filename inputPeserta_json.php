<?php
//definisikan nama file JSON, yaitu peserta.json
define('FILE_JSON', 'peserta.json');

// prosedur untuk cek apakah file JSON ada, jika tidak ada, maka buat file JSON dengan data kosong
function cekFileJson()
{
    // jika file JSON tidak ada, maka
    if (!file_exists(FILE_JSON)) {
        // buat file JSON dengan data kosong
        file_put_contents(FILE_JSON, json_encode([]));
    }
}

// fungsi untuk membaca data dari file JSON
function bacaDataJson()
{
    // PHP tidak mengenal tipe data JSON, yang ada tipe data ARRAY, jadi lakukan konversi data JSON ke array dengan perintah "json_decode". setelah dikonversi, kembalikan hasil konversi ke fungsi yang memanggilnya menggunakan perintah "return".
    return json_decode(file_get_contents(FILE_JSON), true);
}


// proses saat form dikirim 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // panggil prosedur cekFilejson()
    cekFileJson();
    // simpan ke variabel dengan cara ambil data dari form (name input type)
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nomorhp = $_POST['nohp'];
    $alamat = $_POST['alamat'];

    // panggil fungsi bacaDataJson()
    $data_peserta = bacaDataJson();

    // cek apakah nomor peserta sudah ada
    for ($i = 0; $i < count($data_peserta); $i++) {
        // perbandingan nilai (=), perbandingan tipe data (==), perbandingan nilai dan tipe data (===)
        if ($data_peserta[$i]['namab'] == $nama) {
            // tampilkan pesan nomor peserta sudah ada
            echo "<script>alert('Peserta dengan nama $nama sudah ada!');</script>";
            // setelah tombol OK diklik pada pesan, alihkan halaman ke tambah.php
            echo "<script>window.location.href='indexPeserta.html';</script>";
            exit();
        }
    }
    // menambahkan data baru ke dalam array
    $data_peserta[] = [
        'namab' => $nama,
        'emailb' => $email,
        'nohpb' => $nomorhp,
        'alamatb' => $alamat
    ];

    // konversi data array pada "$data_peserta" ke JSON dengan perintah "json_encode". hasil konversi tempatkan ke file JSON dengan perintah "file_put_contents". format output JSON agar lebih mudah dibaca oleh manusia dengan perintah "JSON_PRETTY_PRINT".
    file_put_contents(FILE_JSON, json_encode($data_peserta, JSON_PRETTY_PRINT));
    // tampilkan pesan data berhasil ditambah
    echo "<script>alert('Data berhasil ditambahkan!');</script>";
    // setelah tombol OK diklik pada pesan, alihkan halaman ke tambah.php
    echo "<script>window.location.href='indexPeserta.html';</script>";
}
?>