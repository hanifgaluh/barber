<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data dengan Kalender</title>
    <!-- Load Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Load jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Load Bootstrap Datepicker CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- Load Bootstrap Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Input Data dengan Kalender</h2>
        <form>
            <div class="form-group">
                <label for="inputNama">Nama:</label>
                <input type="text" class="form-control" id="inputNama" placeholder="Masukkan nama">
            </div>
            <div class="form-group">
                <label for="inputTanggal">Tanggal:</label>
                <input type="text" class="form-control" id="inputTanggal" placeholder="Pilih tanggal">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Initialize Bootstrap Datepicker -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#inputTanggal').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });
        });
    </script>
</body>
</html>
