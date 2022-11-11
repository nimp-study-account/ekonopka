<?php


class Email {

    public $email;
    public static $counter = 0;

    public function __construct($email)
    {
        self::$counter++;
        $this->email = $email;
        $this->validateEmail();
    }

    public function validateEmail()
    {
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            throw new \InvalidArgumentException('Invalid email');
        }
        echo self::$counter . PHP_EOL;

    }
}


try {
   $obj_1 = new Email('egorkonopka@gmail.com');
   $obj_2 = new Email('qweqwsd@gmail.com');
   $obj_3 = new Email('sdfghdh@gmail.com');

   echo Email::$counter;
}catch (\Exception $e){
    echo $e->getMessage();
}

echo PHP_EOL;

// ------------------------------------------------------------------------
