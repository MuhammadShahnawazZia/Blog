<?php
  
   /**
    * 
    */
   class ArticleModel extends CI_Model
   {
   	
     function fetch_all_articles(){
     	  $resultquery = $this->db->query("SELECT `blogid`, `blog_title`, `blog_desc`, `blog_img`, `status`, `creates_on`, `updated_on` FROM `articles` WHERE status='1'");

     	  return $resultquery->result_array();


     }

          function fetch_blog_detail($blog_id){
              
                     $resultquery = $this->db->query("SELECT `blogid`, `blog_title`, `blog_desc`, `blog_img`, `status`, `creates_on`, `updated_on` FROM `articles` WHERE blogid = $blog_id");

     	  return $resultquery->result_array();

          }
   }

  
?>






<!-- ?>

<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>

      <script>
            CKEDITOR.replace( 'desc' );
      </script>
 -->