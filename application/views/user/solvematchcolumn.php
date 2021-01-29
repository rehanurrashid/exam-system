<!doctype html>
<html lang="en" >
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
   

    <style type="text/css">
    body{
        background-color: rgba(233, 236, 239, 0.15);
        
    }
    .button5 {
    background-color: white;
    color: black;
    border: 2px solid #555555;
    border-radius:50%;
    font-size:25px;
    }
    .button5:hover{
      background-color: #555555;
      cursor:pointer;
      transition: background-color 0.5s;
    }
    .button5:active{
      background-color: white;
      cursor:pointer;
      transition: background-color 0.5s;
    }
    .button5:visited{
      background-color: white;
      cursor:pointer;
      transition: background-color 0.5s;
      border: 2px solid #555555;
      border-radius:50%;
    }
    .dash{
    background: transparent;
    border-top: none;
    border-right: none;
    border-left: none;
    width: 100px;
    border-radius: 0;
    border-bottom: 2p;
    border-bottom: groove;
    transition: 1s;
    color:white;
    pointer-events:none;
    }
    .dash:visited{
        border:5px solid black;
    }
    .correct{
        width:30px;
        height:30px;
    }
    #alreadyadd{
        height:50px;
    }
    .wordid , .wordname{
        display:none;
    }
    .questionid{
        display:none;
    }
    footer{
        bottom:0;
    }
        h3,
        img {
            cursor: pointer;
        }

        .dis {
            cursor: not-allowed;
            pointer-events: none;
        }

        .match {
            color: green;
        }

        .notmatch {
            color: red;
        }

        
        .myCanvas {
            position: absolute;
            z-index: 200;
            margin-left: -21%;
            /* box-shadow: 5px 5px 10px red; */
            /* border: 2px inset red ; */
            /* background-color: aqua; */
            
        }
        
        .cdisplay {
            display: none;
        }

        .cndisplay {
            display: block;
        }

        div.line {
            transform-origin: 0 100%;
            height: 3px;
            /* Line width of 3 */
            background: #000;
            /* Black fill */
        }

        /* #canvas{border:solid; } */
        body {
            background-color: ivory;
        }

        #name , #img {
            padding: 0;
        }
        .uniqueid{
            display:none;
        }
        .imgname{
            background-color: rgb(30, 212, 73);text-align: center;position: relative;
        }
 /* Chrome, Safari and Opera syntax */
:-webkit-full-screen {
  background-color: #FFFFF0;
}

/* Firefox syntax */
:-moz-full-screen {
  background-color: #FFFFF0;
}

/* IE/Edge syntax */
:-ms-fullscreen {
  background-color: #FFFFF0;
}

/* Standard syntax */
:fullscreen .myCanvas{
    width : 1350px;margin-left : -24%;
    height : 430px;
}

    </style>
  </head>
  <body >
    <div class="jumbotron jumbotron-fluid">
        <h2 class="text-primary ml-5">user: <span class="text-success">Screen: 9</span></h2>
        <h2 class="text-danger ml-5">Edit Exercise for Match the Column</h2>
        <h2 class="text-primary ml-5">Here you can Add and Edit <span class="text-success">Questions</span></h2>
    </div>
    <div class="container" style="margin-top: 1%">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 d-flex justify-content-center">
            <div class="col-md-3">
                    <h4 class="float-right">Subject: </h4>
                </div>
                <div class="col-md-9">
                    <h4 class="text-primary"><?php echo $data['category']['category']; ?></h4>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="col-md-3">
                    <h4 class="float-right">Question Title:</h4>
                </div>
                <div class="col-md-9">
                    <h4 class="text-primary"><?php echo $data['exercise']['qtitle']; ?></h4>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="col-md-3">
                    <h4 class="float-right">Type: </h4>
                </div>
                <div class="col-md-9">
                    <h4 class="text-primary"><?php echo $data['type']['type']; ?></h4>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="col-md-3">
                    <h4 class="float-right">Exercise No.</h4>
                </div>
                <div class="col-md-9">
                    <h4 class="text-primary" id="exeno"><?= $data['exercise']['eid']; ?></h4>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 d-flex justify-content-center">
                <div id="alreadyadd"></div>
            </div>
        </div>
        <button class="btn btn-dark mb-3" onclick="openFullscreen();">Fullscreen Mode</button>
    <div id="gamebody">
        <div class="row">
                <div class="col-md-6 ml-4 mt-4">
                    <div class="row">
                        <h5><span class="text-success">Matched: +5</span> | <span class="text-danger">Not Matched: 0</span>
                            | <span class="text-primary">Total Score: 20</span></h5>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ">
                            <h2>Your Score: </h2>
                        </div>
                        <div class="col-md-4 ">
                            <h2 id="score" class="text-primary"> 0</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 ">
                            <h2>Result: </h2>
                        </div>
                        <div class="col-md-6 ">
                            <h2 id="result"> </h2>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row" style="margin-top: 5%;" >
                <div class="col-md-3 mt-4 d-flex p-3" id="name">

                </div>

                <div style="overflow-x:hidden;" id="canvasDiv" class="d-flex">
                <div style="overflow-x:hidden;" class="d-flex flex-column bd-highlight mb-3 justify-content-center">
                    <canvas  id="canvas" width="1130" class="myCanvas "></canvas>
                </div>
                </div>

                <div class="col-md-9 d-flex justify-content-end" id="img" ></div>
            </div>
        </div>
    <div style="height:300px" >
    </div>
    <footer class="col-md-12" style="position:fixed;bottom:0;padding:0;left: 0;z-index:2000">
        <nav class="navbar" style="background-color:#E9ECEF">
        <a href="<?= base_url('user/exercise') ?>" class="btn btn-primary w-25"><i class="fas fa-arrow-left"></i> Back to Exercises</a>

        <div class="w-50">
            <?php  echo form_open('user/update_exercise'); ?>
            <?php echo form_submit(['name'=> 'submit','value'=>'Submit Answers','class'=>'btn btn-dark w-50 mr-5 float-right' ]);  ?>
            <?php  echo form_close(); ?>
        </div>

        <!-- <a style="cursor: pointer;" data-toggle="modal" data-target="#addQuestion"   class="btn btn-success float-right w-25 text-white">Add New Question</a> -->
        </nav>
    </footer>

    <div id="msgDiv" style="display:none"></div>

