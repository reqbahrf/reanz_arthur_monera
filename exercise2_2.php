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
    $html .= '<table class="border border-gray-300 border-collapse w-full max-w-md mx-auto">';


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
        <h2 class="text-2xl font-bold mb-4">Part 2: Manipulation of Multi Dimensional Array</h2>
        <div class="flex items-center justify-center bg-gray-800 ">
            <div class="text-white p-4 rounded-md overflow-auto">
                <?php
                echo manipulationOfMultiDimensionalArray();
                ?>
            </div>
        </div>
        <p class="mt-4"><a href="index.php" class="text-blue-600 hover:underline">Back to Home</a></p>
    </div>
</body>

</html>