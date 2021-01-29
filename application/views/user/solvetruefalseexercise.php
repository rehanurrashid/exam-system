<!doctype html>
<html lang="en">
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
    .dis {
            pointer-events: none;
        }
    .match {
            color: green;
            transition: color 0.9s;
        }

    .notmatch {
            color: red;
            transition: color 0.9s;
    }
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
    width : 1400px;margin-left : -25%
}
    </style>
  </head>
  <body>
    <div class="jumbotron jumbotron-fluid">
        <h2 class="text-primary ml-5">user: <span class="text-success">Screen: 6</span></h2>
        <h2 class="text-danger ml-5">Edit Exercise for True/False</h2>
        <h2 class="text-primary ml-5">Here you can Add and Edit <span class="text-success">Questions</span></h2>
    </div>
    <div class="container" style="margin-top: 1%">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 d-flex justify-content-center">
            <div class="col-md-3">
                    <h4 class="float-right">Subject: </h4>
                </div>
                <div class="col-md-9">
                    <h4 class="text-primary"><?Php echo $data['category']['category']; ?></h4>
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
                    <h4 class="text-primary"><?Php echo $data['type']['type']; ?></h4>
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
        <?= br(2); ?>
        <button class="btn btn-dark mb-3" onclick="openFullscreen();">Fullscreen Mode</button>
    <div id="gamebody">
        <div class="row">
                <div class="col-md-6 ml-5 mt-3">
                    <div class="row">
                        <h5><span class="text-success">Correct: +5</span> | <span class="text-danger">Incorrect: 0</span>
                            | <span class="text-primary">Total Score: <span id="totalscore"></span></span></h5>
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
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 d-flex justify-content-center">
                <div id="alreadyadd"></div>
            </div>
        </div>
        <br>
          <?php if($feedback = $this->session->flashdata('feedback')): 
              $feedback_class = $this->session->flashdata('feedback_class');
            ?>
          <div class="col-sm-10">
              <div class="alert alert-dismissible <?= $feedback_class ?>">  
              <?=  $feedback //display alert message if article is inserted ?> 
              </div>
          </div>
          <?php endif; ?>
       <br>
        <?php if( isset($data['blanks']) ): foreach ($data['blanks'] as $word): ?>
           <div id="wordid" class="wordid bg-info"><?php echo $word['blankid'];?></div>
           <div id="wordname" class="wordname"> <?php echo $word['blankname'];?></div>
           <div id="qid" style="display:none"> <?php echo $word['id'];?></div>
        <?php endforeach; ?>
        <?php endif; ?>
        <?php   if( !empty($data['questions'])): foreach ($data['questions'] as $question): ?>
           <div id="questionid" class="questionid"> <?php echo $question['id'];?></div>
        <?php endforeach; ?>
        <?php endif; ?>
        <table class="table" id="exeQuestions">
            <thead class="thead-dark">
                <tr>
                    <th>Sr. No.</th>
                    <th>Image</th>
                    <th>Questions</th>
                    <th>Answer</th>
                </tr>
            </thead>
            <tbody id="myTable">
               
            </tbody>
        </table>
    </div>
    <div style="height:300px" >
    </div>
    <footer class="col-md-12" style="position:fixed;bottom:0;padding:0;left:0">
        <nav class="navbar" style="background-color:#E9ECEF">
        <a href="<?= base_url('user/exercise') ?>" class="btn btn-primary w-25"><i class="fas fa-arrow-left"></i> Back to Exercises</a>

        <div class="w-50">
            <?php  echo form_open('user/update_exercise'); ?>
            <?php echo form_submit(['name'=> 'submit','value'=>'Submit Answers','class'=>'btn btn-dark w-50 mr-5 float-right' ]);  ?>
            <?php  echo form_close(); ?>
        </div>

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
    jQuery(document).ready(function(){ 
        var exeid = $('#exeno').text();
        var serial = 1, result = 0,word = 0 , editbtn = 0,image= 0, id= 0;
        var res;
        $('#msgDiv').load('<?= base_url('user/onload_truefalse_que_display')?>', // url 
                  { eid: exeid },    // data 
                  function(_data, status, jqXGR) {  // callback function 

                var data = JSON.parse(_data);
                console.log(data);

                var template = '';
                if(data.length>0){
                        for(var item in data){

                template +=`<tr>
							    <td><h4>`+ serial++ + `</h4></td>`;
                                
                template +=`<td id="image`+ image++ +`">`;
                    
                template +=       ` <img src="${data[item].image}" height="200px" width="200px">`;
                            
                template +=    `</td>`;
                            
                template +=		`<td class="align-middle" ><h4>${data[item].question}</h4></td>
                                <td class="align-middle"> <p class="ans"></p> 
                    <button class="btn btn-info" id="true" >True</button> 
                    <button class="btn btn-info" id="false" >False</button>  </td>
                    <td id="answer" style="display:none">${data[item].answer}</td>
							<tr>`;
                        }
                template +=`</table>`;
				$('#myTable').html(template);

                } else{
                    for(var item in data){
                template +=`<tr>
							    <td></td>
								<td><h4>No Questions Found in this Exercise!</h4></td>
								<td></td>
								<td></td>
							<tr>`;
                    }
                template +=`</table>`;
				$('#myTable').html(template);
                }
    var score= 0 ;
    var count = $('.ans').length;
    var totalScore = 0;
        for(var i=0;i<count;i++){
            totalScore = totalScore +5 ;
        $('#totalscore').html(totalScore);
        $('#true').attr("id","true"+i);
        $('#false').attr("id","false"+i);
        $('#answer').attr("id","answer"+i);

        $('#true'+i).click(function(){
            
            var answer = $(this).closest('td').next().text();
            if(answer == "true"){
                $("#result").html("<b>Correct</b>").removeClass('notmatch').addClass('match');
                $(this).removeClass('btn-info').addClass('btn-success');
                score = score + 5;
                $("#score").html(score);
                var fal = $(this).closest("button").next().attr("id");
                $('#'+fal).addClass('dis');
                $(this).addClass('dis');
            }
            else{
                $(this).removeClass('btn-info').addClass('btn-danger');
                $("#result").html("<b>Incorrect</b>").addClass('notmatch');
                var fal = $(this).closest("button").next().attr("id");
                $('#'+fal).addClass('dis');
                $(this).addClass('dis');
            }
        });
        $('#false'+i).click(function(){
            
            var answer = $(this).closest('td').next().text();
            if(answer == "false"){

                $("#result").html("<b>Correct</b>").removeClass('notmatch').addClass('match');
                $(this).removeClass('btn-info').addClass('btn-success');
                score = score + 5;
                $("#score").html(score);
                var tru = $(this).closest("button").prev().attr("id");
                $('#'+tru).addClass('dis');
                $(this).addClass('dis');
            }
            else{
                $(this).removeClass('btn-info').addClass('btn-danger');
                $("#result").html("<b>Incorrect</b>").addClass('notmatch');
                var tru = $(this).closest("button").prev().attr("id");
                $('#'+tru).addClass('dis');
                $(this).addClass('dis');
            }
        });
        }
        });
   
}); 
</script>
  </body>
</html>