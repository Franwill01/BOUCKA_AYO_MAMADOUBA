<?php

$servername = "127.0.0.1";
$username = "WISSY";
$password = "Wissy2005.";
$database = "election";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    if (isset($_POST['scores'])) {
        
        $scores = $_POST['scores'];

        $connexion = mysqli_connect("localhost", "WISSY", "Wissy2005.", "election");

        if (!$connexion) {
            die("Erreur de connexion à la base de données: " . mysqli_connect_error());
        }
        function obtenirIdBureauParNom($nomBureau, $connexion) {
            $nomBureau = mysqli_real_escape_string($connexion, $nomBureau);
        
            
            $sql = "SELECT id_bureau FROM bureauxdevote WHERE nom_bureau = '$nomBureau'";
        
            
            $resultat = mysqli_query($connexion, $sql);
        
            // Je vérifie s'il y a des résultats
            if ($resultat) {
                // Je récupére la première ligne de résultat
                $row = mysqli_fetch_assoc($resultat);
        
                // Je vérifie si une ligne a été trouvée
                if ($row) {
                    // Je retourne l'ID du bureau de vote
                    return $row['id_bureau'];
                } else {
                    // Aucun bureau de vote trouvé avec ce nom
                    return null;
                }
            } else {
                // Erreur lors de l'exécution de la requête
                return null;
            }
        }
        
        foreach ($scores as $bureau => $candidats) {
            
            if (isset($bureau)) {
            
                $bureauId = obtenirIdBureauParNom($bureau, $connexion);

                
                if ($bureauId !== null) {
                    foreach ($candidats as $candidat => $score) {
                        
                        $candidat = mysqli_real_escape_string($connexion, $candidat);
                        $score = intval($score);

                        // insertion dans la table Scores
                        $sqlInsert = "INSERT INTO Scores (id_bureau, candidat, score) VALUES ($bureauId, '$candidat', $score)";

                        
                        mysqli_query($connexion, $sqlInsert);
                    }
                }
            }
        }
                $query = "SELECT centresdevote.id_centre, centresdevote.nom_centre, commune.nom_commune 
                        FROM centresdevote 
                        JOIN commune ON centresdevote.id_commune = commune.id";
                $result = mysqli_query($connexion, $query);
                
                if (!$result) {
                    die('Erreur dans la requête SQL : ' . mysqli_error($connexion));
                }

                $data = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                }
                $json_data = json_encode($data);
                echo $json_data;
                function obtenirIdCandidatParNom($nomCandidat, $connexion) {
                    $nomCandidat = mysqli_real_escape_string($connexion, $nomCandidat);
                    
                    $sql = "SELECT id_candidat FROM candidats WHERE nom = '$nomCandidat'";
                    
                    $resultat = mysqli_query($connexion, $sql);
                    
                    if ($resultat) {
                        $row = mysqli_fetch_assoc($resultat);
                    
                        if ($row) {
                            return $row['id_candidat'];
                        } else {
                            return null;
                        }
                    } else {
                        return null;
                    }
                }
                foreach ($scores as $candidat => $score) {
                    $candidatId = obtenirIdCandidatParNom($candidat, $connexion);
        
                    if ($candidatId !== null) {
                        $score = intval($score);
                        $sqlInsert = "INSERT INTO Scores (id_candidat, score) VALUES ($candidatId, $score)";
                        mysqli_query($connexion, $sqlInsert);
                    }
                }
        
                $totalVotes = array_sum($scores);
                $pourcentages = [];
        
                foreach ($scores as $candidat => $score) {
                    
                    $pourcentage = ($score / $totalVotes) * 100;
                    $pourcentages[$candidat] = number_format($pourcentage, 2);
                }
        
                echo '<table border="1">';
                echo '<tr><th>Candidat</th><th>Pourcentage des Voix</th></tr>';
                
                foreach ($pourcentages as $candidat => $pourcentage) {
                    echo "<tr><td>$candidat</td><td>$pourcentage%</td></tr>";
                }
        
                echo '</table>';


                
            mysqli_close($connexion);
        }
    }



?>
