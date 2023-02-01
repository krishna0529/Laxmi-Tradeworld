<?php
include('../database/conn.php');
// include('./Function/commonF.php');



?>
<h3 class="text-center ">ALL Brand</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-success text-light">
        <tr class="text-center">
            <th>Sr.no</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
     <?php
        $select_query ="SELECT * FROM `brands`";
        $result_query =mysqli_query($connection,$select_query);
        $number=0;
        while($row= mysqli_fetch_assoc($result_query)){
            $brand_id=$row['brand_id'];
            $brand_tittle=$row['brand_tittle'];
            $number++;
            echo "<tr class='text-center'>
            
            <td>$number</td>
            <td>$brand_tittle</td>
            <td><a href='./Adashboard.php?edit_brand=$brand_id' class='text-light ' ><i class='fa-solid fa-pen-to-square '></i></a></td>
            <td><a href='./Adashboard.php?delete_brand=$brand_id' type='button' class='text-light' data-toggle='modal' data-target='#exampleModalCenter' ><i class='fa-solid fa-trash '></i></a></td>
                    
        </tr>";
            

        }

        ?>


    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <h4>Are You Sure You Want Delete This Brand ?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary"><a href='./Adashboard.php?delete_brand=<?php echo $brand_id ?>' class="text-light text-decoration-none"  >Yes</a></button>
      </div>
    </div>
  </div>
</div>