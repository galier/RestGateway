<?php


class RedisSender
{

    private $key;

    private $value;

    private $data = [];

    public function __construct($data)
    {
        $this->data = $data;
        $this->value=json_encode($data);
        $this->key='userId'.$data[0]['userId'].':id'.$data[0]['id'];
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }


}