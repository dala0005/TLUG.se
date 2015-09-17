<?php
session_start();
  $articles = array();
  $command = 'ls -d */*/*/*/ | sort -nr | head -10';
  exec($command, $articles);
    for($article=0;$article<count($articles);$article++){
      ?>
          <!-- Wrapper -->
          <div class="newsSmall_max_width col-centered">
            <div class="panel panel-default">
            <!-- Default panel contents -->
              <div class="panel-heading"><?php echo '<b>#' . ($article+1) . '</b> ' .  shell_exec('cat ' . $articles[$article] . 'title.txt'); ?></div>
              <div class="panel-body"><?php echo shell_exec('cat ' . $articles[$article] . 'content.txt'); ?></div>
              <div class="panel-footer">
                <div class="news_writer">Publicerad av: <?php echo shell_exec('cat ' . $articles[$article] . 'publisher.txt'); ?></div>
                <div class="news_date"><?php echo shell_exec('cat ' . $articles[$article] . 'date.txt'); ?></div>
              <div class="clear"></div> 
            </div>
          </div>
        </div>
          <?php
          }
      
?>

