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
                require_once 'Part1.php';
                $part1 = new Part1();
                echo $part1->generateXPattern();
                ?>
            </pre>
        </div>
        <p class="mt-4"><a href="index.php" class="text-blue-600 hover:underline">Back to Home</a></p>
    </div>
</body>

</html>