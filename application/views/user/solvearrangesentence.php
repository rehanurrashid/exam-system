<!doctype html>
<html lang="en">
<!-- dir="rtl" -->
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
  <!-- Step js library -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
    
    <!-- Ajaxx cdn -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  -->
    <!-- data tables -->
<!-- for dragable objects -->
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css"> -->

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
    .blank_input{
        width: 150px;
        border-right: none;
        border-left: none;
        border-top: none;
        border-bottom:2px solid black;
        text-align: center;
        background-color: #FBFCFC;
    }
    
    .blank_input:focus{
        outline: none;
        border-bottom:2px solid grey;
        transition:border-bottom 1s;
    }
    /* .dis {
            pointer-events: none;
        } */
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
    width : 1400px;margin-left : -25%
}
    </style>
  </head>
  <body>
    <div class="jumbotron jumbotron-fluid">
        <h2 class="text-primary ml-5">User: <span class="text-success">Screen: 2</span></h2>
        <h2 class="text-danger ml-5">Solve Exercise for Fill in the blanks </h2>
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
                    <h4 class="text-primary" id="exeno" ><?= $data['exercise']['eid']; ?></h4>
                </div>
            </div>
        </div> <?= br(2); ?>
        <button class="btn btn-dark mb-3" onclick="openFullscreen();">Fullscreen Mode</button>
    <div id="gamebody">
        <div class="row">
            <div class="col-md-6 ml-5 mt-3">
                <div class="row">
                    <h5><span class="text-success">Correct: +5</span> | <span class="text-danger">Incorrect: 0</span>
                        | <span class="text-primary">Total Score: <span id="totalscore"></span></span> 
                        </h5>
                        <h4><span class="text-danger">You can submit your answer only once!</span></h4>
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
        <?php  if(!empty($data['questions'])): foreach ($data['questions'] as $question):  ?>
           <div id="questionid" class="questionid"> <?php echo $question['id'];?></div>
        <?php endforeach; ?>
        <?php endif; ?>
        <table class="table" id="exeQuestions">
            <thead class="thead-dark">
                <tr>
                    <th>Sr. No.</th>
                    <th>Questions</th>
                    <th>Submit Answer</th>
                    <th>Result</th>
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
        var serial = 1, result = 0,word = 0 , submit = 0,question= 0;
        var res;
        $('#msgDiv').load('<?= base_url('user/onload_questions_display/')?>', // url 
                  { eid: exeid },    // data 
                    function(_data, status, jqXGR) {  // callback function 
                var data = JSON.parse(_data);
                var template = '';

                function shuffle(arr) {
                    for(var j, x, i = arr.length; i; j = parseInt(Math.random() * i), x = arr[--i], arr[i] = arr[j], arr[j] = x);
                        return arr;
                    }

                if(data.length>0){
                    for(var item in data){

                            
                                var check = data[item].question.split(' ?');
                                res = check[0].split(' ?');
                                
                                len = res.length;
                                // console.log(len)
                                for(var i =0; i<len ; i++){
                                var senlen = res[i].split(' ').length
                                // This line of code shuffle the words in the sentence
                                var random = res[i].split(' ').sort(function(){return 0.5-Math.random()}).join(' ')
                                // console.log(random)
                                // console.log(res[i])
                                template +=`<tr>
                                    <td><h6>`+ serial++ + `</h6></td>
                                    <td style="display:none"> ${data[item].id} </td>`;
                                    
                                    
                                template +=`<td ><ul id="question`+ question++ +`">`;
                                for ( var j = 0 ; j<senlen ; j++){

                                template += `<li style="cursor:pointer"  id="word`+ data[item].id +``+ j +`" class="btn btn-info mr-2 ui-state-default ">`+

                                random.split(' ')[j];
                                
                                +`</li>`;

                                }
                                template +=    `</ul></td>`;

                                template +=		`<td ><button  class="btn btn-dark " id="submit`+ submit++ +`">Submit</button>
                                <p style="display:none" class="check">`+ data[item].question +`</p>
                                </td>
                                    <td id="status`+ result++ +`"></td> <td style="display:none" class="totalrows"> </td>
                                <tr>`;
                           }
                    }
                template +=`</table>`;
				$('#myTable').html(template);
                }
                
                 else{
                    for(var item in data){
                template +=`<tr>
							    <td></td>
								<td><h4>No Questions Found in this Exercise!</h4></td>
								<td></td>
								<td></td>
                                <td style="display:none" id="id`+ id++ +`"> ${data[item].id} </td>
							<tr>`;
                    }
                template +=`</table>`;
				$('#myTable').html(template);
                }
               
    let wordcount = $('.wordid').length;
    let questionid = $('.questionid').length;
    var wordslen = $('.plength').length;
    var tr = $('.totalrows').length;
    var totalScore = 0;
    var score = 0 ;
    var sortedquestion,check;
        // for displaying total score
        for(var i=0;i<tr;i++){
            totalScore = totalScore +5 ;
        $('#totalscore').html(totalScore);
        }
        
    // The word which is clicked added as a blank   
    var count = $('.btn-info').length;
    questionid = $('.questionid').length;

       for(var i=0;i<count;i++){
        // $('#word').attr("id","word"+i);
        //$('#status').attr("id","status"+i);
        
        for(var j=0;j<questionid;j++){
            $('#questionid').attr("id","questionid"+j);
            var qusid = $('#questionid'+j).text().trim();
            
            // following code snipt make it dragable content
            // $('.btn-info').draggable({
            //     cancel:false,
            //     containment:'parent',
            //     });
                
            $('.btn-info').mouseup(function(){
                $(this).removeClass('btn-warning').addClass('btn-info');
                // $(this).css('z-index',2)
            })
            $( function() {
                    $( 'ul').sortable({
                        containment:'parent',
                        revert: 50,
                        zIndex: 9999,
                        scroll: false
                    });
                    $( 'ul').disableSelection();
                } ); 
        $('#word'+qusid+``+i).mousedown(function(){
            eachwordid = $(this).attr('id');
            var tdid = $(this).parent().attr('id');
            $(this).removeClass('btn-info').addClass('btn-warning');
            
            // alert('#'+ eachwordid)
            let status = $(this).closest('td').next().attr('id');
            // console.log(status);
            //$(this).removeClass('btn btn-info').addClass('dash');
            let name = $(this).text();
            let id = $(this).attr('id');
            let value = name.trim();
            var qid = $(this).closest('td').prev().text();
            // console.log(qid);
        });
       }
    } 
        // Displaying msg of Correct or Incorrect 
        for(var i=0;i< questionid;i++){
            //when submit clicked
            $('#submit'+i).click(function(){
                sortedquestion = $(this).parent('td').prev().text();    //parent td id of each row
                status = $(this).closest('td').next().attr('id');   //getting status id of each row
                check = $(this).siblings('p').html();
                var orgquestion = check.replace(/ /g,'');
                
                if(sortedquestion == orgquestion)
                    {    
                        let html = '<img class="correct" src="<?= base_url() ?>assets/images/correct.jpg" alt="Correct Word">';
                            $('#'+status).hide().html(html).fadeIn(1000);
                            let htmlalready = '<h2>Correct</h2>';
                            $('#alreadyadd').hide().html(htmlalready).fadeIn(1000).removeClass('text-danger').addClass('text-success');
                            score = score + 5;
                            $("#score").html(score);
                    }
               else
                    {
                        let html = '<img class="correct" src="<?= base_url() ?>assets/images/cross.png" alt="Incorrect Word">';
                            $('#'+status).hide().html(html).fadeIn(1000);
                        let htmlalready = '<h2>Incorrect</h2>';
                            $('#alreadyadd').hide().html(htmlalready).fadeIn(1000).removeClass('text-success').addClass('text-danger');
                    }
                });
        }
    });  
}); 
</script>
  </body>
</html>