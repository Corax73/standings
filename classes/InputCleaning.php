<?php

class InputCleaning
{
    /**
     * cleaning input from tags, slashes, spaces
     * @param string $inputStr
     * @return array $inputStr
     */
    public function clean(string $inputStr): array
    {
        $inputStr = trim(stripslashes(htmlspecialchars($inputStr)));

        $inputStr = explode(',', $inputStr);
        $inputStr = array_map(function($str) {
            return trim($str);
        }, $inputStr);
        
        return $inputStr;
    }
}
