<?php
    
    $logroSS = '<div class="mark"><img src="https://upload.wikimedia.org/wikipedia/en/5/5a/Black_question_mark.png"></div>';

    echo '<h1 class="logrosTitulo">' . $lang['achievementTittle'] . '</h1>';

    echo '<div class="logrosContainer">';

    echo '<div class="logro">';
    if($elementosCreados >= 0){
        echo $logroSS;
        echo '<p class="logroText">' . $lang['achievementCrEl'] . $elementosCreados . '</p>';
    }elseif($elementosCreados >= 10){
        echo '<p class="logroText">' . $lang['CrEl'] . $elementosCreados . $lang['CrEl1'] . '</p>';
    }elseif($elementosCreados >= 100 && $elementosCreados < 1000){
        echo '<p class="logroText">' . $lang['CrEl'] . $elementosCreados . $lang['CrEl2'] . '</p>';
    }else{
        echo '<p class="logroText">' . $lang['CrEl'] . $elementosCreados . $lang['CrEl3'] . '</p>';
    }

    echo '</div><div class="logro">';
    
    if($batallasCreadas >= 0){
        echo $logroSS;
        echo '<p class="logroText">' . $lang['achievementCrBt'] . $batallasCreadas . '</p>';
    }elseif($batallasCreadas >= 10){
        echo '<p class="logroText">' . $lang['CrBt'] . $batallasCreadas . $lang['CrBt1'] . '</p>';
    }elseif($batallasCreadas >= 100 && $batallasCreadas < 1000){
        echo '<p class="logroText">' . $lang['CrBt'] . $batallasCreadas . $lang['CrBt2'] . '</p>';
    }else{
        echo '<p class="logroText">' . $lang['CrBt'] . $batallasCreadas . $lang['CrBt3'] . '</p>';
    }

    echo '</div><div class="logro">';
    
    if($batallasVotadas >= 0){
        echo $logroSS;
        echo '<p class="logroText">' . $lang['achievementVtBt'] . $batallasVotadas . '</p>';
    }elseif($batallasVotadas >= 10){
        echo '<p class="logroText">' . $lang['VtBt'] . $batallasVotadas . $lang['VtBt1'] . '</p>';
    }elseif($batallasVotadas >= 100 && $batallasVotadas < 1000){
        echo '<p class="logroText">' . $lang['VtBt'] . $batallasVotadas . $lang['VtBt2'] . '</p>';
    }else{
        echo '<p class="logroText">' . $lang['VtBt'] . $batallasVotadas . $lang['VtBt3'] . '</p>';
    }

    echo '</div><div class="logro">';
    
    if($batallasIgnoradas >= 0){
        echo $logroSS;
        echo '<p class="logroText">' . $lang['achievementIgBt'] . $batallasIgnoradas .'</p>';
    }elseif($batallasIgnoradas >= 10){
        echo '<p class="logroText">' . $lang['IgBt'] . $batallasIgnoradas . $lang['IgBt1'] . '</p>';
    }elseif($batallasIgnoradas >= 100 && $batallasIgnoradas < 1000){
        echo '<p class="logroText">' . $lang['IgBt'] . $batallasIgnoradas . $lang['IgBt2'] . '</p>';
    }else{
        echo '<p class="logroText">' . $lang['IgBt'] . $batallasIgnoradas . $lang['IgBt3'] . '</p>';
    }

    echo '</div><div class="logro">';
    
    if($batallasDenunciadas >= 0){
        echo $logroSS;
        echo '<p class="logroText">' . $lang['achievementRpBt'] . $batallasDenunciadas .'</p>';
    }elseif($batallasDenunciadas >= 10 && $batallasDenunciadas < 100){
        echo '<p class="logroText">' . $lang['RpBt'] . $batallasDenunciadas . $lang['RpBt1'] . '</p>';
    }else{
        echo '<p class="logroText">' . $lang['RpBt'] . $batallasDenunciadas . $lang['RpBt2'] . '</p>';
    }

    echo '</div></div>';

?>