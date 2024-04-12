<?php $this->load->view('adminpanel/header');  ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


      <h2>View Blog</h2>
       <?php
           // echo "<pre>";
           // print_r($result); die();


       ?>



      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Sr No</th>
              <th scope="col">Title</th>
              <th scope="col">Desc</th>
              <th scope="col">Image</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>

            </tr>
          </thead>
          <tbody>

                  <?php

                  if ($result) {

                          $counter=1;
                         foreach ($result as $key => $value) {
                             echo "<tr>
                            <td>".$counter."</td>
                            <td>".$value['blog_title']."</td>
                            <td>".$value['blog_desc']."</td>
                            <td><img src='".base_url().$value['blog_img']."' class= 'img-fluid' width='100'></td>
                            <td><a class=\"btn btn-info\" href='" .base_url() .'admin/blog/editblog/' .$value['blogid']."'>Edit</a></td>
                            <td><a class=\"btn delete btn-danger\" href= '#.' data-id='".$value['blogid']."'>Delete</a></td>
                         </tr>";

                             $counter++;
                         }

                        

           
                  }
                    else{
                      echo "<tr><td colspan='6' No Record found</td></tr>";
                    }
                         

                  ?>

       <!-- 
            <tr>
              <td>1,002</td>
              <td>placeholder</td>
              <td>irrelevant</td>
              <td>visual</td>
              <td>layout</td>
              <td>layout</td>
            </tr> -->
         
         
          </tbody>
        </table>
      </div>


    </main>
  </div>
</div>

<?php $this->load->view('adminpanel/footer.php');    ?>


<script type="text/javascript">
   $(".delete").click(function(){

    var delete_id= $(this).attr('data-id');
    
    var bool= confirm('Are you sure you want to delete the blog forever?');
    console.log(bool);

    if (bool) {
      // alert("Move to delete functionality using AJAX");

      $.ajax({
        url:'<?= base_url().'admin/blog/deleteblog/'?>',
        type:'post',
        data:{'delete_id':delete_id},
        success:function(response){
          console.log(response);

          if (response=="deleted") {
              location.reload();
          }else if (response=="notdeleted")
             alert("Something went wrong!");

        }
      });
    }
    else{
      alert("Your Blog is Safe");
    }

   });
        

        <?php

            if (isset($_SESSION['updated'])) {
               if ($_SESSION['updated'] == "yes") {
                echo 'alert("Data has been updated!");';
               }
               else if ($_SESSION['updated'] == "no"){
                echo 'alert("Some error occured & data not updated!");';
               }
            }


        ?>


</script>

<!-- CK EDITOR CODE -->

<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>

      <script>
            CKEDITOR.replace( 'blog_desc' );
      </script>

