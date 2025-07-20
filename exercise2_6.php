<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fix code</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-white">
    <div class="container mx-auto px-8 py-4 mt-8 bg-gray-50 rounded-lg shadow-md">
        <p class="text-2xl font-bold mb-4">Exercise 2.6: Fix the code function to output the correct result</p>
        <div class="pb-12">
            <p class="m-3">
                6. Fix the code function to output the correct result. <strong>Explain you answer</strong>
            </p>
            <img src="assets/exercise2.6.webp" alt="bubble sort code snippet" class="w-1/2 h-auto mx-auto object-contain">

        </div>
        <p class="m-3">Explaination:</p>
        <div class="w-3/4 mx-auto">
            <p class="text-justify pb-5 indent-8">From what I know, bubble sort is a sorting algorithm that repeatedly steps through the list, compares adjacent elements, and swaps them if they are in the wrong order. This process continues until the list is fully sorted.</p>
            <p class="text-justify pb-5">In the code snippet, the swapping logic block has a logical error.
            <pre class="bg-gray-800 text-white p-3 m-3 rounded w-1/2 mx-auto">
            $temp = $lists[$child + 1];
            $lists[$child] = $lists[$child + 1];</pre>
            In the second line the value of <strong>$lists[$child]</strong> overrides the value of <strong>$lists[$child + 1]</strong> before it has been saved so now both <strong>$lists[$child]</strong> and <strong>$lists[$child + 1]</strong> are the same value. in short the swapping is not working.
            <br>To fix this, we store the value of <strong>$lists[$child]</strong> in a temporary variable before overriding it.</p>
            <pre class="bg-gray-800 text-white p-3 m-3 rounded w-1/2 mx-auto">
            $temp = $lists[$child];
            $lists[$child] = $lists[$child + 1];
            $lists[$child] = $temp;
            </pre>
        </div>
        <?php include 'back_to_home_component.php'; ?>
    </div>
</body>

</html>