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
        <p class="text-2xl font-bold mb-4">Exercise 2.1: Random Character Table from a to k</p>
        <div class="pb-12">
            <p class="m-3">
                1. Generate a random character from a -k
            <ul class="list-disc ps-6 ml-6">
                <li>Create a 4 x 5 table</li>
                <li>Display all the random characters inside the table</li>
                <li>Highlight all the character that belongs to the even column</li>
            </ul>
            </p>
            <img src="assets/exercise2.1.webp" class="w-1/4 h-auto mx-auto object-contain" alt="Random Character Table">

        </div>
        <p class="m-3">Answer:</p>
        <div class="flex items-center justify-center bg-gray-800 ">
            <div class="text-white p-4 rounded-md overflow-auto">
                <?php
                echo generateRandomCharTable();
                ?>
            </div>
        </div>
        <?php include 'back_to_home_component.php'; ?>
    </div>
</body>

</html>