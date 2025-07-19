<?php
function generateSymmetricalTrianglePattern(): string
{
    $output = "";
    $rows = 5;

    for ($i = 1; $i <= $rows; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            $output .= str_pad($i * $j, 3, " ", STR_PAD_LEFT);
        }
        $output .= "\n";
    }

    for ($i = $rows - 1; $i >= 1; $i--) {
        for ($j = 1; $j <= $i; $j++) {
            $output .= str_pad($i * $j, 3, " ", STR_PAD_LEFT);
        }
        $output .= "\n";
    }

    return $output;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Triangle Pattern</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-white">
    <div class="container mx-auto px-8 py-4 mt-8 bg-gray-50 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Exercise 1.3: Number Triangle Pattern</h2>
        <div class="flex items-center justify-center bg-gray-800 ">
            <pre class="text-white">
                <br>
                <?php
                echo generateSymmetricalTrianglePattern();
                ?>
            </pre>
        </div>
        <?php include 'back_to_home_component.php'; ?>
    </div>
</body>

</html>