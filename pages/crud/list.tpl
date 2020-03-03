<!DOCTYPE html>
<html></html>
<head>
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>

    <div class="list-box">
<table class="table table-striped">

        <thead>
            <th>Naam</th>
            <th>File</th>
            <th>Tekst</th>
        </thead>
        <tbody> 
            {{#rows}}
                <tr>
                <td>{{naam}}</td>
                <td>{{file}}</td>
                <td>{{tekst}}</td>
                <td><a href="edit.php?id={{id}}"><button type="button" class="btn btn-primary" title="Edit">Edit</button></a></td>
                <td><a href="delete.php?id={{id}}"><button type="button" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this entry?')">Delete</button></a></td>
                </tr>
            {{/rows}}
        </tbody>
</table>
<hr>
<a href="crud.php"><button type="button" class="btn btn-info">New entry</button></a>
</div>
</body>
</html>