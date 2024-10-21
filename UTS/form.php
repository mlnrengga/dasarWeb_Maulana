    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulir Data Siswa</title>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
        <style>
            body {
                background-image: url('download.jpg');
                height: 100vh;
                background-position: center;
                background-size: cover;
            }

            .form-container {
                border: 1px solid #ddd;
                border-radius: 8px;
                padding: 20px;
                box-shadow: 0px 0px 20px grey;   
                backdrop-filter: blur(10px);
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1 class="mt-4">Isi Formulir Data Mahasiswa</h1>
            <div class="form-container mt-3">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>

                    <div class="form-group">
                        <label for="kelas">Kelas:</label>
                        <input type="text" class="form-control" name="kelas" id="kelas">
                    </div>

                    <div class="form-group">
                        <label for="jurusan">Jurusan:</label>
                        <input type="text" class="form-control" name="jurusan" id="jurusan">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>

                    <label for="opsi">Pilih Opsi:</label><br>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="opsi1" name="opsi" class="custom-control-input" value="Opsi 1">
                        <label class="custom-control-label" for="opsi1">Opsi 1</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="opsi2" name="opsi" class="custom-control-input" value="Opsi 2">
                        <label class="custom-control-label" for="opsi2">Opsi 2</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="opsi3" name="opsi" class="custom-control-input" value="Opsi 3">
                        <label class="custom-control-label" for="opsi3">Opsi 3</label>
                    </div>
                    <div class="d-flex justify-content mt-4">
                        <button type="submit" class="btn btn-primary mr-2">Kirim</button>
                        <a href="index.html" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
    </html>