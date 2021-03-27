<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    
    <!-- <link rel="stylesheet" href="style.css"> -->



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="circle.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="marks.php">Home <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                     <li class="nav-item">
                         <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
        </nav>
    
    </header>
    
    <div class="container" style="padding-top: 50px;">
    
    <h3 style="text-align: center;">Total result</h3>
    <?php
    
        $num1=0;
        $num2=0;

        $name1=0;
        $name2=0;
        // $sum=0;
        
        if(isset($_POST["submit"]))
        {
            $num1=$_POST["num1"];
            $num2=$_POST["num2"];

            $numm1 = preg_replace("/[^a-zA-Z0-9]+/", "", $num1);
            // $name1 = preg_replace('/\d+/u', '', $num1);

            $numm2 = preg_replace("/[^a-zA-Z0-9]+/", "", $num2);
            // $name2 = preg_replace('/\d+/u', '', $num2);


            $num1=strlen($numm1);
            $num2=strlen($numm2);
        }
        
        
        //chart count
        function chart_marks($y) {
            if (1<=$y && $y<=3) {
                return 10;  
            } elseif ($y<6) {
                return 8;
            }elseif($y<8){
                return 6;
            }else{
                return 2;
            }
        };
        function chart($y) {
            if (1<=$y && $y<=3) {
                return 9.2; 
            } elseif ($y<6) {
                 return 8.3;
            }elseif($y<8){
                 return 6.7;
            }else{
                 return 4.0;
            }
        };


        function pronunciable($x) {
            if ($x==9.2) {
                return 18; 
            } elseif ($x==8.3) {
                return 14;
            }elseif($x==6.7){
                return 10;
            }else{
                return 4;
            }
        };

        function memo($x) {
            if ($x==9.2) {
                return 18; 
            } elseif ($x==8.3) {
                return 15;
            }elseif($x==6.7){
                return 8;
            }else{
                return 4;
            }
        };
    
       // echo $num1;
        $vx1=chart($num1);
        $px1=pronunciable($vx1);
        $mx1=memo($vx1);

        $vx2=chart($num2);
        $px2=pronunciable($vx2);
        $mx2=memo($vx2);

        

        $marks1=chart_marks($num1)+$px1+$mx1;
        $marks2=chart_marks($num2)+$px2+$mx2;

        //echo $marks1;



        //json data compare with input
        $data = file_get_contents("dictionary.json");
        $json_a = json_decode($data, true);
        // $json_a=strtolower($json_a);
        $nm1=strtolower($numm1);
        $nm2=strtolower($numm2);

        
        $json_value1=0;
        $json_value2=0;

        function checkValue1($json_a, $nm1){
            foreach($json_a as $x){
                    $x=strtolower($x);
                    $arr=str_word_count($x,1);

                    foreach($arr as $y){
                        if ($nm1==$y) {
                            $json_value1=10; 
                            return $json_value1;
                        }
                    }
                }
                $json_value1=40;
                return $json_value1;
           }

           function checkValue2($json_a, $nm2){
            foreach($json_a as $x){
                    $x=strtolower($x);
                    $arr=str_word_count($x,1);

                    foreach($arr as $y){
                        if ($nm2==$y) {
                            $json_value2=10;
                            return $json_value2;
                        } elseif($nm2!==$y){
                            $json_value2=40;
                        }
                        
                    }
                }
                $json_value2=40;
                return $json_value2;
           }




           $json_value1=checkValue1($json_a, $nm1);
           $json_value2=checkValue2($json_a, $nm2);

        //    echo $json_value1;
        //    echo "<br>";
        //    echo $json_value2;

        $persentage1=$marks1 + $json_value1;
        $persentage2=$marks2 + $json_value2;
        

        // echo '
        // <table width="100%"  border="0">
    
        // <tr>
        //     <td>"aafafaa"</td>
        //     <td>ThaiCreate.Com</td>
        //     <td>ThaiCreate.Com</td>
        // </tr>
       
        // <tr>
        //      <td>'.$strSiteName.'</td>
        //      <td>ThaiCreate.Com</td> 
        //      <td>ThaiCreate.Com</td> 
        // </tr>
       
        // <tr>     
        //     <td>'.$strSiteName.'</td>    
        //     <td>ThaiCreate.Com</td>
        //     <td>ThaiCreate.Com</td> 
        // </tr>
        // </table>';





        ?>

        <div class="row align-items-start">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h6>chart marks</h6>
                    </div>
                    <div class="col">
                         <h4><span class="badge bg-secondary"><?=chart_marks($num1)?></span></h4>
                    </div>
                </div>
                

                <div class="row">
                    <div class="col">
                        <h6>pron marks</h6>
                    </div>
                    <div class="col">
                         <h4><span class="badge bg-secondary"><?=$px1?></span></h4>
                    </div>
                </div>
               

                <div class="row">
                    <div class="col">
                        <h6>memo marks</h6>
                    </div>
                    <div class="col">
                         <h4><span class="badge bg-secondary"><?=$mx1?></span></h4>
                    </div>
                </div>
               

                <div class="row">
                    <div class="col">
                        <h6>total marks</h6>
                    </div>
                    <div class="col">
                         <h4><span class="badge bg-secondary"><?=$marks1?></span></h4>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col">
                         <h4><span>persantage: <?=$persentage1?>%</span></h4>
                    </div>
                </div>
                <hr/>

            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h6>chart marks</h6>
                    </div>
                    <div class="col">
                         <h4><span class="badge bg-secondary"><?=chart_marks($num2)?></span></h4>
                    </div>
                </div>
               

                <div class="row">
                    <div class="col">
                        <h6>pro marks</h6>
                    </div>
                    <div class="col">
                         <h4><span class="badge bg-secondary"><?=$px2?></span></h4>
                    </div>
                </div>
                

                <div class="row">
                    <div class="col">
                        <h6>memo marks</h6>
                    </div>
                    <div class="col">
                         <h4><span class="badge bg-secondary"><?=$mx2?></span></h4>
                    </div>
                </div>
               

                <div class="row">
                    <div class="col">
                        <h6>total marks</h6>
                    </div>
                    <div class="col">
                         <h4><span class="badge bg-secondary"><?=$marks2?></span></h4>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col">
                         <h4><span>persantage: <?=$persentage2?>%</span></h4>
                    </div>
                </div>
                <hr/>
            </div>
        </div>
 

        <?php
            if( $persentage2< $persentage1){
                echo "<h5 style='text-align: center;'>best input value = '$numm1' &nbsp; &nbsp; Total marks= ' $persentage1'</h5>";
            }
            elseif( $persentage2> $persentage1){
                echo "<h5 style='text-align: center;'>best input value = '$numm2' &nbsp; &nbsp;Total marks= ' $persentage2'</h5>";
            }
            elseif( $persentage1== $persentage2){
                // echo "<h5>same length of string</h5>";
            }   
        ?>
        <br>
                
        <?php
            // echo "<hr>";

            echo '
            <h3 style="text-align: center;"><u>comparisan Report</u></h3>
            <br>
            <table width="100%"  border="0">
        
            <tr >
                <td>
                <td width=10%><h6>Name 1 :</h6></td>
                <td width=10%><h5>'.$numm1.'</h5></td>
                </td>
                <td>
                <td width=10%><h6>Name 2 :</h6></td>
                <td width=10%><h5>'.$numm2.'</h5></td>
                <td width=10%>&nbsp;&nbsp;&nbsp;</td>
                </td>
            </tr>
            </table>';
            // echo "<hr>";
        ?>


    </div>



    <section id="circleBar">
        <h1><u>circle bar</u></h1>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="round" data-value="<?=$persentage1/100?>" data-size="100" data-thickness="12">
                        <strong style="padding-top: 18px"></strong>
                        <!-- <span><i class="fa fa-html5"></i>> -->
                        <br><br><br>
                           Total 1
                        <!-- </span> -->
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="round" data-value="<?=$persentage2/100?>" data-size="100" data-thickness="12">
                        <strong style="padding-top: 18px"></strong>
                        <!-- <span><i class="fa fa-html5"></i>> -->
                        <br><br><br>
                           Total 2
                        <!-- </span> -->
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" onclick="Circlle('.round')">
                refresh
            </button>
             <a href="index.php"><button class="btn btn-primary">Go back</button></a> 
            
        </div>

    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.0/circle-progress.js"></script>

    <script>
        function Circlle(el){
            $(el).circleProgress({fill: {color: '#ff5c5c'}})
            .on('circle-animation-progress', function(event, progress,stepValue){
                    // $(this).find('strong').text(String(stepValue.toFixed(2))+'%');
                     $(this).find('strong').text(String(stepValue.toFixed(2)) * 100+'%');
            });
        };

        Circlle('.round');
    </script>



</body>
</html>