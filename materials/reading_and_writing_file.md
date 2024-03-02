### The simplest case

If you just want to get the contents of the entire file, the easiest function to use is file_get_contents. This opens, reads and closes the file. It returns the contents as a string. If there’s an error (e.g. file does not exist), it returns false.

```php
$filetext = file_get_contents("test.txt");
print $filetext;
```

And for writing, there’s file_put_contents. It opens the file, writes the given data to it and closes it.

```php
$text = "Hello PHP!";
file_put_contents("test.txt", $text);
```

### Reading line by line

A more common approach when reading text files is to read one line at a time and do something with it before moving on to the next. The best function for this is fgets. You may see fread function in many examples online, but this is a bit problematic, since it requires the parameter how many bytes to read. So you would need to know how long each line is exactly. fgets just reads until line break (or end of file (eof), if this is the last line).

Unlike file_get_contents, fgets does not open or close the file. You need to do this manually.

```php
$readfile = fopen("notes.txt", "r") or die("Failed to open the file");
while(!feof($readfile)) {    // keep going while we haven’t reached the end of file yet
   print fgets($readfile) . "<br>";
}
fclose($readfile);
```

fopen opens the file – for reading with “r” flag – and returns the file pointer (the location in the file we are currently at) placed at the beginning of the file.

fgets moves the file pointer every time it reads a line. We can check if the pointer has reached the end of the file with a function called feof (file – end-of-file).

The last point of note is that the attempt to open the file terminates the PHP script if the file can’t be opened. The part “or die” means that only the error message given as its parameter is printed, but nothing after it in the code happens. Admittedly, sometimes there is a genuine error in reading a file, but most common cause is that the file doesn’t exist. For a little better code, we can check if the file is there before trying to open it.

```php
if(file_exists("notes.txt")){
    $readfile = fopen("notes.txt", "r") or die("Failed to open the file");
    while(!feof($readfile)) {    // keep going while we haven’t reached the end of file yet
        print fgets($readfile) . "<br>";
    }
    fclose($readfile);
}
```

### Writing to text file

There are two ways to open a file for writing: overwrite (“w” flag) and append (“a” flag). Both create the file if it doesn’t exist. Be careful with the “w” flag, so you don’t overwrite something you didn’t mean to. It’s also possible to open a file for both reading and writing/appending at the same time, but since that also requires manipulating the location of the file pointer manually, we’re not using that in this course.

The writing itself is done with fwrite (or fputs, if you like – they’re aliases of the same function). Note! Neither adds a line break. If you want there to be one, write “\n”.

For example, write all the Disney movies in the array to a new file.

```php
$movies = array("Lady and the Tramp", "Sleeping Beauty", "One Hundred and One Dalmatians", "The Sword in the Stone");
$writefile = fopen("movies.txt", "w");
foreach($movies as $movie) {
    fwrite($writefile, $movie . "\n");
}
fclose($writefile);
```

As another example, let’s add one more to the existing file.

```php
$writefile = fopen("movies.txt", "a");
fwrite($writefile, "The Jungle Book\n");
fclose($writefile);
```

### Handling CSV (comma separated values) files

CSV is a file format where basically a spreadsheet has been turned into text. The first line defines the “columns”, and columns are separated with commas. If there are commas in the actual data, the data must be in quotation marks (or we can’t tell which comma is separator and which is not).

Here’s an example of the earlier movies in CSV format. Each line contains one movie.

<!--
Title,Description,Year
Lady and the Tramp,"Lady, a golden cocker spaniel, meets up with a mongrel dog who calls himself the Tramp. He is obviously from the wrong side of town, but happenings at Lady's home make her decide to travel with him for a while.",1955
Sleeping Beauty,"A snubbed malevolent fairy casts a curse on a princess that only a prince can break, with the help of three good fairies.",1959
One Hundred and One Dalmatians,"When a litter of Dalmatian puppies are abducted by the minions of Cruella de Vil, the parents must find them before she uses them for a diabolical fashion statement.",1961
The Sword in the Stone,"A poor boy named Arthur learns the power of love, kindness, knowledge and bravery with the help of a wizard called Merlin in the path to become one of the most beloved kings in English history.",1963

 -->

Note the last empty line. This is common in CSV files and pretty important when adding more lines with code. If the new data entry were to be added on the same line as the last entry, the file would be broken.

First, we must read the file line by line. This was explained in previous section. Then we must parse each line. There is a function for that in PHP – do not attempt to split the line at commas yourself (since comma can also be part of data). This function, fgetcsv, splits the line to an array at the separator characters. It does not know which array index corresponds to which column name, so the programmer must check the column names for that detail.

