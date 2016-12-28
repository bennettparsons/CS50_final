<body class="fixed-bg ranking-bg">
<div>
    <table id="sorted" class = "table table-hover table-bg">
        <thead>
            <tr>
                <th>Username</th>
                <th>Wins</th>
                <th>Losses</th>
                <th>Draws</th>
                <th>Points</th>
                <th>Overall</th>
            </tr>
        </thead>
        
        <tbody align="left">
                
            <?php foreach ($positions as $position): ?>
                <tr>
                    <td><?= $position["username"] ?></td>
                    <td><?= $position["wins"] ?></td>
                    <td><?= $position["loses"] ?></td>
                    <td><?= $position["draws"] ?></td>
                    <td><?= $position["points"] ?></td>
                    <td><?= $position["overall"] ?></td>
                </tr>
            <?php endforeach ?>
        
        </tbody>
        
    </table>
</div>
