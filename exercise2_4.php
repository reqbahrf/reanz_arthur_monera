<?php

session_start();

class Queue
{

    private $queue = [];
    public function enqueue($value)
    {
        if (!empty($value)) {

            $this->queue[] = $value;
            return true;
        }
        return false;
    }

    public function dequeue()
    {
        if (empty($this->queue)) {
            return null;
        }


        $value = $this->queue[0];


        $newQueue = [];
        for ($i = 1; $i < count($this->queue); $i++) {
            $newQueue[] = $this->queue[$i];
        }

        $this->queue = $newQueue;
        return $value;
    }

    public function getQueue()
    {
        return $this->queue;
    }
}

if (!isset($_SESSION['queue'])) {
    $_SESSION['queue'] = new Queue();
}
$queue = $_SESSION['queue'];


if (isset($_POST['enqueue']) && isset($_POST['value'])) {
    $queue->enqueue($_POST['value']);
}


if (isset($_POST['dequeue'])) {
    $queue->dequeue();
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
        <h2 class="text-2xl font-bold mb-4">Exercise 2.4: Queue of integers arrays</h2>
        <div class="pb-12">
            <p class="m-3">
                4. Create a queue of integers using arrays (first in first out)
            <ul class="list-disc ps-6 ml-6">
                <li>Create input fields and push a button to insert a new value</li>
                <li>Create a pop button to remove the old value</li>
                <li>Always display the existing queue content</li>
                <li>Do not use pre-defined PHP array functions like <strong>array_pop</strong></li>
            </ul>
            </p>

        </div>
        <p class="m-3">Answer:</p>

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
                    $queue = $queue->getQueue();
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

        <?php include 'back_to_home_component.php'; ?>
    </div>
</body>

</html>