<?php
$studentid = $_SESSION['StudentID'];
$score = 0;
$id = $_GET['id'];
if ($id == '') {
    redirect("index.php");
}
 	
$sql = "SELECT SUM(Score) as 'SCORE' FROM tblscore  WHERE LessonID='{$id}' and StudentID='{$studentid}' AND Submitted=1";
$mydb->setQuery($sql);
$row = $mydb->executeQuery(); 
$ans = $mydb->loadSingleResult();
$score  = $ans->SCORE;

if ($score != null) {
    redirect("index.php?q=quizresult&id={$id}&score={$score}");
}
?>

<h1>Question</h1>
<h5>Choose the correct answer.</h5>
<div style="height:250px;overflow-y:auto;"> 
    <?php   
    $sql = "SELECT * FROM tblexercise WHERE LessonID = '{$id}'";
    $mydb->setQuery($sql);
    $cur = $mydb->loadResultList();

    foreach ($cur as $res) {
    ?> 
    <form> 
        <div><?php echo $res->Question ; ?></div>
        <div class="col-md-3"><input class="radios" type="radio" id="ChoiceA" data-id="<?php echo $res->ExerciseID;?>" name="choices" value="<?php echo $res->ChoiceA; ?>"> A. <?php echo $res->ChoiceA; ?></div>
        <div class="col-md-3"><input class="radios" type="radio" id="ChoiceB" data-id="<?php echo $res->ExerciseID;?>" name="choices" value="<?php echo $res->ChoiceB; ?>"> B. <?php echo $res->ChoiceB; ?></div>
        <div class="col-md-3"><input class="radios" type="radio" id="ChoiceC" data-id="<?php echo $res->ExerciseID;?>" name="choices" value="<?php echo $res->ChoiceC; ?>"> C. <?php echo $res->ChoiceC; ?></div>
        <div class="col-md-3"><input class="radios" type="radio" id="ChoiceD" data-id="<?php echo $res->ExerciseID;?>" name="choices" value="<?php echo $res->ChoiceD; ?>"> D. <?php echo $res->ChoiceD; ?></div> 
    </form>
    <?php } ?>
</div>
<form action="processscore.php" method="POST" onsubmit="return validateForm()" style="margin-top: 100px;text-align: right;">
    <input type="hidden" name="LessonID" value="<?php echo $id ?>">
    <button class="btn btn-md btn-primary" type="submit" name="btnSubmit">Submit  <i class="fa fa-arrow-right"></i></button>
</form>

<script>
    function validateForm() {
        var radios = document.getElementsByName("choices");
        var totalQuestions = radios.length / 4; // Assuming 4 choices per question
        var answeredQuestions = 0;

        for (var i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                answeredQuestions++;
            }
        }

        if (answeredQuestions < totalQuestions) {
            alert("Please answer all the questions before submitting.");
            return false;
        }

        return true;
    }
</script>
