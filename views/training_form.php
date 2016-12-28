<body class="fixed-bg training-bg">
    
<?php if ($cash < 1000): ?>
<h2 class="table-bg" style="opacity:.5;">You don't have enough cash to train players!</h2>
<?php endif ?>

<?php if ($cash >= 1000): ?>
<h1 class="table-bg" style="opacity:.5;">Train a player for only $1,000.00!</h1>
<form action="training.php" method="post">
    <fieldset>
        <div class="form-group">
            <select class="form-control" name="name">
                <option disabled selected value>Players</option>
                
                <?php foreach ($infos as $info): ?>
                <option value = <?= htmlspecialchars($info["player_id"]) ?>>
                    <?= htmlspecialchars($info["firstname"]) ?> <?= htmlspecialchars($info["lastname"]) ?></option>
                <?php endforeach ?>
                
            </select>
        </div>

        <div class="form-group">
            <button class="btn btn-default" type="submit">
                Train!
            </button>
        </div>
    </fieldset>
</form>
<?php endif ?>