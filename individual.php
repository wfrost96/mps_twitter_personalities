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
          $("#rs1").tablesorter();
        });

        $(function(){
          $("#rs2").tablesorter();
        });

        $(function(){
          $("#rs3").tablesorter();
        });

        $(function(){
          $("#rs4").tablesorter();
        });

        $(function(){
          $("#rs5").tablesorter();
        });
    </script>
    <!--end of JavaScript for sorting results table-->

    <?php include "./template_top.php"?>

    <h1 class="welcome_title">MPs' Twitter personalities</h1>

    <p><a href="index.php">Back to all MPs</a></p>

    <form action="" method="post">
      <label>Choose an MP:</label>
      <input list="browsers" name="selected_mp">
      <datalist id="browsers">
        <?php include "./backend/mps_list_select.html" ?>
      </datalist>
      <input type="submit" name="SubmitButton"/>
    </form>

    <?php
    if(isset($_POST['SubmitButton'])){
      $selected_mp = $_POST['selected_mp'];
    }

    require_once "./backend/config.php";

    $sql = "SELECT * FROM all_mps WHERE name = '$selected_mp'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $party = $row["party"];
        $constituency = $row["constituency"];

        $agreeableness = $row["agreeableness"];
        $agreeableness_rank = $row["agreeableness_rank"];
        $altruism = $row["altruism"];
        $altruism_rank = $row["altruism_rank"];
        $cooperation = $row["cooperation"];
        $cooperation_rank = $row["cooperation_rank"];
        $modesty = $row["modesty"];
        $modesty_rank = $row["modesty_rank"];
        $morality = $row["morality"];
        $morality_rank = $row["morality_rank"];
        $sympathy = $row["sympathy"];
        $sympathy_rank = $row["sympathy_rank"];
        $trust = $row["trust"];
        $trust_rank = $row["trust_rank"];

        $conscientiousness = $row["conscientiousness"];
        $conscientiousness_rank = $row["conscientiousness_rank"];
        $achievement_striving = $row["achievement_striving"];
        $achievement_striving_rank = $row["achievement_striving_rank"];
        $cautiousness = $row["cautiousness"];
        $cautiousness_rank = $row["cautiousness_rank"];
        $dutifulness = $row["dutifulness"];
        $dutifulness_rank = $row["dutifulness_rank"];
        $orderliness = $row["orderliness"];
        $orderliness_rank = $row["orderliness_rank"];
        $self_discipline = $row["self_discipline"];
        $self_discipline_rank = $row["self_discipline_rank"];
        $self_efficacy = $row["self_efficacy"];
        $self_efficacy_rank = $row["self_efficacy_rank"];

        $extraversion = $row["extraversion"];
        $extraversion_rank = $row["extraversion_rank"];
        $activity_level = $row["activity_level"];
        $activity_level_rank = $row["activity_level_rank"];
        $assertiveness = $row["assertiveness"];
        $assertiveness_rank = $row["assertiveness_rank"];
        $cheerfulness = $row["cheerfulness"];
        $cheerfulness_rank = $row["cheerfulness_rank"];
        $excitement_seeking = $row["excitement_seeking"];
        $excitement_seeking_rank = $row["excitement_seeking_rank"];
        $friendliness = $row["friendliness"];
        $friendliness_rank = $row["friendliness_rank"];
        $gregariousness = $row["gregariousness"];
        $gregariousness_rank = $row["gregariousness_rank"];

        $neuroticism = $row["neuroticism"];
        $neuroticism_rank = $row["neuroticism_rank"];
        $anger = $row["anger"];
        $anger_rank = $row["anger_rank"];
        $anxiety = $row["anxiety"];
        $anxiety_rank = $row["anxiety_rank"];
        $depression = $row["depression"];
        $depression_rank = $row["depression_rank"];
        $immoderation = $row["immoderation"];
        $immoderation_rank = $row["immoderation_rank"];
        $self_consciousness = $row["self_consciousness"];
        $self_consciousness_rank = $row["self_consciousness_rank"];
        $vulnerability = $row["vulnerability"];
        $vulnerability_rank = $row["vulnerability_rank"];

        $openness = $row["openness"];
        $openness_rank = $row["openness_rank"];
        $adventurousness = $row["adventurousness"];
        $adventurousness_rank = $row["adventurousness_rank"];
        $artistic_interests = $row["artistic_interests"];
        $artistic_interests_rank = $row["artistic_interests_rank"];
        $emotionality = $row["emotionality"];
        $emotionality_rank = $row["emotionality_rank"];
        $imagination = $row["imagination"];
        $imagination_rank = $row["imagination_rank"];
        $intellect = $row["intellect"];
        $intellect_rank = $row["intellect_rank"];
        $authority_challenging = $row["authority_challenging"];
        $authority_challenging_rank = $row["authority_challenging_rank"];
      }
    }

    ?>

    <h3>
      <?php
        if(isset($_POST['SubmitButton'])){
          echo "Showing results for " . $selected_mp . " (" . $party . ", " . $constituency . ")";
        }
      ?>
    </h3>

    <!--Get the highest and lowest ranks-->
    <?php

    $myarray = [
        "agreeableness" => $agreeableness_rank,
        "altruism" => $altruism_rank,
        "cooperation" => $cooperation_rank,
        "modesty" => $modesty_rank,
        "morality" => $morality_rank,
        "sympathy" => $sympathy_rank,
        "trust" => $trust_rank,

        "conscientiousness" => $conscientiousness_rank,
        "achievement striving" => $achievement_striving_rank,
        "cautiousness" => $cautiousness_rank,
        "dutifulness" => $dutifulness_rank,
        "orderliness" => $orderliness_rank,
        "self-discipline" => $self_discipline_rank,
        "self-efficacy" => $self_efficacy_rank,

        "extraversion" => $extraversion_rank,
        "activity level" => $activity_level_rank,
        "assertiveness" => $assertiveness_rank,
        "cheerfulness" => $cheerfulness_rank,
        "excitement seeking" => $excitement_seeking_rank,
        "friendliness" => $friendliness_rank,
        "gregariousness" => $gregariousness_rank,

        "neuroticism" => $neuroticism_rank,
        "anger" => $anger_rank,
        "anxiety" => $anxiety_rank,
        "depression" => $depression_rank,
        "immoderation" => $immoderation_rank,
        "self-consciousness" => $self_consciousness_rank,
        "vulnerability" => $vulnerability_rank,

        "openness" => $conscientiousness_rank,
        "adventurousness" => $adventurousness_rank,
        "artistic interests" => $artistic_interests_rank,
        "emotionality" => $emotionality_rank,
        "imagination" => $imagination_rank,
        "intellect" => $intellect_rank,
        "authority challenging" => $authority_challenging_rank,
    ];

    $highest= min($myarray);
    #echo $highest;

    $lowest= max($myarray);
    #echo $lowest;

    #get the keys for the arrays value, i.e., get the name of the relevant traits/traits for highest and lowest
    $highest_trait = "";
    $lowest_trait = "";
    while ($var = current($myarray)) {
        if ($var == $highest) {
            $highest_trait = key($myarray);
        }
        if ($var == $lowest) {
            $lowest_trait = key($myarray);
        }
        next($myarray);
    }

    ?>

    <?php
      if(isset($_POST['SubmitButton'])){
        echo "<p>" . $selected_mp . "'s highest rank is " . $highest . " for " . $highest_trait . ".</p>";
        echo "<p>" . $selected_mp . "'s highest rank is " . $lowest . " for " . $lowest_trait . ".</p>";
      }
    ?>
    <!--end of highest and lowest ranks-->

    <h3>Agreeableness</h3>

    <table id="rs1">
      <thead>
        <tr><td>Trait</td><td>Score</td><td>Rank</td></td>
      </thead>
      <tbody>
        <tr><td>Agreeableness</td><td><?php echo $agreeableness ?></td><td><?php echo $agreeableness_rank ?></td></tr>
        <tr><td>Atruism</td><td><?php echo $altruism ?></td><td><?php echo $altruism_rank ?></td></tr>
        <tr><td>Cooperation</td><td><?php echo $cooperation ?></td><td><?php echo $cooperation_rank ?></td></tr>
        <tr><td>Modesty</td><td><?php echo $modesty ?></td><td><?php echo $modesty_rank ?></td></tr>
        <tr><td>Morality</td><td><?php echo $morality ?></td><td><?php echo $morality_rank ?></td></tr>
        <tr><td>Sympathy</td><td><?php echo $sympathy ?></td><td><?php echo $sympathy_rank ?></td></tr>
        <tr><td>Trust</td><td><?php echo $trust ?></td><td><?php echo $trust_rank ?></td></tr>
      </tbody>
    </table>

    <h3>Conscientiousness</h3>

    <table id="rs2">
      <thead>
        <tr><td>Trait</td><td>Score</td><td>Rank</td></td>
      </thead>
      <tbody>
        <tr><td>Conscientiousness</td><td><?php echo $conscientiousness ?></td><td><?php echo $conscientiousness_rank ?></td></tr>
        <tr><td>Achievement striving</td><td><?php echo $achievement_striving ?></td><td><?php echo $achievement_striving_rank ?></td></tr>
        <tr><td>Cautiousness</td><td><?php echo $cautiousness ?></td><td><?php echo $cautiousness_rank ?></td></tr>
        <tr><td>Dutifulness</td><td><?php echo $dutifulness ?></td><td><?php echo $dutifulness_rank ?></td></tr>
        <tr><td>Orderliness</td><td><?php echo $orderliness ?></td><td><?php echo $orderliness_rank ?></td></tr>
        <tr><td>Self-discipline</td><td><?php echo $self_discipline ?></td><td><?php echo $self_discipline_rank ?></td></tr>
        <tr><td>Self-efficacy</td><td><?php echo $self_efficacy ?></td><td><?php echo $self_efficacy_rank ?></td></tr>
      </tbody>
    </table>

    <h3>Extraversion</h3>

    <table id="rs3">
      <thead>
        <tr><td>Trait</td><td>Score</td><td>Rank</td></td>
      </thead>
      <tbody>
        <tr><td>Extraversion</td><td><?php echo $extraversion ?></td><td><?php echo $extraversion_rank ?></td></tr>
        <tr><td>Activity level</td><td><?php echo $activity_level ?></td><td><?php echo $activity_level_rank ?></td></tr>
        <tr><td>Assertiveness</td><td><?php echo $assertiveness ?></td><td><?php echo $assertiveness_rank ?></td></tr>
        <tr><td>Cheerfulness</td><td><?php echo $cheerfulness ?></td><td><?php echo $cheerfulness_rank ?></td></tr>
        <tr><td>Excitement seeking</td><td><?php echo $excitement_seeking ?></td><td><?php echo $excitement_seeking_rank ?></td></tr>
        <tr><td>Friendliness</td><td><?php echo $friendliness ?></td><td><?php echo $friendliness_rank ?></td></tr>
        <tr><td>Gregariousness</td><td><?php echo $gregariousness ?></td><td><?php echo $gregariousness_rank ?></td></tr>
      </tbody>
    </table>

    <h3>Emotional range</h3>

    <table id="rs4">
      <thead>
        <tr><td>Trait</td><td>Score</td><td>Rank</td></td>
      </thead>
      <tbody>
        <tr><td>Emotional range</td><td><?php echo $neuroticism ?></td><td><?php echo $neuroticism_rank ?></td></tr>
        <tr><td>Anger</td><td><?php echo $anger ?></td><td><?php echo $anger_rank ?></td></tr>
        <tr><td>Anxiety</td><td><?php echo $anxiety ?></td><td><?php echo $anxiety_rank ?></td></tr>
        <tr><td>Depression</td><td><?php echo $depression ?></td><td><?php echo $depression_rank ?></td></tr>
        <tr><td>Immoderation</td><td><?php echo $immoderation ?></td><td><?php echo $immoderation_rank ?></td></tr>
        <tr><td>Self-consciousness</td><td><?php echo $self_consciousness ?></td><td><?php echo $self_consciousness_rank ?></td></tr>
        <tr><td>Vulnerability</td><td><?php echo $vulnerability ?></td><td><?php echo $vulnerability_rank ?></td></tr>
      </tbody>
    </table>

    <h3>Openness</h3>

    <table id="rs5">
      <thead>
        <tr><td>Trait</td><td>Score</td><td>Rank</td></td>
      </thead>
      <tbody>
        <tr><td>Openness</td><td><?php echo $openness ?></td><td><?php echo $openness_rank ?></td></tr>
        <tr><td>Adventurousness</td><td><?php echo $adventurousness ?></td><td><?php echo $adventurousness_rank ?></td></tr>
        <tr><td>Artistic interests</td><td><?php echo $artistic_interests ?></td><td><?php echo $artistic_interests_rank ?></td></tr>
        <tr><td>Emotionality</td><td><?php echo $emotionality ?></td><td><?php echo $emotionality_rank ?></td></tr>
        <tr><td>Imagination</td><td><?php echo $imagination ?></td><td><?php echo $imagination_rank ?></td></tr>
        <tr><td>Intellect</td><td><?php echo $intellect ?></td><td><?php echo $intellect_rank ?></td></tr>
        <tr><td>Liberalism</td><td><?php echo $authority_challenging ?></td><td><?php echo $authority_challenging_rank ?></td></tr>
      </tbody>
    </table>

    <p>For a description of these categories, please see <a href="https://watson-developer-cloud.github.io/doc-tutorial-downloads/personality-insights/Personality-Insights-Facet-Characteristics.pdf" target="_blank">here</a>.</p>

    <p><a href="index.php">Back to all MPs</a></p>

    <?php include "../../template_bottom.php"?>
