<?php
include_once('tool.php');
index_top_module('champion list');
include "functions/config.php";
include "layout/header.php";

    session_start();
    echo "<div class='wall'>";
    $decode = curlFunc("http://ddragon.leagueoflegends.com/cdn/10.9.1/data/en_US/champion.json")[0];

    foreach ($decode['data'] as $champion) {
        echo "
             <a class='data' href='champion.php?id=$champion[id]'>
                
                <img src='http://ddragon.leagueoflegends.com/cdn/img/champion/loading/$champion[id]_0.jpg' alt='$champion[name]' title='$champion[name]' />
                 <h3>$champion[name]</h3>
                
            </a>
            ";
    }

    echo "</div>";

include "layout/footer.php";
?>