```php
if(file_exists("movies.csv")){
$file = fopen("movies.csv", "r") or die("Failed to open the file");
    $column_names = fgets($file);   // read the line with column names out of the way
    while(!feof($file)) {
        $data_arr = fgetcsv($file);
        if($data_arr == false) {    // if line is empty, fgetcsv returns false - skip line
            continue;
        }
        $title = $data_arr[0];
        $desc = $data_arr[1];
        $year = $data_arr[2];
        print "$title\nDescription: $desc\nYear: $year\n\n";
    }
    fclose($file);
}
```

There would also be other ways to pass the line with the column names. We could also check after parsing if the first array slot has the word “Title” in it (known to be the column name, but unlikely to be a movie title) and skip that line. But since the column names are always the first line, it’s easier to simply read it and not do anything with it.

As for writing to a CSV file, just like there’s fgetcsv function for reading data, there is fputcsv function for writing it. Let’s add The Jungle Book to our movie file.

```php
$new_movie = array(
"The Jungle Book",
"The Jungle Book is a classic Disney animated film based on Rudyard Kipling's book of the same name. It tells the story of Mowgli, a young boy raised by wolves in the jungle, and his adventures with various jungle animals, including the wise panther Bagheera and the fun-loving bear Baloo.",
1967
);
$file = fopen("movies.csv", "a");
fputcsv($file, $new_movie);
fclose($file);
```

### Handling JSON files

Writing JSON to a file and reading it from a file is easy enough to do with file_put_contents and file_get_contents functions. There is never any reason to try to append to a JSON file – the format will always break that way. The complex part is handling the array data that’s converted to/from JSON.

Don’t panic. We’ll go through the examples that will get you through the assignments here. This is what our JSON file looks like. It contains an array of movie “objects”. (We won’t be handling objects – PHP will turn it into an indexed (numbered slot) array with associative (named slots) arrays inside it.)

```json
[
  {
    "Title": "Lady and the Tramp",
    "Description": "Lady, a golden cocker spaniel, meets up with a mongrel dog who calls himself the Tramp. He is obviously from the wrong side of town, but happenings at Lady's home make her decide to travel with him for a while.",
    "Year": 1955
  },
  {
    "Title": "Sleeping Beauty",
    "Description": "A snubbed malevolent fairy casts a curse on a princess that only a prince can break, with the help of three good fairies.",
    "Year": 1959
  },
  {
    "Title": "One Hundred and One Dalmatians",
    "Description": "When a litter of Dalmatian puppies are abducted by the minions of Cruella de Vil, the parents must find them before she uses them for a diabolical fashion statement.",
    "Year": 1961
  },
  {
    "Title": "The Sword in the Stone",
    "Description": "A poor boy named Arthur learns the power of love, kindness, knowledge and bravery with the help of a wizard called Merlin in the path to become one of the most beloved kings in English history.",
    "Year": 1963
  }
]
```

After reading the contents of the file, we use json_decode function with the second parameter set to “true” to parse the data into arrays within an array. Setting it to false would decode the JSON into PHP objects. If you’re having difficulties “seeing” what the array decoded from JSON contains only from the description, just ask the computer with print_r($movies);

```php
$json = file_get_contents("movies.json");
$movies = json_decode($json, true);

// loop through movies one by one (each movie has "Title", "Description" and "Year")
foreach($movies as $movie) {
    $title = $movie["Title"];
    $desc = $movie["Description"];
    $year = $movie["Year"];
    print "$title\nDescription: $desc\nYear: $year\n\n";
}
```

Note that PHP is case-sensitive. Since the JSON file defined the fields with uppercase first letter, that’s also the key in the associative array containing one movie.

Now, in order to add The Jungle Book, we must add it to our new array (array_push), turn the array into JSON with json_encode function, and then write the whole thing back to file (overwriting the current file contents).

```php
<?php
$json = file_get_contents("movies.json");
$movies = json_decode($json, true);
// loop through movies one by one (each movie has "Title", "Description" and "Year")
foreach($movies as $movie) {
    $title = $movie["Title"];
    $desc = $movie["Description"];
    $year = $movie["Year"];
    print "$title\nDescription: $desc\nYear: $year\n\n";
}
$new_movie = array(
    "Title" => "The Jungle Book",
    "Description" => "The Jungle Book is a classic Disney animated film based on Rudyard Kipling's book of the same name. It tells the story of Mowgli, a young boy raised by wolves in the jungle, and his adventures with various jungle animals, including the wise panther Bagheera and the fun-loving bear Baloo.",
    "Year" => 1967
);
array_push($movies, $new_movie);
file_put_contents("movies.json", json_encode($movies));
```
