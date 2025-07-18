<?php
class Part2
{


    private $stack = [];


    private $queue = [];

    public function generateRandomCharTable(): string
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

    public function manipulationOfMultiDimensionalArray(): string
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

    public function generateConsonantGrid(int $rows, int $cols): string
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
}
