<?php
error_reporting(0);
include 'db.php';
include 'nav.php';
// echo'demo';
$sql = " select * from `s`";
$result = mysqli_query($cn, $sql);
// $columnArray = [];

if ($result->num_rows > 0) {
    // Fetch each row
    while ($row = $result->fetch_assoc()) {
        $columnArray[] = $row['name'];
        $a[] = $row['option_a'];
        $b1[] = $row['option_b'];
        $c[] = $row['option_c'];
        $d[] = $row['option_d'];
        $tu[] = $row['true_ans'];
    }
}

//for ($i = 0; $i < count($columnArray); $i++) {

// echo $columnArray[$i]."<br>";
// echo'<button type="submit" name="button" value=">'.$j.'"'.$j.'</button>';
// $j++;
//}



$index = 0;
$b = $_POST['button'];
// Check if a form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $index = intval($b);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/mycodes/login_new/css/demo.css">
</head>

<body>
    <div class="con">
        <form action="demo.php" method="post">
            <!-- <button type="submit" name="button" value="1">1</button>
            <button type="submit" name="button" value="2">2</button>
            <button type="submit" name="button" value="3">3</button> -->

            <?php
            $j = 1;
            for ($i = 0; $i < count($columnArray); $i++) {
                echo '<button class="b" type="submit" name="button" value="' . $j . '">Q. ' . $j . '</button>';
                $j++;
            }
            ?>
        </form>
    </div>
    <div class="re">
        <?php
        // Display the current index
        // echo "Selected index: $index<br>";

        // Optionally display the corresponding name if it exists in the array
        $fl = 'a';
        if ($index > 0 && $index <= count($columnArray)) {
            echo "<p class='q'>Que " . $index . ". &nbsp;&nbsp;&nbsp;&nbsp;" . $columnArray[$index - 1] . "</p>";
            echo "<p class='c1 c'>a. " . $a[$index - 1] . "</p>";
            echo "<p class='c2 c'>b. " . $b1[$index - 1] . "</p>";
            echo "<p class='c1 c'>c. " . $c[$index - 1] . "</p>";
            echo "<p class='c2 c'>d. " . $d[$index - 1] . "</p>";
            if ($tu[$index - 1] == $a[$index - 1]) {
                $fl = 'a';
            } elseif ($tu[$index - 1] == $b1[$index - 1]) {
                $fl = 'b';
            } elseif ($tu[$index - 1] == $c[$index - 1]) {
                $fl = 'c';
            } elseif ($tu[$index - 1] == $d[$index - 1]) {
                $fl = 'd';
            }
            echo "<p class='c1 hi'>True ans &nbsp;→ " . $fl . ". " . $tu[$index - 1] . "</p>";
        }
        ?>
        <button onclick="showans()">Show answer</button>
    </div>
</body>

</html>
<script>
    let ture = document.querySelector(".hi")
    console.log(ture);

    function showans() {
        ture.style.display = "block";
        // alert("ok")

    }
</script>
