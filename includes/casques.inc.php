<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

$cnx = new PDO('mysql:host=127.0.0.1;dbname=nolarkyoussef', 'nolarkuser', 'nolarkpwd');

$req = 'SELECT casque.id ,casque.type, nom, modele, libelle, prix, classement, image, stock';
$req .= ' FROM casque INNER JOIN type ON casque.type=type.id';
$req .= ' INNER JOIN marque ON casque.marque=marque.id where type.libelle == $pageActuelle ';

$res = $cnx->query($req);

echo '<section id="casques">';
while ($ligne = $res->fetch(PDO::FETCH_OBJ)) {
 echo '<article>';
 echo '<img src="../images/casques/', $ligne->libelle, '/', $ligne->image,'" alt="', $ligne->modele, '">';
 echo '</article>';
}
echo '</section>';