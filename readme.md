## Пакет файлового итератора

composer require technopreacher/file-store

Позволяет эффективно вычитывать информацию из текстового файла простым перебором через foreach

- в каталоге /src/example лежит index.php и файл textfile.txt для проверки работоспособности 
- реализован интерфейс /Iterator
- сделана корректная обработка конца файла
- сделано корректное переоткрытие файла при повторном использовании


всё протестировано и работает

всё можно было сделать за 15 минут, используя spl и SplFileObject, но...
