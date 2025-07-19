<?php
function generateXPattern(): string
{
    $size = 11;
    $pattern = "";
    $mid = floor($size / 2);

    for ($row = 0; $row < $size; $row++) {
        for ($col = 0; $col < $size; $col++) {
            $on_main_diagonal = ($row == $col);
            $on_anti_diagonal = ($row == $size - 1 - $col);

            if ($on_main_diagonal || $on_anti_diagonal) {
                $distance_from_mid = abs($row - $mid);

                if ($distance_from_mid == 0) {
                    $pattern .= "1";
                } elseif ($distance_from_mid == 2) {
                    $pattern .= "3";
                } elseif ($distance_from_mid == 4) {
                    $pattern .= "5";
                } else {
                    $pattern .= "*";
                }
            } else {
                $pattern .= " ";
            }
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
    <title>X Pattern</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-white">
    <div class="container mx-auto px-8 py-4 mt-8 bg-gray-50 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Part 1: X Pattern</h2>
        <div class="flex items-center justify-center bg-gray-800 ">
            <pre class="text-white p-4 rounded-md overflow-auto">
                <?php
                echo generateXPattern();
                ?>
            </pre>
        </div>
        <p class="mt-4"><a href="index.php" class="text-blue-600 hover:underline">Back to Home</a></p>
    </div>
</body>

</html>