<?php

namespace app\Models;

use core\Model;

class Book extends Model
{
    public string $table = 'guest_book';
    protected array $rules = [
        'required' => [
            'name',
            'email',
            'body'
        ],
        'minLength' => [
            'name' => 2,
            'body' => 5
        ],
        'maxLength' => [
            'name' => 100,
            'body' => 255,
        ],
        'email' => [
            'email'
        ],
    ];

    protected array $castFields = [
        'name' => 'Имя',
        'body' => 'Сообщение',
        'email' => 'email',
    ];

    public function getLastByCount($count = 5)
    {
        return $this->sql("SELECT * FROM {$this->table} ORDER BY id DESC LIMIT {$count}");
    }

    public static function add($data)
    {
        $book = new Book;
        $validate = $book->validate($data);
        if($validate['error'] == true){
            return $validate;
        }
        
        extract($data);
        $date = date('Y-m-d H:i:s');
        return $book->sql("INSERT INTO {$book->table} (dtime, `name`, email, body) VALUES ('{$date}', '{$name}', '{$email}', '{$body}')");

    }
}