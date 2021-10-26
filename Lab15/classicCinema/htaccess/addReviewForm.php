<?php
function addReviewForm($xmlFileName) {
    if (isset($_SESSION['authenticatedUser'])) {
    echo "<form action='AddReview.php' method='POST'>";
        echo " <input type='hidden' name='xmlFileName' value='$xmlFileName'>";
        // Rest of the form goes in here
        echo "<select name='rating' id='rating'>
        
        <option value='1'>01</option>
        <option value='2'>02</option>
        <option value='3'>03</option>
        <option value='4'>04</option>
        <option value='5'>05</option>
        
        </select>";
        echo "<input type='submit'>";
        echo "</form>";
    }
}
?>