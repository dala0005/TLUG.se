<?php
$command = 'cat /home/daniel/medlemmar';
$lines = array();
$tabs = array();
exec($command, $lines);
?>

<div class="table-responsive">
<p>Antal medlemmar: <?php echo count($lines) ?></p>          
  <table class="table">
    <thead>
      <tr>
        <th>Nr</th>
        <th>Medlem</th>
        <th>Förnamn</th>
        <th>Efternamn</th>
        <th>Mejladress</th>
        <th>Typ</th>
        <th>Position</th>
        <th>Inriktning</th>
        <th>Ort</th>
      </tr>
    </thead>
    <tbody>
      <?php
        for($i=0;$i<count($lines); $i++){
          $tabs = explode(':', $lines[$i]);
          if($i%2 == 0){
            echo '<tr class="clickable-row even" data-href="mailto:' . $tabs[4] . '?Subject=Hej,%20' . $tabs[2] . '%20' . $tabs[3] . '">'; 
          }
          else{
            echo '<tr class="clickable-row" data-href="mailto:' . $tabs[4] . '?Subject=Hej,%20' . $tabs[2] . '%20' . $tabs[3] . '">';
          }
          echo '<td><b>#' . ($i+1) . '</b></td><td>' . $tabs[0] . '</td><td>' . $tabs[2] . '</td><td>' . $tabs[3] . '</td><td>' . $tabs[4] . '</td><td>' . $tabs[5] . '</td><td>' . $tabs[6] . '</td><td>' . $tabs[7] . '</td><td>' . $tabs[8] . '</td></tr>';
        } 
      ?>
    </tbody>
  </table>
  </div>