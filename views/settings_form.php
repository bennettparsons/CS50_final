<body class="fixed-bg settings-bg">
<form action="settings.php" method="post">
  <fieldset>
    <div class="form-group">
        <input class="form-control" name="team" placeholder="Team Name" type="text"/>
    </div>
    <div class="submit">
      <button class="btn btn-default" type="submit">
      Save
    </button>
    </div>
    
  </fieldset>
</form>
  
<form action="settings.php" method="post">
  <fieldset>
    <div class="form-group">
        <input class="form-control" name="username" placeholder="Username" type="text"/>
    </div>
    <div class="form-group">
        <input class="form-control" name="password" placeholder="Password" type="password"/>
    </div>
    <div class="form-group">
        <input class="form-control" name="new_pass" placeholder="New Password?" type="password"/>
    </div>
    <div class="form-group">
        <input class="form-control" name="confirm_pass" placeholder="Confirm New Password" type="password"/>
    </div>
    <div class="form-group">
        <input class="form-control" name="new_user" placeholder="New Username?" type="text"/>
    </div>
    <div class="form-group">
        <input class="form-control" name="confirm_user" placeholder="Confirm New Username" type="text"/>
    </div>
    <div class="form-group">
      <button class="btn btn-default" type="submit">
        Save
      </button>
    </div>
  </fieldset>
</form>

<form action="settings.php" method="post">
  <fieldset>
    <div class="form-group">
        <input class="form-control" name="logo" placeholder="Logo image URL" type="url"/>
    </div>
    <div class="form-group">
        <input class="form-control" name="unis" placeholder="Uniform image URL" type="url"/>
    </div>
    <div class="form-group">
        <input class="form-control" name="ball" placeholder="Soccer ball image URL" type="url"/>
    </div>
    <div class="form-group">
      <button class="btn btn-default" type="submit">
        Save
      </button>
    </div>
  </fieldset>
</form>
  
  
  
  
<!--  <fieldset>--> 
<!--  <div class="form-group">-->
<!--    <label for="exampleInputFile">File input</label>-->
<!--    <input type="file" id="exampleInputFile">-->
<!--    <p class="help-block">Example block-level help text here.</p>-->
<!--  </div>-->
<!--  <div class="checkbox">-->
<!--    <label>-->
<!--      <input type="checkbox"> Check me out-->
<!--    </label>-->
<!--  </div>-->
<!--  <button type="submit" class="btn btn-default">Submit</button>-->
<!--</form>-->
<!--</fieldset>-->

<!--<body class="fixed-bg transfers-bg">-->
<!--<form action="sell.php" method="post">-->
<!--    <fieldset>-->
<!--        <div class="form-group">-->
<!--            <select class="form-control" name="name">-->
<!--                <option disabled selected value>Players</option>-->
                
<!--                <?php foreach ($rows as $row): ?>-->
<!--                <option value = <?= htmlspecialchars($row["name"]) ?>><?= htmlspecialchars($row["name"]) ?></option>-->
<!--                <?php endforeach ?>-->
                
<!--            </select>-->
<!--        </div>-->

<!--        <div class="form-group">-->
<!--            <button class="btn btn-default" type="submit">-->
<!--                Sell-->
<!--            </button>-->
<!--        </div>-->
<!--    </fieldset>-->
<!--</form>-->