<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- Step js library -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
    
    <!-- Ajaxx cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <!-- data tables -->

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
    </style>
  </head>
  <body>
    <div class="jumbotron jumbotron-fluid">
        <h2 class="text-primary ml-5">Admin: <span class="text-success">Screen: 4</span></h2>
        <h2 class="text-danger ml-5">Add New Exercise for Fill in the Blanks </h2>
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
                    <h4 class="text-primary"><?Php echo $data['qtitle']; ?></h4>
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
                    <h4 class="text-primary" id="exeno"><?= $data['exelastid']; ?></h4>
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
    <?php  if( isset($data['questions']) ): foreach ($data['questions'] as $question): ?>
           <div id="questionid" class="questionid"> <?php echo $question['id'];?></div>
        <?php endforeach; ?>
    <?php endif; ?>
        <table class="table" id="exeQuestions">
            <thead class="thead-dark">
                <tr>
                    <th>Sr. No.</th>
                    <th>Questions</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="myTable">
               
            </tbody>
        </table>
    </div>
    <div style="height:300px" >
    </div>
    <footer class="col-md-12" style="position:fixed;bottom:0;padding:0">
        <nav class="navbar" style="background-color:#E9ECEF">
        <a href="<?= base_url('admin/type') ?>" class="btn btn-primary w-25"><i class="fas fa-arrow-left"></i> Back to Type</a>

        <div class="w-50">
        <?php  echo form_open('admin/insert_exercise'); ?>
        <input style="display:none" type="text"  name="cid" value="<?= $data['category']['cid']; ?>">
        <input style="display:none" type="text"  name="tid" value="<?= $data['type']['tid']; ?>">
        <input style="display:none" type="text" name="qtitle" value="<?= $data['qtitle']; ?>">
        
        <?php echo form_submit(['name'=> 'submit','value'=>'Save Exercise','class'=>'btn btn-dark w-50 mr-5 float-right' ]);  ?>
        <?php  echo form_close(); ?>
        </div>

        <a style="cursor: pointer;" data-toggle="modal" data-target="#addQuestion"   class="btn btn-success float-right w-25 text-white">Add New Question</a>
        </nav>
    </footer>

<div id="msgDiv" style="display:none"></div>

    <!-- Modal Add New Question-->
    <div class="modal fade" id="addQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add New Question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php  echo form_open(); ?>
            <div class="form-group">
                <label >Question:</label>
                <input type="text" class="form-control" id="addinput" name="question"  placeholder="Enter Question">
                <input style="display:none" id="exelastid" type="text" name="eid" value="<?= $data['exelastid']; ?>">
            </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?php  
                echo  form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-dark']),
                    form_submit(['name'=> 'submit','value'=>'Save Question','class'=>'btn btn-primary','id' => 'addquestion','data-dismiss' => 'modal']); 
                ?>
                <?php  echo form_close(); ?>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit Question-->
    <div class="modal fade" id="editQuestionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php  echo form_open('admin/store_question'); ?>
            <div class="form-group">
                <label >Question:</label>
                <input type="text" class="form-control" id="editinput" name="question"  placeholder="Enter Question">
                <input style="display:none" type="text" class="form-control" id="editid" name="id" value="">
            </div>
            
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <?php  
                    echo  form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-dark']),
                    form_submit(['name'=> 'submit','value'=>'Update Question','class'=>'btn btn-primary','id' => 'editquestion','data-dismiss' => 'modal']); 
                    ?>
                    <?php  echo form_close(); ?>
                    <?php  echo form_open(''); ?>
                    <input style="display:none" type="text" class="form-control" id="deleteid" name="id" value="">
                    <?php echo form_submit(['name'=> 'submit','value'=>'Delete Question','class'=>'btn btn-danger' , 'data-dismiss' => 'modal','id' => 'deletebtn']);  ?>
                    <?php  echo form_close(); ?>
            </div>
            </div>
        </div>
    </div>
    <!-- ${data[item].question} Display data inside html template direclty using js --> 
