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
                require_once 'Part2.php';
                $part2 = new Part2();
                echo $part2->generateRandomCharTable();
                ?>
            </div>
        </div>
        <p class="mt-4"><a href="index.php" class="text-blue-600 hover:underline">Back to Home</a></p>
    </div>
</body>

</html>