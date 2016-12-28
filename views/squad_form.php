<body class="fixed-bg squad-bg">
<div class="message">
    <?php
        if ($squadsize[0]["squad_size"] == 0)
        {
            echo "You don't have any players on your squad... Try buying some under Transfers!";
        }
        
        if ($squadsize[0]["squad_size"] > 0 && $squadsize[0]["squad_size"] < 11)
        {
            echo "You only have {$squadsize[0]["squad_size"]} players on your squad! Fill your squad with the Transfers tab!";
        }
        
        if ($squadsize[0]["squad_size"] >= 11)
        {
            echo "You have {$squadsize[0]["squad_size"]} players on your squad!";
        }
    ?>
</div>

<!--<h1>Strikers</h1>-->
<!--    <?php foreach ($FWDS as $FWD): ?>-->
        
<!--        <div class="card player-card" style="max-width: 202px;" float="inherit">-->
<!-- Image -->
<!--        <img class="card-img-top" src="http://cdn.soccerwiki.org/images/player/<?php echo rawurlencode($FWD["image"]) ?>" alt="player picture">-->
<!-- Text Content -->
<!--        <div class="card-block">-->
<!--            <h4 class="card-title"><?= htmlspecialchars($FWD["name"]) ?></h4>-->
<!--            <p class="card-text">Position: <?= htmlspecialchars($FWD["position"]) ?></p>-->
<!--            <p class="card-text">Overall: <?= htmlspecialchars($FWD["overall"]) ?></p>-->
<!--        </div>-->
<!--    </div>-->
<!--    <?php endforeach ?>-->

<h1 class="position">Strikers</h1>
<div class="card-deck-wrapper">
        <?php foreach ($FWDS as $FWD): ?>
            <div>
                <div class="card-deck">
                    <div class="card player-card">
                        <img class="card-img-top" src="http://cdn.soccerwiki.org/images/player/<?php echo rawurlencode($FWD["image"]) ?>" alt="Card image cap">
                        <div class="card-block">
                            <h4 class="card-title"><?= htmlspecialchars($FWD["firstname"]) ?> <?= htmlspecialchars($FWD["lastname"]) ?></h4>
                            <p class="card-text">Position: <?= htmlspecialchars($FWD["position"]) ?></p>
                            <p class="card-text">Overall: <?= htmlspecialchars($FWD["overall"]) ?></p>
                        </div>
                    </div>
                </div>
            </div>
            
        <?php endforeach ?>
</div>

<h1 class="position">Midfielders</h1>
<div class="card-deck-wrapper">
        <?php foreach ($MIDS as $MID): ?>
            <div class="card-deck">
                <div class="card player-card">
                    <img class="card-img-top" src="http://cdn.soccerwiki.org/images/player/<?php echo rawurlencode($MID["image"]) ?>" alt="Card image cap">
                    <div class="card-block">
                        <h4 class="card-title"><?= htmlspecialchars($MID["firstname"]) ?> <?= htmlspecialchars($MID["lastname"]) ?></h4>
                        <p class="card-text">Position: <?= htmlspecialchars($MID["position"]) ?></p>
                        <p class="card-text">Overall: <?= htmlspecialchars($MID["overall"]) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
</div>

<h1 class="position">Defenders</h1>
<div class="card-deck-wrapper">
        <?php foreach ($DEFS as $DEF): ?>
            <div class="card-deck">
                <div class="card player-card">
                    <img class="card-img-top" src="http://cdn.soccerwiki.org/images/player/<?php echo rawurlencode($DEF["image"]) ?>" alt="Card image cap">
                    <div class="card-block">
                        <h4 class="card-title"><?= htmlspecialchars($DEF["firstname"]) ?> <?= htmlspecialchars($DEF["lastname"]) ?></h4>
                        <p class="card-text">Position: <?= htmlspecialchars($DEF["position"]) ?></p>
                        <p class="card-text">Overall: <?= htmlspecialchars($DEF["overall"]) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
</div>

<h1 class="position">Goalkeepers</h1>
<div class="card-deck-wrapper">
        <?php foreach ($GKS as $GK): ?>
            <div class="card-deck">
                <div class="card player-card">
                    <img class="card-img-top" src="http://cdn.soccerwiki.org/images/player/<?php echo rawurlencode($GK["image"]) ?>" alt="Card image cap">
                    <div class="card-block">
                        <h4 class="card-title"><?= htmlspecialchars($GK["firstname"]) ?> <?= htmlspecialchars($GK["lastname"]) ?></h4>
                        <p class="card-text">Position: <?= htmlspecialchars($GK["position"]) ?></p>
                        <p class="card-text">Overall: <?= htmlspecialchars($GK["overall"]) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
</div>