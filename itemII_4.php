<?php
require_once 'Part2.php';

session_start();


if (!isset($_SESSION['part2'])) {
    $_SESSION['part2'] = new Part2();
}
$part2 = $_SESSION['part2'];


if (isset($_POST['enqueue']) && isset($_POST['value'])) {
    $part2->enqueue($_POST['value']);
}


if (isset($_POST['dequeue'])) {
    $part2->dequeue();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queue of integers arrays</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-white">
    <div class="container mx-auto px-8 py-4 mt-8 bg-gray-50 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Part 2: Queue of integers arrays</h2>

        <!-- Queue Controls -->
        <div class="bg-white p-6 rounded-lg shadow mb-6">
            <form method="post" class="flex gap-2 mb-6">
                <input type="number" name="value" placeholder="Enter a number"
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" name="enqueue"
                    class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Enqueue
                </button>
                <button type="submit" name="dequeue"
                    class="px-6 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                    Dequeue
                </button>
            </form>

            <!-- Queue Display -->
            <div class="border border-gray-200 rounded-md p-4 bg-gray-50">
                <h3 class="text-lg font-semibold mb-3 text-gray-700">Queue Contents (Front to Back):</h3>
                <div class="flex flex-wrap gap-2">
                    <?php
                    $queue = $part2->getQueue();
                    if (empty($queue)) {
                        echo '<p class="text-gray-500 italic">Queue is empty</p>';
                    } else {
                        foreach ($queue as $index => $value) {
                            echo '<div class="px-4 py-2 bg-white border border-gray-200 rounded-md shadow-sm">';
                            echo htmlspecialchars($value);
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="index.php" class="text-blue-600 hover:underline">Back to Home</a>
        </div>
    </div>
</body>

</html>