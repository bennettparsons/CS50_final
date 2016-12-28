<body class="fixed-bg home-bg">

<!--<div class="outline" style="color:white">-->
<div class="container">
  <h1 class="user-name">Hello, <?=htmlspecialchars($info["username"]) ?></h1>
      <div class="row">
        <div class="col-12 team-stats">
            <p> You have <b>$<?= htmlspecialchars($info["cash"]) ?></b> </p>
            <p> Wins: <?= htmlspecialchars($info["wins"]) ?>    Losses: <?= htmlspecialchars($info["loses"]) ?>    Draws: <?= htmlspecialchars($info["draws"]) ?></p>
            <p> Total points: <b><?= htmlspecialchars($info["points"]) ?></b>
            <p> Squad Overall: <b><?= htmlspecialchars($overall) ?></b>
        </div>
      </div>
</div>

</div>
<div class="logo-placeholder">
    <img src="<?= htmlspecialchars($info["logo"]) ?>" class="img-rounded" alt="Choose a Logo in Settings!" width="276" height="276">
    <img src="<?= htmlspecialchars($info["unis"]) ?>" class="img-rounded" alt="Choose a Team Uniform in Settings!" width="304" height="400">
    <img src="<?= htmlspecialchars($info["ball"]) ?>" class="img-rounded" alt="Choose a Ball in Settings!" width="276" height="276">
</div>
