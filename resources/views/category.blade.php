<!DOCTYPE html>
<html lang="en">
<head>
    <title>3D holographic</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/new.css">
    <style>
        html,body,.all,.newList{
            height: 100%;
        }
    </style>
</head>
<body>
<div class="all">
    <div class="newList container">
        @foreach($news as $new)
            <a href="{{ url('show') . '/' . $new->id }}" class="row ">
                <div class="col-md-6">
                    <img src="../uploads/{!! $new->image !!}" alt="">
                </div>
                <div class="col-md-6">
                    <h4>{{ $new->title }}</h4>
                    <p>{{ $new->description }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>

</body>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
