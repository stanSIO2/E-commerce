<?php
function produitControleur($twig, $db){
    $form = array();
    $produit = new produit($db);
    $liste = $produit->select();
    echo $twig->render('produit.html.twig', array('form'=>$form,'liste'=>$liste));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $designation = $_POST['designation'] ?? '';
    $description = $_POST['description'] ?? '';
    $prix = $_POST['prix'] ?? 0;
    $idType = $_POST['idType'] ?? 0;
    echo $twig->render('produit.html.twig', array('form'=>$form,'liste'=>$liste));

    if ($designation && $prix && $idType) {
        $stmt = $pdo->prepare("INSERT INTO produits (designation, description, prix, idType) VALUES (:designation, :description, :prix, :idType)");
        $stmt->execute([
            ':designation' => $designation,
            ':description' => $description,
            ':prix' => $prix,
            ':idType' => $idType,
        ]);
    }
}

// Récupération des produits triés par désignation
$stmt = $pdo->query("SELECT * FROM produits ORDER BY designation ASC");
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
