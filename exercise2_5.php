<?php
function generateConsonantGrid(int $rows, int $cols): string
{
    $consonants = array_merge(
        array_diff(range('A', 'Z'), ['A', 'E', 'I', 'O', 'U']),
        array_diff(range('a', 'z'), ['a', 'e', 'i', 'o', 'u'])
    );

    $html = '<div class="overflow-x-auto">';
    $html .= '<table class="min-w-full border border-gray-300 border-collapse">';

    for ($i = 0; $i < $rows; $i++) {
        $html .= '<tr>';

        for ($j = 0; $j < $cols; $j++) {
            $randomConsonant = $consonants[array_rand($consonants)];

            $bgClass = ($i + $j) % 2 === 0 ? 'bg-gray-50' : 'bg-white';

            $html .= sprintf(
                '<td class="%s border border-gray-300 p-3 text-center text-lg font-mono">%s</td>',
                $bgClass,
                htmlspecialchars($randomConsonant)
            );
        }

        $html .= '</tr>';
    }

    $html .= '</table></div>';
    return $html;
}
$gridHtml = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $length = isset($_POST['length']) ? (int)$_POST['length'] : 0;
    $width = isset($_POST['width']) ? (int)$_POST['width'] : 0;

    if ($length > 0 && $width > 0) {
        $gridHtml = generateConsonantGrid($length, $width);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Part 2: Consonant Grid Generator</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-8">
    <div class="container mx-auto">

        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <h1 class="text-2xl font-bold mb-6">Exercise 2.5: Consonant Grid Generator</h1>
            <form method="POST" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="length" class="block text-sm font-medium text-gray-700 mb-1">Length (rows):</label>
                        <input type="number" id="length" name="length" min="1" max="20" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="width" class="block text-sm font-medium text-gray-700 mb-1">Width (columns):</label>
                        <input type="number" id="width" name="width" min="1" max="20" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Generate Grid
                    </button>
                </div>
            </form>
            <?php include 'back_to_home_component.php'; ?>
        </div>

        <?php if (!empty($gridHtml)): ?>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Generated Grid <?php echo $length . ' x ' . $width; ?></h2>
                <?php echo $gridHtml; ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>