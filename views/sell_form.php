<body class="fixed-bg transfers-bg">
<form action="sell.php" method="post">
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
                Sell
            </button>
        </div>
    </fieldset>
</form>