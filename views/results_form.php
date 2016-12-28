<body class="fixed-bg results-bg">
<div>
    <table class = "table table-hover table-bg">
        <thead>
            <tr>
                <th>Result</th>
                <th>Margin</th>
                <th>Time</th>
            </tr>
        </thead>
        
        <tbody align="left">
                
            <?php foreach ($positions as $position): ?>
                <tr>
                    <td><?= $position["result"] ?></td>
                    <td><?= $position["margin"] ?></td>
                    <td><?= $position["time"] ?></td>
                    
                </tr>
            <?php endforeach ?>
        
        </tbody>
        
    </table>
</div>
