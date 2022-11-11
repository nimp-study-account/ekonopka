<?php
/** ООП підхід - программа подається у вигляді сукупності об'єктів - кожен з яких є екземпляром якогось классу
 * Обєект має властивості (змінні) і методи (функції)
 *
 * до переваг ООП відноять:
 *  1.Типізація данних
 */

/**
 * Реалізація валідація Емейлу в ООП підході
 */
class Email {

    public $email;

    public function __construct($email)
    {
        $this->email = $email;
        $this->validateEmail();
    }

    public function validateEmail()
    {
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            throw new \InvalidArgumentException('Invalid email');
        }
    }
}

try {
    new Email('egorkonopkagmail.com');
}catch (\Exception $e){
    echo $e->getMessage();
}
/**
 * якщо щось виконуєтся не так як заплановано програю потрібно помилки обробляти через Ексепшени ,
 * а не ловити їх if-else
 */


/**
 * Тепер ми можеме використовувати Емейл , а саме вказати залежність для аргументу функціїї
 * і жоден інший об'єкт сюди не потратипь, це гарантує нам що Емейл в аргументі буде вілидний
 */
function send(\Email $address, $title, $msg){
    //sending
    $address->email;
}

/**
 * вказана залежність є частиню тайпхінтінгу цієї функції , його можно розирити - додавши ще правил
 */
function send(\Email $address, string $title, string $msg){
    //sending
    $address->email;
}


/**
 * ми можемо розширити можливості об'єкта
 * Гарною пракикою є використання розширенної библіотеки ф-ій для роботи зі строками - mb_
 */

class Email {

    public $email;
    public $emailLength;

    public function __construct($email)
    {
        $this->email = $email;
        $this->validateEmail();
        $this->emailLength = mb_strlen($this->email);
    }

    public function validateEmail()
    {
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            throw new \InvalidArgumentException('Invalid email');
        }
    }

    public function sendMail($title, $msg)
    {
        echo $this->email . $title . $msg;
    }
}


try {
    $objEmail = new Email('egorkonopkagmail.com');
    $objEmail->sendMail('hello', 'text text text');
}catch (\Exception $e){
    echo $e->getMessage();
}

/**
 * Окрім звичайних властивостей і методів , в классах можна описувати і СТАТИЧНІ властивості і методи.
 * Вони НАЛЕЖАТЬ КЛАССУ , а не об'єкту
 */

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

    echo 'out'. Email::$counter;
}catch (\Exception $e){
    echo $e->getMessage();
}


/**
 * в прикладі , кожен раз коли конструстор відпрацьовує ми змінюємо статичну властивість
 * не залежно від того який це обьект. і останній раз ми звертємось до властивості ззовні
 */

/**
 * різниця між self:: і static::
 * self:: - це буде посилання завжди на батьківський класс
 * static:: - на поточний класс
 * використовуэться в контесті наслідування
 */


/**
 * 4 базові принципи ООП
 * ІНКАПСУЛЯЦІЯ
 * СПАДКУВАННЯ
 * ПОЛІМОРФІЗМ
 * АБСТРАКЦІЯ
 */

/**
 * ІНКАПСУЛЯЦІЯ
 * говорить що об'єкт має предоставляти інтерфейс взаемодії з собою, тобто при ргоботі з об'єктом
 * не потрібно розуміти як це працює , щоб взаємодіяти з об'ектом.
 * В прикладі нижче класс предоставляє інтерфейс взаємодії $obj->send()
 */

class Email2 {

    protected $email;

    public function __construct($email)
    {
        $this->email = $email;
        $this->validateEmail();
    }

    protected function validateEmail()
    {
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            throw new \InvalidArgumentException('Invalid email');
        }
    }

    public function send(string $title, string $message )
    {
        mail($this->email, $message, $title);
    }
}

try {
    $obj = new Email2('egorkonopkagmail.com');
    $obj->send('hellp','text');
}catch (\Exception $e){
    echo $e->getMessage();
}

/*
 * а за допомогою модифікаторів доступу ми просто гарантуємо що не буде втручанні ззвовні
 * в прикладі вище класс гарантує , що валідований Емейл не буде змінений зовні
 */

/**
 * СПАДКУВАННЯ
 * дозволяє розширювати класси не змінюючи батківський класс
 * класс наслідник отримує всі методи і властивості батьківського классу
 */


class CorpEmail extends \Email2 {
    public string $position;
}

$obj = new CorpEmail('test@gmail.com');
$obj->position = 'director';
$obj->send('hellp','text');