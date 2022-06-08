<?php

/**
 * === Capacité terminale ===
 *
 * Todo : Créez une page affichant dans un tableau HTML la liste des éléments provenant de la table <item>
 *
 * Les informations affichées seront :
 * - la marque <brand:name>
 * - la nom <item:name>
 * - le prix <item:price> (en €)
 *
 * - Cette page devra également permettre d'afficher uniquement les items d'une marque donnée (<item:brand>). Le résultat devra pouvoir être partagé via un lien direct ou être ajouté aux favoris d'un navigateur.
 *
 * Estimation : +/-30min
 *
 */

$connection = connection();
$tbody = '';
$item = $connection->query("SELECT * FROM item ORDER BY name", PDO::FETCH_OBJ);
foreach ($item as $items) {
    $body .= '<option value="' . $items>id . '">' . $items->name . '</option>';
}

<thead>
        <tr>

            <th>Marque</th>
            <th>Nom</th>
            <th>Prix TVAC</th>
        </tr>
    </thead>
    <tbody>
        <?=$tbody?>
    </tbody>
</table>