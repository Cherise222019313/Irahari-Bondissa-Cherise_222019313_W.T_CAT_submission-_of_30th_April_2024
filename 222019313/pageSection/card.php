<?php
function generateCard($number, $text) {
echo'    <div class="card">';
echo'    <div class="card-head">';
echo'        <h2>'.$number.'</h2>';
echo'        <span class="las la-user-friends"></span>';
echo'    </div>';
echo'    <div class="card-progress">';
echo'        <small>'.$text.'</small>';
echo'        <div class="card-indicator">';
echo'            <div class="indicator one" style="width: 60%"></div>';
echo'        </div>';
echo'    </div>';
echo'</div>';


}

?>