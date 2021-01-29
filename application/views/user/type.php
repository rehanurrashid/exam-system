<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <!-- Animation CSS -->
    <link href="<?= base_url() ?>assets/css/animation.css" rel="stylesheet">
    <!-- Step js library -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
    <title>User Type</title>
    <!-- Radio Buttons -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
        $( "input" ).checkboxradio();
    } );
    </script>
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
    <div class="jumbotron jumbotron-fluid">
        <h2 class="text-primary ml-5">user: <span class="text-success">Screen: 3</span></h2>
        <h2 class="text-primary ml-5">Here you can Add and Edit <span class="text-success">Exercise Types</span></h2>
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
            You have 3 Exercise Types</h4>
            </div>
        </div>
        <br>
        <?php  echo form_open('user/next_form'); ?>
            <div class="row d-flex flex-row justify-content-center">
                <div class="col-md-3 text-center mr-5 shadow-lg p-3 mb-5 bg-white rounded">
                    <label for="radio-1">Fill in the Blanks</label>
                    <input type="radio" name="type" id="radio-1" value="1">  
                </div> 
                <div class="col-md-3 mr-5 text-center shadow-lg p-3 mb-5 bg-white rounded">
                    <label for="radio-2">True/False</label>
                    <input type="radio" name="type" id="radio-2" value="2">
                </div> 
                <div class="col-md-3 mr-5 text-center shadow-lg p-3 mb-5 bg-white rounded">
                    <label for="radio-3">Match the Column</label>
                    <input type="radio" name="type" id="radio-3" value="3">
                </div>   
            </div>
                <div class="col-md-12">
                    <center><?= form_error('type'); ?></center>
                </div>
            <div class="form-group">
                <label for="inputState">Select Subject</label>
                <select name="category" class="form-control">
                    <option selected>Select Subject</option>
                        <?php
                        if(!empty($data['categories'])){
                            foreach($data['categories'] as $category){ 
                                echo '<option value="'.$category['cid'].'">'.$category['category'].'</option>';
                            }
                        }else{
                            echo '<option value="">No Categories Found!</option>';
                        }
                        ?>
            </select>
            </div>
            <div class="form-group">
                <label >Question Title:</label>
                <input type="text" class="form-control" id="qtitle" name="qtitle"  placeholder="Enter Question Title">
            </div>
            <div class="col-sm-6"  >
                <?php echo form_error('qtitle'); ?>
            </div>
            <?php  
                echo  form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-dark']);
            ?>
    </div>
    <div style="height:300px" ></div>
    <footer class="col-md-12" style="position:fixed;bottom:0;padding:0">
        <nav class="navbar navbar-light d-flex bd-highlight" style="background-color:#E9ECEF">
            <div class="mr-auto p-2 bd-highlight w-50">
                <a href="<?= base_url('user/exercise') ?>" class="btn btn-primary w-50"><i class="fas fa-arrow-left"></i> Back to Exercise</a>
            </div>
            <div class="p-1 bd-highlight">
                <h5 class="mt-3 mr-3">Next:</h5>
            </div>
            <div class="bd-highlight">
                <button type="submit" id="add" class="button button5 btn "><b> <img src="<?= base_url() ?>assets/images/rightarrow.png" alt="Add New Exercise" height="40px" width="40px" > </b></button>
                <?php  echo form_close(); ?>
            </div>
        </nav>
    </footer>

    
  
<script type="text/javascript">
    // jQuery(document).ready(function(){ 
    //     $('#body').addClass('animated slideInRight fast');
    // });   
    </script>
  </body>
</html>