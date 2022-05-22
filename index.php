<?php require 'note_process.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todo</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 
<link rel="stylesheet" href="todo.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body>
    
    <div class="container align-justify-center">
        
          
        

        <div class="add_note ">
        <button type="button" class="btn  btn-block " data-toggle="modal" data-target="#exampleModalCenter">
            Add Your Note
        </button>
        </div> 


          <!-- Modal -->
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Add Note</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                 <form action="" method="POST">
                        <input type="hidden" name="note_id" value="<?php echo( $note_id); ?>">
                        <div class="form_group">
                            <textarea name="add_note" id="list" style="width: 100%;" rows="10"><?php echo( $add_note); ?></textarea>
                        </div>
                        <label for="colour">Pick Note Colour</label>
                        <br>
                        <div class="d-flex ">

                            <input type="radio" id="pink" name="pick_color" value="colour1">
                              <label for="pink"><div style="width:30px; height:30px; border-radius:5px;" class="colour1"></div></label><br>
                              
                            <input type="radio" id="red" name="pick_color" value="colour2">
                              <label for="red"><div style="width:30px; height:30px; border-radius:5px;" class="colour2"></div></label><br>
                              
                            <input type="radio" id="orange" name="pick_color" value="colour3">
                              <label for="orange"><div style="width:30px; height:30px; border-radius:5px;" class="colour3"></div></label><br>
                              
                            <input type="radio" id="blue" name="pick_color" value="colour4">
                              <label for="blue"><div style="width:30px; height:30px; border-radius:5px;" class="colour4"></div></label><br>
                              
                            <input type="radio" id="purple" name="pick_color" value="colour5">
                              <label for="purple"><div style="width:30px; height:30px; border-radius:5px;" class="colour5"></div></label><br>
                              
                            <input type="radio" id="green" name="pick_color" value="colour6">
                              <label for="green"><div style="width:30px; height:30px; border-radius:5px;" class="colour6"></div></label><br>
                              
                        </div>  
                        <input type="hidden" name="status" value="pending">
                    </div>
                    <div class="modal-footer">
                        <?php if($update==true){
                        echo( '<button type="submit" id="addList" name="update" class="btn btn-primary">update</button>');}
                        else{
                            echo( '<button type="submit" id="addList" name="submit" class="btn btn-primary">add note</button>');
                        }
                        ?>
                    </div>
                 </form>
              </div>
            </div>
          </div>

          

            <div class="btn-group d-flex justify-content-center todo-status" role="group" aria-label="Basic example">
                
                    <button type="button" class="btn active" > Show all</button>
                    <button type="button" class="btn" data-filter=".completed"> Completed</button>
                    <button type="button" class="btn" data-filter=".pending"> Pending</button>
                
            
            </div>
           
    
            
            
        <div class="todo-items card-columns justify-content-center">

            <!--CARDS-->
            <?php $result=$mysqli->query("SELECT * FROM `sticky_notes`"); 

          foreach( $result as $note):
           ?>

            
            <div class="item <?php echo $note['notes_status']; ?>">
                <div class="note <?php echo $note['notes_color']; ?> card ">
                    <div class="note_section d-flex justify-content-center w-100 .cat1" >
                        <h6 class="flex-fill"><?php echo $note['notes_time']; ?></h6>
                        <a href="note_process.php?delete=<?php echo $note['notes_id'];?>"><span class="material-symbols-rounded">delete</span></a> 
                    </div>
                    <ul>
                    <?php echo $note['notes_list']; ?>
                    </ul>
                    <div class="complete-button d-flex" >
                        <a href="index.php?edit=<?php echo $note['notes_id'];?>"><span class="material-symbols-outlined flex-fill">edit_note </span></a> 
                        <a href="index.php?completed=<?php echo $note['notes_id'];?>"><span class="material-symbols-outlined flex-fill">check_circle</span></a> 
                    </div>
                </div>
            </div>

          <?php endforeach ?>
            
        </div>
        
        
    </div>


    


    
</body>

<!-- or -->
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

<script src="todo.js"></script>
<script>
    const div = document.querySelector('.item');

    if(div.classList.contains('note')){
        console.log(true);
        
    }

    
    
</script>

</html>