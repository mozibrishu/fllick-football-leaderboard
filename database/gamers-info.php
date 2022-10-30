<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamer Information</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <style>
        h1 {
            font-size: 30px;
            text-align: center;
            color: #495C83;
        }

        table {
            border-collapse: collapse;
            width: 95%;
            margin: 0 auto;
        }

        td,
        th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: tomato;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <?php
    class SQLiteDB extends SQLite3
    {
        function __construct()
        {
            $this->open('gamersInfo.sqlite');
        }
    }
    $db = new SQLiteDB();
    if (!$db) {
        echo $db->lastErrorMsg();
    }
    echo "<h1>Gamers Information</h1>
<table class='myTable'>
    <thead><tr>
        <th>ID</th>
        <th>GOAl</th>
        <th>NAME</th>
        <th>MOBILE</th>
        <th>AGE</th>
        <th>DATE</th>
      </tr><thead><tbody>";
    $ret = $db->query('SELECT * FROM gamersInfo');
    while ($row = $ret->fetchArray()) {
        echo "<tr>
        <td>{$row['ID']}</td>
        <td>{$row['GOAL']}</td>
        <td>{$row['NAME']}</td>
        <td>{$row['MOBILE']}</td>
        <td>{$row['AGE']}</td>
        <td>{$row['PLAY_DATE']}</td>
      </tr>";
    }
    echo "</tbody></table>";


    $db->close();
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.myTable').DataTable();
        });
    </script>
</body>

</html>