<?php

include "./clitool.php";

$cli_tool = new CliTool();

if (isset($_POST["inputtext"]) && !empty($_POST["inputtext"])) {
    $cli_tool->setText($_POST["inputtext"]);
}

?>

<html>
<body>

<form method="post">
Type Text: <input type="text" name="inputtext" autofocus value="<?php echo $cli_tool->textIsNotEmpty() ? $cli_tool->getText() : 'hello world' ?>">
<input type="submit">
</form>
<div>
	<h1>Output</h1>
	<?php echo $cli_tool->convertTextToUpperCase() ?>
	<br/>
	<?php echo $cli_tool->convertTextToMixedCase() ?>
	<br/>
	<?php try {
    if ($cli_tool->textIsNotEmpty()) {
        $cli_tool->createCSVFile();
        echo "CSV created!";
    }
} catch (Exception $e) {
    echo "Error: " . $e . getMessage();
}?>
	<br/>
</div>

</body>
</html>
