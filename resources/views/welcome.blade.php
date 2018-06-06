
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AdRetail challenge</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/adretail.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Begin page content -->
<div class="container">
    <div class="page-header">
        <h1>Adretail challenge</h1>
    </div>
    <p class="lead">This is my own implementation of AdRetail challenge.</p>
    <p>Read here <a href="https://github.com/martio/adretail" target="_blank">https://github.com/martio/adretail</a> to get more info.</p>

    <form method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="jobs">Jobs:</label>
            <textarea class="form-control" rows="5" id="jobs" name="jobs">{{$text}}</textarea>
        </div>
        <button class="btn btn-success" type="submit">Submit</button>
    </form>
</div>

<footer class="footer">
    <div class="container">
        <p class="text-muted">Qentinios 2018</p>
    </div>
</footer>

</body>
</html>
