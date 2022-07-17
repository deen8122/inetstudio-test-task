<?php


/*
 * Имеется метод getUserData, который получает данные из внешнего API, передавая в запрос необходимые
 * парамерты, вместе с ключом (token) идентификации. Необходимо реализовать универсальное решение getSecretKey(),
 *  с использованием какого-либо шаблона (pattern) проектирования для хранения этого ключа всевозможными способами:
in file
in DB
in server memоry (redis as example)
in cloud
etc.
Достаточно реализовать простое решение, которое бы позволяло через параметр
(в условной "глобальной конфигурации" / внутри класса данного метода), выбирать любой
 существующий способ хранения. Перечисленные способы хранения служат лишь примерами для глобального
 восприятия задачи и не обязательны к реализации, можно ограничиться заглушками.
 */


interface SecretKeyStorageInterface
{
    public function getSecretKey():string;
}


/*
 * Классы реализующие интерфейс
 */
class SecretKeyFileStorage implements SecretKeyStorageInterface
{

    public function getSecretKey():string
    {
        return 'SecretKeyFileStorage KEY';
    }
}

class SecretKeyDB implements SecretKeyStorageInterface
{

    public function getSecretKey():string
    {
        return 'SecretKeyDB KEY';
    }
}

class SecretKeyCloud implements SecretKeyStorageInterface
{

    public function getSecretKey():string
    {
        return 'SecretKeyCloud KEY';
    }
}


class myService
{

    public function __construct(private SecretKeyStorageInterface $secretKeyStorage)
    {

    }

    public function getUserData():void
    {
        $key = $this->secretKeyStorage->getSecretKey();
        /*
         * Получает токен и делает запрос.
         * А сейчас просто выводим тип токена
         */
        echo '<br>' . $key;
    }
}

$obj = new myService(new SecretKeyFileStorage());
$obj->getUserData();

$obj = new myService(new SecretKeyDB());
$obj->getUserData();

$obj = new myService(new SecretKeyCloud());
$obj->getUserData();