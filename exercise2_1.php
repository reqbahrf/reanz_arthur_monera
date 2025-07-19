<?php
function generateRandomCharTable(): string
{
    $html = '<div class="p-4">';
    $html .= '<table class="border border-gray-300 border-collapse w-full max-w-md mx-auto">';


    for ($i = 0; $i < 4; $i++) {
        $html .= '<tr>';

        for ($j = 0; $j < 5; $j++) {

            $char = rand(0, 1) ? chr(rand(97, 107)) : chr(rand(65, 75));
            $ascii = ord($char);


            $class = ($ascii % 2 === 0) ? 'bg-green-200' : '';

            $html .= sprintf(
                '<td class="border border-gray-300 p-3 text-center text-lg font-mono %s">%s</td>',
                $class,
                htmlspecialchars($char)
            );
        }
        $html .= '</tr>';
    }

    $html .= '</table></div>';
    return $html;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Character Table</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-white">
    <div class="container mx-auto px-8 py-4 mt-8 bg-gray-50 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Part 2: Random Character Table from a to k</h2>
        <div class="flex items-center justify-center bg-gray-800 ">
            <div class="text-white p-4 rounded-md overflow-auto">
                <?php
                echo generateRandomCharTable();
                ?>
            </div>
        </div>
        <p class="mt-4"><a href="index.php" class="text-blue-600 hover:underline">Back to Home</a></p>
    </div>
</body>

</html>