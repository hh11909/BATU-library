<?php

function describe(string $title, $func)
{
  echo "Running ($title) tests ->\n";
  try {
    $func();
  } catch (Exception $e) {
    $msg = $e->getMessage();
    throw new Exception("Error Test at ($title): $msg", code: $e->getCode(), previous: $e->getPrevious());
  }
}
function it(string $desc, $func)
{
  try {
    $msg = $func();
    echo " SUCCESS [$desc]: $msg\n";
  } catch (Exception $e) {
    $msg = $e->getMessage();
    throw new Exception("ERROR [$desc]: $msg", code: $e->getCode(), previous: $e->getPrevious());
  }
}
