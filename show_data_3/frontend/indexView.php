<?php

?>

<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Datatable</title>

    <!-- Bootstrap CSS for DataTables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap5.css">

    <!-- Bottom CSS for DataTables -->
    <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.7/af-2.7.0/b-3.1.2/b-colvis-3.1.2/b-html5-3.1.2/b-print-3.1.2/cr-2.0.4/date-1.5.4/fc-5.0.2/fh-4.0.1/kt-2.12.1/r-3.0.3/rg-1.5.0/rr-1.5.0/sc-2.4.3/sb-1.8.0/sp-2.3.2/sl-2.1.0/sr-1.4.1/datatables.min.css"
          rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="../../css/style.css">

    <!-- DataTables JS -->
    <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script defer
            src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <script defer src="https://cdn.datatables.net/2.1.7/js/dataTables.bootstrap5.js"></script>

    <!-- Bottom JS for DataTables -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script defer
            src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.7/af-2.7.0/b-3.1.2/b-colvis-3.1.2/b-html5-3.1.2/b-print-3.1.2/cr-2.0.4/date-1.5.4/fc-5.0.2/fh-4.0.1/kt-2.12.1/r-3.0.3/rg-1.5.0/rr-1.5.0/sc-2.4.3/sb-1.8.0/sp-2.3.2/sl-2.1.0/sr-1.4.1/datatables.min.js"></script>

    <script defer src="../../js/script.js"></script>

</head>
<body>
<div class="container mt-5">
    <h3 class="text-center mt-5 mb-5">Cargando datos desde Railway</h3>
    <table id="myTableRailway" class="table table-striped table-bordered table-hover shadow" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>DESCRIPTION</th>
            <th>STOCK</th>
            <th>PRICE</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
        <tfoot>
        <tr>
            <th>ID</th>
            <th>DESCRIPTION</th>
            <th>STOCK</th>
            <th>PRICE</th>
        </tr>
        </tfoot>
    </table>
</div>

</body>
</html>
