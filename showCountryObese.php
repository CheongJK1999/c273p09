<?php
/*
include("dbFunctions.php");

$statistics = array();
$query = "SELECT * FROM statistics";
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $statistics[] = $row;

 * }
 */

print_r($statistics);
exit();

mysqli_close($link);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>View Obesity and Population by country</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/showCountryObese.js" type="text/javascript"></script>
        <script>
            $(document).ready(function() {
                console.log("Inside the ready function");
                
                var idCountry = $("#idCountry").val();
                console.log(idCountry);
                $.ajax({
                    type: "GET",
                    url: "getCountryDetails.php",
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        var message = "";
                        for (i = 0; i < response.length; i++) {
                            message += "<tr><td>" + response[i].student_id + "</td>"
                                    + "<td>" + response[i].population + "</td>"
                                    + "<td>" + response[i].obese + "</td>"
                        }
                        $("#idCountry").html(message);
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });
            });
        </script>
    </head>

    <body>
        <div class="container">
            <br/>
            <select id="idCountry">
                <option value="">Please select</option>
                <?php
                        for ($i = 0; $i < count($statistics); $i++) {
                            ?>
                            <option value="<?php echo $statistics[$i]['id']; ?>"><?php echo $statistics[$i]['country']; ?></option>                 
                        <?php } ?> 
            </select>
            <br/><br/>

            <table class="table table-striped" id="obeseTable">
                <thead>
                    <tr>
                        <th>Population</th>
                        <th>Obese</th>
                    </tr>
                </thead>

            </table>
        </div>
    </body>
</html>