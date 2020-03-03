<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="stylesheet.css">    
</head>
    <body>
{{#rows}}

<div class="margin-box">
        
        <form method="POST" action="update.php?id={{id}}">
            <br>
            <input type="text" value="{{naam}}" class="form-control" name="naam" placeholder="Naam">
                    <hr>
            <input type="text" value="{{file}}" class="form-control" name="file" placeholder="File">
                    <hr>
            <input type="text" value="{{tekst}}" class="form-control"name="tekst" placeholder="Tekst">
                <hr>
            <button type="submit" name="update" value="Send" class="btn btn-success">Send</button>

{{/rows}}
</form>
</div>
</body>
</html>