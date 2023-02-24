<?php declare(strict_types=1);

namespace Tests\Controllers;
use PHPUnit\Framework\TestCase;

class CsvFileIterator
{
    private $file;
    private $key = 0;
    private $current;

    public function __construct(string $file)
    {
        $this->file = fopen($file, 'r');
    }

    public function __destruct()
    {
        fclose($this->file);
    }

    public function rewind(): void
    {
        rewind($this->file);

        $this->current = fgetcsv($this->file);

        if (is_array($this->current)) {
            $this->current = array_map('intval', $this->current);
        }

        $this->key = 0;
    }

    public function valid(): bool
    {
        return !feof($this->file);
    }

    public function key(): int
    {
        return $this->key;
    }

    public function current(): array
    {
        return $this->current;
    }

    public function next(): void
    {
        $this->current = fgetcsv($this->file);

        if (is_array($this->current)) {
            $this->current = array_map('intval', $this->current);
        }

        $this->key++;
    }
}