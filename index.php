<?php

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Page de vote</title>
    <style>
      body {
          font-family: Arial, sans-serif;
          background-color: #f4f4f4;
          margin: 0;
          padding: 20px;
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
        }

      form {
          background-color: #fff;
          padding: 20px;
          border-radius: 10px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          display: none; /* Masque le formulaire par défaut */
          flex-direction: column; /* Aligne les éléments en colonnes */
          align-items: center;
        }

      label {
        margin-bottom: 8px;
      }

      input {
        padding: 8px;
        margin-bottom: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: 100%; /* Remplit la largeur du conteneur */
      }

        progress {
          width: 100%;
          margin-bottom: 16px;
        }

        button {
          background-color: #3498db;
          color: #fff;
          padding: 10px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
      }

        button:hover {
          background-color: #258cd1;
        }
    </style>
</head>
<body>
  <span><h1>Présidentielles 2024</h1></span>
  
  <div id="p">
    <p class="green">un peuple </p> <p class="yellow">un but</p>
    <p class="red">une foi</p>
  </div>
  <div id="liste">
    <p>
      <label>Sélectionnez votre région </label>
      <select id="region"></select>
      <span class="nombre"></span>
    </p>
    <p>
      <label>Sélectionnez votre Département</label>
      <select id="departement"></select>
      <span class="nombre"></span>
    </p>
    <p>
      <label>Sélectionnez votre commune</label>
      <select id="commune"></select>
      <span class="nombre"></span>
    </p>
    <p>
      <label>Sélectionnez votre centre de vote</label>
      <select id="ct_vote"></select>
      <span class="nombre"></span>
    </p>
    <button id="showFormButton">Afficher le Formulaire</button>

<form id="scoreForm" action="traitement.php" method="post">

    
    <label for="bureau">Nom du Bureau de Vote:</label>
    <input type="text" id="bureau" name="bureau" required>

    <?php
  
    $connexion = mysqli_connect("localhost", "WISSY", "Wissy2005.", "election");

  
    if (!$connexion) {
        die("Erreur de connexion à la base de données: " . mysqli_connect_error());
    }


    $queryCandidats = "SELECT id_candidat, prenom, nom FROM candidats";
    $resultCandidats = mysqli_query($connexion, $queryCandidats);

    
    if ($resultCandidats) {
      
        while ($rowCandidat = mysqli_fetch_assoc($resultCandidats)) {
            echo '<label for="candidat' . $rowCandidat['id_candidat'] . '">' . $rowCandidat['prenom'] . ' ' . $rowCandidat['nom'] . ':</label>';
            echo '<input type="number" id="candidat' . $rowCandidat['id_candidat'] . '" name="scores[' . $rowCandidat['id_candidat'] . ']" required>';
        }
    }

    
    mysqli_close($connexion);
    ?>

    <button type="submit">Enregistrer les Scores</button>
