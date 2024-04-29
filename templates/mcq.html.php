<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QCM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    
    <div class="container my-4">
        <div class="alert alert-<?= !empty($_POST) ? ($this->getGrade() >= count($this->getQuestions()) / 2 ? 'success' : 'danger') : 'secondary' ?>">
            <h1 class="mb-0 text-center"><?= $this->getTitle() ?></h1>
            <p class="mb-0 text-center"><?= empty($_POST) ? 'Répondez au QCM.' : 'Note : '.$this->getGrade().' / '.count($this->getQuestions()) ?></p>
        </div>

        <form class="d-flex flex-column gap-3" action="#" method="POST">
            <?php foreach ($this->getQuestions() as $indexQuestion => $question): ?>
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center gap-2">
                        <label class="h4" for="<?= $indexQuestion ?>"><?= $question->getTitle() ?></label>
                        <?php if(!empty($_POST)): ?>
                        <p class="mb-0 <?= $question->getSelectedAnswers() === $question->getRightAnswers() ? 'text-success' : 'text-danger' ?>"><?= $question->getSelectedAnswers() === $question->getRightAnswers() ? 'Correct' : 'Incorrect' ?></p>
                        <?php endif; ?>
                    </div>

                    <p class="mb-0 small"><?= count($question->getRightAnswers()) > 1 ? 'Plusieurs réponses.' : 'Une seule réponse.' ?></p>

                </div>
                <div class="card-body d-flex flex-column gap-3">
                    <?php foreach ($question->getAnswers() as $indexAnswer => $answer): ?>
                    <div class="d-flex gap-3">
                        <input class="form-check-input" type="<?= count($question->getRightAnswers()) == 1 ? 'radio' : 'checkbox' ?>" id="answer<?= $indexQuestion + 1 ?>.<?= $indexAnswer + 1 ?>" name="<?= $indexQuestion . '[]' ?>" value="<?= $indexAnswer ?>" <?= !empty($_POST) && in_array($answer, $question->getSelectedAnswers()) ? 'checked' : '' ?>>
                        <label class="form-check-label <?= !empty($_POST) ? (in_array($answer, $question->getRightAnswers()) ? 'text-success' : (in_array($answer, $question->getSelectedAnswers()) ? 'text-danger' : '')) : '' ?>" for="answer<?= $indexQuestion + 1 ?>.<?= $indexAnswer + 1 ?>"><?= $answer->getTitle() ?></label>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary w-100">Répondre</button>
        </form>

        <?php if(!empty($_POST)): ?>
        <div class="mt-3 alert <?= $this->getGrade() >= count($this->getQuestions()) / 2 ? 'alert-success' : 'alert alert-danger' ?>">
            <p class="mb-0 text-center">Note : <?= $this->getGrade() ?> / <?= count($this->getQuestions()) ?></p>
        </div> 
        <?php endif; ?>

    </div>

</body>

</html>