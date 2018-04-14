<?php

namespace App;

abstract class File
{
    protected $name;
    protected $inputName;
    protected $uploaddir;
    protected $validTypes = [];
    protected $maxSize = 1048576;

    public function name($name)
    {
        $this->name = $name;
        return $this;
    }

    public function input($inputName)
    {
        $this->inputName = $inputName;
        return $this;
    }

    public function path($uploaddir)
    {
        $this->uploaddir = ROOT_DIR . DIRECTORY_SEPARATOR . $uploaddir . DIRECTORY_SEPARATOR;
        return $this;
    }

    public function save()
    {
        if (!isset($_FILES[$this->inputName]) || !isset($_FILES[$this->inputName]['name'])) {
            return false;
        }
        $this->name = $_FILES[$this->inputName]['name'];

        if (!$this->name) {
            return false;
        }

        $filename = $_FILES[$this->inputName]['tmp_name'];

        if (filesize($filename) > $this->maxSize) {
            $_SESSION['error'] = 'Ошибка: Недопустимый размер файла';
            exit();
        }

        $ext = substr($this->name, 1 + strrpos($this->name, "."));

        if (!in_array($ext, $this->validTypes)) {
            $_SESSION['error'] = 'Ошибка: Недопустимый тип файла.';
            exit();
        }

        $this->name = md5(basename($this->name) . microtime(true)) . '.' . $ext;
        $uploadfile = $this->uploaddir . $this->name;
        if (move_uploaded_file($filename, $uploadfile)) {
            echo "Файл корректен и был успешно загружен." . PHP_EOL;
        } else {
            $_SESSION['error'] = 'Возможная атака с помощью файловой загрузки!' . " $filename $uploadfile";
            exit();
        }
        return $this->name;
    }

    public function delete($name = null)
    {
        $uploadfile = $this->uploaddir . $name ?: $this->name;
        if (is_file($uploadfile)) {
            unlink($uploadfile);
        }
    }

    public function resave($name)
    {
        $file = $this->save();
        if ($file) {
            $this->delete($name);
            return $file;
        }
        return $name;
    }
}
