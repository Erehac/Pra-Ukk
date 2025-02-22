<?php
include_once '../Controller/crud_distribusi.php';

if (isset($_GET['id_distribusi'])) {
    $id_distribusi = $_GET['id_distribusi'];
    $distribusiController = new DistribusiController();
    $distribusi = $distribusiController->readOne($id_distribusi);
}

if (isset($_POST['confirm_delete'])) {
    $distribusiController->delete($id_distribusi);  
    header("Location: V_distribusi.php");  
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Hapus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            max-width: 600px;
            margin: 100px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 20px;
            font-size: 18px;
        }

        .button-group {
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            text-align: center;
        }

        .btn-delete {
            background-color: red;
            color: white;
        }

        .btn-cancel {
            background-color: gray;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 15px;
            }

            h1 {
                font-size: 1.5em;
            }

            p {
                font-size: 16px;
            }

            .btn {
                width: 100%;
                font-size: 18px;
                padding: 15px;
            }

            .button-group {
                display: block;
            }

            .btn-cancel {
                margin-top: 10px;
            }
        }

        @media (max-width: 480px) {
            .container {
                width: 95%;
                padding: 10px;
            }

            h1 {
                font-size: 1.3em;
            }

            p {
                font-size: 14px;
            }

            .btn {
                width: 100%;
                font-size: 16px;
                padding: 12px;
            }

            .btn-cancel {
                margin-top: 8px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Konfirmasi Hapus</h1>
    <p>Apakah Anda yakin ingin menghapus data <strong><?= $distribusi['nama_motor'] ?></strong>?</p>
    <div class="button-group">
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?= $id ?>" />
            <button type="submit" name="confirm_delete" class="btn btn-delete">Hapus</button>
        </form>
        <a href="V_distribusi.php"><button class="btn btn-cancel">Batal</button></a>
    </div>
</div>

</body>
</html>
