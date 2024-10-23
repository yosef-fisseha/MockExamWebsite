<?php 
require("session.php");
require_once("connect/connection.php");


$ans = "";

$queno = $_GET['questionno'];
$que_num = $_GET['que_num'];

if(isset($_SESSION["answer"][$que_num]))
{
    $ans = $_SESSION["answer"][$que_num];
}

$query = mysqli_query($connect,"SELECT `tbl_name` FROM `questions` WHERE dep_ID = $dep_ID");
$row = mysqli_fetch_assoc($query);
$que_tbl_name = $row['tbl_name'];

     
$query1 = mysqli_query($connect,"SELECT * FROM `$que_tbl_name` WHERE model_or_exam = 'exam' && exam_year = $_SESSION[exam_year] && questionID=$queno");

$count = mysqli_num_rows($query1);

if($count==0)
{
    echo "No Record Found";
    
}
else
{
    while($row1=mysqli_fetch_array($query1))
    {
        $question_no = $row1['questionID'];
        $question = $row1['question'];
        $option_a = $row1['option_a'];
        $option_b = $row1['option_b'];
        $option_c = $row1['option_c'];
        $option_d = $row1['option_d']; 
    }
?>

 <div class="card">
    <div class="title"><?php echo "( ". $que_num + 1 ." ) "; 
                if (strpos($question,'question_images/') !== false) {
                  $path = "http://<?php echo $server_ip ?>/MockExamWebsit/SystemUser/";
                    ?>
                    <img src="<?php echo $path.$question; ?>">
                        <?php
                }else{
                    echo $question;
                }?></div>
  <div class="content">
    <input type="radio" name="r1" id="one" value="A" onclick="radioclick(this.value,<?php echo $question_no ?>)"
    <?php 
        if($ans == "A")
        {
            echo "checked";   
        }
        ?>>
    <input type="radio" name="r1" id="two" value="B" onclick="radioclick(this.value,<?php echo $question_no ?>)"
            <?php 
            if($ans == "B")
            {
                echo "checked";
            }
            ?>>
    <input type="radio" name="r1" id="three" value="C" onclick="radioclick(this.value,<?php echo $question_no ?>)"
            <?php 
            if($ans == "C")
            {
                echo "checked";   
            }
            ?>>
    <input type="radio" name="r1" id="four" value="D" onclick="radioclick(this.value,<?php echo $question_no ?>)"
            <?php 
            if($ans == "D")
            {
                echo "checked";   
            }
            ?>>

    <label for="one" class="box first">
      <div class="plan">
      <span class="circle"></span>
      <span ><?php echo $option_a ?></span>
    </div>
        
    </label>
    <label for="two" class="box second">
      <div class="plan">
      <span class="circle"></span>
      <span ><?php echo $option_b ?></span>
    </div>
        
    </label>
    <label for="three" class="box third">
      <div class="plan">
      <span class="circle"></span>
      <span ><?php echo $option_c ?></span>
      </div>
        
    </label>

    </label>
    <label for="four" class="box forth">
      <div class="plan">
      <span class="circle"></span>
        <span class="yearly"><?php echo $option_d ?></span>
      </div>
        
    </label>
  </div>
 </div>
<?php 
}
?>