<script type="text/javascript">
    jQuery(document).ready(function(){ 
        var exeid = $('#exeno').text();
        var serial = 1, result = 0,word = 0 , editbtn = 0,question= 0, id= 0;
        var res;
        $('#msgDiv').load('<?= base_url('admin/onload_questions_display')?>', // url 
                  { eid: exeid },    // data 
                  function(_data, status, jqXGR) {  // callback function 

                var data = JSON.parse(_data);
                var template = '';
                if(data.length>0){
                        for(var item in data){

                            
                            var check = data[item].question.split(' ?');
                            res = check[0].split(' ?');
                            len = res.length;
                            // console.log(len)
                            for(var i =0; i<len ; i++){
                               var senlen = res[i].split(' ').length
                template +=`<tr>
							    <td><h5>`+ serial++ + `</h5></td>
                                <td style="display:none"> ${data[item].id} </td>`;
                                
                                
                template +=`<td id="question`+ question++ +`">`;
                    for ( var j = 0 ; j<senlen ; j++){
                template +=       `<button id="word`+ data[item].id +``+ j +`" class="btn btn-info mr-2">`+

                                res[i].split(' ')[j]
                                
                                +`</button>`;
                            }
                template +=    `</td>`;
                            
                template +=		`<td id="status`+ result++ +`"></td>
                                <td style="display:none" >${data[item].question}</td>
								<td><button data-toggle="modal" data-target="#editQuestionModal" class="btn btn-primary" id="editbtn`+ editbtn++ +`">Edit</button></td>
                                <td style="display:none"> ${data[item].id} </td>
							<tr>`;
                        }
                    }
                template +=`</table>`;
				$('#myTable').html(template);

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
// if edit button is clicked
var tr = $('tr').length;
    for(var i = 0 ; i < tr; i++){
        $('#editbtn' + i).click(function(){
            var question = $(this).closest('td').prev().text();
            var id = $(this).closest('td').next().text();
            $('#editinput').val(question);
            $('#editid').val(id);
            $('#deleteid').val(id);
            });
        }
        
// The word which is clicked added as a blank   
var count = $('.btn-info').length;
let questionid = $('.questionid').length;

       for(var i=0;i<count;i++){
        // $('#word').attr("id","word"+i);
        //$('#status').attr("id","status"+i);
        
        for(var j=0;j<questionid;j++){
            $('#questionid').attr("id","questionid"+j);
            var qusid = $('#questionid'+j).text().trim();
            // console.log('#word'+qusid+``+i)
        

        $('#word'+qusid+``+i).click(function(){
            // alert(this.id);
            let status = $(this).closest('td').next().attr('id');
            console.log(status);
            //$(this).removeClass('btn btn-info').addClass('dash');
            let name = $(this).text();
            let id = $(this).attr('id');
            let value = name.trim();
            var qid = $(this).closest('td').prev().text();
            console.log(qid);
        $.get(`<?= base_url('admin/insertBlanks')?>`,{blankid:id,blankname:value,id:qid}, function(_data){
               var data = JSON.parse(_data);
            //    console.log(data);
               if(data['status'] == true)
               {    
                   let html = '<img class="correct" src="<?= base_url() ?>assets/images/correct.jpg" alt="Word Inserted">';
                     $('#'+status).hide().html(html).fadeIn(1000);
                     let htmlalready = '<h4>You make this word blank</h4>';
                    $('#alreadyadd').hide().html(htmlalready).fadeIn(1000).removeClass('text-danger').addClass('text-success');
                    $('#'+id).removeClass('btn btn-info').addClass('btn btn-success');
                // console.log(test);
               }
               else{
                let html = '<img class="correct" src="<?= base_url() ?>assets/images/cross.png" alt="Word Not Inserted">';
                     $('#'+status).hide().html(html).fadeIn(1000);
                let htmlalready = '<h4>This word already added as blank</h4>';
                    $('#alreadyadd').hide().html(htmlalready).fadeIn(1000).removeClass('text-success').addClass('text-danger');
                    $('#'+id).removeClass('btn btn-info').addClass('btn btn-danger');
                    //console.log(test);
               }
              
           })
        });
       }
    }
    // this code turn the blanks into red color
    var wordid,wordname,qid;
    let wordcount = $('.wordid').length;
        for(var i=0;i<wordcount;i++){
            $('#wordid').attr("id","wordid"+i);
            $('#wordname').attr("id","wordname"+i);
            $('#qid').attr("id","qid"+i);
            wordid = $('#wordid'+i).text(); //Geting id of each word
            wordname = $('#wordname'+i).text().trim(); //Geting name of each word
            qid = $('#qid'+i).text().trim(); // Geeting id each question
            
            // var wordslen = $('.plength').length; // counting total words in the page
            
        for(var j=0; j<10; j++){
            qid = $('#qid'+i).text().trim();
            
            var swordname = $('#word'+qid+``+j).text(); //Geting nameof each word from sentence
            
            var swordid = $('#word'+qid+``+j).attr('id'); //Geting id of each word from sentence
            // console.log(swordid);
            // console.log(swordname);
                if(wordid == swordid && wordname == swordname ){
                    $('#'+wordid).removeClass('btn btn-info').addClass('btn btn-danger');
                    $('#text').attr("id",wordid);
                        }
                    }    
            }
        
});
// edit question using jason request
$('#editquestion').click(function(){
            var que = $('#editinput').val();
            var qid = $('#editid').val();
            // var exelastid = $('#exelastid').val();
            
            $.get(`<?= base_url('admin/edit_question')?>`,{id:qid,question:que,eid:exeid},function(_data){
                var data = JSON.parse(_data);
                console.log(data) 
            });
            location.reload();
        });
 // deleting question using jason request
 $('#deletebtn').click(function(){
            var qid = $('#deleteid').val();
            // var exelastid = $('#exelastid').val();
            $.get(`<?= base_url('admin/delete_question')?>`,{id:qid,eid:exeid},function(_data){
                var data = JSON.parse(_data);
            });
            location.reload();
        });
// inserting questions using jason request
    $('#addquestion').click(function(){
            var que = $('#addinput').val();
            var exelastid = $('#exelastid').val();
            
            $.get(`<?= base_url('admin/insert')?>`,{eid:exelastid,question:que},function(_data){
                var data = JSON.parse(_data);
            });
            location.reload(); 
        });
        
    }); 
</script>
  </body>
</html>