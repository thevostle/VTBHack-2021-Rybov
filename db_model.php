<?php
$db = new PDO('mysql:host=127.0.0.1:3306', 'root', 'root');
$db->query('USE rybov;');

function getDataset($datasetName)
{
    global $db;

    $dataset = $db->prepare('SELECT * FROM ' . $datasetName);
    $dataset->execute();
    $dataset = $dataset->fetchAll(PDO::FETCH_DEFAULT);

    return $dataset;
}

function getAllDatasets()
{
    global $db;

    $datasets = $db->prepare('SELECT * FROM datasets');
    $datasets->execute();
    $datasets = $datasets->fetchAll(PDO::FETCH_DEFAULT);

    return $datasets;
}

function printDatasetInfo($dataset)
{
    $Date = getDate($dataset["Date"]);

    printf("
    <a class='product_container' href='./?datasetname=%s'>
    <div class='product element_light'>
        <div class='product__title'>%s</div>
        <div class='product__description'>%s</div>
        <div class='product__price'>%s$</div>
        <div class='product__date'>%s</div>
        <div class='product__tags'>
            <div class='product-tag'><img src='' alt=''></div>
            <div class='product-tag'><img src='' alt=''></div>
        </div>
    </div>
    </a>
    ", $dataset["Dbname"], $dataset["Name"], $dataset["Description"], $dataset["Price"], $Date["mday"] . "/" . $Date["month"] . "/" . $Date["year"]);
}
