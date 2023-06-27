<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- Required Meta Tag -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Fira+Code:wght@300&family=Fira+Sans+Condensed:wght@500&family=Lora:wght@500&family=Poppins:wght@300&display=swap"
          rel="stylesheet">

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
          crossorigin="anonymous">

    <!-- datatable style -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

    <!-- jquery -->
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

    <link rel="stylesheet" href="<?= base_url('./styles/bootstrap.min.css'); ?>">

    <!-- Styles -->
    <link rel="stylesheet" href="<?= base_url('./styles/style.css'); ?>">

    <title><?= $title; ?> | SIMASTI</title>
  </head>

  <body>
    <span class="background-img"><img src="<?= base_url(); ?>/images/bkkbn.png" alt="Background logo" class="w-100"></span>
    <?= $this->renderSection('content-container'); ?>

    <!-- JavaScript Bundle with Popper Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
            crossorigin="anonymous">
    </script>

    <!-- Font Awesone Icon -->
    <script src="https://kit.fontawesome.com/a1cf9facd4.js" crossorigin="anonymous"></script>

    <!-- jquery datatable -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

    <!-- Javascript File -->
    <script src="<?= base_url('./scripts/function.js'); ?>"></script>
  </body>

</html>