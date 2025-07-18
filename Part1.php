<?php

class Part1
{
    public function generateDiamondPattern(): string
    {
        $size = 13;
        $pattern = "";
        $diamond_height = 7;
        $diamond_mid = floor($diamond_height / 2);

        $overall_mid = floor($size / 2);

        for ($i = 0; $i < $size; $i++) {
            $effective_row = ($i <= $overall_mid) ? $i : $size - 1 - $i;

            $distance_from_diamond_mid = abs($effective_row - $diamond_mid);

            $leading_spaces = 9 + $distance_from_diamond_mid;
            $pattern .= str_repeat(" ", $leading_spaces);

            $pattern .= "*";
            if ($distance_from_diamond_mid < $diamond_mid) {
                $inner_spaces = ($diamond_mid - $distance_from_diamond_mid) * 2 - 1;
                $pattern .= str_repeat(" ", $inner_spaces);
                $pattern .= "*";
            }
            $pattern .= "\n";
        }
        return $pattern;
    }

    public function generateXPattern(): string
    {
        $size = 11;
        $pattern = "";
        $mid = floor($size / 2);

        for ($row = 0; $row < $size; $row++) {
            for ($col = 0; $col < $size; $col++) {
                $on_main_diagonal = ($row == $col);
                $on_anti_diagonal = ($row == $size - 1 - $col);

                if ($on_main_diagonal || $on_anti_diagonal) {
                    $distance_from_mid = abs($row - $mid);

                    if ($distance_from_mid == 0) {
                        $pattern .= "1";
                    } elseif ($distance_from_mid == 2) {
                        $pattern .= "3";
                    } elseif ($distance_from_mid == 4) {
                        $pattern .= "5";
                    } else {
                        $pattern .= "*";
                    }
                } else {
                    $pattern .= " ";
                }
            }
            $pattern .= "\n";
        }
        return $pattern;
    }

    public function generateSymmetricalTrianglePattern(): string
    {
        $output = "";
        $rows = 5;

        for ($i = 1; $i <= $rows; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                $output .= str_pad($i * $j, 3, " ", STR_PAD_LEFT);
            }
            $output .= "\n";
        }

        for ($i = $rows - 1; $i >= 1; $i--) {
            for ($j = 1; $j <= $i; $j++) {
                $output .= str_pad($i * $j, 3, " ", STR_PAD_LEFT);
            }
            $output .= "\n";
        }

        return $output;
    }

    function generateNumberTablePattern(): string
    {
        $output = "";
        $rows = 6;
        $cols = 5;

        for ($i = 1; $i <= $rows; $i++) {
            for ($j = 1; $j <= $cols; $j++) {
                $value = $i * $j * pow(2, $j - 1);
                $output .= str_pad($value, 7, " ", STR_PAD_LEFT);
            }
            $output .= "\n";
        }

        return $output;
    }
}
