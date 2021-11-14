<!DOCTYPE html>
<head><title>Kevin Smead MD5 Cracker</title></head>
<body>
<h1>MD5 cracker</h1>
<p>This application takes an MD5 hash
of a 4 digit PIN and 
attempts to hash all four-number combinations
to determine the original four numbers.</p>
<pre>
Debug Output:
<?php
$answer = "Not found";
// If there is no parameter, do not proceed
if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];

    // These are the numbrers we will use to construct 10,000 possible pins
    $nums = "1234567890";
    $show = 15; // number of examples to show

    // loops to go through the numbers 
    for($i=0; $i<strlen($nums); $i++ ) {
        $num1 = $nums[$i];   // The first of four numbers

        // Our first inner loop with new variable j
        for($j=0; $j<strlen($nums); $j++ ) {
            $num2 = $nums[$j];  // Our second character
        //second inner loop with new variable k
        for($k=0; $k<strlen($nums); $k++ ) {
              $num3 = $nums[$k]; 
        //third inner loop with new variable l
        for($l=0; $l<strlen($nums); $l++ ) {
                $num4 = $nums[$l]; 

            // Concatenate the four numbers together 
            $try = $num1.$num2.$num3.$num4;

            // hash the latest number and check it against the hash entered by user 
            $check = hash('md5', $try);
            if ( $check == $md5 ) {
                $answer = $try;
                break;  //exit when code is found
            }

            // Debug output until $show hits 0
            if ( $show > 0 ) {
                print "$check $try\n";
                $show = $show - 1;
            }
        }
      }
    }
        
    }
    // Compute elapsed time
    $time_post = microtime(true);
    print "Elapsed time: ";
    print $time_post-$time_pre;
    print "\n";
}
?>
</pre>
<!-- Use the very short syntax and call htmlentities() -->
<p>Original Text: <?= htmlentities($answer); ?></p>
<form>
<input type="text" name="md5" size="40" />
<input type="submit" value="Crack MD5"/>
</form>
<p><a href="index.php">Reset</a></p>

</body>
</html>

