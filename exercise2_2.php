<?php
function manipulationOfMultiDimensionalArray(): string
{

    $numbers = [];
    while (count($numbers) < 16) {
        $num = rand(1, 100);
        if (!in_array($num, $numbers)) {
            $numbers[] = $num;
        }
    }


    $grid = array_chunk($numbers, 4);


    $rowSums = [];
    foreach ($grid as $row) {
        $rowSums[] = array_sum($row);
    }


    $colSums = [0, 0, 0, 0];
    foreach ($grid as $row) {
        foreach ($row as $colIndex => $value) {
            $colSums[$colIndex] += $value;
        }
    }


    $html = '<div class="p-4">';
    $html .= '<table class="border-collapse w-full max-w-md mx-auto">';


    foreach ($grid as $rowIndex => $row) {
        $html .= '<tr>';
        foreach ($row as $value) {
            $html .= '<td class="border border-gray-300 p-3 text-center">' . $value . '</td>';
        }
        $html .= '<td class="p-3 text-center font-bold ">' . $rowSums[$rowIndex] . '</td>';
        $html .= '</tr>';
    }


    $html .= '<tr>';
    foreach ($colSums as $sum) {
        $html .= '<td class=" p-3 text-center font-bold ">' . $sum . '</td>';
    }
    $html .= '<td class="p-3 text-center font-bold "></td>';
    $html .= '</tr>';

    $html .= '</table></div>';
    return $html;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manipulation of Multi Dimensional Array</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-white">
    <div class="container mx-auto px-8 py-4 mt-8 bg-gray-50 rounded-lg shadow-md">
        <p class="text-2xl font-bold mb-4">Exercise 2.2: Manipulation of Multidimensional array</p>
        <div class="pb-12">
            <p class="m-3">
                2. Manipulation of Multidimensional array
            <ul class="list-disc ps-6 ml-6">
                <li>Create a 4 x 4 table</li>
                <li>Generate a random number from 1 - 100</li>
                <li>The number generated should always be unique</li>
                <li>Sum up the number per column and row</li>
            </ul>
            </p>
            <img src="assets/exercise2.2.webp" class="w-1/4 h-auto mx-auto object-contain" alt="Manipulation of Multidimensional array">

        </div>
        <p class="m-3">Answer:</p>
        <div class="flex items-center justify-center bg-gray-800 ">
            <div class="text-white p-4 rounded-md overflow-auto">
                <?php
                echo manipulationOfMultiDimensionalArray();
                ?>
            </div>
        </div>
        <?php include 'back_to_home_component.php'; ?>
    </div>
</body>

</html>