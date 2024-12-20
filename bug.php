In PHP, a common yet subtle error arises when dealing with array keys that are not explicitly defined.  Consider this scenario:

```php
$myArray = [];
$myArray["someKey"] = "someValue";
$myArray[123] = "anotherValue";

//Attempting to access a non-existent key.
if(isset($myArray[123])) {
    echo "Key 123 exists.";
} else {
    echo "Key 123 does not exist.";
}

// Incorrect assumption about automatic key increment
$myArray[] = "YetAnotherValue";
//myArray will only contain the explicitly defined keys
print_r($myArray);
```

This code might not behave as expected. The `isset()` check will correctly identify the existence of key `123`. However, using `$myArray[]` does *not* automatically increment numeric keys;  it adds `YetAnotherValue` with a new key, possibly causing unexpected behavior when you expect sequential numeric keys.  This is different from how languages like Javascript handle array appends.