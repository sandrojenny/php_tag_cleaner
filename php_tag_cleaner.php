<?php 

echo '<form class="" method="post">';
echo '<textarea name="str" rows="20" cols="120">';
echo '</textarea><br><br>';
echo '<button type="submit" name="button">Clean up lt-Tags</button>';
echo '</form>';

if (!empty($_POST)) {
  $str = $_POST['str'];
  $pattern[1] = '<lt-div(.*)lt-div>';
  $pattern[2] = '<lt-highlighter style="z-index: auto;">';
  $pattern[3] = '</lt-highlighter>';
  $pattern[4] = '/<>/m';

  $replacement = '';

  for ($i=1; $i < 4; $i++) {
    
    $cleanedStr1 = preg_replace($pattern[1], $replacement, $str);
    $cleanedStr2 = preg_replace($pattern[2], $replacement, $cleanedStr1);
    $cleanedStr3 = preg_replace($pattern[3], $replacement, $cleanedStr2);
    echo "Pattern " . $i . " cleaned up." . "<br>";
    
    $cleanedStr4 = preg_replace($pattern[4], $replacement, $cleanedStr3);
    
    if ($i == 3) {
      $result = $cleanedStr4;
      echo "Cleaned up remaining tags<br>";
    }
  }

  if (!empty($result)) {
    echo '<br><b>Cleaned Text</b><br>';
    echo '<form><textarea rows="20" cols="120">' . $result . '</textarea></form>';
  }
}

?>

<form class="" action="index.html" method="post">
  <button type="submit" name="button"></button>
</form>
