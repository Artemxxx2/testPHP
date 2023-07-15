<?php
interface SortingStrategy
{
    public function sort(array $data): array;
}

class alphabeticalIncrease implements SortingStrategy
{
    public function sort(array $data): array
    {
        ksort($data);
        return $data;
    }
}

class alphabeticalDecrease implements SortingStrategy
{
    public function sort(array $data): array
    {
        krsort($data);
        return $data;
    }
}
