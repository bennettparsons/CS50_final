<body class="fixed-bg history-bg"
<div>
    <table class = "table table-hover table-bg">
        <thead>
            <tr>
                <th>Transaction</th>
                <th>Date/Time</th>
                <th>Name</th>
                <th>Position</th>
                <th>Price ($)</th>
                <th>Overall</th>
            </tr>
        </thead>
        
        <tbody align="left">
                
            <?php foreach ($positions as $position): ?>
                <tr>
                    <td><?= $position["transaction"] ?></td>
                    <td><?= $position["time"] ?></td>
                    <td><?= $position["firstname"] ?> <?= $position["lastname"] ?></td>
                    <td><?= $position["position"] ?></td>
                    <td><?= $position["price"] ?></td>
                    <td><?= $position["overall"] ?></td>
                </tr>
            <?php endforeach ?>
        
        </tbody>
    </table>
</div>
