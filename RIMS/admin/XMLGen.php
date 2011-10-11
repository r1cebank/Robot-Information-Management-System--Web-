<?php
function openXML($file)
{
	$data = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
	$fh = fopen($file, 'a+');
	fwrite($fh, $data);
	fclose($fh);
}
function openOption($file)
{
	$data = "<options>\n";
	$fh = fopen($file, 'a+');
	fwrite($fh, $data);
	fclose($fh);
}
function closeOption($file)
{
	$data = "</options>\n";
	$fh = fopen($file, 'a+');
	fwrite($fh, $data);
	fclose($fh);
}
function openInteraction($file)
{
	$data = "<interaction>\n";
	$fh = fopen($file, 'a+');
	fwrite($fh, $data);
	fclose($fh);
}
function closeInteraction($file)
{
	$data = "</interaction>\n";
	$fh = fopen($file, 'a+');
	fwrite($fh, $data);
	fclose($fh);
}
function addValue($file,$value)
{
	$fh = fopen($file, 'a+');
	fwrite($fh, $value."\n");
	fclose($fh);
}
function openSlideshow($file)
{
	$data = "<slide_show>\n";
	$fh = fopen($file, 'a+');
	fwrite($fh, $data);
	fclose($fh);
}
function addImage($file,$image,$title)
{
	$data = "<photo title=\"".$title."\">".$image."</photo>\n";
	$fh = fopen($file, 'a+');
	fwrite($fh, $data);
	fclose($fh);
}
function closeSlideshow($file)
{
	$data = "</slide_show>\n";
	$fh = fopen($file, 'a+');
	fwrite($fh, $data);
	fclose($fh);
}
?>