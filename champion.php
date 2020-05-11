<?php
include_once('tool.php');
index_top_module('champion Info');
include "functions/config.php";
include "layout/header.php";
    $id = $_GET['id'];

    $decode = curlFunc("http://ddragon.leagueoflegends.com/cdn/10.9.1/data/en_US/champion/$id.json")[0];

    foreach ($decode['data'] as $champion) {
        echo "
             <div id ='leftColumn'>
                <h3>$champion[name]</h3>
                <img src='http://ddragon.leagueoflegends.com/cdn/img/champion/loading/$champion[id]_0.jpg' alt='$champion[name]' title='$champion[name]' />
                <h3>$champion[title]</h3>
            </div>

            <div id ='rightColumn'>
                <h3>INFO</h3>
                <span>$champion[lore]</span>
            </div>
            ";

        echo "<div class='clear'> </div> <div class='wall'>";

        
    }

include "layout/footer.php";
?>
