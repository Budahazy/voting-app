<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Voting App</title>
    <link href="../view/style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>


<div class="container">

    <?php foreach ($questions as $question) : ?>

    <div class="question-box">
        <div class="question"><?= $question['questionText']?></div>
        <div class="votes">
            <div class="upvotes"><a href="?upvote=<?= $question['questionId']?>"><?= $question['upvotes']?></a></div>
            <div class="downvotes"><a href="?downvote=<?= $question['questionId']?>"><?= $question['downvotes']?></a></div>
        </div>
    </div>

    <?php endforeach; ?>

</div>



</body>
</html>
