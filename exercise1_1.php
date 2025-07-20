<?php
function generateDiamondPattern(): string
{
    $size = 13;
    $pattern = "";
    $diamond_height = 7;
    $diamond_mid = floor($diamond_height / 2);

    $overall_mid = floor($size / 2);
    $width_factor = 4;

    for ($i = 0; $i < $size; $i++) {
        $effective_row = ($i <= $overall_mid) ? $i : $size - 1 - $i;

        $distance_from_diamond_mid = abs($effective_row - $diamond_mid);

        $leading_spaces = 9 + ($distance_from_diamond_mid * $width_factor);
        $pattern .= str_repeat(" ", $leading_spaces);

        $pattern .= "*";
        if ($distance_from_diamond_mid < $diamond_mid) {
            $inner_spaces = ($diamond_mid - $distance_from_diamond_mid) * (2 * $width_factor) - 1;
            $pattern .= str_repeat(" ", $inner_spaces);
            $pattern .= "*";
        }
        $pattern .= "\n";
    }
    return $pattern;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diamond Pattern</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-white">
    <div class="container mx-auto px-8 py-4 mt-8 bg-gray-50 rounded-lg shadow-md">
        <p class="text-2xl font-bold mb-4">Exercise 1.1: Diamond Pattern</p>
        <div class="pb-12">
            <p class="m-3">1. Create the Given pattern</p>
            <img src="assets/exercise1.1.webp" class="w-1/4 h-auto mx-auto object-contain" alt="Diamond Pattern">

        </div>
        <p class="m-3">Answer:</p>
        <div class="flex items-center justify-center bg-gray-800 ">
            <pre class="text-white"><br><?php echo generateDiamondPattern(); ?><br></pre>
        </div>
        <?php include 'back_to_home_component.php'; ?>
    </div>
</body>

</html>