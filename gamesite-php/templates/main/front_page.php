<?php
  $sql_featured = "SELECT proj_name, proj_url, proj_img FROM game_projects WHERE is_featured = 1";

  $sql_tableview = "SELECT proj_name, proj_url, proj_img FROM game_projects WHERE is_featured = 0";

  if (!$result_featured = $mysqli->query($sql_featured)) {
      show_db_error($mysqli);
      exit;
  }

  if (!$result_tableview = $mysqli->query($sql_tableview)) {
      show_db_error($mysqli);
      exit;
  }

  $tableview_cols = 4.0;
  $tableview_rows = round(($result_tableview->num_rows / $tableview_cols), 0,
                          PHP_ROUND_HALF_UP);

  unset($sql_featured);
  unset($sql_tableview);
  $mysqli->close();
?>
    
    <div class="main">

      <!-- Featured Projects -->
      <div class="featured-projects">
        <div class="container-fluid">
          <div id="featuredProjectsCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <?php for ($i = 0; $i < $result_featured->num_rows; $i++): ?>
                <?php echo '<li data-target="#featuredProjectsCarousel" data-slide-to='.$i.' class="active"></li>'; ?>
              <?php endfor; ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <?php $featured = $result_featured->fetch_assoc(); ?>
              <div class="item active">
                <a href="<?php echo $featured['proj_url']; ?>">
                  <img src="<?php echo $featured['proj_img']; ?>" alt="<?php echo $featured['proj_name']; ?>">
                </a>
              </div>
              <?php while ($featured = $result_featured->fetch_assoc()): ?>
                <?php echo '<div class="item">'; ?>
                <?php echo "<a href=\"$featured[proj_url]\">"; ?>
                <?php echo "<img src=\"$featured[proj_img]\" alt=\"$featured[proj_name]\">"; ?>
                <?php echo "</a>"; ?>
                <?php echo "</div>"; ?>
              <?php 
                endwhile;
                $result_featured->free();
                unset($result_featured);
                unset($featured);
              ?>
            </div>
          </div>
        </div>

      </div>

      <!-- Table View -->
      <div class="table-view">
        <div class="container">
          <?php for ($i = 0; $i < $tableview_rows; $i++): ?>
            <?php echo '<div class="row table-view-row">'; ?>
            <?php for ($j = 0; $j < $tableview_cols; $j++): ?>
              <?php
                  echo '<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">'; 
                  $tableview = $result_tableview->fetch_assoc();
                  echo "<a class=\"filler\" href=\"$tableview[proj_url]\" style=\"background: url($tableview[proj_img]) no-repeat\">";
                  echo '<button class="btn btn-default btn-add-to-favorite">Subscribe</button>';
                  echo '</a></div>';
              ?>
            <?php
              endfor;
              echo '</div>';
            ?>
          <?php 
            endfor;
            unset($tableview);
            unset($tableview_cols);
            unset($tableview_rows);
            $result_tableview->free();
            unset($result_tableview);
            unset($i);
            unset($j); 
          ?>
        </div>
      </div>
    </div>