<html lang="en">

<head>


    <title>Bootstrap Fancy Alert Box Using sweetalert Plugin</title>


    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="https://libraries.cdnhttps.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>

    <script src="https://raw.githubusercontent.com/lipis/bootstrap-sweetalert/master/dist/sweetalert.js" ></script>


</head>


<body>


<div class="container">

    <h1>Bootstrap Fancy Alert Box Using sweetalert Plugin</h1> 

     <div class="examples">

        <button class="btn btn-lg btn-primary sweet-primary">Primary</button>

        <button class="btn btn-lg btn-info sweet-info">Info</button>

        <button class="btn btn-lg btn-success sweet-success">Success</button>

        <button class="btn btn-lg btn-warning sweet-warning">Warning</button>

        <button class="btn btn-lg btn-danger sweet-danger">Danger</button>

      </div>

</div>


<script type="text/javascript">


    $('.sweet-primary').click(function(){

        swal({

          title: "Are you sure?",

          text: "You want to move this button!!",

          type: "info",

          showCancelButton: true,

          confirmButtonClass: 'btn-primary',

          confirmButtonText: 'Primary'

        });

    });


    $('.sweet-info').click(function(){

        swal({

          title: "Are you sure?",

          text: "You want to move this button!!",

          type: "info",

          showCancelButton: true,

          confirmButtonClass: 'btn-info',

          confirmButtonText: 'Info'

        });

    });


    $('.sweet-success').click(function(){

        swal({

          title: "Are you sure?",

          text: "You want to move this button!!",

          type: "success",

          showCancelButton: true,

          confirmButtonClass: 'btn-success',

          confirmButtonText: 'Success'

        });

    });


    $('.sweet-warning').click(function(){

        swal({

          title: "Are you sure?",

          text: "You want to move this button!!",

          type: "warning",

          showCancelButton: true,

          confirmButtonClass: 'btn-warning',

          confirmButtonText: 'Warning'

        });

    });


    $('.sweet-danger').click(function(){

        swal({

          title: "Are you sure?",

          text: "You want to move this button!!",

          type: "error",

          showCancelButton: true,

          confirmButtonClass: 'btn-danger',

          confirmButtonText: 'Danger'

        });

    });


</script>


</body>


</html>