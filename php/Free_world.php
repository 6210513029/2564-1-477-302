<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $semeter_fee = 16000;
        $g_discount = 0.5;
        $u_discount = 0.2;

        $fee_after_u_discount = $semeter_fee * (1 - $u_discount);
        echo "Tuition Fee after university discount (20%) " . $fee_after_u_discount . " bath";
        
        $fee_after_g_discount = $fee_after_u_discount * (1 - ($g_discount-$u_discount));
        echo "<div>Tuition Fee after university discount (30%) " . $fee_after_g_discount . " bath</div>";

        $hello = "Hello \"Monday\"";
        echo 'This is an example of string: $hello';
        echo "<br>";
        echo '<div>This is an example of string: ' . $hello . '</div>';
    ?>
</body>
</html>