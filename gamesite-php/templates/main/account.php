<?php
    $sql = "SELECT birthday FROM user_data WHERE session_id=\"".$_SESSION['user_hash']."\"";

    $errs = array();

    if (!($result = $mysqli->query($sql))) {
        $errs['personal'] = 'Failed to load personal data';
    } else {
        $birthday = $result->fetch_assoc()['birthday'];
        $result->close();
    }

    $sql = "SELECT proj_name, proj_url, proj_desc FROM game_projects g JOIN (SELECT proj_id FROM subscribes s JOIN (SELECT u.id FROM users u JOIN user_data d ON u.id=d.usr_id WHERE u.email=\"".$_SESSION['user_login']."\" AND d.session_id=\"".$_SESSION['user_hash']."\") i ON s.usr_id=i.id) p ON g.id=p.proj_id";

    if (!($result = $mysqli->query($sql))) {
        $errs['subscribes'] = 'Failed to load subscribes';
    } else {
        $subscribes = $result->fetch_all(MYSQLI_ASSOC);
        $result->close();
    }

    $sql = "SELECT proj_name, scores FROM game_projects g JOIN leaderboard_global l ON g.id=l.proj_id WHERE usr_id=(SELECT u.id FROM users u JOIN user_data d ON u.id=d.usr_id WHERE u.email=\"".$_SESSION['user_login']."\" AND d.session_id=\"".$_SESSION['user_hash']."\")";

    if (!($result = $mysqli->query($sql))) {
        $errs['leaderboard'] = 'Failed to load leaderboard';
    } else {
        $leaderboard_global = $result->fetch_all(MYSQLI_ASSOC);
        $result->close();
    }

    $mysqli->close();
?>

<div class="main account">
  <div class="container account-personal">
    <h2>Personal data</h2>
    <div class="table-responsive">
      <table class="table table-hover">
        <tr>
          <td class="text-info">E-mail:</td>
          <td>
            <?php echo $_SESSION['user_login'];?>
          </td>
        </tr>
        <tr>
          <td class="text-info">Nickname:</td>
          <td>
            <?php
                if (isset($_SESSION['nickname'])) {
                    $nickname = $_SESSION['nickname'];
                } else {
                    $nickname = 'not stated';
                }
                echo $nickname;
            ?>
          </td>
        </tr>
        <tr>
          <td class="text-info">Birthday:</td>
          <td>
            <?php
                if (!$birthday) {
                    $birthday = 'not stated';
                }
                echo $birthday;
            ?>
          </td>
        </tr>
      </table>
    </div>
  </div>
  <hr>
  <div class="container account-subscribes">
    <h2>Subscribes</h2>
    <?php if(!isset($errs['subscribes'])): ?>
      <div class="table-responsive">
        <table class="table table-hover">
            <?php foreach ($subscribes as $project): ?>
            <tr>
                <td>
                <?php echo "<a href=\"".$project['proj_url']."\">".$project['proj_name']."</a>"; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
      </div>
    <?php else: ?>
      <div>
        <p class="text-danger"><?php echo $errs['subscribes']; ?></p>
      </div>
    <?php endif; ?>
  </div>
  <hr>
  <div class="container account-leaderboards">
    <h2>Leaderboards</h2>
    <?php if (!isset($errs['leaderboard'])): ?>
      <div class="row">
        <div class="col-xs-12 col-md-6">
          <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-info">Project</th>
                    <th class="text-info">Scores</th>
                  </tr>
                </thead>
                <?php foreach ($leaderboard_global as $leaderboard): ?>
                <tr>
                    <td>
                    <?php echo $leaderboard['proj_name']; ?>
                    </td>
                    <td>
                    <?php echo $leaderboard['scores']; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
          </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <!-- Daily leaderboards -->
        </div>
      <?php else: ?>
        <div>
          <p class="text-danger"><?php echo $errs['leaderboard']; ?></p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>