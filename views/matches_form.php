<body class="fixed-bg matches-bg">
  
<?php foreach ($infos as $info): ?>
<p class="team-stats"> You are waiting on <b><?= htmlspecialchars($info["username"]) ?></b> </p>
<?php endforeach ?>

<form action="matches.php" method="post">
  <fieldset>
    <div class="form-group">
        <input class="form-control" label="Challenge an opponent to a match!" name="opponent" placeholder="enter username" type="text"/>
    </div>
    <button class="btn btn-default" type="submit">
      Challenge!
    </button>
  </fieldset>
</form>

<?php if (!empty($infos2)): ?>
<p> You have been challenged!</p>
<form action="matches.php" method="post">
  <fieldset>
    <select class="form-control" name="name">
      <option disabled selected value>Players</option>
      
      <?php foreach ($infos2 as $info2): ?>
      <option value = <?= htmlspecialchars($info2["id"]) ?>><?= htmlspecialchars($info2["username"]) ?></option>
      <?php endforeach ?>
      
    </select>
    <button class="btn btn-default" type="submit">
      Accept Challenge!
    </button>
  </fieldset>
</form>
<?php endif ?>