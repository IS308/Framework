<?php

require 'FormClass.php';

if (isset($_REQUEST['run'])) {
    try {
        
        $form = new Form();

        $form   ->post ('name_first')
                ->value('minlength', 2)
				->value('maxlength', 3)

                ->post ('age')
                ->value('minlength', 2)
                ->value('digit')

                ->post ('gender');
        
        $form    ->submit();
        
        echo 'Амьжилттай';
        $data = $form->fetch();
        
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        
        
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="mn">
    <head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta charset="utf-8">
        <title>Form | Application</title>
    </head>
    
    <body>
<form method="post" action="?run">
    Нэр <input type="text" name="name_first" />
    Нас <input type="text" name="age" />
    Хүйс <select name="gender">
        <option value="Эр">Эр</option>
        <option value="Эм">Эм</option>
    </select>
    <input type="submit" />
</form>
