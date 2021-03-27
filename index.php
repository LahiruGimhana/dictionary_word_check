<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $("#name1").keydown(function (e) {      
                if(!((e.key>='A' && e.key<='Z') || (e.key>='a' && e.key<='z') || (e.key==' '))){
                    alert("only characters please");
                e.preventDefault();
                }            
           });
        });
        $(document).ready(function(){
            $("#name2").keydown(function (e) {      
                if(!((e.key>='A' && e.key<='Z') || (e.key>='a' && e.key<='z') || (e.key==' '))){
                    alert("only characters please");
                e.preventDefault();
                }            
           });
        });
        
    </script>


</head>
<body>

    <div class="container" style="width: 50%;">
    <h1>total marks </h1>
        <form method="post" action="result.php">
                <div class="row align-items-start">
                    <div class="col">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">value 1</span>
                            <input type="text" name="num1"id="name1" class="form-control" placeholder="name 1" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">value 2</span>
                            <input type="text" name="num2" id="name2" class="form-control" placeholder="name 2" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                </div>
            <button class="btn btn-primary" name="submit" type="submit">Submit</button>
        </form>
        
   

<!-- <h3>Sum of Two Numbers:<?=$num1?></h3>
<h3>Sum of Two Numbers:<?=$num2?></h3> -->
    </div>  
</body>
</html>
