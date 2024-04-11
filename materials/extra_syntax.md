# Extra syntax

### type caasting

Change variable type

```php
$a = (int)$a;
```

### count chars

```php
count_chars($str, 3); // return all unique char
```

### constant

can't be change. will be global even when define inside function

```php
define('VARIABLE_NAME', 'value');
echo VARIABLE_NAME;

define('numArray', [1,2,3,4]);
echo numArray;
```

### spaceship

```php
1 <=> 2; //return -1
1 <=> 1; //return 0
2 <=> 1; // return 1
```

### pre increment and decrement

```php
$a = $b = 10;
echo ++$a; //return 11
echo $b++; //return 10
```

### call a global var inside a function

```php
$a = 10;
function func() {
    global $a;
    echo $a;
    // echo $GLOBALS["a"];
}
```

### REQUEST is shorthand for both GET and POST

### call ob_start() before starting session

ob_start() will ensure header be sent correctly
