<?php

require_once "./backend/config.php";

$sql = "SELECT * FROM all_mps";

$result = $conn->query($sql);

?>

<html>

  <head>
    <title>MPs' Twitter personalities</title>

    <!--specific style sheet for the portfolio example-->
    <link rel="stylesheet" type="text/css" href="index.css"/>

    <!--start of JavaScript for sorting results table-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="./backend/jquery.tablesorter.js"></script>

    <script>
        $(function(){
          $("#results_table").tablesorter();
        });
    </script>
    <!--end of JavaScript for sorting results table-->

    <?php include "./template_top.php"?>

    <h1 class="welcome_title">MPs' Twitter personalities</h1>
    <form action="" method="post">
      <label>Choose a personality trait:</label>
      <select name="personality_trait">
        <option value="agreeableness">Agreeableness</option>
        <option value="altruism">Altruism</option>
        <option value="cooperation">Cooperation</option>
        <option value="modesty">Modesty</option>
        <option value="morality">Morality</option>
        <option value="sympathy">Sympathy</option>
        <option value="trust">Trust</option>
        <option value="conscientiousness">Conscientiousness</option>
        <option value="achievement_striving">Achievement striving</option>
        <option value="cautiousness">Cautiousness</option>
        <option value="dutifulness">Dutifulness</option>
        <option value="orderliness">Orderliness</option>
        <option value="self_discipline">Self-discipline</option>
        <option value="self_efficacy">Self-efficacy</option>
        <option value="extraversion">Extraversion</option>
        <option value="activity_level">Activity level</option>
        <option value="assertiveness">Assertiveness</option>
        <option value="cheerfulness">Cheerfulness</option>
        <option value="excitement_seeking">Excitement seeking</option>
        <option value="friendliness">Friendliness</option>
        <option value="gregariousness">Gregariousness</option>
        <option value="neuroticism">Emotional range</option>
        <option value="anger">Anger</option>
        <option value="anxiety">Anxiety</option>
        <option value="depression">Depression</option>
        <option value="immoderation">Immoderation</option>
        <option value="self_consciousness">Self-consciousness</option>
        <option value="vulnerability">Vulnerability</option>
        <option value="openness">Openness</option>
        <option value="adventurousness">Adventurousness</option>
        <option value="artistic_interests">Artistic interests</option>
        <option value="emotionality">Emotionality</option>
        <option value="imagination">Imagination</option>
        <option value="intellect">Intellect</option>
        <option value="authority_challenging">Authority challenging</option>
      </select>
      <input type="submit" name="SubmitButton"/>
    </form>

    <p>For a description of these categories, please see <a href="https://watson-developer-cloud.github.io/doc-tutorial-downloads/personality-insights/Personality-Insights-Facet-Characteristics.pdf" target="_blank">here</a>.</p>

    <h3>Viewing all MPs</h3>
    <p><a href="./index.php">Return to Top 10</a></p>
    <p><a href="../../portfolio.php">Return to portfolio</a></p>
    <table id="results_table">
      <thead>
        <tr>
          <th>Rank</th>
          <th>MP</th>
          <th>
            <?php
              if(isset($_POST['SubmitButton'])){
                $selected_val = $_POST['personality_trait'];
                if($selected_val=='agreeableness'){
                  echo("Agreeableness");
                }
                elseif($selected_val=='altruism'){
                  echo("Altrusim");
                }
                elseif($selected_val=='cooperation'){
                  echo("Cooperation");
                }
                elseif($selected_val=='modesty'){
                  echo("Modesty");
                }
                elseif($selected_val=='morality'){
                  echo("Morality");
                }
                elseif($selected_val=='sympathy'){
                  echo("Sympathy");
                }
                elseif($selected_val=='trust'){
                  echo("Trust");
                }
                elseif($selected_val=='conscientiousness'){
                  echo("Conscientiousness");
                }
                elseif($selected_val=='achievement_striving'){
                  echo("Achievement_striving");
                }
                elseif($selected_val=='cautiousness'){
                  echo("Cautiousness");
                }
                elseif($selected_val=='dutifulness'){
                  echo("Dutifulness");
                }
                elseif($selected_val=='orderliness'){
                  echo("Orderliness");
                }
                elseif($selected_val=='self_discipline'){
                  echo("Self-discipline");
                }
                elseif($selected_val=='self_efficacy'){
                  echo("Self-efficacy");
                }
                elseif($selected_val=='extraversion'){
                  echo("Extraversion");
                }
                elseif($selected_val=='activity_level'){
                  echo("Activity level");
                }
                elseif($selected_val=='assertiveness'){
                  echo("Assertiveness");
                }
                elseif($selected_val=='cheerfulness'){
                  echo("Cheerfulness");
                }
                elseif($selected_val=='excitement_seeking'){
                  echo("Excitement seeking");
                }
                elseif($selected_val=='friendliness'){
                  echo("Friendliness");
                }
                elseif($selected_val=='gregariousness'){
                  echo("Gregariousness");
                }
                elseif($selected_val=='neuroticism'){
                  echo("Emotional range");
                }
                elseif($selected_val=='anger'){
                  echo("Anger");
                }
                elseif($selected_val=='anxiety'){
                  echo("Anxiety");
                }
                elseif($selected_val=='depression'){
                  echo("Depression");
                }
                elseif($selected_val=='immoderation'){
                  echo("Immoderation");
                }
                elseif($selected_val=='self_consciousness'){
                  echo("Self-consciousness");
                }
                elseif($selected_val=='vulnerability'){
                  echo("Vulnerability");
                }
                elseif($selected_val=='openness'){
                  echo("Openness");
                }
                elseif($selected_val=='adventurousness'){
                  echo("Adventurousness");
                }
                elseif($selected_val=='artistic_interests'){
                  echo("Artistic_interests");
                }
                elseif($selected_val=='emotionality'){
                  echo("Emotionality");
                }
                elseif($selected_val=='imagination'){
                  echo("Imagination");
                }
                elseif($selected_val=='intellect'){
                  echo("Intellect");
                }
                elseif($selected_val=='authority_challenging'){
                  echo("Authority_challenging");
                }
                else{
                  echo("ERROR");
                }
              }
              else{
                echo("Trait");
              }
            ?>
          </th>
        </tr>
      <thead>

      <tbody>

      <?php
            while($row = $result->fetch_assoc()){
              #echo $selected_val;
              $selected_val_rank = $selected_val . "_rank";
              #echo $selected_val_rank;
              if ($row[$selected_val_rank] > 0){
      ?>
          <tr>
            <td>
              <?php
              if(isset($_POST['SubmitButton'])){
                $selected_val = $_POST['personality_trait'];
                if($selected_val=='agreeableness'){
                  echo $row['agreeableness_rank'];
                }
                elseif($selected_val=='altruism'){
                  echo $row['altruism_rank'];
                }
                elseif($selected_val=='cooperation'){
                  echo $row['cooperation_rank'];
                }
                elseif($selected_val=='modesty'){
                  echo $row['modesty_rank'];
                }
                elseif($selected_val=='morality'){
                  echo $row['morality_rank'];
                }
                elseif($selected_val=='sympathy'){
                  echo $row['sympathy_rank'];
                }
                elseif($selected_val=='trust'){
                  echo $row['trust_rank'];
                }
                elseif($selected_val=='conscientiousness'){
                  echo $row['conscientiousness_rank'];
                }
                elseif($selected_val=='achievement_striving'){
                  echo $row['achievement_striving_rank'];
                }
                elseif($selected_val=='cautiousness'){
                  echo $row['cautiousness_rank'];
                }
                elseif($selected_val=='dutifulness'){
                  echo $row['dutifulness_rank'];
                }
                elseif($selected_val=='orderliness'){
                  echo $row['orderliness_rank'];
                }
                elseif($selected_val=='self_discipline'){
                  echo $row['self_discipline_rank'];
                }
                elseif($selected_val=='self_efficacy'){
                  echo $row['self_efficacy_rank'];
                }
                elseif($selected_val=='extraversion'){
                  echo $row['extraversion_rank'];
                }
                elseif($selected_val=='activity_level'){
                  echo $row['activity_level_rank'];
                }
                elseif($selected_val=='assertiveness'){
                  echo $row['assertiveness_rank'];
                }
                elseif($selected_val=='cheerfulness'){
                  echo $row['cheerfulness_rank'];
                }
                elseif($selected_val=='excitement_seeking'){
                  echo $row['excitement_seeking_rank'];
                }
                elseif($selected_val=='friendliness'){
                  echo $row['friendliness_rank'];
                }
                elseif($selected_val=='gregariousness'){
                  echo $row['gregariousness_rank'];
                }
                elseif($selected_val=='neuroticism'){
                  echo $row['neuroticism_rank'];
                }
                elseif($selected_val=='anger'){
                  echo $row['anger_rank'];
                }
                elseif($selected_val=='anxiety'){
                  echo $row['anxiety_rank'];
                }
                elseif($selected_val=='depression'){
                  echo $row['depression_rank'];
                }
                elseif($selected_val=='immoderation'){
                  echo $row['immoderation_rank'];
                }
                elseif($selected_val=='self_consciousness'){
                  echo $row['self_consciousness_rank'];
                }
                elseif($selected_val=='vulnerability'){
                  echo $row['vulnerability_rank'];
                }
                elseif($selected_val=='openness'){
                  echo $row['openness_rank'];
                }
                elseif($selected_val=='adventurousness'){
                  echo $row['adventurousness_rank'];
                }
                elseif($selected_val=='artistic_interests'){
                  echo $row['artistic_interests_rank'];
                }
                elseif($selected_val=='emotionality'){
                  echo $row['emotionality_rank'];
                }
                elseif($selected_val=='imagination'){
                  echo $row['imagination_rank'];
                }
                elseif($selected_val=='intellect'){
                  echo $row['intellect_rank'];
                }
                elseif($selected_val=='authority_challenging'){
                  echo $row['authority_challenging_rank'];
                }
                else{
                  echo("ERROR");
                }
              }
              ?>
            </td>
            <td><?php echo $row['name']; ?></td>
            <td>
              <?php
              $message = "";
              if(isset($_POST['SubmitButton'])){
                $selected_val = $_POST['personality_trait'];
                if($selected_val=='agreeableness'){
                  echo $row['agreeableness'];
                }
                elseif($selected_val=='altruism'){
                  echo $row['altruism'];
                }
                elseif($selected_val=='cooperation'){
                  echo $row['cooperation'];
                }
                elseif($selected_val=='modesty'){
                  echo $row['modesty'];
                }
                elseif($selected_val=='morality'){
                  echo $row['morality'];
                }
                elseif($selected_val=='sympathy'){
                  echo $row['sympathy'];
                }
                elseif($selected_val=='trust'){
                  echo $row['trust'];
                }
                elseif($selected_val=='conscientiousness'){
                  echo $row['conscientiousness'];
                }
                elseif($selected_val=='achievement_striving'){
                  echo $row['achievement_striving'];
                }
                elseif($selected_val=='cautiousness'){
                  echo $row['cautiousness'];
                }
                elseif($selected_val=='dutifulness'){
                  echo $row['dutifulness'];
                }
                elseif($selected_val=='orderliness'){
                  echo $row['orderliness'];
                }
                elseif($selected_val=='self_discipline'){
                  echo $row['self_discipline'];
                }
                elseif($selected_val=='self_efficacy'){
                  echo $row['self_efficacy'];
                }
                elseif($selected_val=='extraversion'){
                  echo $row['extraversion'];
                }
                elseif($selected_val=='activity_level'){
                  echo $row['activity_level'];
                }
                elseif($selected_val=='assertiveness'){
                  echo $row['assertiveness'];
                }
                elseif($selected_val=='cheerfulness'){
                  echo $row['cheerfulness'];
                }
                elseif($selected_val=='excitement_seeking'){
                  echo $row['excitement_seeking'];
                }
                elseif($selected_val=='friendliness'){
                  echo $row['friendliness'];
                }
                elseif($selected_val=='gregariousness'){
                  echo $row['gregariousness'];
                }
                elseif($selected_val=='neuroticism'){
                  echo $row['neuroticism'];
                }
                elseif($selected_val=='anger'){
                  echo $row['anger'];
                }
                elseif($selected_val=='anxiety'){
                  echo $row['anxiety'];
                }
                elseif($selected_val=='depression'){
                  echo $row['depression'];
                }
                elseif($selected_val=='immoderation'){
                  echo $row['immoderation'];
                }
                elseif($selected_val=='self_consciousness'){
                  echo $row['self_consciousness'];
                }
                elseif($selected_val=='vulnerability'){
                  echo $row['vulnerability'];
                }
                elseif($selected_val=='openness'){
                  echo $row['openness'];
                }
                elseif($selected_val=='adventurousness'){
                  echo $row['adventurousness'];
                }
                elseif($selected_val=='artistic_interests'){
                  echo $row['artistic_interests'];
                }
                elseif($selected_val=='emotionality'){
                  echo $row['emotionality'];
                }
                elseif($selected_val=='imagination'){
                  echo $row['imagination'];
                }
                elseif($selected_val=='intellect'){
                  echo $row['intellect'];
                }
                elseif($selected_val=='authority_challenging'){
                  echo $row['authority_challenging'];
                }
                else{
                  echo("ERROR");
                }
              }
              ?>
            </td>
          </tr>
          <?php
      }
    }
      ?>

      </tbody>

    </table>

    <p><a href="./index.php">Return to Top 10</a></p>
    <p><a href="../../portfolio.php">Return to portfolio</a></p>

    <?php include "../../template_bottom.php"?>
