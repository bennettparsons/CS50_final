<body class="fixed-bg transfers-bg">
    
    <!--<form class="form-inline" id="form" role="form">-->
    <!--    <div class="form-group">-->
    <!--        <label class="sr-only" for="buy">Firstname Lastname</label>-->
    <!--        <input class="form-control" name="name" id="buy" placeholder="Firstname Lastname" type="text"/>-->
    <!--    </div>-->
    <!--</form>-->
    
<?php if ($cash < 2000): ?>
<h2 class="team-stats">You don't have enough cash to buy more players!</h2>
<?php endif ?>
    
<?php if ($cash >= 2000): ?>

<h3 class="team-stats" style="padding:15px;">Search for a player to buy, then input their name and position!</h3>
            
<form action="buy.php" method="post">
    <fieldset>
        <div style="width: 100%;">
            <div style="float:left; width: 80%">
                <div class="form-group">
                    <input class="form-control" id="buy" name="firstname" placeholder="Firstname" type="text"/>
                </div>
                <div class="form-group">
                    <input class="form-control" id="buy" name="lastname" placeholder="Lastname" type="text"/>
                </div>
            </div>
            <div style="float:right;" class="buy">
                <div class="form-group">
                    <select class="form-control" name="position">
                        <option disabled selected value>Position</option>
                        <option value = FWD >FWD</option>
                        <option value = MID >MID</option>
                        <option value = DEF >DEF</option>
                        <option value = GK >GK</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-default" type="submit">
                        Buy
                    </button>
                </div>
            </div>
        </div>
        <div style="clear:both"></div>
        <div style="width:180px;height:3000px;border:1px solid #000;background-color:white;opacity:.7;position:relative;left:365px;"></div>
    </fieldset>
</form>

<?php endif ?>