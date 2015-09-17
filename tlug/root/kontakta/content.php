<?php
  $command = 'cat /home/daniel/medlemmar | grep styrelse | awk -F":" \'{ print $3 " " $4 " " $5 " " $7 " " $8 " " $9 }\'';
  $members_str = array();
  $member = array();
  exec($command, $members_str);

?>
<div class="table-responsive"> 
  <p>Antal medlemmar i styrelsen: <?php echo count($members_str) ?></p>          
  <table class="table">
    <thead>
      <tr>
        <th>Förnamn</th>
        <th>Efternamn</th>
        <th>Mejladress</th>
        <th>Position</th>
        <th>Inriktning</th>
        <th>Ort</th>
      </tr>
    </thead>
    <?php
      if(count($members_str)){
        ?>
          <tbody>
        <?php

        for($i = 0; $i<count($members_str); $i++){
          $member = explode(" ", $members_str[$i]);

          if($i%2 == 0){
            echo '<tr class="clickable-row even" data-href="mailto:' . $member[2] . '?Subject=Hej,%20' . $member[0] . '%20' . $member[1] . '">';
          }
          else{
            echo '<tr class="clickable-row" data-href="mailto:' . $member[2] . '?Subject=Hej,%20' . $member[0] . '%20' . $member[1] . '">';
          }
      
          for($j = 0; $j<count($member); $j++){

            echo '<td>' . $member[$j] . '</td>';
          
          }
          
           //echo '</tr></a>';
          echo '</tr>';
          
        }

        ?>
          </tbody>
        <?php
      }
    ?>
  </table>
  <?php
    if(!(count($members_str))){
      echo '<p class="text-center">[Inga poster kunde hittas]</p>';
    }
  ?>
  </div>
