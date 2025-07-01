<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - TOKO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <div class="p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal text-body-emphasis">Dashboard - TOKO</h1>
        <p class="fs-5 text-body-secondary"><?= date("l, d-F-Y") ?></p>
    </div>
    <hr>

    <div class="table-responsive card m-5 p-5">
        <h4 class="mb-3">Transaksi Pembelian</h4>

        <table id="pembelian-table" class="table text-center">
            <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 10%;">Username</th>
                    <th style="width: 30%;">Alamat</th>
                    <th style="width: 15%;">Total Harga</th>
                    <th style="width: 10%;">Ongkir</th>
                    <th style="width: 10%;">Status</th>
                    <th style="width: 20%;">Tanggal Transaksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <script>
    $(document).ready(function() {
        $.ajax({
            url: "http://localhost:8080/api",
            method: "GET",
            headers: {
                // 4. PASTIKAN KEY INI SESUAI DENGAN .env PROYEK TOKO ANDA
                "Key": "random123678abcghi"
            },
            success: function(response) {
                let data = response.results;
                let tableBody = "";
                let no = 1;

                if (response.status.code === 200 && data.length > 0) {
                    data.forEach(function(transaksi) {
                        let totalItem = 0;
                        if (transaksi.details && Array.isArray(transaksi.details)) {
                            transaksi.details.forEach(function(detail) {
                                totalItem += parseInt(detail.jumlah);
                            });
                        }

                        tableBody += `
                                <tr>
                                    <td>${no++}</td>
                                    <td>${transaksi.username}</td>
                                    <td>${transaksi.alamat}</td>
                                    <td>
                                        ${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(transaksi.total_harga)}
                                        <br>
                                        <small class="text-muted">(${totalItem} Item)</small>
                                    </td>
                                    <td>${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(transaksi.ongkir)}</td>
                                    <td>${transaksi.status == 1 ? '<span class="badge bg-success">Sudah Selesai</span>' : '<span class="badge bg-danger">Belum Selesai</span>'}</td>
                                    <td>${new Date(transaksi.created_at).toLocaleString('id-ID', { dateStyle: 'medium', timeStyle: 'short' })}</td>
                                </tr>
                            `;
                    });
                } else {
                    let colCount = 7; // Jumlah kolom di tabel
                    tableBody =
                        `<tr><td colspan="${colCount}" class="text-center">Data tidak ditemukan.</td></tr>`;
                }

                $("#pembelian-table tbody").html(tableBody);
            },
            error: function(err) {
                console.log(err);
                let colCount = 7;
                $("#pembelian-table tbody").html(
                    `<tr><td colspan="${colCount}" class="text-center">Gagal memuat data dari API.</td></tr>`
                );
            }
        });
    });
    </script>
</body>

</html>