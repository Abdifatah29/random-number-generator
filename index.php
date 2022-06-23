<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RNG</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <main>
        <section id="input">
            <form method="post">
                <div>
                    <!-- An input box to assign how many dice to roll -->
                    <label>How many dice to roll?</label><br/>
                    <input type="number" id="dice_rolled" name="dice_rolled" min="1" value="<?= $_POST['dice_rolled'] ?? ''; ?>"required>
                </div>
                <div>
            <!-- A drop down box to select the sides of the dice (for example d4, d6, d8, d10, d12, d20) -->
                    <label>Select dice</label><br/>
                    <select id="dice_selected" name="dice_selected" required>
                        <optiom>sdf</optiom>
<?php
        $dices = ['d4','d6','d8', 'd10', 'd12', 'd20'];
        $dice_selected = $_POST['dice_selected'] ?? '';
        foreach ($dices as $key => $dice) {
?>
            <option 
                <?= filter_var($dices[$key], FILTER_SANITIZE_NUMBER_INT) == $dice_selected ? 'selected' : ''; ?>
                value="<?= filter_var($dices[$key], FILTER_SANITIZE_NUMBER_INT)?>">
                <?= $dices[$key] ?>
            </option>
<?php
            }
?>
                    </select>
                </div>
                <button>Roll dice</button>
            </form>
        </section>
        <section id="output">
            <h3>Results</h3>
<?php
        if (isset($_POST['dice_rolled'], $_POST['dice_selected'])) {
            for ($i=0; $i < $_POST['dice_rolled']; $i++) { 
?>
            <!-- A PHP rand(); function taking the inputs from the form -->
            <div id="results"><?= rand(1, $_POST['dice_selected']) ?></div>
<?php
            }
        }
?>
        </section>
    </main>
</body>
</html>