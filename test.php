<?php

// By declaring a variable with static keyword 
// its value doesn't destroyed after execution
// of function
function test() {
    static $test = 0;
    echo $test;
    $test++;
}

test();
test();
test();