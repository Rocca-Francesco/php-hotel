<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    // variabile per il filtro parcheggio
    $parking_decision = $_GET["parking"] ?? "";
    // variabile per il filtro delle stelle
    $stars_decision = $_GET["vote"] ?? "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Hotel</title>

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h1>Lista di Hotel</h1>
    <p>Scegli le caratteristiche del tuo hotel.</p>
    <form action="" method="GET">
      <div class="d-flex">
        <div class="me-4">
          <label class="d-block" for="parking">Vuoi il parcheggio auto?</label>
            <select class="my-2" name="parking" id="parking">
              <option value="">Indifferente</option>
              <option value="1">Sì</option>
              <option value="0">No</option>
            </select>
        </div>
        <div>
          <label class="d-block" for="vote">Almeno quante stelle deve avere il tuo hotel?</label>
            <select class="my-2" name="vote" id="vote">
              <option value="5">Indifferente</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
        </div>
      </div>
      <button class="d-block my-2">INVIA</button>
    </form>
    <table class="table table-dark table-striped">
      <thead>
        <tr>
           <?php foreach ($hotels[0] as $hotels_details => $detail) : ?>
             <th><?= $hotels_details ?></th>
           <? endforeach ?> 
        </tr>
      </thead>
      <tbody>
        <?php foreach ($hotels as $hotel) : ?>
          <?php if ($hotel["parking"] == $parking_decision || $parking_decision == "") : ?>
            <?php if ($hotel["vote"] <= $stars_decision || $stars_decision == "") : ?>
              <tr>
                <td><?= $hotel["name"]?></td>
                <td><?= $hotel["description"]?></td>
                <td><?= $hotel["parking"] ? "Disponibile" : "Non disponibile" ?></td>
                <td><?= $hotel["vote"]?></td>
                <td><?= $hotel["distance_to_center"]?></td>
              </tr>
            <? endif ?>
          <? endif ?>
        <? endforeach ?>
      </tbody>
    </table>
  </div>
</body>
</html>