<?php
function debug_to_console($data)
{
  $output = $data;
  if (is_array($output))
  {
    $output = implode(',', $output);
  }

  // echo "<script>console.log( 'PHP Debug: " . $output . "' );</script>";
  echo "<script>console.log(" . json_encode("PHP Debug: " . $output) . ")</script>";
}