</form>

  <script>
    document.getElementById('showFormButton').addEventListener('click', function () {
        document.getElementById('scoreForm').style.display = 'flex';
    });
    function updateProgressBar() {
        const inputs = document.querySelectorAll('input[name^="scores"]');
        const progressBar = document.getElementById('progressBar');
        let totalScore = 0;

        inputs.forEach(input => {
            totalScore += parseInt(input.value) || 0;
        });

        progressBar.value = totalScore;
    }
  </script>

  </div>

    
  <script type="text/javascript" language="javaScript Object Notation ">
    var tbl_region = [
      {"reg_code": "NR_01", "reg_nom": "Dakar"}, 
      {"reg_code": "NR_02", "reg_nom": "Dioubel"}, 
      {"reg_code": "NR_03", "reg_nom": "Fatick"}, 
      {"reg_code": "NR_04", "reg_nom": "Kaffrine"}, 
      {"reg_code": "NR_05", "reg_nom": "Kaolack"}, 
      {"reg_code": "NR_06", "reg_nom": "Kédougou"}, 
      {"reg_code": "NR_07", "reg_nom": "Kolda"}, 
      {"reg_code": "NR_08", "reg_nom": "Louga"}, 
      {"reg_code": "NR_09", "reg_nom": "Matam"}, 
      {"reg_code": "NR_10", "reg_nom": "Saint-Louis"}, 
      {"reg_code": "NR_11", "reg_nom": "Sédhiou"}, 
      {"reg_code": "NR_12", "reg_nom": "Tambacounda"}, 
      {"reg_code": "NR_13", "reg_nom": "Thiès"}, 
      {"reg_code": "NR_14", "reg_nom": "Ziguinchor"}, 
      
    ];
    var tbl_departement = [
      {"dep_code": "DE_011", "dep_nom": "Dakar","reg_code": "NR_01"}, 
      {"dep_code": "DE_012", "dep_nom": "Pikine","reg_code": "NR_01"}, 
      {"dep_code": "DE_013", "dep_nom": "Rufisque","reg_code": "NR_01"}, 
      {"dep_code": "DE_014", "dep_nom": "Guédiwaye","reg_code": "NR_01"}, 
      {"dep_code": "DE_015", "dep_nom": "Keur Massar","reg_code": "NR_01"},
      {"dep_code": "DE_021", "dep_nom": "Bignona","reg_code": "NR_14"}, 
      {"dep_code": "DE_022", "dep_nom": "Oussouye","reg_code": "NR_14"}, 
      {"dep_code": "DE_023", "dep_nom": "Ziguinchor","reg_code": "NR_14"}, 
      {"dep_code": "DE_031", "dep_nom": "Bambey","reg_code": "NR_02"}, 
      {"dep_code": "DE_032", "dep_nom": "Diourbel","reg_code": "NR_02"}, 
      {"dep_code": "DE_033", "dep_nom": "Mbacké","reg_code": "NR_02"}, 
      {"dep_code": "DE_041", "dep_nom": "Dagana","reg_code": "NR_10"}, 
      {"dep_code": "DE_042", "dep_nom": "Podor","reg_code": "NR_10"}, 
      {"dep_code": "DE_043", "dep_nom": "Saint-Louis","reg_code": "NR_10"}, 
      {"dep_code": "DE_051", "dep_nom": "Bakel","reg_code": "NR_12"}, 
      {"dep_code": "DE_052", "dep_nom": "Tambacounda","reg_code": "NR_12"}, 
      {"dep_code": "DE_053", "dep_nom": "Goudiry","reg_code": "NR_12"}, 
      {"dep_code": "DE_054", "dep_nom": "Koumpentoum","reg_code": "NR_12"},
      {"dep_code": "DE_061", "dep_nom": "Kaolack","reg_code": "NR_05"}, 
      {"dep_code": "DE_062", "dep_nom": "Nioro du rip","reg_code": "NR_05"}, 
      {"dep_code": "DE_063", "dep_nom": "Guinguinéo","reg_code": "NR_05"}, 
      {"dep_code": "DE_071", "dep_nom": "M'bour","reg_code": "NR_13"}, 
      {"dep_code": "DE_072", "dep_nom": "Thiès","reg_code": "NR_13"}, 
      {"dep_code": "DE_073", "dep_nom": "Tivaouane","reg_code": "NR_13"},
      {"dep_code": "DE_081", "dep_nom": "Kébémer","reg_code": "NR_08"}, 
      {"dep_code": "DE_082", "dep_nom": "Linguère","reg_code": "NR_08"}, 
      {"dep_code": "DE_083", "dep_nom": "Louga","reg_code": "NR_08"}, 
      {"dep_code": "DE_091", "dep_nom": "Fatick","reg_code": "NR_03"}, 
      {"dep_code": "DE_092", "dep_nom": "Foundiougne","reg_code": "NR_03"}, 
      {"dep_code": "DE_093", "dep_nom": "Gossas","reg_code": "NR_03"}, 
      {"dep_code": "DE_101", "dep_nom": "Kolda","reg_code": "NR_07"}, 
      {"dep_code": "DE_102", "dep_nom": "Vélingara","reg_code": "NR_07"}, 
      {"dep_code": "DE_103", "dep_nom": "Médina yoro Foulah","reg_code": "NR_07"}, 
      {"dep_code": "DE_111", "dep_nom": "Kanel","reg_code": "NR_09"}, 
      {"dep_code": "DE_112", "dep_nom": "Matam","reg_code": "NR_09"}, 
      {"dep_code": "DE_113", "dep_nom": "Ranérou Ferlo","reg_code": "NR_09"}, 
      {"dep_code": "DE_121", "dep_nom": "Kaffrine","reg_code": "NR_04"}, 
      {"dep_code": "DE_122", "dep_nom": "Birkelane","reg_code": "NR_04"}, 
      {"dep_code": "DE_123", "dep_nom": "Koungheul","reg_code": "NR_04"}, 
      {"dep_code": "DE_124", "dep_nom": "Malem-Hodar","reg_code": "NR_04"},
      {"dep_code": "DE_131", "dep_nom": "Kédougou","reg_code": "NR_06"}, 
      {"dep_code": "DE_132", "dep_nom": "Salemata","reg_code": "NR_06"}, 
      {"dep_code": "DE_131", "dep_nom": "Saraya","reg_code": "NR_06"}, 
      {"dep_code": "DE_132", "dep_nom": "Sédhiou","reg_code": "NR_11"}, 
      {"dep_code": "DE_133", "dep_nom": "Bounkiling","reg_code": "NR_11"}, 
      {"dep_code": "DE_141", "dep_nom": "Goudomp","reg_code": "NR_11"}, 
      
    ];
    var tbl_commune = [
      {"com_code": "CM_011", "com_nom": "Grand-Yoff","dep_code": "DE_011"}, 
      {"com_code": "CM_012", "com_nom": "Parcelles Assainies","dep_code": "DE_011"}, 
      {"com_code": "CM_013", "com_nom": "Medina","dep_code": "DE_011"}, 
      {"com_code": "CM_021", "com_nom": "Keur Massar","dep_code": "DE_012"}, 
      {"com_code": "CM_022", "com_nom": "Yeumbeul","dep_code": "DE_012"}, 
      {"com_code": "CM_023", "com_nom": "Thiaroye","dep_code": "DE_012"}, 
      {"com_code": "CM_031", "com_nom": "Rufisque","dep_code": "DE_013"}, 
      {"com_code": "CM_032", "com_nom": "Bargny","dep_code": "DE_013"}, 
      {"com_code": "CM_033", "com_nom": "Bambylor","dep_code": "DE_013"}, 
      {"com_code": "CM_041", "com_nom": "Golf-Sud","dep_code": "DE_014"}, 
      {"com_code": "CM_042", "com_nom": "Sam","dep_code": "DE_014"}, 
      {"com_code": "CM_043", "com_nom": "Wakhinane Nimzat","dep_code": "DE_014"}, 
      {"com_code": "CM_051", "com_nom": "Malika","dep_code": "DE_015"}, 
      {"com_code": "CM_052", "com_nom": "Jaxaay","dep_code": "DE_015"}, 
      {"com_code": "CM_053", "com_nom": "Keur Massar Nord","dep_code": "DE_015"}, 
      {"com_code": "CM_061", "com_nom": "Tenghori","dep_code": "DE_021"}, 
      {"com_code": "CM_062", "com_nom": "Kafountine","dep_code": "DE_021"}, 
      {"com_code": "CM_063", "com_nom": "Bignona","dep_code": "DE_021"}, 
      {"com_code": "CM_071", "com_nom": "Diembering","dep_code": "DE_022"}, 
      {"com_code": "CM_072", "com_nom": "Oukout","dep_code": "DE_022"}, 
      {"com_code": "CM_073", "com_nom": "Mlomp","dep_code": "DE_022"}, 
      {"com_code": "CM_081", "com_nom": "Zinguinchor","dep_code": "DE_023"}, 
      {"com_code": "CM_082", "com_nom": "Adeane","dep_code": "DE_023"}, 
      {"com_code": "CM_083", "com_nom": "Niaguis","dep_code": "DE_023"}, 
      {"com_code": "CM_091", "com_nom": "Ngoye","dep_code": "DE_031"}, 
      {"com_code": "CM_092", "com_nom": "Dangalma","dep_code": "DE_031"}, 
      {"com_code": "CM_093", "com_nom": "Bambey","dep_code": "DE_031"}, 
      {"com_code": "CM_101", "com_nom": "Ngohe","dep_code": "DE_032"}, 
      {"com_code": "CM_102", "com_nom": "Tocky-Gare","dep_code": "DE_032"}, 
      {"com_code": "CM_103", "com_nom": "Diourbel","dep_code": "DE_032"}, 
      {"com_code": "CM_111", "com_nom": "Dalla Ngabou","dep_code": "DE_033"}, 
      {"com_code": "CM_112", "com_nom": "Kael","dep_code": "DE_033"}, 
      {"com_code": "CM_113", "com_nom": "Mbacke","dep_code": "DE_033"}, 
      {"com_code": "CM_121", "com_nom": "Diama","dep_code": "DE_041"}, 
      {"com_code": "CM_122", "com_nom": "Mbane","dep_code": "DE_041"}, 
      {"com_code": "CM_123", "com_nom": "Richar Toll","dep_code": "DE_041"}, 
      {"com_code": "CM_131", "com_nom": "Boke Dialloube","dep_code": "DE_042"}, 
      {"com_code": "CM_132", "com_nom": "Guede","dep_code": "DE_042"}, 
      {"com_code": "CM_133", "com_nom": "Mboumba","dep_code": "DE_042"}, 
      {"com_code": "CM_141", "com_nom": "Fass Ngom","dep_code": "DE_043"}, 
      {"com_code": "CM_142", "com_nom": "Gandon","dep_code": "DE_043"}, 
      {"com_code": "CM_143", "com_nom": "Saint Louis","dep_code": "DE_043"}, 
      {"com_code": "CM_151", "com_nom": "Ballou","dep_code": "DE_51"}, 
      {"com_code": "CM_152", "com_nom": "Bele","dep_code": "DE_051"}, 
      {"com_code": "CM_153", "com_nom": "Mouderi","dep_code": "DE_051"}, 
      {"com_code": "CM_161", "com_nom": "Koussanar","dep_code": "DE_052"}, 
      {"com_code": "CM_162", "com_nom": "Makacolibantang","dep_code": "DE_052"}, 
      {"com_code": "CM_163", "com_nom": "Tambacounda","dep_code": "DE_052"}, 
      {"com_code": "CM_171", "com_nom": "Boynguel Bamba","dep_code": "DE_053"}, 
      {"com_code": "CM_172", "com_nom": "Goudiry","dep_code": "DE_053"}, 
      {"com_code": "CM_173", "com_nom": "Koulor","dep_code": "DE_053"}, 
      {"com_code": "CM_181", "com_nom": "Kahene","dep_code": "DE_054"}, 
      {"com_code": "CM_182", "com_nom": "Kouthiaba Wolof","dep_code": "DE_054"}, 
      {"com_code": "CM_183", "com_nom": "Payar","dep_code": "DE_054"}, 
      {"com_code": "CM_191", "com_nom": "Kaolack","dep_code": "DE_061"}, 
      {"com_code": "CM_192", "com_nom": "Latmingue","dep_code": "DE_061"}, 
      {"com_code": "CM_193", "com_nom": "Ndiaffate","dep_code": "DE_061"}, 
      {"com_code": "CM_201", "com_nom": "Medina Sabakh","dep_code": "DE_062"}, 
      {"com_code": "CM_202", "com_nom": "Taiba Niassene","dep_code": "DE_062"}, 
      {"com_code": "CM_203", "com_nom": "Wack Ngouna","dep_code": "DE_062"}, 
      {"com_code": "CM_211", "com_nom": "Mbadakhoune","dep_code": "DE_063"}, 
      {"com_code": "CM_212", "com_nom": "Ndiago","dep_code": "DE_063"}, 
      {"com_code": "CM_213", "com_nom": "Ngathie Naoude","dep_code": "DE_063"}, 
      {"com_code": "CM_221", "com_nom": "Malicounda","dep_code": "DE_071"}, 
      {"com_code": "CM_222", "com_nom": "Mbour","dep_code": "DE_071"}, 
      {"com_code": "CM_223", "com_nom": "Saly Portudal","dep_code": "DE_071"}, 
      {"com_code": "CM_231", "com_nom": "Notto","dep_code": "DE_072"}, 
      {"com_code": "CM_232", "com_nom": "Thies","dep_code": "DE_072"}, 
      {"com_code": "CM_233", "com_nom": "Touba Toul","dep_code": "DE_072"}, 
      {"com_code": "CM_241", "com_nom": "Darou Khoudoss","dep_code": "DE_073"}, 
      {"com_code": "CM_242", "com_nom": "Meouane","dep_code": "DE_073"}, 
      {"com_code": "CM_243", "com_nom": "Tivaouane","dep_code": "DE_073"}, 
      {"com_code": "CM_251", "com_nom": "Darou Mousty","dep_code": "DE_081"}, 
      {"com_code": "CM_252", "com_nom": "Kembemer","dep_code": "DE_081"}, 
      {"com_code": "CM_253", "com_nom": "Ndande","dep_code": "DE_081"}, 
      {"com_code": "CM_261", "com_nom": "Dahra","dep_code": "DE_082"}, 
      {"com_code": "CM_262", "com_nom": "Linguere","dep_code": "DE_082"}, 
      {"com_code": "CM_263", "com_nom": "Ouarkhokh","dep_code": "DE_082"}, 
      {"com_code": "CM_271", "com_nom": "leona","dep_code": "DE_083"}, 
      {"com_code": "CM_272", "com_nom": "Louga","dep_code": "DE_083"}, 
      {"com_code": "CM_273", "com_nom": "Nguer Malal","dep_code": "DE_083"}, 
      {"com_code": "CM_281", "com_nom": "Fimela","dep_code": "DE_091"}, 
      {"com_code": "CM_282", "com_nom": "Niakhar","dep_code": "DE_091"}, 
      {"com_code": "CM_283", "com_nom": "Tattaguine","dep_code": "DE_091"}, 
      {"com_code": "CM_291", "com_nom": "Dionewar","dep_code": "DE_092"}, 
      {"com_code": "CM_292", "com_nom": "Sokone","dep_code": "DE_092"}, 
      {"com_code": "CM_293", "com_nom": "Toubacouta","dep_code": "DE_092"},
      {"com_code": "CM_301", "com_nom": "Colobane","dep_code": "DE_093"}, 
      {"com_code": "CM_302", "com_nom": "Gossas","dep_code": "DE_093"}, 
      {"com_code": "CM_303", "com_nom": "Mbar","dep_code": "DE_093"}, 
      {"com_code": "CM_311", "com_nom": "Dioulacolon","dep_code": "DE_101"}, 
      {"com_code": "CM_312", "com_nom": "Coumbacara","dep_code": "DE_101"}, 
      {"com_code": "CM_313", "com_nom": "Mampatim","dep_code": "DE_101"}, 
      {"com_code": "CM_321", "com_nom": "Diaobe Kabendou","dep_code": "DE_102"}, 
      {"com_code": "CM_322", "com_nom": "Medina Gounasse","dep_code": "DE_102"}, 
      {"com_code": "CM_323", "com_nom": "Velingara","dep_code": "DE_102"}, 
      {"com_code": "CM_331", "com_nom": "Bourouco","dep_code": "DE_103"}, 
      {"com_code": "CM_332", "com_nom": "Kerewane","dep_code": "DE_103"}, 
      {"com_code": "CM_333", "com_nom": "Niaming","dep_code": "DE_103"}, 
      {"com_code": "CM_341", "com_nom": "Aoure","dep_code": "DE_111"}, 
      {"com_code": "CM_342", "com_nom": "Orkadiere","dep_code": "DE_111"}, 
      {"com_code": "CM_343", "com_nom": "Wouro Sidy","dep_code": "DE_111"}, 
      {"com_code": "CM_351", "com_nom": "Bokidiave","dep_code": "DE_112"}, 
      {"com_code": "CM_352", "com_nom": "Agnam Civol","dep_code": "DE_112"}, 
      {"com_code": "CM_353", "com_nom": "Ogo","dep_code": "DE_112"}, 
      {"com_code": "CM_361", "com_nom": "Lougre Thioly","dep_code": "DE_113"}, 
      {"com_code": "CM_362", "com_nom": "Oudalaye","dep_code": "DE_113"}, 
      {"com_code": "CM_363", "com_nom": "Ranerou","dep_code": "DE_113"}, 
      {"com_code": "CM_371", "com_nom": "Diokoul Mbelbouck","dep_code": "DE_121"}, 
      {"com_code": "CM_372", "com_nom": "Kaffrine","dep_code": "DE_121"}, 
      {"com_code": "CM_373", "com_nom": "Kathiote","dep_code": "DE_121"}, 
      {"com_code": "CM_381", "com_nom": "Birkilane","dep_code": "DE_122"}, 
      {"com_code": "CM_382", "com_nom": "Mabo","dep_code": "DE_122"}, 
      {"com_code": "CM_383", "com_nom": "Ndiognick","dep_code": "DE_122"}, 
      {"com_code": "CM_391", "com_nom": "Fass Thiekene","dep_code": "DE_123"}, 
      {"com_code": "CM_392", "com_nom": "Koungheul","dep_code": "DE_123"}, 
      {"com_code": "CM_393", "com_nom": "Missirah Wadene","dep_code": "DE_123"}, 
      {"com_code": "CM_401", "com_nom": "Darou Minam","dep_code": "DE_124"}, 
      {"com_code": "CM_402", "com_nom": "Djanke Souf","dep_code": "DE_124"}, 
      {"com_code": "CM_403", "com_nom": "Sagna","dep_code": "DE_124"}, 
      {"com_code": "CM_411", "com_nom": "Bandafassi","dep_code": "DE_131"}, 
      {"com_code": "CM_412", "com_nom": "Kedougou","dep_code": "DE_131"}, 
      {"com_code": "CM_413", "com_nom": "Tomboronkoto","dep_code": "DE_131"}, 
      {"com_code": "CM_421", "com_nom": "Dakately","dep_code": "DE_132"}, 
      {"com_code": "CM_422", "com_nom": "Ethiolo","dep_code": "DE_132"}, 
      {"com_code": "CM_423", "com_nom": "Salemata","dep_code": "DE_132"}, 
      {"com_code": "CM_431", "com_nom": "Bembou","dep_code": "DE_133"}, 
      {"com_code": "CM_432", "com_nom": "Khossanto","dep_code": "DE_133"}, 
      {"com_code": "CM_433", "com_nom": "Medina Baffe","dep_code": "DE_133"}, 
      {"com_code": "CM_441", "com_nom": "Bambali","dep_code": "DE_141"}, 
      {"com_code": "CM_442", "com_nom": "Djiredji","dep_code": "DE_141"}, 
      {"com_code": "CM_443", "com_nom": "Sedhiou","dep_code": "DE_141"}, 
      {"com_code": "CM_451", "com_nom": "Boghal","dep_code": "DE_142"}, 
      {"com_code": "CM_452", "com_nom": "Faoune","dep_code": "DE_142"}, 
      {"com_code": "CM_453", "com_nom": "Tankon","dep_code": "DE_142"}, 
      {"com_code": "CM_461", "com_nom": "Baghere","dep_code": "DE_143"}, 
      {"com_code": "CM_462", "com_nom": "Djibanar","dep_code": "DE_143"}, 
      {"com_code": "CM_463", "com_nom": "Goudomp","dep_code": "DE_143"}, 

    ] 
    /**
    * Fonction de récupération des données correspondant au critère de recherche
    * @param   {String} condition - Chaine indiquant la condition à remplir
    * @param   {Array}  table - Tableau contenant les données à extraire
    * @returns {Array}  result - Tableau contenant les données extraites
    */
    function getDataFromTable( condition, table) {
      // récupération de la clé et de la valeur
      var cde = condition.replace(/\s/g, '').split('='),
          key = cde[0],
          value = cde[1],
          result = [];
      
      // retour direct si *
      if (condition === '*') {
        return table.slice();
      }
      // retourne les éléments répondant à la condition
      result = table.filter( function(obj){
          return obj[key] === value;
        });
    return result;
    } 
      /**
    * Fonction d'ajout des <option> à un <select>
    * @param   {String} id_select - ID du <select> à mettre à jour
    * @param   {Array}  liste - Tableau contenant les données à ajouter
    * @param   {String} valeur - Champ pris en compte pour la value de l'<option>
    * @param   {String} texte - Champ pris en compte pour le texte affiché de l'<option>
    * @returns {String} Valeur sélectionnée du <select> pour chainage
    */
    function updateSelect( id_select, liste, valeur, texte){
      var oOption,
          oSelect = document.getElementById( id_select),
          i, nb = liste.length;
      // vide le select
      oSelect.options.length = 0;
      // désactive si aucune option disponible
      oSelect.disabled = nb ? false : true;
      // affiche info nombre options
      setNombre( oSelect, nb);
      // ajoute 1st option
      if( nb){
        oSelect.add( new Option( 'Choisir', ''));
        // focus sur le select
        oSelect.focus();
      }
      // création des options d'après la liste
      for (i = 0; i < nb; i += 1) {
        // création option
        oOption = new Option( liste[i][texte], liste[i][valeur]);
        // ajout de l'option en fin
        oSelect.add( oOption);
      }
      // si une seule option on la sélectionne
      oSelect.selectedIndex = nb === 1 ? 1 : 0;
      // on retourne la valeur pour le select suivant
      return oSelect.value;
    }
    /**
    * Affichage du nombre d'<option> présentes dans le <select>
    * @param {Object} obj - <select> parent
    * @param {Number} nb - nombre à afficher
    */
    function setNombre( obj, nb){
      var oElem = obj.parentNode.querySelector('.nombre');
      if( oElem){
        oElem.innerHTML = nb ? '(' +nb +')' :'';
      }
    }
    /**
    * fonction de chainage des <select>
    * @param {String|Object} ID du <select> à traiter ou le <select> lui-même
    */
    function chainSelect( param){
      // affectation par défaut
      param = param || 'init';
      var liste,
          id     = param.id || param,
          valeur = param.value || '';
          
      // test à faire pour récupération de la value
      if( typeof id === 'string'){
        param = document.getElementById( id);
        valeur = param ? param.value : '';
      }

      switch (id){
        case 'init':
          // récup. des données
          liste = getDataFromTable( '*', tbl_region);
          // mise à jour du select
          valeur = updateSelect( 'region', liste, 'reg_code', 'reg_nom');
          // chainage sur le select lié
          chainSelect('region');
          break;
        case 'region':
          // récup. des données
          liste = getDataFromTable( 'reg_code=' +valeur, tbl_departement);
          // mise à jour du select
          valeur = updateSelect( 'departement', liste, 'dep_code', 'dep_nom');
          // chainage sur le select lié
          chainSelect('departement');
          break;
        case 'departement':
          // récup. des données
          liste = getDataFromTable( 'dep_code=' +valeur, tbl_commune);
          // mise à jour du select
          valeur= updateSelect( 'commune', liste, 'com_code', 'com_nom');
          // chainage sur le select lié
          chainSelect('commune');
          break;
        case 'commune':
          // récup. des données
          liste = getDataFromTable( 'com_code=' +valeur, tbl_centre_de_vote);
          // mise à jour du select
          valeur= updateSelect( 'centre_de_vote', liste, 'cdv_code', 'cdv_nom');
          // chainage sur le select lié
          chainSelect('centre_de_vote');
          break;
      }
    }
    // Initialisation après chargement du DOM
    document.addEventListener("DOMContentLoaded", function() {
      var oSelects = document.querySelectorAll('#liste select'),
          i, nb = oSelects.length;
      // affectation de la fonction sur le onchange
      for( i = 0; i < nb; i += 1) {
        oSelects[i].onchange = function() {
            chainSelect(this);
          };
      }
      // init du 1st select
      if( nb){
        chainSelect('init');
      }
    });
    
  </script>

    
</body>
</html>