<script type="text/javascript">
var elem = document.getElementById("gamebody");
function openFullscreen() {
    // $('#canvas').css({ "width" : "1400px", "margin-left" : "-25%" })
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.mozRequestFullScreen) { /* Firefox */
    elem.mozRequestFullScreen();
  } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
    elem.webkitRequestFullscreen();
    // alert(test)
  } else if (elem.msRequestFullscreen) { /* IE/Edge */
    elem.msRequestFullscreen();
  }
} 
// document.onkeydown = function(evt) {
//     evt = evt || window.event;
//     var isEscape = false;
//     if ("key" in evt) {
//         isEscape = (evt.key === "Escape" || evt.key === "Esc");
//     } else {
//         isEscape = (evt.keyCode === 27);
//     }
//     if (isEscape) {
//         $('#canvas').css({ "width" : "1200px", "margin-left" : "-21%" })
//     }
// };

        jQuery(document).ready(function () {
    
            var exeid = $('#exeno').text();
        var serial = 1, result = 0,word = 0 , image = 0,imagename= 0, imagenamediv= 0;
        var res;
        $('#msgDiv').load('<?= base_url('admin/onload_match_que_display')?>', // url 
                  { eid: exeid },    // data 
                  function(_data, status, jqXGR) {  // callback function 

                var data = JSON.parse(_data);
                console.log(data);

                var template = ''; var template1 = '';
                if(data.length>0){
                        for(var item in data){

                template +=`<div class="d-flex flex-column bd-highlight mb-3 justify-content-center ">

                        <div class="p-4 bd-highlight bg-success " id="imagenamediv`+ imagenamediv++ +`">
                            <h3 id="imagename`+ imagename++ +`" class="imgname">${data[item].imgname}</h3>
                            <p class="uniqueid">${data[item].unique_id}</p>
                        </div>`;
                        }
                template +=`</div>`;
				$('#name').html(template);

                template1 +=`<div class="d-flex flex-column bd-highlight justify-content-center">`;
                for(var item in data){

                template1 +=`<div class="p-1 bd-highlight">
                <img style="position: relative;z-index:1000" class="img-thumbnail" src="${data[item].image}" height="100px" width="100px" id="image`+ image++ +`">
                <p class="uniqueid">${data[item].unique_id}</p>
                    </div>`;
                        }
                template1 +=`</div>`;
                $('#img').html(template1);

                } else{
                    for(var item in data){
                template +=`<tr>
							    <td></td>
								<td><h4>Click Add New Question to Add Questions!</h4></td>
								<td></td>
								<td></td>
							<tr>`;
                    }
                template +=`</table>`;
				$('#myTable').html(template);
                }
   
    // probabily code works here
            // dynamic height of canvas
            var rows = $('.bg-success').length;
            var canvasheight = 0 ;
            for(var i=0;i<rows;i++){
                canvasheight +=  105;
                $('#canvas').attr('height',canvasheight)
            }
        
        });
      
            var score = 0;
            var img = 0;
            var text = 0;

            // Canvas function for multiple lines
            var canvas,
                context,
                dragging = false,
                dragStartLocation,
                snapshot;
            var nameuniqueid , imguniqueid , imgname, image, imgnamediv;
            function getCanvasCoordinates(event) {
                var x = event.clientX - canvas.getBoundingClientRect().left,
                    y = event.clientY - canvas.getBoundingClientRect().top;
                    
                   var canvasHeight =  $('#canvas').attr('height');
                   var canvaswidth =  $('#canvas').attr('width');
                    if (x <=5 || y <=5) {
                        text = 0 ;
                        return dragging = false;
                    }
                    else if(x && y <= canvasHeight -20 ){
                        return { x: x, y: y };
                    } else{
                        text = 0 ;
                        dragging = false;     
                    }  
            }
            
            function takeSnapshot() {
                snapshot = context.getImageData(0, 0, canvas.width, canvas.height);
            }

            function restoreSnapshot() {
                context.putImageData(snapshot, 0, 0);
            }

            function drawLine(position) {
                context.beginPath();
                context.moveTo(dragStartLocation.x, dragStartLocation.y);
                context.lineTo(position.x, position.y);
                context.stroke();

            }

            function dragStart(event) {

                dragStartLocation = getCanvasCoordinates(event);
                takeSnapshot();
                $('#name').css('z-index', 1000);
                $('#img').css('z-index', '');
                var rows = $('.bg-success').length;
                for(var i=0;i<rows;i++){
                    $('#imagename'+ i).mouseenter(function () { 
                        nameuniqueid = $(this).siblings('p').html();  
                        $('#name').css('z-index', '');
                        $('#img').css('z-index', '');
                        $('#canvas').css('z-index', '1100');
                        $('.img-thumbnail').removeClass('dis');
                        imgname = $(this);
                        imgnamediv = $(this).parent().attr('id');
                       
                        // var imgnamedivhtml = $(imgnamediv).html();
                        console.log(imgnamediv)
                        dragging = true;
                    }); 
                }

                $('#name').mouseup(function () {
                    dragging = false;
                    $('#name').css('z-index', '');
                });
            }
            function drag(event) {
                var position;
                if (dragging === true) {
                    restoreSnapshot();
                    position = getCanvasCoordinates(event);
                    drawLine(position);
                }
            }

            function dragStop(event) {
                dragging = false;
                restoreSnapshot();
                var position = getCanvasCoordinates(event);
                //drawLine(position);
                $('#canvas').css('z-index', 200);
                $('#img').css('z-index', 500);
                $('#name').css('z-index', '');
            }
            function init() {
                canvas = document.getElementById("canvas");
                context = canvas.getContext('2d');
                context.strokeStyle = "black";
                context.setLineDash([5, 15]);/*dashes are 5px and spaces are 3px*/
                context.lineWidth = 6;
                context.lineCap = 'round';

                canvas.addEventListener('mousedown', dragStart, false);
                canvas.addEventListener('mousedown', mouseenter_image, false);
                canvas.addEventListener('mousemove', drag, false);
                canvas.addEventListener('mouseup', dragStop, false);
            }
            window.addEventListener('load', init, false);

            function initalsStroke(color) {
                canvas = document.getElementById("canvas");
                context = canvas.getContext('2d');
                context.strokeStyle = color;
                context.setLineDash([5, 15]);
                context.lineWidth = 6;
                context.lineCap = 'round';
            }
            function matchStroke(color) {
                canvas = document.getElementById("canvas");
                context = canvas.getContext('2d');
                context.strokeStyle = color;
                context.setLineDash([0, 0]);
                context.lineWidth = 6;
                context.lineCap = 'round';
            }
            function mismatchStroke(color) {
                canvas = document.getElementById("canvas");
                context = canvas.getContext('2d');
                context.strokeStyle = color;
                context.setLineDash([0, 0]);
                context.lineWidth = 6;
                context.lineCap = 'round';
            }
            $('#canvas').mousedown(function () {
                initalsStroke('black');
            });
            
            function mouseenter_image(){
                var images = $('.bg-success').length;
            for(var i=0;i<images;i++){
                $('#image'+i).mouseenter(function(){
                var imguniqueid = $(this).siblings('p').html();
                image = $(this);
                if(nameuniqueid != "" && imguniqueid == nameuniqueid){
                    $("#result").html("<b>Matched</b>").removeClass('notmatch').addClass('match');
                    matchStroke('green');
                    var position = getCanvasCoordinates(event);
                    drawLine(position);
                    score = score + 5;
                    $("#score").html(score);
                    var html = $(nameuniqueid).html();
                    $(imgname).addClass('dis'); 
                    $(image).addClass('dis');
                    $('#name').css('z-index', 300);
                    $('#canvas').css('z-index', 400);
                    
                    $(imgname).css('z-index', 800);
                    $('#'+imgnamediv).css('z-index', 800);
                    nameuniqueid = "";
                    console.log(nameuniqueid)
                    return false;
                }
                else if(nameuniqueid != "" && imguniqueid != nameuniqueid){
                    console.log(nameuniqueid)
                    $("#result").html("<b>Not Matched</b>").addClass('notmatch');
                    matchStroke('red');
                    var position = getCanvasCoordinates(event);
                    drawLine(position);
                    $(imgname).addClass('dis'); 
                    $(image).addClass('dis');
                    $('#name').css('z-index', 300);
                    $('#canvas').css('z-index', 400);
                    $(imgname).css('z-index', 800);
                    $('#'+imgnamediv).css('z-index', 800);
                    nameuniqueid = "";
                    return false;
                } 
                    });
                }
            }

            $('.img-thumbnail').mouseenter(function () {
                $('.img-thumbnail').addClass('dis');
            });

           $(window).mouseup(function(){
            document.getSelection().removeAllRanges();
    
           });
    
        });    
    </script>
</body>
</html>