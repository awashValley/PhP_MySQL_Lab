// David and Lane book: MySQL & PHP (Chapter-2)
/*
- PHP has a syntax similar to JavaScript, which many web designers have learned; both languages hark back to the classic C and Perl languages in syntax.
- PHP is a recursive acronym that stands for PHP: Hypertext Preprocessor; this is in the naming style of GNU, which stands for GNU’s Not Unix and which began this odd trend.
- PHP is a scripting language that’s usually embedded or combined with the HTML of a web page.
- PHP has many excellent libraries that provide fast, customized access to DBMSs and is an ideal tool for developing application logic in the middle tier of a three-tier application.
- PHP script can be anywhere in a file and interleaved with any HTML fragment.
- The point of learning PHP, of course, is to create pages that change, pages that contain dynamic content derived from user input or a database.
- There are also several special-purpose PHP programming editors available, and a well-maintained list of these can be found at http:// phpeditors.linuxbackup.co.uk/.
*/

// The difference between print and echo is that echo can output more than one parameter, each separated by a comma. For example, echo can print a string and an integer together in the one message:
   # prints "The answer is 42"
   echo "The answer is ", 42;

/*
- Parentheses make no difference to the behavior of print. However, when they are used with echo, only one output parameter can be provided.
- printf() is used for complex output.
*/

// Quotation marks can be escaped by putting a backslash before them:
   print "This string has a \": a double quote!";
   print 'This string has a \': a single quote!';

// Tab, newline (line break), and carriage-return characters can be included in a double-quoted string using the escape sequences \t, \n, and \r, respectively. Inserting the white space characters \t, \n, and \r is often useful to make output more readable, however as HTML, white space is generally disregarded.

// When the name of the variable is ambiguous, braces {} can delimit the name as shown in the following example:
   $memory = 256;
   
   // No variable called $memoryMbytes
   // Sets $message to "My computer has  of RAM"
   $message = "My computer has $memoryMbytes of RAM";
   
   // Works: braces are used delimit variable name
   // Sets $message to "My computer has 256Mbytes of RAM"
   $message = "My computer has {$memory}Mbytes of RAM";

// Braces are also used for more complex variables, such as arrays and objects:
   print "The array element is {$array["element"]}.";
   print "Mars is {$planets['Mars']['dia']} times the diameter of the Earth";
   print "There are {$order->count} green bottles ...";
