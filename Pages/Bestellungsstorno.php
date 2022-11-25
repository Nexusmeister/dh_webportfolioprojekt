<!DOCTYPE html>
<html lang="de" dir="ltr" style="padding-top: 10px;">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon"
          href="https://eshop.wuerth.de/is-bin/intershop.static/WFS/1401-B1-Site/-/de_DE/webkit/media/system/layout/images/favicon.ico"
          title="Adolf Würth GmbH &amp; Co. KG icon" type="image/x-icon">
    <link href="../css/mainStyles.css" rel="stylesheet" type="text/css"/>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Hind|Muli:600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta type="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kundenportal</title>
</head>
<body style="padding-top: 0px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <form method="post" action="../php/BestellungStornieren.php">
                    <div class="form-group ">
                        <label class="control-label requiredField" for="bestellNr">
                            BestellNr.
                            <span class="asteriskField">*</span>
                        </label>
                        <input class="form-control" id="bestellNr" name="bestellNr" placeholder="z.B. 268416" type="text" required/>
                    </div>
                    <div class="form-group">
                        <div>
                            <button class="btn btn-danger " name="submit" type="submit">Bestellung stornieren</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


<?php


