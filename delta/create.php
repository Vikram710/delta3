<html>
<head>
<link href="create.css" rel="stylesheet">
</head>
<body>
    <form action="includes/cr8.inc.php" method="post">
    <input type="text" name="title" placeholder="Title" class="title"><br>
    <input type="text" name="desc" placeholder="Descripton" class="desc"><br>
        <div id="container"></div>       
        <select name="element" class="sec">
            <option value="text">Textbox</option>
            <option value="number">Numberbox</option>
        </select>
        <input type="button" value="Add" onclick="add(document.forms[0].element.value)"/><br>
        <input type="number" name="num" placeholder="Number of questions">
        <input type="submit" name ="submit" value="Submit"/>
    </form>

    
    <script src="cr.js"></script>
</body>
</html>