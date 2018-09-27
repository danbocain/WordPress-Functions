<?php 
function randomAnchor()
{
$anchors = array('keyword 1', 'keyword 2', 'keyword 3', 'keyword 4', 'keyword 5');
return $anchors[0,rand(count($anchors)-1)];
}
?>

<p><?php echo randomAnchor();?></p>
