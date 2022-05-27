<?php
/**
 * Файловый итератор
 * реализует интерфес Iterator
 * для корректной обработки последней строки усложнена логика методов rewind() и next()
 */

namespace Ns\FileStore;

class FileStoreIterator implements \Iterator
{

    /* @var $fileName - имя итерируемого файла
     * @var $file - сам ресурс
     * @var $eof - нужна для индикации реального конца файла
     * @var $line - содержимое текущей строки
     * @var $lineNumber - порядковый номер текущей строки
    */

    private $fileName;
    private $file;
    private bool $eof = false;
    protected $line;
    protected $lineNumber;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    public function __destruct()
    {
        if (!empty($this->file)) {
            fclose($this->file);
        }
    }

    public function current()
    {
        return $this->line;
    }

    public function next()
    {
        if (!feof($this->file)) {
            $this->line = fgets($this->file);
            $this->lineNumber = $this->lineNumber + 1;
        } else {
            $this->eof = true;
        }
    }

    public function key()
    {
        return $this->lineNumber;
    }

    public function valid()
    {
        return !$this->eof;
    }

    public function rewind()
    {
        if (!empty($this->file)) {
            fclose($this->file);
        }
        $this->file = fopen($this->fileName, 'r');
        $this->lineNumber = 0;
        $this->eof = false;
        $this->next();//т.к. нулевой строки нет - делаем принудительный вызов next
    }

}