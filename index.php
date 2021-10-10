<?php include "db_model.php";
error_reporting(E_ALL ^ E_WARNING);

$dataset = [];
$datasets = getAllDatasets();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DMarket - лучшие цены на лучшие данные</title>

    <link rel="stylesheet" type="text/css" href="./style/style.css" />
    <?php if ($_GET['datasetname']) {
        echo "<style>.dataset_popup{display:flex;}</style>";
    } ?>
</head>

<body>
    <div class="container element_dark">
        <div class="container_header container_center element_black">
            <div class="wrapper wrapper_space">
                <ul class="ul_main ul_header ul_fixed element_light">
                    <li class="li_main text_main">
                        <a class="link" href="#">Каталог</a>
                    </li>
                    <li class="li_main text_main">
                        <a class="link" href="#">Помощь</a>
                    </li>
                    <li class="li_main text_main">
                        <a class="link" href="#">О сервисе</a>
                    </li>
                </ul>
                <div class="button_main form_find element_light text_main">поиск</div>
                <div class="button_main element_contrast text_main"><a class="link" href="cabinet.html">Личный кабинет</a></div>
            </div>
        </div>
        <div class="container section">
            <div class="container_header container_center element_light">
                <div class="wrapper">
                    <div class="sort">
                        <div class="text_contrast">Сортировать по</div>
                        <ul class="ul_main ul_sort element_light">
                            <li class="li_main">популярности</li>
                            <li class="li_main">качеству данных</li>
                            <li class="li_main">дате добавления</li>
                            <li class="li_main">стоимости</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="filter element_light">
                <div class="filter__item">
                    <p>Направление</p>
                    <ul class="ul_main ul_vertical">
                        <li class="li_main">Рекламный рынок</li>
                        <li class="li_main">Аналитические сервисы</li>
                        <li class="li_main">Финансовые сервисы</li>
                        <li class="li_main">Облачные решения</li>
                    </ul>
                </div>
                <div class="filter__item">
                    <p>Стоимость</p>
                    <input type="range" min="0" max="100" step="1" value="50">
                </div>
                <div class="filter__item">
                    <p>Качество</p>
                    <input type="range" min="0" max="100" step="1" value="50">
                </div>
            </div>
            <div class="container container_center">
                <div class="wrapper container_items">
                    <?php
                    foreach ($datasets as $dataset) {
                        printDatasetInfo($dataset);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="dataset_popup">
        <div class="dataset_container">
        <?php
            if ($_GET['datasetname']) {
                $dataset = getDataset($_GET['datasetname']);
                foreach($dataset as $entry) {
                    // print_r($dataset);
                    printf("
                    <div class='dataset_row'>
                        <div class='dataset_col'>
                            %s
                        </div>
                        <div class='dataset_col'>
                            %s
                        </div>
                        <div class='dataset_col'>
                            %s
                        </div>
                    </div>
                    ", $entry["1"], $entry["2"], $entry["3"]);
                }
            }
        ?>
        <a href="./" class="popup_close">X</div>
        </div>
        
    </div>
</body>

</html>