<?php declare(strict_types=1);

namespace App\Util;

/**
 * Pangrams, anagrams and palindromes
 *
 * Implement each of the functions of the Checker class.
 * Aim to spend about 10 minutes on each function.
 */
class Checker
{
    /**
     * A palindrome is a word, phrase, number, or other sequence of characters
     * which reads the same backward or forward.
     *
     * @param string $word
     * @return bool
     */
    public function isPalindrome(string $word) : bool
    {
        $word = strtolower($word);

        $word = str_replace(' ', '', $word);

        return $word === strrev($word);
    }

    /**
     * An anagram is the result of rearranging the letters of a word or phrase
     * to produce a new word or phrase, using all the original letters
     * exactly once.
     *
     * @param string $word
     * @param string $comparison
     * @return bool
     */
    public function isAnagram(string $word, string $comparison) : bool
    {
        if (empty($word) || empty($comparison)) {
            return false;
        }

        $word = strtolower(str_replace(' ', '', $word));
        $comparison = strtolower(str_replace(' ', '', $comparison));

        if (strlen($word) !== strlen($comparison)) {
            return false;
        }

        $wordArray = str_split($word);
        $comparisonArray = str_split($comparison);

        sort($wordArray);
        sort($comparisonArray);

        $sortedWord = implode('', $wordArray);
        $sortedComparison = implode('', $comparisonArray);

        // Compare the sorted strings
        return $sortedWord === $sortedComparison;
    }
    /**
     * A Pangram for a given alphabet is a sentence using every letter of the
     * alphabet at least once.
     *
     * @param string $phrase
     * @return bool
     */
    public function isPangram(string $phrase) : bool
    {
        $phrase = strtolower(preg_replace('/[^a-z]/', '', $phrase));

        $uniqueLetters = [];

        for ($i = 0; $i < strlen($phrase); $i++) {
            $uniqueLetters[$phrase[$i]] = true;
        }

        return count($uniqueLetters) === 26;
    }
}