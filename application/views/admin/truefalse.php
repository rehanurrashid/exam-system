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
        <h2 class="text-primary ml-5">Admin: <span class="text-success">Screen: 5</span></h2>
        <h2 class="text-danger ml-5">Add New Exercise for True/False </h2>
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
                    <th>Image</th>
                    <th>Questions</th>
                    <th>Answer</th>
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
                    <?php  echo form_open_multipart('admin/store_true_question'); ?>
                <div class="form-group">
                    <label >Question:</label>
                    <input style="display:none" type="text" class="form-control"  name="eid" value="<?= $data['exelastid']; ?>">
                    <input style="display:none" type="text" class="form-control"  name="category" value="<?= $data['category']['cid']; ?>">
                    <input style="display:none" type="text" class="form-control"  name="type" value="<?= $data['type']['tid']; ?>">
                    <input style="display:none" type="text" class="form-control"  name="qtitle" value="<?= $data['qtitle']; ?>">
                    <input type="text" class="form-control" id="question" name="question"  placeholder="Enter Question">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1"> Select Image:</label>
                    <?php echo form_upload(['name' => 'image']); ?>
                </div>
                <div class="form-group">
                    <label >Answer:</label> <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="answer" id="true" value="true">
                    <label class="form-check-label" for="inlineRadio1">True</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="answer" id="false" value="false">
                    <label class="form-check-label" for="inlineRadio2">False</label>
                </div>
                </div>
                </div>
            <div class="modal-footer mt-3">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?php  
                echo  form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-dark']),
                    form_submit(['name'=> 'submit','value'=>'Save Question','class'=>'btn btn-primary']); 
                ?>
                <?php  echo form_close(); ?>
            </div>
            </div>
        </div>
    </div>
     <!-- Modal Edit Question-->
     <div class="modal fade" id="editQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <?php  echo form_open_multipart('admin/edit_true_question'); ?>
                    <div class="form-group">
                        <label >Question:</label>
                        <input style="display:none" type="text" class="form-control"  name="eid" value="<?= $data['exelastid']; ?>">
                        <input style="display:none" type="text" class="form-control"  name="category" value="<?= $data['category']['cid']; ?>">
                        <input style="display:none" type="text" class="form-control"  name="type" value="<?= $data['type']['tid']; ?>">
                        <input style="display:none" type="text" class="form-control"  name="qtitle" value="<?= $data['qtitle']; ?>">
                        <input style="display:none" type="text" class="form-control"  name="id" id="editid">
                        <input type="text" class="form-control" id="editquestion" name="question"  placeholder="Enter Question">
                    </div>
                    <img src="" class="img-thumbnail"  width="200" height="200" id="editimage">
                    <div class="form-group mt-3">
                        <label for="exampleFormControlFile1"> Select Image:</label>
                        <?php echo form_upload(['name' => 'image']); ?>
                    </div>
                    <div class="form-group">
                        <label >Answer:</label> <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="answer" id="true" value="true">
                            <label class="form-check-label" for="inlineRadio1">True</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="answer" id="false" value="false">
                            <label class="form-check-label" for="inlineRadio2">False</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-3">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <?php  
                    echo  form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-dark']),
                        form_submit(['name'=> 'submit','value'=>'Update Question','class'=>'btn btn-primary']); 
                    ?>
                    <?php  echo form_close(); ?>
                    <?php  echo form_open('admin/delete_true_question'); ?>
                        <input style="display:none" type="text" class="form-control"  name="eid" value="<?= $data['exelastid']; ?>">
                        <input style="display:none" type="text" class="form-control"  name="category" value="<?= $data['category']['cid']; ?>">
                        <input style="display:none" type="text" class="form-control"  name="type" value="<?= $data['type']['tid']; ?>">
                        <input style="display:none" type="text" class="form-control"  name="qtitle" value="<?= $data['qtitle']; ?>">
                        <input style="display:none" type="text" class="form-control"  name="id" id="deleteid">
                    <?php echo form_submit(['name'=> 'submit','value'=>'Delete Question','class'=>'btn btn-danger']);  ?>
                    <?php  echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- ${data[item].question} Display data inside html template direclty using js --> 
<script type="text/javascript">
    jQuery(document).ready(function(){ 
        var exeid = $('#exeno').text();
        var serial = 1, result = 0,word = 0 , editbtn = 0,image= 0, id= 0;
        var res;
        $('#msgDiv').load('<?= base_url('admin/onload_truefalse_que_display')?>', // url 
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
                <td class="align-middle" ><h4>${data[item].answer}</h4></td>
                <td style="display:none" ><h4>${data[item].question}</h4></td>
								<td class="align-middle">
                                <button data-toggle="modal" data-target="#editQuestion" class="btn btn-primary w-100" id="editbtn`+ editbtn++ +`">Edit</button>
                                <p style="display:none">${data[item].id}</p>
                                </td>
                                <td style="display:none"> ${data[item].image} </td>
                                
							<tr>`;
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
            var imagesrc = $(this).closest('td').next().text();
            var id = $(this).siblings('p').text();
            console.log(id)
            $('#editquestion').val(question);
            $('#editimage').attr('src',imagesrc);
            $('#editid').val(id);
            $('#deleteid').val(id);
            });
        }
        });
   
}); 
</script>
  </body>
</html>