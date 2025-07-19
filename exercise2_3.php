<?php

session_start();

class Stack
{
    private $stack = [];
    public function push($value)
    {
        if (!empty($value)) {
            $newStack = [$value];
            foreach ($this->stack as $item) {
                $newStack[] = $item;
            }
            $this->stack = $newStack;
            return true;
        }
        return false;
    }

    public function pop()
    {
        if (empty($this->stack)) {
            return null;
        }
        $value = $this->stack[0];
        $newStack = [];
        for ($i = 1; $i < count($this->stack); $i++) {
            $newStack[] = $this->stack[$i];
        }
        $this->stack = $newStack;
        return $value;
    }

    public function getStack()
    {
        return $this->stack;
    }
}


if (!isset($_SESSION['stack'])) {
    $_SESSION['stack'] = new Stack();
}
$stack = $_SESSION['stack'];


if (isset($_POST['push']) && isset($_POST['value'])) {
    $stack->push($_POST['value']);
}


if (isset($_POST['pop'])) {
    $stack->pop();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stack of integers arrays</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-white">
    <div class="container mx-auto px-8 py-4 mt-8 bg-gray-50 rounded-lg shadow-md">
        <p class="text-2xl font-bold mb-4">Exercise 2.3: Stack of integers arrays</p>
        <div class="pb-12">
            <p class="m-3">
                3. Create a stack of integers using arrays (First in last out)
            <ul class="list-disc ps-6 ml-6">
                <li>Create input fields and push a button to insert a new value</li>
                <li>Create a pop button to remove the top value</li>
                <li>Always display the existing stack content</li>
                <li>Do not use pre-defined PHP array functions like <strong>array_pop</strong></li>
            </ul>
            </p>

        </div>
        <p class="m-3">Answer:</p>


        <!-- Stack Controls -->
        <div class="bg-white p-6 rounded-lg shadow mb-6">
            <form method="post" class="flex gap-2 mb-6">
                <input type="number" name="value" placeholder="Enter a number"
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" name="push"
                    class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Push
                </button>
                <button type="submit" name="pop"
                    class="px-6 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                    Pop
                </button>
            </form>

            <!-- Stack Display -->
            <div class="border border-gray-200 rounded-md p-4 bg-gray-50">
                <h3 class="text-lg font-semibold mb-3 text-gray-700">Stack Contents (Top to Bottom):</h3>
                <div class="space-y-2">
                    <?php
                    $stack = $stack->getStack();
                    if (empty($stack)) {
                        echo '<p class="text-gray-500 italic">Stack is empty</p>';
                    } else {
                        foreach ($stack as $index => $value) {
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