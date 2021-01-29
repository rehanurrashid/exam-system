<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <!-- Animation CSS -->
    <link href="<?= base_url() ?>assets/css/animation.css" rel="stylesheet">

    <title>User Categories</title>
    <style type="text/css">
    body{
        background-color: rgba(233, 236, 239, 0.15);
    }
    .button5 {
    background-color: white;
    color: black;
    border: 2px solid #74B874;
    border-radius:45%;
    font-size:25px;
    }
    .button5:hover{
      background-color: #74B874;
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
    
    </style>
  </head>
  <body id="body" class="body">
    <div class="jumbotron jumbotron-fluid ">
        <h2 class="text-primary ml-5">user: <span class="text-success">Screen: 1</span></h2>
        <h2 class="text-primary ml-5">Here you can Add and Edit <span class="text-success">Categories</span></h2>
    </div>
    <div class="container" style="margin-top: 1%">
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
       <div class="row">
            <div class="col-md-6">
            <h4 class="text-info">
            You have <span id="count"></span> Categories</h4> 
            </div>
        </div>
        <br>
        <!-- Displayin Categories -->
        <div class="row d-flex flex-row justify-content-center">
        <?php if($data == 0){ ?>
            <h3 class="text-dark">No Categories Found!</h3>
        <?php     
        }
        else{
            foreach ($data as $category): ?>
                <div id="catid" style="display: none;"><?= $category['cid'] ?></div>
                <div class="col-md-3 text-center mr-5 shadow-lg p-3 mb-5 bg-white rounded">
                    <button data-toggle="modal" data-target="#editCategory" class="btn btn-info w-75 p-2" id="cat"> <strong><u><?= $category['category'] ?></u></strong> <i class="fas fa-edit ml-3" ></i></button>
                </div>  
            <?php endforeach; ?>
        <?php
        }; ?>     
        </div>
        <div class="row" >
         <div class="col-md-12">
            <button data-toggle="modal" data-target="#addCategory" id="add" class="button button5 btn float-right"><b> <img src="<?= base_url() ?>assets/images/add.png" alt="Add New Category" height="40px" width="40px" > </b></button>
            <h5 class="float-right mt-3 mr-3">Add New Category:</h5>
         </div>
        </div>
    </div>
    <div style="height:100px" ></div>
    <footer class="col-md-12" style="position:fixed;bottom:0;padding:0">
        <nav class="navbar navbar-light d-flex flex-row-reverse" style="background-color:#E9ECEF">
            <a id="nextToExercise" href="<?= base_url('user/exercise') ?>" class="btn btn-primary w-25">Next to Exercise <i class="fas fa-arrow-right"></i></a>
        </nav>
    </footer>
    <!-- Modal Add New Categories-->
    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php  echo form_open('user/add_cat'); ?>
            <div class="form-group">
                <label >Category:</label>
                <input type="text" class="form-control" id="addcategory"  name="category"  placeholder="Enter Category">
                <div id="adderror" class="text-danger"></div> 
            </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?php  
                echo  form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-dark']),
                form_submit(['name'=> 'submit','value'=>'Save Category','class'=>'btn btn-primary','id'=>'addsubmit']); 
                ?>
                <?php  echo form_close(); ?>
            </div>
            </div>
        </div>
    </div>
        <!-- Modal Edit Categories-->
    <div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php  echo form_open('user/edit_cat'); ?>
            <div class="form-group">
                <label >Category:</label>
                <input type="text" class="form-control" id="editcategory" name="category"  placeholder="Enter Category">
                <input style="display: none;" type="text" class="form-control " id="editid" name="cid"  placeholder="Enter Category">
                <div id="editerror" class="text-danger"></div> 
            </div>
            
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <?php  
                    echo  form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-dark']),
                    form_submit(['name'=> 'submit','value'=>'Update Category','class'=>'btn btn-primary','id'=>'editsubmit']); 
                    ?>
                    <?php  echo form_close(); ?>
                    
                    <?php  echo form_open('user/delete_cat'); ?>
                    <input style="display: none" type="text" class="form-control " id="deletetid" name="cid"  placeholder="Enter Category">
                    <?php echo form_submit(['name'=> 'submit','value'=>'Delete Category','class'=>'btn btn-danger']);  ?>
                    <?php  echo form_close(); ?>
            </div>
            </div>
        </div>
    </div>
   <script type="text/javascript">
    jQuery(document).ready(function(){ 
        // Number of Categories
        var count = $('.fa-edit').length;
        $('#count').html(count);
        // Validation on Add input field
        $('#addsubmit').click(function(){
            var input = $('#addcategory').val();
            if(input == ""){
                var error = "<p>The Category Field should not be empty!";
                $('#adderror').html(error);
                $( "form" ).submit(function( event ) {
                event.preventDefault();
                $(this).unbind( event );
                });
            } 
        });
        // Validation on Add input field
        $('#editsubmit').click(function(){
            var input = $('#editcategory').val();
            if(input == ""){
                var error = "<p>The Category Field should not be empty!";
                $('#editerror').html(error);
                $( "form" ).submit(function( event ) {
                event.preventDefault();
                $(this).unbind( event );
                });
            } 
        });
        // Assigning unique id to each button category
        for(var i = 0 ; i <= count; i++ ){
            $('#cat').attr("id","cat"+i);
            $('#catid').attr("id","catid"+i);

            $('#cat' + i).click(function(){
                // Getting value of each category
                var cat = $(this).text();
                // Fill input fields for Edit
                $('#editcategory').val(cat);
                //Geting cid of each category
                var iddiv = $(this).closest('div').prev().attr('id');
                var cid = $('#'+iddiv).text();
                console.log(cid);
                $('#editid').val(cid);
                $('#deletetid').val(cid);
            });
        }  
    });      
    </script>
  </body>
</html>