<?php

namespace core;

abstract class Model
{
    protected $pdo;
    protected string $table;
    protected string $field = 'id';
    protected array $rules = [];
    protected array $castFields = [];
    protected array $listRules = [
        'required',
        'minLength',
        'maxLength',
        'email'
    ];

    public array $validateErrors = [];

    public function __construct()
    {
        $this->pdo = DB::instance();
    }

    public function query($sql)
    {
        return $this->pdo->execute($sql);
    }

    public function sql($sql, $params = [])
    {
        return $this->pdo->query($sql, $params);
    }

    public function all()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->query($sql);
    }

    public function find($id = null)
    {
        if($id && is_numeric($id)){
            $sql = "SELECT * FROM {$this->table} WHERE id = ?";
            return $this->pdo->query($sql, [$id]);
        }
        return [];
    }

    public function where($id, $field = '')
    {
        $field = $field ?: $this->field;
        if($id && is_numeric($id)){
            $sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1";
            return $this->pdo->query($sql, [$id]);
        }
        return [];
    }

    public function validate($data)
    {
        foreach($this->rules as $rule => $fields){
            switch($rule){
                case 'required':{
                    foreach($fields as $field){
                        if(!isset($data[$field]) || $data[$field] === ''){
                            $fieldName = $this->castField($field, $this->castFields);
                            $this->validateErrors[$field][] = "Поле '{$fieldName}' должно быть заполненно";
                        }
                    }
                }
                break;

                case 'minLength':{
                    foreach($fields as $field => $value){
                        if(isset($data[$field]) && strlen($data[$field]) < $value){
                            $fieldName = $this->castField($field, $this->castFields);
                            $this->validateErrors[$field][] = "Минимальная длина поля '{$fieldName}' = <code>{$value}</code>";
                        }
                    }
                }
                break;

                case 'maxLength':{
                    foreach($fields as $field => $value){
                        if(isset($data[$field]) && strlen($data[$field]) > $value){
                            $fieldName = $this->castField($field, $this->castFields);
                            $this->validateErrors[$field][] = "Максимальная длина поля '{$fieldName}' = <code>{$value}</code>";
                        }
                    }
                }
                break;
                
                case 'email':{
                    foreach($fields as $field){
                        if(isset($data[$field]) && !filter_var($data[$field], FILTER_VALIDATE_EMAIL)){
                            $fieldName = $this->castField($field, $this->castFields);
                            $this->validateErrors[$field][] = "Не верный формат поля '{$fieldName}'";
                        }
                    }
                }
                break;
            }
        }
        if(!empty($this->validateErrors)){
            return ['error' => true, 'errors' => $this->validateErrors];
        }
        return ['error' => false, 'errors' => []];
    }

    protected function castField($field, $castFields)
    {
        return array_key_exists($field, $castFields) ? $castFields[$field] : $field;

    }


    

    
}